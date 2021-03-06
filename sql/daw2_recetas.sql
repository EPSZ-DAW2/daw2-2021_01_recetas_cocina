-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-01-2022 a las 17:51:27
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
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `categoria_padre_id` int(12) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Identificador de la categoria padre en caso de estar ordenados por jerarquías.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `categorias`
--

TRUNCATE TABLE `categorias`;
--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `categoria_padre_id`) VALUES
(1, 'Vegano', 'Nada procede de origen animal', 0),
(2, 'Carnivoro', 'La carne es lo principal', 0),
(3, 'Mediterráneo', 'La dieta mediterránea es el modo de alimentarse basado en la cocina tradicional de la cuenca mediterránea.', 0),
(4, 'Ibérico', 'Tanto en España como en Portugal predominan los productos del mar, los pescados y los mariscos, y también damos la máxima importancia al mundo vegetal, las frutas y las verduras. Y, por supuesto, al aceite de oliva virgen extra. Destaca también la oferta enoturística.', 3),
(5, 'Light', 'Se denomina alimento light o ligero aquel cuyo valor energético supone una reducción de al menos un 30% del producto originario de referencia. Habitualmente, los alimentos light tienen bajos niveles de calorías porque son desgrasados o se les reduce o anula la cantidad de azúcares.', 0),
(6, 'Fitness', 'Lo mejor para ponerte a tono de cara al verano.', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE IF NOT EXISTS `ingredientes` (
  `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `datos_nutricion` text DEFAULT NULL COMMENT '(opcional) Datos nutricionales del ingrediente',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `ingredientes`
--

TRUNCATE TABLE `ingredientes`;
--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`id`, `nombre`, `descripcion`, `datos_nutricion`) VALUES
(1, 'Chorizo', 'El chorizo es un embutido cárnico originario de la península ibérica, ​ tradicional también en la cocina latinoamericana y de otras regiones con influencia cultural española y portuguesa, en donde puede formar parte de la cocina fusión. Tags: Ingrediente Carne.', 'pesado'),
(2, 'Morcilla', 'La morcilla es un embutido a base de sangre cocida, generalmente de cerdo, de color caoba oscuro. Suele mezclarse con grasa de cerdo, y además, contiene algún otro ingrediente no cárnico para aumentar su volumen, como arroz u otros cereales, miga de pan o cebolla. Tags: Ingrediente Carne.', 'pesado'),
(3, 'Alubia de la granja', 'Se denomina judiones de la Granja a una variedad de judía de gran tamaño que se cultiva en Real Sitio de San Ildefonso, la Phaseolus coccineus, también denominada Phaseolus multiflorus Willd., que se cree que fue traída de América y plantada en La Granja a comienzos del siglo XVIII. Tags: Ingrediente vegano, vegetariano, legumbre.', 'normal'),
(4, 'Panceta', 'La panceta o tocineta es un producto cárnico que comprende la piel y las capas que se encuentran bajo la piel del cerdo o puerco, específicamente de los músculos ventrales. Está compuesta de la piel y tocino entreverado de carne magra. Tags: Ingrediente Carne.', 'pesado'),
(5, 'Pimentón', 'El pimentón o ají de color es un condimento en polvo de color rojo-anaranjado y sabor característico obtenido a partir del secado y molido de determinadas variedades de pimientos rojos especialmente la ñora y la páprika. Tags: Ingrediente condimento.', 'normal'),
(6, 'Agua', 'Agua potable o agua apta para el consumo humano se denomina al agua que puede ser consumida sin restricción para beber o preparar alimentos.​​ Tags: Ingrediente bebida.', 'ligero'),
(7, 'Sal', 'La sal común o sal de mesa, conocida popularmente como sal, es un tipo de sal denominada cloruro sódico, cuya fórmula química es NaCl. Tags: Ingrediente condimento.', 'normal'),
(8, 'Filete de ternera', 'Se llama carne de ternera a la carne de los bovinos que se han criado por lo menos seis meses de edad hasta el momento del sacrificio. Estas reses pesan 135 kg de promedio. La industria cárnica es la encargada de procesar los subproductos de la carne de ternera. Tags: Ingrediente Carne.', 'normal'),
(9, 'Jamón serrano', 'El jamón serrano es un alimento obtenido a partir de la salazón y secado al aire de las patas traseras del cerdo. Este mismo producto recibe también el nombre de paleta o paletilla cuando se obtiene de las patas delanteras. El jamón serrano se contrapone al jamón cocido, también llamado jamón de York o \"jamón dulce\".\r\nTags: Ingrediente Carne.', 'normal'),
(10, 'Aceite de oliva', 'El aceite de oliva es un aceite vegetal de uso principalmente culinario. Se obtiene del fruto del olivo, denominado oliva o aceituna.​ Casi la tercera parte de la pulpa de la aceituna es aceite. Por esta razón, desde la Antigüedad se ha extraído fácilmente con una simple presión ejercida por un molino. Tags: Ingrediente condimento.', 'normal'),
(11, 'Queso de cabra', 'El queso de cabra, también llamado chèvre es cualquier queso hecho con leche de cabra. Tags: Ingrediente vegetariano.', 'pesado'),
(12, 'Pan rallado', 'El pan rallado o pan molido es pan duro, generalmente seco de varios días, que ha sido finamente picado mediante un rallador. Su textura harinosa se emplea en la elaboración de diferentes platos y alimentos en forma de rebozado, empanado o gratinado con la intención de proporcionar una costra dura al freírlos. Tags: Ingrediente vegetariano.', 'normal'),
(13, 'Huevo', 'Los huevos de las aves constituyen un alimento habitual en la alimentación de los humanos. Se presentan protegidos por una cáscara y son ricos en proteínas y lípidos.​​\r\nTags: Ingrediente vegetariano.', 'normal'),
(14, 'Ajo', 'Allium sativum, el ajo, es una especie tradicionalmente clasificada dentro de la familia de las liliáceas pero que actualmente se ubica en la de las amarilidáceas, ​ aunque este extremo es muy discutido. Tags: Ingrediente condimento, vegetariano, vegano.', 'ligero'),
(15, 'Pimiento del piquillo', 'El pimiento del piquillo o pimiento de piquillo​ es una variedad de pimiento producido en Lodosa en la Comunidad Foral de Navarra. Tags: Ingrediente verdura.', 'ligero'),
(16, 'Patatas', 'Solanum tuberosum, de nombre común papa​ o patata, ​ es una especie herbácea perteneciente al género Solanum de la familia de las solanáceas, originaria de la región que comprende el altiplano sur del Perú.​ Tags: Ingrediente Verdura.', 'ligero'),
(17, 'Harina', 'La harina es el polvo fino que se obtiene del cereal molido y de otros alimentos ricos en almidón.​ Se puede obtener harina de distintos cereales. Aunque la más habitual es harina de trigo, también se hace harina de centeno, de cebada, de avena, de maíz o de arroz. Tags: Ingrediente vegano, vegetariano.', 'normal'),
(18, 'Leche entera', 'La leche es una secreción nutritiva de color blanquecino opaco producida por las células secretoras de las glándulas mamarias de los mamíferos, incluidos los monotremas.​​​​ Tags: Ingrediente vegetariano, bebida.', 'normal'),
(19, 'Azúcar', 'La sacarosa o sucrosa es un disacárido formado por glucosa y fructosa. Su nombre químico es alfa-D-Glucopiranosil - - beta-D-Fructofuranósido, ​ y su fórmula es C₁₂H₂₂O₁₁. Es un disacárido que no tiene poder reductor sobre el reactivo de Fehling y el reactivo de Tollens. Tags: Ingrediente condimento.', 'normal'),
(20, 'Canela', 'El árbol de la canela, conocido como canelo, ​ es un árbol de hoja perenne, de 10 a 15 metros de altura, procedente de Sri Lanka. Se aprovecha como especia su corteza interna, que se obtiene pelando y frotando las ramas. Tags: Ingrediente condimento.', 'normal'),
(21, 'Arroz', 'El arroz es la semilla de la planta Oryza sativa o de Oryza glaberrima. Se trata de un cereal considerado alimento básico en muchas gastronomías del mundo.​ El arroz es el segundo cereal más producido en el mundo, detrás del maíz y por delante del trigo.​​ Tags: Ingrediente conserva, vegano, vegetariano.', 'ligero'),
(22, 'Tomate', 'El tomate​ o jitomate​ es el fruto de la planta Solanum lycopersicum, el cual tiene importancia culinaria y es utilizado como verdura. Está considerado una hortaliza.​Tags: Ingrediente verdura, vegetariano,vegano.', 'ligero'),
(23, 'Cebolla', 'Allium cepa, comúnmente conocida como cebolla, es una planta herbácea bienal perteneciente a la familia de las amarilidáceas. Es la especie más cultivada del género Allium, el cual contiene varias especies que se denominan «cebollas» y que se cultivan como alimento. Tags: Ingrediente verdura, vegetariano, vegano.', 'ligero'),
(24, 'Caldo de verduras', 'El caldo de verduras, por ejemplo, se pueden preparar caldos muy ligeros y claros, donde uno se limita a hervir las hortalizas en abundante agua, u otros más oscuros y de sabor más intenso, como este que tenemos aquí, donde las verduras se doran previamente. Puedes añadir otros vegetales además de los incluidos en la lista e incluso hierbas o vino para aromatizar. Tags: Ingrediente verdura, vegetariano, vegano, bebida.', 'ligero'),
(25, 'Zanahoria', 'Daucus carota subespecie sativus, llamada popularmente zanahoria, es la forma domesticada de la zanahoria silvestre, especie de la familia de las umbelíferas, también denominadas apiáceas, y considerada la más importante y de mayor consumo dentro de esta familia. Es oriunda de Europa y Asia sudoccidental.\r\nTags: Ingrediente verdura, vegetariano,vegano.', 'ligero'),
(26, 'Pimiento', 'El pimiento es una hortaliza de forma, tamaño y color variable. Puede ser verde, rojo, amarillo, naranja e incluso ¡negro!. Su sabor puede ser dulce o picante y se consume en fresco, en conserva, etc. El pimiento se consume crudo, cocido y asado; como guarnición en gran variedad de platos. Tags: Ingrediente verdura, vegetariano,vegano.', 'ligero'),
(27, 'Levadura', 'Se denomina levadura o fermento a cualquiera de los hongos microscópicos clasificados como ascomicetos o basidiomicetos, predominantemente unicelulares en su ciclo de vida. Tags: Ingrediente condimento.', 'normal'),
(28, 'Aceite de girasol', 'Ingrediente Condimento', '144kcal'),
(29, 'Huevo', 'Ingrediente Proteico', '144kcal'),
(30, 'Yogur de limón', 'Ingrediente Postre', '144kcal'),
(31, 'Aceite de oliva', 'Ingrediente Condimento', '144kcal'),
(32, 'Azúcar', 'Ingrediente Condimento', '144kcal'),
(33, 'Harina', 'Ingrediente Condimento', '144kcal'),
(34, 'Levadura', 'Ingrediente Condimento', '144kcal'),
(35, 'Limón', 'Ingrediente Fruta', '144kcal'),
(36, 'Azúcar glas', 'Ingrediente Condimento', '144kcal'),
(37, 'Mantequilla', 'Ingrediente Condimento', '144kcal'),
(38, 'Lentejas', 'Ingrediente Legumbre', '144kcal'),
(39, 'Zanahorias', 'Ingrediente Verdura', '144kcal'),
(40, 'Ajo', 'Ingrediente Condimento', '144kcal'),
(41, 'Cebolla', 'Ingrediente Condimento', '144kcal'),
(42, 'Laurel', 'Ingrediente Condimento', '144kcal'),
(43, 'Pimentón dulce', 'Ingrediente Condimento', '144kcal'),
(44, 'Sal', 'Ingrediente Condimento', '144kcal'),
(45, 'Pimienta negra', 'Ingrediente Condimento', '144kcal'),
(46, 'Pimiento verde', 'Ingrediente Verdura', '144kcal'),
(47, 'Tomate', 'Ingrediente Verdura', '144kcal'),
(48, 'Hueso de caña', 'Ingrediente Carne', '144kcal'),
(49, 'Chorizo', 'Ingrediente Carne', '144kcal'),
(50, 'Morcilla', 'Ingrediente Carne', '144kcal'),
(51, 'Hueso de jamón', 'Ingrediente carne', '144kcal'),
(52, 'Agua', 'Ingrediente Bebida', '144kcal'),
(53, 'Arroz bomba', 'Ingrediente Pasta', '144kcal'),
(54, 'Plátano', 'Ingrediente Fruta', '144kcal'),
(55, 'Tomate pera', 'Ingrediente Verdura', '144kcal'),
(56, 'Alubias negras', 'Ingrediente Legumbre', '144kcal'),
(57, 'Chile molido', 'Ingrediente Carne', '144kcal'),
(58, 'Pimiento rojo', 'Ingrediente Verdura', '144kcal'),
(59, 'Tortillas de trigo', 'Ingrediente Vegetariano', '144kcal'),
(60, 'Patatas', 'Ingrediente Verdura', '144kcal'),
(61, 'Calabacín', 'Ingrediente Verdura', '144kcal'),
(62, 'Berenjena', 'Ingrediente Verdura', '144kcal'),
(63, 'Champiñones', 'Ingrediente Vegano', '144kcal'),
(64, 'Jamón', 'Ingrediente Conserva', '144kcal'),
(65, 'Fideos de arroz', 'Ingrediente Pasta', '144kcal'),
(66, 'Tofu firme', 'Ingrediente Vegetariano', '144kcal'),
(67, 'Jengibre fresco', 'Ingrediente Condimento', '144kcal'),
(68, 'Salsa soja', 'Ingrediente Salsa', '144kcal'),
(69, 'Curry molido', 'Ingrediente Condimento', '144kcal'),
(70, 'Ajo granulado', 'Ingrediente Condimento', '144kcal'),
(71, 'Cúrcuma molida', 'Ingrediente Condimento', '144kcal'),
(72, 'Lima', 'Ingrediente Fruta', '144kcal'),
(73, 'Perejil fresco', 'Ingrediente Condimento', '144kcal'),
(74, 'Cilantro', 'Ingrediente Condimento', '144kcal'),
(75, 'Pechuga de pollo', 'Ingrediente Carne', '144kcal'),
(76, 'Vino blanco', 'Ingrediente Bebida', '144kcal'),
(77, 'Maicena', 'Ingrediente Condimento', '144kcal'),
(78, 'Kétchup', 'Ingrediente Salsa', '144kcal'),
(79, 'Vinagre de arroz', 'Ingrediente Condimento', '144kcal'),
(80, 'Azúcar moreno', 'Ingrediente Condimento', '144kcal'),
(81, 'Solomillo', 'Ingrediente Carne', '144kcal'),
(82, 'Lomo', 'Ingrediente Carne', '144kcal'),
(83, 'Shiratak', 'Ingrediente Pasta', '144kcal'),
(84, 'Shungiku', 'Ingrediente Condimento', '144kcal'),
(85, 'Brotes de bambú', 'Ingrediente Vegetariano', '144kcal'),
(86, 'Café', 'Ingrediente Bebida', '144kcal'),
(87, 'Caldo Japonés dashi', 'Ingrediente Bebida', '144kcal'),
(88, 'Miel de arroz', 'Ingrediente Condimento', '144kcal'),
(89, 'Arroz blanco', 'Ingrediente Pasta', '144kcal'),
(90, 'Caballa', 'Ingrediente Pescado', '144kcal'),
(91, 'Mugi miso', 'Ingrediente Vegano', '144kcal'),
(92, 'Miso de cebada', 'Ingrediente Vegano', '144kcal'),
(93, 'Shiro miso', 'Ingrediente Vegetariano', '144kcal'),
(94, 'Miso blanco', 'Ingrediente Vegetariano', '144kcal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `usuario_id` int(12) UNSIGNED DEFAULT NULL COMMENT 'Usuario que ha creado el menu o CERO si no existe (como si fuera NULL).',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `menus`
--

TRUNCATE TABLE `menus`;
--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `titulo`, `descripcion`, `usuario_id`) VALUES
(9, 'Menu Asturiano', 'La gastronomía de Asturias es el conjunto de tradiciones culinarias, ingredientes y recetas propio del Principado de Asturias (España). Si bien es cierto que la cocina asturiana ha sabido transmitirse generación tras generación, también lo es que carece de tradición escrita hasta época muy reciente, ya que no existen apenas escritos que muestren qué comían los asturianos, y los pocos relatos que se conservan se encuentran en textos de naturaleza muy distinta a la gastronómica. ', 1),
(10, 'Menu vegano', 'El veganismo, del inglés veganism,​ es la abstención del uso de productos de origen animal.', 3),
(11, 'Menu iberico', 'La gastronomía o cocina española son los platos, ingredientes, técnicas y toda la tradición culinaria que se practica en España. Cocina de origen que oscila entre el estilo rural y el costero, representa una diversidad fruto de muchas culturas, así como de paisajes y climas.', 2),
(12, 'Menu andaluz', 'La comunidad autónoma de Andalucía posee una rica gastronomía propia, muy variada y con diferencias entre la costa y el interior. Forma parte de la dieta mediterránea. Consiste en una gastronomía muy vinculada al uso del aceite de oliva, los frutos secos, los pescados y las carnes.', 5),
(13, 'Menu carnivoro', 'La dieta carnívora significa obtener nutrición de alimentos de origen animal y limitar o eliminar severamente todas las plantas de la dieta. El propósito de esta forma de comer es mejorar la salud, perder grasa, curar el cuerpo y la mente y aliviar muchas enfermedades crónicas.', 7),
(14, 'Menu Capitan', 'Permite comer de todo, no hay restricciones. Además de todo lo que considera una dieta vegana, también incluye los alimentos que no se permite consumir en la anteriormente mencionada: todos los tipos de carne, pescado, marisco, lácteos y huevos.', 6),
(15, 'Menu de autor', 'La cocina de autor es una perfecta representación de tendencia gastronómica. Esta tipología  de cocina, tan celebrada y curiosa, se basa en la creación de platos en base a la creatividad y experiencia del chef. Es decir, el chef como autor de una obra, que en este caso es un plato. Es una cocina que manifiesta grandes rasgos de personalidad e innovación, y donde el sello de identidad juega un papel crucial.', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_recetas`
--

CREATE TABLE IF NOT EXISTS `menu_recetas` (
  `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_id` int(12) UNSIGNED NOT NULL,
  `receta_id` int(12) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `menu_recetas`
--

TRUNCATE TABLE `menu_recetas`;
--
-- Volcado de datos para la tabla `menu_recetas`
--

INSERT INTO `menu_recetas` (`id`, `menu_id`, `receta_id`) VALUES
(20, 9, 12),
(21, 9, 13),
(22, 9, 16),
(23, 10, 11),
(24, 10, 16),
(26, 11, 12),
(27, 11, 11),
(28, 11, 13),
(29, 11, 15),
(30, 11, 16),
(31, 11, 17),
(32, 9, 14),
(33, 12, 11),
(34, 13, 13),
(35, 14, 15),
(36, 14, 16),
(37, 15, 12),
(38, 12, 16),
(39, 13, 16),
(40, 15, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planificaciones`
--

CREATE TABLE IF NOT EXISTS `planificaciones` (
  `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `periodo` varchar(25) NOT NULL COMMENT 'Texto indicativo del Periodo de planificacion.',
  `usuario_id` int(12) UNSIGNED NOT NULL COMMENT 'Usuario que ha creado la planificacion o CERO si no existe (como si fuera NULL).',
  `notas` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `planificaciones`
--

TRUNCATE TABLE `planificaciones`;
--
-- Volcado de datos para la tabla `planificaciones`
--

INSERT INTO `planificaciones` (`id`, `nombre`, `periodo`, `usuario_id`, `notas`) VALUES
(8, 'Dieta hipocalorica', '15', 1, 'La dieta hipocalórica permite comer de forma equilibrada y saludable mediante el control de la ingesta de calorías, que varían dependiendo de nuestras características físicas y nuestro grado de actividad. En este tipo de dieta, se realizan cinco comidas al día y no se evita ningún grupo de alimentos, excepto aquellos como el azúcar y las grasas saturadas. Estos parámetros son aptos en una dieta para diabéticos, puesto que, además de repartir las comidas a lo largo del día,  limitan la cantidad de grasa, azúcares y sal que ingerimos, y permite consumir una gran variedad de frutas y verduras.'),
(9, 'Dieta por puntos', '15', 2, 'La dieta por puntos es una buena opción para aquellos que están aburridos de todas las dietas y quieren probar algo nuevo. En este tipo de dieta, también se consumen todos los grupos de alimentos de forma equilibrada y, para ello,  cuenta con una tabla de puntos que los clasifica según sus características. El objetivo de este plan de alimentación es no sobrepasar los puntos indicados al cabo del día. En esta dieta no hay alimentos prohibidos, pero siempre hay que evitar aquellos como bollería o embutidos grasos, porque su alta puntuación puede hacer que alcancemos la totalidad de los puntos, o los sobrepasemos, con sólo probarlos.'),
(10, 'Dieta paleo', '30', 3, 'La dieta paleo, también llamada dieta paleolítica, prácticamente se ha convertido en un estilo de vida. Consiste en volver a aquellos orígenes en los que la alimentación se basaba únicamente en lo que se cazaba y recolectaba. Por ello,  este tipo de dieta elimina los alimentos procesados y evita algunos grupos como cereales o lácteos, y basa la alimentación en carnes, pescados, frutas y verduras, que proporcionan un alto grado de energía. Aunque puede ser una buena opción, hay que encontrar el equilibrio en el consumo de estos productos, ya que un consumo excesivo de carne también puede ser perjudicial'),
(11, 'Dieta proteica', '21', 4, 'En la dieta proteica, se limita la alimentación a aquellos alimentos que son altos en proteínas, como la carne, el pescado y los derivados lácteos. Este tipo de dieta, que llega a excluir grupos de alimentos tan fundamentales como las frutas y las verduras, puede llegar a ocasionar graves problemas de salud. Algunas de las carencias más graves de esta dieta son la falta de hidratos de carbono y de fibra, imprescindibles para el buen funcionamiento de nuestro cuerpo. Esta restrictiva dieta posibilita perder kilos fácilmente a costa de nuestra salud y puede llegar a perjudicar gravemente nuestro metabolismo.'),
(12, 'Dieta detox', '28', 5, 'El término “detox” se ha convertido en una palabra que está en boca de todo el mundo, pero lo cierto es que este tipo de alimentación no puede sostenerse en el tiempo. Este tipo de dieta surge en los últimos años como una forma de depurar nuestro organismo, y se basa en el consumo exclusivo de líquidos durante, al menos, un día completo a la semana. Un consumo exclusivo de líquido no sólo no aporta la cantidad de energía necesaria para el funcionamiento del organismo, sino que puede provocar desequilibrios en componentes tan necesarios como el calcio, el potasio o el sodio.'),
(13, 'Dieta alcalina', '60', 6, 'También conocida como la dieta del pH y promocionada como la dieta “anticáncer”, este tipo de dieta es la última revolución entre los famosos.  La dieta alcalina promete depurar el organismo y, además, ser un fuerte protector contra posibles tumores, basándose en el consumo de alimentos que tienen supuestos efectos sobre la acidez de los fluidos de nuestro organismo. El punto a favor de esta dieta es que aboga por alimentos como cereales, frutas, verduras y legumbres, pero con una restricción tan amplia en el resto de alimentos que no es una opción saludable.'),
(14, 'Dieta de la sopa de tomate', '15', 7, 'Es la que siguen los enfermos del corazón del Secret Memorial Hospital de EEUU antes de una operación. Se trata de un plan de una semana que limpia impurezas y quema grasas muy rápido. La base de esta dieta de adelgazamiento es una sopa quemagrasas que se debe de comer todos los días y en la cantidad que se desee, porque apenas tiene calorías.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planificacion_menus`
--

CREATE TABLE IF NOT EXISTS `planificacion_menus` (
  `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `planificacion_id` int(12) UNSIGNED NOT NULL,
  `menu_id` int(12) UNSIGNED NOT NULL COMMENT 'Menu relacionado con el dia planificado',
  `numero_dia` smallint(3) NOT NULL COMMENT 'Numero de dia del menu dentro de la planificacion.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `planificacion_menus`
--

TRUNCATE TABLE `planificacion_menus`;
--
-- Volcado de datos para la tabla `planificacion_menus`
--

INSERT INTO `planificacion_menus` (`id`, `planificacion_id`, `menu_id`, `numero_dia`) VALUES
(12, 8, 9, 1),
(13, 8, 10, 2),
(14, 8, 11, 3),
(15, 8, 12, 4),
(16, 8, 13, 5),
(17, 8, 14, 6),
(18, 8, 15, 7),
(19, 9, 10, 1),
(20, 9, 13, 2),
(21, 10, 10, 1),
(22, 14, 10, 1),
(23, 11, 11, 1),
(24, 10, 10, 2),
(25, 10, 10, 3),
(26, 12, 10, 1),
(27, 12, 10, 2),
(28, 12, 10, 3),
(29, 14, 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE IF NOT EXISTS `recetas` (
  `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `descripcion` text DEFAULT NULL,
  `tipo_plato` char(1) NOT NULL COMMENT 'Tipo Plato E=Entrantes, 1=Primeros, 2=Segundos, P=Postres, ...',
  `dificultad` tinyint(2) NOT NULL DEFAULT 0 COMMENT '1=Muy Facil,5=Muy Dificil.',
  `comensales` tinyint(2) NOT NULL DEFAULT 4 COMMENT 'Numero de comensales para la receta.',
  `tiempo_elaboracion` smallint(4) NOT NULL DEFAULT 0 COMMENT 'Tiempo en Minutos de elaboracion de la receta.',
  `valoracion` tinyint(2) NOT NULL DEFAULT 3 COMMENT 'Valoracion de la receta: 1=Peor, 3=Buena, 5=Mejor.',
  `usuario_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Usuario que ha creado la receta o CERO si no existe (como si fuera NULL).',
  `aceptada` tinyint(1) DEFAULT NULL COMMENT 'Indicador de receta aceptada o no.',
  `imagen` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `recetas`
--

TRUNCATE TABLE `recetas`;
--
-- Volcado de datos para la tabla `recetas`
--

INSERT INTO `recetas` (`id`, `nombre`, `descripcion`, `tipo_plato`, `dificultad`, `comensales`, `tiempo_elaboracion`, `valoracion`, `usuario_id`, `aceptada`, `imagen`) VALUES
(1, 'Bizcocho de yogur', 'El bizcocho, también conocido como bizcochuelo o queque, es uno de los dulces más tradicionales de nuestra gastronomía. La masa se prepara con ingredientes básicos que todos tenemos en casa: harina, huevos, aceite (u otras grasas), yogur y azúcar. También se pueden añadir otros ingredientes como frutos secos o chocolate o aromatizarlo con vainilla, coco, ralladura de limón...', 'P', 1, 5, 55, 4, 4, 1, 'bizcocho.jpg'),
(2, 'Tortilla de patata', 'Quizás la receta de la tortilla de patata sea una de las primeras que todo aspirante a cocinillas debería aprender a hacer y nos hemos propuesto que los que estén empezando en la cocina con nosotros, puedan preparar esta receta de tortilla de patatas con cebolla, con un sabor excepcional.\r\n\r\nPara ello, vamos a hacer esta tortilla de patatas con dos toques especiales ya que las patatas las vamos a cocinar partiendo de aceite en frío para conseguir un confitado que las haga más cremosas y la cebolla la vamos a caramelizar y añadir después a las patatas. Si preparáis la receta tal como la contamos a continuación, el éxito estará garantizado.', 'E', 2, 4, 30, 3, 2, 1, 'tortilla.jpg'),
(3, 'Lentejas con Chorizo', 'No a todo el mundo le gustan, como dice el refrán «El que quiera las coma y el que no las deja» pero creo que es importante educar a todos los niños/as desde pequeños para que les guste este guiso introduciéndolo en la dieta diaria. Aunque lleven su tiempo otro punto a favor es que puedes hacer una cazuela de ellas y congelarlas. Siempre y cuando no les añadas patata. Os presento esta receta que casi se hace sola, espero que os guste.', '1', 2, 6, 90, 3, 5, 1, 'lentejas.jpg'),
(4, 'Revuelto de verduras ', 'Una receta ligera que podemos preparar con verduras frescas de temporada o verduras congeladas. También puede ser una receta de aprovechamiento, cuando van quedando trozos de verduras antes de que se pongan malas, es mejor congelar y meter los trozos en una bolsa de congelado, así cuando nos apetezca una tortilla o un revuelto de verduras de diesta, las podemos utilizar. Queda un revuelto rico, jugoso y rápido de preparar.', 'E', 2, 4, 15, 3, 5, 1, 'revuelto-verduras.jpg'),
(6, 'Huevos rotos con jamón y patatas', '¿Alguien ha dicho huevos rotos con jamón y chorizo? También conocidos como huevos estrellados, este típico plato de la gastronomía española es sabrosísimo y puede prepararse con diferentes ingredientes. En este caso, veremos una receta de huevos rotos con jamón y patatas y chorizo gallego ahumado así que ¡no te los puedes perder!', '2', 2, 3, 30, 4, 1, 1, 'huevos-rotos.jpg'),
(7, 'Arroz a la cubana', 'Según el diccionario de gastronomía, el arroz a la cubana es \"una preparación sencilla de arroz blanco cocido y huevos fritos. Los huevos se sirven colocados sobre montículos de arroz. Es habitual acompañarlo de salsa de tomate y, tradicionalmente, de plátano maduro frito en rebanadas y aguacate\".\r\n\r\nLa denominación del plato \"procede de la práctica cubana de mojar el arroz blanco con la salsa de los guisos, generalmente elaborados con salsa de tomate especiada\". Parece ser que, a pesar de su apellido, su origen no está en Cuba sino en Canarias, donde el uso del plátano autóctono se puso de moda.\r\n\r\nPara nosotros, este plato de toda la vida, siempre ha estado compuesto arroz, huevo frito, plátano canario y salsa de tomate. Desconocíamos lo del aguacate, pero nos parece maravilloso y lo sumaremos a partir de ahora. Hay quienes completan el conjunto con algo de carne: salchichas, cinta de lomo o picadillo de carne. Al gusto.', '2', 2, 1, 160, 3, 1, 1, 'arroz-cubana.jpg'),
(8, 'Fideos de arroz con salteado de tofu y pimiento', 'Los fideos de arroz dan un aire oriental a cualquier plato y creo que por eso combinan tan bien con el tofu. Su textura ligera es muy agradable en sopas, pero también se puede saltear con otros ingredientes. Recordad escurrir bien el tofu antes de usarlo en recetas como esta, y no os cortéis con las especias.\r\n\r\nMe atrevería a decir que todo el mundo tiene algún paquete de pasta siempre en la despensa. Si no la habéis probado, os recomiendo variar de vez en cuando con variedades de arroz, y seguro que los celíacos la conocen bien. Estos fideos de arroz con salteado de tofu y pimiento se preparan en un suspiro y es un plato vegano y sin gluten.', '1', 4, 2, 35, 3, 1, 1, 'fideos-arroz.jpg'),
(9, 'Burritos Vegetarianos', 'La cocina mexicana se ha hecho un hueco en nuestro país y no es de extrañar. La gastronomía del país del otro lado del charco está repleta de sabores extraordinarios, de ingredientes frescos y de mucha sencillez en sus elaboraciones. Al menos en las más populares, que no las únicas, como es el caso de la receta de burritos vegetarianos.\r\n\r\nOs puedo garantizar que los burritos vegetarianos están tan repletos de sabor que, vegetarianos o no, los probaréis y querréis más. Son jugosos, de textura suave y ligeramente picantes, con un relleno de frijoles refritos y cebolla y pimientos salteados al chile que quita el sentido. No obstante, podéis adaptarlos a vuestros gustos porque son de lo más versátil.', '1', 2, 3, 60, 4, 5, 1, 'burritos-veg.jpg'),
(10, 'Pollo Agridulce', 'En esta ocasión, vamos a preparar un pollo agridulce chino. Pero no uno cualquiera. La receta original. En realidad es muy fácil de hacer. ¿Quién necesita ir a los restaurantes de comida china, pudiendo prepararlo en casa? Vamos a ver cómo hacer en casa este pollo agridulce chino siguiendo unos sencillos pasos que te muestro a continuación.', '2', 3, 2, 30, 2, 6, 1, 'pollo-agridulce-chino.jpg'),
(11, 'Sopa de tomate', 'una sopa quemagrasas que se debe de comer todos los días y en la cantidad que se desee, porque apenas tiene calorías.', '1', 2, 1, 30, 3, 7, 1, 'sopatomate1641502211.jpg'),
(12, 'Fabada Asturiana', 'Fabada asturiana, o simplemente fabada, es el plato tradicional de la cocina asturiana elaborado con faba asturiana (en asturiano, fabes), embutidos como chorizo y la morcilla asturiana, y con cerdo. Es el plato típico de Asturias (el plato regional más conocido de la región asturiana), pero su difusión es tan grande en la península ibérica que forma parte de la gastronomía de España más reconocida. Se considera según ciertos autores una de las diez recetas típicas de la cocina española.', '1', 2, 5, 180, 4, 7, 1, 'fabada1641502549.jpg'),
(13, 'Cachopo', 'Un cachopo qué es, pues son dos filetes de ternera uno encima del otro y en medio está relleno de jamón y queso. Luego va enharinado, pasado por huevo empanado y frito. Suena fácil, y la verdad es que es fácil hacerlo.', '2', 3, 2, 60, 4, 8, 1, 'cachopo21641502878.jpg'),
(14, 'Arroz con leche', 'El arroz con leche es un postre típico de la gastronomía de múltiples países hecho cociendo lentamente arroz con leche y azúcar. Se sirve frío o caliente. Se le suele espolvorear canela, vainilla o cáscara de limón para aromatizarlo.', 'P', 4, 8, 140, 5, 4, 1, 'arrozconleche1641503050.png'),
(15, 'Tortilla de patata', 'La tortilla de patatas o tortilla de papas​ o tortilla española es una tortilla u omelet ​ a la que se le agrega patatas troceadas.​ Se trata de uno de los platos más conocidos y emblemáticos de la cocina española, siendo un producto muy popular que se puede encontrar en casi cualquier bar o restaurante del país.', '1', 1, 5, 60, 5, 6, 1, 'tortilla1641503652.jpg'),
(16, 'Pan', 'El pan, del latín panis, es un alimento básico que forma parte de la dieta tradicional en Europa, Medio Oriente, India, América y Oceanía. Se suele preparar mediante el horneado de una masa, elaborada fundamentalmente con harina de cereal, agua y sal.', 'E', 4, 5, 240, 5, 2, 1, 'pan1641503828.jpg'),
(17, 'Huevos con patatas y jamón', 'Estos huevos revueltos o huevos estrellados con patatas, jamón y pimientos de padrón son una receta esencial y que suele gustar a todo el mundo. Creo que todos tenemos en mente la imagen de esa yema de huevo que, al romperse, comienza a escurrirse entre el resto de ingredientes, un auténtico… ¡escándalo! ', '2', 1, 1, 45, 5, 2, 1, 'huevosjamon1641504031.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta_categorias`
--

CREATE TABLE IF NOT EXISTS `receta_categorias` (
  `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `receta_id` int(12) UNSIGNED NOT NULL,
  `categoria_id` int(12) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `receta_categorias_receta_id_idx` (`receta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `receta_categorias`
--

TRUNCATE TABLE `receta_categorias`;
--
-- Volcado de datos para la tabla `receta_categorias`
--

INSERT INTO `receta_categorias` (`id`, `receta_id`, `categoria_id`) VALUES
(1, 11, 1),
(2, 11, 3),
(3, 11, 4),
(4, 12, 4),
(5, 13, 2),
(6, 13, 4),
(7, 14, 3),
(8, 14, 4),
(9, 15, 4),
(10, 15, 3),
(11, 16, 1),
(12, 16, 3),
(13, 16, 4),
(14, 17, 3),
(15, 17, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta_comentarios`
--

CREATE TABLE IF NOT EXISTS `receta_comentarios` (
  `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `receta_id` int(12) UNSIGNED NOT NULL,
  `usuario_id` int(12) UNSIGNED NOT NULL COMMENT 'Usuario que ha creado el comentario. No deberia ser CERO (como si fuera NULL).',
  `fechahora` datetime NOT NULL,
  `texto` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `receta_comentarios`
--

TRUNCATE TABLE `receta_comentarios`;
--
-- Volcado de datos para la tabla `receta_comentarios`
--

INSERT INTO `receta_comentarios` (`id`, `receta_id`, `usuario_id`, `fechahora`, `texto`) VALUES
(1, 11, 2, '2022-01-07 00:10:09', 'excelente receta, a mis hijos les encanta'),
(2, 12, 1, '2022-01-07 00:10:42', 'Una, buena fabada asturiana 100%, como tiene que ser'),
(3, 13, 6, '2022-01-07 00:11:51', 'Lo hice para mi sólo pero da para comer una legión. Lo tuve que dejar para desayunarlo al día siguiente :)'),
(4, 14, 5, '2022-01-07 00:12:30', 'Me encanta pero el médico me ha dicho que me cuide con el azúcar'),
(5, 15, 8, '2022-01-07 00:13:53', 'Una tortilla con cebolla y una cerveza para pasarla mejor. Como Dios manda!!'),
(6, 16, 3, '2022-01-07 00:14:30', 'Es pan, a quién no le gusta?'),
(7, 17, 4, '2022-01-07 00:15:11', 'Iguales que los de mi abuela me han salido'),
(8, 12, 7, '2022-01-07 00:15:34', 'Con fabes y sidrina...'),
(9, 11, 8, '2022-01-07 00:16:26', 'receta superfácil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta_ingredientes`
--

CREATE TABLE IF NOT EXISTS `receta_ingredientes` (
  `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `receta_id` int(12) UNSIGNED NOT NULL,
  `ingrediente_id` int(12) UNSIGNED NOT NULL,
  `cantidad` float NOT NULL DEFAULT 0,
  `medida` varchar(45) DEFAULT NULL,
  `notas` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1099 DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `receta_ingredientes`
--

TRUNCATE TABLE `receta_ingredientes`;
--
-- Volcado de datos para la tabla `receta_ingredientes`
--

INSERT INTO `receta_ingredientes` (`id`, `receta_id`, `ingrediente_id`, `cantidad`, `medida`, `notas`) VALUES
(2, 11, 22, 2, 'uds.', ''),
(3, 11, 23, 1, 'ud.', ''),
(4, 11, 24, 1, 'L', ''),
(5, 11, 25, 100, 'g', ''),
(6, 11, 15, 150, 'g', ''),
(7, 12, 1, 2, 'uds.', ''),
(8, 12, 2, 2, 'uds.', ''),
(9, 12, 4, 200, 'g', ''),
(10, 12, 3, 500, 'g', ''),
(11, 12, 6, 3, 'L', ''),
(12, 12, 7, 50, 'g', ''),
(13, 12, 5, 1, 'cucharada', ''),
(14, 13, 8, 2, 'uds. ', ''),
(15, 13, 9, 200, 'g', ''),
(16, 13, 11, 200, 'g', ''),
(17, 13, 12, 300, 'g', ''),
(18, 13, 13, 1, 'ud.', ''),
(19, 13, 14, 1, 'diente', ''),
(20, 13, 7, 1, 'pizca', ''),
(21, 14, 21, 200, 'g', ''),
(22, 14, 18, 3, 'L', ''),
(23, 14, 19, 200, 'g', ''),
(24, 14, 20, 50, 'g', ''),
(25, 15, 13, 7, 'uds.', ''),
(26, 15, 16, 500, 'g', ''),
(27, 15, 23, 1, 'ud.', ''),
(28, 15, 7, 1, 'pizca', ''),
(29, 15, 10, 2, 'L', ''),
(30, 16, 17, 1, 'kg', ''),
(31, 16, 6, 200, 'ml', ''),
(32, 16, 27, 20, 'g', ''),
(33, 16, 7, 1, 'pizca', ''),
(34, 17, 13, 4, 'uds.', ''),
(35, 17, 16, 500, 'g', ''),
(36, 17, 9, 200, 'g', ''),
(37, 17, 7, 1, 'pizca', ''),
(38, 17, 10, 2, 'L', ''),
(101, 1, 29, 3, 'unidad', ''),
(102, 1, 31, 1, 'envase de yogur', ''),
(103, 1, 33, 3, 'envase de yogur', ''),
(104, 1, 35, 1, 'unidad', ''),
(105, 1, 30, 1, 'unidad', ''),
(106, 1, 32, 2, 'envase de yogur', ''),
(107, 1, 34, 1, 'sobre', ''),
(108, 1, 36, 1, 'cucharada', ''),
(109, 2, 16, 700, 'gramos', ''),
(1010, 2, 41, 300, 'gramos', ''),
(1011, 2, 29, 6, 'unidad', ''),
(1012, 2, 44, 1, '', ''),
(1013, 2, 31, 0, '', 'cantidad indeterminada'),
(1014, 3, 38, 500, 'gramos', ''),
(1015, 3, 40, 2, 'diente', ''),
(1016, 3, 41, 2, 'unidad', ''),
(1017, 3, 42, 1, 'hoja', ''),
(1018, 3, 43, 1, 'cucharada', ''),
(1019, 3, 44, 1, 'pizca', 'al gusto'),
(1020, 3, 45, 1, 'pizca', 'al gusto'),
(1021, 3, 31, 4, 'cuchrarada', ''),
(1022, 3, 46, 1, 'unidad', ''),
(1023, 3, 47, 2, 'unidad', ''),
(1024, 3, 48, 1, 'unidad', ''),
(1025, 3, 49, 2, 'unidad', ''),
(1026, 3, 50, 1, 'unidad', ''),
(1027, 3, 51, 0.25, 'unidad', 'un cuarto'),
(1028, 3, 52, 0, '', 'Cantidad indetermindada'),
(1029, 4, 41, 300, 'gramos', '300 gramos en total las verduras'),
(1030, 4, 60, 300, 'gramos', '300 gramos en total las verduras'),
(1031, 4, 63, 300, 'gramos', '300 gramos en total las verduras'),
(1032, 4, 64, 300, 'gramos', '300 gramos en total las verduras'),
(1034, 4, 29, 4, 'unidades', ''),
(1035, 4, 31, 2, 'cucharadas soperas', ''),
(1036, 4, 44, 1, 'pizca', ''),
(1037, 5, 81, 500, 'gramos', ''),
(1038, 5, 41, 10, 'unidad', 'Cebolleta'),
(1040, 5, 68, 0.5, 'taza', ''),
(1041, 5, 83, 250, 'gramos', ''),
(1042, 5, 84, 100, 'gramos', ''),
(1043, 5, 85, 225, 'gramos', 'en rodajas'),
(1044, 5, 63, 12, 'unidades', ''),
(1045, 5, 87, 0.5, 'taza', ''),
(1046, 5, 86, 1, 'taza', ''),
(1047, 5, 141, 4, 'cucharadas soperas', ''),
(1048, 5, 31, 1, 'cucharadas soperas', ''),
(1050, 6, 62, 2, 'unidad', ''),
(1051, 6, 66, 250, 'gramos', ''),
(1052, 6, 49, 2, 'unidad', ''),
(1053, 6, 20, 0, '', 'para freir'),
(1054, 7, 53, 100, 'gramos', ''),
(1055, 7, 54, 1, 'unidad', ''),
(1056, 7, 29, 2, 'unidad', ''),
(1057, 7, 31, 0, '', 'cantidad indetermindada'),
(1058, 7, 42, 1, 'hoja', ''),
(1059, 7, 44, 1, 'pizca', ''),
(1060, 7, 47, 2, 'kg', ''),
(1061, 7, 39, 3, 'unidad', ''),
(1062, 7, 56, 2, 'unidad', ''),
(1063, 7, 41, 1, 'unidad', ''),
(1064, 8, 67, 120, 'gramos', ''),
(1065, 8, 68, 200, 'gramos', ''),
(1066, 8, 60, 1, 'unidad', ''),
(1067, 8, 69, 1, 'trocito', ''),
(1068, 8, 70, 15, 'ml', ''),
(1069, 8, 71, 0.5, 'cuchraradita', ''),
(1070, 8, 72, 0.25, 'cuchraradita', ''),
(1071, 8, 73, 1, 'cuchraradita', ''),
(1072, 8, 74, 1, 'unidad', ''),
(1073, 8, 45, 0, '', 'cantidad indetermindada'),
(1074, 8, 44, 1, 'pizca', ''),
(1075, 8, 31, 0, '', 'cantidad indetermindada'),
(1077, 9, 57, 250, 'gramos', ''),
(1078, 9, 42, 1, 'hoja', ''),
(1079, 9, 58, 5, 'gramos', ''),
(1080, 9, 20, 0, '', 'cantidad indetermindada'),
(1081, 9, 44, 1, 'pizca', 'cantidad indetermindada'),
(1082, 9, 41, 1, 'unidad', ''),
(1083, 9, 60, 1, 'unidad', ''),
(1084, 9, 46, 1, 'unidad', ''),
(1085, 9, 31, 0, '', 'cantidad indetermindada'),
(1086, 9, 44, 3, 'gramos', 'sal de ajo'),
(1087, 9, 61, 4, 'unidad', ''),
(1088, 10, 77, 300, 'gramos', ''),
(1089, 10, 29, 1, 'unidad', ''),
(1090, 10, 70, 1, 'cucharada', ''),
(1091, 10, 78, 1, 'cucharada', ''),
(1092, 10, 60, 1, 'unidad', ''),
(1093, 10, 46, 1, 'unidad', ''),
(1094, 10, 40, 1, 'diente', ''),
(1095, 10, 41, 0.5, 'unidad', ''),
(1097, 10, 44, 0, '', 'cantidad indetermindada'),
(1098, 10, 20, 0, '', 'cantidad indetermindada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta_pasos`
--

CREATE TABLE IF NOT EXISTS `receta_pasos` (
  `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `receta_id` int(12) UNSIGNED NOT NULL,
  `orden` tinyint(2) NOT NULL DEFAULT 0,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `receta_pasos`
--

TRUNCATE TABLE `receta_pasos`;
--
-- Volcado de datos para la tabla `receta_pasos`
--

INSERT INTO `receta_pasos` (`id`, `receta_id`, `orden`, `descripcion`) VALUES
(1, 1, 1, 'Para preparar la masa del bizcocho casca los huevos y colócalos en un bol grande con el azúcar (2 medidas del vasito de yogur). Bate todo bien con una varilla manual (si no tienes varilla, puedes utilizar una cuchara de madera).\r\n\r\nA continuación, añade el yogur y el aceite al bol. Bate todo de nuevo.'),
(2, 1, 2, 'Lava y limpia bien el limón y con un rallador, ralla la cáscara encima (sin llegar a la parte blanca de la piel).'),
(3, 1, 3, 'Lava y limpia bien el limón y con un rallador, ralla la cáscara encima (sin llegar a la parte blanca de la piel).'),
(4, 1, 4, 'Tamiza la harina sobre la masa (pasarla por un colador) y añade también la levadura química (o polvo de hornear). Mezcla todo bien hasta tener una masa homogénea y sin grumos.'),
(5, 1, 5, 'Unta un molde apto para horno con un poco de mantequilla y espolvoréalo con harina, retirando la harina sobrante. Vierte la masa del bizcocho en el molde y hornea (con el horno precalentado) a 180ºC durante 40 minutos.'),
(6, 1, 6, 'Cuando esté hecho, apaga el horno, retira el bizcocho y deja que se temple. Después, pasa un cuchillo por los bordes del molde para sacarlo fácilmente y desmóldalo.\r\n\r\nSi quieres, puedes decorarlo espolvoreando azúcar glas sobre el bizcocho de yogur.'),
(7, 2, 1, 'Comenzamos con la tarea más larga, la de caramelizar la cebolla que nos llevará unos 30 minutos. Para ello, pelamos la cebolla y la cortamos en juliana. Después la ponemos en una sartén a fuego muy lento y dejamos que se haga muy despacio, removiendo de vez en cuando. No nos interesa que se dore la cebolla sino que se vaya pochando muy despacio.'),
(8, 2, 2, 'Mientras la cebolla se hace, pelamos las patatas y las cortamos en rodajas finas, procurando que todas ellas sean de tamaño uniforme. Las dejamos en agua durante 15 minutos y ponemos una sartén con aceite de oliva abundante en el fuego.\r\n\r\nSin dar tiempo a que el aceite se caliente, añadimos las patatas y dejamos que se vayan friendo muy despacio, partiendo de un aceite casi en frío. Así conseguimos que las patatas se confiten en lugar de dorarse. De todas formas, cuando lleven unos diez minutos y hayamos removido de vez en cuando, podemos subir el fuego para conseguir que algunas de las patatas queden más tostaditas, originando así contrastes en el plato final.'),
(9, 2, 3, 'Sacamos las patatas y las escurrimos bien del aceite y las ponemos en un bol grande. Escurrimos la cebolla cuando esté en su punto, y la ponemos sobre las patatas. Batimos los huevos y los añadimos al bol, removiendo con un tenedor para que se mezclen bien los tres ingredientes.'),
(10, 2, 4, 'Cuajamos la tortilla en una sartén con una cucharada de aceite durante unos tres o cuatro minutos y le damos la vuelta. Para ayudar a los que no sean muy duchos en esa operación, existen en el mercado sartenes dobles que permiten dar la vuelta a la tortilla sin riesgo de que se nos derrame.'),
(11, 3, 1, 'Echamos las lentejas en un bol con agua fría y las dejamos en remojo durante la noche, normalmente 12 horas. No es necesario echar sal a la hora del remojo. Si por cualquier razón no tuvieses tiempo las puedes hacer directamente. Siempre que sean pardinas y no te olvides de lavarlas para quitar impurezas. Únicamente recuerda cocerlas durante 1/2 hora más.\r\n\r\nAl día siguiente de ponerlas en remojo retiramos las lentejas que estén flotando en el agua, suelen ser no aptas para preparar el guiso. Las escurrimos y apartamos hasta el momento de prepararlas.'),
(12, 3, 2, 'Picamos la cebolla, el ajo y el pimiento en trozos muy pequeños para que se vayan deshaciendo en la cocción. Al final de la cocción casi no notaremos textura de ninguno de los ingredientes pero sí su sabor. Como el ajo a muchas personas no les gusta encontrarlo en el plato, podéis echarlo entero y retirarlo a mitad de la cocción.'),
(13, 3, 3, 'Pelamos las zanahorias y los tomates, si no queréis pelar el tomate tampoco pasa nada, aunque si que encontraréis algún resto de piel. Mucha gente suele picar la zanahoria para que no quede dura en la cocción. Depende del gusto de cada uno pero os puedo asegurar que en una hora y media queda perfecta, en mi caso me gusta cortarla en láminas finas si las zanahorias son delgadas y en cuartos si son grandes. Troceamos los tomates en 2 partes.'),
(14, 3, 4, 'En una cazuela, echamos un chorrito de aceite, las cebollas y los dientes de ajo. Sofreímos todo durante 10 minutos para que se mezclen bien los sabores.'),
(15, 3, 5, 'Añadimos el pimiento, el tomate, las zanahorias y la hoja de laurel. Sofreímos también durante 2-3 minutos. Añadimos los huesos (jamón y caña) y una cucharada generosa de pimentón de la Vera. Con una cucharada tipo postre es suficiente, demasiada puede llegar a amargar.'),
(16, 3, 6, 'Si os gusta un toque picante podéis mezclar pimentón dulce y picante al mismo nivel, quedan muy ricas. Removemos con una cuchara de madera rápidamente y echamos las lentejas ya escurridas y reservadas. Removemos otra vez para que se junte todo bien. (3 minutillos)'),
(17, 3, 7, 'Cubrimos con agua fría (importante, para que comience a hervir lentamente) hasta que quede la cazuela casi llena. Recordad que tenemos que añadir más ingredientes. A mí me gustan con caldo, si las quieres más espesas pon un poco menos de agua. Luego siempre puedes rectificar con agua caliente (para no romper la cocción).'),
(18, 3, 8, 'Dejamos que empiecen a hervir y espumeamos durante unos minutos. Retiramos la espuma que normalmente contiene impurezas, parte de los restos de la carne. Cuando lleve 1/2 hora cociendo le añadimos sal y pimienta al gusto. Es importante probar el caldo ya que hemos echado jamón y pueden quedar saladas.'),
(19, 3, 9, 'Añadimos 2 chorizos y una morcilla (no suelo echar panceta ni tocino, porque no nos lo comemos, pero le da buen sabor). Dejamos que se cocinen lentamente a temperatura media durante la siguiente media hora removiendo de vez en cuando con una cuchara de madera.'),
(20, 3, 10, 'A continuación retiramos los chorizos, la morcilla y los huesos para que queden menos pesadas. La última media hora cocinamos las lentejas a fuego lento probando de vez en cuando por si no necesitan más cocción. Otra opción es hacerlas en la olla express. Aunque me gustan más a cocción lenta alguna que otra vez las he hecho así, depende del tiempo que tengas.'),
(21, 3, 11, 'Cocinaremos unos 12 minutos si es una olla express, o 25 minutos si es normal. Podemos abrirla 5 minutos antes del tiempo (reposando antes de abrirla) para ver cómo están. Y si es necesario cerrad y seguid la cocción. Para emplatar lo mejor es un plato hondo con el guiso de lentejas y  el chorizo encima en rodajas. A mí me gusta la zanahoria entera pero la podéis trocear.'),
(22, 4, 1, 'Preparamos los ingredientes. Cortamos las verduras en trozos. Yo le puse, cebolla, pimiento rojo, calabacín, berenjena y unos champiñones, pero se puede poner todo lo que nos guste al revuelto de verduras light.'),
(23, 4, 2, 'Ponemos una sartén con aceite, añadimos las verduras y un poquito de sal y las salteamos. Las dejamos hasta que queden cocidas y si os gustan, un poco doradas.'),
(24, 4, 3, 'Batimos en un plato dos huevos. Cogemos la mitad de las verduras y las mezclamos con los dos huevos en la sartén. Vamos removiendo para que se vaya cuajando el huevo. Sacamos el revuelto de verduras y champiñones cuando veamos que ya está el huevo cuajado. Y repetimos el mismo paso con la otra mitad de las verduras y los dos huevos.'),
(25, 4, 4, 'Sacamos y servimos enseguida los revueltos de verduras. ¿Fácil verdad? Igual que esta receta de setas con jamón o esta de huevos rellenos de atún y surimi. Encontrarás muchísimas opciones más en mi blog Cocinando con Montse.'),
(42, 6, 1, 'Pela y corta en rodajas las patatas. Fríelas en una sartén con aceite caliente y déjalas doraditas.'),
(43, 6, 2, 'Corta en taquitos el jamón y el chorizo y rehógalos hasta que estén crujientes.'),
(44, 6, 3, 'Prepara los huevos en un cuenco y pincha las yemas.\r\n\r\nEn una sartén alta echa las patatas, el jamón y el chorizo y echa los huevos encima.'),
(45, 6, 4, 'Da vueltas pero no demasiadas para que las patatas de los huevos rotos con jamón y chorizo no se rompan. \r\n\r\nSirve los huevos rotos con chorizo, patatas y jamón recién hechos.'),
(46, 7, 1, 'Comenzamos por la salsa de tomate, pues lleva un tiempo de cocción considerable. Aunque una vez estén todos los ingredientes en la cazuela no hay más que dejarlos cocer lentamente.\r\n\r\nPelamos y picamos la cebolla. Cortamos los pimientos en juliana y las zanahorias en rodajas finas. Rehogamos en una cazuela con un poco de aceite de oliva virgen extra hasta que la cebolla coja color marroncito, así la salsa tendrá más sabor.'),
(47, 7, 2, 'Añadimos los tomates, lavados y troceados, y cocemos a fuego lento, removiendo de vez en cuando, durante una hora. Trituramos y volvemos a poner al fuego para cocer a fuego suave otra hora más. Salamos y echamos una pizca de azúcar si nos resulta muy ácida.'),
(48, 7, 3, 'Preparamos el arroz de la manera preferida. Nosotros lo solemos hacer en el microondas, nos resulta más cómodo que en una cacerola al fuego. Cada maestrillo tiene su librillo, así que usad vuestra receta de cabecera o cualquiera de las nuestras: la clásica, en olla exprés o en el microondas.'),
(49, 7, 4, 'Cortamos el plátano por la mitad, a lo largo. Calentamos abundante aceite de oliva en una sartén y lo freímos por ambas caras, a fuego fuerte. Ojo con pasarse de tiempo o se desintegrará en la sartén, sobre todo si está tirando a maduro. Retiramos y reservamos.'),
(50, 7, 5, 'Aprovechamos la misma sartén para freír los huevos, que conviene que estén a temperatura ambiente para que no salpiquen. Para formar su famosa puntilla la temperatura del aceite ha de ser elevada y conviene no tocarlos una vez dentro. En menos de un minuto estarán listos para retirar y emplatar.'),
(51, 7, 6, 'Ahora solo queda añadir el arroz (para hacer el montículo usamos una taza como molde), coronarlo con la salsa de tomate, incorporar el plátano frito y disfrutar inmediatamente de este plato clásico de los hogares españoles. Bon appétit.'),
(58, 8, 1, 'Desechar el líquido del tofu y escurrir bien. Envolver en varias capas de papel de cocina y dejar como mínimo 15 minutos con un peso encima. Cortar en cubos del tamaño de un bocado. Calentar un poco de aceite en una sartén y dorar el tofu por todos lados. Retirar.'),
(59, 8, 2, 'Cocer los fideos de arroz en agua hirviendo con un poco de sal durante unos tres minutos, siguiendo las instrucciones del paquete. Escurrir y enjuagar con agua fría, soltándolos un poco con un tenedor. Reservar.'),
(60, 8, 3, 'Rallar o picar fino el jengibre. Cortar el pimiento en tiras finas. Saltear en la misma sartén a fuego alto ambos ingredientes durante dos minutos. Salpimentar, agregar la salsa de soja y las especias. Rehogar 5 minutos. Devolver el tofu, dar unas vueltas e incorporar los fideos. Mezclar todo bien hasta que se integren. Servir con perejil picado.'),
(61, 10, 1, 'Cortamos el pollo en cubos más o menos grandes. De un tamaño un pelín más pequeño de bocado. Hacemos lo mismo con la cebolla y los pimientos. El ajo, lo picamos muy fino.'),
(62, 10, 2, 'En un bol ponemos el huevo y lo batimos. Añadimos el pollo troceado y le añadimos una pizca de sal. Después añadimos la cucharada de vino blanco y la de soja. Mezclamos bien'),
(63, 10, 3, 'A continuación puedes dejar marinar esto en la nevera de 4 horas a un día entero. Pero si no quieres, puedes proseguir con la receta sin esperar más. Añadimos y cubrimos todo esto con generosa cantidad de maizena y mezclamos bien. Puedes también pasar cada trozo de pollo por la maizena en un plato aparte pero, la maizena es harina de maíz muy fina, y es un poco engorroso para las manos hacerlo así. Por eso prefiero añadírsela directamente, aunque gastemos mucha más cantidad de maizena de que la otra forma. Es más práctico'),
(64, 10, 4, 'Metemos en el congelador para que la masa repose y mientras tanto, preparamos la salsa agridulce que acompañará al pollo. Para ello, ponemos todos los ingredientes de la salsa, salvo la maizena, en una sartén. Calentamos mientras removemos con frecuencia. Dejamos que espese unos 10 minutos y reservamos'),
(65, 10, 5, 'Ahora, podemos volver a sacar las pechugas de pollo del congelador. Les retiramos el exceso de maizena y freímos cada pieza en abundante aceite muy caliente. Cuando estén doradas, las retiramos y las colocamos sobre papel absorbente'),
(66, 10, 6, 'En un wok o en una sartén grande, añadimos un chorrito de aceite. Lo calentamos a fuego medio y añadimos el diente de ajo picado. Justo cuando comienza a coger color, añadimos los pimientos, la cebolla y una pequeña cantidad de sal. Mezclamos todo bien mientras dejamos cocinar 3 minutos más.'),
(67, 10, 7, 'Es el momento de añadir la salsa agridulce. Añadimos también una cucharadita de maizena, disuelta en 10ml de agua. Esto es para que espese la salsa. Mezclamos bien y dejamos cocinar un par de minutos más, sin dejar de remover'),
(68, 10, 8, 'Añadimos el pollo. Volvemos a mezclar todos los ingredientes y servimos inmediatamente ¡Esta comida no espera!'),
(69, 9, 1, 'Comenzamos por los frijoles refritos. Revisamos las alubias negras y retiramos los restos de suciedad y las piedrecillas que puedan contener: Las lavamos a conciencia bajo el grifo de agua. Las colocamos en una olla a presión, junto con una hoja de laurel, y las cubrimos con abuntante agua. Cocemos en la posición 2 durante 30 minutos. Dejamos que el vapor salga por sí solo antes de abrir la olla.\r\n\r\nLas alubias se pueden poner en remojo la noche anterior, lo que aceleraría el tiempo de cocción. Si optáis por ello, aseguráos de ajustar el tiempo de hervor reduciéndolo levemente. No indico tiempos pues cada olla es un mundo, así como cada tipo de alubia. No obstante, el punto de la alubia que perseguimos es aquel en el que, al presionarla entre dos dedos, cede sin resistencia.\r\n\r\nEscurrimos las alubias y reservamos el líquido sobrante de la cocción. Este lo necesitaremos más adelante, de modo que ojo con tirarlo. Calentamos el aceite de girasol en una cacerola, le agregamos la mitad del chile molido y, acto seguido, incorporamos las alubias y sazonamos. Removemos al tiempo que aplastamos con un machacador o con un tenedor. Incorporamos parte del líquido reservado hasta obtener un puré suave pero compacto.'),
(70, 9, 2, 'Para el relleno de verduras, pelamos la cebolla y la cortamos en juliana gruesa. Lavamos los pimientos, retiramos el pedúnculo y las semillas, cortamos por la mitad y retiramos los filamentos blancos del interior. Cortamos en juliana gruesa, de igual tamaño que la cebolla. En una sartén, calentamos tres cucharadas de aceite de oliva suave y salteamos las verduras a fuego medio-alto. Condimentamos, removemos y retiramos del fuego.\r\n\r\nLimpiamos la sartén con papel absorbente y la volvemos a colocar al fuego para calentar ligeramente las tortillas de trigo. No queremos dorarlas, sólo templarlas para que se vuelvan más maleables, por lo que con 30 segundos tendremos suficiente.\r\n\r\nExtendemos una capa de frijoles refritos en cada tortilla y, sobre estos, las verduras salteadas. Cerramos las tortillas, doblando dos extremos opuestos y a continuación, doblando los otros dos lados sobre estos, a modo de sobre. Tostamos ligeramente por ambos lados, en la sartén y los servimos inmediatamente.'),
(71, 11, 1, 'Lavamos y secamos los tomates. Les sacamos alguna parte, si es necesario o está fea, y los troceamos. En una cazuela ponemos un poco de aceite de oliva a fuego medio. Echamos la cebolla y los pimientos cortados en juliana, y las zanahorias en rodajas finas.'),
(72, 11, 2, 'Rehogamos todo hasta que la cebolla coja color marroncito, así la salsa tendrá más sabor. Añadimos el tomate troceado y dejamos a fuego lento, removiendo de vez en cuando, durante una hora.'),
(73, 11, 3, 'Pasamos la salsa por el pasapurés y volvemos a poner al fuego. La dejaremos durante otra hora más, teniendo cuidado de que no se pegue. Salamos y echamos una pizca de azúcar si nos resulta muy ácida.\r\n\r\nApagamos el fuego, rellenamos los botes con la salsa de tomate y dejamos destapados hasta que se enfríen totalmente. Si queremos congelar los botes dejaremos un espacio de dos centímetros hasta el borde, ya que al congelarse el líquido aumentará su volumen y de este modo evitamos que el frasco reviente.'),
(74, 12, 1, 'Añadimos las alubias en una cazuela, a ser posible baja y ancha (si es de barro mejor). Cubrimos con agua hasta que quede un par de dedos por encima de las mismas. Removemos otra vez para que se junte todo bien. Calentamos a fuego alto hasta que rompa a hervir.'),
(75, 12, 2, 'Cuando empiece a hervir introducimos la panceta, los chorizos, el hueso de jamón y las morcillas (previamente pinchadas para evitar que revienten).'),
(76, 12, 3, 'Procurad que las morcillas y los chorizos permanezcan siempre en la parte superior pare evitar posibles roturas que nos estropearían la fabada.'),
(77, 12, 4, 'Espumeamos durante unos minutos. Es decir, retiramos la espuma que normalmente contiene impurezas y a la vez desgrasamos un poco el caldo. Cuando lleve 1/2 hora cociendo a fuego alto le añadimos las hebras de azafrán diluidas en un poco de caldo caliente de la cazuela.'),
(78, 12, 5, 'Bajamos la temperatura de cocción. Añadimos sal al gusto, es importante probar el caldo ya que hemos echado el hueso de jamón y pueden quedar saladas.'),
(79, 12, 6, 'Dejamos que se cocinen lentamente a temperatura baja durante 2 horas. Siempre removiendo de vez en cuando con una cuchara de madera sin romperlas. Durante estas dos horas, añadimos agua fría en dos ocasiones para «asustarlas» (rompe el hervor y ayuda a su perfecta cocción).'),
(80, 12, 7, 'Probamos la fabada para ver si ya están tiernas y rectificamos de sal. Una vez probadas y tiernas apartamos del fuego y dejamos reposar una hora aproximadamente.'),
(81, 12, 8, 'A continuación retiramos los chorizos, la morcilla, la panceta y los huesos de jamón. Preparamos la carne, cortando los embutidos en rodajas generosas. Troceamos la panceta y aprovechamos la carne del hueso. Reservamos para la presentación. Para emplatar lo mejor es un plato hondo con la fabada y la carne encima, así de fácil.'),
(82, 13, 1, 'Comenzamos trabajando los filetes con la piedra, para ablandarlos y aplanarlos. Los filetes de cadera son muy tiernos y resultan apropiados para hacer esta receta. Podemos utilizar 4 filetes, o pedir al carnicero que nos los corte formando librillos que posteriormente cerraremos sobre sí mismos. Salpimentamos los filetes y colocamos sobre cada uno, el queso de fundir y una loncha de jamón serrano, cerrando a continuación el librillo con la otra mitad del filete.'),
(83, 13, 2, 'Ya montado el relleno del cachopo, se aprieta un poco para compactar los ingredientes, se asegura si es necesario con unos palillos de madera, y se empana, pasando el cachopo por huevo batido y a continuación por pan rallado. Hay quien prefiere dar un doble empanado para que quede más sellado, pero yo prefiero hacerlo una sola vez.'),
(84, 13, 3, 'Después, se fríen los cachopos de uno en uno, en una sartén con abundante aceite de oliva, cuidando que no esté demasiado caliente para que se hagan bien por dentro, dejando que frían durante 3-4 minutos por cada lado, hasta que queden dorados, el queso esté fundido y la carne, al punto deseado.'),
(85, 13, 4, 'Finalmente, se escurren en papel absorbente y se sirven enteros o cortados por la mitad. La tradición es utilizar grandes filetes de la babilla o la cadera por lo que a veces los cachopos no caben en un plato y hay que servirlos en una fuente para cada persona.'),
(86, 14, 1, 'Primero vamos a aromatizar la leche en la que coceremos el arroz. Para ello echa en una olla la leche junto con el azúcar, las ramas de canela y la cáscara de limón, y ponla a fuego medio hasta que hierva, es decir, hasta que veas que empieza a burbujear.'),
(87, 14, 2, 'Mientras, recurre a este truco para que el arroz no se te pegue y es eliminando gran parte de su almidón. Pon el arroz en un colador bajo un chorro de agua fría, remuévelo con tus propias manos y tenlo así durante al menos un par de minutos para que suelte todo ese almidón. Esto no va a afectar a la cremosidad del arroz, pero así es más difícil que se te pegue.'),
(88, 14, 3, 'Cuando la leche esté hirviendo añade el arroz y baje el fuego a temperatura suave para que se cueza lentamente durante 45-50 minutos. Ve removiéndolo de vez en cuando (yo suelo hacerlo cada 5 minutos más o menos).'),
(89, 14, 4, 'Cuando esté casi listo tendrás que remover con más frecuencia para que no se pegue al fondo y vigilar la cantidad de leche líquida que queda en la olla, ya que hay a quien le gusta más caldoso o bien más espeso, por lo que el punto perfecto lo decides tú (recuerda que una vez apartado del fuego absorberá un poco más de leche por lo que debes dejarlo un poco más caldoso de lo que te gustaría).'),
(90, 14, 5, 'Prueba el arroz y, si los granos están hechos y la textura es la que más te gusta, retíralo del fuego y déjalo reposar unos minutos para que se temple.'),
(91, 14, 6, 'Antes de que se enfríe quita las ramas de canela y la cáscara de limón y échalo en los recipientes en los que vayas a servirlo (con esta receta tendrás unas 6 raciones como las que puedes ver en la fotografía), para que termine de asentarse.'),
(92, 14, 7, 'Puede consumirse al momento, templadito, aunque normalmente es un postre que suele gustar frío así que deja que se enfríe en los recipientes y cuando esté totalmente frío déjalo en la nevera hasta el momento de consumir, diría que mínimo un par de horas de nevera para que esté fresquito, y de máximo suele aguantar 2-3 días en la nevera sin problemas aunque se va resecando, sobre todo si no lo tapas con papel film.'),
(93, 14, 8, 'Espolvorea con canela por encima o bien carameliza su superficie. Para ello puedes ver la secuencia en estas fotografías que tomé en otra ocasión que preparé arroz con leche. Echa una cucharadita de azúcar encima del arroz bien repartida, y con la ayuda de un soplete ve derritiendo el azúcar para que se forme una costra encima del arroz que cuando se enfríe estará crujiente. ¡Delicioso!'),
(94, 15, 1, 'Pela y pica la cebolla en dados medianos. Limpia el pimiento verde, retírale el tallo y las pepitas y córtalo en dados.\r\n\r\nSi las patatas estuvieran sucias, pásalas por agua. Pélalas, córtalas por la mitad a lo largo y después corta cada trozo en medias lunas finas de 1/2 centímetros'),
(95, 15, 2, 'Introduce todo en la sartén, sazona a tu gusto y fríe a fuego suave durante 25-30 minutos.\r\n\r\nRetira la fritada y escúrrela. Pasa el aceite a un recipiente y resérvalo. Limpia la sartén con papel absorbente de cocina.'),
(96, 15, 3, 'Casca los huevos, colócalos en un recipiente grande y bátelos. Sálalos a tu gusto, agrega la fritada de patatas, cebolla y pimiento y mezcla bien.\r\n\r\nColoca la sartén nuevamente en el fuego, agrega un chorrito del aceite reservado y agrega la mezcla. Remueve un poco con una cuchara de madera y espera (20 segundos) a que empiece a cuajarse.'),
(97, 15, 4, 'Separa los bordes, cubre la sartén con un plato de mayor diámetro que la sartén y dale la vuelta.\r\n\r\nÉchala de nuevo para que cuaje por el otro lado.'),
(98, 16, 1, 'Introducimos el agua templada en un recipiente amplio y hondo y añadimos la levadura fresca, desmenuzada, y el azúcar. Removemos hasta que el azúcar y la levadura se integren por completo.'),
(99, 16, 2, 'Añadimos la mitad de la harina y todo el aceite. Removemos bien, procurando aplastar los grumos que se formen, y dejamos reposar durante 20 minutos a temperatura ambiente, cubriendo el recipiente con un trapo limpio. La masa crecerá ligeramente y se llenará de burbujas.'),
(100, 16, 3, 'Transcurrido el tiempo de reposo incorporamos el resto de la harina, la sal y removemos hasta que no podamos más, porque se volverá muy espesa. Espolvoreamos la superficie de trabajo con harina y volcamos la masa sobre ella. Nos engrasamos las manos con aceite y amasamos durante un par de minutos.'),
(101, 16, 4, 'Formamos una bola con la masa y la colocamos sobre una bandeja de horno cubierta con papel vegetal untado con un poco de aceite. Hacemos dos cortes en la superficie con un cuchillo afilado y, si queremos dar un aire rústico al pan, lo espolvoreamos con harina.'),
(102, 16, 5, 'Embadurnamos con aceite el interior de un recipiente amplio y hondo apto para horno (hemos usado un bol de pyrex de 24 cm, pero se puede usar una cacerola o similar) y cubrimos con él la masa. Cocemos en el horno, precalentado a 200 ºC con calor arriba y abajo, durante 45 minutos. Destapamos y dejamos enfriar sobre una rejilla antes de consumir.'),
(103, 17, 1, 'Si las patatas estuvieran sucias, pásalas por agua. Pélalas y córtales una base a lo largo y después en rodajas (también a lo largo) de un centímetro de grosor. Cuando tengas las rodajas, apílalas nuevamente (3-4 rodajas) y córtalas en tiras.'),
(104, 17, 2, 'Colócalas en un cuenco, cúbrelas con agua, déjalas a remojo durante 10 minutos y sécalas bien con un trapo de cocina bien limpio. Calienta el aceite en una sartén, y antes de que empiece a humear, añade las patatas y fríelas a fuego medio (por los 2 lados), removiéndolas de vez en cuando hasta que se doren (10 minutos). Retíralas con una espumadera, escúrrelas sobre un plato forrado con papel absorbente de cocina y sálalas con un poco de sal fina.'),
(105, 17, 3, 'Para freír los huevos, es importante hacerlo de uno en uno. Con un cacillo, pasa 3 cazos de aceite a una sartén más pequeña y pon a calentar. Cuando empiece a humear, casca el huevo, colócalo en un cuenco y agrégalo con cuidado a la sartén. Con una espumadera, echa aceite por encima y fríelo durante 20-30 segundos. Escúrrelo y sálalo. Repite la operación con el resto de los huevos.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta_paso_imagenes`
--

CREATE TABLE IF NOT EXISTS `receta_paso_imagenes` (
  `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `receta_paso_id` int(12) UNSIGNED NOT NULL,
  `orden` tinyint(2) NOT NULL DEFAULT 0,
  `imagen` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `receta_paso_imagenes`
--

TRUNCATE TABLE `receta_paso_imagenes`;
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
(22, 58, 1, 'tofu1641734311.jpg'),
(23, 60, 1, '1366_20001641734426.jpg'),
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas`
--

CREATE TABLE IF NOT EXISTS `tiendas` (
  `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `domicilio` varchar(150) DEFAULT NULL,
  `poblacion` varchar(50) DEFAULT NULL,
  `provincia` varchar(50) DEFAULT NULL,
  `usuario_id` int(12) UNSIGNED NOT NULL COMMENT 'Usuario que se corresponde con la tienda para poder conectar a la aplicación web.',
  `activa` tinyint(1) NOT NULL COMMENT 'Si la tienda esta activa para conectar como usuario, y si estará visible desde el portal junto con sus ofertas independientemente de que esté visible o no.',
  `visible` tinyint(1) NOT NULL COMMENT 'Si la tienda y sus ofertas estarán visibles en el portal aunque esté la tienda activa.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `tiendas`
--

TRUNCATE TABLE `tiendas`;
--
-- Volcado de datos para la tabla `tiendas`
--

INSERT INTO `tiendas` (`id`, `nombre`, `domicilio`, `poblacion`, `provincia`, `usuario_id`, `activa`, `visible`) VALUES
(2, 'Mercadona', 'Calle Monsalve, 2', 'Zamora', 'Zamora', 10, 1, 1),
(3, 'Alimerka', 'Calle Ramón del Valle, 11', 'Arriondas', 'Asturias', 10, 1, 1),
(4, 'Lidl', 'Av. Padre Ignacio Ellacuría, 1', 'Salamanca', 'Salamanca', 10, 1, 1),
(5, 'Carrefour Express', 'Calle Arzobispo Guisasola, 42', 'Oviedo', 'Asturias', 10, 1, 1),
(6, 'Eroski', 'C. Epifanía, 6', 'Valladolid', 'Valladolid', 10, 1, 1),
(7, 'Dia', 'C. de la Virgen de los Peligros, 9', 'Madrid', 'Madrid', 10, 1, 1),
(8, 'Coviran', 'Av. Portugal, 1', 'Cádiz', 'Cádiz', 10, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda_ofertas`
--

CREATE TABLE IF NOT EXISTS `tienda_ofertas` (
  `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tienda_id` int(12) UNSIGNED NOT NULL,
  `ingrediente_id` int(12) UNSIGNED NOT NULL,
  `descripcion` text DEFAULT NULL,
  `envase` text DEFAULT NULL,
  `cantidad` float NOT NULL DEFAULT 0,
  `medida` varchar(45) DEFAULT NULL,
  `notas` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `tienda_ofertas`
--

TRUNCATE TABLE `tienda_ofertas`;
--
-- Volcado de datos para la tabla `tienda_ofertas`
--

INSERT INTO `tienda_ofertas` (`id`, `tienda_id`, `ingrediente_id`, `descripcion`, `envase`, `cantidad`, `medida`, `notas`) VALUES
(1, 2, 1, '10% dto.', 'pack de 3 chorizos. Tags: carne', 300, 'g', 'solo aplicable una vez'),
(2, 6, 1, '2x1', 'chorizos sueltos. Tags: carne', 200, 'g', 'llevas 2 y pagas 1'),
(3, 3, 11, '15 % en la segunda unidad', 'queso entero. Tags: vegetariano.', 450, 'g', 'solo hasta el 12/01/2021'),
(4, 5, 23, 'sólo 3,99 €', 'malla de cebollas. Tags: verduras', 1, 'kg', 'sólo hasta el 01/02/2021'),
(5, 4, 19, 'sólo 0,59 €', 'paquete Tags: condimento', 1, 'kg', 'sólo hasta el 21/01/2022'),
(6, 7, 10, '3x2', 'botella. Tags: condimento.', 1, 'L', 'sólo el 13/01/2022'),
(7, 8, 22, 'gratis la 2ª unidad', 'bolsa. Tags: verdura.', 500, 'g', 'sólo los martes'),
(8, 8, 22, '40% en la segunda unidad', 'bandeja 4 tomates. Tags: verdura.', 300, 'g', '---'),
(9, 2, 13, '3x2', 'huevera. Tags: vegetariano.', 1, 'docena', '---'),
(10, 2, 18, 'sólo 0,78 €', 'tetrabrick. Tags: bebida.', 1, 'L', '---'),
(11, 2, 3, 'OFERTA ESPECIAL - 9,90 €', 'a granel. Tags: legumbre.', 1, 'kg', 'Oferta sólo válida para socios Mercadona'),
(12, 2, 16, 'OFERTA ESPECIAL - 3,50 €', 'bolsa. Tags: verdura.', 5, 'kg', '---'),
(13, 2, 7, 'OFERTA DEL DÍA - 0,32 €', 'paquete. Tags: condimento', 1, 'kg', 'Sólo válida el 11/01/2022'),
(14, 2, 17, '2x1', 'paquete. Tags: conserva.', 1, 'kg', '---');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL COMMENT 'Correo Electronico y "login" del usuario.',
  `password` varchar(60) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `rol` char(1) NOT NULL COMMENT 'Tipo de Perfil: C=Colaborador, A=Administrador, T=Tienda.',
  `aceptado` tinyint(1) NOT NULL COMMENT 'Indicador de usuario aceptado su registro o no.',
  `creado` datetime NOT NULL COMMENT 'Fecha y Hora de creacion del usuario',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `usuarios`
--

TRUNCATE TABLE `usuarios`;
--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`, `nombre`, `rol`, `aceptado`, `creado`) VALUES
(1, 'fer@gmail.com', 'cef48cb4569d34364e0e86067efa14fbe9b4591e', 'fer', 'A', 1, '2022-01-03 15:57:24'),
(2, 'marcos@gmail.com', 'dfadc855249b015fd2bb015c0b099b2189c58748', 'marcos', 'A', 1, '2022-01-06 21:20:26'),
(3, 'victor@gmail.com', '88fa846e5f8aa198848be76e1abdcb7d7a42d292', 'victor', 'A', 1, '2022-01-06 21:21:25'),
(4, 'nerea@gmail.com', 'ecd38c3624dcb1ab55b8a926a44d3dbeeed84fc6', 'nerea', 'A', 1, '2022-01-06 21:21:54'),
(5, 'pablo@gmail.com', '707d14912bb250caf67dfe0ea4035681fbfc4f56', 'pablo', 'A', 1, '2022-01-06 21:22:38'),
(6, 'manu@gmail.com', '158873d90a7ef40f3637a222b7329c09d0222554', 'manu', 'A', 1, '2022-01-06 21:23:51'),
(7, 'sara@gmail.com', 'dea04453c249149b5fc772d9528fe61afaf7441c', 'sara', 'A', 1, '2022-01-06 21:24:27'),
(8, 'elsa@gmail.com', '431651dd2bf464e7ef8821b265af8119e4e25b63', 'elsa', 'A', 1, '2022-01-06 21:24:48'),
(9, 'colaborador@gmail.com', 'cd6a0dd2dfac024a049e7430ab284075befe8e91', 'colaborador', 'C', 1, '2022-01-06 21:25:18'),
(10, 'tienda@gmail.com', '58637696377734903ceb69effb9b48e3d058bf4e', 'tienda', 'T', 1, '2022-01-06 21:25:42'),
(11, 'sistema@gmail.com', '2bd603bdfc39c0015d0d9f3194bb84fb18ed708c', 'sistema', 'S', 1, '2022-01-06 21:26:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
