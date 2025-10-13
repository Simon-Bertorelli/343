<?php
session_start();
include __DIR__ . '/conexion.php';

// --- VERIFICACIÓN DE ACCESO DE ADMINISTRADOR ---
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_rol'] !== 'admin') {
    die("⛔ Acceso Denegado. Esta área es solo para administradores.");
}
// --------------------------------------------------

$message = '';
$id_equipo = isset($_GET['id']) ? intval($_GET['id']) : (isset($_POST['id_equipo']) ? intval($_POST['id_equipo']) : 0);
$equipo = null;
$ligas_result = $conexion->query("SELECT id_liga, nombre FROM liga ORDER BY nombre ASC"); // Para el Select/Dropdown

// A. PROCESAR LA ACTUALIZACIÓN (UPDATE)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_equipo'])) {
    $id_equipo = intval($_POST['id_equipo']);
    $nombre = trim($_POST['nombre']);
    $formacion = trim($_POST['formacion']);
    $id_liga = intval($_POST['id_liga']);
    
    if ($id_equipo > 0 && $nombre && $formacion && $id_liga > 0) {
        $stmt = $conexion->prepare("UPDATE equipo SET nombre = ?, formacion = ?, id_liga = ? WHERE id_equipo = ?");
        $stmt->bind_param("ssii", $nombre, $formacion, $id_liga, $id_equipo);
        
        if ($stmt->execute()) {
            $message = "<p class='success'>Equipo actualizado con éxito. <a href='admin_crud.php'>Volver al panel</a></p>";
        } else {
            // Error común: id_liga no existe (Foreign Key)
            $message = "<p class='error'>Error al actualizar equipo: Verifique que el ID de Liga exista. Detalle: " . $conexion->error . "</p>";
        }
        $stmt->close();
    } else {
        $message = "<p class='error'>Faltan campos obligatorios o el ID de Equipo/Liga es inválido.</p>";
    }
}

// B. OBTENER LOS DATOS DEL EQUIPO A EDITAR (o recargar después de un intento de UPDATE)
if ($id_equipo > 0) {
    $stmt = $conexion->prepare("SELECT id_equipo, nombre, formacion, id_liga FROM equipo WHERE id_equipo = ?");
    $stmt->bind_param("i", $id_equipo);
    $stmt->execute();
    $result = $stmt->get_result();
    $equipo = $result->fetch_assoc();
    $stmt->close();

    if (!$equipo) {
        die("Error: Equipo no encontrado.");
    }
} else {
    die("Error: ID de equipo no proporcionado.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Equipo - Panel Admin</title>
    <link rel="stylesheet" href="./css/admin_crud.css"> 
</head>
<body>
    <div class="container">
        <h1>✏️ Editar Equipo: <?= htmlspecialchars($equipo['nombre']) ?></h1>
        <div class="nav-links">
            <a href="admin_crud.php">← Volver al Panel</a>
        </div>
        
        <?= $message ?>

        <div class="form-section">
            <h3>Formulario de Edición</h3>
            <form method="POST">
                <input type="hidden" name="id_equipo" value="<?= htmlspecialchars($equipo['id_equipo']) ?>">

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($equipo['nombre']) ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="formacion">Formación (Ej: 4-4-2):</label>
                    <input type="text" name="formacion" id="formacion" value="<?= htmlspecialchars($equipo['formacion']) ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="id_liga">Liga:</label>
                    <select name="id_liga" id="id_liga" required>
                        <option value="">-- Seleccione una Liga --</option>
                        <?php 
                        // Aseguramos que la consulta de ligas fue exitosa
                        if ($ligas_result) {
                            while($liga = $ligas_result->fetch_assoc()): 
                                $selected = ($liga['id_liga'] == $equipo['id_liga']) ? 'selected' : '';
                        ?>
                            <option value="<?= htmlspecialchars($liga['id_liga']) ?>" <?= $selected ?>>
                                <?= htmlspecialchars($liga['nombre']) ?> (ID: <?= htmlspecialchars($liga['id_liga']) ?>)
                            </option>
                        <?php 
                            endwhile; 
                            $ligas_result->data_seek(0); // Reiniciar el puntero por si se necesita leer de nuevo
                        } else {
                            // Opción de fallback si la conexión o tabla liga falla
                            echo '<option value="' . htmlspecialchars($equipo['id_liga']) . '" selected>ID Liga Actual: ' . htmlspecialchars($equipo['id_liga']) . ' (Error al cargar ligas)</option>';
                        }
                        ?>
                    </select>
                    <p class="help-text">Si no ve ligas, asegúrese de que la tabla `liga` tenga datos.</p>
                </div>
                
                <button type="submit" name="update_equipo" class="btn-primary">Guardar Cambios del Equipo</button>
            </form>
        </div>
    </div>
</body>
</html>