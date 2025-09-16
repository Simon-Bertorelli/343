<?php session_start();

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = '343db';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}
$conn->set_charset('utf8mb4');

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitizar entradas
    $nombre_usuario = trim($_POST['nombre_usuario'] ?? '');
    $contrasena = $_POST['contrasena'] ?? '';
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
    $id_equipo_favorito = filter_var($_POST['id_equipo_favorito'] ?? '', FILTER_VALIDATE_INT);

    if ($nombre_usuario && $contrasena && $email && $id_equipo_favorito !== false) {

        // Verificar si ya existe el usuario o email
        $check = $conn->prepare("SELECT id_usuario FROM usuario WHERE nombre_usuario = ? OR email = ?");
        $check->bind_param("ss", $nombre_usuario, $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $message = "<p style='color:red;text-align:center;'>El usuario o email ya existe.</p>";
        } else {
            // Cifrar contraseña
            $hash = password_hash($contrasena, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuario (nombre_usuario, contrasena, email, id_equipo_favorito) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $nombre_usuario, $hash, $email, $id_equipo_favorito);

           if ($stmt->execute()) {
    
        header("Location: index.php");
       exit;
} else {
    $message = "<p style='color:red;text-align:center;'>Error al registrar usuario.</p>";
}
            $stmt->close();
        }
        $check->close();
    } else {
        $message = "<p style='color:red;text-align:center;'>Todos los campos son obligatorios y deben ser válidos.</p>";
    }
}

?>

