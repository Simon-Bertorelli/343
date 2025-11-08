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
            <form action="../php/enviar_mensaje.php" method="POST" class="form-contacto">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" rows="5" required></textarea>

                <button type="submit">Enviar</button>
            </form>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>