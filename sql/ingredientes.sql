-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-01-2022 a las 17:08:05
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

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
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE `ingredientes` (
  `id` int(12) UNSIGNED NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `datos_nutricion` text DEFAULT NULL COMMENT '(opcional) Datos nutricionales del ingrediente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`id`, `nombre`, `descripcion`, `datos_nutricion`) VALUES
('', 'Aceite de girasol', 'Ingrediente Condimento', '144kcal'),
('', 'Huevo', 'Ingrediente Proteico', '144kcal'),
('', 'Yogur de limón', 'Ingrediente Postre', '144kcal'),
('', 'Aceite de oliva', 'Ingrediente Condimento', '144kcal'),
('','Azúcar', 'Ingrediente Condimento', '144kcal'),
('', 'Harina', 'Ingrediente Condimento', '144kcal'),
('', 'Levadura', 'Ingrediente Condimento', '144kcal'),
('', 'Limón', 'Ingrediente Fruta', '144kcal'),
('', 'Azúcar glas', 'Ingrediente Condimento', '144kcal'),
('', 'Mantequilla', 'Ingrediente Condimento', '144kcal'),
('', 'Lentejas', 'Ingrediente Legumbre', '144kcal'),
('', 'Zanahorias', 'Ingrediente Verdura', '144kcal'),
('', 'Ajo', 'Ingrediente Condimento', '144kcal'),
('', 'Cebolla', 'Ingrediente Condimento', '144kcal'),
('', 'Laurel', 'Ingrediente Condimento', '144kcal'),
('', 'Pimentón dulce', 'Ingrediente Condimento', '144kcal'),
('', 'Sal', 'Ingrediente Condimento', '144kcal'),
('', 'Pimienta negra', 'Ingrediente Condimento', '144kcal'),
('', 'Pimiento verde', 'Ingrediente Verdura', '144kcal'),
('', 'Tomate', 'Ingrediente Verdura', '144kcal'),
('', 'Hueso de caña', 'Ingrediente Carne', '144kcal'),
('', 'Chorizo', 'Ingrediente Carne', '144kcal'),
('', 'Morcilla', 'Ingrediente Carne', '144kcal'),
('', 'Hueso de jamón', 'Ingrediente carne', '144kcal'),
('', 'Agua', 'Ingrediente Bebida', '144kcal'),
('', 'Arroz bomba', 'Ingrediente Pasta', '144kcal'),
('', 'Plátano', 'Ingrediente Fruta', '144kcal'),
('', 'Tomate pera', 'Ingrediente Verdura', '144kcal'),
('', 'Alubias negras', 'Ingrediente Legumbre', '144kcal'),
('', 'Chile molido', 'Ingrediente Carne', '144kcal'),
('', 'Pimiento rojo', 'Ingrediente Verdura', '144kcal'),
('', 'Tortillas de trigo', 'Ingrediente Vegetariano', '144kcal'),
('', 'Patatas', 'Ingrediente Verdura', '144kcal'),
('', 'Calabacín', 'Ingrediente Verdura', '144kcal'),
('', 'Berenjena', 'Ingrediente Verdura', '144kcal'),
('', 'Champiñones', 'Ingrediente Vegano', '144kcal'),
('', 'Jamón', 'Ingrediente Conserva', '144kcal'),
('', 'Fideos de arroz', 'Ingrediente Pasta', '144kcal'),
('', 'Tofu firme', 'Ingrediente Vegetariano', '144kcal'),
('', 'Jengibre fresco', 'Ingrediente Condimento', '144kcal'),
('', 'Salsa soja', 'Ingrediente Salsa', '144kcal'),
('', 'Curry molido', 'Ingrediente Condimento', '144kcal'),
('', 'Ajo granulado', 'Ingrediente Condimento', '144kcal'),
('', 'Cúrcuma molida', 'Ingrediente Condimento', '144kcal'),
('', 'Lima', 'Ingrediente Fruta', '144kcal'),
('', 'Perejil fresco', 'Ingrediente Condimento', '144kcal'),
('', 'Cilantro', 'Ingrediente Condimento', '144kcal'),
('', 'Pechuga de pollo', 'Ingrediente Carne', '144kcal'),
('', 'Vino blanco', 'Ingrediente Bebida', '144kcal'),
('', 'Maicena', 'Ingrediente Condimento', '144kcal'),
('', 'Kétchup', 'Ingrediente Salsa', '144kcal'),
('', 'Vinagre de arroz', 'Ingrediente Condimento', '144kcal'),
('','Azúcar moreno', 'Ingrediente Condimento', '144kcal'),
('', 'Solomillo', 'Ingrediente Carne', '144kcal'),
('','Lomo', 'Ingrediente Carne', '144kcal'),
('', 'Shiratak', 'Ingrediente Pasta', '144kcal'),
('', 'Shungiku', 'Ingrediente Condimento', '144kcal'),
('', 'Brotes de bambú', 'Ingrediente Vegetariano', '144kcal'),
('', 'Café', 'Ingrediente Bebida', '144kcal'),
('', 'Caldo Japonés dashi', 'Ingrediente Bebida', '144kcal'),
('', 'Miel de arroz', 'Ingrediente Condimento', '144kcal'),
('', 'Arroz blanco', 'Ingrediente Pasta', '144kcal'),
('', 'Caballa', 'Ingrediente Pescado', '144kcal'),
('','Mugi miso', 'Ingrediente Vegano', '144kcal'),
('','Miso de cebada', 'Ingrediente Vegano', '144kcal'),
('', 'Shiro miso', 'Ingrediente Vegetariano', '144kcal'),
('', 'Miso blanco', 'Ingrediente Vegetariano', '144kcal');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
