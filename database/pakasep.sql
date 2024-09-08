-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 04, 2023 at 12:21 PM
-- Server version: 8.0.30
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sp_roselina`
--

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_jawaban`
--

CREATE TABLE `riwayat_jawaban` (
  `id_jawaban` int NOT NULL,
  `waktu` datetime NOT NULL,
  `jawaban` varchar(1000) NOT NULL,
  `persen` varchar(50) NOT NULL,
  `penyakit` varchar(128) NOT NULL,
  `id_user` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayat_jawaban`
--

INSERT INTO `riwayat_jawaban` (`id_jawaban`, `waktu`, `jawaban`, `persen`, `penyakit`, `id_user`) VALUES
(1, '2023-06-03 14:01:33', 'G13 G14 G15 G16 G17 G18 G19', '42.86', 'Unipolar', 'biodata647ae5459acd7'),
(2, '2023-06-03 14:02:01', 'G01 G14 G15 G02 G04 G24 G25 G26', '23.53', 'Bipolar II', 'biodata647ae56122894'),
(3, '2023-06-03 14:02:40', 'G01 G03 G09 G10 G19 G20 G02 G04 G23 G25', '44.44', 'Siklomatia', 'biodata647ae585ebb3c');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`) VALUES
(2, 'administrator', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id` int NOT NULL,
  `judul` varchar(225) NOT NULL,
  `konten` text NOT NULL,
  `gambar` varchar(125) NOT NULL,
  `slug` varchar(225) NOT NULL,
  `pembuat` varchar(125) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gejala`
--

CREATE TABLE `tb_gejala` (
  `id_gejala` int NOT NULL,
  `gejala` varchar(300) NOT NULL,
  `kode_gejala` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_gejala`
--

INSERT INTO `tb_gejala` (`id_gejala`, `gejala`, `kode_gejala`) VALUES
(1, 'Pernah merasa memiliki energi lebih besar dan sangat bersemangat untuk melakukan aktivitas sekurangnya 7 hari berturut-turut', 'G01'),
(2, 'Merasa sangat senang hampir setiap saat selama 7 hari atau lebih', 'G03'),
(3, 'Merasa mudah marah', 'G05'),
(4, 'Mengalami kesulitan untuk tidur/tidur tidak teratur', 'G08'),
(5, 'Lebih banyak berbicara dari biasanya', 'G09'),
(6, 'Mengalami peningkatan aktivitas yang positif', 'G10'),
(7, 'Mengalami distractibility (yaitu mudah mengalihkan perhatian terhadap rangsangan dari luar yang tidak berkaitan)', 'G11'),
(8, 'Gejala yang dirasakan cukup berat dan dapat mengganggu aktivitas sehari hari', 'G12'),
(9, 'Mengalami Halusinasi', 'G13'),
(10, 'Merasa tertekan hampir setiap hari', 'G14'),
(11, 'Tidak memiliki minat/kesenangan secara nyata', 'G15'),
(12, 'Berat badan menurun atau meningkat secara drastis', 'G16'),
(13, 'Nafsu makan berkurang atau meningkat', 'G17'),
(14, 'Merasa gelisah, jengkel, dan marah yang pada umumnya dapat membuat Anda mondar mandir atau meremas remas tangan tanpa henti setiap hari', 'G18'),
(15, 'Merasa lelah berlebihan atau kehilangan energi hampir setia hari', 'G19'),
(16, 'Merasa tidak dihargai atau merasa bersalah yang berlebihan atau tidak berguna setiap hari', 'G20'),
(17, 'Memiliki upaya untuk bunuh diri', 'G21'),
(18, 'Tidak merasakan sedih yang tidak wajar (misal: tidak merasa sedih terhadap kematian orang dicintai atau kehilangan hewan yang disayangi)', 'G22'),
(19, 'Pernah merasa memiliki energi lebih besar dan sangat bersemangat untuk melakukan aktivtas sekurangnya 4 hari berturut-turut', 'G02'),
(20, 'Merasa sangat senang hampir setiap saat sekurangnya 4 hari secara berturut-turut', 'G04'),
(21, 'Sulit berkonsentrasi', 'G23'),
(22, 'Merasa mudah sakit hati', 'G06'),
(23, 'Mengalami mudah terbawa perasaan', 'G07'),
(24, 'Memiliki dorongan seksual yang rendah', 'G24'),
(25, 'Lebih agresif', 'G25'),
(26, 'Perubahan suasana hati yang berubah ubah setiap hari', 'G26'),
(27, 'Suka mengonsumsi obat-obatan', 'G27'),
(28, 'Mudah Menangis', 'G28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyakit`
--

CREATE TABLE `tb_penyakit` (
  `id_penyakit` int NOT NULL,
  `kode_penyakit` varchar(5) NOT NULL,
  `nama_penyakit` varchar(60) NOT NULL,
  `penjelasan` varchar(5000) NOT NULL,
  `gejala` varchar(5000) NOT NULL,
  `penanganan` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_penyakit`
--

INSERT INTO `tb_penyakit` (`id_penyakit`, `kode_penyakit`, `nama_penyakit`, `penjelasan`, `gejala`, `penanganan`) VALUES
(1, 'P01', 'Bipolar I', 'Bipolar I', 'Bipolar I', 'Penanganan Bipolar I'),
(2, 'P02', 'Bipolar II', 'Bipolar II', 'Bipolar II', 'Penanganan Bipolar II'),
(3, 'P03', 'Unipolar', 'Unipolar', 'Unipolar', 'Penanganan Unipolar'),
(4, 'P04', 'Siklomatia', 'Siklomatia', 'Siklomatia', 'Penanganan Siklomatia'),
(5, 'P05', 'Rapid Cycle', 'Rapid Cycle', 'Rapid Cycle', 'Penanganan Rapid Cycle');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rule`
--

CREATE TABLE `tb_rule` (
  `id_rule` int NOT NULL,
  `kode_rule` varchar(5) NOT NULL,
  `kode_gejala` varchar(1000) NOT NULL,
  `kode_penyakit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_rule`
--

INSERT INTO `tb_rule` (`id_rule`, `kode_rule`, `kode_gejala`, `kode_penyakit`) VALUES
(1, 'R01', 'G01 G03 G05 G08 G09 G10 G11 G12 G13 G14 G15 G16 G17 G18 G19 G20 G21 G22 G23', 'P01'),
(2, 'R02', 'G02 G04 G08 G09 G10 G11 G12 G14 G15 G16 G17 G18 G19 G20 G21 G22 G23', 'P02'),
(3, 'R03', 'G08 G12 G16 G17 G19 G20 G23', 'P03'),
(4, 'R04', 'G06 G07 G16 G17 G19 G20 G23 G24 G25', 'P04'),
(5, 'R05', 'G05 G08 G26 G27 G28 G23', 'P05');

-- --------------------------------------------------------

--
-- Table structure for table `tb_slide`
--

CREATE TABLE `tb_slide` (
  `id` int NOT NULL,
  `gambar` varchar(125) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int NOT NULL,
  `nama` varchar(125) NOT NULL,
  `umur` varchar(40) NOT NULL,
  `jenis_kelamin` varchar(40) NOT NULL,
  `no_kk` varchar(125) NOT NULL,
  `telp` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `uniq_id` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `umur`, `jenis_kelamin`, `no_kk`, `telp`, `alamat`, `uniq_id`) VALUES
(1, 'Ahmad Subadri', '23', 'Laki-Laki', '324324234234', '23423423423', '4324324324234', 'biodata647ae5459acd7'),
(2, 'Rizqi Oktafiani', '24', 'Perempuan', '24556869564645645654', '081218436055', 'dsg dsg dfgdfgdfgdf gdfg dfg dfgdfg', 'biodata647ae56122894'),
(3, 'Chandra winata kusumawardana', '25', 'Laki-Laki', '34234324234324234324', '081218436055', 'Bantul selatan', 'biodata647ae585ebb3c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `riwayat_jawaban`
--
ALTER TABLE `riwayat_jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `tb_rule`
--
ALTER TABLE `tb_rule`
  ADD PRIMARY KEY (`id_rule`);

--
-- Indexes for table `tb_slide`
--
ALTER TABLE `tb_slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `riwayat_jawaban`
--
ALTER TABLE `riwayat_jawaban`
  MODIFY `id_jawaban` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  MODIFY `id_gejala` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  MODIFY `id_penyakit` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_rule`
--
ALTER TABLE `tb_rule`
  MODIFY `id_rule` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_slide`
--
ALTER TABLE `tb_slide`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
