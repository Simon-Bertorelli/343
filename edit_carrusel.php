<?php
session_start();
include __DIR__ . '/conexion.php'; // Asegúrate que la ruta a tu archivo de conexión sea correcta

// --- VERIFICACIÓN DE ACCESO DE ADMINISTRADOR ---
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_rol'] !== 'admin') {
    die("⛔ Acceso Denegado. Esta área es solo para administradores.");
}
// --------------------------------------------------

$message = '';
$upload_dir_slide = 'uploads/carrusel/';

// Crear el directorio de subida si no existe
if (!is_dir($upload_dir_slide)) {
    mkdir($upload_dir_slide, 0777, true);
}

// --- FUNCIÓN AUXILIAR DE IMAGEN (Debe ser la misma que en admin.php) ---
function subir_imagen($file, $upload_dir) {
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return null; // No hay archivo o error de subida
    }

    $nombre_original = basename($file["name"]);
    $tipo_archivo = strtolower(pathinfo($nombre_original, PATHINFO_EXTENSION));
    
    // Generar un nombre único para evitar colisiones
    $nombre_final = uniqid('img_', true) . '.' . $tipo_archivo;
    $target_file = $upload_dir . $nombre_final;

    // Verificar tipo de archivo (solo imágenes)
    if (!in_array($tipo_archivo, ['jpg', 'jpeg', 'png', 'gif'])) {
        return "Error: Solo se permiten archivos JPG, JPEG, PNG y GIF.";
    }

    // Mover el archivo subido
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        return $target_file; // Devuelve la URL/ruta de la imagen guardada
    } else {
        return "Error: Hubo un problema al subir la imagen.";
    }
}
// -----------------------------------------------------------------------

// 1. Obtener ID del slide de la URL
if (!isset($_GET['id']) || !($id_slide = intval($_GET['id']))) {
    die("❌ ID de Slide no especificado o inválido.");
}

// 2. Obtener datos actuales del slide
$stmt_select = $conexion->prepare("SELECT id_slide, titulo, contenido, imagen_url, orden, activo FROM carrusel_slide WHERE id_slide = ?");
$stmt_select->bind_param("i", $id_slide);
$stmt_select->execute();
$result = $stmt_select->get_result();
$slide = $result->fetch_assoc();
$stmt_select->close();

if (!$slide) {
    die("Slide no encontrado.");
}

// 3. Procesar el formulario de edición (UPDATE)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_slide'])) {
    $titulo_nuevo = trim($_POST['titulo_slide']);
    $contenido_nuevo = trim($_POST['contenido_slide']);
    $orden_nuevo = intval($_POST['orden']);
    $activo_nuevo = isset($_POST['activo']) ? 1 : 0;
    $imagen_url_nueva = $slide['imagen_url']; // Mantener la imagen actual por defecto
    $error_imagen = '';

    // Lógica para el manejo de la nueva imagen
    if (isset($_FILES['imagen_slide']) && $_FILES['imagen_slide']['error'] == UPLOAD_ERR_OK) {
        $upload_result = subir_imagen($_FILES['imagen_slide'], $upload_dir_slide);
        
        if (is_string($upload_result) && strpos($upload_result, 'Error:') === 0) {
            $error_imagen = $upload_result;
        } else {
            // Se subió una nueva imagen con éxito
            $imagen_url_nueva = $upload_result;
            
            // Borrar la imagen antigua si existe y es diferente a la nueva
            if ($slide['imagen_url'] && file_exists($slide['imagen_url']) && $slide['imagen_url'] !== $imagen_url_nueva) {
                unlink($slide['imagen_url']);
            }
        }
    }

    if ($error_imagen) {
        $message = "<p class='error'>" . $error_imagen . "</p>";
    } elseif ($titulo_nuevo && $contenido_nuevo) {
        // Actualizar la base de datos
        $stmt_update = $conexion->prepare("UPDATE carrusel_slide SET titulo = ?, contenido = ?, imagen_url = ?, orden = ?, activo = ? WHERE id_slide = ?");
        $stmt_update->bind_param("sssiis", $titulo_nuevo, $contenido_nuevo, $imagen_url_nueva, $orden_nuevo, $activo_nuevo, $id_slide);
        
        if ($stmt_update->execute()) {
            $message = "<p class='success'>Slide de Carrusel **actualizado** con éxito.</p>";
            // Refrescar los datos del slide después de la actualización exitosa
            $slide['titulo'] = $titulo_nuevo;
            $slide['contenido'] = $contenido_nuevo;
            $slide['imagen_url'] = $imagen_url_nueva;
            $slide['orden'] = $orden_nuevo;
            $slide['activo'] = $activo_nuevo;
        } else {
            $message = "<p class='error'>Error al actualizar slide: " . $conexion->error . "</p>";
        }
        $stmt_update->close();
    } else {
        $message = "<p class='error'>Faltan campos obligatorios para actualizar el slide.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Slide #<?= $slide['id_slide'] ?></title>
    <link rel="stylesheet" href="./css/admin_crud.css"> </head>
<body>
    
    <div class="container">
        <h1>✏️ Editar Slide de Carrusel #<?= $slide['id_slide'] ?></h1>
        <div class="nav-links">
            <a href="admin_crud.php">← Volver al Panel Principal</a>
        </div>
        
        <?= $message ?>

        <div class="form-section">
            <h3>Datos del Slide</h3>
            <form method="POST" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label for="titulo_slide">Título/Encabezado:</label>
                    <input type="text" name="titulo_slide" id="titulo_slide" value="<?= htmlspecialchars($slide['titulo']) ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="contenido_slide">Contenido/Texto:</label>
                    <textarea name="contenido_slide" id="contenido_slide" rows="3" required><?= htmlspecialchars($slide['contenido']) ?></textarea>
                </div>
                
                <div class="form-group">
                    <label for="orden">Orden (Número):</label>
                    <input type="number" name="orden" id="orden" value="<?= htmlspecialchars($slide['orden']) ?>">
                </div>

                <div class="form-group checkbox-group">
                    <label for="activo">Activo:</label>
                    <input type="checkbox" name="activo" id="activo" value="1" <?= $slide['activo'] ? 'checked' : '' ?>>
                </div>

                <div class="form-group">
                    <label for="imagen_slide">Cambiar Imagen (JPG, PNG, GIF):</label>
                    <input type="file" name="imagen_slide" id="imagen_slide" accept="image/*">
                    <p class="current-image-info">
                        Imagen actual: <?php if ($slide['imagen_url']): ?>
                            <img src="<?= htmlspecialchars($slide['imagen_url']) ?>" alt="Imagen Actual" style="width: 150px; height: auto; display: block; margin-top: 10px;">
                            <small>Ruta: <?= htmlspecialchars($slide['imagen_url']) ?></small>
                        <?php else: ?>
                            *Sin imagen cargada.*
                        <?php endif; ?>
                    </p>
                </div>
                
                <button type="submit" name="edit_slide" class="btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>

</body>
</html>