-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-01-2022 a las 16:40:21
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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `receta_pasos`
--
ALTER TABLE `receta_pasos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `receta_pasos`
--
ALTER TABLE `receta_pasos`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
