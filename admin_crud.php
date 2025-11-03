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

// --- G. CREATE GRUPO ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_grupo'])) {
    // Usamos 'nombre' que es el nombre REAL de la columna en la BD
    $nombre = trim($_POST['nombre']); 
    // La tabla 'grupo' no tiene 'creador_id' ni 'fecha_creacion' en tu dump,
    // pero tiene 'descripcion' y 'id_equipo'. Si quieres usar el ID del equipo asociado:
    $descripcion = trim($_POST['descripcion']); 
    $id_equipo = intval($_POST['id_equipo']);

    if ($nombre) { // Ya no es necesario creador_id
        // Adaptamos el INSERT a la estructura real de tu tabla: `nombre`, `descripcion`, `id_equipo`
        $stmt = $conexion->prepare("INSERT INTO grupo (nombre, descripcion, id_equipo) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $nombre, $descripcion, $id_equipo);
        
        if ($stmt->execute()) {
            $message = "<p class='success'>Grupo '{$nombre}' creado con éxito.</p>";
        } else {
            $message = "<p class='error'>Error al crear grupo: " . $conexion->error . "</p>";
        }
        $stmt->close();
    } else {
        $message = "<p class='error'>Faltan campos obligatorios para crear el grupo.</p>";
    }
}

// --- H. DELETE GRUPO ---
if (isset($_GET['action']) && $_GET['action'] == 'delete_grupo' && isset($_GET['id'])) {
    $id_grupo = intval($_GET['id']);
    
    $stmt_delete = $conexion->prepare("DELETE FROM grupo WHERE id_grupo = ?");
    $stmt_delete->bind_param("i", $id_grupo);
    
    if ($stmt_delete->execute()) {
        $message = "<p class='success'>Grupo eliminado con éxito.</p>";
    } else {
        $message = "<p class='error'>Error al eliminar grupo: " . $conexion->error . "</p>";
    }
    $stmt_delete->close();
}

// --- I. READ GRUPOS: Obtener todos los grupos para la tabla ---
// CORRECCIÓN: Usamos 'g.nombre AS nombre_grupo' para solucionar el Fatal Error.
$grupos_result = $conexion->query("
    SELECT 
        g.id_grupo, 
        g.nombre AS nombre_grupo, 
        g.descripcion, 
        e.nombre AS nombre_equipo_asociado
    FROM grupo g
    LEFT JOIN equipo e ON g.id_equipo = e.id_equipo
    ORDER BY g.id_grupo ASC
");


// --- J. DELETE USUARIO ---
if (isset($_GET['action']) && $_GET['action'] == 'delete_usuario' && isset($_GET['id'])) {
    $id_usuario = intval($_GET['id']);
    
    // Evita que el admin activo se elimine a sí mismo
    if ($id_usuario == $_SESSION['usuario_id']) {
        $message = "<p class='error'>No puedes eliminar tu propia cuenta de administrador mientras estás conectado.</p>";
    } else {
        // La tabla 'usuario' tiene 'id_usuario', 'nombre_usuario', 'email'
        $stmt_delete = $conexion->prepare("DELETE FROM usuario WHERE id_usuario = ?");
        $stmt_delete->bind_param("i", $id_usuario);
        
        if ($stmt_delete->execute()) {
            $message = "<p class='success'>Usuario eliminado con éxito.</p>";
        } else {
            $message = "<p class='error'>Error al eliminar usuario: " . $conexion->error . "</p>";
        }
        $stmt_delete->close();
    }
}

// --- K. READ USUARIOS: Obtener todos los usuarios para la tabla ---
// La tabla 'usuario' tiene 'id_usuario', 'nombre_usuario', 'email', 'rol'
$usuarios_result = $conexion->query("
    SELECT 
        u.id_usuario, 
        u.nombre_usuario, 
        u.email, 
        u.rol,
        e.nombre AS equipo_favorito
    FROM usuario u
    LEFT JOIN equipo e ON u.id_equipo_favorito = e.id_equipo
    ORDER BY u.id_usuario ASC
");
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


// --- L. CREATE SLIDE CARRUSEL ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_slide'])) {
    $titulo = trim($_POST['titulo_slide']);
    // 🚨 NUEVA LÍNEA: Capturamos el contenido
    $contenido = trim($_POST['contenido_slide'] ?? ''); 
    $orden = intval($_POST['orden'] ?? 0); 
    $imagen_url = null;
    $error_imagen = '';

    // ... (Lógica de subida de imagen, ya existente) ...
    if (isset($_FILES['imagen_slide']) && $_FILES['imagen_slide']['error'] == UPLOAD_ERR_OK) {
        $upload_dir_slide = 'uploads/carrusel/';
        if (!is_dir($upload_dir_slide)) {
             mkdir($upload_dir_slide, 0777, true);
        }
        
        $upload_result = subir_imagen($_FILES['imagen_slide'], $upload_dir_slide);
        
        if (is_string($upload_result) && strpos($upload_result, 'Error:') === 0) {
            $error_imagen = $upload_result;
        } else {
            $imagen_url = $upload_result; 
        }
    }

    if ($error_imagen) {
        $message = "<p class='error'>" . $error_imagen . "</p>";
    } elseif ($titulo && $imagen_url) {
        // 🚨 MODIFICACIÓN CLAVE: Agregamos 'contenido' al INSERT y a bind_param
        $stmt = $conexion->prepare("INSERT INTO carrusel_slide (titulo, contenido, imagen_url, orden) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $titulo, $contenido, $imagen_url, $orden); // 's' extra para el contenido
        if ($stmt->execute()) {
            $message = "<p class='success'>Slide de Carrusel creado con éxito.</p>";
        } else {
            $message = "<p class='error'>Error al crear slide: " . $conexion->error . "</p>";
        }
        $stmt->close();
    } else {
        $message = "<p class='error'>Faltan el título o la imagen para crear el slide.</p>";
    }
}

// --- M. DELETE SLIDE CARRUSEL ---
if (isset($_GET['action']) && $_GET['action'] == 'delete_slide' && isset($_GET['id'])) {
    $id_slide = intval($_GET['id']);
    
    // 1. Obtener la ruta de la imagen antes de eliminar
    $stmt_select = $conexion->prepare("SELECT imagen_url FROM carrusel_slide WHERE id_slide = ?");
    $stmt_select->bind_param("i", $id_slide);
    $stmt_select->execute();
    $result = $stmt_select->get_result();
    $slide = $result->fetch_assoc();
    $stmt_select->close();

    // 2. Eliminar el slide
    $stmt_delete = $conexion->prepare("DELETE FROM carrusel_slide WHERE id_slide = ?");
    $stmt_delete->bind_param("i", $id_slide);
    if ($stmt_delete->execute()) {
        // 3. Eliminar la imagen del servidor
        if ($slide && $slide['imagen_url'] && file_exists($slide['imagen_url'])) {
            unlink($slide['imagen_url']);
        }
        $message = "<p class='success'>Slide de Carrusel eliminado con éxito.</p>";
    } else {
        $message = "<p class='error'>Error al eliminar slide: " . $conexion->error . "</p>";
    }
    $stmt_delete->close();
}


// --- N. READ SLIDES CARRUSEL ---
// 🚨 MODIFICACIÓN AQUÍ: Se añade 'contenido' a la selección
$slides_result = $conexion->query("
    SELECT id_slide, titulo, contenido, imagen_url, orden, activo 
    FROM carrusel_slide 
    ORDER BY orden ASC, fecha_creacion DESC
");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración - CRUD</title>
    <link rel="stylesheet" href="./css/admin_crud.css"> 
    <script src="./js/admin_carrusel.js" defer></script>
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
                        <label id="seleccionar" for="imagen">Imagen (JPG, PNG, GIF):</label>
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


        <hr style="margin: 50px 0;">
<div class="crud-section" id="grupos">
    <h2>👥 CRUD de Grupos</h2>
    <div class="form-section">
        <h3>Crear Nuevo Grupo</h3>
        <form method="POST">
            <div class="form-group">
                <label for="nombre">Nombre del Grupo:</label>
                <input type="text" name="nombre" id="nombre" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="id_equipo">ID Equipo Asociado (Opcional):</label>
                <input type="number" name="id_equipo" id="id_equipo"> 
            </div>
            <button type="submit" name="create_grupo" class="btn-primary">Crear Grupo</button>
        </form>
    </div>

    <hr>
    
    <div class="table-section carrusel-container">
        <h3>Lista de Grupos</h3>
        <div class="carrusel-wrapper" data-items-per-page="5">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Equipo Asociado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="carrusel-track">
                    <?php 
                    while($grupo = $grupos_result->fetch_assoc()): 
                    ?>
                    <tr class="carrusel-item">
                        <td><?= htmlspecialchars($grupo['id_grupo']) ?></td>
                        <td><?= htmlspecialchars($grupo['nombre_grupo']) ?></td>
                        <td><?= htmlspecialchars(substr($grupo['descripcion'], 0, 50)) . '...' ?></td>
                        <td><?= htmlspecialchars($grupo['nombre_equipo_asociado'] ?: 'Ninguno') ?></td>
                        <td class="actions">
                            <a href="?action=delete_grupo&id=<?= $grupo['id_grupo'] ?>" class="btn-danger" 
                                onclick="return confirm('¿Seguro de eliminar el grupo: <?= htmlspecialchars($grupo['nombre_grupo']) ?>?');">Eliminar</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div class="carrusel-controls">
            <button class="btn-secondary prev-btn" data-target="#grupos">Anterior</button>
            <button class="btn-secondary next-btn" data-target="#grupos">Siguiente</button>
        </div>
    </div>
</div>

<hr style="margin: 50px 0;">
<div class="crud-section" id="usuarios">
    <h2>👤 CRUD de Usuarios</h2>
    
    <div class="table-section carrusel-container">
        <h3>Lista de Usuarios</h3>
        <div class="carrusel-wrapper" data-items-per-page="5">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Equipo Favorito</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="carrusel-track">
                    <?php 
                    while($usuario = $usuarios_result->fetch_assoc()): 
                    ?>
                    <tr class="carrusel-item">
                        <td><?= htmlspecialchars($usuario['id_usuario']) ?></td>
                        <td><?= htmlspecialchars($usuario['nombre_usuario']) ?></td>
                        <td><?= htmlspecialchars($usuario['email']) ?></td>
                        <td><?= htmlspecialchars($usuario['rol']) ?></td>
                        <td><?= htmlspecialchars($usuario['equipo_favorito'] ?: 'N/A') ?></td>
                        <td class="actions">
                            <?php 
                            // Evitar que el admin se elimine a sí mismo
                            if ($usuario['id_usuario'] != $_SESSION['usuario_id']): 
                            ?>
                            <a href="?action=delete_usuario&id=<?= $usuario['id_usuario'] ?>" class="btn-danger" 
                                onclick="return confirm('¿Seguro de eliminar al usuario: <?= htmlspecialchars($usuario['nombre_usuario']) ?>?');">Eliminar</a>
                            <?php 
                            else:
                            ?>
                            <span class="btn-disabled">Admin Activo</span>
                            <?php
                            endif; 
                            ?>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div class="carrusel-controls">
            <button id="booton-anterior" class="btn-secondary prev-btn" data-target="#usuarios">Anterior</button>
            <button id="booton-siguiente" class="btn-secondary next-btn" data-target="#usuarios">Siguiente</button>
        </div>
    </div>
</div>


<hr style="margin: 50px 0;">

<div class="crud-section" id="carrusel">
    <h2>🖼️ CRUD de Carrusel Principal</h2>
    
    <div class="form-section">
        <h3>Crear Nuevo Slide</h3>
        <form method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
                <label for="titulo_slide">Título/Encabezado del Slide:</label>
                <input type="text" name="titulo_slide" id="titulo_slide" required>
            </div>
            
            <div class="form-group">
                <label for="contenido_slide">Contenido/Texto del Slide:</label>
                <textarea name="contenido_slide" id="contenido_slide" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="orden">Orden (Número):</label>
                <input type="number" name="orden" id="orden" value="0">
            </div>

            <div class="form-group">
                <label for="imagen_slide">Imagen del Slide (JPG, PNG, GIF):</label>
                <input type="file" name="imagen_slide" id="imagen_slide" accept="image/*" required>
            </div>
            
            <button type="submit" name="create_slide" class="btn-primary">Añadir Slide</button>
        </form>
    </div>

    <hr>

    <div class="table-section">
        <h3>Lista de Slides del Carrusel</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Orden</th>
                    <th>Imagen</th>
                    <th>Título</th>
                    <th>Contenido</th> <th>Activo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Asegúrate que esta variable ya existe y tiene resultados de la sección N. READ SLIDES CARRUSEL
                if (isset($slides_result)) {
                    while($slide = $slides_result->fetch_assoc()): 
                ?>
                <tr>
                    <td><?= htmlspecialchars($slide['id_slide']) ?></td>
                    <td><?= htmlspecialchars($slide['orden']) ?></td>
                    <td>
                        <?php if ($slide['imagen_url']): ?>
                            <img src="<?= htmlspecialchars($slide['imagen_url']) ?>" alt="Slide" style="width: 100px; height: auto;">
                        <?php else: ?>
                            Sin imagen
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars(substr($slide['titulo'], 0, 50)) ?>...</td>
                    <td><?= htmlspecialchars(substr($slide['contenido'], 0, 50)) ?>...</td> 
                    <td><?= $slide['activo'] ? 'Sí' : 'No' ?></td>
                    <td class="actions">
                        <a href="edit_carrusel.php?id=<?= $slide['id_slide'] ?>" class="btn-secondary">Editar</a> 
                        <a href="?action=delete_slide&id=<?= $slide['id_slide'] ?>" class="btn-danger" 
                            onclick="return confirm('¿Seguro de eliminar este Slide?');">Eliminar</a>
                    </td>
                </tr>
                <?php 
                    endwhile;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


    </div>



</body>
</html>