<?php
// Asegúrate de incluir la conexión a la base de datos
include '../conexion.php'; 

// C. READ: Obtener todas las noticias (simplemente las últimas 10)
$noticias_result = $conexion->query("
    SELECT id_noticia, titulo, contenido, imagen_url, fuente, fecha 
    FROM noticia 
    ORDER BY fecha DESC LIMIT 10
");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias Deportivas - Tu Portal</title>
    <link rel="stylesheet" href="../css/noticia.css"> 
</head>
<body>
      <?php include 'header.php'; ?>
    <main class="news-container">
        <h1>Últimas Noticias Deportivas</h1>

        <section class="news-grid">
            <?php if ($noticias_result->num_rows > 0): ?>
                <?php while($noticia = $noticias_result->fetch_assoc()): ?>
                    <article class="news-card">
                        <?php if ($noticia['imagen_url']): ?>
                            <div class="news-image-wrapper">
                                <img src="<?= htmlspecialchars($noticia['imagen_url']) ?>" alt="<?= htmlspecialchars($noticia['titulo']) ?>" class="news-image">
                            </div>
                        <?php endif; ?>
                        
                        <div class="news-content">
                            <h2><?= htmlspecialchars($noticia['titulo']) ?></h2>
                            <p class="news-meta">
                                📅 <?= date("d/m/Y", strtotime($noticia['fecha'])) ?> | 
                                Fuente: <span class="news-source"><?= htmlspecialchars($noticia['fuente']) ?></span>
                            </p>
                            <p><?= htmlspecialchars(substr($noticia['contenido'], 0, 150)) ?>...</p>
                            <a href="ver_noticia.php?id=<?= $noticia['id_noticia'] ?>" class="read-more">Leer Noticia Completa →</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="no-news">Aún no hay noticias publicadas.</p>
            <?php endif; ?>
        </section>
    </main>
 <?php include 'footer.php'; ?>
    </body>
</html>