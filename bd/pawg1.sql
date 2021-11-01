-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2021 a las 20:14:41
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pawg1`
--
CREATE DATABASE IF NOT EXISTS `pawg1` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pawg1`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `categoria` text NOT NULL,
  `imagen_cate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`, `imagen_cate`) VALUES
(8, 'categoria 1', 'categoria 1.png'),
(9, 'categoria 2', 'categoria 2.png'),
(10, 'categoria 3', 'categoria 3.png'),
(11, 'categoria 4', 'categoria 4.png'),
(12, 'categoria 5', 'categoria 5.png'),
(13, 'categoria 6', 'categoria 6.png'),
(14, 'categoria 7', 'categoria 7.png'),
(15, 'categoria 8', 'categoria 8.png'),
(16, 'categoria 9', 'categoria 9.png'),
(17, 'categoria 10', 'categoria 10.png'),
(18, 'categoria 11', 'categoria 11.png'),
(19, 'categoria 12', 'categoria 12.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventarios`
--

CREATE TABLE `inventarios` (
  `id_inventario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre_producto` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `precio_compra` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` float NOT NULL,
  `imagen_cate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre_producto`, `descripcion`, `precio_compra`, `cantidad`, `precio_venta`, `imagen_cate`) VALUES
(5, 'producto 1', 'descripcion 1', 10, 20, 15, 'producto 1.png'),
(6, 'producto 2', 'descripcion 2', 8.99, 30, 9.99, 'producto 2.png'),
(7, 'producto 3', 'descripcion 3', 5, 40, 10, 'producto 3.png'),
(8, 'producto 4', 'descripcion 4', 21.5, 36, 24.99, 'producto 4.png'),
(9, 'producto 5', 'descripcion 5', 80, 40, 99.99, 'producto 5.png'),
(10, 'producto 6', 'descripcion 6', 8.99, 32, 10, 'producto 6.png'),
(11, 'producto 7', 'descripcion 7', 8.99, 47, 10, 'producto 7.png'),
(12, 'producto 8', 'descripcion 8', 6.49, 60, 24.99, 'producto 8.png'),
(13, 'producto 9', 'descripcion 9', 6.49, 100, 9.99, 'producto 9.png'),
(14, 'producto 10', 'descripcion 10', 21.5, 40, 24.99, 'producto 10.png'),
(15, 'producto 11', 'descripcion 11', 6.49, 7, 24.99, 'producto 11.jpg'),
(16, 'producto 12', 'descripcion 12', 21.5, 18, 24.99, 'producto 12.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `correo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre`, `direccion`, `telefono`, `correo`) VALUES
(10, 'proveedor 1', 'direccion 1', '88889999', 'proveedor@gmail.com'),
(11, 'proveedor 2', 'direccion 2', '12121212', 'proveedor@gmail.com'),
(12, 'proveedor 3', 'direccion 3', '12121212', 'proveedor@gmail.com'),
(13, 'proveedor 4', 'direccion 4', '12121212', 'proveedor@gmail.com'),
(14, 'proveedor 5', 'direccion 6', '12121212', 'proveedor@gmail.com'),
(15, 'proveedor 6', 'direccion 5', '12121212', 'proveedor@gmail.com'),
(16, 'proveedor 7', 'direccion 7', '12121212', 'proveedor@gmail.com'),
(17, 'proveedor 8', 'direccion 8', '12121212', 'proveedor@gmail.com'),
(18, 'proveedor 9', 'direccion 9', '12121212', 'proveedor@gmail.com'),
(19, 'proveedor 10', 'direccion 10', '12121212', 'proveedor@gmail.com'),
(20, 'proveedor 11', 'direccion 11', '12121212', 'proveedor@gmail.com'),
(21, 'proveedor 12', 'direccion 12', '12121212', 'proveedor@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `email` text NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `token` varchar(10) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `foto` text NOT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `usuario`, `email`, `clave`, `token`, `tipo`, `foto`, `estado`) VALUES
(19, 'Héctor', '', '$2y$10$wMcArO1Jfr/9.GOY7jvqqOfqlAOzthxw9yZtZl7403VZAk.DZZQ7.', NULL, 1, 'Héctor.jpg', 1),
(21, 'admin', '', '$2y$10$IhfnhT4ZqYkWnXhwcuerquRXxPvNDcyi3Jp/9Iicj/5/5ejtEYWti', NULL, 1, 'admin.png', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
