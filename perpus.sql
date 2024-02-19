-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2024 at 07:47 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `penulis` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `matapelajaran_idpelajaran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `penulis`, `keterangan`, `stok`, `gambar`, `matapelajaran_idpelajaran`) VALUES
(2, 'Bermain dengan Internet Of Things & Big Data', 'Dhoto', 'Pembahasan tentang Internet of Things & Big Data', 40, NULL, NULL),
(3, 'Macintosh Book References', 'Apple', 'A Book about Macintosh Manual', 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama`, `alamat`, `email`, `no_hp`) VALUES
(1, 'Buk Juminah', 'Batam', 'juminah@gmail.com', '010101'),
(2, 'Buk Ririn', 'Batam', 'ririn@gmail.com', '020202'),
(3, 'Buk Hafizah', 'Batam', 'nurhafizah@gmail.com', '030303');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `namakelas` varchar(100) DEFAULT NULL,
  `walikelas` int(11) DEFAULT NULL,
  `ketuakelas` varchar(50) DEFAULT NULL,
  `kursi` int(11) DEFAULT NULL,
  `meja` int(11) DEFAULT NULL,
  `gambar_kelas` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `namakelas`, `walikelas`, `ketuakelas`, `kursi`, `meja`, `gambar_kelas`) VALUES
(1, 'XI PPLG 3', 1, 'Fauzi', 37, 38, NULL),
(2, 'XI PPLG 2', 2, 'Luthfan', 37, 37, NULL),
(3, 'XI PPLG 1', 3, 'Danu', 39, 39, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `matapelajaran`
--

CREATE TABLE `matapelajaran` (
  `id` int(11) NOT NULL,
  `namapelajaran` varchar(100) DEFAULT NULL,
  `namaguru` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matapelajaran`
--

INSERT INTO `matapelajaran` (`id`, `namapelajaran`, `namaguru`) VALUES
(1, 'Robotika', NULL),
(2, 'Informatika', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_pengguna`, `tanggal_pinjam`, `tanggal_kembali`) VALUES
(1, 1, '2024-01-20', '2024-02-12'),
(2, 2, '2024-01-01', '2024-02-01'),
(3, 3, '2023-12-25', '2024-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_buku`
--

CREATE TABLE `peminjaman_buku` (
  `id_peminjaman` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `jumlah_buku` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman_buku`
--

INSERT INTO `peminjaman_buku` (`id_peminjaman`, `id_buku`, `jumlah_buku`) VALUES
(1, NULL, 4),
(1, NULL, 4),
(1, NULL, 4),
(1, NULL, 4);

--
-- Triggers `peminjaman_buku`
--
DELIMITER $$
CREATE TRIGGER `pinjambuku` AFTER INSERT ON `peminjaman_buku` FOR EACH ROW BEGIN
	UPDATE buku SET stok = stok - NEW.jumlah_buku
	WHERE id_buku = NEW.id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian_buku`
--

CREATE TABLE `pengembalian_buku` (
  `id_peminjaman` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `jumlah_buku` int(11) DEFAULT NULL,
  `tanggal_pengembalian` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengembalian_buku`
--

INSERT INTO `pengembalian_buku` (`id_peminjaman`, `id_buku`, `jumlah_buku`, `tanggal_pengembalian`) VALUES
(1, NULL, 4, '2024-02-13'),
(1, NULL, 4, '2024-02-13'),
(1, NULL, 4, '2024-02-13'),
(1, NULL, 4, '2024-02-13');

--
-- Triggers `pengembalian_buku`
--
DELIMITER $$
CREATE TRIGGER `balikin_buku` AFTER INSERT ON `pengembalian_buku` FOR EACH ROW BEGIN
	UPDATE buku SET stok = stok + NEW.jumlah_buku
	WHERE id_buku = NEW.id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(100) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `alamat`, `email`, `no_hp`, `id_user`) VALUES
(1, 'Alief', 'Batam', 'monb04973@gmail.com', '081112', NULL),
(2, 'Enno', 'Batam', 'rivetchan@gmail.com', '085554', NULL),
(3, 'Denif', 'Batam', 'denifpro@gmail.com', '010101', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'monb', '12345'),
(2, 'rivet', '321'),
(3, 'miko', '222');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buku_ibfk_1` (`matapelajaran_idpelajaran`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_ibfk_1` (`walikelas`);

--
-- Indexes for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matapelajaran_ibfk_1` (`namaguru`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `peminjaman_ibfk_1` (`id_pengguna`);

--
-- Indexes for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  ADD KEY `peminjaman_buku_ibfk_1` (`id_peminjaman`),
  ADD KEY `peminjmana_buku_ibfk_2` (`id_buku`);

--
-- Indexes for table `pengembalian_buku`
--
ALTER TABLE `pengembalian_buku`
  ADD KEY `id_peminjaman` (`id_peminjaman`),
  ADD KEY `pengembalian_buku_ibfk_2` (`id_buku`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`matapelajaran_idpelajaran`) REFERENCES `matapelajaran` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`walikelas`) REFERENCES `guru` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  ADD CONSTRAINT `matapelajaran_ibfk_1` FOREIGN KEY (`namaguru`) REFERENCES `guru` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  ADD CONSTRAINT `peminjaman_buku_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `peminjmana_buku_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `pengembalian_buku`
--
ALTER TABLE `pengembalian_buku`
  ADD CONSTRAINT `pengembalian_buku_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`),
  ADD CONSTRAINT `pengembalian_buku_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
