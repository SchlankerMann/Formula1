SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `f1` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `f1`;

CREATE TABLE IF NOT EXISTS `circuito` (
  `cod_circuito` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`cod_circuito`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `pilota` (
  `cod_pilota` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `cognome` varchar(50) COLLATE utf8_bin NOT NULL,
  `numero` int(11) NOT NULL,
  `squadra` int(11) NOT NULL,
  `foto_path` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`cod_pilota`),
  UNIQUE KEY `numero` (`numero`),
  KEY `squadra` (`squadra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `punti` (
  `pilota` int(11) NOT NULL,
  `circuito` int(11) NOT NULL,
  `data` date NOT NULL,
  `punti` int(11) NOT NULL,
  PRIMARY KEY (`pilota`,`circuito`,`data`),
  KEY `punti` (`punti`),
  KEY `circuito` (`circuito`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE IF NOT EXISTS `squadra` (
  `cod_squadra` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`cod_squadra`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

ALTER TABLE `pilota`
  ADD CONSTRAINT `pilota_ibfk_1` FOREIGN KEY (`squadra`) REFERENCES `squadra` (`cod_squadra`) ON UPDATE CASCADE;


ALTER TABLE `punti`
  ADD CONSTRAINT `punti_ibfk_2` FOREIGN KEY (`circuito`) REFERENCES `circuito` (`cod_circuito`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `punti_ibfk_1` FOREIGN KEY (`pilota`) REFERENCES `pilota` (`cod_pilota`) ON UPDATE CASCADE;