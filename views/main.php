<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>343 - Noticias y Partidos</title>
  <link rel="stylesheet" href="../css/main.css">
  <script src="../js/carrusel.js" defer></script>
</head>
<body>
  
  <aside class="sidebar">
    <ul>
      <li><a href="foro.php">Foro</a></li>
      <li><a href="../views/lpf.php" class="liga-link">Liga profesional de Fútbol</a></li>
      <li><a href="../logout.php" class="nav-link">Cerrar sesión</a></li>
      <li><a href="../admin_crud.php" class="nav-link admin-link">Administracion</a></li>
    </ul>
  </aside>

  <main>
    
    <header class="header">
      <div class="header-content">
        <div class="logo">
          <img src="../img/343-solo.png" alt="Logo 343">
        </div>
        <div class="search-container">
          <input type="text" placeholder="Buscar...">
          <button class="user-btn">👤</button>
        </div>
      </div>
    </header>

    
    <section class="noticias">
      <h2>NOTICIAS</h2>
      <div class="noticias-carrusel-wrapper">
        <div class="noticias-carrusel">
          <div class="card"> 
            <img src="../img/gelp.png" alt="Noticia"><p class="texto-noticia">Se decreta el descenso de Gimnasia y Esgrima (LP)</p>
          </div>
          <div class="card"> 
            <img src="../img/godoy.png" alt="Noticia"><p class="texto-noticia">Godoy cruz cierra su estadio por remodelaciones</p> 
          </div>
          <div class="card"> 
            <img src="../img/boca.png" alt="Noticia"><p class="texto-noticia">Boca avanza a la final del Torneo Clausura</p> 
          </div>
          <div class="card"> 
            <img src="../img/huracan.png" alt="Noticia"><p class="texto-noticia">Huracan contrata a Pep Guardiola como entrenador hasta 2028</p> 
          </div>
          <div class="card"> 
            <img src="../img/platense.png" alt="Noticia"><p class="texto-noticia">Platense estrena nueva indumentaria acorde al campeonato ganado</p> 
          </div>
          <div class="card"> 
            <img src="../img/riber.png" alt="Noticia"><p class="texto-noticia">Avanzan las elecciones presidenciales en river</p> 
          </div>
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
        <div class="match">
          <img src="../img/boca.png" alt="Boca">
          <span class="team-name">Boca Juniors</span>
          <span class="vs">VS</span>
          <span class="team-name">River Plate</span>
          <img src="../img/riber.png" alt="River">
        </div>

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
  </main>
</body>
</html>