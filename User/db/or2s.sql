-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 03:23 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `or2s`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_profile`
--

CREATE TABLE `admin_profile` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_profile`
--

INSERT INTO `admin_profile` (`id`, `name`, `email`, `password`, `status`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', '0192023a7bbd73250516f069df18b500', 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `user_id` int(11) NOT NULL,
  `train_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `quota_id` int(11) NOT NULL,
  `person` int(11) NOT NULL,
  `book_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ticket_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `division_id` int(11) NOT NULL,
  `div_name` varchar(255) NOT NULL,
  `stop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`division_id`, `div_name`, `stop_id`) VALUES
(1, 'Adra', 0),
(2, 'Kharagpur', 0),
(3, 'Chakradharpur', 0),
(4, 'Ranchi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stops`
--

CREATE TABLE `stops` (
  `stop_id` int(11) NOT NULL,
  `stop_code` varchar(11) NOT NULL,
  `stop_name` varchar(255) NOT NULL,
  `ord` int(11) NOT NULL,
  `division_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stops`
--

INSERT INTO `stops` (`stop_id`, `stop_code`, `stop_name`, `ord`, `division_id`) VALUES
(1, 'ADRA', 'Adra Junction', 1, 1),
(2, 'ANR', 'Anara', 0, 1),
(3, 'ANCR', 'Anchuri', 0, 1),
(4, 'BGA', 'Bagalia', 0, 1),
(5, 'BQA', 'Bankura Junction', 6, 1),
(6, 'BBM', 'Barabhum', 0, 1),
(7, 'BBDA', 'Barbenda', 0, 1),
(8, 'BEX', 'Belboni', 0, 1),
(9, 'BZC', 'Beliatore', 0, 1),
(10, 'BERO', 'Bero', 0, 1),
(11, 'BUGM', 'Berugram', 0, 1),
(12, 'BTRB', 'Betur', 0, 1),
(13, 'VAA', 'Bhaga', 0, 1),
(14, 'BXL', 'Bheduasol', 7, 1),
(15, 'BJE', 'Bhojudih Junction', 0, 1),
(16, 'BCB', 'Bhowra Junction', 0, 1),
(17, 'BKNO', 'Bikna', 0, 1),
(18, 'BRMD', 'Biramdih', 0, 1),
(19, 'VSU', 'Bishnupur Junction', 10, 1),
(20, 'BGO', 'Bogri Road', 12, 1),
(21, 'BKSC', 'Bokaro Steel City', 24, 1),
(22, 'BOKA', 'Bokra', 0, 1),
(23, 'BWCN', 'Bowaichandi', 0, 1),
(24, 'BDPR', 'Brindabanpur', 0, 1),
(25, 'BURN', 'Burnpur', 0, 1),
(26, 'CDGR', 'Chandrakona Road', 14, 1),
(27, 'CAS', 'Chas Road', 0, 1),
(28, 'CNRF', 'Chhandar', 0, 1),
(29, 'CHRA', 'Chharra', 0, 1),
(30, 'CJN', 'Chhatna', 5, 1),
(31, 'DMA', 'Damodar Junction', 0, 1),
(32, 'DRGU', 'Damru Ghutu', 0, 1),
(33, 'DGF', 'Dhagaria', 0, 1),
(34, 'DIM', 'Dhansimla', 0, 1),
(35, 'DDGA', 'Dugda', 0, 1),
(36, 'GRB', 'Garh Dhrubeswar', 0, 1),
(37, 'GUG', 'Garh Jaipur', 0, 1),
(38, 'GBA', 'Garhbeta', 13, 1),
(39, 'GSL', 'Godapiasal', 0, 1),
(40, 'GOR', 'Gopinathpur', 0, 1),
(41, 'GTD', 'Gourinathdham', 0, 1),
(42, 'GMDP', 'Gramdadpur', 0, 1),
(43, 'GSQ', 'Guir Saranga', 0, 1),
(44, 'HPUP', 'Habaspur', 0, 1),
(45, 'HAM', 'Hamirhati', 0, 1),
(46, 'INS', 'Indas', 0, 1),
(47, 'IBL', 'Indrabil', 2, 1),
(48, 'JBO', 'Jamadoba Halt', 0, 1),
(49, 'JNN', 'Jamuniatand', 0, 1),
(50, 'BUTA', 'Jangalmahal Bhadutala', 0, 1),
(51, 'JPH', 'Jhantipahari', 4, 1),
(52, 'JOC', 'Joychandi Pahar Junction', 0, 1),
(53, 'KYB', 'Kaiyar', 0, 1),
(54, 'KISN', 'Kalisen', 0, 1),
(55, 'KTD', 'Kantadih', 0, 1),
(56, 'AKZ', 'Akashi', 0, 4),
(57, 'AOR', 'Argora', 0, 4),
(58, 'BKKI', 'Bakarkudi', 0, 4),
(59, 'BKPR', 'Bakaspur', 0, 4),
(60, 'BLRG', 'Balasiring', 0, 4),
(61, 'BANO', 'Bano', 0, 4),
(62, 'BICI', 'Barkichanpi', 0, 4),
(63, 'BRKP', 'Barkipona', 0, 4),
(64, 'BLNG', 'Barlanga', 0, 4),
(65, 'BKDR', 'Begunkodor', 0, 4),
(66, 'GAG', 'Gangaghat', 0, 4),
(67, 'GATD', 'Gautamdhara', 0, 4),
(68, 'GRE', 'Gola Road', 0, 4),
(69, 'GDBR', 'Goonda Bihar', 0, 4),
(70, 'GBX', 'Govindpur Road', 0, 4),
(71, 'HRBR', 'Harubera', 0, 4),
(72, 'HNSL', 'Haslang P.H.', 0, 4),
(73, 'HTE', 'Hatia', 0, 4),
(74, 'ILO', 'Illoo', 0, 4),
(75, 'IRN', 'Irgaon', 0, 4),
(76, 'ITKY', 'Itky', 0, 4),
(77, 'JAA', 'Jhalida', 25, 4),
(78, 'JHMR', 'Jhimri', 0, 4),
(79, 'JON', 'Jonha', 0, 4),
(80, 'KNRN', 'Kanaroan', 0, 4),
(81, 'KRRA', 'Karra', 0, 4),
(82, 'KITA', 'Kita', 0, 4),
(83, 'KRKR', 'Kurkura', 0, 4),
(84, 'LTMD', 'Latemda', 0, 4),
(85, 'LOM', 'Lodhma', 0, 4),
(86, 'LAD', 'Lohardaga', 0, 4),
(87, 'MAEL', 'Mael', 0, 4),
(88, 'MCZ', 'Mahabuang', 0, 4),
(89, 'MURI', 'Muri Junction', 26, 4),
(90, 'NJA', 'Nagjua', 0, 4),
(91, 'NKM', 'Namkom', 0, 4),
(92, 'NRKP', 'Narkopi', 0, 4),
(93, 'ORGA', 'Orga', 0, 4),
(94, 'PKC', 'Pakra', 0, 4),
(95, 'PBB', 'Parbatonia', 0, 4),
(96, 'PIS', 'Piska', 0, 4),
(97, 'PKF', 'Pokla', 0, 4),
(98, 'RMT', 'Ramgarh Cantonment', 0, 4),
(99, 'RNC', 'Ranchi Junction', 27, 4),
(100, 'SLF', 'Silli', 0, 4),
(101, 'SND', 'Sondimra', 0, 4),
(102, 'SSIA', 'Suisa', 0, 4),
(103, 'TGB', 'Tangarbansli', 0, 4),
(104, 'TATI', 'Tati', 0, 4),
(105, 'TIS', 'Tatisilwai Junction', 0, 4),
(106, 'TUL', 'Tiruldih', 0, 4),
(107, 'TRAN', 'Torang', 0, 4),
(108, 'THO', 'Tulin', 0, 4),
(109, 'KRKN', 'Karkend', 0, 1),
(110, 'KNF', 'Khanudih', 0, 1),
(111, 'KARO', 'Khario P.H.', 0, 1),
(112, 'KHRI', 'Kharkhari', 0, 1),
(113, 'KSX', 'Kotshila Junction', 0, 1),
(114, 'KMRL', 'Kumrul', 0, 1),
(115, 'KSU', 'Kustaur', 0, 1),
(116, 'LYD', 'Layabad', 0, 1),
(117, 'MDKD', 'Madhukunda', 0, 1),
(118, 'MHQ', 'Mahuda Junction', 23, 1),
(119, 'MLQ', 'Malkera', 0, 1),
(120, 'GMMG', 'Masagram', 0, 1),
(121, 'MTIP', 'Mathnashipur', 0, 1),
(122, 'MYX', 'Metyal Sahar', 0, 1),
(123, 'MDF', 'Muradi', 0, 1),
(124, 'MFCK', 'Mustaphachak', 0, 1),
(125, 'NIM', 'Nimdih', 0, 1),
(126, 'NOB', 'Nobanda', 0, 1),
(127, 'ODM', 'Ondagram', 8, 1),
(128, 'PSF', 'Patrasayer', 0, 1),
(129, 'PBA', 'Piardoba', 11, 1),
(130, 'PNW', 'Pundag', 0, 1),
(131, 'PRR', 'Purulia Junction', 0, 1),
(132, 'RDF', 'Radhagaon', 0, 1),
(133, 'RNGR', 'Rainagar', 0, 1),
(134, 'RKI', 'Ramkanali Junction', 0, 1),
(135, 'RSG', 'Ramsagar', 9, 1),
(136, 'RUI', 'Rukni', 0, 1),
(137, 'SHJ', 'Sahaspur Road', 0, 1),
(138, 'SLB', 'Salboni', 15, 1),
(139, 'SNKR', 'Sanka', 0, 1),
(140, 'SNTD', 'Santaldih', 22, 1),
(141, 'SRBZ', 'Sehara Bazar', 0, 1),
(142, 'SHKL', 'Shankrul', 0, 1),
(143, 'SBW', 'Shewbabudih', 0, 1),
(144, 'SHMR', 'Shyamsundar', 0, 1),
(145, 'SRJM', 'Sirjam', 3, 1),
(146, 'SONA', 'Sonamukhi', 0, 1),
(147, 'SIMR', 'Srirampur P.H.', 0, 1),
(148, 'SDMD', 'Sudamdih', 0, 1),
(149, 'TLE', 'Talgaria', 0, 1),
(150, 'TAO', 'Tamna', 0, 1),
(151, 'TSAH', 'Tata Sijua Halt', 0, 1),
(152, 'TKB', 'Tupkadih', 0, 1),
(153, 'URMA', 'Urma', 0, 1),
(154, 'ADTP', 'Adityapur', 0, 3),
(155, 'OND', 'Aunlajori Junction', 0, 3),
(156, 'BMPR', 'Badampahar', 0, 3),
(157, 'BEH', 'Bagdihi', 0, 3),
(158, 'BDO', 'Bahalda Road', 0, 3),
(159, 'BMB', 'Bamra', 0, 3),
(160, 'BGKA', 'Bangurkela', 0, 3),
(161, 'BSPX', 'Banspani', 0, 3),
(162, 'BJMD', 'Bara Jamda Junction', 0, 3),
(163, 'BRM', 'Barabambo', 0, 3),
(164, 'BBN', 'Barbil', 0, 3),
(165, 'BXF', 'Barsuan', 0, 3),
(166, 'BUL', 'Bhalulata', 0, 3),
(167, 'BUF', 'Bimlagarh Junction', 0, 3),
(168, 'BRMP', 'Biramitrapur', 0, 3),
(169, 'BIRP', 'Birarajpur', 0, 3),
(170, 'BRBS', 'Birbans', 0, 3),
(171, 'BZR', 'Bisra', 0, 3),
(172, 'BNDM', 'Bondamunda', 0, 3),
(173, 'ACAB', 'Bondamunda A Cabin', 0, 3),
(174, 'KCAB', 'Bondamunda K Cabin', 0, 3),
(175, 'LNKC', 'Bondamunda Link Cabin', 0, 3),
(176, 'CBSA', 'Chaibasa', 0, 3),
(177, 'CKP', 'Chakradharpur', 21, 3),
(178, 'CJQ', 'Champajharan', 0, 3),
(179, 'CNI', 'Chandil Junction', 0, 3),
(180, 'CPE', 'Chandipos', 0, 3),
(181, 'CHHU', 'Chhanua', 0, 3),
(182, 'DPS', 'Dangoaposi', 0, 3),
(183, 'DJHR', 'Deojhar', 0, 3),
(184, 'DRWN', 'Derowan P. H.', 0, 3),
(185, 'DIH', 'Dharuadihi', 0, 3),
(186, 'DTV', 'Dhutra', 0, 3),
(187, 'DMF', 'Dumerta', 0, 3),
(188, 'GMH', 'Gamharia Junction', 0, 3),
(189, 'GPH', 'Garpos', 0, 3),
(190, 'GOL', 'Goilkera', 0, 3),
(191, 'GUMI', 'Gorumahisani', 0, 3),
(192, 'GUA', 'Gua', 0, 3),
(193, 'HLD', 'Haludpukur', 0, 3),
(194, 'JRA', 'Jaraikela', 0, 3),
(195, 'JRLI', 'Jaroli', 0, 3),
(196, 'JSG', 'Jharsuguda Junction', 0, 3),
(197, 'JNK', 'Jhinkpani', 0, 3),
(198, 'KLG', 'Kalunga', 0, 3),
(199, 'KND', 'Kandra Junction', 0, 3),
(200, 'KXN', 'Kanshbahal', 0, 3),
(201, 'KNPS', 'Kendposi', 0, 3),
(202, 'KRMD', 'Kuarmunda', 0, 3),
(203, 'KIJ', 'Kuldiha', 0, 3),
(204, 'KZU', 'Kunki', 0, 3),
(205, 'LTK', 'Lathikata', 0, 3),
(206, 'LPH', 'Lotapahar', 0, 3),
(207, 'MXW', 'Mahadevsal', 0, 3),
(208, 'MMV', 'Mahali Marup', 0, 3),
(209, 'MLKA', 'Maluka', 0, 3),
(210, 'MIK', 'Manikui', 0, 3),
(211, 'MOU', 'Manoharpur', 0, 3),
(212, 'MMVR', 'Murga Mahadev Road', 0, 3),
(213, 'NOMD', 'Noamundi', 0, 3),
(214, 'NXN', 'Nuagaon', 0, 3),
(215, 'PDPH', 'Padapahar Junction', 0, 3),
(216, 'PRSL', 'Pandrasali', 0, 3),
(217, 'PNPL', 'Panpali P.H', 0, 3),
(218, 'PPO', 'Panposh', 0, 3),
(219, 'PSJ', 'Patasahi', 0, 3),
(220, 'PST', 'Posoitia', 0, 3),
(221, 'QRS', 'Quarry Siding', 0, 3),
(222, 'RRP', 'Rairangpur', 0, 3),
(223, 'GP', 'Rajgangpur', 0, 3),
(224, 'RKSN', 'Rajkharsawan Junction', 0, 3),
(225, 'ROU', 'Rourkela Junction', 0, 3),
(226, 'SOGR', 'Sagara', 0, 3),
(227, 'SDHS', 'Sidhirsai', 0, 3),
(228, 'SIPA', 'Singhpokharia', 0, 3),
(229, 'SINI', 'Sini Junction', 0, 3),
(230, 'SXN', 'Sonakhan', 0, 3),
(231, 'SWR', 'Sonua', 0, 3),
(232, 'TABU', 'Talaburu', 0, 3),
(233, 'TGM', 'Tangarmunda', 0, 3),
(234, 'TATA', 'Tatanagar Junction', 20, 2),
(235, 'TUX', 'Tunia', 0, 3),
(236, 'ABB', 'Abada', 0, 2),
(237, 'ARD', 'Amarda Road', 0, 2),
(238, 'AMZ', 'Amta', 0, 2),
(239, 'ADL', 'Andul', 0, 2),
(240, 'AGV', 'Angua', 0, 2),
(241, 'ASB', 'Asanboni', 0, 2),
(242, 'APRD', 'Ashapurna Devi', 0, 2),
(243, 'BDPA', 'Badalpur PH', 0, 2),
(244, 'BZN', 'Bagnan', 0, 2),
(245, 'BNBR', 'Bahanaga Bazar', 0, 2),
(246, 'VKD', 'Bakhrabad', 0, 2),
(247, 'BLS', 'Balasore', 0, 2),
(248, 'BCK', 'Balichak', 0, 2),
(249, 'BALT', 'Baltikuri Junction', 0, 2),
(250, 'BAAR', 'Bandar P.H.', 0, 2),
(251, 'BGY', 'Bangriposi', 0, 2),
(252, 'BKNM', 'Bankranayabaz', 0, 2),
(253, 'BNB', 'Banstola', 0, 2),
(254, 'BRDB', 'Barda', 0, 2),
(255, 'BAC', 'Bargachia', 0, 2),
(256, 'BPO', 'Baripada', 0, 2),
(257, 'BTS', 'Basta', 0, 2),
(258, 'BYSA', 'Basulya Sutahata', 0, 2),
(259, 'BVA', 'Bauria', 0, 2),
(260, 'BLDA', 'Belda', 0, 2),
(261, 'BPE', 'Benapur', 0, 2),
(262, 'BTQ', 'Betnoti', 0, 2),
(263, 'VZR', 'Bhanjpur', 0, 2),
(264, 'BOP', 'Bhogpur', 0, 2),
(265, 'BSBP', 'Bir Shibpur', 0, 2),
(266, 'BWO', 'Buramara', 0, 2),
(267, 'CKU', 'Chakulia', 0, 2),
(268, 'CGA', 'Chengel', 0, 2),
(269, 'CHGA', 'Chirugoda', 0, 2),
(270, 'CNT', 'Contai Road', 0, 2),
(271, 'DKB', 'Dakshin Bari', 0, 2),
(272, 'DNI', 'Dansi', 0, 2),
(273, 'DNT', 'Dantan', 0, 2),
(274, 'DSNR', 'Dasnagar', 0, 2),
(275, 'DSPN', 'Deshapran P.H.', 0, 2),
(276, 'DTE', 'Deulti', 0, 2),
(277, 'DVM', 'Dhalbhumgarh', 0, 2),
(278, 'DGHA', 'Digha', 0, 2),
(279, 'DJR', 'Domjur', 0, 2),
(280, 'DMJR', 'Domjur Road', 0, 2),
(281, 'DUAN', 'Duan', 0, 2),
(282, 'DZKT', 'Durga Chak Town', 0, 2),
(283, 'DZK', 'Durgachak', 0, 2),
(284, 'GUD', 'Galudih', 0, 2),
(285, 'GTS', 'Ghatsila', 0, 2),
(286, 'GGTA', 'Ghoraghata', 0, 2),
(287, 'GII', 'Gidhni', 0, 2),
(288, 'GMDN', 'Girimaidan', 18, 2),
(289, 'GKL', 'Gokulpur', 17, 2),
(290, 'GVDP', 'Govindpur PH', 0, 2),
(291, 'HLZ', 'Haldia', 0, 2),
(292, 'HIP', 'Haldipada', 0, 2),
(293, 'HDC', 'Harishdadpur P.H.', 0, 2),
(294, 'HAUR', 'Haur', 0, 2),
(295, 'HEN', 'Henria P.H.', 0, 2),
(296, 'HIJ', 'Hijli', 0, 2),
(297, 'JPR', 'Jakpur', 0, 2),
(298, 'JLI', 'Jalasi P.H', 0, 2),
(299, 'JER', 'Jaleswar', 0, 2),
(300, 'JSE', 'Jamsole', 0, 2),
(301, 'JLBR', 'Jhaluarbar', 0, 2),
(302, 'JGM', 'Jhargram', 0, 2),
(303, 'JOL', 'Jogal', 0, 2),
(304, 'JRG', 'Jagpura', 0, 2),
(305, 'KNM', 'Kanimahuli', 0, 2),
(306, 'KATI', 'Kanthi (Contai)', 0, 2),
(307, 'KSBP', 'Keshabpur', 0, 2),
(308, 'KHF', 'Khantapara', 0, 2),
(309, 'KGP', 'Kharagpur Junction', 19, 2),
(310, 'KATB', 'Khatkura', 0, 2),
(311, 'KSO', 'Khemasuli', 0, 2),
(312, 'KHAI', 'Khirai', 0, 2),
(313, 'KKPR', 'Kokpara', 0, 2),
(314, 'KIG', 'Kolaghat', 0, 2),
(315, 'SHM', 'Kolkata Shalimar', 0, 2),
(316, 'KONA', 'Kona', 0, 2),
(317, 'KCV', 'Krishnachandrapur', 0, 2),
(318, 'KUCE', 'Kuchai', 0, 2),
(319, 'KGY', 'Kulgachia', 0, 2),
(320, 'LXD', 'Lakshannath Road', 0, 2),
(321, 'LSGS', 'Lavan Satyagrah Smarak P.H.', 0, 2),
(322, 'MPD', 'Madpur', 0, 2),
(323, 'MHLN', 'Mahendralal Nagar', 0, 2),
(324, 'MSDL', 'Mahishadal', 0, 2),
(325, 'MJH', 'Maju P.H.', 0, 2),
(326, 'MDC', 'Makardaha', 0, 2),
(327, 'MKO', 'Markona', 0, 2),
(328, 'MRGM', 'Maurigram', 0, 2),
(329, 'MCA', 'Mecheda', 0, 2),
(330, 'MDN', 'Midnapore', 16, 2),
(331, 'MNH', 'Munsirhat P.H.', 0, 2),
(332, 'NCN', 'Nachinda P.H.', 0, 2),
(333, 'NALR', 'Nalpur', 0, 2),
(334, 'NDGJ', 'Nandaigajan P.H.', 0, 2),
(335, 'NDKR', 'Nandakumar P.H.', 0, 2),
(336, 'NPMR', 'Narayan Pakuria Murail', 0, 2),
(337, 'NYA', 'Narayangarh', 0, 2),
(338, 'NSI', 'Nekurseni', 0, 2),
(339, 'NGRD', 'Nilgiri Road', 0, 2),
(340, 'NMP', 'Nimpura', 0, 2),
(341, 'NPTY', 'Nimpura Through Yard', 0, 2),
(342, 'NMBR', 'Nuagan Mayurbhanj Road', 0, 2),
(343, 'PDPK', 'Padmapukur', 0, 2),
(344, 'PNPN', 'Panpana PH', 0, 2),
(345, 'PKU', 'Panskura Junction', 0, 2),
(346, 'PTHL', 'Pantihal', 0, 2),
(347, 'FLR', 'Phuleswar', 0, 2),
(348, 'RDU', 'Radhamohanpur', 0, 2),
(349, 'RGX', 'Raghunathbari', 0, 2),
(350, 'RJLK', 'Rajalukah', 0, 2),
(351, 'RGT', 'Rajghat', 0, 2),
(352, 'RGA', 'Rajgoda', 0, 2),
(353, 'RHE', 'Rakha Mines', 0, 2),
(354, 'RMRB', 'Ramnagar Bengal', 0, 2),
(355, 'RMJ', 'Ramrajatala', 0, 2),
(356, 'RNTL', 'Ranital', 0, 2),
(357, 'ROP', 'Rupsa Junction', 0, 2),
(358, 'SZZ', 'Sabira', 0, 2),
(359, 'SMTG', 'Saheed Matangini', 0, 2),
(360, 'SEL', 'Sankrail', 0, 2),
(361, 'SRC', 'Santragachi Junction', 0, 2),
(362, 'SUA', 'Sardiha', 0, 2),
(363, 'SSPH', 'Satish Samanta P.H.', 0, 2),
(364, 'SMCK', 'Shyam Chak', 0, 2),
(365, 'STLB', 'Sitalpur', 0, 2),
(366, 'SORO', 'Soro', 0, 2),
(367, 'SJPA', 'Sujalpur', 0, 2),
(368, 'TMZ', 'Tamluk', 0, 2),
(369, 'TKH', 'Thakurtota', 0, 2),
(370, 'TPKR', 'Tikiapara', 0, 2),
(371, 'TKPL', 'Tikirapal Halt', 0, 2),
(372, 'TKRA', 'Tikra P.H.', 0, 2),
(373, 'ULB', 'Uluberia', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `train_id` int(11) NOT NULL,
  `arr_time` time(6) DEFAULT NULL,
  `dept_time` time(6) DEFAULT NULL,
  `duration` time NOT NULL,
  `days` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `train_id`, `arr_time`, `dept_time`, `duration`, `days`) VALUES
(1, 1, '06:00:00.482000', '09:00:00.716000', '00:00:00', 'Monday'),
(2, 2, '09:10:00.591000', '12:10:00.478000', '00:00:00', 'Tuesday'),
(3, 3, '12:10:00.020000', '03:10:00.634000', '00:00:00', 'Friday'),
(4, 4, '04:30:54.840000', '07:35:54.230000', '00:00:00', 'Thursday'),
(5, 5, '20:35:54.000000', '11:35:54.013000', '00:00:00', 'Saturday'),
(6, 6, '04:30:54.840000', '07:35:54.230000', '00:00:00', 'Thursday'),
(7, 7, '20:35:54.000000', '11:35:54.013000', '00:00:00', 'Saturday'),
(8, 8, '04:00:06.966000', '07:00:06.756000', '00:00:00', 'Sunday'),
(9, 9, '10:30:06.582000', '01:30:06.626000', '00:00:00', 'Wednesday'),
(10, 10, '04:00:06.966000', '07:00:06.756000', '00:00:00', 'Sunday'),
(11, 11, '10:30:06.582000', '01:30:06.626000', '00:00:00', 'Wednesday');

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

CREATE TABLE `trains` (
  `id` int(11) NOT NULL,
  `train_num` int(11) NOT NULL,
  `train_name` varchar(255) NOT NULL,
  `schedule_from` varchar(128) NOT NULL,
  `schedule_to` varchar(128) NOT NULL,
  `distance` float NOT NULL,
  `division_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`id`, `train_num`, `train_name`, `schedule_from`, `schedule_to`, `distance`, `division_id`) VALUES
(1, 12151, 'Samarsata SF Express', '1', '19', 168, 1),
(2, 12949, 'Santragachi Kavi Guru SF Express', '1', '19', 168, 1),
(3, 18004, 'Rani Shiromoni Express', '1', '19', 168, 1),
(4, 12828, 'Howrah SF Express', '1', '19', 168, 1),
(5, 13506, 'Asansol Digha Express', '1', '19', 168, 1),
(6, 22330, 'Haldia SF Express', '1', '19', 168, 1),
(7, 18628, 'Howrah Intercity Express', '1', '19', 168, 1),
(8, 12886, 'Aranyak Express', '1', '19', 168, 1),
(9, 12884, 'Rupasi Bangla Express', '1', '19', 168, 1),
(10, 13418, 'Digha Express', '1', '19', 168, 1),
(11, 12102, 'Jananeswari Exp', '19', '21', 197, 2),
(12, 12860, 'Gitanjali Exp', '19', '21', 197, 2),
(13, 22170, 'RKMP Humsafar', '19', '21', 197, 2),
(14, 18005, 'Sambaleswari Exp', '19', '21', 197, 2),
(15, 12130, 'Azad Hind Exp', '19', '21', 197, 2),
(16, 22861, 'KBJ Ispat Exp', '19', '21', 197, 2),
(17, 22894, 'HWH SNSI Exp', '19', '21', 197, 2),
(18, 18030, 'SHM LTT Exp', '19', '21', 197, 2),
(19, 22169, 'SRC Humsafar', '21', '19', 197, 3),
(20, 12905, 'Shalimar SF Exp', '21', '19', 197, 3),
(21, 18006, 'JDB HWH Exp', '21', '19', 197, 3),
(22, 22829, 'BHUJ SHM Exp', '21', '19', 197, 3),
(23, 12872, 'TIG Ispat Exp', '21', '19', 197, 3),
(24, 12833, 'ADI HWH Exp', '21', '19', 197, 3),
(25, 13301, 'Subarnarekha Exp', '1', '20', 130, 1),
(26, 18615, 'Kriya Yoga Exp', '19', '27', 270, 4),
(27, 22891, 'RNC SF Exp', '19', '27', 270, 4),
(28, 18627, 'Intercity Exp', '1', '27', 165, 4),
(29, 18011, 'HWH CKP EXP', '1', '21', 155, 1);

-- --------------------------------------------------------

--
-- Table structure for table `train_class`
--

CREATE TABLE `train_class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `train_id` int(11) NOT NULL,
  `total_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train_class`
--

INSERT INTO `train_class` (`class_id`, `class_name`, `train_id`, `total_seats`) VALUES
(1, 'First Class (FC)', 0, 7),
(2, 'AC First Class (1AC)', 0, 7),
(3, 'AC 2 Tier (2A)', 0, 7),
(4, 'AC 3 Tier (3A)', 0, 7),
(5, 'AC Chair Car (CC)', 0, 7),
(6, 'Sleeper (SL)', 0, 7),
(7, 'Exec. Chair Car (EC)', 0, 7),
(8, 'Second Sitting (2S)', 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `train_quota`
--

CREATE TABLE `train_quota` (
  `quota_id` int(11) NOT NULL,
  `quota_name` varchar(255) NOT NULL,
  `train_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train_quota`
--

INSERT INTO `train_quota` (`quota_id`, `quota_name`, `train_id`, `class_id`) VALUES
(1, 'General', 0, 0),
(2, 'Ladies', 0, 0),
(3, 'Lower Berth/Sr. Citizen', 0, 0),
(4, 'Person with Disability', 0, 0),
(5, 'Tatkal', 0, 0),
(6, 'Pregnant Women', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `train_seats`
--

CREATE TABLE `train_seats` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `train_id` int(11) NOT NULL,
  `seat_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(128) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `gender` varchar(128) NOT NULL,
  `date_of_birth` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `phone` int(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `aadhar` int(11) NOT NULL,
  `pan` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pin_code` int(11) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `m_name`, `l_name`, `gender`, `date_of_birth`, `phone`, `email`, `aadhar`, `pan`, `address`, `city`, `state`, `pin_code`, `password`) VALUES
(3, 'Krishnendu', '', 'Nanda', '1', '2023-03-22 18:30:00', 2147483647, 'krishnendu@gmail.com', 2147483647, 'thyg445456', 'Uttar Pithulia', 'Contai', '28', 721452, 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_profile`
--
ALTER TABLE `admin_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`division_id`);

--
-- Indexes for table `stops`
--
ALTER TABLE `stops`
  ADD PRIMARY KEY (`stop_id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `train_class`
--
ALTER TABLE `train_class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `train_quota`
--
ALTER TABLE `train_quota`
  ADD PRIMARY KEY (`quota_id`);

--
-- Indexes for table `train_seats`
--
ALTER TABLE `train_seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_profile`
--
ALTER TABLE `admin_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `division_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stops`
--
ALTER TABLE `stops`
  MODIFY `stop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3933;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `trains`
--
ALTER TABLE `trains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `train_class`
--
ALTER TABLE `train_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `train_quota`
--
ALTER TABLE `train_quota`
  MODIFY `quota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `train_seats`
--
ALTER TABLE `train_seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
