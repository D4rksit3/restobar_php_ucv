-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-07-2024 a las 18:59:54
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restobar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Hamburguesa'),
(2, 'Broaster'),
(3, 'Alitas'),
(4, 'Salchipapa'),
(5, 'Piqueos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `mozo_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` enum('pendiente','en proceso','realizado') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `cliente` varchar(255) NOT NULL,
  `mesa` varchar(25) NOT NULL,
  `nro_orden` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `producto_id`, `mozo_id`, `cantidad`, `estado`, `created_at`, `cliente`, `mesa`, `nro_orden`, `updated_at`) VALUES
(1, 1, 2, 2, 'en proceso', '2024-07-04 17:41:23', '', '', 0, '2024-07-08 04:33:50'),
(2, 2, 2, 1, 'realizado', '2024-07-05 23:48:56', 'asad', 'Mesa 2', 0, '2024-07-08 05:30:40'),
(3, 7, 2, 1, 'pendiente', '2024-07-05 23:51:03', 'asad', 'Mesa 3', 0, '2024-07-08 04:33:50'),
(4, 11, 2, 1, 'pendiente', '2024-07-05 23:57:01', 'asw', 'Mesa 5', 0, '2024-07-08 04:33:50'),
(5, 1, 2, 1, 'pendiente', '2024-07-05 23:57:01', 'asw', 'Mesa 5', 0, '2024-07-08 04:33:50'),
(6, 12, 2, 1, 'pendiente', '2024-07-05 23:57:01', 'asw', 'Mesa 5', 0, '2024-07-08 04:33:50'),
(7, 2, 2, 1, 'realizado', '2024-07-06 00:28:39', 'ccdcd', 'Mesa 1', 0, '2024-07-08 05:14:46'),
(8, 1, 2, 1, 'pendiente', '2024-07-06 00:28:39', 'ccdcd', 'Mesa 1', 0, '2024-07-08 04:33:50'),
(9, 8, 2, 1, 'realizado', '2024-07-06 00:28:39', 'ccdcd', 'Mesa 1', 0, '2024-07-08 04:33:50'),
(10, 3, 2, 1, 'realizado', '2024-07-06 08:12:46', 'pruebna', 'Mesa 4', 0, '2024-07-08 04:33:50'),
(11, 6, 2, 1, 'pendiente', '2024-07-06 08:12:46', 'pruebna', 'Mesa 4', 0, '2024-07-08 04:33:50'),
(12, 2, 2, 1, 'realizado', '2024-07-06 09:52:42', 'asdasd', 'Mesa 2', 1, '2024-07-08 05:31:40'),
(13, 10, 2, 1, 'pendiente', '2024-07-06 09:52:42', 'asdasd', 'Mesa 2', 1, '2024-07-08 04:33:50'),
(14, 2, 2, 1, 'en proceso', '2024-07-07 07:43:10', 'mesa 4 ', 'Mesa 3', 2, '2024-07-08 04:33:50'),
(15, 10, 2, 1, 'en proceso', '2024-07-07 07:45:27', 'etc', 'Delivery', 3, '2024-07-08 04:33:50'),
(16, 12, 2, 1, 'pendiente', '2024-07-07 07:45:27', 'etc', 'Delivery', 3, '2024-07-08 04:33:50'),
(17, 1, 2, 1, 'realizado', '2024-07-07 07:59:02', 'prueba', 'Mesa 3', 4, '2024-07-08 04:33:50'),
(18, 7, 2, 1, 'pendiente', '2024-07-07 07:59:26', 'prueba', 'Mesa 1', 4, '2024-07-08 04:33:50'),
(19, 2, 2, 1, 'en proceso', '2024-07-08 05:31:43', 'sdsd', 'Mesa 2', 5, '2024-07-08 04:33:50'),
(20, 10, 2, 1, 'realizado', '2024-07-08 05:32:38', 'sdsd', 'Mesa 2', 5, '2024-07-08 04:33:50'),
(21, 12, 2, 1, 'realizado', '2024-07-08 05:32:38', 'sdsd', 'Mesa 2', 5, '2024-07-08 04:33:50'),
(22, 2, 2, 1, 'pendiente', '2024-07-08 06:12:21', 'adx', 'Mesa 1', 1, '2024-07-08 04:33:50'),
(23, 9, 2, 1, 'pendiente', '2024-07-08 06:12:49', 'zxzx', 'Mesa 1', 6, '2024-07-08 04:33:50'),
(24, 7, 2, 1, 'pendiente', '2024-07-08 09:37:41', 'sadsa', 'Mesa 1', 7, '2024-07-08 04:33:50'),
(25, 12, 2, 1, 'pendiente', '2024-07-08 09:38:05', 'as', 'Mesa 1', 8, '2024-07-08 04:33:50'),
(26, 4, 2, 1, 'pendiente', '2024-07-08 12:29:41', 'x', 'Mesa 1', 8, '2024-07-08 05:29:41'),
(27, 2, 2, 1, 'pendiente', '2024-07-08 20:49:10', 'mesa 4', 'Mesa 4', 9, '2024-07-08 13:49:10'),
(28, 12, 2, 1, 'pendiente', '2024-07-08 20:49:10', 'mesa 4', 'Mesa 4', 9, '2024-07-08 13:49:10'),
(29, 11, 2, 1, 'pendiente', '2024-07-08 20:49:10', 'mesa 4', 'Mesa 4', 9, '2024-07-08 13:49:10'),
(30, 6, 2, 1, 'pendiente', '2024-07-08 23:46:30', 'delivery cliente x', 'Delivery', 10, '2024-07-08 16:46:30'),
(31, 4, 2, 1, 'pendiente', '2024-07-08 23:46:30', 'delivery cliente x', 'Delivery', 10, '2024-07-08 16:46:30'),
(32, 7, 2, 1, 'pendiente', '2024-07-08 23:46:30', 'delivery cliente x', 'Delivery', 10, '2024-07-08 16:46:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `categoria_id`) VALUES
(1, 'Alitas broaster', 10.00, 1),
(2, 'Hamburguesa Royal', 15.00, 1),
(3, 'Salchipapa Clásica', 9.00, 3),
(4, 'Clasica', 10.00, 1),
(5, 'Royal', 12.00, 1),
(6, 'A lo Pobre', 14.00, 1),
(7, 'Alitas BBQ', 8.00, 3),
(8, 'Alitas Crunch', 9.00, 3),
(9, 'Alitas Mixtas', 10.00, 3),
(10, 'Salchipapa Clasica', 6.00, 4),
(11, 'Salchipapa a lo Pobre', 8.00, 4),
(12, 'Piqueos Mixtos', 15.00, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('mozo','administrador','cocinero') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'jroque', 'e10adc3949ba59abbe56e057f20f883e', 'administrador'),
(2, 'mozo', 'e10adc3949ba59abbe56e057f20f883e', 'mozo'),
(3, 'cocinero', 'e10adc3949ba59abbe56e057f20f883e', 'cocinero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `nro_orden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `producto_id`, `total`, `created_at`, `nro_orden`) VALUES
(1, 12, 0.00, '2024-07-08 13:12:53', 0),
(2, 4, 0.00, '2024-07-08 13:12:53', 0),
(3, 12, 0.00, '2024-07-08 13:18:55', 0),
(4, 4, 0.00, '2024-07-08 13:18:55', 0),
(5, 12, 0.00, '2024-07-08 13:19:04', 0),
(6, 4, 0.00, '2024-07-08 13:19:04', 0),
(7, 12, 0.00, '2024-07-08 19:59:27', 0),
(8, 4, 0.00, '2024-07-08 19:59:27', 0),
(10, NULL, 0.00, '2024-07-08 20:28:48', 8),
(11, NULL, 25.00, '2024-07-08 20:33:44', 8),
(12, NULL, 25.00, '2024-07-08 20:39:35', 8),
(13, NULL, 25.00, '2024-07-08 20:48:03', 8),
(14, NULL, 38.00, '2024-07-08 22:59:46', 9),
(15, NULL, 8.00, '2024-07-08 23:00:21', 7),
(16, NULL, 36.00, '2024-07-08 23:17:40', 5),
(17, NULL, 18.00, '2024-07-08 23:43:21', 4),
(18, NULL, 15.00, '2024-07-08 23:45:51', 2),
(19, NULL, 32.00, '2024-07-08 23:47:12', 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `mozo_id` (`mozo_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categoria` (`categoria_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`mozo_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
