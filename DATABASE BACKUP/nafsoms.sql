-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2024 at 02:20 PM
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
('65edd68fa995b', 'superEditor', 'create', 'superEditor  created a unit named 401.', 'HQ NAF', '2024-03-10 16:49:35.000000'),
('65edd6aa4915c', 'superEditor', 'create', 'superEditor  created a unit named 401 FTS.', 'HQ NAF', '2024-03-10 16:50:02.000000'),
('65edd7329075b', 'superEditor', 'failed attempt', 'superEditor  tried creating a new user with svcNo-> unitAdmin2, for a unit named 401 FTS ', 'HQ NAF', '2024-03-10 16:52:18.000000'),
('65edd7600b435', 'superEditor', 'create', 'superEditor  created a new user with svcNo-> testAdmin2, for a unit named 401 FTS ', 'HQ NAF', '2024-03-10 16:53:04.000000'),
('65edd769c03f7', 'superEditor', 'Logout', 'superEditor Logged out', 'HQ NAF', '2024-03-10 16:53:13.000000'),
('65edd7a754cda', 'superEditor', 'Login', 'superEditor Logged in', 'HQ NAF', '2024-03-10 16:54:15.000000'),
('65edd7bba53ad', 'superEditor', 'create', 'superEditor  created a new user with svcNo-> testAdmin2, for a unit named 401 FTS ', 'HQ NAF', '2024-03-10 16:54:35.000000'),
('65edd7c167b14', 'superEditor', 'Logout', 'superEditor Logged out', 'HQ NAF', '2024-03-10 16:54:41.000000'),
('65edd7c67e5b5', 'testAdmin2', 'Login', 'testAdmin2 Logged in', '401 FTS', '2024-03-10 16:54:46.000000'),
('65eea6cd20c99', 'testAdmin2', 'Logout', 'testAdmin2 Logged out', '401 FTS', '2024-03-11 07:38:05.000000'),
('65eea6d555667', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-11 07:38:13.000000'),
('65eea7367b2dc', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-11 07:39:50.000000'),
('65eea73ea97d4', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-11 07:39:58.000000'),
('65eea7b22b9f1', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-11 07:41:54.000000'),
('65eea7edd367b', 'testAdmin2', 'Login', 'testAdmin2 Logged in', '401 FTS', '2024-03-11 07:42:53.000000'),
('65eead9f7d9c6', 'testAdmin2', 'password change', 'testAdmin2 changed his/her password', '401 FTS', '2024-03-11 08:07:11.000000'),
('65eeade0737bc', 'testAdmin2', 'Logout', 'testAdmin2 Logged out', '401 FTS', '2024-03-11 08:08:16.000000'),
('65eeae12ac3e1', 'testAdmin2', 'Login', 'testAdmin2 Logged in', '401 FTS', '2024-03-11 08:09:06.000000'),
('65eed1dae447e', 'testAdmin2', 'Logout', 'testAdmin2 Logged out', '401 FTS', '2024-03-11 10:41:46.000000'),
('65eed1f37e5d9', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-11 10:42:11.000000'),
('65eed39fe70dc', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-11 10:49:19.000000'),
('65eed3bbe9492', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-11 10:49:47.000000'),
('65eed5bf91cd1', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-11 10:58:23.000000'),
('65eed6c30e31a', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-11 11:02:43.000000'),
('65eed82b05e9c', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-11 11:08:43.000000'),
('65eeea9fb01d3', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-11 12:27:27.000000'),
('65eeeaa86bf81', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-11 12:27:36.000000'),
('65eef4981b537', 'unitAdmin', 'failed attempt', 'unitAdmin tried creating a new pers of type->OFFR(MALE) and svc no->test', '101 ADG', '2024-03-11 13:10:00.000000'),
('65eef9dd1a56a', 'unitAdmin', 'failed attempt', 'unitAdmin tried creating a new pers of type->OFFR(MALE) and svc no->test', '101 ADG', '2024-03-11 13:32:29.000000'),
('65eefa3a02ddc', 'unitAdmin', 'create', 'unitAdmin created a new pers of type->OFFR(MALE) and svc no->test', '101 ADG', '2024-03-11 13:34:02.000000'),
('65ef06b2bef12', 'unitAdmin', 'failed attempt', 'unitAdmin tried creating a new pers of type->OFFR(MALE) and svc no->test', '101 ADG', '2024-03-11 14:27:14.000000'),
('65ef06e838168', 'unitAdmin', 'create', 'unitAdmin created a new pers of type->OFFR(MALE) and svc no->test1', '101 ADG', '2024-03-11 14:28:08.000000'),
('65ef0d2c1491b', 'unitAdmin', 'delete', 'unitAdmin  deleted pers with svc no: test1 from the database', '101 ADG', '2024-03-11 14:54:52.000000'),
('65ef1005ee34e', 'unitAdmin', 'delete', 'unitAdmin  deleted pers with svc no: test from the database', '101 ADG', '2024-03-11 15:07:01.000000'),
('65ef11ce25c9d', 'unitAdmin', 'create', 'unitAdmin created a new pers of type->AIRMAN and svc no->test1', '101 ADG', '2024-03-11 15:14:38.000000'),
('65ef129e9b66f', 'unitAdmin', 'delete', 'unitAdmin  deleted pers with svc no: test1 from the database', '101 ADG', '2024-03-11 15:18:06.000000'),
('65ef16f6c678b', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-11 15:36:38.000000'),
('65ef1702c1144', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-11 15:36:50.000000'),
('65ef1ef1bfc4a', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-11 16:10:41.000000'),
('65efa4e16ac6b', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-12 01:42:09.000000'),
('65efa535b8f68', 'unitAdmin', 'create', 'unitAdmin created a new pers of type->AIRWOMAN and svc no->testF', '101 ADG', '2024-03-12 01:43:33.000000'),
('65f003d762e7b', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-12 08:27:19.000000'),
('65f003dc83f26', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-12 08:27:24.000000'),
('65f0042576798', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-12 08:28:37.000000'),
('65f0042ccf17a', 'superEditor', 'Login', 'superEditor Logged in', 'HQ NAF', '2024-03-12 08:28:44.000000'),
('65f004f89840f', 'superEditor', 'Logout', 'superEditor Logged out', 'HQ NAF', '2024-03-12 08:32:08.000000'),
('65f005b5ea18e', 'NAF/4872', 'Login', 'NAF/4872 Logged in', 'HQ NAF', '2024-03-12 08:35:17.000000'),
('65f00615b2912', 'NAF/4872', 'Logout', 'NAF/4872 Logged out', 'HQ NAF', '2024-03-12 08:36:53.000000'),
('65f0061b2397b', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-12 08:36:59.000000'),
('65f024b7e0ddf', 'unitAdmin', 'update', 'unitAdmin updated a pers record with svc no->testF', '101 ADG', '2024-03-12 10:47:35.000000'),
('65f024d0c409b', 'unitAdmin', 'update', 'unitAdmin updated a pers record with svc no->testF', '101 ADG', '2024-03-12 10:48:00.000000'),
('65f02506840d3', 'unitAdmin', 'update', 'unitAdmin updated a pers record with svc no->testF', '101 ADG', '2024-03-12 10:48:54.000000'),
('65f0251cee9ef', 'unitAdmin', 'update', 'unitAdmin updated a pers record with svc no->testF', '101 ADG', '2024-03-12 10:49:16.000000'),
('65f025906de55', 'unitAdmin', 'update', 'unitAdmin updated a pers record with svc no->testF', '101 ADG', '2024-03-12 10:51:12.000000'),
('65f025a298613', 'unitAdmin', 'update', 'unitAdmin updated a pers record with svc no->testF', '101 ADG', '2024-03-12 10:51:30.000000'),
('65f02869d9fee', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-12 11:03:21.000000'),
('65f0286fbd653', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-12 11:03:27.000000'),
('65f0301e1163a', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-12 11:36:14.000000'),
('65f030835369d', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-12 11:37:55.000000'),
('65f1beee442fc', 'unitAdmin', 'failed attempt', 'unitAdmin tried creating a new  for svc no->test', '101 ADG', '2024-03-13 15:57:50.000000'),
('65f1bf79cffd6', 'unitAdmin', 'create', 'unitAdmin created a new LEAVE record  for svc no->test', '101 ADG', '2024-03-13 16:00:09.000000'),
('65f1c0d7a883e', 'unitAdmin', 'create', 'unitAdmin created a new PASS record  for svc no->test', '101 ADG', '2024-03-13 16:05:59.000000'),
('65f1c3878ca6f', 'unitAdmin', 'delete', 'unitAdmin  deleted a leave record from the database', '101 ADG', '2024-03-13 16:17:27.000000'),
('65f1c4325d611', 'unitAdmin', 'delete', 'unitAdmin  deleted a leave record from the database', '101 ADG', '2024-03-13 16:20:18.000000'),
('65f1c47d02859', 'unitAdmin', 'create', 'unitAdmin created a new LEAVE record  for svc no->test', '101 ADG', '2024-03-13 16:21:33.000000'),
('65f1c4f84c6d5', 'unitAdmin', 'create', 'unitAdmin created a new PASS record  for svc no->test', '101 ADG', '2024-03-13 16:23:36.000000'),
('65f1c69a6bc52', 'unitAdmin', 'delete', 'unitAdmin  deleted a leave record from the database', '101 ADG', '2024-03-13 16:30:34.000000'),
('65f1e4a96f075', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-13 18:38:49.000000'),
('65f1e4b07cd8b', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-13 18:38:56.000000'),
('65f2ca1fbfad8', 'unitAdmin', 'create', 'unitAdmin created a new LEAVE record  for svc no->test', '101 ADG', '2024-03-14 10:57:51.000000'),
('65f2e5464f8fe', 'unitAdmin', 'create', 'unitAdmin created a new pers of type->AIRMAN and svc no->test123', '101 ADG', '2024-03-14 12:53:42.000000'),
('65f2e5e915a78', 'unitAdmin', 'create', 'unitAdmin created a new LEAVE record  for svc no->test123', '101 ADG', '2024-03-14 12:56:25.000000'),
('65f2e615653b9', 'unitAdmin', 'delete', 'unitAdmin  deleted a leave record from the database', '101 ADG', '2024-03-14 12:57:09.000000'),
('65f2e61c1f8b3', 'unitAdmin', 'delete', 'unitAdmin  deleted a leave record from the database', '101 ADG', '2024-03-14 12:57:16.000000'),
('65f2f6bd429aa', 'unitAdmin', 'failed attempt', 'unitAdmin tried creating a new LEAVE for svc no->test123', '101 ADG', '2024-03-14 14:08:13.000000'),
('65f2f71a2edbb', 'unitAdmin', 'create', 'unitAdmin created a new LEAVE record  for svc no->test123', '101 ADG', '2024-03-14 14:09:46.000000'),
('65f2f7e4b0d91', 'unitAdmin', 'create', 'unitAdmin created a new PASS record  for svc no->testF', '101 ADG', '2024-03-14 14:13:08.000000');

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
-- Table structure for table `eqpt`
--

CREATE TABLE `eqpt` (
  `EQPT_ID` varchar(50) NOT NULL,
  `EQPT` varchar(50) NOT NULL,
  `EQPT_TYPE_ID` varchar(50) NOT NULL,
  `DESCRIPTION` varchar(100) NOT NULL,
  `REMARK` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eqpttype`
--

CREATE TABLE `eqpttype` (
  `EQPT_TYPE_ID` varchar(50) NOT NULL,
  `EQPT_TYPE` varchar(50) NOT NULL,
  `DESCRIPTION` varchar(100) NOT NULL,
  `REMARK` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('65f2f71a2e611', 'test123', 'test', 'test', '2024-02-27', '2024-03-15', '101 ADG', 'LEAVE', 'NIL'),
('65f2f7e4b0632', 'testF', 'test', 'test', '2024-02-28', '2024-03-07', '101 ADG', 'PASS', 'NIL');

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
('test123', 'ACM', 'test123', 'test123', 'IT', '07054634234', '2024-03-06', '101 ADG', 'test123', '2024-03-14', '401 FTS', 'test123', 'test123', 'AIRMAN', 'test@airforce.mil.ng', 'NIL'),
('testF', 'PLT OFFR', 'testF123', 'testF123', 'IT', '07054634234', '2024-03-06', '101 ADG', 'testF123', '2024-02-28', '401 FTS', 'testF123', 'testF123', 'OFFR(FEMALE)', 'test@airforce.mil.ng', '123');

-- --------------------------------------------------------

--
-- Table structure for table `platform`
--

CREATE TABLE `platform` (
  `PLATFORM_ID` varchar(50) NOT NULL,
  `PLATFORM` varchar(100) NOT NULL,
  `DESCRIPTION` varchar(100) NOT NULL,
  `UNIT_CODE` varchar(20) NOT NULL,
  `STATUS` varchar(100) NOT NULL,
  `REMARK` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('testAdmin2', 'FG OFFR', 'testAdmin2', 'testAdmin2', '401 FTS', 'UNIT_ADMIN', 'testAdmin123'),
('unitAdmin', 'FG OFFR', 'unitAdmin', 'unitAdmin', '101 ADG', 'UNIT_ADMIN', 'unitAdmin');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `eqpt`
--
ALTER TABLE `eqpt`
  ADD KEY `EQPT_TYPE_ID` (`EQPT_TYPE_ID`);

--
-- Indexes for table `eqpttype`
--
ALTER TABLE `eqpttype`
  ADD PRIMARY KEY (`EQPT_TYPE_ID`);

--
-- Indexes for table `leave_pass`
--
ALTER TABLE `leave_pass`
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
