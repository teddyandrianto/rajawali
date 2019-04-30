-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Apr 2019 pada 08.34
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rajawali`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(20) NOT NULL,
  `rekening` varchar(30) NOT NULL,
  `nama_rekening` varchar(30) NOT NULL,
  `logo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_bank`
--

INSERT INTO `tbl_bank` (`id_bank`, `nama_bank`, `rekening`, `nama_rekening`, `logo`) VALUES
(1, 'BCA', '1623-1627-17', 'PT.AUMDDY', 'bca.png'),
(2, 'BRI', '0102-25-172861-20-9', 'PT.AUMDDY', 'bri.png'),
(3, 'BNI', '172-819-0099', 'PT.AUMDDY', 'bni.png'),
(4, 'Mandiri', '718-09-9120007-2', 'PT.AUMDDY', 'mandiri.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `gambar` varchar(20) NOT NULL,
  `berat` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `harga_beli`, `harga_jual`, `stok`, `id_kategori`, `deskripsi`, `gambar`, `berat`) VALUES
(1, 'Baldwin Fillter Oil', 160000, 20000, 12, 1, 'Genuine Parts and OEM Products For Toyota, Hino, Mitsubishi, Nissan.', 'file_1556259710.jpg', 4),
(2, 'Crankshaft Assy', 58000, 80000, 78, 2, 'Spare part truck dan suku cadang truk Dapat digunakan untuk spare part truk brand  Toyota , Nissan, Mitsubishi, Hino Truck.', 'file_1556259720.jpg', 1),
(3, 'Engine Overhaul Kit', 46000, 78000, 80, 2, 'Suku cadang truck bergaransi bagian suku cadang truck Vacum brake.', 'file_1556259727.jpg', 1),
(4, 'EngineTiming Gear', 575000, 624000, 8, 3, 'Genuine Parts and OEM Parts Suitable for Toyota, Hino, NIssan, Mitsubishi Available various brand.', 'file_1556259743.jpg', 4),
(5, 'Flywheel Clutch Set', 280000, 360000, 54, 4, 'SH Fly wheel Clutch Shoe Spring Center Nut Set for RC Nitro.', 'file_1556259774.jpg', 0.6),
(6, 'Flywhell Housing', 15620000, 18568000, 3, 5, ' HOUSING FLYWHEEL HINO 500 11308-E0J91 ASLI HINO', 'file_1556259786.jpg', 4),
(7, 'Liner Piston Kit', 125000, 208900, 50, 3, 'Suku cadang truck bergaransi bagian suku cadang truck Vacum brake.', 'file_1556259799.jpg', 0.3),
(8, 'Oil Seal Kit', 266000, 356000, 68, 1, 'Produk ready stock dan siyap kirim Oil seal Kit dari ukuran.', 'file_1556259811.jpg', 1),
(9, 'Rocker Cover', 112000, 125000, 24, 5, 'Harga untuk 1 set (4pcs)', 'file_1556259821.jpg', 0.5),
(10, 'Rod and Piston Kid', 708000, 961000, 4, 3, 'RACK END, LONG TIE ROD, SOCKET KIT TIE ROD UNTUK NISSAN', 'file_1556259835.jpg', 1),
(11, 'Auger Faw-Vw', 1590000, 1855000, 8, 6, 'Auger melengkapi alat berat untuk menangani aplikasi pembuatan lubang tiang, seperti untuk pagar, pijakan, rambu-rambu, pohon, dan semak-semak dalam pekerjaan konstruksi, pertanian, dan pertamanan.', 'file_1556259851.jpg', 4),
(12, 'Auger TMB', 1759000, 2149000, 7, 6, 'Max. Power 1.4Kw/6500rpm, Discharge 51.7cc, Bit Diameter 200mm6.', 'file_1556259863.jpg', 4),
(13, 'Bale Spear Kuku Ganda', 1880000, 2637000, 7, 6, 'Ideal untuk tumpukan jerami, baik bundar maupun persegi serta material tumpukan lain dalam aplikasi pertanian.', 'file_1556259876.jpg', 4),
(14, 'Bale Spear Kuku Tunggal', 179000, 2452000, 7, 6, 'Ideal untuk tumpukan jerami, baik bundar maupun persegi serta material tumpukan lain dalam aplikasi pertanian', 'file_1556259886.jpg', 4),
(15, 'Compactor CPV16', 4500000, 6650000, 2, 6, 'Compactor dirancang khusus untuk semua operasi pemadatan.', 'file_1556259898.jpg', 4),
(16, 'Coupler c4', 570000, 700000, 5, 5, '<p>Coupler mengganti work tool dengan cepat dan mudah dalam hitungan detik.</p>', 'file_1556259908.jpg', 4),
(17, 'Ripper Mini', 1670000, 1820000, 9, 6, 'Gigi Ripper memecah tanah dan es yang keras.', 'file_1556259924.jpg', 4),
(18, 'Mulcher a', 59000000, 87000000, 2, 6, '<p>Mulcher ideal untuk pemotongan dan pemulsaan tanaman dan semak secara efisien.</p>', 'file_1556259942.jpg', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_carousel`
--

CREATE TABLE `tbl_carousel` (
  `id_carousel` int(11) NOT NULL,
  `judul` varchar(20) NOT NULL,
  `deskripsi` varchar(80) NOT NULL,
  `link` longtext NOT NULL,
  `gambar` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_carousel`
--

INSERT INTO `tbl_carousel` (`id_carousel`, `judul`, `deskripsi`, `link`, `gambar`) VALUES
(1, 'Sewa Alat Berat', 'Penyewaan Alat berat ', 'http://localhost/rajawali/ecommerce/barang/2', 'carosel3.png'),
(2, 'Sewa Alat Berat', 'Penyewaan Alat berat ', 'http://localhost/rajawali/ecommerce/barang/3', 'carosel1.png'),
(3, 'Sewa Alat Berat', 'Penyewaan Alat berat ', 'http://localhost/rajawali/ecommerce/barang/1', 'carosel2.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_transaksi`
--

CREATE TABLE `tbl_detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detail_transaksi`
--

INSERT INTO `tbl_detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `id_barang`, `jumlah_beli`, `harga_jual`, `harga_beli`, `waktu`) VALUES
(2, 2, 2, 1, 100000, 75000, '2019-04-13 23:52:59'),
(9, 2, 3, 1, 150000, 130000, '2019-04-14 01:59:04'),
(14, 2, 4, 4, 220000, 200000, '2019-04-14 02:22:07'),
(16, 3, 16, 3, 100000, 85000, '2019-04-14 03:48:20'),
(17, 3, 15, 1, 6000, 4000, '2019-04-14 03:48:33'),
(21, 4, 2, 1, 100000, 75000, '2019-04-17 01:12:57'),
(22, 4, 12, 1, 100000, 75000, '2019-04-17 01:19:15'),
(23, 5, 2, 3, 100000, 75000, '2019-04-25 15:27:15'),
(25, 6, 3, 2, 150000, 130000, '2019-04-25 16:19:47'),
(27, 7, 2, 2, 80000, 58000, '2019-04-27 09:41:54'),
(28, 7, 12, 1, 2149000, 1759000, '2019-04-27 09:42:34'),
(29, 8, 10, 1, 961000, 708000, '2019-04-27 10:38:19'),
(30, 9, 17, 1, 1820000, 1670000, '2019-04-27 11:46:49'),
(31, 9, 11, 1, 1855000, 1590000, '2019-04-27 11:47:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori_barang`
--

CREATE TABLE `tbl_kategori_barang` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori_barang`
--

INSERT INTO `tbl_kategori_barang` (`id_kategori`, `kategori`) VALUES
(1, 'Oil'),
(2, 'Gear'),
(3, 'Piston'),
(4, 'Flywheel'),
(5, 'Cover Gear'),
(6, 'Mulcher');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `no_resi` varchar(20) NOT NULL,
  `pengiriman` varchar(30) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `bank` int(10) NOT NULL,
  `waktu` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_user`, `total_bayar`, `no_resi`, `pengiriman`, `ongkir`, `bank`, `waktu`, `status`) VALUES
(2, 1, 2606000, '', 'jne, OKE', 1476000, 2, '2019-05-08 03:44:27', 1),
(3, 1, 646000, 'JNT00192', 'tiki, REG', 340000, 4, '2019-04-14 03:49:17', 4),
(4, 1, 425000, '', 'jne, OKE', 225000, 3, '2019-04-25 15:20:34', 3),
(5, 1, 708000, '', 'pos, Paket Kilat Khusus', 408000, 4, '2019-04-25 15:27:28', 3),
(6, 1, 844000, 'JNE01092033', 'pos, Paket Kilat Khusus', 544000, 1, '2019-04-26 01:59:38', 4),
(7, 30, 2801000, 'RA435', 'jne, REG', 492000, 3, '2019-04-27 09:44:08', 5),
(8, 30, 1022000, '', 'pos, Paket Kilat Khusus', 61000, 3, '2019-04-27 10:39:37', 2),
(9, 32, 4323000, '', 'jne, REG', 648000, 1, '2019-04-27 11:47:45', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(33) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kota_id` int(11) NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `alamat` longtext NOT NULL,
  `telpon` varchar(13) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama`, `kota_id`, `provinsi_id`, `alamat`, `telpon`, `status`) VALUES
(1, 'wawan@mail.com', 'c68acc0ee0f89ca360c6566a72b45dc3', 'wawan', 149, 9, 'jl.Cilandak no 99', '08522286861', 2),
(2, 'teddy@mail.com', '962b2d2b8e72dc6771bca613d49b46fb', 'Teddy Andrianto', 1, 1, 'JL.Ckioneng no 999', '08522286865', 1),
(20, 'elgorithm69@gmail.com', 'f90690e3c7de4452470c5f84120cd12f', 'darma', 168, 12, 'djfh', '123123123', 2),
(27, 'rifkifauzi309@gmail.com', '2a5c4c5a5ba1c332279685ddec507cd9', 'rifki', 79, 9, 'jl.bekasi', '08536565334', 2),
(28, 'andrianto.teddy@gmail.com', '870fa8ee962d90af50c7eaed792b075a', 'ted', 149, 9, 'jl.cilandak', '085222286863', 2),
(30, 'pringless@gmail.com', '784598c389dd3bdda924a234536e18bf', 'Pringless', 318, 32, 'Jl. Padang No 12 Rt /Rw 14/15', '081386129123', 2),
(31, 'rifkifus@mail.com', 'd103a5993fc6e4d0227916f5e9963ad2', 'Rifkifus cahyoni driantos', 370, 11, 'jalan sukamiskin no.3', '08123456789', 2),
(32, 'codi@mail.com', '547ea1ce04c68f6bda9e2da0d1f253f5', 'codi', 399, 10, 'jalan virarindu no.3', '08123456789', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tbl_carousel`
--
ALTER TABLE `tbl_carousel`
  ADD PRIMARY KEY (`id_carousel`);

--
-- Indeks untuk tabel `tbl_detail_transaksi`
--
ALTER TABLE `tbl_detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`);

--
-- Indeks untuk tabel `tbl_kategori_barang`
--
ALTER TABLE `tbl_kategori_barang`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_bank`
--
ALTER TABLE `tbl_bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_carousel`
--
ALTER TABLE `tbl_carousel`
  MODIFY `id_carousel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_detail_transaksi`
--
ALTER TABLE `tbl_detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori_barang`
--
ALTER TABLE `tbl_kategori_barang`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
