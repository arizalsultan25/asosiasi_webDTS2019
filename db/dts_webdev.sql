-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2019 at 09:37 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dts_webdev`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `nik` int(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`nik`, `password`) VALUES
(1, 'e10adc3949ba59abbe56e057f20f883e'),
(1010, '202cb962ac59075b964b07152d234b70'),
(1234, '202cb962ac59075b964b07152d234b70'),
(2222, '202cb962ac59075b964b07152d234b70'),
(2704, '202cb962ac59075b964b07152d234b70'),
(3001, '202cb962ac59075b964b07152d234b70'),
(4321, '202cb962ac59075b964b07152d234b70'),
(5555, '202cb962ac59075b964b07152d234b70'),
(8888, '202cb962ac59075b964b07152d234b70'),
(9898, '202cb962ac59075b964b07152d234b70'),
(9999, '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `mapping_pengguna`
--

CREATE TABLE `mapping_pengguna` (
  `nik` int(10) NOT NULL,
  `id_posisi` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapping_pengguna`
--

INSERT INTO `mapping_pengguna` (`nik`, `id_posisi`) VALUES
(1, 1),
(1010, 4),
(1234, 2),
(2222, 4),
(2704, 3),
(3001, 3),
(4321, 4),
(5555, 4),
(8888, 4),
(9898, 4),
(9999, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `nik` int(10) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `ttl` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `bln_join` varchar(20) NOT NULL,
  `thn_join` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`nik`, `nama`, `ttl`, `alamat`, `provinsi`, `email`, `bln_join`, `thn_join`) VALUES
(1, 'Sultan', '1998-05-20', 'Batu Aji', 'Kepulauan Riau', 'admin@api.ac.id', 'Mar', 2017),
(1010, 'hahahah', '1778-02-03', 'asdad', 'Kalimantan Barat', 'asd@gmail.com', 'Jul', 2019),
(1234, 'Agung', '1998-02-12', 'Baloi', 'Kalimantan Barat', 'gunglah@gmail.com', 'Mar', 2017),
(2222, 'Klkasd', '0000-00-00', 'hkjahskhd', 'Aceh', 'dasd@gmail.com', 'Mar', 2017),
(2704, 'Deva', '1990-08-25', 'Batu Aji', 'Jawa Timur', 'deva@mail.com', 'Mar', 2017),
(3001, 'Melina', '2000-01-30', 'Tiban', 'Sumatera Selatan', 'melina@gmail.com', 'Feb', 2017),
(4321, 'Dian', '0000-00-00', 'Baloi Persero', 'Aceh', 'dian@mail.uk', 'Feb', 2017),
(5555, 'Fio', '1999-07-11', 'Batam Centre', 'Bangka Belitung', 'fio@gm.com', 'Feb', 2017),
(8888, 'gagagag', '2011-07-06', 'asdads', 'Aceh', 'dfdf@gmail.com', 'Feb', 2018),
(9898, 'asdasd', '4444-02-03', 'asad', 'Aceh', 'fsss@gmail.com', 'Feb', 2018),
(9999, 'asdad', '0000-00-00', 'gggg', 'Aceh', 'fsss@gmail.com', 'Feb', 2018);

-- --------------------------------------------------------

--
-- Table structure for table `persetujuan`
--

CREATE TABLE `persetujuan` (
  `nik` int(10) NOT NULL,
  `status` enum('disetujui','belum disetujui') NOT NULL DEFAULT 'belum disetujui'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persetujuan`
--

INSERT INTO `persetujuan` (`nik`, `status`) VALUES
(1010, 'belum disetujui'),
(2222, 'disetujui'),
(2704, 'disetujui'),
(4321, 'disetujui'),
(5555, 'disetujui'),
(8888, 'disetujui'),
(9898, 'belum disetujui'),
(9999, 'belum disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `portofolio`
--

CREATE TABLE `portofolio` (
  `nik` int(10) NOT NULL,
  `bidang_keahlian` varchar(100) NOT NULL,
  `riwayat_pelatihan` text NOT NULL,
  `sertifikat_dimiliki` text NOT NULL,
  `riwayat_project` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE `posisi` (
  `id_posisi` int(2) NOT NULL,
  `nama_posisi` enum('Admin','Ketua','Sekretariat','Anggota') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`id_posisi`, `nama_posisi`) VALUES
(1, 'Admin'),
(2, 'Ketua'),
(3, 'Sekretariat'),
(4, 'Anggota');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `mapping_pengguna`
--
ALTER TABLE `mapping_pengguna`
  ADD PRIMARY KEY (`nik`,`id_posisi`),
  ADD KEY `id_posisi` (`id_posisi`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `persetujuan`
--
ALTER TABLE `persetujuan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id_posisi`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `pengguna` (`nik`),
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `pengguna` (`nik`) ON DELETE CASCADE,
  ADD CONSTRAINT `login_ibfk_3` FOREIGN KEY (`nik`) REFERENCES `pengguna` (`nik`) ON DELETE CASCADE;

--
-- Constraints for table `mapping_pengguna`
--
ALTER TABLE `mapping_pengguna`
  ADD CONSTRAINT `mapping_pengguna_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `pengguna` (`nik`),
  ADD CONSTRAINT `mapping_pengguna_ibfk_2` FOREIGN KEY (`id_posisi`) REFERENCES `posisi` (`id_posisi`),
  ADD CONSTRAINT `mapping_pengguna_ibfk_3` FOREIGN KEY (`nik`) REFERENCES `pengguna` (`nik`) ON DELETE CASCADE;

--
-- Constraints for table `persetujuan`
--
ALTER TABLE `persetujuan`
  ADD CONSTRAINT `persetujuan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `pengguna` (`nik`),
  ADD CONSTRAINT `persetujuan_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `pengguna` (`nik`) ON DELETE CASCADE;

--
-- Constraints for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD CONSTRAINT `portofolio_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `pengguna` (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
