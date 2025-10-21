<?php
session_start();
// NOTA: Asegúrate de que el usuario esté logueado antes de ejecutar cualquier código de actualización.
if (!isset($_SESSION['usuario_id'])) {
    // Redirigir al login si no está logueado
    header("Location: Inicio-sesion-html.php");
    exit;
}

// ----------------------------------------------------
// 1. CONFIGURACIÓN DE LA CONEXIÓN A LA BASE DE DATOS
// ----------------------------------------------------
$servername = "localhost";
$db_username = "root"; // Reemplaza con tu usuario de DB
$db_password = "";     // Reemplaza con tu contraseña de DB
$dbname = "343db";

// Crea la conexión
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$user_id = $_SESSION['usuario_id'];
$errors = [];
$updates = [];

// ----------------------------------------------------
// 2. OBTENER Y VALIDAR DATOS DEL FORMULARIO
// ----------------------------------------------------

// Campos que siempre se actualizarán: Nombre de usuario, Email, Descripción
$nombre_usuario_nuevo = trim($_POST['nombre'] ?? ''); // En el HTML lo llamaste 'nombre'
$email_nuevo = trim($_POST['email'] ?? '');
$descripcion_nueva = trim($_POST['descripcion'] ?? '');
$contrasena_nueva = $_POST['password'] ?? '';
$club_favorito_nombre = $_POST['club_favorito'] ?? ''; // Nombre del club

// ----------------------------------------------------
// 3. OBTENER EL ID DEL EQUIPO FAVORITO
// ----------------------------------------------------
$id_equipo_favorito = null;
if (!empty($club_favorito_nombre)) {
    // Consulta para obtener el ID del equipo basado en el nombre
    $stmt_club = $conn->prepare("SELECT id_equipo FROM equipo WHERE nombre = ?");
    $stmt_club->bind_param("s", $club_favorito_nombre);
    $stmt_club->execute();
    $result_club = $stmt_club->get_result();
    
    if ($result_club->num_rows > 0) {
        $id_equipo_favorito = $result_club->fetch_assoc()['id_equipo'];
    }
    $stmt_club->close();
}
// Si no se encontró el ID o si el club es "Otro Club...", se usará NULL, que está permitido por tu FK.

// ----------------------------------------------------
// 4. PREPARAR LA CONSULTA DE ACTUALIZACIÓN
// ----------------------------------------------------

// Construcción dinámica de la consulta
$sql_update = "UPDATE usuario SET ";
$params = [];
$types = "";

// A. Nombre de Usuario
$updates[] = "nombre_usuario = ?";
$params[] = $nombre_usuario_nuevo;
$types .= "s";

// B. Email
$updates[] = "email = ?";
$params[] = $email_nuevo;
$types .= "s";

// C. Descripción (asumiendo que ya hiciste la modificación SQL)
$updates[] = "descripcion = ?";
$params[] = $descripcion_nueva;
$types .= "s";

// D. Contraseña (Solo si el campo no está vacío)
if (!empty($contrasena_nueva)) {
    // Hash de la nueva contraseña
    $hashed_password = password_hash($contrasena_nueva, PASSWORD_DEFAULT);
    $updates[] = "contrasena = ?";
    $params[] = $hashed_password;
    $types .= "s";
}

// E. Equipo Favorito
// El campo es id_equipo_favorito, si el club fue encontrado, usamos su ID, si no, es NULL.
$updates[] = "id_equipo_favorito = ?";
$params[] = $id_equipo_favorito;
$types .= "i"; // 'i' para entero o 's' si PHP no maneja bien el NULL como 'i'

// Finalizar la consulta
$sql_update .= implode(", ", $updates);
$sql_update .= " WHERE id_usuario = ?";
$params[] = $user_id;
$types .= "i";

// ----------------------------------------------------
// 5. EJECUTAR LA CONSULTA
// ----------------------------------------------------

$stmt = $conn->prepare($sql_update);

// Enlazar los parámetros. El uso de call_user_func_array es necesario para vincular arrays dinámicos.
$bind_params = array_merge([$types], $params);
call_user_func_array([$stmt, 'bind_param'], refValues($bind_params));

// Función auxiliar para pasar los valores por referencia
function refValues($arr){
    if (strnatcmp(phpversion(),'5.3') >= 0) // Versiones PHP >= 5.3.0
    {
        $refs = array();
        foreach($arr as $key => $value)
            $refs[$key] = &$arr[$key];
        return $refs;
    }
    return $arr;
}

if ($stmt->execute()) {
    // Éxito: Redirigir de vuelta a la página de perfil con un mensaje de éxito
    $_SESSION['message'] = "✅ Tu perfil se actualizó correctamente.";
    $_SESSION['msg_type'] = "success";
} else {
    // Error
    // En un entorno real, deberías manejar errores de duplicidad (nombre_usuario, email)
    $_SESSION['message'] = "❌ Error al actualizar el perfil: " . $conn->error;
    $_SESSION['msg_type'] = "error";
}

$stmt->close();
$conn->close();

// Redirigir de vuelta al perfil
header("Location: views/usuario.php"); 
exit;
?>