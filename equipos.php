<?php
// ===============================================
// Archivo de Configuración de Equipos - equipos.php
// ===============================================
$datos_equipos = [
    
    // --- ALDOSIVI ---
    'aldosivi' => [
        'nombre_slug' => 'aldosivi',
        'nombre_completo' => 'CLUB ATLÉTICO ALDOSIVI',
        'titulo_pagina' => 'ALDOSIVI HOY',
        'apodo' => 'Tiburón',
        'fundacion' => '1913',
        'estadio' => 'José María Minella',
        'ciudad' => 'Mar del Plata',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/2/2f/Club_Aldosivi.png',
        'imagen_principal' => '../img/aldosivi.png',
        'proximos_partidos' => [
            ['dia' => '10/11', 'lv' => 'L', 'rival' => 'Banfield', 'hora' => '15:00', 'es_clasico' => false],
            ['dia' => '17/11', 'lv' => 'V', 'rival' => 'Barracas Central', 'hora' => '18:30', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '03/11', 'lv' => 'L', 'rival' => 'Argentinos Juniors', 'resultado' => '1-1', 'clase_resultado' => 'result-draw', 'clase_score' => 'score-draw'],
            ['dia' => '27/10', 'lv' => 'V', 'rival' => 'Atlético Tucumán', 'resultado' => '0-2', 'clase_resultado' => 'result-loss', 'clase_score' => 'score-loss'],
        ],
        'goles' => [
            ['nombre' => 'Piatti', 'cantidad' => 8],
            ['nombre' => 'Cauteruccio', 'cantidad' => 6],
        ],
        'asistencias' => [
            ['nombre' => 'Lodiero', 'cantidad' => 5],
            ['nombre' => 'Maciel', 'cantidad' => 3],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Fernando Gago', 'rol' => 'Entrenador', 'edad' => '39', 'nacimiento' => '10/04/1986', 'altura' => '1.78', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'José Devecchi', 'rol' => 'Arquero', 'edad' => '29', 'nacimiento' => '09/07/1995', 'altura' => '1.89', 'numero' => 1, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Emanuel Iñiguez', 'rol' => 'Defensor', 'edad' => '28', 'nacimiento' => '25/09/1996', 'altura' => '1.80', 'numero' => 4, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Santiago Lodiero', 'rol' => 'Mediocampista', 'edad' => '26', 'nacimiento' => '15/03/1998', 'altura' => '1.75', 'numero' => 10, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Ignacio Piatti', 'rol' => 'Delantero', 'edad' => '40', 'nacimiento' => '04/02/1985', 'altura' => '1.81', 'numero' => 7, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- ARGENTINOS JUNIORS ---
    'argentinosjuniors' => [
        'nombre_slug' => 'argentinosjuniors',
        'nombre_completo' => 'ASOCIACIÓN ATLÉTICA ARGENTINOS JUNIORS',
        'titulo_pagina' => 'ARGENTINOS JUNIORS HOY',
        'apodo' => 'Bichos Colorados',
        'fundacion' => '1904',
        'estadio' => 'Diego Armando Maradona',
        'ciudad' => 'Buenos Aires',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/3/34/Asociaci%C3%B3n_Atl%C3%A9tica_Argentinos_Juniors_%28escudo%29.png',
        'imagen_principal' => '../img/argentinosjuniors.png',
        'proximos_partidos' => [
            ['dia' => '11/11', 'lv' => 'V', 'rival' => 'Atlético Tucumán', 'hora' => '20:00', 'es_clasico' => false],
            ['dia' => '18/11', 'lv' => 'L', 'rival' => 'Banfield', 'hora' => '16:00', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '04/11', 'lv' => 'L', 'rival' => 'Barracas Central', 'resultado' => '2-1', 'clase_resultado' => 'result-win', 'clase_score' => 'score-win'],
            ['dia' => '28/10', 'lv' => 'V', 'rival' => 'Belgrano', 'resultado' => '0-0', 'clase_resultado' => 'result-draw', 'clase_score' => 'score-draw'],
        ],
        'goles' => [
            ['nombre' => 'Avalos', 'cantidad' => 9],
            ['nombre' => 'Gondou', 'cantidad' => 7],
        ],
        'asistencias' => [
            ['nombre' => 'Montiel', 'cantidad' => 4],
            ['nombre' => 'Lescano', 'cantidad' => 3],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Pablo Guede', 'rol' => 'Entrenador', 'edad' => '50', 'nacimiento' => '12/11/1974', 'altura' => '1.78', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Diego Rodríguez', 'rol' => 'Arquero', 'edad' => '35', 'nacimiento' => '25/06/1989', 'altura' => '1.84', 'numero' => 1, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Tobias Palacio', 'rol' => 'Defensor', 'edad' => '25', 'nacimiento' => '11/01/1999', 'altura' => '1.85', 'numero' => 4, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Alan Lescano', 'rol' => 'Mediocampista', 'edad' => '22', 'nacimiento' => '11/11/2002', 'altura' => '1.82', 'numero' => 22, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Gaston Verón', 'rol' => 'Delantero', 'edad' => '23', 'nacimiento' => '23/04/2001', 'altura' => '1.84', 'numero' => 10, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- ATLÉTICO TUCUMÁN ---
    'atleticotucuman' => [
        'nombre_slug' => 'atleticotucuman',
        'nombre_completo' => 'CLUB ATLÉTICO TUCUMÁN',
        'titulo_pagina' => 'ATLÉTICO TUCUMÁN HOY',
        'apodo' => 'Decano',
        'fundacion' => '1902',
        'estadio' => 'Monumental José Fierro',
        'ciudad' => 'Tucumán',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/8/88/Escudo_del_Club_Atl%C3%A9tico_Tucum%C3%A1n.svg',
        'imagen_principal' => '../img/atleticotucuman.png',
        'proximos_partidos' => [
            ['dia' => '12/11', 'lv' => 'L', 'rival' => 'Belgrano', 'hora' => '19:00', 'es_clasico' => false],
            ['dia' => '19/11', 'lv' => 'V', 'rival' => 'Boca Juniors', 'hora' => '21:00', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '05/11', 'lv' => 'V', 'rival' => 'Banfield', 'resultado' => '1-0', 'clase_resultado' => 'result-win', 'clase_score' => 'score-win'],
            ['dia' => '29/10', 'lv' => 'L', 'rival' => 'Barracas Central', 'resultado' => '2-2', 'clase_resultado' => 'result-draw', 'clase_score' => 'score-draw'],
        ],
        'goles' => [
            ['nombre' => 'Estigarribia', 'cantidad' => 8],
            ['nombre' => 'Tesuri', 'cantidad' => 5],
        ],
        'asistencias' => [
            ['nombre' => 'Infante', 'cantidad' => 4],
            ['nombre' => 'Acosta', 'cantidad' => 3],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Facundo Sava', 'rol' => 'Entrenador', 'edad' => '51', 'nacimiento' => '07/03/1974', 'altura' => '1.89', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Tomás Durso', 'rol' => 'Arquero', 'edad' => '25', 'nacimiento' => '26/02/1999', 'altura' => '1.85', 'numero' => 1, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Matías de los Santos', 'rol' => 'Defensor', 'edad' => '31', 'nacimiento' => '22/11/1992', 'altura' => '1.87', 'numero' => 3, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Renzo Tesuri', 'rol' => 'Mediocampista', 'edad' => '28', 'nacimiento' => '07/06/1996', 'altura' => '1.65', 'numero' => 18, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Marcelo Estigarribia', 'rol' => 'Delantero', 'edad' => '29', 'nacimiento' => '21/09/1995', 'altura' => '1.76', 'numero' => 9, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- BANFIELD ---
    'banfield' => [
        'nombre_slug' => 'banfield',
        'nombre_completo' => 'CLUB ATLÉTICO BANFIELD',
        'titulo_pagina' => 'BANFIELD HOY',
        'apodo' => 'Taladro',
        'fundacion' => '1896',
        'estadio' => 'Florencio Sola',
        'ciudad' => 'Banfield',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/4/43/Club_Atl%C3%A9tico_Banfield_%28escudo%29.png',
        'imagen_principal' => '../img/banfield.png',
        'proximos_partidos' => [
            ['dia' => '13/11', 'lv' => 'V', 'rival' => 'Barracas Central', 'hora' => '17:00', 'es_clasico' => false],
            ['dia' => '20/11', 'lv' => 'L', 'rival' => 'Belgrano', 'hora' => '19:30', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '06/11', 'lv' => 'L', 'rival' => 'Boca Juniors', 'resultado' => '0-1', 'clase_resultado' => 'result-loss', 'clase_score' => 'score-loss'],
            ['dia' => '30/10', 'lv' => 'V', 'rival' => 'Central Córdoba', 'resultado' => '2-1', 'clase_resultado' => 'result-win', 'clase_score' => 'score-win'],
        ],
        'goles' => [
            ['nombre' => 'Giménez', 'cantidad' => 7],
            ['nombre' => 'Sepúlveda', 'cantidad' => 4],
        ],
        'asistencias' => [
            ['nombre' => 'Rodríguez', 'cantidad' => 3],
            ['nombre' => 'Galván', 'cantidad' => 2],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Julio César Falcioni', 'rol' => 'Entrenador', 'edad' => '68', 'nacimiento' => '20/07/1956', 'altura' => '1.83', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Facundo Sanguinetti', 'rol' => 'Arquero', 'edad' => '23', 'nacimiento' => '23/03/2001', 'altura' => '1.84', 'numero' => 1, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Alejandro Maciel', 'rol' => 'Defensor', 'edad' => '27', 'nacimiento' => '22/10/1996', 'altura' => '1.83', 'numero' => 37, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Jesús Soraire', 'rol' => 'Mediocampista', 'edad' => '35', 'nacimiento' => '03/12/1988', 'altura' => '1.75', 'numero' => 8, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Milton Giménez', 'rol' => 'Delantero', 'edad' => '28', 'nacimiento' => '13/08/1996', 'altura' => '1.84', 'numero' => 9, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- BARRACAS CENTRAL ---
    'barracascentral' => [
        'nombre_slug' => 'barracascentral',
        'nombre_completo' => 'CLUB ATLÉTICO BARRACAS CENTRAL',
        'titulo_pagina' => 'BARRACAS CENTRAL HOY',
        'apodo' => 'Guapo',
        'fundacion' => '1904',
        'estadio' => 'Claudio "Chiqui" Tapia',
        'ciudad' => 'Buenos Aires',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/2/2f/Escudo_del_Club_Atl%C3%A9tico_Barracas_Central.png',
        'imagen_principal' => '../img/barracascentral.png',
        'proximos_partidos' => [
            ['dia' => '14/11', 'lv' => 'L', 'rival' => 'Belgrano', 'hora' => '15:30', 'es_clasico' => false],
            ['dia' => '21/11', 'lv' => 'V', 'rival' => 'Boca Juniors', 'hora' => '18:00', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '07/11', 'lv' => 'V', 'rival' => 'Central Córdoba', 'resultado' => '1-1', 'clase_resultado' => 'result-draw', 'clase_score' => 'score-draw'],
            ['dia' => '31/10', 'lv' => 'L', 'rival' => 'Defensa y Justicia', 'resultado' => '0-2', 'clase_resultado' => 'result-loss', 'clase_score' => 'score-loss'],
        ],
        'goles' => [
            ['nombre' => 'Zalazar', 'cantidad' => 6],
            ['nombre' => 'Candelos', 'cantidad' => 4],
        ],
        'asistencias' => [
            ['nombre' => 'Mater', 'cantidad' => 3],
            ['nombre' => 'Rosané', 'cantidad' => 2],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Sergio Rondina', 'rol' => 'Entrenador', 'edad' => '53', 'nacimiento' => '11/03/1971', 'altura' => '1.70', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Sebastián Moyano', 'rol' => 'Arquero', 'edad' => '34', 'nacimiento' => '26/08/1990', 'altura' => '1.88', 'numero' => 25, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Gonzalo Goñi', 'rol' => 'Defensor', 'edad' => '26', 'nacimiento' => '16/08/1998', 'altura' => '1.84', 'numero' => 14, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Rodrigo Herrera', 'rol' => 'Mediocampista', 'edad' => '23', 'nacimiento' => '02/08/2000', 'altura' => '1.81', 'numero' => 5, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Alexis Domínguez', 'rol' => 'Delantero', 'edad' => '27', 'nacimiento' => '30/10/1996', 'altura' => '1.85', 'numero' => 9, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- BELGRANO ---
    'belgrano' => [
        'nombre_slug' => 'belgrano',
        'nombre_completo' => 'CLUB ATLÉTICO BELGRANO',
        'titulo_pagina' => 'BELGRANO HOY',
        'apodo' => 'Pirata',
        'fundacion' => '1905',
        'estadio' => 'Julio César Villagra',
        'ciudad' => 'Córdoba',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/6/6f/Escudo_del_Club_Atl%C3%A9tico_Belgrano_%28C%C3%B3rdoba%29.svg',
        'imagen_principal' => '../img/belgrano.png',
        'proximos_partidos' => [
            ['dia' => '15/11', 'lv' => 'V', 'rival' => 'Boca Juniors', 'hora' => '20:30', 'es_clasico' => false],
            ['dia' => '22/11', 'lv' => 'L', 'rival' => 'Central Córdoba', 'hora' => '17:00', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '08/11', 'lv' => 'L', 'rival' => 'Defensa y Justicia', 'resultado' => '1-0', 'clase_resultado' => 'result-win', 'clase_score' => 'score-win'],
            ['dia' => '01/11', 'lv' => 'V', 'rival' => 'Deportivo Riestra', 'resultado' => '2-2', 'clase_resultado' => 'result-draw', 'clase_score' => 'score-draw'],
        ],
        'goles' => [
            ['nombre' => 'Passerini', 'cantidad' => 7],
            ['nombre' => 'Reyna', 'cantidad' => 5],
        ],
        'asistencias' => [
            ['nombre' => 'Longo', 'cantidad' => 4],
            ['nombre' => 'Sánchez', 'cantidad' => 3],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Franco Jara', 'rol' => 'Entrenador', 'edad' => '36', 'nacimiento' => '15/07/1988', 'altura' => '1.79', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Ignacio Chicco', 'rol' => 'Arquero', 'edad' => '28', 'nacimiento' => '19/06/1996', 'altura' => '1.84', 'numero' => 1, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Mariano Troilo', 'rol' => 'Defensor', 'edad' => '21', 'nacimiento' => '10/03/2003', 'altura' => '1.91', 'numero' => 37, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Santiago Longo', 'rol' => 'Mediocampista', 'edad' => '26', 'nacimiento' => '12/04/1998', 'altura' => '1.77', 'numero' => 5, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Lucas Passerini', 'rol' => 'Delantero', 'edad' => '30', 'nacimiento' => '16/07/1994', 'altura' => '1.88', 'numero' => 9, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- BOCA JUNIORS (Del template, completado plantel) ---
    'boca' => [
        'nombre_slug' => 'boca',
        'nombre_completo' => 'BOCA JUNIORS',
        'titulo_pagina' => 'BOCA JUNIORS HOY',
        'apodo' => 'Xeneizes',
        'fundacion' => '1905',
        'estadio' => 'La Bombonera',
        'ciudad' => 'Buenos Aires',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/e/e0/Escudo_del_Club_Atl%C3%A9tico_Boca_Juniors.png',
        'imagen_principal' => '../img/boca.png',
        'proximos_partidos' => [
            ['dia' => '09/11', 'lv' => 'L', 'rival' => 'River Plate', 'hora' => '16:00', 'es_clasico' => true],
            ['dia' => '16/11', 'lv' => 'L', 'rival' => 'Tigre', 'hora' => '14:00', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '02/11', 'lv' => 'V', 'rival' => 'Estudiantes', 'resultado' => '1-2', 'clase_resultado' => 'result-win', 'clase_score' => 'score-win'],
            ['dia' => '27/10', 'lv' => 'V', 'rival' => 'Barracas', 'resultado' => '1-3', 'clase_resultado' => 'result-win', 'clase_score' => 'score-win'],
            ['dia' => '18/10', 'lv' => 'L', 'rival' => 'Belgrano', 'resultado' => '1-2', 'clase_resultado' => 'result-loss', 'clase_score' => 'score-loss'],
        ],
        'goles' => [
            ['nombre' => 'Merentiel', 'cantidad' => 10],
            ['nombre' => 'Giménez', 'cantidad' => 9],
            ['nombre' => 'Zeballos', 'cantidad' => 4],
            ['nombre' => 'Cavani', 'cantidad' => 3],
        ],
        'asistencias' => [
            ['nombre' => 'Palacios', 'cantidad' => 4],
            ['nombre' => 'Merentiel', 'cantidad' => 3],
            ['nombre' => 'Paredes', 'cantidad' => 3],
            ['nombre' => 'Giménez', 'cantidad' => 2],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Claudio Ubeda', 'rol' => 'Entrenador', 'edad' => '56', 'nacimiento' => '17/09/1969', 'altura' => '1.80', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Leandro Brey', 'rol' => 'Arquero', 'edad' => '23', 'nacimiento' => '21/09/2002', 'altura' => '1.91', 'numero' => 12, 'es_dt' => false],
                ['nombre' => 'Javier García', 'rol' => 'Arquero', 'edad' => '38', 'nacimiento' => '29/01/1987', 'altura' => '1.80', 'numero' => 1, 'es_dt' => false],
                ['nombre' => 'Agustín Marchesín', 'rol' => 'Arquero', 'edad' => '37', 'nacimiento' => '16/03/1988', 'altura' => '1.88', 'numero' => 25, 'es_dt' => false],
                ['nombre' => 'Sergio Romero', 'rol' => 'Arquero', 'edad' => '38', 'nacimiento' => '22/02/1987', 'altura' => '1.92', 'numero' => 20, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Luis Advíncula', 'rol' => 'Defensor', 'edad' => '35', 'nacimiento' => '02/03/1990', 'altura' => '1.78', 'numero' => 17, 'es_dt' => false],
                ['nombre' => 'Marcos Rojo', 'rol' => 'Defensor', 'edad' => '35', 'nacimiento' => '20/03/1990', 'altura' => '1.87', 'numero' => 6, 'es_dt' => false],
                ['nombre' => 'Cristian Lema', 'rol' => 'Defensor', 'edad' => '34', 'nacimiento' => '24/03/1990', 'altura' => '1.90', 'numero' => 2, 'es_dt' => false],
                ['nombre' => 'Nicolás Figal', 'rol' => 'Defensor', 'edad' => '31', 'nacimiento' => '03/04/1994', 'altura' => '1.80', 'numero' => 4, 'es_dt' => false],
                ['nombre' => 'Marcelo Saracchi', 'rol' => 'Defensor', 'edad' => '27', 'nacimiento' => '23/04/1998', 'altura' => '1.72', 'numero' => 3, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Pol Fernández', 'rol' => 'Mediocampista', 'edad' => '33', 'nacimiento' => '11/10/1991', 'altura' => '1.76', 'numero' => 8, 'es_dt' => false],
                ['nombre' => 'Cristian Medina', 'rol' => 'Mediocampista', 'edad' => '23', 'nacimiento' => '01/06/2002', 'altura' => '1.76', 'numero' => 36, 'es_dt' => false],
                ['nombre' => 'Kevin Zenón', 'rol' => 'Mediocampista', 'edad' => '23', 'nacimiento' => '30/07/2001', 'altura' => '1.77', 'numero' => 22, 'es_dt' => false],
                ['nombre' => 'Ezequiel Fernández', 'rol' => 'Mediocampista', 'edad' => '22', 'nacimiento' => '02/07/2002', 'altura' => '1.78', 'numero' => 21, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Miguel Merentiel', 'rol' => 'Delantero', 'edad' => '29', 'nacimiento' => '24/02/1996', 'altura' => '1.76', 'numero' => 16, 'es_dt' => false],
                ['nombre' => 'Edinson Cavani', 'rol' => 'Delantero', 'edad' => '38', 'nacimiento' => '14/02/1987', 'altura' => '1.84', 'numero' => 10, 'es_dt' => false],
                ['nombre' => 'Exequiel Zeballos', 'rol' => 'Delantero', 'edad' => '23', 'nacimiento' => '24/04/2002', 'altura' => '1.70', 'numero' => 7, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- CENTRAL CÓRDOBA (SDE) ---
    'centralcordoba' => [
        'nombre_slug' => 'centralcordoba',
        'nombre_completo' => 'CLUB ATLÉTICO CENTRAL CÓRDOBA (SDE)',
        'titulo_pagina' => 'CENTRAL CÓRDOBA HOY',
        'apodo' => 'Ferroviario',
        'fundacion' => '1919',
        'estadio' => 'Único Madre de Ciudades / Alfredo Terrera',
        'ciudad' => 'Santiago del Estero',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/3/3a/Escudo_del_Club_Atl%C3%A9tico_Central_C%C3%B3rdoba_%28Santiago_del_Estero%29.png',
        'imagen_principal' => '../img/centralcordoba.png',
        'proximos_partidos' => [
            ['dia' => '16/11', 'lv' => 'L', 'rival' => 'Defensa y Justicia', 'hora' => '16:00', 'es_clasico' => false],
            ['dia' => '23/11', 'lv' => 'V', 'rival' => 'Deportivo Riestra', 'hora' => '19:00', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '09/11', 'lv' => 'V', 'rival' => 'Estudiantes', 'resultado' => '0-1', 'clase_resultado' => 'result-loss', 'clase_score' => 'score-loss'],
            ['dia' => '02/11', 'lv' => 'L', 'rival' => 'Gimnasia', 'resultado' => '2-0', 'clase_resultado' => 'result-win', 'clase_score' => 'score-win'],
        ],
        'goles' => [
            ['nombre' => 'Atencio', 'cantidad' => 5],
            ['nombre' => 'Sanabria', 'cantidad' => 4],
        ],
        'asistencias' => [
            ['nombre' => 'Vázquez', 'cantidad' => 3],
            ['nombre' => 'Miloc', 'cantidad' => 2],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Lucas González', 'rol' => 'Entrenador', 'edad' => '44', 'nacimiento' => '07/06/1981', 'altura' => '1.75', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Luis Ingolotti', 'rol' => 'Arquero', 'edad' => '24', 'nacimiento' => '14/02/2000', 'altura' => '1.84', 'numero' => 1, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Sebastián Valdez', 'rol' => 'Defensor', 'edad' => '28', 'nacimiento' => '06/11/1995', 'altura' => '1.83', 'numero' => 6, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Kevin Vázquez', 'rol' => 'Mediocampista', 'edad' => '23', 'nacimiento' => '19/05/2001', 'altura' => '1.80', 'numero' => 5, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Lucas Varaldo', 'rol' => 'Delantero', 'edad' => '22', 'nacimiento' => '24/02/2002', 'altura' => '1.95', 'numero' => 9, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- DEFENSA Y JUSTICIA ---
    'defensayjusticia' => [
        'nombre_slug' => 'defensayjusticia',
        'nombre_completo' => 'CLUB SOCIAL Y DEPORTIVO DEFENSA Y JUSTICIA',
        'titulo_pagina' => 'DEFENSA Y JUSTICIA HOY',
        'apodo' => 'Halcón',
        'fundacion' => '1935',
        'estadio' => 'Norberto "Tito" Tomaghello',
        'ciudad' => 'Florencio Varela',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/2/2e/Escudo_del_Club_Social_y_Deportivo_Defensa_y_Justicia.svg',
        'imagen_principal' => '../img/defensayjusticia.png',
        'proximos_partidos' => [
            ['dia' => '17/11', 'lv' => 'V', 'rival' => 'Deportivo Riestra', 'hora' => '18:30', 'es_clasico' => false],
            ['dia' => '24/11', 'lv' => 'L', 'rival' => 'Estudiantes', 'hora' => '20:00', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '10/11', 'lv' => 'L', 'rival' => 'Gimnasia', 'resultado' => '1-2', 'clase_resultado' => 'result-loss', 'clase_score' => 'score-loss'],
            ['dia' => '03/11', 'lv' => 'V', 'rival' => 'Godoy Cruz', 'resultado' => '0-0', 'clase_resultado' => 'result-draw', 'clase_score' => 'score-draw'],
        ],
        'goles' => [
            ['nombre' => 'Herrera', 'cantidad' => 6],
            ['nombre' => 'Fernández', 'cantidad' => 5],
        ],
        'asistencias' => [
            ['nombre' => 'López', 'cantidad' => 4],
            ['nombre' => 'Galván', 'cantidad' => 3],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Francisco Meneghini', 'rol' => 'Entrenador', 'edad' => '36', 'nacimiento' => '11/03/1988', 'altura' => '1.80', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Enrique Bologna', 'rol' => 'Arquero', 'edad' => '43', 'nacimiento' => '13/02/1982', 'altura' => '1.88', 'numero' => 22, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Ezequiel Cannavo', 'rol' => 'Defensor', 'edad' => '22', 'nacimiento' => '14/06/2002', 'altura' => '1.80', 'numero' => 35, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Kevin López', 'rol' => 'Mediocampista', 'edad' => '22', 'nacimiento' => '28/12/2001', 'altura' => '1.70', 'numero' => 8, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Abiel Osorio', 'rol' => 'Delantero', 'edad' => '22', 'nacimiento' => '13/06/2002', 'altura' => '1.82', 'numero' => 29, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- DEPORTIVO RIESTRA ---
    'deportivoriestra' => [
        'nombre_slug' => 'deportivoriestra',
        'nombre_completo' => 'CLUB DEPORTIVO RIESTRA',
        'titulo_pagina' => 'DEPORTIVO RIESTRA HOY',
        'apodo' => 'Blanquinegro',
        'fundacion' => '1931',
        'estadio' => 'Guillermo Laza',
        'ciudad' => 'Buenos Aires',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/1/1c/Escudo_del_Club_Deportivo_Riestra.png',
        'imagen_principal' => '../img/deportivoriestra.png',
        'proximos_partidos' => [
            ['dia' => '18/11', 'lv' => 'L', 'rival' => 'Estudiantes', 'hora' => '15:00', 'es_clasico' => false],
            ['dia' => '25/11', 'lv' => 'V', 'rival' => 'Gimnasia', 'hora' => '17:30', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '11/11', 'lv' => 'V', 'rival' => 'Godoy Cruz', 'resultado' => '1-1', 'clase_resultado' => 'result-draw', 'clase_score' => 'score-draw'],
            ['dia' => '04/11', 'lv' => 'L', 'rival' => 'Huracán', 'resultado' => '0-1', 'clase_resultado' => 'result-loss', 'clase_score' => 'score-loss'],
        ],
        'goles' => [
            ['nombre' => 'Herrera', 'cantidad' => 5],
            ['nombre' => 'Benegas', 'cantidad' => 4],
        ],
        'asistencias' => [
            ['nombre' => 'Machado', 'cantidad' => 3],
            ['nombre' => 'Sánchez', 'cantidad' => 2],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Cristian Fabbiani', 'rol' => 'Entrenador', 'edad' => '41', 'nacimiento' => '28/09/1983', 'altura' => '1.89', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Juan Ignacio Dobboletta', 'rol' => 'Arquero', 'edad' => '31', 'nacimiento' => '06/01/1993', 'altura' => '1.86', 'numero' => 1, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Alan Barrionuevo', 'rol' => 'Defensor', 'edad' => '27', 'nacimiento' => '25/01/1997', 'altura' => '1.88', 'numero' => 4, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Pablo Monje', 'rol' => 'Mediocampista', 'edad' => '27', 'nacimiento' => '06/02/1997', 'altura' => '1.65', 'numero' => 14, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Nicolás Benegas', 'rol' => 'Delantero', 'edad' => '28', 'nacimiento' => '15/03/1996', 'altura' => '1.86', 'numero' => 9, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- ESTUDIANTES (LA PLATA) ---
    'estudiantes' => [
        'nombre_slug' => 'estudiantes',
        'nombre_completo' => 'CLUB ESTUDIANTES DE LA PLATA',
        'titulo_pagina' => 'ESTUDIANTES HOY',
        'apodo' => 'Pincha',
        'fundacion' => '1905',
        'estadio' => 'Jorge Luis Hirschi',
        'ciudad' => 'La Plata',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/1/1f/Estudiantes_de_la_plata.svg',
        'imagen_principal' => '../img/estudiantes.png',
        'proximos_partidos' => [
            ['dia' => '19/11', 'lv' => 'V', 'rival' => 'Gimnasia', 'hora' => '21:00', 'es_clasico' => true],
            ['dia' => '26/11', 'lv' => 'L', 'rival' => 'Godoy Cruz', 'hora' => '18:00', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '12/11', 'lv' => 'L', 'rival' => 'Huracán', 'resultado' => '2-1', 'clase_resultado' => 'result-win', 'clase_score' => 'score-win'],
            ['dia' => '05/11', 'lv' => 'V', 'rival' => 'Independiente', 'resultado' => '0-0', 'clase_resultado' => 'result-draw', 'clase_score' => 'score-draw'],
        ],
        'goles' => [
            ['nombre' => 'Correa', 'cantidad' => 8],
            ['nombre' => 'Cetre', 'cantidad' => 6],
        ],
        'asistencias' => [
            ['nombre' => 'Ascacibar', 'cantidad' => 4],
            ['nombre' => 'Zuqui', 'cantidad' => 3],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Eduardo Domínguez', 'rol' => 'Entrenador', 'edad' => '46', 'nacimiento' => '01/09/1978', 'altura' => '1.83', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Matías Mansilla', 'rol' => 'Arquero', 'edad' => '28', 'nacimiento' => '15/02/1996', 'altura' => '1.92', 'numero' => 12, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Eros Mancuso', 'rol' => 'Defensor', 'edad' => '25', 'nacimiento' => '17/04/1999', 'altura' => '1.73', 'numero' => 14, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Santiago Ascacibar', 'rol' => 'Mediocampista', 'edad' => '28', 'nacimiento' => '25/02/1997', 'altura' => '1.68', 'numero' => 5, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Mauro Méndez', 'rol' => 'Delantero', 'edad' => '25', 'nacimiento' => '17/01/1999', 'altura' => '1.79', 'numero' => 9, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- GIMNASIA (LA PLATA) ---
    'gimnasia' => [
        'nombre_slug' => 'gimnasia',
        'nombre_completo' => 'CLUB DE GIMNASIA Y ESGRIMA LA PLATA',
        'titulo_pagina' => 'GIMNASIA HOY',
        'apodo' => 'Lobo',
        'fundacion' => '1887',
        'estadio' => 'Juan Carmelo Zerillo',
        'ciudad' => 'La Plata',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/4/45/Club_de_Gimnasia_y_Esgrima_La_Plata_%28escudo%29.png',
        'imagen_principal' => '../img/gimnasia.png',
        'proximos_partidos' => [
            ['dia' => '20/11', 'lv' => 'L', 'rival' => 'Godoy Cruz', 'hora' => '16:00', 'es_clasico' => false],
            ['dia' => '27/11', 'lv' => 'V', 'rival' => 'Huracán', 'hora' => '19:00', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '13/11', 'lv' => 'V', 'rival' => 'Independiente', 'resultado' => '1-0', 'clase_resultado' => 'result-win', 'clase_score' => 'score-win'],
            ['dia' => '06/11', 'lv' => 'L', 'rival' => 'Independiente Rivadavia', 'resultado' => '2-2', 'clase_resultado' => 'result-draw', 'clase_score' => 'score-draw'],
        ],
        'goles' => [
            ['nombre' => 'Domínguez', 'cantidad' => 7],
            ['nombre' => 'Castillo', 'cantidad' => 5],
        ],
        'asistencias' => [
            ['nombre' => 'De Blasis', 'cantidad' => 4],
            ['nombre' => 'Colazo', 'cantidad' => 3],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Marcelo Méndez', 'rol' => 'Entrenador', 'edad' => '43', 'nacimiento' => '10/01/1981', 'altura' => '1.85', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Nelson Insfrán', 'rol' => 'Arquero', 'edad' => '29', 'nacimiento' => '13/06/1995', 'altura' => '1.80', 'numero' => 23, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Leonardo Morales', 'rol' => 'Defensor', 'edad' => '33', 'nacimiento' => '23/06/1991', 'altura' => '1.80', 'numero' => 4, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Pablo De Blasis', 'rol' => 'Mediocampista', 'edad' => '36', 'nacimiento' => '04/02/1988', 'altura' => '1.65', 'numero' => 10, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Rodrigo Castillo', 'rol' => 'Delantero', 'edad' => '25', 'nacimiento' => '26/02/1999', 'altura' => '1.85', 'numero' => 30, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- GODOY CRUZ ---
    'godoycruz' => [
        'nombre_slug' => 'godoycruz',
        'nombre_completo' => 'CLUB DEPORTIVO GODOY CRUZ ANTONIO TOMBA',
        'titulo_pagina' => 'GODOY CRUZ HOY',
        'apodo' => 'Tomba',
        'fundacion' => '1921',
        'estadio' => 'Feliciano Gambarte / Malvinas Argentinas',
        'ciudad' => 'Godoy Cruz',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/1/1c/Escudo_del_Club_Deportivo_Godoy_Cruz_Antonio_Tomba.svg',
        'imagen_principal' => '../img/godoycruz.png',
        'proximos_partidos' => [
            ['dia' => '21/11', 'lv' => 'V', 'rival' => 'Huracán', 'hora' => '20:30', 'es_clasico' => false],
            ['dia' => '28/11', 'lv' => 'L', 'rival' => 'Independiente', 'hora' => '17:00', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '14/11', 'lv' => 'L', 'rival' => 'Independiente Rivadavia', 'resultado' => '1-1', 'clase_resultado' => 'result-draw', 'clase_score' => 'score-draw'],
            ['dia' => '07/11', 'lv' => 'V', 'rival' => 'Instituto', 'resultado' => '2-0', 'clase_resultado' => 'result-win', 'clase_score' => 'score-win'],
        ],
        'goles' => [
            ['nombre' => 'Conechny', 'cantidad' => 7],
            ['nombre' => 'Poggi', 'cantidad' => 5],
        ],
        'asistencias' => [
            ['nombre' => 'Ardiles', 'cantidad' => 4],
            ['nombre' => 'Rasmussen', 'cantidad' => 3],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Daniel Oldrá', 'rol' => 'Entrenador', 'edad' => '59', 'nacimiento' => '15/03/1965', 'altura' => '1.77', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Franco Petroli', 'rol' => 'Arquero', 'edad' => '26', 'nacimiento' => '11/06/1998', 'altura' => '1.88', 'numero' => 1, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Pier Barrios', 'rol' => 'Defensor', 'edad' => '34', 'nacimiento' => '01/07/1990', 'altura' => '1.80', 'numero' => 2, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Bruno Leyes', 'rol' => 'Mediocampista', 'edad' => '23', 'nacimiento' => '30/10/2001', 'altura' => '1.73', 'numero' => 5, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Salomón Rodríguez', 'rol' => 'Delantero', 'edad' => '24', 'nacimiento' => '16/02/2000', 'altura' => '1.87', 'numero' => 9, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- HURACÁN ---
    'huracan' => [
        'nombre_slug' => 'huracan',
        'nombre_completo' => 'CLUB ATLÉTICO HURACÁN',
        'titulo_pagina' => 'HURACÁN HOY',
        'apodo' => 'Globo',
        'fundacion' => '1908',
        'estadio' => 'Tomás Adolfo Ducó',
        'ciudad' => 'Buenos Aires',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/7/71/Escudo_del_Club_Atl%C3%A9tico_Hurac%C3%A1n.svg',
        'imagen_principal' => '../img/huracan.png',
        'proximos_partidos' => [
            ['dia' => '22/11', 'lv' => 'L', 'rival' => 'Independiente', 'hora' => '19:30', 'es_clasico' => false],
            ['dia' => '29/11', 'lv' => 'V', 'rival' => 'Independiente Rivadavia', 'hora' => '21:00', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '15/11', 'lv' => 'V', 'rival' => 'Instituto', 'resultado' => '2-1', 'clase_resultado' => 'result-win', 'clase_score' => 'score-win'],
            ['dia' => '08/11', 'lv' => 'L', 'rival' => 'Lanús', 'resultado' => '0-0', 'clase_resultado' => 'result-draw', 'clase_score' => 'score-draw'],
        ],
        'goles' => [
            ['nombre' => 'Mazzantti', 'cantidad' => 8],
            ['nombre' => 'Fertoli', 'cantidad' => 5],
        ],
        'asistencias' => [
            ['nombre' => 'Pussetto', 'cantidad' => 4],
            ['nombre' => 'Echeverría', 'cantidad' => 3],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Frank Darío Kudelka', 'rol' => 'Entrenador', 'edad' => '63', 'nacimiento' => '12/05/1961', 'altura' => '1.75', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Hernán Galíndez', 'rol' => 'Arquero', 'edad' => '38', 'nacimiento' => '30/03/1987', 'altura' => '1.89', 'numero' => 1, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Lucas Carrizo', 'rol' => 'Defensor', 'edad' => '27', 'nacimiento' => '20/05/1997', 'altura' => '1.82', 'numero' => 3, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Williams Alarcón', 'rol' => 'Mediocampista', 'edad' => '23', 'nacimiento' => '29/11/2000', 'altura' => '1.76', 'numero' => 5, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Ignacio Pussetto', 'rol' => 'Delantero', 'edad' => '28', 'nacimiento' => '21/12/1995', 'altura' => '1.80', 'numero' => 7, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- INDEPENDIENTE ---
    'independiente' => [
        'nombre_slug' => 'independiente',
        'nombre_completo' => 'CLUB ATLÉTICO INDEPENDIENTE',
        'titulo_pagina' => 'INDEPENDIENTE HOY',
        'apodo' => 'Rojo',
        'fundacion' => '1905',
        'estadio' => 'Libertadores de América',
        'ciudad' => 'Avellaneda',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/7/70/Escudo_del_Club_Atl%C3%A9tico_Independiente.svg',
        'imagen_principal' => '../img/independiente.png',
        'proximos_partidos' => [
            ['dia' => '23/11', 'lv' => 'V', 'rival' => 'Independiente Rivadavia', 'hora' => '18:00', 'es_clasico' => false],
            ['dia' => '30/11', 'lv' => 'L', 'rival' => 'Instituto', 'hora' => '20:30', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '16/11', 'lv' => 'L', 'rival' => 'Lanús', 'resultado' => '1-0', 'clase_resultado' => 'result-win', 'clase_score' => 'score-win'],
            ['dia' => '09/11', 'lv' => 'V', 'rival' => 'Newell\'s', 'resultado' => '1-1', 'clase_resultado' => 'result-draw', 'clase_score' => 'score-draw'],
        ],
        'goles' => [
            ['nombre' => 'Avalos', 'cantidad' => 7],
            ['nombre' => 'Hidalgo', 'cantidad' => 4],
        ],
        'asistencias' => [
            ['nombre' => 'Salle', 'cantidad' => 3],
            ['nombre' => 'Pérez', 'cantidad' => 2],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Julio Vaccari', 'rol' => 'Entrenador', 'edad' => '44', 'nacimiento' => '09/10/1980', 'altura' => '1.82', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Rodrigo Rey', 'rol' => 'Arquero', 'edad' => '33', 'nacimiento' => '08/03/1991', 'altura' => '1.90', 'numero' => 33, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Kevin Lomónaco', 'rol' => 'Defensor', 'edad' => '22', 'nacimiento' => '08/01/2002', 'altura' => '1.92', 'numero' => 26, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'David Martínez', 'rol' => 'Mediocampista', 'edad' => '30', 'nacimiento' => '18/01/1994', 'altura' => '1.80', 'numero' => 17, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Gabriel Avalos', 'rol' => 'Delantero', 'edad' => '34', 'nacimiento' => '12/10/1990', 'altura' => '1.88', 'numero' => 9, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- INDEPENDIENTE RIVADAVIA ---
    'independienterivadavia' => [
        'nombre_slug' => 'independienterivadavia',
        'nombre_completo' => 'CLUB SPORTIVO INDEPENDIENTE RIVADAVIA',
        'titulo_pagina' => 'INDEPENDIENTE RIVADAVIA HOY',
        'apodo' => 'Lepra',
        'fundacion' => '1913',
        'estadio' => 'Bautista Gargantini',
        'ciudad' => 'Mendoza',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/9/9c/Escudo_del_Club_Sportivo_Independiente_Rivadavia.png',
        'imagen_principal' => '../img/independienterivadavia.png',
        'proximos_partidos' => [
            ['dia' => '24/11', 'lv' => 'L', 'rival' => 'Instituto', 'hora' => '16:30', 'es_clasico' => false],
            ['dia' => '01/12', 'lv' => 'V', 'rival' => 'Lanús', 'hora' => '19:00', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '17/11', 'lv' => 'V', 'rival' => 'Newell\'s', 'resultado' => '0-1', 'clase_resultado' => 'result-loss', 'clase_score' => 'score-loss'],
            ['dia' => '10/11', 'lv' => 'L', 'rival' => 'Platense', 'resultado' => '2-0', 'clase_resultado' => 'result-win', 'clase_score' => 'score-win'],
        ],
        'goles' => [
            ['nombre' => 'Asenjo', 'cantidad' => 6],
            ['nombre' => 'Castro', 'cantidad' => 4],
        ],
        'asistencias' => [
            ['nombre' => 'Ostchega', 'cantidad' => 3],
            ['nombre' => 'Bianchi', 'cantidad' => 2],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Martín Cicotello', 'rol' => 'Entrenador', 'edad' => '43', 'nacimiento' => '21/05/1981', 'altura' => '1.78', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Ezequiel Centurión', 'rol' => 'Arquero', 'edad' => '27', 'nacimiento' => '20/05/1997', 'altura' => '1.84', 'numero' => 1, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Bruno Bianchi', 'rol' => 'Defensor', 'edad' => '35', 'nacimiento' => '17/02/1989', 'altura' => '1.84', 'numero' => 2, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Franco Romero', 'rol' => 'Mediocampista', 'edad' => '24', 'nacimiento' => '11/02/2000', 'altura' => '1.78', 'numero' => 16, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Sebastián Villa', 'rol' => 'Delantero', 'edad' => '28', 'nacimiento' => '19/05/1996', 'altura' => '1.79', 'numero' => 22, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- INSTITUTO (CÓRDOBA) ---
    'instituto' => [
        'nombre_slug' => 'instituto',
        'nombre_completo' => 'INSTITUTO ATLÉTICO CENTRAL CÓRDOBA',
        'titulo_pagina' => 'INSTITUTO HOY',
        'apodo' => 'Gloria',
        'fundacion' => '1918',
        'estadio' => 'Juan Domingo Perón',
        'ciudad' => 'Córdoba',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/4/41/Instituto_AC_C%C3%B3rdoba_%28escudo%29.png',
        'imagen_principal' => '../img/instituto.png',
        'proximos_partidos' => [
            ['dia' => '25/11', 'lv' => 'V', 'rival' => 'Lanús', 'hora' => '18:00', 'es_clasico' => false],
            ['dia' => '02/12', 'lv' => 'L', 'rival' => 'Newell\'s', 'hora' => '20:30', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '18/11', 'lv' => 'L', 'rival' => 'Platense', 'resultado' => '1-1', 'clase_resultado' => 'result-draw', 'clase_score' => 'score-draw'],
            ['dia' => '11/11', 'lv' => 'V', 'rival' => 'Racing', 'resultado' => '0-2', 'clase_resultado' => 'result-loss', 'clase_score' => 'score-loss'],
        ],
        'goles' => [
            ['nombre' => 'Puebla', 'cantidad' => 7],
            ['nombre' => 'Rodríguez', 'cantidad' => 5],
        ],
        'asistencias' => [
            ['nombre' => 'Lodico', 'cantidad' => 4],
            ['nombre' => 'Cuello', 'cantidad' => 3],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Diego Dabove', 'rol' => 'Entrenador', 'edad' => '52', 'nacimiento' => '18/01/1973', 'altura' => '1.86', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Manuel Roffo', 'rol' => 'Arquero', 'edad' => '24', 'nacimiento' => '04/04/2000', 'altura' => '1.84', 'numero' => 28, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Giuliano Cerato', 'rol' => 'Defensor', 'edad' => '25', 'nacimiento' => '12/11/1998', 'altura' => '1.70', 'numero' => 4, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Gastón Lodico', 'rol' => 'Mediocampista', 'edad' => '26', 'nacimiento' => '28/05/1998', 'altura' => '1.62', 'numero' => 19, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Santiago Rodríguez', 'rol' => 'Delantero', 'edad' => '27', 'nacimiento' => '23/08/1997', 'altura' => '1.70', 'numero' => 22, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- LANÚS ---
    'lanus' => [
        'nombre_slug' => 'lanus',
        'nombre_completo' => 'CLUB ATLÉTICO LANÚS',
        'titulo_pagina' => 'LANÚS HOY',
        'apodo' => 'Granate',
        'fundacion' => '1915',
        'estadio' => 'Ciudad de Lanús - Néstor Díaz Pérez',
        'ciudad' => 'Lanús',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/3/3e/Club_Atl%C3%A9tico_Lan%C3%BAs_%28escudo%29.png',
        'imagen_principal' => '../img/lanus.png',
        'proximos_partidos' => [
            ['dia' => '26/11', 'lv' => 'L', 'rival' => 'Newell\'s', 'hora' => '17:30', 'es_clasico' => false],
            ['dia' => '03/12', 'lv' => 'V', 'rival' => 'Platense', 'hora' => '20:00', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '19/11', 'lv' => 'V', 'rival' => 'Racing', 'resultado' => '1-2', 'clase_resultado' => 'result-loss', 'clase_score' => 'score-loss'],
            ['dia' => '12/11', 'lv' => 'L', 'rival' => 'River Plate', 'resultado' => '1-1', 'clase_resultado' => 'result-draw', 'clase_score' => 'score-draw'],
        ],
        'goles' => [
            ['nombre' => 'Bou', 'cantidad' => 9],
            ['nombre' => 'Moreno', 'cantidad' => 6],
        ],
        'asistencias' => [
            ['nombre' => 'Loaiza', 'cantidad' => 4],
            ['nombre' => 'Carrera', 'cantidad' => 3],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Ricardo Zielinski', 'rol' => 'Entrenador', 'edad' => '65', 'nacimiento' => '14/10/1959', 'altura' => '1.80', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Nicolás Losada', 'rol' => 'Arquero', 'edad' => '22', 'nacimiento' => '17/04/2002', 'altura' => '1.87', 'numero' => 1, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Ezequiel Muñoz', 'rol' => 'Defensor', 'edad' => '34', 'nacimiento' => '08/10/1990', 'altura' => '1.85', 'numero' => 2, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Raúl Loaiza', 'rol' => 'Mediocampista', 'edad' => '30', 'nacimiento' => '08/06/1994', 'altura' => '1.80', 'numero' => 5, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Walter Bou', 'rol' => 'Delantero', 'edad' => '31', 'nacimiento' => '25/08/1993', 'altura' => '1.74', 'numero' => 9, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- NEWELL'S OLD BOYS ---
    'newells' => [
        'nombre_slug' => 'newells',
        'nombre_completo' => 'CLUB ATLÉTICO NEWELL\'S OLD BOYS',
        'titulo_pagina' => 'NEWELL\'S HOY',
        'apodo' => 'Leprosos',
        'fundacion' => '1903',
        'estadio' => 'Marcelo Bielsa',
        'ciudad' => 'Rosario',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/2/24/Escudo_del_Club_Atl%C3%A9tico_Newell%27s_Old_Boys.svg',
        'imagen_principal' => '../img/newells.png',
        'proximos_partidos' => [
            ['dia' => '27/11', 'lv' => 'V', 'rival' => 'Platense', 'hora' => '19:00', 'es_clasico' => false],
            ['dia' => '04/12', 'lv' => 'L', 'rival' => 'Racing', 'hora' => '21:30', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '20/11', 'lv' => 'L', 'rival' => 'River Plate', 'resultado' => '0-1', 'clase_resultado' => 'result-loss', 'clase_score' => 'score-loss'],
            ['dia' => '13/11', 'lv' => 'V', 'rival' => 'Rosario Central', 'resultado' => '1-1', 'clase_resultado' => 'result-draw', 'clase_score' => 'score-draw'],
        ],
        'goles' => [
            ['nombre' => 'Ramírez', 'cantidad' => 8],
            ['nombre' => 'Velázquez', 'cantidad' => 5],
        ],
        'asistencias' => [
            ['nombre' => 'Fernández', 'cantidad' => 4],
            ['nombre' => 'Martino', 'cantidad' => 3],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Sebastian Méndez', 'rol' => 'Entrenador', 'edad' => '47', 'nacimiento' => '04/07/1977', 'altura' => '1.77', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Lucas Hoyos', 'rol' => 'Arquero', 'edad' => '35', 'nacimiento' => '29/04/1989', 'altura' => '1.83', 'numero' => 12, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Gustavo Velázquez', 'rol' => 'Defensor', 'edad' => '33', 'nacimiento' => '17/04/1991', 'altura' => '1.80', 'numero' => 23, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Ever Banega', 'rol' => 'Mediocampista', 'edad' => '36', 'nacimiento' => '29/06/1988', 'altura' => '1.74', 'numero' => 10, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Ignacio Ramírez', 'rol' => 'Delantero', 'edad' => '27', 'nacimiento' => '01/02/1997', 'altura' => '1.80', 'numero' => 99, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- PLATENSE ---
    'platense' => [
        'nombre_slug' => 'platense',
        'nombre_completo' => 'CLUB ATLÉTICO PLATENSE',
        'titulo_pagina' => 'PLATENSE HOY',
        'apodo' => 'Calamar',
        'fundacion' => '1905',
        'estadio' => 'Ciudad de Vicente López',
        'ciudad' => 'Florida Este',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/3/3a/Escudo_del_Club_Atl%C3%A9tico_Platense.png',
        'imagen_principal' => '../img/platense.png',
        'proximos_partidos' => [
            ['dia' => '28/11', 'lv' => 'L', 'rival' => 'Racing', 'hora' => '16:00', 'es_clasico' => false],
            ['dia' => '05/12', 'lv' => 'V', 'rival' => 'River Plate', 'hora' => '18:30', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '21/11', 'lv' => 'V', 'rival' => 'Rosario Central', 'resultado' => '1-0', 'clase_resultado' => 'result-win', 'clase_score' => 'score-win'],
            ['dia' => '14/11', 'lv' => 'L', 'rival' => 'San Lorenzo', 'resultado' => '2-2', 'clase_resultado' => 'result-draw', 'clase_score' => 'score-draw'],
        ],
        'goles' => [
            ['nombre' => 'Martínez', 'cantidad' => 6],
            ['nombre' => 'Ocampo', 'cantidad' => 4],
        ],
        'asistencias' => [
            ['nombre' => 'Mainero', 'cantidad' => 3],
            ['nombre' => 'Gómez', 'cantidad' => 2],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Sergio Gómez', 'rol' => 'Entrenador', 'edad' => '43', 'nacimiento' => '19/07/1981', 'altura' => '1.70', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Juan Pablo Cozzani', 'rol' => 'Arquero', 'edad' => '26', 'nacimiento' => '09/10/1998', 'altura' => '1.84', 'numero' => 31, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Ignacio Vázquez', 'rol' => 'Defensor', 'edad' => '27', 'nacimiento' => '15/06/1997', 'altura' => '1.84', 'numero' => 13, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Fernando Juárez', 'rol' => 'Mediocampista', 'edad' => '26', 'nacimiento' => '23/08/1998', 'altura' => '1.70', 'numero' => 5, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Mateo Pellegrino', 'rol' => 'Delantero', 'edad' => '23', 'nacimiento' => '22/10/2001', 'altura' => '1.92', 'numero' => 9, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- RACING CLUB ---
    'racing' => [
        'nombre_slug' => 'racing',
        'nombre_completo' => 'RACING CLUB DE AVELLANEDA',
        'titulo_pagina' => 'RACING CLUB HOY',
        'apodo' => 'Academia',
        'fundacion' => '1903',
        'estadio' => 'El Cilindro',
        'ciudad' => 'Avellaneda',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/2/2f/Racing_Club_de_Avellaneda_%28escudo%29.png',
        'imagen_principal' => '../img/racing.png',
        'proximos_partidos' => [
            ['dia' => '29/11', 'lv' => 'V', 'rival' => 'River Plate', 'hora' => '20:00', 'es_clasico' => false],
            ['dia' => '06/12', 'lv' => 'L', 'rival' => 'Rosario Central', 'hora' => '17:00', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '22/11', 'lv' => 'L', 'rival' => 'San Lorenzo', 'resultado' => '2-1', 'clase_resultado' => 'result-win', 'clase_score' => 'score-win'],
            ['dia' => '15/11', 'lv' => 'V', 'rival' => 'San Martín', 'resultado' => '1-0', 'clase_resultado' => 'result-win', 'clase_score' => 'score-win'],
        ],
        'goles' => [
            ['nombre' => 'Martirena', 'cantidad' => 9],
            ['nombre' => 'Quintero', 'cantidad' => 6],
        ],
        'asistencias' => [
            ['nombre' => 'Almendra', 'cantidad' => 5],
            ['nombre' => 'Sosa', 'cantidad' => 4],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Gustavo Costas', 'rol' => 'Entrenador', 'edad' => '62', 'nacimiento' => '28/02/1963', 'altura' => '1.82', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Gabriel Arias', 'rol' => 'Arquero', 'edad' => '37', 'nacimiento' => '13/09/1987', 'altura' => '1.88', 'numero' => 21, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Marco Di Cesare', 'rol' => 'Defensor', 'edad' => '22', 'nacimiento' => '30/01/2002', 'altura' => '1.86', 'numero' => 3, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Juan Nardoni', 'rol' => 'Mediocampista', 'edad' => '22', 'nacimiento' => '14/07/2002', 'altura' => '1.80', 'numero' => 5, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Roger Martínez', 'rol' => 'Delantero', 'edad' => '30', 'nacimiento' => '23/06/1994', 'altura' => '1.80', 'numero' => 10, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- RIVER PLATE (Del template, completado plantel) ---
    'river' => [
        'nombre_slug' => 'river',
        'nombre_completo' => 'CLUB ATLÉTICO RIVER PLATE',
        'titulo_pagina' => 'RIVER PLATE HOY',
        'apodo' => 'Millonarios',
        'fundacion' => '1901',
        'estadio' => 'Mâs Monumental',
        'ciudad' => 'Buenos Aires',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/e/e0/Escudo_del_Club_Atl%C3%A9tico_River_Plate.png',
        'imagen_principal' => '../img/river.png',
        'proximos_partidos' => [
            ['dia' => '12/11', 'lv' => 'L', 'rival' => 'Argentinos Jrs', 'hora' => '21:30', 'es_clasico' => false],
            ['dia' => '19/11', 'lv' => 'V', 'rival' => 'Rosario Central', 'hora' => '18:00', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '05/11', 'lv' => 'V', 'rival' => 'Talleres', 'resultado' => '2-0', 'clase_resultado' => 'result-win', 'clase_score' => 'score-win'],
            ['dia' => '29/10', 'lv' => 'L', 'rival' => 'Independiente', 'resultado' => '1-1', 'clase_resultado' => 'result-draw', 'clase_score' => 'score-draw'],
            ['dia' => '22/10', 'lv' => 'V', 'rival' => 'San Lorenzo', 'resultado' => '0-1', 'clase_resultado' => 'result-loss', 'clase_score' => 'score-loss'],
        ],
        'goles' => [
            ['nombre' => 'Borja', 'cantidad' => 12],
            ['nombre' => 'Colidio', 'cantidad' => 7],
            ['nombre' => 'Lanzini', 'cantidad' => 5],
        ],
        'asistencias' => [
            ['nombre' => 'Nacho F.', 'cantidad' => 5],
            ['nombre' => 'Aliendro', 'cantidad' => 3],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Martín Demichelis', 'rol' => 'Entrenador', 'edad' => '44', 'nacimiento' => '20/12/1980', 'altura' => '1.83', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Franco Armani', 'rol' => 'Arquero', 'edad' => '38', 'nacimiento' => '16/10/1986', 'altura' => '1.89', 'numero' => 1, 'es_dt' => false],
                ['nombre' => 'Ezequiel Centurión', 'rol' => 'Arquero', 'edad' => '27', 'nacimiento' => '20/05/1997', 'altura' => '1.84', 'numero' => 12, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Paulo Díaz', 'rol' => 'Defensor', 'edad' => '30', 'nacimiento' => '25/08/1994', 'altura' => '1.80', 'numero' => 17, 'es_dt' => false],
                ['nombre' => 'Germán Pezzella', 'rol' => 'Defensor', 'edad' => '34', 'nacimiento' => '27/06/1991', 'altura' => '1.87', 'numero' => 6, 'es_dt' => false],
                ['nombre' => 'Milton Casco', 'rol' => 'Defensor', 'edad' => '37', 'nacimiento' => '11/04/1988', 'altura' => '1.70', 'numero' => 20, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Ignacio Fernández', 'rol' => 'Mediocampista', 'edad' => '35', 'nacimiento' => '12/01/1990', 'altura' => '1.82', 'numero' => 26, 'es_dt' => false],
                ['nombre' => 'Matías Kranevitter', 'rol' => 'Mediocampista', 'edad' => '32', 'nacimiento' => '21/05/1993', 'altura' => '1.78', 'numero' => 5, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Miguel Borja', 'rol' => 'Delantero', 'edad' => '32', 'nacimiento' => '26/01/1993', 'altura' => '1.84', 'numero' => 9, 'es_dt' => false],
                ['nombre' => 'Facundo Colidio', 'rol' => 'Delantero', 'edad' => '25', 'nacimiento' => '04/01/2000', 'altura' => '1.82', 'numero' => 16, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- ROSARIO CENTRAL ---
    'rosariocentral' => [
        'nombre_slug' => 'rosariocentral',
        'nombre_completo' => 'CLUB ATLÉTICO ROSARIO CENTRAL',
        'titulo_pagina' => 'ROSARIO CENTRAL HOY',
        'apodo' => 'Canalla',
        'fundacion' => '1889',
        'estadio' => 'Gigante de Arroyito',
        'ciudad' => 'Rosario',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/b/b3/Rosario_Central_-_crest.svg',
        'imagen_principal' => '../img/rosariocentral.png',
        'proximos_partidos' => [
            ['dia' => '30/11', 'lv' => 'L', 'rival' => 'San Lorenzo', 'hora' => '18:30', 'es_clasico' => true],
            ['dia' => '07/12', 'lv' => 'V', 'rival' => 'San Martín', 'hora' => '21:00', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '23/11', 'lv' => 'V', 'rival' => 'Sarmiento', 'resultado' => '2-0', 'clase_resultado' => 'result-win', 'clase_score' => 'score-win'],
            ['dia' => '16/11', 'lv' => 'L', 'rival' => 'Talleres', 'resultado' => '1-1', 'clase_resultado' => 'result-draw', 'clase_score' => 'score-draw'],
        ],
        'goles' => [
            ['nombre' => 'Ruben', 'cantidad' => 8],
            ['nombre' => 'Martínez', 'cantidad' => 5],
        ],
        'asistencias' => [
            ['nombre' => 'Malcorra', 'cantidad' => 4],
            ['nombre' => 'Campaz', 'cantidad' => 3],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Miguel Ángel Russo', 'rol' => 'Entrenador', 'edad' => '68', 'nacimiento' => '09/04/1956', 'altura' => '1.75', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Axel Werner', 'rol' => 'Arquero', 'edad' => '28', 'nacimiento' => '28/02/1996', 'altura' => '1.91', 'numero' => 20, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Carlos Quintana', 'rol' => 'Defensor', 'edad' => '36', 'nacimiento' => '11/02/1988', 'altura' => '1.90', 'numero' => 2, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Ignacio Malcorra', 'rol' => 'Mediocampista', 'edad' => '37', 'nacimiento' => '24/07/1987', 'altura' => '1.70', 'numero' => 10, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Marco Ruben', 'rol' => 'Delantero', 'edad' => '38', 'nacimiento' => '26/10/1986', 'altura' => '1.79', 'numero' => 9, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- SAN LORENZO ---
    'sanlorenzo' => [
        'nombre_slug' => 'sanlorenzo',
        'nombre_completo' => 'CLUB ATLÉTICO SAN LORENZO DE ALMAGRO',
        'titulo_pagina' => 'SAN LORENZO HOY',
        'apodo' => 'Ciclón',
        'fundacion' => '1908',
        'estadio' => 'Pedro Bidegain',
        'ciudad' => 'Buenos Aires',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/1/11/Escudo_del_Club_Atl%C3%A9tico_San_Lorenzo_de_Almagro.svg',
        'imagen_principal' => '../img/sanlorenzo.png',
        'proximos_partidos' => [
            ['dia' => '01/12', 'lv' => 'V', 'rival' => 'San Martín', 'hora' => '17:00', 'es_clasico' => false],
            ['dia' => '08/12', 'lv' => 'L', 'rival' => 'Sarmiento', 'hora' => '19:30', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '24/11', 'lv' => 'L', 'rival' => 'Talleres', 'resultado' => '0-1', 'clase_resultado' => 'result-loss', 'clase_score' => 'score-loss'],
            ['dia' => '17/11', 'lv' => 'V', 'rival' => 'Tigre', 'resultado' => '2-1', 'clase_resultado' => 'result-win', 'clase_score' => 'score-win'],
        ],
        'goles' => [
            ['nombre' => 'Bareiro', 'cantidad' => 7],
            ['nombre' => 'Ferreira', 'cantidad' => 5],
        ],
        'asistencias' => [
            ['nombre' => 'Giay', 'cantidad' => 4],
            ['nombre' => 'Barrios', 'cantidad' => 3],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Leandro Romagnoli', 'rol' => 'Entrenador', 'edad' => '43', 'nacimiento' => '17/03/1981', 'altura' => '1.72', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Facundo Altamirano', 'rol' => 'Arquero', 'edad' => '28', 'nacimiento' => '21/03/1996', 'altura' => '1.89', 'numero' => 13, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Jhohan Romaña', 'rol' => 'Defensor', 'edad' => '26', 'nacimiento' => '13/09/1998', 'altura' => '1.85', 'numero' => 4, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Elián Irala', 'rol' => 'Mediocampista', 'edad' => '20', 'nacimiento' => '06/07/2004', 'altura' => '1.70', 'numero' => 17, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Alexis Cuello', 'rol' => 'Delantero', 'edad' => '24', 'nacimiento' => '18/02/2000', 'altura' => '1.70', 'numero' => 28, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- SAN MARTÍN DE SAN JUAN ---
    'sanmartin' => [
        'nombre_slug' => 'sanmartin',
        'nombre_completo' => 'CLUB ATLÉTICO SAN MARTÍN (SAN JUAN)',
        'titulo_pagina' => 'SAN MARTÍN HOY',
        'apodo' => 'Verdinegro',
        'fundacion' => '1907',
        'estadio' => 'Ingeniero Hilario Sánchez',
        'ciudad' => 'San Juan',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/3/36/Escudo_del_Club_Atl%C3%A9tico_San_Mart%C3%ADn_%28San_Juan%29.png',
        'imagen_principal' => '../img/sanmartin.png',
        'proximos_partidos' => [
            ['dia' => '02/12', 'lv' => 'L', 'rival' => 'Sarmiento', 'hora' => '15:00', 'es_clasico' => false],
            ['dia' => '09/12', 'lv' => 'V', 'rival' => 'Talleres', 'hora' => '17:30', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '25/11', 'lv' => 'V', 'rival' => 'Tigre', 'resultado' => '1-1', 'clase_resultado' => 'result-draw', 'clase_score' => 'score-draw'],
            ['dia' => '18/11', 'lv' => 'L', 'rival' => 'Unión', 'resultado' => '0-2', 'clase_resultado' => 'result-loss', 'clase_score' => 'score-loss'],
        ],
        'goles' => [
            ['nombre' => 'Casa', 'cantidad' => 6],
            ['nombre' => 'González', 'cantidad' => 4],
        ],
        'asistencias' => [
            ['nombre' => 'Molina', 'cantidad' => 3],
            ['nombre' => 'López', 'cantidad' => 2],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Franco Pardo', 'rol' => 'Entrenador', 'edad' => '27', 'nacimiento' => '05/04/1997', 'altura' => '1.83', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Matías Borgogno', 'rol' => 'Arquero', 'edad' => '26', 'nacimiento' => '21/08/1998', 'altura' => '1.87', 'numero' => 1, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Rodrigo Cáseres', 'rol' => 'Defensor', 'edad' => '27', 'nacimiento' => '03/09/1997', 'altura' => '1.85', 'numero' => 6, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Santiago López García', 'rol' => 'Mediocampista', 'edad' => '26', 'nacimiento' => '09/09/1997', 'altura' => '1.70', 'numero' => 8, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Jonathan Zacaría', 'rol' => 'Delantero', 'edad' => '34', 'nacimiento' => '06/10/1990', 'altura' => '1.70', 'numero' => 19, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- SARMIENTO (JUNÍN) ---
    'sarmiento' => [
        'nombre_slug' => 'sarmiento',
        'nombre_completo' => 'CLUB ATLÉTICO SARMIENTO (JUNÍN)',
        'titulo_pagina' => 'SARMIENTO HOY',
        'apodo' => 'Verde',
        'fundacion' => '1911',
        'estadio' => 'Eva Perón',
        'ciudad' => 'Junín',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/6/64/Escudo_del_Club_Atl%C3%A9tico_Sarmiento_%28Jun%C3%ADn%29.png',
        'imagen_principal' => '../img/sarmiento.png',
        'proximos_partidos' => [
            ['dia' => '03/12', 'lv' => 'V', 'rival' => 'Talleres', 'hora' => '16:00', 'es_clasico' => false],
            ['dia' => '10/12', 'lv' => 'L', 'rival' => 'Tigre', 'hora' => '18:30', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '26/11', 'lv' => 'L', 'rival' => 'Unión', 'resultado' => '1-0', 'clase_resultado' => 'result-win', 'clase_score' => 'score-win'],
            ['dia' => '19/11', 'lv' => 'V', 'rival' => 'Vélez', 'resultado' => '0-1', 'clase_resultado' => 'result-loss', 'clase_score' => 'score-loss'],
        ],
        'goles' => [
            ['nombre' => 'Gho', 'cantidad' => 5],
            ['nombre' => 'Gudiño', 'cantidad' => 4],
        ],
        'asistencias' => [
            ['nombre' => 'Quiroga', 'cantidad' => 3],
            ['nombre' => 'Monaco', 'cantidad' => 2],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Israel Damonte', 'rol' => 'Entrenador', 'edad' => '42', 'nacimiento' => '06/01/1982', 'altura' => '1.75', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Thyago Ayala', 'rol' => 'Arquero', 'edad' => '23', 'nacimiento' => '11/07/2001', 'altura' => '1.84', 'numero' => 1, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Franco Paredes', 'rol' => 'Defensor', 'edad' => '25', 'nacimiento' => '18/03/1999', 'altura' => '1.76', 'numero' => 4, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Emiliano Méndez', 'rol' => 'Mediocampista', 'edad' => '35', 'nacimiento' => '15/02/1989', 'altura' => '1.86', 'numero' => 5, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Lisandro López', 'rol' => 'Delantero', 'edad' => '41', 'nacimiento' => '02/03/1983', 'altura' => '1.74', 'numero' => 7, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- TALLERES (CÓRDOBA) ---
    'talleres' => [
        'nombre_slug' => 'talleres',
        'nombre_completo' => 'CLUB ATLÉTICO TALLERES',
        'titulo_pagina' => 'TALLERES HOY',
        'apodo' => 'Matador',
        'fundacion' => '1913',
        'estadio' => 'Mario Alberto Kempes',
        'ciudad' => 'Córdoba',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/d/d6/Escudo_del_Club_Atl%C3%A9tico_Talleres.svg',
        'imagen_principal' => '../img/talleres.png',
        'proximos_partidos' => [
            ['dia' => '04/12', 'lv' => 'L', 'rival' => 'Tigre', 'hora' => '15:30', 'es_clasico' => false],
            ['dia' => '11/12', 'lv' => 'V', 'rival' => 'Unión', 'hora' => '18:00', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '27/11', 'lv' => 'V', 'rival' => 'Vélez', 'resultado' => '2-1', 'clase_resultado' => 'result-win', 'clase_score' => 'score-win'],
            ['dia' => '20/11', 'lv' => 'L', 'rival' => 'Aldosivi', 'resultado' => '1-1', 'clase_resultado' => 'result-draw', 'clase_score' => 'score-draw'],
        ],
        'goles' => [
            ['nombre' => 'Barticciotto', 'cantidad' => 8],
            ['nombre' => 'Girotti', 'cantidad' => 6],
        ],
        'asistencias' => [
            ['nombre' => 'Portillo', 'cantidad' => 5],
            ['nombre' => 'Ortegoza', 'cantidad' => 3],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Walter Ribonetto', 'rol' => 'Entrenador', 'edad' => '50', 'nacimiento' => '06/07/1974', 'altura' => '1.84', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Guido Herrera', 'rol' => 'Arquero', 'edad' => '32', 'nacimiento' => '29/02/1992', 'altura' => '1.87', 'numero' => 22, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Matías Catalán', 'rol' => 'Defensor', 'edad' => '32', 'nacimiento' => '19/08/1992', 'altura' => '1.82', 'numero' => 4, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Ulises Ortegoza', 'rol' => 'Mediocampista', 'edad' => '27', 'nacimiento' => '19/04/1997', 'altura' => '1.80', 'numero' => 30, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Federico Girotti', 'rol' => 'Delantero', 'edad' => '25', 'nacimiento' => '02/06/1999', 'altura' => '1.90', 'numero' => 9, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- TIGRE ---
    'tigre' => [
        'nombre_slug' => 'tigre',
        'nombre_completo' => 'CLUB ATLÉTICO TIGRE',
        'titulo_pagina' => 'TIGRE HOY',
        'apodo' => 'Matador',
        'fundacion' => '1902',
        'estadio' => 'José Dellagiovanna',
        'ciudad' => 'Victoria',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/7/7f/Escudo_del_Club_Atl%C3%A9tico_Tigre.svg',
        'imagen_principal' => '../img/tigre.png',
        'proximos_partidos' => [
            ['dia' => '05/12', 'lv' => 'V', 'rival' => 'Unión', 'hora' => '17:00', 'es_clasico' => false],
            ['dia' => '12/12', 'lv' => 'L', 'rival' => 'Vélez', 'hora' => '19:30', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '28/11', 'lv' => 'L', 'rival' => 'Aldosivi', 'resultado' => '0-0', 'clase_resultado' => 'result-draw', 'clase_score' => 'score-draw'],
            ['dia' => '21/11', 'lv' => 'V', 'rival' => 'Argentinos Juniors', 'resultado' => '1-2', 'clase_resultado' => 'result-loss', 'clase_score' => 'score-loss'],
        ],
        'goles' => [
            ['nombre' => 'Armoa', 'cantidad' => 6],
            ['nombre' => 'Contín', 'cantidad' => 4],
        ],
        'asistencias' => [
            ['nombre' => 'Galván', 'cantidad' => 3],
            ['nombre' => 'Marchese', 'cantidad' => 2],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Sebastián Domínguez', 'rol' => 'Entrenador', 'edad' => '44', 'nacimiento' => '29/07/1980', 'altura' => '1.83', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Felipe Zenobio', 'rol' => 'Arquero', 'edad' => '24', 'nacimiento' => '22/05/2000', 'altura' => '1.85', 'numero' => 12, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Nehuén Paz', 'rol' => 'Defensor', 'edad' => '31', 'nacimiento' => '28/04/1993', 'altura' => '1.91', 'numero' => 6, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Santiago González', 'rol' => 'Mediocampista', 'edad' => '24', 'nacimiento' => '25/07/2000', 'altura' => '1.70', 'numero' => 11, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Nicolás Contín', 'rol' => 'Delantero', 'edad' => '29', 'nacimiento' => '07/12/1995', 'altura' => '1.83', 'numero' => 29, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- UNIÓN (SANTA FE) ---
    'union' => [
        'nombre_slug' => 'union',
        'nombre_completo' => 'CLUB ATLÉTICO UNIÓN',
        'titulo_pagina' => 'UNIÓN HOY',
        'apodo' => 'Tatengue',
        'fundacion' => '1907',
        'estadio' => '15 de Abril',
        'ciudad' => 'Santa Fe',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/8/8d/Escudo_del_Club_Atl%C3%A9tico_Uni%C3%B3n.svg',
        'imagen_principal' => '../img/union.png',
        'proximos_partidos' => [
            ['dia' => '06/12', 'lv' => 'L', 'rival' => 'Vélez', 'hora' => '16:00', 'es_clasico' => false],
            ['dia' => '13/12', 'lv' => 'V', 'rival' => 'Aldosivi', 'hora' => '18:30', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '29/11', 'lv' => 'V', 'rival' => 'Argentinos Juniors', 'resultado' => '1-1', 'clase_resultado' => 'result-draw', 'clase_score' => 'score-draw'],
            ['dia' => '22/11', 'lv' => 'L', 'rival' => 'Atlético Tucumán', 'resultado' => '2-0', 'clase_resultado' => 'result-win', 'clase_score' => 'score-win'],
        ],
        'goles' => [
            ['nombre' => 'Orsini', 'cantidad' => 7],
            ['nombre' => 'Domina', 'cantidad' => 5],
        ],
        'asistencias' => [
            ['nombre' => 'Pittón', 'cantidad' => 4],
            ['nombre' => 'Tanda', 'cantidad' => 3],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Cristian González', 'rol' => 'Entrenador', 'edad' => '50', 'nacimiento' => '04/08/1974', 'altura' => '1.80', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Thiago Cardozo', 'rol' => 'Arquero', 'edad' => '28', 'nacimiento' => '24/07/1996', 'altura' => '1.81', 'numero' => 25, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Nicolás Paz', 'rol' => 'Defensor', 'edad' => '22', 'nacimiento' => '13/10/2002', 'altura' => '1.80', 'numero' => 34, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Mauro Pittón', 'rol' => 'Mediocampista', 'edad' => '30', 'nacimiento' => '08/08/1994', 'altura' => '1.81', 'numero' => 28, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Nicolás Orsini', 'rol' => 'Delantero', 'edad' => '30', 'nacimiento' => '12/09/1994', 'altura' => '1.87', 'numero' => 33, 'es_dt' => false],
            ],
        ],
    ],
    
    // --- VÉLEZ SARSFIELD ---
    'velez' => [
        'nombre_slug' => 'velez',
        'nombre_completo' => 'CLUB ATLÉTICO VÉLEZ SARSFIELD',
        'titulo_pagina' => 'VÉLEZ HOY',
        'apodo' => 'Fortín',
        'fundacion' => '1910',
        'estadio' => 'José Amalfitani',
        'ciudad' => 'Buenos Aires',
        'css_file' => '../css/Boca.css',
        'icono_url' => 'https://upload.wikimedia.org/wikipedia/commons/4/40/Escudo_del_Club_Atl%C3%A9tico_V%C3%A9lez_Sarsfield.svg',
        'imagen_principal' => '../img/velez.png',
        'proximos_partidos' => [
            ['dia' => '07/12', 'lv' => 'V', 'rival' => 'Aldosivi', 'hora' => '19:00', 'es_clasico' => false],
            ['dia' => '14/12', 'lv' => 'L', 'rival' => 'Argentinos Juniors', 'hora' => '21:30', 'es_clasico' => false],
        ],
        'resultados' => [
            ['dia' => '30/11', 'lv' => 'L', 'rival' => 'Atlético Tucumán', 'resultado' => '2-0', 'clase_resultado' => 'result-win', 'clase_score' => 'score-win'],
            ['dia' => '23/11', 'lv' => 'V', 'rival' => 'Banfield', 'resultado' => '1-1', 'clase_resultado' => 'result-draw', 'clase_score' => 'score-draw'],
        ],
        'goles' => [
            ['nombre' => 'Aquino', 'cantidad' => 8],
            ['nombre' => 'Pizzini', 'cantidad' => 6],
        ],
        'asistencias' => [
            ['nombre' => 'Gómez', 'cantidad' => 5],
            ['nombre' => 'Bouzat', 'cantidad' => 3],
        ],
        'plantel' => [
            'DIR' => [
                ['nombre' => 'Gustavo Quinteros', 'rol' => 'Entrenador', 'edad' => '59', 'nacimiento' => '15/02/1965', 'altura' => '1.81', 'numero' => null, 'es_dt' => true],
            ],
            'ARQ' => [
                ['nombre' => 'Tomás Marchiori', 'rol' => 'Arquero', 'edad' => '29', 'nacimiento' => '20/06/1995', 'altura' => '1.86', 'numero' => 1, 'es_dt' => false],
            ],
            'DEF' => [
                ['nombre' => 'Valentín Gómez', 'rol' => 'Defensor', 'edad' => '21', 'nacimiento' => '05/06/2003', 'altura' => '1.81', 'numero' => 31, 'es_dt' => false],
            ],
            'MED' => [
                ['nombre' => 'Christian Ordóñez', 'rol' => 'Mediocampista', 'edad' => '20', 'nacimiento' => '24/04/2004', 'altura' => '1.79', 'numero' => 35, 'es_dt' => false],
            ],
            'DEL' => [
                ['nombre' => 'Braian Romero', 'rol' => 'Delantero', 'edad' => '33', 'nacimiento' => '15/06/1991', 'altura' => '1.78', 'numero' => 9, 'es_dt' => false],
            ],
        ],
    ],
];
?>