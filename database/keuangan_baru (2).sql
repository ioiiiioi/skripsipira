-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jan 2020 pada 04.09
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keuangan_baru`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `id_pengajuan`
--

CREATE TABLE `id_pengajuan` (
  `id_pengajuan` int(10) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_ta` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `total_pengajuan` int(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `status` enum('Diterima','Ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggaran`
--

CREATE TABLE `tb_anggaran` (
  `id_anggaran` char(10) NOT NULL,
  `id_subbagian` char(10) NOT NULL,
  `nm_anggaran` varchar(50) NOT NULL,
  `status_aktif` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_anggaran`
--

INSERT INTO `tb_anggaran` (`id_anggaran`, `id_subbagian`, `nm_anggaran`, `status_aktif`) VALUES
('000111', '00011', 'Pengadaan buku panduan akademik', 1),
('000112', '00011', 'Penagdaan praktek Demo flight', 1),
('000113', '00011', 'Pengadaan Pesawat tempur', 1),
('000121', '00012', 'Pengadaan form Pendataran', 1),
('000411', '00041', 'kuota youtubenya', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bagian`
--

CREATE TABLE `tb_bagian` (
  `id_bagian` char(10) NOT NULL,
  `nm_bagian` varchar(15) NOT NULL,
  `status_aktif` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bagian`
--

INSERT INTO `tb_bagian` (`id_bagian`, `nm_bagian`, `status_aktif`) VALUES
('0001', 'Akademik', 1),
('0002', 'Cash In', 1),
('0003', 'Keuangan', 1),
('0004', 'PMS', 1),
('0005', 'SDM', 1),
('0006', 'Umum', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cabang`
--

CREATE TABLE `tb_cabang` (
  `id_cabang` int(10) NOT NULL,
  `nm_cabang` varchar(30) NOT NULL,
  `status_aktif` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_cabang`
--

INSERT INTO `tb_cabang` (`id_cabang`, `nm_cabang`, `status_aktif`) VALUES
(1, 'majalengka', 1),
(2, 'bandung', 1),
(3, 'yogyakarta', 1),
(4, 'solo', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cashin`
--

CREATE TABLE `tb_cashin` (
  `id_cashin` int(10) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_cabang` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `uraian` varchar(50) NOT NULL,
  `nominal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_cashin`
--

INSERT INTO `tb_cashin` (`id_cashin`, `id_user`, `id_cabang`, `tanggal`, `uraian`, `nominal`) VALUES
(1, 2, 1, '2020-01-16', 'asdasda', 75000),
(2, 2, 1, '2020-01-29', 'asdasda', 75000),
(5, 4, 1, '2020-01-01', 'asdasdads', 12312);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cashout`
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
-- Struktur dari tabel `tb_jbayar`
--

CREATE TABLE `tb_jbayar` (
  `id_jbayar` int(10) NOT NULL,
  `id_prodi` char(10) NOT NULL,
  `id_ta` int(11) NOT NULL,
  `nm_jbayar` varchar(50) NOT NULL,
  `nominal` int(10) NOT NULL,
  `status_aktif` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id_mahasiswa` int(10) NOT NULL,
  `id_prodi` char(10) NOT NULL,
  `nm_mahasiswa` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `notlp` char(14) NOT NULL,
  `jkelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `status_aktif` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id_mahasiswa`, `id_prodi`, `nm_mahasiswa`, `email`, `notlp`, `jkelamin`, `status_aktif`) VALUES
(100011, '10001', 'mba mba ganjen', 'dasd@gar.com', '132123', 'Perempuan', 1),
(2020100031, '10003', 'anak kuda', 'kuda@gmail.com', '08991795230', 'Laki-Laki', 1),
(2147483647, '10003', 'kuda', 'kuda@gmail.com', '08991795230', 'Perempuan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_preg`
--

CREATE TABLE `tb_preg` (
  `id_preg` int(10) NOT NULL,
  `id_mahasiswa` int(10) NOT NULL,
  `id_jbayar` int(10) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_ta` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` char(10) NOT NULL,
  `nm_prodi` varchar(50) NOT NULL,
  `jenjang` enum('D3','S1') NOT NULL,
  `semester` char(2) NOT NULL,
  `ketua` varchar(50) NOT NULL,
  `no_izin` char(10) NOT NULL,
  `status_aktif` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `nm_prodi`, `jenjang`, `semester`, `ketua`, `no_izin`, `status_aktif`) VALUES
('10001', 'Airlines Crew', 'S1', '2', 'Paijo Sunaryo', 'QWERTY123', 1),
('10002', 'Flight Attendant', 'S1', '3', 'Pairman Purwiro', 'QWERTY1987', 1),
('10003', 'Manajemen Transportasi Udara', 'S1', '1', 'Pacman Purwanto', 'QWERTY3456', 1),
('10004', 'pemantau udara', 'D3', '1', 'bapak naga', 'QWERTY9786', 1),
('10005', 'mba lucu', 'S1', '1', 'zeus', 'QWERTY0937', 1),
('10006', 'FIeld Crew', 'S1', '2', 'Sunatyo', 'QWERTY2323', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_subbagian`
--

CREATE TABLE `tb_subbagian` (
  `id_subbagian` char(10) NOT NULL,
  `id_bagian` char(10) NOT NULL,
  `nm_subbagian` varchar(25) NOT NULL,
  `status_aktif` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_subbagian`
--

INSERT INTO `tb_subbagian` (`id_subbagian`, `id_bagian`, `nm_subbagian`, `status_aktif`) VALUES
('00011', '0001', 'kurikulum', 1),
('00012', '0001', 'kemahasiswaan', 1),
('00013', '0001', 'Admistrasi Akademik', 1),
('00014', '0001', 'Relationship', 1),
('00021', '0002', 'SPA', 1),
('00022', '0002', 'Tour Recruitment', 1),
('00023', '0002', 'Reguler Gel 1', 1),
('00031', '0003', 'Keuangan', 1),
('00032', '0003', 'staff', 0),
('00041', '0004', 'Media Promosi', 1),
('00042', '0004', 'Direct Marketing', 1),
('00043', '0004', 'Tele Marketing', 1),
('00044', '0004', 'Relationship Promo', 1),
('00051', '0005', 'Pengeluaran Rutin', 1),
('00052', '0005', 'Bonus', 1),
('00053', '0005', 'Infaq', 1),
('00054', '0005', 'Lain - Lain', 1),
('00061', '0006', 'Supliest', 1),
('00062', '0006', 'ATK', 1),
('00063', '0006', 'Perawatan', 1),
('00064', '0006', 'Service', 1),
('00065', '0006', 'Pembayaran Rutin', 1),
('00066', '0006', 'Lain - Lain', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ta`
--

CREATE TABLE `tb_ta` (
  `id_ta` int(11) NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `semester` varchar(10) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `status_aktif` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_ta`
--

INSERT INTO `tb_ta` (`id_ta`, `mulai`, `selesai`, `semester`, `tahun`, `status_aktif`) VALUES
(1, '2013-01-01', '2018-01-01', '14', '2013', 1),
(2, '2014-01-01', '2020-01-01', '12', '2014', 1),
(3, '2015-01-01', '2021-01-01', '12', '2015', 1),
(4, '2017-01-01', '2019-01-01', '10', '2017', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transrab`
--

CREATE TABLE `tb_transrab` (
  `id_transrab` int(10) NOT NULL,
  `id_anggaran` char(10) NOT NULL,
  `id_subbagian` char(10) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_ta` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transrab`
--

INSERT INTO `tb_transrab` (`id_transrab`, `id_anggaran`, `id_subbagian`, `id_user`, `id_ta`, `keterangan`, `tanggal`, `nominal`) VALUES
(4, '000411', '00041', 3, 4, 'asdsadsadsa', '2020-01-26', 900000),
(5, '000111', '00011', 3, 4, '', '2020-01-26', 300000),
(6, '000112', '00021', 3, 3, 'yuioph', '2020-01-26', 500000),
(7, '000411', '00022', 3, 3, 'qazxwswed', '2020-01-26', 150000),
(8, '000113', '00032', 3, 3, 'tyuiop', '2020-01-26', 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
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
  `luser` enum('Manager Keuangan','Keuangan Pusat','Keuangan Cabang') NOT NULL,
  `status_aktif` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_cabang`, `nm_user`, `username`, `password`, `notlp`, `email`, `jkelamin`, `luser`, `status_aktif`) VALUES
(1, 1, 'naga', 'admin', 'admin', '082199333364', 'naga@enaena.com', 'Perempuan', 'Manager Keuangan', 1),
(2, 2, 'hadinoto', 'hadinoto', 'hadinoto', '09889966678', 'indahoktapiani43@gma', 'Laki-Laki', 'Keuangan Pusat', 1),
(3, 3, 'naga', 'naga', 'naga', '082199333364', 'naga@gmail.com', 'Laki-Laki', 'Keuangan Cabang', 1),
(4, 1, 'superadmin', 'super', 'ashiap', '109389102', 'asdadln@dsa.com', 'Laki-Laki', 'Keuangan Pusat', 1),
(5, 1, 'admin cabang', 'cabang', 'cabang', '12371', 'adsdasd@dasd.com', 'Laki-Laki', 'Manager Keuangan', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `id_pengajuan`
--
ALTER TABLE `id_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_ta` (`id_ta`);

--
-- Indeks untuk tabel `tb_anggaran`
--
ALTER TABLE `tb_anggaran`
  ADD PRIMARY KEY (`id_anggaran`),
  ADD KEY `fkbagian2` (`id_subbagian`);

--
-- Indeks untuk tabel `tb_bagian`
--
ALTER TABLE `tb_bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indeks untuk tabel `tb_cabang`
--
ALTER TABLE `tb_cabang`
  ADD PRIMARY KEY (`id_cabang`);

--
-- Indeks untuk tabel `tb_cashin`
--
ALTER TABLE `tb_cashin`
  ADD PRIMARY KEY (`id_cashin`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_cabang` (`id_cabang`);

--
-- Indeks untuk tabel `tb_cashout`
--
ALTER TABLE `tb_cashout`
  ADD PRIMARY KEY (`id_cashout`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_cabang` (`id_cabang`);

--
-- Indeks untuk tabel `tb_jbayar`
--
ALTER TABLE `tb_jbayar`
  ADD PRIMARY KEY (`id_jbayar`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_ta` (`id_ta`);

--
-- Indeks untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indeks untuk tabel `tb_preg`
--
ALTER TABLE `tb_preg`
  ADD PRIMARY KEY (`id_preg`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_jbayar` (`id_jbayar`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_ta` (`id_ta`);

--
-- Indeks untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `tb_subbagian`
--
ALTER TABLE `tb_subbagian`
  ADD PRIMARY KEY (`id_subbagian`),
  ADD KEY `fkbagian1` (`id_bagian`);

--
-- Indeks untuk tabel `tb_ta`
--
ALTER TABLE `tb_ta`
  ADD PRIMARY KEY (`id_ta`);

--
-- Indeks untuk tabel `tb_transrab`
--
ALTER TABLE `tb_transrab`
  ADD PRIMARY KEY (`id_transrab`),
  ADD KEY `id_anggaran` (`id_anggaran`),
  ADD KEY `id_subbagian` (`id_subbagian`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_ta` (`id_ta`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_cabang` (`id_cabang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `id_pengajuan`
--
ALTER TABLE `id_pengajuan`
  MODIFY `id_pengajuan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_cabang`
--
ALTER TABLE `tb_cabang`
  MODIFY `id_cabang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_cashin`
--
ALTER TABLE `tb_cashin`
  MODIFY `id_cashin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_cashout`
--
ALTER TABLE `tb_cashout`
  MODIFY `id_cashout` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_jbayar`
--
ALTER TABLE `tb_jbayar`
  MODIFY `id_jbayar` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id_mahasiswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT untuk tabel `tb_preg`
--
ALTER TABLE `tb_preg`
  MODIFY `id_preg` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_ta`
--
ALTER TABLE `tb_ta`
  MODIFY `id_ta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_transrab`
--
ALTER TABLE `tb_transrab`
  MODIFY `id_transrab` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `id_pengajuan`
--
ALTER TABLE `id_pengajuan`
  ADD CONSTRAINT `id_pengajuan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `id_pengajuan_ibfk_2` FOREIGN KEY (`id_ta`) REFERENCES `tb_ta` (`id_ta`);

--
-- Ketidakleluasaan untuk tabel `tb_anggaran`
--
ALTER TABLE `tb_anggaran`
  ADD CONSTRAINT `fkbagian2` FOREIGN KEY (`id_subbagian`) REFERENCES `tb_subbagian` (`id_subbagian`);

--
-- Ketidakleluasaan untuk tabel `tb_cashin`
--
ALTER TABLE `tb_cashin`
  ADD CONSTRAINT `tb_cashin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_cashin_ibfk_2` FOREIGN KEY (`id_cabang`) REFERENCES `tb_cabang` (`id_cabang`);

--
-- Ketidakleluasaan untuk tabel `tb_cashout`
--
ALTER TABLE `tb_cashout`
  ADD CONSTRAINT `tb_cashout_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_cashout_ibfk_2` FOREIGN KEY (`id_cabang`) REFERENCES `tb_cabang` (`id_cabang`);

--
-- Ketidakleluasaan untuk tabel `tb_jbayar`
--
ALTER TABLE `tb_jbayar`
  ADD CONSTRAINT `tb_jbayar_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `tb_prodi` (`id_prodi`),
  ADD CONSTRAINT `tb_jbayar_ibfk_2` FOREIGN KEY (`id_ta`) REFERENCES `tb_ta` (`id_ta`);

--
-- Ketidakleluasaan untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD CONSTRAINT `tb_mahasiswa_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `tb_prodi` (`id_prodi`);

--
-- Ketidakleluasaan untuk tabel `tb_preg`
--
ALTER TABLE `tb_preg`
  ADD CONSTRAINT `tb_preg_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tb_mahasiswa` (`id_mahasiswa`),
  ADD CONSTRAINT `tb_preg_ibfk_2` FOREIGN KEY (`id_jbayar`) REFERENCES `tb_jbayar` (`id_jbayar`),
  ADD CONSTRAINT `tb_preg_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_preg_ibfk_4` FOREIGN KEY (`id_ta`) REFERENCES `tb_ta` (`id_ta`);

--
-- Ketidakleluasaan untuk tabel `tb_subbagian`
--
ALTER TABLE `tb_subbagian`
  ADD CONSTRAINT `fkbagian1` FOREIGN KEY (`id_bagian`) REFERENCES `tb_bagian` (`id_bagian`);

--
-- Ketidakleluasaan untuk tabel `tb_transrab`
--
ALTER TABLE `tb_transrab`
  ADD CONSTRAINT `tb_transrab_ibfk_1` FOREIGN KEY (`id_anggaran`) REFERENCES `tb_anggaran` (`id_anggaran`),
  ADD CONSTRAINT `tb_transrab_ibfk_2` FOREIGN KEY (`id_subbagian`) REFERENCES `tb_subbagian` (`id_subbagian`),
  ADD CONSTRAINT `tb_transrab_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_transrab_ibfk_4` FOREIGN KEY (`id_ta`) REFERENCES `tb_ta` (`id_ta`);

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_cabang`) REFERENCES `tb_cabang` (`id_cabang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
