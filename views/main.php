<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>343 - Noticias y Partidos</title>
  <link rel="stylesheet" href="main.css">
</head>
<body>
  
  <aside class="sidebar">
    <ul>
      <li>Más de futbol</li>
      <li>Premier league</li>
      <li>Primera B Nacional</li>
     <li><a href="../LPF/lpf.html" class="liga-link">Liga profesional de Fútbol</a></li>
    </ul>
  </aside>

  
  <main>
    
    <header class="header">
      <div class="logo"><img src="../343.png"></div>
      <div class="search-container">
        <input type="text" placeholder="Buscar...">
        <button class="user-btn">👤</button>
      </div>
    </header>

    
    <section class="noticias">
      <h2>NOTICIAS</h2>
      <div class="noticias-carrusel">
        <div class="card"> <img src="../LPF/escudos/gelp.png" alt="Noticia"><p class="texto-noticia">Se decreta el descenso de Gimnasia y Esgrima (LP)</p></div>
        <div class="card"> <img src="../LPF/escudos/godoy.png" alt="Noticia"><p class="texto-noticia">Godoy cruz cierra su estadio por remodelaciones</p> </div>
        <div class="card"> <img src="../LPF/escudos/boca.png" alt="Noticia"><p class="texto-noticia">Boca avanza a la final del Torneo Clausura</p> </div>
        <div class="card"> <img src="../LPF/escudos/huracan.png" alt="Noticia"><p class="texto-noticia">Huracan contrata a Pep Guardiola como entrenador hasta 2028</p> </div>
        <div class="card"> <img src="../LPF/escudos/platense.png" alt="Noticia"><p class="texto-noticia">Platense estrena nueva indumentaria acorde al campeonato ganado</p> </div>
        <div class="card"> <img src="../LPF/escudos/river.png" alt="Noticia"><p class="texto-noticia">Avanzan las elecciones presidenciales en river</p> </div>
      </div>
       <div class="controles">
    <button id="prev">⬅</button>
    <button id="next">➡</button>
    </div>
    </section>

    
    <section class="partidos">
      <h2>PARTIDOS DE HOY</h2>
      <div class="match">
        <img src="../LPF/escudos/boca.png" alt="Boca">
        <span>Boca Juniors</span>
        <span>VS</span>
        <span>River Plate</span>
        <img src="../LPF/escudos/river.png" alt="River">
      </div>

      <div class="match">
        <img src="../LPF/escudos/gelp.png" alt="Gimnasia">
        <span>Gimnasia y Esgrima (LP)</span>
        <span>VS</span>
        <span>Atlético Tucumán</span>
        <img src="../LPF/escudos/tucuman.png" alt="Tucumán">
      </div>

      <div class="match">
        <img src="../LPF/escudos/platense.png" alt="Platense">
        <span>Platense</span>
        <span>VS</span>
        <span>Godoy Cruz</span>
        <img src="../LPF/escudos/godoy.png" alt="Godoy Cruz">
      </div>

      <div class="match">
        <img src="../LPF/escudos/talleres.png" alt="Talleres">
        <span>Talleres (C)</span>
        <span>VS</span>
        <span>Huracán</span>
        <img src="../LPF/escudos/huracan.png" alt="Huracán">
      </div>
    </section>
  </main>
  <script src="carrusel.js"></script>
</body>
</html>