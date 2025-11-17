<?php
// ==========================================================
// Archivo de Visualización de Equipo Individual - equipo.php
// ==========================================================
session_start();

// 1. Incluir el archivo de datos de los equipos
// Asegúrate de que la ruta a equipos.php sea correcta
include '../equipos.php'; 

// 2. Obtener el slug del equipo desde la URL
$slug_equipo = $_GET['equipo'] ?? '';

// 3. Buscar los datos del equipo
if (!empty($slug_equipo) && array_key_exists($slug_equipo, $datos_equipos)) {
    $equipo = $datos_equipos[$slug_equipo];
} else {
    // Manejo de error: el equipo no existe o no se proporcionó el slug
    header("Location: error404.php"); // Redirigir a una página de error o a la principal
    exit();
}

// Variables para facilitar el uso en el HTML
$nombre_completo = $equipo['nombre_completo'];
$titulo_pagina = $equipo['titulo_pagina'];
$apodo = $equipo['apodo'];
$fundacion = $equipo['fundacion'];
$estadio = $equipo['estadio'];
$ciudad = $equipo['ciudad'];
$icono_url = $equipo['icono_url'];
$imagen_principal = $equipo['imagen_principal'];
$css_file = $equipo['css_file'] ?? '../css/default.css'; // Usa un CSS por defecto si no está definido

// 4. Determinar el CSS dinámico
$css_dinamico = $equipo['css_file'] ?? '../css/default.css';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($titulo_pagina); ?> | LPF 343</title>
    <link rel="stylesheet" href="<?php echo htmlspecialchars($css_dinamico); ?>">
    <link rel="stylesheet" href="../css/Boca.css"> 
</head>
<body>
    <?php include 'header.php'; ?>

    <main class="layout-equipo">
        <div class="perfil-header">
            <img src="../img/dyj.png" alt="Escudo de <?php echo $nombre_completo; ?>" class="equipo-escudo">
            <h1><?php echo htmlspecialchars($nombre_completo); ?></h1>
            <p class="equipo-apodo">"<?php echo htmlspecialchars($apodo); ?>"</p>
        </div>
        
        <div class="perfil-body">
            
            <section class="info-general card">
                <h2>Información General</h2>
                <ul>
                    <li>Fundación: <?php echo htmlspecialchars($fundacion); ?></li>
                    <li>Estadio: <?php echo htmlspecialchars($estadio); ?></li>
                    <li>Ciudad: <?php echo htmlspecialchars($ciudad); ?></li>
                </ul>
            </section>
            
            <section class="proximos-partidos card">
                <h2>Próximos Partidos</h2>
                <?php if (!empty($equipo['proximos_partidos'])): ?>
                    <ul class="lista-partidos">
                        <?php foreach ($equipo['proximos_partidos'] as $partido): ?>
                            <li class="<?php echo $partido['es_clasico'] ? 'clasico' : ''; ?>">
                                <span><?php echo htmlspecialchars($partido['dia']); ?></span> | 
                                <?php echo htmlspecialchars($partido['rival']); ?> (<?php echo htmlspecialchars($partido['lv']); ?>) | 
                                Hora: <?php echo htmlspecialchars($partido['hora']); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>No hay próximos partidos registrados.</p>
                <?php endif; ?>
            </section>
            
            <section class="resultados-recientes card">
                <h2>Últimos Resultados</h2>
                <?php if (!empty($equipo['resultados'])): ?>
                    <ul class="lista-resultados">
                        <?php foreach ($equipo['resultados'] as $resultado): ?>
                            <li class="<?php echo htmlspecialchars($resultado['clase_resultado']); ?>">
                                <span><?php echo htmlspecialchars($resultado['dia']); ?></span> | 
                                <?php echo htmlspecialchars($resultado['rival']); ?> (<?php echo htmlspecialchars($resultado['lv']); ?>) | 
                                <span class="<?php echo htmlspecialchars($resultado['clase_score']); ?>"><?php echo htmlspecialchars($resultado['resultado']); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>No hay resultados recientes registrados.</p>
                <?php endif; ?>
            </section>

            <section class="plantel-completo card">
                <h2>Plantel y Cuerpo Técnico</h2>
                <?php 
                $posiciones = [
                    'DIR' => 'Cuerpo Técnico',
                    'ARQ' => 'Arqueros',
                    'DEF' => 'Defensores',
                    'MED' => 'Mediocampistas',
                    'DEL' => 'Delanteros'
                ];
                foreach ($posiciones as $clave => $nombre_posicion): 
                    if (!empty($equipo['plantel'][$clave])):
                ?>
                    <h3><?php echo htmlspecialchars($nombre_posicion); ?></h3>
                    <table class="tabla-plantel">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Rol</th>
                                <th>Edad</th>
                                <th>Altura</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($equipo['plantel'][$clave] as $jugador): ?>
                                <tr>
                                    <td><?php echo $jugador['numero'] ?? 'DT'; ?></td>
                                    <td><?php echo htmlspecialchars($jugador['nombre']); ?></td>
                                    <td><?php echo htmlspecialchars($jugador['rol']); ?></td>
                                    <td><?php echo htmlspecialchars($jugador['edad']); ?></td>
                                    <td><?php echo htmlspecialchars($jugador['altura']); ?> m</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php 
                    endif; 
                endforeach; 
                ?>
            </section>
            
            <section class="stats-individuales card">
                <div class="goleadores">
                    <h3>Máximos Goleadores</h3>
                    <ul>
                        <?php if (!empty($equipo['goles'])): ?>
                            <?php foreach ($equipo['goles'] as $jugador): ?>
                                <li><?php echo htmlspecialchars($jugador['nombre']); ?> - <?php echo htmlspecialchars($jugador['cantidad']); ?> goles</li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li>Sin datos de goles.</li>
                        <?php endif; ?>
                    </ul>
                </div>
                
                <div class="asistidores">
                    <h3>Máximos Asistidores</h3>
                    <ul>
                        <?php if (!empty($equipo['asistencias'])): ?>
                            <?php foreach ($equipo['asistencias'] as $jugador): ?>
                                <li><?php echo htmlspecialchars($jugador['nombre']); ?> - <?php echo htmlspecialchars($jugador['cantidad']); ?> asistencias</li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li>Sin datos de asistencias.</li>
                        <?php endif; ?>
                    </ul>
                </div>
            </section>

        </div>
    </main>
    
    <?php include 'footer.php'; ?>
</body>
</html>