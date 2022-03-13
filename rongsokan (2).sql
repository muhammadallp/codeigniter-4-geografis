-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jan 2022 pada 08.34
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rongsokan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `brg_bekas`
--

CREATE TABLE `brg_bekas` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `data_create` date NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `brg_bekas`
--

INSERT INTO `brg_bekas` (`id`, `nama`, `nohp`, `latitude`, `longitude`, `data_create`, `image`) VALUES
(10, 'TPST', '082392234688', '-1.3570958855490223', '100.5757105346129', '2022-01-12', 'tpst.jpg'),
(11, 'TPS Skala Kota Painan', '08126786642', '-1.3214751541718281', '100.5568313598633', '2022-01-12', 'tpsskp.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`category_id`, `category_name`) VALUES
(2, 'tembaga'),
(3, 'besi'),
(4, 'plastik'),
(5, 'almanium'),
(6, 'kertas'),
(7, 'kardus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pel` int(11) NOT NULL,
  `nama_pen` varchar(100) NOT NULL,
  `nohp_pel` int(11) NOT NULL,
  `latitude_pel` varchar(255) NOT NULL,
  `longitude_pel` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pel`, `nama_pen`, `nohp_pel`, `latitude_pel`, `longitude_pel`, `tanggal`) VALUES
(1, 'alip', 823232323, '-1.3473049425555415', '100.5771160160657', '2022-01-13'),
(2, 'asdasd', 213123123, '-1.3552533976935932', '100.57754516688874', '2022-01-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_pen` int(11) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `brg_bekas_id` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_pen`, `pelanggan_id`, `produk_id`, `brg_bekas_id`, `berat`, `gambar`) VALUES
(1, 1, 1, 11, 12, 'tpsskp.jpg'),
(2, 2, 1, 11, 12, 'tpst.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`product_id`, `product_name`, `product_price`, `product_category_id`, `deskripsi`, `image`) VALUES
(1, 'besi tua', 4000, 3, 'barang bekas rongsokan', 'besi.jpg'),
(2, 'almunium', 100000, 5, 'barang bekas rongsokan', 'almunium.jpg'),
(3, 'kardus', 2300, 7, 'barang bekas rongsokan', 'kardus.jpg'),
(4, 'plastik', 800, 4, 'barang bekas rongsokan', 'plastik.jpg'),
(5, 'tembaga', 70000, 2, 'barang bekas rongsokan', 'tembaga.PNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `role` int(11) NOT NULL,
  `salt` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `data_create` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `role`, `salt`, `image`, `data_create`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b50061b9fa8bb404e3.83526197', 'admin', 1, '61b9fa8bb404e3.83526197', 'default.jpg', '2021-12-15'),
(2, 'alip', '0192023a7bbd73250516f069df18b50061bb48d8a53478.22293462', 'alip', 2, '61bb48d8a53478.22293462', 'default.jpg', '2021-12-16');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `brg_bekas`
--
ALTER TABLE `brg_bekas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pel`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_pen`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`product_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `brg_bekas`
--
ALTER TABLE `brg_bekas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_pen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
