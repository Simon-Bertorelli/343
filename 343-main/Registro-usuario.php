<?php
session_start();

// 1. Conexión a la base de datos
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = '343db';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}
$conn->set_charset('utf8mb4');

// 2. Obtener lista de equipos para autocompletar
$equipos = [];
$result = $conn->query("SELECT id_equipo, nombre FROM equipo");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $equipos[] = $row;
    }
}

$message = '';

// 3. Procesar formulario al enviar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_usuario = trim($_POST['nombre_usuario'] ?? '');
    $contrasena = $_POST['contrasena'] ?? '';
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
    $nombre_equipo = trim($_POST['id_equipo_favorito'] ?? '');

    // 4. Buscar el id del equipo según el nombre ingresado
    $stmt = $conn->prepare("SELECT id_equipo FROM equipo WHERE nombre = ?");
    $stmt->bind_param("s", $nombre_equipo);
    $stmt->execute();
    $stmt->bind_result($id_equipo_favorito);
    if (!$stmt->fetch()) {
        $id_equipo_favorito = null;
    }
    $stmt->close();

    // 5. Validar campos y equipo
    if ($nombre_usuario && $contrasena && $email && $id_equipo_favorito) {

        // 6. Verificar si usuario o email ya existen
        $check = $conn->prepare("SELECT id_usuario FROM usuario WHERE nombre_usuario = ? OR email = ?");
        $check->bind_param("ss", $nombre_usuario, $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $message = "<p style='color:red;text-align:center;'>El usuario o email ya existe.</p>";
        } else {
            // 7. Cifrar contraseña y registrar usuario
            $hash = password_hash($contrasena, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuario (nombre_usuario, contrasena, email, id_equipo_favorito) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $nombre_usuario, $hash, $email, $id_equipo_favorito);

            if ($stmt->execute()) {
                header("Location: Inicio-sesion-html.php"); // Redirigir al login
                exit;
            } else {
                $message = "<p style='color:red;text-align:center;'>Error al registrar usuario.</p>";
            }
            $stmt->close();
        }
        $check->close();
    } else {
        $message = "<p style='color:red;text-align:center;'>Todos los campos son obligatorios y el equipo debe ser válido.</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro 343</title>
    <link rel="stylesheet" href="./css/registro.css">
</head>
<body>
    <div class="container">
        <div class="formulario">
            <h2>Registro de Usuario</h2>
            <?= $message ?>
            <form method="POST" action="">
                <label for="nombre_usuario">Nombre de usuario:</label>
                <input type="text" id="nombre_usuario" name="nombre_usuario" required>
                <br>
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
                <br>
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" required>
                <br>
                <label for="id_equipo_favorito">Equipo del que sos hincha:</label>
                <!-- 8. Campo autocompletado con datalist -->
                <input list="equipos" id="id_equipo_favorito" name="id_equipo_favorito" required>
                <datalist id="equipos">
                    <?php foreach($equipos as $equipo): ?>
                        <option value="<?= htmlspecialchars($equipo['nombre']) ?>"></option>
                    <?php endforeach; ?>
                </datalist>
                <br>
                <button type="submit" id="boton">Registrarse</button>
            </form>
            <p>¿Ya tenés cuenta? <a href="Inicio-sesion-html.php">Iniciar sesión</a></p>
        </div>
        <div class="imagen">
            <img src="./img/logo343.jpeg" alt="Logo 343">
        </div>
    </div>
</body>
</html>