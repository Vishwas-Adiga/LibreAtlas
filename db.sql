-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14-Jan-2018 às 21:41
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
CREATE DATABASE IF NOT EXISTS `libreatlas` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `libreatlas`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `api_keys`
--

CREATE TABLE `api_keys` (
  `id` int(11) NOT NULL COMMENT 'key id',
  `key_string` varchar(32) COLLATE utf8_bin NOT NULL COMMENT 'key string',
  `key_owner` varchar(10) COLLATE utf8_bin DEFAULT NULL COMMENT 'key owner (can be null)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='api key listing';

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'key id';
--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'marker id';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
