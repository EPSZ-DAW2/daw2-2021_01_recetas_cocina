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
(72, 11, 2, '\r\nRehogamos todo hasta que la cebolla coja color marroncito, así la salsa tendrá más sabor. Añadimos el tomate troceado y dejamos a fuego lento, removiendo de vez en cuando, durante una hora.'),
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
