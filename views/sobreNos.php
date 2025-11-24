<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros - 343</title>
   <link rel="stylesheet" href="../css/sobreNos.css">
   <link rel="icon" href="../img/343-logo.png" type="image/png">
   <script src="../js/integrantes_tooltip.js" defer></script>
</head>
<body>
      <?php include 'header.php'; ?>

    <div class="publicidad">
        <a href="https://maples.com/directorship-and-fund-governance-services?utm_source=bing&utm_medium=display&utm_campaign=486898705&utm_content=1227056218999618&utm_term=c&utm_campaign=486898705&utm_medium=display&utm_source=bing&utm_term=c&utm_content=1227056218999618&msclkid=9ec6376a66ef1ca0188c5e4eebb02b36"><img src="../img/publicidad3.jpg" alt="Publicidad"></a>
    </div>

    <main>
    <h1>Sobre Nosotros</h1>

    <div class="pregunta">
    <h2>¿Por qué hicimos la página?</h2>
    <p>Creamos esta página con el objetivo de reunir en un solo lugar toda la información relevante del futbol. Queríamos ofrecer una plataforma clara, actualizada y fácil de navegar para los fanáticos del deporte, jugadores, entrenadores y cualquier persona interesada en seguir de cerca la competencia.</p>

    <p>Nos motivó la pasión por el deporte y la necesidad de contar con una fuente confiable que mostrara estadísticas, posiciones, resultados y detalles de cada equipo, todo en un solo sitio.</p>
    </div>

    <div class="pregunta">
    <h2>¿Qué es la página?</h2>
    <p>Esta es una plataforma digital dedicada a informar sobre futbol. En ella vas a encontrar tablas de posiciones actualizadas, datos de partidos, estadísticas de jugadores y contenido relevante de cada equipo.</p>

    <p>Nuestro enfoque es simple: que cualquier usuario pueda consultar rápida y fácilmente cómo va su equipo, quiénes son los goleadores del torneo o cómo se está desarrollando la temporada.</p>

    <p>La página es parte de un proyecto escolar que combina diseño web, organización de datos y pasión por el fútbol.</p>
    </div>

    <div class="pregunta">
    <h2>¿Quienes somos?</h2>
    <p>Somos un grupo de estudiantes y entusiastas del fútbol que decidimos unir nuestras habilidades en desarrollo web, diseño y análisis de datos para crear un sitio dedicado al deporte que tanto nos gusta.</p>

    <p>Compartimos la misma pasión por el deporte y el objetivo de mejorar la forma en que se presenta y accede la información futbolística en línea. Este proyecto representa nuestro compromiso con la tecnología, el trabajo en equipo y, sobre todo, con el fútbol.</p>

    <p>Cada sección de la página fue pensada y diseñada para brindar una experiencia clara, útil y visualmente atractiva para quienes siguen la liga jornada tras jornada.</p>
   </div>

   <div class="integrantes">
      <h1>Integrantes</h1>

      <div class="a">
        <div class="int info-card"
             data-titulo="Juan Chiriff"
             data-detalle="Rol: Scrum Master. Responsable de la gestión del equipo y metodologías ágiles.">
          <img src="../img/tucuman.png" alt="Integrante">
          <h2>Juan Chiriff</h2>
          <h3>Scrum Master</h3>
        </div>

        <div class="int info-card"
             data-titulo="Theo Soiffer"
             data-detalle="Rol: Back-End: Desarrollo de la lógica y la gestión de la base de datos.">
          <img src="../img/huracan.png" alt="Integrante">
          <h2>Theo Soiffer</h2>
          <h3>Back-End</h3>
        </div>

        <div class="int info-card"
             data-titulo="Simón Basante"
             data-detalle="Rol: Back-End. Implementación de la API, seguridad y optimización..">
          <img src="../img/simon.jpg" alt="Integrante">
          <h2>Simón Basante</h2>
          <h3>Back-End</h3>
        </div>

        <div class="int info-card"
             data-titulo="Ciro Galiana"
             data-detalle="Rol: Front-End & Diseñador: Diseño de interfaz y desarrollo de la parte visual.">
          <img src="../img/343-logo.png" alt="Integrante">
          <h2>Ciro Galiana</h2>
          <h3>Front-End & Diseñador</h3>
        </div>

        <div class="int info-card"
             data-titulo="Benicio Lovato"
             data-detalle="Rol: Front-End & Tester: Implementación de CSS para el cliente y control de calidad de la pagina.">
          <img src="../img/boca.png" alt="Integrante">
          <h2>Benicio Lovato</h2>
          <h3>Front-End & Tester</h3>
        </div>
      </div>

      
    
   </div>
   
    </main>
        
        <div id="dynamic-tooltip">
        <h3 id="tooltip-title"></h3>
        <p id="tooltip-detail"></p>
      </div>
 <?php include 'footer.php'; ?>
</body>
</html>