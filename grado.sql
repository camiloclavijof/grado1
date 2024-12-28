-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-02-2021 a las 06:11:02
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `grado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datoscultivos`
--

CREATE TABLE `datoscultivos` (
  `id_datoscultivos` int(11) NOT NULL,
  `areas_sembradas` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `edad_cultivo` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `lote1` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `lote2` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `lote3` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `lote4` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `lote5` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `renovacion_nueva_siembra` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `renovacion_suca` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `cantidad_cargas` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `afectacion_broca` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `area_afectada` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `regional` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `foranea` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `jornales` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `disposicion_residuos` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `disposicion_residuos_cual` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `disposicion_envases` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `secadero` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `tiempo_construido` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `area_secadero` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `despulpadora` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `tiempo_uso` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `capacidad_despulpado` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `trilladora` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `area_almacenamiento_cafe` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `maquina_poscosecha` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `id_proyeccion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `datoscultivos`
--

INSERT INTO `datoscultivos` (`id_datoscultivos`, `areas_sembradas`, `edad_cultivo`, `lote1`, `lote2`, `lote3`, `lote4`, `lote5`, `renovacion_nueva_siembra`, `renovacion_suca`, `cantidad_cargas`, `afectacion_broca`, `area_afectada`, `regional`, `foranea`, `jornales`, `disposicion_residuos`, `disposicion_residuos_cual`, `disposicion_envases`, `secadero`, `tiempo_construido`, `area_secadero`, `despulpadora`, `tiempo_uso`, `capacidad_despulpado`, `trilladora`, `area_almacenamiento_cafe`, `maquina_poscosecha`, `id_proyeccion`) VALUES
(1, '4', '4234', '234', '234', '234', '234', '234', '4', '4', '40', 'NO', '', '3', '3', '3', 'Compostaje', '', 'no', 'NO', '', '', 'NO', '', '', 'NO', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datospersonales`
--

CREATE TABLE `datospersonales` (
  `id_datospersonales` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido1` varchar(25) DEFAULT NULL,
  `apellido2` varchar(25) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `tipo_documento` varchar(10) DEFAULT NULL,
  `numero_documento1` varchar(15) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `estado_civil` varchar(15) DEFAULT NULL,
  `vereda` varchar(25) DEFAULT NULL,
  `cedula_cafetera` varchar(15) DEFAULT NULL,
  `correo_electronico` varchar(15) DEFAULT NULL,
  `correo_electronico_name` varchar(15) DEFAULT NULL,
  `id_nucleofamiliar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datospersonales`
--

INSERT INTO `datospersonales` (`id_datospersonales`, `nombre`, `apellido1`, `apellido2`, `sexo`, `fecha_nacimiento`, `tipo_documento`, `numero_documento1`, `telefono`, `estado_civil`, `vereda`, `cedula_cafetera`, `correo_electronico`, `correo_electronico_name`, `id_nucleofamiliar`) VALUES
(1, 'Camilo Andrés', 'Clavijo', 'Fernández', 'Hombre', '2018-11-07', 'CC', '234234234', '4234234', 'Soltero/a', 'Limoncitos', 'NO', 'NO', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nucleofamiliar`
--

CREATE TABLE `nucleofamiliar` (
  `id_nucleofamiliar` int(11) NOT NULL,
  `nombre_conyugue` varchar(50) DEFAULT NULL,
  `primer_apellido` varchar(25) DEFAULT NULL,
  `segundo_apellido` varchar(25) DEFAULT NULL,
  `numero_documento` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `hijos` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `hijos_menores` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `hijos_mayores` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `personas_acargo` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `id_predios` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nucleofamiliar`
--

INSERT INTO `nucleofamiliar` (`id_nucleofamiliar`, `nombre_conyugue`, `primer_apellido`, `segundo_apellido`, `numero_documento`, `hijos`, `hijos_menores`, `hijos_mayores`, `personas_acargo`, `id_predios`) VALUES
(1, '', '', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `predios`
--

CREATE TABLE `predios` (
  `id_predios` int(11) NOT NULL,
  `nombrefinca` varchar(45) DEFAULT NULL,
  `tenencia` varchar(45) DEFAULT NULL,
  `vereda` varchar(45) DEFAULT NULL,
  `georeferenciacion` varchar(45) DEFAULT NULL,
  `tipo_acceso` varchar(45) DEFAULT NULL,
  `id_datoscultivos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `predios`
--

INSERT INTO `predios` (`id_predios`, `nombrefinca`, `tenencia`, `vereda`, `georeferenciacion`, `tipo_acceso`, `id_datoscultivos`) VALUES
(1, 'la esperanza', 'Propiedad', 'Limoncitos', '123m2', 'Carretera', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyeccion`
--

CREATE TABLE `proyeccion` (
  `id_proyeccion` int(11) NOT NULL,
  `ano1renovacion` varchar(45) DEFAULT NULL,
  `ano2renovacion` varchar(45) DEFAULT NULL,
  `ano3renovacion` varchar(45) DEFAULT NULL,
  `ano4renovacion` varchar(45) DEFAULT NULL,
  `ano5renovacion` varchar(45) DEFAULT NULL,
  `ano1renovacionsuca` varchar(45) DEFAULT NULL,
  `ano2renovacionsuca` varchar(45) DEFAULT NULL,
  `ano3renovacionsuca` varchar(45) DEFAULT NULL,
  `ano4renovacionsuca` varchar(45) DEFAULT NULL,
  `ano5renovacionsuca` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proyeccion`
--

INSERT INTO `proyeccion` (`id_proyeccion`, `ano1renovacion`, `ano2renovacion`, `ano3renovacion`, `ano4renovacion`, `ano5renovacion`, `ano1renovacionsuca`, `ano2renovacionsuca`, `ano3renovacionsuca`, `ano4renovacionsuca`, `ano5renovacionsuca`) VALUES
(1, '23', '23', '23', '23', '23', '23', '23', '23', '32', '32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `role` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `UserName` varchar(191) CHARACTER SET latin1 DEFAULT NULL,
  `UserEmail` varchar(191) CHARACTER SET latin1 DEFAULT NULL,
  `UserPass` varchar(191) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_users`, `role`, `UserName`, `UserEmail`, `UserPass`) VALUES
(1, 'admin', 'camilo', 'camilo@gmail.com', 'ee8ef8fb6af83af1e05f9815578df674');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datoscultivos`
--
ALTER TABLE `datoscultivos`
  ADD PRIMARY KEY (`id_datoscultivos`),
  ADD KEY `fk_datos_cultivo_proyeccion_idx` (`id_proyeccion`);

--
-- Indices de la tabla `datospersonales`
--
ALTER TABLE `datospersonales`
  ADD PRIMARY KEY (`id_datospersonales`),
  ADD KEY `fk_datos_personales_nucleo_familiar_idx` (`id_nucleofamiliar`);

--
-- Indices de la tabla `nucleofamiliar`
--
ALTER TABLE `nucleofamiliar`
  ADD PRIMARY KEY (`id_nucleofamiliar`),
  ADD KEY `fk_nucleofamiliar_predios_idx` (`id_predios`);

--
-- Indices de la tabla `predios`
--
ALTER TABLE `predios`
  ADD PRIMARY KEY (`id_predios`),
  ADD KEY `fk_predio_datos_cultivo_idx` (`id_datoscultivos`);

--
-- Indices de la tabla `proyeccion`
--
ALTER TABLE `proyeccion`
  ADD PRIMARY KEY (`id_proyeccion`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datoscultivos`
--
ALTER TABLE `datoscultivos`
  MODIFY `id_datoscultivos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `datospersonales`
--
ALTER TABLE `datospersonales`
  MODIFY `id_datospersonales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `nucleofamiliar`
--
ALTER TABLE `nucleofamiliar`
  MODIFY `id_nucleofamiliar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `predios`
--
ALTER TABLE `predios`
  MODIFY `id_predios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `proyeccion`
--
ALTER TABLE `proyeccion`
  MODIFY `id_proyeccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `datoscultivos`
--
ALTER TABLE `datoscultivos`
  ADD CONSTRAINT `fk_datoscultivoproyeccion` FOREIGN KEY (`id_proyeccion`) REFERENCES `proyeccion` (`id_proyeccion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datospersonales`
--
ALTER TABLE `datospersonales`
  ADD CONSTRAINT `fk_datos_personales_nucleo_familiar` FOREIGN KEY (`id_nucleofamiliar`) REFERENCES `nucleofamiliar` (`id_nucleofamiliar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `nucleofamiliar`
--
ALTER TABLE `nucleofamiliar`
  ADD CONSTRAINT `fk_nucleofamiliar_predios` FOREIGN KEY (`id_predios`) REFERENCES `predios` (`id_predios`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `predios`
--
ALTER TABLE `predios`
  ADD CONSTRAINT `fk_predio_datoscultivo` FOREIGN KEY (`id_datoscultivos`) REFERENCES `datoscultivos` (`id_datoscultivos`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
