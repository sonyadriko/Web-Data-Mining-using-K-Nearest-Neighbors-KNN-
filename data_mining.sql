-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Bulan Mei 2022 pada 15.43
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_mining`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `atribut`
--

CREATE TABLE `atribut` (
  `id_atribut` int(11) NOT NULL,
  `nama_atribut` varchar(100) NOT NULL,
  `status_atribut` varchar(100) NOT NULL,
  `nilai` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `atribut`
--

INSERT INTO `atribut` (`id_atribut`, `nama_atribut`, `status_atribut`, `nilai`, `keterangan`) VALUES
(1, 'Age', 'diketahui', 'numerik', 'Umur pasien'),
(2, 'Year', 'diketahui', 'numerik', 'Tahun dilaksanakan operasi'),
(3, 'Axillary', 'diketahui', 'numerik', 'Jumlah axillary pasien'),
(4, 'Survival Status', 'dicari', 'klasifikasi', 'Status Kelangsungan Hidup');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_training`
--

CREATE TABLE `data_training` (
  `id_datatraining` int(11) NOT NULL,
  `age` double NOT NULL,
  `year` double NOT NULL,
  `axillary` double NOT NULL,
  `survival_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_training`
--

INSERT INTO `data_training` (`id_datatraining`, `age`, `year`, `axillary`, `survival_status`) VALUES
(1, 30, 62, 3, 1),
(2, 30, 65, 0, 1),
(3, 31, 59, 2, 1),
(4, 31, 65, 4, 1),
(5, 33, 58, 10, 1),
(6, 33, 60, 0, 1),
(7, 34, 59, 0, 2),
(8, 34, 66, 9, 2),
(9, 34, 58, 30, 1),
(10, 34, 60, 1, 1),
(11, 34, 61, 10, 1),
(12, 34, 67, 7, 1),
(13, 34, 60, 0, 1),
(14, 35, 64, 13, 1),
(15, 35, 63, 0, 1),
(16, 36, 60, 1, 1),
(17, 36, 69, 0, 1),
(18, 37, 60, 0, 1),
(19, 37, 63, 0, 1),
(20, 37, 58, 0, 1),
(21, 37, 59, 6, 1),
(22, 37, 60, 15, 1),
(23, 37, 63, 0, 1),
(24, 38, 69, 21, 2),
(25, 38, 59, 2, 1),
(26, 38, 60, 0, 1),
(27, 38, 60, 0, 1),
(28, 38, 62, 3, 1),
(29, 38, 64, 1, 1),
(30, 38, 66, 0, 1),
(31, 38, 66, 11, 1),
(32, 38, 60, 1, 1),
(33, 38, 67, 5, 1),
(34, 39, 66, 0, 2),
(35, 39, 63, 0, 1),
(36, 39, 67, 0, 1),
(37, 39, 58, 0, 1),
(38, 39, 59, 2, 1),
(39, 39, 63, 4, 1),
(40, 40, 58, 2, 1),
(41, 40, 58, 0, 1),
(42, 40, 65, 0, 1),
(43, 41, 60, 23, 2),
(44, 41, 64, 0, 2),
(45, 41, 67, 0, 2),
(46, 41, 58, 0, 1),
(47, 41, 59, 8, 1),
(48, 41, 59, 0, 1),
(49, 41, 64, 0, 1),
(50, 41, 69, 8, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `nama`, `username`, `password`) VALUES
(1, 'admin', 'admin', '0192023a7bbd73250516f069df18b500'),
(2, 'sony adi adriko', 'sony', 'ab37ef761177c0aeb730e1d10cbced5c');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `atribut`
--
ALTER TABLE `atribut`
  ADD PRIMARY KEY (`id_atribut`);

--
-- Indeks untuk tabel `data_training`
--
ALTER TABLE `data_training`
  ADD PRIMARY KEY (`id_datatraining`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `atribut`
--
ALTER TABLE `atribut`
  MODIFY `id_atribut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `data_training`
--
ALTER TABLE `data_training`
  MODIFY `id_datatraining` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
