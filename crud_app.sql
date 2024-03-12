-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-03-2024 a las 18:55:52
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crud_app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`, `createdAt`, `updatedAt`) VALUES
(1, 'prueba', '2024-03-12 14:05:53', NULL),
(2, 'prueba 2', '2024-03-12 15:59:55', NULL),
(3, 'categoria nueva', '2024-03-12 16:58:17', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id`, `name`, `category`, `price`, `createdAt`, `updatedAt`) VALUES
(4, 'John', 1, 50000, '2024-03-12 14:09:15', '2024-03-12 17:00:37'),
(6, 'prueba', 1, 124545656, '2024-03-12 14:45:37', NULL),
(7, 'prueba 4', 1, 12454, '2024-03-12 14:50:05', '2024-03-12 15:14:03'),
(8, 'prueba cambio yi', 1, 12454564, '2024-03-12 14:51:16', '2024-03-12 16:11:18'),
(14, 'yi', 1, 35, '2024-03-12 16:28:13', NULL),
(15, 'prueba 2', 1, 35, '2024-03-12 16:28:30', NULL),
(17, 'adasdsa', 1, 1, '2024-03-12 16:47:43', NULL),
(18, 'error', 1, 1, '2024-03-12 16:48:05', NULL),
(19, 'valor', 1, 12, '2024-03-12 16:48:32', NULL),
(20, 'prueba', 1, 123213, '2024-03-12 16:49:15', NULL),
(21, 'prueba again', 1, 2147483647, '2024-03-12 16:49:33', NULL),
(22, 'pruebaasda', 1, 123123120, '2024-03-12 16:49:58', NULL),
(23, 'asdas', 1, 123123120, '2024-03-12 16:50:34', NULL),
(24, 'adssd', 1, 12312, '2024-03-12 16:52:30', NULL),
(28, 'prueba de num', 1, 1234567891, '2024-03-12 16:53:59', NULL),
(29, 'precio', 1, 12345, '2024-03-12 16:56:01', NULL),
(31, 'prueba categoria', 3, 12000, '2024-03-12 16:58:30', NULL),
(32, 'prueba categoria', 3, 12000, '2024-03-12 16:59:51', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
