-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2024 a las 21:35:22
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
-- Base de datos: `vicentita`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(6) NOT NULL,
  `admin_nombre` varchar(60) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_pass` varchar(70) NOT NULL,
  `admin_img` text NOT NULL,
  `admin_ciudad` text NOT NULL,
  `admin_sobre` text NOT NULL,
  `admin_contacto` varchar(40) NOT NULL,
  `admin_trabajo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nombre`, `admin_email`, `admin_pass`, `admin_img`, `admin_ciudad`, `admin_sobre`, `admin_contacto`, `admin_trabajo`) VALUES
(2, 'VicentaAdmin', 'VicentaAdmin@gmail.com', 'Admin2024', 'Imagen de WhatsApp 2024-06-07 a las 11.48.56_1150adfc.jpg', 'Salto', 'Administrador de los productos', '09282828', 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas_texto`
--

CREATE TABLE `cajas_texto` (
  `caja_id` int(3) NOT NULL,
  `caja_titulo` varchar(60) NOT NULL,
  `caja_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cajas_texto`
--

INSERT INTO `cajas_texto` (`caja_id`, `caja_titulo`, `caja_desc`) VALUES
(1, 'Hola', 'Probando caja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `p_id` int(5) NOT NULL,
  `cant` int(3) NOT NULL,
  `talle` varchar(20) NOT NULL,
  `p_precio` int(6) DEFAULT NULL,
  `cliente_id` int(5) NOT NULL,
  `var_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cart`
--

INSERT INTO `cart` (`p_id`, `cant`, `talle`, `p_precio`, `cliente_id`, `var_id`) VALUES
(2, 1, 'L', 500, 9, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `cat_id` int(5) NOT NULL,
  `cat_titulo` text NOT NULL,
  `cat_desc` text NOT NULL,
  `activo` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`cat_id`, `cat_titulo`, `cat_desc`, `activo`) VALUES
(3, 'Nena', 'Aqui encontraras todo tipo de ropa para niñas', 1),
(4, ' Varón ', 'Aqui encontraras todo tipo de ropa para Barones', 1),
(5, 'Recien nacidos', 'Ropita para recién nacidos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupon`
--

CREATE TABLE `cupon` (
  `cupon_id` int(3) NOT NULL,
  `producto_id` int(5) NOT NULL,
  `cupon_titulo` varchar(50) NOT NULL,
  `cupon_precio` varchar(255) NOT NULL,
  `cupon_codigo` varchar(255) NOT NULL,
  `cupon_limite` int(3) NOT NULL,
  `cupon_usado` int(3) NOT NULL,
  `activo` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
--

CREATE TABLE `customer` (
  `cliente_id` int(5) NOT NULL,
  `cliente_nombre` varchar(50) NOT NULL,
  `cliente_email` varchar(70) NOT NULL,
  `cliente_pass` varchar(255) NOT NULL,
  `cliente_ciudad` text NOT NULL,
  `cliente_contacto` varchar(40) NOT NULL,
  `cliente_direccion` text NOT NULL,
  `cliente_img` text NOT NULL,
  `activo` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `customer`
--

INSERT INTO `customer` (`cliente_id`, `cliente_nombre`, `cliente_email`, `cliente_pass`, `cliente_ciudad`, `cliente_contacto`, `cliente_direccion`, `cliente_img`, `activo`) VALUES
(15, 'lauta', 'lau@gmail.com', '1234', 'Salto', '21314', '20', 'FeOm9aUaMAIKm8H.jpeg', 1),
(16, 'lauta', 'unox@gmail.com', '$2y$10$ia/2x18Fb7MNMs1C9hY4Ou6VlhKKsOORBaslWx4hKZWzd77Xvri9y', 'Salto', '213123', '20', 'FeOm9aUaMAIKm8H.jpeg', 1),
(17, 'lauta', 'dos@gmail.com', '$2y$10$/o4czc7GIcXTkAwkAStLk.gNiUcyjlscKCCpoZ3agAfYKmIbbvK1y', 'Rocha', '12312', '20', 'bg.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes_cliente`
--

CREATE TABLE `ordenes_cliente` (
  `orden_id` int(6) NOT NULL,
  `cliente_id` int(5) NOT NULL,
  `monto` int(5) NOT NULL,
  `numero_orden` int(10) NOT NULL,
  `cant` int(10) NOT NULL,
  `tamaño` text NOT NULL,
  `fecha_orden` date NOT NULL,
  `status` text NOT NULL,
  `var_id` int(11) DEFAULT NULL,
  `producto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ordenes_cliente`
--

INSERT INTO `ordenes_cliente` (`orden_id`, `cliente_id`, `monto`, `numero_orden`, `cant`, `tamaño`, `fecha_orden`, `status`, `var_id`, `producto_id`) VALUES
(10, 16, 3000, 886104624, 2, 'M', '2024-11-12', 'Completado', 3, 0),
(11, 16, 1500, 1318910926, 1, 'M', '2024-11-12', 'Pendiente', 3, 0),
(12, 16, 3600, 1318910926, 3, 'S', '2024-11-12', 'Pendiente', 4, 0),
(13, 16, 1200, 1065938713, 1, 'S', '2024-11-13', 'Completado', 4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes_pendientes`
--

CREATE TABLE `ordenes_pendientes` (
  `orden_id` int(5) NOT NULL,
  `cliente_id` int(5) NOT NULL,
  `numero_orden` int(10) NOT NULL,
  `producto_id` text NOT NULL,
  `cant` int(4) NOT NULL,
  `tamaño` text NOT NULL,
  `status` text NOT NULL,
  `var_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ordenes_pendientes`
--

INSERT INTO `ordenes_pendientes` (`orden_id`, `cliente_id`, `numero_orden`, `producto_id`, `cant`, `tamaño`, `status`, `var_id`) VALUES
(7, 16, 983568604, '7', 1, 'S', 'Completado', NULL),
(8, 16, 1093011547, '7', 1, 'M', 'Pendiente', NULL),
(9, 16, 581877771, '7', 1, 'S', 'Completado', NULL),
(10, 16, 886104624, '7', 2, 'M', 'Completado', NULL),
(11, 16, 1318910926, '7', 1, 'M', 'Pendiente', NULL),
(12, 16, 1318910926, '8', 3, 'S', 'Pendiente', NULL),
(13, 16, 1065938713, '8', 1, 'S', 'Completado', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `pago_id` int(5) NOT NULL,
  `orden_id` int(5) NOT NULL,
  `cliente_id` int(5) NOT NULL,
  `numero_factura` int(10) NOT NULL,
  `cantidad` int(4) NOT NULL,
  `metodo_pago` text NOT NULL,
  `fecha_pago` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`pago_id`, `orden_id`, `cliente_id`, `numero_factura`, `cantidad`, `metodo_pago`, `fecha_pago`) VALUES
(10, 0, 0, 983568604, 1200, 'Pago expres', '2024-11-15'),
(17, 0, 0, 581877771, 1200, 'Pago expres', '2024-11-14'),
(18, 0, 0, 581877771, 1200, 'Seleccione metodo de pago', '2024-11-14'),
(19, 0, 0, 581877771, 1200, 'Seleccione metodo de pago', '2024-11-15'),
(20, 0, 0, 581877771, 1200, 'Seleccione metodo de pago', '2024-11-20'),
(21, 0, 0, 581877771, 1200, 'Pago expres', '2024-11-15'),
(22, 0, 0, 581877771, 1200, 'Pago expres', '2024-11-15'),
(23, 0, 0, 886104624, 3000, 'Pago expres', '2024-11-16'),
(24, 0, 0, 1065938713, 1200, 'Pago expres', '2024-11-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `producto_id` int(6) NOT NULL,
  `p_cat_id` int(5) NOT NULL,
  `cat_id` int(5) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `producto_titulo` text NOT NULL,
  `producto_img1` text NOT NULL,
  `producto_img2` text NOT NULL,
  `producto_img3` text NOT NULL,
  `producto_desc` text NOT NULL,
  `producto_keywords` text NOT NULL,
  `producto_etiqueta` text NOT NULL,
  `activo` int(1) DEFAULT 1,
  `stock` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`producto_id`, `p_cat_id`, `cat_id`, `date`, `producto_titulo`, `producto_img1`, `producto_img2`, `producto_img3`, `producto_desc`, `producto_keywords`, `producto_etiqueta`, `activo`, `stock`) VALUES
(6, 3, 3, '2024-11-12 19:09:57', 'Vestido de Nena', 'Imagen de WhatsApp 2024-11-08 a las 20.26.31_8e6e92b7.jpg', 'Imagen de WhatsApp 2024-11-08 a las 20.26.31_f60b52bb.jpg', 'Imagen de WhatsApp 2024-11-08 a las 20.26.32_00628ae0.jpg', '                              \r\n                              conjunto de nena con pollera gris y  buso verde                              \r\n                          ', 'vestido nena', 'New', 1, 0),
(7, 5, 4, '2024-11-12 21:13:16', 'Remera para niño blanca', 'Imagen de WhatsApp 2024-11-08 a las 20.26.30_fb44eb10.jpg', 'Imagen de WhatsApp 2024-11-08 a las 20.40.15_4aab45a6.jpg', 'Imagen de WhatsApp 2024-11-08 a las 20.40.16_eb65b339.jpg', '                              \r\n                                                            \r\n                                                            \r\n                                                            \r\n                                                            \r\n                                                            \r\n                              Remera para nene color blanco                              \r\n                                                        \r\n                                                        \r\n                                                        \r\n                                                        \r\n                                                        \r\n                          ', 'Remera nene blanco', '.sale', 1, 0),
(8, 5, 5, '2024-11-12 19:53:50', 'Producto prueba', 'Imagen de WhatsApp 2024-11-09 a las 13.17.31_ab889610.jpg', 'Imagen de WhatsApp 2024-11-09 a las 13.17.31_9fed26f7.jpg', '', '                              \r\n                              conjunto marron hermoso para verano                              \r\n                          ', 'hola verano', 'sale', 1, 0),
(9, 5, 5, '2024-11-12 19:54:27', 'Producto prueba 2', 'Imagen de WhatsApp 2024-11-09 a las 13.17.32_6e0a4f32.jpg', '', '', '                              \r\n                              probando                              \r\n                          ', 'verano si no', 'sale', 1, 0),
(10, 5, 5, '2024-11-13 00:48:51', 'Mamadera color blanco', 'mam.jpg', 'mam3.jpg', 'mam2.jpg', '                              \r\n                              MMaadera color blanco                              \r\n                          ', 'Mamaderas ', '.', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_categorias`
--

CREATE TABLE `productos_categorias` (
  `p_cat_id` int(5) NOT NULL,
  `p_cat_titulo` text NOT NULL,
  `p_cat_desc` text NOT NULL,
  `activo` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos_categorias`
--

INSERT INTO `productos_categorias` (`p_cat_id`, `p_cat_titulo`, `p_cat_desc`, `activo`) VALUES
(3, 'Conjuntos', 'Conjuntitos hermosos ', 1),
(4, 'Vestidos', 'Vestidos para niñas', 1),
(5, 'Remeras', 'Remeritas todo tipo de talle\r\n', 1),
(6, 'Mamaderas', 'Todo tipo de colores y diseños de mamaderas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(5) NOT NULL,
  `slide_name` varchar(70) NOT NULL,
  `slide_image` text NOT NULL,
  `slider_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`, `slider_url`) VALUES
(2, 'slide 1', 'Imagen de WhatsApp 2024-11-08 a las 20.26.27_21ce5b06.jpg', ''),
(3, 'slide 2', 'Imagen de WhatsApp 2024-11-08 a las 20.26.24_ed29222b.jpg', ''),
(4, 'slide 3', 'Imagen de WhatsApp 2024-11-08 a las 20.26.00_b70f83d4.jpg', ''),
(5, 'slide 4', 'Imagen de WhatsApp 2024-11-08 a las 20.26.28_b1a6804b.jpg', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `variantes`
--

CREATE TABLE `variantes` (
  `var_id` int(5) NOT NULL,
  `producto_id` int(5) NOT NULL,
  `stock_var` int(5) NOT NULL,
  `talle` varchar(3) NOT NULL,
  `precio_var` int(5) NOT NULL,
  `var_precio_of` int(5) NOT NULL,
  `activo` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `variantes`
--

INSERT INTO `variantes` (`var_id`, `producto_id`, `stock_var`, `talle`, `precio_var`, `var_precio_of`, `activo`) VALUES
(2, 7, 20, 'S', 1200, 1100, 1),
(3, 7, 19, 'M', 1500, 1230, 1),
(4, 8, 6, 'S', 1200, 1050, 1),
(5, 9, 0, 'L', 1550, 0, 1),
(6, 10, 10, 'S', 500, 500, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indices de la tabla `cajas_texto`
--
ALTER TABLE `cajas_texto`
  ADD PRIMARY KEY (`caja_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indices de la tabla `cupon`
--
ALTER TABLE `cupon`
  ADD PRIMARY KEY (`cupon_id`);

--
-- Indices de la tabla `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Indices de la tabla `ordenes_cliente`
--
ALTER TABLE `ordenes_cliente`
  ADD PRIMARY KEY (`orden_id`);

--
-- Indices de la tabla `ordenes_pendientes`
--
ALTER TABLE `ordenes_pendientes`
  ADD PRIMARY KEY (`orden_id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`pago_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_id`);

--
-- Indices de la tabla `productos_categorias`
--
ALTER TABLE `productos_categorias`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indices de la tabla `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indices de la tabla `variantes`
--
ALTER TABLE `variantes`
  ADD PRIMARY KEY (`var_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cajas_texto`
--
ALTER TABLE `cajas_texto`
  MODIFY `caja_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `cat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cupon`
--
ALTER TABLE `cupon`
  MODIFY `cupon_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `customer`
--
ALTER TABLE `customer`
  MODIFY `cliente_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `ordenes_cliente`
--
ALTER TABLE `ordenes_cliente`
  MODIFY `orden_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `ordenes_pendientes`
--
ALTER TABLE `ordenes_pendientes`
  MODIFY `orden_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `pago_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `productos_categorias`
--
ALTER TABLE `productos_categorias`
  MODIFY `p_cat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `variantes`
--
ALTER TABLE `variantes`
  MODIFY `var_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
