<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partido</title>
    <link rel="stylesheet" href="../css/partido.css">
    <link rel="icon" href="../img/343-logo.png" type="image/png">
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <div id="vs">
            <div class="equipo">
                <img src="../img/boca.png" alt="Boca Juniors Logo">
                <h2>Boca Juniors</h2>
            </div>
            <h1>VS</h1>
            <div class="equipo">
                <img src="../img/riber.png" alt="River Plate Logo">
                <h2>River Plate</h2>
            </div>
        </div>

        <h1>Partido</h1>
        <div id="info">
            
            <div id="info-detalles">
                <h3>Detalles del Partido</h3>
                <p>Equipo Local: Boca Juniors</p>
                <p>Equipo Visitante: River Plate</p>
                <p>Árbitro: Néstor Pitana</p>
                <p>Clima: Despejado, 22°C</p>
            </div>

            <div id="info-general">
                <h3>Boca vs River</h3>
                <p>Fecha: 9 de Noviembre de 2025</p>
                <p>Hora: 20:00</p>
                <p>Lugar: Estadio Alberto J. Armando</p>
            </div>

            <div id="info-trans">
                <h3>Transmisión en Vivo</h3>
                <p>ESPN</p>
                <p>TNT Sports</p>
            </div>
        </div>

        <h2>Alineaciones</h2>
        <div id="alineaciones">
            <div class="alineacion">
                <h3>Boca Juniors</h3>
                <table border="1">
                    <tr>
                        <th>Posición</th><th>Jugador</th><th>N°</th>
                    </tr>
                    <tr>
                        <td>ARQ</td><td>Agustín Marchesín</td><td>25</td>
                    </tr>
                    <tr>
                        <td>DEF</td><td>Luis Advíncula</td><td>17</td>
                    </tr>
                    <tr>
                        <td>DEF</td><td>Ayrton Costa</td><td>32</td>
                    </tr>
                    <tr>
                        <td>DEF</td><td>Lautaro Di Lollo</td><td>40</td>
                    </tr>
                    <tr>
                        <td>DEF</td><td>Lautaro Blanco</td><td>23</td>
                    </tr>
                    <tr>
                        <td>MED</td><td>Exequiel Zeballos</td><td>7</td>
                    </tr>
                    <tr>
                        <td>MED</td><td>Leandro Paredes</td><td>5</td>
                    </tr>
                    <tr>
                        <td>MED</td><td>Rodrigo Battaglia</td><td>29</td>
                    </tr>
                    <tr>
                        <td>MED</td><td>Carlos Palacios</td><td>8</td>
                    </tr>
                    <tr>
                        <td>DEL</td><td>Miguel Merentiel</td><td>16</td>
                    </tr>
                    <tr>
                        <td>DEL</td><td>Milton Giménez</td><td>9</td>
                    </tr>
                    <tr class="dt">
                        <td>DIR</td><td>Claudio Úbeda</td><td>DT</td>
                    </tr>
                </table>
            </div>

            <div class="alineacion">
                <h3>River Plate</h3>
                <table border="1">
                    <tr>
                        <th>Posición</th><th>Jugador</th><th>N°</th>
                    </tr>
                    <tr>
                        <td>ARQ</td><td>Franco Armani</td><td>1</td>
                    </tr>
                    <tr>
                        <td>DEF</td><td>Gonzalo Montiel</td><td>4</td>
                    </tr>
                    <tr>
                        <td>DEF</td><td>Lautaro Rivero</td><td>13</td>
                    </tr>
                    <tr>
                        <td>DEF</td><td>Paulo Diaz</td><td>17</td>
                    </tr>
                    <tr>
                        <td>DEF</td><td>Marcos Acuña</td><td>21</td>
                    </tr>
                    <tr>
                        <td>MED</td><td>Kevin Castaño</td><td>22</td>
                    </tr>
                    <tr>
                        <td>MED</td><td>Santiago Lencina</td><td>39</td>
                    </tr>
                    <tr>
                        <td>MED</td><td>Giuliano Galoppo</td><td>29</td>
                    </tr>
                    <tr>
                        <td>DEL</td><td>Ignacio Fernández</td><td>26</td>
                    </tr>
                    <tr>
                        <td>DEL</td><td>Juan Fernando Quintero</td><td>10</td>
                    </tr>
                    <tr>
                        <td>DEL</td><td>Maximiliano Salas</td><td>7</td>
                    </tr>
                    <tr class="dt">
                        <td>DIR</td><td>Marcelo Gallardo</td><td>DT</td>
                    </tr>
                </table>
            </div>
        </div>


    </main>

    <?php include 'footer.php'; ?>
</body>
</html>