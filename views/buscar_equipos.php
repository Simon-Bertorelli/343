<?php
// Este script busca equipos en la base de datos para la función de autocompletar.

// 1. CONFIGURACIÓN DE LA CONEXIÓN A LA BASE DE DATOS
$servername = "localhost";
$db_username = "root"; 
$db_password = "";     
$dbname = "343db";

// Crea la conexión
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    // Es crucial devolver una respuesta JSON válida en caso de error
    header('Content-Type: application/json');
    echo json_encode([]);
    exit;
}

// Obtener el término de búsqueda del parámetro GET
$search_term = trim($_GET['term'] ?? '');

$equipos = [];

if (!empty($search_term)) {
    // Consulta para buscar equipos que contengan el término de búsqueda
    // Utilizamos LIKE %...% para búsqueda flexible
    $sql = "SELECT nombre FROM equipo WHERE nombre LIKE ? LIMIT 10";
    
    $stmt = $conn->prepare($sql);
    // Añadimos wildcards '%' al término de búsqueda
    $param = "%" . $search_term . "%";
    $stmt->bind_param("s", $param);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        // Solo necesitamos el nombre para el autocompletado
        $equipos[] = $row['nombre'];
    }

    $stmt->close();
}

$conn->close();

// Devolver la lista de equipos como JSON
header('Content-Type: application/json');
echo json_encode($equipos);
?>
