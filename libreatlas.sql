-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Jan-2018 às 00:48
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libreatlas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `api_keys`
--

CREATE TABLE `api_keys` (
  `id` int(11) NOT NULL COMMENT 'key id',
  `key_string` varchar(32) COLLATE utf8_bin NOT NULL COMMENT 'key string',
  `key_owner` varchar(10) COLLATE utf8_bin DEFAULT NULL COMMENT 'key owner (can be null)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='api key listing';

--
-- Extraindo dados da tabela `api_keys`
--

INSERT INTO `api_keys` (`id`, `key_string`, `key_owner`) VALUES
(1, 'a8f5f167f44f4964e6c998dee827110c', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL COMMENT 'marker id',
  `latlng` text COLLATE utf8_bin COMMENT 'coordinates',
  `facility` text COLLATE utf8_bin COMMENT 'marker facilty name',
  `distribution` text COLLATE utf8_bin COMMENT 'distribution and version',
  `event` text COLLATE utf8_bin COMMENT 'event',
  `number_patients` int(11) DEFAULT NULL COMMENT 'number of patients',
  `website` text COLLATE utf8_bin COMMENT 'website address',
  `contacts` text COLLATE utf8_bin COMMENT 'support contacts',
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'timestamp of last update',
  `disabled` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'if disabled, marker acts like "deleted" (but for compatibility reasons it is never removed)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='markers for the map';

--
-- Extraindo dados da tabela `markers`
--

INSERT INTO `markers` (`id`, `latlng`, `facility`, `distribution`, `event`, `number_patients`, `website`, `contacts`, `last_updated`, `disabled`) VALUES
(1, '12.0000, 162.12030', NULL, 'lol', NULL, NULL, NULL, NULL, '2018-01-13 00:19:10', 0),
(2, '17.0000, 162.12030', 'Africa', 'LibreEHR v2.0.0', 'ebola', 10, 'www.facebook.com', 'support@facebook.com', '2018-01-13 00:22:32', 0),
(3, '19.0000, 122.12030', 'Africa', 'LibreEHR v2.0.0', 'ebola', 10, 'www.facebook.com', 'support@facebook.com', '2018-01-13 00:24:24', 0),
(4, '13.0000, 52.12030', 'Africa', 'LibreEHR v2.0.0', 'ebola', 10, 'www.facebook.com', 'support@facebook.com', '2018-01-13 00:28:10', 1),
(5, '35.0000, 13.12030', 'Africa', 'LibreEHR v2.0.0', 'ebola', 10, 'www.facebook.com', 'support@facebook.com', '2018-01-13 00:29:20', 0),
(6, '53.0000, 96.12030', 'Africa', 'LibreEHR v2.0.0', 'ebola', 10, 'www.facebook.com', 'support@facebook.com', '2018-01-13 20:28:20', 0),
(7, '40.2033145, -8.410257300000012', 'Dev\'s city', 'LibreEHR bleeding edge version\n', 'The flu!!!', 124672, 'www.github.com/migdinny', NULL, '2018-01-13 21:21:46', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_keys`
--
ALTER TABLE `api_keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'key id', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'marker id', AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
