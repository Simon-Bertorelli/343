<?php
// header.php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$foto_header_path = '../img/user-sin-foto.png'; // Imagen por defecto

if (isset($_SESSION['usuario_id'])) {
    // DATOS DE CONEXIÓN
    $h_server = "localhost";
    $h_user = "root";
    $h_pass = "";
    $h_db = "343db";

    // USAMOS $conn_header PARA QUE NO CHOQUE CON OTRAS PÁGINAS
    $conn_header = new mysqli($h_server, $h_user, $h_pass, $h_db);

    if (!$conn_header->connect_error) {
        $h_uid = $_SESSION['usuario_id'];
        $h_sql = "SELECT foto_perfil FROM usuario WHERE id_usuario = ?";
        
        if ($h_stmt = $conn_header->prepare($h_sql)) {
            $h_stmt->bind_param("i", $h_uid);
            $h_stmt->execute();
            $h_res = $h_stmt->get_result();
            
            if ($h_res->num_rows > 0) {
                $h_row = $h_res->fetch_assoc();
                if (!empty($h_row['foto_perfil'])) {
                    $foto_header_path = $h_row['foto_perfil'];
                    
                    // Corrección de ruta si viene de uploads
                    if (strpos($foto_header_path, 'uploads/') !== false && strpos($foto_header_path, '../') === false) {
                        $foto_header_path = '../' . $foto_header_path;
                    }
                }
            }
            $h_stmt->close();
        }
        // CERRAMOS SOLO LA CONEXIÓN DEL HEADER
        $conn_header->close();
    }
}
?>
<link rel="stylesheet" href="../css/header.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<header class="header">
    <div class="logo">
        <a href="main.php"><img src="../img/343-solo.png" alt="Logo 343"></a>
    </div>

    <input type="checkbox" id="menu-toggle">

    <nav class="nav-menu">
        <ul>
            <li><a href="main.php">Inicio</a></li>
            <li><a href="partidos.php">Partidos</a></li>
            <li><a href="contacto.php">Contacto</a></li>
            <li><a href="noticia.php">Noticias</a></li>
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <li><a href="grupos.php">Foro</a></li>
            <?php endif; ?>
            <li><a href="lpf.php">Liga Profesional</a></li>
            <li><a href="sobreNos.php">Sobre Nosotros</a></li>
        </ul>
    </nav>

    <label for="menu-toggle" class="hamburger">
        <span></span><span></span><span></span>
    </label>

    <div class="user-actions">
        <?php if (isset($_SESSION['usuario_id'])): ?>
            <a href="usuario.php" title="Ir a mi Perfil">
                <img src="<?php echo htmlspecialchars($foto_header_path); ?>" alt="Perfil" class="profile-icon" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
            </a>
            <a href="../logout.php"><button class="volver">Cerrar Sesión</button></a>
        <?php else: ?>
            <a href="../Inicio-sesion-html.php"><button class="iniciar-sesion">Iniciar Sesión</button></a>
        <?php endif; ?>
    </div>
</header>