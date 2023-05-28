-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220512.d0c37da63d
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2023 a las 07:56:59
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ejemplo_eco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_calificacion`
--

CREATE TABLE `tb_calificacion` (
  `id_examen` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `calificacion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_categorias`
--

CREATE TABLE `tb_categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_categorias`
--

INSERT INTO `tb_categorias` (`id_categoria`, `nombre_categoria`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(12, 'Listening', '2023-05-22 10:20:02', '0000-00-00 00:00:00'),
(13, 'Reading', '2023-05-22 10:26:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_examenes`
--

CREATE TABLE `tb_examenes` (
  `id_examen` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `id_nivel` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre_examen` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_material`
--

CREATE TABLE `tb_material` (
  `id_producto` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `imagen` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `id_nivel` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_modulo`
--

CREATE TABLE `tb_modulo` (
  `id_modulo` int(11) NOT NULL,
  `nombre_modulo` varchar(255) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_modulo`
--

INSERT INTO `tb_modulo` (`id_modulo`, `nombre_modulo`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'Básico', '2023-05-22 17:24:18', '2023-05-24 23:29:33'),
(2, 'Intermedio', '2023-05-22 21:48:57', '0000-00-00 00:00:00'),
(3, 'Avanzado', '2023-05-22 21:53:37', '2023-05-24 16:48:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_niveles`
--

CREATE TABLE `tb_niveles` (
  `id_nivel` int(11) NOT NULL,
  `nombre_nivel` varchar(255) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_niveles`
--

INSERT INTO `tb_niveles` (`id_nivel`, `nombre_nivel`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, '1', '2023-05-23 02:39:59', '0000-00-00 00:00:00'),
(2, '2', '2023-05-23 02:41:14', '0000-00-00 00:00:00'),
(3, '3', '2023-05-23 02:41:20', '0000-00-00 00:00:00'),
(4, '4', '2023-05-23 02:41:30', '0000-00-00 00:00:00'),
(5, '5', '2023-05-23 02:41:36', '0000-00-00 00:00:00'),
(6, '6', '2023-05-23 02:41:49', '0000-00-00 00:00:00'),
(7, '7', '2023-05-23 02:41:58', '0000-00-00 00:00:00'),
(8, '8', '2023-05-23 02:42:02', '0000-00-00 00:00:00'),
(9, '9', '2023-05-23 02:42:08', '0000-00-00 00:00:00'),
(10, '10', '2023-05-23 02:42:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_preguntas`
--

CREATE TABLE `tb_preguntas` (
  `id_pregunta` int(11) NOT NULL,
  `pregunta` varchar(300) NOT NULL,
  `opcion1` varchar(125) NOT NULL,
  `opcion2` varchar(125) NOT NULL,
  `opcion3` varchar(125) NOT NULL,
  `opcion4` varchar(125) NOT NULL,
  `id_examen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_roles`
--

CREATE TABLE `tb_roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_roles`
--

INSERT INTO `tb_roles` (`id_rol`, `rol`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'Docente', '2023-01-23 23:15:19', '2023-05-22 13:16:39'),
(7, 'Estudiante', '2023-05-08 11:34:49', '0000-00-00 00:00:00'),
(8, 'Administrador', '2023-05-23 12:19:09', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `password_user` text COLLATE utf8_spanish_ci NOT NULL,
  `token` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_rol` int(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id_usuario`, `nombres`, `email`, `password_user`, `token`, `id_rol`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'Mario', 'mario.salas@alumno.buap.mx', '$2y$10$zcOe1Sqt5Jdj4SvpfvcI3.BY7euk9LwwikHTo1tnKcQbdGWPp1s5C', '', 1, '2023-01-24 15:16:01', '2023-05-08 11:28:45'),
(4, 'Mario', 'marrio123ordie@gmail.com', '$2y$10$ApjBJMR/Gx3DAKmGKiYxCuzaNBQCUL2JfmRWxJG5iCEqsLBsNZvv6', '', 1, '2023-05-08 11:27:07', '0000-00-00 00:00:00'),
(8, 'Lalo', 'ocelotlvalenciapatricia01@gmail.com', '$2y$10$ZIPfRWRJGIjVDrxHceUv3.Qz3G36PIUmTXmR.abv9ZwNZMhT32uCG', '', 1, '2023-05-24 14:28:04', '2023-05-24 14:28:18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_calificacion`
--
ALTER TABLE `tb_calificacion`
  ADD KEY `id_examen` (`id_examen`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tb_categorias`
--
ALTER TABLE `tb_categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `tb_examenes`
--
ALTER TABLE `tb_examenes`
  ADD PRIMARY KEY (`id_examen`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_modulo` (`id_modulo`),
  ADD KEY `id_nivel` (`id_nivel`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tb_material`
--
ALTER TABLE `tb_material`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_categoria` (`id_categoria`) USING BTREE,
  ADD KEY `id_modulo` (`id_modulo`),
  ADD KEY `id_nivel` (`id_nivel`);

--
-- Indices de la tabla `tb_modulo`
--
ALTER TABLE `tb_modulo`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indices de la tabla `tb_niveles`
--
ALTER TABLE `tb_niveles`
  ADD PRIMARY KEY (`id_nivel`);

--
-- Indices de la tabla `tb_preguntas`
--
ALTER TABLE `tb_preguntas`
  ADD PRIMARY KEY (`id_pregunta`),
  ADD KEY `id_examen` (`id_examen`);

--
-- Indices de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_categorias`
--
ALTER TABLE `tb_categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tb_examenes`
--
ALTER TABLE `tb_examenes`
  MODIFY `id_examen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tb_material`
--
ALTER TABLE `tb_material`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tb_modulo`
--
ALTER TABLE `tb_modulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tb_niveles`
--
ALTER TABLE `tb_niveles`
  MODIFY `id_nivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tb_preguntas`
--
ALTER TABLE `tb_preguntas`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_calificacion`
--
ALTER TABLE `tb_calificacion`
  ADD CONSTRAINT `tb_calificacion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_calificacion_ibfk_2` FOREIGN KEY (`id_examen`) REFERENCES `tb_examenes` (`id_examen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_examenes`
--
ALTER TABLE `tb_examenes`
  ADD CONSTRAINT `tb_examenes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_examenes_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categorias` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_examenes_ibfk_3` FOREIGN KEY (`id_modulo`) REFERENCES `tb_modulo` (`id_modulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_examenes_ibfk_4` FOREIGN KEY (`id_nivel`) REFERENCES `tb_niveles` (`id_nivel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_material`
--
ALTER TABLE `tb_material`
  ADD CONSTRAINT `tb_material_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categorias` (`id_categoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_material_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_material_ibfk_3` FOREIGN KEY (`id_modulo`) REFERENCES `tb_modulo` (`id_modulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_material_ibfk_4` FOREIGN KEY (`id_nivel`) REFERENCES `tb_niveles` (`id_nivel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_preguntas`
--
ALTER TABLE `tb_preguntas`
  ADD CONSTRAINT `tb_preguntas_ibfk_1` FOREIGN KEY (`id_examen`) REFERENCES `tb_examenes` (`id_examen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD CONSTRAINT `tb_usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `tb_roles` (`id_rol`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



