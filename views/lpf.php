<?php 
session_start(); 
include '../equipos.php'; 

function obtener_slug($nombre_equipo_corto) {
    global $datos_equipos;

    $mapeo = [
        'Defensa y Justicia' => 'defensayjusticia',
        'Central Córdoba' => 'centralcordoba',
        'Estudiantes' => 'estudiantes',       
        'Boca Jrs.' => 'boca',                
        'Unión' => 'union',
        'Barracas' => 'barracascentral',
        'Tigre' => 'tigre',
        'Huracán' => 'huracan',               
        'Argentinos' => 'argentinosjuniors',
        'Belgrano' => 'belgrano',
        'Racing' => 'racing',                 
        'Banfield' => 'banfield',
        'Ind. Rivadavia' => 'independienterivadavia', 
        'Newell’s' => 'newells',              
        'Aldosivi' => 'aldosivi', 
        'Riestra' => 'deportivoriestra',
        'Lanús' => 'lanus',                   
        'Vélez' => 'velez',
        'Central' => 'rosariocentral',        
        'River' => 'river',                   
        'San Lorenzo' => 'sanlorenzo',        
        'Atl. Tucumán' => 'atleticotucuman',
        'Sarmiento' => 'sarmiento',
        'Instituto' => 'instituto',           
        'San Martín' => 'sanmartin',          
        'Talleres' => 'talleres',
        'Gimnasia' => 'gimnasia',             
        'Platense' => 'platense',              
        'Godoy Cruz' => 'godoycruz',          
        'Independiente' => 'independiente',
    ];

    $slug = $mapeo[$nombre_equipo_corto] ?? '';
    return (!empty($slug) && array_key_exists($slug, $datos_equipos)) ? $slug : '';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liga Profesional Argentina - 343</title>
    <link rel="icon" href="../img/343-logo.png" type="image/png">
    <link rel="stylesheet" href="../css/lpf.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main class="layout">
        <section class="tabla-central">
            
            <div class="card">
            <h2>CLAUSURA - GRUPO A</h2>
            <table class="tabla-posiciones">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Equipo</th>
                        <th>PTS</th>
                        <th>J</th>
                        <th>Gol</th>
                        <th>+/-</th>
                        <th>G</th>
                        <th>E</th>
                        <th>P</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>1</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Defensa y Justicia'); ?>">Defensa y Justicia</a></td><td>19</td><td>12</td><td>13:10</td><td>+3</td><td>5</td><td>4</td><td>3</td></tr>
                    <tr><td>2</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Central Córdoba'); ?>">Central Córdoba</a></td><td>18</td><td>12</td><td>15:10</td><td>+5</td><td>5</td><td>3</td><td>4</td></tr>
                    <tr><td>3</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Estudiantes'); ?>">Estudiantes</a></td><td>18</td><td>12</td><td>13:8</td><td>+5</td><td>5</td><td>3</td><td>4</td></tr>
                    <tr><td>4</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Boca Jrs.'); ?>">Boca Jrs.</a></td><td>17</td><td>12</td><td>18:18</td><td>0</td><td>5</td><td>2</td><td>5</td></tr>
                    <tr><td>5</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Unión'); ?>">Unión</a></td><td>17</td><td>12</td><td>16:15</td><td>+1</td><td>5</td><td>2</td><td>5</td></tr>
                    <tr><td>6</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Barracas'); ?>">Barracas</a></td><td>17</td><td>13</td><td>11:11</td><td>0</td><td>4</td><td>5</td><td>4</td></tr>
                    <tr><td>7</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Tigre'); ?>">Tigre</a></td><td>17</td><td>13</td><td>14:9</td><td>+5</td><td>5</td><td>2</td><td>6</td></tr>
                    <tr><td>8</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Huracán'); ?>">Huracán</a></td><td>16</td><td>12</td><td>6:10</td><td>-4</td><td>4</td><td>4</td><td>4</td></tr>
                    <tr><td>9</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Argentinos'); ?>">Argentinos</a></td><td>15</td><td>12</td><td>12:9</td><td>+3</td><td>4</td><td>3</td><td>5</td></tr>
                    <tr><td>10</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Belgrano'); ?>">Belgrano</a></td><td>15</td><td>12</td><td>11:9</td><td>+2</td><td>4</td><td>3</td><td>5</td></tr>
                    <tr><td>11</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Racing'); ?>">Racing</a></td><td>15</td><td>12</td><td>13:13</td><td>0</td><td>4</td><td>3</td><td>5</td></tr>
                    <tr><td>12</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Banfield'); ?>">Banfield</a></td><td>14</td><td>12</td><td>7:13</td><td>-6</td><td>3</td><td>5</td><td>4</td></tr>
                    <tr><td>13</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Ind. Rivadavia'); ?>">Ind. Rivadavia</a></td><td>12</td><td>12</td><td>12:12</td><td>0</td><td>3</td><td>3</td><td>6</td></tr>
                    <tr><td>14</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Newell’s'); ?>">Newell’s</a></td><td>11</td><td>12</td><td>10:18</td><td>-8</td><td>2</td><td>5</td><td>5</td></tr>
                    <tr><td>15</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Aldosivi'); ?>">Aldosivi</a></td><td>9</td><td>12</td><td>5:14</td><td>-9</td><td>2</td><td>3</td><td>7</td></tr>
                </tbody>
            </table>
            </div>
            
            <div class="card">
            <h2>CLAUSURA - GRUPO B</h2>
            <table class="tabla-posiciones">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Equipo</th>
                        <th>PTS</th>
                        <th>J</th>
                        <th>Gol</th>
                        <th>+/-</th>
                        <th>G</th>
                        <th>E</th>
                        <th>P</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>1</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Riestra'); ?>">Riestra</a></td><td>23</td><td>11</td><td>16:8</td><td>+8</td><td>7</td><td>2</td><td>2</td></tr>
                    <tr><td>2</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Lanús'); ?>">Lanús</a></td><td>23</td><td>12</td><td>13:9</td><td>+4</td><td>7</td><td>2</td><td>3</td></tr>
                    <tr><td>3</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Vélez'); ?>">Vélez</a></td><td>22</td><td>12</td><td>17:9</td><td>+8</td><td>6</td><td>4</td><td>2</td></tr>
                    <tr><td>4</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Central'); ?>">Central</a></td><td>21</td><td>11</td><td>13:6</td><td>+7</td><td>5</td><td>6</td><td>0</td></tr>
                    <tr><td>5</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('River'); ?>">River</a></td><td>18</td><td>12</td><td>18:12</td><td>+6</td><td>5</td><td>3</td><td>4</td></tr>
                    <tr><td>6</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('San Lorenzo'); ?>">San Lorenzo</a></td><td>16</td><td>12</td><td>9:9</td><td>0</td><td>4</td><td>4</td><td>4</td></tr>
                    <tr><td>7</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Atl. Tucumán'); ?>">Atl. Tucumán</a></td><td>15</td><td>12</td><td>13:13</td><td>0</td><td>4</td><td>3</td><td>5</td></tr>
                    <tr><td>8</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Sarmiento'); ?>">Sarmiento</a></td><td>15</td><td>11</td><td>9:11</td><td>-2</td><td>4</td><td>3</td><td>4</td></tr>
                    <tr><td>9</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Instituto'); ?>">Instituto</a></td><td>15</td><td>12</td><td>7:11</td><td>-4</td><td>3</td><td>6</td><td>3</td></tr>
                    <tr><td>10</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('San Martín'); ?>">San Martín</a></td><td>14</td><td>12</td><td>9:11</td><td>-2</td><td>3</td><td>5</td><td>4</td></tr>
                    <tr><td>11</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Talleres'); ?>">Talleres</a></td><td>14</td><td>12</td><td>7:10</td><td>-3</td><td>3</td><td>5</td><td>4</td></tr>
                    <tr><td>12</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Gimnasia'); ?>">Gimnasia</a></td><td>13</td><td>12</td><td>8:14</td><td>-6</td><td>4</td><td>1</td><td>7</td></tr>
                    <tr><td>13</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Platense'); ?>">Platense</a></td><td>10</td><td>10</td><td>10:15</td><td>-5</td><td>2</td><td>7</td><td>1</td></tr>
                    <tr><td>14</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Godoy Cruz'); ?>">Godoy Cruz</a></td><td>10</td><td>12</td><td>9:14</td><td>-5</td><td>2</td><td>7</td><td>4</td></tr>
                    <tr><td>15</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Independiente'); ?>">Independiente</a></td><td>6</td><td>11</td><td>6:12</td><td>-6</td><td>0</td><td>6</td><td>5</td></tr>
                </tbody>
            </table>
        </div>


        <section class="estadisticas">
            <div class="card">
                <h2>GOLEADORES</h2>
                <ul class="tabla">
                    <li><span class="pos azul">1</span><a href="equipo.php?equipo=<?php echo obtener_slug('Boca Jrs.'); ?>">Juan Pérez (Boca)</a> - 15 goles</li>
                    <li><span class="pos azul">2</span><a href="equipo.php?equipo=<?php echo obtener_slug('River'); ?>">Carlos Rodríguez (River)</a> - 12 goles</li>
                    <li><span class="pos azul">3</span><a href="equipo.php?equipo=<?php echo obtener_slug('Vélez'); ?>">José Fernández (Vélez)</a> - 10 goles</li>
                    <li><span class="pos azul">4</span><a href="equipo.php?equipo=<?php echo obtener_slug('Huracán'); ?>">Marcos González (Huracán)</a> - 9 goles</li>
                    <li><span class="pos azul">5</span><a href="equipo.php?equipo=<?php echo obtener_slug('Banfield'); ?>">Lucas Martínez (Banfield)</a> - 8 goles</li>
                </ul>
            </div>

            <div class="card">
                <h2>ASISTIDORES</h2>
                <ul class="tabla">
                    <li><span class="pos azul">1</span><a href="equipo.php?equipo=<?php echo obtener_slug('River'); ?>">Martín Díaz (River)</a> - 10 asistencias</li>
                    <li><span class="pos azul">2</span><a href="equipo.php?equipo=<?php echo obtener_slug('Boca Jrs.'); ?>">Leonardo García (Boca)</a> - 8 asistencias</li>
                    <li><span class="pos azul">3</span><a href="equipo.php?equipo=<?php echo obtener_slug('Vélez'); ?>">Federico Sánchez (Vélez)</a> - 7 asistencias</li>
                    <li><span class="pos azul">4</span><a href="equipo.php?equipo=<?php echo obtener_slug('San Lorenzo'); ?>">Hernán Martínez (San Lorenzo)</a> - 6 asistencias</li>
                    <li><span class="pos azul">5</span><a href="equipo.php?equipo=<?php echo obtener_slug('Estudiantes'); ?>">Diego Rodríguez (Estudiantes)</a> - 5 asistencias</li>
                </ul>
            </div>

            <div class="card">
                <h2>AMARILLAS</h2>
                <ul class="tabla">
                    <li><span class="pos azul">1</span><a href="equipo.php?equipo=<?php echo obtener_slug('Independiente'); ?>">Tomás García (Independiente)</a> - 6 amarillas</li>
                    <li><span class="pos azul">2</span><a href="equipo.php?equipo=<?php echo obtener_slug('Central'); ?>">Diego López (Rosario Central)</a> - 5 amarillas</li>
                    <li><span class="pos azul">3</span><a href="equipo.php?equipo=<?php echo obtener_slug('Gimnasia'); ?>">Federico González (Gimnasia LP)</a> - 4 amarillas</li>
                    <li><span class="pos azul">4</span><a href="equipo.php?equipo=<?php echo obtener_slug('Atl. Tucumán'); ?>">Juan Cruz (Atlético Tucumán)</a> - 4 amarillas</li>
                    <li><span class="pos azul">5</span><a href="equipo.php?equipo=<?php echo obtener_slug('Racing'); ?>">César Rodríguez (Racing)</a> - 3 amarillas</li>
                </ul>
            </div>

            <div class="card">
                <h2>ROJAS</h2>
                <ul class="tabla">
                    <li><span class="pos azul">1</span><a href="equipo.php?equipo=<?php echo obtener_slug('Talleres'); ?>">Ramón Silva (Talleres)</a> - 2 rojas</li>
                    <li><span class="pos azul">2</span><a href="equipo.php?equipo=<?php echo obtener_slug('Independiente'); ?>">Martín Pérez (Independiente)</a> - 2 rojas</li>
                    <li><span class="pos azul">3</span><a href="equipo.php?equipo=<?php echo obtener_slug('Platense'); ?>">José Pérez (Platense)</a> - 1 roja</li>
                    <li><span class="pos azul">4</span><a href="equipo.php?equipo=<?php echo obtener_slug('Banfield'); ?>">Enzo Sánchez (Banfield)</a> - 1 roja</li>
                    <li><span class="pos azul">5</span><a href="equipo.php?equipo=<?php echo obtener_slug('Newell’s'); ?>">Lucas Rodríguez (Newell's)</a> - 1 roja</li>
                </ul>
            </div>
        </section>
    </main>
    
    <?php include 'footer.php'; ?>
</body>
</html>
