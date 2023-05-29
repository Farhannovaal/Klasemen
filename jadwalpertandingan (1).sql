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
-- Struktur dari tabel `jadwalpertandingan`
--

CREATE TABLE `jadwalpertandingan` (
  `id` int(11) NOT NULL,
  `team1` varchar(100) NOT NULL,
  `team2` varchar(100) NOT NULL,
  `ScoreTeam1` int(11) NOT NULL,
  `ScoreTeam2` int(11) NOT NULL,
  `pointTeam1` int(11) NOT NULL,
  `pointTeam2` int(11) NOT NULL,
  `totalMain` int(11) NOT NULL,
  `statusTeam1` enum('Menang','Kalah') NOT NULL,
  `statusTeam2` enum('Menang','Kalah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwalpertandingan`
--

INSERT INTO `jadwalpertandingan` (`id`, `team1`, `team2`, `ScoreTeam1`, `ScoreTeam2`, `pointTeam1`, `pointTeam2`, `totalMain`, `statusTeam1`, `statusTeam2`) VALUES
(35, 'Persib Bandung', 'Bali United', 2, 2, 1, 1, 0, 'Menang', 'Menang');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwalpertandingan`
--
ALTER TABLE `jadwalpertandingan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwalpertandingan`
--
ALTER TABLE `jadwalpertandingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
