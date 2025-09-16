<?php  

include("Inicio-sesion.php");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>

<form action="" method="post">
    <h2>Iniciar Sesión</h2>
    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" name="nombre_usuario" >
    <br>
    <label for="contrasena">Contraseña:</label>
    <input type="password" id="contrasena" name="contrasena" >
    <br>
    <button type="submit" name="boton-sesion">Iniciar sesion</button>
</form>
</body>
</html>