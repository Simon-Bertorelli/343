<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partidos - 343</title>
    <link rel="stylesheet" href="../css/partidos.css">
    <link rel="icon" href="../img/343-logo.png" type="image/png">
    <script src="../js/carrusel.js" defer></script>

</head>
<body>
    
    <?php include 'header.php'; ?>

<div class="container">
    <h2>PARTIDOS DE HOY</h2>

    <table class="tabla-partidos">
        <thead>
            <tr>
                <th>Hora</th>
                <th>Local</th>
                <th></th>
                <th>Visitante</th>
                <th>Estadio</th>
            </tr>
        </thead>

        <tbody>
            <tr><td>15:00</td><td>Boca Juniors</td><td>vs</td><td>River Plate</td><td>La Bombonera</td></tr>
            <tr><td>17:30</td><td>Gimnasia LP</td><td>vs</td><td>Atlético Tucumán</td><td>Juan Carmelo Zerillo</td></tr>
            <tr><td>19:00</td><td>Platense</td><td>vs</td><td>Godoy Cruz</td><td>Ciudad de Vicente López</td></tr>
            <tr><td>21:15</td><td>Talleres CBA</td><td>vs</td><td>Huracán</td><td>Kempes</td></tr>
        </tbody>
    </table>
</div>
<div class="container">
    <h2>PARTIDOS DEL 23/11</h2>

    <table class="tabla-partidos">
        <thead>
            <tr>
                <th>Hora</th>
                <th>Local</th>
                <th></th>
                <th>Visitante</th>
                <th>Estadio</th>
            </tr>
        </thead>

        <tbody>
            <tr><td>14:00</td><td>San Lorenzo</td><td>vs</td><td>Lanús</td><td>Nuevo Gasómetro</td></tr>
            <tr><td>15:30</td><td>Belgrano</td><td>vs</td><td>Central Córdoba</td><td>Kempes</td></tr>
            <tr><td>17:00</td><td>Banfield</td><td>vs</td><td>Vélez</td><td>Florencio Sola</td></tr>
            <tr><td>18:45</td><td>Racing</td><td>vs</td><td>Independiente Rivadavia</td><td>Cilindro</td></tr>
            <tr><td>20:00</td><td>Arsenal</td><td>vs</td><td>Tigre</td><td>Julio Grondona</td></tr>
            <tr><td>21:30</td><td>Estudiantes</td><td>vs</td><td>Newell's</td><td>UNO</td></tr>
        </tbody>
    </table>
</div>
<div class="container">
    <h2>FECHA A DEFINIR</h2>

    <table class="tabla-partidos">
        <thead>
            <tr>
                <th>Local</th>
                <th></th>
                <th>Visitante</th>
                <th>Estadio</th>
            </tr>
        </thead>

        <tbody>
            <tr><td>Argentinos</td><td>vs</td><td>Sarmiento</td><td>Diego Maradona</td></tr>
            <tr><td>Colón</td><td>vs</td><td>Unión</td><td>Cementerio de los Elefantes</td></tr>
            <tr><td>Defensa</td><td>vs</td><td>Instituto</td><td>Norberto Tomaghello</td></tr>
            <tr><td>Barracas</td><td>vs</td><td>Rosario Central</td><td>Barracas Central</td></tr>
        </tbody>
    </table>
</div>

    <?php include 'footer.php'; ?>
</body>
</html>