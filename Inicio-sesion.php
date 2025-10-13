<?php
session_start();
include __DIR__ . '/conexion.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_usuario = trim($_POST['nombre_usuario'] ?? '');
    $contrasena = $_POST['contrasena'] ?? '';

    if ($nombre_usuario && $contrasena) {
        // MODIFICACIÓN: Se agrega 'rol' a la consulta SELECT
        $stmt = $conexion->prepare("SELECT id_usuario, nombre_usuario, contrasena, email, rol FROM usuario WHERE nombre_usuario=?");
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
                
                // NUEVO: Almacenar el rol del usuario en la sesión
                $_SESSION['usuario_rol'] = $user['rol']; 
                
                // Opcional: Redirigir al admin a la página CRUD, si no, va a main.php
                if ($user['rol'] === 'admin') {
                    header("Location: views/main.php"); // Redirige al CRUD
                } else {
                    header("Location: views/main.php"); // Redirige a la página principal
                }
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