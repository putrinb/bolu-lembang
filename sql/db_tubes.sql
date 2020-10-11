-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2020 at 07:22 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tubes`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `kode_bb` varchar(10) NOT NULL,
  `nama_bahan` char(50) DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`kode_bb`, `nama_bahan`, `satuan`, `status`) VALUES
('BB001', 'Tepung', 'kg', 1),
('BB002', 'Cokelat', 'kg', 1),
('BB003', 'Keju', 'kg', 1),
('BB004', 'Telur', 'kg', 1),
('BB005', 'Margarin', 'kg', 1),
('BB006', 'Gula', 'kg', 1),
('BB007', 'Susu', 'liter', 1),
('BB008', 'Air', 'liter', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_transaksi_pembelian` int(11) NOT NULL,
  `kode_bb` varchar(10) NOT NULL,
  `id_supplier` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `no_faktur` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_transaksi_pembelian`, `kode_bb`, `id_supplier`, `jumlah`, `harga_satuan`, `no_faktur`) VALUES
(85, 'BB005', 'S-025', 10, 19800, 'PBL-001'),
(91, 'BB001', 'S-031', 7, 12300, 'PBL-005'),
(92, 'BB005', 'S-031', 9, 11900, 'PBL-005');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(10) NOT NULL,
  `nm_karyawan` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `pend` varchar(30) NOT NULL,
  `gaji_pokok` varchar(30) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nm_karyawan`, `alamat`, `no_telp`, `tgl_lahir`, `pend`, `gaji_pokok`, `status`) VALUES
('123', 'udin', 'bbc', '0834127549', '2020-02-03', 'sd', '1500000', 0),
('890', 'lili', 'ciganitri', '086567534', '2020-02-14', 'smk', '2500000', 1),
('ID001', 'Yasmin', 'Sukabirus', '08494382947', '2000-07-05', 'Sarjana', '550000', 1),
('ID005', 'Amanda', 'Bandung Barat', '0862891829', '2000-12-02', 'Diploma', '1000000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `no_faktur` varchar(25) NOT NULL,
  `id_supplier` varchar(20) NOT NULL,
  `waktu_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`no_faktur`, `id_supplier`, `waktu_transaksi`) VALUES
('PBL-001', 'S-025', '2020-03-15'),
('PBL-005', 'S-031', '2020-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(25) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telp` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama`, `alamat`, `no_telp`, `email`, `status`) VALUES
('S-019', 'PT Indofood', 'Jl. Raya Baru No. 44, Bandung', '0892738291', 'indofood@gmail.com', 1),
('S-023', 'PT Abadi Jaya', 'Jl. Gugusan, Tangerang Selatan', '02154678965', 'abadi65@gmail.com', 1),
('S-025', 'PT Aurora Indah', 'Jl. Semanggi Blok. 4, Jakarta Selatan', '08975654687', 'auroraindah@gmail.com', 1),
('S-026', 'PT Gemilang Cerah', 'Jl. Rawamangun No. 43, Bandung', '0879456135', 'gemilang@gmail.com', 1),
('S-028', 'PT Wingsfood', 'Jl. Barisan Benteng, Jakarta Timur', '0875649897', 'wings@gmail.com', 0),
('S-029', 'PT Nusa Indah', 'Jl. Kencana No. 89, Bandung', '02154654', 'nusaindah@gmail.com', 0),
('S-030', 'PT Selaras', 'Pondok Indah Blok A5, Jakarta', '021546895', 'selaras@gmail.com', 0),
('S-031', 'PT Makmur Jaya', 'Jl. Angkasa Lima No. 55, Bandung', '0263154689', 'makmur-jaya@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`kode_bb`);

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id_transaksi_pembelian`,`no_faktur`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`no_faktur`,`id_supplier`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id_transaksi_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
