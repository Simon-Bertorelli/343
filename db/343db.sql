-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2025 a las 05:44:33
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `343bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campeon_liga`
--

CREATE TABLE `campeon_liga` (
  `id_campeon` int(11) NOT NULL,
  `id_liga` int(11) DEFAULT NULL,
  `temporada` year(4) DEFAULT NULL,
  `id_equipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenador`
--

CREATE TABLE `entrenador` (
  `id_entrenador` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `id_pais` int(11) DEFAULT NULL,
  `id_equipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entrenador`
--

INSERT INTO `entrenador` (`id_entrenador`, `nombre`, `apellido`, `id_pais`, `id_equipo`) VALUES
(1, 'Marcelo', 'Gallardo', NULL, 1),
(2, 'Claudio', 'Ubeda', NULL, 2),
(3, 'Gustavo', 'Costas', NULL, 3),
(4, 'Gustavo', 'Quinteros', NULL, 4),
(5, 'Damian', 'Ayude', NULL, 5),
(6, 'Frank', 'Kudelka', NULL, 6),
(7, 'Guillermo', 'Barros Schelotto', NULL, 7),
(8, 'Nicolás', 'Diez', NULL, 8),
(9, 'Eduardo', 'Domínguez', NULL, 9),
(10, 'Alejandro', 'Orfila', NULL, 10),
(11, 'Ariel', 'Holan', NULL, 11),
(12, 'Cristian', 'Fabbiani', NULL, 12),
(13, 'Diego', 'Davobe', NULL, 13),
(14, 'Cristian', 'González', NULL, 14),
(15, 'Rubén', 'Insúa', NULL, 15),
(16, 'Facundo', 'Sava', NULL, 16),
(17, 'Leonardo', 'Madelon', NULL, 17),
(18, 'Guillermo', 'Farre', NULL, 18),
(19, 'Lucas', 'Pusineri', NULL, 19),
(20, 'Pedro', 'Troglio', NULL, 20),
(21, 'Mauricio', 'Pellegrino', NULL, 21),
(22, 'Mariano', 'Soso', NULL, 22),
(23, 'Leandro', 'Romagnoli', NULL, 23),
(24, 'Carlos', 'Tevez', NULL, 24),
(25, 'Pedro', 'Troglio', NULL, 25),
(26, 'Ricardo', 'Zielinski', NULL, 26),
(27, 'Walter', 'Ribonetto', NULL, 27),
(28, 'Omar', 'De Felippe', NULL, 28),
(29, 'Gustavo', 'Benitez', NULL, 29),
(30, 'Alfredo', 'Berti', NULL, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id_equipo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `formacion` varchar(50) DEFAULT NULL,
  `id_liga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id_equipo`, `nombre`, `formacion`, `id_liga`) VALUES
(1, 'River Plate', '4-3-3', NULL),
(2, 'Boca Juniors', '4-2-3-1', NULL),
(3, 'Racing Club', '4-3-3', NULL),
(4, 'Independiente', '4-4-2', NULL),
(5, 'San Lorenzo', '5-3-2', NULL),
(6, 'Huracán', '4-4-2', NULL),
(7, 'Vélez Sarsfield', '4-3-3', NULL),
(8, 'Argentinos Juniors', '3-4-3', NULL),
(9, 'Estudiantes de La Plata', '4-4-2', NULL),
(10, 'Gimnasia y Esgrima La Plata', '4-2-3-1', NULL),
(11, 'Rosario Central', '4-3-3', NULL),
(12, 'Newell’s Old Boys', '4-2-3-1', NULL),
(13, 'Tigre', '4-4-2', NULL),
(14, 'Platense', '4-4-2', NULL),
(15, 'Barracas Central', '4-4-2', NULL),
(16, 'Sarmiento de Junín', '4-4-2', NULL),
(17, 'Unión de Santa Fe', '4-2-3-1', NULL),
(18, 'Colón de Santa Fe', '4-4-2', NULL),
(19, 'Atlético Tucumán', '4-4-2', NULL),
(20, 'Banfield', '4-3-3', NULL),
(21, 'Lanús', '4-3-3', NULL),
(22, 'Defensa y Justicia', '4-2-3-1', NULL),
(23, 'Arsenal de Sarandí', '4-4-2', NULL),
(24, 'Talleres de Córdoba', '4-2-3-1', NULL),
(25, 'Instituto de Córdoba', '4-4-2', NULL),
(26, 'Belgrano de Córdoba', '4-4-2', NULL),
(27, 'Godoy Cruz', '4-3-3', NULL),
(28, 'Central Córdoba (SdE)', '5-3-2', NULL),
(29, 'Barracas Central', '4-4-2', NULL),
(30, 'Independiente Rivadavia', '4-4-2', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas_liga`
--

CREATE TABLE `estadisticas_liga` (
  `id_estadistica` int(11) NOT NULL,
  `id_liga` int(11) DEFAULT NULL,
  `temporada` year(4) DEFAULT NULL,
  `id_goleador` int(11) DEFAULT NULL,
  `id_asistidor` int(11) DEFAULT NULL,
  `id_jugador_mas_amarillas` int(11) DEFAULT NULL,
  `id_jugador_mas_rojas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `id_equipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `nombre`, `descripcion`, `id_equipo`) VALUES
(1, 'Hinchas de Boca', 'Grupo oficial para discutir noticias de Boca Juniors.', NULL),
(2, 'Los Millonarios', 'Comunidad para fanáticos de River Plate y su historia.', NULL),
(3, 'Rey de Copas', 'Espacio de debate sobre el Club Atlético Independiente.', NULL),
(4, 'La Academia', 'Grupo de apoyo e información para los seguidores de Racing Club.', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_equipo`
--

CREATE TABLE `historial_equipo` (
  `id_historial` int(11) NOT NULL,
  `id_equipo` int(11) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `logro` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE `jugador` (
  `id_jugador` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `id_posicion` int(11) DEFAULT NULL,
  `id_pais` int(11) DEFAULT NULL,
  `id_equipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador_partido`
--

CREATE TABLE `jugador_partido` (
  `id_jugador` int(11) NOT NULL,
  `id_partido` int(11) NOT NULL,
  `goles` int(11) DEFAULT 0,
  `amarillas` int(11) DEFAULT 0,
  `rojas` int(11) DEFAULT 0,
  `minutos_jugados` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liga`
--

CREATE TABLE `liga` (
  `id_liga` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `liga`
--

INSERT INTO `liga` (`id_liga`, `nombre`) VALUES
(129, 'Liga Profesional de Fútbol Argentino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `id_noticia` int(11) NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `contenido` text DEFAULT NULL,
  `fuente` varchar(100) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id_pais`, `nombre`) VALUES
(1, 'Afganistán'),
(2, 'Albania'),
(3, 'Alemania'),
(4, 'Andorra'),
(5, 'Angola'),
(6, 'Antigua y Barbuda'),
(7, 'Arabia Saudita'),
(8, 'Argelia'),
(9, 'Argentina'),
(10, 'Armenia'),
(11, 'Australia'),
(12, 'Austria'),
(13, 'Azerbaiyán'),
(14, 'Bahamas'),
(15, 'Bangladés'),
(16, 'Barbados'),
(17, 'Baréin'),
(18, 'Bélgica'),
(19, 'Belice'),
(20, 'Benín'),
(22, 'Bielorrusia'),
(23, 'Bolivia'),
(24, 'Bosnia y Herzegovina'),
(25, 'Botsuana'),
(26, 'Brasil'),
(27, 'Brunéi'),
(28, 'Bulgaria'),
(29, 'Burkina Faso'),
(30, 'Burundi'),
(21, 'Bután'),
(31, 'Cabo Verde'),
(32, 'Camboya'),
(33, 'Camerún'),
(34, 'Canadá'),
(35, 'Catar'),
(36, 'Chad'),
(37, 'Chile'),
(38, 'China'),
(39, 'Chipre'),
(40, 'Colombia'),
(41, 'Comoras'),
(42, 'Congo (República del Congo)'),
(44, 'Corea del Norte'),
(45, 'Corea del Sur'),
(46, 'Costa de Marfil'),
(47, 'Costa Rica'),
(48, 'Croacia'),
(49, 'Cuba'),
(50, 'Dinamarca'),
(51, 'Dominica'),
(52, 'Ecuador'),
(53, 'Egipto'),
(54, 'El Salvador'),
(55, 'Emiratos Árabes Unidos'),
(56, 'Eritrea'),
(57, 'Eslovaquia'),
(58, 'Eslovenia'),
(59, 'España'),
(60, 'Estados Unidos'),
(61, 'Estonia'),
(62, 'Esuatini'),
(63, 'Etiopía'),
(64, 'Filipinas'),
(65, 'Finlandia'),
(66, 'Fiyi'),
(67, 'Francia'),
(68, 'Gabón'),
(69, 'Gambia'),
(70, 'Georgia'),
(71, 'Ghana'),
(73, 'Granada'),
(72, 'Grecia'),
(74, 'Guatemala'),
(75, 'Guinea'),
(77, 'Guinea Ecuatorial'),
(76, 'Guinea-Bisáu'),
(78, 'Guyana'),
(79, 'Haití'),
(80, 'Honduras'),
(81, 'Hungría'),
(82, 'India'),
(83, 'Indonesia'),
(84, 'Irak'),
(85, 'Irán'),
(86, 'Irlanda'),
(87, 'Islandia'),
(88, 'Islas Marshall'),
(89, 'Islas Salomón'),
(90, 'Israel'),
(91, 'Italia'),
(92, 'Jamaica'),
(93, 'Japón'),
(94, 'Jordania'),
(95, 'Kazajistán'),
(96, 'Kenia'),
(99, 'Kirguistán'),
(97, 'Kiribati'),
(98, 'Kuwait'),
(100, 'Laos'),
(103, 'Lesoto'),
(101, 'Letonia'),
(102, 'Líbano'),
(104, 'Liberia'),
(105, 'Libia'),
(106, 'Liechtenstein'),
(107, 'Lituania'),
(108, 'Luxemburgo'),
(109, 'Macedonia del Norte'),
(110, 'Madagascar'),
(111, 'Malasia'),
(112, 'Malaui'),
(113, 'Maldivas'),
(114, 'Malí'),
(115, 'Malta'),
(116, 'Marruecos'),
(117, 'Mauricio'),
(118, 'Mauritania'),
(119, 'México'),
(120, 'Micronesia'),
(121, 'Moldavia'),
(122, 'Mónaco'),
(123, 'Mongolia'),
(124, 'Montenegro'),
(125, 'Mozambique'),
(126, 'Myanmar'),
(127, 'Namibia'),
(128, 'Nauru'),
(129, 'Nepal'),
(130, 'Nicaragua'),
(131, 'Níger'),
(132, 'Nigeria'),
(133, 'Noruega'),
(134, 'Nueva Zelanda'),
(135, 'Omán'),
(136, 'Países Bajos'),
(137, 'Pakistán'),
(138, 'Palaos'),
(194, 'Palestina'),
(139, 'Panamá'),
(140, 'Papúa Nueva Guinea'),
(141, 'Paraguay'),
(142, 'Perú'),
(143, 'Polonia'),
(144, 'Portugal'),
(145, 'Reino Unido'),
(146, 'República Centroafricana'),
(147, 'República Checa'),
(43, 'República Democrática del Congo'),
(148, 'República Dominicana'),
(149, 'Ruanda'),
(150, 'Rumanía'),
(151, 'Rusia'),
(152, 'Samoa'),
(153, 'San Cristóbal y Nieves'),
(154, 'San Marino'),
(155, 'San Vicente y las Granadinas'),
(156, 'Santa Lucía'),
(195, 'Santa Sede'),
(157, 'Santo Tomé y Príncipe'),
(158, 'Senegal'),
(159, 'Serbia'),
(160, 'Seychelles'),
(161, 'Sierra Leona'),
(162, 'Singapur'),
(163, 'Siria'),
(164, 'Somalia'),
(165, 'Sri Lanka'),
(166, 'Sudáfrica'),
(167, 'Sudán'),
(168, 'Sudán del Sur'),
(169, 'Suecia'),
(170, 'Suiza'),
(171, 'Surinam'),
(172, 'Tailandia'),
(173, 'Tanzania'),
(174, 'Tayikistán'),
(175, 'Timor Oriental'),
(176, 'Togo'),
(177, 'Tonga'),
(178, 'Trinidad y Tobago'),
(179, 'Túnez'),
(180, 'Turkmenistán'),
(181, 'Turquía'),
(182, 'Tuvalu'),
(183, 'Ucrania'),
(184, 'Uganda'),
(185, 'Uruguay'),
(186, 'Uzbekistán'),
(187, 'Vanuatu'),
(188, 'Venezuela'),
(189, 'Vietnam'),
(190, 'Yemen'),
(191, 'Yibuti'),
(192, 'Zambia'),
(193, 'Zimbabue');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partido`
--

CREATE TABLE `partido` (
  `id_partido` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `id_equipo_local` int(11) DEFAULT NULL,
  `id_equipo_visitante` int(11) DEFAULT NULL,
  `resultado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posicion`
--

CREATE TABLE `posicion` (
  `id_posicion` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `posicion`
--

INSERT INTO `posicion` (`id_posicion`, `nombre`) VALUES
(1, 'Arquero'),
(2, 'Defensa-central'),
(10, 'Delantero-centro'),
(12, 'Extremo-derecho'),
(11, 'Extremo-izquierdo'),
(4, 'Lateral-derecho'),
(3, 'Lateral-izquierdo'),
(5, 'Mediocampista'),
(7, 'Mediocampista-defensivo'),
(9, 'Mediocampista-derecho'),
(8, 'Mediocampista-izquierdo'),
(6, 'Mediocampista-ofensivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `id_publicacion` int(11) NOT NULL,
  `contenido` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_usuario` int(11) DEFAULT NULL,
  `id_grupo` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`id_publicacion`, `contenido`, `fecha`, `id_usuario`, `id_grupo`, `parent_id`) VALUES
(1, 'hola', '2025-10-12 23:39:58', 1, 1, NULL),
(2, 'hola', '2025-10-12 23:40:02', 1, 1, 1),
(3, 'bot', '2025-10-12 23:44:31', 2, 1, NULL),
(4, 'h', '2025-10-12 23:52:14', 1, 1, NULL),
(5, 'h', '2025-10-12 23:52:15', 1, 1, NULL),
(6, 'h', '2025-10-12 23:52:16', 1, 1, NULL),
(7, 'h', '2025-10-12 23:52:18', 1, 1, NULL),
(8, 'h', '2025-10-12 23:52:20', 1, 1, NULL),
(9, 'hola', '2025-10-13 00:01:00', 1, 2, NULL),
(10, 'hola', '2025-10-13 00:27:03', 1, 1, 2),
(11, 'ganamossssssss', '2025-10-13 01:23:18', 1, 4, NULL),
(12, 'fue suerte', '2025-10-13 01:23:31', 1, 4, 11),
(13, 'go0dddddd', '2025-10-13 01:23:41', 1, 4, NULL),
(14, 'hola', '2025-10-13 01:24:29', 2, 4, NULL),
(15, 'hola', '2025-10-13 01:25:20', 3, 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reaccion`
--

CREATE TABLE `reaccion` (
  `id_reaccion` int(11) NOT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `tipo_objeto` enum('publicacion','noticia') DEFAULT NULL,
  `id_objeto` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reaccion`
--

INSERT INTO `reaccion` (`id_reaccion`, `tipo`, `id_usuario`, `tipo_objeto`, `id_objeto`, `fecha`) VALUES
(5, 'like', 1, 'publicacion', 8, '2025-10-12 23:58:00'),
(18, 'like', 1, 'publicacion', 2, '2025-10-13 01:17:32'),
(20, 'like', 1, 'publicacion', 1, '2025-10-13 01:17:33'),
(21, 'like', 1, 'publicacion', 3, '2025-10-13 01:17:34'),
(23, 'like', 1, 'publicacion', 4, '2025-10-13 01:17:36'),
(27, 'like', 1, 'publicacion', 11, '2025-10-13 01:23:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_equipo_favorito` int(11) DEFAULT NULL,
  `rol` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `contrasena`, `email`, `id_equipo_favorito`, `rol`) VALUES
(1, 'juan', '$2y$10$FDJz4hNGsGU1ezyxbLb/EeEJ8vEgmiB1BiqxRw5VqkFKfi5kQfdge', 'juanpatriciochiriff@gmail.com', NULL, 'admin'),
(2, 'theo', '$2y$10$t.elQ9lhFM/rBptAowvDZu6qf5zRYT9e155peCwoNerhFJAYwU6Ru', 'gchiriff@gmail.com', NULL, 'user'),
(3, 'ciro', '$2y$10$7LOJydmEYq5o7zXHo4CTOetYBhk.WNrNCoM13vf7Q.2aA98vWZWVm', 'theo@gmail.com', NULL, 'user');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_grupo`
--

CREATE TABLE `usuario_grupo` (
  `id_usuario` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_grupo`
--

INSERT INTO `usuario_grupo` (`id_usuario`, `id_grupo`) VALUES
(1, 1),
(1, 2),
(1, 4),
(2, 1),
(2, 4),
(3, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `campeon_liga`
--
ALTER TABLE `campeon_liga`
  ADD PRIMARY KEY (`id_campeon`),
  ADD KEY `campeon_liga_ibfk_1` (`id_liga`),
  ADD KEY `campeon_liga_ibfk_2` (`id_equipo`);

--
-- Indices de la tabla `entrenador`
--
ALTER TABLE `entrenador`
  ADD PRIMARY KEY (`id_entrenador`),
  ADD KEY `entrenador_ibfk_1` (`id_pais`),
  ADD KEY `entrenador_ibfk_2` (`id_equipo`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `id_liga` (`id_liga`);

--
-- Indices de la tabla `estadisticas_liga`
--
ALTER TABLE `estadisticas_liga`
  ADD PRIMARY KEY (`id_estadistica`),
  ADD KEY `id_liga` (`id_liga`),
  ADD KEY `estadisticas_liga_ibfk_2` (`id_goleador`),
  ADD KEY `estadisticas_liga_ibfk_3` (`id_asistidor`),
  ADD KEY `estadisticas_liga_ibfk_4` (`id_jugador_mas_amarillas`),
  ADD KEY `estadisticas_liga_ibfk_5` (`id_jugador_mas_rojas`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`),
  ADD KEY `fk_grupo_equipo` (`id_equipo`);

--
-- Indices de la tabla `historial_equipo`
--
ALTER TABLE `historial_equipo`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `historial_equipo_ibfk_1` (`id_equipo`);

--
-- Indices de la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD PRIMARY KEY (`id_jugador`),
  ADD KEY `id_posicion` (`id_posicion`),
  ADD KEY `id_pais` (`id_pais`),
  ADD KEY `jugador_ibfk_3` (`id_equipo`);

--
-- Indices de la tabla `jugador_partido`
--
ALTER TABLE `jugador_partido`
  ADD PRIMARY KEY (`id_jugador`,`id_partido`),
  ADD KEY `jugador_partido_ibfk_2` (`id_partido`);

--
-- Indices de la tabla `liga`
--
ALTER TABLE `liga`
  ADD PRIMARY KEY (`id_liga`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pais`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `partido`
--
ALTER TABLE `partido`
  ADD PRIMARY KEY (`id_partido`),
  ADD KEY `partido_ibfk_1` (`id_equipo_local`),
  ADD KEY `partido_ibfk_2` (`id_equipo_visitante`);

--
-- Indices de la tabla `posicion`
--
ALTER TABLE `posicion`
  ADD PRIMARY KEY (`id_posicion`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`id_publicacion`),
  ADD KEY `publicacion_ibfk_1` (`id_usuario`),
  ADD KEY `publicacion_ibfk_2` (`id_grupo`),
  ADD KEY `fk_publicacion_parent` (`parent_id`);

--
-- Indices de la tabla `reaccion`
--
ALTER TABLE `reaccion`
  ADD PRIMARY KEY (`id_reaccion`),
  ADD KEY `reaccion_ibfk_1` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_equipo_favorito` (`id_equipo_favorito`);

--
-- Indices de la tabla `usuario_grupo`
--
ALTER TABLE `usuario_grupo`
  ADD PRIMARY KEY (`id_usuario`,`id_grupo`),
  ADD KEY `usuario_grupo_ibfk_2` (`id_grupo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `campeon_liga`
--
ALTER TABLE `campeon_liga`
  MODIFY `id_campeon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entrenador`
--
ALTER TABLE `entrenador`
  MODIFY `id_entrenador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `estadisticas_liga`
--
ALTER TABLE `estadisticas_liga`
  MODIFY `id_estadistica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `historial_equipo`
--
ALTER TABLE `historial_equipo`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jugador`
--
ALTER TABLE `jugador`
  MODIFY `id_jugador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `liga`
--
ALTER TABLE `liga`
  MODIFY `id_liga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT de la tabla `partido`
--
ALTER TABLE `partido`
  MODIFY `id_partido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `posicion`
--
ALTER TABLE `posicion`
  MODIFY `id_posicion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `id_publicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `reaccion`
--
ALTER TABLE `reaccion`
  MODIFY `id_reaccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `campeon_liga`
--
ALTER TABLE `campeon_liga`
  ADD CONSTRAINT `campeon_liga_ibfk_1` FOREIGN KEY (`id_liga`) REFERENCES `liga` (`id_liga`) ON DELETE SET NULL,
  ADD CONSTRAINT `campeon_liga_ibfk_2` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`) ON DELETE SET NULL;

--
-- Filtros para la tabla `entrenador`
--
ALTER TABLE `entrenador`
  ADD CONSTRAINT `entrenador_ibfk_1` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id_pais`) ON DELETE SET NULL,
  ADD CONSTRAINT `entrenador_ibfk_2` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`) ON DELETE SET NULL;

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `equipo_ibfk_1` FOREIGN KEY (`id_liga`) REFERENCES `liga` (`id_liga`);

--
-- Filtros para la tabla `estadisticas_liga`
--
ALTER TABLE `estadisticas_liga`
  ADD CONSTRAINT `estadisticas_liga_ibfk_1` FOREIGN KEY (`id_liga`) REFERENCES `liga` (`id_liga`),
  ADD CONSTRAINT `estadisticas_liga_ibfk_2` FOREIGN KEY (`id_goleador`) REFERENCES `jugador` (`id_jugador`) ON DELETE SET NULL,
  ADD CONSTRAINT `estadisticas_liga_ibfk_3` FOREIGN KEY (`id_asistidor`) REFERENCES `jugador` (`id_jugador`) ON DELETE SET NULL,
  ADD CONSTRAINT `estadisticas_liga_ibfk_4` FOREIGN KEY (`id_jugador_mas_amarillas`) REFERENCES `jugador` (`id_jugador`) ON DELETE SET NULL,
  ADD CONSTRAINT `estadisticas_liga_ibfk_5` FOREIGN KEY (`id_jugador_mas_rojas`) REFERENCES `jugador` (`id_jugador`) ON DELETE SET NULL;

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `fk_grupo_equipo` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial_equipo`
--
ALTER TABLE `historial_equipo`
  ADD CONSTRAINT `historial_equipo_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`) ON DELETE SET NULL;

--
-- Filtros para la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD CONSTRAINT `jugador_ibfk_1` FOREIGN KEY (`id_posicion`) REFERENCES `posicion` (`id_posicion`),
  ADD CONSTRAINT `jugador_ibfk_2` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id_pais`),
  ADD CONSTRAINT `jugador_ibfk_3` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`) ON DELETE SET NULL;

--
-- Filtros para la tabla `jugador_partido`
--
ALTER TABLE `jugador_partido`
  ADD CONSTRAINT `jugador_partido_ibfk_1` FOREIGN KEY (`id_jugador`) REFERENCES `jugador` (`id_jugador`) ON DELETE CASCADE,
  ADD CONSTRAINT `jugador_partido_ibfk_2` FOREIGN KEY (`id_partido`) REFERENCES `partido` (`id_partido`) ON DELETE CASCADE;

--
-- Filtros para la tabla `partido`
--
ALTER TABLE `partido`
  ADD CONSTRAINT `partido_ibfk_1` FOREIGN KEY (`id_equipo_local`) REFERENCES `equipo` (`id_equipo`) ON DELETE SET NULL,
  ADD CONSTRAINT `partido_ibfk_2` FOREIGN KEY (`id_equipo_visitante`) REFERENCES `equipo` (`id_equipo`) ON DELETE SET NULL;

--
-- Filtros para la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `fk_publicacion_parent` FOREIGN KEY (`parent_id`) REFERENCES `publicacion` (`id_publicacion`) ON DELETE CASCADE,
  ADD CONSTRAINT `publicacion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `publicacion_ibfk_2` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reaccion`
--
ALTER TABLE `reaccion`
  ADD CONSTRAINT `reaccion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_equipo_favorito` FOREIGN KEY (`id_equipo_favorito`) REFERENCES `equipo` (`id_equipo`) ON DELETE SET NULL;

--
-- Filtros para la tabla `usuario_grupo`
--
ALTER TABLE `usuario_grupo`
  ADD CONSTRAINT `usuario_grupo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `usuario_grupo_ibfk_2` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
