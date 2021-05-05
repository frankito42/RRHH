-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2021 a las 02:38:12
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asistencias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asisemple`
--

CREATE TABLE `asisemple` (
  `idAsis` int(11) NOT NULL,
  `motivo` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `idEmple` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `asisemple`
--

INSERT INTO `asisemple` (`idAsis`, `motivo`, `idEmple`) VALUES
(1, 'E', 1),
(1, 'P', 1),
(1, 'A', 3),
(1, 'AIN', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `id` int(11) NOT NULL,
  `efectivos` int(11) NOT NULL,
  `presentes` int(11) NOT NULL,
  `ausentes` int(11) NOT NULL,
  `a` int(11) NOT NULL COMMENT 'ausente injustificado',
  `la` int(11) NOT NULL COMMENT 'licencia anual',
  `at` int(11) NOT NULL COMMENT 'accidente de trabajo',
  `matr` int(11) NOT NULL COMMENT 'matrimonio agente',
  `est` int(11) NOT NULL COMMENT 'estudio',
  `nac` int(11) NOT NULL COMMENT 'nacimiento hijo',
  `lea` int(11) NOT NULL COMMENT 'enfermedad agente',
  `lef` int(11) NOT NULL COMMENT 'atencion familiar',
  `exam` int(11) NOT NULL COMMENT 'examenes',
  `lact` int(11) NOT NULL COMMENT 'lactancia o alimentacion',
  `lf` int(11) NOT NULL COMMENT 'fallecimiento',
  `hc` int(11) NOT NULL COMMENT 'historia clinica',
  `matern` int(11) NOT NULL COMMENT 'maternidad',
  `rp` int(11) NOT NULL COMMENT 'razones particulares',
  `dons` int(11) NOT NULL COMMENT 'donaciones de sangre',
  `jt` int(11) NOT NULL COMMENT 'jubilacion transitoria',
  `li` int(11) NOT NULL COMMENT 'licencia invernal',
  `mo` int(11) NOT NULL COMMENT 'mosion oficial',
  `susp` int(11) NOT NULL COMMENT 'suspension',
  `lee6m` int(11) NOT NULL COMMENT 'lic. esp. extr./6 meses sin goce de haberes',
  `lee1a` int(11) NOT NULL COMMENT 'lic. esp. extr./1año',
  `adsc` int(11) NOT NULL COMMENT 'municipales adscriptos',
  `lp` int(11) NOT NULL COMMENT 'licencia politica',
  `d538` int(11) NOT NULL COMMENT 'autorizado decreto 538/20',
  `cvp` int(11) NOT NULL COMMENT 'covid positivo',
  `aislce` int(11) NOT NULL COMMENT 'aislado contacto estrecho',
  `ticp` int(11) NOT NULL COMMENT 'total inactivos covid positivo',
  `fecha` date NOT NULL,
  `tipo` varchar(4) COLLATE utf8mb4_spanish_ci NOT NULL,
  `postCovidpos` int(11) NOT NULL,
  `fallecimientoCovid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`id`, `efectivos`, `presentes`, `ausentes`, `a`, `la`, `at`, `matr`, `est`, `nac`, `lea`, `lef`, `exam`, `lact`, `lf`, `hc`, `matern`, `rp`, `dons`, `jt`, `li`, `mo`, `susp`, `lee6m`, `lee1a`, `adsc`, `lp`, `d538`, `cvp`, `aislce`, `ticp`, `fecha`, `tipo`, `postCovidpos`, `fallecimientoCovid`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, '2021-05-02', 'hdc', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `idEmpleado` int(11) NOT NULL,
  `nombreApellido` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`idEmpleado`, `nombreApellido`) VALUES
(1, 'Gonzalez Francisco'),
(2, 'Aguero Jesus'),
(3, 'Maxi Sanches'),
(4, 'Orlando Fernando'),
(5, 'Pepe Ortega'),
(6, 'Alicia Gimenez'),
(7, 'Magdalena');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `pass`) VALUES
(1, 'pancho', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`idEmpleado`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
