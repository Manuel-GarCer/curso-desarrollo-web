-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-01-2023 a las 00:32:18
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agencia`
--
CREATE DATABASE IF NOT EXISTS `agencia` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `agencia`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios` (
  `com_id` int(10) UNSIGNED NOT NULL,
  `com_user_id` int(11) NOT NULL,
  `com_por_id` int(11) NOT NULL,
  `com_mensaje` varchar(100) NOT NULL,
  `com_fecha` datetime NOT NULL,
  `com_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: pendiente, 1: aprobado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`com_id`, `com_user_id`, `com_por_id`, `com_mensaje`, `com_fecha`, `com_status`) VALUES
(1, 3, 2, 'Este es el primer comentario', '2022-12-26 21:33:38', 1),
(2, 3, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt qui saepe odio labore deserunt con', '2022-12-27 22:45:55', 2),
(3, 3, 2, 'Comentario 3', '2022-12-28 16:56:49', 1),
(4, 3, 3, 'Este es mi comentario', '2022-12-28 17:21:16', 0),
(5, 3, 2, 'Comentario de Christian', '2022-12-28 18:15:05', 0),
(6, 1, 2, 'Carlita Comentario', '2022-12-28 18:17:48', 0),
(7, 2, 2, 'Jaimito Comentario', '2022-12-28 18:19:08', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

DROP TABLE IF EXISTS `contacto`;
CREATE TABLE `contacto` (
  `cont_nombre` varchar(100) NOT NULL,
  `cont_correo` varchar(50) NOT NULL,
  `cont_telefono` varchar(20) NOT NULL,
  `cont_mensaje` varchar(300) NOT NULL,
  `cont_fecha` datetime NOT NULL,
  `cont_delete` tinyint(4) DEFAULT 1 COMMENT '0: desactivado, 1:activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`cont_nombre`, `cont_correo`, `cont_telefono`, `cont_mensaje`, `cont_fecha`, `cont_delete`) VALUES
('Hector Perez Martinez', 'lavoe@gmail.com', '976901730', 'Ahora se debe funcionar...', '2022-12-30 23:13:40', 1),
('Ramiro Dasilva Ocasio', 'ramirod@gmail.com', '970088986', 'Este es el segundo contacto de Ramiro', '2023-01-03 11:37:20', 1),
('', '', '', '', '2023-01-03 14:18:50', 1),
('Pedro Barrios León', 'pedronavaja@gmail.com', '945851661', 'Comentario de Pedro Navaja', '2023-01-03 17:16:45', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `header`
--

DROP TABLE IF EXISTS `header`;
CREATE TABLE `header` (
  `hea_logo` varchar(50) NOT NULL,
  `hea_subtitulo` varchar(100) NOT NULL,
  `hea_titulo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `header`
--

INSERT INTO `header` (`hea_logo`, `hea_subtitulo`, `hea_titulo`) VALUES
('Manuel \" El Salsero\" Garcia', 'Bienvenido a nuestro estudio', 'es grato conocerte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portafolio`
--

DROP TABLE IF EXISTS `portafolio`;
CREATE TABLE `portafolio` (
  `por_id` int(10) UNSIGNED NOT NULL,
  `por_user_id` int(11) NOT NULL,
  `por_titulo` varchar(50) NOT NULL,
  `por_subtitulo` varchar(50) NOT NULL,
  `por_imgSmall` text NOT NULL,
  `por_imgLarge` text NOT NULL,
  `por_contenido` text NOT NULL,
  `por_fecha` date NOT NULL,
  `por_status` varchar(20) NOT NULL,
  `por_vistas` int(11) DEFAULT 0,
  `por_delete` tinyint(4) DEFAULT 1 COMMENT '0: desactivado, 1:activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `portafolio`
--

INSERT INTO `portafolio` (`por_id`, `por_user_id`, `por_titulo`, `por_subtitulo`, `por_imgSmall`, `por_imgLarge`, `por_contenido`, `por_fecha`, `por_status`, `por_vistas`, `por_delete`) VALUES
(1, 1, 'Threads', 'Illustration', '01-thumbnail.jpg', '01-full.jpg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat nulla eos explicabo quidem nesciunt quod ipsa laborum numquam, provident ab consectetur atque consequatur porro, molestias, alias at. Accusamus, iste voluptas!', '2022-12-16', 'publicado', 46, 1),
(2, 3, 'Explore', 'Graphic Design', 'fe510d407332c23df51a9304dc82de33.jpg', 'bdbd85c0d8040da7f9f847d665524742.jpg', 'contenido', '2022-12-21', 'publicado', 44, 1),
(3, 3, 'Finish', 'Identity', '9901511134526e56d4c95dda1d99689c.jpg', '7634ac9100622e7154745cd177e30b01.jpg', 'Contenido 3', '2022-12-21', 'publicado', 6, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_nombres` varchar(100) NOT NULL,
  `user_apellidos` varchar(100) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_img` text DEFAULT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_token` text DEFAULT NULL,
  `user_status` tinyint(4) DEFAULT 0 COMMENT 'status 0: usuario no activo, status 1: usuario activo',
  `user_rol` varchar(50) NOT NULL DEFAULT 'suscriptor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `user_nombres`, `user_apellidos`, `user_email`, `user_img`, `user_pass`, `user_token`, `user_status`, `user_rol`) VALUES
(1, 'Carlita', 'Perez', 'carlita@gmail.com', NULL, '$2y$12$3bxr0Tq1Pw9FetwG/Rp5uOln3wFrl.MWWS5leniUJ3rqTcGVcIk2O', '', 1, 'admin'),
(2, 'Jaimito', 'Perez', 'jaimito@gmail.com', NULL, '$2y$12$YBRF82uECrbV5vZSCbtOE.I6eKA0sI5952qRLNhzwHioxb5LFOBra', '', 1, 'suscriptor'),
(3, 'Manolo', 'García', 'manolo@gmail.com', NULL, '$2y$12$PXVL.Jza8KYt3RxOjeFSoeMhXwYKnVU8ZycgG1b6CuD.CaAkhST4O', '', 1, 'admin'),
(4, 'Christian', 'Garcia', 'Christian@gmail.com', NULL, '$2y$12$SZiC31bTLFWRJUrKrtbgLuoerComdWjvS9fctjsoIb9bh2xYLxJnC', '', 1, 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`com_id`);

--
-- Indices de la tabla `portafolio`
--
ALTER TABLE `portafolio`
  ADD PRIMARY KEY (`por_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `com_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `portafolio`
--
ALTER TABLE `portafolio`
  MODIFY `por_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
