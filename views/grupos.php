<?php
session_start();
include __DIR__ . '/../conexion.php'; // Ruta relativa correcta

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../Inicio-sesion-html.php");
    exit;
}

$id_usuario = $_SESSION['usuario_id'];

// Grupos que ya pertenece
$mis_grupos = $conexion->query("
    SELECT g.id_grupo, g.nombre, g.descripcion
    FROM grupo g
    JOIN usuario_grupo ug ON g.id_grupo = ug.id_grupo
    WHERE ug.id_usuario = $id_usuario
");

// Grupos disponibles
$grupos_disponibles = $conexion->query("
    SELECT g.id_grupo, g.nombre, g.descripcion
    FROM grupo g
    WHERE g.id_grupo NOT IN (
        SELECT id_grupo FROM usuario_grupo WHERE id_usuario = $id_usuario
    )
");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Grupos - 343</title>
    <link rel="icon" href="../img/343-logo.png" type="image/png">
    <link rel="stylesheet" href="../css/grupos.css">
    <!-- Fuente Google: Inter para un look moderno y legible -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <h1>Gestión de Grupos</h1>

        <a href="main.php" class="btn-volver">← Volver al Inicio</a>
        
        <section class="group-section">
            <h2>Mis Grupos</h2>
            <?php if ($mis_grupos->num_rows > 0): ?>
                <div class="group-list">
                    <?php while ($g = $mis_grupos->fetch_assoc()): ?>
                        <div class="group-card my-group">
                            <strong><?= htmlspecialchars($g['nombre']) ?></strong>
                            <p class="description"><?= htmlspecialchars($g['descripcion']) ?></p>
                            <div class="actions">
                                <a href="foro.php?id_grupo=<?= $g['id_grupo'] ?>" class="btn-primary">Entrar al Foro</a>

                                <form method="POST" action="salir_grupo.php" style="display:inline;"> 
                                    <input type="hidden" name="id_grupo" value="<?= $g['id_grupo'] ?>">
                                    <!-- Clase para gestionar la confirmación con un modal personalizado (no usar alert/confirm) -->
                                    <button type="submit" class="btn-danger btn-confirm-exit" 
                                            data-group-name="<?= htmlspecialchars($g['nombre']) ?>"
                                            title="Haga clic para salir del grupo">
                                        Salir
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <p class="no-groups">No perteneces a ningún grupo.</p>
            <?php endif; ?>
        </section>

        <section class="group-section">
            <h2>Grupos Disponibles</h2>
            <?php if ($grupos_disponibles->num_rows > 0): ?>
                <div class="group-list">
                    <?php while ($g = $grupos_disponibles->fetch_assoc()): ?>
                        <div class="group-card available-group">
                            <strong><?= htmlspecialchars($g['nombre']) ?></strong>
                            <p class="description"><?= htmlspecialchars($g['descripcion']) ?></p>
                            <div class="actions">
                                <form method="POST" action="/343/unirse.php" style="display:inline;">
                                    <input type="hidden" name="id_grupo" value="<?= $g['id_grupo'] ?>">
                                    <button type="submit" class="btn-success">Unirse</button>
                                </form>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <p class="no-groups">No hay grupos disponibles para unirte.</p>
            <?php endif; ?>
        </section>
    </div>
    <?php include 'footer.php'; ?>
    <!-- NOTA: Se recomienda añadir un script para manejar el modal de confirmación para 'Salir' aquí. -->
</body>
</html>