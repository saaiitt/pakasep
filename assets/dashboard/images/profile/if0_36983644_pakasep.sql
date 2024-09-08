-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql105.infinityfree.com
-- Waktu pembuatan: 14 Agu 2024 pada 03.26
-- Versi server: 10.6.19-MariaDB
-- Versi PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_36983644_pakasep`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_jawaban`
--

CREATE TABLE `riwayat_jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `jawaban` varchar(1000) NOT NULL,
  `persen` varchar(50) NOT NULL,
  `kerusakan` varchar(128) NOT NULL,
  `id_user` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `riwayat_jawaban`
--

INSERT INTO `riwayat_jawaban` (`id_jawaban`, `waktu`, `jawaban`, `persen`, `kerusakan`, `id_user`) VALUES
(1, '2023-06-03 14:01:33', 'G13 G14 G15 G16 G17 G18 G19', '42.86', 'Unipolar', 'biodata647ae5459acd7'),
(2, '2023-06-03 14:02:01', 'G01 G14 G15 G02 G04 G24 G25 G26', '23.53', 'Bipolar II', 'biodata647ae56122894'),
(3, '2023-06-03 14:02:40', 'G01 G03 G09 G10 G19 G20 G02 G04 G23 G25', '44.44', 'Siklomatia', 'biodata647ae585ebb3c'),
(4, '2024-07-24 20:12:51', 'G23 G28', '33.33', 'Rapid Cycle', 'biodata66a0fdcf9a08c'),
(5, '2024-07-27 19:26:09', 'G05 G23', '33.33', 'Rapid Cycle', 'biodata66a4e75960177'),
(6, '2024-07-27 19:26:10', 'G05 G23', '33.33', 'Rapid Cycle', 'biodata66a4e75960177'),
(7, '2024-07-27 20:47:28', 'G28', '16.67', 'Rapid Cycle', 'biodata66a4fa6bde189'),
(8, '2024-07-27 23:48:12', 'G25 G26 G27', '33.33', 'Rapid Cycle', 'biodata66a524c74bfd3'),
(9, '2024-07-27 23:48:13', 'G25 G26 G27', '33.33', 'Rapid Cycle', 'biodata66a524c74bfd3'),
(10, '2024-07-28 00:15:34', 'G04 G23', '16.67', 'Rapid Cycle', 'biodata66a52b30ab9c8'),
(11, '2024-07-31 11:59:51', 'G17 G19 G28', '28.57', 'Unipolar', 'biodata66a9c4c006139'),
(12, '2024-08-05 10:26:15', 'G01 G02', '100', 'Saluran kelistrikan ada yang terputus ke ECU ', 'biodata66b046533b3be'),
(13, '2024-08-05 10:26:16', 'G01 G02', '100', 'Saluran kelistrikan ada yang terputus ke ECU ', 'biodata66b046533b3be');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`) VALUES
(2, 'administrator', '202cb962ac59075b964b07152d234b70'),
(3, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `konten` text NOT NULL,
  `gambar` varchar(125) NOT NULL,
  `slug` varchar(225) NOT NULL,
  `pembuat` varchar(125) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gejala`
--

CREATE TABLE `tb_gejala` (
  `id_gejala` int(11) NOT NULL,
  `gejala` varchar(300) NOT NULL,
  `kode_gejala` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_gejala`
--

INSERT INTO `tb_gejala` (`id_gejala`, `gejala`, `kode_gejala`) VALUES
(59, 'Motor susah dihidupkan baik dengan elektrik starter maupun secara manual ', 'G01'),
(60, 'Tenaga yang dihasilkan lemah ', 'G02'),
(61, 'Mesin cepat panas ', 'G03'),
(62, 'Keluar asap putih dari knalpot ', 'G04'),
(63, 'Timbul suara berisik / berdecit ', 'G05'),
(64, 'Keluar asap hitam pada knalpot ', 'G06'),
(65, 'Bahan bakar boros ', 'G07'),
(66, 'Saat dihidupkan dengan dengan elektrik starter, tidak ada bunyi atau reaksi sama sekali ', 'G08'),
(67, 'Dinamo starter panas ', 'G09'),
(68, 'Suara kasar pada dinamo starter ', 'G10'),
(69, 'Voltase dan arus tidak stabil', 'G11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kerusakan`
--

CREATE TABLE `tb_kerusakan` (
  `id_kerusakan` int(11) NOT NULL,
  `kode_kerusakan` varchar(5) NOT NULL,
  `nama_kerusakan` varchar(60) NOT NULL,
  `penjelasan` varchar(5000) NOT NULL,
  `gejala` varchar(5000) NOT NULL,
  `penanganan` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_kerusakan`
--

INSERT INTO `tb_kerusakan` (`id_kerusakan`, `kode_kerusakan`, `nama_kerusakan`, `penjelasan`, `gejala`, `penanganan`) VALUES
(6, 'K01', 'Saluran kelistrikan ada yang terputus ke ECU ', 'Saluran kelistrikan ada yang terputus, ini mempengaruhi pasokan arus ke ECU  dan coil yang diperlukan untuk memercikan api pada busi. ', 'G01', 'Mencari saluran elektrik yang putus atau sikring yang putus dari bagian elektrik starter, baterai, dan kelistrikan seputar ECU. '),
(7, 'K02', 'Ring piston aus', 'Keausan pada ring piston dan terjadi lecet/beret pada silinder ', 'G01 G02 G03 G04', 'Mengganti satu set blok silinder, karena motot tipe ini harus selalu standart ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rule`
--

CREATE TABLE `tb_rule` (
  `id_rule` int(11) NOT NULL,
  `kode_rule` varchar(5) NOT NULL,
  `kode_gejala` varchar(1000) NOT NULL,
  `kode_kerusakan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_rule`
--

INSERT INTO `tb_rule` (`id_rule`, `kode_rule`, `kode_gejala`, `kode_kerusakan`) VALUES
(6, 'R01', 'G01', 'K01'),
(7, 'R02', 'G01 G02 G03 G04', 'K02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_slide`
--

CREATE TABLE `tb_slide` (
  `id` int(11) NOT NULL,
  `gambar` varchar(125) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `umur` varchar(40) NOT NULL,
  `jenis_kelamin` varchar(40) NOT NULL,
  `no_kk` varchar(125) NOT NULL,
  `telp` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `uniq_id` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `umur`, `jenis_kelamin`, `no_kk`, `telp`, `alamat`, `uniq_id`) VALUES
(2, 'Rizqi Oktafiani', '24', 'Perempuan', '24556869564645645654', '081218436055', 'dsg dsg dfgdfgdfgdf gdfg dfg dfgdfg', 'biodata647ae56122894'),
(3, 'Chandra winata kusumawardana', '25', 'Laki-Laki', '34234324234324234324', '081218436055', 'Bantul selatan', 'biodata647ae585ebb3c'),
(4, '', '', 'Laki-Laki', '', '', '', 'biodata66a0ef0b71f3c'),
(5, 'Annas Imanulhaq', '32', 'Laki-Laki', '32323232323323', '323232323', 'saasasas', 'biodata66a0fdcf9a08c'),
(6, 'Sasen', '17', 'Laki-Laki', '1231312312312', '1', 'jkt', 'biodata66a4e5efe83e0'),
(7, 'Sasen', '17', 'Laki-Laki', '1231312312312', '1', 'jkt', 'biodata66a4e5f068d18'),
(8, 'Sasen', '18', 'Laki-Laki', '423423432432', '2342423', '123adsas', 'biodata66a4e75960177'),
(9, '', '', 'Laki-Laki', '', '', '', 'biodata66a4fa6bde189'),
(10, '', '', 'Laki-Laki', '', '', '', 'biodata66a524c74bfd3'),
(11, '', '', 'Laki-Laki', '', '', '', 'biodata66a52517d15c5'),
(12, '', '', 'Laki-Laki', '', '', '', 'biodata66a52b30ab9c8'),
(13, 'Sahid Kusuma', '', 'Perempuan', '', '121', 'Pabuaran', 'biodata66a9c4c006139'),
(14, 'Sahid Kusuma', '', 'Laki-Laki', '', '', 'Pabuaran', 'biodata66b045491a159'),
(15, '', '', 'Laki-Laki', '', '', '', 'biodata66b046533b3be');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `riwayat_jawaban`
--
ALTER TABLE `riwayat_jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_gejala`
--
ALTER TABLE `tb_gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indeks untuk tabel `tb_kerusakan`
--
ALTER TABLE `tb_kerusakan`
  ADD PRIMARY KEY (`id_kerusakan`);

--
-- Indeks untuk tabel `tb_rule`
--
ALTER TABLE `tb_rule`
  ADD PRIMARY KEY (`id_rule`);

--
-- Indeks untuk tabel `tb_slide`
--
ALTER TABLE `tb_slide`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `riwayat_jawaban`
--
ALTER TABLE `riwayat_jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_gejala`
--
ALTER TABLE `tb_gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `tb_kerusakan`
--
ALTER TABLE `tb_kerusakan`
  MODIFY `id_kerusakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_rule`
--
ALTER TABLE `tb_rule`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_slide`
--
ALTER TABLE `tb_slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
