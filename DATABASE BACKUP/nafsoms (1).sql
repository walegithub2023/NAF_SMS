-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 09:13 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nafsoms`
--

-- --------------------------------------------------------

--
-- Table structure for table `ac_daily_fg_activities`
--

CREATE TABLE `ac_daily_fg_activities` (
  `ACTIVITY_ID` varchar(50) NOT NULL,
  `AC_TYPE` varchar(50) NOT NULL,
  `TAIL_NO` varchar(20) NOT NULL,
  `SORTIES` varchar(100) NOT NULL,
  `PILOTS` varchar(200) NOT NULL,
  `MSN_TYPE` varchar(100) NOT NULL,
  `FUEL_CONSUMED` varchar(100) NOT NULL,
  `HOURS_FLOWN` varchar(20) NOT NULL,
  `ROUTE_FLOWN` varchar(100) NOT NULL,
  `ACTIVITY_DATE` date NOT NULL,
  `UNIT_CODE` varchar(20) NOT NULL,
  `REMARK` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `audittrail`
--

CREATE TABLE `audittrail` (
  `AUDIT_ID` varchar(50) NOT NULL,
  `SVC_NO` varchar(20) NOT NULL,
  `ACTION` varchar(50) NOT NULL,
  `DESCRIPTION` varchar(100) NOT NULL,
  `UNIT_CODE` varchar(20) NOT NULL,
  `DATE_TIME` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audittrail`
--

INSERT INTO `audittrail` (`AUDIT_ID`, `SVC_NO`, `ACTION`, `DESCRIPTION`, `UNIT_CODE`, `DATE_TIME`) VALUES
('6605433860d4d', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-28 11:15:20.000000'),
('660543faec2e1', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-28 11:18:34.000000'),
('6605442b7e8d9', 'unitAdmin', 'add', 'unitAdmin  added NAF/2247 to the pde state', '101 ADG', '2024-03-28 11:19:23.000000'),
('6605444f5d356', 'unitAdmin', 'failed attempt', 'unitAdmin tried adding NAF/2247 to pde state', '101 ADG', '2024-03-28 11:19:59.000000'),
('6605456026c76', 'unitAdmin', 'delete', 'unitAdmin  deleted a platform from the database', '101 ADG', '2024-03-28 11:24:32.000000'),
('660545867a388', 'unitAdmin', 'add', 'unitAdmin  added a platform named -> C-130 to the database', '101 ADG', '2024-03-28 11:25:10.000000'),
('6605459f36fae', 'unitAdmin', 'delete', 'unitAdmin  deleted an item type from the database', '101 ADG', '2024-03-28 11:25:35.000000'),
('6605556c236c1', 'unitAdmin', 'delete', 'unitAdmin  deleted a pers from the pde state', '101 ADG', '2024-03-28 12:33:00.000000'),
('6605557c9671c', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23456 to the pde state', '101 ADG', '2024-03-28 12:33:16.000000'),
('6605558ad713e', 'unitAdmin', 'failed attempt', 'unitAdmin tried adding NAF10/23456 to pde state', '101 ADG', '2024-03-28 12:33:30.000000'),
('660557711e830', 'unitAdmin', 'delete', 'unitAdmin  deleted a pers from the pde state', '101 ADG', '2024-03-28 12:41:37.000000'),
('6605589ab4ff2', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23456 to the pde state', '101 ADG', '2024-03-28 12:46:34.000000'),
('660558a7c3a23', 'unitAdmin', 'delete', 'unitAdmin  deleted a pers from the pde state', '101 ADG', '2024-03-28 12:46:47.000000'),
('660558f4d7a0f', 'unitAdmin', 'failed attempt', 'unitAdmin tried creating a new pers of type->AIRWOMAN and svc no->NAF10/23456F', '101 ADG', '2024-03-28 12:48:04.000000'),
('660559057f7a8', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-28 12:48:21.000000'),
('6605590f4a560', 'unitAdmin2', 'Login', 'unitAdmin2 Logged in', '401 FTS', '2024-03-28 12:48:31.000000'),
('6605591cbf471', 'unitAdmin2', 'Logout', 'unitAdmin2 Logged out', '401 FTS', '2024-03-28 12:48:44.000000'),
('66055924e6258', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-28 12:48:52.000000'),
('6605596fc52f8', 'unitAdmin', 'create', 'unitAdmin created a new pers of type->AIRWOMAN and svc no->NAF10/23656F', '101 ADG', '2024-03-28 12:50:07.000000'),
('660559bd0bb57', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23656F to the pde state', '101 ADG', '2024-03-28 12:51:25.000000'),
('660559d1659d9', 'unitAdmin', 'delete', 'unitAdmin  deleted a pers from the pde state', '101 ADG', '2024-03-28 12:51:45.000000'),
('6605617cd1f5d', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-28 13:24:28.000000'),
('6605618a2f80b', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-28 13:24:42.000000'),
('66056fefb2ec0', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23656F to the pde state', '101 ADG', '2024-03-28 14:26:07.000000'),
('66056ff8d735f', 'unitAdmin', 'delete', 'unitAdmin  deleted a pers from the pde state', '101 ADG', '2024-03-28 14:26:16.000000'),
('6605706bb4185', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23656F to the pde state', '101 ADG', '2024-03-28 14:28:11.000000'),
('6605707d02204', 'unitAdmin', 'failed attempt', 'unitAdmin tried adding NAF10/23656F to pde state', '101 ADG', '2024-03-28 14:28:29.000000'),
('66057083ccbc1', 'unitAdmin', 'delete', 'unitAdmin  deleted a pers from the pde state', '101 ADG', '2024-03-28 14:28:35.000000'),
('6605720241305', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23456 to the pde state', '101 ADG', '2024-03-28 14:34:58.000000'),
('66057211a8816', 'unitAdmin', 'failed attempt', 'unitAdmin tried adding NAF10/23456 to pde state', '101 ADG', '2024-03-28 14:35:13.000000'),
('6605735acc6b6', 'unitAdmin', 'create', 'unitAdmin created a new pers of type->AIRMAN and svc no->NAF10/27456F', '101 ADG', '2024-03-28 14:40:42.000000'),
('660573b044170', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23656F to the pde state', '101 ADG', '2024-03-28 14:42:08.000000'),
('6605a6ce8ec8e', 'unitAdmin', 'add', 'unitAdmin  added NAF/2247 to the pde state', '101 ADG', '2024-03-28 18:20:14.000000'),
('6605b15a76d14', 'unitAdmin', 'create', 'unitAdmin created a new pers of type->OFFR(FEMALE) and svc no->NAF/5216F', '101 ADG', '2024-03-28 19:05:14.000000'),
('6605b17c8ddc9', 'unitAdmin', 'add', 'unitAdmin  added NAF/5216F to the pde state', '101 ADG', '2024-03-28 19:05:48.000000'),
('6605d0c3acb62', 'unitAdmin', 'add', 'unitAdmin  added NAF/2247 to the pde state', '101 ADG', '2024-03-28 21:19:15.000000'),
('6605d12eec184', 'unitAdmin', 'create', 'unitAdmin created a new pers of type->OFFR(MALE) and svc no->NAF/5216', '101 ADG', '2024-03-28 21:21:02.000000'),
('6605d1e2b855c', 'unitAdmin', 'create', 'unitAdmin created a new pers of type->OFFR(MALE) and svc no->NAF/5218', '101 ADG', '2024-03-28 21:24:02.000000'),
('6605d2307f4d5', 'unitAdmin', 'add', 'unitAdmin  added NAF/4872 to the pde state', '101 ADG', '2024-03-28 21:25:20.000000'),
('6605d533db150', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-28 21:38:11.000000'),
('6605d53e0dfc9', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-28 21:38:22.000000'),
('6605d6b750bb4', 'unitAdmin', 'add', 'unitAdmin  added NAF/5218 to the pde state', '101 ADG', '2024-03-28 21:44:39.000000'),
('6605d6d43ecb5', 'unitAdmin', 'add', 'unitAdmin  added NAF10/27456F to the pde state', '101 ADG', '2024-03-28 21:45:08.000000'),
('6605d6ef1edff', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23656F to the pde state', '101 ADG', '2024-03-28 21:45:35.000000'),
('6605d6fd0b0e9', 'unitAdmin', 'failed attempt', 'unitAdmin tried adding NAF10/23656F to pde state', '101 ADG', '2024-03-28 21:45:49.000000'),
('6634a5c3ca4fe', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-05-03 10:52:19.000000'),
('6634a5ca05f45', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-05-03 10:52:26.000000'),
('6634a5e76ba09', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-05-03 10:52:55.000000'),
('663888b70717f', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-05-06 09:37:27.000000'),
('663ab2d450bb4', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-05-08 01:01:40.000000'),
('663ab2e82978d', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-05-08 01:02:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `commands`
--

CREATE TABLE `commands` (
  `COMMAND_CODE` varchar(20) NOT NULL,
  `COMMAND` varchar(20) NOT NULL,
  `REMARK` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commands`
--

INSERT INTO `commands` (`COMMAND_CODE`, `COMMAND`, `REMARK`) VALUES
('ATC', 'AIR TRAINING COMMAND', 'NIL'),
('GTC', 'GROUND TRAINING COMM', 'NIL'),
('LC', 'LOGISTICS COMMAND', 'NIL'),
('MC', 'MOBILITY COMMAND', 'NIL'),
('SOC', 'SPECIAL OPERATIONS C', 'NIL'),
('TAC', 'TACTICAL AIR COMMAND', 'NIL');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `ID` varchar(50) NOT NULL,
  `ITEM` varchar(100) NOT NULL,
  `ITEM_TYPE` varchar(100) NOT NULL,
  `DESCRIPTION` varchar(100) NOT NULL,
  `QTY` int(100) NOT NULL,
  `SVC` int(100) NOT NULL,
  `US` int(100) NOT NULL,
  `UNIT_CODE` varchar(100) NOT NULL,
  `OFFICE` varchar(100) NOT NULL,
  `MODEL` varchar(100) NOT NULL,
  `DEPLOYMENT` varchar(100) NOT NULL,
  `LOCATION` varchar(100) NOT NULL,
  `REMARK` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_type`
--

CREATE TABLE `item_type` (
  `ITEM_TYPE_ID` varchar(50) NOT NULL,
  `ITEM_TYPE` varchar(100) NOT NULL,
  `DESCRIPTION` varchar(100) NOT NULL,
  `UNIT_CODE` varchar(20) NOT NULL,
  `REMARK` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_type`
--

INSERT INTO `item_type` (`ITEM_TYPE_ID`, `ITEM_TYPE`, `DESCRIPTION`, `UNIT_CODE`, `REMARK`) VALUES
('45345wr', 'Computer', 'Computer', '101 ADG', 'nil'),
('45345wrrte', 'Mask', 'Mask', '101 ADG', 'Nil');

-- --------------------------------------------------------

--
-- Table structure for table `leave_pass`
--

CREATE TABLE `leave_pass` (
  `ID` varchar(50) NOT NULL,
  `SVC_NO` varchar(20) NOT NULL,
  `REASON` varchar(100) NOT NULL,
  `DESTINATION` varchar(50) NOT NULL,
  `START_DATE` date NOT NULL,
  `END_DATE` date NOT NULL,
  `UNIT_CODE` varchar(50) NOT NULL,
  `TYPE` varchar(20) NOT NULL,
  `REMARK` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_pass`
--

INSERT INTO `leave_pass` (`ID`, `SVC_NO`, `REASON`, `DESTINATION`, `START_DATE`, `END_DATE`, `UNIT_CODE`, `TYPE`, `REMARK`) VALUES
('65fb20bab34ce', 'NAF10/23456F', 'test', 'test', '2024-03-21', '2024-03-22', '401 FTS', 'LEAVE', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `pde_state`
--

CREATE TABLE `pde_state` (
  `ID` varchar(100) NOT NULL,
  `SVC_NO` varchar(20) NOT NULL,
  `PDE_STATE` varchar(50) NOT NULL,
  `UNIT_CODE` varchar(20) NOT NULL,
  `DATE` date NOT NULL,
  `REMARK` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pde_state`
--

INSERT INTO `pde_state` (`ID`, `SVC_NO`, `PDE_STATE`, `UNIT_CODE`, `DATE`, `REMARK`) VALUES
('6605d0c3abdb0', 'NAF/2247', 'ON PDE', '101 ADG', '2024-03-28', 'nil'),
('6605d2307ed56', 'NAF/4872', 'CSE', '101 ADG', '2024-03-28', 'nil'),
('6605d6b750283', 'NAF/5218', 'OPS', '101 ADG', '2024-03-28', 'nil'),
('6605d6d43e3c9', 'NAF10/27456F', 'SICK', '101 ADG', '2024-03-28', 'NIL'),
('6605d6ef1e07d', 'NAF10/23656F', 'LEAVE', '101 ADG', '2024-03-28', 'nil');

-- --------------------------------------------------------

--
-- Table structure for table `pers`
--

CREATE TABLE `pers` (
  `SVC_NO` varchar(20) NOT NULL,
  `RANK` varchar(20) NOT NULL,
  `INITIALS` varchar(20) NOT NULL,
  `SURNAME` varchar(100) NOT NULL,
  `SPECIALTY_TRADE` varchar(100) NOT NULL,
  `PHONE` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `UNIT` varchar(20) NOT NULL,
  `APPT` varchar(50) NOT NULL,
  `DTOS` date NOT NULL,
  `LAST_UNIT` varchar(20) NOT NULL,
  `STATE` varchar(50) NOT NULL,
  `LGA` varchar(50) NOT NULL,
  `PERS_TYPE` varchar(20) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `REMARK` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pers`
--

INSERT INTO `pers` (`SVC_NO`, `RANK`, `INITIALS`, `SURNAME`, `SPECIALTY_TRADE`, `PHONE`, `DOB`, `UNIT`, `APPT`, `DTOS`, `LAST_UNIT`, `STATE`, `LGA`, `PERS_TYPE`, `EMAIL`, `REMARK`) VALUES
('CIV/0001', 'MR', 'TT', 'TEST', 'IT', '053353', '2024-03-06', '101 ADG', 'test', '2024-03-05', '101 ADG', 'test', 'test', 'CIVILIAN', 'test@airforce.mil.ng', 'nil'),
('NAF/2247', 'AVM', 'S', 'PETERS', 'IT', '425353', '2024-03-13', '101 ADG', 'COMD', '2024-03-12', '401 FTS', 'ONDO', 'test', 'OFFR(MALE)', 'test@airforce.mil.ng', 'nil'),
('NAF/4872', 'FG OFFR', 'TW', 'OGUNDEJI', 'IT', '07056546750', '2024-03-14', '101 ADG', 'SOFTWARE DEVELOPER', '2024-03-14', '101 ADG', 'ONDO', 'ONDO WEST', 'OFFR(MALE)', 'ogundejiwaletemitope@gmail.com', 'NIL'),
('NAF/5216', 'FG OFFR', 'TO', 'NAF/5216', 'IT', '053353', '2024-03-06', '101 ADG', 'NAF/5216', '2024-03-05', '101 ADG', 'NAF/5216', 'test', 'OFFR(MALE)', 'test@airforce.mil.ng', 'nil'),
('NAF/5216F', 'FG OFFR', 'S', 'NYAKO', 'SPACE', '053353', '2024-03-05', '101 ADG', 'COMD', '2024-03-04', '401 FTS', 'BAYELSA', 'test', 'OFFR(FEMALE)', 'test@airforce.mil.ng', 'nil'),
('NAF/5218', 'WG CDR', 'S', 'PETERS', 'COMMS', '053353', '2024-03-05', '101 ADG', 'COMD', '2024-03-05', '401 FTS', 'BAYELSA', 'test', 'OFFR(MALE)', 'test@airforce.mil.ng', 'nil'),
('NAF10/23456', 'SGT', 'MP', 'SILAS', 'IT', '053353', '2024-02-27', '101 ADG', 'IT TECH', '2024-03-06', '401 FTS', 'BAYELSA', 'test', 'AIRMAN', 'test@airforce.mil.ng', 'nil'),
('NAF10/23456F', 'SGT', 'TT', 'test6', 'IT', '053353', '2024-02-27', '401 FTS', 'test6', '2024-03-04', '101 ADG', 'BAYELSA', 'test', 'OFFR(FEMALE)', 'dit@airforce.mil.ng', 'nil'),
('NAF10/23656F', 'SGT', 'TT', 'SILAS', 'COMMS', '053353', '2024-03-06', '101 ADG', 'test', '2024-03-04', '401 FTS', 'BAYELSA', 'test', 'AIRWOMAN', 'test@airforce.mil.ng', 'nil'),
('NAF10/27456F', 'SGT', 'S', 'STRONG', 'IT', '053353', '2024-03-12', '101 ADG', 'STRONG', '2024-03-12', 'HQ NAF', 'BAYELSA', 'test', 'AIRMAN', 'test@airforce.mil.ng', 'NIL'),
('test2', 'GP CAPT', 'test2', 'test2', 'IT', '053353', '2024-03-06', '401 FTS', 'test2', '2024-03-13', '101 ADG', 'test2', 'test2', 'OFFR(FEMALE)', 'test@airforce.mil.ng', 'nil'),
('test6', 'GP CAPT', 'test6', 'test6', 'IT', '053353', '2024-02-27', '101 ADG', 'test6', '2024-03-05', '101 ADG', 'test6', 'test6', 'OFFR(MALE)', 'test@airforce.mil.ng', 'test6');

-- --------------------------------------------------------

--
-- Table structure for table `platform`
--

CREATE TABLE `platform` (
  `PLATFORM_ID` varchar(50) NOT NULL,
  `PLATFORM` varchar(100) NOT NULL,
  `DESCRIPTION` varchar(100) NOT NULL,
  `TAIL_NO` varchar(20) NOT NULL,
  `UNIT_CODE` varchar(20) NOT NULL,
  `STATUS` varchar(100) NOT NULL,
  `REMARK` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `platform`
--

INSERT INTO `platform` (`PLATFORM_ID`, `PLATFORM`, `DESCRIPTION`, `TAIL_NO`, `UNIT_CODE`, `STATUS`, `REMARK`) VALUES
('66013758f3f2d', 'F7-NI', 'F7-NI', 'NAF804', '101 ADG', 'NAF804', 'NAF804'),
('660138eeb0eac', 'F7-NI', 'F7-NI', 'NAF806', '101 ADG', 'F7-NI', 'F7-NI'),
('6605458679976', 'C-130', 'C-130', 'NAF608', '101 ADG', 'C-130', 'nil');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `UNIT_CODE` varchar(20) NOT NULL,
  `UNIT` varchar(20) NOT NULL,
  `COMMAND_CODE` varchar(20) NOT NULL,
  `REMARK` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`UNIT_CODE`, `UNIT`, `COMMAND_CODE`, `REMARK`) VALUES
('101 ADG', '101 ADG', 'TAC', 'NIL'),
('401 FTS', '401 FTS', 'ATC', 'NIL'),
('HQ NAF', 'HQ NAF', 'NIL', 'NIL');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `SVC_NO` varchar(20) NOT NULL,
  `RANK` varchar(20) NOT NULL,
  `INITIALS` varchar(20) NOT NULL,
  `SURNAME` varchar(50) NOT NULL,
  `UNIT_CODE` varchar(20) NOT NULL,
  `USER_ROLE` varchar(20) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`SVC_NO`, `RANK`, `INITIALS`, `SURNAME`, `UNIT_CODE`, `USER_ROLE`, `PASSWORD`) VALUES
('NAF/4872', 'FG OFFR', 'TW', 'OGUNDEJI', 'HQ NAF', 'SUPER_ADMIN', 'NAF/4872superAdmin'),
('superEditor', 'FG OFFR', 'superEditor', 'superEditor', 'HQ NAF', 'SUPER_EDITOR', 'superEditor'),
('unitAdmin', 'FG OFFR', 'unitAdmin', 'unitAdmin', '101 ADG', 'UNIT_ADMIN', 'unitAdmin'),
('unitAdmin2', 'FG OFFR', 'unitAdmin2', 'unitAdmin2', '401 FTS', 'UNIT_ADMIN', 'unitAdmin2');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `VEHICLE_ID` varchar(100) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `MAKE` varchar(100) NOT NULL,
  `MODEL` varchar(100) NOT NULL,
  `YEAR` year(4) NOT NULL,
  `COLOUR` varchar(50) NOT NULL,
  `TRANSMISSION` varchar(20) NOT NULL,
  `VIN` varchar(100) NOT NULL,
  `ENG_NO` varchar(100) NOT NULL,
  `PLATE_NO` varchar(100) NOT NULL,
  `DTOS` date DEFAULT NULL,
  `MILEAGE` varchar(100) NOT NULL,
  `PRICE` varchar(100) NOT NULL,
  `DEPLOYMENT` varchar(100) NOT NULL,
  `UNIT_CODE` varchar(20) NOT NULL,
  `STATUS` varchar(20) NOT NULL,
  `FAULT` varchar(100) NOT NULL,
  `REMARK` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`VEHICLE_ID`, `NAME`, `MAKE`, `MODEL`, `YEAR`, `COLOUR`, `TRANSMISSION`, `VIN`, `ENG_NO`, `PLATE_NO`, `DTOS`, `MILEAGE`, `PRICE`, `DEPLOYMENT`, `UNIT_CODE`, `STATUS`, `FAULT`, `REMARK`) VALUES
('65ffcec525b46', 'vehicle4', 'vehicle4', 'vehicle4', '1995', 'vehicle4', 'MANUAL', 'vehicle4', '', '', NULL, '1200', '3000', 'COMD', '401 FTS', '', '', 'nil'),
('6603a4fd48da8', 'Toyota Hiace', 'Toyota', 'Hiace', '2001', 'blue', 'MANUAL', 'JTFGX02P201513918', '2TRFE2694', 'AF404B0/1', '2009-11-18', '1200', '3000', 'Crew Bus', '101 ADG', 'SERVICEABLE', 'Servicing, steering oil', 'nil');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_inspection`
--

CREATE TABLE `vehicle_inspection` (
  `id` varchar(100) NOT NULL,
  `vehicle` varchar(100) NOT NULL,
  `lastRoutineSvcDate` date NOT NULL,
  `challenge` varchar(100) NOT NULL,
  `monthlyMileage` varchar(100) NOT NULL,
  `svcType` varchar(100) NOT NULL,
  `svcDate` date NOT NULL,
  `kmDueForSvc` varchar(100) NOT NULL,
  `svcDueDate` date NOT NULL,
  `litreOfOil` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `remark` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_inspection`
--

INSERT INTO `vehicle_inspection` (`id`, `vehicle`, `lastRoutineSvcDate`, `challenge`, `monthlyMileage`, `svcType`, `svcDate`, `kmDueForSvc`, `svcDueDate`, `litreOfOil`, `date`, `status`, `unit`, `remark`) VALUES
('6602b300b3d1d', 'HILUX 8', '2024-03-05', 'test', '1288', 'test', '2024-03-08', '5000', '2024-03-27', '60', '2024-03-26', 'serviceable', '101 ADG', 'nil'),
('660390f8dd6da', 'Crew Bus', '2024-03-06', 'test', '1288', 'test', '2024-03-28', '5000', '2024-03-28', '60', '2024-03-27', 'serviceable', '101 ADG', 'nil');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_mov_tickets`
--

CREATE TABLE `vehicle_mov_tickets` (
  `ID` varchar(100) NOT NULL,
  `VEHICLE` varchar(100) NOT NULL,
  `DATE` date NOT NULL,
  `UNIT_CODE` varchar(20) NOT NULL,
  `SVC_NO` varchar(20) NOT NULL,
  `FUEL_LITRES` varchar(50) NOT NULL,
  `DESTINATION` varchar(100) NOT NULL,
  `MILEAGE_BEFORE` varchar(100) NOT NULL,
  `MILEAGE_AFTER` varchar(100) NOT NULL,
  `TIME_OUT` int(20) NOT NULL,
  `TIME_IN` int(20) NOT NULL,
  `DISTANCE` varchar(100) NOT NULL,
  `REMARK` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_mov_tickets`
--

INSERT INTO `vehicle_mov_tickets` (`ID`, `VEHICLE`, `DATE`, `UNIT_CODE`, `SVC_NO`, `FUEL_LITRES`, `DESTINATION`, `MILEAGE_BEFORE`, `MILEAGE_AFTER`, `TIME_OUT`, `TIME_IN`, `DISTANCE`, `REMARK`) VALUES
('6602d676ecdcc', 'HILUX 8', '2024-03-26', '101 ADG', 'CIV/0001', '50', 'test', '102000', '103000', 714, 718, '50KM', 'nil'),
('6603912b188b7', 'Crew Bus', '2024-03-27', '101 ADG', 'CIV/0001', '50', 'ABUJA', '102000', '103000', 714, 718, '50KM', 'nil'),
('6603914635215', 'Crew Bus', '2024-03-27', '101 ADG', 'NAF10/23456', '50', 'ABUJA', '102000', '103000', 714, 718, '50KM', 'nil');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_tyre_status`
--

CREATE TABLE `vehicle_tyre_status` (
  `ID` varchar(100) NOT NULL,
  `POSITION` varchar(20) NOT NULL,
  `VEHICLE` varchar(100) NOT NULL,
  `PRODUCTION_DATE` date NOT NULL,
  `EXPIRY_DATE` date NOT NULL,
  `DATE` date NOT NULL,
  `STATUS` varchar(20) NOT NULL,
  `UNIT_CODE` varchar(20) NOT NULL,
  `REMARK` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_tyre_status`
--

INSERT INTO `vehicle_tyre_status` (`ID`, `POSITION`, `VEHICLE`, `PRODUCTION_DATE`, `EXPIRY_DATE`, `DATE`, `STATUS`, `UNIT_CODE`, `REMARK`) VALUES
('65ffdea48f00d', 'Left Front', 'Crew Bus', '2024-03-07', '2024-03-28', '2024-03-24', 'Not Expired', '101 ADG', 'nil'),
('65ffe0a6e4756', 'Left Front', 'HILUX 8', '2024-03-06', '2024-03-28', '2024-03-24', 'Not Expired', '101 ADG', 'nil'),
('660014e3de1cf', 'Left Rear', 'HILUX 8', '2024-03-04', '2024-03-27', '2024-03-24', 'Not Expired', '101 ADG', 'nil');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ac_daily_fg_activities`
--
ALTER TABLE `ac_daily_fg_activities`
  ADD PRIMARY KEY (`ACTIVITY_ID`);

--
-- Indexes for table `audittrail`
--
ALTER TABLE `audittrail`
  ADD PRIMARY KEY (`AUDIT_ID`),
  ADD KEY `SVC_NO` (`SVC_NO`);

--
-- Indexes for table `commands`
--
ALTER TABLE `commands`
  ADD PRIMARY KEY (`COMMAND_CODE`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UNIT_CODE` (`UNIT_CODE`);

--
-- Indexes for table `item_type`
--
ALTER TABLE `item_type`
  ADD PRIMARY KEY (`ITEM_TYPE_ID`),
  ADD KEY `UNIT_CODE` (`UNIT_CODE`);

--
-- Indexes for table `leave_pass`
--
ALTER TABLE `leave_pass`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `SVC_NO` (`SVC_NO`);

--
-- Indexes for table `pde_state`
--
ALTER TABLE `pde_state`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `SVC_NO` (`SVC_NO`);

--
-- Indexes for table `pers`
--
ALTER TABLE `pers`
  ADD PRIMARY KEY (`SVC_NO`);

--
-- Indexes for table `platform`
--
ALTER TABLE `platform`
  ADD PRIMARY KEY (`PLATFORM_ID`),
  ADD KEY `UNIT_CODE` (`UNIT_CODE`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`UNIT_CODE`),
  ADD KEY `COMMAND_CODE` (`COMMAND_CODE`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`SVC_NO`),
  ADD KEY `UNIT_CODE` (`UNIT_CODE`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`VEHICLE_ID`),
  ADD KEY `UNIT_CODE` (`UNIT_CODE`);

--
-- Indexes for table `vehicle_inspection`
--
ALTER TABLE `vehicle_inspection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle` (`vehicle`),
  ADD KEY `unit` (`unit`);

--
-- Indexes for table `vehicle_mov_tickets`
--
ALTER TABLE `vehicle_mov_tickets`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `VEHICLE` (`VEHICLE`),
  ADD KEY `UNIT_CODE` (`UNIT_CODE`);

--
-- Indexes for table `vehicle_tyre_status`
--
ALTER TABLE `vehicle_tyre_status`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `VEHICLE` (`VEHICLE`),
  ADD KEY `UNIT_CODE` (`UNIT_CODE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
