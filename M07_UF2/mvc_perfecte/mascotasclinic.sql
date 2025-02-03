-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-01-2024 a las 11:09:57
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mascotasclinic`
--
CREATE DATABASE IF NOT EXISTS `mascotasclinic` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mascotasclinic`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas_de_historial`
--

DROP TABLE IF EXISTS `lineas_de_historial`;
CREATE TABLE `lineas_de_historial` (
  `id` int(11) NOT NULL,
  `idmascota` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `motivo_visita` varchar(300) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lineas_de_historial`
--

INSERT INTO `lineas_de_historial` (`id`, `idmascota`, `fecha`, `motivo_visita`, `descripcion`) VALUES
(1, 2, '2020-12-20', 'Para acariciar al gatito.', NULL),
(2, 1, '2020-04-20', 'Para jugar con el perrito.', NULL),
(3, 3, '2020-05-20', 'Para acariciar al segundo gatito.', NULL),
(4, 2, '2020-08-20', 'Para acariciar al primer gatito otra vez.', NULL),
(5, 1, '2021-01-28', 'cojea', 'clavo clavado en la patita'),
(6, 3, '2021-01-28', 'motivo1', 'descripción 1'),
(7, 1, '2021-01-01', 'motivo2', 'descripción 3'),
(8, 1, '2021-01-01', 'motivo3', 'descripción 4'),
(9, 3, '2021-01-01', 'motivo4', 'descripción 5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

DROP TABLE IF EXISTS `mascotas`;
CREATE TABLE `mascotas` (
  `id` int(11) NOT NULL,
  `nifpropietario` varchar(25) NOT NULL,
  `nom` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`id`, `nifpropietario`, `nom`) VALUES
(1, '02258461E', 'Doggyy'),
(2, '01685047K', 'Caty'),
(3, '01685047K', 'Catty');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietarios`
--

DROP TABLE IF EXISTS `propietarios`;
CREATE TABLE `propietarios` (
  `nif` varchar(25) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `email` varchar(25) DEFAULT NULL,
  `movil` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `propietarios`
--

INSERT INTO `propietarios` (`nif`, `nom`, `email`, `movil`) VALUES
('01685047K', 'Maria', 'maria1@mail.com', '222222222'),
('02258461E', 'Mario', 'mario1@mail.com', '111111112');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lineas_de_historial`
--
ALTER TABLE `lineas_de_historial`
  ADD PRIMARY KEY (`id`,`idmascota`),
  ADD KEY `idmascota` (`idmascota`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id`,`nifpropietario`),
  ADD KEY `nifpropietario` (`nifpropietario`);

--
-- Indices de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  ADD PRIMARY KEY (`nif`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lineas_de_historial`
--
ALTER TABLE `lineas_de_historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lineas_de_historial`
--
ALTER TABLE `lineas_de_historial`
  ADD CONSTRAINT `lineas_de_historial_ibfk_1` FOREIGN KEY (`idmascota`) REFERENCES `mascotas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `mascotas_ibfk_1` FOREIGN KEY (`nifpropietario`) REFERENCES `propietarios` (`nif`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
