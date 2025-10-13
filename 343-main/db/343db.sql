-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2025 a las 03:29:49
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
-- Base de datos: `343db`
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
(1, 'Boca Juniors', '4-3-3', NULL),
(2, 'River Plate', '4-2-3-1', NULL),
(3, 'Independiente', '4-4-2', NULL),
(4, 'Racing Club', '3-5-2', NULL);

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
(1, 'Hinchas de Boca', 'Grupo oficial para discutir noticias de Boca Juniors.', 1),
(2, 'Los Millonarios', 'Comunidad para fanáticos de River Plate y su historia.', 2),
(3, 'Rey de Copas', 'Espacio de debate sobre el Club Atlético Independiente.', 3),
(4, 'La Academia', 'Grupo de apoyo e información para los seguidores de Racing Club.', 4);

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
(1, 'juan', '$2y$10$FDJz4hNGsGU1ezyxbLb/EeEJ8vEgmiB1BiqxRw5VqkFKfi5kQfdge', 'juanpatriciochiriff@gmail.com', 3, 'admin'),
(2, 'theo', '$2y$10$t.elQ9lhFM/rBptAowvDZu6qf5zRYT9e155peCwoNerhFJAYwU6Ru', 'gchiriff@gmail.com', 2, 'user'),
(3, 'ciro', '$2y$10$7LOJydmEYq5o7zXHo4CTOetYBhk.WNrNCoM13vf7Q.2aA98vWZWVm', 'theo@gmail.com', 3, 'user');

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
  MODIFY `id_entrenador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `partido`
--
ALTER TABLE `partido`
  MODIFY `id_partido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `posicion`
--
ALTER TABLE `posicion`
  MODIFY `id_posicion` int(11) NOT NULL AUTO_INCREMENT;

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
