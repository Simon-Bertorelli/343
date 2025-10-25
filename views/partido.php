<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partido Superclásico</title>
    <link rel="stylesheet" href="../css/partido.css"> 
    <link rel="icon" href="../img/343-logo.png" type="image/png">
    
    <script src="../js/partido.js" defer></script>
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <div id="vs">
            <div class="equipo" id="equipo-1">
                <img src="" alt="Logo Equipo 1"> 
                <h2>Cargando...</h2>
            </div>
            <h1>VS</h1>
            <div class="equipo" id="equipo-2">
                <img src="" alt="Logo Equipo 2"> 
                <h2>Cargando...</h2>
            </div>
        </div>

        <h1>Partido</h1>
        <div id="info">
            
            <div id="info-detalles">
                <h3>Detalles del Partido</h3>
                <p>Equipo Local: Cargando...</p>
                <p>Equipo Visitante: Cargando...</p>
                <p>Árbitro: Cargando...</p>
                <p>Clima: Cargando...</p>
            </div>

            <div id="info-general">
                <h3>Cargando...</h3>
                <p>Fecha: Cargando...</p>
                <p>Hora: Cargando...</p>
                <p>Lugar: Cargando...</p>
            </div>

            <div id="info-trans">
                <h3>Transmisión en Vivo</h3>
                </div>
        </div>

        <h2>Alineaciones</h2>
        <div id="alineaciones">
            
            <div class="alineacion">
                <h3>Cargando...</h3>
                <table border="1">
                    <tr>
                        <th>Posición</th><th>Jugador</th><th>N°</th>
                    </tr>
                </table>
            </div>

            <div class="alineacion">
                <h3>Cargando...</h3>
                <table border="1">
                    <tr>
                        <th>Posición</th><th>Jugador</th><th>N°</th>
                    </tr>
                </table>
            </div>
        </div>

    </main>

    <?php include 'footer.php'; ?>
</body>
</html>