<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - 343</title>
    <link rel="stylesheet" href="../css/contacto.css">
    <link rel="icon" href="../img/343-logo.png" type="image/png">
    <script src="../js/carrusel.js" defer></script>
</head>
<body>
    
    <?php include 'header.php'; ?>

    <main>
        <section class="contacto">
            <h1>Contacto</h1>
            <form action="../enviar_mensaje.php" method="POST" class="form-contacto">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" rows="5" required></textarea>

                <form action="src/../enviar_mensaje.php" method="POST" class="form-contacto">
    <button type="submit">Enviar</button>
</form>
            </form>
        </section>

        <div class="publicidad">
            <a href="https://maples.com/directorship-and-fund-governance-services?utm_source=bing&utm_medium=display&utm_campaign=486898705&utm_content=1227056218999618&utm_term=c&utm_campaign=486898705&utm_medium=display&utm_source=bing&utm_term=c&utm_content=1227056218999618&msclkid=9ec6376a66ef1ca0188c5e4eebb02b36"><img src="../img/publicidad3.jpg" alt="Publicidad"></a>
        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>