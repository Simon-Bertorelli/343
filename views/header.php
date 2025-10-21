<link rel="stylesheet" href="../css/header.css">
<header class="header">
    <div class="logo">
      <a href="main.php"><img src="../img/343-solo.png" alt="Logo 343"></a>
    </div>
    <nav>
      <ul>
        <li><a href="main.php">Inicio</a></li>
        <!-- ¡ELIMINADO DE AQUÍ! <li><a href="usuario.php">Usuario</a></li> -->
        <li>Partidos</li>
        <li>Contacto</li>
        <li><a href="noticia.php">Noticias</a></li>
        <?php   
        if (isset($_SESSION['usuario_id'])) {
        ?>
          
         <li><a href="grupos.php">Foro</a></li>
            
        <?php
          } 
        ?>
        <li><a href="lpf.php">Liga Profesional</a></li>
        <li><a href="sobreNos.php">Sobre Nosotros</a></li>
      </ul>
    </nav>
    
    <!-- CONTENEDOR DERECHO AJUSTADO -->
    <div class="user-actions">
    <?php
    // --- LÓGICA DE SESIÓN PARA BOTONES ---
    
    
    if (isset($_SESSION['usuario_id'])) {
    ?>
        <!-- ÍCONO DE PERFIL CIRCULAR -->
        <a href="usuario.php" title="Ir a mi Perfil">
            <!-- Usaremos una imagen temporal, usted la reemplazaría con la ruta a la foto de perfil del usuario -->
            <img src="../img/user-sin-foto.png" alt="Perfil" class="profile-icon">
        </a>
        <a href="../logout.php"><button class="volver">Cerrar Sesión</button></a>
    <?php
   
    } else {
    ?>
        <a href="../Inicio-sesion-html.php"><button class="iniciar-sesion">Iniciar Sesión</button></a>
    <?php
    }
    
    ?>
    </div>
</header>
