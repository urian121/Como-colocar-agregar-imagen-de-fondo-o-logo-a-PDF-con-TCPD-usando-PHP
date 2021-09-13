-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-09-2021 a las 00:27:13
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_pdf`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id` int(10) NOT NULL,
  `nameFull` varchar(250) DEFAULT NULL,
  `identification` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `addres` text NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `dateReclamo` varchar(50) DEFAULT NULL,
  `dateCompra` varchar(50) DEFAULT NULL,
  `typeProduct` varchar(100) DEFAULT NULL,
  `lote` varchar(100) DEFAULT NULL,
  `cantiRecibida` varchar(50) DEFAULT NULL,
  `reclamo` text NOT NULL,
  `motivo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `nameFull`, `identification`, `phone`, `addres`, `city`, `dateReclamo`, `dateCompra`, `typeProduct`, `lote`, `cantiRecibida`, `reclamo`, `motivo`) VALUES
(3, 'Urian Viera', '123456954', '3216548952', 'Fontibón', 'Bogotá', '12-09-2021', '13-09-2021', 'granos', '2', '3', 'El producto esta dañado.', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
