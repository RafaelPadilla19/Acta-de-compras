-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 29-11-2021 a las 09:11:55
-- Versión del servidor: 8.0.27-0ubuntu0.20.04.1
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `actas_compras`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acta_de_recepcion`
--

CREATE TABLE `acta_de_recepcion` (
  `acta_id` int NOT NULL,
  `hora` varchar(20) DEFAULT NULL,
  `numero_factura` varchar(50) DEFAULT NULL,
  `solicitud_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adjudicacion`
--

CREATE TABLE `adjudicacion` (
  `adjudicacion_id` int NOT NULL,
  `administrador_de_contrato_u_orden_de_compra` varchar(160) NOT NULL,
  `cargo_de_administrador_de_contrato` varchar(60) NOT NULL,
  `solicitud_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_presupuestaria`
--

CREATE TABLE `asignacion_presupuestaria` (
  `asignacion_id` int NOT NULL,
  `proyecto` varchar(200) NOT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `numero_solicitud_modificacion` varchar(100) NOT NULL,
  `fuente_de_financiamiento` varchar(130) NOT NULL,
  `recibo_en_presupuesto_por` varchar(140) NOT NULL,
  `cargo` varchar(120) NOT NULL,
  `solicitud_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_de_compra`
--

CREATE TABLE `orden_de_compra` (
  `orden_compra_id` int NOT NULL,
  `lugar` varchar(150) NOT NULL,
  `proveedor_id` int DEFAULT NULL,
  `solicitud_id` int DEFAULT NULL,
  `observaciones` varchar(200) NOT NULL,
  `fecha_de_entrega` date NOT NULL,
  `nombre_completo_jefe_uaci` varchar(200) NOT NULL,
  `telefono_alcaldia` varchar(12) NOT NULL,
  `correo_alcaldia` varchar(70) NOT NULL,
  `tipo_documento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `producto_id` int NOT NULL,
  `nombre_producto` varchar(120) NOT NULL,
  `cantidad` int NOT NULL,
  `unidad_medida` varchar(100) NOT NULL,
  `cifra_presupuestada` decimal(16,2) NOT NULL,
  `costo_unitario` decimal(15,2) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `solicitud_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propuesta_orden_de_compras`
--

CREATE TABLE `propuesta_orden_de_compras` (
  `orden_id` int NOT NULL,
  `nombre_administrador_contrato` varchar(150) NOT NULL,
  `cargo_administrador_contrato` varchar(80) NOT NULL,
  `dependencia` varchar(80) NOT NULL,
  `nombre_recibido_por` varchar(160) NOT NULL,
  `cargo_de_recibido` varchar(80) NOT NULL,
  `solicitud_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `proveedor_id` int NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `direccion` varchar(140) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `correo` varchar(70) DEFAULT NULL,
  `ncr_dui` varchar(16) DEFAULT NULL,
  `nit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_requerimientos`
--

CREATE TABLE `solicitud_requerimientos` (
  `solicitud_id` int NOT NULL,
  `fecha` date NOT NULL,
  `nombre_solicitante` varchar(130) NOT NULL,
  `dependencia_solicitante` varchar(70) NOT NULL,
  `cargo_solicitante` varchar(70) NOT NULL,
  `nombre_autorizante` varchar(130) NOT NULL,
  `dependencia_autorizante` varchar(70) NOT NULL,
  `cargo_autorizante` varchar(70) NOT NULL,
  `valor_compra` decimal(16,2) NOT NULL,
  `forma_entrega` varchar(100) NOT NULL,
  `lugar_entrega` varchar(150) NOT NULL,
  `destino_de_bien` varchar(150) NOT NULL,
  `estado` varchar(50) NOT NULL DEFAULT 'pendiente',
  `amsj` varchar(6) NOT NULL,
  `departamento_solicitante` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario`, `clave`) VALUES
(1, 'admin', '8cb2237d0679ca88db6464eac60da96345513964');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acta_de_recepcion`
--
ALTER TABLE `acta_de_recepcion`
  ADD PRIMARY KEY (`acta_id`),
  ADD KEY `solicitud_id` (`solicitud_id`);

--
-- Indices de la tabla `adjudicacion`
--
ALTER TABLE `adjudicacion`
  ADD PRIMARY KEY (`adjudicacion_id`),
  ADD KEY `solicitud_id` (`solicitud_id`);

--
-- Indices de la tabla `asignacion_presupuestaria`
--
ALTER TABLE `asignacion_presupuestaria`
  ADD PRIMARY KEY (`asignacion_id`),
  ADD KEY `solicitud_id` (`solicitud_id`);

--
-- Indices de la tabla `orden_de_compra`
--
ALTER TABLE `orden_de_compra`
  ADD PRIMARY KEY (`orden_compra_id`),
  ADD KEY `proveedor_id` (`proveedor_id`),
  ADD KEY `solicitud_id` (`solicitud_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `solicitud_id` (`solicitud_id`);

--
-- Indices de la tabla `propuesta_orden_de_compras`
--
ALTER TABLE `propuesta_orden_de_compras`
  ADD PRIMARY KEY (`orden_id`),
  ADD KEY `solicitud_id` (`solicitud_id`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`proveedor_id`);

--
-- Indices de la tabla `solicitud_requerimientos`
--
ALTER TABLE `solicitud_requerimientos`
  ADD PRIMARY KEY (`solicitud_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acta_de_recepcion`
--
ALTER TABLE `acta_de_recepcion`
  MODIFY `acta_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `adjudicacion`
--
ALTER TABLE `adjudicacion`
  MODIFY `adjudicacion_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `asignacion_presupuestaria`
--
ALTER TABLE `asignacion_presupuestaria`
  MODIFY `asignacion_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `orden_de_compra`
--
ALTER TABLE `orden_de_compra`
  MODIFY `orden_compra_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `propuesta_orden_de_compras`
--
ALTER TABLE `propuesta_orden_de_compras`
  MODIFY `orden_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `proveedor_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `solicitud_requerimientos`
--
ALTER TABLE `solicitud_requerimientos`
  MODIFY `solicitud_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acta_de_recepcion`
--
ALTER TABLE `acta_de_recepcion`
  ADD CONSTRAINT `acta_de_recepcion_ibfk_1` FOREIGN KEY (`solicitud_id`) REFERENCES `solicitud_requerimientos` (`solicitud_id`);

--
-- Filtros para la tabla `adjudicacion`
--
ALTER TABLE `adjudicacion`
  ADD CONSTRAINT `adjudicacion_ibfk_1` FOREIGN KEY (`solicitud_id`) REFERENCES `solicitud_requerimientos` (`solicitud_id`);

--
-- Filtros para la tabla `asignacion_presupuestaria`
--
ALTER TABLE `asignacion_presupuestaria`
  ADD CONSTRAINT `asignacion_presupuestaria_ibfk_1` FOREIGN KEY (`solicitud_id`) REFERENCES `solicitud_requerimientos` (`solicitud_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `orden_de_compra`
--
ALTER TABLE `orden_de_compra`
  ADD CONSTRAINT `orden_de_compra_ibfk_1` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedor` (`proveedor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orden_de_compra_ibfk_2` FOREIGN KEY (`solicitud_id`) REFERENCES `solicitud_requerimientos` (`solicitud_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`solicitud_id`) REFERENCES `solicitud_requerimientos` (`solicitud_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `propuesta_orden_de_compras`
--
ALTER TABLE `propuesta_orden_de_compras`
  ADD CONSTRAINT `propuesta_orden_de_compras_ibfk_1` FOREIGN KEY (`solicitud_id`) REFERENCES `solicitud_requerimientos` (`solicitud_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
