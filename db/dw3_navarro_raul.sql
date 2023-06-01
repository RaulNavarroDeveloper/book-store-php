-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-08-2022 a las 23:53:15
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dw3_navarro_raul`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `carrito_id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(20) NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`carrito_id`, `usuario_id`, `status`, `fecha_creacion`) VALUES
(29, 6, '0', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_items`
--

CREATE TABLE `carrito_items` (
  `idcarrito_items` int(10) UNSIGNED NOT NULL,
  `carrito_id` int(10) UNSIGNED NOT NULL,
  `producto_id` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento` decimal(6,2) NOT NULL,
  `precio` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrito_items`
--

INSERT INTO `carrito_items` (`idcarrito_items`, `carrito_id`, `producto_id`, `cantidad`, `descuento`, `precio`) VALUES
(42, 29, 2, 6, '240.00', '2160.00'),
(43, 29, 3, 2, '140.00', '1260.00'),
(44, 29, 21, 1, '70.00', '630.00'),
(45, 29, 6, 1, '195.00', '1755.00'),
(46, 29, 23, 3, '90.00', '810.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` tinyint(3) UNSIGNED NOT NULL,
  `categoria_nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `categoria_nombre`) VALUES
(1, 'Economia y Finanzas'),
(2, 'Desarrollo Personal'),
(3, 'Tecnología e Informática'),
(4, 'Espiritualidad'),
(5, 'Ficción');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `producto_id` int(10) UNSIGNED NOT NULL,
  `categoria_id_fk` tinyint(3) UNSIGNED NOT NULL,
  `usuario_id_fk` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `autor` varchar(60) NOT NULL,
  `oferta` decimal(6,2) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `imagen` varchar(255) DEFAULT 'null',
  `imagen_preview` varchar(255) DEFAULT 'null',
  `imagen_alt` varchar(60) NOT NULL,
  `calificacion` decimal(3,1) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`producto_id`, `categoria_id_fk`, `usuario_id_fk`, `nombre`, `autor`, `oferta`, `precio`, `imagen`, `imagen_preview`, `imagen_alt`, `calificacion`, `descripcion`) VALUES
(1, 1, 1, 'Padre Rico, Padre Pobre', 'Robert Kiyosaki', '1440.00', '1600.00', 'padre-rico-padre-pobre.jpg', 'padre-rico-padre-pobre-preview.jpg', 'Portada del libro \"Padre Rico Padre Pobre\"', '9.5', 'Padre Rico, Padre Pobre lo ayudará a... *Derribar el mito de que usted necesita tener un ingreso elevado para hacerse rico. *Desafiar la creencia de que su casa es una inversión. *Mostrar a los padres por qué no confiar en el sistema escolar para la enseñanza de sus hijos acerca del dinero. *Definir de una vez y para siempre qué es una inversión, y qué es una obligación. *Mostrar qué enseñar a los hijos acerca del dinero para su futuro éxito financiero. Robert Kiyosaki transformó radicalmente la forma en que millones de personas perciben el concepto del dinero. Con perspectivas que c ontradicen el conocimiento convencional, Robert se ha ganado una gran reputación por hablar claro, ser irreverente y tener valor. Es reconocido alrededor del mundo como un defensor apasionado de la educación financiera. «La razón principal por la cual las personas luchan financieramente es porque han pasado años en los colegios, pero no aprendieron nada acerca del dinero. El resultado es que aprenden a trabajar por el dinero... pero nunca aprenden a tener dinero trabajando para ellos.» Robert Kiyosaki La crítica ha dicho... «Padre Rico, Padre Pobre es el punto de partida para quien quiera tomar el control de su futuro financiero.» USA TODAY'),
(2, 1, 1, 'Código del Dinero', 'Raimon Samsó', '2160.00', '2400.00', 'codigo-del-dinero.jpg', 'codigo-del-dinero-preview.jpg', 'Portada del libro ', '8.8', 'El Código del Dinero® contiene todo lo que necesitas saber para conquistar tu libertad financiera: *LO QUE NADIE TE ENSEÑÓ SOBRE EL DINERO *INTELIGENCIA FINANCIERA APLICADA *CÓMO SUPERAR LOS TIEMPOS DE CRISIS *¿INVERTIR O APOSTAR? *EL VOCABULARIO DE LA RIQUEZA *CÓMO CONVERTIR TU TALENTO EN INGRESOS *LAS 10 HABILIDADES IMPRESCINDIBLES DEL EMPRENDEDOR *LA DEUDA ÓPTIMA Y LA PÉSIMA *LA NOVENA MARAVILLA DEL MUNDO: LOS INGRESOS PASIVOS *LA GESTIÓN RENTABLE DE TU TIEMPO *EMPIEZA EN PEQUEÑO, PIENSA EN GRANDE El Código del Dinero® te revelará lo que nunca te han enseñado en la escuela, en la universidad o en casa sobre el dinero: estar al mando de tu economía, hacerla prosperar y ser libre. Un libro muy oportuno en estos momentos de incertidumbre económica y precariedad. Un manual ameno, riguroso y práctico que más allá de los utilísimos consejos prácticos para sacar mayor partido de nuestros ahorros, nos muestra cómo el desapego y la libertad aportan abundancia y prosperidad de forma natural. Raimon es un maestro en este sentido.'),
(3, 1, 3, 'El Hombre más Rico de Babilonia', 'George S. Clason', '1260.00', '1400.00', 'el-hombre-mas-rico-de-babilonia.jpg', 'el-hombre-mas-rico-de-babilonia-preview.jpg', 'Portada del libro \"El hombre más rico de Babilonia\"', '9.2', '¿Quiere lograr el máximo rendimiento para su dinero? Este pequeño manual pone a su alcance un método que ya ha demostrado su eficacia en el mundo de las grandes inversiones, un mercado que puede resultar misterioso a simple vista pero cuyo balance es siempre positivo para los que saben aprovechar la ocasión.Otras característicasLa fórmula de Joel Greenblatt será su guía a la hora de invertir de manera sencilla y con un amplio margen de seguridad: usted mismo, sin necesidad de complicados análisis financieros, será capaz de escoger aquellas empresas cuyas acciones posean un mayor potencial, y también conocerá de antemano cuál es el momento idóneo para realizar cada adquisición.'),
(4, 1, 1, 'La Riqueza de las Naciones', 'Adam Smith', '3420.00', '3800.00', 'la-riqueza-de-las-naciones.jpg', 'la-riqueza-de-las-naciones-preview.jpg', 'Portada del libro \"La Riqueza de las Naciones\"', '7.8', 'Uno de los mayores exponentes de la economía clásica es, sin duda, Adam Smith (1723-1790), economista y filósofo escocés, quien obtuvo el título de fundador de la economía tras la redacción de La riqueza de la naciones (1776). Este libro es, esencialmente, un estudio sobre la creación y acumulación de la riqueza, tema nunca antes tratado con el carácter científico que propone Smith. La edición que el lector tiene entre manos es una versión adaptada al castellano actual del compendio del marqués de Condorcet realizado en 1803. '),
(5, 1, 2, 'Hablemos de Guita', 'Ramiro Marra', '1395.00', '1550.00', 'hablemos-de-guita.jpg', 'hablemos-de-guita-preview.jpg', 'Portada del libro \"Hablemos de Guita\"', '7.2', 'Ramiro Marra irrumpió en las redes sociales compartiendo su visión y su estrategia financiera. Pronto su estilo audaz y descontracturado hizo que miles de personas se convirtieran en sus seguidores y se animaran a invertir en Bolsa y generar dinero gracias a sus consejos. Empresario, director de una sociedad de Bolsa y ya un referente indiscutido de finanzas tanto en YouTube como en los principales medios del país, Ramiro ahora te cuenta todos sus secretos en este libro. ¿Querés ahorrar, invertir y ganar (mucha) plata en este país tan complicado? Paso a paso, con su estilo directo y divertido, este youtuber financiero te habla de guita y te enseña cómo y dónde invertirla de manera inteligente, para disfrutar tu presente y planear tu economía a futuro.'),
(6, 2, 3, 'Inteligencia Emocional', 'Daniel Goleman', '1755.00', '1950.00', 'inteligencia-emocional.jpg', 'inteligencia-emocional-preview.jpg', 'Portada del libro \"Inteligencia Emocional\"', '8.7', 'La inteligencia emocional constituye un verdadero fenómeno editorial que no solamente revolucionó el concepto de inteligencia, sino que agregó una nueva expresión a nuestro vocabulario cotidiano y cambió el modo en que percibimos la excelencia personal. ¿Por qué algunas personas parecen dotadas de un don especial que les permite vivir bien aunque no sean las que más se destacan por su inteligencia? ¿Por qué no siempre el alumno más inteligente termina siendo el adulto que mayor éxito tiene en el trabajo? ¿Por qué algunos son más capaces que otros de enfrentar contratiempos, superar obstáculos y ver las dificultades bajo una óptica distinta? Un nuevo concepto viene a darnos la respuesta a estos interrogantes. Es la inteligencia emocional la que nos permite tomar conciencia de nuestras emociones, comprender los sentimientos de los demás, tolerar las presiones y frustraciones que soportamos en el trabajo, incrementar nuestra capacidad de empatia y nuestras habilidades sociales y aumentar nuestras posibilidades de desarrollo social. La buena noticia es que la inteligencia emocional se puede aprender. La revolucionaria obra de Goleman presenta ideas prácticas que resultarán útiles a todos los lectores, en especial a padres y maestros. Las innovadoras estrategias que plantea ayudarán a erradicar la violencia y otros rasgos negativos que son la causa de muchos de los males que aquejan a nuestra familia y nuestra sociedad.'),
(7, 2, 1, 'Hábitos Atómicos', 'James Clear', '2250.00', '2500.00', 'habitos-atomicos.jpg', 'habitos-atomicos-preview.jpg', 'Portada del libro \"Hábitos Atómicos\"', '9.9', 'Hábitos atómicos parte de una simple pero poderosa pregunta: ¿Cómo podemos vivir mejor? Sabemos que unos buenos hábitos nos permiten mejorar significativamente nuestra vida, pero con frecuencia nos desviamos del camino: dejamos de hacer ejercicio, comemos mal, dormimos poco, despilfarramos. ¿Por qué es tan fácil caer en los malos hábitos y tan complicado seguir los buenos? James Clear nos brinda fantásticas ideas basadas en investigaciones científicas, que le permiten revelarnos cómo podemos transformar pequeños hábitos cotidianos para cambiar nuestra vida y mejorarla. Esta guía pone al descubierto las fuerzas ocultas que moldean nuestro comportamiento —desde nuestra mentalidad, pasando por el ambiente y hasta la genética— y nos demuestra cómo aplicar cada cambio a nuestra vida y a nuestro trabajo.'),
(8, 2, 2, 'Mentores', 'Tim Ferris', '1980.00', '2200.00', 'mentores.jpg', 'mentores-preview.jpg', 'Portada del libro \" Mentores\"', '9.9', '“¿Cuáles son mis propias motivaciones y objetivos? ¿Puedo lograrlos con los recursos que tengo disponibles? ¿De qué manera puedo establecer prioridades y conseguir resultados? ¿Cuál es el verdadero sentido y propósito de mi vida?”. Estas fueron algunas de las preguntas que se hizo Tim Ferriss antes de reunirse con quienes él considera sus mentores e ídolos de juventud, personalidades diversas y de múltiples ocupaciones a quienes él ve como referentes de esfuerzo, dedicación, metas cumplidas y disciplina. Luego del éxito de sus podcasts y de sus libros Titanes. Tácticas, rutinas y hábitos de multimillonarios, estrellas y artistas famosos y La semana laboral de 4 horas, ofrece a sus lectores una guía para la vida que incluye consejos, modelos, anécdotas y curiosidades de personajes muy disímiles con un único objetivo: dar herramientas para que cada quien ordene su vida como mejor le convenga sin perder el foco y la mira en sus objetivos para ser feliz y exitoso. Sin importar cuáles sean nuestras dudas, miedos, obstáculos, edad u origen, alguien más ya ha pasado por situaciones similares, las ha resuelto de manera efectiva y ha alcanzado resultados sorprendentes. Con un estilo espontáneo y ágil, este libro puede leerse en cualquier orden y en pequeñas dosis diarias para sacar de sus páginas lecciones y consejos de oro de los mejores.'),
(9, 2, 3, 'Ikigai', 'Hector García', '1620.00', '1800.00', 'ikigai.jpg', 'ikigai-preview.jpg', 'Portada del libro \"Ikigai\"', '9.4', 'Según los japoneses, todo el mundo tiene un ikigai, un motivo para existir. Algunos lo han encontrado y son conscientes de su ikigai, otros lo llevan dentro, pero todavía lo están buscando. Este es uno de los secretos para una vida larga, joven y feliz como la que llevan los habitantes de Okinawa, la isla más longeva del mundo. El proyecto de este libro surgió uniendo la experiencia en cultura japonesa de Héctor García, que lleva doce años viviendo en Japón, con el arte de Francesc Miralles. Para escribir la obra, los dos autores fueron recibidos por el alcalde de Ogimi (Okinawa), una localidad del norte de Japón con el mayor índice de longevidad del mundo, y tuvieron acceso a entrevistar a más de un centenar de sus habitantes. Analizaron las claves de los centenarios japoneses para una existencia optimista y vital, descubriendo cómo se alimentan, cómo se mueven, cómo trabajan, cómo se relacionan con los demás y -el secreto mejor guardado- cómo encuentran el ikigai que da sentido a su existencia y les impulsa a vivir cien años en plena forma. Tener un ikigai claro y definido, una gran pasión, es algo que da satisfacción, felicidad y significado a la vida. La misión de este libro es ayudarte a encontrarlo, además de descubrir muchas claves de la filosofía japonesa para una larga salud del cuerpo, la mente y el espíritu.'),
(10, 2, 1, 'Inquebrantables', 'Daniel Habif', '2160.00', '2400.00', 'inquebrantables.jpg', 'inquebrantables-preview.jpg', 'Portada del libro \"Inquebrantables\"', '8.5', 'Inquebrantables reúne y expande los mensajes de inspiración que mayor impacto han tenido y que mejor representan a Daniel Habif como orador motivacional, e inspiran al lector a mirar más allá de sus circunstancias actuales para crear la vida que desean vivir. Este es un libro que no acepta resúmenes. No forma parte de los títulos que tachas y vas a otra cosa. No es un trofeo, ni un manual de procedimientos. No es una tesis, ni un texto académico. Si tu intención es pasar por él sin dejar que él lo haga por ti, no servirá de nada. El dinero lo podrás recuperar, pero te advierto que el tiempo se habrá ido para siempre. Su belleza no está en las palabras que yo escribí, sino en las que tú generes con él. Está compuesto de mil pedazos míos, trozos sueltos de mi alma y de mi carne: un alcázar edificado con todas las piedras que me han lanzado, una diadema confeccionada con las perlas que he recibido. Hallarás soledades y alegrías, anhelos y zozobras, inquietudes y esperanzas, clamores y murmullos. No fue fácil desprenderme de ellos. '),
(11, 3, 4, 'Minimalismo Digital', 'Cal Newport', '2025.00', '2250.00', 'minimalismo-digital.jpg', 'minimalismo-digital-preview.jpg', 'Portada del libro \"Minimalismo Digital\"', '9.4', 'Los minimalistas digitales ya están entre nosotros. Son personas relajadas que pueden tener largas conversaciones, perderse en un buen libro, hacer manualidades o salir a correr sin que su mirada se escape constantemente hacia su teléfono móvil. Utilizando el sentido común y adoptando técnicas sutiles, Cal Newport nos enseñará cuándo usar la tecnología y cuándo prescindir de ella para disfrutar plenamente del mundo offline y reconectar con nosotros mismos. La tecnología no es mala o buena en sí misma, la clave está en usarla de acuerdo con nuestros valores y necesidades.'),
(12, 3, 4, 'Patrón Bitcoin', 'Saifedean Ammous', '2925.00', '3250.00', 'patron-bitcoin.jpg', 'patron-bitcoin-preview.jpg', 'Portada del libro \"Patrón Bitcoin\"', '9.2', 'Pasado, presente y futuro del dinero: de las piedras al Bitcoin La crisis financiera ha dejado un poso general de desconfianza en la sociedad. Todo lo que tiene que ver con el mundo financiero es visto con un recelo no siempre justificado y, en este caldo de cultivo, han nacido las llamadas criptomonedas. Partiendo de esta premisa, el profesor y economista Saifedean Ammous explica, con afán pedagógico, la historia del dinero y expone por qué el futuro pertenece al Bitcoin, entre otras criptomonedas. Si los males del sistema financiero y monetario tienen que ver con la inestabilidad, la fragilidad o la creación de burbujas de activos, las criptomonedas, lejos de agravar estas críticas generalizadas, pueden ayudar a mitigarlas. Frente al intervencionismo, el Bitcoin, gracias a la tecnología blockchain que lo sustenta, ofrece un servicio de pago confiable, seguro, llamado a plantar cara al monopolio monetario de los bancos centrales. Desde las piedras preciosas hasta las monedas de curso corriente, pasando por el patrón oro y las burbujas de expansión crediticia, la historia del dinero es la de crisis y rupturas que buscan ser superadas, y este libro argumenta por qué podemos creer que el Bitcoin puede llegar a ser la solución a este problema histórico. Una lectura fascinante. Del prólogo de Nassim Nicholas Taleb, autor de El cisne negro '),
(13, 3, 4, 'Vida 3.0', 'Max Tegmark', '2115.00', '2350.00', 'vida-3.0.jpg', 'vida-3.0-preview.jpg', 'Portada del libro \"Vida 3.0\"', '9.6', 'Bienvenidos a la conversación más importante de nuestro tiempo. ¿Cómo afectará la inteligencia artificial al crimen, a la guerra, a la justicia, al trabajo, a la sociedad y al sentido de nuestras vidas? ¿Es posible que las máquinas nos dejen fuera de juego, remplazando a los humanos en el mercado laboral e incluso en otros ámbitos? ¿La inteligencia artificial proveerá mejoras sin precedente a nuestras vidas o nos dará más poder del que podemos manejar? Muchas de las cuestiones más fundamentales de la actualidad están íntimamente relacionadas con el aumento de la inteligencia artificial. Max Tegmark no se asusta ante la gama completa de puntos de vista o ante los temas más controvertidos, desde la superinteligencia hasta el significado, la conciencia y los límites físicos últimos de la vida en el cosmos. En Vida 3.0, clarifica los conceptos clave necesarios para hablar de inteligencia artificial al tiempo que ayuda a entender la importancia de las cuestiones clave, aquellas que la humanidad tendrá que abordar en las próximas décadas.'),
(14, 3, 5, '!Sálvese quien pueda!', 'Andres Oppenheimer', '2430.00', '2700.00', 'salvese-quien-pueda.jpg', 'salvese-quien-pueda-preview.jpg', 'Portada del libro \"!Sálvese quien pueda!\"', '9.2', '47% de los empleos será reemplazado por robots o computadoras inteligentes. ¿Quién está preparado? Con una prosa vibrante y lúcida, Andrés Oppenheimer encara un fenómeno que transformará radicalmente la sociedad: es probable que, en las próximas dos décadas, casi la mitad de los trabajos sea reemplazada por computadoras con inteligencia artificial. Abogados, contadores, médicos, comunicadores, vendedores, banqueros, maestros, obreros, comerciantes, analistas, choferes, camareros, trabajadores y estudiantes... tiemblen o prepárense. En su nueva obra, Oppenheimer -uno de los periodistas más importantes de Hispanoamérica, coganador del premio Pulitzer- detalla qué y cómo ocurrirá, a qué ritmo, y qué países sufrirán más el golpe. Y tal vez lo más importante: gracias a su investigación, realizada en tres continentes, logra explicar qué puede hacer cada uno de nosotros ante el terremoto que se avecina y da la lista de los trabajos que sí tienen futuro.'),
(15, 3, 5, 'Mastering Ethereum', 'Andrea Antonopoulos', '3240.00', '3600.00', 'mastering-ethereum.jpg', 'mastering-ethereum-preview.jpg', 'Portada del libro \"Mastering Ethereum\"', '9.9', 'Ethereum representa la puerta de entrada a un paradigma informático mundial y descentralizado. Esta plataforma le permite ejecutar aplicaciones descentralizadas (DApps) y contratos inteligentes que no tienen puntos centrales de falla o control, integrarse con una red de pago y operar en una cadena de bloques abierta. Con esta guía práctica, Andreas M. Antonopoulos y Gavin Wood brindan todo lo que necesita saber sobre la creación de contratos inteligentes y DApps en Ethereum y otras cadenas de bloques de máquinas virtuales. Descubra por qué IBM, Microsoft, NASDAQ y cientos de otras organizaciones están experimentando con Ethereum. Esta guía esencial le muestra cómo desarrollar las habilidades necesarias para ser un innovador en esta nueva industria creciente y emocionante. Ejecute un cliente Ethereum, cree y transmita transacciones básicas y programe contratos inteligentes Aprenda los aspectos básicos de la criptografía de clave pública,'),
(16, 4, 5, 'La Voz de tu Alma', 'Lain Garcia Calvo', '1620.00', '1800.00', 'la-voz-de-tu-alma.jpg', 'la-voz-de-tu-alma-preview.jpg', 'Portada del libro \"La Voz de tu Alma\"', '9.8', 'Laín es ex-deportista de élite, autor, conferenciante y coach. Después de una carrera exitosa en el deporte, sentía un pequeño vacío. Una noche, soñó con el libro LA VOZ DE TU ALMA. Se despertó con el título, la Portada y el cont \'enido en la cabeza. Ese mismo día, dejó todo lo que tenía que hacer y empezó a escribir el libro que hoy tienes en tus manos. Un año después, LA VOZ DE TU ALMA se expandía a miles y miles de personas ayudando a todas ellas a crecer en la abundancia, conociendo la verdad que tanto tiempo estuvo oculta. El mensaje de Laín es claro: Encuentra tu PROPÓSITO DE VIDA y ponlo al servicio de la humanidad. Vinimos aquí para ayudar a los demás, pero para ello, primero debemos ayudarnos a nosotros mismos. Hazte GRANDE, ensánchate, atrévete a BRILLAR; y cuando estés arriba, ayuda a tus hermanos humanos a subir. Este es un libro diseñado específicamente para ayudarte a crecer, a hacerte más grande, a crear abundancia en todos los sentidos, para que después ayudes a los demás a hacer lo mismo.'),
(17, 4, 6, 'El Alquimista', 'Paulo Coelho', '1845.00', '2050.00', 'el-alquimista.jpg', 'el-alquimista-preview.jpg', 'Portada del libro \"El Alquimista\"', '9.7', 'El Alquimista ha encontrado devotos seguidores en todo el mundo. Publicada en más de 170 países, es una de las novelas más traducidas del mundo (83 lenguas) y ha convertido a Paulo Coelho en uno de los autores más leídos de la historia. Poderosa, sencilla, sabia e inspiradora, ésta es la historia de Santiago, un joven pastor andaluz que viaja desde su tierra natal hacia el desierto egipcio en busca de un tesoro oculto en las pirámides. Nadie sabe lo que contiene el tesoro, ni si Santiago será capaz de superar los obstáculos del camino. Pero lo que comienza como un viaje en busca de riquezas se convierte en un descubrimiento del tesoro interior.'),
(18, 4, 1, 'El Monje que Vendio su Ferrari', 'Robin Sharma Robin Sharma Robin Sharma Robin Sharma Robin Sh', '1530.00', '1700.00', 'el-monje-que-vendio-su-ferrari.jpg', 'el-monje-que-vendio-su-ferrari-preview.jpg', 'Portada del libro \"El monje que vendió su Ferrari\"', '8.9', 'El monje que vendió su Ferrari es la sugerente y emotiva historia de Julian Mantle, un superabogado cuya vida estresante, desequilibrada y obsesionada con el dinero acaba provocándole un infarto. Ese desastre provoca en Julian una crisis espiritual que lo lleva a enfrentarse a las grandes cuestiones de la vida. Esperando descubrir los secretos de la felicidad y el esclarecimiento, emprende un extraordinario viaje por el Himalaya para conocer una antiquísima cultura de hombres sabios. Y allí descubre un modo de vida más gozoso, así como un método que le permite liberar todo su potencial y vivir con pasión, determinación y paz. Escrito a modo de fábula, este libro contiene una serie de sencillas y eficaces lecciones para mejorar nuestra manera de vivir. Vigorosa fusión de la sabiduría espiritual de Oriente con los principios del éxito occidentales, muestra paso a paso cómo vivir con más coraje, alegría, equilibrio y satisfacción.'),
(19, 4, 4, 'El Poder del Ahora', 'Eckhart Tolle', '1800.00', '2000.00', 'el-poder-del-ahora.jpg', 'el-poder-del-ahora-preview.jpg', 'Portada del libro \"El Poder del Ahora\"', '8.2', 'El poder del ahora es un libro único. Tiene la capacidad de crear una experiencia en los lectores y de cambiar su vida. Hoy ya es considerado una obra maestra. Su autor, Eckhart Tolle, se convirtió en un maestro universal, un gran espíritu con un gran mensaje: se puede alcanzar un estado de iluminación aquí y ahora. Es posible vivir libre del sufrimiento, libre de la ansiedad y la neurosis. Para lograrlo sólo tenemos que comprender nuestro papel de creadores de nuestro dolor. Es nuestra propia mente la que causa nuestros problemas con su corriente constante de pensamientos, aferrándose al pasado, preocupándose por el futuro. Cometemos el error de identificarnos con ella, de pensar que eso es lo que somos, cuando de hecho somos seres mucho más grandes. Escrito en un formato de preguntas y respuestas que lo hace muy accesible, El poder del ahora es una invitación a la reflexión, que le abrirá las puertas a la plenitud espiritual y le permitirá ver la vida con nuevos ojos y empezar a disfrutar del verdadero poder del ahora. Este libro puede verse como una nueva exposición para nuestro tiempo de la enseñanza espiritual atemporal que es la esencia de todas las religiones. No se deriva de fuentes externas, sino del interior de la verdadera Fuente, así que no contiene ni teoría ni especulación. Hablo desde mi experiencia interna, y si a veces soy fuerte en lo que digo, es para poder cortar las gruesas capas de resistencia mental y así llegar al lugar en su interior donde usted sabe de verdad, así como sé yo, y donde la verdad se reconoce tan pronto se escucha. Entonces allí hay una sensación de exaltación y vida intensa, como si algo dentro de usted dijera: \"Sí, sé que esto es cierto\". Eckhart Tolle'),
(20, 4, 7, 'Piensa como un monje', 'Jay Shetty', '2790.00', '3100.00', 'piensa-como-un-monje.jpg', 'piensa-como-un-monje-preview.jpg', 'Portada del libro \"Piensa como un monje\"', '9.5', 'Jay Shetty, la superestrella de las redes sociales y presentador del podcast nº 1 On Purpose, destila en este libro la sabiduría eterna que aprendió como monje y la expone con pasos prácticos que cualquiera puede aplicar para gozar de una vida más tranquila. Después de tres años en la India para convertirse en monje, meditar todos los días entre cuatro y ocho horas y dedicar su vida a ayudar a los demás, regresó a Londres, y entreno a sus estresado​​s amigos en bienestar, propósito y atención plena . Desde entonces, Shetty se ha convertido en uno de los líderes de pensamiento más populares del mundo.En este libro inspirador y empoderador, Shetty se basa en su experiencia y conocimientos como monje para mostrarnos cómo despejar los obstáculos y llegar a nuestro potencial y poder y revela cómo superar los pensamientos y hábitos negativos, y acceder a la calma y al propósito que se encuentra en nuestro interior. Transforma lecciones abstractas en consejos y ejercicios que todos podemos aplicar para reducir el estrés y mejorar las relaciones.'),
(21, 5, 6, 'Las Aventuras de Tom Sawyer', 'Mark Twain', '630.00', '700.00', 'las-aventuras-de-tom-sawyer.jpg', 'las-aventuras-de-tom-sawyer-preview.jpg', 'Portada del libro \"Las Aventuras de Tom Sawyer\"', '7.5', 'Mark Twain (1835-1910) alcanzó la popularidad, ya en su época, gracias a sus ingeniosas y a menudo satíricas observaciones sobre su entorno. Las aventuras de Tom Sawyer es, quizás, su obra más famosa. Evocación de la infancia del propio autor a orillas del Misisipi, esta novela ofrece uno de los retratos más bellos jamás escritos del mundo de ilusiones y rebeldía que precede a la edad adulta. Las ilustraciones han sido creadas expresamente para esta edición. '),
(22, 5, 6, 'Lo que el Viento se LLevó', 'Margaret Mitchell', '1530.00', '1700.00', 'lo-que-el-viento-se-llevo.jpg', 'lo-que-el-viento-se-llevo-preview.jpg', 'Portada del libro \"Lo que el Viento se LLevó\"', '8.4', 'Lo que el viento se llevó fue publicada en 1936; la escritora ganó el premio de Pulitzer en 1937. El libro relata la historia de una mujer rebelde de Georgia llamada Scarlett OHara, y sus relaciones con los amigos, familia y amores en medio de la rebelión del sur, la guerra civil americana, y el período de la reconstrucción. Fue llevada al cine exitosamente en 1939 y protagonizada por Vivien Leigh y Clark Gable. Esta película se llevó trece nominaciones al Oscar, de las cuales ganó nueve.'),
(23, 5, 7, 'El Retrato de Dorian Gray', 'Oscar Wilde', '810.00', '900.00', 'el-retrato-de-dorian-gray.jpg', 'el-retrato-de-dorian-gray-preview.jpg', 'Portada del libro \"El Retrato de Dorian Gray\"', '6.7', 'En su única novela, el divino Oscar Wilde puso al día el mito de Fausto. En este caso, la víctima es Dorian Gray, un bello y joven presuntuoso a quien un amigo hace un retrato al óleo. Cuando Dorian trabe amistad con lord Henry Wotton, un cínico filósofo, éste le convencerá de que sus más valiosas posesiones son su belleza y su juventud. Y a partir de ahí, su deseo de que su retrato envejezca mientras él permanezca joven se hace realidad. Estamos, simple y llanamente, ante uno de los libros más bellos e ingeniosos de todos los tiempos.'),
(24, 5, 7, 'El Hechizo del Agua', 'Florencia Bonelli', '2160.00', '2400.00', 'el-hechizo-del-agua.jpg', 'el-hechizo-del-agua-preview.jpg', 'Portada del libro \"El Hechizo del Agua\"', '7.1', 'Brenda Gomez tiene una vida perfecta. Es una alumna destacada en la carrera de Ciencias Económicas, su novio es un joven ambicioso y con un gran futuro, sus amigas son leales, su familia la adora. Pero ella no es feliz. La domina un mundo interior complejo, plagado de sentimientos e ideas que oculta, porque la averguenzan y la alejan del modelo que se impone seguir. De los secretos que esconde, uno la atormenta especialmente: ama a Diego Bertoni desde que tiene memoria; un amor extraño por varias razones, pero sobre todo un amor prohibido. Quien soy yo en realidad? es la pregunta que Brenda jamás se formuló, y es, sin embargo, la que posee la llave para resolver los misterios que la definen, para acabar con la hipocresía que la condena a la infelicidad. Reunirá el coraje para mirar en su interior y amar lo que realmente es? Reunirá el valor para aceptar su amor por Diego y luchar por él?.'),
(25, 5, 6, 'Roma Soy Yo', 'Santiago Posteguillo', '1620.00', '1800.00', 'roma-soy-yo.jpg', 'roma-soy-yo-preview.jpg', 'Portada del libro \"Roma soy Yo\"', '9.2', 'Roma, año 77 a.C. El cruel senador Dolabela va a ser juzgado por corrupción, pero ha contratado a los mejores abogados, ha comprado al jurado y es conocido por usar la violencia contra todos los que se enfrentan a él. Nadie se atreve a ser el fiscal, hasta que de pronto, contra todo pronóstico, un joven patricio de tan solo veintitrés años acepta llevar la acusación, defender al pueblo de Roma y desafiar el poder de las élites. El nombre del desconocido abogado es Cayo Julio César. Con una combinación magistral de exhaustivo rigor histórico y sobresaliente capacidad narrativa, Santiago Posteguillo nos sumerge en el fragor de las batallas y nos muestra la relación de Julio César con su tío Cayo Mario, siete veces cónsul, que lo formará desde niño como gran estratega militar. Además, revive la apasionada historia de amor de César con Cornelia, su primera esposa, y nos ayuda a comprender, en definitiva, cómo fueron los orígenes del hombre tras el mito. Hay personajes que cambian la historia del mundo, pero también hay momentos que cambian la vida de esos personajes. Roma soy yo es el relato de los extraordinarios sucesos que marcaron el destino de César.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_realizados`
--

CREATE TABLE `pedidos_realizados` (
  `pedido_id` int(10) UNSIGNED NOT NULL,
  `carrito_id` int(10) UNSIGNED NOT NULL,
  `fecha_compra` datetime NOT NULL,
  `total` decimal(7,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos_realizados`
--

INSERT INTO `pedidos_realizados` (`pedido_id`, `carrito_id`, `fecha_compra`, `total`) VALUES
(5, 29, '0000-00-00 00:00:00', '20295.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `roles_id` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`roles_id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `rol_fk_id` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `email`, `password`, `nombre`, `apellido`, `rol_fk_id`) VALUES
(1, 'santiagoperez@gmail.com', '$2y$10$vN5XAybsTqfA/UZMJ1ECI.C9zlfnHfw1h88b5nV2PnkoaM8sxBP1e', 'santiago', 'perez', 1),
(2, 'rominagallardo@gmail.com', '$2y$10$5qj.G6SUNb875t1JXmmvu.rscuf7b/R9f.C5U0fNt7PaAYbwQNxbW', 'romina', 'gallardo', 1),
(3, 'nataliasimon@hotmail.com', '$2y$10$66a9q4a0Lh10hBlILmT.GuQe4gh0GzCoH71/OC5IWovQ16lP1FnMe', 'natalia', 'simon', 1),
(4, 'eduardovillaroel@gmail.com', '$2y$10$w5Niy8OrhW0OQ2IJ6ktLNu3CRfh1wJh.nrmVjrSstAS18RNPyrOcC', 'eduardo', 'villaroel', 1),
(5, 'lautarosantillana@hotmail.com', '$2y$10$hSnDFp8ioxiWGe9icZ1x9efd/6crQHk4jHrKLu5K/VLxMUIdt1L0e', 'lautaro', 'santillana', 1),
(6, 'pilarcastilla@gmail.com', '$2y$10$ERhVCp01diNNbahF2EtUv.1Tob.m9iyF4sii39dXnJleTFPYxGvVC', 'pilar', 'castilla', 1),
(7, 'ursulanovillo@gmail.com', '$2y$10$l4he2N7010O6z4EkCaboGu.R9AlJP/BVWUDVZA/HMtPCAcol/u0JO', 'ursula', 'novillo', 1),
(8, 'papalanata@gmail.com', '$2y$10$46KcM4GU2weJfAlwWUZby.uK9LkMc0cNfYMpAWXB4RsYYuw2TyMJ2', '', '', 2),
(39, 'raulnavarrottc@gmail.com', '$2y$10$JJWaKbEl38OfpAKZmaiBKuAs1v5jTKenaiAyEnEKROGsVJ9zJkFYO', 'Televisor', 'Rodriguez', 2),
(40, 'cioccolani58@hotmail.com', '$2y$10$vXAlBNCHJzlGchsFxM9B5O.wvHTCAQhRksyiddoF6gmakZBm1GUQK', 'a', 'b', 2),
(41, 'raul.navarro@davinci.edu.ar', '$2y$10$1dVYs37h6iatm714QzCpZO.GwajLy8KWElNlL.I4HkJfa4qbOH9uq', 'Raul', 'Navarro', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`carrito_id`),
  ADD KEY `fk_carrito_usuarios1_idx` (`usuario_id`);

--
-- Indices de la tabla `carrito_items`
--
ALTER TABLE `carrito_items`
  ADD PRIMARY KEY (`idcarrito_items`),
  ADD KEY `fk_carrito_items_carrito1_idx` (`carrito_id`),
  ADD KEY `fk_carrito_items_items1_idx` (`producto_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `fk_items_categorias_idx` (`categoria_id_fk`),
  ADD KEY `fk_items_usuarios1_idx` (`usuario_id_fk`);

--
-- Indices de la tabla `pedidos_realizados`
--
ALTER TABLE `pedidos_realizados`
  ADD PRIMARY KEY (`pedido_id`),
  ADD KEY `fk_compras_realizadas_carrito1_idx` (`carrito_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roles_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_usuarios_roles1_idx` (`rol_fk_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `carrito_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `carrito_items`
--
ALTER TABLE `carrito_items`
  MODIFY `idcarrito_items` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `producto_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `pedidos_realizados`
--
ALTER TABLE `pedidos_realizados`
  MODIFY `pedido_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `roles_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `fk_carrito_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `carrito_items`
--
ALTER TABLE `carrito_items`
  ADD CONSTRAINT `fk_carrito_items_carrito1` FOREIGN KEY (`carrito_id`) REFERENCES `carrito` (`carrito_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_carrito_items_items1` FOREIGN KEY (`producto_id`) REFERENCES `items` (`producto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk_items_categorias` FOREIGN KEY (`categoria_id_fk`) REFERENCES `categorias` (`categoria_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_items_usuarios1` FOREIGN KEY (`usuario_id_fk`) REFERENCES `usuarios` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedidos_realizados`
--
ALTER TABLE `pedidos_realizados`
  ADD CONSTRAINT `fk_compras_realizadas_carrito1` FOREIGN KEY (`carrito_id`) REFERENCES `carrito` (`carrito_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_roles1` FOREIGN KEY (`rol_fk_id`) REFERENCES `roles` (`roles_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
