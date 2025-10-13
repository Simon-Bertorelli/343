<?php
session_start();
include __DIR__ . '/conexion.php';

// Verificar que el usuario esté logueado
if (!isset($_SESSION['usuario_id'])) {
    http_response_code(403); // Prohibido
    echo 0; // Devolver 0 likes como señal de error o falta de permiso
    exit;
}

$id_usuario = $_SESSION['usuario_id'];
// Asegúrate de usar intval() para sanitizar el GET
$id_publicacion = intval($_GET['id'] ?? 0); 
$id_grupo = intval($_GET['id_grupo'] ?? 0);

// Validar parámetros
if (!$id_publicacion || !$id_grupo) {
    http_response_code(400); // Solicitud incorrecta
    echo 0;
    exit;
}

// --- LÓGICA DE TOGGLE (DAR/QUITAR LIKE) ---

$check_stmt = $conexion->prepare("
    SELECT id_reaccion FROM reaccion 
    WHERE tipo = 'like' AND id_usuario = ? AND tipo_objeto = 'publicacion' AND id_objeto = ?
");
$check_stmt->bind_param("ii", $id_usuario, $id_publicacion);
$check_stmt->execute();
$result = $check_stmt->get_result();

if ($result->num_rows == 0) {
    // Si NO existe un like, lo insertamos (DAR LIKE)
    $insert = $conexion->prepare("
        INSERT INTO reaccion (tipo, id_usuario, tipo_objeto, id_objeto) 
        VALUES ('like', ?, 'publicacion', ?)
    ");
    $insert->bind_param("ii", $id_usuario, $id_publicacion);
    $insert->execute();
    $insert->close();
} else {
    // Si SÍ existe un like, lo eliminamos (QUITAR LIKE/UNLIKE)
    $delete = $conexion->prepare("
        DELETE FROM reaccion 
        WHERE tipo = 'like' AND id_usuario = ? AND tipo_objeto = 'publicacion' AND id_objeto = ?
    ");
    $delete->bind_param("ii", $id_usuario, $id_publicacion);
    $delete->execute();
    $delete->close();
}
$check_stmt->close();

// --- 2. OBTENER Y DEVOLVER EL NUEVO CONTEO DE LIKES ---
// Contar todos los likes de la publicación (incluyendo el cambio que acabamos de hacer)
$count_result = $conexion->query("
    SELECT COUNT(*) AS total_likes 
    FROM reaccion 
    WHERE tipo_objeto='publicacion' AND id_objeto=$id_publicacion AND tipo='like'
");
$row = $count_result->fetch_assoc();

// IMPRIMIR EL NÚMERO DE LIKES. ESTO ES LO QUE CAPTURA AJAX.
echo $row['total_likes']; 
exit; // ES CRUCIAL NO REDIRECCIONAR NUNCA
?>