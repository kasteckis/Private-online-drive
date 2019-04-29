-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2019 at 08:05 PM
-- Server version: 10.3.13-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galgaldas_devbridge`
--

-- --------------------------------------------------------

--
-- Table structure for table `Logs`
--

CREATE TABLE `Logs` (
  `id` int(11) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `user` varchar(1000) NOT NULL,
  `ip` varchar(1000) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Logs`
--

INSERT INTO `Logs` (`id`, `text`, `user`, `ip`, `date`) VALUES
(5, 'New user was created with nickaname gasdgad!', 'root', '88.222.175.63', '2019-04-08 18:24:44'),
(6, 'User deleted file named - algoo.png', 'root', '88.222.175.63', '2019-04-08 18:26:14'),
(9, 'User uploaded a file Screenshot.png !', 'root', '84.55.2.194', '2019-04-08 20:52:29'),
(11, 'User uploaded a file infographics1.PNG !', 'root', '88.119.54.88', '2019-04-08 21:15:50'),
(12, 'User uploaded a file Screenshot.png !', 'root', '84.55.2.194', '2019-04-08 21:17:05'),
(13, 'User uploaded a file Screenshot.png !', 'root', '84.55.2.194', '2019-04-08 21:17:10'),
(14, 'User uploaded a file Screenshot.png !', 'root', '84.55.2.194', '2019-04-08 21:17:15'),
(15, 'User uploaded a file favicon.jpg !', 'root', '84.55.2.194', '2019-04-08 21:19:23'),
(16, 'User uploaded a file favicon.jpg !', 'root', '84.55.2.194', '2019-04-08 21:19:26'),
(17, 'User uploaded a file favicon.jpg !', 'root', '84.55.2.194', '2019-04-08 21:25:54'),
(18, 'User uploaded a file infographics1.PNG !', 'root', '88.119.54.88', '2019-04-08 21:57:04'),
(19, 'User deleted file named - infographics1.PNG', 'root', '88.119.54.88', '2019-04-08 23:04:57'),
(20, 'User labas was edited!', 'root', '193.219.171.1', '2019-04-09 09:06:13'),
(24, 'Tried to connect to non-existant  account!', 'root', '88.222.175.63', '2019-04-09 15:48:46'),
(25, 'User tortonas was edited!', 'root', '193.219.171.159', '2019-04-16 13:40:54'),
(26, 'Tried to connect to root account and failed!', 'root', '84.55.2.194', '2019-04-17 17:44:18'),
(27, 'Tried to connect to root account and failed!', 'root', '84.55.2.194', '2019-04-17 17:51:55'),
(28, 'Tried to connect to non-existant d account!', 'root', '84.55.2.194', '2019-04-17 18:04:59'),
(29, 'Tried to connect to non-existant s account!', 'root', '84.55.2.194', '2019-04-17 18:09:21'),
(30, 'Tried to connect to non-existant re account!', 'root', '84.55.2.194', '2019-04-17 18:10:22'),
(31, 'Tried to connect to non-existant re account!', 'root', '84.55.2.194', '2019-04-17 18:11:00'),
(32, 'Tried to connect to root account and failed!', 'root', '84.55.2.194', '2019-04-17 18:11:08'),
(33, 'Tried to connect to root account and failed!', 'root', '84.55.2.194', '2019-04-17 18:15:17'),
(34, 'Tried to connect to non-existant r account!', 'root', '84.55.2.194', '2019-04-17 18:15:21'),
(35, 'Tried to connect to non-existant r account!', 'root', '84.55.2.194', '2019-04-17 18:18:12'),
(36, 'Tried to connect to non-existant rr account!', 'root', '84.55.2.194', '2019-04-17 18:18:17'),
(37, 'Tried to connect to non-existant re account!', 'root', '84.55.2.194', '2019-04-17 18:22:56'),
(38, 'Tried to connect to non-existant r account!', 'root', '84.55.2.194', '2019-04-17 18:22:59'),
(39, 'Tried to connect to non-existant r account!', 'root', '84.55.2.194', '2019-04-17 18:24:46'),
(40, 'Tried to connect to non-existant r account!', 'root', '84.55.2.194', '2019-04-17 18:26:52'),
(41, 'Tried to connect to non-existant r account!', 'root', '84.55.2.194', '2019-04-17 18:26:56'),
(42, 'Tried to connect to non-existant r account!', 'root', '84.55.2.194', '2019-04-17 18:29:35'),
(43, 'Tried to connect to non-existant r account!', 'root', '84.55.2.194', '2019-04-17 18:29:39'),
(44, 'Tried to connect to non-existant r account!', 'root', '84.55.2.194', '2019-04-17 18:33:06'),
(45, 'Tried to connect to non-existant r account!', 'root', '84.55.2.194', '2019-04-17 18:37:50'),
(46, 'Tried to connect to non-existant r account!', 'root', '84.55.2.194', '2019-04-17 18:39:58'),
(47, 'Tried to connect to non-existant r account!', 'root', '84.55.2.194', '2019-04-17 18:43:15'),
(48, 'Tried to connect to root account and failed!', 'root', '84.55.2.194', '2019-04-17 18:43:21'),
(49, 'Tried to connect to non-existant r account!', 'root', '84.55.2.194', '2019-04-17 18:43:27'),
(50, 'Tried to connect to root account and failed!', 'root', '84.55.2.194', '2019-04-17 18:43:31'),
(51, 'Tried to connect to non-existant r account!', 'root', '84.55.2.194', '2019-04-17 18:44:07'),
(52, 'Tried to connect to non-existant r account!', 'root', '84.55.2.194', '2019-04-17 18:44:11'),
(53, 'Tried to connect to non-existant r account!', 'root', '84.55.2.194', '2019-04-17 18:45:07'),
(54, 'Tried to connect to non-existant roo account!', 'root', '84.55.2.194', '2019-04-17 18:45:18'),
(55, 'Tried to connect to non-existant r account!', 'root', '84.55.2.194', '2019-04-17 18:50:47'),
(56, 'Tried to connect to root account and failed!', 'root', '84.55.2.194', '2019-04-17 18:50:53'),
(57, 'Tried to connect to non-existant ro account!', 'root', '84.55.2.194', '2019-04-17 18:51:15'),
(58, 'Tried to connect to non-existant r account!', '', '84.55.2.194', '2019-04-17 19:01:53'),
(59, 'Tried to connect to root account and failed!', '', '84.55.2.194', '2019-04-17 19:02:00'),
(60, 'Tried to connect to non-existant fsfs account!', '', '88.222.175.63', '2019-04-17 20:07:25'),
(61, 'Tried to connect to root account and failed!', '', '88.222.175.63', '2019-04-17 20:07:30'),
(63, 'Tried to connect to root account and failed!', '', '158.129.35.22', '2019-04-18 16:43:23'),
(64, 'Tried to connect to non-existant fdsfsd account!', '', '158.129.35.22', '2019-04-18 16:43:31'),
(65, 'Tried to connect to non-existant  account!', '', '158.129.35.22', '2019-04-18 16:44:34'),
(66, 'Tried to connect to non-existant  account!', '', '158.129.35.22', '2019-04-18 16:44:34'),
(67, 'Tried to connect to root account and failed!', '', '158.129.35.22', '2019-04-18 16:44:39'),
(68, 'Tried to connect to non-existant  account!', '', '158.129.35.22', '2019-04-18 16:56:54'),
(69, 'Tried to connect to non-existant  account!', '', '158.129.35.22', '2019-04-18 16:56:58'),
(70, 'New user was created with nickaname oo!', 'root', '158.129.35.22', '2019-04-18 17:09:52'),
(71, 'New user was created with nickaname memeboyus!', 'root', '158.129.35.22', '2019-04-18 17:11:43'),
(72, 'New user was created with nickaname oof!', 'root', '158.129.35.22', '2019-04-18 17:43:56'),
(73, 'New user was created with nickaname memeboi!', 'root', '158.129.35.22', '2019-04-18 17:44:55'),
(74, 'New user was created with nickaname gsgsd!', 'root', '158.129.35.22', '2019-04-18 17:48:15'),
(75, 'New user was created with nickaname sgsdg!', 'root', '158.129.35.22', '2019-04-18 17:48:31'),
(76, 'Tried to connect to test account and failed!', '', '158.129.35.22', '2019-04-18 18:22:16'),
(77, 'New user was created with nickaname tortonas!', 'root', '158.129.35.22', '2019-04-18 18:30:22'),
(78, 'User tortonas was edited!', 'tortonas', '158.129.35.22', '2019-04-18 18:31:05'),
(79, 'Tried to connect to root account and failed!', '', '84.55.2.194', '2019-04-21 23:13:32'),
(80, 'Tried to connect to root account and failed!', '', '84.55.2.194', '2019-04-21 23:13:34'),
(81, 'New user was created with nickaname marius!', 'root', '84.55.2.194', '2019-04-22 18:01:24'),
(82, 'Tried to connect to marius account and failed!', '', '84.55.2.194', '2019-04-22 19:40:34'),
(83, 'New user was created with nickaname marka!', 'root', '84.55.2.194', '2019-04-23 17:02:39'),
(84, 'Tried to connect to non-existant  account!', '', '84.15.102.250', '2019-04-24 11:38:29'),
(85, 'Tried to connect to non-existant  account!', '', '84.15.102.250', '2019-04-24 11:38:33'),
(86, 'Tried to connect to non-existant fg account!', '', '84.15.102.250', '2019-04-24 11:38:36'),
(87, 'Tried to connect to non-existant fg account!', '', '84.15.102.250', '2019-04-24 11:38:39'),
(88, 'Tried to connect to non-existant gfdg account!', '', '84.15.102.250', '2019-04-24 11:38:46'),
(89, 'Tried to connect to non-existant  account!', '', '84.15.102.250', '2019-04-24 11:41:28'),
(90, 'Tried to connect to non-existant dsad account!', '', '84.15.102.250', '2019-04-24 11:52:25'),
(91, 'Tried to connect to root account and failed!', '', '84.15.102.250', '2019-04-24 11:52:30'),
(92, 'Tried to connect to non-existant  account!', 'root', '84.15.102.250', '2019-04-24 11:58:20'),
(93, 'Tried to connect to non-existant  account!', '', '84.15.102.250', '2019-04-24 12:23:07'),
(94, 'Tried to connect to non-existant adsa account!', '', '84.15.102.250', '2019-04-24 12:27:37'),
(95, 'Tried to connect to test account and failed!', '', '84.15.102.250', '2019-04-24 13:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `pwdReset`
--

CREATE TABLE `pwdReset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `nick` varchar(1000) NOT NULL,
  `status` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `suspended` varchar(1000) NOT NULL,
  `lastLogged` datetime NOT NULL,
  `email` varchar(1000) NOT NULL,
  `note` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `nick`, `status`, `password`, `suspended`, `lastLogged`, `email`, `note`) VALUES
(1, 'root', 'admin', '$2y$10$/XqDBv6/I.4o.0slXEKskO1wu/JOiKII8qBNNlgYb76yHXBE7p4/q', '0', '2019-04-24 22:05:31', '', 'Labas\r\n\r\nKaip tu \r\n\r\nAne'),
(15, 'test', 'user', '$2y$10$0kz.nfB8LGuEgEsfFLzn0OmQUiixZsPYe9GR8snfSC61n4HH/.qEy', '0', '2019-04-18 18:38:56', 'tidish@inbox.lt', 'test acc'),
(23, 'tortonas', 'user', '$2y$10$kebiawqcoUDPK9OLZBfsVObwO0rIitDW7osfrX0VWizJy0YJC.qTy', '0', '2019-04-18 18:31:40', '', ''),
(24, 'marius', 'user', '$2y$10$0git3wpOdmuW7FBPVNgB/uVkMjwjXfU8tqtSreFKXCls4p9AWJjSG', '0', '2019-04-22 18:01:58', '', ''),
(25, 'marka', 'user', '$2y$10$DnBCzu7J8iHb7wTrqZzCpen6Gurx.dxryxpwrHBGTwOncJbmwtNZe', '0', '0000-00-00 00:00:00', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Logs`
--
ALTER TABLE `Logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pwdReset`
--
ALTER TABLE `pwdReset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Logs`
--
ALTER TABLE `Logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `pwdReset`
--
ALTER TABLE `pwdReset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
