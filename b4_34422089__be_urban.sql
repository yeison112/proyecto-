-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2023 a las 22:39:23
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `b4_34422089__be_urban`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pedidos`
--

CREATE TABLE `tbl_pedidos` (
  `ped__id_pedidos` int(11) NOT NULL,
  `ped__identificacion_cliente` int(11) NOT NULL,
  `ped__fecha_pedido` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Tabla en la cual se registran los productos';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pqr`
--

CREATE TABLE `tbl_pqr` (
  `pqr__id_pqr` int(11) NOT NULL,
  `pqr__identificacion_solicitante` int(11) NOT NULL,
  `pqr__tipo_pqr` int(11) NOT NULL,
  `pqr__fecha_pqr` timestamp NOT NULL DEFAULT current_timestamp(),
  `pqr__descripcion` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Tabla en la cual se guardan los PQR';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productos`
--

CREATE TABLE `tbl_productos` (
  `prdct__id_producto` int(11) NOT NULL,
  `prdct__nombre` varchar(256) NOT NULL,
  `prdct__descripcion` varchar(512) NOT NULL,
  `prdct__imagen` longblob NOT NULL,
  `prdct__precio` int(11) NOT NULL,
  `prdct__cantidad` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Tabla en la cual se guarda registro de cada producto';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productos_pedido`
--

CREATE TABLE `tbl_productos_pedido` (
  `prdct_ped__id_producto_pedido` int(11) NOT NULL,
  `prdct_ped__nro_pedido` int(11) NOT NULL,
  `prdct_ped__producto` int(11) NOT NULL,
  `prdct_ped__cant_producto` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Indica los productos y la cantidad de cada uno por pedido';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipos_pqr`
--

CREATE TABLE `tbl_tipos_pqr` (
  `t_pqr__id_tipos_pqr` int(11) NOT NULL,
  `t_pqr__tipos_pqr` enum('Pregunta','Queja','Reclamo','Sugerencia') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Tabla en la cual se muestran los tipos de PQR que hay';

--
-- Volcado de datos para la tabla `tbl_tipos_pqr`
--

INSERT INTO `tbl_tipos_pqr` (`t_pqr__id_tipos_pqr`, `t_pqr__tipos_pqr`) VALUES
(1, 'Pregunta'),
(2, 'Queja'),
(3, 'Reclamo'),
(4, 'Sugerencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipos_usuarios`
--

CREATE TABLE `tbl_tipos_usuarios` (
  `t_usr__id_tipos_usuarios` int(11) NOT NULL,
  `t_usr__tipos_usuarios` enum('Cliente','Vendedor','Asesor','Administrador') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tbl_tipos_usuarios`
--

INSERT INTO `tbl_tipos_usuarios` (`t_usr__id_tipos_usuarios`, `t_usr__tipos_usuarios`) VALUES
(1, 'Cliente'),
(2, 'Vendedor'),
(3, 'Asesor'),
(4, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `user_id` bigint(11) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `usr__nombre` varchar(60) NOT NULL,
  `usr__apellido` varchar(60) NOT NULL,
  `usr__contrasena` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_pedidos`
--
ALTER TABLE `tbl_pedidos`
  ADD PRIMARY KEY (`ped__id_pedidos`),
  ADD KEY `ped__identificacion_cliente` (`ped__identificacion_cliente`);

--
-- Indices de la tabla `tbl_pqr`
--
ALTER TABLE `tbl_pqr`
  ADD PRIMARY KEY (`pqr__id_pqr`),
  ADD KEY `pqr__tipo_pqr` (`pqr__tipo_pqr`),
  ADD KEY `pqr__identificacion_solicitante` (`pqr__identificacion_solicitante`);

--
-- Indices de la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  ADD PRIMARY KEY (`prdct__id_producto`);

--
-- Indices de la tabla `tbl_productos_pedido`
--
ALTER TABLE `tbl_productos_pedido`
  ADD PRIMARY KEY (`prdct_ped__id_producto_pedido`),
  ADD KEY `prdct_ped__nro_pedido` (`prdct_ped__nro_pedido`),
  ADD KEY `prdct_ped__producto` (`prdct_ped__producto`);

--
-- Indices de la tabla `tbl_tipos_pqr`
--
ALTER TABLE `tbl_tipos_pqr`
  ADD PRIMARY KEY (`t_pqr__id_tipos_pqr`);

--
-- Indices de la tabla `tbl_tipos_usuarios`
--
ALTER TABLE `tbl_tipos_usuarios`
  ADD PRIMARY KEY (`t_usr__id_tipos_usuarios`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_pedidos`
--
ALTER TABLE `tbl_pedidos`
  MODIFY `ped__id_pedidos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_pqr`
--
ALTER TABLE `tbl_pqr`
  MODIFY `pqr__id_pqr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  MODIFY `prdct__id_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_productos_pedido`
--
ALTER TABLE `tbl_productos_pedido`
  MODIFY `prdct_ped__id_producto_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_tipos_pqr`
--
ALTER TABLE `tbl_tipos_pqr`
  MODIFY `t_pqr__id_tipos_pqr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_tipos_usuarios`
--
ALTER TABLE `tbl_tipos_usuarios`
  MODIFY `t_usr__id_tipos_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
