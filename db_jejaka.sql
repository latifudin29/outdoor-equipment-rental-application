-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2023 at 06:25 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jejaka`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb-admin`
--

CREATE TABLE `tb-admin` (
  `id_admin` int(11) NOT NULL,
  `usrnm_admin` varchar(100) NOT NULL,
  `pw_admin` varchar(100) NOT NULL,
  `nm_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb-admin`
--

INSERT INTO `tb-admin` (`id_admin`, `usrnm_admin`, `pw_admin`, `nm_admin`) VALUES
(1, 'admin', 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb-sewa`
--

CREATE TABLE `tb-sewa` (
  `id_sewa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_sewa` date NOT NULL DEFAULT current_timestamp(),
  `tanggal_pengambilan` date DEFAULT NULL,
  `jumlah_hari` int(11) NOT NULL,
  `pengembalian` date DEFAULT NULL,
  `dikembalikan` date DEFAULT NULL,
  `status_sewa` enum('active','cancel') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb-sewa`
--

INSERT INTO `tb-sewa` (`id_sewa`, `id_user`, `tanggal_sewa`, `tanggal_pengambilan`, `jumlah_hari`, `pengembalian`, `dikembalikan`, `status_sewa`) VALUES
(2831645, 1, '2023-02-03', NULL, 1, NULL, NULL, 'active'),
(5163482, 1, '2023-01-30', '2023-01-31', 2, '2023-02-02', NULL, 'cancel'),
(6317429, 1, '2023-01-12', '2023-01-13', 1, '2023-01-14', NULL, 'cancel'),
(10425987, 3, '2023-01-19', NULL, 1, NULL, NULL, 'cancel'),
(15062438, 1, '2023-01-13', '2023-01-14', 1, '2023-01-15', NULL, 'cancel'),
(30197254, 1, '2023-01-29', '2023-01-30', 1, '2023-01-31', NULL, 'cancel'),
(45892670, 1, '2023-01-29', NULL, 2, NULL, NULL, 'cancel'),
(84961035, 1, '2023-01-30', '2023-01-31', 2, '2023-02-02', NULL, 'active'),
(89230674, 1, '2022-12-22', '2022-12-23', 1, '2022-12-24', NULL, 'active'),
(96175428, 1, '2023-01-30', '2023-01-31', 1, '2023-02-01', NULL, 'active'),
(97413806, 8, '2023-01-30', NULL, 2, NULL, NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_sewa`
--

CREATE TABLE `tb_detail_sewa` (
  `id_detail_sewa` int(11) NOT NULL,
  `id_sewa` int(11) NOT NULL,
  `nm_item` varchar(150) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tot_harga` int(11) NOT NULL,
  `status_item` enum('Bagus','Rusak') NOT NULL DEFAULT 'Bagus',
  `kembali` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_detail_sewa`
--

INSERT INTO `tb_detail_sewa` (`id_detail_sewa`, `id_sewa`, `nm_item`, `jumlah`, `tot_harga`, `status_item`, `kembali`) VALUES
(36, 6317429, '45-REI', 1, 15000, 'Bagus', 1),
(37, 15062438, '45-Tenda Dome Compass 2-3', 1, 35000, 'Bagus', 1),
(38, 10425987, '45-Tenda Dome Compass 2-3', 1, 35000, 'Bagus', 1),
(39, 45892670, '45-Tenda Dome Compass 2-3', 1, 35000, 'Bagus', 1),
(40, 30197254, '45-REI', 1, 15000, 'Bagus', 1),
(41, 89230674, '42-Tenda Dome Quechua 2-3', 1, 35000, 'Bagus', 1),
(42, 96175428, '15-Kompo Mawar', 1, 15000, 'Bagus', 0),
(43, 84961035, '45-AREI 60L', 1, 15000, 'Bagus', 0),
(44, 84961035, '42-Tenda Dome Quechua 2-3', 1, 35000, 'Bagus', 0),
(45, 5163482, '73-Eiger Rhinos 60L', 1, 20000, 'Bagus', 1),
(46, 97413806, '73-Eiger Rhinos 60L', 1, 20000, 'Bagus', 0),
(47, 2831645, '47-Lampu Sorot', 1, 25000, 'Bagus', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_items`
--

CREATE TABLE `tb_items` (
  `id_item` int(11) NOT NULL,
  `nm_item` varchar(100) NOT NULL,
  `brand_item` varchar(50) NOT NULL,
  `cat_item` varchar(50) NOT NULL,
  `prc_item` int(11) NOT NULL,
  `stk_item` int(11) NOT NULL,
  `desc_item` text NOT NULL,
  `img_item` varchar(250) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_items`
--

INSERT INTO `tb_items` (`id_item`, `nm_item`, `brand_item`, `cat_item`, `prc_item`, `stk_item`, `desc_item`, `img_item`) VALUES
(1, '42-Tenda Dome Quechua 2-3', 'Quechua MH 100 Fiber', 'Tenda', 35000, 13, 'Tenda Dome dengan kapasitas 2-3 orang', 'tenda.png'),
(2, '45-Tenda Dome Compass 2-3', 'Compass LWY Alloy', 'Tenda', 35000, 100, 'Tenda dengan Brand Compass LWY Alloy dan juga berkapasitas 2-3 Orang', 'Screenshot_20230116_115638.png'),
(3, '36-Tenda Dome Great Outdoor 3-4', 'Great Outdoor NSM 4.0', 'Tenda', 40000, 20, 'Tenda dengan Merk Great Outdoor NSM 4.0 dan berkapasitas 3-4 orang', 'tendagreatoutdoor3-4.png'),
(4, '45-AREI 60L', 'Rei', 'Carrier', 15000, 7, 'Carrier dengan kapasitas 60 L', 'carrier.png'),
(5, '15-Kompor Kotak', 'Custom by Jejaka Outdoor', 'Peralatan Masak', 10000, 10, 'Kompor dengan bentuk kotak kecil portable', 'kompor.png'),
(6, '61-Sleeping Bag Polar', 'Custom by Jejaka', 'Peralatan Tidur', 8000, 15, 'Sleeping Bag dengan bahan yang halus dan nyaman dari dingin', 'Screenshot_2023-01-30_092030.png'),
(7, '60-Head Lamp', 'Great Outdoor', 'Alat Penerangan', 8000, 13, 'Headlamp', 'default.png'),
(8, '13-Flysheet 3x3 M', 'Custom by Jejaka', 'Survival Tools', 10000, 15, 'Flysheet sebagai bahan tambahan untuk tenda', 'default.png'),
(9, '05-Tracking Pool', 'Eiger', 'Peralatan Tracking', 15000, 5, 'Tracking Pool untuk tambahan alat pendakian merk Eiger', 'default.png'),
(10, '65-Hammock', 'Custom by Jejaka', 'Alat Tambahan', 10000, 10, 'Hammock untuk alat tambahan untuk bersantai di pohon', 'default.png'),
(11, '15-Kompo Mawar', 'Custom by Jejaka', 'Peralatan Masak', 15000, 19, 'Kompor Portable dengan bentuk seperti bunga mawar', 'Screenshot_2023-01-30_091638.png'),
(12, '96-Kompor Koper', 'Custom by Jejaka', 'Peralatan Masak', 25000, 15, 'Kompor Portable dengan ukuran cukup besar bisa digunakan untuk masak porsi banyak', 'Screenshot_2023-01-30_091822.png'),
(13, '76-Matras Spoon', 'Custom by Jejaka', 'Peralatan Tidur', 4000, 100, 'Matras yang memiliki bahan spoon', 'default.png'),
(14, '02-Matras Aluminium Foil uk 180-150cm', 'Custom by Jejaka', 'Peralatan Tidur', 10000, 10, 'Matras dengan bahan aluminium foil dengan ukuran 180 x 150 cm', 'default.png'),
(15, '68-Sunature 60L', 'Sunature', 'Carrier', 15000, 5, 'Tas Carrier untuk mendaki gunung dengan kapasitas 60L', 'Screenshot_2023-01-30_090724.png'),
(16, '73-Eiger Rhinos 60L', 'Eiger', 'Carrier', 20000, 2, 'Tas Carrier brand Eiger dengan kapasitas 60L', 'Screenshot_2023-01-30_090920.png'),
(17, '47-Lampu Sorot', 'Taffware', 'Alat Penerangan', 25000, 3, 'Lampu sorot portable menggunakan baterai untuk camping dengan intensitas cahaya yang cukup memadai', 'default.png'),
(18, '76-Lampu Tenda', 'Custom by Jejaka', 'Alat Penerangan', 10000, 25, 'Lampu portable dengan baterai sebagai catu daya serta penerangan yang cukup untuk 1 malam camp', 'lamputenda.png'),
(19, '18-Flysheet 3x4m', 'Custom by Jejaka', 'Survival Tools', 12000, 5, 'Seperti terpal untuk melindungi teras camping dari hujan', 'default.png'),
(20, '01-Tiang Flysheet', 'Custom by Jejaka', 'Survival Tools', 15000, 5, 'Tiang penyangga Flysheet', 'default.png'),
(21, '65-Handglove', 'Custom by Jejaka', 'Peralatan Tracking', 7000, 10, '', 'default.png'),
(22, '16-Cover Bag', 'Custom by Jejaka', 'Alat Tambahan', 5000, 15, 'Cover Tas agar tas tidak terkena air hujan', 'default.png'),
(23, '94-Meja Lipat', 'Custom by Jejaka', 'Alat Tambahan', 25000, 10, 'Meja Portable yang bisa dibongkar pasang', 'default.png'),
(24, '40-Carrier Eiger', 'Eiger', 'Carrier', 25000, 10, 'Carrier 60L Brand Eiger', 'Screenshot_2023-01-30_090413.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kat` int(11) NOT NULL,
  `nm_kat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kat`, `nm_kat`) VALUES
(1, 'Carrier'),
(2, 'Tenda'),
(3, 'Peralatan Masak'),
(4, 'Peralatan Tidur'),
(5, 'Peralatan Tracking'),
(6, 'Alat Penerangan'),
(7, 'Survival Tools'),
(8, 'Alat Tambahan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` varchar(50) NOT NULL,
  `id_sewa` int(11) NOT NULL,
  `tgl_transaksi` varchar(20) NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_bayar` tinyint(1) NOT NULL DEFAULT 0,
  `bukti_pembayaran` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_sewa`, `tgl_transaksi`, `total_pembayaran`, `id_user`, `status_bayar`, `bukti_pembayaran`) VALUES
('09378', 89230674, '2022-12-22', 35000, 1, 1, 'sertifikat_course_86_1757872_170222091823_pdf_1.jpg'),
('09831', 6317429, '', 15000, 1, 4, NULL),
('45802', 45892670, '', 70000, 1, 4, NULL),
('52803', 5163482, '2023-01-30', 40000, 1, 1, 'WhatsApp_Image_2023-01-30_at_10_05_16.jpg'),
('57943', 10425987, '', 35000, 3, 4, NULL),
('58376', 2831645, '', 25000, 1, 0, NULL),
('71985', 84961035, '2023-01-30', 100000, 1, 1, 'Coursera_BZM45Q4V97T9_pdf_11.jpg'),
('92065', 96175428, '2023-01-30', 15000, 1, 1, 'Coursera_BZM45Q4V97T9_pdf_1.jpg'),
('93087', 30197254, '2023-01-29', 15000, 1, 4, 'Troubleshooting_and_Debugging_Techniques_pdf_1.jpg'),
('96083', 15062438, '2023-01-13', 35000, 1, 4, 'file0351.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `fname_user` varchar(100) DEFAULT NULL,
  `usrnm_user` varchar(30) NOT NULL,
  `pw_user` varchar(250) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `nik_user` varchar(25) DEFAULT NULL,
  `addr_user` text DEFAULT NULL,
  `gnd_user` varchar(20) DEFAULT NULL,
  `tmplh_user` varchar(25) DEFAULT NULL,
  `tgl_user` varchar(15) DEFAULT '00-00-0000',
  `nohp1_user` varchar(20) DEFAULT NULL,
  `nohp2_user` varchar(20) DEFAULT NULL,
  `img_ktp` varchar(250) DEFAULT 'defaultktp.png',
  `img_kk` varchar(250) DEFAULT 'defaultkk.png',
  `img_user` varchar(250) DEFAULT 'defaultav.png',
  `type_user` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `valid_user` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `fname_user`, `usrnm_user`, `pw_user`, `email_user`, `nik_user`, `addr_user`, `gnd_user`, `tmplh_user`, `tgl_user`, `nohp1_user`, `nohp2_user`, `img_ktp`, `img_kk`, `img_user`, `type_user`, `status`, `valid_user`) VALUES
(1, 'Rochman Setiono', 'rochmans26', '$2y$10$d80uSTbTsWx2Sje0fB4bBOccx/jO8uA1MYc3W9nq0tpjO772YPIR.', 'rochmansetiono26@gmail.com', '321321321232', 'Komp. Cibogo Indah', 'Laki-laki', 'Bandung', '1998-10-26', '089622162615', '', 'defaultktp.png', 'defaultkk.png', 'ppweb1.jpg', 'enduser', 1, 1),
(2, '', 'richman26', '$2y$10$5s332pgS3gPRgh3jqAlsVuKfFBsKtUCt4r/tPkXEl5PkUPBf6PgPu', 'richie.pay26@gmail.com', '', '', '', '', '', '', '', 'defaultktp.png', 'defaultkk.png', 'defaultav.png', 'enduser', 1, 1),
(3, '', 'irwin17', '$2y$10$lijR/Imq5nMmumq0OpzX8ePrdFdmOKM/ep5QDEkA9MGx2vPXZIvdW', 'daku.irwin@gmail.com', '', '', '', '', '', '', '', 'defaultktp.png', 'defaultkk.png', 'defaultav.png', 'enduser', 1, 1),
(6, 'Muharam Ismu', 'is_muuw', '$2y$10$w4Oxbmo1MAfV01KDgn4.R.CZNNtDLfyrt7mtiNH5lC4coIcA8dUqu', 'muharam.ismu@gmail.com', '321312132131321', 'Jl. Kiara Artha', 'Laki-laki', 'Bandung', '1993-10-19', '0873652132131', '', 'defaultktp.png', 'defaultkk.png', 'defaultav.png', 'enduser', 1, 1),
(7, NULL, 'latif29', '$2y$10$au/ZA3jbmLmI9MslUj7hKOR44..44S3hkEqs3yVsyD59pdZ8sTevC', 'latifshiunick@gmail.com', NULL, NULL, NULL, NULL, '00-00-0000', NULL, NULL, 'defaultktp.png', 'defaultkk.png', 'defaultav.png', 'enduser', 0, 1),
(8, NULL, 'test123', '$2y$10$IrT3VRct/gpeRAcpttfXoOjj1.9EaiWXK4D/RJsKDtU6PAfdF5liu', 'latifudinm29@gmail.com', NULL, NULL, NULL, NULL, '00-00-0000', NULL, NULL, 'defaultktp.png', 'defaultkk.png', 'defaultav.png', 'enduser', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb-admin`
--
ALTER TABLE `tb-admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb-sewa`
--
ALTER TABLE `tb-sewa`
  ADD PRIMARY KEY (`id_sewa`);

--
-- Indexes for table `tb_detail_sewa`
--
ALTER TABLE `tb_detail_sewa`
  ADD PRIMARY KEY (`id_detail_sewa`);

--
-- Indexes for table `tb_items`
--
ALTER TABLE `tb_items`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb-admin`
--
ALTER TABLE `tb-admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_detail_sewa`
--
ALTER TABLE `tb_detail_sewa`
  MODIFY `id_detail_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tb_items`
--
ALTER TABLE `tb_items`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
