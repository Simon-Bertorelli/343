<?php
// Asegúrate de que el script solo procese peticiones POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    // Redirige si se intenta acceder directamente sin enviar el formulario
    // Ajusta la ruta si 'contacto.php' está en otra ubicación
    header('Location: views/contacto.php');
    exit;
}

// 1. Recoger y Sanear los datos del formulario (SEGURIDAD)
// Usa el operador de fusión de null (??) para evitar errores si un campo no está presente.
$nombre = htmlspecialchars($_POST['nombre'] ?? '');
// Limpia y valida el email para asegurar que solo contiene caracteres de correo electrónico válidos
$email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL); 
$mensaje = htmlspecialchars($_POST['mensaje'] ?? '');

// 2. Validación básica
// Verifica que todos los campos estén llenos y que el email sea válido
if (empty($nombre) || empty($email) || empty($mensaje) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Redirige al formulario si hay datos faltantes o inválidos. (Ruta correcta: views/contacto.php)
    header('Location: views/contacto.php?status=error_validacion');
    exit;
}

// 3. Procesamiento de los datos (Envío de Email ELIMINADO)
// En este punto, los datos son válidos. 
// Si desearas guardar los datos en una base de datos o un archivo,
// el código iría aquí.
// **************** NO HAY FUNCIÓN mail() ****************
// Asumimos que el procesamiento de la información es exitoso.
$envio_exitoso = true; 


// 4. Mostrar Mensaje de Confirmación y Redirección
if ($envio_exitoso) {
    // RUTA DE ÉXITO: views/main.php (Asume que 'main.php' está en la carpeta 'views')
    echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="3;url=views/main.php">
    <title>Mensaje Recibido</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding-top: 50px; background-color: #f4f4f9; }
        .mensaje-confirmacion { 
            max-width: 600px; 
            margin: 0 auto; 
            padding: 30px; 
            border: 1px solid #d4edda; 
            border-radius: 12px; 
            background-color: #d1e7dd;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        h1 { color: #0f5132; margin-bottom: 20px; }
        a { color: #0d6efd; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="mensaje-confirmacion">
        <h1>✅ ¡Mensaje Recibido Correctamente!</h1>
        <p><strong>Hemos recibido los datos del formulario.</strong> Gracias por contactarnos.</p>
        <p>Serás redirigido a la página principal en 3 segundos. Si no eres redirigido, haz clic <a href="views/main.php">aquí</a>.</p>
    </div>
</body>
</html>';
    exit;
} else {
    // Este bloque solo se ejecutaría si $envio_exitoso fuese false, lo cual no sucederá con el código actual.
    echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Error de Procesamiento</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding-top: 50px; background-color: #f4f4f9; }
        .mensaje-error { 
            max-width: 600px; 
            margin: 0 auto; 
            padding: 30px; 
            border: 1px solid #f5c2c7; 
            border-radius: 12px; 
            background-color: #f8d7da;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        h1 { color: #842029; margin-bottom: 20px; }
        a { color: #0d6efd; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="mensaje-error">
        <h1>❌ Error al Procesar los Datos</h1>
        <p>Hubo un problema desconocido al intentar procesar tu mensaje. Por favor, inténtalo de nuevo.</p>
        
        <!-- RUTA CORREGIDA: Apunta a views/contacto.php desde la raíz -->
        <p><a href="views/contacto.php">Volver al formulario de contacto</a></p>
    </div>
    
</body>
</html>';
    exit;
}
?>