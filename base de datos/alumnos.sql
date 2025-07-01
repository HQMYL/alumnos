-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2025 a las 00:14:21
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
-- Base de datos: `alumnos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(15) NOT NULL,
  `nombre_curso` varchar(70) NOT NULL,
  `descripcion_curso` text NOT NULL,
  `duracion` text NOT NULL,
  `profesor_asignado` varchar(90) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(15) NOT NULL,
  `estado` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `estado`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logotipo`
--

CREATE TABLE `logotipo` (
  `id` int(15) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL,
  `ruc` int(15) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `img` varchar(90) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `logotipo`
--

INSERT INTO `logotipo` (`id`, `nombre`, `ruc`, `direccion`, `img`) VALUES
(1, 'Guía', 879345623, 'Atenas', '1722570723.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(15) NOT NULL,
  `rol` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Asesor'),
(3, 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_usuario` int(15) NOT NULL,
  `codigo` int(40) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `direccion` varchar(90) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `telefono` varchar(90) NOT NULL,
  `movil` varchar(40) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pass` varchar(90) NOT NULL,
  `id_tipo` varchar(90) NOT NULL,
  `id_estado_usuario` varchar(30) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_usuario`, `codigo`, `nombre`, `apellidos`, `direccion`, `correo`, `telefono`, `movil`, `usuario`, `pass`, `id_tipo`, `id_estado_usuario`, `img`) VALUES
(305, 542252, 'Juan Morera', '', '', '', '25248790', '', 'juan', '827ccb0eea8a706c4c34a16891f84e7b', '3', '1', '699379.jpg'),
(304, 184521, 'Celeste Arias', '', '', '', '24468712', '', 'celeste', '827ccb0eea8a706c4c34a16891f84e7b', '2', '1', '934033.jpg'),
(306, 546788, 'Horacio', 'Quesada Morera', '', 'hqm1256@gmail.com', '24468712', '60307744', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '1', '1', '451606.jpg'),
(326, 74790, 'Arce alpízar', '', 'Fátima', 'maricruz@gmail.com', '24463694', '43657812', 'maricruz', '827ccb0eea8a706c4c34a16891f84e7b', '2', '1', '458822.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `logotipo`
--
ALTER TABLE `logotipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `logotipo`
--
ALTER TABLE `logotipo`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_usuario` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=327;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
