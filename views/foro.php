<?php
// Habilitar la visualización de errores para debugging (se debe deshabilitar en producción)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
// Asegúrate de que esta ruta a tu archivo de conexión sea correcta
include __DIR__ . '/../conexion.php'; 

// === 1. VERIFICACIÓN DE SESIÓN Y VARIABLES ===
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../Inicio-sesion-html.php");
    exit;
}

$id_usuario = $_SESSION['usuario_id'];
$id_grupo = intval($_GET['id_grupo'] ?? 0);

// === 2. VERIFICAR PERTENENCIA AL GRUPO (CONSULTA PREPARADA) ===
// Revisa si el usuario pertenece al grupo antes de permitirle ver el foro.
$stmt_check = $conexion->prepare("SELECT 1 FROM usuario_grupo WHERE id_usuario = ? AND id_grupo = ?");
$stmt_check->bind_param("ii", $id_usuario, $id_grupo);
$stmt_check->execute();
$check = $stmt_check->get_result();

if ($check->num_rows == 0) {
    // Si no es miembro, redirige a grupos.php
    header("Location: grupos.php");
    exit;
}
$stmt_check->close();


// === 3. PUBLICAR MENSAJE (CONSULTA PREPARADA) ===
if (isset($_POST['publicar'])) {
    $contenido = $_POST['contenido'];
    
    // Determina si es una respuesta o una publicación principal
    $parent_id_input = isset($_POST['parent_id']) && $_POST['parent_id'] !== '' ? intval($_POST['parent_id']) : NULL;

    // Lógica para manejar la inserción de NULL o un ID numérico para parent_id
    if (is_null($parent_id_input)) {
        // Inserción sin parent_id (es decir, parent_id es NULL)
        $sql = "INSERT INTO publicacion (contenido, id_usuario, id_grupo, parent_id) VALUES (?, ?, ?, NULL)";
        $stmt_pub = $conexion->prepare($sql);
        // "sii" -> string, integer, integer
        $stmt_pub->bind_param("sii", $contenido, $id_usuario, $id_grupo);
    } else {
        // Inserción con parent_id (es una respuesta)
        $sql = "INSERT INTO publicacion (contenido, id_usuario, id_grupo, parent_id) VALUES (?, ?, ?, ?)";
        $stmt_pub = $conexion->prepare($sql);
        // "siii" -> string, integer, integer, integer
        $stmt_pub->bind_param("siii", $contenido, $id_usuario, $id_grupo, $parent_id_input);
    }

    if (!$stmt_pub->execute()) {
        error_log("Error al insertar publicación: " . $stmt_pub->error);
        // Manejo de error si la inserción falla
    }
    
    $stmt_pub->close();
    header("Location: foro.php?id_grupo=$id_grupo");
    exit;
}


// === 4. FUNCIÓN RECURSIVA PARA MOSTRAR PUBLICACIONES (CONSULTA PREPARADA) ===
function mostrar_publicaciones($conexion, $id_grupo, $parent_id = NULL) {
    
    // Consulta SQL con placeholders (?)
    $sql_base = "
        SELECT p.*, u.nombre_usuario,
        (SELECT COUNT(*) FROM reaccion r WHERE r.tipo_objeto='publicacion' AND r.id_objeto=p.id_publicacion AND r.tipo='like') AS likes
        FROM publicacion p
        INNER JOIN usuario u ON p.id_usuario = u.id_usuario
        WHERE p.id_grupo = ? 
    ";

    // Modifica la consulta y el orden según si es post principal o respuesta
    if (is_null($parent_id)) {
        // Post principal: parent_id es NULL
        $sql = $sql_base . " AND p.parent_id IS NULL ORDER BY p.fecha DESC";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $id_grupo);
    } else {
        // Respuestas: parent_id es el ID de la publicación padre
        $sql = $sql_base . " AND p.parent_id = ? ORDER BY p.fecha ASC";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ii", $id_grupo, $parent_id);
    }

    if (!$stmt->execute()) {
        error_log("Error en la consulta de publicaciones: " . $stmt->error);
        return; // Detiene la ejecución si hay error
    }
    
    $result = $stmt->get_result();
    
    echo "<ul class='lista-publicaciones'>"; 
    while ($pub = $result->fetch_assoc()) {
        echo "<li class='publicacion-item'>"; 
        echo "<b>" . htmlspecialchars($pub['nombre_usuario']) . "</b> <span class='fecha-pub'>(" . $pub['fecha'] . ")</span><br>";
        echo "<p class='contenido-publicacion'>" . nl2br(htmlspecialchars($pub['contenido'])) . "</p>";
        
        // Interacciones (Likes y Responder)
        echo "<div class='interacciones'>";
        echo "<span id='likes_count_" . $pub['id_publicacion'] . "' class='like-counter'>👍 " . $pub['likes'] . "</span> | ";
        echo "<a href='#' onclick='darLike(" . $pub['id_publicacion'] . ", " . $id_grupo . "); return false;' class='btn-like'>Me gusta</a> | ";
        echo "<a href='#' onclick='responder(" . $pub['id_publicacion'] . ")' class='btn-responder'>Responder</a>";
        echo "</div>";

        // Llamada recursiva para mostrar respuestas
        mostrar_publicaciones($conexion, $id_grupo, $pub['id_publicacion']);
        echo "</li>";
    }
    echo "</ul>";
    
    $stmt->close();
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
        // Establece el ID de la publicación padre en el campo oculto
        document.getElementById('parent_id').value = id_publicacion;
        document.getElementById('contenido').focus();
    }

    // --- FUNCIÓN AJAX PARA DAR/QUITAR LIKE ---
    function darLike(id_publicacion, id_grupo) {
        // Nota: El archivo like.php debe ser modificado para usar consultas preparadas.
        let url = '../like.php?id=' + id_publicacion + '&id_grupo=' + id_grupo;
        
        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error al procesar el like.');
                }
                return response.text(); 
            })
            .then(newLikesCount => {
                // Actualiza el contador de likes en la interfaz
                let likeElement = document.getElementById('likes_count_' + id_publicacion);
                if (likeElement) {
                    likeElement.textContent = '👍 ' + newLikesCount.trim();
                }
            })
            .catch(error => {
                console.error('Error al dar like:', error);
                alert('Hubo un error al dar like. Revisa la consola para más detalles.');
            });
    }
</script>
</head>
<body>
    <?php include 'header.php'; // Asegúrate de que 'header.php' exista ?>
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
    <?php include 'footer.php'; // Asegúrate de que 'footer.php' exista ?>
</body>
</html>