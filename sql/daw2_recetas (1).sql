-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-01-2022 a las 19:57:39
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
CREATE DATABASE IF NOT EXISTS `daw2_recetas` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `daw2_recetas`;

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
(1, '  Aceite de girasol', 'Ingrediente Condimento', '144kcal'),
(10, '              Huevo', 'Ingrediente Proteico', '144kcal'),
(11, '     Yogur de limón', 'Ingrediente Postre', '144kcal'),
(12, '    Aceite de oliva', 'Ingrediente Condimento', '144kcal'),
(13, '             Azúcar', 'Ingrediente Condimento', '144kcal'),
(14, '             Harina', 'Ingrediente Condimento', '144kcal'),
(15, '           Levadura', 'Ingrediente Condimento', '144kcal'),
(16, '              Limón', 'Ingrediente Fruta', '144kcal'),
(17, '        Azúcar glas', 'Ingrediente Condimento', '144kcal'),
(18, '        Mantequilla', 'Ingrediente Condimento', '144kcal'),
(19, '           Lentejas', 'Ingrediente Legumbre', '144kcal'),
(20, '         Zanahorias', 'Ingrediente Verdura', '144kcal'),
(21, '                Ajo', 'Ingrediente Condimento', '144kcal'),
(22, '            Cebolla', 'Ingrediente Condimento', '144kcal'),
(23, '             Laurel', 'Ingrediente Condimento', '144kcal'),
(24, '     Pimentón dulce', 'Ingrediente Condimento', '144kcal'),
(25, '                Sal', 'Ingrediente Condimento', '144kcal'),
(26, '     Pimienta negra', 'Ingrediente Condimento', '144kcal'),
(27, '     Pimiento verde', 'Ingrediente Verdura', '144kcal'),
(28, '             Tomate', 'Ingrediente Verdura', '144kcal'),
(29, '      Hueso de caña', 'Ingrediente Carne', '144kcal'),
(30, '            Chorizo', 'Ingrediente Carne', '144kcal'),
(31, '           Morcilla', 'Ingrediente Carne', '144kcal'),
(32, '     Hueso de jamón', 'Ingrediente carne', '144kcal'),
(33, '               Agua', 'Ingrediente Bebida', '144kcal'),
(34, '        Arroz bomba', 'Ingrediente Pasta', '144kcal'),
(35, '            Plátano', 'Ingrediente Fruta', '144kcal'),
(36, '        Tomate pera', 'Ingrediente Verdura', '144kcal'),
(37, '     Pimiento verde', 'Ingrediente Verdura', '144kcal'),
(38, '     Alubias negras', 'Ingrediente Legumbre', '144kcal'),
(39, '       Chile molido', 'Ingrediente Carne', '144kcal'),
(41, '      Pimiento rojo', 'Ingrediente Verdura', '144kcal'),
(42, ' Tortillas de trigo', 'Ingrediente Vegetariano', '144kcal'),
(43, '            Patatas', 'Ingrediente Verdura', '144kcal'),
(44, '          Calabacín', 'Ingrediente Verdura', '144kcal'),
(45, '          Berenjena', 'Ingrediente Verdura', '144kcal'),
(46, '        Champiñones', 'Ingrediente Vegano', '144kcal'),
(47, '              Jamón', 'Ingrediente Conserva', '144kcal'),
(48, '    Fideos de arroz', 'Ingrediente Pasta', '144kcal'),
(49, '         Tofu firme', 'Ingrediente Vegetariano', '144kcal'),
(50, '    Jengibre fresco', 'Ingrediente Condimento', '144kcal'),
(51, '         Salsa soja', 'Ingrediente Salsa', '144kcal'),
(52, '       Curry molido', 'Ingrediente Condimento', '144kcal'),
(53, '      Ajo granulado', 'Ingrediente Condimento', '144kcal'),
(54, '     Cúrcuma molida', 'Ingrediente Condimento', '144kcal'),
(55, '               Lima', 'Ingrediente Fruta', '144kcal'),
(56, '     Perejil fresco', 'Ingrediente Condimento', '144kcal'),
(57, '           Cilantro', 'Ingrediente Condimento', '144kcal'),
(58, '   Pechuga de pollo', 'Ingrediente Carne', '144kcal'),
(59, '        Vino blanco', 'Ingrediente Bebida', '144kcal'),
(111, '            Maicena', 'Ingrediente Condimento', '144kcal'),
(112, '            Kétchup', 'Ingrediente Salsa', '144kcal'),
(113, '   Vinagre de arroz', 'Ingrediente Condimento', '144kcal'),
(114, '      Azúcar moreno', 'Ingrediente Condimento', '144kcal'),
(115, '          Solomillo', 'Ingrediente Carne', '144kcal'),
(116, '               Lomo', 'Ingrediente Carne', '144kcal'),
(117, '           Shiratak', 'Ingrediente Pasta', '144kcal'),
(118, '           Shungiku', 'Ingrediente Condimento', '144kcal'),
(119, '    Brotes de bambú', 'Ingrediente Vegetariano', '144kcal'),
(120, '               Café', 'Ingrediente Bebida', '144kcal'),
(121, '\'Caldo Japonés dashi', 'Ingrediente Bebida', '144kcal'),
(122, '      Miel de arroz', 'Ingrediente Condimento', '144kcal'),
(123, '       Arroz blanco', 'Ingrediente Pasta', '144kcal'),
(124, '            Caballa', 'Ingrediente Pescado', '144kcal'),
(125, '          Mugi miso', 'Ingrediente Vegano', '144kcal'),
(126, '     Miso de cebada', 'Ingrediente Vegano', '144kcal'),
(127, '         Shiro miso', 'Ingrediente Vegetariano', '144kcal'),
(128, '        Miso blanco', 'Ingrediente Vegetariano', '144kcal');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_recetas`
--

CREATE TABLE `menu_recetas` (
  `id` int(12) UNSIGNED NOT NULL,
  `menu_id` int(12) UNSIGNED NOT NULL,
  `receta_id` int(12) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'Bizcocho de yogur', 'El bizcocho, también conocido como bizcochuelo o queque, es uno de los dulces más tradicionales de nuestra gastronomía. La masa se prepara con ingredientes básicos que todos tenemos en casa: harina, huevos, aceite (u otras grasas), yogur y azúcar. También se pueden añadir otros ingredientes como frutos secos o chocolate o aromatizarlo con vainilla, coco, ralladura de limón...', 'P', 1, 5, 55, 5, 1, 1, 'bizcocho.jpg'),
(2, 'Tortilla de patata', 'Quizás la receta de la tortilla de patata sea una de las primeras que todo aspirante a cocinillas debería aprender a hacer y nos hemos propuesto que los que estén empezando en la cocina con nosotros, puedan preparar esta receta de tortilla de patatas con cebolla, con un sabor excepcional.\r\n\r\nPara ello, vamos a hacer esta tortilla de patatas con dos toques especiales ya que las patatas las vamos a cocinar partiendo de aceite en frío para conseguir un confitado que las haga más cremosas y la cebolla la vamos a caramelizar y añadir después a las patatas. Si preparáis la receta tal como la contamos a continuación, el éxito estará garantizado.', 'E', 2, 4, 30, 3, 1, 1, 'tortilla.jpg'),
(3, 'Lentejas con Chorizo', 'No a todo el mundo le gustan, como dice el refrán «El que quiera las coma y el que no las deja» pero creo que es importante educar a todos los niños/as desde pequeños para que les guste este guiso introduciéndolo en la dieta diaria. Aunque lleven su tiempo otro punto a favor es que puedes hacer una cazuela de ellas y congelarlas. Siempre y cuando no les añadas patata. Os presento esta receta que casi se hace sola, espero que os guste.', '1', 2, 6, 90, 3, 0, 1, 'lentejas.jpg'),
(4, 'Revuelto de verduras ', 'Una receta ligera que podemos preparar con verduras frescas de temporada o verduras congeladas. También puede ser una receta de aprovechamiento, cuando van quedando trozos de verduras antes de que se pongan malas, es mejor congelar y meter los trozos en una bolsa de congelado, así cuando nos apetezca una tortilla o un revuelto de verduras de diesta, las podemos utilizar. Queda un revuelto rico, jugoso y rápido de preparar.', 'E', 2, 4, 15, 3, 1, 1, 'revuelto-verduras.jpg'),
(5, 'Sukiyaki - Carne con verduras rehogadas', 'Plato tradicional japonés que se hace a partir de carne de vaca y verduras rehogadas. Verás que el sukiyaki es una preparación muy rica que suele considerarse como un plato tradicional en días de fiesta en Japón. A continuación te explicamos de forma detallada y muy completa cómo hacer esta receta.', '2', 5, 6, 150, 4, 1, 1, 'sukiyaki.jpg'),
(6, 'Huevos rotos con jamón y patatas', '¿Alguien ha dicho huevos rotos con jamón y chorizo? También conocidos como huevos estrellados, este típico plato de la gastronomía española es sabrosísimo y puede prepararse con diferentes ingredientes. En este caso, veremos una receta de huevos rotos con jamón y patatas y chorizo gallego ahumado así que ¡no te los puedes perder!', '2', 2, 3, 30, 4, 1, 1, 'huevos-rotos.jpg'),
(7, 'Arroz a la cubana', 'Según el diccionario de gastronomía, el arroz a la cubana es \"una preparación sencilla de arroz blanco cocido y huevos fritos. Los huevos se sirven colocados sobre montículos de arroz. Es habitual acompañarlo de salsa de tomate y, tradicionalmente, de plátano maduro frito en rebanadas y aguacate\".\r\n\r\nLa denominación del plato \"procede de la práctica cubana de mojar el arroz blanco con la salsa de los guisos, generalmente elaborados con salsa de tomate especiada\". Parece ser que, a pesar de su apellido, su origen no está en Cuba sino en Canarias, donde el uso del plátano autóctono se puso de moda.\r\n\r\nPara nosotros, este plato de toda la vida, siempre ha estado compuesto arroz, huevo frito, plátano canario y salsa de tomate. Desconocíamos lo del aguacate, pero nos parece maravilloso y lo sumaremos a partir de ahora. Hay quienes completan el conjunto con algo de carne: salchichas, cinta de lomo o picadillo de carne. Al gusto.', '2', 2, 1, 160, 3, 1, 1, 'arroz-cubana.jpg'),
(8, 'Fideos de arroz con salteado de tofu y pimiento', 'Los fideos de arroz dan un aire oriental a cualquier plato y creo que por eso combinan tan bien con el tofu. Su textura ligera es muy agradable en sopas, pero también se puede saltear con otros ingredientes. Recordad escurrir bien el tofu antes de usarlo en recetas como esta, y no os cortéis con las especias.\r\n\r\nMe atrevería a decir que todo el mundo tiene algún paquete de pasta siempre en la despensa. Si no la habéis probado, os recomiendo variar de vez en cuando con variedades de arroz, y seguro que los celíacos la conocen bien. Estos fideos de arroz con salteado de tofu y pimiento se preparan en un suspiro y es un plato vegano y sin gluten.', '1', 4, 2, 35, 3, 1, 1, 'fideos-arroz.jpeg'),
(9, 'Burritos Vegetarianos', 'La cocina mexicana se ha hecho un hueco en nuestro país y no es de extrañar. La gastronomía del país del otro lado del charco está repleta de sabores extraordinarios, de ingredientes frescos y de mucha sencillez en sus elaboraciones. Al menos en las más populares, que no las únicas, como es el caso de la receta de burritos vegetarianos.\r\n\r\nOs puedo garantizar que los burritos vegetarianos están tan repletos de sabor que, vegetarianos o no, los probaréis y querréis más. Son jugosos, de textura suave y ligeramente picantes, con un relleno de frijoles refritos y cebolla y pimientos salteados al chile que quita el sentido. No obstante, podéis adaptarlos a vuestros gustos porque son de lo más versátil.', '1', 2, 3, 60, 4, 5, 1, 'burritos-veg.jpg'),
(10, 'Pollo Agridulce', 'En esta ocasión, vamos a preparar un pollo agridulce chino. Pero no uno cualquiera. La receta original. En realidad es muy fácil de hacer. ¿Quién necesita ir a los restaurantes de comida china, pudiendo prepararlo en casa? Vamos a ver cómo hacer en casa este pollo agridulce chino siguiendo unos sencillos pasos que te muestro a continuación.', '2', 3, 2, 30, 2, 1, 1, 'pollo-agridulce-chino.jpg');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta_categorias`
--

CREATE TABLE `receta_categorias` (
  `id` int(12) UNSIGNED NOT NULL,
  `receta_id` int(12) UNSIGNED NOT NULL,
  `categoria_id` int(12) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 6, 10, 2, 'unidades', ''),
(2, 1, 10, 3, 'Unidades', '');

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
(26, 5, 1, 'Poner la carne en el congelador por unos 30 minutos o hasta que esté algo endurecida. Entonces, cortar lonchas muy finas de carne.'),
(27, 5, 2, 'Aparte, limpiar las cebolletas, dejando toda la parte del tallo que sea aprovechable. Cortaremos en cortes diagonales la parte bulbosa y los tallos con una longitud de unos 5 centímetros. Cocer el shiritaki en agua durante 1 minuto, escurrir y cortar por la mitad.'),
(32, 5, 3, 'Si usamos fideos hervirlos por 2 minutos y escurrir. Colocar todos los ingredientes en una fuente, aquí se tiene que notar la mano del artista en la colocación y en los cortes.'),
(33, 5, 4, 'Para hacer a salsa especial, en un cazo mezclaremos salsa de soya, mirin, caldo, glutamato y miel de arroz. Llevar a ebullición, ponerlo en una jarra para llevarlo a la mesa.'),
(34, 5, 5, 'Con todos los ingredientes en la mesa, se pone el Sukiyaki-nabe en el hornillo. Como lo más probable es que no dispongamos de este recipiente lo podemos sustituir por un recipiente similar o una sartén de fondo grueso.'),
(35, 5, 6, 'Una vez el recipiente en el hornillo lo dejamos calentar por varios minutos, éstos dependerán del grosor que tenga el recipiente utilizado. Untar el recipiente con el sebo de vaca o el aceite vegetal.\r\n\r\nPara oficiar el plato, ir poniendo los ingredientes en la sartén poco apoco; poner un poco de carne y dejar que se fría 1-2 minutos sin dar vueltas.'),
(36, 5, 7, 'Agregar las cebolletas y la cebolla, luego verter la mitad de la mezcla de salsa de soya sobre los ingredientes.'),
(37, 5, 8, 'Poner la mitad de los fideos, la cuajada de soja, verduras, brotes de bambú y champiñones y rehogarlo con los palillos máximo 4 minutos. Los huevos se rompen en cuencos individuales y se revuelven.\r\n\r\nSeguir añadiendo más ingredientes para rehogarlos como se ha hecho la primera vez, conforme se vayan terminando en el sukiyaki-nabe.'),
(38, 5, 9, 'El arroz servirlo en cuencos individuales. El plato admite otras combinaciones de verduras.'),
(39, 5, 10, 'Disolver el miso con vinagre de arroz hasta obtener una pasta fluida, añadirle la miel al gusto o si gusta más poner ralladura de jengibre.'),
(40, 5, 11, 'Poner el pescado en maceración al menos por una hora, en la mezcla anterior. Pasado el tiempo de adobo, sacar las rodajas y sacudir parte del adobo adherido.'),
(41, 5, 12, 'Con muy poco aceite en una sartén, saltear la caballa y añadir parte del adobo una cucharada por rodaja y tener un minuto más al fuego.'),
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
(52, 8, 1, 'Desechar el líquido del tofu y escurrir bien. Envolver en varias capas de papel de cocina y dejar como mínimo 15 minutos con un peso encima. Cortar en cubos del tamaño de un bocado. Calentar un poco de aceite en una sartén y dorar el tofu por todos lados. Retirar.'),
(53, 8, 2, 'Cocer los fideos de arroz en agua hirviendo con un poco de sal durante unos tres minutos, siguiendo las instrucciones del paquete. Escurrir y enjuagar con agua fría, soltándolos un poco con un tenedor. Reservar.'),
(54, 8, 3, 'Rallar o picar fino el jengibre. Cortar el pimiento en tiras finas. Saltear en la misma sartén a fuego alto ambos ingredientes durante dos minutos. Salpimentar, agregar la salsa de soja y las especias. Rehogar 5 minutos. Devolver el tofu, dar unas vueltas e incorporar los fideos. Mezclar todo bien hasta que se integren. Servir con perejil picado.'),
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
(70, 9, 2, 'Para el relleno de verduras, pelamos la cebolla y la cortamos en juliana gruesa. Lavamos los pimientos, retiramos el pedúnculo y las semillas, cortamos por la mitad y retiramos los filamentos blancos del interior. Cortamos en juliana gruesa, de igual tamaño que la cebolla. En una sartén, calentamos tres cucharadas de aceite de oliva suave y salteamos las verduras a fuego medio-alto. Condimentamos, removemos y retiramos del fuego.\r\n\r\nLimpiamos la sartén con papel absorbente y la volvemos a colocar al fuego para calentar ligeramente las tortillas de trigo. No queremos dorarlas, sólo templarlas para que se vuelvan más maleables, por lo que con 30 segundos tendremos suficiente.\r\n\r\nExtendemos una capa de frijoles refritos en cada tortilla y, sobre estos, las verduras salteadas. Cerramos las tortillas, doblando dos extremos opuestos y a continuación, doblando los otros dos lados sobre estos, a modo de sobre. Tostamos ligeramente por ambos lados, en la sartén y los servimos inmediatamente.');

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
(1, 'Alimerka', 'Dr. Fleming, 1', 'Zamora', 'Zamora', 11, 1, 1),
(2, 'Carrefour Express', 'Ctra. Pueblica, 3', 'Tábara', 'Zamora', 7, 1, 0),
(5, 'Froiz', 'C. Argentina, 13', 'Zamora', 'Zamora', 4, 1, 1),
(6, 'Gadis', 'Av. de Portugal, 12', 'Zamora', 'Zamora', 5, 1, 1),
(7, 'Lupa', 'P.º de Canalejas, 138', 'Salamanca', 'Salamanca', 6, 1, 1),
(8, 'Carrefour Express', 'C. María Auxiliadora, 23', 'Salamanca', 'Salamanca', 7, 1, 1),
(9, 'Mercadona', 'Calle Ctra. de Salamanca, 7', 'Bejar', 'Salamanca', 8, 1, 1),
(10, 'Dia', 'C. Padre Vicente Salgado, 1', 'Puebla de Sanabria', 'Zamora', 9, 1, 1);

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
(1, 1, 1, 'Oferta 3x2', 'Botella', 3, 'Lt', '2€'),
(2, 2, 10, 'Oferta 2x1', 'Docena', 1, 'Docena', '1.25€'),
(3, 2, 22, 'Oferta 3+1', 'Malla', 4, 'Kg', '3€'),
(4, 1, 16, 'Oferta 2+1', 'Malla', 3, 'Kg', '2€'),
(5, 2, 21, 'Oferta 2x1', 'Malla', 1, 'unidad', '0.50€'),
(6, 2, 18, '50% descuento', 'Envase Plástico', 200, 'g', '1.25€');

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
(1, 'prueba@mail.com', '711383a59fda05336fd2ccf70c8059d1523eb41a', 'prueba', 'C', 1, '2022-01-02 16:05:26'),
(4, 'froiz@mail.com', '03c18fee4ea554de4077575d363a4f84ad20c90f', 'Froiz', 'T', 1, '2022-01-05 19:42:11'),
(5, 'gadis@mail.com', '673d1de760f5b66914b38ebb2c79a4b181b01209', 'Gadis', 'T', 1, '2022-01-05 19:42:35'),
(6, 'lupa@mail.com', '900bac9f13ceef619b0b3779b0ac185caaf9bdb3', 'Lupa', 'T', 1, '2022-01-05 19:42:58'),
(7, 'carrefour@mail.com', '743a8f254cbfe5fd29dfb3468d7e516b27af468e', 'Carrefour', 'T', 1, '2022-01-05 19:43:27'),
(8, 'mercadona@hola.com', '50f0f0b11f06f81d6a2294aa82cf70a8bd5590f5', 'Mercadona', 'T', 1, '2022-01-05 19:43:46'),
(9, 'dia@hola.com', '4967e07bc327c714541206122152ddfcfdb5b27c', 'Dia', 'T', 1, '2022-01-05 19:44:02'),
(11, 'alimerka@hola.com', '0084d73878ed316b0973510036ef5b4c17bf161a', 'Alimerka', 'T', 1, '2022-01-05 19:49:06');

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
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `menu_recetas`
--
ALTER TABLE `menu_recetas`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `planificaciones`
--
ALTER TABLE `planificaciones`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `planificacion_menus`
--
ALTER TABLE `planificacion_menus`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `receta_categorias`
--
ALTER TABLE `receta_categorias`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `receta_comentarios`
--
ALTER TABLE `receta_comentarios`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `receta_ingredientes`
--
ALTER TABLE `receta_ingredientes`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `receta_pasos`
--
ALTER TABLE `receta_pasos`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `receta_paso_imagenes`
--
ALTER TABLE `receta_paso_imagenes`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tienda_ofertas`
--
ALTER TABLE `tienda_ofertas`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
