<?php  

include("Inicio-sesion.php");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion 343</title>
    <link rel="stylesheet" href="./css/inicio.css">
    
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

    <p>
        ¿No tienes cuenta? 
        <a href="Registro-usuario.php">Regístrate aquí</a>
    </p>
    <p>
        ¿No quieres iniciar sesion? 
        <a href="./views/main.php">Ingresa aquí</a>
    </p>


</form>
</body>
</html>