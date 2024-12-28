-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 11, 2023 at 03:08 AM
-- Server version: 8.0.21
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cjmxjvbk_argona`
--

-- --------------------------------------------------------

--
-- Table structure for table `etats_tunisie`
--

CREATE TABLE `etats_tunisie` (
  `id` int NOT NULL,
  `nom_etat` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `etats_tunisie`
--

INSERT INTO `etats_tunisie` (`id`, `nom_etat`) VALUES
(1, 'تونس'),
(2, 'أريانة'),
(3, 'بن عروس'),
(4, 'منوبة'),
(5, 'نابل'),
(6, 'زغوان'),
(7, 'بنزرت'),
(8, 'باجة'),
(9, 'جندوبة'),
(10, 'الكاف'),
(11, 'سليانة'),
(12, 'سوسة'),
(13, 'المنستير'),
(14, 'المهدية'),
(15, 'صفاقس'),
(16, 'القيروان'),
(17, 'القصرين'),
(18, 'سيدي بوزيد'),
(19, 'قابس'),
(20, 'مدنين'),
(21, 'تطاوين'),
(22, 'قفصة'),
(23, 'توزر'),
(24, 'قبلي');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `etats_tunisie`
--
ALTER TABLE `etats_tunisie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `etats_tunisie`
--
ALTER TABLE `etats_tunisie`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
