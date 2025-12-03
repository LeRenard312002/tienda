-- phpMyAdmin SQL Dump
-- version 2.11.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-11-2017 a las 15:36:26
-- Versión del servidor: 5.0.91
-- Versión de PHP: 5.2.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de datos: `lista_alumnos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` int(11) NOT NULL auto_increment,
  `nombres` varchar(100) collate utf8_unicode_ci NOT NULL,
  `apellidos` varchar(160) collate utf8_unicode_ci NOT NULL,
  `email` varchar(129) collate utf8_unicode_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombres`, `apellidos`, `email`, `telefono`) VALUES
(2, 'Juan', 'Carlos', 'das', 98387474),
(3, 'Daniel', 'Carrillo', 'danielwe@hotmail.com', 87654321),
(4, 'Daniel', 'Carrillo', 'danielwe@hotmail.com', 87654321);