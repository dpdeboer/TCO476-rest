-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 08, 2016 at 01:17 AM
-- Server version: 5.5.52-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `REST_Demo`
--
CREATE DATABASE IF NOT EXISTS `REST_Demo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `REST_Demo`;

-- --------------------------------------------------------

--
-- Table structure for table `Airlines`
--

DROP TABLE IF EXISTS `Airlines`;
CREATE TABLE IF NOT EXISTS `Airlines` (
  `AirlineId` bigint(20) NOT NULL,
  `AirlineName` varchar(64) NOT NULL,
  `OwnerName` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Airports`
--

DROP TABLE IF EXISTS `Airports`;
CREATE TABLE IF NOT EXISTS `Airports` (
  `ident` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(127) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `latitude_deg` double NOT NULL,
  `longitude_deg` double NOT NULL,
  `elevation_ft` bigint(20) DEFAULT NULL,
  `continent` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `iso_country` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `iso_region` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `municipality` varchar(127) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `gps_code` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `iata_code` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `local_code` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ident`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Flights`
--

DROP TABLE IF EXISTS `Flights`;
CREATE TABLE IF NOT EXISTS `Flights` (
  `AirlineId` bigint(20) NOT NULL,
  `PilotId` bigint(20) NOT NULL,
  `StartAirportId` varchar(16) NOT NULL,
  `StartTime` datetime NOT NULL,
  `EndAirportId` varchar(16) NOT NULL,
  `EndTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Pilots`
--

DROP TABLE IF EXISTS `Pilots`;
CREATE TABLE IF NOT EXISTS `Pilots` (
  `PilotId` bigint(20) NOT NULL,
  `LastName` varchar(64) NOT NULL,
  `FirstName` varchar(64) NOT NULL,
  `AirlineId` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
