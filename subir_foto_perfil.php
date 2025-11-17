<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['usuario_id'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Usuario no autenticado.']);
    exit;
}

// Configuración de la DB (Mover a un archivo de configuración seguro)
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "343db";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Error de conexión a la base de datos.']);
    exit;
}

$user_id = $_SESSION['usuario_id'];
$upload_dir = 'uploads/profiles/'; // Directorio de subida

// Asegúrate de que la carpeta de subida exista
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}


if (isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['profile_photo'];
    $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    
    // Validaciones de Seguridad
    if (!in_array($file_extension, ['jpg', 'jpeg', 'png']) || $file['size'] > 5 * 1024 * 1024) { 
        echo json_encode(['success' => false, 'message' => 'Tipo o tamaño de archivo no permitido.']);
        exit;
    }
    
    // Generar Nombre Único
    $new_file_name = $user_id . '_' . time() . '.' . $file_extension;
    $target_file = $upload_dir . $new_file_name;

    if (move_uploaded_file($file['tmp_name'], $target_file)) {
        
        // Actualizar la Base de Datos
        $sql = "UPDATE usuario SET foto_perfil = ? WHERE id_usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $target_file, $user_id); // Usa $target_file como path

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Foto subida y actualizada.']);
        } else {
            // Revertir
            unlink($target_file);
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Error al actualizar la base de datos.']);
        }
        $stmt->close();

    } else {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Error al mover el archivo.']);
    }
} else {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'No se recibió ningún archivo válido.']);
}

$conn->close();
?>