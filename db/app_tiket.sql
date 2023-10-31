-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 20, 2023 at 01:07 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone
= "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin`
(
  `id` int
(11) NOT NULL,
  `username` varchar
(50) NOT NULL,
  `password` varchar
(100) NOT NULL,
  `email` varchar
(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`
id`,
`username
`, `password`, `email`, `created_at`) VALUES
(1, 'Ridho', 'admin', 'ridho.undhari@gmail.com', '2023-08-26 18:36:05');

-- --------------------------------------------------------

--
-- Table structure for table `excel`
--

CREATE TABLE `excel`
(
  `id` int
(11) NOT NULL,
  `change_id` int
(11) DEFAULT NULL,
  `request_id` int
(11) DEFAULT NULL,
  `request_status` varchar
(30) DEFAULT NULL,
  `priority` varchar
(50) DEFAULT NULL,
  `request_type` varchar
(30) DEFAULT NULL,
  `technician` varchar
(30) DEFAULT NULL,
  `site` varchar
(30) DEFAULT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON
UPDATE CURRENT_TIMESTAMP,
  `dueby_time
` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `exel`
--

CREATE TABLE `exel`
(
  `id` int
(11) NOT NULL,
  `Change_ID` varchar
(255) DEFAULT NULL,
  `Request_ID` int
(11) DEFAULT NULL,
  `Subject` varchar
(255) DEFAULT NULL,
  `Requester` varchar
(255) DEFAULT NULL,
  `Request_Status` varchar
(255) DEFAULT NULL,
  `priority` varchar
(50) DEFAULT NULL,
  `Request_Type` varchar
(100) DEFAULT NULL,
  `Technician` varchar
(100) DEFAULT NULL,
  `Site` varchar
(100) DEFAULT NULL,
  `Created_Time` varchar
(30) DEFAULT NULL,
  `DueBy_Time` varchar
(100) DEFAULT NULL,
  `Progres_Minggu_Ini` decimal
(10,0) DEFAULT NULL,
  `Proggres_Minggu_Lalu` decimal
(10,0) DEFAULT NULL,
  `Keterangan_Stopper` varchar
(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exel`
--

INSERT INTO `exel` (`
id`,
`Change_ID`,
`Request_ID`,
`Subject`,
`Requester`,
`Request_Status`,
`priority
`, `Request_Type`, `Technician`, `Site`, `Created_Time`, `DueBy_Time`, `Progres_Minggu_Ini`, `Proggres_Minggu_Lalu`, `Keterangan_Stopper`) VALUES
(548, '5038', 339706, 'Permintaan Pengembangan System Penerimaan AFR (Sekam) Aplikasi Shipment - Phase 1', 'ARNAZ WIDODO', 'In Progress - Change Request', 'P4 - Normal', 'Demand Request', 'SISI - Lusi Efrenti', 'PT. Semen Indonesia.', 'Feb 20, 2023 01:11 PM', 'Apr 28, 2023 08:32 AM', '90', '55', '\r\nmasih mikir keras'),
(549, 'Null', 377112, 'Permintaan Support Pengecekan MMID', 'RYAN RIZALDY SYAHRIAL', 'Onhold', 'P5 - Low', 'Request', 'Auguswya Syaputra', 'Solusi Bangun Indonesia.', 'Aug 23, 2023 10:04 PM', 'Sep 3, 2023 11:44 AM', NULL, NULL, NULL),
(550, 'Null', 379716, 'Permintaan Pengecekan PID Summary Regional Greater Banten Agustus 2023', 'Fitri Agus Wahyudi', 'Onhold', 'P5 - Low', 'Request', 'Auguswya Syaputra', 'Solusi Bangun Indonesia.', 'Sep 2, 2023 12:03 AM', 'Sep 12, 2023 04:09 AM', NULL, NULL, NULL),
(551, 'Null', 380886, 'Permintaan Support Pengecekan Scheduler untuk background job Plan Order barang V1 di all plant sig (3701, 4701, 5701 & 7702)', 'ISMAIL S.', 'In Progress', 'P4 - Normal', 'Request', 'SISI - Lusi Efrenti', 'PT. Semen Indonesia.', 'Sep 6, 2023 04:41 PM', 'Oct 8, 2023 01:54 PM', NULL, NULL, NULL),
(552, '5286', 382667, 'Permintaan Pengembangan Pelabelan/Penanda Material Hasil Standarisasi dan Simplifikasi', 'DELVIANTI, ST.', 'Waiting Approval ICT', 'P4 - Normal', 'Request', 'SISI - Lusi Efrenti', 'PT. Semen Indonesia.', 'Sep 14, 2023 09:23 PM', 'Oct 15, 2023 03:20 PM', NULL, NULL, NULL),
(553, '4886', 320759, 'Permintaan Penambahan Kolom Isian Lokasi Pembongkaran & SKAB Pada Menu Aplikasi Timbangan', 'SURYAT HANDOKO, ST., MT.', 'In Progress - Change Request', 'P4 - Normal', 'Request', 'Auguswya Syaputra', 'PT. Semen Indonesia.', 'Oct 24, 2022 12:54 PM', 'Feb 12, 2023 09:30 AM', NULL, NULL, NULL),
(554, '4651', 323401, 'Permintaan Pembuatan Plant MD Rilis Brand SG via PP Makassar', 'MUH. JUFRI HAMZAH, ST.', 'In Progress - Change Request', 'P4 - Normal', 'Demand Request', 'Auguswya Syaputra', 'PT. Semen Indonesia.', 'Nov 10, 2022 01:51 PM', 'Dec 15, 2022 10:27 AM', NULL, NULL, NULL),
(555, 'Null', 375677, 'Permintaan Pembuatan Dashboard Shipment Management', 'DONNY KUSBIANTORO', 'Waiting Approval', 'P4 - Normal', 'Demand Request', 'SISI - Lusi Efrenti', 'PT. Semen Indonesia.', 'Aug 16, 2023 01:56 PM', 'Oct 20, 2023 11:22 AM', NULL, NULL, NULL),
(556, 'Null', 381459, 'Permintaan Penambahan Item Text ( Spesifikasi) PO', 'YUDI MUSFUDI YANTO, ST.', 'Waiting Approval', 'P4 - Normal', 'Demand Request', 'SISI - Lusi Efrenti', 'PT. Semen Tonasa.', 'Sep 8, 2023 06:33 PM', 'Oct 12, 2023 03:21 PM', NULL, NULL, NULL),
(557, 'Null', 358341, 'Permintaan Pengembangan Aplikasi Inventory Mobile', 'RIAN DWI CAHYO, ST.', 'Waiting Approval ICT', 'P4 - Normal', 'Demand Request', 'Auguswya Syaputra', 'PT. Semen Indonesia.', 'May 29, 2023 04:28 PM', 'Jul 2, 2023 08:05 AM', NULL, NULL, NULL),
(558, 'Null', 382761, 'Permintaan Konfigurasi Release Strategy PR', 'SETYO ANDI KURNIAWAN, ST.', 'Waiting Approval', 'P4 - Normal', 'Demand Request', 'Auguswya Syaputra', 'PT. Semen Indonesia.', 'Sep 15, 2023 11:29 AM', 'Oct 18, 2023 08:15 AM', NULL, NULL, NULL),
(559, 'Null', 382802, 'Permintaan Konfigurasi Release Strategy', 'Niken Kushendarti', 'Waiting Approval', 'P4 - Normal', 'Demand Request', 'Auguswya Syaputra', 'PT. Semen Indonesia.', 'Sep 15, 2023 02:46 PM', 'Oct 18, 2023 08:43 AM', NULL, NULL, NULL),
(560, '5152', 353257, 'Permintaan Konfigurasi Planner group (unit pembuat Reservasi)', 'YUDI MUSFUDI YANTO, ST.', 'In Progress - Change Request', 'P4 - Normal', 'Demand Request', 'Auguswya Syaputra', 'PT. Semen Indonesia.', 'May 4, 2023 03:07 PM', 'Jun 19, 2023 07:49 AM', NULL, NULL, NULL),
(561, 'Null', 380868, 'Permintaan Support Pembuatan LSMW create PO Massal', 'BUDI PURNAMA', 'In Progress', 'P4 - Normal', 'Request', 'Ilham Robby Sanjaya', 'PT. Semen Indonesia.', 'Sep 6, 2023 03:55 PM', 'Oct 11, 2023 09:00 AM', NULL, NULL, NULL),
(562, '5489', 381251, 'Pembacaan Data di Tcode ZPTSC_PREXP - List of Outstding PRs for Expediting tidak sesuai (Release Date, Approval Date, Price) --> assign ke mas Putra', 'Aida Anwar', 'In Progress - Change Request', 'P5 - Low', 'Request', 'Auguswya Syaputra', 'Solusi Bangun Indonesia.', 'Sep 8, 2023 08:38 AM', 'Sep 18, 2023 08:41 AM', NULL, NULL, NULL),
(563, '5495', 382033, 'Permintaan Change Plant Name dan Shipping Point I225', 'Sabaruddin SBI', 'In Progress', 'P5 - Low', 'Request', 'Ilham Robby Sanjaya', 'Solusi Bangun Indonesia.', 'Sep 12, 2023 10:18 AM', 'Sep 22, 2023 10:37 AM', NULL, NULL, NULL),
(564, '4927', 322517, 'SES & SRS Electronic Approval via SAP', 'Rahmad Murjito', 'In Progress - Change Request', 'P5 - Low', 'Demand Request', 'SISI - Lusi Efrenti', 'Solusi Bangun Indonesia.', 'Nov 3, 2022 03:45 PM', 'Feb 24, 2023 07:22 AM', NULL, NULL, NULL),
(565, '5464', 378269, 'Permintaan Penambahan Approval PR Unit Internal Audit', 'WAHYU KURNIAWAN, ST.', 'In Progress - Change Request', 'P4 - Normal', 'Request', 'Ilham Robby Sanjaya', 'PT. Semen Gresik.', 'Aug 29, 2023 02:20 PM', 'Sep 29, 2023 08:24 PM', NULL, NULL, NULL),
(566, '5513', 382930, 'Request Renaming Plant Code I911 from \"BP Pamanukan\" TO \"BP SUBANG\"', 'Sigit Widodo SBI', 'In Progress - Change Request', 'P5 - Low', 'Request', 'Ilham Robby Sanjaya', 'Solusi Bangun Indonesia.', 'Sep 18, 2023 07:46 AM', 'Sep 28, 2023 07:47 AM', NULL, NULL, NULL),
(567, '5144', 342626, 'Permintaan Pengembangan Dashboard sales dan corsales tentang monitoring volume semen dan mortar', 'MUHAMMAD FACHRURROZY, S.Kom.', 'In Progress - Change Request', 'P4 - Normal', 'Demand Request', 'SISI - Lusi Efrenti', 'PT. Semen Indonesia.', 'Mar 3, 2023 03:50 PM', 'Apr 9, 2023 06:54 AM', NULL, NULL, NULL),
(568, '4996', 344144, 'Permintaan Penyesuain Routing Approval Baru', 'M. TRIPURWONO SJAIFULLAH, SE.', 'In Progress - Change Request', 'P4 - Normal', 'Demand Request', 'SISI - Lusi Efrenti', 'PT. Semen Indonesia.', 'Mar 13, 2023 09:50 AM', 'Apr 12, 2023 03:35 PM', NULL, NULL, NULL),
(569, '5478', 378622, 'Permintaan Routing Approval PR dan PO', 'DWIHANY SHITA APRILIYANTIE, ST.', 'In Progress - Change Request', 'P4 - Normal', 'Demand Request', 'Ilham Robby Sanjaya', 'PT. Semen Indonesia.', 'Aug 30, 2023 02:53 PM', 'Oct 2, 2023 08:01 AM', NULL, NULL, NULL),
(570, '5511', 382468, 'Permintaan Delete dan Rename Storloc di Plant I225 (SAP QAS dan PAS)', 'Sabaruddin SBI', 'In Progress - Change Request', 'P5 - Low', 'Request', 'Auguswya Syaputra', 'Solusi Bangun Indonesia.', 'Sep 14, 2023 09:54 AM', 'Sep 24, 2023 09:57 AM', NULL, NULL, NULL),
(571, '5515', 382950, 'Rubah MRP Area text untuk plant I213, I214, I225 dan I227', 'Sabaruddin SBI', 'In Progress', 'P5 - Low', 'Request', 'Auguswya Syaputra', 'Solusi Bangun Indonesia.', 'Sep 18, 2023 09:00 AM', 'Sep 28, 2023 10:54 AM', NULL, NULL, NULL),
(572, '5351', 370340, 'Permintaan Pengembangan  T-Code SAP baru', 'ISKANDAR SAMUDRA TAQWA, ST.', 'In Progress - Change Request', 'P4 - Normal', 'Request', 'Auguswya Syaputra', 'PT. Semen Indonesia.', 'Jul 24, 2023 05:04 PM', 'Aug 31, 2023 01:27 PM', NULL, NULL, NULL),
(573, '5476', 377487, 'Permintaan Penyesuaian Data Configurasi Plant 79E9 di BG GR SBI', 'IMRON ROSYADI', 'In Progress - Change Request', 'P1 - Critical', 'Request', 'Auguswya Syaputra', 'PT. Semen Indonesia.', 'Aug 25, 2023 01:39 PM', 'Oct 3, 2023 12:48 PM', NULL, NULL, NULL),
(574, '5483', 380545, 'Permintaan Penyesuaian Routing Approval PR', 'INDRA YUDHI KURNIAWAN', 'In Progress - Change Request', 'P4 - Normal', 'Demand Request', 'Auguswya Syaputra', 'PT. Semen Indonesia.', 'Sep 5, 2023 03:14 PM', 'Oct 7, 2023 02:18 PM', NULL, NULL, NULL),
(575, '5167', 356778, 'Permintaan Configuration Reservasi menjadi PR', 'Le Thi Thanh Hoa', 'In Progress - Change Request', 'P4 - Normal', 'Demand Request', 'SISI - Lusi Efrenti', 'Thang Long Cement Company', 'May 23, 2023 04:44 PM', 'Jun 24, 2023 10:09 AM', NULL, NULL, NULL),
(576, '5315', 370169, 'Permintaan Pengembangan TCode ME23N', 'Aida Anwar', 'In Progress - Change Request', 'P5 - Low', 'Demand Request', 'SISI - Lusi Efrenti', 'Solusi Bangun Indonesia.', 'Jul 24, 2023 01:58 PM', 'Aug 3, 2023 03:21 PM', NULL, NULL, NULL),
(577, '5343', 370417, 'Permintaan Pengembangan Pengiriman Informasi Inspection Report/LHP Secara Otomatis by email', 'LUTHER MANGENDONG', 'In Progress - Change Request', 'P4 - Normal', 'Demand Request', 'Auguswya Syaputra', 'PT. Semen Indonesia.', 'Jul 25, 2023 08:57 AM', 'Aug 28, 2023 02:59 PM', NULL, NULL, NULL),
(578, '5509', 382397, 'Allow Negative Stock di Plant I229 Storloc I2SN', 'Sabaruddin SBI', 'In Progress - Change Request', 'P5 - Low', 'Request', 'Ilham Robby Sanjaya', 'Solusi Bangun Indonesia.', 'Sep 13, 2023 07:12 PM', 'Sep 24, 2023 01:07 AM', NULL, NULL, NULL),
(579, '4571', 316402, 'Permintaan Pengembangan Aplikasi Create API Inbound SIG & API Outbound SIG & SBI', 'M. ERFAN AFANDI, ST.', 'In Progress - Change Request', 'P4 - Normal', 'Demand Request', 'Auguswya Syaputra', 'PT. Semen Indonesia.', 'Sep 25, 2022 01:47 PM', 'Nov 11, 2022 04:32 PM', NULL, NULL, NULL),
(580, '5148', 327684, 'Permintaan Config Perubahan Field PR dan PO', 'ADITYA MAHENDRA DION WIJAYA', 'In Progress - Change Request', 'P4 - Normal', 'Demand Request', 'Auguswya Syaputra', 'PT. Semen Padang.', 'Dec 8, 2022 04:29 PM', 'Jan 13, 2023 09:55 AM', NULL, NULL, NULL),
(581, '5350', 368410, 'Permintaan Pengembangan System Penerimaan AFR (Sekam) Aplikasi Shipment', 'ARNAZ WIDODO', 'In Progress - Change Request', 'P4 - Normal', 'Demand Request', 'SISI - Lusi Efrenti', 'PT. Semen Indonesia.', 'Jul 14, 2023 11:11 AM', 'Aug 13, 2023 03:28 PM', NULL, NULL, NULL),
(582, '5039', 344736, 'Permintaan Pengembangan System Penerimaan AFR (Sekam) Aplikasi Shipment - Phase 2', 'ARNAZ WIDODO', 'In Progress - Change Request', 'P4 - Normal', 'Demand Request', 'SISI - Lusi Efrenti', 'PT. Semen Indonesia.', 'Mar 15, 2023 12:23 PM', 'Apr 28, 2023 08:44 AM', NULL, NULL, NULL),
(583, '5475', 379196, 'Permintaan Konfigurasi Negative Stock di Plant 3819 dan 79K1', 'YANUAR ADI PRASETYO', 'In Progress - Change Request', 'P4 - Normal', 'Demand Request', 'SISI - Lusi Efrenti', 'PT. Semen Indonesia.', 'Aug 31, 2023 03:41 PM', 'Oct 2, 2023 08:15 AM', NULL, NULL, NULL),
(584, 'Null', 382990, 'Permintaan Pengecekan PO. 7100006388', 'SANDRA MARISSA', 'In Progress', 'P4 - Normal', 'Request', 'Auguswya Syaputra', 'PT. Semen Indonesia.', 'Sep 18, 2023 10:19 AM', 'Oct 18, 2023 11:29 AM', NULL, NULL, NULL),
(585, 'Null', 383106, 'Permintaan Pengecekan PO 7000044459 dan PO 7000044472', 'NOVENDRI', 'In Progress', 'P4 - Normal', 'Request', 'SISI - Lusi Efrenti', 'PT. Semen Indonesia.', 'Sep 18, 2023 01:41 PM', 'Oct 18, 2023 02:21 PM', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `history_hapus`
--

CREATE TABLE `history_hapus`
(
  `id` int
(11) NOT NULL,
  `deleted_id` int
(11) NOT NULL,
  `deletion_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history_hapus`
--

INSERT INTO `history_hapus` (`
id`,
`deleted_id
`, `deletion_date`) VALUES
(19, 300529, '2023-09-01 08:41:22'),
(20, 316402, '2023-09-01 08:41:32'),
(21, 24, '2023-09-07 10:24:21'),
(22, 26, '2023-09-07 10:29:07'),
(23, 26, '2023-09-07 10:30:13'),
(24, 37, '2023-09-07 10:51:09'),
(25, 37, '2023-09-07 10:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `pM_ict`
--

CREATE TABLE `pM_ict`
(
  `id` int
(11) NOT NULL,
  `nama` varchar
(50) NOT NULL,
  `universitas` varchar
(50) NOT NULL,
  `jenis_kelamin` enum
('Laki-Laki','Perempuan') NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `gambar` varchar
(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pM_ict`
--

INSERT INTO `pM_ict` (`
id`,
`nama
`, `universitas`, `jenis_kelamin`, `tgl_masuk`, `tgl_keluar`, `gambar`) VALUES
(75, 'ILHAMI KURNIA PUTRI', 'UPI YPTK PADANG', 'Perempuan', '2023-08-07', '2023-09-08', 'uploads/WhatsApp Image 2023-09-08 at 08.06.16.jpeg'),
(76, 'SUCI RAMADANI', 'SMK 1 SAWAHLUNTO', 'Perempuan', '2023-06-19', '2023-09-22', 'uploads/WhatsApp Image 2023-09-08 at 08.06.16.jpeg'),
(77, 'Qori', 'smk n 2 Padang Panjang', 'Laki-Laki', '2023-07-17', '2023-12-15', 'uploads/WhatsApp Image 2023-09-08 at 08.06.16.jpeg'),
(78, 'febrio fernando', 'SMKN 2 Padang Panjang', 'Laki-Laki', '2023-07-17', '2023-12-15', 'uploads/WhatsApp Image 2023-09-08 at 08.06.16.jpeg'),
(79, 'Ferdian Saputra', 'smk 2 Padang Panjang', 'Laki-Laki', '2023-07-17', '2023-12-15', 'uploads/WhatsApp Image 2023-09-08 at 08.06.16.jpeg'),
(80, 'Wulan Dari', 'Institut Teknologi Padang', 'Perempuan', '2023-08-07', '2023-09-18', 'uploads/WhatsApp Image 2023-09-08 at 08.06.16.jpeg'),
(81, 'Muhammad Zaidan', 'PNP', 'Laki-Laki', '2023-08-21', '2024-01-22', 'uploads/figma_tachibana_makoto__free_1685295548_5158adac_progressive.jpeg'),
(82, 'Puja Patrioza', 'Politeknik Negeri Padang', 'Perempuan', '2023-08-21', '2024-01-22', 'uploads/stock-vector-lovely-mermaid-with-little-turtle-vector-illustration-children-artworks-wallpapers-posters-2087716504.jpeg'),
(83, 'Vania Vikri Ramadhani', 'Politeknik Negeri Padang', 'Perempuan', '2023-08-21', '2024-01-22', 'uploads/mainimagecaramenjinakkankucingwebp-770x770.webp'),
(84, 'Ridho ', 'undhari', 'Laki-Laki', '2023-08-07', '2023-10-31', 'uploads/4ABFCC83-CE99-4A0F-9462-A227B2FC8670.svg'),
(85, 'Deva', 'Institut Teknologi Padang', 'Laki-Laki', '2023-08-07', '2023-09-15', 'uploads/IMG_5778-removebg-preview.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
ADD PRIMARY KEY
(`id`),
ADD UNIQUE KEY `unique_username`
(`username`),
ADD UNIQUE KEY `unique_email`
(`email`);

--
-- Indexes for table `excel`
--
ALTER TABLE `excel`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `exel`
--
ALTER TABLE `exel`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `history_hapus`
--
ALTER TABLE `history_hapus`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `pM_ict`
--
ALTER TABLE `pM_ict`
ADD PRIMARY KEY
(`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `excel`
--
ALTER TABLE `excel`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exel`
--
ALTER TABLE `exel`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=586;

--
-- AUTO_INCREMENT for table `history_hapus`
--
ALTER TABLE `history_hapus`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pM_ict`
--
ALTER TABLE `pM_ict`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
