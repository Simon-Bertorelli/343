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

<h2>Mis Grupos</h2>
<?php if ($mis_grupos->num_rows > 0): ?>
    <?php while ($g = $mis_grupos->fetch_assoc()): ?>
        <div>
            <strong><?= htmlspecialchars($g['nombre']) ?></strong>
            <p><?= htmlspecialchars($g['descripcion']) ?></p>
            <a href="foro.php?id_grupo=<?= $g['id_grupo'] ?>">Entrar</a>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p>No perteneces a ningún grupo.</p>
<?php endif; ?>

<h2>Grupos Disponibles</h2>
<?php if ($grupos_disponibles->num_rows > 0): ?>
    <?php while ($g = $grupos_disponibles->fetch_assoc()): ?>
        <div>
            <strong><?= htmlspecialchars($g['nombre']) ?></strong>
            <p><?= htmlspecialchars($g['descripcion']) ?></p>
            <form method="POST" action="/343-main/unirse.php"> <!-- Ruta absoluta desde la raíz -->
                <input type="hidden" name="id_grupo" value="<?= $g['id_grupo'] ?>">
                <button type="submit">Unirse</button>
            </form>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p>No hay grupos disponibles.</p>
<?php endif; ?>
