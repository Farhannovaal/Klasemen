-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Bulan Mei 2023 pada 06.28
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pertandingan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `klasemen1`
--

CREATE TABLE `klasemen1` (
  `id` int(11) NOT NULL,
  `namaKlub` varchar(100) NOT NULL,
  `Main` int(11) NOT NULL,
  `Menang` int(11) NOT NULL,
  `Seri` int(11) NOT NULL,
  `Kalah` int(11) NOT NULL,
  `GoalMenang` int(11) NOT NULL,
  `GoalKalah` int(11) NOT NULL,
  `Point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `klasemen1`
--

INSERT INTO `klasemen1` (`id`, `namaKlub`, `Main`, `Menang`, `Seri`, `Kalah`, `GoalMenang`, `GoalKalah`, `Point`) VALUES
(78, 'Persib Bandung', 4, 0, 1, 3, 7, 8, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `klasemen1`
--
ALTER TABLE `klasemen1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `klasemen1`
--
ALTER TABLE `klasemen1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
