-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-02-2025 a las 02:08:30
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectofinal`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_REGISTRARUSUARIO` (IN `p_Documento` VARCHAR(50), IN `p_NombreCompleto` VARCHAR(100), IN `p_Correo` VARCHAR(100), IN `p_Clave` VARCHAR(100), IN `p_IdRol` INT, IN `p_Estado` TINYINT, OUT `p_IdUsuarioResultado` INT, OUT `p_Mensaje` VARCHAR(500))   BEGIN
    SET p_IdUsuarioResultado = 0;
    SET p_Mensaje = '';

    IF NOT EXISTS (SELECT * FROM USUARIO WHERE Documento = p_Documento) THEN
        INSERT INTO USUARIO(Documento, NombreCompleto, Correo, Clave, IdRol, Estado) 
        VALUES (p_Documento, p_NombreCompleto, p_Correo, p_Clave, p_IdRol, p_Estado);
        SET p_IdUsuarioResultado = LAST_INSERT_ID();
    ELSE
        SET p_Mensaje = 'No se puede repetir el documento para más de un usuario';
    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `IdCategoria` int(11) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`IdCategoria`, `Descripcion`, `Estado`, `FechaRegistro`) VALUES
(1, 'Whiskey', 1, '2025-02-03 19:52:56'),
(2, 'Vodka', 1, '2025-02-03 19:52:56'),
(3, 'Tequila', 1, '2025-02-03 19:52:56'),
(4, 'Ron', 1, '2025-02-03 19:52:56'),
(5, 'Ginebra', 1, '2025-02-03 19:52:56'),
(6, 'Vino Tinto', 1, '2025-02-03 19:52:56'),
(7, 'Vino Blanco', 1, '2025-02-03 19:52:56'),
(8, 'Cerveza', 1, '2025-02-03 19:52:56'),
(9, 'Champán', 1, '2025-02-03 19:52:56'),
(10, 'Vino Espumoso', 1, '2025-02-03 19:52:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `IdCliente` int(11) NOT NULL,
  `Documento` varchar(50) DEFAULT NULL,
  `NombreCompleto` varchar(50) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `Telefono` varchar(50) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `IdCompra` int(11) NOT NULL,
  `IdUsuario` int(11) DEFAULT NULL,
  `IdProveedor` int(11) DEFAULT NULL,
  `TipoDocumento` varchar(50) DEFAULT NULL,
  `NumeroDocumento` varchar(50) DEFAULT NULL,
  `MontoTotal` decimal(10,2) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `IdDetalleCompra` int(11) NOT NULL,
  `IdCompra` int(11) DEFAULT NULL,
  `IdProducto` int(11) DEFAULT NULL,
  `PrecioCompra` decimal(10,2) DEFAULT 0.00,
  `PrecioVenta` decimal(10,2) DEFAULT 0.00,
  `Cantidad` int(11) DEFAULT NULL,
  `MontoTotal` decimal(10,2) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `IdDetalleVenta` int(11) NOT NULL,
  `IdVenta` int(11) DEFAULT NULL,
  `IdProducto` int(11) DEFAULT NULL,
  `PrecioVenta` decimal(10,2) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `SubTotal` decimal(10,2) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `negocio`
--

CREATE TABLE `negocio` (
  `IdNegocio` int(11) NOT NULL,
  `Nombre` varchar(60) DEFAULT NULL,
  `RUC` varchar(60) DEFAULT NULL,
  `Direccion` varchar(60) DEFAULT NULL,
  `Logo` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `negocio`
--

INSERT INTO `negocio` (`IdNegocio`, `Nombre`, `RUC`, `Direccion`, `Logo`) VALUES
(1, 'Codigo Estudiante', '20202020', 'av. codigo estudiante 123', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `IdPermiso` int(11) NOT NULL,
  `IdRol` int(11) DEFAULT NULL,
  `NombreMenu` varchar(100) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`IdPermiso`, `IdRol`, `NombreMenu`, `FechaRegistro`) VALUES
(1, 1, 'menuusuarios', '2025-02-03 19:52:56'),
(2, 1, 'menumantenedor', '2025-02-03 19:52:56'),
(3, 1, 'menuventas', '2025-02-03 19:52:56'),
(4, 1, 'menucompras', '2025-02-03 19:52:56'),
(5, 1, 'menuclientes', '2025-02-03 19:52:56'),
(6, 1, 'menuproveedores', '2025-02-03 19:52:56'),
(7, 1, 'menureportes', '2025-02-03 19:52:56'),
(8, 1, 'menuacercade', '2025-02-03 19:52:56'),
(9, 2, 'menuventas', '2025-02-03 19:52:56'),
(10, 2, 'menucompras', '2025-02-03 19:52:56'),
(11, 2, 'menuclientes', '2025-02-03 19:52:56'),
(12, 2, 'menuproveedores', '2025-02-03 19:52:56'),
(13, 2, 'menuacercade', '2025-02-03 19:52:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `IdProducto` int(11) NOT NULL,
  `Codigo` varchar(50) DEFAULT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(50) DEFAULT NULL,
  `IdCategoria` int(11) DEFAULT NULL,
  `Stock` int(11) NOT NULL DEFAULT 0,
  `PrecioCompra` decimal(10,2) DEFAULT 0.00,
  `PrecioVenta` decimal(10,2) DEFAULT 0.00,
  `Estado` tinyint(1) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`IdProducto`, `Codigo`, `Nombre`, `Descripcion`, `IdCategoria`, `Stock`, `PrecioCompra`, `PrecioVenta`, `Estado`, `FechaRegistro`) VALUES
(1, 'P001', 'Whiskey Jack Daniels', 'Whiskey', 1, 100, 0.00, 25.99, 1, '2025-02-03 19:52:56'),
(2, 'P002', 'Vodka Absolut', 'Vodka', 1, 150, 0.00, 18.99, 1, '2025-02-03 19:52:56'),
(3, 'P003', 'Tequila Don Julio', 'Tequila', 1, 80, 0.00, 35.50, 1, '2025-02-03 19:52:56'),
(4, 'P004', 'Ron Bacardi', 'Ron', 1, 120, 0.00, 15.75, 1, '2025-02-03 19:52:56'),
(5, 'P005', 'Ginebra Tanqueray', 'Ginebra', 1, 90, 0.00, 22.00, 1, '2025-02-03 19:52:56'),
(6, 'P006', 'Vino Tinto Cabernet Sauvignon', 'Vino Tinto', 2, 200, 0.00, 12.99, 1, '2025-02-03 19:52:56'),
(7, 'P007', 'Vino Blanco Chardonnay', 'Vino Blanco', 2, 180, 0.00, 11.50, 1, '2025-02-03 19:52:56'),
(8, 'P008', 'Cerveza Corona', 'Cerveza', 3, 500, 0.00, 1.50, 1, '2025-02-03 19:52:56'),
(9, 'P009', 'Cerveza Heineken', 'Cerveza', 3, 450, 0.00, 1.75, 1, '2025-02-03 19:52:56'),
(10, 'P010', 'Cerveza Budweiser', 'Cerveza', 3, 400, 0.00, 1.60, 1, '2025-02-03 19:52:56'),
(11, 'P011', 'Champán Moet & Chandon', 'Champán', 4, 50, 0.00, 45.00, 1, '2025-02-03 19:52:56'),
(12, 'P012', 'Whiskey Chivas Regal', 'Whiskey', 1, 70, 0.00, 30.99, 1, '2025-02-03 19:52:56'),
(13, 'P013', 'Vodka Grey Goose', 'Vodka', 1, 60, 0.00, 40.00, 1, '2025-02-03 19:52:56'),
(14, 'P014', 'Tequila José Cuervo', 'Tequila', 1, 110, 0.00, 20.50, 1, '2025-02-03 19:52:56'),
(15, 'P015', 'Ron Havana Club', 'Ron', 1, 100, 0.00, 17.50, 1, '2025-02-03 19:52:56'),
(16, 'P016', 'Ginebra Bombay Sapphire', 'Ginebra', 1, 85, 0.00, 25.00, 1, '2025-02-03 19:52:56'),
(17, 'P017', 'Vino Espumoso Prosecco', 'Vino Espumoso', 2, 140, 0.00, 13.75, 1, '2025-02-03 19:52:56'),
(18, 'P018', 'Cerveza Stella Artois', 'Cerveza', 3, 420, 0.00, 1.80, 1, '2025-02-03 19:52:56'),
(19, 'P019', 'Cerveza Modelo Especial', 'Cerveza', 3, 390, 0.00, 1.70, 1, '2025-02-03 19:52:56'),
(20, 'P020', 'Whiskey Glenfiddich', 'Whiskey', 1, 40, 0.00, 50.00, 1, '2025-02-03 19:52:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `IdProveedor` int(11) NOT NULL,
  `Documento` varchar(50) DEFAULT NULL,
  `RazonSocial` varchar(50) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `Telefono` varchar(50) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`IdProveedor`, `Documento`, `RazonSocial`, `Correo`, `Telefono`, `Estado`, `FechaRegistro`) VALUES
(1, '123456789', 'Proveedor Uno', 'proveedoruno@example.com', '123456789', 1, '2025-02-03 19:52:56'),
(2, '987654321', 'Proveedor Dos', 'proveedordos@example.com', '987654321', 1, '2025-02-03 19:52:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `IdRol` int(11) NOT NULL,
  `Descripcion` varchar(50) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`IdRol`, `Descripcion`, `FechaRegistro`) VALUES
(1, 'ADMINISTRADOR', '2025-02-03 19:52:56'),
(2, 'EMPLEADO', '2025-02-03 19:52:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL,
  `Documento` varchar(50) DEFAULT NULL,
  `NombreCompleto` varchar(50) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `Clave` varchar(50) DEFAULT NULL,
  `IdRol` int(11) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `Documento`, `NombreCompleto`, `Correo`, `Clave`, `IdRol`, `Estado`, `FechaRegistro`) VALUES
(1, '101010', 'ADMIN', '@GMAIL.COM', '123', 1, 1, '2025-02-03 19:52:56'),
(2, '20', 'EMPLEADO', '@GMAIL.COM', '456', 2, 1, '2025-02-03 19:52:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `IdVenta` int(11) NOT NULL,
  `IdUsuario` int(11) DEFAULT NULL,
  `TipoDocumento` varchar(50) DEFAULT NULL,
  `NumeroDocumento` varchar(50) DEFAULT NULL,
  `DocumentoCliente` varchar(50) DEFAULT NULL,
  `NombreCliente` varchar(100) DEFAULT NULL,
  `MontoPago` decimal(10,2) DEFAULT NULL,
  `MontoCambio` decimal(10,2) DEFAULT NULL,
  `MontoTotal` decimal(10,2) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`IdCategoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`IdCompra`),
  ADD KEY `IdUsuario` (`IdUsuario`),
  ADD KEY `IdProveedor` (`IdProveedor`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`IdDetalleCompra`),
  ADD KEY `IdCompra` (`IdCompra`),
  ADD KEY `IdProducto` (`IdProducto`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`IdDetalleVenta`),
  ADD KEY `IdVenta` (`IdVenta`),
  ADD KEY `IdProducto` (`IdProducto`);

--
-- Indices de la tabla `negocio`
--
ALTER TABLE `negocio`
  ADD PRIMARY KEY (`IdNegocio`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`IdPermiso`),
  ADD KEY `IdRol` (`IdRol`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`IdProducto`),
  ADD KEY `IdCategoria` (`IdCategoria`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`IdProveedor`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`IdRol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD KEY `IdRol` (`IdRol`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`IdVenta`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `IdCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `IdCompra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `IdDetalleCompra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `IdDetalleVenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `IdPermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `IdProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `IdRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `IdVenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`IdProveedor`) REFERENCES `proveedor` (`IdProveedor`);

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`IdCompra`) REFERENCES `compra` (`IdCompra`),
  ADD CONSTRAINT `detalle_compra_ibfk_2` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`);

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`IdVenta`) REFERENCES `venta` (`IdVenta`),
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`);

--
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `permiso_ibfk_1` FOREIGN KEY (`IdRol`) REFERENCES `rol` (`IdRol`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria` (`IdCategoria`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`IdRol`) REFERENCES `rol` (`IdRol`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
