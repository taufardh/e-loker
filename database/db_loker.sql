-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 08:48 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_loker`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `no_telp` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama`, `username`, `email`, `password`, `no_telp`) VALUES
(1, 'Administrator', 'admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', '081221997131');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Mekanik'),
(2, 'Hotel'),
(3, 'Restoran'),
(4, 'Perkantoran'),
(5, 'IT '),
(7, 'Hotel');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lamaran`
--

CREATE TABLE `tb_lamaran` (
  `id_lamaran` int(11) NOT NULL,
  `id_lowongan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `tanggal_lamar` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status` enum('proses','selesai','tanggapan') NOT NULL,
  `waktu_lamar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lamaran`
--

INSERT INTO `tb_lamaran` (`id_lamaran`, `id_lowongan`, `id_user`, `id_perusahaan`, `file`, `tanggal_lamar`, `tanggal_selesai`, `status`, `waktu_lamar`) VALUES
(5, 0, 1, 15, '1926235501_Sertifikat Php - Progate.pdf', '2021-04-14', '0000-00-00', 'proses', '10:30:16'),
(6, 0, 1, 15, '1981284520_Sertifikat Php - Progate.pdf', '2021-04-15', '0000-00-00', 'proses', '11:14:31'),
(7, 4, 2, 17, '2088333299_Sertifikat Php - Progate.pdf', '2021-04-18', '0000-00-00', 'tanggapan', '00:30:14'),
(8, 1, 1, 15, '1284339052_KAMP KREATIF SMK INDONESIA TUGAS AKHIR.', '2021-04-18', '0000-00-00', 'tanggapan', '13:59:08'),
(9, 5, 3, 18, '491002269_Cv.pdf', '2021-04-18', '0000-00-00', '', '14:02:53'),
(12, 3, 1, 16, '1652759615_Perancangan.pdf', '2021-04-19', '2021-04-19', 'selesai', '02:42:20'),
(13, 1, 1, 15, '2036917070_Cv (1).pdf', '2021-04-19', '0000-00-00', 'tanggapan', '03:03:24'),
(14, 4, 1, 17, '144055357_Cv.pdf', '2021-04-19', '0000-00-00', 'proses', '11:55:36'),
(15, 1, 2, 15, '1679195077_Sertifikat Php - Progate.pdf', '2021-04-19', '0000-00-00', 'tanggapan', '17:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lowongan`
--

CREATE TABLE `tb_lowongan` (
  `id_lowongan` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `gaji` int(11) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `persyaratan` text NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('buka','tutup') NOT NULL,
  `lowongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lowongan`
--

INSERT INTO `tb_lowongan` (`id_lowongan`, `id_perusahaan`, `gaji`, `posisi`, `deskripsi`, `persyaratan`, `tanggal`, `status`, `lowongan`) VALUES
(1, 15, 4000000, 'Gammer', '- Punya Attitude', '- Minimal Punya skill\r\n- Rank Minimal Mythic Glory 2000+\r\n- User Tank\r\n- Paham Micro Macro\r\n- Paham KOnditioning turet', '2021-04-16', 'tutup', 8),
(2, 16, 865768798, 'khlslwgj', 'kjdbvjhve', 'kjvdhdjh', '2021-04-16', 'buka', 6),
(3, 16, 3500000, 'Brand Ambassador ', '- Membersihkan Gamming House \r\n- Dan lain lain', '- Memiliki Attitude yang baik \r\n- Mempunyai Skill Di atas rata rata ', '2021-04-16', 'buka', 3),
(4, 17, 2000000, 'Pembantu', '- Bersih bersih kandang \r\n- Bersih Bersih seluruh area gamming house', '- Minimal S3\r\n- Mempunyai Skill Bersih bersih', '2021-04-16', 'buka', 2),
(5, 18, 1000000, 'Player Tank', '- Kompetitif di kancah Mobile Legend \r\n- Ikut Turnamen Mobile Profesional League (MPL)\r\n', '- Bisa menggunakan semua hero tank\r\n- Winrate Hero Favorite Tank di atas 80%', '2021-04-18', 'tutup', 0),
(6, 15, 2000, '-', '-', '-', '2021-04-20', 'buka', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_perusahaan`
--

CREATE TABLE `tb_perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `ijin_perusahaan` varchar(50) NOT NULL,
  `lokasi_perusahaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_perusahaan`
--

INSERT INTO `tb_perusahaan` (`id_perusahaan`, `nama_perusahaan`, `email`, `password`, `id_kategori`, `logo`, `ijin_perusahaan`, `lokasi_perusahaan`) VALUES
(15, 'RRQ KINGDOM', 'RRQkingdom@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, '794569145_logo.png', 'No.11/RRQ_TEAM/423/908', 'Jakarta Pusat'),
(16, 'EVOS Esports', 'evos@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 3, '1113770608_logo2.jpg', '4567yhujb', 'Jakarta Barat'),
(17, 'Alter Ego Champs', 'alterego@gmai.com', '827ccb0eea8a706c4c34a16891f84e7b', 4, '293419026_logo3.png', 'e4dtvhbj', 'Medan'),
(18, 'Go Onic', 'onicesports@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 2, '1319628896_logo4.jpg', '2d333cf23', 'Bali'),
(21, '-', 'asd@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, '1328423411_809976899_zero two.jpg', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_simpan`
--

CREATE TABLE `tb_simpan` (
  `id_simpan` int(11) NOT NULL,
  `id_lowongan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_simpan`
--

INSERT INTO `tb_simpan` (`id_simpan`, `id_lowongan`, `id_user`) VALUES
(16, 5, 1),
(17, 4, 1),
(18, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tanggapan`
--

CREATE TABLE `tb_tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_lowongan` int(11) NOT NULL,
  `tanggapan` varchar(100) NOT NULL,
  `tgl_tanggapan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tanggapan`
--

INSERT INTO `tb_tanggapan` (`id_tanggapan`, `id_user`, `id_lowongan`, `tanggapan`, `tgl_tanggapan`) VALUES
(2, 2, 4, '952691472_Perancangan.pdf', '2021-04-18'),
(3, 1, 5, '914680652_Perancangan.pdf', '2021-04-19'),
(4, 1, 5, '569783192_Perancangan.pdf', '2021-04-19'),
(5, 1, 1, '1357083018_Perancangan.pdf', '2021-04-19'),
(6, 1, 1, '1997073901_914680652_Perancangan.pdf', '2021-04-20'),
(7, 1, 1, '1077049080_914680652_Perancangan.pdf', '2021-04-20'),
(8, 2, 1, '242075616_1997073901_914680652_Perancangan.pdf', '2021-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `jk` enum('perempuan','laki laki') NOT NULL,
  `ttl` date NOT NULL,
  `agama` varchar(50) NOT NULL,
  `gaji` int(11) NOT NULL,
  `pendidikan` text NOT NULL,
  `konsentrasi` varchar(50) NOT NULL,
  `r_pekerjaan` text NOT NULL,
  `r_penghargaan` text NOT NULL,
  `r_les` text NOT NULL,
  `ft_ktp` varchar(70) NOT NULL,
  `ft_profil` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `email`, `password`, `alamat`, `jk`, `ttl`, `agama`, `gaji`, `pendidikan`, `konsentrasi`, `r_pekerjaan`, `r_penghargaan`, `r_les`, `ft_ktp`, `ft_profil`) VALUES
(1, 'Aldi Yunan Anwari', 'jangduyyy@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Kp.Rantun ', 'laki laki', '2003-02-04', 'islam', 2000000, '- SDN TanjungKarya 1\r\n- MTs Darul Huda\r\n- SMPN 2 Samarang\r\n- SMK Al Madani Garut', 'Mekanik', '', '- Lose Streak Rank 13x tanpa win', 'Lulus tes mekanik hero guinevere', '396158657_2102345283_logo3.png', '1411848398_2102345283_logo.png'),
(2, 'Fadlan Abdul Rojak', 'fadlan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Kp.Bongkor', 'laki laki', '2021-04-22', 'Islam', 2500000, '- SDN Tanjung Anom 1\r\n- SMPN 2 Samarang\r\n- SMK Al Madani Garut', 'Hotel', '- Pernah Bekerja di PT.Mobidu Sinergi\r\n- Pernah Bekerja di Team 07', '- Juara 2 Lomba Membuat Aplikasi Web', '', '687450965_logo.png', '687450965_logo2.jpg'),
(3, 'Nasep Ependi', 'nasep@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 'laki laki', '2002-08-07', 'Islam', 4000000, '', '', '', '', '', '', ''),
(4, 'Deni Sahidin', 'deni@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 'perempuan', '0000-00-00', '', 0, '', '', '', '', '', '', ''),
(5, 'Anton Santoni', 'anton@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 'perempuan', '0000-00-00', '', 0, '', '', '', '', '', '', ''),
(6, 'faiz', 'faizfaizal027@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 'perempuan', '0000-00-00', '', 0, '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_lamaran`
--
ALTER TABLE `tb_lamaran`
  ADD PRIMARY KEY (`id_lamaran`);

--
-- Indexes for table `tb_lowongan`
--
ALTER TABLE `tb_lowongan`
  ADD PRIMARY KEY (`id_lowongan`);

--
-- Indexes for table `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `tb_simpan`
--
ALTER TABLE `tb_simpan`
  ADD PRIMARY KEY (`id_simpan`);

--
-- Indexes for table `tb_tanggapan`
--
ALTER TABLE `tb_tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_lamaran`
--
ALTER TABLE `tb_lamaran`
  MODIFY `id_lamaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_lowongan`
--
ALTER TABLE `tb_lowongan`
  MODIFY `id_lowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_simpan`
--
ALTER TABLE `tb_simpan`
  MODIFY `id_simpan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_tanggapan`
--
ALTER TABLE `tb_tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
