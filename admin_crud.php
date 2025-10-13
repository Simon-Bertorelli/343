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

// Crear el directorio de subida si no existe
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

// --- FUNCIONES AUXILIARES DE IMAGEN ---

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

// --- CRUD DE NOTICIAS ---

// A. DELETE NOTICIA
if (isset($_GET['action']) && $_GET['action'] == 'delete_noticia' && isset($_GET['id'])) {
    $id_noticia = intval($_GET['id']);
    
    // 1. Obtener la ruta de la imagen antes de eliminar la noticia
    $stmt_select = $conexion->prepare("SELECT imagen_url FROM noticia WHERE id_noticia = ?");
    $stmt_select->bind_param("i", $id_noticia);
    $stmt_select->execute();
    $result = $stmt_select->get_result();
    $noticia = $result->fetch_assoc();
    $stmt_select->close();

    // 2. Eliminar la noticia
    $stmt_delete = $conexion->prepare("DELETE FROM noticia WHERE id_noticia = ?");
    $stmt_delete->bind_param("i", $id_noticia);
    if ($stmt_delete->execute()) {
        // 3. Si la noticia fue eliminada, borrar también la imagen del servidor
        if ($noticia && $noticia['imagen_url'] && file_exists($noticia['imagen_url'])) {
            unlink($noticia['imagen_url']);
        }
        $message = "<p class='success'>Noticia eliminada con éxito.</p>";
    } else {
        $message = "<p class='error'>Error al eliminar noticia: " . $conexion->error . "</p>";
    }
    $stmt_delete->close();
}

// B. CREATE NOTICIA
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_noticia'])) {
    $titulo = trim($_POST['titulo']);
    $contenido = trim($_POST['contenido']);
    $fuente = trim($_POST['fuente']);
    $imagen_url = null;
    $error_imagen = '';

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
        $upload_result = subir_imagen($_FILES['imagen'], $upload_dir);
        if (is_string($upload_result) && strpos($upload_result, 'Error:') === 0) {
            $error_imagen = $upload_result;
        } else {
            $imagen_url = $upload_result;
        }
    }

    if ($error_imagen) {
        $message = "<p class='error'>" . $error_imagen . "</p>";
    } elseif ($titulo && $contenido && $fuente) {
        $stmt = $conexion->prepare("INSERT INTO noticia (titulo, contenido, imagen_url, fuente) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $titulo, $contenido, $imagen_url, $fuente);
        if ($stmt->execute()) {
            $message = "<p class='success'>Noticia creada con éxito.</p>";
        } else {
            $message = "<p class='error'>Error al crear noticia: " . $conexion->error . "</p>";
        }
        $stmt->close();
    } else {
        $message = "<p class='error'>Faltan campos obligatorios para crear la noticia.</p>";
    }
}

// C. READ NOTICIA: Obtener todas las noticias para la tabla
$noticias_result = $conexion->query("
    SELECT id_noticia, titulo, contenido, imagen_url, fuente, fecha 
    FROM noticia 
    ORDER BY fecha DESC
");

// --- E. CREATE EQUIPO ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_equipo'])) {
    $nombre = trim($_POST['nombre']);
    $formacion = trim($_POST['formacion']);
    $id_liga = intval($_POST['id_liga']);

    if ($nombre && $formacion && $id_liga > 0) {
        $stmt = $conexion->prepare("INSERT INTO equipo (nombre, formacion, id_liga) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $nombre, $formacion, $id_liga); 
        
        if ($stmt->execute()) {
            $message = "<p class='success'>Equipo creado con éxito.</p>";
        } else {
            // Este error puede ocurrir si id_liga no existe (Foreign Key constraint)
            $message = "<p class='error'>Error al crear equipo: Verifique que el ID de Liga exista. Detalle: " . $conexion->error . "</p>";
        }
        $stmt->close();
    } else {
        $message = "<p class='error'>Faltan campos obligatorios o el ID de Liga es inválido.</p>";
    }
}

// --- F. DELETE EQUIPO ---
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id_equipo = intval($_GET['id']);
    
    // 1. Eliminar el equipo
    $stmt_delete = $conexion->prepare("DELETE FROM equipo WHERE id_equipo = ?");
    $stmt_delete->bind_param("i", $id_equipo);
    
    if ($stmt_delete->execute()) {
        $message = "<p class='success'>Equipo eliminado con éxito.</p>";
    } else {
        $message = "<p class='error'>Error al eliminar equipo: " . $conexion->error . "</p>";
    }
    $stmt_delete->close();
}

// -------------------------------------------------------------------------------------
// D. READ: Obtener todos los equipos para la tabla... (Esta línea ya la tenías, déjala)
// -------------------------------------------------------------------------------------
// D. READ: Obtener todos los equipos para la tabla (código original)
$equipos_result = $conexion->query("
    SELECT e.id_equipo, e.nombre, e.formacion, l.nombre AS nombre_liga 
    FROM equipo e 
    LEFT JOIN liga l ON e.id_liga = l.id_liga
    ORDER BY e.id_equipo ASC
");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración - CRUD</title>
    <link rel="stylesheet" href="./css/admin_crud.css"> 
</head>
<body>
    
    <div class="container">
        <h1>⚙️ Panel de Administración</h1>
        <div class="nav-links">
            <a href="./views/main.php">Ir a la Web Principal</a> <a href="logout.php">Cerrar Sesión</a>
        </div>
        
        <?= $message ?>

        <div class="crud-section" id="noticias">
            <h2>📰 CRUD de Noticias</h2>
            
            <div class="form-section">
                <h3>Crear Nueva Noticia</h3>
                <form method="POST" enctype="multipart/form-data"> <div class="form-group">
                        <label for="titulo">Título:</label>
                        <input type="text" name="titulo" id="titulo" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="contenido">Contenido:</label>
                        <textarea name="contenido" id="contenido" rows="5" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="fuente">Fuente:</label>
                        <input type="text" name="fuente" id="fuente" required>
                    </div>

                    <div class="form-group">
                        <label for="imagen">Imagen (JPG, PNG, GIF):</label>
                        <input type="file" name="imagen" id="imagen" accept="image/*" required>
                    </div>
                    
                    <button type="submit" name="create_noticia" class="btn-primary">Publicar Noticia</button>
                </form>
            </div>

            <hr>

            <div class="table-section">
                <h3>Lista de Noticias</h3>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Imagen</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($noticia = $noticias_result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($noticia['id_noticia']) ?></td>
                            <td><?= htmlspecialchars(substr($noticia['titulo'], 0, 50)) ?>...</td>
                            <td>
                                <?php if ($noticia['imagen_url']): ?>
                                    <img src="<?= htmlspecialchars($noticia['imagen_url']) ?>" alt="Imagen Noticia" style="width: 100px; height: auto;">
                                <?php else: ?>
                                    Sin imagen
                                <?php endif; ?>
                            </td>
                            <td><?= date("d/m/Y H:i", strtotime($noticia['fecha'])) ?></td>
                            <td class="actions">
                                <a href="edit_noticia.php?id=<?= $noticia['id_noticia'] ?>" class="btn-secondary">Editar</a> 
                                <a href="?action=delete_noticia&id=<?= $noticia['id_noticia'] ?>" class="btn-danger" 
                                   onclick="return confirm('¿Seguro de eliminar la noticia: <?= htmlspecialchars($noticia['titulo']) ?>?');">Eliminar</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <hr style="margin: 50px 0;">

        <div class="crud-section" id="equipos">
            <h2>⚽ CRUD de Equipos</h2>
            <div class="form-section">
                <h3>Crear Nuevo Equipo</h3>
                <form method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="formacion">Formación:</label>
                        <input type="text" name="formacion" id="formacion" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="id_liga">ID Liga:</label>
                        <input type="number" name="id_liga" id="id_liga" required>
                    </div>
                    
                    <button type="submit" name="create_equipo" class="btn-primary">Crear Equipo</button>
                </form>
            </div>

            <hr>

            <div class="table-section">
                <h3>Lista de Equipos</h3>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Formación</th>
                            <th>Liga</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($equipo = $equipos_result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($equipo['id_equipo']) ?></td>
                            <td><?= htmlspecialchars($equipo['nombre']) ?></td>
                            <td><?= htmlspecialchars($equipo['formacion']) ?></td>
                            <td><?= htmlspecialchars($equipo['nombre_liga']) ?></td>
                            <td class="actions">
                                <a href="edit_equipo.php?id=<?= $equipo['id_equipo'] ?>" class="btn-secondary">Editar</a>
                                <a href="?action=delete&id=<?= $equipo['id_equipo'] ?>" class="btn-danger" 
                                   onclick="return confirm('¿Estás seguro de que quieres eliminar <?= htmlspecialchars($equipo['nombre']) ?>?');">Eliminar</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>