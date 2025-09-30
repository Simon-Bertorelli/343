<?php
include __DIR__ . '/../conexion.php';
session_start();

$id_usuario = $_SESSION['id_usuario'] ?? 1;
$id_publicacion = $_GET['id'] ?? 0;
$id_grupo = $_GET['id_grupo'] ?? 0;

if($id_publicacion && $id_grupo){
    $_SESSION['parent_id'] = $id_publicacion;
    header("Location: foro.php?id_grupo=$id_grupo");
    exit;
}
?>
