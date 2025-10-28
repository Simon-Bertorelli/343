<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
    
    echo "<ul>"; 
    while ($pub = $result->fetch_assoc()) {
        echo "<li>"; 
        echo "<b>" . htmlspecialchars($pub['nombre_usuario']) . "</b> (" . $pub['fecha'] . ")<br>";
        echo "<p class='contenido-publicacion'>" . nl2br(htmlspecialchars($pub['contenido'])) . "</p>";
        
        // Interacciones (Likes y Responder)
        echo "<div class='interacciones'>";
        echo "<span id='likes_count_" . $pub['id_publicacion'] . "'>👍 " . $pub['likes'] . "</span> | ";
        echo "<a href='#' onclick='darLike(" . $pub['id_publicacion'] . ", " . $id_grupo . "); return false;'>Like/Unlike</a> | ";
        echo "<a href='#' onclick='responder(" . $pub['id_publicacion'] . ")'>Responder</a>";
        echo "</div>";

        mostrar_publicaciones($conexion, $id_grupo, $pub['id_publicacion']);
        echo "</li>";
    }
    echo "</ul>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Foro - 343</title>
<link rel="icon" href="../img/343-logo.png" type="image/png">
<link rel="stylesheet" href="../css/foro.css"> 

<script>
    // --- FUNCIÓN PARA RESPONDER ---
    function responder(id_publicacion){
        document.getElementById('parent_id').value = id_publicacion;
        document.getElementById('contenido').focus();
    }

    // --- FUNCIÓN AJAX PARA DAR/QUITAR LIKE ---
    function darLike(id_publicacion, id_grupo) {
        let url = '../like.php?id=' + id_publicacion + '&id_grupo=' + id_grupo;
        
        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error al procesar el like.');
                }
                return response.text(); 
            })
            .then(newLikesCount => {
                let likeElement = document.getElementById('likes_count_' + id_publicacion);
                if (likeElement) {
                    likeElement.textContent = '👍 ' + newLikesCount.trim();
                }
            })
            .catch(error => {
                console.error('Error al dar like:', error);
                alert('Hubo un error al dar like. Revisa la consola.');
            });
    }
</script>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <div class="nav-links">
            <a href="../logout.php">Cerrar sesión</a>
            <a href="grupos.php">Volver a Grupos</a>
        </div>
        
        <h2>Nuevo mensaje</h2>
        <form method="POST" class="form-publicar">
            <textarea id="contenido" name="contenido" placeholder="Escribe algo..." required></textarea>
            <input type="hidden" id="parent_id" name="parent_id" value="">
            <button type="submit" name="publicar" class="btn-publicar">Publicar</button>
        </form>

        <h2>Publicaciones del grupo</h2>
        <div class="publicaciones-container">
            <?php mostrar_publicaciones($conexion, $id_grupo); ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>