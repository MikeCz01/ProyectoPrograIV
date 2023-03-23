-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 23-03-2023 a las 01:29:13
-- Versión del servidor: 5.7.39
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemaescolar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `actividad_id` int(11) NOT NULL,
  `nombre_actividad` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `allday` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`actividad_id`, `nombre_actividad`, `estado`, `startdate`, `enddate`, `allday`) VALUES
(1, 'Tarea 1', 1, NULL, NULL, NULL),
(2, 'excursion', 1, '2023-03-09', '2023-03-10', 1),
(3, 'futbolito', 1, '2023-03-10', '2023-03-11', 1),
(4, 'cosas', 0, '2023-03-15', '2023-03-16', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `alumno_id` int(11) NOT NULL,
  `nombre_alumno` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `fecha_nac` date NOT NULL,
  `fecha_reg` date NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `u_acceso` date DEFAULT NULL,
  `clave` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`alumno_id`, `nombre_alumno`, `edad`, `direccion`, `cedula`, `telefono`, `correo`, `fecha_nac`, `fecha_reg`, `estado`, `u_acceso`, `clave`) VALUES
(2, 'Walter', 15, 'Residencial Las Palmeras bloque D casa 40', '12345', 123, 'sdfgdfgdfg', '2010-12-27', '2023-03-18', 1, '2023-03-21', '$2y$10$QMJ5emWH5as99/Ng3b.xU.6CEljQZWj8AOMM5CxkhR2ey6YopHtX.'),
(3, 'patricio estrella', 5, 'debajo del mar', '123', 123, 'sdfgdfgdfg', '2018-01-21', '2023-03-21', 1, '2023-03-21', '$2y$10$.T5g29WN7TuHIEZarXSVdOjBsenUh1t/G5tsX5UFzrl8soVGPYVDS'),
(4, 'dfg', 0, 'dfg', 'dfg', 2345, 'dfg', '2023-03-22', '2023-03-21', 0, NULL, '$2y$10$cexv95wvt3Fb7BWnlSXSNOSqahpeSsW9njL4g0V5hRIDq06UeaW1m'),
(5, 'gdfgdfg', 0, 'dfgdfg', 'dfgdfg', 23423, '234esfdgd', '2023-03-20', '2023-03-21', 0, NULL, '$2y$10$67pdLyEC91582177Sseo7.XZDqYvW8Y6qE8m9LiVkQ/FynbbxkqJS'),
(6, 'dfg', 0, 'dfg', 'sdfg', 23423, '234234', '2023-03-21', '2023-03-21', 0, NULL, '$2y$10$FhSOe3JQ9EO.9NQ6xbW2JOpBWmy3rTMfuSjgOtH5ftjGmpTF/WTU.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_profesor`
--

CREATE TABLE `alumno_profesor` (
  `ap_id` int(11) NOT NULL,
  `alumno_id` int(11) NOT NULL,
  `pm_id` int(11) NOT NULL,
  `estadop` int(11) NOT NULL,
  `periodo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumno_profesor`
--

INSERT INTO `alumno_profesor` (`ap_id`, `alumno_id`, `pm_id`, `estadop`, `periodo_id`) VALUES
(1, 2, 1, 1, 1),
(2, 3, 2, 1, 2),
(3, 3, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

CREATE TABLE `aulas` (
  `aula_id` int(11) NOT NULL,
  `nombre_aula` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`aula_id`, `nombre_aula`, `estado`) VALUES
(1, 'Aula 1', 1),
(2, 'B1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `calificacion_id` int(11) NOT NULL,
  `alumno_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `periodo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos`
--

CREATE TABLE `contenidos` (
  `contenido_id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `pm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contenidos`
--

INSERT INTO `contenidos` (`contenido_id`, `titulo`, `descripcion`, `material`, `pm_id`) VALUES
(19, 'Tarea 1', 'HACELA MONOGOLO', '../../../uploads/9692/edt.JPG', 1),
(20, 'Tarea 2', 'Es una tarea', '../../../uploads/5030/alumno.png', 1),
(21, 'Anatomía del cuerpo', 'El objetivo de este contenido es Enseñar las partes del cuerpo', '../../../uploads/7025/2ORAL EV_Level 4_2022 (1).pdf', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones`
--

CREATE TABLE `evaluaciones` (
  `evaluacion_id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `porcentaje` varchar(100) NOT NULL,
  `contenido_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evaluaciones`
--

INSERT INTO `evaluaciones` (`evaluacion_id`, `titulo`, `descripcion`, `fecha`, `porcentaje`, `contenido_id`) VALUES
(1, 'ensayo para tarea 1', 'Esto es un ensayo 1', '2023-03-22', '4', 19),
(2, 'Resumen para tarea 1', 'Este es un resumen', '2023-03-23', '5', 19),
(3, 'Ensayo 1', 'Realizar un ensayo sobre la anatomía del cuerpo.\r\n-Subirlo en documento PDF\r\n-Que contenga un 500 pa', '2023-03-21', '5', 21),
(4, 'Resumen 1', 'Hacer un resumen sobre la anatomia del cuerpo', '2023-03-20', '6', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ev_entregadas`
--

CREATE TABLE `ev_entregadas` (
  `ev_entregadas_id` int(11) NOT NULL,
  `evaluacion_id` int(11) NOT NULL,
  `alumno_id` int(11) NOT NULL,
  `material_alumno` varchar(255) NOT NULL,
  `observacion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ev_entregadas`
--

INSERT INTO `ev_entregadas` (`ev_entregadas_id`, `evaluacion_id`, `alumno_id`, `material_alumno`, `observacion`) VALUES
(2, 1, 2, '../../../uploads/1000/docente.png', 'sdfsd'),
(3, 3, 3, '../../../uploads/1000/Presentacion para Defensa de proyecto.pdf', 'Su tarea me la pela.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `grado_id` int(11) NOT NULL,
  `nombre_grado` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`grado_id`, `nombre_grado`, `estado`) VALUES
(2, 'Grado 1', 1),
(3, 'segundo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `materia_id` int(11) NOT NULL,
  `nombre_materia` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`materia_id`, `nombre_materia`, `estado`) VALUES
(1, 'Matematicas', 1),
(2, 'Ciencias Naturales', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `nota_id` int(11) NOT NULL,
  `valor_nota` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ev_entregadas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`nota_id`, `valor_nota`, `fecha`, `ev_entregadas_id`) VALUES
(1, 4, '2023-03-21 21:05:23', 2),
(2, 4, '2023-03-21 22:20:58', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodos`
--

CREATE TABLE `periodos` (
  `periodo_id` int(11) NOT NULL,
  `nombre_periodo` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `periodos`
--

INSERT INTO `periodos` (`periodo_id`, `nombre_periodo`, `estado`) VALUES
(1, '2023', 1),
(2, 'Primer semestre', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesoalumno`
--

CREATE TABLE `procesoalumno` (
  `procesoa_id` int(11) NOT NULL,
  `alumno_id` int(11) NOT NULL,
  `proceso_id` int(11) NOT NULL,
  `estadop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesoprofesor`
--

CREATE TABLE `procesoprofesor` (
  `proceso_id` int(11) NOT NULL,
  `grado_id` int(11) NOT NULL,
  `aula_id` int(11) NOT NULL,
  `profesor_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `profesor_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `nivel_est` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`profesor_id`, `nombre`, `direccion`, `cedula`, `clave`, `telefono`, `correo`, `nivel_est`, `estado`) VALUES
(2, 'sadsdff', 'sdfsdf', 'sdfsdf', '$2y$10$IzeBwVcCKyP1SWKZFyRefuCmeojxD3t/nhwPP87SZF/V5dBYOghLW', 0, 'sdfsdf', 'sdfsdf', 0),
(3, 'walter diaz', 'fghfgh', '12345', '$2y$10$U35kLxLYWn3wWqvvGReHKecMEo6VfBo9Z42sIPeKs/A1VWVCMLfqO', 3454564567, 'sdfgdfgdfg', 'dfgdfg', 1),
(4, 'dftgdt', 'fghfg', 'hfghfgh', '$2y$10$uWSjVqxDCvrNHezcIsUL4uZavQlY2plYOExT1HodLl4W2b5x61iXy', 23256, 'fghfghj', 'fghfgh', 0),
(5, 'Miguel Alejandro', 'En el Cerro', '123', '$2y$10$V3XzNrIQ0YIaBOL.tECa7.v2FA9E6OsAbJotp4FKD4poHWe5iLn0e', 123, 'sdfgdfgdfg', 'Pro', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor_materia`
--

CREATE TABLE `profesor_materia` (
  `pm_id` int(11) NOT NULL,
  `grado_id` int(11) NOT NULL,
  `aula_id` int(11) NOT NULL,
  `profesor_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `periodo_id` int(11) NOT NULL,
  `estadopm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesor_materia`
--

INSERT INTO `profesor_materia` (`pm_id`, `grado_id`, `aula_id`, `profesor_id`, `materia_id`, `periodo_id`, `estadopm`) VALUES
(1, 2, 1, 3, 1, 1, 1),
(2, 3, 2, 5, 2, 2, 1),
(3, 2, 1, 5, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rol_id` int(11) NOT NULL,
  `nombre_rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rol_id`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Asistente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `rol` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `nombre`, `usuario`, `clave`, `rol`, `estado`) VALUES
(1, 'Luis Noguera', 'admin', '$2y$10$0R6PdfuRSnsORi1WtYlTAuxZcEHS2t0b97OuhmTBDbf2c6zNphFhC', 1, 1),
(2, 'Jesus Mireles', 'nelson', '$2y$10$0R6PdfuRSnsORi1WtYlTAuxZcEHS2t0b97OuhmTBDbf2c6zNphFhC', 2, 0),
(3, 'Walter Diaz', 'wal', '$2y$10$0R6PdfuRSnsORi1WtYlTAuxZcEHS2t0b97OuhmTBDbf2c6zNphFhC', 3, 0),
(4, 'walter', 'sd', '$2y$10$OgzTdaHw9DJdpjMi2n06m.y5LXd8K3gECSa2rB5Swc0H/foB2wEUW', 1, 0),
(5, 'sdf', 'sdf', '$2y$10$kRUwK6bKJj7yea/1hKOcY.4JEsrWdjAPtwfeYjqTO3iiAHgkBCrMa', 2, 0),
(6, 'sdf', 'dfghdfg', '$2y$10$ij.J6zh2Q6YpAbEB1pJxQOCxjH1NarnSU9/1.3YmogczJnl8yMxO6', 1, 0),
(7, 'dfgdfg', 'dfgdfgdfg', '$2y$10$Vn64Mk9V4Ku7kD2ttYN0ae/YM0PzNNkhvwoTnmtnL9kIpQDsVCRTO', 1, 0),
(8, 'asdf', 'sdf', '$2y$10$M.BWCz2envR9FEtgyfMrLOCn64kkSvYWOVm3G0n/hPtiRZiRX2pKK', 1, 0),
(9, 'sdf', 'asdf', '$2y$10$EAd7JNSJfGg5bD5GiEljheshReMLpmvP8jiUFLS1PzMo4tMxCq.Z6', 1, 0),
(10, 'pedro ramirez', 'pedro1', '$2y$10$FCFt8JaS9eCWlDALynHDKe08YgFckXY9CydKJYot9epjTjFEw2t02', 1, 0),
(11, 'sdfg', 'sdf', '$2y$10$GPwrOLLdM7E3YL.EATz5FOzoca5Bh54Ci00UOEdX7P6DSlCaRCcaS', 1, 0),
(12, 'mario castanedaa', 'mario', '$2y$10$RJ8ZItX1.opMkVM.XGzCoOjUG/v5o1b.EtyARjkUGgSxMwRN70Wvu', 1, 0),
(13, 'prueba hoy domingo', 'domingo', '$2y$10$FoGCj9BTca0EnKISsQmVqeoV5daXhP.ZU.jzQWx0ux4lXoXsWk9Zi', 1, 0),
(14, 'dfgdfgfdff', 'sdfbn', '$2y$10$2YTf6.p7zivhkmEWKhU2XOX/Mt7ftyY3yjFXHSIh7vmmhNCyevkHe', 1, 0),
(15, 'walter profe', 'wal123', '$2y$10$kZKdWogxGZzl9OUg48qtuu8L3KMJmrQtvh50omML3PhKzBlqEx6uq', 2, 0),
(16, 'Walter Diaz', 'wal1', '$2y$10$q/0/ULZybVt7961sH/4IcO2nKLZeihNLbDyUHfsZ50DEZjVrJoeC2', 2, 0),
(17, 'Nelson Quintanilla', 'nelson123', '$2y$10$HibS10UfgfXNocKwiG34yO2REVCluSSYDqVSnVqfb0uC07XUiKLhC', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`actividad_id`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`alumno_id`);

--
-- Indices de la tabla `alumno_profesor`
--
ALTER TABLE `alumno_profesor`
  ADD PRIMARY KEY (`ap_id`),
  ADD KEY `alumno_id` (`alumno_id`),
  ADD KEY `pm_id` (`pm_id`),
  ADD KEY `periodo_id` (`periodo_id`);

--
-- Indices de la tabla `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`aula_id`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`calificacion_id`);

--
-- Indices de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  ADD PRIMARY KEY (`contenido_id`);

--
-- Indices de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD PRIMARY KEY (`evaluacion_id`),
  ADD KEY `contenido_id` (`contenido_id`);

--
-- Indices de la tabla `ev_entregadas`
--
ALTER TABLE `ev_entregadas`
  ADD PRIMARY KEY (`ev_entregadas_id`),
  ADD KEY `evaluacion_id` (`evaluacion_id`),
  ADD KEY `alumno_id` (`alumno_id`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`grado_id`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`materia_id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`nota_id`),
  ADD KEY `ev_entregadas_id` (`ev_entregadas_id`);

--
-- Indices de la tabla `periodos`
--
ALTER TABLE `periodos`
  ADD PRIMARY KEY (`periodo_id`);

--
-- Indices de la tabla `procesoalumno`
--
ALTER TABLE `procesoalumno`
  ADD PRIMARY KEY (`procesoa_id`),
  ADD KEY `alumno_id` (`alumno_id`),
  ADD KEY `proceso_id` (`proceso_id`);

--
-- Indices de la tabla `procesoprofesor`
--
ALTER TABLE `procesoprofesor`
  ADD PRIMARY KEY (`proceso_id`),
  ADD KEY `aula_id` (`aula_id`),
  ADD KEY `grado_id` (`grado_id`),
  ADD KEY `profesor_id` (`profesor_id`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`profesor_id`);

--
-- Indices de la tabla `profesor_materia`
--
ALTER TABLE `profesor_materia`
  ADD PRIMARY KEY (`pm_id`),
  ADD KEY `grado_id` (`grado_id`),
  ADD KEY `aula_id` (`aula_id`),
  ADD KEY `profesor_id` (`profesor_id`),
  ADD KEY `materia_id` (`materia_id`),
  ADD KEY `periodo_id` (`periodo_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `actividad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `alumno_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `alumno_profesor`
--
ALTER TABLE `alumno_profesor`
  MODIFY `ap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `aulas`
--
ALTER TABLE `aulas`
  MODIFY `aula_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `calificacion_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  MODIFY `contenido_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  MODIFY `evaluacion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ev_entregadas`
--
ALTER TABLE `ev_entregadas`
  MODIFY `ev_entregadas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `grado_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `materia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `nota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `periodos`
--
ALTER TABLE `periodos`
  MODIFY `periodo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `procesoalumno`
--
ALTER TABLE `procesoalumno`
  MODIFY `procesoa_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `procesoprofesor`
--
ALTER TABLE `procesoprofesor`
  MODIFY `proceso_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `profesor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `profesor_materia`
--
ALTER TABLE `profesor_materia`
  MODIFY `pm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno_profesor`
--
ALTER TABLE `alumno_profesor`
  ADD CONSTRAINT `alumno_profesor_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`alumno_id`),
  ADD CONSTRAINT `alumno_profesor_ibfk_2` FOREIGN KEY (`pm_id`) REFERENCES `profesor_materia` (`pm_id`),
  ADD CONSTRAINT `alumno_profesor_ibfk_3` FOREIGN KEY (`periodo_id`) REFERENCES `periodos` (`periodo_id`);

--
-- Filtros para la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD CONSTRAINT `evaluaciones_ibfk_1` FOREIGN KEY (`contenido_id`) REFERENCES `contenidos` (`contenido_id`);

--
-- Filtros para la tabla `ev_entregadas`
--
ALTER TABLE `ev_entregadas`
  ADD CONSTRAINT `ev_entregadas_ibfk_2` FOREIGN KEY (`evaluacion_id`) REFERENCES `evaluaciones` (`evaluacion_id`),
  ADD CONSTRAINT `ev_entregadas_ibfk_3` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`alumno_id`);

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`ev_entregadas_id`) REFERENCES `ev_entregadas` (`ev_entregadas_id`);

--
-- Filtros para la tabla `procesoalumno`
--
ALTER TABLE `procesoalumno`
  ADD CONSTRAINT `procesoalumno_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`alumno_id`),
  ADD CONSTRAINT `procesoalumno_ibfk_2` FOREIGN KEY (`proceso_id`) REFERENCES `procesoprofesor` (`proceso_id`);

--
-- Filtros para la tabla `procesoprofesor`
--
ALTER TABLE `procesoprofesor`
  ADD CONSTRAINT `procesoprofesor_ibfk_1` FOREIGN KEY (`aula_id`) REFERENCES `aulas` (`aula_id`),
  ADD CONSTRAINT `procesoprofesor_ibfk_2` FOREIGN KEY (`grado_id`) REFERENCES `grados` (`grado_id`),
  ADD CONSTRAINT `procesoprofesor_ibfk_3` FOREIGN KEY (`profesor_id`) REFERENCES `profesor` (`profesor_id`);

--
-- Filtros para la tabla `profesor_materia`
--
ALTER TABLE `profesor_materia`
  ADD CONSTRAINT `profesor_materia_ibfk_1` FOREIGN KEY (`grado_id`) REFERENCES `grados` (`grado_id`),
  ADD CONSTRAINT `profesor_materia_ibfk_2` FOREIGN KEY (`aula_id`) REFERENCES `aulas` (`aula_id`),
  ADD CONSTRAINT `profesor_materia_ibfk_3` FOREIGN KEY (`profesor_id`) REFERENCES `profesor` (`profesor_id`),
  ADD CONSTRAINT `profesor_materia_ibfk_4` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`materia_id`),
  ADD CONSTRAINT `profesor_materia_ibfk_5` FOREIGN KEY (`periodo_id`) REFERENCES `periodos` (`periodo_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
