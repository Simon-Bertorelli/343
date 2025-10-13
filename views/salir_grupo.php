<?php
session_start();
include __DIR__ . '/../conexion.php'; // Ajusta la ruta a tu archivo de conexión

// 1. Verificar sesión
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../Inicio-sesion-html.php");
    exit;
}

$id_usuario = $_SESSION['usuario_id'];
$id_grupo = intval($_POST['id_grupo'] ?? 0);

// 2. Validar ID del grupo
if ($id_grupo === 0) {
    // Si no hay ID válido, redirigir
    header("Location: grupos.php");
    exit;
}

// 3. Ejecutar la sentencia DELETE para salir del grupo
// Usamos sentencias preparadas por seguridad.
$stmt = $conexion->prepare("DELETE FROM usuario_grupo WHERE id_usuario = ? AND id_grupo = ?");
$stmt->bind_param("ii", $id_usuario, $id_grupo);

if ($stmt->execute()) {
    // Éxito al salir del grupo
    // Opcional: Puedes agregar un mensaje de éxito a la sesión
} else {
    // Error
    // Opcional: Agregar un mensaje de error
}

$stmt->close();

// 4. Redirigir de vuelta a la lista de grupos
header("Location: grupos.php");
exit;
?>