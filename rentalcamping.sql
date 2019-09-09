-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2017 at 03:56 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalcamping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nama_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`) VALUES
(1, 'maulana', 'maulana', 'Maulana Amsor Sidik'),
(2, 'admin', 'admin', 'Admin RC');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `jenis_brg` enum('Tenda','Alat Pribadi','Alat Masak','Alat Komunikasi') NOT NULL,
  `stok` int(4) NOT NULL,
  `harga` int(11) NOT NULL,
  `kapasitas` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_brg`, `nama_brg`, `jenis_brg`, `stok`, `harga`, `kapasitas`, `foto`) VALUES
(4, 'MERAPI MOUNTAIN MILKY WAY', 'Tenda', 9, 60000, '8 orang', '7026663_c5ba5606-8337-11e4-98bf-29994908a8c2.jpg'),
(6, 'EIGER TRANSFORMER 3', 'Tenda', 10, 85000, '10 orang', 'eiger_tranform_3.jpg'),
(10, 'Tenda LS', 'Tenda', 0, 50000, '8 orang', 'Tenda-K2_3Posti.jpg'),
(13, 'Tenda Dome Greatoutdors', 'Tenda', 7, 75000, '8 orang', 'Kap_8[1] (2).jpg'),
(14, 'Tenda Dom Rei', 'Tenda', 8, 55000, '6 orang', 'Kap_8[1].jpg'),
(15, 'Tenda Pramuka', 'Tenda', 10, 50000, '10 orang', 'Tenda_Regu_Pramuka[1].jpg'),
(16, 'Tenda Ropi', 'Tenda', 5, 250000, '20 orang', 'dsc04534copy.jpg'),
(17, 'FlySheet', 'Tenda', 10, 10000, '3 x 4', 'fs.jpg'),
(18, 'Headlamp Pelican', 'Alat Pribadi', 13, 5000, '2 baterai', 'pelican-best-high-lumen-led-camping-headlamp.jpg'),
(19, 'Kompor Oxone', 'Alat Masak', 25, 15000, '-', 'Kompor_kemping.jpg'),
(20, 'Sleeping Bag', 'Alat Pribadi', 50, 4000, '-', '41YS-FgI--L_grande.jpg'),
(21, 'Ransel 70 L', 'Alat Pribadi', 14, 18000, '-', '17176640_8e70d2c6-2ba0-422b-a9cd-0abac8492675.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_penyewa` int(11) NOT NULL,
  `id_sewa` int(11) NOT NULL,
  `tgl_ambilbrg` date NOT NULL,
  `denda` int(11) NOT NULL,
  `total_biaya` int(11) NOT NULL,
  `status_antar` enum('Antar','Tidak Antar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_penyewa`, `id_sewa`, `tgl_ambilbrg`, `denda`, `total_biaya`, `status_antar`) VALUES
(2, 168, 11, '2017-07-04', 1320000, 2660000, 'Antar'),
(3, 168, 11, '2017-07-05', 2640000, 3980000, 'Antar'),
(4, 171, 18, '2017-07-13', 700000, 1050000, 'Tidak Antar'),
(5, 168, 20, '2017-07-20', 2330000, 2796000, 'Tidak Antar');

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

CREATE TABLE `penyewa` (
  `id_penyewa` int(11) NOT NULL,
  `nama_penyewa` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `ktp` varchar(16) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `usia` int(3) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_rek` varchar(25) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyewa`
--

INSERT INTO `penyewa` (`id_penyewa`, `nama_penyewa`, `username`, `password`, `ktp`, `alamat`, `no_telepon`, `usia`, `tgl_lahir`, `no_rek`, `foto`) VALUES
(168, 'Maulana Amsor S', 'maulanaamsors02', 'amsor', '9888123212', 'Tb.Ismail dalam no.39           ', '085659305808', 19, '1996-10-02', '121212123345', 'IMG_20160731_130609.jpg'),
(169, 'Irvan Nugraha', 'irvan', 'irvan1234', '98881232312', 'Jl. Kubang Sari No.99', '087723987796', 0, '1996-07-02', '0', '-'),
(170, 'Maulana Amsor S', 'maulanaas', 'maulana1234', '9999923123', 'Cimahi Bandung, No.22', '085659305808', 0, '1996-10-02', '0', '-'),
(171, 'heruamilin', 'heruamilin23', '12345', '083546554696575', 'majalengka ', '081312616135', 22, '1995-05-15', '12321323', '4920.jpg'),
(172, 'e', 'maulanaamsors02', 'amsor', '123', 'ban', '0999', 0, '2017-07-14', '0', '-');

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` int(11) NOT NULL,
  `id_penyewa` int(11) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `uang_muka` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL,
  `konfirmasi` enum('Y','T','H') NOT NULL,
  `status_sewa` enum('disewa','booking','dikembalikan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `id_penyewa`, `tgl_sewa`, `tgl_pengembalian`, `uang_muka`, `total_harga`, `bukti_pembayaran`, `konfirmasi`, `status_sewa`) VALUES
(11, 168, '2017-07-01', '2017-07-03', 100000, 1320000, 'img1.jpg', 'H', 'dikembalikan'),
(14, 168, '2017-07-05', '2017-07-07', 100000, 940000, '-', 'Y', 'dikembalikan'),
(15, 171, '2017-07-04', '2017-07-06', 15000, 1005000, 'img1.jpg', 'Y', 'dikembalikan'),
(17, 168, '2017-07-13', '2017-07-14', 100000, 220000, '-', 'Y', 'dikembalikan'),
(18, 171, '2017-07-13', '2017-07-15', 10000, 350000, 'Gambar-Wallpaper-Monkey-de-Luffy-One-Piece-Terlengkap301.png', 'Y', 'dikembalikan'),
(19, 171, '2017-07-13', '2017-07-14', 20000, 460000, '-', 'T', 'booking'),
(20, 168, '2017-07-13', '2017-07-15', 10000, 466000, '-', 'Y', 'dikembalikan'),
(21, 168, '2017-07-21', '2017-07-23', 100000, 340000, '-', 'Y', 'disewa');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_penyewaan`
--

CREATE TABLE `transaksi_penyewaan` (
  `no_faktur` int(11) NOT NULL,
  `id_penyewa` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `jml_brg` int(4) NOT NULL,
  `biaya_sewa` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `keterangan_antar` enum('Antar','Tidak Antar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_penyewaan`
--

INSERT INTO `transaksi_penyewaan` (`no_faktur`, `id_penyewa`, `id_brg`, `jml_brg`, `biaya_sewa`, `total`, `keterangan_antar`) VALUES
(11, 168, 16, 1, 250000, 1320000, 'Antar'),
(11, 168, 19, 5, 75000, 1320000, 'Antar'),
(11, 168, 13, 5, 375000, 1320000, 'Antar'),
(14, 168, 4, 6, 360000, 940000, 'Antar'),
(14, 168, 19, 10, 150000, 940000, 'Antar'),
(15, 171, 16, 2, 500000, 1005000, 'Antar'),
(17, 168, 4, 5, 300000, 220000, 'Antar'),
(18, 171, 6, 2, 170000, 350000, 'Antar'),
(19, 171, 4, 2, 120000, 460000, 'Antar'),
(19, 171, 6, 4, 340000, 460000, 'Antar'),
(20, 168, 4, 2, 120000, 466000, 'Antar'),
(20, 168, 21, 6, 108000, 466000, 'Antar'),
(21, 168, 4, 2, 120000, 340000, 'Antar'),
(21, 168, 19, 6, 90000, 340000, 'Antar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `pengembalian_ibfk_2` (`id_penyewa`),
  ADD KEY `pengembalian_ibfk_3` (`id_sewa`);

--
-- Indexes for table `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`id_penyewa`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `sewa_ibfk_1` (`id_penyewa`);

--
-- Indexes for table `transaksi_penyewaan`
--
ALTER TABLE `transaksi_penyewaan`
  ADD KEY `id_penyewa` (`id_penyewa`),
  ADD KEY `id_brg` (`id_brg`),
  ADD KEY `no_faktur` (`no_faktur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `id_penyewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;
--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_2` FOREIGN KEY (`id_penyewa`) REFERENCES `transaksi_penyewaan` (`id_penyewa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengembalian_ibfk_3` FOREIGN KEY (`id_sewa`) REFERENCES `sewa` (`id_sewa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `sewa_ibfk_1` FOREIGN KEY (`id_penyewa`) REFERENCES `penyewa` (`id_penyewa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_penyewaan`
--
ALTER TABLE `transaksi_penyewaan`
  ADD CONSTRAINT `transaksi_penyewaan_ibfk_1` FOREIGN KEY (`id_penyewa`) REFERENCES `penyewa` (`id_penyewa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_penyewaan_ibfk_2` FOREIGN KEY (`id_brg`) REFERENCES `barang` (`id_brg`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_penyewaan_ibfk_3` FOREIGN KEY (`no_faktur`) REFERENCES `sewa` (`id_sewa`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
