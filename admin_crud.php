<?php
session_start();
include __DIR__ . '/conexion.php';

// --- VERIFICACIÓN DE ACCESO DE ADMINISTRADOR ---
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_rol'] !== 'admin') {
    die("⛔ Acceso Denegado. Esta área es solo para administradores.");
}
// --------------------------------------------------

$message = '';

// A. DELETE: Eliminar un equipo
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id_equipo = intval($_GET['id']);
    $stmt = $conexion->prepare("DELETE FROM equipo WHERE id_equipo = ?");
    $stmt->bind_param("i", $id_equipo);
    if ($stmt->execute()) {
        $message = "<p class='success'>Equipo eliminado con éxito.</p>"; // Clase para el mensaje
    } else {
        $message = "<p class='error'>Error al eliminar equipo: " . $conexion->error . "</p>"; // Clase para el mensaje
    }
    $stmt->close();
}

// B. CREATE: Insertar un nuevo equipo
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_equipo'])) {
    $nombre = trim($_POST['nombre']);
    $formacion = trim($_POST['formacion']);
    $id_liga = intval($_POST['id_liga']); 

    if ($nombre && $formacion && $id_liga) {
        $stmt = $conexion->prepare("INSERT INTO equipo (nombre, formacion, id_liga) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $nombre, $formacion, $id_liga);
        if ($stmt->execute()) {
            $message = "<p class='success'>Equipo creado con éxito.</p>";
        } else {
            $message = "<p class='error'>Error al crear equipo: " . $conexion->error . "</p>";
        }
        $stmt->close();
    } else {
        $message = "<p class='error'>Faltan campos para crear equipo.</p>";
    }
}

// C. READ: Obtener todos los equipos para la tabla
$equipos_result = $conexion->query("
    SELECT e.id_equipo, e.nombre, e.formacion, l.nombre AS nombre_liga 
    FROM equipo e 
    JOIN liga l ON e.id_liga = l.id_liga
    ORDER BY e.id_equipo DESC
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
    <?php include 'header.php'; ?>
    <div class="container">
        <h1>⚙️ Panel de Administración (Equipos)</h1>
        <div class="nav-links">
            <a href="views/main.php">Ir a la Web Principal</a>
            <a href="logout.php">Cerrar Sesión</a>
        </div>
        
        <?= $message ?>

        <div class="form-section">
            <h2>Crear Nuevo Equipo</h2>
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
            <h2>Lista de Equipos</h2>
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
    <?php include 'footer.php'; ?>
</body>
</html>