-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2024 a las 19:32:20
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
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` int(255) NOT NULL,
  `cant` int(10) NOT NULL,
  `talle` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `cat_id` int(10) NOT NULL,
  `cat_titulo` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`cat_id`, `cat_titulo`, `cat_desc`) VALUES
(1, 'queseso', 'queseso'),
(2, 'anachuchu', 'anachuchu'),
(3, 'Niñas', 'Aqui encontraras todo tipo de ropa para niñas'),
(4, 'Niños', 'Aqui encontraras todo tipo de ropa para niños');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
--

CREATE TABLE `customer` (
  `cliente_id` int(11) NOT NULL,
  `cliente_nombre` varchar(255) NOT NULL,
  `cliente_email` varchar(255) NOT NULL,
  `cliente_pass` varchar(255) NOT NULL,
  `cliente_ciudad` text NOT NULL,
  `cliente_contacto` varchar(255) NOT NULL,
  `cliente_direccion` text NOT NULL,
  `cliente_img` text NOT NULL,
  `cliente_ip` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `customer`
--

INSERT INTO `customer` (`cliente_id`, `cliente_nombre`, `cliente_email`, `cliente_pass`, `cliente_ciudad`, `cliente_contacto`, `cliente_direccion`, `cliente_img`, `cliente_ip`) VALUES
(1, 'prueba', 'prueba@mail.com', 'prueba', 'cielo', '21343214241', '', '1-TpRZz7_400x400.jpg', '::1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes_cliente`
--

CREATE TABLE `ordenes_cliente` (
  `orden_id` int(11) NOT NULL,
  `cliente_id` int(10) NOT NULL,
  `monto` int(100) NOT NULL,
  `numero_orden` int(100) NOT NULL,
  `cant` int(10) NOT NULL,
  `tamaño` text NOT NULL,
  `fecha_orden` date NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes_pendientes`
--

CREATE TABLE `ordenes_pendientes` (
  `orden_id` int(10) NOT NULL,
  `cliente_id` int(10) NOT NULL,
  `numero_orden` int(10) NOT NULL,
  `producto_id` text NOT NULL,
  `cant` int(10) NOT NULL,
  `tamaño` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `producto_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `producto_titulo` text NOT NULL,
  `producto_img1` text NOT NULL,
  `producto_img2` text NOT NULL,
  `producto_img3` text NOT NULL,
  `producto_precio` int(11) NOT NULL,
  `producto_desc` text NOT NULL,
  `producto_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`producto_id`, `p_cat_id`, `cat_id`, `date`, `producto_titulo`, `producto_img1`, `producto_img2`, `producto_img3`, `producto_precio`, `producto_desc`, `producto_keywords`) VALUES
(2, 1, 0, '2024-09-17 01:29:49', 'conjunto del paris', 'images.jpeg', 'images.jpeg', 'images.jpeg', 321, 'si', 'nashe'),
(3, 3, 0, '2024-09-22 21:45:46', 'Vestido ', 'Imagen de WhatsApp 2024-09-19 a las 20.32.46_79c7bb40.jpg', 'Imagen de WhatsApp 2024-09-19 a las 20.32.46_3789a4ad.jpg', 'Imagen de WhatsApp 2024-09-19 a las 20.32.46_b206d4c8.jpg', 1000, 'Vestido de niña con puntos ', 'vest_niña'),
(4, 4, 0, '2024-09-24 02:27:08', 'Producto prueba', 'Imagen de WhatsApp 2024-09-19 a las 20.32.46_79c7bb40.jpg', 'Imagen de WhatsApp 2024-09-19 a las 20.32.45_d7e31dd9.jpg', 'Imagen de WhatsApp 2024-09-19 a las 20.32.45_fd2f8bcc.jpg', 2344, 'Descripción prueba', 'hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_categorias`
--

CREATE TABLE `productos_categorias` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_titulo` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos_categorias`
--

INSERT INTO `productos_categorias` (`p_cat_id`, `p_cat_titulo`, `p_cat_desc`) VALUES
(1, 'chuchuua', 'chuchuua'),
(2, 'tumbalacasamami', 'tumbalacasamami'),
(3, 'Conjuntos', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aut sapiente sunt quae modi, possimus maxime iusto impedit harum incidunt nostrum quibusdam reprehenderit voluptas? Animi quam ullam in exercitationem eius. Iure!'),
(4, 'Vestidos', 'Vestidos para niñas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`) VALUES
(1, 'slide number 1', '*pegar imagen del slide 1 y sucesivamente*');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cat_id`);

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
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `customer`
--
ALTER TABLE `customer`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ordenes_cliente`
--
ALTER TABLE `ordenes_cliente`
  MODIFY `orden_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ordenes_pendientes`
--
ALTER TABLE `ordenes_pendientes`
  MODIFY `orden_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos_categorias`
--
ALTER TABLE `productos_categorias`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
