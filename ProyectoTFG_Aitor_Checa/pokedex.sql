-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2023 a las 17:11:16
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pokedex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `idfoto` int(11) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `numPokemon` int(11) NOT NULL,
  `principal` tinyint(1) NOT NULL,
  `motivo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`idfoto`, `direccion`, `numPokemon`, `principal`, `motivo`) VALUES
(1, '1.png', 1, 1, 'Forma Normal'),
(2, '1_(2).png', 1, 0, 'Forma Variocolor'),
(3, '2.png', 2, 1, 'Forma Normal'),
(4, '2_(2).png', 2, 0, 'Forma Variocolor'),
(5, '3.png', 3, 1, 'Forma Normal'),
(6, '3_(2).png', 3, 0, 'Forma Variocolor'),
(7, '3_(3).png', 3, 0, 'Hembra'),
(8, '3_(4).png', 3, 0, 'Hembra Forma Variocolor'),
(9, '4.png', 4, 1, 'Forma Normal'),
(10, '4_(2).png', 4, 0, 'Forma Variocolor'),
(11, '5.png', 5, 1, 'Forma Normal'),
(12, '5_(2).png', 5, 0, 'Forma Variocolor'),
(13, '6.png', 6, 1, 'Forma Normal'),
(14, '6_(2).png', 6, 0, 'Forma Variocolor'),
(15, '7.png', 7, 1, 'Forma Normal'),
(16, '7_(2).png', 7, 0, 'Forma Variocolor'),
(17, '8.png', 8, 1, 'Forma Normal'),
(18, '8_(2).png', 8, 0, 'Forma Variocolor'),
(19, '9.png', 9, 1, 'Forma Normal'),
(20, '9_(2).png', 9, 0, 'Forma Variocolor'),
(21, '10.png', 10, 1, 'Forma Normal'),
(22, '10_(2).png', 10, 0, 'Forma Variocolor'),
(23, '11.png', 11, 1, 'Forma Normal'),
(24, '11_(2).png', 11, 0, 'Forma Variocolor'),
(25, '12.png', 12, 1, 'Forma Normal'),
(26, '12_(2).png', 12, 0, 'Forma Variocolor'),
(27, '12_(3).png', 12, 0, 'Hembra'),
(28, '12_(4).png', 12, 0, 'Hembra Forma Variocolor'),
(29, '13.png', 13, 1, 'Forma Normal'),
(30, '13_(2).png', 13, 0, 'Forma Variocolor'),
(31, '14.png', 14, 1, 'Forma Normal'),
(32, '14_(2).png', 14, 0, 'Forma Variocolor'),
(33, '15.png', 15, 1, 'Forma Normal'),
(34, '15_(2).png', 15, 0, 'Forma Variocolor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pokemon`
--

CREATE TABLE `pokemon` (
  `numPokedex` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `categoria` varchar(200) NOT NULL,
  `tipoPrimario` int(11) NOT NULL,
  `tipoSecundario` int(11) NOT NULL,
  `habilidad` varchar(200) NOT NULL,
  `habilidadOculta` varchar(200) NOT NULL,
  `peso` float NOT NULL,
  `altura` float NOT NULL,
  `color` varchar(200) NOT NULL,
  `generacion` varchar(200) NOT NULL,
  `huella` varchar(200) NOT NULL,
  `grito` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pokemon`
--

INSERT INTO `pokemon` (`numPokedex`, `nombre`, `descripcion`, `categoria`, `tipoPrimario`, `tipoSecundario`, `habilidad`, `habilidadOculta`, `peso`, `altura`, `color`, `generacion`, `huella`, `grito`) VALUES
(1, 'Bulbasaur', 'A Bulbasaur es fácil verle echándose una siesta al sol. La semilla que tiene en el lomo va creciendo cada vez más a medida que absorbe los rayos del sol.', 'Semilla', 12, 17, 'Espesura', 'Clorofila', 6.9, 0.7, 'Verde', 'Primera', '1.png', '1.ogg'),
(2, 'Ivysaur', 'Este Pokémon lleva un bulbo en el lomo y, para poder con su peso, tiene unas patas y un tronco gruesos y fuertes. Si empieza a pasar más tiempo al sol, será porque el bulbo está a punto de hacerse una flor grande.', 'Semilla', 12, 17, 'Espesura', 'Clorofila', 13, 1, 'Verde', 'Primera', '2.png', '2.ogg'),
(3, 'Venusaur', 'Venusaur tiene una flor enorme en el lomo que, según parece, adquiere unos colores muy vivos si está bien nutrido y le da mucho el sol. El aroma delicado de la flor tiene un efecto relajante en el ánimo de las personas.', 'Semilla', 12, 17, 'Espesura', 'Clorofila', 100, 2, 'Verde', 'Primera', '3.png', '3.ogg'),
(4, 'Charmander', 'La llama que tiene en la punta de la cola arde según sus sentimientos. Llamea levemente cuando está alegre y arde vigorosamente cuando está enfadado.', 'Lagartija', 7, 7, 'Mar llamas', 'Poder solar', 8.5, 0.6, 'Rojo', 'Primera', '4.png', '4.ogg'),
(5, 'Charmeleon', 'Charmeleon no tiene reparo en acabar con su rival usando las afiladas garras que tiene. Si su enemigo es fuerte, se vuelve agresivo, y la llama que tiene en el extremo de la cola empieza a arder con mayor intensidad tornándose azulada.', 'Llama', 7, 7, 'Mar llamas', 'Poder solar', 19, 1.1, 'Rojo', 'Primera', '5.png', '5.ogg'),
(6, 'Charizard', 'Charizard se dedica a volar por los cielos en busca de oponentes fuertes. Echa fuego por la boca y es capaz de derretir cualquier cosa. No obstante, si su rival es más débil que él, no usará este ataque.', 'Llama', 7, 18, 'Mar llamas', 'Poder solar', 90.5, 1.7, 'Rojo/Negro', 'Primera', '6.png', '6.ogg'),
(7, 'Squirtle', 'El caparazón de Squirtle no le sirve de protección únicamente. Su forma redondeada y las hendiduras que tiene le ayudan a deslizarse en el agua y le permiten nadar a gran velocidad.', 'Tortuguita', 2, 2, 'Torrente', 'Cura lluvia', 9, 0.5, 'Azul', 'Primera', '7.png', '7.ogg'),
(8, 'Wartortle', 'Tiene una cola larga y cubierta de un pelo abundante y grueso que se torna más oscuro a medida que crece. Los arañazos que tiene en el caparazón dan fe de lo buen guerrero que es.', 'Tortuga', 2, 2, 'Torrente', 'Cura lluvia', 22.5, 1, 'Azul', 'Primera', '8.png', '8.ogg'),
(9, 'Blastoise', 'Blastoise lanza chorros de agua por los tubos que le salen del caparazón que tiene en la espalda, con gran precisión. Puede disparar chorros de agua con tanta puntería que no fallaría al tirar contra una lata pequeña a 50 metros.', 'Armazón', 2, 2, 'Torrente', 'Cura lluvia', 85.5, 1.6, 'Azul', 'Primera', '9.png', '9.ogg'),
(10, 'Caterpie', 'Caterpie tiene un apetito voraz. Es capaz de devorar hojas que superen su tamaño en un abrir y cerrar de ojos. Atención a la antena que tiene: libera un hedor realmente fuerte.', 'Gusano', 3, 3, 'Polvo Escudo', 'Fuga', 2.9, 0.3, 'Verde', 'Primera', '10.png', '10.ogg'),
(11, 'Metapod', 'La capa que recubre el cuerpo de este Pokémon es tan dura como una plancha de hierro. Metapod apenas se mueve. Permanece inmóvil para que las vísceras evolucionen dentro de la coraza que le rodea.', 'Capullo', 3, 3, 'Mudar', 'Mudar', 9.9, 0.7, 'Verde', 'Primera', '11.png', '11.ogg'),
(12, 'Butterfree', 'Butterfree tiene una habilidad especial para encontrar delicioso polen en las flores. Puede localizar, extraer y transportar polen de flores que estén floreciendo a 10 km de distancia de su nido.', 'Mariposa', 3, 18, 'Ojo Compuesto', 'Cromolente', 32, 1.1, 'Blanco', 'Primera', '12.png', '12.ogg'),
(13, 'Weedle', 'Weedle tiene un finísimo sentido del olfato. Es capaz de distinguir las hojas que le gustan de las que no le gustan olisqueando un poco con la gran nariz que tiene.', 'Oruga', 3, 17, 'Polvo Escudo', 'Fuga', 3.2, 0.3, 'Marrón', 'Primera', '13.png', '13.ogg'),
(14, 'Kakuna', 'Kakuna permanece prácticamente inmóvil al encaramarse a los árboles, aunque la actividad interna de su organismo tiene un ritmo frenético, pues se prepara para su evolución. Prueba de esto es la alta temperatura de su caparazón.', 'Capullo', 3, 17, 'Mudar', 'Mudar', 10, 0.6, 'Amarillo', 'Primera', '14.png', '14.ogg'),
(15, 'Beedrill', 'Los Beedrill defienden su territorio a toda costa. No es conveniente acercarse a su colmena, por seguridad. Si se les molesta, todo un enjambre atacará ferozmente.', 'Abeja veneno', 3, 17, 'Enjambre', 'Francotirador', 29.5, 1, 'Amarillo', 'Primera', '15.png', '15.ogg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `nombre`, `foto`) VALUES
(1, 'acero', 'acero.png'),
(2, 'agua', 'agua.png'),
(3, 'bicho', 'bicho.png'),
(4, 'dragon', 'dragon.png'),
(5, 'electrico', 'electrico.png'),
(6, 'fantasma', 'fantasma.png'),
(7, 'fuego', 'fuego.png'),
(8, 'hada', 'hada.png'),
(9, 'hielo', 'hielo.png'),
(10, 'lucha', 'lucha.png'),
(11, 'normal', 'normal.png'),
(12, 'planta', 'planta.png'),
(13, 'psiquico', 'psiquico.png'),
(14, 'roca', 'roca.png'),
(15, 'siniestro', 'siniestro.png'),
(16, 'tierra', 'tierra.png'),
(17, 'veneno', 'veneno.png'),
(18, 'volador', 'volador.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusu` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contras` varchar(200) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `pokemonfavorito` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusu`, `email`, `contras`, `nombre`, `pokemonfavorito`, `fecha`) VALUES
(2, 'aitor@gmail.com', '$2y$10$0D0Jlzf09I5fuy4L1BdJTeMS4P1hNM8wH7UkCRNy6VYrdKlQdHSpC', 'Aitor', 0, '2002-05-11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`idfoto`),
  ADD KEY `pertenece` (`numPokemon`);

--
-- Indices de la tabla `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`numPokedex`),
  ADD KEY `tipo1` (`tipoPrimario`),
  ADD KEY `tipo2` (`tipoSecundario`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `idfoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `numPokedex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `pertenece` FOREIGN KEY (`numPokemon`) REFERENCES `pokemon` (`numPokedex`);

--
-- Filtros para la tabla `pokemon`
--
ALTER TABLE `pokemon`
  ADD CONSTRAINT `tipo1` FOREIGN KEY (`tipoPrimario`) REFERENCES `tipo` (`id`),
  ADD CONSTRAINT `tipo2` FOREIGN KEY (`tipoSecundario`) REFERENCES `tipo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
