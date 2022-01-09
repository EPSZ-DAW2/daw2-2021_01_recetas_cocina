-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-01-2022 a las 16:39:53
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `daw2_recetas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta_paso_imagenes`
--

CREATE TABLE `receta_paso_imagenes` (
  `id` int(12) UNSIGNED NOT NULL,
  `receta_paso_id` int(12) UNSIGNED NOT NULL,
  `orden` tinyint(2) NOT NULL DEFAULT 0,
  `imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `receta_paso_imagenes`
--

INSERT INTO `receta_paso_imagenes` (`id`, `receta_paso_id`, `orden`, `imagen`) VALUES
(4, 3, 1, 'masa-de-bizcocho-esponjoso-casero-XxXx801641729635.jpg'),
(5, 6, 1, 'bizcocho-de-yogur-casero-XxXx801641729679.jpg'),
(6, 6, 2, 'bizcocho-esponjoso-casero-receta-XxXx801641729702.jpg'),
(7, 8, 1, 'tortilla-de-patatas-paso-a-paso1641731605.jpg'),
(8, 10, 1, 'receta-tortilla-de-patatas1641731638.jpg'),
(9, 10, 2, 'tortilla-espanola1641731685.jpg'),
(10, 17, 1, 'Lentejas-2-11641732565.png'),
(11, 13, 1, 'Lentejas-11641732694.png'),
(12, 20, 1, 'Lentejas-31641732776.png'),
(13, 22, 1, 'revuelto_de_verduras_71247_paso_0_6001641733182.jpg'),
(14, 23, 1, 'revuelto_de_verduras_71247_paso_1_6001641733200.jpg'),
(15, 24, 1, 'revuelto_de_verduras_71247_paso_2_6001641733224.jpg'),
(16, 24, 2, 'revuelto_de_verduras_71247_paso_3_6001641733262.jpg'),
(17, 25, 1, 'revuelto_de_verduras_71247_paso_4_6001641733283.jpg'),
(18, 42, 1, 'Ingredientes-Huevos-rotos-11641733667.jpg'),
(19, 42, 2, 'como-freir-patatas-para-huevos-rotos1641733686.jpg'),
(20, 45, 1, 'Huevos-rotos-con-jamon-y-patatas-11641733714.jpg'),
(21, 49, 1, '1024_20001641733876.jpg'),
(22, 52, 1, 'tofu1641734311.jpg'),
(23, 54, 1, '1366_20001641734426.jpg'),
(24, 69, 1, '1366_2000 (1)1641734600.jpg'),
(25, 70, 1, '1366_2000 (2)1641734630.jpg'),
(26, 62, 1, '6-51641735636.jpg'),
(27, 64, 1, '12-51641735656.jpg'),
(28, 67, 1, '14-31641735677.jpg'),
(29, 68, 1, '15-21641735692.jpg'),
(30, 72, 1, '1366_2000 (3)1641741325.jpg'),
(31, 74, 1, 'Fabada-11641741523.png'),
(32, 75, 1, 'Fabada-21641741541.png'),
(33, 76, 1, 'Fabada-31641741555.png'),
(34, 78, 1, 'Fabada-41641741579.png'),
(35, 79, 1, 'Fabada-51641741627.png'),
(36, 81, 1, 'Fabada-61641741644.png'),
(37, 83, 1, '1366_2000 (4)1641741748.jpg'),
(38, 86, 1, 'Como-hacer-arroz-con-leche-tradicional-599x3981641741856.jpg'),
(39, 88, 1, 'Leche-con-canela-y-limon-599x3981641741901.jpg'),
(40, 90, 1, 'Arroz-con-leche-tradicional-casero-599x3981641742108.jpg'),
(41, 92, 1, 'Como-hacer-arroz-con-leche-599x3981641742128.jpg'),
(42, 95, 1, 'tortilla-de-patatas-paso-a-paso1641742208.jpg'),
(43, 97, 1, 'tortilla-espanola1641742519.jpg'),
(44, 100, 1, '1366_2000 (5)1641742596.jpg'),
(45, 104, 1, 'Huevos-rotos-con-jamon-y-patatas-11641742694.jpg'),
(46, 94, 1, 'INGREDIENTES-TORTILLA-PATATAS-768x5181641742730.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `receta_paso_imagenes`
--
ALTER TABLE `receta_paso_imagenes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `receta_paso_imagenes`
--
ALTER TABLE `receta_paso_imagenes`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
