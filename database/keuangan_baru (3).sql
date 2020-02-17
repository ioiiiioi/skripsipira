-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Feb 2020 pada 08.35
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
  `id_anggaran` int(10) NOT NULL,
  `id_subbagian` int(10) NOT NULL,
  `nm_anggaran` varchar(50) NOT NULL,
  `status_aktif` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_anggaran`
--

INSERT INTO `tb_anggaran` (`id_anggaran`, `id_subbagian`, `nm_anggaran`, `status_aktif`) VALUES
(111, 11, 'asdasdasd', 1),
(112, 11, 'adsadasd', 1),
(113, 11, 'asdascaxasx', 1),
(114, 11, 'asdasd', 0),
(115, 11, 'asdadfe', 1),
(116, 11, 'vbfvbfgv', 1),
(117, 11, 'dfvf', 1),
(118, 11, 'sdadasdax', 1),
(119, 11, 'fdvdvf', 1),
(120, 11, 'asdasdad', 1),
(121, 12, 'Pengadaan form Pendataran', 1),
(411, 41, 'kuota youtubenya', 1),
(412, 11, 'asdasdads', 1),
(414, 11, 'Pengadaan format silabus + SAP', 1),
(415, 11, 'Pengadaan Buku Panduan Akademik', 1),
(416, 11, 'Pengadaan praktek Demo Flight', 1),
(417, 11, 'Pengadaan praktek Cabin Practice', 1),
(418, 11, 'Pengadaan & Pemeliharaan Lab Komputer', 1),
(419, 11, 'Pengadaan outbond', 1),
(420, 11, 'Pembelian buku perpustakaan', 1),
(421, 11, 'Pengadaan Sertifikat', 1),
(422, 11, 'Bimbingan Rohani mahasiswa', 1),
(423, 11, 'On The Job Training', 1),
(424, 11, 'LTA', 1),
(425, 11, 'Pengadaan Ujian Mid dan Akhir Semester', 1),
(426, 11, 'Pelaksanaan lisensi ', 1),
(427, 11, 'Pengadaan quistioner mahasiswa', 1),
(428, 11, 'Pengadaan perlengkapan akademik', 1),
(429, 11, 'BBM oprasional akademik', 1),
(430, 11, 'FC. Lain-lain', 1),
(431, 11, 'Ucapan hari raya', 1),
(432, 11, 'Bonus akademik', 1),
(433, 11, 'Succes story', 1),
(434, 11, 'Visit Airport ', 1),
(435, 11, 'Tour Recrutmen', 1),
(436, 12, 'Pengadaan Uniform Mahasiswa', 1),
(437, 12, 'Sepatu', 1),
(438, 12, 'Baju Renang', 1),
(439, 12, 'Stocking (coklat & hitam)', 1),
(440, 12, 'Tas', 1),
(441, 12, 'Dasi', 1),
(442, 12, 'Name tag', 1),
(443, 12, 'Kaos + training', 1),
(444, 12, 'Scraff', 1),
(445, 12, 'Asrama ', 1),
(446, 12, 'Pelaksanaan Senam', 1),
(447, 12, 'Pembayaran Renang', 1),
(448, 12, 'Pelaksanaan mental building', 1),
(449, 12, 'Asuransi mahasiswa (pembayaran polis)', 1),
(450, 12, 'Pembentukan fisik mhs', 1),
(451, 13, 'Peng-arsipan data dosen', 1),
(452, 13, 'Peng-arsipan data siswa', 1),
(453, 13, 'Pengadaan KTM', 1),
(454, 13, 'Pembuatan Buku Induk mahasiswa', 1),
(455, 14, 'Souvenir', 1),
(456, 14, 'Relation Ship', 1),
(457, 14, 'Entertain', 1),
(458, 14, 'FEE relationship', 1),
(465, 21, 'Flight Attendant', 1),
(466, 21, 'Staf Airline', 1),
(467, 21, 'Licensi', 1),
(468, 22, 'Flight Attendant', 1),
(469, 22, 'Staf Airline', 1),
(470, 23, 'Flight Attendant', 1),
(471, 23, 'Staf Airline', 1),
(472, 23, 'Flight Attendant', 1),
(473, 23, 'Staf Airline', 1),
(474, 23, 'Asrama Ground Staf', 1),
(475, 23, 'Catering Laundry', 1),
(476, 23, 'Pendaftaran', 1),
(477, 23, 'Wisuda', 1),
(478, 31, 'Sewa Gedung Jogja Flight', 1),
(479, 31, 'Pajak Sewa Gedung', 1),
(480, 31, 'Pajak PPh pasal 21', 1),
(481, 31, 'Pajak PPh pasal 21 dosen', 1),
(482, 31, 'Pajak PPh Badan', 1),
(483, 31, 'Angsuran mobil', 1),
(484, 31, 'Yayasan', 1),
(485, 31, 'Pengembalian SPA', 1),
(486, 41, 'BARANG CETAKAN', 1),
(487, 41, 'MULTIMEDIA', 1),
(488, 41, 'CETAKAN PENUNJANG MARKETING', 1),
(489, 41, 'KELENGKAPAN TES SELEKSI', 1),
(490, 41, 'CETAKAN PENUNJANG POST SELEKSI', 1),
(491, 41, 'KELENGKAPAN PENGUKURAN SERAGAM', 1),
(492, 41, 'BIAYA PENGIRIMAN', 1),
(493, 41, 'BIAYA PEMASANGAN', 1),
(494, 42, 'PERJALANAN DINAS TAHAP I', 1),
(495, 42, 'PERJALANAN DINAS TAHAP II', 1),
(496, 42, 'PERJALANAN DINAS TAHAP III', 1),
(497, 42, 'PERJALANAN DINAS SUSULAN', 1),
(498, 42, 'PERJALANAN DINAS LUAR PULAU/PROPINSI', 1),
(499, 42, 'PEMBAYARAN FEE SEKOLAH', 1),
(500, 43, 'Biaya Pulsa Hotline Reguler Bulanan', 1),
(501, 43, 'Lebaran', 1),
(502, 43, 'Menjelang UNAS', 1),
(503, 43, 'Menjelang Pengumuman UNAS', 1),
(504, 43, 'Tahun Baru', 1),
(505, 43, 'Tes Seleksi Bersama', 1),
(506, 43, 'Ukur Baju Seragam', 1),
(507, 44, 'Souvenir untuk guru BK (dipilah sesuai kebutuhan)', 1),
(508, 44, 'Penerimaan & Sosialisasi MGBK KAB. CIREBON', 1),
(509, 51, 'Gaji Karyawan', 1),
(510, 51, 'Jamsostek', 1),
(511, 51, 'Simponi', 1),
(512, 51, 'Subsidi Pendidikan Anak', 1),
(513, 52, 'Bonus pemasaran', 1),
(514, 52, 'Prestasi per 3bln', 1),
(515, 52, 'THR', 1),
(516, 53, 'Infaq anak yatim', 1),
(517, 53, 'Infaq hari jumat', 1),
(518, 54, 'Pelatihan Karyawan', 1),
(519, 54, 'Beasiswa', 1),
(520, 54, 'Rekreasi', 1),
(521, 54, 'Seragam', 1),
(522, 54, 'Qurban', 1),
(523, 54, 'Buka bersama', 1),
(524, 54, 'Tasyakuran', 1),
(525, 61, 'Supliest Kantor', 1),
(526, 61, 'Supliest Dapur', 1),
(527, 61, 'Supliest Asrama', 1),
(528, 63, 'Perawatan gedung kantor', 1),
(529, 63, 'Perawatan gedung asrama', 1),
(530, 64, 'Service Motor', 1),
(531, 64, 'Service Mobil', 1),
(532, 64, 'Service AC', 1),
(533, 64, 'Service Printer', 1),
(534, 64, 'Service CPU', 1),
(535, 64, 'Service Internet', 1),
(536, 64, 'Service Ganti Catrid', 1),
(537, 64, 'Service Perbaikan Listrik', 1),
(538, 64, 'Service Vacum Cliner', 1),
(539, 65, 'B.Koran', 1),
(540, 65, 'B.Lisrik Asrama & Kantor', 1),
(541, 65, 'B.Telpon', 1),
(542, 65, 'B.Internet', 1),
(543, 65, 'B.Sampah Kantor', 1),
(544, 65, 'B.Ronda & Sampah Asrama', 1),
(545, 65, 'B.Potong Rumput', 1),
(546, 65, 'B.Pajak Kendaraan', 1),
(547, 65, 'B.Pajak Motor', 1),
(548, 66, 'BBM', 1),
(549, 66, 'Parkir', 1),
(550, 66, 'FC', 1),
(551, 66, 'Pulsa BM dan ABM', 1),
(552, 66, 'Sewa Tenda dan Kursi', 1),
(553, 66, 'Fee Security Sriwedari', 1),
(554, 66, 'Dana sosial kampung', 1),
(555, 66, 'Konsumsi ', 1),
(556, 70, 'Honorarium dosen Term 1', 1),
(557, 70, 'Honorarium dosen Term 2', 1),
(558, 70, 'Honorarium dosen Term 3', 1),
(559, 70, 'Penyelenggaraan kuliah harian', 1),
(560, 70, 'Penyelenggaraan Beauty Class', 1),
(561, 70, 'Pengadaan KRS semester 1 2 dan 3', 1);

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
(1, 'Majalengka', 1),
(2, 'Bandung', 1),
(3, 'Yogyakarta', 1),
(4, 'Solo', 1);

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
(5, 4, 1, '2020-01-01', 'asdasdads', 12312),
(6, 4, 2, '2020-01-23', 'csacsacas', 122222);

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

--
-- Dumping data untuk tabel `tb_cashout`
--

INSERT INTO `tb_cashout` (`id_cashout`, `id_user`, `id_cabang`, `tanggal`, `tujuan`, `uraian`, `nominal`) VALUES
(5, 4, 3, '2020-01-01', 'asdasd', 'sadad', 2147483647),
(6, 4, 3, '2020-01-01', 'adasd', 'adasd', 2147483647);

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
  `id_subbagian` int(10) NOT NULL,
  `id_bagian` char(10) NOT NULL,
  `nm_subbagian` varchar(25) NOT NULL,
  `status_aktif` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_subbagian`
--

INSERT INTO `tb_subbagian` (`id_subbagian`, `id_bagian`, `nm_subbagian`, `status_aktif`) VALUES
(11, '0001', 'kurikulum', 1),
(12, '0001', 'kemahasiswaan', 1),
(13, '0001', 'Admistrasi Akademik', 1),
(14, '0001', 'Relationship', 1),
(21, '0002', 'SPA', 1),
(22, '0002', 'Tour Recruitment', 1),
(23, '0002', 'Reguler Gel 1', 1),
(31, '0003', 'Keuangan', 1),
(32, '0003', 'staff', 0),
(41, '0004', 'Media Promosi', 1),
(42, '0004', 'Direct Marketing', 1),
(43, '0004', 'Tele Marketing', 1),
(44, '0004', 'Relationship Promo', 1),
(51, '0005', 'Pengeluaran Rutin', 1),
(52, '0005', 'Bonus', 1),
(53, '0005', 'Infaq', 1),
(54, '0005', 'Lain - Lain', 1),
(61, '0006', 'Supliest', 1),
(62, '0006', 'ATK', 1),
(63, '0006', 'Perawatan', 1),
(64, '0006', 'Service', 1),
(65, '0006', 'Pembayaran Rutin', 1),
(66, '0006', 'Lain - Lain', 1),
(70, '0001', 'Pengajaran', 1);

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
  `id_anggaran` int(10) NOT NULL,
  `id_subbagian` int(10) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_ta` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` int(10) NOT NULL,
  `approval` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transrab`
--

INSERT INTO `tb_transrab` (`id_transrab`, `id_anggaran`, `id_subbagian`, `id_user`, `id_ta`, `keterangan`, `tanggal`, `nominal`, `approval`) VALUES
(4, 411, 41, 3, 4, 'asdsadsadsa', '2020-01-26', 900000, 1),
(5, 111, 11, 3, 4, '', '2020-01-26', 300000, 2),
(6, 112, 21, 3, 3, 'yuioph', '2020-01-26', 500000, 1),
(7, 411, 22, 3, 3, 'qazxwswed', '2020-01-26', 150000, 1),
(8, 113, 32, 3, 3, 'tyuiop', '2019-01-26', 200000, 2),
(9, 112, 11, 3, 2, 'asdasdad', '2020-02-16', 2222222, 0),
(10, 113, 21, 3, 3, 'asdads', '2020-02-16', 11111, 0);

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
-- AUTO_INCREMENT untuk tabel `tb_anggaran`
--
ALTER TABLE `tb_anggaran`
  MODIFY `id_anggaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=562;

--
-- AUTO_INCREMENT untuk tabel `tb_cabang`
--
ALTER TABLE `tb_cabang`
  MODIFY `id_cabang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_cashin`
--
ALTER TABLE `tb_cashin`
  MODIFY `id_cashin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_cashout`
--
ALTER TABLE `tb_cashout`
  MODIFY `id_cashout` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT untuk tabel `tb_subbagian`
--
ALTER TABLE `tb_subbagian`
  MODIFY `id_subbagian` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `tb_ta`
--
ALTER TABLE `tb_ta`
  MODIFY `id_ta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_transrab`
--
ALTER TABLE `tb_transrab`
  MODIFY `id_transrab` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  ADD CONSTRAINT `tb_anggaran_ibfk_1` FOREIGN KEY (`id_subbagian`) REFERENCES `tb_subbagian` (`id_subbagian`);

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
  ADD CONSTRAINT `tb_transrab_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_transrab_ibfk_4` FOREIGN KEY (`id_ta`) REFERENCES `tb_ta` (`id_ta`),
  ADD CONSTRAINT `tb_transrab_ibfk_5` FOREIGN KEY (`id_anggaran`) REFERENCES `tb_anggaran` (`id_anggaran`),
  ADD CONSTRAINT `tb_transrab_ibfk_6` FOREIGN KEY (`id_subbagian`) REFERENCES `tb_subbagian` (`id_subbagian`);

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_cabang`) REFERENCES `tb_cabang` (`id_cabang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
