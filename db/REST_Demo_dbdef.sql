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
CREATE DATABASE IF NOT EXISTS `REST_Demo` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `REST_Demo`;

-- --------------------------------------------------------

--
-- Table structure for table `Airlines`
--

DROP TABLE IF EXISTS `Airlines`;
CREATE TABLE `Airlines` (
  `AirlineId` bigint(20) NOT NULL,
  `AirlineName` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `OwnerName` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `accessKey` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'NULL key = no security'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for table `Airlines`
--
ALTER TABLE `Airlines`
  ADD PRIMARY KEY (`AirlineId`),
  ADD UNIQUE KEY `AirlineId` (`AirlineId`),
  ADD UNIQUE KEY `accessKey` (`accessKey`);
  
ALTER TABLE `Airlines`
  MODIFY `AirlineId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

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

--
-- Indexes for table `Airports`
--
ALTER TABLE `Airports`
  ADD PRIMARY KEY (`ident`);

-- --------------------------------------------------------

--
-- Table structure for table `Flights`
--

DROP TABLE IF EXISTS `Flights`;
CREATE TABLE `Flights` (
  `FlightRecordId` bigint(20) NOT NULL,
  `AirlineId` bigint(20) NOT NULL,
  `FlightId` bigint(20) NOT NULL,
  `StartAirportId` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `StartTime` time DEFAULT NULL,
  `EndAirportId` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `EndTime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `Flights`
--
ALTER TABLE `Flights`
  ADD PRIMARY KEY (`FlightRecordId`),
  ADD UNIQUE KEY `AirlineId` (`AirlineId`,`FlightId`);
  
--
-- AUTO_INCREMENT for table `Flights`
--
ALTER TABLE `Flights`
  MODIFY `FlightRecordId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  
-- --------------------------------------------------------

--
-- Table structure for table `Pilots`
--

DROP TABLE IF EXISTS `Pilots`;
CREATE TABLE `Pilots` (
  `PilotId` bigint(20) NOT NULL,
  `LastName` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `FirstName` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `AirlineId` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for table `Pilots`
--
ALTER TABLE `Pilots`
  ADD PRIMARY KEY (`PilotId`);
  
  --
-- AUTO_INCREMENT for table `Pilots`
--
ALTER TABLE `Pilots`
  MODIFY `PilotId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  
