-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2020 pada 15.05
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fajar_tour_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(20) NOT NULL,
  `paket_travel_id` int(11) NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `paket_travel_id`, `image`) VALUES
(29, 1, '5ee8789289949.jpg'),
(52, 2, '5ee8bdf4d1a41.jpg'),
(53, 2, '5ee8be007109a.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_travel`
--

CREATE TABLE `paket_travel` (
  `id` bigint(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `location` varchar(256) NOT NULL,
  `about` varchar(256) NOT NULL,
  `keberangkatan` varchar(128) NOT NULL,
  `duration` varchar(123) NOT NULL,
  `orang` varchar(123) NOT NULL,
  `destination` varchar(256) NOT NULL,
  `fasilitas` varchar(256) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket_travel`
--

INSERT INTO `paket_travel` (`id`, `title`, `location`, `about`, `keberangkatan`, `duration`, `orang`, `destination`, `fasilitas`, `harga`) VALUES
(1, 'Liburan Ke Puncak', 'indonesia', 'gffhgfgh', 'Requested', '4d', '40', 'fsfdsfds', 'dfdsfds', 45000),
(2, 'Liburan Ke Bandung', 'indonesia', 'asdsadas', 'Requested', '4d 3n', '50', 'dsd', 'sdddsa', 50000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_transaksi` int(11) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `paket_travel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(234) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_telp` varchar(128) NOT NULL,
  `image` varchar(256) NOT NULL,
  `roles` varchar(123) NOT NULL DEFAULT 'user',
  `password` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email`, `no_telp`, `image`, `roles`, `password`) VALUES
(9, '', 'dessafri', 'safrides@gmail.com', '', '', '', '$2y$10$LhlIBaH9UQWP9AxohuUVTOU0oxqKT4xz9SNJFy0WcqnsVnKpg4ADy');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paket_travel`
--
ALTER TABLE `paket_travel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `paket_travel`
--
ALTER TABLE `paket_travel`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
