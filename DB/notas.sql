-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2021 a las 21:00:49
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `notas`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_alumnos` (IN `alumnoid` INT, IN `nomb` VARCHAR(255), IN `apell` VARCHAR(255), IN `gen` CHAR(50), IN `fecha` DATE, IN `seccionid` INT, IN `gradoid` INT)  begin
	update alumnos set nombres = nomb, apellidos = apell, genero = gen, fechanacimiento = fecha, seccion_id = seccionid, grado_id = gradoid where id = alumnoid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_contrataciones` (IN `rolid` INT, `contra` VARCHAR(100))  begin
	update contrataciones set contratacion = contra where id = rolid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_direcciones` (IN `iddire` INT, IN `zona` VARCHAR(100), IN `direccion` VARCHAR(255), IN `telefono` VARCHAR(100), IN `usuario_id` INT)  begin
	update direcciones set zona=zona, direccion = direccion ,telefono = telefono where id = iddire;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_grados` (IN `gradosid` INT, `ngrado` CHAR(50))  begin
	update grados set nombregrado = ngrado where id = gradosid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_materias` (IN `materiasid` INT, IN `nmateria` VARCHAR(255), IN `numeval` INT, IN `descrip` VARCHAR(255), IN `docenteid` INT, IN `gradoid` INT)  begin
	update materias set materia = nmateria, num_evaluaciones = numeval, description = descrip, docente_id = docenteid, grado_id = gradoid where id = materiasid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_matriculas` (IN `matriculasid` INT, IN `nombre` VARCHAR(255), IN `apellido` VARCHAR(255), IN `direccion` VARCHAR(255), IN `parent` VARCHAR(255), IN `tel` VARCHAR(255))  begin
	update matriculas set 
	nombreencargado = nombre, apellidocargado = apellido, 
	direccionencargado = direccion, parentesco = parent, 
	telefono = tel  where id = matriculasid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_roles` (IN `rolid` INT, `nrol` VARCHAR(100))  begin
	update rols set nombrerol = nrol where id = rolid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_secciones` (IN `seccionid` INT, IN `nseccion` VARCHAR(100))  begin
	update secciones set seccion = nseccion where id = seccionid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `borrar_nota` (IN `notaid` INT)  begin
	delete from notas where id = notaid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `borrar_usuario` (IN `usid` INT)  begin
	delete from usuarios where id = usid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscar_notas` (IN `alumnoid` INT, IN `materiaid` INT)  begin
	select * from notas where alumno_id = alumnoid and materias_id = materiaid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `countnotasalumnos` (IN `alumnoid` INT, IN `mateid` INT)  begin
	select count(alumno_id) as countnotas from notas where alumno_id = alumnoid and materias_id = mateid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `datos_alumnos` (IN `usuarioid` INT)  begin
		select * from alumnos where id = usuarioid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `datos_docentes` (IN `usuarioid` INT)  begin
	select * from usuarios where id = usuarioid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_contrataciones` (IN `conid` INT)  begin
	delete from contrataciones where id = conid;	
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_direcciones` (IN `iddirre` INT)  begin
	delete from direcciones where id = iddirre;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_grados` (IN `gradosid` INT)  begin
	delete from grados where id = gradosid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_materias` (IN `materiasid` INT)  begin
	delete from materias where id = materiasid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_matriculas` (IN `matriculasid` INT)  begin
	delete from matriculas where id = matriculasid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_roles` (IN `rolid` INT)  begin
	delete from rols where id = rolid;	
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_secciones` (IN `seccionesid` INT)  begin
	delete from secciones where id = seccionesid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `grados_insert` (IN `grados` CHAR(50))  begin
	insert into grados(nombregrado) values (grados);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `guardarnotas` (IN `calificar` FLOAT(12,2), IN `alumnoid` INT, IN `materiaid` INT)  begin
	insert into notas(nota,alumno_id,materias_id) values(calificar, alumnoid, materiaid);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `guardar_contrataciones` (IN `contratacion` VARCHAR(100))  begin
	insert into contrataciones(contratacion) values(contratacion);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_direcciones` (IN `zona` VARCHAR(100), IN `direccion` VARCHAR(255), IN `telefono` VARCHAR(100), IN `usuario_id` INT)  begin
	insert into direcciones(zona, direccion,telefono, usuario_id) values(zona, direccion, telefono, usuario_id);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_secciones` (IN `secciones` VARCHAR(100))  begin
	insert into secciones(seccion) values (secciones);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_alumnosdocentes` (IN `docentid` INT)  begin
	select 
	al.id,
	al.nombres,
	al.apellidos,
	al.genero,
	al.fechanacimiento,
	se.seccion,
	gra.nombregrado,
	u.id as iddocente,
	ma.id as idmatricula,
	group_concat(m.materia) as materias
	from alumnos as al 
	inner join matriculas ma on al.matricula_id = ma.id
	inner join secciones se on se.id = al.seccion_id 
	inner join grados gra on gra.id = al.grado_id
	inner join materias m on gra.id = m.grado_id 
	inner join usuarios u on u.id = m.docente_id
	where u.id = docentid
	group by al.nombres;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_contrataciones` ()  begin
	select * from contrataciones;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_grados` ()  begin
	select * from grados;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_materiasadmin` ()  begin 
	select 
	m.id,
	m.materia,
	g.nombregrado,
	s.seccion,
	us.usuario
	from materias m
	inner join grados as g on m.grado_id = g.id
	inner join alumnos as a on g.id = a.grado_id
	inner join secciones as s on a.seccion_id = s.id
	inner join usuarios as us on m.docente_id = us.id
	group by m.materia;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_materiasdocentes` (IN `docenteid` INT)  begin 
	select 
	m.id,
	m.materia,
	g.nombregrado,
	s.seccion
	from materias m
	inner join grados as g on m.grado_id = g.id
	inner join alumnos as a on g.id = a.grado_id
	inner join secciones as s on a.seccion_id = s.id
	where docente_id = docenteid
	group by m.materia;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_materiasusuario` (IN `materia` INT)  begin 
	select 
	a.id,
	a.nombres,
	a.apellidos,
	g.id as gradoid,
	g.nombregrado,
	s.id as seccionid,
	s.seccion,
	m.id as materiaid,
	m.materia,
	m.num_evaluaciones,
	u.id as usuarioid
	from materias m
	inner join grados g on m.grado_id = g.id
	inner join alumnos a on a.grado_id = g.id 
	inner join secciones s on s.id = a.seccion_id
	inner join usuarios u on m.docente_id = u.id
	where m.id = materia;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_matriculas` ()  begin
	select * from matriculas;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_roles` ()  begin
	select * from rols;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_secciones` ()  begin
	select * from secciones;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_usuarios` ()  begin
	select
	us.id,
	us.usuario,
	us.email,
	r.nombrerol,
	con.contratacion,
	us.created_at 
	from 
	usuarios as us 
	inner join rols as r on us.rol_id = r.id 
	inner join contrataciones as con on us.contratacion_id = con.id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `loginauten` (`mail` VARCHAR(255))  begin
	select * from usuarios where email = mail;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `materias_insert` (IN `nmateria` VARCHAR(255), IN `numeval` INT, IN `descrip` VARCHAR(255), IN `docenteid` INT, IN `gradoid` INT)  begin
	insert into materias(materia, num_evaluaciones, description, docente_id, grado_id) values (nmateria, numeval, descrip, docenteid, gradoid);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `matriculas_insert` (IN `nombre` VARCHAR(255), IN `apellido` VARCHAR(255), IN `direccion` VARCHAR(255), IN `parent` VARCHAR(255), IN `tel` VARCHAR(255))  begin
	insert into matriculas(nombreencargado, apellidocargado, direccionencargado, parentesco, telefono)
	values (nombre, apellido, direccion, parent,tel);
	SELECT LAST_INSERT_ID();
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `notasEstudiantes` (IN `alumnoid` INT, IN `mateid` INT)  begin
	select * from notas  where alumno_id = alumnoid and materias_id = mateid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registrar_alumnos` (IN `nomb` VARCHAR(255), IN `apell` VARCHAR(255), IN `gen` CHAR(50), IN `fecha` DATE, IN `matriculaid` INT, IN `seccionid` INT, IN `gradoid` INT)  begin
	INSERT INTO alumnos(nombres, apellidos, genero, fechanacimiento, matricula_id, seccion_id, grado_id) 
	values(nomb,apell, gen, fecha, matriculaid, seccionid, gradoid);
	SELECT LAST_INSERT_ID();
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registrar_cuentaalumno` (IN `usuario` VARCHAR(100), IN `mail` VARCHAR(255), IN `pass` VARCHAR(255), IN `alumnoid` INT)  begin
	insert into usuarios (usuario, email, password, rol_id, contratacion_id, alumno_id) 
	values(usuario, mail, pass, 3, 1, alumnoid);
	SELECT LAST_INSERT_ID();
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registrar_docente` (IN `usuario` VARCHAR(100), IN `mail` VARCHAR(255), IN `pass` VARCHAR(255), IN `contratacionid` INT)  begin
	insert into usuarios (usuario, email, password, rol_id, contratacion_id) values(usuario, mail, pass, 2, contratacionid);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `roles_insert` (IN `rol` VARCHAR(100))  BEGIN
	INSERT INTO rols(nombrerol) VALUES(rol);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `search_alumno` (IN `idalu` INT)  begin
	select * from alumnos where id = idalu;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `search_contrataciones` (IN `rolid` INT)  begin
	select * from contrataciones where id = rolid;	
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `search_direalumnos` (IN `iddire` INT)  begin
	select 
	d.id,
	d.zona,
	u.id as idusuario
	from alumnos a 
	inner join matriculas m on a.matricula_id = m.id 
	inner join usuarios u on a.id = u.alumno_id 
	inner join direcciones d on u.id = d.usuario_id 
	where m.id = iddire;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `search_grados` (IN `gradosid` INT)  begin
	select * from grados where id = gradosid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `search_materias` (IN `materiasid` INT)  begin
	select * from materias where id = materiasid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `search_matriculas` (IN `matriculasid` INT)  begin
	select * from matriculas where id = matriculasid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `search_rol` (IN `rolid` INT)  begin
	select * from rols where id = rolid;	
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `search_secciones` (IN `seccionesid` INT)  begin
	select * from secciones where id = seccionesid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sear_useralumno` (IN `idus` INT)  begin
		select 
	u.id as idusuario
	from alumnos a 
	inner join matriculas m on a.matricula_id = m.id 
	inner join usuarios u on a.id = u.alumno_id 
	where m.id = idus;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_notas` (IN `notaid` INT, IN `calificar` FLOAT(12,2), IN `des` TEXT)  begin
	update notas set nota = calificar, observacion = des where id = notaid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_usuarios` (IN `users` VARCHAR(100), IN `mail` VARCHAR(255), IN `pass` VARCHAR(255), IN `rolid` INT, IN `conid` INT, IN `usid` INT)  begin
	update usuarios set usuario = users, email = mail, password = pass, rol_id = rolid, contratacion_id = conid where id = usid;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `nombres` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `apellidos` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `genero` char(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `matricula_id` int(11) NOT NULL,
  `seccion_id` int(10) NOT NULL,
  `grado_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombres`, `apellidos`, `genero`, `fechanacimiento`, `matricula_id`, `seccion_id`, `grado_id`) VALUES
(1, 'juan', 'hola', 'Hombre', '1994-11-15', 1, 1, 1),
(2, 'VALLADARES', 'CORTEZ lo', 'Mujer', '1995-05-15', 2, 1, 2),
(3, 'VALLADARES', 'CORTEZ', 'Otro', '0000-00-00', 3, 2, 2),
(4, 'Juan Antonio', 'Perez Lopez', 'Mujer', '1995-11-15', 4, 1, 2),
(5, 'MARIA ', 'MARES', 'Mujer', '2019-11-15', 5, 1, 4),
(6, 'kevin', 'vasquez', 'Hombre', '2000-01-20', 6, 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrataciones`
--

CREATE TABLE `contrataciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `contratacion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `contrataciones`
--

INSERT INTO `contrataciones` (`id`, `contratacion`, `created_at`, `updated_at`) VALUES
(1, 'Permanente', NULL, NULL),
(2, 'Servicios Profesionales', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `zona` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`id`, `zona`, `direccion`, `telefono`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, 'Rural', '-', '-', 12, NULL, NULL),
(4, 'Urbana', '-', '-', 13, NULL, NULL),
(5, 'Rural', '-', '-', 14, NULL, NULL),
(6, 'Urbana', '-', '-', 15, NULL, NULL),
(7, 'Rural', '-', '-', 16, NULL, NULL),
(8, 'Urbana', '-', '-', 18, NULL, NULL),
(9, 'Urbana', '-', '-', 19, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `id` int(11) NOT NULL,
  `nombregrado` char(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id`, `nombregrado`) VALUES
(1, 'PRIMERO'),
(2, 'SEGUNDO'),
(4, 'TERCERO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(10) UNSIGNED NOT NULL,
  `materia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_evaluaciones` int(11) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `docente_id` int(11) NOT NULL,
  `grado_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `materia`, `num_evaluaciones`, `description`, `docente_id`, `grado_id`, `created_at`, `updated_at`) VALUES
(1, 'ESTUDIOS SOCIALES ', 4, NULL, 2, 1, NULL, NULL),
(2, 'MATEMATICAS', 4, 'nhh', 3, 2, NULL, NULL),
(3, 'ARITMETICA', 4, NULL, 2, 1, NULL, NULL),
(4, 'Ciencias Sociales Dsos', 4, 'hopla mundo', 3, 4, NULL, NULL),
(5, 'Lenguaje y Literatura', 4, 'ola', 3, 2, NULL, NULL),
(6, 'Ciencias Sociales Dsos213123', 4, '213123', 2, 2, NULL, NULL),
(8, 'Ingles', 5, '2', 17, 4, '2021-12-04 02:27:07', '2021-12-04 02:27:07'),
(9, 'Matemáticas', 6, 'matematicas', 2, 4, '2021-12-10 17:39:08', '2021-12-10 17:39:08');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `materias_grado`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `materias_grado` (
`nombregrado` char(50)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

CREATE TABLE `matriculas` (
  `id` int(11) NOT NULL,
  `nombreencargado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellidocargado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccionencargado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parentesco` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `matriculas`
--

INSERT INTO `matriculas` (`id`, `nombreencargado`, `apellidocargado`, `direccionencargado`, `parentesco`, `telefono`, `created_at`, `updated_at`) VALUES
(1, 'VALLADARES', 'CORTEZ', 'San Salvador El Salvador', 'Madre', '76930272', NULL, NULL),
(2, 'VALLADARES', 'CORTEZ', 'wqewqe', 'Tio', '76930272', NULL, NULL),
(3, 'VALLADARES', 'CORTEZ', 'san sivar', 'Tia', '76930272', NULL, NULL),
(4, 'Padre', 'ENcargador', 'San sivar', 'Padre', '666666888', NULL, NULL),
(5, 'JUAN JOSE', 'LOPEZ LOPEZ', '32332', 'Padre', '7693027233', NULL, NULL),
(6, 'Kelvin', 'Vasquez', 'Santiago Nonualco Centro.', 'Tia', '+50564564', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(10) NOT NULL,
  `nota` float(12,2) DEFAULT 0.00,
  `alumno_id` int(11) NOT NULL,
  `materias_id` int(10) UNSIGNED DEFAULT NULL,
  `observacion` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `nota`, `alumno_id`, `materias_id`, `observacion`, `created_at`, `updated_at`) VALUES
(1, 7.00, 2, 2, 'sss', NULL, NULL),
(2, 8.90, 2, 2, '', NULL, NULL),
(3, 7.00, 2, 2, '', NULL, NULL),
(4, 7.00, 2, 2, '', NULL, NULL),
(6, 8.77, 3, 2, '', NULL, NULL),
(7, 7.00, 3, 2, '', NULL, NULL),
(8, 6.00, 3, 2, '', NULL, NULL),
(9, 7.99, 2, 5, '', NULL, NULL),
(10, 7.00, 3, 5, NULL, NULL, NULL),
(11, 7.00, 3, 5, NULL, NULL, NULL),
(12, 7.00, 3, 5, NULL, NULL, NULL),
(13, 7.00, 3, 5, NULL, NULL, NULL),
(14, 7.00, 4, 5, NULL, NULL, NULL),
(15, 7.00, 4, 5, NULL, NULL, NULL),
(16, 8.00, 4, 5, NULL, NULL, NULL),
(17, 8.00, 4, 5, NULL, NULL, NULL),
(18, 5.00, 2, 5, NULL, NULL, NULL),
(19, 5.00, 2, 5, NULL, NULL, NULL),
(20, 5.00, 2, 5, NULL, NULL, NULL),
(21, 7.00, 2, 6, NULL, NULL, NULL),
(22, 7.00, 3, 6, NULL, NULL, NULL),
(23, 7.00, 4, 6, NULL, NULL, NULL),
(24, 7.00, 2, 6, NULL, NULL, NULL),
(25, 7.00, 2, 6, NULL, NULL, NULL),
(26, 7.00, 2, 6, NULL, NULL, NULL),
(27, 5.00, 3, 6, NULL, NULL, NULL),
(28, 5.00, 3, 6, NULL, NULL, NULL),
(29, 6.00, 3, 6, NULL, NULL, NULL),
(30, 4.00, 4, 6, NULL, NULL, NULL),
(31, 5.00, 4, 6, NULL, NULL, NULL),
(32, 10.00, 4, 6, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rols`
--

CREATE TABLE `rols` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombrerol` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `rols`
--

INSERT INTO `rols` (`id`, `nombrerol`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Docente\r\n', NULL, NULL),
(3, 'Alumnos', NULL, NULL),
(4, 'nuevo rol', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id` int(11) NOT NULL,
  `seccion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `seccion`, `created_at`, `updated_at`) VALUES
(1, 'A', NULL, NULL),
(2, 'B', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rol_id` int(10) UNSIGNED NOT NULL,
  `contratacion_id` int(10) UNSIGNED NOT NULL,
  `alumno_id` int(11) DEFAULT NULL COMMENT 'Este servira para el alumbo tenga una cuenta y podra ver sus notas\r\n',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `email`, `password`, `rol_id`, `contratacion_id`, `alumno_id`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'admin@admin.com', '$2y$10$bcbeny.yv6llQAeGj6jc/OzfWqsT4kD8e2SZ1tG3z3hLml7uFLkyW', 1, 1, NULL, NULL, NULL),
(2, 'Docente 1', 'docente1', '$2y$10$Qqj4nMe3qyTwuDQ0U5J17uIPB9or2BJbRQZ7VZaogF9i2IddgKOJu', 2, 2, NULL, NULL, NULL),
(3, 'DOcente2', 'docente2', '$2y$10$ratPsi3QoPvg.trpyfjPd.cjb9Mszj6q0Y0IleiCHapb9x1L2pJrK', 2, 1, NULL, NULL, NULL),
(10, 'VALLADARES', 'mariaangelvalladares76@gmail.com', '$2y$10$9ywmYN/7/weLm5fOCHnro.KscHpehowBFw4XlCs7l1dkgf1/hGpiC', 3, 1, 10, '2021-11-28 01:33:25', '2021-11-28 01:33:25'),
(11, 'Kevin', 'juan', '$2y$10$RRHUkiaqvLoHV0h2HV4oaOp04NPRNh6amLK7Awc4aIR7u61icCW3W', 3, 1, 11, '2021-11-28 21:21:56', '2021-11-28 21:21:56'),
(12, 'Kevin', 'juan', '$2y$10$ivHN4f1oiRpuBWty3nmLhO00Ovv4udafdSQ3vsMjVHTZXVrUqTCUm', 3, 1, 12, '2021-11-28 21:22:10', '2021-11-28 21:22:10'),
(13, 'juan', 'alumno1', '$2y$10$kEij6YsJ8dMqI412bcev4eK6pJ4eISTIwlzpM6B5JMF9DMZuYZs8.', 3, 1, 1, '2021-11-28 23:16:46', '2021-11-28 23:16:46'),
(14, 'VALLADARES', 'mariaangelvalladares76@gmail.com', '$2y$10$ST8wERYzUicgQRZe8gDofOOs1bnpfHq8gMuCM04bmWuFpnIU6pmTy', 3, 1, 2, '2021-11-28 23:18:27', '2021-11-28 23:18:27'),
(15, 'VALLADARES', 'alumno2', '$2y$10$qHvNM5oDm73lHZh2CDZfn.Sd7jAieQ7yP/qcRPuw77IRW5J/dKcwS', 3, 1, 3, '2021-11-29 00:29:48', '2021-11-29 00:29:48'),
(16, 'Juan Antonio', 'juan', '$2y$10$qUIrNTFmNoZgGyAHOc4A1e/Z23pvzaC6.gEGoH0Ok2HtDzXfglB1e', 3, 1, 4, '2021-12-02 23:55:34', '2021-12-02 23:55:34'),
(17, 'profesor', 'profesor', '$2y$10$3jd1HQnkmNhnCVLeaQ.47e/8wb57CPWuzZma4gh7fSQzQz5pOL.1W', 2, 1, NULL, '2021-12-04 02:26:31', '2021-12-04 02:26:31'),
(18, 'MARIA ', 'maria', '$2y$10$Fx8SBJ2LYH4WcxKtmBk0fuiYUPNgi5ds.9oxkQkId1Vuel8QxBy7S', 3, 1, 5, '2021-12-04 02:29:31', '2021-12-04 02:29:31'),
(19, 'kevin', 'kevin', '$2y$10$YoiaYGdXsEEK8mPuvoUEJuwW00ZFnashA.BSjmgwNRR8lOUZ6dSwO', 3, 1, 6, '2021-12-10 17:37:23', '2021-12-10 17:37:23');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_alumnos_reprobados`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_alumnos_reprobados` (
`nombres` varchar(255)
,`apellidos` varchar(255)
,`seccion` varchar(100)
,`calificacion` float(12,2)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_alumnos_rural`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_alumnos_rural` (
`nombres` varchar(255)
,`apellidos` varchar(255)
,`zona` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_materias_docente`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_materias_docente` (
`nombre` varchar(100)
,`rol` varchar(100)
,`materia` varchar(255)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_mayor_promedio`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_mayor_promedio` (
`nombres` varchar(255)
,`apellidos` varchar(255)
,`seccion` varchar(100)
,`nombregrado` char(50)
,`calificacion` float(12,2)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_tipo_plaza`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_tipo_plaza` (
`nombre` varchar(100)
,`rol` varchar(100)
,`contratacion` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `materias_grado`
--
DROP TABLE IF EXISTS `materias_grado`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `materias_grado`  AS SELECT `g`.`nombregrado` AS `nombregrado` FROM (`grados` `g` join `alumnos` `alum` on(`g`.`id` = `alum`.`grado_id`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_alumnos_reprobados`
--
DROP TABLE IF EXISTS `vista_alumnos_reprobados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_alumnos_reprobados`  AS SELECT `alumnos`.`nombres` AS `nombres`, `alumnos`.`apellidos` AS `apellidos`, `secciones`.`seccion` AS `seccion`, `nota` AS `calificacion` FROM ((`alumnos` left join `secciones` on(`alumnos`.`seccion_id` = `secciones`.`id`)) left join `notas` on(`alumno_id` = `alumnos`.`id`)) WHERE `nota` < 7 ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_alumnos_rural`
--
DROP TABLE IF EXISTS `vista_alumnos_rural`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_alumnos_rural`  AS SELECT `alumnos`.`nombres` AS `nombres`, `alumnos`.`apellidos` AS `apellidos`, `direcciones`.`zona` AS `zona` FROM (`alumnos` left join `direcciones` on(`alumnos`.`id` = `direcciones`.`usuario_id`)) WHERE `direcciones`.`zona` = 'rural' ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_materias_docente`
--
DROP TABLE IF EXISTS `vista_materias_docente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_materias_docente`  AS SELECT `usuarios`.`usuario` AS `nombre`, `rols`.`nombrerol` AS `rol`, `materias`.`materia` AS `materia` FROM ((`usuarios` left join `rols` on(`rols`.`id` = `usuarios`.`rol_id`)) left join `materias` on(`materias`.`docente_id` = `usuarios`.`id`)) WHERE `rols`.`id` = 2 ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_mayor_promedio`
--
DROP TABLE IF EXISTS `vista_mayor_promedio`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_mayor_promedio`  AS SELECT `alumnos`.`nombres` AS `nombres`, `alumnos`.`apellidos` AS `apellidos`, `secciones`.`seccion` AS `seccion`, `grados`.`nombregrado` AS `nombregrado`, `nota` AS `calificacion` FROM (((`alumnos` left join `secciones` on(`alumnos`.`seccion_id` = `secciones`.`id`)) left join `grados` on(`alumnos`.`grado_id` = `grados`.`id`)) left join `notas` on(`alumno_id` = `alumnos`.`id`)) WHERE `nota` > 8 ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_tipo_plaza`
--
DROP TABLE IF EXISTS `vista_tipo_plaza`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_tipo_plaza`  AS SELECT `usuarios`.`usuario` AS `nombre`, `rols`.`nombrerol` AS `rol`, `contrataciones`.`contratacion` AS `contratacion` FROM ((`usuarios` left join `rols` on(`rols`.`id` = `usuarios`.`rol_id`)) left join `contrataciones` on(`contrataciones`.`id` = `usuarios`.`contratacion_id`)) WHERE `rols`.`id` = 2 ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_grado_alumnos` (`grado_id`),
  ADD KEY `fk_secciones_alumnos` (`seccion_id`),
  ADD KEY `fk_matriculas_alumnos` (`matricula_id`);

--
-- Indices de la tabla `contrataciones`
--
ALTER TABLE `contrataciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_direcciones_usuarios` (`usuario_id`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_grado_materias` (`grado_id`),
  ADD KEY `fk_docente_materias` (`docente_id`);

--
-- Indices de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notas_materias_id_foreign` (`materias_id`),
  ADD KEY `fk_alumnos_notas` (`alumno_id`);

--
-- Indices de la tabla `rols`
--
ALTER TABLE `rols`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarios_rol_id_foreign` (`rol_id`),
  ADD KEY `usuarios_contratacion_id_foreign` (`contratacion_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `contrataciones`
--
ALTER TABLE `contrataciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `rols`
--
ALTER TABLE `rols`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `fk_grado_alumnos` FOREIGN KEY (`grado_id`) REFERENCES `grados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_matriculas_alumnos` FOREIGN KEY (`matricula_id`) REFERENCES `matriculas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_secciones_alumnos` FOREIGN KEY (`seccion_id`) REFERENCES `secciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD CONSTRAINT `fk_direcciones_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `fk_docente_materias` FOREIGN KEY (`docente_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_grado_materias` FOREIGN KEY (`grado_id`) REFERENCES `grados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `fk_alumnos_notas` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notas_materias_id_foreign` FOREIGN KEY (`materias_id`) REFERENCES `materias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_contratacion_id_foreign` FOREIGN KEY (`contratacion_id`) REFERENCES `contrataciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `rols` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
