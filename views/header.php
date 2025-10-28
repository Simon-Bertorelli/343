<link rel="stylesheet" href="../css/header.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<header class="header">
    <!-- LOGO -->
    <div class="logo">
        <a href="main.php"><img src="../img/343-solo.png" alt="Logo 343"></a>
    </div>

    <!-- Checkbox oculto para controlar el menú -->
    <input type="checkbox" id="menu-toggle">

    <!-- NAVEGACIÓN PRINCIPAL -->
    <nav class="nav-menu">
        <ul>
            <li><a href="main.php">Inicio</a></li>
            <li>Partidos</li>
            <li>Contacto</li>
            <li><a href="noticia.php">Noticias</a></li>

            <?php if (isset($_SESSION['usuario_id'])): ?>
                <li><a href="grupos.php">Foro</a></li>
            <?php endif; ?>

            <li><a href="lpf.php">Liga Profesional</a></li>
            <li><a href="sobreNos.php">Sobre Nosotros</a></li>
        </ul>
    </nav>

    <!-- ÍCONO HAMBURGUESA -->
    <label for="menu-toggle" class="hamburger">
        <span></span>
        <span></span>
        <span></span>
    </label>

    <!-- ACCIONES DE USUARIO -->
    <div class="user-actions">
        <?php if (isset($_SESSION['usuario_id'])): ?>
            <a href="usuario.php" title="Ir a mi Perfil">
                <img src="../img/user-sin-foto.png" alt="Perfil" class="profile-icon">
            </a>
            <a href="../logout.php"><button class="volver">Cerrar Sesión</button></a>
        <?php else: ?>
            <a href="../Inicio-sesion-html.php"><button class="iniciar-sesion">Iniciar Sesión</button></a>
        <?php endif; ?>
    </div>
</header>
