-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-01-2025 a las 18:26:13
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `myfriends`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `friend` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `friends`
--

INSERT INTO `friends` (`id`, `friend`) VALUES
(1, 'Juan'),
(2, 'Anaaaad'),
(5, 'Paulinoo'),
(15, 'Javier');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `friend_hobbies`
--

CREATE TABLE `friend_hobbies` (
  `friend_id` int(11) NOT NULL,
  `hobbie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `friend_hobbies`
--

INSERT INTO `friend_hobbies` (`friend_id`, `hobbie_id`) VALUES
(1, 1),
(1, 2),
(1, 6),
(2, 1),
(5, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hobbies`
--

CREATE TABLE `hobbies` (
  `id` int(11) NOT NULL,
  `hobbie` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hobbies`
--

INSERT INTO `hobbies` (`id`, `hobbie`) VALUES
(1, 'Fútbol'),
(2, 'Cine'),
(6, 'asdasdO'),
(7, 'Jugar');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `friend_hobbies`
--
ALTER TABLE `friend_hobbies`
  ADD PRIMARY KEY (`friend_id`,`hobbie_id`),
  ADD KEY `hobbie_id` (`hobbie_id`);

--
-- Indices de la tabla `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `friend_hobbies`
--
ALTER TABLE `friend_hobbies`
  ADD CONSTRAINT `friend_hobbies_ibfk_1` FOREIGN KEY (`friend_id`) REFERENCES `friends` (`id`),
  ADD CONSTRAINT `friend_hobbies_ibfk_2` FOREIGN KEY (`hobbie_id`) REFERENCES `hobbies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
