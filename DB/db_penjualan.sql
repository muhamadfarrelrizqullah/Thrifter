-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2023 pada 09.43
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `qty`, `gambar`, `id`) VALUES
(1, 'Varsity Jacket', 400000, 0, 'jacket.jpg', 5),
(2, 'Varsity Jacket', 200000, 0, 'var2.jpg', 5),
(3, 'Varsity Jacket', 250000, 0, 'var3.jpg', 1),
(4, 'Varsity Jacket', 200000, 0, 'var4.jpg', 5),
(5, 'Varsity Jacket', 300000, 0, 'var5.png', 1),
(7, 'Coach Jacket', 150000, 0, 'coach1.jpg', 1),
(8, 'Parka Jacket', 450000, 0, 'parka1.jpg', 1),
(10, 'Bomber', 200000, 1, 'bomber.jpg', 1),
(11, 'Varsity', 300000, 0, 'jaket-varsity-raglan.jpg', 2),
(12, 'Jersey Vintage', 250000, 1, 'jersey.jpg', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `waktu_beli` datetime DEFAULT current_timestamp(),
  `status_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`id_history`, `id`, `id_barang`, `alamat`, `waktu_beli`, `status_bayar`) VALUES
(2, 1, 1, 'Sidoarjo', '2023-06-29 07:54:40', 1),
(7, 1, 2, 'Purwoasri', '2022-12-06 13:00:36', 0),
(8, 1, 8, 'Purwositi', '2022-12-07 17:56:00', 0),
(10, 1, 4, 'Purwosari', '2022-12-08 10:01:30', 0),
(11, 5, 5, 'Purwoasri', '2023-06-29 09:24:46', 1),
(12, 5, 11, 'Mojokerto', '2023-06-05 13:49:37', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `person_type` varchar(20) NOT NULL,
  `jk` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `person`
--

INSERT INTO `person` (`id`, `nama`, `email`, `password`, `person_type`, `jk`) VALUES
(1, 'Iqballeee', 'user2@gmail.com', '123', 'user', 'l'),
(2, 'MartisK', 'admin@gmail.com', '123', 'admin', 'l'),
(3, 'Martis', 'admin2@gmail.com', 'admin', 'admin', 'l'),
(5, 'Azis Sabar', 'user@gmail.com', '123', 'user', 'l');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `id` (`id`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id`) REFERENCES `person` (`id`);

--
-- Ketidakleluasaan untuk tabel `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`id`) REFERENCES `person` (`id`),
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
