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
    <meta charset="UTF-8">
    <title>Lista de Grupos</title>
    <link rel="stylesheet" href="../css/grupos.css"> 
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <h1>Mis Grupos y Disponibles</h1>

        <a href="main.php" class="btn-volver">Volver</a>
        
        <section class="group-section">
            <h2>Mis Grupos</h2>
            <?php if ($mis_grupos->num_rows > 0): ?>
                <div class="group-list">
                    <?php while ($g = $mis_grupos->fetch_assoc()): ?>
                        <div class="group-card my-group">
                            <strong><?= htmlspecialchars($g['nombre']) ?></strong>
                            <p class="description"><?= htmlspecialchars($g['descripcion']) ?></p>
                            <div class="actions">
                                <a href="foro.php?id_grupo=<?= $g['id_grupo'] ?>" class="btn-primary">Entrar</a>

                                <form method="POST" action="salir_grupo.php" style="display:inline;"> 
                                    <input type="hidden" name="id_grupo" value="<?= $g['id_grupo'] ?>">
                                    <button type="submit" class="btn-danger" onclick="return confirm('¿Estás seguro de que quieres salir del grupo <?= htmlspecialchars($g['nombre']) ?>?');">Salir</button>
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
                                <form method="POST" action="/343-main/unirse.php" style="display:inline;">
                                    <input type="hidden" name="id_grupo" value="<?= $g['id_grupo'] ?>">
                                    <button type="submit" class="btn-primary">Unirse</button>
                                </form>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <p class="no-groups">No hay grupos disponibles.</p>
            <?php endif; ?>
        </section>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>