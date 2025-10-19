<?php
session_start(); 
// Incluye la conexión a la base de datos (Asegúrate que la ruta sea correcta)
include '../conexion.php'; 

// 1. Obtener el ID de la noticia de la URL
$id_noticia = isset($_GET['id']) ? intval($_GET['id']) : 0;

$noticia = null;

if ($id_noticia > 0) {
    // 2. Preparar y ejecutar la consulta para obtener la noticia
    $stmt = $conexion->prepare("
        SELECT titulo, contenido, imagen_url, fuente, fecha 
        FROM noticia 
        WHERE id_noticia = ?
    ");
    $stmt->bind_param("i", $id_noticia);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $noticia = $result->fetch_assoc();
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $noticia ? htmlspecialchars($noticia['titulo']) : 'Noticia No Encontrada' ?> - Tu Portal</title>
    <link rel="stylesheet" href="./css/style.css"> 
    <link rel="stylesheet" href="../css/ver_noticia.css"> </head>
<body>
      <?php include 'header.php'; ?>
    <main class="news-detail-container">
        <?php if ($noticia): ?>
            <article class="full-article">
                <a href="noticia.php" class="back-link">← Volver a Noticias</a>
                
                <h1><?= htmlspecialchars($noticia['titulo']) ?></h1>
                
                <p class="article-meta">
                    Publicado el 📅 <?= date("d/m/Y H:i", strtotime($noticia['fecha'])) ?> | 
                    Fuente: <span class="article-source"><?= htmlspecialchars($noticia['fuente']) ?></span>
                </p>

                <?php if ($noticia['imagen_url']): ?>
                    <div class="article-image-wrapper">
                        <img src="../<?= htmlspecialchars($noticia['imagen_url']) ?>" alt="<?= htmlspecialchars($noticia['titulo']) ?>" class="article-image">
                    </div>
                <?php endif; ?>

                <div class="article-content">
                    <p><?= nl2br(htmlspecialchars($noticia['contenido'])) ?></p>
                </div>
            </article>
        <?php else: ?>
            <div class="error-box">
                <h2>Noticia No Encontrada</h2>
                <p>Lo sentimos, la noticia que buscas no existe o el enlace es incorrecto.</p>
                <a href="noticia.php" class="btn-primary">Ir a la lista de noticias</a>
            </div>
        <?php endif; ?>
    </main>
 <?php include 'footer.php'; ?>
    </body>
</html>