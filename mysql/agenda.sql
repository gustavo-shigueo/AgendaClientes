CREATE DATABASE IF NOT EXISTS `agenda` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `agenda`;

CREATE TABLE IF NOT EXISTS `afazer` (
  `IDA` int(11) NOT NULL AUTO_INCREMENT,
  `nomeA` varchar(100) NOT NULL,
  `prioridadeA` int(11) NOT NULL,
  `dataA` date NOT NULL,
  PRIMARY KEY (`IDA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `cliente` (
  `IDC` int(11) NOT NULL AUTO_INCREMENT,
  `nomeC` varchar(100) NOT NULL,
  `telC` varchar(15) NOT NULL,
  `CPFC` varchar(14) NOT NULL,
  `nascC` date NOT NULL,
  `emailC` varchar(100) NOT NULL,
  `obsC` text,
  PRIMARY KEY (`IDC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `locacao` (
  `IDL` int(11) NOT NULL AUTO_INCREMENT,
  `dataInicioL` date NOT NULL,
  `valorL` varchar(100) NOT NULL,
  `dimobL` tinyint(1) NOT NULL,
  `carenciaL` varchar(100) NOT NULL,
  `aguaL` varchar(100) NOT NULL,
  `luzL` varchar(100) NOT NULL,
  `IDC` int(11) DEFAULT NULL,
  `nomeC` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`IDL`),
  KEY `IDC` (`IDC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `proprietario` (
  `IDP` int(11) NOT NULL AUTO_INCREMENT,
  `nomeP` varchar(100) NOT NULL,
  `telP` varchar(15) NOT NULL,
  `CPFP` varchar(14) NOT NULL,
  `endP` varchar(100) NOT NULL,
  `nascP` date NOT NULL,
  `emailP` varchar(100) NOT NULL,
  `obsP` text,
  PRIMARY KEY (`IDP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


ALTER TABLE `locacao`
  ADD CONSTRAINT `locacao_ibfk_1` FOREIGN KEY (`IDC`) REFERENCES `cliente` (`IDC`);