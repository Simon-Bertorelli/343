<?php
session_start();
include __DIR__ . '/../conexion.php';

// Verificar sesión
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../Inicio-sesion-html.php");
    exit;
}

$id_usuario = $_SESSION['usuario_id'];
$id_grupo = intval($_GET['id_grupo'] ?? 0);

// Verificar que el usuario pertenece al grupo
$check = $conexion->query("SELECT * FROM usuario_grupo WHERE id_usuario=$id_usuario AND id_grupo=$id_grupo");
if ($check->num_rows == 0) {
    header("Location: grupos.php");
    exit;
}

// Publicar mensaje
if (isset($_POST['publicar'])) {
    $contenido = $conexion->real_escape_string($_POST['contenido']);
    $parent_id = isset($_POST['parent_id']) && $_POST['parent_id'] !== '' ? intval($_POST['parent_id']) : "NULL";
    $conexion->query("INSERT INTO publicacion (contenido, id_usuario, id_grupo, parent_id) VALUES ('$contenido', $id_usuario, $id_grupo, $parent_id)");
    header("Location: foro.php?id_grupo=$id_grupo");
    exit;
}

// Función recursiva para mostrar publicaciones
function mostrar_publicaciones($conexion, $id_grupo, $parent_id = NULL) {
    $parent_sql = is_null($parent_id) ? "IS NULL" : "= $parent_id";

    $result = $conexion->query("
        SELECT p.*, u.nombre_usuario,
        (SELECT COUNT(*) FROM reaccion r WHERE r.tipo_objeto='publicacion' AND r.id_objeto=p.id_publicacion AND r.tipo='like') AS likes
        FROM publicacion p
        INNER JOIN usuario u ON p.id_usuario = u.id_usuario
        WHERE p.id_grupo = $id_grupo AND p.parent_id $parent_sql
        ORDER BY p.fecha DESC
    ");

    echo "<ul style='list-style:none; padding-left:20px;'>";
    while ($pub = $result->fetch_assoc()) {
        echo "<li style='border:1px solid #ccc; margin:5px; padding:10px; border-radius:8px;'>";
        echo "<b>" . htmlspecialchars($pub['nombre_usuario']) . "</b> (" . $pub['fecha'] . ")<br>";
        echo nl2br(htmlspecialchars($pub['contenido'])) . "<br>";
        echo "👍 " . $pub['likes'] . " | ";
        echo "<a href='#' onclick='responder(" . $pub['id_publicacion'] . ")'>Responder</a> | ";
        echo "<a href='../like.php?id=" . $pub['id_publicacion'] . "&id_grupo=$id_grupo'>Like</a>";
        mostrar_publicaciones($conexion, $id_grupo, $pub['id_publicacion']);
        echo "</li>";
    }
    echo "</ul>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Foro del Grupo</title>
<style>
textarea { width:100%; height:80px; padding:8px; }
button { padding:8px 12px; margin-top:5px; cursor:pointer; }
</style>
<script>
function responder(id_publicacion){
    document.getElementById('parent_id').value = id_publicacion;
    document.getElementById('contenido').focus();
}
</script>
</head>
<body>
<a href="../logout.php">Cerrar sesión</a>
<a href="grupos.php">volver</a>
<h2>Nuevo mensaje</h2>
<form method="POST">
    <textarea id="contenido" name="contenido" placeholder="Escribe algo..." required></textarea>
    <input type="hidden" id="parent_id" name="parent_id" value="">
    <button type="submit" name="publicar">Publicar</button>
</form>

<h2>Publicaciones del grupo</h2>
<?php mostrar_publicaciones($conexion, $id_grupo); ?>
</body>
</html>
