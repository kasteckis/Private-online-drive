-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 29, 2019 at 06:18 PM
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
-- Database: `galgaldas_laik`
--

-- --------------------------------------------------------

--
-- Table structure for table `BadLogins`
--

CREATE TABLE `BadLogins` (
  `id` int(11) NOT NULL,
  `ip` varchar(1000) NOT NULL,
  `tries` int(11) NOT NULL,
  `bannedTill` datetime NOT NULL,
  `lastLogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `SharedFiles`
--

CREATE TABLE `SharedFiles` (
  `id` int(11) NOT NULL,
  `whenCreated` datetime NOT NULL,
  `tillWhen` datetime NOT NULL,
  `fileOwnerId` int(11) NOT NULL,
  `otherId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `nick`, `status`, `password`, `suspended`, `lastLogged`, `email`, `note`) VALUES
(1, 'root', 'admin', '$2y$10$nGNR0et4o1POTy8QmO6UCOfFsGO96tj7h26xGXRwClXgk/A71dHI.', '0', '2019-01-01 20:00:00', '', 'This is your first note!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BadLogins`
--
ALTER TABLE `BadLogins`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `SharedFiles`
--
ALTER TABLE `SharedFiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fileOwnerId` (`fileOwnerId`),
  ADD KEY `otherId` (`otherId`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BadLogins`
--
ALTER TABLE `BadLogins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Logs`
--
ALTER TABLE `Logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pwdReset`
--
ALTER TABLE `pwdReset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `SharedFiles`
--
ALTER TABLE `SharedFiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `SharedFiles`
--
ALTER TABLE `SharedFiles`
  ADD CONSTRAINT `fileOwnerId` FOREIGN KEY (`fileOwnerId`) REFERENCES `Users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `otherId` FOREIGN KEY (`otherId`) REFERENCES `Users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
