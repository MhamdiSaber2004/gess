-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 102.219.176.39:3306
-- Generation Time: Oct 21, 2023 at 11:37 PM
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
-- Database: `cjmxjvbk_argon`
--

-- --------------------------------------------------------

--
-- Table structure for table `accreditations`
--

CREATE TABLE `accreditations` (
  `id` int NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `etat_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accreditations`
--

INSERT INTO `accreditations` (`id`, `nom`, `etat_id`) VALUES
(4, 'معتمدية أولاد حفوز', 18),
(5, 'معتمدية الرقاب', 18),
(6, 'معتمدية السبالة', 18),
(7, 'معتمدية السعيدة', 18),
(8, 'معتمدية السوق الجديد', 18),
(9, 'معتمدية المزونة', 18),
(10, 'معتمدية المكناسي', 18),
(11, 'معتمدية الهيشرية', 18),
(12, 'معتمدية بئر الحفي', 18),
(13, 'معتمدية جلمة', 18),
(14, 'معتمدية سيدي بوزيد الشرقية', 18),
(15, 'معتمدية سيدي بوزيد الغربية', 18),
(16, 'معتمدية سيدي علي بن عون', 18),
(17, 'معتمدية الزهور (القصرين)', 17),
(18, 'معتمدية العيون', 17),
(19, 'معتمدية القصرين الجنوبية', 17),
(20, 'معتمدية القصرين الشمالية', 17),
(21, 'معتمدية تالة', 17),
(22, 'معتمدية جدليان', 17),
(23, 'معتمدية حاسي الفريد', 17),
(24, 'معتمدية حيدرة', 17),
(25, 'معتمدية سبيبة', 17),
(26, 'معتمدية سبيطلة', 17),
(27, 'معتمدية فريانة', 17),
(28, 'معتمدية فوسانة', 17),
(29, 'معتمدية ماجل بلعباس', 17),
(30, 'معتمدية السبيخة', 16),
(31, 'معتمدية الشبيكة', 16),
(32, 'معتمدية الشراردة', 16),
(33, 'معتمدية العلا', 16),
(34, 'معتمدية القيروان الجنوبية', 16),
(35, 'معتمدية القيروان الشمالية', 16),
(36, 'معتمدية الوسلاتية', 16),
(37, 'معتمدية بوحجلة', 16),
(38, 'معتمدية حاجب العيون', 16),
(39, 'معتمدية حفوز', 16),
(40, 'معتمدية نصر الله', 16),
(41, 'معتمدية أم العرائس', 22),
(42, 'معتمدية الرديف', 22),
(43, 'معتمدية السند', 22),
(44, 'معتمدية القصر', 22),
(45, 'معتمدية القطار', 22),
(46, 'معتمدية المتلوي', 22),
(47, 'معتمدية المظيلة', 22),
(48, 'معتمدية بالخير', 22),
(49, 'معتمدية زانوش', 22),
(50, 'معتمدية سيدي عيش', 22),
(51, 'معتمدية قفصة الجنوبية', 22),
(52, 'معتمدية قفصة الشمالية', 22),
(53, 'معتمدية أم العرائس', 22),
(65, 'مطماطة الجديدة', 19),
(66, 'معتمدية الحامة الغربية', 19),
(67, 'معتمدية المطوية', 19),
(68, 'معتمدية دخيلة توجان', 19),
(69, 'معتمدية غنوش', 19),
(70, 'معتمدية قابس الجنوبية', 19),
(71, 'معتمدية قابس الغربية', 19),
(72, 'معتمدية قابس المدينة', 19),
(73, 'معتمدية مارث', 19),
(74, 'معتمدية مطماطة الجديدة', 19),
(75, 'معتمدية مطماطة القديمة', 19),
(76, 'منزل الحبيب', 19),
(77, 'معتمدية أولاد الشامخ', 14),
(78, 'معتمدية البرادعة', 14),
(79, 'معتمدية الجم', 14),
(80, 'معتمدية السواسي', 14),
(81, 'معتمدية الشابة', 14),
(82, 'معتمدية المهدية', 14),
(83, 'معتمدية سيدي علوان', 14),
(84, 'معتمدية شربان', 14),
(85, 'معتمدية قصور الساف', 14),
(86, 'معتمدية ملولش', 14),
(87, 'معتمدية هبيرة', 14),
(88, 'معتمدية أكودة', 12),
(89, 'معتمدية الزاوية القصيبة الثريات', 12),
(90, 'معتمدية القلعة الصغرى', 12),
(91, 'معتمدية القلعة الكبرى', 12),
(92, 'معتمدية النفيضة', 12),
(93, 'معتمدية بوفيشة', 12),
(94, 'معتمدية حمام سوسة', 12),
(95, 'معتمدية سوسة الرياض', 12),
(96, 'معتمدية سوسة المدينة', 12),
(97, 'معتمدية سوسة سيدي عبد الحميد', 12),
(98, 'معتمدية سيدي الهاني', 12),
(99, 'معتمدية سيدي بوعلي', 12),
(100, 'معتمدية كندار', 12),
(101, 'معتمدية هرقلة', 12),
(102, ' معتمدية سوسة جوهرة', 12),
(103, 'أريانة المدينة', 2),
(104, 'حي التضامن', 2),
(105, 'قلعة الأندلس', 2),
(106, 'المنيهلة', 2),
(107, 'رواد', 2),
(108, 'سيدي ثابت', 2),
(109, 'سكرة', 2),
(110, 'عمدون', 8),
(111, 'باجة الشمالية', 8),
(112, 'باجة الجنوبية', 8),
(113, 'قبلاط', 8),
(114, 'مجاز الباب', 8),
(115, 'نفزة', 8),
(116, 'تبرسق', 8),
(117, 'تستور', 8),
(118, 'تيبار', 8),
(119, 'بن عروس المدينة', 3),
(120, 'بومهل البساتين', 3),
(121, 'المروج', 3),
(122, 'الزهراء', 3),
(123, 'فوشانة', 3),
(124, 'حمام الشط', 3),
(125, 'حمام الأنف', 3),
(126, 'المحمدية', 3),
(127, 'المدينة الجديدة', 3),
(128, 'مقرين', 3),
(129, 'مرناق', 3),
(130, 'رادس', 3),
(131, 'بنزرت المدينة', 7),
(132, 'جومين', 7),
(133, 'العالية', 7),
(134, 'غزالة', 7),
(135, 'ماطر', 7),
(136, 'منزل بورقيبة', 7),
(137, 'منزل جميل', 7),
(138, 'رأس الجبل', 7),
(139, 'سجنان', 7),
(140, 'تينجة', 7),
(141, 'أوتيك', 7),
(142, 'جرزونة', 7),
(143, 'جندوبة المدينة', 9),
(144, 'عين دراهم', 9),
(145, 'بلطة بوعوان', 9),
(146, 'بوسالم', 9),
(147, 'فرنانة', 9),
(148, 'غار الدماء', 9),
(149, 'جندوبة الشمالية', 9),
(150, 'وادي مليز', 9),
(151, 'طبرقة', 9),
(152, 'دوز الشمالية', 24),
(153, 'دوز الجنوبية', 24),
(154, 'الفوار', 24),
(155, 'قبلي الشمالية', 24),
(156, 'قبلي الجنوبية', 24),
(157, 'سوق الأحد', 24),
(158, 'الدهماني', 10),
(159, 'السرس', 10),
(160, 'الجريصة', 10),
(161, 'القلعة الخصبة', 10),
(162, 'قلعة سنان', 10),
(163, 'الكاف الشرقية', 10),
(164, 'الكاف الغربية', 10),
(165, 'القصور', 10),
(166, 'نبر', 10),
(167, 'ساقية سيدي يوسف', 10),
(168, 'تاجروين', 10),
(169, 'الطويرف', 10),
(170, 'منوبة المدينة', 4),
(171, 'برج العامري', 4),
(172, 'دوار هيشر', 4),
(173, 'البطان', 4),
(174, 'الجديدة', 4),
(175, 'المرناقية', 4),
(176, 'وادي الليل', 4),
(177, 'طبربة', 4),
(178, 'بنقردان', 20),
(179, 'بني خداش', 20),
(180, 'جربة عجيم', 20),
(181, 'جربة ميدون', 20),
(182, 'جربة حومة السوق', 20),
(183, 'مدنين الشمالية', 20),
(184, 'مدنين الجنوبية', 20),
(185, 'سيدي مخلوف', 20),
(186, 'جرجيس', 20),
(187, 'المنستير المدينة', 13),
(188, 'البقالطة', 13),
(189, 'بنبلة', 13),
(190, 'بني حسان', 13),
(191, 'جمال', 13),
(192, 'قصر هلال', 13),
(193, 'قصيبة المديوني', 13),
(194, 'المكنين', 13),
(195, 'الوردانين', 13),
(196, 'الساحلين', 13),
(197, 'صيادة + لمطة + بوحجر', 13),
(198, 'طبلبة', 13),
(199, 'زرمدين', 13),
(200, 'تونس المدينة', 1),
(201, 'باب البحر', 1),
(202, 'باب السويقة', 1),
(203, 'باردو', 1),
(204, 'ضفاف البحيرة', 1),
(205, 'قرطاج', 1),
(206, 'حي الخضراء', 1),
(207, 'المنزه', 1),
(208, 'الوردية', 1),
(209, 'حي التحرير', 1),
(210, 'الزهور', 1),
(211, 'الحرايرية', 1),
(212, 'جبل الجلود', 1),
(213, 'الكبارية', 1),
(214, 'حلق الوادي', 1),
(215, 'المرسى (تونس)', 1),
(216, 'الكرم (تونس)', 1),
(217, 'العمران', 1),
(218, 'العمران الأعلى', 1),
(219, 'سيدي البشير', 1),
(220, 'سيدي حسين', 1),
(221, 'السيجومي', 1),
(222, 'زغوان المدينة', 6),
(223, 'بئر مشارقة', 6),
(224, 'الفحص', 6),
(225, 'الناظور', 6),
(226, 'صواف', 6),
(227, 'الزريبة', 6),
(228, 'توزر المدينة', 23),
(229, 'دقاش', 23),
(230, 'حزوة', 23),
(231, 'نفطة', 23),
(232, 'تمغزة', 23),
(233, 'صفاقس المدينة', 15),
(234, 'عقارب', 15),
(235, 'بئر علي بن خليفة', 15),
(236, 'العامرة', 15),
(237, 'الغريبة', 15),
(238, 'الحنشة', 15),
(239, 'جبنيانة', 15),
(240, 'قرقنة', 15),
(241, 'المحرس', 15),
(242, 'منزل شاكر', 15),
(243, 'ساقية الدائر', 15),
(244, 'ساقية الزيت', 15),
(245, 'صفاقس الغربية', 15),
(246, 'صفاقس الجنوبية', 15),
(247, 'الصخيرة', 15),
(248, 'طينة', 15),
(249, 'برقو', 11),
(250, 'بوعرادة', 11),
(251, 'العروسة', 11),
(252, 'الكريب', 11),
(253, 'قعفور', 11),
(254, 'كسرى', 11),
(255, 'مكثر', 11),
(256, 'الروحية', 11),
(257, 'سيدي بورويس', 11),
(258, 'سليانة الشمالية', 11),
(259, 'سليانة الجنوبية', 11),
(260, 'نابل المدينة', 5),
(261, 'بني خلاد', 5),
(262, 'بني خيار', 5),
(263, 'بوعرقوب', 5),
(264, 'دار شعبان الفهري', 5),
(265, 'الميدة', 5),
(266, 'قرمبالية', 5),
(267, 'حمام الأغزاز', 5),
(268, 'الحمامات', 5),
(269, 'الهوارية', 5),
(270, 'قليبية', 5),
(271, 'قربة', 5),
(272, 'منزل بوزلفة', 5),
(273, 'منزل تميم', 5),
(274, 'سليمان', 5),
(275, 'تاكلسة', 5);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `username`, `mdp`, `email`, `nom`) VALUES
(1, 'admin', 'aze', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `archive_payement_aep`
--

CREATE TABLE `archive_payement_aep` (
  `idPayement` int NOT NULL,
  `idBenefique` int NOT NULL,
  `idPompiste` int NOT NULL,
  `idGess` int NOT NULL,
  `montantPaye` int NOT NULL,
  `dette` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archive_payement_aep`
--

INSERT INTO `archive_payement_aep` (`idPayement`, `idBenefique`, `idPompiste`, `idGess`, `montantPaye`, `dette`, `date`) VALUES
(355860, 866246, 153396, 100198, 204, 304, '2023-10-11 23:07:16');

-- --------------------------------------------------------

--
-- Table structure for table `archive_payement_pi`
--

CREATE TABLE `archive_payement_pi` (
  `idPayement` int NOT NULL,
  `idBenefique` int NOT NULL,
  `idPompiste` int NOT NULL,
  `idGess` int NOT NULL,
  `montantPaye` int NOT NULL,
  `dette` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archive_payement_pi`
--

INSERT INTO `archive_payement_pi` (`idPayement`, `idBenefique`, `idPompiste`, `idGess`, `montantPaye`, `dette`, `date`) VALUES
(668361, 355419, 153396, 100198, 10, 110, '2023-10-11 23:16:32'),
(676797, 355419, 153396, 100198, 50, 100, '2023-10-11 23:17:11');

-- --------------------------------------------------------

--
-- Table structure for table `aspects_financiers`
--

CREATE TABLE `aspects_financiers` (
  `id` int NOT NULL,
  `idGess` int NOT NULL,
  `montant_abonnement` double DEFAULT NULL,
  `prix_eau_m3` int DEFAULT NULL,
  `tarification` double DEFAULT NULL,
  `facturation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `beneficiaires_a_temps` int DEFAULT NULL,
  `beneficiaires_delai` int DEFAULT NULL,
  `beneficiaires_jamais` int DEFAULT NULL,
  `beneficiaires_dettes` int DEFAULT NULL,
  `soned` double DEFAULT NULL,
  `steg` double DEFAULT NULL,
  `crda` double DEFAULT NULL,
  `autre_dettes` double DEFAULT NULL,
  `fonds` double DEFAULT NULL,
  `compte_courant` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aspects_financiers`
--

INSERT INTO `aspects_financiers` (`id`, `idGess`, `montant_abonnement`, `prix_eau_m3`, `tarification`, `facturation`, `beneficiaires_a_temps`, `beneficiaires_delai`, `beneficiaires_jamais`, `beneficiaires_dettes`, `soned`, `steg`, `crda`, `autre_dettes`, `fonds`, `compte_courant`) VALUES
(52, 100198, 0, 0, 0, '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(53, 100204, 0, 0, 0, '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `assurer_sterilisation_eau`
--

CREATE TABLE `assurer_sterilisation_eau` (
  `id` int NOT NULL,
  `idGess` int NOT NULL,
  `pompe_dosage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `situation_assurance_appliquee` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `situation_assurance_organisee` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `file_pompe_dosage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `file_situation_appliquee` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `file_situation_organisee` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assurer_sterilisation_eau`
--

INSERT INTO `assurer_sterilisation_eau` (`id`, `idGess`, `pompe_dosage`, `situation_assurance_appliquee`, `situation_assurance_organisee`, `file_pompe_dosage`, `file_situation_appliquee`, `file_situation_organisee`) VALUES
(53, 100198, '0', '0', '0', NULL, NULL, NULL),
(54, 100204, '0', '0', '0', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `benefique_aep`
--

CREATE TABLE `benefique_aep` (
  `idBenefique` int NOT NULL,
  `idGess` int NOT NULL,
  `idPompiste` int NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dateN` date NOT NULL,
  `CIN` int NOT NULL,
  `dateCIN` date NOT NULL,
  `address` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `propriete` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tel` int NOT NULL,
  `dette` int NOT NULL,
  `dateInscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `numPlace` int NOT NULL,
  `aire` int NOT NULL,
  `numDiviseur` int NOT NULL,
  `numCompteur` int NOT NULL,
  `donneesCompteur` int NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mdp` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `active` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `benefique_aep`
--

INSERT INTO `benefique_aep` (`idBenefique`, `idGess`, `idPompiste`, `nom`, `dateN`, `CIN`, `dateCIN`, `address`, `propriete`, `tel`, `dette`, `dateInscription`, `numPlace`, `aire`, `numDiviseur`, `numCompteur`, `donneesCompteur`, `email`, `mdp`, `active`) VALUES
(866246, 100198, 153396, 'Margarete Motsinger', '1977-05-05', 16362280, '1977-02-05', '12345', 'متسوغ', 21080762, 100, '2023-10-11 21:58:00', 970162, 298363, 317846, 224794, 100, '11568566@gmail.com', 'azeazeaze', 1),
(982351, 100198, 153396, 'Tyisha Lanz', '1977-05-05', 11089375, '1977-02-05', '12345', 'متسوغ', 23174977, 652, '2023-10-11 02:24:17', 692102, 968678, 737403, 241345, 100, '19305705@gmail.com', 'azeazeaze', 1);

-- --------------------------------------------------------

--
-- Table structure for table `benefique_pi`
--

CREATE TABLE `benefique_pi` (
  `idBenefique` int NOT NULL,
  `idGess` int NOT NULL,
  `idPompiste` int NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dateN` date NOT NULL,
  `CIN` int NOT NULL,
  `dateCIN` date NOT NULL,
  `address` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `propriete` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tel` int NOT NULL,
  `dette` int NOT NULL,
  `dateInscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `numPlace` int NOT NULL,
  `aire` int NOT NULL,
  `numPrise` int NOT NULL,
  `numCompteur` int NOT NULL,
  `donneesCompteur` int NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mdp` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `active` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `benefique_pi`
--

INSERT INTO `benefique_pi` (`idBenefique`, `idGess`, `idPompiste`, `nom`, `dateN`, `CIN`, `dateCIN`, `address`, `propriete`, `tel`, `dette`, `dateInscription`, `numPlace`, `aire`, `numPrise`, `numCompteur`, `donneesCompteur`, `email`, `mdp`, `active`) VALUES
(355419, 100198, 153396, 'Lloyd Antes', '1977-05-05', 12489366, '1977-02-05', '12345', 'متسوغ', 21895533, 100, '2023-10-11 22:20:48', 412969, 558649, 1, 678709, 100, '16152248@gmail.com', 'azeazeaze', 1);

-- --------------------------------------------------------

--
-- Table structure for table `benefique_public`
--

CREATE TABLE `benefique_public` (
  `idBenefique` int NOT NULL,
  `type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `numCompteur` int NOT NULL,
  `donneesCompteur` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branche`
--

CREATE TABLE `branche` (
  `idBranche` int NOT NULL,
  `idGess` int NOT NULL,
  `numBranche` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branche`
--

INSERT INTO `branche` (`idBranche`, `idGess`, `numBranche`, `date`) VALUES
(888209, 100198, 1, '2023-10-11 22:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE `budget` (
  `idbudget` int NOT NULL,
  `idGess` int NOT NULL,
  `annee` varchar(255) DEFAULT '2023_2024',
  `nombre_mitoyennete` varchar(11) DEFAULT NULL,
  `surface_totale` varchar(11) DEFAULT NULL,
  `nombre_exploitants` varchar(11) DEFAULT NULL,
  `superficie_irriguee` varchar(11) DEFAULT NULL,
  `quantite_prevue_achat_ou_pompage` varchar(11) DEFAULT NULL,
  `pourcentage_perte` varchar(11) DEFAULT NULL,
  `quantite_prevue_distribution` varchar(11) DEFAULT NULL,
  `debit_pompe` varchar(11) DEFAULT NULL,
  `heure_travail_ness` varchar(11) DEFAULT NULL,
  `consommation_energie_par_heure` varchar(11) DEFAULT NULL,
  `point_eau1` varchar(11) DEFAULT NULL,
  `point_eau` varchar(11) DEFAULT NULL,
  `reseau_construction1` varchar(11) DEFAULT NULL,
  `reseau_construction` varchar(11) DEFAULT NULL,
  `pompage_equipement1` varchar(11) DEFAULT NULL,
  `pompage_equipement` varchar(11) DEFAULT NULL,
  `electricite1` varchar(11) DEFAULT NULL,
  `electricite` varchar(11) DEFAULT NULL,
  `compteurs1` varchar(11) DEFAULT NULL,
  `compteurs` varchar(11) DEFAULT NULL,
  `couts_maintenance_totals` varchar(11) DEFAULT NULL,
  `couts_totals_realisation` varchar(11) DEFAULT NULL,
  `nombre_membres` varchar(11) DEFAULT NULL,
  `cout_unitaire_energie` varchar(11) DEFAULT NULL,
  `informations_adhesion` varchar(11) DEFAULT NULL,
  `cout_achat_eau` varchar(11) DEFAULT NULL,
  `solde_initial_debut_annee` varchar(11) DEFAULT NULL,
  `prix_compteur` varchar(11) DEFAULT NULL,
  `montant_mensuel_net` varchar(11) DEFAULT NULL,
  `prix_moto` varchar(11) DEFAULT NULL,
  `duree_renovation_moto` varchar(11) DEFAULT NULL,
  `solde_initial_annee` varchar(11) DEFAULT NULL,
  `nombre_Travailleur` varchar(11) DEFAULT NULL,
  `salaire_et_avantages_en_nature_par_an` varchar(11) DEFAULT NULL,
  `salaire_et_avantages_du_directeur_technique_par_an` varchar(11) DEFAULT NULL,
  `salaire_gardien_per_m3_eau` varchar(11) DEFAULT NULL,
  `frais_achat_eau` varchar(11) DEFAULT NULL,
  `frais_energie` varchar(11) DEFAULT NULL,
  `salaire_et_avantages_en_nature_par_an1` varchar(11) DEFAULT NULL,
  `salaire_et_avantages_du_directeur_technique_par_an1` varchar(11) DEFAULT NULL,
  `couts_maintenance_totals1` varchar(11) DEFAULT NULL,
  `couverture_deficit_enregistre` varchar(11) DEFAULT NULL,
  `renouvellement_des_compteurs` varchar(11) DEFAULT NULL,
  `frais_de_transport_deplacement` varchar(11) DEFAULT NULL,
  `renouvellement_des_equipements` varchar(11) DEFAULT NULL,
  `frais_gestion_association` varchar(11) DEFAULT NULL,
  `frais_divers_taraa` varchar(11) DEFAULT NULL,
  `total_frais_exploitation_entretien` varchar(11) DEFAULT NULL,
  `cout_par_metre_cube` varchar(11) DEFAULT NULL,
  `prix_moto1` varchar(11) DEFAULT NULL,
  `frais_activites_autres` varchar(11) DEFAULT NULL,
  `total_des_depenses` varchar(11) DEFAULT NULL,
  `revenues_des_adhesions` varchar(11) DEFAULT NULL,
  `revenues_des_frais_globaux` varchar(11) DEFAULT NULL,
  `revenues_vente_eau` varchar(11) DEFAULT NULL,
  `total_revenues_exploitation_maintenance` varchar(11) DEFAULT NULL,
  `revenues_other_activities` varchar(11) DEFAULT NULL,
  `total_revenues` varchar(11) DEFAULT NULL,
  `solde_attendu_fin_annee` varchar(11) DEFAULT NULL,
  `tarif_m3_eau` varchar(11) DEFAULT NULL,
  `prix_vente_heure` varchar(11) DEFAULT NULL,
  `liaison_prive` varchar(255) DEFAULT NULL,
  `nombre_points_deau_publics` varchar(255) DEFAULT NULL,
  `connexion_dediee` varchar(255) DEFAULT NULL,
  `points_deau_publics` varchar(255) DEFAULT NULL,
  `prix_litre_javal` varchar(255) DEFAULT NULL,
  `bi_realisation` varchar(255) DEFAULT NULL,
  `couverture_deficit_maintenance` varchar(255) DEFAULT NULL,
  `remuneration_gardien_gestionnaire` varchar(255) DEFAULT NULL,
  `depenses_analyse_eau` varchar(255) DEFAULT NULL,
  `depenses_jafal` varchar(255) DEFAULT NULL,
  `huiles_et_filtres` varchar(255) DEFAULT NULL,
  `cout_realisation_connexion_speciale` varchar(255) DEFAULT NULL,
  `nombre_bi_prevus` varchar(255) DEFAULT NULL,
  `revenus_realises_sur_realisation_raccordement_specifique` varchar(255) DEFAULT NULL,
  `information_mensuelle_global` varchar(255) DEFAULT NULL,
  `prix_m3_sans_garde_administrateur` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`idbudget`, `idGess`, `annee`, `nombre_mitoyennete`, `surface_totale`, `nombre_exploitants`, `superficie_irriguee`, `quantite_prevue_achat_ou_pompage`, `pourcentage_perte`, `quantite_prevue_distribution`, `debit_pompe`, `heure_travail_ness`, `consommation_energie_par_heure`, `point_eau1`, `point_eau`, `reseau_construction1`, `reseau_construction`, `pompage_equipement1`, `pompage_equipement`, `electricite1`, `electricite`, `compteurs1`, `compteurs`, `couts_maintenance_totals`, `couts_totals_realisation`, `nombre_membres`, `cout_unitaire_energie`, `informations_adhesion`, `cout_achat_eau`, `solde_initial_debut_annee`, `prix_compteur`, `montant_mensuel_net`, `prix_moto`, `duree_renovation_moto`, `solde_initial_annee`, `nombre_Travailleur`, `salaire_et_avantages_en_nature_par_an`, `salaire_et_avantages_du_directeur_technique_par_an`, `salaire_gardien_per_m3_eau`, `frais_achat_eau`, `frais_energie`, `salaire_et_avantages_en_nature_par_an1`, `salaire_et_avantages_du_directeur_technique_par_an1`, `couts_maintenance_totals1`, `couverture_deficit_enregistre`, `renouvellement_des_compteurs`, `frais_de_transport_deplacement`, `renouvellement_des_equipements`, `frais_gestion_association`, `frais_divers_taraa`, `total_frais_exploitation_entretien`, `cout_par_metre_cube`, `prix_moto1`, `frais_activites_autres`, `total_des_depenses`, `revenues_des_adhesions`, `revenues_des_frais_globaux`, `revenues_vente_eau`, `total_revenues_exploitation_maintenance`, `revenues_other_activities`, `total_revenues`, `solde_attendu_fin_annee`, `tarif_m3_eau`, `prix_vente_heure`, `liaison_prive`, `nombre_points_deau_publics`, `connexion_dediee`, `points_deau_publics`, `prix_litre_javal`, `bi_realisation`, `couverture_deficit_maintenance`, `remuneration_gardien_gestionnaire`, `depenses_analyse_eau`, `depenses_jafal`, `huiles_et_filtres`, `cout_realisation_connexion_speciale`, `nombre_bi_prevus`, `revenus_realises_sur_realisation_raccordement_specifique`, `information_mensuelle_global`, `prix_m3_sans_garde_administrateur`) VALUES
(27, 100199, '2023_2024', '2', '0522', '525', '25', '252', '525', '132048.00', '252', '1', '525', '0.025', '25', '0.125', '25', '0.050', '2', '0.025', '5', '0.250', '25', '0.475', '82.000', '25', '25', '25', '25', '2', '52', '5', '25', '225', NULL, '25', '25', '25', '25', '6300', '13125', '25', '25', '0.475', '252', '2714.400', '525', '9.000', '252', '525', '23752.875', '0.180', '25', '252', '24029.875', '625.000', '31320.000', '-8192.125', '23752.875', '525', '24277.875', '250.000', '-0.062', '-0.000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', ''),
(28, 100201, '2023_2024', '2', '83', '', '', '', '', '0.00', '', '0', '', '0.000', '', '0.000', '', '0.000', '', '0.000', '', '0.000', '', '0.000', '0.000', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '0', '0', '', '', '0.000', '', '0.000', '', '', '', '', '0.000', '', '', '', '0.000', '0.000', '0.000', '0.000', '0.000', '', '0.000', '0.000', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', ''),
(29, 100198, '2023_2024', NULL, '10', NULL, NULL, '', '', '0.00', '', '0', '', '0.000', '', '0.000', '', '0.000', '', '0.000', '', '0.000', '', '0.000', '0.000', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '0', '0', '', '', '0.000', '', '0.000', '', '', '', '', '0.000', '', '', '', '0.000', '0.000', '0.000', '0.000', '0.000', '', '0.000', '0.000', '', '', '0', '0', '', '', '', '', '', '0.000', '', '', '', '0.000', '', NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `consommation_aep`
--

CREATE TABLE `consommation_aep` (
  `idConsommation` int NOT NULL,
  `numCompteur` int NOT NULL,
  `idPompiste` int NOT NULL,
  `idGess` int NOT NULL,
  `numConsomme` int NOT NULL,
  `numConsommePrecedent` int NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consommation_aep`
--

INSERT INTO `consommation_aep` (`idConsommation`, `numCompteur`, `idPompiste`, `idGess`, `numConsomme`, `numConsommePrecedent`, `date`) VALUES
(8, 224794, 153396, 100198, 500, 100, '2023-10-11 23:30:17');

-- --------------------------------------------------------

--
-- Table structure for table `consommation_et_facture`
--

CREATE TABLE `consommation_et_facture` (
  `idCF` int NOT NULL,
  `idGess` int NOT NULL,
  `idBenefique` int NOT NULL,
  `idConsommation` int NOT NULL,
  `idFacture` int NOT NULL,
  `idPayement` int NOT NULL,
  `dette` int NOT NULL,
  `prixM3` int NOT NULL,
  `prixFixe` int NOT NULL,
  `autrePrix` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consommation_pi`
--

CREATE TABLE `consommation_pi` (
  `idConsommation` int NOT NULL,
  `numCompteur` int NOT NULL,
  `idPompiste` int NOT NULL,
  `idGess` int NOT NULL,
  `numConsomme` int NOT NULL,
  `numConsommePrecedent` int NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consommation_pi`
--

INSERT INTO `consommation_pi` (`idConsommation`, `numCompteur`, `idPompiste`, `idGess`, `numConsomme`, `numConsommePrecedent`, `date`) VALUES
(769, 678709, 153396, 100198, 103, 100, '2023-10-11 22:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `consommation_pompe`
--

CREATE TABLE `consommation_pompe` (
  `idConsommation` int NOT NULL,
  `idPompe` int NOT NULL,
  `idGess` int NOT NULL,
  `idPompiste` int NOT NULL,
  `numComsommation` int NOT NULL,
  `numConsommationPrecedente` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `controle_interne`
--

CREATE TABLE `controle_interne` (
  `id_membre_conseil` int NOT NULL,
  `idGess` int NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nom_prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `age` int DEFAULT NULL,
  `niveau_education` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `anciennete` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `num_tel` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `controle_interne`
--

INSERT INTO `controle_interne` (`id_membre_conseil`, `idGess`, `role`, `nom_prenom`, `age`, `niveau_education`, `anciennete`, `num_tel`) VALUES
(199, 100198, 'مراقب أول ', '', 0, ' تعليم عالي', '', 0),
(200, 100199, 'مراقب أول ', '', 0, ' تعليم عالي', '', 0),
(201, 100200, 'مراقب أول ', 'عمر سعيداوي ', 45, 'ثانوي ', '4', 55355091),
(202, 100200, 'مراقب ثاني', 'علي سعيداوي ', 47, 'ثانوي ', '4', 0),
(203, 100200, 'مراقب ثالث ', 'احمد سعيداوي', 60, 'ابتدائي', '4', 0),
(204, 100201, 'مراقب أول ', 'عمر سعيداوي ', 45, 'ثانوي ', '4', 55355091),
(205, 100201, 'مراقب ثاني', 'علي سعيداوي ', 47, 'ثانوي ', '4', 0),
(206, 100201, 'مراقب ثالث ', 'احمد سعيداوي ', 60, 'ابتدائي', '4', 0),
(207, 100202, 'مراقب أول ', 'منصف غرسلي', 50, 'ثانوي ', '7', 97042500),
(208, 100202, 'مراقب ثاني', 'عماد نصري ', 40, 'ثانوي ', '4', 53002534),
(209, 100202, 'مراقب ثالث ', 'منصف غرسلي', 45, ' تعليم عالي', '4', 96211358),
(210, 100203, 'مراقب أول ', '', 0, ' تعليم عالي', '', 0),
(211, 100204, 'مراقب أول ', '', 0, ' تعليم عالي', '', 0),
(212, 100205, 'مراقب أول ', 'عبد الواحد سعداوي ', 61, 'ثانوي ', '3', 0),
(213, 100205, 'مراقب ثاني', 'عادل سعداوي ', 56, 'ثانوي ', '3', 0),
(214, 100206, 'مراقب أول ', 'مراد محفوظي', 45, 'ثانوي ', '3', 99851130),
(215, 100206, 'مراقب ثاني', 'بلقاسم سلماوي', 50, 'ابتدائي', '3', 0),
(216, 100206, 'مراقب ثالث ', 'توفيق سلماوي', 43, 'ثانوي ', '3', 0),
(217, 100207, 'مراقب أول ', 'وليد نصراوي ', 45, 'ثانوي ', '7', 41471878),
(218, 100207, 'مراقب ثاني', 'سامي مساهلي ', 45, 'ثانوي ', '7', 27887175),
(219, 100207, 'مراقب ثالث ', 'العيد فرجاوي ', 60, 'ابتدائي', '7', 97139837),
(220, 100208, 'مراقب أول ', 'محمد منصري ', 39, 'ثانوي ', '4', 98984559),
(221, 100208, 'مراقب ثاني', 'مصطفى منصري ', 50, 'ثانوي ', '4', 0),
(222, 100208, 'مراقب ثالث ', 'خالد منصري ', 59, 'ثانوي ', '4', 0),
(223, 100209, 'مراقب أول ', 'أنور فارحي ', 67, 'ثانوي ', '7', 96633212),
(224, 100209, 'مراقب ثاني', 'عبد الكريم شعباني ', 50, 'ثانوي ', '7', 93019864),
(225, 100209, 'مراقب ثالث ', 'عمار فارحي ', 57, 'ابتدائي', '7', 0),
(226, 100210, 'مراقب أول ', 'فريد غرسلي ', 46, 'ثانوي ', '4', 0),
(227, 100210, 'مراقب ثاني', 'كمال غرسلي ', 55, ' تعليم عالي', '4', 0),
(228, 100210, 'مراقب ثالث ', 'عياشي غرسلي', 65, 'غير متعلم', '4', 0),
(229, 100211, 'مراقب أول ', 'محمد حاجي ', 45, 'ثانوي ', '4', 0),
(230, 100211, 'مراقب ثاني', 'نور الدين حاجي ', 46, 'ثانوي ', '4', 0),
(231, 100211, 'مراقب ثالث ', 'عباس حاجي ', 60, 'غير متعلم', '4', 0),
(232, 100212, 'مراقب أول ', 'عبد الرزاق مرواني ', 38, ' تعليم عالي', '4', 25860572),
(233, 100212, 'مراقب ثاني', 'حمزة مرواني ', 40, ' تعليم عالي', '4', 26182284),
(234, 100212, 'مراقب ثالث ', 'حمزة بن محمد مرواني', 46, ' تعليم عالي', '4', 22060019),
(235, 100213, 'مراقب أول ', 'حمزة عوني ', 49, ' تعليم عالي', '1', 0),
(236, 100213, 'مراقب ثاني', 'حسين عوني ', 45, ' تعليم عالي', '1', 27228741),
(237, 100213, 'مراقب ثالث ', 'صبري عوني ', 30, 'ثانوي ', '1', 20784228),
(238, 100214, 'مراقب أول ', 'رضا زياني ', 60, 'ثانوي ', '15', 15),
(239, 100214, 'مراقب ثاني', 'رضا بن حبيب زياني ', 43, ' تعليم عالي', '1', 93138488),
(240, 100214, 'مراقب ثالث ', 'وليد زياني ', 40, 'ابتدائي', '1', 0),
(241, 100215, 'مراقب أول ', 'محمد نجيب رحيمي ', 50, 'غير متعلم', '3', 97386475),
(242, 100215, 'مراقب ثاني', 'صالح رحيمي ', 56, 'ابتدائي', '3', 97347711),
(243, 100215, 'مراقب ثالث ', 'لزهر رحيمي ', 60, 'ثانوي ', '3', 28410319),
(244, 100216, 'مراقب أول ', 'محمد مختار محمدي ', 48, 'ثانوي ', '1', 0),
(245, 100216, 'مراقب ثاني', 'محمد علي زنايدي', 45, 'ثانوي ', '1', 0),
(246, 100216, 'مراقب ثالث ', 'عبد القادر غلڨاوي ', 55, ' تعليم عالي', '1', 0),
(247, 100217, 'مراقب أول ', 'الخذيري عاشوري ', 64, 'ثانوي ', '1', 94615568),
(248, 100217, 'مراقب ثاني', 'محمد بن يونس دربالي ', 67, 'ثانوي ', '1', 0),
(249, 100217, 'مراقب ثالث ', 'عادل حفصي ', 32, 'ثانوي ', '1', 0),
(250, 100218, 'مراقب أول ', 'محمد حسني ', 31, 'ثانوي ', '2', 29638904),
(251, 100218, 'مراقب ثاني', 'محي الدين حسني ', 51, 'ابتدائي', '2', 97322432),
(252, 100219, 'مراقب أول ', 'نورالدين  داودي ', 60, 'ثانوي ', '4', 28023176),
(253, 100219, 'مراقب ثاني', 'رضا داودي ', 62, 'ابتدائي', '4', 0),
(254, 100219, 'مراقب ثالث ', 'رشيد داودي', 65, ' تعليم عالي', '4', 0),
(255, 100220, 'مراقب أول ', 'نجيب خديمي ', 57, 'ابتدائي', '6', 41164697),
(256, 100220, 'مراقب ثاني', 'منصور خضراوي ', 45, 'ثانوي ', '6', 97592331),
(257, 100221, 'مراقب أول ', 'سحبي سايحي', 43, ' تعليم عالي', '1', 93561549),
(258, 100221, 'مراقب ثاني', 'سالم سايحي', 50, 'ثانوي ', '1', 0),
(259, 100221, 'مراقب ثالث ', 'صالح عمري', 51, 'ابتدائي', '1', 95438849),
(260, 100222, 'مراقب أول ', 'منصف غرسلي ', 50, 'ثانوي ', '7', 97042500),
(261, 100222, 'مراقب ثاني', 'عماد نصري ', 40, 'ثانوي ', '4', 53002534),
(262, 100222, 'مراقب ثالث ', 'منصف غرسلي ', 45, ' تعليم عالي', '4', 96211358);

-- --------------------------------------------------------

--
-- Table structure for table `demandes`
--

CREATE TABLE `demandes` (
  `idDemande` int NOT NULL,
  `idBenefique` int NOT NULL,
  `idGess` int NOT NULL,
  `typeDemande` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CIN` int NOT NULL,
  `dateConseil` date NOT NULL,
  `dateCreationDemande` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `placeCreationDemande` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `frontCIN` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `backCIN` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `resultat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'قيد التنفيذ',
  `dateAcceptation` date NOT NULL DEFAULT '1000-10-10'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `demandes`
--

INSERT INTO `demandes` (`idDemande`, `idBenefique`, `idGess`, `typeDemande`, `CIN`, `dateConseil`, `dateCreationDemande`, `placeCreationDemande`, `frontCIN`, `backCIN`, `resultat`, `dateAcceptation`) VALUES
(313523, 982351, 100198, 'طلب ترشح عضوية مجلس ادارة المجمع', 11743442, '2023-10-26', '2023-10-11 02:25:14', 'تونس', '39430.png', '76606.png', 'قيد التنفيذ', '1000-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `demandes_benefique`
--

CREATE TABLE `demandes_benefique` (
  `idDemandeBenefique` int NOT NULL,
  `idGess` int NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CIN` int NOT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tel` int NOT NULL,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `active` int NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `demandes_benefique`
--

INSERT INTO `demandes_benefique` (`idDemandeBenefique`, `idGess`, `nom`, `CIN`, `address`, `tel`, `type`, `active`, `date`) VALUES
(1, 100198, 'ayoub bennani', 5555555, '111', 22222222, 'صالح للشرب', 2, '2023-10-11 02:20:48'),
(2, 100200, 'aloulou', 2782706, 'henchir lehmem', 97047453, 'سقوي', 0, '2023-10-17 10:19:14'),
(3, 100200, 'منير ميساوي ', 12656789, 'هنشير الحمام ', 20800214, 'سقوي', 0, '2023-10-18 09:40:26'),
(4, 100200, 'منير مسيساوي ', 12610120, 'هنشير الحمام ', 21091590, 'سقوي', 0, '2023-10-18 09:43:38'),
(5, 100198, 'ayoub', 11111111, 'tounes', 22222222, 'صالح للشرب', 1, '2023-10-20 18:17:22');

-- --------------------------------------------------------

--
-- Table structure for table `demandes_eau`
--

CREATE TABLE `demandes_eau` (
  `idDemandeEau` int NOT NULL,
  `idBenefique` int NOT NULL,
  `dateCreationDemande` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dette_aep`
--

CREATE TABLE `dette_aep` (
  `idDette` int NOT NULL,
  `idBenefique` int NOT NULL,
  `dette` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dette_aep`
--

INSERT INTO `dette_aep` (`idDette`, `idBenefique`, `dette`) VALUES
(136014, 982351, 904),
(851413, 866246, 904);

-- --------------------------------------------------------

--
-- Table structure for table `dette_pi`
--

CREATE TABLE `dette_pi` (
  `idDette` int NOT NULL,
  `idBenefique` int NOT NULL,
  `dette` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dette_pi`
--

INSERT INTO `dette_pi` (`idDette`, `idBenefique`, `dette`) VALUES
(616271, 355419, 50);

-- --------------------------------------------------------

--
-- Table structure for table `distribution_eau`
--

CREATE TABLE `distribution_eau` (
  `id` int NOT NULL,
  `idGess` int NOT NULL,
  `liaison_prive` int DEFAULT NULL,
  `fournisseurs_reservoirs` int DEFAULT NULL,
  `reservoir_public` tinyint(1) NOT NULL DEFAULT '0',
  `reservoir_prive` tinyint(1) NOT NULL DEFAULT '0',
  `robinet_public` int DEFAULT NULL,
  `liaison_public` int DEFAULT NULL,
  `robinet_util_public` tinyint(1) NOT NULL DEFAULT '0',
  `robinet_util_prive` tinyint(1) NOT NULL DEFAULT '0',
  `file_reservoir_public` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `files_reservoir_prive` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `file_robinet_util_public` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `file_robinet_util_prive` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `distribution_eau`
--

INSERT INTO `distribution_eau` (`id`, `idGess`, `liaison_prive`, `fournisseurs_reservoirs`, `reservoir_public`, `reservoir_prive`, `robinet_public`, `liaison_public`, `robinet_util_public`, `robinet_util_prive`, `file_reservoir_public`, `files_reservoir_prive`, `file_robinet_util_public`, `file_robinet_util_prive`) VALUES
(162, 100198, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL),
(163, 100204, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `documents_administratifs`
--

CREATE TABLE `documents_administratifs` (
  `id` int NOT NULL,
  `idGess` int NOT NULL,
  `exportations` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `importations` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rapports` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `listes_presence` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `comptes_rendus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `listes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `registre_comptes_rendus_seances` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `convocations` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `programme_collaboratif` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `registre_adhesions` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `listes_mises_a_jour` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `demandes_raccordement_reseau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `engagements` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `delegations` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `conseil_administration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `inventaire_biens_collectifs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dossier_revendications_economie_eau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `donnees_statistiques_activite_collectif` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cahiers_visites` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documents_administratifs`
--

INSERT INTO `documents_administratifs` (`id`, `idGess`, `exportations`, `importations`, `rapports`, `listes_presence`, `comptes_rendus`, `listes`, `registre_comptes_rendus_seances`, `convocations`, `programme_collaboratif`, `registre_adhesions`, `listes_mises_a_jour`, `demandes_raccordement_reseau`, `engagements`, `delegations`, `conseil_administration`, `inventaire_biens_collectifs`, `dossier_revendications_economie_eau`, `donnees_statistiques_activite_collectif`, `cahiers_visites`) VALUES
(101, 100198, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 100199, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 100200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 100201, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 100202, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 100203, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 100204, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 100205, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 100206, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 100207, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 100208, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 100209, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 100210, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 100211, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 100212, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 100213, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 100214, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, 100215, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 100216, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 100217, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 100218, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 100219, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 100220, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 100221, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, 100222, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `documents_employee`
--

CREATE TABLE `documents_employee` (
  `id` int NOT NULL,
  `idGess` int NOT NULL,
  `role_de` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cin_de` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `attestation_de` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `exigence_de` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documents_employee`
--

INSERT INTO `documents_employee` (`id`, `idGess`, `role_de`, `cin_de`, `attestation_de`, `exigence_de`) VALUES
(183, 100198, 'مدير فني', NULL, NULL, NULL),
(184, 100199, 'مدير فني', NULL, NULL, NULL),
(185, 100200, 'مدير فني', NULL, NULL, NULL),
(186, 100201, 'مدير فني', NULL, NULL, NULL),
(187, 100202, 'مدير فني', NULL, NULL, NULL),
(188, 100203, 'مدير فني', NULL, NULL, NULL),
(189, 100204, 'مدير فني', NULL, NULL, NULL),
(190, 100205, 'مدير فني', NULL, NULL, NULL),
(191, 100206, 'مدير فني', NULL, NULL, NULL),
(192, 100207, 'مدير فني', NULL, NULL, NULL),
(193, 100208, 'مدير فني', NULL, NULL, NULL),
(194, 100209, 'مدير فني', NULL, NULL, NULL),
(195, 100210, 'مدير فني', NULL, NULL, NULL),
(196, 100211, 'مدير فني', NULL, NULL, NULL),
(197, 100212, 'مدير فني', NULL, NULL, NULL),
(198, 100213, 'مدير فني', NULL, NULL, NULL),
(199, 100214, 'مدير فني', NULL, NULL, NULL),
(200, 100215, 'مدير فني', NULL, NULL, NULL),
(201, 100216, 'مدير فني', NULL, NULL, NULL),
(202, 100217, 'مدير فني', NULL, NULL, NULL),
(203, 100218, 'مدير فني', NULL, NULL, NULL),
(204, 100219, 'مدير فني', NULL, NULL, NULL),
(205, 100220, 'مدير فني', NULL, NULL, NULL),
(206, 100221, 'مدير فني', NULL, NULL, NULL),
(207, 100222, 'مدير فني', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `documents_existants`
--

CREATE TABLE `documents_existants` (
  `id` int NOT NULL,
  `idGess` int NOT NULL,
  `lois_fondamentales` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `annonce_journal_officiel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dossier_seance_generale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reglement_interieur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `registre_revenus_depenses_annee` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `budget_annee` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `registre_recettes_annee` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `factures` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documents_existants`
--

INSERT INTO `documents_existants` (`id`, `idGess`, `lois_fondamentales`, `annonce_journal_officiel`, `dossier_seance_generale`, `reglement_interieur`, `registre_revenus_depenses_annee`, `budget_annee`, `registre_recettes_annee`, `factures`) VALUES
(38, 100198, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 100204, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `documents_financiers`
--

CREATE TABLE `documents_financiers` (
  `id` int NOT NULL,
  `idGess` int NOT NULL,
  `revenus_depenses` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `budget_balancement` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `factures_compta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `compta_generale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `compte_courant` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `budget` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `docs_support` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documents_financiers`
--

INSERT INTO `documents_financiers` (`id`, `idGess`, `revenus_depenses`, `budget_balancement`, `factures_compta`, `compta_generale`, `compte_courant`, `budget`, `docs_support`) VALUES
(49, 100198, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 100204, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `documents_technique`
--

CREATE TABLE `documents_technique` (
  `id` int NOT NULL,
  `idGess` int NOT NULL,
  `lecture_compteur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `etude_projet` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `plan_reseau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `suivi_conso_facturation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `station_pompage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `budget` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documents_technique`
--

INSERT INTO `documents_technique` (`id`, `idGess`, `lecture_compteur`, `etude_projet`, `plan_reseau`, `suivi_conso_facturation`, `station_pompage`, `budget`) VALUES
(47, 100198, NULL, NULL, NULL, NULL, NULL, ''),
(48, 100204, NULL, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `dossier_financier`
--

CREATE TABLE `dossier_financier` (
  `id` int NOT NULL,
  `idGess` int NOT NULL,
  `factures_approbations` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `budgets_anuels` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `releves_compteurs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `etat_compte_courant` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `justificatifs_depenses` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cartes_adhesion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `recevabilites_livraison` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fichier_abonnements` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rapports_controle_comptable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rapports_periodiques` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `comptabilite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rapports_financiers` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dettes_fournisseurs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dettes_association` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dossier_financier`
--

INSERT INTO `dossier_financier` (`id`, `idGess`, `factures_approbations`, `budgets_anuels`, `releves_compteurs`, `etat_compte_courant`, `justificatifs_depenses`, `cartes_adhesion`, `recevabilites_livraison`, `fichier_abonnements`, `rapports_controle_comptable`, `rapports_periodiques`, `comptabilite`, `rapports_financiers`, `dettes_fournisseurs`, `dettes_association`) VALUES
(32, 100198, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 100204, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dossier_juridique`
--

CREATE TABLE `dossier_juridique` (
  `id` int NOT NULL,
  `idGess` int NOT NULL,
  `publication_journal_officiel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rapports1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `statuts_fondamentaux` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reglement_interieur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contrats_utilisation_eau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `electricite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `eau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contrats_manutention` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contrat_gestion_systeme_hydrique` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contrats` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dossier_mandat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cartes_versement_salaires` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `proces_verbaux_mandatement_determination_salaires` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dossier_etat_civil_agents` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `certificat_inscription` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `autorisations_periodiques` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `recus_paiement` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `carte_identite_fiscale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `1_autorisations_periodiques` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `1_recus_paiement` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dossier_juridique`
--

INSERT INTO `dossier_juridique` (`id`, `idGess`, `publication_journal_officiel`, `rapports1`, `statuts_fondamentaux`, `reglement_interieur`, `contrats_utilisation_eau`, `electricite`, `eau`, `contrats_manutention`, `contrat_gestion_systeme_hydrique`, `contrats`, `dossier_mandat`, `cartes_versement_salaires`, `proces_verbaux_mandatement_determination_salaires`, `dossier_etat_civil_agents`, `certificat_inscription`, `autorisations_periodiques`, `recus_paiement`, `carte_identite_fiscale`, `1_autorisations_periodiques`, `1_recus_paiement`) VALUES
(98, 100198, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 100199, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 100200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 100201, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 100202, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 100203, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 100204, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 100205, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 100206, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 100207, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 100208, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 100209, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 100210, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 100211, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 100212, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 100213, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 100214, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 100215, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 100216, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 100217, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, 100218, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 100219, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 100220, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 100221, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 100222, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dossier_technique`
--

CREATE TABLE `dossier_technique` (
  `id` int NOT NULL,
  `idGess` int NOT NULL,
  `copie_systeme_moderne` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `stations_pompage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reseau_eau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reservoirs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `caracteristiques_techniques` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `etudes_techniques` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `registre_pompage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `documents_suivi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `maintenance_preventive` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `registre_suivi_distribution` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dossier_technique`
--

INSERT INTO `dossier_technique` (`id`, `idGess`, `copie_systeme_moderne`, `stations_pompage`, `reseau_eau`, `reservoirs`, `caracteristiques_techniques`, `etudes_techniques`, `registre_pompage`, `documents_suivi`, `maintenance_preventive`, `registre_suivi_distribution`) VALUES
(33, 100198, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 100204, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `d_admin_juridiques`
--

CREATE TABLE `d_admin_juridiques` (
  `id` int NOT NULL,
  `idGess` int NOT NULL,
  `pub_off` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `loi_fonda` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dossier_seance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `loi_interieur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `registre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contrat_gestion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `registre_inscri` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `d_admin_juridiques`
--

INSERT INTO `d_admin_juridiques` (`id`, `idGess`, `pub_off`, `loi_fonda`, `dossier_seance`, `loi_interieur`, `registre`, `contrat_gestion`, `registre_inscri`) VALUES
(54, 100198, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 100204, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `en_cas_de_panne`
--

CREATE TABLE `en_cas_de_panne` (
  `id` int NOT NULL,
  `idGess` int NOT NULL,
  `nom_societe_technicien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `domaine` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `numero_telephone` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `etats_tunisie`
--

CREATE TABLE `etats_tunisie` (
  `id` int NOT NULL,
  `nom_etat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `facture_aep`
--

CREATE TABLE `facture_aep` (
  `idFacture` int NOT NULL,
  `idBenefique` int NOT NULL,
  `idPompiste` int NOT NULL,
  `idGess` int NOT NULL,
  `idConsommation` int NOT NULL,
  `idConsommationPrecedente` int NOT NULL,
  `dette` int NOT NULL,
  `prixM3` int NOT NULL,
  `autrePrix` int NOT NULL,
  `prixFixe` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gardes`
--

CREATE TABLE `gardes` (
  `id` int NOT NULL,
  `idGess` int NOT NULL,
  `nombre` int DEFAULT NULL,
  `bailleurs` int DEFAULT NULL,
  `benevoles` int DEFAULT NULL,
  `paiement` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gardes`
--

INSERT INTO `gardes` (`id`, `idGess`, `nombre`, `bailleurs`, `benevoles`, `paiement`) VALUES
(52, 100198, 0, 0, 0, 0),
(53, 100204, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gess`
--

CREATE TABLE `gess` (
  `idGess` int NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `etat_tunisie` int NOT NULL,
  `accreditation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `decanat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_debut` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_creation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `qualite_interventions` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `etat` int NOT NULL DEFAULT '0',
  `dateAjout` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gess`
--

INSERT INTO `gess` (`idGess`, `type`, `nom`, `etat_tunisie`, `accreditation`, `decanat`, `date_debut`, `date_creation`, `qualite_interventions`, `etat`, `dateAjout`) VALUES
(100198, 'منطقة ماء صالح للشرب', 'nom gess', 1, 'تونس المدينة', 'imada', '2023-10-28', '2023-10-26', '', 1, '2023-10-11 02:13:33'),
(100199, 'منطقة سقوية', 'Bouzabiaaaa', 17, 'معتمدية الزهور (القصرين)', 'cؤيؤيس', '2023-10-27', '2023-11-04', NULL, -1, '2023-10-11 02:27:44'),
(100200, 'منطقة سقوية', 'هنشير الحمام ', 17, 'معتمدية تالة', 'الدورة ', '2007-10-12', '1993-10-12', NULL, -1, '2023-10-12 09:23:55'),
(100201, 'منطقة سقوية', 'هنشير الحمام ', 17, 'معتمدية تالة', 'الدشرة', '2007-10-12', '1993-10-12', NULL, 1, '2023-10-12 09:34:03'),
(100202, 'منطقة سقوية', ' 1فج النعام', 17, 'معتمدية القصرين الجنوبية', 'مقدودش', '1984-05-13', '1983-01-13', NULL, -1, '2023-10-13 13:25:56'),
(100203, 'منطقة سقوية', 'البراجة', 17, 'معتمدية فريانة', 'أم علي ', '2005-10-16', '2004-07-09', NULL, 1, '2023-10-16 08:34:59'),
(100204, 'منطقة ماء صالح للشرب', 'fghj', 17, 'معتمدية الزهور (القصرين)', 'tfhg', '2024-06-16', '2023-06-16', '', 1, '2023-10-16 11:25:04'),
(100205, 'منطقة سقوية', 'فريانة 6', 17, 'معتمدية فريانة', 'العرق ', '1995-10-17', '1991-07-17', NULL, 1, '2023-10-17 12:49:18'),
(100206, 'منطقة سقوية', 'الحاسي ', 17, 'معتمدية سبيبة', 'سبيبة', '2008-12-24', '2008-07-02', NULL, 1, '2023-10-18 09:59:43'),
(100207, 'منطقة سقوية', 'تويشة 3', 17, 'معتمدية العيون', 'تويشة ', '2007-10-18', '2000-10-18', NULL, 1, '2023-10-18 10:50:03'),
(100208, 'منطقة سقوية', 'عين الكحل ', 17, 'معتمدية حيدرة', 'هنشير لجرد ', '2007-10-18', '2000-10-18', NULL, 1, '2023-10-18 11:13:25'),
(100209, 'منطقة سقوية', 'الهرية 3', 17, 'معتمدية ماجل بلعباس', 'ماجل بلعباس ', '2012-08-22', '2011-07-03', NULL, 1, '2023-10-18 12:10:17'),
(100210, 'منطقة سقوية', 'أنفاض لحرمة ', 17, 'معتمدية القصرين الجنوبية', 'بلهيجات', '2007-11-29', '2007-01-18', NULL, 1, '2023-10-18 12:14:54'),
(100211, 'منطقة سقوية', 'أولاد سعد', 17, 'معتمدية ماجل بلعباس', 'ماجل بلعباس الجنوبية', '2007-10-18', '2000-06-18', NULL, 1, '2023-10-18 13:19:12'),
(100212, 'منطقة سقوية', 'المراونة ', 17, 'معتمدية فوسانة', 'خمودة', '2018-10-31', '2016-10-31', NULL, 1, '2023-10-18 13:51:55'),
(100213, 'منطقة سقوية', 'العذيرة 1', 17, 'معتمدية فوسانة', 'العذيرة ', '1999-10-19', '1998-10-19', NULL, 1, '2023-10-19 09:55:00'),
(100214, 'منطقة سقوية', 'سيدي عمر سماتي ', 17, 'معتمدية سبيبة', 'سبيبة ', '2020-10-19', '2019-10-19', NULL, 1, '2023-10-19 10:15:58'),
(100215, 'منطقة سقوية', 'عين سالم ', 17, 'معتمدية حاسي الفريد', 'الهشيم', '2017-05-19', '2016-07-14', NULL, 1, '2023-10-19 10:22:37'),
(100216, 'منطقة سقوية', 'الضفة اليسرى ', 17, 'معتمدية سبيبة', 'أحواز سبيبة ', '2008-10-19', '2008-10-19', NULL, 1, '2023-10-19 10:52:37'),
(100217, 'منطقة سقوية', 'خربوق ', 17, 'معتمدية فريانة', 'قارة النعام', '2000-12-23', '1999-08-07', NULL, 1, '2023-10-19 11:05:23'),
(100218, 'منطقة سقوية', 'خمودة 4', 17, 'معتمدية فوسانة', 'خمودة ', '2006-10-19', '2005-10-19', NULL, 1, '2023-10-19 12:26:18'),
(100219, 'منطقة سقوية', 'الضفة اليمنى', 17, 'معتمدية سبيبة', 'أحواز سبيبة', '2008-10-23', '2008-01-22', NULL, 1, '2023-10-19 12:40:33'),
(100220, 'منطقة سقوية', 'سيدي سهيل1', 17, 'معتمدية تالة', 'عين الجديدة ', '1983-10-20', '1983-10-20', NULL, 1, '2023-10-20 09:07:17'),
(100221, 'منطقة سقوية', 'هنشير الجمل ', 17, 'معتمدية فوسانة', 'المزارعة ', '1991-09-09', '1989-06-20', NULL, 1, '2023-10-20 10:10:58'),
(100222, 'منطقة سقوية', 'فج النعام 1', 17, 'معتمدية القصرين الجنوبية', 'مڨدودش ', '1985-01-13', '1983-01-13', NULL, 1, '2023-10-20 10:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `membre_conseil`
--

CREATE TABLE `membre_conseil` (
  `id_controle_interne` int NOT NULL,
  `idGess` int NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nom_prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `age` int DEFAULT '0',
  `niveau_education` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `anciennete` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `num_tel` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membre_conseil`
--

INSERT INTO `membre_conseil` (`id_controle_interne`, `idGess`, `role`, `nom_prenom`, `age`, `niveau_education`, `anciennete`, `num_tel`) VALUES
(277, 100198, 'رئيس المجمع', '', 0, ' تعليم عالي', '', 0),
(278, 100199, 'رئيس المجمع', '', 0, ' تعليم عالي', '', 0),
(279, 100200, 'رئيس المجمع', 'توفيق سعيداوي ', 60, 'ثانوي ', '4', 92985378),
(280, 100200, 'أمين المال', 'يوسف سعيداوي ', 58, 'ثانوي ', '4', 96772631),
(281, 100200, 'عضو', 'عبد القادر سعداوي ', 50, 'ثانوي ', '4', 0),
(282, 100201, 'رئيس المجمع', 'توفيق سعيداوي ', 60, 'ثانوي ', '4', 92985378),
(283, 100201, 'أمين المال', 'يوسف سعيداوي ', 58, 'ثانوي ', '4', 96772631),
(284, 100201, 'عضو', 'عبد القادر سعيداوي ', 50, 'ثانوي ', '4', 0),
(285, 100202, 'رئيس المجمع', 'عبد العزيز غرسلي ', 61, ' تعليم عالي', '7', 97614445),
(286, 100202, 'أمين المال', 'ابراهيم غرسلي', 56, 'ثانوي ', '4', 97061445),
(287, 100202, 'عضو', 'عبد الحميد غرسلي ', 55, 'ابتدائي', '4', 94619195),
(288, 100203, 'رئيس المجمع', 'مقداد برجي ', 64, 'ابتدائي', '4', 0),
(289, 100203, 'أمين المال', 'عمار برجي', 42, 'ابتدائي', '4', 0),
(290, 100204, 'رئيس المجمع', '', 0, ' تعليم عالي', '', 0),
(291, 100205, 'رئيس المجمع', 'محمد نجيب سعداوي ', 66, 'ابتدائي', '31', 97251411),
(292, 100205, 'أمين المال', 'أحمد سعداوي ', 58, 'ثانوي ', '3', 54020642),
(293, 100206, 'رئيس المجمع', ' لزهر سميري', 57, ' تعليم عالي', '3', 28135461),
(294, 100206, 'أمين المال', 'وحيد محفوظي', 62, 'ثانوي ', '3', 0),
(295, 100206, 'عضو', 'نور الدين مباركي ', 56, 'ثانوي ', '3', 90166561),
(296, 100206, 'عضو', 'الصغير سلماوي', 58, 'ثانوي ', '3', 97356173),
(297, 100206, 'عضو', 'كمال سلماوي', 54, ' تعليم عالي', '3', 0),
(298, 100206, 'عضو', 'الكامل سميري', 55, 'ثانوي ', '3', 0),
(299, 100207, 'رئيس المجمع', 'عبد المجيد ميساوي ', 67, 'ابتدائي', '7', 25203066),
(300, 100207, 'أمين المال', 'عبد السلام محفوظي ', 59, 'ابتدائي', '7', 96427972),
(301, 100207, 'عضو', 'عبد الرزاق ميساوي ', 50, 'ابتدائي', '7', 94836954),
(302, 100208, 'رئيس المجمع', 'حسين منصري ', 56, ' تعليم عالي', '4', 95245490),
(303, 100208, 'أمين المال', 'صادق منصري ', 52, 'ثانوي ', '4', 0),
(304, 100208, 'عضو', 'علي منصري ', 49, 'ثانوي ', '4', 97095087),
(305, 100209, 'رئيس المجمع', 'بسام شعباني ', 42, ' تعليم عالي', '7', 97703218),
(306, 100209, 'أمين المال', 'صالح لطيفي ', 50, ' تعليم عالي', '7', 40438815),
(307, 100209, 'عضو', 'شاكر مسعودي ', 47, ' تعليم عالي', '7', 98353238),
(308, 100209, 'عضو', 'فريد مسعودي ', 45, ' تعليم عالي', '7', 97238783),
(309, 100210, 'رئيس المجمع', 'عمار غرسلي', 67, 'ابتدائي', '4', 95367684),
(310, 100210, 'عضو', 'وليد غرسلي', 40, ' تعليم عالي', '4', 97471309),
(311, 100210, 'عضو', 'عمر غرسلي', 52, ' تعليم عالي', '4', 0),
(312, 100210, 'عضو', 'رفيق غرسلي', 45, ' تعليم عالي', '4', 0),
(313, 100211, 'رئيس المجمع', 'علي حاجي ', 67, ' تعليم عالي', '15', 98509555),
(314, 100211, 'أمين المال', 'ناصر حاجي', 59, 'ابتدائي', '4', 97727845),
(315, 100211, 'عضو', 'عباسي حاجي', 50, 'ابتدائي', '4', 95504297),
(316, 100212, 'رئيس المجمع', ' عبد الله مرواني ', 42, ' تعليم عالي', '4', 24355786),
(317, 100212, 'أمين المال', 'محمود مرواني', 65, 'ابتدائي', '4', 51868405),
(318, 100212, 'عضو', 'علي مرواني ', 44, 'ثانوي ', '4', 27085126),
(319, 100213, 'رئيس المجمع', 'محمد عوني ', 49, 'ثانوي ', '1', 21423455),
(320, 100213, 'أمين المال', 'محمد عروسي', 62, 'ثانوي ', '1', 97005536),
(321, 100213, 'عضو', 'شكري عوني ', 39, 'ابتدائي', '1', 96347205),
(322, 100213, 'عضو', 'بدر الدين عوني ', 52, 'ابتدائي', '1', 52170210),
(323, 100213, 'عضو', 'عبد الرحمان عوني ', 41, 'ثانوي ', '1', 21325015),
(324, 100213, 'عضو', 'عبد الستار عوني ', 46, 'ثانوي ', '1', 42335205),
(325, 100214, 'رئيس المجمع', 'محمد صالح زياني ', 60, 'ثانوي ', '15', 94532485),
(326, 100214, 'أمين المال', 'رمزي زياني ', 36, 'ثانوي ', '1', 94013613),
(327, 100214, 'عضو', 'نور الدين زياني ', 40, 'ثانوي ', '1', 0),
(328, 100215, 'رئيس المجمع', 'عزالدين رحيمي', 40, 'ابتدائي', '3', 97042436),
(329, 100215, 'أمين المال', 'علي بن عبدالله رحيمي', 42, 'ثانوي ', '3', 96538055),
(330, 100215, 'عضو', 'رؤوف رحيمي ', 65, 'ثانوي ', '3', 96538241),
(331, 100216, 'رئيس المجمع', 'هادي زنايدي', 46, 'ثانوي ', '1', 98218364),
(332, 100216, 'أمين المال', 'سامي محمدي', 45, 'ثانوي ', '1', 20269990),
(333, 100216, 'عضو', 'علي سماتي', 48, 'ثانوي ', '1', 0),
(334, 100216, 'عضو', 'محمد علي بن هيسي ', 0, 'ثانوي ', '1', 0),
(335, 100216, 'عضو', 'شكري غلڨاوي', 0, 'ثانوي ', '1', 0),
(336, 100216, 'عضو', 'علي اولاد حامد ', 0, 'ثانوي ', '1', 0),
(337, 100217, 'رئيس المجمع', 'صابر دربالي ', 35, 'ثانوي ', '3', 97416801),
(338, 100217, 'أمين المال', 'مسعود ', 56, 'ابتدائي', '7', 94534190),
(339, 100217, 'عضو', 'مسعود ', 63, 'ابتدائي', '1', 96747112),
(340, 100217, 'عضو', 'مهدي عماري ', 40, 'ثانوي ', '1', 29563033),
(341, 100217, 'عضو', 'جمال حفصي', 45, 'ثانوي ', '1', 0),
(342, 100217, 'عضو', 'محمد الصغير عماري ', 48, 'ثانوي ', '1', 0),
(343, 100218, 'رئيس المجمع', 'محمد لمين حسني ', 51, ' تعليم عالي', '14', 97824691),
(344, 100218, 'أمين المال', 'هادي حسني ', 59, 'ابتدائي', '4', 29473483),
(345, 100218, 'عضو', 'عبد الرؤوف حسني ', 42, 'ثانوي ', '4', 95113952),
(346, 100218, 'عضو', 'محمد عروسي حسني ', 40, 'ابتدائي', '4', 28565052),
(347, 100218, 'عضو', 'محمد وردي حسني ', 67, 'ابتدائي', '4', 20138787),
(348, 100218, 'عضو', 'محمد لطفي عيدودي ', 52, 'ابتدائي', '4', 43141062),
(349, 100219, 'رئيس المجمع', 'عزالدين داودي', 68, ' تعليم عالي', '4', 97007317),
(350, 100219, 'أمين المال', 'أنور داودي ', 60, 'ثانوي ', '4', 0),
(351, 100219, 'عضو', 'عبد الغني داودي ', 56, 'ثانوي ', '4', 98679441),
(352, 100219, 'عضو', 'مهدي داودي ', 62, 'ثانوي ', '4', 0),
(353, 100219, 'عضو', 'زياد داودي ', 50, 'ثانوي ', '4', 0),
(354, 100220, 'رئيس المجمع', 'محمد علي عبيدي ', 43, ' تعليم عالي', '17', 25527172),
(355, 100220, 'أمين المال', 'يوسف عبيدي ', 50, 'ابتدائي', '17', 27721132),
(356, 100220, 'عضو', 'محمد مختار خضراوي ', 53, 'ثانوي ', '17', 96461685),
(357, 100221, 'رئيس المجمع', 'جمال عمري ', 54, 'ثانوي ', '1', 96490207),
(358, 100221, 'أمين المال', 'مراد عمري', 42, 'ثانوي ', '1', 94941505),
(359, 100221, 'رئيس المجمع', 'فاهم عمري ', 65, 'ابتدائي', '1', 93959691),
(360, 100222, 'رئيس المجمع', 'عبد العزيز غرسلي ', 61, ' تعليم عالي', '7', 97614445),
(361, 100222, 'أمين المال', 'ابراهيم غرسلي ', 56, 'ثانوي ', '4', 97061445),
(362, 100222, 'عضو', 'عبد الحميد غرسلي ', 55, 'ابتدائي', '4', 94619195);

-- --------------------------------------------------------

--
-- Table structure for table `parametre`
--

CREATE TABLE `parametre` (
  `idParametre` int NOT NULL,
  `idGess` int NOT NULL,
  `prixM3` int NOT NULL,
  `prixHeure` int NOT NULL,
  `prixFixe` int NOT NULL,
  `autrePrix` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parametre`
--

INSERT INTO `parametre` (`idParametre`, `idGess`, `prixM3`, `prixHeure`, `prixFixe`, `autrePrix`) VALUES
(1, 100198, 2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pi_aspects_financiers`
--

CREATE TABLE `pi_aspects_financiers` (
  `id` int NOT NULL,
  `idGess` int NOT NULL,
  `vente_eau_par_heure` int DEFAULT NULL,
  `tarif_par_heure` float DEFAULT NULL,
  `vente_eau_par_metre_cube` int DEFAULT NULL,
  `tarif_par_metre_cube` float DEFAULT NULL,
  `paiement` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `methode_fixation_tarif_eau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `vente_a_credit` int DEFAULT NULL,
  `montant_a_credit` float DEFAULT NULL,
  `retard_paiement` int DEFAULT NULL,
  `dettes_agriculteurs` float DEFAULT NULL,
  `dettes_fournisseurs` float DEFAULT NULL,
  `dettes_steg` float DEFAULT NULL,
  `dettes_crda` float DEFAULT NULL,
  `autres_dettes` float DEFAULT NULL,
  `description_dettes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `caisse` float DEFAULT NULL,
  `compte_courant` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pi_aspects_financiers`
--

INSERT INTO `pi_aspects_financiers` (`id`, `idGess`, `vente_eau_par_heure`, `tarif_par_heure`, `vente_eau_par_metre_cube`, `tarif_par_metre_cube`, `paiement`, `methode_fixation_tarif_eau`, `vente_a_credit`, `montant_a_credit`, `retard_paiement`, `dettes_agriculteurs`, `dettes_fournisseurs`, `dettes_steg`, `dettes_crda`, `autres_dettes`, `description_dettes`, `caisse`, `compte_courant`) VALUES
(71, 100199, 0, 0, 0, 0, 'مسبق', '', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0),
(72, 100200, 0, 0, 1, 0.15, 'بعد التحصيل', '', 0, 0, 0, 0, 0, 12914, 10874, 0, '', 0, 0),
(73, 100201, 0, 0, 1, 0.15, 'مسبق', '', 0, 0, 0, 0, 0, 12914, 10874, 0, '', 0, 0),
(74, 100202, 1, 28, 0, 0, 'مسبق', '', 1, 3000, 1, 0, 0, 746, 26728, 0, '', 6307, 4734),
(75, 100203, 0, 0, 0, 0, 'مسبق', '', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0),
(76, 100205, 1, 12, 0, 0, 'مسبق', 'تم تحديد تسعيرة الماء بالتعاون مع خلية الارشاد الفلاحي بفريانة', 1, 4000, 0, 0, 0, 3855, 970, 0, '  ديون الشزكة الوطنية للكهرباء و الغاز هي المشكل الأكبر حسب رئيس الجمعية ', 0, 0),
(77, 100206, 1, 15, 0, 0, 'مسبق', '', 0, 0, 0, 0, 0, 123640, 0, 0, '', 0, 0),
(78, 100207, 1, 12, 0, 0, ' بالتقسيط', '', 0, 0, 0, 0, 0, 8479, 39596, 0, '', 0, 0),
(79, 100208, 0, 0, 1, 0.2, ' بالتقسيط', '', 0, 0, 0, 0, 0, 11799, 39596, 0, '', 0, 0),
(80, 100209, 0, 0, 1, 0.3, ' بالتقسيط', '', 0, 0, 0, 0, 0, 7713, 16653, 0, '', 0, 0),
(81, 100210, 0, 0, 1, 0.15, ' بالتقسيط', '', 0, 0, 0, 0, 0, 72, 970, 0, 'تم تسديد الديون من قبل المنتفعين ', 0, 0),
(82, 100211, 0, 0, 1, 0.4, ' بالتقسيط', '', 0, 0, 0, 0, 0, 28664, 12716, 0, '', 0, 0),
(83, 100212, 0, 0, 1, 0.3, 'مسبق', '', 0, 0, 0, 0, 0, 3211, 1500, 0, '', 0, 0),
(84, 100213, 1, 16, 0, 0, 'مسبق', '', 0, 0, 0, 0, 0, 2144, 7916, 0, '', 0, 0),
(85, 100214, 0, 0, 1, 0.3, 'مسبق', 'يتم تحديد التسعيرة بطريقة اعتباطية ', 0, 0, 0, 0, 0, 10100, 970, 0, '', 0, 8190),
(86, 100215, 0, 0, 1, 0.4, 'مسبق', '', 0, 0, 0, 0, 0, 0, 305, 0, '', 0, 0),
(87, 100216, 1, 15, 0, 0, 'مسبق', 'تحدد التسعيرة بالاعتماد على الميزانية ', 0, 0, 0, 0, 0, 121539, 12290, 0, 'ديون الشركة التونسية للكهرباء والغاز مرتفعة جدا ', 0, 0),
(88, 100217, 0, 0, 1, 0.18, 'مسبق', '', 0, 0, 0, 0, 0, 3135, 0, 0, '', 0, 0),
(89, 100218, 0, 0, 1, 0.15, 'مسبق', 'يتم تحديد تسعيرة بيع الماء بالاعتماد على الميزانية ', 0, 0, 0, 2500, 0, 7517, 18729, 0, '', 0, 0),
(90, 100219, 1, 15, 0, 0, 'مسبق', 'قام مجلس الأدارة بتحديد تسعيرة الماء بالتعاون مع خلية الأرشاد الفلاحي ', 0, 0, 0, 0, 0, 25925, 57637.2, 0, '', 0, 0),
(91, 100220, 1, 18, 0, 0, 'مسبق', '', 0, 0, 0, 0, 0, 31256, 320, 0, '', 6000, 1000),
(92, 100221, 1, 12, 0, 0, 'مسبق', 'حسب التكاليف  \r\nأجرة العملة \r\nديون الشركة الوطنية للكهرباء و الغاز ', 0, 0, 0, 0, 0, 407, 90, 0, 'الديون أقل من ألف دينار ', 0, 0),
(93, 100222, 1, 28, 0, 0, 'مسبق', '', 1, 3000, 1, 0, 0, 746, 26728, 0, '', 4734, 6307);

-- --------------------------------------------------------

--
-- Table structure for table `pi_conseil_administration`
--

CREATE TABLE `pi_conseil_administration` (
  `id` int NOT NULL,
  `idGess` int NOT NULL,
  `conseil_administration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `seance_generale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_prevue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `derniere_seance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pourcentage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `quorum_derniere_seance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pi_conseil_administration`
--

INSERT INTO `pi_conseil_administration` (`id`, `idGess`, `conseil_administration`, `seance_generale`, `date_prevue`, `derniere_seance`, `pourcentage`, `quorum_derniere_seance`) VALUES
(113, 100199, 'مجلس منتخب', NULL, '', '', '', NULL),
(114, 100200, 'مجلس منتخب', NULL, '2023-03-29', '2021-03-29', '60', '[\'Document-3.pdf\']'),
(115, 100201, 'مجلس منتخب', '[\'Document-3_1.pdf\']', '2023-03-29', '2021-03-29', '60', '[\'Document-3_2.pdf\']'),
(116, 100202, 'مجلس منحل', NULL, '2022-09-26', '2018-01-28', '', NULL),
(117, 100203, 'مجلس منحل', NULL, '2023-04-21', '2018-04-21', '', NULL),
(118, 100205, 'مجلس منتخب', NULL, '2023-02-22', '2022-02-22', '60', NULL),
(119, 100206, 'مجلس منحل', NULL, '2022-08-18', '2019-06-06', '', NULL),
(120, 100207, 'مجلس منحل', NULL, '2022-12-05', '2018-03-16', '30', NULL),
(121, 100208, 'هيئة تسييرية', NULL, '2022-11-15', '2019-11-15', '', NULL),
(122, 100209, 'مجلس منحل', NULL, '2022-12-28', '2017-12-28', '60', NULL),
(123, 100210, 'مجلس منتخب', NULL, '2023-03-07', '2021-03-07', '60', NULL),
(124, 100211, 'مجلس منحل', NULL, '2023-03-16', '2018-03-16', '70', NULL),
(125, 100212, 'مجلس منحل', NULL, '2022-10-31', '2018-10-31', '40', NULL),
(126, 100213, 'مجلس منتخب', NULL, '2023-01-12', '2022-09-12', '70', NULL),
(127, 100214, 'مجلس منتخب', NULL, '2023-06-22', '2022-06-22', '65', NULL),
(128, 100215, 'مجلس منتخب', NULL, '2022-09-05', '2019-09-05', '65', NULL),
(129, 100216, 'مجلس منتخب', NULL, '2023-04-19', '2021-04-19', '', NULL),
(130, 100217, 'مجلس منتخب', NULL, '2023-02-19', '2021-02-19', '75', NULL),
(131, 100218, 'مجلس منتخب', '[\'محضر-جلسة.pdf\']', '2023-04-07', '2021-04-07', '55', '[\'محضر-جلسة_1.pdf\']'),
(132, 100219, 'مجلس منحل', NULL, '2023-03-18', '2018-03-18', '58', NULL),
(133, 100220, 'مجلس منتخب', NULL, '2023-09-12', '2022-09-12', '49', NULL),
(134, 100221, 'مجلس منتخب', NULL, '2023-09-05', '2022-09-05', '55', NULL),
(135, 100222, 'مجلس منحل', NULL, '2022-09-26', '2018-01-28', '70', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pi_donnees_points_distribution`
--

CREATE TABLE `pi_donnees_points_distribution` (
  `id` int NOT NULL,
  `idGess` int NOT NULL,
  `surface_totale` float DEFAULT NULL,
  `surface_hors_zone` float DEFAULT NULL,
  `nombre_sans_compteur` int DEFAULT NULL,
  `engagement_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nombre_compteurs` int DEFAULT NULL,
  `nombre_compteurs_desactives` int DEFAULT NULL,
  `nombre_compteurs_non_autorises` int DEFAULT NULL,
  `nombre_compteurs_conformes_specifications` int DEFAULT NULL,
  `nombre_fournisseurs_citernes` int DEFAULT NULL,
  `distribution_eau_selon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `document_suivi_distribution` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mise_a_jour_documents` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `observations` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pi_donnees_points_distribution`
--

INSERT INTO `pi_donnees_points_distribution` (`id`, `idGess`, `surface_totale`, `surface_hors_zone`, `nombre_sans_compteur`, `engagement_2`, `nombre_compteurs`, `nombre_compteurs_desactives`, `nombre_compteurs_non_autorises`, `nombre_compteurs_conformes_specifications`, `nombre_fournisseurs_citernes`, `distribution_eau_selon`, `document_suivi_distribution`, `mise_a_jour_documents`, `observations`) VALUES
(85, 100199, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 'الطلب', NULL, NULL, ''),
(86, 100200, 83, 0, 0, NULL, 32, 13, 0, 0, 0, 'الدورة المائية', NULL, NULL, ''),
(87, 100201, 83, 0, 0, NULL, 32, 13, 0, 0, 0, 'الدورة المائية', NULL, NULL, ''),
(88, 100202, 40, 30, 16, NULL, 16, 0, 0, 0, 0, 'الطلب', NULL, NULL, ''),
(89, 100203, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 'الطلب', NULL, NULL, ''),
(90, 100205, 50, 80, 26, NULL, 34, 28, 8, 0, 0, 'الطلب', NULL, NULL, ''),
(91, 100206, 190, 0, 13, NULL, 13, 0, 0, 0, 0, 'الدورة المائية', NULL, NULL, ''),
(92, 100207, 248, 12, 0, NULL, 60, 0, 0, 0, 0, 'الدورة المائية', NULL, NULL, ''),
(93, 100208, 90, 12, 39, NULL, 39, 0, 0, 39, 0, 'الدورة المائية', NULL, NULL, ''),
(94, 100209, 45, 100, 0, NULL, 29, 0, 0, 0, 0, 'الطلب', NULL, NULL, ''),
(95, 100210, 62, 6, 0, NULL, 60, 0, 0, 0, 0, 'الطلب', NULL, NULL, ''),
(96, 100211, 47, 12, 0, NULL, 14, 0, 0, 14, 0, 'الدورة المائية', NULL, NULL, ''),
(97, 100212, 56, 0, 0, NULL, 42, 0, 0, 42, 0, 'الدورة المائية', NULL, NULL, ''),
(98, 100213, 54, 10, 0, NULL, 23, 23, 0, 0, 0, 'الدورة المائية', NULL, NULL, ''),
(99, 100214, 100, 1, 0, NULL, 47, 0, 0, 47, 0, 'الطلب', NULL, NULL, ''),
(100, 100215, 94, 10, 0, NULL, 94, 0, 0, 94, 0, 'الدورة المائية', NULL, NULL, ''),
(101, 100216, 651, 0, 300, NULL, 300, 0, 0, 0, 0, 'الدورة المائية', NULL, NULL, ''),
(102, 100217, 65, 60, 24, NULL, 24, 0, 0, 0, 0, 'الدورة المائية', NULL, NULL, ''),
(103, 100218, 61, 0, 0, NULL, 55, 0, 0, 0, 0, 'الطلب', NULL, NULL, ''),
(104, 100219, 742, 0, 60, NULL, 60, 0, 0, 0, 0, 'الدورة المائية', NULL, NULL, ''),
(105, 100220, 112, 6, 17, NULL, 14, 14, 0, 0, 0, 'الدورة المائية', NULL, NULL, ''),
(106, 100221, 50, 10, 53, NULL, 53, 0, 0, 0, 0, 'الدورة المائية', NULL, NULL, ''),
(107, 100222, 40, 30, 16, NULL, 16, 16, 0, 0, 0, 'الطلب', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `pi_dossier_financier`
--

CREATE TABLE `pi_dossier_financier` (
  `id` int NOT NULL,
  `idGess` int NOT NULL,
  `factures_et_mouidates` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `copies_budgets_annuels` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `releve_compteurs_rapports` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `etats_compte_courant` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mouidates_depenses` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cartes_adhesion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `recevabilites_livraison` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fichier_abonnements` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fichier_tarification` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rapports_controle_comptable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `registres_suivi_exploitation_facturation_encaissement` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `livre_comptabilite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rapports_situation_financiere` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `registre_listes_dettes_agriculteurs_beneficiaires` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `liste_dettes_association_fournisseurs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pi_dossier_financier`
--

INSERT INTO `pi_dossier_financier` (`id`, `idGess`, `factures_et_mouidates`, `copies_budgets_annuels`, `releve_compteurs_rapports`, `etats_compte_courant`, `mouidates_depenses`, `cartes_adhesion`, `recevabilites_livraison`, `fichier_abonnements`, `fichier_tarification`, `rapports_controle_comptable`, `registres_suivi_exploitation_facturation_encaissement`, `livre_comptabilite`, `rapports_situation_financiere`, `registre_listes_dettes_agriculteurs_beneficiaires`, `liste_dettes_association_fournisseurs`) VALUES
(67, 100199, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 100200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 100201, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 100202, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 100203, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 100205, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 100206, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 100207, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 100208, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 100209, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 100210, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 100211, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 100212, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 100213, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 100214, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 100215, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 100216, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 100217, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 100218, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 100219, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 100220, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 100221, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 100222, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pi_dossier_technique`
--

CREATE TABLE `pi_dossier_technique` (
  `id` int NOT NULL,
  `idGess` int NOT NULL,
  `Exploitations_Agricoles` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Stations_Pompage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Reseau_Maien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Reservoirs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Caracteristiques_Normes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Etudes_Techniques` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Registre_Pompage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Cycle_Eau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Registre_Consommation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Registre_Distribution` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Permis_Distribution` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Documents_Suivi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Maintenance_Preventive` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Registre_Demandes_Distribution` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pi_dossier_technique`
--

INSERT INTO `pi_dossier_technique` (`id`, `idGess`, `Exploitations_Agricoles`, `Stations_Pompage`, `Reseau_Maien`, `Reservoirs`, `Caracteristiques_Normes`, `Etudes_Techniques`, `Registre_Pompage`, `Cycle_Eau`, `Registre_Consommation`, `Registre_Distribution`, `Permis_Distribution`, `Documents_Suivi`, `Maintenance_Preventive`, `Registre_Demandes_Distribution`) VALUES
(65, 100199, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 100200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 100201, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 100202, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 100203, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 100205, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 100206, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 100207, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 100208, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 100209, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 100210, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 100211, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 100212, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 100213, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 100214, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 100215, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 100216, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 100217, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 100218, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 100219, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 100220, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 100221, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 100222, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pi_formation_tutorat`
--

CREATE TABLE `pi_formation_tutorat` (
  `id` int NOT NULL,
  `idGess` int NOT NULL,
  `conseil_administration_president_motifs_formation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `conseil_administration_president_nombre_formations` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `conseil_administration_president_nombre_encadrements` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `conseil_administration_tresorier_motifs_formation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `conseil_administration_tresorier_nombre_formations` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `conseil_administration_tresorier_nombre_encadrements` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `conseil_administration_membre_motifs_formation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `conseil_administration_membre_nombre_formations` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `conseil_administration_membre_nombre_encadrements` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `controleurs_internes_controleur1_motifs_formation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `controleurs_internes_controleur1_nombre_formations` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `controleurs_internes_controleur1_nombre_encadrements` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `controleurs_internes_controleur2_motifs_formation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `controleurs_internes_controleur2_nombre_formations` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `controleurs_internes_controleur2_nombre_encadrements` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `agents_magasin_directeur_technique_motifs_formation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `agents_magasin_directeur_technique_nombre_formations` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `agents_magasin_directeur_technique_nombre_encadrements` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `agents_magasin_garde_systeme_hydro_motifs_formation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `agents_magasin_garde_systeme_hydro_nombre_formations` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `agents_magasin_garde_systeme_hydro_nombre_encadrements` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `agents_magasin_garde_systeme_eau_motifs_formation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `agents_magasin_garde_systeme_eau_nombre_formations` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `agents_magasin_garde_systeme_eau_nombre_encadrements` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `agents_magasin_distributeur_motifs_formation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `agents_magasin_distributeur_nombre_formations` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `agents_magasin_distributeur_nombre_encadrements` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pi_formation_tutorat`
--

INSERT INTO `pi_formation_tutorat` (`id`, `idGess`, `conseil_administration_president_motifs_formation`, `conseil_administration_president_nombre_formations`, `conseil_administration_president_nombre_encadrements`, `conseil_administration_tresorier_motifs_formation`, `conseil_administration_tresorier_nombre_formations`, `conseil_administration_tresorier_nombre_encadrements`, `conseil_administration_membre_motifs_formation`, `conseil_administration_membre_nombre_formations`, `conseil_administration_membre_nombre_encadrements`, `controleurs_internes_controleur1_motifs_formation`, `controleurs_internes_controleur1_nombre_formations`, `controleurs_internes_controleur1_nombre_encadrements`, `controleurs_internes_controleur2_motifs_formation`, `controleurs_internes_controleur2_nombre_formations`, `controleurs_internes_controleur2_nombre_encadrements`, `agents_magasin_directeur_technique_motifs_formation`, `agents_magasin_directeur_technique_nombre_formations`, `agents_magasin_directeur_technique_nombre_encadrements`, `agents_magasin_garde_systeme_hydro_motifs_formation`, `agents_magasin_garde_systeme_hydro_nombre_formations`, `agents_magasin_garde_systeme_hydro_nombre_encadrements`, `agents_magasin_garde_systeme_eau_motifs_formation`, `agents_magasin_garde_systeme_eau_nombre_formations`, `agents_magasin_garde_systeme_eau_nombre_encadrements`, `agents_magasin_distributeur_motifs_formation`, `agents_magasin_distributeur_nombre_formations`, `agents_magasin_distributeur_nombre_encadrements`) VALUES
(84, 100199, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(85, 100200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(86, 100201, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(87, 100202, 'التصرف الأداري و المالي ', '2', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(88, 100203, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(89, 100205, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(90, 100206, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(91, 100207, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(92, 100208, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(93, 100209, 'دورة تكوينية في التصرف الإداري والمالي ', '2', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(94, 100210, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(95, 100211, 'التصرف المالي و الاداري و التقني', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(96, 100212, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(97, 100213, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(98, 100214, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(99, 100215, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(100, 100216, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(101, 100217, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(102, 100218, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'دورة تكوينية في التصرف المالي ', '1', '1', '', '', '', '', '', ''),
(103, 100219, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(104, 100220, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(105, 100221, 'التصرف الاداري و المالي و التقني ', '3', '3', 'التصرف الاداري و المالي و التقني ', '3', '3', '', '', '', '', '', '', '', '', '', '', '', '', 'التصرف الاداري و المالي و التقني ', '3', '3', 'التصرف التقني ', '1', '1', '', '', ''),
(106, 100222, 'دورة تكوينية في التصرف الإداري والمالي ', '2', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pi_informations_agents`
--

CREATE TABLE `pi_informations_agents` (
  `id` int NOT NULL,
  `idGess` int NOT NULL,
  `niveau_education2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nom_prenom2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `age2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `salaire2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contrat_travail2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `securite_sociale2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `numero_telephone2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `agents_executifs2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pi_informations_agents`
--

INSERT INTO `pi_informations_agents` (`id`, `idGess`, `niveau_education2`, `nom_prenom2`, `age2`, `salaire2`, `contrat_travail2`, `securite_sociale2`, `numero_telephone2`, `agents_executifs2`) VALUES
(93, 100199, ' تعليم عالي', '', '', '', NULL, NULL, '', 'مدير فني'),
(94, 100200, ' تعليم عالي', 'بيرم سعيداوي', '27', '500', NULL, NULL, '46555811', 'مدير فني'),
(95, 100200, 'ابتدائي', 'لطفي سعيداوي ', '43', '400', NULL, NULL, '99751596', 'حارس  النظام المائي'),
(96, 100201, ' تعليم عالي', 'بيرم سعيداوي', '27', '500', NULL, NULL, '46555811', 'مدير فني'),
(97, 100201, 'ابتدائي', 'لطفي سعيداوي ', '43', '400', NULL, NULL, '99751596', 'حارس  النظام المائي'),
(98, 100202, 'ثانوي ', 'نصرالدين غرسلي ', '27', '300', NULL, NULL, '', 'مدير فني'),
(99, 100203, ' تعليم عالي', '', '', '', NULL, NULL, '', 'مدير فني'),
(100, 100205, 'ثانوي ', 'رضا سعداوي ', '41', '500', NULL, NULL, '55098404', 'حارس  النظام المائي'),
(101, 100206, ' تعليم عالي', 'كوثر علاقي ', '31', '340', NULL, NULL, '', 'مدير فني'),
(102, 100206, 'ثانوي ', 'محمد خلفي ', '45', '700', NULL, NULL, '', 'حارس  النظام المائي'),
(103, 100206, 'ثانوي ', 'مراد محفوظي ', '40', '500', NULL, NULL, '', 'موزع الماء'),
(104, 100206, 'ثانوي ', 'حسن علاقي', '42', '500', NULL, NULL, '', 'موزع الماء'),
(105, 100207, ' تعليم عالي', '', '', '', NULL, NULL, '', 'مدير فني'),
(106, 100208, ' تعليم عالي', 'لسعد منصري ', '48', '600', NULL, NULL, '97951384', 'مدير فني'),
(107, 100209, 'ثانوي ', 'خالد شعباني ', '45', '422', NULL, NULL, '96632371', 'حارس  النظام المائي'),
(108, 100210, 'ثانوي ', 'عادل غرسلي', '49', '300', NULL, NULL, '98961828', 'حارس  النظام المائي'),
(109, 100211, 'ثانوي ', 'أسامة حاجي ', '30', '300', NULL, NULL, '46555811', 'حارس  النظام المائي'),
(110, 100212, ' تعليم عالي', '', '', '', NULL, NULL, '', 'مدير فني'),
(111, 100213, 'ثانوي ', 'رياض عوني ', '37', '200', NULL, NULL, '42483576', 'مدير فني'),
(112, 100213, 'ثانوي ', 'نور الدين عوني ', '40', '350', NULL, NULL, '95730049', 'حارس  النظام المائي'),
(113, 100214, 'ثانوي ', 'طارق زياني ', '50', '600', NULL, NULL, '95548573', 'حارس  النظام المائي'),
(114, 100215, 'ابتدائي', 'فاهم رحيمي ', '59', '420', NULL, NULL, '26247999', 'حارس  النظام المائي'),
(115, 100215, 'ابتدائي', 'مولدي  رحيمي ', '52', '420', NULL, NULL, '94486855', 'موزع الماء'),
(116, 100215, 'ابتدائي', 'محمد الهادي رحيمي ', '53', '420', NULL, NULL, '28410319', 'موزع الماء'),
(117, 100216, 'ثانوي ', 'وحيد محمدي ', '52', '250', NULL, NULL, '97869775', 'مدير فني'),
(118, 100216, 'ابتدائي', 'احمد خلفي ', '40', '250', NULL, NULL, '', 'حارس  النظام المائي'),
(119, 100216, 'ثانوي ', 'نور الدين رمضاني ', '38', '300', NULL, NULL, '53171699', 'موزع الماء'),
(120, 100216, 'ثانوي ', 'محمد رمضاني ', '37', '300', NULL, NULL, '20968019', 'موزع الماء'),
(121, 100217, ' تعليم عالي', 'حسن حفصي ', '39', '300', NULL, NULL, '97006526', 'مدير فني'),
(122, 100217, 'ثانوي ', 'حسن بن عبد الله حسني ', '21', '500', NULL, NULL, '98816148', 'حارس  النظام المائي'),
(123, 100217, 'ثانوي ', 'العبيدي دربالي ', '31', '500', NULL, NULL, '97031060', 'موزع الماء'),
(124, 100218, ' تعليم عالي', 'سوار حسني ', '25', '450', '441عقد مدير فني.pdf', NULL, '98317322', 'مدير فني'),
(125, 100218, 'ثانوي ', 'محمد بشير حسني ', '47', '70', NULL, NULL, '97632706', 'حارس  النظام المائي'),
(126, 100219, 'ثانوي ', 'بشير داودي ', '63', '600', NULL, NULL, '97250669', 'مدير فني'),
(127, 100219, 'ثانوي ', 'عبد اللطيف داودي', '70', '420', NULL, NULL, '93030914', 'حارس  النظام المائي'),
(128, 100219, 'ثانوي ', 'محمد الحبيب خلفي ', '52', '420', NULL, NULL, '', 'موزع الماء'),
(129, 100219, 'ثانوي ', 'نورالدين خلفي ', '40', '420', NULL, NULL, '', 'موزع الماء'),
(130, 100219, 'ابتدائي', 'حسان خلفي ', '30', '420', NULL, NULL, '', 'حارس  النظام المائي'),
(131, 100219, 'ابتدائي', 'محمد الفاضل خلفي ', '45', '420', NULL, NULL, '', 'حارس  النظام المائي'),
(132, 100219, 'ثانوي ', 'محمد بن علي حميدي', '40', '420', NULL, NULL, '', 'حارس  النظام المائي'),
(133, 100219, 'ثانوي ', 'ثامر حسني ', '30', '420', NULL, NULL, '', 'موزع الماء'),
(134, 100219, 'ثانوي ', 'عبد المنعم سلماوي', '40', '420', NULL, NULL, '', 'موزع الماء'),
(135, 100220, ' تعليم عالي', 'صدام خديمي ', '31', '300', NULL, NULL, '24168424', 'مدير فني'),
(136, 100220, 'ابتدائي', 'نجيب خديمي ', '57', '420', NULL, NULL, '41164697', 'حارس  النظام المائي'),
(137, 100221, 'ثانوي ', 'سفيان عمري ', '37', '200', NULL, NULL, '50891051', 'مدير فني'),
(138, 100221, 'ابتدائي', 'وليد عمري', '27', '200', NULL, NULL, '27202299', 'حارس  النظام المائي'),
(139, 100222, 'ثانوي ', 'نصر الدين غرسلي ', '27', '300', NULL, NULL, '53009456', 'مدير فني');

-- --------------------------------------------------------

--
-- Table structure for table `pi_logistique_mojamaa`
--

CREATE TABLE `pi_logistique_mojamaa` (
  `id` int NOT NULL,
  `idGess` int NOT NULL,
  `local` int DEFAULT NULL,
  `bureau` int DEFAULT NULL,
  `chaises` int DEFAULT NULL,
  `armoire` int DEFAULT NULL,
  `panneau_publicitaire` int DEFAULT NULL,
  `ordinateur` int DEFAULT NULL,
  `telephone` int DEFAULT NULL,
  `fax` int DEFAULT NULL,
  `imprimante` int DEFAULT NULL,
  `velo` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pi_logistique_mojamaa`
--

INSERT INTO `pi_logistique_mojamaa` (`id`, `idGess`, `local`, `bureau`, `chaises`, `armoire`, `panneau_publicitaire`, `ordinateur`, `telephone`, `fax`, `imprimante`, `velo`) VALUES
(73, 100199, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(74, 100200, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(75, 100201, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(76, 100202, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(77, 100203, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(78, 100205, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(79, 100206, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(80, 100207, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(81, 100208, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(82, 100209, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(83, 100210, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(84, 100211, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(85, 100212, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(86, 100213, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(87, 100214, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(88, 100215, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(89, 100216, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(90, 100217, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(91, 100218, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(92, 100219, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(93, 100220, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(94, 100221, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(95, 100222, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pi_paysans`
--

CREATE TABLE `pi_paysans` (
  `id` int NOT NULL,
  `idGess` int NOT NULL,
  `nombre_fermiers` int DEFAULT NULL,
  `nombre_contrats` int DEFAULT NULL,
  `presence_liste` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mise_a_jour` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nombre_membres` int DEFAULT NULL,
  `montant_adhesion` float DEFAULT NULL,
  `presence_registre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pi_paysans`
--

INSERT INTO `pi_paysans` (`id`, `idGess`, `nombre_fermiers`, `nombre_contrats`, `presence_liste`, `mise_a_jour`, `nombre_membres`, `montant_adhesion`, `presence_registre`) VALUES
(109, 100199, 0, 0, NULL, NULL, 0, 0, NULL),
(110, 100200, 67, 29, NULL, NULL, 0, 0, NULL),
(111, 100201, 67, 29, NULL, NULL, 0, 0, NULL),
(112, 100202, 40, 9, NULL, NULL, 192, 20, NULL),
(113, 100203, 50, 0, NULL, NULL, 0, 0, NULL),
(114, 100205, 27, 0, NULL, NULL, 0, 0, NULL),
(115, 100206, 201, 75, NULL, NULL, 75, 0, NULL),
(116, 100207, 45, 0, NULL, NULL, 0, 0, NULL),
(117, 100208, 36, 0, NULL, NULL, 25, 12, NULL),
(118, 100209, 33, 0, NULL, NULL, 0, 0, NULL),
(119, 100210, 30, 0, NULL, NULL, 0, 0, NULL),
(120, 100211, 24, 0, NULL, NULL, 8, 12, NULL),
(121, 100212, 32, 0, NULL, NULL, 0, 0, NULL),
(122, 100213, 40, 0, NULL, NULL, 25, 5, NULL),
(123, 100214, 70, 35, NULL, NULL, 40, 20, NULL),
(124, 100215, 94, 0, NULL, NULL, 32, 10, NULL),
(125, 100216, 751, 0, NULL, NULL, 12, 0, NULL),
(126, 100217, 141, 50, NULL, NULL, 50, 10, NULL),
(127, 100218, 43, 32, NULL, NULL, 40, 5, NULL),
(128, 100219, 726, 0, NULL, NULL, 0, 0, NULL),
(129, 100220, 101, 0, NULL, NULL, 0, 0, NULL),
(130, 100221, 20, 19, NULL, NULL, 13, 5, NULL),
(131, 100222, 40, 9, NULL, NULL, 19, 20, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pi_plantes_presentes`
--

CREATE TABLE `pi_plantes_presentes` (
  `id` int NOT NULL,
  `idGess` int NOT NULL,
  `cultures_grandes_surface_hectares` int DEFAULT NULL,
  `cultures_grandes_surface_goutte_goutte` int DEFAULT NULL,
  `cultures_grandes_surface_arrosage` int DEFAULT NULL,
  `cultures_grandes_surface_irrigation_traditionnelle` int DEFAULT NULL,
  `fourrages_surface_hectares` int DEFAULT NULL,
  `fourrages_surface_goutte_goutte` int DEFAULT NULL,
  `fourrages_surface_arrosage` int DEFAULT NULL,
  `fourrages_surface_irrigation_traditionnelle` int DEFAULT NULL,
  `legumes_surface_hectares` int DEFAULT NULL,
  `legumes_surface_goutte_goutte` int DEFAULT NULL,
  `legumes_surface_arrosage` int DEFAULT NULL,
  `legumes_surface_irrigation_traditionnelle` int DEFAULT NULL,
  `arbres_fruitiers` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `arbres_fruitiers_surface_hectares` int DEFAULT NULL,
  `arbres_fruitiers_surface_goutte_goutte` int DEFAULT NULL,
  `arbres_fruitiers_surface_arrosage` int DEFAULT NULL,
  `arbres_fruitiers_surface_irrigation_traditionnelle` int DEFAULT NULL,
  `oliviers_surface_hectares` int DEFAULT NULL,
  `oliviers_surface_goutte_goutte` int DEFAULT NULL,
  `oliviers_surface_arrosage` int DEFAULT NULL,
  `oliviers_surface_irrigation_traditionnelle` int DEFAULT NULL,
  `autres_arbres_type` int DEFAULT NULL,
  `autres_arbres_surface_hectares` int DEFAULT NULL,
  `autres_arbres_surface_goutte_goutte` int DEFAULT NULL,
  `autres_arbres_surface_arrosage` int DEFAULT NULL,
  `autres_arbres_surface_irrigation_traditionnelle` int DEFAULT NULL,
  `legumineuses_surface_hectares` int DEFAULT NULL,
  `legumineuses_surface_goutte_goutte` int DEFAULT NULL,
  `legumineuses_surface_arrosage` int DEFAULT NULL,
  `legumineuses_surface_irrigation_traditionnelle` int DEFAULT NULL,
  `total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pi_plantes_presentes`
--

INSERT INTO `pi_plantes_presentes` (`id`, `idGess`, `cultures_grandes_surface_hectares`, `cultures_grandes_surface_goutte_goutte`, `cultures_grandes_surface_arrosage`, `cultures_grandes_surface_irrigation_traditionnelle`, `fourrages_surface_hectares`, `fourrages_surface_goutte_goutte`, `fourrages_surface_arrosage`, `fourrages_surface_irrigation_traditionnelle`, `legumes_surface_hectares`, `legumes_surface_goutte_goutte`, `legumes_surface_arrosage`, `legumes_surface_irrigation_traditionnelle`, `arbres_fruitiers`, `arbres_fruitiers_surface_hectares`, `arbres_fruitiers_surface_goutte_goutte`, `arbres_fruitiers_surface_arrosage`, `arbres_fruitiers_surface_irrigation_traditionnelle`, `oliviers_surface_hectares`, `oliviers_surface_goutte_goutte`, `oliviers_surface_arrosage`, `oliviers_surface_irrigation_traditionnelle`, `autres_arbres_type`, `autres_arbres_surface_hectares`, `autres_arbres_surface_goutte_goutte`, `autres_arbres_surface_arrosage`, `autres_arbres_surface_irrigation_traditionnelle`, `legumineuses_surface_hectares`, `legumineuses_surface_goutte_goutte`, `legumineuses_surface_arrosage`, `legumineuses_surface_irrigation_traditionnelle`, `total`) VALUES
(72, 100199, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(73, 100200, 0, 0, 0, 0, 0, 0, 0, 0, 10, 0, 10, 0, 'التفاح', 9, 8, 0, 1, 64, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 83),
(74, 100201, 0, 0, 0, 0, 0, 0, 0, 0, 10, 0, 10, 0, 'التفاح', 9, 8, 0, 1, 64, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 83),
(75, 100202, 4, 0, 4, 0, 0, 0, 0, 0, 6, 6, 0, 0, 'التفاح,اللوز', 3, 0, 0, 3, 4, 0, 0, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(76, 100203, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(77, 100205, 4, 0, 0, 4, 0, 0, 0, 0, 0, 0, 0, 0, '', 6, 0, 0, 6, 40, 0, 0, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(78, 100206, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'التفاح', 190, 100, 0, 90, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(79, 100207, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'الخوخ,التفاح,المشمش', 100, 80, 0, 20, 15, 10, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 115),
(80, 100208, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'التفاح', 6, 6, 0, 0, 4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10),
(81, 100209, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'الفستق,اللوز', 20, 20, 0, 0, 25, 25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 45),
(82, 100210, 2, 1, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 'التفاح,اللوز', 15, 15, 0, 0, 20, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(83, 100211, 10, 0, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'التفاح,اللوز', 13, 13, 0, 0, 24, 24, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(84, 100212, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'التفاح,المشمش', 16, 16, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(85, 100213, 3, 0, 3, 0, 0, 0, 0, 0, 5, 5, 0, 0, 'التفاح', 18, 13, 0, 5, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 28),
(86, 100214, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'الخوخ,التفاح', 60, 50, 0, 10, 20, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 80),
(87, 100215, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 5, 0, 'اللوز', 10, 5, 0, 0, 30, 25, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(88, 100216, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 5, 'الخوخ,التفاح', 500, 450, 0, 50, 110, 90, 0, 20, 0, 0, 0, 0, 0, 30, 25, 0, 5, 645),
(89, 100217, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'التفاح', 19, 16, 0, 3, 46, 32, 0, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(90, 100218, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 'الخوخ,التفاح', 43, 43, 0, 0, 10, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 58),
(91, 100219, 0, 0, 0, 0, 0, 0, 0, 0, 60, 0, 0, 60, 'التفاح,اللوز', 550, 0, 0, 550, 100, 0, 0, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(92, 100220, 30, 0, 0, 30, 0, 0, 0, 0, 0, 0, 0, 0, 'الخوخ,التفاح', 12, 0, 0, 12, 70, 0, 0, 70, 0, 0, 0, 0, 0, 0, 0, 0, 0, 112),
(93, 100221, 13, 13, 0, 0, 0, 0, 0, 0, 7, 7, 0, 0, 'التفاح,المشمش', 10, 7, 0, 3, 15, 10, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(94, 100222, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'التفاح', 3, 0, 0, 3, 4, 0, 0, 4, 0, 0, 0, 0, 0, 6, 6, 0, 0, 17);

-- --------------------------------------------------------

--
-- Table structure for table `pi_reunions_conseil_administration`
--

CREATE TABLE `pi_reunions_conseil_administration` (
  `id` int NOT NULL,
  `idGess` int NOT NULL,
  `nombre_reunions_annee_precedente` int DEFAULT NULL,
  `presence_proces_verbaux` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `moyenne_presence_reunions` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `absences_membres_justifiees` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `periodicite_reunions` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `presentation_problemes_internes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pi_reunions_conseil_administration`
--

INSERT INTO `pi_reunions_conseil_administration` (`id`, `idGess`, `nombre_reunions_annee_precedente`, `presence_proces_verbaux`, `moyenne_presence_reunions`, `absences_membres_justifiees`, `periodicite_reunions`, `presentation_problemes_internes`) VALUES
(96, 100199, 0, NULL, NULL, NULL, NULL, NULL),
(97, 100200, 0, NULL, NULL, NULL, NULL, NULL),
(98, 100201, 0, NULL, NULL, NULL, NULL, NULL),
(99, 100202, 0, NULL, NULL, NULL, NULL, NULL),
(100, 100203, 0, NULL, NULL, NULL, NULL, NULL),
(101, 100205, 0, NULL, NULL, NULL, NULL, NULL),
(102, 100206, 0, NULL, NULL, NULL, NULL, NULL),
(103, 100207, 0, NULL, NULL, NULL, NULL, NULL),
(104, 100208, 0, NULL, NULL, NULL, NULL, NULL),
(105, 100209, 0, NULL, NULL, NULL, NULL, NULL),
(106, 100210, 0, NULL, NULL, NULL, NULL, NULL),
(107, 100211, 0, NULL, NULL, NULL, NULL, NULL),
(108, 100212, 0, NULL, NULL, NULL, NULL, NULL),
(109, 100213, 0, NULL, NULL, NULL, NULL, NULL),
(110, 100214, 0, NULL, NULL, NULL, NULL, NULL),
(111, 100215, 0, NULL, NULL, NULL, NULL, NULL),
(112, 100216, 0, NULL, NULL, NULL, NULL, NULL),
(113, 100217, 0, NULL, NULL, NULL, NULL, NULL),
(114, 100218, 0, NULL, NULL, NULL, NULL, NULL),
(115, 100219, 0, NULL, NULL, NULL, NULL, NULL),
(116, 100220, 0, NULL, NULL, NULL, NULL, NULL),
(117, 100221, 0, NULL, NULL, NULL, NULL, NULL),
(118, 100222, 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pi_suivi_pompage_distribution_eau`
--

CREATE TABLE `pi_suivi_pompage_distribution_eau` (
  `id` int NOT NULL,
  `idGess` int NOT NULL,
  `quantite_eau_pompee` float DEFAULT NULL,
  `quantite_eau_distribuee` float DEFAULT NULL,
  `taux_perte` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pi_suivi_pompage_distribution_eau`
--

INSERT INTO `pi_suivi_pompage_distribution_eau` (`id`, `idGess`, `quantite_eau_pompee`, `quantite_eau_distribuee`, `taux_perte`) VALUES
(74, 100199, 0, 0, 0),
(75, 100200, 184272, 184272, 0),
(76, 100201, 184272, 184272, 0),
(77, 100202, 160000, 140000, 12.5),
(78, 100203, 0, 0, 0),
(79, 100205, 305980, 275382, 10),
(80, 100206, 97320, 68124, 30),
(81, 100207, 0, 0, 0),
(82, 100208, 0, 0, 0),
(83, 100209, 183249, 183249, 0),
(84, 100210, 163562, 161633, 1.18),
(85, 100211, 155047, 155047, 0),
(86, 100212, 0, 0, 0),
(87, 100213, 108936, 12550, 88.48),
(88, 100214, 100000, 89386, 10.61),
(89, 100215, 3870, 3600, 6.98),
(90, 100216, 556740, 334044, 40),
(91, 100217, 354282, 316027, 10.8),
(92, 100218, 317190, 256923, 19),
(93, 100219, 386847, 255319, 34),
(94, 100220, 200000, 130000, 35),
(95, 100221, 37350, 22410, 40),
(96, 100222, 160000, 140000, 12.5);

-- --------------------------------------------------------

--
-- Table structure for table `pompe`
--

CREATE TABLE `pompe` (
  `idPompe` int NOT NULL,
  `idGess` int NOT NULL,
  `numConsommationPompe` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pompe`
--

INSERT INTO `pompe` (`idPompe`, `idGess`, `numConsommationPompe`, `date`) VALUES
(30, 100199, 244422, '2023-10-11 02:29:07'),
(31, 100201, 5000, '2023-10-12 10:17:59'),
(33, 100198, 500, '2023-10-12 12:33:07'),
(34, 100204, 184272, '2023-10-16 12:02:41'),
(35, 100205, 184272, '2023-10-18 10:02:32'),
(36, 100207, 4567, '2023-10-20 12:32:18');

-- --------------------------------------------------------

--
-- Table structure for table `pompiste`
--

CREATE TABLE `pompiste` (
  `idPompiste` int NOT NULL,
  `idGess` int NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dateN` date NOT NULL,
  `CIN` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dateCIN` date NOT NULL,
  `payement` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `famille` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `travail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tel` int NOT NULL,
  `dateDebut` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateFin` date NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mdp` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `actif` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pompiste`
--

INSERT INTO `pompiste` (`idPompiste`, `idGess`, `nom`, `dateN`, `CIN`, `dateCIN`, `payement`, `famille`, `travail`, `address`, `tel`, `dateDebut`, `dateFin`, `email`, `mdp`, `actif`) VALUES
(153396, 100198, 'Johnathon Lupo', '1977-05-05', '08963359', '1977-02-05', 'مقابل منحة شهرية', 'أعزب', '12345', '12345', 24208116, '2023-10-11 02:22:40', '2023-10-12', 'aaa@aaa.aaa', 'aaa', 0),
(464673, 100201, 'محمد قاسمي ', '1985-06-05', '12546765', '2020-06-05', 'مقابل منحة شهرية', 'متزوج', 'حارس', 'هنشير الحمام تالة ', 20800214, '2023-10-12 10:38:55', '2023-10-12', 'mohamed@gmail.com', 'mohamed85', 0),
(732904, 100201, 'علي علي', '1977-05-05', '05033155', '1977-02-05', 'مقابل منحة شهرية', 'أعزب', '12345', '12345', 28246577, '2023-10-12 11:16:21', '1000-10-10', 'ali@gmail.com', 'ali123456789', 1),
(822316, 100198, 'فلان  فلان ', '1977-05-05', '04371289', '1977-02-05', 'مقابل نسبة من المداخيل', 'أعزب', '12345', '12345', 25130768, '2023-10-12 09:19:57', '1000-10-10', 'foulen@gmail.com', 'foulen123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prise_pi`
--

CREATE TABLE `prise_pi` (
  `idPrise` int NOT NULL,
  `idGess` int NOT NULL,
  `numPrise` int NOT NULL,
  `numBranche` int NOT NULL,
  `fluxPrise` int NOT NULL,
  `numParticipantPrise` int NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prise_pi`
--

INSERT INTO `prise_pi` (`idPrise`, `idGess`, `numPrise`, `numBranche`, `fluxPrise`, `numParticipantPrise`, `date`) VALUES
(781693, 100198, 1, 1, 1, 1, '2023-10-11 22:20:35');

-- --------------------------------------------------------

--
-- Table structure for table `problemes`
--

CREATE TABLE `problemes` (
  `idProbleme` int NOT NULL,
  `idGess` int NOT NULL,
  `idPompiste` int NOT NULL,
  `numCompteur` int NOT NULL,
  `detail` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `typeBenefique` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prix` double NOT NULL,
  `elementAchete` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `typeProbleme` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fichierPrix` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `fichierElementAchete` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `problemes`
--

INSERT INTO `problemes` (`idProbleme`, `idGess`, `idPompiste`, `numCompteur`, `detail`, `typeBenefique`, `prix`, `elementAchete`, `date`, `typeProbleme`, `fichierPrix`, `fichierElementAchete`) VALUES
(595012, 100198, 153396, 224794, 'value=\"1234\"', 'صالح للشراب', 123, '123', '2023-10-11 22:59:11', 'خارجي', '84314.sql', '');

-- --------------------------------------------------------

--
-- Table structure for table `registre`
--

CREATE TABLE `registre` (
  `idRegistre` int NOT NULL,
  `idGess` int NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mois` varchar(255) DEFAULT NULL,
  `annee` int DEFAULT NULL,
  `date` float DEFAULT NULL,
  `statement` varchar(255) DEFAULT NULL,
  `numeros_acces` varchar(255) DEFAULT NULL,
  `adhesions` float DEFAULT NULL,
  `abonnements` float DEFAULT NULL,
  `vente_eau` float DEFAULT NULL,
  `autres_revenus` float DEFAULT NULL,
  `montant_merchandises` float DEFAULT NULL,
  `achat_eau` float DEFAULT NULL,
  `enrgie` float DEFAULT NULL,
  `autres_frais_exploitation` float DEFAULT NULL,
  `maintenance_et_reparations` float DEFAULT NULL,
  `salaires` float DEFAULT NULL,
  `gestion_et_administration` float DEFAULT NULL,
  `salaires2` float DEFAULT NULL,
  `depenses_activites_autres` float DEFAULT NULL,
  `investissement_et_equipement` float DEFAULT NULL,
  `dakhil` float DEFAULT NULL,
  `sarf` float DEFAULT NULL,
  `dakhil1` float DEFAULT NULL,
  `sarf1` float DEFAULT NULL,
  `moisNmr` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `registre`
--

INSERT INTO `registre` (`idRegistre`, `idGess`, `dateAjout`, `mois`, `annee`, `date`, `statement`, `numeros_acces`, `adhesions`, `abonnements`, `vente_eau`, `autres_revenus`, `montant_merchandises`, `achat_eau`, `enrgie`, `autres_frais_exploitation`, `maintenance_et_reparations`, `salaires`, `gestion_et_administration`, `salaires2`, `depenses_activites_autres`, `investissement_et_equipement`, `dakhil`, `sarf`, `dakhil1`, `sarf1`, `moisNmr`) VALUES
(42, 100198, '2023-10-16 12:02:29', 'أكتوبر', 2023, 16, '', '244', 123, 123, 123, 123, 123, 123, 123, 123, 123, 123, 122, 213, 123, 123, 123, 123, 123, 123, 10),
(43, 100198, '2023-10-16 12:04:09', 'أكتوبر', 2023, 16, '456', '456', 456, 456, 456, 456, 456, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int NOT NULL,
  `idGess` int NOT NULL,
  `role_utilisateur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nom_utilisateur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_utilisateur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tel_utilisateur` int NOT NULL,
  `mdp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `idGess`, `role_utilisateur`, `nom_utilisateur`, `email_utilisateur`, `tel_utilisateur`, `mdp`) VALUES
(196, 100198, 'رئيس المجمع', 'nom et prenom', 'aaaa@aaaa.com', 22222222, 'aaaa@aaaa.com'),
(197, 100199, 'رئيس المجمع', 'www', 'housembouzabia@gmail.comxc', 24442244, 'aze'),
(198, 100200, 'رئيس المجمع', 'توفيق سعيداوي ', 'henchirlahmam@gmail.com', 92985378, NULL),
(199, 100201, 'رئيس المجمع', 'توفيق سعيداوي ', 'henchirlahmam@gmail.com', 92985378, 'Henchirlahmam'),
(200, 100202, 'رئيس المجمع', 'عبد العزيز غرسلي', 'fejennam1@gmail.com', 97614445, 'fejennam'),
(201, 100203, 'رئيس المجمع', 'مقداد برجي ', 'elbrajja@gmail.com', 97006492, 'elbrajja'),
(202, 100204, 'رئيس المجمع', 'fghjk', 'rtfgyhj@gmail.com', 23245678, 'gda2023'),
(203, 100205, 'رئيس المجمع', 'محمد نجيب سعداوي ', 'feriana6@gmail.com', 97252411, 'feriana6'),
(204, 100206, 'رئيس المجمع', 'لزهر سميري', 'elhassi@gmail.com', 28135461, 'Elhassi'),
(205, 100207, 'رئيس المجمع', 'عبد المجيد ميساوي ', 'tiwicha3@gmail.com', 95245440, 'tiwicha3'),
(206, 100208, 'رئيس المجمع', 'حسين منصري ', 'ainelkhol@gmail.com', 95245440, 'ainelkhol'),
(207, 100209, 'رئيس المجمع', 'بسام شعباني ', 'elharya3@gmail.com', 97703218, 'Elharya03'),
(208, 100210, 'رئيس المجمع', 'عمار غرسلي ', 'anfadhlihrma@gmail.com', 95367584, 'anfadhlihrma'),
(209, 100211, 'رئيس المجمع', 'علي حاجي ', 'awladsaad@gmail.com', 98509555, 'awladsaad'),
(210, 100212, 'رئيس المجمع', 'عبد االله مرواني', 'elmrawna@gmail.com', 24355786, 'elmrawna'),
(211, 100213, 'رئيس المجمع', 'محمد عوني ', 'eladhira1@gmail.com', 21423455, 'Eladhira01'),
(212, 100214, 'رئيس المجمع', 'محمد صالح زياني ', 'sidiomorsmati@gmail.com', 94532485, 'sidiomorsmati00'),
(213, 100215, 'رئيس المجمع', 'عزالدين رحيمي ', 'ainsalem@gmail.com', 97042436, 'ainsalem000'),
(214, 100216, 'رئيس المجمع', 'هادي زنايدي ', 'rivegauche@gmail.com', 98218304, 'Rivegauche00'),
(215, 100217, 'رئيس المجمع', 'صابر دربالي ', 'kharboug@gmail.com', 97416801, 'kharboug000'),
(216, 100218, 'رئيس المجمع', 'محمد لمين حسني ', 'khmouda4@gmail.com', 97824697, 'Khmouda00'),
(217, 100219, 'المدير الفني', 'بشير داودي', 'rivedroit@gmail.cpm', 97250066, 'rivedroit000'),
(218, 100220, 'رئيس المجمع', 'محمد علي عبيدي ', 'sidishil1@gmail.com', 25527172, 'sidishil0001'),
(219, 100221, 'رئيس المجمع', 'جمال عمري ', 'henchirjmal@gmail.com', 96490207, 'henchirjmal'),
(220, 100222, 'رئيس المجمع', 'عبد العزيز غرسلي ', 'fejennam1@gmail.com', 97614445, 'Fejennam0001');

-- --------------------------------------------------------

--
-- Table structure for table `vente_eau`
--

CREATE TABLE `vente_eau` (
  `idVenteEau` int NOT NULL,
  `idGess` int NOT NULL,
  `idPompiste` int NOT NULL,
  `numConsomme` int NOT NULL,
  `numConsommePrecedent` int NOT NULL,
  `prix` double NOT NULL,
  `facture` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vente_eau`
--

INSERT INTO `vente_eau` (`idVenteEau`, `idGess`, `idPompiste`, `numConsomme`, `numConsommePrecedent`, `prix`, `facture`, `date`) VALUES
(1, 100198, 153396, 100, 0, 0, '0', '2023-10-11 23:18:46'),
(2, 100198, 153396, 110, 100, 10, '30795.jpg', '2023-10-11 23:19:12'),
(3, 100201, 732904, 2345, 0, 0, '0', '2023-10-12 12:37:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accreditations`
--
ALTER TABLE `accreditations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etat_id` (`etat_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `archive_payement_aep`
--
ALTER TABLE `archive_payement_aep`
  ADD PRIMARY KEY (`idPayement`),
  ADD KEY `idBenefique` (`idBenefique`),
  ADD KEY `idPompiste` (`idPompiste`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `archive_payement_pi`
--
ALTER TABLE `archive_payement_pi`
  ADD PRIMARY KEY (`idPayement`),
  ADD KEY `idBenefique` (`idBenefique`),
  ADD KEY `idPompiste` (`idPompiste`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `aspects_financiers`
--
ALTER TABLE `aspects_financiers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `assurer_sterilisation_eau`
--
ALTER TABLE `assurer_sterilisation_eau`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `benefique_aep`
--
ALTER TABLE `benefique_aep`
  ADD PRIMARY KEY (`idBenefique`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `tel` (`tel`),
  ADD UNIQUE KEY `CIN` (`CIN`),
  ADD KEY `idGess` (`idGess`),
  ADD KEY `idPompiste` (`idPompiste`),
  ADD KEY `numCompteur` (`numCompteur`);

--
-- Indexes for table `benefique_pi`
--
ALTER TABLE `benefique_pi`
  ADD PRIMARY KEY (`idBenefique`),
  ADD UNIQUE KEY `CIN` (`CIN`),
  ADD UNIQUE KEY `tel` (`tel`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idGess` (`idGess`),
  ADD KEY `idPompiste` (`idPompiste`),
  ADD KEY `numCompteur` (`numCompteur`);

--
-- Indexes for table `branche`
--
ALTER TABLE `branche`
  ADD PRIMARY KEY (`idBranche`),
  ADD KEY `idGess` (`idGess`),
  ADD KEY `numBranche` (`numBranche`);

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`idbudget`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `consommation_aep`
--
ALTER TABLE `consommation_aep`
  ADD PRIMARY KEY (`idConsommation`),
  ADD KEY `numCompteur` (`numCompteur`),
  ADD KEY `idPompiste` (`idPompiste`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `consommation_et_facture`
--
ALTER TABLE `consommation_et_facture`
  ADD PRIMARY KEY (`idCF`),
  ADD KEY `idGess` (`idGess`),
  ADD KEY `idBenefique` (`idBenefique`),
  ADD KEY `idConsommation` (`idConsommation`),
  ADD KEY `idFacture` (`idFacture`),
  ADD KEY `idPayement` (`idPayement`);

--
-- Indexes for table `consommation_pi`
--
ALTER TABLE `consommation_pi`
  ADD PRIMARY KEY (`idConsommation`),
  ADD KEY `numCompteur` (`numCompteur`),
  ADD KEY `idPompiste` (`idPompiste`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `consommation_pompe`
--
ALTER TABLE `consommation_pompe`
  ADD PRIMARY KEY (`idConsommation`),
  ADD KEY `idPompe` (`idPompe`),
  ADD KEY `idGess` (`idGess`),
  ADD KEY `idPompiste` (`idPompiste`);

--
-- Indexes for table `controle_interne`
--
ALTER TABLE `controle_interne`
  ADD PRIMARY KEY (`id_membre_conseil`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `demandes`
--
ALTER TABLE `demandes`
  ADD PRIMARY KEY (`idDemande`),
  ADD KEY `idBenefique` (`idBenefique`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `demandes_benefique`
--
ALTER TABLE `demandes_benefique`
  ADD PRIMARY KEY (`idDemandeBenefique`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `demandes_eau`
--
ALTER TABLE `demandes_eau`
  ADD PRIMARY KEY (`idDemandeEau`),
  ADD KEY `idBenefique` (`idBenefique`);

--
-- Indexes for table `dette_aep`
--
ALTER TABLE `dette_aep`
  ADD PRIMARY KEY (`idDette`),
  ADD KEY `idBenefique` (`idBenefique`);

--
-- Indexes for table `dette_pi`
--
ALTER TABLE `dette_pi`
  ADD PRIMARY KEY (`idDette`),
  ADD KEY `idBenefique` (`idBenefique`);

--
-- Indexes for table `distribution_eau`
--
ALTER TABLE `distribution_eau`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `documents_administratifs`
--
ALTER TABLE `documents_administratifs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `documents_employee`
--
ALTER TABLE `documents_employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `documents_existants`
--
ALTER TABLE `documents_existants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `documents_financiers`
--
ALTER TABLE `documents_financiers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `documents_technique`
--
ALTER TABLE `documents_technique`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `dossier_financier`
--
ALTER TABLE `dossier_financier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `dossier_juridique`
--
ALTER TABLE `dossier_juridique`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `dossier_technique`
--
ALTER TABLE `dossier_technique`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `d_admin_juridiques`
--
ALTER TABLE `d_admin_juridiques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `en_cas_de_panne`
--
ALTER TABLE `en_cas_de_panne`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `etats_tunisie`
--
ALTER TABLE `etats_tunisie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facture_aep`
--
ALTER TABLE `facture_aep`
  ADD PRIMARY KEY (`idFacture`),
  ADD KEY `idBenefique` (`idBenefique`),
  ADD KEY `idPompiste` (`idPompiste`),
  ADD KEY `idGess` (`idGess`),
  ADD KEY `idConsommation` (`idConsommation`),
  ADD KEY `idConsommationPrecedente` (`idConsommationPrecedente`);

--
-- Indexes for table `gardes`
--
ALTER TABLE `gardes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `gess`
--
ALTER TABLE `gess`
  ADD PRIMARY KEY (`idGess`);

--
-- Indexes for table `membre_conseil`
--
ALTER TABLE `membre_conseil`
  ADD PRIMARY KEY (`id_controle_interne`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `parametre`
--
ALTER TABLE `parametre`
  ADD PRIMARY KEY (`idParametre`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `pi_aspects_financiers`
--
ALTER TABLE `pi_aspects_financiers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `pi_conseil_administration`
--
ALTER TABLE `pi_conseil_administration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `pi_donnees_points_distribution`
--
ALTER TABLE `pi_donnees_points_distribution`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `pi_dossier_financier`
--
ALTER TABLE `pi_dossier_financier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `pi_dossier_technique`
--
ALTER TABLE `pi_dossier_technique`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `pi_formation_tutorat`
--
ALTER TABLE `pi_formation_tutorat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `pi_informations_agents`
--
ALTER TABLE `pi_informations_agents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `pi_logistique_mojamaa`
--
ALTER TABLE `pi_logistique_mojamaa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `pi_paysans`
--
ALTER TABLE `pi_paysans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `pi_plantes_presentes`
--
ALTER TABLE `pi_plantes_presentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `pi_reunions_conseil_administration`
--
ALTER TABLE `pi_reunions_conseil_administration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pi_reunions_conseil_administration_ibfk_2` (`idGess`);

--
-- Indexes for table `pi_suivi_pompage_distribution_eau`
--
ALTER TABLE `pi_suivi_pompage_distribution_eau`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `pompe`
--
ALTER TABLE `pompe`
  ADD PRIMARY KEY (`idPompe`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `pompiste`
--
ALTER TABLE `pompiste`
  ADD PRIMARY KEY (`idPompiste`),
  ADD UNIQUE KEY `CIN` (`CIN`),
  ADD UNIQUE KEY `tel` (`tel`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `prise_pi`
--
ALTER TABLE `prise_pi`
  ADD PRIMARY KEY (`idPrise`),
  ADD KEY `idGess` (`idGess`),
  ADD KEY `numPrise` (`numPrise`),
  ADD KEY `prise_pi_ibfk_2` (`numBranche`);

--
-- Indexes for table `problemes`
--
ALTER TABLE `problemes`
  ADD PRIMARY KEY (`idProbleme`),
  ADD KEY `idGess` (`idGess`),
  ADD KEY `idPompiste` (`idPompiste`),
  ADD KEY `numCompteur` (`numCompteur`);

--
-- Indexes for table `registre`
--
ALTER TABLE `registre`
  ADD PRIMARY KEY (`idRegistre`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vente_eau`
--
ALTER TABLE `vente_eau`
  ADD PRIMARY KEY (`idVenteEau`),
  ADD KEY `idGess` (`idGess`),
  ADD KEY `idPompiste` (`idPompiste`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accreditations`
--
ALTER TABLE `accreditations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2537;

--
-- AUTO_INCREMENT for table `aspects_financiers`
--
ALTER TABLE `aspects_financiers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `assurer_sterilisation_eau`
--
ALTER TABLE `assurer_sterilisation_eau`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `idbudget` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `consommation_aep`
--
ALTER TABLE `consommation_aep`
  MODIFY `idConsommation` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `consommation_pi`
--
ALTER TABLE `consommation_pi`
  MODIFY `idConsommation` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=770;

--
-- AUTO_INCREMENT for table `controle_interne`
--
ALTER TABLE `controle_interne`
  MODIFY `id_membre_conseil` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `demandes_benefique`
--
ALTER TABLE `demandes_benefique`
  MODIFY `idDemandeBenefique` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `distribution_eau`
--
ALTER TABLE `distribution_eau`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `documents_administratifs`
--
ALTER TABLE `documents_administratifs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `documents_employee`
--
ALTER TABLE `documents_employee`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `documents_existants`
--
ALTER TABLE `documents_existants`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `documents_financiers`
--
ALTER TABLE `documents_financiers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `documents_technique`
--
ALTER TABLE `documents_technique`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `dossier_financier`
--
ALTER TABLE `dossier_financier`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `dossier_juridique`
--
ALTER TABLE `dossier_juridique`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `dossier_technique`
--
ALTER TABLE `dossier_technique`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `d_admin_juridiques`
--
ALTER TABLE `d_admin_juridiques`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `en_cas_de_panne`
--
ALTER TABLE `en_cas_de_panne`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `etats_tunisie`
--
ALTER TABLE `etats_tunisie`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `gardes`
--
ALTER TABLE `gardes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `gess`
--
ALTER TABLE `gess`
  MODIFY `idGess` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100223;

--
-- AUTO_INCREMENT for table `membre_conseil`
--
ALTER TABLE `membre_conseil`
  MODIFY `id_controle_interne` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=363;

--
-- AUTO_INCREMENT for table `parametre`
--
ALTER TABLE `parametre`
  MODIFY `idParametre` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pi_aspects_financiers`
--
ALTER TABLE `pi_aspects_financiers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `pi_conseil_administration`
--
ALTER TABLE `pi_conseil_administration`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `pi_donnees_points_distribution`
--
ALTER TABLE `pi_donnees_points_distribution`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `pi_dossier_financier`
--
ALTER TABLE `pi_dossier_financier`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `pi_dossier_technique`
--
ALTER TABLE `pi_dossier_technique`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `pi_formation_tutorat`
--
ALTER TABLE `pi_formation_tutorat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `pi_informations_agents`
--
ALTER TABLE `pi_informations_agents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `pi_logistique_mojamaa`
--
ALTER TABLE `pi_logistique_mojamaa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `pi_paysans`
--
ALTER TABLE `pi_paysans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `pi_plantes_presentes`
--
ALTER TABLE `pi_plantes_presentes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `pi_reunions_conseil_administration`
--
ALTER TABLE `pi_reunions_conseil_administration`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `pi_suivi_pompage_distribution_eau`
--
ALTER TABLE `pi_suivi_pompage_distribution_eau`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `pompe`
--
ALTER TABLE `pompe`
  MODIFY `idPompe` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `registre`
--
ALTER TABLE `registre`
  MODIFY `idRegistre` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `vente_eau`
--
ALTER TABLE `vente_eau`
  MODIFY `idVenteEau` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accreditations`
--
ALTER TABLE `accreditations`
  ADD CONSTRAINT `accreditations_ibfk_1` FOREIGN KEY (`etat_id`) REFERENCES `etats_tunisie` (`id`);

--
-- Constraints for table `archive_payement_aep`
--
ALTER TABLE `archive_payement_aep`
  ADD CONSTRAINT `archive_payement_aep_ibfk_1` FOREIGN KEY (`idBenefique`) REFERENCES `benefique_aep` (`idBenefique`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `archive_payement_aep_ibfk_2` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `archive_payement_aep_ibfk_3` FOREIGN KEY (`idPompiste`) REFERENCES `pompiste` (`idPompiste`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `archive_payement_pi`
--
ALTER TABLE `archive_payement_pi`
  ADD CONSTRAINT `archive_payement_pi_ibfk_1` FOREIGN KEY (`idBenefique`) REFERENCES `benefique_pi` (`idBenefique`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `archive_payement_pi_ibfk_2` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `archive_payement_pi_ibfk_3` FOREIGN KEY (`idPompiste`) REFERENCES `pompiste` (`idPompiste`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `aspects_financiers`
--
ALTER TABLE `aspects_financiers`
  ADD CONSTRAINT `aspects_financiers_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assurer_sterilisation_eau`
--
ALTER TABLE `assurer_sterilisation_eau`
  ADD CONSTRAINT `assurer_sterilisation_eau_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `benefique_aep`
--
ALTER TABLE `benefique_aep`
  ADD CONSTRAINT `benefique_aep_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `benefique_aep_ibfk_2` FOREIGN KEY (`idPompiste`) REFERENCES `pompiste` (`idPompiste`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `benefique_pi`
--
ALTER TABLE `benefique_pi`
  ADD CONSTRAINT `benefique_pi_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `benefique_pi_ibfk_2` FOREIGN KEY (`idPompiste`) REFERENCES `pompiste` (`idPompiste`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `branche`
--
ALTER TABLE `branche`
  ADD CONSTRAINT `branche_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `consommation_aep`
--
ALTER TABLE `consommation_aep`
  ADD CONSTRAINT `consommation_aep_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `consommation_aep_ibfk_2` FOREIGN KEY (`numCompteur`) REFERENCES `benefique_aep` (`numCompteur`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `consommation_aep_ibfk_3` FOREIGN KEY (`idPompiste`) REFERENCES `pompiste` (`idPompiste`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `consommation_pi`
--
ALTER TABLE `consommation_pi`
  ADD CONSTRAINT `consommation_pi_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `consommation_pi_ibfk_2` FOREIGN KEY (`idPompiste`) REFERENCES `pompiste` (`idPompiste`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `consommation_pi_ibfk_3` FOREIGN KEY (`numCompteur`) REFERENCES `benefique_pi` (`numCompteur`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `consommation_pompe`
--
ALTER TABLE `consommation_pompe`
  ADD CONSTRAINT `consommation_pompe_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `consommation_pompe_ibfk_2` FOREIGN KEY (`idPompe`) REFERENCES `pompe` (`idPompe`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `consommation_pompe_ibfk_3` FOREIGN KEY (`idPompiste`) REFERENCES `pompiste` (`idPompiste`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `controle_interne`
--
ALTER TABLE `controle_interne`
  ADD CONSTRAINT `controle_interne_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `demandes`
--
ALTER TABLE `demandes`
  ADD CONSTRAINT `demandes_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `demandes_benefique`
--
ALTER TABLE `demandes_benefique`
  ADD CONSTRAINT `demandes_benefique_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `dette_aep`
--
ALTER TABLE `dette_aep`
  ADD CONSTRAINT `dette_aep_ibfk_1` FOREIGN KEY (`idBenefique`) REFERENCES `benefique_aep` (`idBenefique`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `dette_pi`
--
ALTER TABLE `dette_pi`
  ADD CONSTRAINT `dette_pi_ibfk_1` FOREIGN KEY (`idBenefique`) REFERENCES `benefique_pi` (`idBenefique`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `distribution_eau`
--
ALTER TABLE `distribution_eau`
  ADD CONSTRAINT `distribution_eau_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `documents_administratifs`
--
ALTER TABLE `documents_administratifs`
  ADD CONSTRAINT `documents_administratifs_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `documents_employee`
--
ALTER TABLE `documents_employee`
  ADD CONSTRAINT `documents_employee_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `documents_existants`
--
ALTER TABLE `documents_existants`
  ADD CONSTRAINT `documents_existants_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `documents_financiers`
--
ALTER TABLE `documents_financiers`
  ADD CONSTRAINT `documents_financiers_ibfk_2` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `documents_technique`
--
ALTER TABLE `documents_technique`
  ADD CONSTRAINT `documents_technique_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dossier_financier`
--
ALTER TABLE `dossier_financier`
  ADD CONSTRAINT `dossier_financier_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dossier_juridique`
--
ALTER TABLE `dossier_juridique`
  ADD CONSTRAINT `dossier_juridique_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dossier_technique`
--
ALTER TABLE `dossier_technique`
  ADD CONSTRAINT `dossier_technique_ibfk_2` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `d_admin_juridiques`
--
ALTER TABLE `d_admin_juridiques`
  ADD CONSTRAINT `d_admin_juridiques_ibfk_2` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `en_cas_de_panne`
--
ALTER TABLE `en_cas_de_panne`
  ADD CONSTRAINT `en_cas_de_panne_ibfk_2` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `facture_aep`
--
ALTER TABLE `facture_aep`
  ADD CONSTRAINT `facture_aep_ibfk_1` FOREIGN KEY (`idBenefique`) REFERENCES `benefique_aep` (`idBenefique`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `facture_aep_ibfk_2` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `facture_aep_ibfk_3` FOREIGN KEY (`idPompiste`) REFERENCES `pompiste` (`idPompiste`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `gardes`
--
ALTER TABLE `gardes`
  ADD CONSTRAINT `gardes_ibfk_2` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `membre_conseil`
--
ALTER TABLE `membre_conseil`
  ADD CONSTRAINT `membre_conseil_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parametre`
--
ALTER TABLE `parametre`
  ADD CONSTRAINT `parametre_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `pi_aspects_financiers`
--
ALTER TABLE `pi_aspects_financiers`
  ADD CONSTRAINT `pi_aspects_financiers_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pi_conseil_administration`
--
ALTER TABLE `pi_conseil_administration`
  ADD CONSTRAINT `pi_conseil_administration_ibfk_2` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pi_donnees_points_distribution`
--
ALTER TABLE `pi_donnees_points_distribution`
  ADD CONSTRAINT `pi_donnees_points_distribution_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pi_dossier_financier`
--
ALTER TABLE `pi_dossier_financier`
  ADD CONSTRAINT `pi_dossier_financier_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pi_dossier_technique`
--
ALTER TABLE `pi_dossier_technique`
  ADD CONSTRAINT `pi_dossier_technique_ibfk_2` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pi_formation_tutorat`
--
ALTER TABLE `pi_formation_tutorat`
  ADD CONSTRAINT `pi_formation_tutorat_ibfk_2` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pi_informations_agents`
--
ALTER TABLE `pi_informations_agents`
  ADD CONSTRAINT `pi_informations_agents_ibfk_2` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pi_logistique_mojamaa`
--
ALTER TABLE `pi_logistique_mojamaa`
  ADD CONSTRAINT `pi_logistique_mojamaa_ibfk_2` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pi_paysans`
--
ALTER TABLE `pi_paysans`
  ADD CONSTRAINT `pi_paysans_ibfk_3` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pi_plantes_presentes`
--
ALTER TABLE `pi_plantes_presentes`
  ADD CONSTRAINT `pi_plantes_presentes_ibfk_2` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pi_reunions_conseil_administration`
--
ALTER TABLE `pi_reunions_conseil_administration`
  ADD CONSTRAINT `pi_reunions_conseil_administration_ibfk_2` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pi_suivi_pompage_distribution_eau`
--
ALTER TABLE `pi_suivi_pompage_distribution_eau`
  ADD CONSTRAINT `pi_suivi_pompage_distribution_eau_ibfk_2` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pompe`
--
ALTER TABLE `pompe`
  ADD CONSTRAINT `pompe_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `pompiste`
--
ALTER TABLE `pompiste`
  ADD CONSTRAINT `pompiste_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `prise_pi`
--
ALTER TABLE `prise_pi`
  ADD CONSTRAINT `prise_pi_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `prise_pi_ibfk_2` FOREIGN KEY (`numBranche`) REFERENCES `branche` (`numBranche`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `problemes`
--
ALTER TABLE `problemes`
  ADD CONSTRAINT `problemes_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `problemes_ibfk_2` FOREIGN KEY (`idPompiste`) REFERENCES `pompiste` (`idPompiste`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `registre`
--
ALTER TABLE `registre`
  ADD CONSTRAINT `registre_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vente_eau`
--
ALTER TABLE `vente_eau`
  ADD CONSTRAINT `vente_eau_ibfk_1` FOREIGN KEY (`idGess`) REFERENCES `gess` (`idGess`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `vente_eau_ibfk_2` FOREIGN KEY (`idPompiste`) REFERENCES `pompiste` (`idPompiste`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
