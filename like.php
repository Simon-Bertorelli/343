<?php
session_start();
include __DIR__ . '/conexion.php';

// Verificar que el usuario esté logueado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: Inicio-sesion-html.php");
    exit;
}

$id_usuario = $_SESSION['usuario_id'];
$id_publicacion = $_GET['id'] ?? null;
$id_grupo = $_GET['id_grupo'] ?? null;

// Validar parámetros
if (!$id_publicacion || !$id_grupo) {
    header("Location: views/grupos.php"); // si falta algo, ir al listado de grupos
    exit;
}

// Verificar si ya existe un like de este usuario en esta publicación
$check = $conexion->prepare("
    SELECT * FROM reaccion 
    WHERE tipo = 'like' AND id_usuario = ? AND tipo_objeto = 'publicacion' AND id_objeto = ?
");
$check->bind_param("ii", $id_usuario, $id_publicacion);
$check->execute();
$result = $check->get_result();

if ($result->num_rows == 0) {
    // Insertar like
    $insert = $conexion->prepare("
        INSERT INTO reaccion (tipo, id_usuario, tipo_objeto, id_objeto) 
        VALUES ('like', ?, 'publicacion', ?)
    ");
    $insert->bind_param("ii", $id_usuario, $id_publicacion);
    $insert->execute();
    $insert->close();
}

$check->close();

// Redirigir de nuevo al foro del grupo correspondiente
header("Location: views/foro.php?id_grupo=$id_grupo");
exit;
?>
