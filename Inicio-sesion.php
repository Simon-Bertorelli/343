<?php
session_start();

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
    $nombre_usuario = trim($_POST['nombre_usuario'] ?? '');
    $contrasena = $_POST['contrasena'] ?? '';

    if ($nombre_usuario && $contrasena) {
        $sql = "SELECT id_usuario, nombre_usuario, contrasena FROM usuario WHERE nombre_usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $nombre_usuario);

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();

                if (password_verify($contrasena, $user['contrasena'])) {
                
                    session_regenerate_id(true);

                    $_SESSION['usuario_id'] = $user['id_usuario'];
                    $_SESSION['usuario_nombre'] = $user['nombre_usuario'];

                    header("Location: main.php");
                    exit;
                } else {
                    $message = "<p style='color:red;text-align:center;'>Usuario o contraseña incorrectos.</p>";
                }
            } else {
                $message = "<p style='color:red;text-align:center;'>Usuario o contraseña incorrectos.</p>";
            }
        }
        $stmt->close();
    } else {
        $message = "<p style='color:red;text-align:center;'>Todos los campos son obligatorios.</p>";
    }
}
$conn->close();
?>