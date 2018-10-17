-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 25, 2018 at 06:55 AM
-- Server version: 5.6.40-log
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tdbangar_tdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minimum_balance` decimal(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`, `minimum_balance`, `created_at`, `updated_at`) VALUES
(1, 'Yogyakarta', 1500000.00, '2018-02-12 09:13:50', NULL),
(2, 'Medan', 1500000.00, '2018-02-12 09:13:50', NULL),
(3, 'Pekanbaru', 1500000.00, '2018-02-12 09:13:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `identity_no` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthplace` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subinstitution_id` int(11) DEFAULT NULL,
  `customer_type` enum('individual','organization') COLLATE utf8mb4_unicode_ci NOT NULL,
  `corporate_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion_id` int(10) UNSIGNED NOT NULL,
  `sex` enum('F','M') COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerAvatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `identity_no`, `fullname`, `birthplace`, `birthdate`, `address`, `city`, `subinstitution_id`, `customer_type`, `corporate_name`, `religion_id`, `sex`, `phone_number`, `customerAvatar`, `created_at`, `updated_at`) VALUES
(9, '1471084703640021', 'SDN 164 Pekanbaru', 'Lubuk alung', '1964-03-07', 'Jl. KARYA NO. 89', 'Pekanbaru', NULL, 'organization', 'SD NEGERI 164 Pekanbaru', 3, 'F', '081275398999', NULL, '2018-03-18 19:10:57', '2018-08-13 01:54:32'),
(37, '10495042', 'SMPN 34 PEKANBARU', 'PEKANBARU', '2008-02-06', 'JL. KARTAMA NO. 68', 'PEKANBARU', NULL, 'organization', 'SMP NEGERI 34 PEKANBARU', 3, 'F', '081374643978', NULL, '2018-04-09 21:25:24', '2018-08-13 01:54:58'),
(39, '1403095909910002', 'SDIT Insan Utama 2', 'Pekanbaru', '2014-01-01', 'Jl. ikhlas/Karya', 'Pekanbaru', NULL, 'organization', 'SDIT Insan Utama 2', 3, 'F', '081268651140', NULL, '2018-04-11 09:54:19', '2018-05-02 07:47:34'),
(40, '45754754', 'rhgfh75457rtertrt', 'thrjeryj', '2008-11-03', 'skjdgsdhfgsdfhsdfhkjsdfkh dsfhsjdfhdfhsgh', 'gjhfgjdfjg', NULL, 'individual', 'YAYASAN PENDIDIKAN GEREJA METHODIST INDONESIA', 5, 'M', '9834758943728956738496nj2y48u652j46y267846j2y478462465j2y46524652465', NULL, '2018-04-13 02:46:20', '2018-09-25 03:33:35'),
(41, '10494605', 'SD METHODIST PEKANBARU', 'PEKANBARU', '2002-06-27', 'Jalan Karya Agung (Riau Ujung) No. 8 Kelurahan Air Hitam Kecamatan Payung Sekaki', 'Pekanbaru', NULL, 'organization', 'YAYASAN PENDIDIKAN GEREJA METHODIST INDONESIA', 5, 'M', '081268656555', NULL, '2018-04-13 02:50:02', '2018-04-13 02:50:02'),
(42, '1471095505650082', 'SDN 158 Pekanbaru', 'Kampar', '1965-05-15', 'Jl pattimura pekanbaru', 'Pekanbaru', NULL, 'organization', 'SDN 158 PEKANBARU', 3, 'F', '081266957017', NULL, '2018-04-17 05:23:38', '2018-08-13 01:55:13'),
(43, '1471074709910042', 'SMP IT Insan Utama 2 RENI RAHMI', 'PEKANBARU', '1991-09-07', 'Jln fajar sari', 'Prkanbaru', NULL, 'organization', 'SMP IT INSAN UTAMA 2', 3, 'F', '085265427331', NULL, '2018-04-18 00:42:20', '2018-05-02 07:48:36'),
(44, '1471095404750041', 'DEDDY ANNA S', 'TARUTUNG', '1975-04-14', 'JL. PALA V UJUNG NO.40', 'PEKANBARU', NULL, 'individual', NULL, 5, 'F', '08127625736', NULL, '2018-04-30 02:15:18', '2018-04-30 02:15:18'),
(45, '2000610', 'SMPN 16 Pekanbaru', 'KUALA MANDAH', '1964-07-22', 'JL.CEMPAKA', 'PEKANBARU', NULL, 'organization', 'SMPN 16 PEKANBARU', 3, 'F', '08127584367', NULL, '2018-04-30 04:01:38', '2018-08-13 01:55:33'),
(46, '10495041', 'SMPN 33 Pekanbaru', 'Solok', '1967-10-21', 'Jl.  SM Amin', 'Pekanbaru', NULL, 'organization', 'SMP Negeri 33 Pekanbaru', 3, 'F', '08127557807', NULL, '2018-05-02 00:18:18', '2018-08-13 01:55:47'),
(47, '1407051805870001', 'SMP Islam Plus Jannatul', 'Torgamba', '1988-06-19', 'Jalan Pembina No 109 Rumbai Pesisir', 'Pekanbaru', NULL, 'organization', 'SMP Islam Plus Jannatul', 3, 'M', '081270551437', NULL, '2018-05-09 04:13:31', '2018-09-05 07:28:08'),
(48, '1234567890', 'Mama Risna', 'Pekanbaru', '1990-12-05', 'Jl.Bhakti', 'Pekanbaru', NULL, 'individual', NULL, 5, 'F', '081234567890', '1526631446.jpg', '2018-05-18 08:11:55', '2018-05-18 08:17:26'),
(49, '1471014409780021', 'SMAN 7 Pekanbaru', 'pasir pengaraian', '2018-09-04', 'Jl.Kapur III Senapelan', 'Pekanbaru', NULL, 'organization', 'SMA Negeri 7 Pekanbaru', 3, 'F', '081365584627', NULL, '2018-05-23 05:29:59', '2018-08-13 01:56:02'),
(51, '1213132101870001', 'SMP Islam Plus Jannatul Firdaus', 'Ampung Julu', '1987-01-21', 'Jalan Pembina No. 109 RT 03 RW 06', 'Pekanbaru', NULL, 'organization', 'SMP Islam Plus Jannatul Firdaus (Islamic Boarding School)', 3, 'M', '082172556070', '1527224189.jpg', '2018-05-25 01:51:02', '2018-09-05 07:29:01'),
(52, '1471082707880005', 'Riky Hermanda (VIII.6 Binsus 3)', 'Pekanbaru', '1988-07-27', 'Jl. Bangun Karya Gg. Bangun III No.138 Panam', 'Pekanbaru', NULL, 'individual', NULL, 3, 'M', '085265505470', NULL, '2018-05-25 07:00:10', '2018-05-25 07:00:10'),
(53, '7.4', 'Kelas 7.4', 'Pekanbaru', '2017-07-10', 'Jalan pelajar', 'Pekanbaru', NULL, 'individual', NULL, 3, 'F', '085271719267', NULL, '2018-05-25 12:50:28', '2018-05-25 12:50:28'),
(54, '1471116511890021', 'Noviarini(VII.1)', 'Pekanbaru', '1989-11-26', 'Jl. Fajar ujung gg.temu', 'Pekanbaru', NULL, 'individual', NULL, 3, 'F', '085278921154', NULL, '2018-05-26 02:37:15', '2018-05-26 02:37:15'),
(55, '1407036107930001', 'Lestia Pratiwi (Kelas 7.7 Binsus _ 4)', 'Sedinginan', '1993-07-21', 'Jl.tiung no 2A sukajadi', 'Pekanbaru', NULL, 'individual', NULL, 3, 'F', '085355413145', NULL, '2018-05-26 07:19:28', '2018-05-26 07:19:28'),
(56, '1471110106910023', 'Agung Saputra', 'Pekanbaru', '1991-06-01', 'Jl.amal mulia', 'Pekanbaru', NULL, 'individual', NULL, 3, 'M', '085271096100', NULL, '2018-05-27 06:01:49', '2018-05-27 06:01:49'),
(57, '10404106', 'SDN 25 Pekanbaru', 'Pekanbaru', '1964-12-31', 'Jl. Khayangan Rumbai Pesisir', 'Pekanbaru', NULL, 'organization', 'Dinas Pendidikan', 3, 'F', '(0761) 554845', NULL, '2018-05-31 04:16:30', '2018-05-31 04:16:30'),
(61, '7371125103860011', 'Ninda elika', 'Aceh', '1986-03-11', 'Jl sekuntum raya perum nuansa griya flamboyan blok F18', 'Pekanbaru', NULL, 'individual', NULL, 3, 'F', '082131350287', NULL, '2018-07-06 03:30:19', '2018-07-06 03:30:19'),
(62, '1471086703650002', 'SDN 161 Pekanbaru', 'Tanjung Pinang', '1965-03-27', 'Jl. Surian Komp. Beringin Indah', 'Pekanbaru', NULL, 'organization', 'SD Negeri 161 Pekanbaru', 3, 'F', '081371347023', NULL, '2018-07-11 03:45:31', '2018-08-13 01:56:44'),
(63, '1407021903950002', 'Randy Lorena Candra', 'Bagansiapiapi', '1995-03-19', 'Jalan Duyung', 'Pekanbaru', NULL, 'individual', NULL, 3, 'M', '082283784119', NULL, '2018-07-11 14:03:03', '2018-07-11 14:03:03'),
(64, '1401066404710003', 'RATNA DEWI RAPELITA', 'PEKANBARU', '1971-04-24', 'PASIR PUTIH', 'PEKANBARU', NULL, 'individual', NULL, 5, 'F', '081268603436', NULL, '2018-07-16 02:56:14', '2018-07-16 02:56:14'),
(65, '100', 'SDN 100 Pekanbaru', 'Pekanbaru', '0000-00-00', 'jl. Lili No. 18 Sukajadi', 'Pekanbaru', NULL, 'organization', 'SDN 100 Pekanbaru', 3, 'F', '08127640530', NULL, '2018-07-18 00:22:28', '2018-07-18 00:22:28'),
(66, '1471095805730003', 'SDN 143 Pekanbaru', 'Pekanbaru', '1973-05-18', 'Jl. Taskurun No. 41', 'Pekanbaru', NULL, 'organization', 'SD Negeri 143 Pekanbaru', 3, 'F', '082392117761', NULL, '2018-07-18 03:59:42', '2018-08-13 01:57:12'),
(68, '1471094107770061', 'MTs Masmur Pekanbaru', '01 juli 1977', '1977-07-01', 'JL.KERETA  API NO.126 TANGKERANG TENGAH  RT.001 RW.006  TANGKERANG TENGAH', 'PEKANBARU', NULL, 'organization', 'MTs.Masmur', 3, 'F', '085278831563', NULL, '2018-07-19 01:58:47', '2018-08-13 01:57:33'),
(70, '123', 'SMK N 2 PEKANABARU', 'PEKANBARU', '1996-10-01', 'JL.PATIMURA NO 14', 'PEKANBARU', NULL, 'organization', 'SMK N 2 PEKANBARU', 3, 'M', '085274535099', NULL, '2018-07-20 08:29:31', '2018-07-20 08:29:31'),
(71, '10496496', 'SMA Al-Azhar Pekanbaru', 'Ampang', '1984-08-21', 'Jl.Taman Karya', 'Pekanbaru', NULL, 'organization', 'SMA Al Azhar Syifa Budi Pku II', 3, 'F', '085363874683', NULL, '2018-07-24 02:51:28', '2018-08-13 01:58:00'),
(72, '0803120482', 'SMPIT Madani Pekanbaru', 'PULAU RAMBAI', '2018-07-24', 'Jl. Bangau Sakti, Gang Pipit, Panam', 'Pekanbaru', NULL, 'organization', 'SMPIT MADANI', 3, 'M', '08117673738', NULL, '2018-07-24 06:42:17', '2018-08-13 01:58:39'),
(73, '1401160410850003', 'PON-PES NURUL HUDA (Imam Nawawi)', 'NGAWI', '1985-04-10', 'JL HANDAYANI NO 25 MARPOYAN DAMAI', 'PEKANBARU', NULL, 'organization', 'MA MIFTAHUL HIDAYAH', 3, 'M', '085264988505', NULL, '2018-08-01 02:54:08', '2018-09-17 03:33:52'),
(74, '10404122', 'SDN 18 Pekanbaru', 'Kampar', '1967-12-25', 'Jl. Kulim No. 73 Kec. Senapelan', 'Pekanbaru', NULL, 'organization', 'SD NEGERI 18 PEKANBARU', 3, 'F', '081371181424', NULL, '2018-08-02 04:24:12', '2018-08-13 01:54:09'),
(77, '1234095789023478', 'hasby hak', 'simpang baru', '1999-02-06', 'sukajadi', 'minas', NULL, 'individual', NULL, 1, 'M', '082398006570', NULL, '2018-08-07 10:23:16', '2018-08-07 10:23:16'),
(78, '1471034308750001', 'israwati', 'PEKANBARU', '1975-08-03', 'jl. s.parman', 'Pekanbaru', NULL, 'individual', NULL, 3, 'F', '085375255308', NULL, '2018-08-09 09:52:53', '2018-08-09 09:52:53'),
(79, '1471073003780001', 'SDN 83 Pekanbaru', 'Pekanbaru', '1984-04-15', 'Jl. Pontianak No. 8 Tangkerang Utara', 'Pekanbaru', NULL, 'organization', 'SD Negeri 83 Pekanbaru', 3, 'F', '081261289494', NULL, '2018-08-13 00:24:38', '2018-08-13 01:53:45'),
(80, '69899645', 'SDN 192 Pekanbaru', 'KAYU ARO', '1977-02-01', 'JL. TELADAN', 'PEKANBARU', NULL, 'organization', 'SDN 192 PEKANBARU', 3, 'F', '081365250274', NULL, '2018-08-14 02:37:01', '2018-08-14 09:28:12'),
(81, '54457457457', 'dfghgdfgh', 'dfghdfghdfgh', '1978-08-22', 'dfjghgjghj', 'dfjgghjghj', NULL, 'individual', 'SD NEGERI 94 PEKANBARU', 3, 'F', '34644444444444444444444444444444444444444444444444444444444444444444444444455455555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555', '1537846822.png', '2018-08-16 03:40:18', '2018-09-25 03:40:22'),
(82, '1402060310940001', 'WAHYU NURHALIM', 'INDRAGIRI HULU', '1994-10-03', 'TITIAN RESAK', 'Pekanbaru', NULL, 'individual', NULL, 3, 'M', '082170407501', NULL, '2018-08-18 23:38:15', '2018-08-18 23:38:15'),
(84, '', 'dfhfdhdfh', 'dfhdfhgf', '1960-10-28', 'jhfgjsdghsdg jkdshgjdfnjgkds gjdbsg dfjdsjbgjsdg djf', 'fhgfhgfhgfh', NULL, 'organization', 'fdhd', 4, 'M', '76767676767676767676666666666666666666666666666666666666777777777777777777777777777777777777', '1537850429.php', '2018-08-23 03:40:30', '2018-09-25 04:40:29'),
(85, '1223011612860005', 'SD BABUSSALAM', 'Sonomartani', '1986-12-16', 'Jl.  Garuda Sakti Km2', 'Pekanbaru', NULL, 'individual', 'SD BABUSSALAM PEKANBARU', 3, 'M', '081371618991', '1536900051.JPG', '2018-08-24 04:20:39', '2018-09-14 04:40:51'),
(88, '1471102709840001', 'SMPIT ALFIKRI IGS', 'Pekanbaru', '1984-08-27', 'Jl. Melur panam', 'Pekanbaru', NULL, 'organization', 'Smpit Alfikri IGS pekanbaru', 3, 'M', '085211768236', NULL, '2018-08-30 04:24:41', '2018-08-31 02:59:25'),
(89, '1471015802740001', 'SMPN 40', 'Pekanbaru', '1974-02-18', 'Jl.Rajawali GG.Anggrek No.61', 'Pekanbaru', NULL, 'organization', 'SMP Negeri 40 Pekanbaru', 3, 'F', '085265891551', NULL, '2018-09-05 03:04:24', '2018-09-05 07:21:04'),
(92, '3174020206860002', 'P.A Asshohwah', 'Jakarta', '1986-06-02', 'Merpatisakti', 'Pekanbaru', NULL, 'organization', 'Panti asuhan ashsohwa', 3, 'M', '081276842838', NULL, '2018-09-06 03:48:06', '2018-09-06 08:09:35'),
(93, '1471116702750001', 'SMPN 3    (Hj. Nurazmi,M.Pd.I)', 'Dalu dalu', '1975-02-27', 'Jl dahlia no 102', 'Pekanbaru', NULL, 'organization', 'SMP Negeri 3 Pekanbaru', 1, 'F', '085213846463', NULL, '2018-09-06 08:18:46', '2018-09-06 08:45:29'),
(94, '10404031', 'SMAN 9 PKU     (ANDRIKA YENI)', 'RANTAU BAIS', '1983-02-27', 'Jl. Semeru No. 12', 'Pekanbaru', NULL, 'organization', 'SMAN 9 PEKANBARU', 3, 'F', '085364603298', NULL, '2018-09-06 08:37:28', '2018-09-06 08:40:52'),
(97, '1471084106180121', 'SMPN 8 Pekanbaru', 'PEKANBARU', '0000-00-00', 'JL. ADI SUCIPTO NO. 115 PEKANBARU', 'PEKANBARU', NULL, 'organization', 'SMP NEGERI 8 PEKANBARU', 3, 'F', '081371026111', NULL, '2018-09-12 01:24:28', '2018-09-12 01:38:32'),
(99, 'fdgfsgf', 'sdfgdsgsdfg', 'fgsdfg', '2175-02-16', 'sdfgsdfh gdshajkdsfgasdf bgdsahfgsadfbgjadsfg ajdhgdf gjadgdfg', 'dhfsghsghdgj', NULL, 'individual', 'gfhgfhgfhdhg', 3, 'M', '08234634635674577878787878787878787878787878787878787878787878787878787878787878787878787878787878787878787878787878787878787878787878787878787878787878787878787878787878787878787878787878jkg', NULL, '2018-09-17 05:33:42', '2018-09-25 03:29:12'),
(100, '1802180111900001', 'Novian mahardika putra', 'Lampung', '1990-11-01', 'Jl Matematika', 'Yogyakarta', NULL, 'individual', NULL, 3, 'M', '085664261032', NULL, '2018-09-18 13:32:02', '2018-09-18 13:32:02'),
(102, '2007', 'SMKN 6 Pekanbaru', 'Pekanbaru', '2007-05-09', 'Jl. Seroja kel. Sialang rampai. Kec tenayan raya pekanbaru', 'Pekanbaru', NULL, 'organization', 'Smkn6pekanbaru', 3, 'M', '08121506600', NULL, '2018-09-19 03:50:11', '2018-09-19 07:09:20'),
(103, '1471114505870021', 'SD Muhammadiyah 3 Unggul', 'Pekanbaru', '1987-05-05', 'Jl. Palapa ujung', 'Pekanbaru', NULL, 'organization', 'SD MUHAMMADIYAH 3 UNGGULAN PEKANBARU', 3, 'F', '081268810020', NULL, '2018-09-19 06:36:51', '2018-09-19 07:13:24'),
(104, '081365961717', 'SDIT INSAN UTAMA 1', 'Manganti', '1982-08-17', 'Jl. Handayani II No. 88, Kel. Perhentian Marpuyan, Kec. Marpoyan Damai', 'Pekanbaru', NULL, 'organization', 'SDIT Insan Utama', 3, 'F', '085237712200', NULL, '2018-09-19 07:36:42', '2018-09-19 08:10:37'),
(105, '10404041', 'SMP BABUSSALAM PEKANBARU', 'Pekanbaru', '1985-07-08', 'Jl. HR. Soebrantas No. 62 Pekanbaru', 'Pekanbaru', NULL, 'organization', 'SMP BABUSSALAM', 3, 'M', '081371040204', NULL, '2018-09-21 03:45:52', '2018-09-21 03:45:52'),
(106, '10', 'SMA Negeri 10', 'Jl. Bukit Barisan', '2018-09-13', 'Jl. Bukit Barisan', 'PEKANBARU', NULL, 'organization', 'SMAN 10', 3, 'F', '08127693625', NULL, '2018-09-21 05:24:50', '2018-09-21 05:24:50'),
(114, '1471114501780021', 'Imrawati Azwar, S.Sos.I,MM', 'Pekanbaru', '1978-01-05', 'Jl.Baiturrahman No.11', 'Pekanbaru', NULL, 'organization', 'SD Muhammadiyah 3 Unggulan Pekanbaru', 3, 'F', '085356728773', NULL, '2018-09-24 07:11:42', '2018-09-24 07:11:42'),
(115, '1471114501780021', 'Imrawati Azwar, S.Sos.I,MM', 'Pekanbaru', '1978-01-05', 'Jl.Baiturrahman No.11', 'Pekanbaru', NULL, 'organization', 'SD Muhammadiyah 3 Unggulan Pekanbaru', 3, 'F', '085356728773', NULL, '2018-09-24 07:46:31', '2018-09-24 07:46:31'),
(116, 'hsgdhfsgfdsgdg', 'sdgsdfgsdgsdfg', 'sdfgfdgdsfgsdfg', '2018-09-04', 'kjgsdfjkdsaghfjsghadjkfjasdfasdfasdf', 'kjsghdkjdfjhgjkfdg', NULL, 'individual', 'hjgsdfsdagjksdjkhasdkjgasdfgfdg', 3, 'M', '5444444455599999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999', '1537853455.png', '2018-09-25 05:00:51', '2018-09-25 05:30:55'),
(117, '45647547', 'dfghfgjfjg', 'djhdghjdghj', '1998-09-16', 'dfjgdfdfhdghjhgjghj', 'dfjgdfhjgdhjdghj', NULL, 'organization', 'dfjggdfjhj', 3, 'M', '5444444455599999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999', '1537855065.php', '2018-09-25 05:07:05', '2018-09-25 05:57:45');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`) VALUES
(1, 'Owner'),
(2, 'Cashier');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount_unit` decimal(20,2) NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `transaction_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthplace` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL,
  `sex` enum('M','F') COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employeeAvatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_no`, `fullname`, `birthplace`, `birthdate`, `address`, `city_id`, `division_id`, `sex`, `phone_number`, `employeeAvatar`, `created_at`, `updated_at`) VALUES
(1, '829301820282', 'Administrator (Yogyakarta)', 'New York', '1989-07-09', '123 New York Street', 1, 2, 'M', '01012020291', 'tdb.png', '2018-02-12 09:13:50', '2018-02-12 09:13:50'),
(2, '1111102292929', 'Administrator (Pekanbaru)', 'New Orleans', '1979-07-09', '123 New Orleans Street', 3, 2, 'M', '020101019299', 'tdb.png', '2018-02-12 09:13:50', '2018-02-12 09:13:50'),
(4, '01010101010101', 'User Owner', 'Sumatera', '1980-07-10', '123 New Jersey Street', 1, 1, 'F', '080808080808', 'tdb.png', '2018-02-12 09:13:50', '2018-02-12 09:13:50'),
(5, '01010101010101', 'User Cashier', 'Sumatera', '1989-07-10', '123 New Jersey Street', 1, 2, 'F', '080808080808', 'tdb.png', '2018-02-12 09:13:50', '2018-02-12 09:13:50'),
(6, '1409035711950003', 'Uswatun Khasanah', 'Lampung', '1995-11-17', 'Jl. Poros RT 008/RW 003 Sumber Datar, Singingi, Kuantan Singingi', 3, 2, 'F', '082390308197', 'tdb.png', '2018-04-10 08:26:00', '2018-04-10 08:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploaded_employee_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `description`, `path`, `uploaded_employee_id`, `created_at`, `updated_at`) VALUES
(23, 'Bukber Dengan Anak Panti Asuhan YLBMI', 'Dengan menabung sampah kita bisa berbagi dengan anak - anak panti asuhan pada acara Buka Bersama tahun ini.', '/public/uploads/69abe0113e7628d1f289a3d427f18b26af71af9f.jpg', 4, '2018-07-02 07:17:35', '2018-07-02 07:34:53'),
(24, 'Meeting UR', 'Pertemuan dengan pihak BEM UR mengenai Bank Sampah TDB', '/public/uploads/9d564298b40f2bf63b454fc2603662d31b16c9e5.jpg', 4, '2018-07-02 07:23:00', '2018-07-02 07:23:00'),
(25, 'MoU SDIT 2 Insan Utama', 'Terimakasih kepada SDIT 2 Insan Utama yang telah bergabung dengan kami', '/public/uploads/5324df067abebfba03f1b219e47d79f67eee8900.jpg', 4, '2018-07-02 07:33:43', '2018-07-02 07:33:43'),
(26, 'MoU SDN 13 Pekanbaru', 'Terimakasih kepada SDN 13 Pekanbaru yang telah bergabung dengan kami', '/public/uploads/18cb7e39b58172cb9bad5fb34d5a02ffc4bb7509.jpg', 4, '2018-07-02 07:40:07', '2018-07-02 07:40:50'),
(27, 'MoU SDN 14 Pekanbaru', 'Terimakasih kepada SDN 14 Pekanbaru yang telah bergabung dengan kami', '/public/uploads/e82cbfc7ea055e08b69ef98dafd1c88872e7aec7.jpg', 4, '2018-07-02 07:43:01', '2018-07-02 07:43:01'),
(28, 'MoU SDN 18 Pekanbaru', 'Terimakasih kepada SDN 18 Pekanbaru yang telah bergabung dengan kami', '/public/uploads/f6fcf260445c9654382994f5ea2d0f6f64c73a77.jpg', 4, '2018-07-02 07:46:43', '2018-07-02 07:46:43'),
(29, 'MoU SDIT 1 Insan Utama', 'Terimakasih kepada SDIT 1 Pekanbaru yang telah bergabung dengan kami', '/public/uploads/b29483e5c4be74b600052de8e85c26954a92039c.jpg', 4, '2018-07-02 07:48:33', '2018-07-02 07:48:33'),
(30, 'MoU SDN 25 Pekanbaru', 'Terimakasih kepada SDN 25 Pekanbaru yang telah bergabung dengan kami', '/public/uploads/cc971672da95e813baa0b601bab648c55265bd3f.jpg', 4, '2018-07-02 07:51:17', '2018-07-02 07:51:17'),
(31, 'Sosialisasi di SDN 54 Pekanbaru', 'Tim TDB sedang mensosialisasikan Bank Sampah kepada Siswa/i SDN 54 Pekanbaru', '/public/uploads/9d3b3f00ebb12f212709995bfa5f4a48d3f8f42f.jpg', 4, '2018-07-02 07:59:46', '2018-07-02 07:59:46'),
(32, 'MoU SDN 54 Pekanbaru', 'Terimakasih kepada SDN 54 Pekanbaru yang telah Menjadi Nasabah Kami', '/public/uploads/f3a96455a225ca8f4ec4a6ef74e3622821e053b6.jpg', 4, '2018-07-02 08:03:19', '2018-07-02 08:03:19'),
(33, 'MoU SDN 83 Pekanbaru', 'Terimakasih kepada SDN 83 Pekanbaru yang telah Menjadi Nasabah Kami', '/public/uploads/883cd6620ab7e42d14d7a6abc567b8a75defe128.jpg', 4, '2018-07-02 08:05:25', '2018-07-02 08:05:25'),
(34, 'MoU SDN 18 Pekanbaru', 'Tim TDB sedang mensosialisasikan Bank Sampah kepada Siswa/i SDN 158Pekanbaru', '/public/uploads/ff49ca4acc1161a27f7451294d4e88645db3b414.jpg', 4, '2018-07-02 08:06:54', '2018-07-02 08:06:54'),
(35, 'Mou di SDN 158 Pekanbaru', 'Terimakasih kepada kepala sekolah SDN 158 pekanbaru yang telah menjadi nasabah kami', '/public/uploads/0b3ed672adc3753f62c2dc7b2014afc969c617b4.jpg', 4, '2018-07-02 08:09:31', '2018-07-02 08:09:31'),
(36, 'Pemberian Tong Sampah kepada SDN 164 Pekanbaru', 'Semoga dengan  adanya tong sampah ini siswa lebih giat lagi dalam menabung sampah', '/public/uploads/534d48f8ebb56418b532967966b1c1d673622578.jpg', 4, '2018-07-02 08:13:49', '2018-07-02 08:13:49'),
(37, 'MoU SMAN 7 Pekanbaru', 'Terimakasih kepada SDN 83 Pekanbaru yang telah Menjadi Nasabah Kami', '/public/uploads/655a4d568b5639abe0a57dbba87a615eee11387f.jpg', 4, '2018-07-02 08:16:02', '2018-07-02 08:16:02'),
(38, 'Sosialisasi di SMAN 7 Pekanbaru', 'Tim TDB sedang mensosialisasikan Bank Sampah kepada Siswa/i SMAN 7 Pekanbaru', '/public/uploads/033baefe6d54e2e71de53223e2974fd691ef80b4.jpg', 4, '2018-07-02 08:17:30', '2018-07-02 08:17:30'),
(39, 'MoU SMAN 9 pekanbaru', 'Terimakasih kepada SMAN 9  Pekanbaru yang telah Menjadi Nasabah Kami', '/public/uploads/b38bbac8c9c2a27fa407aae97ff67f787e13e396.jpg', 4, '2018-07-02 08:22:05', '2018-07-02 08:23:06'),
(40, 'MoU SMKN 2 Pekanbaru', 'Terimakasih kepada SMKN 2 Pekanbaru yang telah Menjadi Nasabah Kami', '/public/uploads/5c35137086e131d1835ffe20062482dd9ff131b1.jpg', 4, '2018-07-02 08:24:06', '2018-07-02 08:24:06'),
(41, 'MoU SMP Muhammadiyah 1 Pekanbaru', 'Terimakasih kepada SMP Muhammadiyah 1 Pekanbaru yang telah Menjadi Nasabah Kami', '/public/uploads/7e82bed6b372e58968256ea94b21ce10326bcc96.jpg', 4, '2018-07-02 08:27:30', '2018-07-02 08:27:30'),
(42, 'MoU SMPN 6 Siak Hulu', 'Terimakasih kepada SMPN 6 Siak Hulu yang telah Menjadi Nasabah Kami', '/public/uploads/122b24f5912a7aa4878b0790b13c1ab9642c1db5.jpg', 4, '2018-07-02 08:29:20', '2018-07-02 08:29:20'),
(43, 'MoU SMPN 8 Pekanbaru', 'Terimakasih kepada SMPN 8 Pekanbaru yang telah Menjadi Nasabah Kami', '/public/uploads/afee149978c9214a7a84ac729c06cc4da3839728.jpg', 4, '2018-07-02 08:30:57', '2018-07-02 08:30:57'),
(44, 'MoU SMPN 16  pekanbaru', 'Terimakasih kepada SMPN 16 Pekanbaru yang telah Menjadi Nasabah Kami', '/public/uploads/5796059be0cd2126ffa3ca83a1fe309f58b3e1c3.jpg', 4, '2018-07-02 08:31:59', '2018-07-02 08:32:23'),
(45, 'Sosialisasi di SMPN 33 Pekanbaru', 'Tim TDB sedang mensosialisasikan Bank Sampah kepada Siswa/i SMPN 33Pekanbaru', '/public/uploads/befc4cd3d7e223293a577572e0ce887c4a1043ce.jpg', 4, '2018-07-02 08:33:40', '2018-07-02 08:33:40'),
(46, 'MoU SMPN 40 Pekanbaru', 'Terimakasih kepada SMPN 40 Pekanbaru yang telah Menjadi Nasabah Kami', '/public/uploads/39251a410d481ace0851f17af726b8009fc757a8.jpg', 4, '2018-07-02 08:34:44', '2018-07-02 08:34:44'),
(47, 'Trip To Sirandah Island', 'Sosialisasi Peduli Sampah kepada pengunjung Pulau Sirandah di Sumatera Barat', '/public/uploads/59c2f3fe20a6c41614cb448ebb9ab77707254ec6.jpg', 4, '2018-07-02 08:41:24', '2018-07-02 08:41:24'),
(48, 'MoU SMPIT MADANI', 'Terimakasih kepada SMPIT MADANI yang telah bergabung dengan kami', '/public/uploads/47d29bcb40de70189dfc62988dafadf75cfa6146.jpg', 4, '2018-07-13 08:28:21', '2018-07-13 08:28:21'),
(49, 'Sosialisasi SDN 164 Pekanbaru', 'Tim TDB sedang mensosialisasikan Bank Sampah kepada Siswa/i SDN 54 Pekanbaru', '/public/uploads/ae180d3c2b4368aa7bbdbf1e5b1c274585a82652.jpg', 4, '2018-07-13 08:29:51', '2018-07-13 08:29:51'),
(50, 'MoU SDN 100 Pekanbaru', 'Terimakasih kepada SDN 100 Pekanbaru yang telah bergabung dengan kami', '/public/uploads/db091dd12150b9c34b7c2334cbe32f6d8f1e0937.JPG', 4, '2018-07-16 07:36:51', '2018-07-16 07:36:51'),
(53, 'MOU SDN 94 Pekanbaru', 'Bersinergi dalam mewujudkan lingkungan ramah anak, serta menangani sampah tepat guna.', '/public/uploads/6aa09271e8e555e9f756d6ed09bf0551fbc6aee4.JPG', 4, '2018-07-24 02:27:00', '2018-07-24 02:27:00'),
(58, 'Kunjungan dari Dinas DLHK Pekanbaru', 'Terimakasih atas kunjungan dari Dinas Lingkungan Hidup dan Kebersihan', '/public/uploads/c815d36495bc6eac4b7402d3b80672d2843fdf30.jpeg', 6, '2018-08-23 09:23:36', '2018-08-23 09:23:36'),
(59, 'HUT  RI 73 Bersama Panti Asuhan Mufariddun', 'Program TDB Mengajar Berbagi keceriaan dengan belajar sambil bermain,.', '/public/uploads/7cb1337735fa2ee80f47de070d2badef1d67f860.jpg', 6, '2018-08-23 09:29:57', '2018-08-23 09:29:57'),
(60, 'Penyerahan Penghargaan Kepada Kepala Sekolah', 'Penyerahan penghargaan berupa Bunga Red Emeral kepada SMKN 2 Pekanbaru dalam kategori Pemilahan Sampah Terbaik\r\ndan Bunga Bromelia Orange kepada SDN 164  Pekanbaru dalam kategori Jumlah Saldo', '/public/uploads/168e691462ce05452ed585762079f94518d617d7.JPG', 6, '2018-08-27 01:50:31', '2018-08-27 01:50:31'),
(61, 'MoU SMP 35 Pekanbaru', 'Terimakasih kepada SMP 32 Pekanbaru yang telah bergabung dengan kami', '/public/uploads/a536d6d16d16a98d5196e47259b4c45bfcfbedd2.JPG', 6, '2018-08-27 01:55:17', '2018-08-27 01:55:17'),
(62, 'Penyerahan Hadiah Kategori Tong Sampah Terbaik di SDN 94 Pekanbaru', 'Semoga dengan adanya tong sampah ini siswa lebih giat lagi dalam menabung sampah', '/public/uploads/350f48f5834ebf90aa5bcb782448df2a2fd8a238.JPG', 6, '2018-08-27 02:01:03', '2018-08-27 02:01:03'),
(63, 'MoU SDN 94 Pekanbaru', 'Terimakasih kepada SDN 94 Pekanbaru yang telah Menjadi Nasabah Kami', '/public/uploads/ca92487dbd7db3ee66bd2be127470598effbe0a8.JPG', 6, '2018-08-27 02:02:01', '2018-08-27 02:02:01'),
(64, 'Kunjungan dari PLN', 'Terimakasih atas kunjungan dari pihak PLN yang bermaksud menjalin kerja sama dengan Bank Sampah TDB, dalam menanggulangi sampah - sampah kering di pekanbaru.\r\nSemoga dengan kerja sama yang te', '/public/uploads/e260c5bdf551f04e3744577bf4aa2180c7080b00.JPG', 6, '2018-08-27 02:06:04', '2018-08-27 02:06:04'),
(65, 'Penyerahan Hadiah  di SDN 158 Pekanbaru', 'Kepedulian kepala sekolah terhadap siswa/siswi yang kurang mampu bersama Bank Sampah TDB', '/public/uploads/3bf986107b6e9421c9b6f588cfd0cd873831c1e5.jpeg', 6, '2018-08-27 04:50:54', '2018-08-27 04:50:54'),
(66, 'Penyerahan Hadiah di SD METODIS', 'Kepedulian kepala sekolah terhadap siswa/siswi yang kurang mampu bersama Bank Sampah TDB', '/public/uploads/f642c077d40ac307b0192c867f5df643b6910726.JPG', 6, '2018-08-27 04:52:21', '2018-08-27 04:52:21'),
(67, 'Penyerahan Hadiah di SMAN 7 Pekanbaru', 'Kepedulian kepala sekolah terhadap siswa/siswi yang kurang mampu bersama Bank Sampah TDB', '/public/uploads/2b8ebd5f600ad520bdbb8f78adc2cc88718fdebc.JPG', 6, '2018-08-27 04:53:02', '2018-09-13 08:28:56'),
(68, 'MoU SMA NEGERI PLUS PROVINSI RIAU', 'Terima kasih kepada SMA NEGERI PLUS PROVINSI RIAU  yang telah Menjadi Nasabah Kami', '/public/uploads/b08941a2d3a7a3803e6f7375aa3eae952942e321.jpg', 6, '2018-08-30 01:45:03', '2018-08-30 05:16:03'),
(69, 'MoU SMP AL-FIKRI PEKANBARU', 'Terima kasih kepada SMP AL-FIKRI PEKANBARU yang telah menjadi Nasabah Kami', '/public/uploads/21a2fe5b955f6c03ecff4f291857638e0da27a46.JPG', 6, '2018-08-30 04:55:02', '2018-08-30 05:16:34'),
(70, 'MoU SMP NEGERI 34 PEKANBARU', 'Terima kasih kepada SMP Negeri 34 PEKANBARU yang telah menjadi Nasabah Kami', '/public/uploads/3da4e61da037df78c66a61d68c887690df289153.JPG', 6, '2018-09-03 03:35:53', '2018-09-03 03:35:53'),
(71, 'TDB Peduli Lombok', 'Penyerahan sumbangan lombok kepada pihak ACT Pekanbaru, Mari kita ulurkan sedikit bantuan untuk korban bencana di Lombok semoga mereka diberikan kesehatan dan kekuatan. aaminn', '/public/uploads/63957bcf12d2ef9c1276fe444e55e27ef0950d02.jpg', 6, '2018-09-19 07:39:19', '2018-09-19 07:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `institutions`
--

CREATE TABLE `institutions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `institutions`
--

INSERT INTO `institutions` (`id`, `name`, `description`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(5, 'SMP Muhammadiyah 1', NULL, 'Jl. KH. Ahmad Dahlan no.92 kel. kampun melayu kec.sukajadi', '085265738448', '2018-04-12 01:46:47', '2018-04-12 01:46:47');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(30, '2014_10_12_000000_create_users_table', 1),
(31, '2014_10_12_100000_create_password_resets_table', 1),
(32, '2017_08_22_105439_create_city_table', 1),
(33, '2017_08_23_072656_create_customers_table', 1),
(34, '2017_08_23_091957_create_religions_table', 1),
(35, '2017_08_23_094041_add_foreign_key_on_users_table', 1),
(36, '2017_08_23_094111_add_foreign_key_on_customers_table', 1),
(37, '2017_08_29_052627_create_sessions_table', 1),
(38, '2017_08_29_141525_add_field_corporate_name_to_table_customers', 1),
(39, '2017_08_30_060354_create_transactions_table', 1),
(40, '2017_08_30_060405_add_foreign_key_to_user_id_in_table_transaction', 1),
(41, '2017_09_04_161501_create_employee_table', 1),
(42, '2017_09_04_161502_add_foreign_key_to_city_id_in_employee', 1),
(43, '2017_09_04_161751_create_division_table', 1),
(44, '2017_09_04_164837_add_foreign_key_division_id_in_table_employee', 1),
(45, '2017_09_05_110824_add_employee_id_to_users_table', 1),
(46, '2017_09_05_112255_change_customer_id_to_nullable', 1),
(47, '2017_09_12_170825_add_customers_avatar_path_in_customer_table', 1),
(48, '2017_09_12_183712_add_employee_avatar_path_in_employee_table', 1),
(49, '2017_09_13_103221_create_product_table', 1),
(50, '2017_09_14_012137_create_settings_table', 1),
(51, '2017_09_15_103950_add_foreign_key_to_settings', 1),
(52, '2017_09_18_090015_create_table_operating_costs', 1),
(53, '2017_09_24_120227_add_amount_profit_table_in_transaction_table', 1),
(54, '2017_09_24_124724_add_amount_profit_field_to_table_settings', 1),
(55, '2017_10_04_034142_add_city_field_to_table_settings', 1),
(56, '2017_10_04_035109_add_city_field_to_table_transaction', 1),
(57, '2017_10_09_100245_add_last_login_field_to_table_users', 1),
(58, '2018_02_11_040842_add_product_field_to_transaction_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `operating_costs`
--

CREATE TABLE `operating_costs` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount_unit` decimal(20,2) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis_barang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `jenis_barang`, `created_at`, `updated_at`) VALUES
(2, 'Karton', '2018-02-12 09:13:50', NULL),
(3, 'HVS', '2018-02-12 09:13:50', NULL),
(4, 'Sampul Buku', '2018-02-12 09:13:50', NULL),
(5, 'Koran', '2018-02-12 09:13:50', NULL),
(8, 'Botol Plastik', '2018-03-14 20:56:13', '2018-03-14 20:56:13'),
(9, 'kaleng minuman', '2018-09-12 02:59:01', '2018-09-12 02:59:01');

-- --------------------------------------------------------

--
-- Table structure for table `religions`
--

CREATE TABLE `religions` (
  `id` int(10) UNSIGNED NOT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `religions`
--

INSERT INTO `religions` (`id`, `religion`, `created_at`, `updated_at`) VALUES
(1, 'Buddha', NULL, NULL),
(2, 'Hindu', NULL, NULL),
(3, 'Islam', NULL, NULL),
(4, 'Katolik', NULL, NULL),
(5, 'Kristen', NULL, NULL),
(6, 'Konghucu', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `amount_unit` decimal(20,2) NOT NULL,
  `amount_profit` decimal(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `city_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `product_id`, `amount_unit`, `amount_profit`, `created_at`, `updated_at`, `city_id`) VALUES
(7, 2, 1200.00, 500.00, '2018-02-12 09:13:50', '2018-03-27 05:52:23', 2),
(8, 3, 1000.00, 500.00, '2018-02-12 09:13:50', '2018-03-27 05:52:23', 2),
(9, 4, 500.00, 500.00, '2018-02-12 09:13:50', '2018-03-27 05:52:23', 2),
(10, 5, 850.00, 500.00, '2018-02-12 09:13:50', '2018-03-27 05:52:23', 2),
(12, 2, 1200.00, 500.00, '2018-02-12 09:13:50', '2018-09-12 03:23:35', 3),
(13, 3, 1000.00, 500.00, '2018-02-12 09:13:50', '2018-09-12 03:23:35', 3),
(14, 4, 500.00, 500.00, '2018-02-12 09:13:50', '2018-09-12 03:23:35', 3),
(15, 5, 850.00, 500.00, '2018-02-12 09:13:50', '2018-09-12 03:23:35', 3),
(23, 8, 2000.00, 2000.00, '2018-03-27 05:52:23', '2018-03-27 05:52:23', 2),
(25, 8, 2000.00, 2000.00, '2018-03-27 05:53:14', '2018-09-12 03:23:35', 3),
(32, 9, 0.00, 0.00, '2018-09-12 03:02:49', '2018-09-12 03:23:35', 3);

-- --------------------------------------------------------

--
-- Table structure for table `subinstitutions`
--

CREATE TABLE `subinstitutions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institution_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subinstitutions`
--

INSERT INTO `subinstitutions` (`id`, `name`, `description`, `institution_id`, `created_at`, `updated_at`) VALUES
(10, 'Kelas 7.1', NULL, 5, '2018-04-12 01:48:14', '2018-04-12 01:50:15'),
(11, 'Kelas 7.2', NULL, 5, '2018-04-12 01:50:28', '2018-04-12 01:50:28'),
(12, 'Kelas 7.3', NULL, 5, '2018-04-12 01:50:48', '2018-04-12 01:50:48'),
(13, 'Kelas 7.4', NULL, 5, '2018-04-12 01:50:53', '2018-04-12 01:50:53'),
(14, 'Kelas 7.5', NULL, 5, '2018-04-12 01:50:58', '2018-04-12 01:50:58'),
(15, 'Kelas 7.6', NULL, 5, '2018-04-12 01:51:03', '2018-04-12 01:51:03'),
(16, 'Kelas 7.7', NULL, 5, '2018-04-12 01:51:08', '2018-04-12 01:51:08'),
(17, 'Kelas 8.4', NULL, 5, '2018-04-12 01:54:38', '2018-04-12 01:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `is_debit` tinyint(1) NOT NULL,
  `amount_kg` decimal(20,2) NOT NULL,
  `amount_unit` decimal(20,2) NOT NULL,
  `amount_money` decimal(20,2) NOT NULL,
  `amount_profit` decimal(20,2) NOT NULL,
  `amount_used` decimal(20,2) NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `is_debit`, `amount_kg`, `amount_unit`, `amount_money`, `amount_profit`, `amount_used`, `city`, `product`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 5.00, 1000.00, 5000.00, 2500.00, 0.00, 'Yogyakarta', 'Botol Plastik', 1, '2017-08-30 06:00:00', NULL),
(2, 1, 5.00, 1000.00, 5000.00, 2500.00, 0.00, 'Medan', 'Botol Plastik', 1, '2017-08-30 06:10:00', NULL),
(3, 1, 5.00, 1000.00, 5000.00, 2500.00, 0.00, 'Medan', 'HVS', 1, '2017-08-30 06:15:00', NULL),
(4, 1, 32.50, 2000.00, 65000.00, 65000.00, 0.00, 'Pekanbaru', 'Botol Plastik', 9, '2018-04-17 09:40:30', '2018-04-17 09:40:30'),
(5, 1, 1.10, 1200.00, 1320.00, 550.00, 0.00, 'Pekanbaru', 'Karton', 9, '2018-04-17 09:42:57', '2018-04-17 09:42:57'),
(6, 1, 105.00, 1000.00, 105000.00, 52500.00, 0.00, 'Pekanbaru', 'HVS', 9, '2018-04-17 09:45:40', '2018-04-17 09:45:40'),
(7, 1, 20.00, 1000.00, 20000.00, 10000.00, 0.00, 'Pekanbaru', 'HVS', 46, '2018-04-23 09:50:48', '2018-04-23 09:50:48'),
(8, 1, 26.00, 2000.00, 52000.00, 52000.00, 0.00, 'Pekanbaru', 'Botol Plastik', 46, '2018-04-23 09:51:34', '2018-04-23 09:51:34'),
(9, 1, 52.00, 1000.00, 52000.00, 26000.00, 0.00, 'Pekanbaru', 'HVS', 9, '2018-04-24 02:21:26', '2018-04-24 02:21:26'),
(10, 1, 19.00, 2000.00, 38000.00, 38000.00, 0.00, 'Pekanbaru', 'Botol Plastik', 9, '2018-04-24 02:22:21', '2018-04-24 02:22:21'),
(11, 1, 19.00, 2000.00, 38000.00, 38000.00, 0.00, 'Pekanbaru', 'Botol Plastik', 9, '2018-04-24 02:22:27', '2018-04-24 02:22:27'),
(12, 1, 24.20, 1200.00, 29040.00, 12100.00, 0.00, 'Pekanbaru', 'Karton', 48, '2018-04-30 02:31:34', '2018-04-30 02:31:34'),
(13, 1, 43.20, 2000.00, 86400.00, 86400.00, 0.00, 'Pekanbaru', 'Botol Plastik', 48, '2018-04-30 02:32:10', '2018-04-30 02:32:10'),
(14, 1, 20.80, 1000.00, 20800.00, 10400.00, 0.00, 'Pekanbaru', 'HVS', 48, '2018-04-30 02:33:18', '2018-04-30 02:33:18'),
(15, 1, 63.00, 1000.00, 63000.00, 31500.00, 0.00, 'Pekanbaru', 'HVS', 48, '2018-05-02 07:06:06', '2018-05-02 07:06:06'),
(16, 1, 4.00, 2000.00, 8000.00, 8000.00, 0.00, 'Pekanbaru', 'Botol Plastik', 48, '2018-05-02 07:06:40', '2018-05-02 07:06:40'),
(17, 1, 15.70, 2000.00, 31400.00, 31400.00, 0.00, 'Pekanbaru', 'Botol Plastik', 46, '2018-05-17 02:18:15', '2018-05-17 02:18:15'),
(18, 1, 13.50, 1000.00, 13500.00, 6750.00, 0.00, 'Pekanbaru', 'HVS', 46, '2018-05-17 02:19:04', '2018-05-17 02:19:04'),
(19, 1, 6.40, 2000.00, 12800.00, 12800.00, 0.00, 'Pekanbaru', 'Botol Plastik', 45, '2018-05-18 08:00:08', '2018-05-18 08:00:08'),
(20, 1, 54.60, 1000.00, 54600.00, 27300.00, 0.00, 'Pekanbaru', 'HVS', 45, '2018-05-18 08:01:01', '2018-05-18 08:01:01'),
(21, 1, 4.40, 1200.00, 5280.00, 2200.00, 0.00, 'Pekanbaru', 'Karton', 45, '2018-05-18 08:01:26', '2018-05-18 08:01:26'),
(22, 1, 9.20, 1000.00, 9200.00, 4600.00, 0.00, 'Pekanbaru', 'HVS', 44, '2018-05-18 08:02:00', '2018-05-18 08:02:00'),
(23, 1, 1.20, 2000.00, 2400.00, 2400.00, 0.00, 'Pekanbaru', 'Botol Plastik', 44, '2018-05-18 08:02:22', '2018-05-18 08:02:22'),
(24, 1, 6.20, 2000.00, 12400.00, 12400.00, 0.00, 'Pekanbaru', 'Botol Plastik', 48, '2018-05-18 08:03:16', '2018-05-18 08:03:16'),
(25, 1, 5.80, 1200.00, 6960.00, 2900.00, 0.00, 'Pekanbaru', 'Karton', 48, '2018-05-18 08:03:49', '2018-05-18 08:03:49'),
(26, 1, 9.00, 1000.00, 9000.00, 4500.00, 0.00, 'Pekanbaru', 'HVS', 48, '2018-05-18 08:04:16', '2018-05-18 08:04:16'),
(27, 1, 7.10, 1200.00, 8520.00, 3550.00, 0.00, 'Pekanbaru', 'Karton', 52, '2018-05-18 08:13:28', '2018-05-18 08:13:28'),
(28, 1, 8.00, 1000.00, 8000.00, 4000.00, 0.00, 'Pekanbaru', 'HVS', 52, '2018-05-18 08:13:48', '2018-05-18 08:13:48'),
(29, 1, 3.40, 2000.00, 6800.00, 6800.00, 0.00, 'Pekanbaru', 'Botol Plastik', 52, '2018-05-18 08:14:27', '2018-05-18 08:14:27'),
(30, 1, 335.50, 1000.00, 335500.00, 167750.00, 0.00, 'Pekanbaru', 'HVS', 53, '2018-05-24 01:23:04', '2018-05-24 01:23:04'),
(31, 1, 29.90, 2000.00, 59800.00, 59800.00, 0.00, 'Pekanbaru', 'Botol Plastik', 53, '2018-05-24 01:23:32', '2018-05-24 01:23:32'),
(32, 1, 5.00, 2000.00, 10000.00, 10000.00, 0.00, 'Pekanbaru', 'Botol Plastik', 56, '2018-05-28 03:39:54', '2018-05-28 03:39:54'),
(33, 1, 2.53, 1000.00, 2530.00, 1265.00, 0.00, 'Pekanbaru', 'HVS', 56, '2018-05-28 03:42:21', '2018-05-28 03:42:21'),
(34, 1, 2.74, 2000.00, 5480.00, 5480.00, 0.00, 'Pekanbaru', 'Botol Plastik', 57, '2018-05-28 03:43:20', '2018-05-28 03:43:20'),
(35, 1, 1.68, 1000.00, 1680.00, 840.00, 0.00, 'Pekanbaru', 'HVS', 57, '2018-05-28 03:48:59', '2018-05-28 03:48:59'),
(36, 1, 2.07, 2000.00, 4140.00, 4140.00, 0.00, 'Pekanbaru', 'Botol Plastik', 58, '2018-05-28 03:54:23', '2018-05-28 03:54:23'),
(37, 1, 5.25, 1000.00, 5250.00, 2625.00, 0.00, 'Pekanbaru', 'HVS', 58, '2018-05-28 03:56:09', '2018-05-28 03:56:09'),
(38, 1, 4.04, 2000.00, 8080.00, 8080.00, 0.00, 'Pekanbaru', 'Botol Plastik', 59, '2018-05-28 03:57:36', '2018-05-28 03:57:36'),
(39, 1, 6.37, 1000.00, 6370.00, 3185.00, 0.00, 'Pekanbaru', 'HVS', 59, '2018-05-28 04:03:27', '2018-05-28 04:03:27'),
(40, 1, 23.00, 1000.00, 23000.00, 11500.00, 0.00, 'Pekanbaru', 'HVS', 52, '2018-07-03 04:23:16', '2018-07-03 04:23:16'),
(41, 1, 6.10, 2000.00, 12200.00, 12200.00, 0.00, 'Pekanbaru', 'Botol Plastik', 52, '2018-07-03 04:23:52', '2018-07-03 04:23:52'),
(42, 1, 7.00, 1200.00, 8400.00, 3500.00, 0.00, 'Pekanbaru', 'Karton', 45, '2018-07-03 07:19:43', '2018-07-03 07:19:43'),
(43, 1, 130.40, 1000.00, 130400.00, 65200.00, 0.00, 'Pekanbaru', 'HVS', 45, '2018-07-03 07:20:34', '2018-07-03 07:20:34'),
(44, 1, 6.50, 500.00, 3250.00, 3250.00, 0.00, 'Pekanbaru', 'Sampul Buku', 45, '2018-07-03 07:22:11', '2018-07-03 07:22:11'),
(45, 1, 5.70, 2000.00, 11400.00, 11400.00, 0.00, 'Pekanbaru', 'Botol Plastik', 45, '2018-07-03 07:23:55', '2018-07-03 07:23:55'),
(46, 1, 17.20, 1000.00, 17200.00, 8600.00, 0.00, 'Pekanbaru', 'HVS', 44, '2018-07-03 07:25:29', '2018-07-03 07:25:29'),
(47, 1, 1.30, 2000.00, 2600.00, 2600.00, 0.00, 'Pekanbaru', 'Botol Plastik', 44, '2018-07-03 07:25:58', '2018-07-03 07:25:58'),
(48, 1, 64.00, 1000.00, 64000.00, 32000.00, 0.00, 'Pekanbaru', 'HVS', 46, '2018-07-13 07:10:25', '2018-07-13 07:10:25'),
(49, 1, 6.00, 2000.00, 12000.00, 12000.00, 0.00, 'Pekanbaru', 'Botol Plastik', 46, '2018-07-13 07:11:58', '2018-07-13 07:11:58'),
(50, 1, 26.90, 2000.00, 53800.00, 53800.00, 0.00, 'Yogyakarta', 'Botol Plastik', 68, '2018-07-16 03:29:03', '2018-07-16 03:29:03'),
(51, 1, 12.50, 2000.00, 25000.00, 25000.00, 0.00, 'Pekanbaru', 'Botol Plastik', 9, '2018-07-16 06:55:57', '2018-07-16 06:55:57'),
(52, 1, 96.70, 1000.00, 96700.00, 48350.00, 0.00, 'Pekanbaru', 'HVS', 9, '2018-07-16 06:58:14', '2018-07-16 06:58:14'),
(53, 1, 18.00, 1200.00, 21600.00, 9000.00, 0.00, 'Pekanbaru', 'Karton', 9, '2018-07-16 06:59:04', '2018-07-16 06:59:04'),
(54, 0, 0.00, 0.00, 0.00, 0.00, 38000.00, 'Pekanbaru', 'Karton', 9, '2018-07-16 07:14:50', '2018-07-16 07:14:50'),
(55, 1, 16.30, 2000.00, 32600.00, 32600.00, 0.00, 'Pekanbaru', 'Botol Plastik', 9, '2018-07-16 07:15:36', '2018-07-16 07:15:36'),
(56, 1, 23.40, 1000.00, 23400.00, 11700.00, 0.00, 'Pekanbaru', 'HVS', 9, '2018-07-16 07:16:01', '2018-07-16 07:16:01'),
(57, 1, 5.00, 1000.00, 5000.00, 2500.00, 0.00, 'Pekanbaru', 'HVS', 66, '2018-07-19 06:56:59', '2018-07-19 06:56:59'),
(61, 1, 6.40, 1200.00, 7680.00, 3200.00, 0.00, 'Pekanbaru', 'Karton', 48, '2018-07-23 07:25:45', '2018-07-23 07:25:45'),
(62, 1, 4.60, 1000.00, 4600.00, 2300.00, 0.00, 'Pekanbaru', 'HVS', 48, '2018-07-23 07:26:36', '2018-07-23 07:26:36'),
(63, 1, 4.00, 2000.00, 8000.00, 8000.00, 0.00, 'Pekanbaru', 'Botol Plastik', 48, '2018-07-23 07:27:02', '2018-07-23 07:27:02'),
(64, 1, 4.60, 1000.00, 4600.00, 2300.00, 0.00, 'Pekanbaru', 'HVS', 74, '2018-07-25 01:51:55', '2018-07-25 01:51:55'),
(65, 1, 8.60, 1200.00, 10320.00, 4300.00, 0.00, 'Pekanbaru', 'Karton', 74, '2018-07-25 01:52:36', '2018-07-25 01:52:36'),
(66, 1, 34.70, 2000.00, 69400.00, 69400.00, 0.00, 'Pekanbaru', 'Botol Plastik', 74, '2018-07-25 01:53:09', '2018-07-25 01:53:09'),
(67, 1, 4.60, 1200.00, 5520.00, 2300.00, 0.00, 'Pekanbaru', 'Karton', 66, '2018-07-26 06:13:10', '2018-07-26 06:13:10'),
(68, 1, 148.80, 1000.00, 148800.00, 74400.00, 0.00, 'Pekanbaru', 'HVS', 66, '2018-07-26 06:15:53', '2018-07-26 06:15:53'),
(69, 1, 12.60, 2000.00, 25200.00, 25200.00, 0.00, 'Pekanbaru', 'Botol Plastik', 66, '2018-07-26 06:17:00', '2018-07-26 06:17:00'),
(70, 1, 7.20, 2000.00, 14400.00, 14400.00, 0.00, 'Pekanbaru', 'Botol Plastik', 69, '2018-07-26 06:18:24', '2018-07-26 06:18:24'),
(71, 1, 13.00, 1200.00, 15600.00, 6500.00, 0.00, 'Pekanbaru', 'Karton', 69, '2018-07-26 06:19:18', '2018-07-26 06:19:18'),
(72, 1, 15.00, 1000.00, 15000.00, 7500.00, 0.00, 'Pekanbaru', 'HVS', 69, '2018-07-26 06:20:28', '2018-07-26 06:20:28'),
(73, 1, 5.00, 1200.00, 6000.00, 2500.00, 0.00, 'Pekanbaru', 'Karton', 9, '2018-07-30 06:08:58', '2018-07-30 06:08:58'),
(74, 1, 61.10, 1000.00, 61100.00, 30550.00, 0.00, 'Pekanbaru', 'HVS', 9, '2018-07-30 06:09:50', '2018-07-30 06:09:50'),
(75, 1, 9.50, 2000.00, 19000.00, 19000.00, 0.00, 'Pekanbaru', 'Botol Plastik', 9, '2018-07-30 06:10:30', '2018-07-30 06:10:30'),
(76, 1, 40.70, 2000.00, 81400.00, 81400.00, 0.00, 'Pekanbaru', 'Botol Plastik', 74, '2018-07-30 06:12:11', '2018-07-30 06:12:11'),
(77, 1, 49.30, 2000.00, 98600.00, 98600.00, 0.00, 'Pekanbaru', 'Botol Plastik', 74, '2018-08-05 14:01:48', '2018-08-05 14:01:48'),
(78, 1, 22.00, 1200.00, 26400.00, 11000.00, 0.00, 'Pekanbaru', 'Karton', 46, '2018-08-05 14:10:46', '2018-08-05 14:10:46'),
(79, 1, 95.00, 1000.00, 95000.00, 47500.00, 0.00, 'Pekanbaru', 'HVS', 46, '2018-08-05 14:11:29', '2018-08-05 14:11:29'),
(80, 1, 4.80, 2000.00, 9600.00, 9600.00, 0.00, 'Pekanbaru', 'Botol Plastik', 46, '2018-08-05 14:12:06', '2018-08-05 14:12:06'),
(81, 1, 14.00, 2000.00, 28000.00, 28000.00, 0.00, 'Pekanbaru', 'Botol Plastik', 49, '2018-08-07 08:22:21', '2018-08-07 08:22:21'),
(82, 1, 78.20, 1000.00, 78200.00, 39100.00, 0.00, 'Pekanbaru', 'HVS', 49, '2018-08-07 08:23:23', '2018-08-07 08:23:23'),
(85, 1, 60.20, 2000.00, 120400.00, 120400.00, 0.00, 'Pekanbaru', 'Botol Plastik', 74, '2018-08-09 09:48:41', '2018-08-09 09:48:41'),
(86, 1, 342.00, 1000.00, 342000.00, 171000.00, 0.00, 'Pekanbaru', 'HVS', 83, '2018-08-10 02:30:40', '2018-08-10 02:30:40'),
(87, 1, 20.60, 2000.00, 41200.00, 41200.00, 0.00, 'Pekanbaru', 'Botol Plastik', 53, '2018-08-12 01:03:22', '2018-08-12 01:03:22'),
(88, 1, 22.20, 1000.00, 22200.00, 11100.00, 0.00, 'Pekanbaru', 'HVS', 53, '2018-08-12 01:04:00', '2018-08-12 01:04:00'),
(89, 1, 18.60, 2000.00, 37200.00, 37200.00, 0.00, 'Pekanbaru', 'Botol Plastik', 84, '2018-08-13 03:06:34', '2018-08-13 03:06:34'),
(90, 1, 9.20, 850.00, 7820.00, 4600.00, 0.00, 'Pekanbaru', 'Koran', 84, '2018-08-13 03:07:19', '2018-08-13 03:07:19'),
(91, 1, 43.60, 1200.00, 52320.00, 21800.00, 0.00, 'Pekanbaru', 'Karton', 84, '2018-08-13 03:08:03', '2018-08-13 03:08:03'),
(92, 1, 7.40, 1000.00, 7400.00, 3700.00, 0.00, 'Pekanbaru', 'HVS', 84, '2018-08-13 03:08:30', '2018-08-13 03:08:30'),
(93, 1, 48.80, 2000.00, 97600.00, 97600.00, 0.00, 'Pekanbaru', 'Botol Plastik', 74, '2018-08-13 09:44:42', '2018-08-13 09:44:42'),
(94, 1, 55.10, 1000.00, 55100.00, 27550.00, 0.00, 'Pekanbaru', 'HVS', 74, '2018-08-13 09:46:00', '2018-08-13 09:46:00'),
(95, 1, 30.40, 2000.00, 60800.00, 60800.00, 0.00, 'Pekanbaru', 'Botol Plastik', 75, '2018-08-13 09:49:04', '2018-08-13 09:49:04'),
(96, 1, 0.40, 1200.00, 480.00, 200.00, 0.00, 'Pekanbaru', 'Karton', 87, '2018-08-20 07:40:57', '2018-08-20 07:40:57'),
(97, 1, 1.20, 1000.00, 1200.00, 600.00, 0.00, 'Pekanbaru', 'HVS', 87, '2018-08-20 07:41:40', '2018-08-20 07:41:40'),
(98, 1, 0.40, 2000.00, 800.00, 800.00, 0.00, 'Pekanbaru', 'Botol Plastik', 87, '2018-08-20 07:42:29', '2018-08-20 07:42:29'),
(99, 1, 58.30, 2000.00, 116600.00, 116600.00, 0.00, 'Pekanbaru', 'Botol Plastik', 74, '2018-08-21 01:49:13', '2018-08-21 01:49:13'),
(100, 1, 180.90, 1000.00, 180900.00, 90450.00, 0.00, 'Pekanbaru', 'HVS', 46, '2018-08-21 01:52:22', '2018-08-21 01:52:22'),
(101, 1, 8.30, 2000.00, 16600.00, 16600.00, 0.00, 'Pekanbaru', 'Botol Plastik', 46, '2018-08-21 01:52:53', '2018-08-21 01:52:53'),
(102, 1, 3.80, 1200.00, 4560.00, 1900.00, 0.00, 'Pekanbaru', 'Karton', 89, '2018-08-24 03:33:57', '2018-08-24 03:33:57'),
(103, 1, 359.60, 1000.00, 359600.00, 179800.00, 0.00, 'Pekanbaru', 'HVS', 89, '2018-08-24 03:38:05', '2018-08-24 03:38:05'),
(104, 1, 36.60, 1000.00, 36600.00, 18300.00, 0.00, 'Pekanbaru', 'HVS', 84, '2018-08-24 03:50:10', '2018-08-24 03:50:10'),
(105, 1, 28.00, 2000.00, 56000.00, 56000.00, 0.00, 'Pekanbaru', 'Botol Plastik', 84, '2018-08-24 03:51:07', '2018-08-24 03:51:07'),
(106, 1, 148.30, 1000.00, 148300.00, 74150.00, 0.00, 'Pekanbaru', 'HVS', 9, '2018-08-24 03:56:48', '2018-08-24 03:56:48'),
(107, 1, 38.00, 2000.00, 76000.00, 76000.00, 0.00, 'Pekanbaru', 'Botol Plastik', 9, '2018-08-24 03:58:24', '2018-08-24 03:58:24'),
(108, 1, 56.90, 2000.00, 113800.00, 113800.00, 0.00, 'Pekanbaru', 'Botol Plastik', 74, '2018-08-27 07:09:35', '2018-08-27 07:09:35'),
(109, 1, 5.60, 1200.00, 6720.00, 2800.00, 0.00, 'Pekanbaru', 'Karton', 52, '2018-08-31 03:00:11', '2018-08-31 03:00:11'),
(110, 1, 8.60, 2000.00, 17200.00, 17200.00, 0.00, 'Pekanbaru', 'Botol Plastik', 52, '2018-08-31 03:01:30', '2018-08-31 03:01:30'),
(111, 1, 7.40, 1000.00, 7400.00, 3700.00, 0.00, 'Pekanbaru', 'HVS', 52, '2018-08-31 03:02:50', '2018-08-31 03:02:50'),
(112, 1, 36.40, 2000.00, 72800.00, 72800.00, 0.00, 'Pekanbaru', 'Botol Plastik', 74, '2018-09-01 03:42:26', '2018-09-01 03:42:26'),
(113, 1, 13.60, 2000.00, 27200.00, 27200.00, 0.00, 'Pekanbaru', 'Botol Plastik', 53, '2018-09-01 03:44:28', '2018-09-01 03:44:28'),
(114, 1, 13.60, 2000.00, 27200.00, 27200.00, 0.00, 'Pekanbaru', 'Botol Plastik', 53, '2018-09-01 03:44:40', '2018-09-01 03:44:40'),
(115, 1, 14.80, 1000.00, 14800.00, 7400.00, 0.00, 'Pekanbaru', 'HVS', 53, '2018-09-01 03:45:53', '2018-09-01 03:45:53'),
(116, 0, 0.00, 0.00, 0.00, 0.00, 27200.00, 'Pekanbaru', 'Karton', 53, '2018-09-01 06:50:50', '2018-09-01 06:50:50'),
(117, 0, 0.00, 0.00, 0.00, 0.00, 500700.00, 'Pekanbaru', 'Karton', 53, '2018-09-04 04:55:06', '2018-09-04 04:55:06'),
(118, 1, 133.10, 1200.00, 159720.00, 66550.00, 0.00, 'Pekanbaru', 'Karton', 90, '2018-09-04 08:04:46', '2018-09-04 08:04:46'),
(119, 1, 123.50, 1000.00, 123500.00, 61750.00, 0.00, 'Pekanbaru', 'HVS', 90, '2018-09-04 08:05:41', '2018-09-04 08:05:41'),
(120, 1, 5.80, 850.00, 4930.00, 2900.00, 0.00, 'Pekanbaru', 'Koran', 90, '2018-09-04 08:06:31', '2018-09-04 08:06:31'),
(121, 1, 29.30, 2000.00, 58600.00, 58600.00, 0.00, 'Pekanbaru', 'Botol Plastik', 90, '2018-09-04 08:07:39', '2018-09-04 08:07:39'),
(122, 1, 35.80, 1200.00, 42960.00, 17900.00, 0.00, 'Pekanbaru', 'Karton', 84, '2018-09-05 07:36:45', '2018-09-05 07:36:45'),
(123, 1, 6.40, 850.00, 5440.00, 3200.00, 0.00, 'Pekanbaru', 'Koran', 84, '2018-09-05 07:38:35', '2018-09-05 07:38:35'),
(124, 1, 4.50, 500.00, 2250.00, 2250.00, 0.00, 'Pekanbaru', 'Sampul Buku', 84, '2018-09-05 07:40:53', '2018-09-05 07:40:53'),
(125, 1, 25.90, 1000.00, 25900.00, 12950.00, 0.00, 'Pekanbaru', 'HVS', 84, '2018-09-05 07:41:58', '2018-09-05 07:41:58'),
(126, 1, 21.30, 2000.00, 42600.00, 42600.00, 0.00, 'Pekanbaru', 'Botol Plastik', 84, '2018-09-05 07:42:56', '2018-09-05 07:42:56'),
(127, 1, 142.50, 2000.00, 285000.00, 285000.00, 0.00, 'Pekanbaru', 'Botol Plastik', 99, '2018-09-06 08:42:51', '2018-09-06 08:42:51'),
(128, 1, 2.60, 2000.00, 5200.00, 5200.00, 0.00, 'Pekanbaru', 'Botol Plastik', 94, '2018-09-06 09:05:03', '2018-09-06 09:05:03'),
(129, 1, 147.20, 1000.00, 147200.00, 73600.00, 0.00, 'Pekanbaru', 'HVS', 94, '2018-09-06 09:05:54', '2018-09-06 09:05:54'),
(130, 1, 9.80, 1000.00, 9800.00, 4900.00, 0.00, 'Pekanbaru', 'HVS', 45, '2018-09-06 09:19:34', '2018-09-06 09:19:34'),
(131, 1, 6.90, 2000.00, 13800.00, 13800.00, 0.00, 'Pekanbaru', 'Botol Plastik', 45, '2018-09-06 09:20:16', '2018-09-06 09:20:16'),
(132, 1, 18.80, 1200.00, 22560.00, 9400.00, 0.00, 'Pekanbaru', 'Karton', 86, '2018-09-06 09:21:39', '2018-09-06 09:21:39'),
(133, 1, 126.00, 1000.00, 126000.00, 63000.00, 0.00, 'Pekanbaru', 'HVS', 86, '2018-09-06 09:22:15', '2018-09-06 09:22:15'),
(134, 1, 13.80, 2000.00, 27600.00, 27600.00, 0.00, 'Pekanbaru', 'Botol Plastik', 86, '2018-09-06 09:22:53', '2018-09-06 09:22:53'),
(135, 1, 27.00, 1200.00, 32400.00, 13500.00, 0.00, 'Pekanbaru', 'Karton', 98, '2018-09-06 09:33:47', '2018-09-06 09:33:47'),
(136, 1, 143.80, 1000.00, 143800.00, 71900.00, 0.00, 'Pekanbaru', 'HVS', 98, '2018-09-06 09:34:33', '2018-09-06 09:34:33'),
(137, 1, 19.00, 2000.00, 38000.00, 38000.00, 0.00, 'Pekanbaru', 'Botol Plastik', 98, '2018-09-06 09:35:13', '2018-09-06 09:35:13'),
(138, 1, 67.80, 1000.00, 67800.00, 33900.00, 0.00, 'Pekanbaru', 'HVS', 78, '2018-09-06 09:38:53', '2018-09-06 09:38:53'),
(139, 1, 5.80, 2000.00, 11600.00, 11600.00, 0.00, 'Pekanbaru', 'Botol Plastik', 78, '2018-09-06 09:40:51', '2018-09-06 09:40:51'),
(140, 1, 9.20, 1000.00, 9200.00, 4600.00, 0.00, 'Pekanbaru', 'HVS', 9, '2018-09-06 09:55:02', '2018-09-06 09:55:02'),
(141, 1, 30.50, 2000.00, 61000.00, 61000.00, 0.00, 'Pekanbaru', 'Botol Plastik', 9, '2018-09-06 09:56:10', '2018-09-06 09:56:10'),
(142, 1, 51.00, 2000.00, 102000.00, 102000.00, 0.00, 'Pekanbaru', 'Botol Plastik', 74, '2018-09-10 09:15:11', '2018-09-10 09:15:11'),
(143, 1, 8.60, 1200.00, 10320.00, 4300.00, 0.00, 'Pekanbaru', 'Karton', 46, '2018-09-10 09:22:33', '2018-09-10 09:22:33'),
(144, 1, 150.00, 1000.00, 150000.00, 75000.00, 0.00, 'Pekanbaru', 'HVS', 46, '2018-09-10 09:23:08', '2018-09-10 09:23:08'),
(145, 1, 21.30, 2000.00, 42600.00, 42600.00, 0.00, 'Pekanbaru', 'Botol Plastik', 46, '2018-09-10 09:23:42', '2018-09-10 09:23:42'),
(146, 1, 5.70, 2000.00, 11400.00, 11400.00, 0.00, 'Pekanbaru', 'Botol Plastik', 61, '2018-09-10 09:29:11', '2018-09-10 09:29:11'),
(147, 1, 20.00, 1000.00, 20000.00, 10000.00, 0.00, 'Pekanbaru', 'HVS', 102, '2018-09-12 01:39:45', '2018-09-12 01:39:45'),
(148, 1, 13.80, 2000.00, 27600.00, 27600.00, 0.00, 'Pekanbaru', 'Botol Plastik', 102, '2018-09-12 01:41:03', '2018-09-12 01:41:03'),
(149, 1, 9.50, 1000.00, 9500.00, 4750.00, 0.00, 'Pekanbaru', 'HVS', 49, '2018-09-12 05:06:29', '2018-09-12 05:06:29'),
(150, 1, 25.40, 2000.00, 50800.00, 50800.00, 0.00, 'Pekanbaru', 'Botol Plastik', 49, '2018-09-12 05:08:14', '2018-09-12 05:08:14'),
(151, 1, 7.00, 1000.00, 7000.00, 3500.00, 0.00, 'Pekanbaru', 'HVS', 90, '2018-09-12 06:48:53', '2018-09-12 06:48:53'),
(152, 1, 26.30, 2000.00, 52600.00, 52600.00, 0.00, 'Pekanbaru', 'Botol Plastik', 90, '2018-09-12 06:49:47', '2018-09-12 06:49:47'),
(153, 1, 171.20, 1000.00, 171200.00, 85600.00, 0.00, 'Pekanbaru', 'HVS', 102, '2018-09-12 06:56:23', '2018-09-12 06:56:23'),
(154, 1, 22.00, 2000.00, 44000.00, 44000.00, 0.00, 'Pekanbaru', 'Botol Plastik', 102, '2018-09-12 06:57:01', '2018-09-12 06:57:01'),
(155, 1, 9.60, 500.00, 4800.00, 4800.00, 0.00, 'Pekanbaru', 'Sampul Buku', 102, '2018-09-12 06:57:37', '2018-09-12 06:57:37'),
(156, 1, 39.10, 2000.00, 78200.00, 78200.00, 0.00, 'Pekanbaru', 'Botol Plastik', 53, '2018-09-14 09:38:04', '2018-09-14 09:38:04'),
(157, 1, 191.20, 1000.00, 191200.00, 95600.00, 0.00, 'Pekanbaru', 'HVS', 9, '2018-09-14 09:39:57', '2018-09-14 09:39:57'),
(158, 1, 15.50, 2000.00, 31000.00, 31000.00, 0.00, 'Pekanbaru', 'Botol Plastik', 9, '2018-09-14 09:41:34', '2018-09-14 09:41:34'),
(159, 1, 36.10, 2000.00, 72200.00, 72200.00, 0.00, 'Pekanbaru', 'Botol Plastik', 77, '2018-09-17 03:35:02', '2018-09-17 03:35:02'),
(160, 1, 17.20, 2000.00, 34400.00, 34400.00, 0.00, 'Pekanbaru', 'Botol Plastik', 104, '2018-09-17 05:46:07', '2018-09-17 05:46:07'),
(161, 1, 12.00, 1200.00, 14400.00, 6000.00, 0.00, 'Pekanbaru', 'Karton', 104, '2018-09-17 05:47:09', '2018-09-17 05:47:09'),
(162, 1, 12.00, 850.00, 10200.00, 6000.00, 0.00, 'Pekanbaru', 'Koran', 104, '2018-09-17 05:47:39', '2018-09-17 05:47:39'),
(163, 1, 93.60, 1000.00, 93600.00, 46800.00, 0.00, 'Pekanbaru', 'HVS', 104, '2018-09-17 05:48:36', '2018-09-17 05:48:36'),
(164, 1, 15.00, 1200.00, 18000.00, 7500.00, 0.00, 'Pekanbaru', 'Karton', 84, '2018-09-18 01:42:42', '2018-09-18 01:42:42'),
(165, 1, 9.60, 1000.00, 9600.00, 4800.00, 0.00, 'Pekanbaru', 'HVS', 84, '2018-09-18 01:43:19', '2018-09-18 01:43:19'),
(166, 1, 5.10, 850.00, 4335.00, 2550.00, 0.00, 'Pekanbaru', 'Koran', 84, '2018-09-18 01:43:53', '2018-09-18 01:43:53'),
(167, 1, 18.60, 2000.00, 37200.00, 37200.00, 0.00, 'Pekanbaru', 'Botol Plastik', 84, '2018-09-18 01:44:44', '2018-09-18 01:44:44'),
(168, 1, 7.60, 2000.00, 15200.00, 15200.00, 0.00, 'Pekanbaru', 'Botol Plastik', 108, '2018-09-19 07:14:49', '2018-09-19 07:14:49'),
(169, 1, 4.00, 1200.00, 4800.00, 2000.00, 0.00, 'Pekanbaru', 'Karton', 108, '2018-09-19 07:15:28', '2018-09-19 07:15:28'),
(170, 1, 261.90, 1000.00, 261900.00, 130950.00, 0.00, 'Pekanbaru', 'HVS', 108, '2018-09-19 07:16:05', '2018-09-19 07:16:05'),
(171, 1, 18.40, 1000.00, 18400.00, 9200.00, 0.00, 'Pekanbaru', 'HVS', 109, '2018-09-19 08:11:40', '2018-09-19 08:11:40'),
(172, 1, 36.50, 2000.00, 73000.00, 73000.00, 0.00, 'Pekanbaru', 'Botol Plastik', 109, '2018-09-19 08:12:31', '2018-09-19 08:12:31'),
(173, 1, 34.10, 2000.00, 68200.00, 68200.00, 0.00, 'Pekanbaru', 'Botol Plastik', 66, '2018-09-20 07:52:16', '2018-09-20 07:52:16'),
(174, 1, 28.60, 1200.00, 34320.00, 14300.00, 0.00, 'Pekanbaru', 'Karton', 66, '2018-09-20 07:53:04', '2018-09-20 07:53:04'),
(175, 1, 7.30, 1000.00, 7300.00, 3650.00, 0.00, 'Pekanbaru', 'HVS', 66, '2018-09-20 07:54:13', '2018-09-20 07:54:13'),
(176, 1, 30.10, 2000.00, 60200.00, 60200.00, 0.00, 'Pekanbaru', 'Botol Plastik', 90, '2018-09-20 07:56:27', '2018-09-20 07:56:27'),
(177, 1, 0.40, 1000.00, 400.00, 200.00, 0.00, 'Pekanbaru', 'HVS', 90, '2018-09-20 07:57:11', '2018-09-20 07:57:11'),
(178, 1, 0.40, 1200.00, 480.00, 200.00, 0.00, 'Pekanbaru', 'Karton', 90, '2018-09-20 07:58:03', '2018-09-20 07:58:03'),
(179, 1, 7.60, 850.00, 6460.00, 3800.00, 0.00, 'Pekanbaru', 'Koran', 111, '2018-09-21 05:26:42', '2018-09-21 05:26:42'),
(180, 1, 109.50, 1000.00, 109500.00, 54750.00, 0.00, 'Pekanbaru', 'HVS', 111, '2018-09-21 05:27:22', '2018-09-21 05:27:22'),
(181, 1, 53.70, 2000.00, 107400.00, 107400.00, 0.00, 'Pekanbaru', 'Botol Plastik', 111, '2018-09-21 05:27:52', '2018-09-21 05:27:52'),
(182, 1, 54.70, 2000.00, 109400.00, 109400.00, 0.00, 'Pekanbaru', 'Botol Plastik', 74, '2018-09-22 23:42:06', '2018-09-22 23:42:06'),
(183, 1, 23.60, 2000.00, 47200.00, 47200.00, 0.00, 'Pekanbaru', 'Botol Plastik', 53, '2018-09-22 23:49:46', '2018-09-22 23:49:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `employee_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `customer_id`, `employee_id`, `remember_token`, `created_at`, `updated_at`, `last_login`) VALUES
(1, 'jogja@tdbangarna.com', '$2y$12$aJEsfPmFzsPpnKX2p7Qgg.AuDLXxJUuwSEKpI32VykzDzxc5.79tO', NULL, 1, '$2y$10$Zq17zHYVZmTQyW/1fhCOM.mNzGt1EkQ2PWBnOX4Iqy2kd2w74jqA6', '2018-02-12 09:13:51', '2018-09-25 05:40:47', '2018-09-25 05:40:47'),
(2, 'pekanbaru@tdbangarna.com', '$2y$12$xT9Jt/tc2U/NeFiq5l1vGebzVG3XRL1wwXqOQtkTrD.vM3yK7jO.i', NULL, 2, '$2y$10$2MHmZgU9bD8Yzh82nTttcObDqGJdNU7VL/riZr2.CKcBFDoP4aLOu', '2018-02-12 09:13:51', '2018-08-08 04:08:49', '2018-08-08 04:08:49'),
(5, 'kasir@tdbangarna.com', '$2y$10$oOxxdy60ukjEt2hQu8D8GudRIqy4ux5rfv4ZXiAcCtz5s7KujVVbW', NULL, 5, '$2y$10$pjP4M2h.TarYpFXqSB3gSu8F/7ZZwRDy1SV.6nqlk9YaSRbcLI1Ji', '2018-02-12 09:13:51', '2018-07-17 02:02:28', '2018-07-17 02:02:28'),
(9, 'sdn164.pekanbaru@yahoo.com', '$2y$10$zSSJM75x1s4tBnBEAV1km.8ebvdn0GNmsllhZoi2VXYPDb9QWvXy.', 9, NULL, NULL, '2018-03-18 19:10:57', '2018-03-18 19:10:57', NULL),
(37, '34hebat@gmail.com', '$2y$10$YhMgDnVG2fxd5mSHtpZW6ewNR/qSZVvOb8EyVkXFmG1eY5uxYC56i', 37, NULL, NULL, '2018-04-09 21:25:25', '2018-04-09 21:25:25', NULL),
(38, 'uswatun.khasanah@tdbangarna.com', '$2y$12$N8kBYOgDozDLodsqEd9E4ehiOzhBjgtbz0mnf5z0y.P3X7g8NSYfe', NULL, 6, '$2y$10$lcTM42wl/xJ3CBbdwBi9k.ha8GEINOvD/bFFWHLoGXi.7uRZKzgRO', '2018-04-10 08:26:01', '2018-09-25 06:54:25', '2018-09-25 06:54:25'),
(43, 'ruvikasari029@gmail.com', '$2y$10$Yh8WyuS0CGkaV9WKZlIBfO2.Ej3Xlqn3kcDB.Or1ggdu1W7IufwtS', 39, NULL, NULL, '2018-04-11 09:54:19', '2018-04-11 09:54:19', NULL),
(44, 'methopkusmp@yahoo.co.id', '$2y$10$lFZURtOE1lJLQR/RvsZsFONwgC61meymIhmEOFniWWAVTDrR0SBqu', 40, NULL, NULL, '2018-04-13 02:46:20', '2018-04-13 02:46:20', NULL),
(45, 'sdmethpku@ymail.com', '$2y$10$Z2orzcyR7crNDfxDebc.iu19dhGaEjbOnaJMpCcWCpBD8VTDcr96O', 41, NULL, NULL, '2018-04-13 02:50:02', '2018-04-13 02:50:02', NULL),
(46, 'sdn158pku@yahoo.co.id', '$2y$10$A5eOl0GebeMy9ZIZ2atGgOkbMBBwp3B5LnKGLfL5un2v/iDRF2asu', 42, NULL, NULL, '2018-04-17 05:23:38', '2018-04-17 05:23:38', NULL),
(47, 'renirahmi07@gmail.com', '$2y$10$ofcfPcFB1QC0omN.ec7Sq.kboFtUNy5IFY1i6VtAkaRSzjVXs4nEu', 43, NULL, NULL, '2018-04-18 00:42:20', '2018-04-18 00:42:20', NULL),
(48, 'annasiallagan@gmail.com', '$2y$10$sDyCS..7YKNXT5DCSuvNe.yFBwKx8PSARA139XFxz8ii9MZQsVKie', 44, NULL, NULL, '2018-04-30 02:15:18', '2018-04-30 02:15:18', NULL),
(49, 'smpenambelaspku@gmail.com', '$2y$10$I0kWC5huMcFP4tTBMVhVnuDD.SBPQ5/fa5bqUCA1eqdBTHknjan42', 45, NULL, NULL, '2018-04-30 04:01:38', '2018-04-30 04:01:38', NULL),
(50, 'ekaputra_armen@yahoo.com', '$2y$10$ouoElakoBMlH0N5C7B6fFeYexUb5WGIWGGe5taes617Py3mUZ1jlS', 46, NULL, NULL, '2018-05-02 00:18:18', '2018-05-02 00:18:18', NULL),
(51, 'nggroup134@gmail.com', '$2y$10$RSN9vDLBszyxaDD97f8d7.cxELyPrxHpYS4twZgZGX9wSanZ1F6nq', 47, NULL, NULL, '2018-05-09 04:13:31', '2018-05-09 04:13:31', NULL),
(52, 'mamarisna01@gmail.com', '$2y$10$/0POUkUpkaSYOazBMzku4OuyPk1sPSVvGr9Ttk1YDwhL4E0rSbgAS', 48, NULL, NULL, '2018-05-18 08:11:55', '2018-05-18 08:11:55', NULL),
(53, 'sma7pkuadiwiyata@gmail.com', '$2y$10$dVcn6RGf45OYbU80KXZxwej3upQ6ckIWqcN7M5HTsmEJsECkVjKhS', 49, NULL, NULL, '2018-05-23 05:29:59', '2018-05-23 05:29:59', NULL),
(55, 'smpijf@gmail.com', '$2y$10$fL9HimFOd86gtpyrFyrOru.oWV3LZKxWusrzFCNuNHm7HeS/iAMyW', 51, NULL, NULL, '2018-05-25 01:51:02', '2018-05-25 01:51:02', NULL),
(56, 'rikyhermanda@gmail.com', '$2y$10$qi2Lt392.SaPiWmIAc/Pdeb8eRQIj7BepLJTI0LLn3OhnmYX68T3K', 52, NULL, NULL, '2018-05-25 07:00:10', '2018-05-25 07:00:10', NULL),
(57, 'ernitatanjung47@gmail.com', '$2y$10$0sWWOxuJeuWfkZWMcxk3eeYpf.6XOpA8Mnw2I74SEIg3dK0e3Gyne', 53, NULL, NULL, '2018-05-25 12:50:28', '2018-05-25 12:50:28', NULL),
(58, 'noviarini192@gmail.com', '$2y$10$XmqPJ22RCoYOxQlKDgWC5.F9eHBFTLRyKmM3/r2DV9fWSs8kZarqi', 54, NULL, NULL, '2018-05-26 02:37:15', '2018-05-26 02:37:15', NULL),
(59, 'lestiapratiwi21@gmail.com', '$2y$10$AvI/jdvnxDSOn9LD2TGryeoJBFEReO7jckIBSvskVmR77AqXlR5uy', 55, NULL, NULL, '2018-05-26 07:19:28', '2018-05-26 07:19:28', NULL),
(60, 'eaagung@gmail.com', '$2y$10$nbmx9ZqBuFi9YYWlO2HX0Ov6rFEGawqUWIUxB43RFPKmOtGDxcWfW', 56, NULL, NULL, '2018-05-27 06:01:49', '2018-05-27 06:01:49', NULL),
(61, 'sdn25pku@gmail.com', '$2y$10$cZjuYdIyngy2gSOFNjgsleI.bNabGjfGKoqsKX/jNLtNPB9lk0vbq', 57, NULL, NULL, '2018-05-31 04:16:30', '2018-05-31 04:16:30', NULL),
(65, 'nindaelikazzz@gmail.com', '$2y$10$ASH7e/RqWVjXJN.3tQCXX.rz5g5098h0qFoCQKYyRr12FBbmzlxxq', 61, NULL, NULL, '2018-07-06 03:30:19', '2018-07-06 03:30:19', NULL),
(66, 'sdn161pku@gmail.com', '$2y$10$PFTpCDGfb78DxaRSJjux6eNtYyngao1nnyUNsFMhxm/Y0SgL67i8e', 62, NULL, NULL, '2018-07-11 03:45:31', '2018-07-11 03:45:31', NULL),
(67, 'randiilorenacandra@gmail.com', '$2y$10$J33Z4I5u2iycFP9k12ex/OKAgs4t0cdRhaaOzwpcft4VtLbMPMPnu', 63, NULL, NULL, '2018-07-11 14:03:03', '2018-07-11 14:03:03', NULL),
(68, 'dewirapelita@gmail.com', '$2y$10$bJh5mpZmDf7.a/X7WUoqlOqMptOJ8rfZS8FUH5x34ZUZXLvhE/6z.', 64, NULL, NULL, '2018-07-16 02:56:15', '2018-07-16 02:56:15', NULL),
(69, 'sdn_100@yahoo.co.id', '$2y$10$wamIy2Z4tZDFgKMRHQl6xuPHjKpY6siYj6zxsUTfMkbZcopHbYki6', 65, NULL, NULL, '2018-07-18 00:22:28', '2018-07-18 00:22:28', NULL),
(70, 'sd.negeri143pekanbaru@gmail.com', '$2y$10$bKhVty6XczemO9iSW7YIWe.bT80uh25Gd.cJJ1gPf.DLd8Imwajwi', 66, NULL, NULL, '2018-07-18 03:59:42', '2018-07-18 03:59:42', NULL),
(72, 'mts.masmurpku@gmail.com', '$2y$10$9lEQGOpfRldsQGiN5R2VaeTfGS9Oi9D6Npk4fYKOuJGJXMoeED94S', 68, NULL, NULL, '2018-07-19 01:58:48', '2018-07-19 01:58:48', NULL),
(74, 'smkn2.pku@gmail.com', '$2y$10$oA28f65xOx9rSPbk0AAnJuosCwtl7umhIuxrISXWlVFpEQu8p2gU.', 70, NULL, NULL, '2018-07-20 08:29:31', '2018-07-20 08:29:31', NULL),
(75, 'alazhar_sbp2@yahoo.com', '$2y$10$TbToc4OuNt9kfXZS9uChV.9pvdw4RhCqgsSBBkKWxgA4RF.F/3poi', 71, NULL, NULL, '2018-07-24 02:51:28', '2018-07-24 02:51:28', NULL),
(76, 'smpit.madani@gmail.com', '$2y$10$LBT80U0Iu1N5TOanI36YHOqLEA/Fp37D2vZkEoLVyMcG5907db4eO', 72, NULL, NULL, '2018-07-24 06:42:17', '2018-07-24 06:42:17', NULL),
(77, 'mamiftahulhidayah@gmail.com', '$2y$10$vGXVUwIFAiTGisfnhztI6u6bk9PK3As86uHzzl49SQQ3chk0t5qsy', 73, NULL, NULL, '2018-08-01 02:54:08', '2018-08-01 02:54:08', NULL),
(78, 'sdn18pekanbaru@yahoo.com', '$2y$10$TROE6K7eIRDnnwTUPpAdLOSErt5JDuHkojErn8Cf1YfhWjeYanQVu', 74, NULL, NULL, '2018-08-02 04:24:12', '2018-08-02 04:24:12', NULL),
(81, 'priaadi5@gmail.com', '$2y$10$XQdzBOMh5bNAg7Evo/bVBuevwd.SqCuhxHk1npc8pyOIxi4lPff0a', 77, NULL, NULL, '2018-08-07 10:23:16', '2018-08-07 10:23:16', NULL),
(82, 'owner@tdbangarna.com', '$2y$12$xVo/6mwCLQ/MjZsHOuMaL.X2o5REW8gwPPrOXblJz06Gvt8QROP5u', NULL, 4, '$2y$12$xVo/6mwCLQ/MjZsHOuMaL.X2o5REW8gwPPrOXblJz06Gvt8QROP5u', '2018-08-08 04:11:00', '2018-09-25 06:25:34', '2018-09-25 06:25:34'),
(83, 'pt.grahaunisa@gmail.com', '$2y$10$wqk4EKwAwM7tpnXaWLqfpOQmHfFtuu/Me57wlGGBIr/EfhdxfrwRG', 78, NULL, NULL, '2018-08-09 09:52:53', '2018-08-09 09:52:53', NULL),
(84, 'sdn83pekanbaru@gmail.com', '$2y$10$lKZdbT3F/XN54tJoGIjhVuu05BdSSGgSueYmlgcmFvzaiORuUSg9S', 79, NULL, NULL, '2018-08-13 00:24:39', '2018-08-13 00:24:39', NULL),
(85, 'sdn192pekanbaru@gmail.com', '$2y$10$gTX1z5SAMOYiofx1jikIW.oVWmRBcYmX4CccJk62uM9e8RDcyDFyu', 80, NULL, NULL, '2018-08-14 02:37:01', '2018-08-14 02:37:01', NULL),
(86, 'sdn94pekanbaru@yahoo.com', '$2y$10$V6fgLoErKXImb0tcdtw7aOvglC.RzlfM9GKnf1eq1mxIWHBVtURS.', 81, NULL, NULL, '2018-08-16 03:40:18', '2018-08-16 03:40:18', NULL),
(87, 'wahyunurhalim22@yahoo.com', '$2y$10$Iqt3bmqSFdEAKzD4z4/pcugb8k/FD6lotdCCxUX6uFOLvQn4Fwli6', 82, NULL, NULL, '2018-08-18 23:38:16', '2018-08-18 23:38:16', NULL),
(89, 'sdn3pku@gmail.com', '$2y$10$JHR/c5mlbRV0iiAXuv9bdeP8CZC0prIKGBnz2xO6ygUOwViBfHRHm', 84, NULL, NULL, '2018-08-23 03:40:30', '2018-08-23 03:40:30', NULL),
(90, 'sdbabussalam94@gmail.com', '$2y$10$/6rYirMdvu6drgd80O4lZuq1pICsgf694QYrDPsFhPj0VbCPzp6b6', 85, NULL, NULL, '2018-08-24 04:20:39', '2018-08-24 04:20:39', NULL),
(93, 'hazairin.hasan@gmail.com', '$2y$10$T237qoZvvW1/YBTjbjyK8OCPJifWgndbygdECaCulOgGTcWHJXW8y', 88, NULL, NULL, '2018-08-30 04:24:41', '2018-08-30 04:24:41', NULL),
(94, 'februartati@gmail.com', '$2y$10$8/cKCjUehJsgZeg9wnKQCO1Ulsp0IgIIRIsLL150RFyF4tXK/IzGe', 89, NULL, NULL, '2018-09-05 03:04:24', '2018-09-05 03:04:24', NULL),
(97, 'yayasanashowah@gmail.com', '$2y$10$y0LPscCvjvXW8hg96kyABea/mLtaSRZbi.uGjYPNMD9xo.8DGA1Jq', 92, NULL, NULL, '2018-09-06 03:48:06', '2018-09-06 03:48:06', NULL),
(98, 'eminurazmi75@gmail.com', '$2y$10$UpODG6L3IsOlj.GaUThAfea0AhZejT0wa/kM/gtHt48Rt209Zm6SO', 93, NULL, NULL, '2018-09-06 08:18:47', '2018-09-06 08:18:47', NULL),
(99, 'yeka_270283@yahoo.com', '$2y$10$5gn011kX2ojnYdpTlQT7Sefumbfmfe.J9EHetRCf6r/OmuggAPaua', 94, NULL, NULL, '2018-09-06 08:37:28', '2018-09-06 08:37:28', NULL),
(102, 'smpnegeri8pekanbaru@gmail.com', '$2y$10$dMedxV6RpR0grjkQW07BrOliQUoDxUk973zW87IOJT9uUVNtrTQ5W', 97, NULL, NULL, '2018-09-12 01:24:28', '2018-09-12 01:24:28', NULL),
(104, 'Fikisaputrapku2@gmail.com', '$2y$10$bCfpoHD5JTDEAVZPY3.C6.iieNGZ1tRUKWXLBXe5zcckt.A5bcC0q', 99, NULL, NULL, '2018-09-17 05:33:42', '2018-09-17 05:33:42', NULL),
(105, 'novianmahardikaputra@gmail.com', '$2y$10$tAHMW.ZVDM3r8201KQ4Hz.lDD6hlDp4O.b/NL5tZqerYkBHR0ptn6', 100, NULL, NULL, '2018-09-18 13:32:02', '2018-09-18 13:32:02', NULL),
(107, 'smkn6.pekanbaru@gmail.com', '$2y$10$lnoCU3q98mBq3MSM5BGc6eSq5H5nzuG2POTNvQ94TOZPHEccGmxrq', 102, NULL, NULL, '2018-09-19 03:50:11', '2018-09-19 03:50:11', NULL),
(108, 'sdmuhammadiyah3@yahoo.com', '$2y$10$FZ1nhHBSqUOqDKtzAeTPruLRrEk990b/EQrlhCpy8QqDykbOYjH/2', 103, NULL, NULL, '2018-09-19 06:36:51', '2018-09-19 06:36:51', NULL),
(109, 'insanutama_2013@yahoo.com', '$2y$10$.v7P9De22B2PKHiE8yOiIOP0H9jnyzhB4gtwMRIv4.B9hbnr8zVRO', 104, NULL, NULL, '2018-09-19 07:36:42', '2018-09-19 07:36:42', NULL),
(110, 'smpbabussalamriau@gmail.com', '$2y$10$Lh2YjYJyPjsTJjYqAeVHc.ObAxfkdP5bbnasJ9NBlZEGfQJNnPKUm', 105, NULL, NULL, '2018-09-21 03:45:53', '2018-09-21 03:45:53', NULL),
(111, 'zunnurani@gmail.com', '$2y$10$VcW7mom4tq.1qN/sGzwkS.0zVw8ZAGyrhY6VTcBpb7fRLPE4bGSmK', 106, NULL, NULL, '2018-09-21 05:24:51', '2018-09-21 05:24:51', NULL),
(119, 'sdmuhammadiyah3pekanbaru@yahoo.com', '$2y$10$K5L57r2QReo./9xbRet4P.XXjx1NWB9Lip6xsrLc8H193fRxU5VNy', 114, NULL, NULL, '2018-09-24 07:11:42', '2018-09-24 07:11:42', NULL),
(120, 'desriwahyuni83@yahoo.co.id', '$2y$10$dshrQ9xxDbtdaMOUWh/pwOKpQTliigv5PsdqfMJygvF23X3RPXocy', 115, NULL, NULL, '2018-09-24 07:46:31', '2018-09-24 07:46:31', NULL),
(121, 'trimuerisandes@gmail.com', '$2y$10$lrxIa3ZgF4jBpA3gyiS7culp87KBc9EImGM/TIRmnxoV2ldPOV9Sy', 116, NULL, NULL, '2018-09-25 05:00:51', '2018-09-25 05:00:51', NULL),
(122, 'smk_hasanah_pku@yahoo.co.id', '$2y$10$QFuQPEMqZLtKDCL9nDEr2.0Y37LqruJBtLzJiHICJqCU6D0zMhz.u', 117, NULL, NULL, '2018-09-25 05:07:05', '2018-09-25 05:07:05', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_religion_id_foreign` (`religion_id`),
  ADD KEY `customers_subinstitution_id_foreign` (`subinstitution_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donations_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_city_id_foreign` (`city_id`),
  ADD KEY `employees_division_id_foreign` (`division_id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_uploaded_employee_id_foreign` (`uploaded_employee_id`);

--
-- Indexes for table `institutions`
--
ALTER TABLE `institutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operating_costs`
--
ALTER TABLE `operating_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `religions`
--
ALTER TABLE `religions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `settings_product_id_foreign` (`product_id`),
  ADD KEY `settings_city_id_foreign` (`city_id`);

--
-- Indexes for table `subinstitutions`
--
ALTER TABLE `subinstitutions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subinstitutions_institution_id_foreign` (`institution_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_customer_id_foreign` (`customer_id`),
  ADD KEY `users_employee_id_foreign` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `institutions`
--
ALTER TABLE `institutions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `operating_costs`
--
ALTER TABLE `operating_costs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `religions`
--
ALTER TABLE `religions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `subinstitutions`
--
ALTER TABLE `subinstitutions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_religion_id_foreign` FOREIGN KEY (`religion_id`) REFERENCES `religions` (`id`);

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `employees_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`);

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_uploaded_employee_id_foreign` FOREIGN KEY (`uploaded_employee_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `settings_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `settings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `subinstitutions`
--
ALTER TABLE `subinstitutions`
  ADD CONSTRAINT `subinstitutions_institution_id_foreign` FOREIGN KEY (`institution_id`) REFERENCES `institutions` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `users_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
