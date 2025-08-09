-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-01-2024 a las 00:55:22
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

CREATE DATABASE IF NOT EXISTS nacional;
USE nacional;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nacional`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datospago`
--

CREATE TABLE `datospago` (
  `numeroTarjeta` varchar(45) NOT NULL,
  `nombreTitular` varchar(45) NOT NULL,
  `cvv` int(11) NOT NULL,
  `fechaCaudicidad` date NOT NULL,
  `correoUsuario` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada_usuario`
--

CREATE TABLE `entrada_usuario` (
  `Eventos_idEventos` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 1,
  `Usuario_correoElectronico` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `entrada_usuario`
--

INSERT INTO `entrada_usuario` (`Eventos_idEventos`, `cantidad`, `Usuario_correoElectronico`) VALUES
(1, 1, 'cliente@cliente.com'),
(10, 1, 'cliente@cliente.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `idEventos` int(11) NOT NULL,
  `archivo` tinyint(1) NOT NULL DEFAULT 1,
  `titulo` varchar(45) NOT NULL,
  `fecha` datetime NOT NULL,
  `descripcion` longtext NOT NULL,
  `precio` varchar(45) NOT NULL,
  `tipoEvento` enum('Reggaeton','Tecno') DEFAULT NULL,
  `foto` longtext NOT NULL DEFAULT '\'logoDoradoCustom.png\''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`idEventos`, `archivo`, `titulo`, `fecha`, `descripcion`, `precio`, `tipoEvento`, `foto`) VALUES
(1, 0, 'PreFeria Almería', '2023-08-18 02:00:00', 'Llega la fería!!! La semana mas esperada y en NACIONAL queremos empezarla de la mejor manera, cno una fiesta de pre-feria. Cerveza tinoto paella, musica, fiesta y mucha diversión, compra tu entrada antes de que se agoten, te esperamos!!!', '10', 'Reggaeton', 'feria.png'),
(2, 0, 'Vuelta de JUEVES UNIVERSITY', '2023-09-08 22:00:00', 'Nos visita JAYXME!\r\n\r\nVuelven los Jueves University a Nacional Music Club, animación, parrty show, regalos y la mejor música para que disfrutes de una noche única!', '12', 'Tecno', '23sep08.jpg'),
(3, 0, 'Robledo Showcase', '2024-03-19 22:00:00', 'Consigue tu entrada para ver in directo a este genial artista, no te quedes sin la tuya, te esperamos donde siempre, NACIONAL MUSIC CLUB', '10', 'Reggaeton', 'robledo.jpg'),
(4, 0, 'ALVAMAICE', '2023-04-13 21:00:00', 'Lo estabais pidiendo..ALAVAMA ICE en Nacional Music Club!\r\n\r\nNos visita el DJ más influyente en RRSS y con más repercusión del panorama nacional, llega a Almería para hacernos perrear y disfrutar como él solo sabe!\r\n\r\nEntradas ya disponibles.', '12', 'Reggaeton', '23abr13.jpg'),
(5, 0, 'NOCHE DE HALLOWEEN - LA PURGA', '2023-10-31 20:00:00', 'Toda fecha tiene su tradición, Halloween 2023... THE PURGE, la noche donde todo está permitido, apunta aesta fecha: martes 31 de octubre en NACIONAL MUSIC CLUB  Una entrada | Una Copa', '10', 'Tecno', '23oct31.png'),
(6, 0, 'FIESTA DE LA SOBRESALIENTE', '2024-01-12 21:00:00', '¡Celebra nuestro éxito con una fiesta espectacular! Nuestra nota sobresaliente es motivo de orgullo. Únete a nosotros para una noche inolvidable llena de alegría y celebración. ', '0', 'Tecno', 'sobresaliente.jpg'),
(7, 0, 'Concierto Tardeo', '2023-12-09 17:00:00', 'Las tardes también son para disfrutarlos. Te esperamos en Nacional Music Club donde nos visita Jesús Cortes para cantarnos con todos su alma. ', '10', '', '23dic09.jpg'),
(8, 0, 'Adiós 2023', '2023-12-31 00:00:00', 'NOCHE VIEJA 2023! Celebramos el fin de año en NACIONAL MUSIC CLUB y nos acompaña Jaxyme para hacernos disfrutar de una noche épica con su buen rollo y música que lo caracteriza!!  Una Entrada | Una Copa', '10', 'Reggaeton', 'nocheVieja.jpg'),
(9, 0, 'Fin de Examenes -  FRATERNITY PARTY', '2024-01-19 22:00:00', 'Aputna a esta fecha por que nos visita Riky Ferro para poner patas arriba NACIONAL MUSIC CLUB y hacernos disfrutar de una auténtica noche americana al más puro estilo Fraternity Party, con regalos, animación, maquillaje y la mejor música!!!', '10', 'Reggaeton', 'frat.jpg'),
(10, 0, 'Malianteo', '2024-02-02 21:00:00', 'Te traemos una fiesta muy especial...Malianteo de DJ Santi Ramirez. No te la puedes perder!!  Una Entrada | Una Copa', '8', 'Tecno', 'malianteo.jpg'),
(11, 0, 'Día de Andalucia', '2024-02-27 20:00:00', 'Ya sabemos que no podrás dormir la noche anterior al mejor día del año. Ven a celebrar la tierra de los mejores. Y para los que no sean andaluces, lo serán al final de la noche !!!', '10', 'Tecno', '28feb.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idFactura` int(11) NOT NULL,
  `hora` datetime NOT NULL,
  `precioTotal` varchar(45) NOT NULL,
  `numeroTarjeta` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturaentrada`
--

CREATE TABLE `facturaentrada` (
  `idFactura` int(11) NOT NULL,
  `idCarrito` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_reserva`
--

CREATE TABLE `factura_reserva` (
  `Factura_idFactura` int(11) NOT NULL,
  `Reserva_idReserva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `idReserva` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `invitados` int(11) NOT NULL,
  `servicios` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_usuario`
--

CREATE TABLE `reserva_usuario` (
  `Reserva_idReserva` int(11) NOT NULL,
  `Usuario_correoElectronico` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `correoElectronico` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `hashContrasena` varchar(45) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `userAdmin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`correoElectronico`, `nombre`, `apellidos`, `hashContrasena`, `fechaNacimiento`, `userAdmin`) VALUES
('alonsorodriguez2003@gmail.com', 'Daniel', 'Alonso Rodriguez', 'Nacional23', '2003-01-01', 1),
('cliente@cliente.com', 'Fulanito', 'Fernandez', 'Nacional23', '2003-01-01', 0),
('en650@inlumine.ual.es', 'Emily', 'Nolan', 'Nacional23', '2003-01-01', 1),
('ilm402@inlumine.ual.es', 'Nacho', 'Lopez Miralles', 'Nacional23', '2003-01-01', 1),
('ilm810@inlumine.ual.es', 'Israel', 'Lopez Miralles', 'Nacional23', '2003-01-01', 1),
('pmg843@inlumine.ual.es', 'Pablo', 'Martinez Galvez', 'Nacional23', '2003-01-01', 1),
('sgg181@inlumine.ual.es', 'Sergio', 'Guerrero Gonzalez', 'Nacional23', '2003-01-01', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datospago`
--
ALTER TABLE `datospago`
  ADD PRIMARY KEY (`numeroTarjeta`),
  ADD KEY `correoElectronico_idx` (`correoUsuario`);

--
-- Indices de la tabla `entrada_usuario`
--
ALTER TABLE `entrada_usuario`
  ADD PRIMARY KEY (`Eventos_idEventos`,`cantidad`,`Usuario_correoElectronico`),
  ADD KEY `fk_entradaComprada_Factura1_idx` (`cantidad`),
  ADD KEY `fk_entradaComprada_Usuario1_idx` (`Usuario_correoElectronico`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`idEventos`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idFactura`),
  ADD KEY `numeroTarjeta_idx` (`numeroTarjeta`);

--
-- Indices de la tabla `facturaentrada`
--
ALTER TABLE `facturaentrada`
  ADD KEY `idFactura` (`idFactura`);

--
-- Indices de la tabla `factura_reserva`
--
ALTER TABLE `factura_reserva`
  ADD PRIMARY KEY (`Factura_idFactura`,`Reserva_idReserva`),
  ADD KEY `fk_Factura_has_DatosPago_Factura1_idx` (`Factura_idFactura`),
  ADD KEY `fk_Factura_has_DatosPago_Reserva1_idx` (`Reserva_idReserva`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idReserva`);

--
-- Indices de la tabla `reserva_usuario`
--
ALTER TABLE `reserva_usuario`
  ADD PRIMARY KEY (`Reserva_idReserva`,`Usuario_correoElectronico`),
  ADD KEY `fk_Reserva_has_Usuario_Reserva1_idx` (`Reserva_idReserva`),
  ADD KEY `fk_Reserva_has_Usuario_Usuario1_idx` (`Usuario_correoElectronico`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`correoElectronico`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `idEventos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idFactura` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `datospago`
--
ALTER TABLE `datospago`
  ADD CONSTRAINT `fk_Pago_Usuario` FOREIGN KEY (`correoUsuario`) REFERENCES `usuario` (`correoElectronico`);

--
-- Filtros para la tabla `entrada_usuario`
--
ALTER TABLE `entrada_usuario`
  ADD CONSTRAINT `fk_Entrada_Eventos` FOREIGN KEY (`Eventos_idEventos`) REFERENCES `eventos` (`idEventos`),
  ADD CONSTRAINT `fk_Entrada_Usuario` FOREIGN KEY (`Usuario_correoElectronico`) REFERENCES `usuario` (`correoElectronico`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_Factura_TarjetaPago` FOREIGN KEY (`numeroTarjeta`) REFERENCES `datospago` (`numeroTarjeta`);

--
-- Filtros para la tabla `facturaentrada`
--
ALTER TABLE `facturaentrada`
  ADD CONSTRAINT `idFactura` FOREIGN KEY (`idFactura`) REFERENCES `factura` (`idFactura`);

--
-- Filtros para la tabla `factura_reserva`
--
ALTER TABLE `factura_reserva`
  ADD CONSTRAINT `fk_FR_Factura` FOREIGN KEY (`Factura_idFactura`) REFERENCES `factura` (`idFactura`),
  ADD CONSTRAINT `fk_FR_Reserva` FOREIGN KEY (`Reserva_idReserva`) REFERENCES `reserva` (`idReserva`);

--
-- Filtros para la tabla `reserva_usuario`
--
ALTER TABLE `reserva_usuario`
  ADD CONSTRAINT `fk_RU_Reserva` FOREIGN KEY (`Reserva_idReserva`) REFERENCES `reserva` (`idReserva`),
  ADD CONSTRAINT `fk_RU_Usuario` FOREIGN KEY (`Usuario_correoElectronico`) REFERENCES `usuario` (`correoElectronico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
