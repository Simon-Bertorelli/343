<?php
session_start();
include __DIR__ . '/conexion.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_usuario = trim($_POST['nombre_usuario'] ?? '');
    $contrasena = $_POST['contrasena'] ?? '';

    if ($nombre_usuario && $contrasena) {
        $stmt = $conexion->prepare("SELECT id_usuario, nombre_usuario, contrasena, email FROM usuario WHERE nombre_usuario=?");
        $stmt->bind_param("s", $nombre_usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($contrasena, $user['contrasena'])) {
                session_regenerate_id(true);
                $_SESSION['usuario_id'] = $user['id_usuario'];
                $_SESSION['usuario_nombre'] = $user['nombre_usuario'];
                $_SESSION['usuario_email'] = $user['email'];
                header("Location: views/main.php");
                exit;
            } else {
                $message = "Usuario o contraseña incorrectos.";
            }
        } else {
            $message = "Usuario o contraseña incorrectos.";
        }
        $stmt->close();
    } else {
        $message = "Todos los campos son obligatorios.";
    }
}
?>
