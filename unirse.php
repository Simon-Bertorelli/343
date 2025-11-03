<?php
session_start();
// Asegúrate de que esta ruta a 'conexion.php' sea correcta
include __DIR__ . '/conexion.php'; 

// 1. Verificar Sesión
if (!isset($_SESSION['usuario_id']) || empty($_SESSION['usuario_id'])) {
    header("Location: Inicio-sesion-html.php");
    exit;
}

$id_usuario = $_SESSION['usuario_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id_grupo'])) {
    $id_grupo = intval($_POST['id_grupo']);

    // 2. Verificar si ya pertenece al grupo (Consulta Preparada)
    $stmt_check = $conexion->prepare("SELECT 1 FROM usuario_grupo WHERE id_usuario = ? AND id_grupo = ?");
    $stmt_check->bind_param("ii", $id_usuario, $id_grupo);
    $stmt_check->execute();
    $check_result = $stmt_check->get_result();
    
    if ($check_result->num_rows == 0) {
        // 3. Insertar en el grupo (Consulta Preparada y Segura)
        // La tabla solo tiene id_usuario y id_grupo ("ii" = dos enteros)
        $stmt_insert = $conexion->prepare("INSERT INTO usuario_grupo (id_usuario, id_grupo) VALUES (?, ?)");
        $stmt_insert->bind_param("ii", $id_usuario, $id_grupo);
        
        if (!$stmt_insert->execute()) {
             // Manejo de errores si, por ejemplo, el ID del grupo no existe.
             error_log("Fallo al insertar en usuario_grupo: " . $stmt_insert->error);
             die("Error al unirse al grupo. Código de error: " . $stmt_insert->error); 
        }
        $stmt_insert->close();
    }
    $stmt_check->close();

    // Redirigir al foro del grupo recién unido
    header("Location: views/grupos.php");
    exit;
}

// Si alguien entra directamente sin POST
header("Location: views/grupos.php");
exit;
?>