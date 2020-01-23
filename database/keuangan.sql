-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2020 at 08:12 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keuangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `id_pengajuan`
--

CREATE TABLE `id_pengajuan` (
  `id_pengajuan` int(10) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_ta` char(4) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `total_pengajuan` int(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `status` enum('Diterima','Ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggaran`
--

CREATE TABLE `tb_anggaran` (
  `id_anggaran` char(10) NOT NULL,
  `id_subbagian` char(10) NOT NULL,
  `nm_anggaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_anggaran`
--

INSERT INTO `tb_anggaran` (`id_anggaran`, `id_subbagian`, `nm_anggaran`) VALUES
('000111', '00011', 'Pengadaan buku panduan akademik'),
('000112', '00011', 'Penagdaan praktek Demo flight'),
('000113', '00011', 'Pengadaan Pesawat tempur'),
('000121', '00012', 'Pengadaan form Pendataran');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bagian`
--

CREATE TABLE `tb_bagian` (
  `id_bagian` char(10) NOT NULL,
  `nm_bagian` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bagian`
--

INSERT INTO `tb_bagian` (`id_bagian`, `nm_bagian`) VALUES
('0001', 'akademik'),
('0002', 'keuangan'),
('0003', 'Pengajaran');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cabang`
--

CREATE TABLE `tb_cabang` (
  `id_cabang` int(10) NOT NULL,
  `nm_cabang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cabang`
--

INSERT INTO `tb_cabang` (`id_cabang`, `nm_cabang`) VALUES
(1, 'majalengka'),
(2, 'bandung'),
(3, 'yogyakarta'),
(4, 'solo');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cashin`
--

CREATE TABLE `tb_cashin` (
  `id_cashin` int(10) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_cabang` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `uraian` varchar(50) NOT NULL,
  `nominal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_cashout`
--

CREATE TABLE `tb_cashout` (
  `id_cashout` int(10) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_cabang` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `tujuan` varchar(30) NOT NULL,
  `uraian` varchar(50) NOT NULL,
  `nominal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jbayar`
--

CREATE TABLE `tb_jbayar` (
  `id_jbayar` int(10) NOT NULL,
  `id_prodi` char(10) NOT NULL,
  `id_ta` char(4) NOT NULL,
  `nm_jbayar` varchar(50) NOT NULL,
  `nominal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id_mahasiswa` int(10) NOT NULL,
  `id_prodi` char(10) NOT NULL,
  `nm_mahasiswa` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `notlp` char(14) NOT NULL,
  `jkelamin` enum('Laki-Laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id_mahasiswa`, `id_prodi`, `nm_mahasiswa`, `email`, `notlp`, `jkelamin`) VALUES
(2020100031, '10003', 'anak naga', 'naga@gmail.com', '08991795230', 'Laki-Laki'),
(2147483647, '10003', 'kuda', 'kuda@gmail.com', '08991795230', 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_preg`
--

CREATE TABLE `tb_preg` (
  `id_preg` int(10) NOT NULL,
  `id_mahasiswa` int(10) NOT NULL,
  `id_jbayar` int(10) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_ta` char(4) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` char(10) NOT NULL,
  `nm_prodi` varchar(50) NOT NULL,
  `jenjang` enum('D3','S1') NOT NULL,
  `semester` char(2) NOT NULL,
  `ketua` varchar(50) NOT NULL,
  `no_izin` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `nm_prodi`, `jenjang`, `semester`, `ketua`, `no_izin`) VALUES
('10001', 'Airlines Crew', 'S1', '2', 'Paijo Purwanto', 'QWERTY1292'),
('10002', 'Flight Attendant', 'S1', '3', 'Pairman Purwiro', 'QWERTY1987'),
('10003', 'Manajemen Transportasi Udara', 'S1', '1', 'Pacman Purwanto', 'QWERTY3456'),
('10004', 'pemantau udara', 'D3', '1', 'bapak naga', 'QWERTY9786'),
('10005', 'mba lucu', 'S1', '1', 'zeus', 'QWERTY0937');

-- --------------------------------------------------------

--
-- Table structure for table `tb_subbagian`
--

CREATE TABLE `tb_subbagian` (
  `id_subbagian` char(10) NOT NULL,
  `id_bagian` char(10) NOT NULL,
  `nm_subbagian` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_subbagian`
--

INSERT INTO `tb_subbagian` (`id_subbagian`, `id_bagian`, `nm_subbagian`) VALUES
('00011', '0001', 'kurikulum'),
('00012', '0001', 'kemahasiswaan'),
('00021', '0002', 'guru'),
('00022', '0002', 'satpam'),
('00031', '0003', 'mahasiswa'),
('00032', '0003', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ta`
--

CREATE TABLE `tb_ta` (
  `id_ta` char(4) NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `semester` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ta`
--

INSERT INTO `tb_ta` (`id_ta`, `mulai`, `selesai`, `semester`) VALUES
('2013', '2013-01-01', '2018-01-01', 14),
('2014', '2014-01-01', '2020-01-01', 12),
('2015', '2015-01-01', '2021-01-01', 12),
('2017', '2017-01-01', '2019-01-01', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transrab`
--

CREATE TABLE `tb_transrab` (
  `id_transrab` int(10) NOT NULL,
  `id_anggaran` char(10) NOT NULL,
  `id_subbagian` char(10) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_ta` char(4) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transrab`
--

INSERT INTO `tb_transrab` (`id_transrab`, `id_anggaran`, `id_subbagian`, `id_user`, `id_ta`, `keterangan`, `tanggal`, `nominal`) VALUES
(3, '000111', '00011', 3, '2017', 'beli buku', '2020-01-21', 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(3) NOT NULL,
  `id_cabang` int(10) NOT NULL,
  `nm_user` varchar(30) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `notlp` char(14) NOT NULL,
  `email` varchar(20) NOT NULL,
  `jkelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `luser` enum('Manager Keuangan','Keuangan Pusat','Keuangan Cabang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_cabang`, `nm_user`, `username`, `password`, `notlp`, `email`, `jkelamin`, `luser`) VALUES
(1, 1, 'naga', 'admin', 'admin', '082199333364', 'naga@enaena.com', 'Perempuan', 'Manager Keuangan'),
(2, 2, 'hadinoto', 'hadinoto', 'hadinoto', '09889966678', 'indahoktapiani43@gma', 'Laki-Laki', 'Keuangan Pusat'),
(3, 3, 'naga', 'naga', 'naga', '082199333364', 'naga@gmail.com', 'Laki-Laki', 'Keuangan Cabang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `id_pengajuan`
--
ALTER TABLE `id_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_ta` (`id_ta`);

--
-- Indexes for table `tb_anggaran`
--
ALTER TABLE `tb_anggaran`
  ADD PRIMARY KEY (`id_anggaran`),
  ADD KEY `fkbagian2` (`id_subbagian`);

--
-- Indexes for table `tb_bagian`
--
ALTER TABLE `tb_bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `tb_cabang`
--
ALTER TABLE `tb_cabang`
  ADD PRIMARY KEY (`id_cabang`);

--
-- Indexes for table `tb_cashin`
--
ALTER TABLE `tb_cashin`
  ADD PRIMARY KEY (`id_cashin`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_cabang` (`id_cabang`);

--
-- Indexes for table `tb_cashout`
--
ALTER TABLE `tb_cashout`
  ADD PRIMARY KEY (`id_cashout`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_cabang` (`id_cabang`);

--
-- Indexes for table `tb_jbayar`
--
ALTER TABLE `tb_jbayar`
  ADD PRIMARY KEY (`id_jbayar`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_ta` (`id_ta`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `tb_preg`
--
ALTER TABLE `tb_preg`
  ADD PRIMARY KEY (`id_preg`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_jbayar` (`id_jbayar`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_ta` (`id_ta`);

--
-- Indexes for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `tb_subbagian`
--
ALTER TABLE `tb_subbagian`
  ADD PRIMARY KEY (`id_subbagian`),
  ADD KEY `fkbagian1` (`id_bagian`);

--
-- Indexes for table `tb_ta`
--
ALTER TABLE `tb_ta`
  ADD PRIMARY KEY (`id_ta`);

--
-- Indexes for table `tb_transrab`
--
ALTER TABLE `tb_transrab`
  ADD PRIMARY KEY (`id_transrab`),
  ADD KEY `id_anggaran` (`id_anggaran`),
  ADD KEY `id_subbagian` (`id_subbagian`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_ta` (`id_ta`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_cabang` (`id_cabang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `id_pengajuan`
--
ALTER TABLE `id_pengajuan`
  MODIFY `id_pengajuan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_cabang`
--
ALTER TABLE `tb_cabang`
  MODIFY `id_cabang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_cashin`
--
ALTER TABLE `tb_cashin`
  MODIFY `id_cashin` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_cashout`
--
ALTER TABLE `tb_cashout`
  MODIFY `id_cashout` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jbayar`
--
ALTER TABLE `tb_jbayar`
  MODIFY `id_jbayar` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id_mahasiswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `tb_preg`
--
ALTER TABLE `tb_preg`
  MODIFY `id_preg` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_transrab`
--
ALTER TABLE `tb_transrab`
  MODIFY `id_transrab` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `id_pengajuan`
--
ALTER TABLE `id_pengajuan`
  ADD CONSTRAINT `id_pengajuan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `id_pengajuan_ibfk_2` FOREIGN KEY (`id_ta`) REFERENCES `tb_ta` (`id_ta`);

--
-- Constraints for table `tb_anggaran`
--
ALTER TABLE `tb_anggaran`
  ADD CONSTRAINT `fkbagian2` FOREIGN KEY (`id_subbagian`) REFERENCES `tb_subbagian` (`id_subbagian`);

--
-- Constraints for table `tb_cashin`
--
ALTER TABLE `tb_cashin`
  ADD CONSTRAINT `tb_cashin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_cashin_ibfk_2` FOREIGN KEY (`id_cabang`) REFERENCES `tb_cabang` (`id_cabang`);

--
-- Constraints for table `tb_cashout`
--
ALTER TABLE `tb_cashout`
  ADD CONSTRAINT `tb_cashout_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_cashout_ibfk_2` FOREIGN KEY (`id_cabang`) REFERENCES `tb_cabang` (`id_cabang`);

--
-- Constraints for table `tb_jbayar`
--
ALTER TABLE `tb_jbayar`
  ADD CONSTRAINT `tb_jbayar_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `tb_prodi` (`id_prodi`),
  ADD CONSTRAINT `tb_jbayar_ibfk_2` FOREIGN KEY (`id_ta`) REFERENCES `tb_ta` (`id_ta`);

--
-- Constraints for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD CONSTRAINT `tb_mahasiswa_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `tb_prodi` (`id_prodi`);

--
-- Constraints for table `tb_preg`
--
ALTER TABLE `tb_preg`
  ADD CONSTRAINT `tb_preg_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tb_mahasiswa` (`id_mahasiswa`),
  ADD CONSTRAINT `tb_preg_ibfk_2` FOREIGN KEY (`id_jbayar`) REFERENCES `tb_jbayar` (`id_jbayar`),
  ADD CONSTRAINT `tb_preg_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_preg_ibfk_4` FOREIGN KEY (`id_ta`) REFERENCES `tb_ta` (`id_ta`);

--
-- Constraints for table `tb_subbagian`
--
ALTER TABLE `tb_subbagian`
  ADD CONSTRAINT `fkbagian1` FOREIGN KEY (`id_bagian`) REFERENCES `tb_bagian` (`id_bagian`);

--
-- Constraints for table `tb_transrab`
--
ALTER TABLE `tb_transrab`
  ADD CONSTRAINT `tb_transrab_ibfk_1` FOREIGN KEY (`id_anggaran`) REFERENCES `tb_anggaran` (`id_anggaran`),
  ADD CONSTRAINT `tb_transrab_ibfk_2` FOREIGN KEY (`id_subbagian`) REFERENCES `tb_subbagian` (`id_subbagian`),
  ADD CONSTRAINT `tb_transrab_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_transrab_ibfk_4` FOREIGN KEY (`id_ta`) REFERENCES `tb_ta` (`id_ta`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_cabang`) REFERENCES `tb_cabang` (`id_cabang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
