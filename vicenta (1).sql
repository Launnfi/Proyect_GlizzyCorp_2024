-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2024 a las 22:37:24
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
-- Base de datos: `vicenta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idc` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL,
  `idp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle de orden`
--

CREATE TABLE `detalle de orden` (
  `idd` int(11) NOT NULL,
  `ido` int(11) NOT NULL,
  `idp` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `idi` int(11) NOT NULL,
  `idp` int(11) NOT NULL,
  `cantidad_disponible` int(11) NOT NULL,
  `fecha_actualizacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos de pago`
--

CREATE TABLE `metodos de pago` (
  `idm` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `ido` int(11) NOT NULL,
  `idu` int(11) NOT NULL,
  `idm` int(11) NOT NULL,
  `fecha_orden` date NOT NULL,
  `direccionenvio` text NOT NULL,
  `total` int(11) NOT NULL,
  `estado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idp` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL,
  `precio` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `talles` int(11) NOT NULL,
  `color` varchar(40) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reseñas`
--

CREATE TABLE `reseñas` (
  `idr` int(11) NOT NULL,
  `idp` int(11) NOT NULL,
  `idu` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `fechaR` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idu` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `correo` text NOT NULL,
  `pass` text NOT NULL,
  `direccion` text NOT NULL,
  `tel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idc`),
  ADD KEY `idc` (`idc`),
  ADD KEY `idp` (`idp`);

--
-- Indices de la tabla `detalle de orden`
--
ALTER TABLE `detalle de orden`
  ADD PRIMARY KEY (`idd`),
  ADD KEY `idd` (`idd`),
  ADD KEY `ido` (`ido`),
  ADD KEY `idp` (`idp`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`idi`),
  ADD KEY `idi` (`idi`),
  ADD KEY `idp` (`idp`);

--
-- Indices de la tabla `metodos de pago`
--
ALTER TABLE `metodos de pago`
  ADD PRIMARY KEY (`idm`),
  ADD KEY `idm` (`idm`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`ido`),
  ADD KEY `ido` (`ido`),
  ADD KEY `idu` (`idu`),
  ADD KEY `idm` (`idm`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idp`),
  ADD KEY `idp` (`idp`);

--
-- Indices de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  ADD PRIMARY KEY (`idr`),
  ADD KEY `idr` (`idr`),
  ADD KEY `idp` (`idp`),
  ADD KEY `idu` (`idu`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idu`),
  ADD KEY `idu` (`idu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle de orden`
--
ALTER TABLE `detalle de orden`
  MODIFY `idd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `idi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `metodos de pago`
--
ALTER TABLE `metodos de pago`
  MODIFY `idm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `ido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  MODIFY `idr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idu` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`idp`) REFERENCES `producto` (`idp`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle de orden`
--
ALTER TABLE `detalle de orden`
  ADD CONSTRAINT `detalle de orden_ibfk_1` FOREIGN KEY (`ido`) REFERENCES `orden` (`ido`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle de orden_ibfk_2` FOREIGN KEY (`idp`) REFERENCES `producto` (`idp`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`idp`) REFERENCES `producto` (`idp`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`idm`) REFERENCES `metodos de pago` (`idm`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orden_ibfk_2` FOREIGN KEY (`idu`) REFERENCES `usuario` (`idu`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `reseñas`
--
ALTER TABLE `reseñas`
  ADD CONSTRAINT `reseñas_ibfk_1` FOREIGN KEY (`idu`) REFERENCES `usuario` (`idu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reseñas_ibfk_2` FOREIGN KEY (`idp`) REFERENCES `producto` (`idp`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
