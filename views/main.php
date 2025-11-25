<?php 
session_start(); 

include '../conexion.php'; 

// Inicializa $result_carrusel a null para evitar el 'Undefined variable' Warning
$result_carrusel = null; 

$sql_carrusel = "SELECT imagen_url, titulo, contenido FROM carrusel_slide WHERE activo = TRUE ORDER BY orden ASC, fecha_creacion DESC LIMIT 10"; 

// Comprobar la conexión y ejecutar la consulta de forma segura
if (isset($conexion) && $conexion) {
    // Si la conexión es válida, ejecuta la consulta
    $result_carrusel = $conexion->query($sql_carrusel);

    // Si la consulta falla, establece a null
    if ($result_carrusel === FALSE) {
        $result_carrusel = null; 
    }
} else {
    // Si la conexión falló (problema en conexion.php), establece a null
    $result_carrusel = null;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias y Partidos - 343</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="icon" href="../img/343-logo.png" type="image/png">
    <script src="../js/carrusel.js" defer></script>
</head>
<body>

    <?php include 'header.php'; ?>
    <main>
        
    <section class="noticias">
        <h2>NOTICIAS</h2> 
        <div class="noticias-carrusel-wrapper">
            <div class="noticias-carrusel">
            
            <?php 
            // GENERAR LAS CARDS DEL CARRUSEL CON DATOS DE LA BD
            if ($result_carrusel && $result_carrusel->num_rows > 0) {
                while($slide = $result_carrusel->fetch_assoc()) {
                    
                    // 2. Prepara las variables
                    $imagen_ruta = '../' . htmlspecialchars($slide['imagen_url']); 
                    $titulo_slide = htmlspecialchars($slide['titulo']);
                    
                    // Prepara el extracto del contenido (máximo 70 caracteres para que encaje)
                    $texto_completo = htmlspecialchars($slide['contenido']);
                    $extracto_contenido = substr($texto_completo, 0, 70) . (strlen($texto_completo) > 70 ? '...' : ''); 

                    
                    echo '<div class="card">';
                    echo '  <img src="' . $imagen_ruta . '" alt="' . $titulo_slide . '">';
                    
                    // 3. Muestra el TÍTULO
                    echo '  <h3>' . $titulo_slide . '</h3>'; 
                    
                    // 4. Muestra el CONTENIDO/TEXTO
                    echo '  <p class="texto-noticia">' . $extracto_contenido . '</p>'; 
                    
                    echo '</div>';
                }
            } else {
                echo '<div class="card"><p class="texto-noticia">Contenido del carrusel no disponible.</p></div>';
            }
            ?>
            
            </div>
            <div class="controles">
                <button id="prev">⬅</button>
                <button id="next">➡</button>
            </div>
        </div>
    </section>

        
        <section class="partidos">
            <h2>PARTIDOS DE HOY</h2>
            <div class="match-list">
            <a href="partido.php">
            <div class="match">
                <img src="../img/boca.png" alt="Boca">
                <span class="team-name">Boca Juniors</span>
                <span class="vs">VS</span>
                <span class="team-name">River Plate</span>
                <img src="../img/riber.png" alt="River">
            </div>
            </a> 
            <div class="match">
                <img src="../img/gelp.png" alt="Gimnasia">
                <span class="team-name">Gimnasia y Esgrima (LP)</span>
                <span class="vs">VS</span>
                <span class="team-name">Atlético Tucumán</span>
                <img src="../img/tucuman.png" alt="Tucumán">
            </div>

            <div class="match">
                <img src="../img/platense.png" alt="Platense">
                <span class="team-name">Platense</span>
                <span class="vs">VS</span>
                <span class="team-name">Godoy Cruz</span>
                <img src="../img/godoy.png" alt="Godoy Cruz">
            </div>

            <div class="match">
                <img src="../img/talleres.png" alt="Talleres">
                <span class="team-name">Talleres (C)</span>
                <span class="vs">VS</span>
                <span class="team-name">Huracán</span>
                <img src="../img/huracan.png" alt="Huracán">
            </div>
            </div>
        </section>

        <div class="publicidad">
            <a href="https://www.ticketek.com.ar/argentina-open-wta/tenis-club-argentino"><img src="../img/publicidad1.jpg" alt="Publicidad"></a>
        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>