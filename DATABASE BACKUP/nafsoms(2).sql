-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2024 at 07:23 AM
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
('65f2f7e4b0d91', 'unitAdmin', 'create', 'unitAdmin created a new PASS record  for svc no->testF', '101 ADG', '2024-03-14 14:13:08.000000'),
('65f2fae64e5b5', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-14 14:25:58.000000'),
('65f2fb1b8891d', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-14 14:26:51.000000'),
('65f2fb76649cd', 'unitAdmin', 'delete', 'unitAdmin  deleted pers with svc no: test123 from the database', '101 ADG', '2024-03-14 14:28:22.000000'),
('65f2fc1e55bc6', 'unitAdmin', 'create', 'unitAdmin created a new pers of type->OFFR(MALE) and svc no->NAF/4785', '101 ADG', '2024-03-14 14:31:10.000000'),
('65f2fc512b5ac', 'unitAdmin', 'delete', 'unitAdmin  deleted a leave record from the database', '101 ADG', '2024-03-14 14:32:01.000000'),
('65f2fc59431d9', 'unitAdmin', 'delete', 'unitAdmin  deleted a leave record from the database', '101 ADG', '2024-03-14 14:32:09.000000'),
('65f2fcc16ff48', 'unitAdmin', 'failed attempt', 'unitAdmin tried creating a new LEAVE for svc no->NAF/4785', '101 ADG', '2024-03-14 14:33:53.000000'),
('65f2fce3da914', 'unitAdmin', 'create', 'unitAdmin created a new LEAVE record  for svc no->NAF/4785', '101 ADG', '2024-03-14 14:34:27.000000'),
('65f2fd6bb3b5f', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-14 14:36:43.000000'),
('65f2fd892b3dd', 'testAdmin2', 'Login', 'testAdmin2 Logged in', '401 FTS', '2024-03-14 14:37:13.000000'),
('65f2ff1e57067', 'testAdmin2', 'Logout', 'testAdmin2 Logged out', '401 FTS', '2024-03-14 14:43:58.000000'),
('65f2ff261ab2f', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-14 14:44:06.000000'),
('65f3037f9b3cd', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-14 15:02:39.000000'),
('65f303d705924', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-14 15:04:07.000000'),
('65f304460c01e', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-14 15:05:58.000000'),
('65f3044e05485', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-14 15:06:06.000000'),
('65f30454133de', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-14 15:06:12.000000'),
('65f304b543648', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-14 15:07:49.000000'),
('65f30538e86a9', 'unitAdmin', 'create', 'unitAdmin created user NAF/4909', '101 ADG', '2024-03-14 15:10:00.000000'),
('65f305530e8d3', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-14 15:10:27.000000'),
('65f3056299c16', 'NAF/4909', 'Login', 'NAF/4909 Logged in', '101 ADG', '2024-03-14 15:10:42.000000'),
('65f305b6ad76c', 'NAF/4909', 'Login', 'NAF/4909 Logged in', '101 ADG', '2024-03-14 15:12:06.000000'),
('65f305d530ecd', 'NAF/4909', 'delete', 'NAF/4909  deleted a leave record from the database', '101 ADG', '2024-03-14 15:12:37.000000'),
('65f3096244f25', 'NAF/4909', 'Logout', 'NAF/4909 Logged out', '101 ADG', '2024-03-14 15:27:46.000000'),
('65f309763c715', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-14 15:28:06.000000'),
('65f3117f0070f', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-14 16:02:23.000000'),
('65f31216755ef', 'unitAdmin2', 'Login', 'unitAdmin2 Logged in', '401 FTS', '2024-03-14 16:04:54.000000'),
('65f31268842d4', 'unitAdmin2', 'Logout', 'unitAdmin2 Logged out', '401 FTS', '2024-03-14 16:06:16.000000'),
('65f31288de82e', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-14 16:06:48.000000'),
('65f32e60cc779', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-14 18:05:36.000000'),
('65f32e671aac5', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-14 18:05:43.000000'),
('65f32ff8edb84', 'unitAdmin', 'delete', 'unitAdmin  deleted pers with svc no: testF from the database', '101 ADG', '2024-03-14 18:12:24.000000'),
('65f33001894bd', 'unitAdmin', 'delete', 'unitAdmin  deleted pers with svc no: NAF/4785 from the database', '101 ADG', '2024-03-14 18:12:33.000000'),
('65f331b9442b1', 'unitAdmin', 'create', 'unitAdmin created a new pers of type->OFFR(MALE) and svc no->NAF/4872', '101 ADG', '2024-03-14 18:19:53.000000'),
('65f3f1c741012', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-15 07:59:19.000000'),
('65f3f1d2d5b8e', 'unitAdmin2', 'Login', 'unitAdmin2 Logged in', '401 FTS', '2024-03-15 07:59:30.000000'),
('65f3fa175faba', '', 'Logout', ' Logged out', '', '2024-03-15 08:34:47.000000'),
('65f3fa8457a94', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-15 08:36:36.000000'),
('65f428f484e48', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-15 11:54:44.000000'),
('65f429ff74b3b', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-15 11:59:11.000000'),
('65f5a61998f20', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-16 15:00:57.000000'),
('65f5a620340f5', 'unitAdmin2', 'Login', 'unitAdmin2 Logged in', '401 FTS', '2024-03-16 15:01:04.000000'),
('65f5f36de8984', 'unitAdmin2', 'Logout', 'unitAdmin2 Logged out', '401 FTS', '2024-03-16 20:30:53.000000'),
('65f5fb1d6faf7', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-16 21:03:41.000000'),
('65f5fbce77980', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-16 21:06:38.000000'),
('65f699bd17fdc', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-17 08:20:29.000000'),
('65f69a09db673', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-17 08:21:45.000000'),
('65f69b3691757', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-17 08:26:46.000000'),
('65f69c7aa2d6d', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-17 08:32:10.000000'),
('65f716492b23d', 'unitAdmin', 'create', 'unitAdmin created a new LEAVE record  for svc no->NAF/4872', '101 ADG', '2024-03-17 17:11:53.000000'),
('65f7169f6aa20', 'unitAdmin', 'create', 'unitAdmin created a new PASS record  for svc no->NAF/4872', '101 ADG', '2024-03-17 17:13:19.000000'),
('65f716fa971f0', 'unitAdmin', 'create', 'unitAdmin created a new PASS record  for svc no->NAF/4872', '101 ADG', '2024-03-17 17:14:50.000000'),
('65f7f79610050', 'unitAdmin', 'add', 'unitAdmin added a new item named ->item1 to the iventory', '101 ADG', '2024-03-18 09:13:10.000000'),
('65f7f9a784789', 'unitAdmin', 'add', 'unitAdmin added a new item named ->item2 to the iventory', '101 ADG', '2024-03-18 09:21:59.000000'),
('65f7f9c1865a3', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-18 09:22:25.000000'),
('65f7f9c757fbe', 'unitAdmin2', 'Login', 'unitAdmin2 Logged in', '401 FTS', '2024-03-18 09:22:31.000000'),
('65f7f9e3b1e39', 'unitAdmin2', 'add', 'unitAdmin2 added a new item named ->item3 to the iventory', '401 FTS', '2024-03-18 09:22:59.000000'),
('65f7fa4782278', 'unitAdmin2', 'Logout', 'unitAdmin2 Logged out', '401 FTS', '2024-03-18 09:24:39.000000'),
('65f7fa55ec6d3', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-18 09:24:53.000000'),
('65f803c5c50f4', 'unitAdmin', 'delete', 'unitAdmin  deleted an item from the inventory', '101 ADG', '2024-03-18 10:05:09.000000'),
('65f8046758d87', 'unitAdmin', 'delete', 'unitAdmin  deleted an item from the inventory', '101 ADG', '2024-03-18 10:07:51.000000'),
('65f804c06439f', 'unitAdmin', 'add', 'unitAdmin added a new item named ->item1 to the iventory', '101 ADG', '2024-03-18 10:09:20.000000'),
('65f804deb8566', 'unitAdmin', 'delete', 'unitAdmin  deleted an item from the inventory', '101 ADG', '2024-03-18 10:09:50.000000'),
('65f8070d9dd3a', 'unitAdmin', 'add', 'unitAdmin added a new item named ->item1 to the iventory', '101 ADG', '2024-03-18 10:19:09.000000'),
('65f8808370d42', 'unitAdmin', 'update', 'unitAdmin updated an Item named ->item12345 in the inventory', '101 ADG', '2024-03-18 18:57:23.000000'),
('65f880ca1c017', 'unitAdmin', 'update', 'unitAdmin updated an Item named ->item12345 in the inventory', '101 ADG', '2024-03-18 18:58:34.000000'),
('65f88101dadbe', 'unitAdmin', 'update', 'unitAdmin updated an Item named ->item12345 in the inventory', '101 ADG', '2024-03-18 18:59:29.000000'),
('65f8811990722', 'unitAdmin', 'delete', 'unitAdmin  deleted an item from the inventory', '101 ADG', '2024-03-18 18:59:53.000000'),
('65f881418cf1a', 'unitAdmin', 'add', 'unitAdmin added a new item named ->item1 to the iventory', '101 ADG', '2024-03-18 19:00:33.000000'),
('65f8815a7cbf1', 'unitAdmin', 'update', 'unitAdmin updated an Item named ->item12345 in the inventory', '101 ADG', '2024-03-18 19:00:58.000000'),
('65f8828232094', 'unitAdmin', 'add', 'unitAdmin added a new item named ->item2 to the iventory', '101 ADG', '2024-03-18 19:05:54.000000'),
('65f8828e37c3f', 'unitAdmin', 'delete', 'unitAdmin  deleted an item from the inventory', '101 ADG', '2024-03-18 19:06:06.000000'),
('65f96f9e4ef6c', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-19 11:57:34.000000'),
('65f96fc28e8ea', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-19 11:58:10.000000'),
('65f97050c0198', 'unitAdmin', 'create', 'unitAdmin created a new pers of type->OFFR(MALE) and svc no->test', '101 ADG', '2024-03-19 12:00:32.000000'),
('65f9705b7ca63', 'unitAdmin', 'delete', 'unitAdmin  deleted pers with svc no: test from the database', '101 ADG', '2024-03-19 12:00:43.000000'),
('65f9708cbf9b4', 'unitAdmin', 'add', 'unitAdmin added a new item named ->item2 to the iventory', '101 ADG', '2024-03-19 12:01:32.000000'),
('65f970966d95a', 'unitAdmin', 'delete', 'unitAdmin  deleted an item from the inventory', '101 ADG', '2024-03-19 12:01:42.000000'),
('65f970b8285ac', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-19 12:02:16.000000'),
('65f9711611ced', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-19 12:03:50.000000'),
('65f9718449e57', 'unitAdmin', 'create', 'unitAdmin created a new pers of type->OFFR(MALE) and svc no->NAF/2247', '101 ADG', '2024-03-19 12:05:40.000000'),
('65f971ed61cdf', 'unitAdmin', 'failed attempt', 'unitAdmin tried creating a new LEAVE for svc no->NAF/4872', '101 ADG', '2024-03-19 12:07:25.000000'),
('65f9720273b19', 'unitAdmin', 'create', 'unitAdmin created a new LEAVE record  for svc no->NAF/4872', '101 ADG', '2024-03-19 12:07:46.000000'),
('65fa9001b2498', 'unitAdmin', 'add', 'unitAdmin added a new item type named ->Helmet to the database', '101 ADG', '2024-03-20 08:28:01.000000'),
('65fa900c28b55', 'unitAdmin', 'delete', 'unitAdmin  deleted an item type from the database', '101 ADG', '2024-03-20 08:28:12.000000'),
('65fa901f24ef7', 'unitAdmin', 'add', 'unitAdmin added a new item type named ->Helmet to the database', '101 ADG', '2024-03-20 08:28:31.000000'),
('65fa988fce9e0', 'unitAdmin', 'delete', 'unitAdmin  deleted user NAF/4909 from the database', '101 ADG', '2024-03-20 09:04:31.000000'),
('65fa9a6f1d61a', 'unitAdmin', 'create', 'unitAdmin created user test', '101 ADG', '2024-03-20 09:12:31.000000'),
('65fa9ad270fed', 'unitAdmin', 'create', 'unitAdmin created user test6', '101 ADG', '2024-03-20 09:14:10.000000'),
('65fa9ae6b66c2', 'unitAdmin', 'delete', 'unitAdmin  deleted user test from the database', '101 ADG', '2024-03-20 09:14:30.000000'),
('65fa9aee0b157', 'unitAdmin', 'delete', 'unitAdmin  deleted user test6 from the database', '101 ADG', '2024-03-20 09:14:38.000000'),
('65fa9b08a6990', 'unitAdmin', 'failed attempt', 'unitAdmin tried creating user unitAdmin. The User already existed', '101 ADG', '2024-03-20 09:15:04.000000'),
('65faa77c47f7d', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-20 10:08:12.000000'),
('65faaf9050c90', 'unitAdmin', 'failed attempt', 'unitAdmin tried creating user test. User passwords unmatched', '101 ADG', '2024-03-20 10:42:40.000000'),
('65faafa49a6c4', 'unitAdmin', 'create', 'unitAdmin created user test', '101 ADG', '2024-03-20 10:43:00.000000'),
('65faafb065899', 'unitAdmin', 'delete', 'unitAdmin  deleted user test from the database', '101 ADG', '2024-03-20 10:43:12.000000'),
('65faafb7b83fc', 'unitAdmin', 'failed attempt', 'unitAdmin  tried deleting user unitAdmin from the database', '101 ADG', '2024-03-20 10:43:19.000000'),
('65faafe807e12', 'unitAdmin', 'failed attempt', 'unitAdmin  tried deleting user unitAdmin from the database', '101 ADG', '2024-03-20 10:44:08.000000'),
('65faafef007a0', 'unitAdmin', 'failed attempt', 'unitAdmin  tried deleting user unitAdmin from the database', '101 ADG', '2024-03-20 10:44:15.000000'),
('65fac49bbc105', 'unitAdmin', 'add', 'unitAdmin  added NAF/4872 to the pde state', '101 ADG', '2024-03-20 12:12:27.000000'),
('65fac77de4f73', 'unitAdmin', 'delete', 'unitAdmin  deleted a pers from the pde state', '101 ADG', '2024-03-20 12:24:45.000000'),
('65fac852898e1', 'unitAdmin', 'add', 'unitAdmin  added NAF/4872 to the pde state', '101 ADG', '2024-03-20 12:28:18.000000'),
('65fac8705d85c', 'unitAdmin', 'delete', 'unitAdmin  deleted a pers from the pde state', '101 ADG', '2024-03-20 12:28:48.000000'),
('65fac87f4ebc1', 'unitAdmin', 'add', 'unitAdmin  added NAF/4872 to the pde state', '101 ADG', '2024-03-20 12:29:03.000000'),
('65fac8b951ac4', 'unitAdmin', 'delete', 'unitAdmin  deleted a pers from the pde state', '101 ADG', '2024-03-20 12:30:01.000000'),
('65fb00d23996b', 'unitAdmin', 'add', 'unitAdmin  added NAF/2247 to the pde state', '101 ADG', '2024-03-20 16:29:22.000000'),
('65fb00da1d9c4', 'unitAdmin', 'delete', 'unitAdmin  deleted a pers from the pde state', '101 ADG', '2024-03-20 16:29:30.000000'),
('65fb0493b3861', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-20 16:45:23.000000'),
('65fb0499c9441', 'unitAdmin2', 'Login', 'unitAdmin2 Logged in', '401 FTS', '2024-03-20 16:45:29.000000'),
('65fb0520c5f0f', 'unitAdmin2', 'create', 'unitAdmin2 created a new pers of type->OFFR(FEMALE) and svc no->test2', '401 FTS', '2024-03-20 16:47:44.000000'),
('65fb07d5124a7', 'unitAdmin2', 'Logout', 'unitAdmin2 Logged out', '401 FTS', '2024-03-20 16:59:17.000000'),
('65fb07dc49ced', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-20 16:59:24.000000'),
('65fb08529bbbf', 'unitAdmin', 'create', 'unitAdmin created a new PASS record  for svc no->NAF/2247', '101 ADG', '2024-03-20 17:01:22.000000'),
('65fb094c20fc9', 'unitAdmin', 'delete', 'unitAdmin  deleted a leave record from the database', '101 ADG', '2024-03-20 17:05:32.000000'),
('65fb095a05150', 'unitAdmin', 'add', 'unitAdmin  added NAF/2247 to the pde state', '101 ADG', '2024-03-20 17:05:46.000000'),
('65fb09af64adb', 'unitAdmin', 'failed attempt', 'unitAdmin  tried deleting user unitAdmin from the database', '101 ADG', '2024-03-20 17:07:11.000000'),
('65fb19916ef5b', 'unitAdmin', 'add', 'unitAdmin  added NAF/2247 to the pde state', '101 ADG', '2024-03-20 18:14:57.000000'),
('65fb19f355c50', 'unitAdmin', 'delete', 'unitAdmin  deleted a pers from the pde state', '101 ADG', '2024-03-20 18:16:35.000000'),
('65fb19fd67f55', 'unitAdmin', 'failed attempt', 'unitAdmin tried adding NAF/2247 to pde state', '101 ADG', '2024-03-20 18:16:45.000000'),
('65fb1a4c4efaa', 'unitAdmin', 'failed attempt', 'unitAdmin tried adding NAF/2247 to pde state', '101 ADG', '2024-03-20 18:18:04.000000'),
('65fb1b487a92d', 'unitAdmin', 'create', 'unitAdmin created a new pers of type->AIRMAN and svc no->NAF10/23456', '101 ADG', '2024-03-20 18:22:16.000000'),
('65fb1b8f20151', 'unitAdmin', 'failed attempt', 'unitAdmin tried adding NAF/2247 to pde state', '101 ADG', '2024-03-20 18:23:27.000000'),
('65fb1bb39508f', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23456 to the pde state', '101 ADG', '2024-03-20 18:24:03.000000'),
('65fb1ed9f0c48', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23456 to the pde state', '101 ADG', '2024-03-20 18:37:29.000000'),
('65fb1efac6669', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23456 to the pde state', '101 ADG', '2024-03-20 18:38:02.000000'),
('65fb1f7b27283', 'unitAdmin', 'delete', 'unitAdmin  deleted a pers from the pde state', '101 ADG', '2024-03-20 18:40:11.000000'),
('65fb1f7faafb5', 'unitAdmin', 'delete', 'unitAdmin  deleted a pers from the pde state', '101 ADG', '2024-03-20 18:40:15.000000'),
('65fb1f828ab32', 'unitAdmin', 'delete', 'unitAdmin  deleted a pers from the pde state', '101 ADG', '2024-03-20 18:40:18.000000'),
('65fb1f86940b8', 'unitAdmin', 'delete', 'unitAdmin  deleted a pers from the pde state', '101 ADG', '2024-03-20 18:40:22.000000'),
('65fb1f9023d1e', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-20 18:40:32.000000'),
('65fb1f9692f35', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-20 18:40:38.000000'),
('65fb1ff09a0ae', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-20 18:42:08.000000'),
('65fb1ff780662', 'unitAdmin2', 'Login', 'unitAdmin2 Logged in', '401 FTS', '2024-03-20 18:42:15.000000'),
('65fb2060b5c78', 'unitAdmin2', 'create', 'unitAdmin2 created a new pers of type->OFFR(FEMALE) and svc no->NAF10/23456F', '401 FTS', '2024-03-20 18:44:00.000000'),
('65fb20bab3b07', 'unitAdmin2', 'create', 'unitAdmin2 created a new LEAVE record  for svc no->NAF10/23456F', '401 FTS', '2024-03-20 18:45:30.000000'),
('65fb21ede4c38', 'unitAdmin2', 'add', 'unitAdmin2  added test2 to the pde state', '401 FTS', '2024-03-20 18:50:37.000000'),
('65fba97c9105d', 'unitAdmin2', 'add', 'unitAdmin2  added test2 to the pde state', '401 FTS', '2024-03-21 04:29:00.000000'),
('65fbaa9a98bdc', 'unitAdmin2', 'Logout', 'unitAdmin2 Logged out', '401 FTS', '2024-03-21 04:33:46.000000'),
('65fbaaa390629', 'unitAdmin2', 'Login', 'unitAdmin2 Logged in', '401 FTS', '2024-03-21 04:33:55.000000'),
('65fbaab560571', 'unitAdmin2', 'add', 'unitAdmin2  added test2 to the pde state', '401 FTS', '2024-03-21 04:34:13.000000'),
('65fbaacf4ff5a', 'unitAdmin2', 'delete', 'unitAdmin2  deleted a pers from the pde state', '401 FTS', '2024-03-21 04:34:39.000000'),
('65fbab76bcb89', 'unitAdmin2', 'add', 'unitAdmin2 added a new item type named ->Mask to the database', '401 FTS', '2024-03-21 04:37:26.000000'),
('65fbab8ca2c02', 'unitAdmin2', 'delete', 'unitAdmin2  deleted an item from the inventory', '401 FTS', '2024-03-21 04:37:48.000000'),
('65fbabb1c59f6', 'unitAdmin2', 'delete', 'unitAdmin2  deleted an item type from the database', '401 FTS', '2024-03-21 04:38:25.000000'),
('65fbac87ceb99', 'unitAdmin2', 'Logout', 'unitAdmin2 Logged out', '401 FTS', '2024-03-21 04:41:59.000000'),
('65fbac8f3793d', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-21 04:42:07.000000'),
('65fbadf852661', 'unitAdmin', 'add', 'unitAdmin  added NAF/2247 to the pde state', '101 ADG', '2024-03-21 04:48:08.000000'),
('65fbae0584822', 'unitAdmin', 'add', 'unitAdmin  added NAF/2247 to the pde state', '101 ADG', '2024-03-21 04:48:21.000000'),
('65fbae0c28449', 'unitAdmin', 'delete', 'unitAdmin  deleted a pers from the pde state', '101 ADG', '2024-03-21 04:48:28.000000'),
('65fbb05474851', 'unitAdmin', 'failed attempt', 'unitAdmin tried adding NAF/2247 to pde state', '101 ADG', '2024-03-21 04:58:12.000000'),
('65fbb0af5a9c8', 'unitAdmin', 'failed attempt', 'unitAdmin tried adding NAF/2247 to pde state', '101 ADG', '2024-03-21 04:59:43.000000'),
('65fbb1621e481', 'unitAdmin', 'delete', 'unitAdmin  deleted a pers from the pde state', '101 ADG', '2024-03-21 05:02:42.000000'),
('65fbb17036a4c', 'unitAdmin', 'failed attempt', 'unitAdmin tried adding NAF/2247 to pde state', '101 ADG', '2024-03-21 05:02:56.000000'),
('65fbb175f1c7c', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-21 05:03:01.000000'),
('65fbb17b5775c', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-21 05:03:07.000000'),
('65fbb188191a2', 'unitAdmin', 'failed attempt', 'unitAdmin tried adding NAF/2247 to pde state', '101 ADG', '2024-03-21 05:03:20.000000'),
('65fbd9e27b1f3', 'unitAdmin', 'failed attempt', 'unitAdmin tried adding NAF/2247 to pde state', '101 ADG', '2024-03-21 07:55:30.000000'),
('65fbd9f8567f0', 'unitAdmin', 'failed attempt', 'unitAdmin tried adding NAF10/23456 to pde state', '101 ADG', '2024-03-21 07:55:52.000000'),
('65fbdbf869c42', 'unitAdmin', 'failed attempt', 'unitAdmin tried adding NAF/2247 to pde state', '101 ADG', '2024-03-21 08:04:24.000000'),
('65fbdd316a714', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-21 08:09:37.000000'),
('65fbdd3836098', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-21 08:09:44.000000'),
('65fbded847836', 'unitAdmin', 'add', 'unitAdmin  added NAF/2247 to the pde state', '101 ADG', '2024-03-21 08:16:40.000000'),
('65fbdee76e1dd', 'unitAdmin', 'add', 'unitAdmin  added NAF/2247 to the pde state', '101 ADG', '2024-03-21 08:16:55.000000'),
('65fbe02803db8', 'unitAdmin', 'add', 'unitAdmin  added NAF/2247 to the pde state', '101 ADG', '2024-03-21 08:22:16.000000'),
('65fbe2d4ce452', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-21 08:33:40.000000'),
('65fbe2da6a83b', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-21 08:33:46.000000'),
('65fbe2f202f14', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-21 08:34:10.000000'),
('65fbe335aed00', 'unitAdmin', 'failed attempt', 'unitAdmin tried adding NAF/2247 to pde state', '101 ADG', '2024-03-21 08:35:17.000000'),
('65fbe3835aeab', 'unitAdmin', 'failed attempt', 'unitAdmin tried adding NAF/2247 to pde state', '101 ADG', '2024-03-21 08:36:35.000000'),
('65fbe4138072f', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23456 to the pde state', '101 ADG', '2024-03-21 08:38:59.000000'),
('65fbe458a1345', 'unitAdmin', 'failed attempt', 'unitAdmin tried adding NAF/2247 to pde state', '101 ADG', '2024-03-21 08:40:08.000000'),
('65fbe46f9ca4f', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23456 to the pde state', '101 ADG', '2024-03-21 08:40:31.000000'),
('65fbe4d37395d', 'unitAdmin', 'failed attempt', 'unitAdmin tried adding NAF/2247 to pde state', '101 ADG', '2024-03-21 08:42:11.000000'),
('65fbe4f0483a9', 'unitAdmin', 'delete', 'unitAdmin  deleted a pers from the pde state', '101 ADG', '2024-03-21 08:42:40.000000'),
('65fbe4f4aa13f', 'unitAdmin', 'delete', 'unitAdmin  deleted a pers from the pde state', '101 ADG', '2024-03-21 08:42:44.000000'),
('65fbe4f98fab1', 'unitAdmin', 'delete', 'unitAdmin  deleted a pers from the pde state', '101 ADG', '2024-03-21 08:42:49.000000'),
('65fbe4ff1ccb3', 'unitAdmin', 'delete', 'unitAdmin  deleted a pers from the pde state', '101 ADG', '2024-03-21 08:42:55.000000'),
('65fbe50aa8738', 'unitAdmin', 'delete', 'unitAdmin  deleted a pers from the pde state', '101 ADG', '2024-03-21 08:43:06.000000'),
('65fbeb8064c98', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-21 09:10:40.000000'),
('65fbed7cb4084', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-21 09:19:08.000000'),
('65fc1f8aece1a', 'unitAdmin', 'add', 'unitAdmin  added NAF/2247 to the pde state', '101 ADG', '2024-03-21 12:52:42.000000'),
('65fc1fc8a1b2c', 'unitAdmin', 'create', 'unitAdmin created a new LEAVE record  for svc no->NAF/2247', '101 ADG', '2024-03-21 12:53:44.000000'),
('65fc201939b0a', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23456 to the pde state', '101 ADG', '2024-03-21 12:55:05.000000'),
('65fc25c3b332f', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-21 13:19:15.000000'),
('65fc3b2fa47a6', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23456 to the pde state', '101 ADG', '2024-03-21 14:50:39.000000'),
('65fc43632c9bc', 'unitAdmin', 'failed attempt', 'unitAdmin tried creating a new pers of type->OFFR(MALE) and svc no->test2', '101 ADG', '2024-03-21 15:25:39.000000'),
('65fc43a489ba1', 'unitAdmin', 'failed attempt', 'unitAdmin tried creating a new pers of type->OFFR(MALE) and svc no->test2', '101 ADG', '2024-03-21 15:26:44.000000'),
('65fc453d5b016', 'unitAdmin', 'failed attempt', 'unitAdmin tried creating a new pers of type->OFFR(MALE) and svc no->test2', '101 ADG', '2024-03-21 15:33:33.000000'),
('65fc4572e89a6', 'unitAdmin', 'create', 'unitAdmin created a new pers of type->OFFR(MALE) and svc no->test6', '101 ADG', '2024-03-21 15:34:26.000000'),
('65fc48a42d0cb', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-21 15:48:04.000000'),
('65fc48aa25a88', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-21 15:48:10.000000'),
('65fc4a4f492e0', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23456 to the pde state', '101 ADG', '2024-03-21 15:55:11.000000'),
('65fc4a7fe890e', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23456 to the pde state', '101 ADG', '2024-03-21 15:55:59.000000'),
('65fc4c6c5a32f', 'unitAdmin', 'delete', 'unitAdmin  deleted a pers from the pde state', '101 ADG', '2024-03-21 16:04:12.000000'),
('65fc4c7f9e735', 'unitAdmin', 'delete', 'unitAdmin  deleted a pers from the pde state', '101 ADG', '2024-03-21 16:04:31.000000'),
('65fd2a5f8840a', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23456 to the pde state', '101 ADG', '2024-03-22 07:51:11.000000'),
('65fd412371766', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23456 to the pde state', '101 ADG', '2024-03-22 09:28:19.000000'),
('65fd413998c02', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23456 to the pde state', '101 ADG', '2024-03-22 09:28:41.000000'),
('65fd4333c1fdc', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23456 to the pde state', '101 ADG', '2024-03-22 09:37:07.000000'),
('65fd4ff2aa5a9', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23456 to the pde state', '101 ADG', '2024-03-22 10:31:30.000000'),
('65fd501923b18', 'unitAdmin', 'delete', 'unitAdmin  deleted a pers from the pde state', '101 ADG', '2024-03-22 10:32:09.000000'),
('65fd5cda7e6fd', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-22 11:26:34.000000'),
('65fd5cf0b9739', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-22 11:26:56.000000'),
('65fd92a2c5cc3', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23456 to the pde state', '101 ADG', '2024-03-22 15:16:02.000000'),
('65fd9744f236a', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23456 to the pde state', '101 ADG', '2024-03-22 15:35:48.000000'),
('65fd97537a4fa', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23456 to the pde state', '101 ADG', '2024-03-22 15:36:03.000000'),
('65fd976003298', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23456 to the pde state', '101 ADG', '2024-03-22 15:36:16.000000'),
('65fd976b55c71', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23456 to the pde state', '101 ADG', '2024-03-22 15:36:27.000000'),
('65fd9778e7194', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-22 15:36:40.000000'),
('65fd978155f24', 'unitAdmin2', 'Login', 'unitAdmin2 Logged in', '401 FTS', '2024-03-22 15:36:49.000000'),
('65fd979407669', 'unitAdmin2', 'add', 'unitAdmin2  added test2 to the pde state', '401 FTS', '2024-03-22 15:37:08.000000'),
('65fd98ca2bf3c', 'unitAdmin2', 'add', 'unitAdmin2  added test2 to the pde state', '401 FTS', '2024-03-22 15:42:18.000000'),
('65fd98d16c71e', 'unitAdmin2', 'Logout', 'unitAdmin2 Logged out', '401 FTS', '2024-03-22 15:42:25.000000'),
('65fd98d9b5b55', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-22 15:42:33.000000'),
('65fd9960a9347', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23456 to the pde state', '101 ADG', '2024-03-22 15:44:48.000000'),
('65fd99f48d191', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-22 15:47:16.000000'),
('65fd99fa9b60f', 'unitAdmin2', 'Login', 'unitAdmin2 Logged in', '401 FTS', '2024-03-22 15:47:22.000000'),
('65fd9a0e56861', 'unitAdmin2', 'Logout', 'unitAdmin2 Logged out', '401 FTS', '2024-03-22 15:47:42.000000'),
('65fd9a150eb00', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-22 15:47:49.000000'),
('65fda33db5bb1', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23456 to the pde state', '101 ADG', '2024-03-22 16:26:53.000000'),
('65fda436ca664', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23456 to the pde state', '101 ADG', '2024-03-22 16:31:02.000000'),
('65fdb78144c29', 'unitAdmin', 'delete', 'unitAdmin  deleted a leave record from the database', '101 ADG', '2024-03-22 17:53:21.000000'),
('65fdb863f2b36', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-22 17:57:07.000000'),
('65fdb86e2c6b7', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-22 17:57:18.000000'),
('65fdbba2c17c4', 'unitAdmin', 'add', 'unitAdmin  added NAF/2247 to the pde state', '101 ADG', '2024-03-22 18:10:58.000000'),
('65fdbd50428df', 'unitAdmin', 'add', 'unitAdmin  added NAF/2247 to the pde state', '101 ADG', '2024-03-22 18:18:08.000000'),
('65fdbd671b4f5', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-22 18:18:31.000000'),
('65fdbd6ccadfa', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-22 18:18:36.000000'),
('65fdbd8cb774e', 'unitAdmin', 'Logout', 'unitAdmin Logged out', '101 ADG', '2024-03-22 18:19:08.000000'),
('65fdbd9313313', 'unitAdmin2', 'Login', 'unitAdmin2 Logged in', '401 FTS', '2024-03-22 18:19:15.000000'),
('65fdbda6c949f', 'unitAdmin2', 'add', 'unitAdmin2  added test2 to the pde state', '401 FTS', '2024-03-22 18:19:34.000000'),
('65fdbdad94138', 'unitAdmin2', 'Logout', 'unitAdmin2 Logged out', '401 FTS', '2024-03-22 18:19:41.000000'),
('65fdbdb243398', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-22 18:19:46.000000'),
('65fdc32cb1029', 'unitAdmin', 'add', 'unitAdmin  added NAF/2247 to the pde state', '101 ADG', '2024-03-22 18:43:08.000000'),
('65fdc356b85c5', 'unitAdmin', 'failed attempt', 'unitAdmin tried adding NAF/2247 to pde state', '101 ADG', '2024-03-22 18:43:50.000000'),
('65fdc392bce4c', 'unitAdmin', 'failed attempt', 'unitAdmin tried adding NAF/2247 to pde state', '101 ADG', '2024-03-22 18:44:50.000000'),
('65fdc3a2b1ce8', 'unitAdmin', 'delete', 'unitAdmin  deleted a pers from the pde state', '101 ADG', '2024-03-22 18:45:06.000000'),
('65fdc3ae816fd', 'unitAdmin', 'add', 'unitAdmin  added NAF/2247 to the pde state', '101 ADG', '2024-03-22 18:45:18.000000'),
('65fdc3baac043', 'unitAdmin', 'failed attempt', 'unitAdmin tried adding NAF/2247 to pde state', '101 ADG', '2024-03-22 18:45:30.000000'),
('65fdc406bf4fc', 'unitAdmin', 'failed attempt', 'unitAdmin tried adding NAF/2247 to pde state', '101 ADG', '2024-03-22 18:46:46.000000'),
('65fdc49078ddb', 'unitAdmin', 'failed attempt', 'unitAdmin tried creating a new pers of type->OFFR(MALE) and svc no->test2', '101 ADG', '2024-03-22 18:49:04.000000'),
('65fdc771b1d52', 'unitAdmin', 'failed attempt', 'unitAdmin tried adding NAF10/23456 to pde state', '101 ADG', '2024-03-22 19:01:21.000000'),
('65fdc7913c51d', 'unitAdmin', 'failed attempt', 'unitAdmin tried adding NAF10/23456 to pde state', '101 ADG', '2024-03-22 19:01:53.000000'),
('65fdc851268fc', 'unitAdmin', 'failed attempt', 'unitAdmin tried adding NAF/2247 to pde state', '101 ADG', '2024-03-22 19:05:05.000000'),
('65fdc85c162e4', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23456 to the pde state', '101 ADG', '2024-03-22 19:05:16.000000'),
('65fe7335d7b0a', 'unitAdmin', 'Login', 'unitAdmin Logged in', '101 ADG', '2024-03-23 07:14:13.000000'),
('65fe746a49b96', 'unitAdmin', 'add', 'unitAdmin  added NAF/2247 to the pde state', '101 ADG', '2024-03-23 07:19:22.000000'),
('65fe7511ec224', 'unitAdmin', 'failed attempt', 'unitAdmin tried adding NAF/2247 to pde state', '101 ADG', '2024-03-23 07:22:09.000000'),
('65fe752318945', 'unitAdmin', 'add', 'unitAdmin  added NAF10/23456 to the pde state', '101 ADG', '2024-03-23 07:22:27.000000');

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

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`ID`, `ITEM`, `ITEM_TYPE`, `DESCRIPTION`, `QTY`, `SVC`, `US`, `UNIT_CODE`, `OFFICE`, `MODEL`, `DEPLOYMENT`, `LOCATION`, `REMARK`) VALUES
('65f882823108f', 'item2', 'Mask', 'item1', 1, 1, 0, '101 ADG', 'item1', 'item1', 'item1', 'item1', 'item1');

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
('45345wrrte', 'Mask', 'Mask', '101 ADG', 'Nil'),
('65fa901f248f9', 'Helmet', 'Helmet', '101 ADG', 'Helmet');

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
('65f716492a922', 'NAF/4872', 'test', 'LAGOS', '2024-03-08', '2024-03-16', '101 ADG', 'LEAVE', 'NIL'),
('65f7169f6a3ae', 'NAF/4872', 'test', 'LAGOS', '2024-02-28', '2024-03-08', '101 ADG', 'PASS', 'NIL'),
('65f716fa96a0f', 'NAF/4872', 'test', 'LAGOS', '2024-02-29', '2024-03-22', '101 ADG', 'PASS', 'NIL'),
('65f9720272fc6', 'NAF/4872', 'adsfsfs', 'dsfsf', '2024-03-20', '2024-03-22', '101 ADG', 'LEAVE', 'afwrfw'),
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
('65fdc3ae80cf7', 'NAF/2247', 'ON PDE', '101 ADG', '2024-03-22', 'nil'),
('65fdc85c15ac1', 'NAF10/23456', 'LEAVE', '101 ADG', '2024-03-22', 'nil'),
('65fe746a48fef', 'NAF/2247', 'ON PDE', '101 ADG', '2024-03-23', 'nil'),
('65fe752317ee1', 'NAF10/23456', 'PASS', '101 ADG', '2024-03-23', 'nil');

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
('NAF/2247', 'AVM', 'S', 'PETERS', 'IT', '425353', '2024-03-13', '101 ADG', 'COMD', '2024-03-12', '401 FTS', 'ONDO', 'test', 'OFFR(MALE)', 'test@airforce.mil.ng', 'nil'),
('NAF/4872', 'FG OFFR', 'TW', 'OGUNDEJI', 'IT', '07056546750', '2024-03-14', '101 ADG', 'SOFTWARE DEVELOPER', '2024-03-14', '101 ADG', 'ONDO', 'ONDO WEST', 'OFFR(MALE)', 'ogundejiwaletemitope@gmail.com', 'NIL'),
('NAF10/23456', 'SGT', 'MP', 'SILAS', 'IT', '053353', '2024-02-27', '101 ADG', 'IT TECH', '2024-03-06', '401 FTS', 'BAYELSA', 'test', 'AIRMAN', 'test@airforce.mil.ng', 'nil'),
('NAF10/23456F', 'SGT', 'TT', 'test6', 'IT', '053353', '2024-02-27', '401 FTS', 'test6', '2024-03-04', '101 ADG', 'BAYELSA', 'test', 'OFFR(FEMALE)', 'dit@airforce.mil.ng', 'nil'),
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
('unitAdmin', 'FG OFFR', 'unitAdmin', 'unitAdmin', '101 ADG', 'UNIT_ADMIN', 'unitAdmin'),
('unitAdmin2', 'FG OFFR', 'unitAdmin2', 'unitAdmin2', '401 FTS', 'UNIT_ADMIN', 'unitAdmin2');

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
