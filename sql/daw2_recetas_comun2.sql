-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-01-2022 a las 11:06:02
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

CREATE TABLE `categorias` (
  `id` int(12) UNSIGNED NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `categoria_padre_id` int(12) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Identificador de la categoria padre en caso de estar ordenados por jerarquías.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `menus` (
  `id` int(12) UNSIGNED NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `usuario_id` int(12) UNSIGNED DEFAULT NULL COMMENT 'Usuario que ha creado el menu o CERO si no existe (como si fuera NULL).'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `menu_recetas` (
  `id` int(12) UNSIGNED NOT NULL,
  `menu_id` int(12) UNSIGNED NOT NULL,
  `receta_id` int(12) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `planificaciones` (
  `id` int(12) UNSIGNED NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `periodo` varchar(25) NOT NULL COMMENT 'Texto indicativo del Periodo de planificacion.',
  `usuario_id` int(12) UNSIGNED NOT NULL COMMENT 'Usuario que ha creado la planificacion o CERO si no existe (como si fuera NULL).',
  `notas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `planificacion_menus` (
  `id` int(12) UNSIGNED NOT NULL,
  `planificacion_id` int(12) UNSIGNED NOT NULL,
  `menu_id` int(12) UNSIGNED NOT NULL COMMENT 'Menu relacionado con el dia planificado',
  `numero_dia` smallint(3) NOT NULL COMMENT 'Numero de dia del menu dentro de la planificacion.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `recetas` (
  `id` int(12) UNSIGNED NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text DEFAULT NULL,
  `tipo_plato` char(1) NOT NULL COMMENT 'Tipo Plato E=Entrantes, 1=Primeros, 2=Segundos, P=Postres, ...',
  `dificultad` tinyint(2) NOT NULL DEFAULT 0 COMMENT '1=Muy Facil,5=Muy Dificil.',
  `comensales` tinyint(2) NOT NULL DEFAULT 4 COMMENT 'Numero de comensales para la receta.',
  `tiempo_elaboracion` smallint(4) NOT NULL DEFAULT 0 COMMENT 'Tiempo en Minutos de elaboracion de la receta.',
  `valoracion` tinyint(2) NOT NULL DEFAULT 3 COMMENT 'Valoracion de la receta: 1=Peor, 3=Buena, 5=Mejor.',
  `usuario_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Usuario que ha creado la receta o CERO si no existe (como si fuera NULL).',
  `aceptada` tinyint(1) DEFAULT NULL COMMENT 'Indicador de receta aceptada o no.',
  `imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recetas`
--

INSERT INTO `recetas` (`id`, `nombre`, `descripcion`, `tipo_plato`, `dificultad`, `comensales`, `tiempo_elaboracion`, `valoracion`, `usuario_id`, `aceptada`, `imagen`) VALUES
(11, 'Sopa de tomate', 'una sopa quemagrasas que se debe de comer todos los días y en la cantidad que se desee, porque apenas tiene calorías.', '1', 2, 1, 30, 3, 1, 1, 'sopatomate1641502211.jpg'),
(12, 'Fabada Asturiana', 'Fabada asturiana, o simplemente fabada, es el plato tradicional de la cocina asturiana elaborado con faba asturiana (en asturiano, fabes), embutidos como chorizo y la morcilla asturiana, y con cerdo. Es el plato típico de Asturias (el plato regional más conocido de la región asturiana), pero su difusión es tan grande en la península ibérica que forma parte de la gastronomía de España más reconocida. Se considera según ciertos autores una de las diez recetas típicas de la cocina española.', '1', 2, 5, 180, 5, 1, 1, 'fabada1641502549.jpg'),
(13, 'Cachopo', 'Un cachopo qué es, pues son dos filetes de ternera uno encima del otro y en medio está relleno de jamón y queso. Luego va enharinado, pasado por huevo empanado y frito. Suena fácil, y la verdad es que es fácil hacerlo.', '2', 3, 2, 60, 5, 1, 1, 'cachopo21641502878.jpg'),
(14, 'Arroz con leche', 'El arroz con leche es un postre típico de la gastronomía de múltiples países hecho cociendo lentamente arroz con leche y azúcar. Se sirve frío o caliente. Se le suele espolvorear canela, vainilla o cáscara de limón para aromatizarlo.', 'P', 4, 8, 140, 5, 1, 1, 'arrozconleche1641503050.png'),
(15, 'Tortilla de patata', 'La tortilla de patatas o tortilla de papas​ o tortilla española es una tortilla u omelet ​ a la que se le agrega patatas troceadas.​ Se trata de uno de los platos más conocidos y emblemáticos de la cocina española, siendo un producto muy popular que se puede encontrar en casi cualquier bar o restaurante del país.', '1', 1, 5, 60, 5, 1, 1, 'tortilla1641503652.jpg'),
(16, 'Pan', 'El pan, del latín panis, es un alimento básico que forma parte de la dieta tradicional en Europa, Medio Oriente, India, América y Oceanía. Se suele preparar mediante el horneado de una masa, elaborada fundamentalmente con harina de cereal, agua y sal.', 'E', 4, 5, 240, 5, 2, 1, 'pan1641503828.jpg'),
(17, 'Huevos con patatas y jamón', 'Estos huevos revueltos o huevos estrellados con patatas, jamón y pimientos de padrón son una receta esencial y que suele gustar a todo el mundo. Creo que todos tenemos en mente la imagen de esa yema de huevo que, al romperse, comienza a escurrirse entre el resto de ingredientes, un auténtico… ¡escándalo! ', '2', 1, 1, 45, 5, 5, 1, 'huevosjamon1641504031.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta_categorias`
--

CREATE TABLE `receta_categorias` (
  `id` int(12) UNSIGNED NOT NULL,
  `receta_id` int(12) UNSIGNED NOT NULL,
  `categoria_id` int(12) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `receta_comentarios` (
  `id` int(12) UNSIGNED NOT NULL,
  `receta_id` int(12) UNSIGNED NOT NULL,
  `usuario_id` int(12) UNSIGNED NOT NULL COMMENT 'Usuario que ha creado el comentario. No deberia ser CERO (como si fuera NULL).',
  `fechahora` datetime NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `receta_ingredientes` (
  `id` int(12) UNSIGNED NOT NULL,
  `receta_id` int(12) UNSIGNED NOT NULL,
  `ingrediente_id` int(12) UNSIGNED NOT NULL,
  `cantidad` float NOT NULL DEFAULT 0,
  `medida` varchar(45) DEFAULT NULL,
  `notas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(38, 17, 10, 2, 'L', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta_pasos`
--

CREATE TABLE `receta_pasos` (
  `id` int(12) UNSIGNED NOT NULL,
  `receta_id` int(12) UNSIGNED NOT NULL,
  `orden` tinyint(2) NOT NULL DEFAULT 0,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas`
--

CREATE TABLE `tiendas` (
  `id` int(12) UNSIGNED NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `domicilio` varchar(150) DEFAULT NULL,
  `poblacion` varchar(50) DEFAULT NULL,
  `provincia` varchar(50) DEFAULT NULL,
  `usuario_id` int(12) UNSIGNED NOT NULL COMMENT 'Usuario que se corresponde con la tienda para poder conectar a la aplicación web.',
  `activa` tinyint(1) NOT NULL COMMENT 'Si la tienda esta activa para conectar como usuario, y si estará visible desde el portal junto con sus ofertas independientemente de que esté visible o no.',
  `visible` tinyint(1) NOT NULL COMMENT 'Si la tienda y sus ofertas estarán visibles en el portal aunque esté la tienda activa.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `tienda_ofertas` (
  `id` int(12) UNSIGNED NOT NULL,
  `tienda_id` int(12) UNSIGNED NOT NULL,
  `ingrediente_id` int(12) UNSIGNED NOT NULL,
  `descripcion` text DEFAULT NULL,
  `envase` text DEFAULT NULL,
  `cantidad` float NOT NULL DEFAULT 0,
  `medida` varchar(45) DEFAULT NULL,
  `notas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tienda_ofertas`
--

INSERT INTO `tienda_ofertas` (`id`, `tienda_id`, `ingrediente_id`, `descripcion`, `envase`, `cantidad`, `medida`, `notas`) VALUES
(1, 2, 1, '10% dto.', 'pack de 3 chorizos', 300, 'g', 'solo aplicable una vez'),
(2, 6, 1, '2x1', 'chorizos sueltos', 200, 'g', 'llevas 2 y pagas 1'),
(3, 3, 11, '15 % en la segunda unidad', 'queso entero', 450, 'g', 'solo hasta el 12/01/2021'),
(4, 5, 23, 'sólo 3,99 €', 'malla de cebollas', 1, 'kg', 'sólo hasta el 01/02/2021'),
(5, 4, 19, 'sólo 0,59 €', 'paquete', 1, 'kg', 'sólo hasta el 21/01/2022'),
(6, 7, 10, '3x2', 'botella', 1, 'L', 'sólo el 13/01/2022'),
(7, 8, 22, 'gratis la 2ª unidad', 'bolsa', 500, 'g', 'sólo los martes'),
(8, 8, 22, '40% en la segunda unidad', 'bandeja 4 tomates', 300, 'g', '---'),
(9, 2, 13, '3x2', 'huevera', 1, 'docena', '---'),
(10, 2, 18, 'sólo 0,78 €', 'tetrabrick', 1, 'L', '---'),
(11, 2, 3, 'OFERTA ESPECIAL - 9,90 €', 'a granel', 1, 'kg', 'Oferta sólo válida para socios Mercadona'),
(12, 2, 16, 'OFERTA ESPECIAL - 3,50 €', 'bolsa', 5, 'kg', '---'),
(13, 2, 7, 'OFERTA DEL DÍA - 0,32 €', 'paquete', 1, 'kg', 'Sólo válida el 11/01/2022'),
(14, 2, 17, '2x1', 'paquete', 1, 'kg', '---');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(12) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL COMMENT 'Correo Electronico y "login" del usuario.',
  `password` varchar(60) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `rol` char(1) NOT NULL COMMENT 'Tipo de Perfil: C=Colaborador, A=Administrador, T=Tienda.',
  `aceptado` tinyint(1) NOT NULL COMMENT 'Indicador de usuario aceptado su registro o no.',
  `creado` datetime NOT NULL COMMENT 'Fecha y Hora de creacion del usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu_recetas`
--
ALTER TABLE `menu_recetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `planificaciones`
--
ALTER TABLE `planificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `planificacion_menus`
--
ALTER TABLE `planificacion_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `receta_categorias`
--
ALTER TABLE `receta_categorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receta_categorias_receta_id_idx` (`receta_id`);

--
-- Indices de la tabla `receta_comentarios`
--
ALTER TABLE `receta_comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `receta_ingredientes`
--
ALTER TABLE `receta_ingredientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `receta_pasos`
--
ALTER TABLE `receta_pasos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `receta_paso_imagenes`
--
ALTER TABLE `receta_paso_imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tienda_ofertas`
--
ALTER TABLE `tienda_ofertas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `menu_recetas`
--
ALTER TABLE `menu_recetas`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `planificaciones`
--
ALTER TABLE `planificaciones`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `planificacion_menus`
--
ALTER TABLE `planificacion_menus`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `receta_categorias`
--
ALTER TABLE `receta_categorias`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `receta_comentarios`
--
ALTER TABLE `receta_comentarios`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `receta_ingredientes`
--
ALTER TABLE `receta_ingredientes`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `receta_pasos`
--
ALTER TABLE `receta_pasos`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `receta_paso_imagenes`
--
ALTER TABLE `receta_paso_imagenes`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tienda_ofertas`
--
ALTER TABLE `tienda_ofertas`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
