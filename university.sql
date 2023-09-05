-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-09-2023 a las 19:58:52
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `university`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pssword` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `email`, `pssword`, `name`) VALUES
(1, 'admin@admin', '$2y$10$HFQ5Xxjn5j1r4J.vK84LzOUvDrHTKZyttHNXZ9uV8xansXVFHQYAS', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `cursoID` int(11) NOT NULL,
  `nombreCurso` varchar(255) DEFAULT NULL,
  `maestroID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`cursoID`, `nombreCurso`, `maestroID`) VALUES
(1, 'Biologia', 7),
(2, 'Robotica', 6),
(3, 'Ingeniero Civil', 11),
(4, 'Ingeniero de Software', 1),
(8, 'Astrofisica', 3),
(13, 'Musica', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pssword` varchar(255) NOT NULL,
  `matricula` varchar(100) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `fecha_de_nacimiento` date NOT NULL,
  `direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `name`, `email`, `pssword`, `matricula`, `apellido`, `fecha_de_nacimiento`, `direccion`) VALUES
(1, 'Jarvin R', 'alumno@alumno', '$2y$10$Y7wINZqY4AXgWZncz/S1/O0mtknVbyFtQVcvrExYrt97vrRKx.PKe', '143263967', 'Collado ', '2003-01-03', 'hato nuevo #30'),
(5, 'Manuel ', 'jaja@alumno', '$2y$10$8pTvVOJZqER16xoQNPS7.ea.KzjPb0gpI2mchlzmzshX8DerTF7d.', '653865380', 'Alba ', '2011-02-09', 'busca vidas #8'),
(9, 'Amigo ', 'amigo@alumno', '$2y$10$LwaLwuGE6b0j2xN2cQAR9O4as8SA0tyds44MpJm7yUDqiso9pn9IO', '293847452', 'Amigable', '2023-09-22', 'villa villa #30'),
(12, 'Miguel ', 'miguel@alumno', '$2y$10$fwOGqwKLdIkf6fWdXlozG.Rdw30RwaAzs./N100OUnaGWuGFh0h8m', '748746846', 'Herrera', '2005-02-16', 'villa villa #30'),
(14, 'mucho ', 'mucho@alumno', '$2y$10$7.1xF36HkOXTk4wYlXZdMeD83r5wQ0fJ6QWgSZEfDkzvF1a1Tx6xS', '976598761', 'poquito', '2020-01-14', 'mucho poco #211');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `inscripcionID` int(11) NOT NULL,
  `estudianteID` int(11) DEFAULT NULL,
  `cursoID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`inscripcionID`, `estudianteID`, `cursoID`) VALUES
(13, 1, 1),
(15, 1, 8),
(17, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pssword` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `fecha_de_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`id`, `email`, `pssword`, `name`, `apellido`, `direccion`, `fecha_de_nacimiento`) VALUES
(1, 'maestro@maestro', '$2y$10$4giCWzp8YEcjNk7KQvYuJeMdMm7JGVd7EuzXnnRytDA8D8nch12wC', 'Maestro ', 'Maestro ', 'busca minas #20', '1983-09-15'),
(3, 'juan@maestro', '$2y$10$SIyB2zeeNWuOi0CvJpr4HeVf6q.UHmyMxndXEppd28XK1LZErK3nm', 'Prof Juan ', 'Manuel ', 'villa villa #30', '2011-06-15'),
(6, 'aristides@maestro', '$2y$10$yhgp4cgnUg3kjrOuHxNNwudzzGjH7EQyAUKT3nAgSpWbbcSxdP19y', 'Prof Aristides ', 'Castro', 'mas o menos #4', '2023-09-15'),
(7, 'maria@maestro', '$2y$10$BKIQXpNj53XrXqfBQpbEgeBqxukwumkf4ec4e.WQrYB.x/89f1q76', 'Prof Maria ', 'Bueno ', 'mas o menos #4 ', '2023-09-22'),
(8, 'aling@maestro', '$2y$10$M0irgcaFboBntMfkyarJf.54QjAkrcbX9C0xPBGo4m6tM0bVmbbqS', 'Aling ', 'Items ', 'aling items center #30', '1997-08-02'),
(11, 'alejo@maestro', '$2y$10$F9D0LI9H5YIa9r2WxIPbRee9yQrKDuWIOYCeeRMzIkWhjF1onH//W', 'Alejo ', 'Deviluke ', 'busca minas #200', '2023-09-14'),
(17, 'jaja@jaja', '$2y$10$G0m/lN/GNpXU.ylxThz7BeNfRkelzAw1tagfk82n1h5mGp0hHHDja', 'j v ', 'm b', 'mmjj', '2023-09-23');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`cursoID`),
  ADD KEY `maestroID` (`maestroID`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`inscripcionID`),
  ADD KEY `estudianteID` (`estudianteID`),
  ADD KEY `cursoID` (`cursoID`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `cursoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `inscripcionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`maestroID`) REFERENCES `maestros` (`id`);

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `inscripciones_ibfk_1` FOREIGN KEY (`estudianteID`) REFERENCES `estudiantes` (`id`),
  ADD CONSTRAINT `inscripciones_ibfk_2` FOREIGN KEY (`cursoID`) REFERENCES `cursos` (`cursoID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
