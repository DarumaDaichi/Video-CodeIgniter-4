-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Des 2020 pada 10.04
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_restoran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblkategori`
--

CREATE TABLE `tblkategori` (
  `idkategori` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblkategori`
--

INSERT INTO `tblkategori` (`idkategori`, `kategori`, `keterangan`) VALUES
(31, 'Drinks', 'Segala macam minuman'),
(32, 'Snacks', 'Camilan Enak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblmenu`
--

CREATE TABLE `tblmenu` (
  `idmenu` int(11) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `harga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblmenu`
--

INSERT INTO `tblmenu` (`idmenu`, `idkategori`, `menu`, `keterangan`, `gambar`, `harga`) VALUES
(17, 31, 'Kopi Susu', '', 'milk-tea.png', 5000),
(18, 31, 'Nutrisari Jeruk Manis', '', 'gaby.jpg', 1281930),
(19, 31, 'Rotiku', '', 'gaby.jpg', 232412),
(20, 31, 'asdsa', '', 'menu.png', 213213),
(21, 31, 'SADASD', '', 'brooke-1.jpg', 12131);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblorder`
--

CREATE TABLE `tblorder` (
  `idorder` int(11) NOT NULL,
  `idpelanggan` int(11) NOT NULL,
  `tglorder` date NOT NULL,
  `total` float NOT NULL DEFAULT 0,
  `bayar` float NOT NULL DEFAULT 0,
  `kembali` float DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblorder`
--

INSERT INTO `tblorder` (`idorder`, `idpelanggan`, `tglorder`, `total`, `bayar`, `kembali`, `status`) VALUES
(1, 1, '2020-02-11', 150000, 500000, 350000, 1),
(2, 1, '2020-02-11', 100000, 600000, 500000, 1),
(3, 1, '2020-02-11', 108000, 8000000, 7892000, 1),
(4, 2, '2020-02-12', 750000, 10000000, 9250000, 1),
(5, 2, '2020-02-12', 300000, 450000, 150000, 1),
(10, 2, '2020-10-15', 20000, 300000, 280000, 1),
(11, 1, '2020-10-15', 20000, 50000, 30000, 1),
(12, 1, '2020-10-15', 200000, 300000, 100000, 1),
(13, 1, '2020-11-24', 15000, 0, 0, 0),
(14, 1, '2020-11-24', 15000, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblorderdetail`
--

CREATE TABLE `tblorderdetail` (
  `idorderdetail` int(11) NOT NULL,
  `idorder` int(11) NOT NULL,
  `idmenu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hargajual` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblorderdetail`
--

INSERT INTO `tblorderdetail` (`idorderdetail`, `idorder`, `idmenu`, `jumlah`, `hargajual`) VALUES
(3, 1, 14, 3, 50000),
(4, 2, 14, 2, 50000),
(5, 3, 12, 9, 12000),
(6, 4, 14, 15, 50000),
(7, 5, 14, 6, 50000),
(8, 6, 15, 9, 50000),
(9, 7, 14, 11, 50000),
(10, 8, 14, 13, 50000),
(11, 9, 14, 1, 50000),
(12, 10, 15, 1, 20000),
(13, 11, 15, 1, 20000),
(14, 12, 15, 10, 20000),
(15, 13, 17, 3, 5000),
(16, 14, 17, 3, 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblpelanggan`
--

CREATE TABLE `tblpelanggan` (
  `idpelanggan` int(11) NOT NULL,
  `pelanggan` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telpon` varchar(100) NOT NULL,
  `email` varchar(155) NOT NULL,
  `password` varchar(150) NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblpelanggan`
--

INSERT INTO `tblpelanggan` (`idpelanggan`, `pelanggan`, `alamat`, `telpon`, `email`, `password`, `aktif`) VALUES
(1, 'Daruma Daichi', 'jl.Mana Aja', '089898989', 'd@d.com', '123', 1),
(2, 'Rudi', 'jlmanaaja', '12345', 'r@r.com', '123', 1),
(4, 'Daruma Kun', 'JLmana aja', '089892', 'f@f.com', '123', 1),
(5, 'joni', 'jasdas', '1234', 'd@d.com', '123', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbluser`
--

CREATE TABLE `tbluser` (
  `iduser` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL,
  `aktif` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbluser`
--

INSERT INTO `tbluser` (`iduser`, `user`, `email`, `password`, `level`, `aktif`) VALUES
(9, 'adminku', 'a@a.com', '$2y$10$D2aygjj1WF5hwDcRUeRQBOwjpMFcn6YkdA0.VmPKjM4tiLtCQoBDa', 'Admin', 1),
(10, 'adminlur', 'f@f.com', '123', 'Admin', 1);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vorder`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vorder` (
`idorder` int(11)
,`idpelanggan` int(11)
,`tglorder` date
,`total` float
,`bayar` float
,`kembali` float
,`status` int(11)
,`pelanggan` varchar(100)
,`alamat` varchar(200)
,`telpon` varchar(100)
,`email` varchar(155)
,`password` varchar(150)
,`aktif` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vorderdetail`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vorderdetail` (
`idorderdetail` int(11)
,`idorder` int(11)
,`idmenu` int(11)
,`jumlah` int(11)
,`hargajual` float
,`idkategori` int(11)
,`menu` varchar(100)
,`gambar` varchar(200)
,`harga` float
,`kategori` varchar(100)
,`idpelanggan` int(11)
,`tglorder` date
,`total` float
,`bayar` float
,`kembali` float
,`status` int(11)
,`pelanggan` varchar(100)
,`alamat` varchar(200)
,`telpon` varchar(100)
,`email` varchar(155)
,`password` varchar(150)
,`aktif` int(11)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `vorder`
--
DROP TABLE IF EXISTS `vorder`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vorder`  AS  select `tblorder`.`idorder` AS `idorder`,`tblorder`.`idpelanggan` AS `idpelanggan`,`tblorder`.`tglorder` AS `tglorder`,`tblorder`.`total` AS `total`,`tblorder`.`bayar` AS `bayar`,`tblorder`.`kembali` AS `kembali`,`tblorder`.`status` AS `status`,`tblpelanggan`.`pelanggan` AS `pelanggan`,`tblpelanggan`.`alamat` AS `alamat`,`tblpelanggan`.`telpon` AS `telpon`,`tblpelanggan`.`email` AS `email`,`tblpelanggan`.`password` AS `password`,`tblpelanggan`.`aktif` AS `aktif` from (`tblpelanggan` join `tblorder` on(`tblpelanggan`.`idpelanggan` = `tblorder`.`idpelanggan`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vorderdetail`
--
DROP TABLE IF EXISTS `vorderdetail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vorderdetail`  AS  select `tblorderdetail`.`idorderdetail` AS `idorderdetail`,`tblorderdetail`.`idorder` AS `idorder`,`tblorderdetail`.`idmenu` AS `idmenu`,`tblorderdetail`.`jumlah` AS `jumlah`,`tblorderdetail`.`hargajual` AS `hargajual`,`tblmenu`.`idkategori` AS `idkategori`,`tblmenu`.`menu` AS `menu`,`tblmenu`.`gambar` AS `gambar`,`tblmenu`.`harga` AS `harga`,`tblkategori`.`kategori` AS `kategori`,`tblorder`.`idpelanggan` AS `idpelanggan`,`tblorder`.`tglorder` AS `tglorder`,`tblorder`.`total` AS `total`,`tblorder`.`bayar` AS `bayar`,`tblorder`.`kembali` AS `kembali`,`tblorder`.`status` AS `status`,`tblpelanggan`.`pelanggan` AS `pelanggan`,`tblpelanggan`.`alamat` AS `alamat`,`tblpelanggan`.`telpon` AS `telpon`,`tblpelanggan`.`email` AS `email`,`tblpelanggan`.`password` AS `password`,`tblpelanggan`.`aktif` AS `aktif` from ((((`tblorderdetail` join `tblorder` on(`tblorderdetail`.`idorder` = `tblorder`.`idorder`)) join `tblpelanggan` on(`tblorder`.`idpelanggan` = `tblpelanggan`.`idpelanggan`)) join `tblmenu` on(`tblorderdetail`.`idmenu` = `tblmenu`.`idmenu`)) join `tblkategori` on(`tblmenu`.`idkategori` = `tblkategori`.`idkategori`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tblkategori`
--
ALTER TABLE `tblkategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indeks untuk tabel `tblmenu`
--
ALTER TABLE `tblmenu`
  ADD PRIMARY KEY (`idmenu`);

--
-- Indeks untuk tabel `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`idorder`);

--
-- Indeks untuk tabel `tblorderdetail`
--
ALTER TABLE `tblorderdetail`
  ADD PRIMARY KEY (`idorderdetail`);

--
-- Indeks untuk tabel `tblpelanggan`
--
ALTER TABLE `tblpelanggan`
  ADD PRIMARY KEY (`idpelanggan`);

--
-- Indeks untuk tabel `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tblkategori`
--
ALTER TABLE `tblkategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `tblmenu`
--
ALTER TABLE `tblmenu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `idorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tblorderdetail`
--
ALTER TABLE `tblorderdetail`
  MODIFY `idorderdetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tblpelanggan`
--
ALTER TABLE `tblpelanggan`
  MODIFY `idpelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
