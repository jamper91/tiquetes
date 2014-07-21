-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-07-2014 a las 23:52:03
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tiquetes`
--
CREATE DATABASE IF NOT EXISTS `tiquetes` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tiquetes`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authorizations`
--

DROP TABLE IF EXISTS `authorizations`;
CREATE TABLE IF NOT EXISTS `authorizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varbinary(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authorizations_users`
--

DROP TABLE IF EXISTS `authorizations_users`;
CREATE TABLE IF NOT EXISTS `authorizations_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `authorization_id` int(11) NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `precio` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `nombre`) VALUES
(0, 0, 'Cucuta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `committees`
--

DROP TABLE IF EXISTS `committees`;
CREATE TABLE IF NOT EXISTS `committees` (
  `id` int(11) NOT NULL,
  `nombre` varbinary(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `committees_events`
--

DROP TABLE IF EXISTS `committees_events`;
CREATE TABLE IF NOT EXISTS `committees_events` (
  `id` char(20) NOT NULL,
  `committee_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `committees_events_people`
--

DROP TABLE IF EXISTS `committees_events_people`;
CREATE TABLE IF NOT EXISTS `committees_events_people` (
  `id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `committees_event_id` char(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `empr_nit` varchar(20) NOT NULL,
  `empr_nombre` varchar(20) DEFAULT NULL,
  `empr_telefono` decimal(10,0) DEFAULT NULL,
  `empr_mail` varchar(20) DEFAULT NULL,
  `empr_direccion` varchar(20) DEFAULT NULL,
  `empr_barrio` varchar(20) DEFAULT NULL,
  `empr_pagiWeb` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companies_events`
--

DROP TABLE IF EXISTS `companies_events`;
CREATE TABLE IF NOT EXISTS `companies_events` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `role_company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `countries`
--

INSERT INTO `countries` (`id`, `nombre`) VALUES
(0, 'Colombia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datas`
--

DROP TABLE IF EXISTS `datas`;
CREATE TABLE IF NOT EXISTS `datas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `person_id` int(11) NOT NULL,
  `forms_personal_data_id` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `delivery_methods`
--

DROP TABLE IF EXISTS `delivery_methods`;
CREATE TABLE IF NOT EXISTS `delivery_methods` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `delivery_methods_inputs`
--

DROP TABLE IF EXISTS `delivery_methods_inputs`;
CREATE TABLE IF NOT EXISTS `delivery_methods_inputs` (
  `id` int(11) NOT NULL,
  `delivery_method_id` int(11) NOT NULL,
  `input_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discounts`
--

DROP TABLE IF EXISTS `discounts`;
CREATE TABLE IF NOT EXISTS `discounts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `porcentaje` int(11) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `document_types`
--

DROP TABLE IF EXISTS `document_types`;
CREATE TABLE IF NOT EXISTS `document_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tido_descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

DROP TABLE IF EXISTS `entradas`;
CREATE TABLE IF NOT EXISTS `entradas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `paper_id` int(11) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL,
  `stage_id` int(11) NOT NULL,
  `event_type_id` int(11) NOT NULL,
  `even_nombre` varchar(20) NOT NULL,
  `even_numeResolucion` varchar(20) NOT NULL,
  `even_palaClave` varbinary(20) NOT NULL,
  `even_observaciones` varbinary(20) DEFAULT NULL,
  `even_estado` tinyint(1) DEFAULT NULL,
  `even_imagen1` varchar(20) NOT NULL,
  `even_imagen2` varchar(20) DEFAULT NULL,
  `even_fechInicio` date NOT NULL,
  `even_fechFinal` date NOT NULL,
  `even_publicar` tinyint(1) NOT NULL,
  `even_codigo` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `stage_id`, `event_type_id`, `even_nombre`, `even_numeResolucion`, `even_palaClave`, `even_observaciones`, `even_estado`, `even_imagen1`, `even_imagen2`, `even_fechInicio`, `even_fechFinal`, `even_publicar`, `even_codigo`) VALUES
(1, 1, 1, 'Feria de las Florez', '12', '324', '324', 1, '', NULL, '2014-07-08', '2014-07-09', 1, 'sdfd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events_hotels`
--

DROP TABLE IF EXISTS `events_hotels`;
CREATE TABLE IF NOT EXISTS `events_hotels` (
  `id` char(20) NOT NULL,
  `event_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events_payments`
--

DROP TABLE IF EXISTS `events_payments`;
CREATE TABLE IF NOT EXISTS `events_payments` (
  `id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events_registration_types`
--

DROP TABLE IF EXISTS `events_registration_types`;
CREATE TABLE IF NOT EXISTS `events_registration_types` (
  `id` int(11) NOT NULL,
  `registration_type_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event_types`
--

DROP TABLE IF EXISTS `event_types`;
CREATE TABLE IF NOT EXISTS `event_types` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forms`
--

DROP TABLE IF EXISTS `forms`;
CREATE TABLE IF NOT EXISTS `forms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `forms`
--

INSERT INTO `forms` (`id`, `event_id`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forms_personal_data`
--

DROP TABLE IF EXISTS `forms_personal_data`;
CREATE TABLE IF NOT EXISTS `forms_personal_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personal_datum_id` bigint(20) unsigned NOT NULL,
  `form_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `forms_personal_data`
--

INSERT INTO `forms_personal_data` (`id`, `personal_datum_id`, `form_id`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gifts`
--

DROP TABLE IF EXISTS `gifts`;
CREATE TABLE IF NOT EXISTS `gifts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotels`
--

DROP TABLE IF EXISTS `hotels`;
CREATE TABLE IF NOT EXISTS `hotels` (
  `id` int(11) NOT NULL,
  `hote_nombre` varchar(20) NOT NULL,
  `hote_mit` varchar(20) DEFAULT NULL,
  `hote_direccion` varchar(20) DEFAULT NULL,
  `hote_telefono` decimal(10,0) DEFAULT NULL,
  `hote_email` varchar(20) DEFAULT NULL,
  `hote_pagiWeb` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inputs`
--

DROP TABLE IF EXISTS `inputs`;
CREATE TABLE IF NOT EXISTS `inputs` (
  `id` int(11) NOT NULL,
  `input_state_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `entr_imagen` varchar(20) NOT NULL,
  `entr_titulo` varchar(20) NOT NULL,
  `entr_fuenTitulo` varchar(20) NOT NULL,
  `entr_tamaTitulo` decimal(10,0) NOT NULL,
  `entr_fecha` date NOT NULL,
  `entr_fuenFecha` varchar(20) NOT NULL,
  `entr_tamaFecha` decimal(10,0) NOT NULL,
  `entr_fuenCliente` varchar(20) NOT NULL,
  `entr_tamaCliente` decimal(10,0) NOT NULL,
  `entr_direccion` varchar(20) NOT NULL,
  `entr_fuenDireccion` varchar(20) NOT NULL,
  `entr_tamaDireccion` decimal(10,0) NOT NULL,
  `entr_codigo` varchar(20) NOT NULL,
  `entr_identificador` char(20) DEFAULT NULL,
  `entr_impreso` tinyint(1) DEFAULT NULL,
  `events_registration_type_id` int(11) NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `cantidad_reingresos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inputs_sales`
--

DROP TABLE IF EXISTS `inputs_sales`;
CREATE TABLE IF NOT EXISTS `inputs_sales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `input_id` int(11) NOT NULL,
  `sale_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `input_states`
--

DROP TABLE IF EXISTS `input_states`;
CREATE TABLE IF NOT EXISTS `input_states` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL,
  `loca_nombre` char(20) NOT NULL,
  `stage_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `loca_fila` char(20) DEFAULT NULL,
  `loca_colomnna` char(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `id_log` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `fecha_realizado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_log`),
  UNIQUE KEY `id_log` (`id_log`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `papers`
--

DROP TABLE IF EXISTS `papers`;
CREATE TABLE IF NOT EXISTS `papers` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `shelf_id` int(11) NOT NULL,
  `func_nombre` varchar(20) NOT NULL,
  `func_fechInicio` date NOT NULL,
  `func_fechFinal` date NOT NULL,
  `func_cortesia` tinyint(1) NOT NULL,
  `func_estado` varchar(20) NOT NULL,
  `func_imagen` varchar(20) NOT NULL,
  `func_palaClaves` varbinary(20) NOT NULL,
  `func_cantEntradas` decimal(10,0) NOT NULL,
  `func_cantAlerta` decimal(10,0) NOT NULL,
  `func_codigo` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paper_inputs`
--

DROP TABLE IF EXISTS `paper_inputs`;
CREATE TABLE IF NOT EXISTS `paper_inputs` (
  `id` int(11) NOT NULL,
  `paper_id` int(11) NOT NULL,
  `input_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL,
  `mepa_descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `people`
--

DROP TABLE IF EXISTS `people`;
CREATE TABLE IF NOT EXISTS `people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_type_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `pers_documento` varchar(20) NOT NULL,
  `pers_primNombre` varchar(20) NOT NULL,
  `pers_segNombre` varchar(20) DEFAULT NULL,
  `pers_primApellido` varchar(20) NOT NULL,
  `pers_segApellido` varchar(20) DEFAULT NULL,
  `pers_direccion` varchar(20) DEFAULT NULL,
  `pers_barrio` varchar(20) DEFAULT NULL,
  `pers_telefono` decimal(10,0) DEFAULT NULL,
  `pers_celular` decimal(10,0) DEFAULT NULL,
  `pers_fechNacimiento` date DEFAULT NULL,
  `pers_tipoSangre` varchar(20) DEFAULT NULL,
  `pers_mail` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_data`
--

DROP TABLE IF EXISTS `personal_data`;
CREATE TABLE IF NOT EXISTS `personal_data` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `id_padre` int(11) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `obligatorio` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `personal_data`
--

INSERT INTO `personal_data` (`id`, `descripcion`, `id_padre`, `tipo`, `obligatorio`) VALUES
(1, 'nombre', 0, 'text', 1),
(2, 'tipo de sangre', 0, 'number', 1),
(3, 'Telefono', NULL, 'number', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registration_types`
--

DROP TABLE IF EXISTS `registration_types`;
CREATE TABLE IF NOT EXISTS `registration_types` (
  `id` int(11) NOT NULL,
  `nombre` char(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_companies`
--

DROP TABLE IF EXISTS `role_companies`;
CREATE TABLE IF NOT EXISTS `role_companies` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `sale_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) DEFAULT NULL,
  `tipo_de_pago` char(50) NOT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`sale_id`),
  UNIQUE KEY `sale_id` (`sale_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shelves`
--

DROP TABLE IF EXISTS `shelves`;
CREATE TABLE IF NOT EXISTS `shelves` (
  `id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `esta_nombre` varchar(20) NOT NULL,
  `esta_estado` varchar(20) DEFAULT NULL,
  `esta_precio` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stages`
--

DROP TABLE IF EXISTS `stages`;
CREATE TABLE IF NOT EXISTS `stages` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `esce_nombre` varchar(20) NOT NULL,
  `esce_direccion` varchar(20) DEFAULT NULL,
  `esce_telefono` decimal(10,0) DEFAULT NULL,
  `esce_mapa` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`country_id`,`nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `states`
--

INSERT INTO `states` (`id`, `country_id`, `nombre`) VALUES
(0, 0, 'Norte de Santander'),
(0, 0, 'Cundinamarca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_users`
--

DROP TABLE IF EXISTS `type_users`;
CREATE TABLE IF NOT EXISTS `type_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `person_id` int(11) NOT NULL,
  `type_user_id` int(11) NOT NULL,
  `department_id` bigint(20) unsigned NOT NULL,
  `validodesde` date DEFAULT NULL,
  `validohasta` date DEFAULT NULL,
  `identificador` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `validations`
--

DROP TABLE IF EXISTS `validations`;
CREATE TABLE IF NOT EXISTS `validations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `fechainicio` date DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  `cantidad_reingresos` int(11) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
