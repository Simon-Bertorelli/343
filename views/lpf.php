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
                <table class="tabla-estadisticas">
                    <thead>
                        <tr><th>#</th><th>Jugador</th><th>Equipo</th><th>Goles</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>1</td><td>Juan Pérez</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Boca Jrs.'); ?>">Boca</a></td><td>15</td></tr>
                        <tr><td>2</td><td>Carlos Rodríguez</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('River'); ?>">River</a></td><td>12</td></tr>
                        <tr><td>3</td><td>José Fernández</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Vélez'); ?>">Vélez</a></td><td>10</td></tr>
                        <tr><td>4</td><td>Marcos González</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Huracán'); ?>">Huracán</a></td><td>9</td></tr>
                        <tr><td>5</td><td>Lucas Martínez</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Banfield'); ?>">Banfield</a></td><td>8</td></tr>
                    </tbody>
                </table>
            </div>

            <div class="card">
                <h2>ASISTIDORES</h2>
                <table class="tabla-estadisticas">
                    <thead>
                        <tr><th>#</th><th>Jugador</th><th>Equipo</th><th>Asistencias</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>1</td><td>Martín Díaz</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('River'); ?>">River</a></td><td>10</td></tr>
                        <tr><td>2</td><td>Leonardo García</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Boca Jrs.'); ?>">Boca</a></td><td>8</td></tr>
                        <tr><td>3</td><td>Federico Sánchez</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Vélez'); ?>">Vélez</a></td><td>7</td></tr>
                        <tr><td>4</td><td>Hernán Martínez</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('San Lorenzo'); ?>">San Lorenzo</a></td><td>6</td></tr>
                        <tr><td>5</td><td>Diego Rodríguez</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Estudiantes'); ?>">Estudiantes</a></td><td>5</td></tr>
                    </tbody>
                </table>
            </div>

            <div class="card">
                <h2>AMARILLAS</h2>
                <table class="tabla-estadisticas">
                    <thead>
                        <tr><th>#</th><th>Jugador</th><th>Equipo</th><th>Amarillas</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>1</td><td>Tomás García</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Independiente'); ?>">Independiente</a></td><td>6</td></tr>
                        <tr><td>2</td><td>Diego López</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Central'); ?>">Rosario Central</a></td><td>5</td></tr>
                        <tr><td>3</td><td>Federico González</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Gimnasia'); ?>">Gimnasia</a></td><td>4</td></tr>
                        <tr><td>4</td><td>Juan Cruz</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Atl. Tucumán'); ?>">Atl. Tucumán</a></td><td>4</td></tr>
                        <tr><td>5</td><td>César Rodríguez</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Racing'); ?>">Racing</a></td><td>3</td></tr>
                    </tbody>
                </table>
            </div>

            <div class="card">
                <h2>ROJAS</h2>
                <table class="tabla-estadisticas">
                    <thead>
                        <tr><th>#</th><th>Jugador</th><th>Equipo</th><th>Rojas</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>1</td><td>Ramón Silva</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Talleres'); ?>">Talleres</a></td><td>2</td></tr>
                        <tr><td>2</td><td>Martín Pérez</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Independiente'); ?>">Independiente</a></td><td>2</td></tr>
                        <tr><td>3</td><td>José Pérez</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Platense'); ?>">Platense</a></td><td>1</td></tr>
                        <tr><td>4</td><td>Enzo Sánchez</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Banfield'); ?>">Banfield</a></td><td>1</td></tr>
                        <tr><td>5</td><td>Lucas Rodríguez</td><td><a href="equipo.php?equipo=<?php echo obtener_slug('Newell’s'); ?>">Newell’s</a></td><td>1</td></tr>
                    </tbody>
                </table>
            </div>
        </section>

    </main>
    
    <?php include 'footer.php'; ?>
</body>
</html>
