<?php
session_start();
include __DIR__ . '/conexion.php'; // Conexión a la DB

if (!isset($_SESSION['usuario_id'])) {
    header("Location: Inicio-sesion-html.php");
    exit;
}

$id_usuario = $_SESSION['usuario_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id_grupo'])) {
    $id_grupo = intval($_POST['id_grupo']);

    // Verificar si ya pertenece al grupo
    $check = $conexion->query("SELECT * FROM usuario_grupo WHERE id_usuario=$id_usuario AND id_grupo=$id_grupo");
    if ($check->num_rows == 0) {
        $conexion->query("INSERT INTO usuario_grupo (id_usuario, id_grupo) VALUES ($id_usuario, $id_grupo)");
    }

    // Redirigir de vuelta a la página de grupos
    header("Location: views/grupos.php");
    exit;
}

// Si alguien entra directamente sin POST
header("Location: views/grupos.php");
exit;
?>
