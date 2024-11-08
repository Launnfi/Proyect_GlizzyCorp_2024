-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2024 a las 02:44:07
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
  `admin_pass` varchar(30) NOT NULL,
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
(1, 'Vicenta', 'vicenta@gmail.com', 'Admin2024', '', 'Salto', 'Ejemplo', '091221341', 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas_texto`
--

CREATE TABLE `cajas_texto` (
  `caja_id` int(3) NOT NULL,
  `caja_titulo` varchar(60) NOT NULL,
  `Caja_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `p_id` int(5) NOT NULL,
  `cant` int(3) NOT NULL,
  `talle` varchar(3) NOT NULL,
  `p_precio` int(6) DEFAULT NULL,
  `cliente_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, '   queseso   ', 'queseso', 1),
(2, 'anachuchu', 'anachuchu', 1),
(3, 'Niñas', 'Aqui encontraras todo tipo de ropa para niñas', 1),
(4, 'Niños', 'Aqui encontraras todo tipo de ropa para niños', 1);

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

--
-- Volcado de datos para la tabla `cupon`
--

INSERT INTO `cupon` (`cupon_id`, `producto_id`, `cupon_titulo`, `cupon_precio`, `cupon_codigo`, `cupon_limite`, `cupon_usado`, `activo`) VALUES
(1, 2, 'hola', '500', 'HACAS', -1, 0, 0),
(2, 3, 'sas', '500', 'HACAS4', 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
--

CREATE TABLE `customer` (
  `cliente_id` int(5) NOT NULL,
  `cliente_nombre` varchar(50) NOT NULL,
  `cliente_email` varchar(70) NOT NULL,
  `cliente_pass` varchar(30) NOT NULL,
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
(1, 'prueba', 'prueba@mail.com', 'prueba', 'cielo', '21343214241', '', '1-TpRZz7_400x400.jpg', 1),
(2, 'prueba', 'prueba@mail.com', '1234', 'cielo', '21343214241', '', '1f379f720243a065247e03e70cdacf6c.jpg', 1),
(3, 'lauta', 'lau@gmail.com', '81dc9bdb52d04dc20036dbd8313ed0', 'Salto', '213213', '20', 'FeOm9aUaMAIKm8H.jpeg', 1),
(5, 'homero', 'uno@gmail.com', '$2y$10$cR.TZyC6RRALR./dEjrdeun', 'Salto', '213213', '20', 'homero.jpg', 1),
(6, 'lauta', '1@gmail.com', '$2y$10$cDqAdGsn5/7sdOEP3M2yk.U', 'Salto', '1234', '20', 'homero.jpg', 1),
(7, 'anashe', 'nashe@gmail.com', '$2y$10$9q6ni6MOD4qJUz/uVHVMUeZ', 'Salto', '1234', '20', 'bg.jpg', 1),
(8, 'lauta', 'vicenta@gmail.com', '$2y$10$Yia.D2/LWBtBahF7uIk2Fuo', 'Salto', '123451', '20', 'Imagen de WhatsApp 2024-06-07 a las 11.48.56_1150adfc.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manufacturerias`
--

CREATE TABLE `manufacturerias` (
  `manufactureria_id` int(11) NOT NULL,
  `manufactureria_titulo` text NOT NULL,
  `manufactureria_top` text NOT NULL,
  `manufactureria_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ordenes_cliente`
--

INSERT INTO `ordenes_cliente` (`orden_id`, `cliente_id`, `monto`, `numero_orden`, `cant`, `tamaño`, `fecha_orden`, `status`) VALUES
(1, 3, 321, 1540108262, 1, '0', '2024-11-05', 'Completado'),
(2, 3, 2344, 1322230063, 1, 'M', '2024-11-05', 'Pendiente'),
(3, 5, 2344, 712475282, 1, 'S', '2024-11-06', 'Pendiente'),
(4, 5, 1000, 712475282, 1, 'M', '2024-11-06', 'Pendiente'),
(5, 5, 1000, 284251098, 1, 'M', '2024-11-06', 'Pendiente'),
(6, 5, 1000, 284251098, 1, 'L', '2024-11-06', 'Completado');

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
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ordenes_pendientes`
--

INSERT INTO `ordenes_pendientes` (`orden_id`, `cliente_id`, `numero_orden`, `producto_id`, `cant`, `tamaño`, `status`) VALUES
(2, 3, 1322230063, '4', 1, 'M', 'Pendiente'),
(3, 5, 712475282, '4', 1, 'S', 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `pago_id` int(5) NOT NULL,
  `numero_factura` int(10) NOT NULL,
  `cantidad` int(4) NOT NULL,
  `metodo_pago` text NOT NULL,
  `num_ref` int(10) NOT NULL,
  `fecha_pago` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`pago_id`, `numero_factura`, `cantidad`, `metodo_pago`, `num_ref`, `fecha_pago`) VALUES
(1, 1540108262, 321, 'Seleccione metodo de pago', 321, '2024-10-29'),
(2, 1540108262, 321, 'Visa', 321, '2024-10-29'),
(3, 1540108262, 321, 'Visa', 321, '2024-10-29'),
(4, 1756998745, 1, 'Pago expres', 321, '3213');

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
  `producto_precio` int(5) NOT NULL,
  `producto_desc` text NOT NULL,
  `producto_keywords` text NOT NULL,
  `producto_etiqueta` text NOT NULL,
  `producto_oferta` int(5) NOT NULL,
  `activo` int(1) DEFAULT 1,
  `stock` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`producto_id`, `p_cat_id`, `cat_id`, `date`, `producto_titulo`, `producto_img1`, `producto_img2`, `producto_img3`, `producto_precio`, `producto_desc`, `producto_keywords`, `producto_etiqueta`, `producto_oferta`, `activo`, `stock`) VALUES
(2, 1, 0, '2024-11-07 00:18:04', 'conjunto del paris', 'images.jpeg', 'images.jpeg', 'images.jpeg', 321, '                              \r\n                                                            \r\n                                                            \r\n                              si                              \r\n                                                        \r\n                                                        \r\n                          ', 'nashe', 'sale', 0, 0, 0),
(3, 3, 0, '2024-11-04 21:05:05', 'Vestido ', 'Imagen de WhatsApp 2024-09-19 a las 20.32.46_79c7bb40.jpg', 'Imagen de WhatsApp 2024-09-19 a las 20.32.46_3789a4ad.jpg', 'Imagen de WhatsApp 2024-09-19 a las 20.32.46_b206d4c8.jpg', 1000, 'Vestido de niña con puntos ', 'vest_niña', 'sale', 0, 1, 0),
(4, 4, 0, '2024-11-04 21:05:08', 'Producto prueba', 'Imagen de WhatsApp 2024-09-19 a las 20.32.46_79c7bb40.jpg', 'Imagen de WhatsApp 2024-09-19 a las 20.32.45_d7e31dd9.jpg', 'Imagen de WhatsApp 2024-09-19 a las 20.32.45_fd2f8bcc.jpg', 2344, 'Descripción prueba', 'hola', 'sale', 0, 1, 0);

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
(1, 'chuchuua', 'chuchuua', 1),
(2, 'tumbalacasamami', 'tumbalacasamami', 1),
(3, 'Conjuntos', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aut sapiente sunt quae modi, possimus maxime iusto impedit harum incidunt nostrum quibusdam reprehenderit voluptas? Animi quam ullam in exercitationem eius. Iure!', 1),
(4, 'Vestidos', 'Vestidos para niñas', 1);

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
(1, 'slide number 1', '*pegar imagen del slide 1 y sucesivamente*', '');

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
-- Indices de la tabla `manufacturerias`
--
ALTER TABLE `manufacturerias`
  ADD PRIMARY KEY (`manufactureria_id`);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cajas_texto`
--
ALTER TABLE `cajas_texto`
  MODIFY `caja_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `cat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cupon`
--
ALTER TABLE `cupon`
  MODIFY `cupon_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `customer`
--
ALTER TABLE `customer`
  MODIFY `cliente_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `manufacturerias`
--
ALTER TABLE `manufacturerias`
  MODIFY `manufactureria_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ordenes_cliente`
--
ALTER TABLE `ordenes_cliente`
  MODIFY `orden_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ordenes_pendientes`
--
ALTER TABLE `ordenes_pendientes`
  MODIFY `orden_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `pago_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos_categorias`
--
ALTER TABLE `productos_categorias`
  MODIFY `p_cat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

--
-- Creacion de usuarios -- 
--

--Usuario Admin --
CREATE USER 'admin_vicentita'@'localhost' IDENTIFIED BY 'admin_password';
GRANT ALL PRIVILEGES ON vicentita.* TO 'admin_vicentita'@'localhost';
FLUSH PRIVILEGES;

--Usuario Cliente --

CREATE USER 'cliente_vicentita'@'localhost' IDENTIFIED BY 'cliente_password';
GRANT SELECT ON vicentita.productos TO 'cliente_vicentita'@'localhost';
GRANT SELECT ON vicentita.categorias TO 'cliente_vicentita'@'localhost';
GRANT SELECT ON vicentita.productos_categorias TO 'cliente_vicentita'@'localhost';
FLUSH PRIVILEGES;

--Usuario para gestionar productos (solo lectura y escritura en las tablas relacionadas con productos)--

CREATE USER 'product_manager'@'localhost' IDENTIFIED BY 'product_password';
GRANT SELECT, INSERT, UPDATE, DELETE ON vicentita.productos TO 'product_manager'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON vicentita.categorias TO 'product_manager'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON vicentita.productos_categorias TO 'product_manager'@'localhost';
FLUSH PRIVILEGES;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
