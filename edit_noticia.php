<?php
session_start();
include __DIR__ . '/conexion.php';

// --- VERIFICACIÓN DE ACCESO DE ADMINISTRADOR ---
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_rol'] !== 'admin') {
    die("⛔ Acceso Denegado. Esta área es solo para administradores.");
}
// --------------------------------------------------

$message = '';
$upload_dir = 'uploads/noticias/';
$id_noticia = isset($_GET['id']) ? intval($_GET['id']) : (isset($_POST['id_noticia']) ? intval($_POST['id_noticia']) : 0);
$noticia = null;

// --- FUNCIONES AUXILIARES DE IMAGEN (Copiadas desde admin_crud.php) ---

function subir_imagen($file, $upload_dir) {
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return null; // No hay archivo o error de subida
    }

    $nombre_original = basename($file["name"]);
    $tipo_archivo = strtolower(pathinfo($nombre_original, PATHINFO_EXTENSION));
    $nombre_final = uniqid('img_', true) . '.' . $tipo_archivo;
    $target_file = $upload_dir . $nombre_final;

    if (!in_array($tipo_archivo, ['jpg', 'jpeg', 'png', 'gif'])) {
        return "Error: Solo se permiten archivos JPG, JPEG, PNG y GIF.";
    }

    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        return $target_file;
    } else {
        return "Error: Hubo un problema al subir la imagen.";
    }
}

// -----------------------------------------------------------------

// A. PROCESAR LA ACTUALIZACIÓN (UPDATE)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_noticia'])) {
    $id_noticia = intval($_POST['id_noticia']);
    $titulo = trim($_POST['titulo']);
    $contenido = trim($_POST['contenido']);
    $fuente = trim($_POST['fuente']);
    $imagen_url = $_POST['current_imagen_url'] ?? null; // Mantener la imagen actual por defecto
    $error_imagen = '';

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
        $upload_result = subir_imagen($_FILES['imagen'], $upload_dir);
        
        if (is_string($upload_result) && strpos($upload_result, 'Error:') === 0) {
            $error_imagen = $upload_result;
        } else {
            // Eliminar la imagen anterior si existe y se subió una nueva
            if ($imagen_url && file_exists($imagen_url)) {
                unlink($imagen_url);
            }
            $imagen_url = $upload_result;
        }
    } elseif (isset($_POST['delete_current_image']) && $_POST['delete_current_image'] == '1') {
        // Opción de eliminar solo la imagen
        if ($imagen_url && file_exists($imagen_url)) {
            unlink($imagen_url);
        }
        $imagen_url = null;
    }

    if ($error_imagen) {
        $message = "<p class='error'>" . $error_imagen . "</p>";
    } elseif ($id_noticia > 0 && $titulo && $contenido && $fuente) {
        $stmt = $conexion->prepare("UPDATE noticia SET titulo = ?, contenido = ?, imagen_url = ?, fuente = ? WHERE id_noticia = ?");
        $stmt->bind_param("ssssi", $titulo, $contenido, $imagen_url, $fuente, $id_noticia);
        
        if ($stmt->execute()) {
            $message = "<p class='success'>Noticia actualizada con éxito. <a href='admin_crud.php'>Volver al panel</a></p>";
        } else {
            $message = "<p class='error'>Error al actualizar noticia: " . $conexion->error . "</p>";
        }
        $stmt->close();
    } else {
        $message = "<p class='error'>Faltan campos obligatorios para actualizar la noticia.</p>";
    }
}

// B. OBTENER LOS DATOS DE LA NOTICIA A EDITAR
if ($id_noticia > 0) {
    $stmt = $conexion->prepare("SELECT id_noticia, titulo, contenido, imagen_url, fuente FROM noticia WHERE id_noticia = ?");
    $stmt->bind_param("i", $id_noticia);
    $stmt->execute();
    $result = $stmt->get_result();
    $noticia = $result->fetch_assoc();
    $stmt->close();

    if (!$noticia) {
        die("Error: Noticia no encontrada.");
    }
} else {
    die("Error: ID de noticia no proporcionado.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Noticia - Panel Admin</title>
    <link rel="stylesheet" href="./css/admin_crud.css"> 
</head>
<body>
    <div class="container">
        <h1>✏️ Editar Noticia: <?= htmlspecialchars($noticia['titulo']) ?></h1>
        <div class="nav-links">
            <a href="admin_crud.php">← Volver al Panel</a>
        </div>
        
        <?= $message ?>

        <div class="form-section">
            <h3>Formulario de Edición</h3>
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_noticia" value="<?= htmlspecialchars($noticia['id_noticia']) ?>">
                <input type="hidden" name="current_imagen_url" value="<?= htmlspecialchars($noticia['imagen_url'] ?? '') ?>">

                <div class="form-group">
                    <label for="titulo">Título:</label>
                    <input type="text" name="titulo" id="titulo" value="<?= htmlspecialchars($noticia['titulo']) ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="contenido">Contenido:</label>
                    <textarea name="contenido" id="contenido" rows="10" required><?= htmlspecialchars($noticia['contenido']) ?></textarea>
                </div>
                
                <div class="form-group">
                    <label for="fuente">Fuente:</label>
                    <input type="text" name="fuente" id="fuente" value="<?= htmlspecialchars($noticia['fuente']) ?>" required>
                </div>

                <div class="form-group">
                    <label>Imagen Actual:</label>
                    <?php if ($noticia['imagen_url']): ?>
                        <div class="current-image-preview">
                            <img src="<?= htmlspecialchars($noticia['imagen_url']) ?>" alt="Imagen Actual" style="width: 200px; height: auto; display: block; margin-bottom: 10px; border: 1px solid #ccc;">
                            <input type="checkbox" name="delete_current_image" id="delete_current_image" value="1">
                            <label for="delete_current_image">Marcar para eliminar la imagen actual</label>
                        </div>
                    <?php else: ?>
                        <p>No hay imagen cargada actualmente.</p>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="imagen">Cambiar/Subir Nueva Imagen:</label>
                    <input type="file" name="imagen" id="imagen" accept="image/*">
                    <p class="help-text">Si subes una nueva imagen, reemplazará a la actual (a menos que hayas marcado la opción de eliminar).</p>
                </div>
                
                <button type="submit" name="update_noticia" class="btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>
</body>
</html>