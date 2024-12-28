-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2023 at 04:36 AM
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
-- Database: `argon`
--

-- --------------------------------------------------------

--
-- Table structure for table `accreditations`
--

CREATE TABLE `accreditations` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `etat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
-- Table structure for table `benefique`
--

CREATE TABLE `benefique` (
  `idBenefique` int(8) NOT NULL,
  `idGess` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `dateN` date NOT NULL,
  `CIN` int(8) NOT NULL,
  `dateCIN` date NOT NULL,
  `address` varchar(250) NOT NULL,
  `propriete` varchar(50) NOT NULL,
  `tel` int(8) NOT NULL,
  `dateInscription` timestamp NOT NULL DEFAULT current_timestamp(),
  `numPlace` int(11) NOT NULL,
  `aire` int(11) NOT NULL,
  `numDiviseur` int(11) NOT NULL,
  `numPrise` int(11) NOT NULL,
  `flux` int(11) NOT NULL,
  `numCompteur` int(11) NOT NULL,
  `numParticipant` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(200) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `benefique`
--

INSERT INTO `benefique` (`idBenefique`, `idGess`, `nom`, `dateN`, `CIN`, `dateCIN`, `address`, `propriete`, `tel`, `dateInscription`, `numPlace`, `aire`, `numDiviseur`, `numPrise`, `flux`, `numCompteur`, `numParticipant`, `type`, `email`, `mdp`, `active`) VALUES
(249944, 1, 'Qiana Pecora', '1977-05-05', 10254963, '1977-02-05', '12345', 'أعزب', 26066567, '2023-08-31 17:46:28', 518621, 152611, 258786, 612854, 420682, 646077, 3, 'سقوي', '11180965@gmail.com', '123', 1),
(303998, 2, 'Buffy Volkman', '1977-05-05', 16821778, '1977-02-05', '12345', 'مالك', 24901609, '2023-08-31 17:49:30', 168880, 386100, 263433, 138131, 514158, 624994, 6, 'سقوي', '14809344@gmail.com', '123', 1),
(323990, 1, 'Luz Mischke', '1977-05-05', 12803416, '1977-02-05', '12345', 'متسوغ', 28432499, '2023-09-05 04:05:55', 212059, 877078, 196864, 185639, 471713, 786186, 2, 'صالح للشرب', '2342125@gmail.com', '123', 1),
(367091, 1, 'eazeaze', '1977-05-05', 8717991, '1977-02-05', '12345aze', 'مالك', 23129350, '2023-08-31 17:47:08', 693216, 844533, 157298, 799972, 444087, 588582, 2, 'صالح للشرب', '6527310@gmail.com', '123', 1),
(485420, 1, 'Zonia Pingree', '1977-05-05', 12907510, '1977-02-05', '12345', 'مالك', 29074175, '2023-09-05 04:04:31', 245182, 862929, 209991, 392611, 836979, 869419, 7, 'سقوي', '5558370@gmail.com', '123', 1),
(656950, 1, 'Clora Mayoral', '1977-05-05', 1809351, '1977-02-05', '12345', 'مالك', 21301182, '2023-08-31 17:49:16', 726295, 913925, 626419, 733262, 868935, 745596, 1, 'صالح للشرب', '17373735@gmail.com', '123', 1),
(749695, 1, 'Yuri Noren', '1977-05-05', 12290672, '1977-02-05', '12345', 'مالك', 27140548, '2023-08-31 17:46:49', 572396, 347008, 337375, 211694, 392966, 172085, 4, 'صالح للشرب', '15368991@gmail.com', '123', 1),
(971912, 2, 'Tama Lan5', '1977-05-06', 16481825, '1977-02-15', '1234', 'مالك', 20820538, '2023-09-05 02:48:05', 546218, 830717, 739334, 192505, 690347, 469848, 3, 'صالح للشرب', '18452881@gmail.comm', '1233', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cons`
--

CREATE TABLE `cons` (
  `idConsommation` int(11) NOT NULL,
  `numCompteur` int(11) NOT NULL,
  `idPompiste` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `numPrecedent` int(11) NOT NULL DEFAULT 0,
  `prixEauParConseil` double NOT NULL,
  `prixFixeParConseil` double NOT NULL,
  `prixRetardPayement` double NOT NULL,
  `prixDemander` double NOT NULL,
  `prixPaye` double NOT NULL,
  `numFatoura` int(11) NOT NULL,
  `numReçu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consommation`
--

CREATE TABLE `consommation` (
  `idConsommation` int(11) NOT NULL,
  `numCompteur` int(11) NOT NULL,
  `idPompiste` int(11) NOT NULL,
  `numConsomme` int(11) NOT NULL,
  `numConsommePrecedent` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consommation`
--

INSERT INTO `consommation` (`idConsommation`, `numCompteur`, `idPompiste`, `numConsomme`, `numConsommePrecedent`, `date`) VALUES
(774, 588582, 287130, 123, 0, '2023-09-05 04:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `demandes`
--

CREATE TABLE `demandes` (
  `idDemande` int(11) NOT NULL,
  `idBenefique` int(11) NOT NULL,
  `idGess` int(11) NOT NULL,
  `typeDemande` varchar(100) NOT NULL,
  `CIN` int(11) NOT NULL,
  `dateConseil` date NOT NULL,
  `dateCreationDemande` timestamp NOT NULL DEFAULT current_timestamp(),
  `placeCreationDemande` varchar(100) NOT NULL,
  `frontCIN` varchar(100) NOT NULL,
  `backCIN` varchar(100) NOT NULL,
  `resultat` varchar(50) NOT NULL DEFAULT 'قيد التنفيذ',
  `dateAcceptation` date NOT NULL DEFAULT '1000-10-10'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `demandes`
--

INSERT INTO `demandes` (`idDemande`, `idBenefique`, `idGess`, `typeDemande`, `CIN`, `dateConseil`, `dateCreationDemande`, `placeCreationDemande`, `frontCIN`, `backCIN`, `resultat`, `dateAcceptation`) VALUES
(465573, 249944, 2, 'طلب ترشح لعضوية اللجنة الداخلية لمراقبة الحسابات', 19188929, '2023-10-06', '2023-09-06 02:28:42', 'تونس', '30008.jpg', '77011.jfif', 'مقبول', '2023-09-06'),
(528841, 249944, 1, 'طلب ترشح عضوية مجلس ادارة المجمع', 4465632, '2023-09-22', '2023-09-06 01:20:17', 'تونس', '53185.jfif', '17658.jfif', 'مقبول', '1000-10-10'),
(808550, 249944, 1, 'طلب ترشح لعضوية اللجنة الداخلية لمراقبة الحسابات', 10989733, '2023-09-23', '2023-09-06 01:21:08', 'تونس', '33453.png', '19896.png', 'مقبول', '2023-09-06');

-- --------------------------------------------------------

--
-- Table structure for table `etats_tunisie`
--

CREATE TABLE `etats_tunisie` (
  `id` int(11) NOT NULL,
  `nom_etat` varchar(100) NOT NULL
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
-- Table structure for table `parametre`
--

CREATE TABLE `parametre` (
  `idParametre` int(11) NOT NULL,
  `idGess` int(11) NOT NULL,
  `prixM3` int(11) NOT NULL,
  `prixHeure` int(11) NOT NULL,
  `prixFixe` int(11) NOT NULL,
  `autrePrix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parametre`
--

INSERT INTO `parametre` (`idParametre`, `idGess`, `prixM3`, `prixHeure`, `prixFixe`, `autrePrix`) VALUES
(12, 2, 2, 2, 2, 2),
(22, 22, 22, 22, 22, 22),
(23, 1, 123, 123, 123, 123);

-- --------------------------------------------------------

--
-- Table structure for table `pompiste`
--

CREATE TABLE `pompiste` (
  `idPompiste` int(8) NOT NULL,
  `idGess` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `dateN` date NOT NULL,
  `CIN` varchar(8) NOT NULL,
  `dateCIN` date NOT NULL,
  `payement` varchar(100) NOT NULL,
  `famille` varchar(50) NOT NULL,
  `travail` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `tel` int(8) NOT NULL,
  `dateDebut` timestamp NOT NULL DEFAULT current_timestamp(),
  `dateFin` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(200) NOT NULL,
  `actif` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pompiste`
--

INSERT INTO `pompiste` (`idPompiste`, `idGess`, `nom`, `dateN`, `CIN`, `dateCIN`, `payement`, `famille`, `travail`, `address`, `tel`, `dateDebut`, `dateFin`, `email`, `mdp`, `actif`) VALUES
(153443, 1, 'Laine Redner', '1977-05-05', '6997868', '1977-02-05', 'مقابل منحة شهرية', 'أعزب', '12345', '12345', 21408924, '2023-09-05 04:38:36', '1000-10-10', '2373773@gmail.com', '123', 1),
(287130, 1, 'Elida Michaud', '1977-05-05', '05676231', '1977-02-05', 'مقابل منحة شهرية', 'أعزب', '12345', '12345', 27825908, '2023-09-05 02:42:18', '2023-09-05', '7096666@gmail.com', '123', 0),
(505251, 1, 'Randy Fetzer', '1977-05-05', '15839036', '1977-02-05', 'مقابل منحة شهرية', 'أعزب', '12345', '12345', 29449505, '2023-09-05 02:42:09', '2023-09-05', '4561038@gmail.com', '123', 0),
(657581, 1, 'azeazeaze', '1977-05-05', '06651378', '1977-02-05', 'مقابل منحة شهرية', 'أعزب', '12345', '12345', 21688130, '2023-09-05 04:13:47', '2023-09-05', '11920992@gmail.com', '123', 0),
(932549, 1, 'Lyndia Serna', '1977-05-05', '1643664', '1977-02-05', 'مقابل منحة شهرية', 'أعزب', '12345', '12345', 21983250, '2023-09-03 03:43:39', '2023-09-03', '13747925@gmail.com', 'aze', 0);

-- --------------------------------------------------------

--
-- Table structure for table `problemes`
--

CREATE TABLE `problemes` (
  `idProbleme` int(11) NOT NULL,
  `idPompiste` int(11) NOT NULL,
  `numCompteur` int(11) NOT NULL,
  `detail` varchar(500) NOT NULL,
  `typeBenefique` varchar(100) NOT NULL,
  `prix` double NOT NULL,
  `elementAchete` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `typeProbleme` varchar(50) NOT NULL,
  `fichierPrix` varchar(50) NOT NULL DEFAULT '0',
  `fichierElementAchete` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `problemes`
--

INSERT INTO `problemes` (`idProbleme`, `idPompiste`, `numCompteur`, `detail`, `typeBenefique`, `prix`, `elementAchete`, `date`, `typeProbleme`, `fichierPrix`, `fichierElementAchete`) VALUES
(766433, 287130, 786186, 'value=\"1234\"', 'سقوي', 123, '123', '2023-09-05 04:19:12', 'خارجي', '0', '0');

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
-- Indexes for table `benefique`
--
ALTER TABLE `benefique`
  ADD PRIMARY KEY (`idBenefique`),
  ADD UNIQUE KEY `CIN` (`CIN`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `tel` (`tel`),
  ADD KEY `numCompteur` (`numCompteur`);

--
-- Indexes for table `cons`
--
ALTER TABLE `cons`
  ADD PRIMARY KEY (`idConsommation`),
  ADD KEY `idPompiste` (`idPompiste`),
  ADD KEY `numCompteur` (`numCompteur`);

--
-- Indexes for table `consommation`
--
ALTER TABLE `consommation`
  ADD PRIMARY KEY (`idConsommation`),
  ADD KEY `numCompteur` (`numCompteur`),
  ADD KEY `idPompiste` (`idPompiste`);

--
-- Indexes for table `demandes`
--
ALTER TABLE `demandes`
  ADD PRIMARY KEY (`idDemande`),
  ADD KEY `idBenefique` (`idBenefique`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `etats_tunisie`
--
ALTER TABLE `etats_tunisie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parametre`
--
ALTER TABLE `parametre`
  ADD PRIMARY KEY (`idParametre`),
  ADD UNIQUE KEY `idGess_2` (`idGess`),
  ADD KEY `idGess` (`idGess`);

--
-- Indexes for table `pompiste`
--
ALTER TABLE `pompiste`
  ADD PRIMARY KEY (`idPompiste`),
  ADD UNIQUE KEY `CIN` (`CIN`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `tel` (`tel`);

--
-- Indexes for table `problemes`
--
ALTER TABLE `problemes`
  ADD PRIMARY KEY (`idProbleme`),
  ADD KEY `idPompiste` (`idPompiste`),
  ADD KEY `numCompteur` (`numCompteur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accreditations`
--
ALTER TABLE `accreditations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT for table `consommation`
--
ALTER TABLE `consommation`
  MODIFY `idConsommation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=775;

--
-- AUTO_INCREMENT for table `etats_tunisie`
--
ALTER TABLE `etats_tunisie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `parametre`
--
ALTER TABLE `parametre`
  MODIFY `idParametre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accreditations`
--
ALTER TABLE `accreditations`
  ADD CONSTRAINT `accreditations_ibfk_1` FOREIGN KEY (`etat_id`) REFERENCES `etats_tunisie` (`id`);

--
-- Constraints for table `cons`
--
ALTER TABLE `cons`
  ADD CONSTRAINT `cons_ibfk_1` FOREIGN KEY (`numCompteur`) REFERENCES `benefique` (`numCompteur`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `consommation`
--
ALTER TABLE `consommation`
  ADD CONSTRAINT `consommation_ibfk_1` FOREIGN KEY (`numCompteur`) REFERENCES `benefique` (`numCompteur`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `consommation_ibfk_2` FOREIGN KEY (`idPompiste`) REFERENCES `pompiste` (`idPompiste`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `demandes`
--
ALTER TABLE `demandes`
  ADD CONSTRAINT `demandes_ibfk_1` FOREIGN KEY (`idBenefique`) REFERENCES `benefique` (`idBenefique`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `problemes`
--
ALTER TABLE `problemes`
  ADD CONSTRAINT `problemes_ibfk_2` FOREIGN KEY (`numCompteur`) REFERENCES `benefique` (`numCompteur`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `problemes_ibfk_3` FOREIGN KEY (`idPompiste`) REFERENCES `pompiste` (`idPompiste`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
