-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2021 at 01:38 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(7, 'Hotel'),
(10, 'Rumah Sakit'),
(11, 'Pendidikan'),
(12, 'Pabrik');

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

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`id_lokasi`, `lokasi`) VALUES
(1, 'Jakarta'),
(2, 'Bandung'),
(3, 'Bekasi'),
(4, 'Semarang'),
(5, 'Bali'),
(6, 'Surabaya'),
(7, 'Yogyakarta'),
(8, 'Solo'),
(9, 'Tanggerang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lowongan`
--

CREATE TABLE `tb_lowongan` (
  `id_lowongan` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `gaji` int(11) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `lokasi` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `persyaratan` text NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('buka','tutup') NOT NULL,
  `lowongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lowongan`
--

INSERT INTO `tb_lowongan` (`id_lowongan`, `id_perusahaan`, `gaji`, `posisi`, `lokasi`, `deskripsi`, `persyaratan`, `tanggal`, `status`, `lowongan`) VALUES
(9, 22, 4500000, '1', 1, 'mengatur pegawai dan yang berkaitan dengan hrd', 'yang penting sesuai', '2021-04-21', 'buka', 3),
(10, 22, 2500000, '4', 2, 'membereskan kamar dan property', 'bisa beres beres', '2021-04-21', 'buka', 5),
(11, 22, 3500000, '13', 1, 'mengatur akomodasi hotel', 'dapat mengatur akomodasi hotel', '2021-04-21', 'buka', 2),
(12, 23, 4980000, '13', 4, '', '', '2021-04-24', 'buka', 2),
(13, 23, 4790000, '14', 8, '', '', '2021-04-24', 'buka', 6),
(14, 25, 6820000, '2', 9, '', '', '2021-04-24', 'buka', 5),
(15, 22, 7620000, '11', 1, '', '', '2021-04-24', 'buka', 1),
(16, 23, 9650000, '3', 3, '', '', '2021-04-24', 'buka', 2),
(17, 24, 2890000, '11', 3, '', '', '2021-04-24', 'buka', 2),
(18, 22, 9380000, '10', 9, '', '', '2021-04-24', 'buka', 4),
(19, 22, 2220000, '9', 6, '', '', '2021-04-24', 'buka', 2),
(20, 26, 3380000, '5', 5, '', '', '2021-04-24', 'buka', 3),
(21, 25, 1410000, '1', 4, '', '', '2021-04-24', 'buka', 4),
(22, 26, 1980000, '12', 9, '', '', '2021-04-24', 'buka', 6),
(23, 23, 7950000, '7', 7, '', '', '2021-04-24', 'buka', 1);

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
(22, 'Hotel Cakra Buana', 'cakra@mail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, '794569145_logo.png', '123/abcv/1212', 'Tersebar di kota kota besar di indonesia'),
(23, 'Hotel Alingga', 'alingga@mail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, '794569145_logo.png', '5656/asad/323', 'Kota besar di indonesia'),
(24, 'Honda Sumber Makmur', 'makmur@mail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, '794569145_logo.png', '456/hjk/323', 'Bandung Jakarta'),
(25, 'Techno Software House', 'techno@mail.com', '827ccb0eea8a706c4c34a16891f84e7b', 5, '794569145_logo.png', '345/adasd/232', 'Semarang Bandung Jakarta Yogyakarta'),
(26, 'Medium Solution', 'medium@mail.com', '827ccb0eea8a706c4c34a16891f84e7b', 5, '794569145_logo.png', '58568/asdsd/234', 'Jakarta Bandung Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tb_posisi`
--

CREATE TABLE `tb_posisi` (
  `id_posisi` int(11) NOT NULL,
  `posisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_posisi`
--

INSERT INTO `tb_posisi` (`id_posisi`, `posisi`) VALUES
(1, 'Human Resources Departement (HRD)'),
(2, 'Manager'),
(3, 'General Affairs'),
(4, 'Environment Management'),
(5, 'Safety Departement'),
(6, 'Departement Production'),
(7, 'Work Technical'),
(8, 'Quality Assurance'),
(9, 'IT'),
(10, 'Accounting'),
(11, 'Research Departement'),
(12, 'Engineering'),
(13, 'Warehouse Management'),
(14, 'Production Planning');

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
(21, 11, 7),
(22, 22, 7),
(23, 23, 7);

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
  `kota` int(11) NOT NULL,
  `posisi` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
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

INSERT INTO `tb_user` (`id_user`, `nama_user`, `email`, `password`, `alamat`, `kota`, `posisi`, `kategori`, `jk`, `ttl`, `agama`, `gaji`, `pendidikan`, `konsentrasi`, `r_pekerjaan`, `r_penghargaan`, `r_les`, `ft_ktp`, `ft_profil`) VALUES
(7, 'taufik', 'taufik@mail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 7, 9, 4, 'laki laki', '1994-12-30', 'Islam', 2000000, '', 'IT', '', '', '', '', '');

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
-- Indexes for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

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
-- Indexes for table `tb_posisi`
--
ALTER TABLE `tb_posisi`
  ADD PRIMARY KEY (`id_posisi`);

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
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_lamaran`
--
ALTER TABLE `tb_lamaran`
  MODIFY `id_lamaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_lowongan`
--
ALTER TABLE `tb_lowongan`
  MODIFY `id_lowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_posisi`
--
ALTER TABLE `tb_posisi`
  MODIFY `id_posisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_simpan`
--
ALTER TABLE `tb_simpan`
  MODIFY `id_simpan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_tanggapan`
--
ALTER TABLE `tb_tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
