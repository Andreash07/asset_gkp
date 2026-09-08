-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2026 at 01:17 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asset_gkp`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `jemaat_id` int(11) NOT NULL,
  `atas_nama` varchar(20) DEFAULT NULL,
  `kategori_atas_nama` tinyint(2) NOT NULL DEFAULT 0,
  `kategori_atas_nama_text` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'diisi ketika bapel, mitra, pribadi, negara',
  `status_hak_milik` tinyint(2) NOT NULL DEFAULT 0 COMMENT 'HGB,SGU.HM,etc',
  `jenis_dokumen_kepemilikan` tinyint(2) NOT NULL DEFAULT 0,
  `no_dokumen` varchar(25) DEFAULT NULL,
  `alamat_lokasi` text DEFAULT NULL,
  `kelurahan` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kabupaten_kota` varchar(50) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `negara` varchar(50) DEFAULT NULL,
  `luas` varchar(10) NOT NULL DEFAULT '0' COMMENT 'meter persegi',
  `peruntukan_tanah` varchar(100) DEFAULT NULL,
  `keberadaan_alas_hak` varchar(50) DEFAULT NULL COMMENT 'Sinode, Jemaat, Yayasan',
  `sts_sertifikat_disinode` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Ya; 0: Tidak;',
  `kategori_sertifikat` int(11) NOT NULL,
  `nilai_aset` varchar(20) DEFAULT '0',
  `keterangan` text DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `langtitude` text DEFAULT NULL,
  `longtitude` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `created_by` varchar(10) DEFAULT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0:Belum Disetujui; 1: Disetujui;\r\n2: Tidak Disetujui;',
  `approved_at` datetime DEFAULT NULL,
  `sts_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1: deleted;',
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jemaat`
--

CREATE TABLE `jemaat` (
  `id` int(11) NOT NULL,
  `klasis_id` tinyint(2) NOT NULL DEFAULT 0,
  `CompCode` varchar(3) NOT NULL,
  `CompName` varchar(30) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `City` varchar(30) DEFAULT NULL,
  `Country` varchar(30) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `NPWP` varchar(20) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `IsSuspend` tinyint(1) NOT NULL,
  `LastUpdate` datetime DEFAULT NULL,
  `UpdateBy` varchar(10) DEFAULT NULL,
  `BeginningPeriod` date DEFAULT NULL,
  `CurrentPeriod` date DEFAULT NULL,
  `StartMonth` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_dokumen_kepemilikan`
--

CREATE TABLE `jenis_dokumen_kepemilikan` (
  `id` int(11) NOT NULL,
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_nopad_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `priority` tinyint(4) NOT NULL DEFAULT 99
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_hak_milik`
--

CREATE TABLE `jenis_hak_milik` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `priority` tinyint(4) NOT NULL DEFAULT 99
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_kepemilikan`
--

CREATE TABLE `kategori_kepemilikan` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(25) NOT NULL,
  `initials` varchar(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `priority` tinyint(4) NOT NULL DEFAULT 99
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `klasis`
--

CREATE TABLE `klasis` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lampiran_assets`
--

CREATE TABLE `lampiran_assets` (
  `id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `asset_id` int(11) NOT NULL,
  `mime_type` varchar(50) DEFAULT NULL,
  `size` varchar(20) NOT NULL DEFAULT '0' COMMENT 'byte',
  `file_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(50) DEFAULT NULL,
  `private` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: public; 1:private;',
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `update_by` varchar(10) DEFAULT NULL,
  `upload_by` varchar(10) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:pria; 2:wanita',
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `photo` varchar(35) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `l12jhlaslaksljd` varchar(20) NOT NULL,
  `iausoq12eu809asod` varchar(35) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `usertype` tinyint(1) DEFAULT 2 COMMENT '1:permanent; 2:regular_user',
  `user_role` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:Operator; 2:validator; 3:administrator'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jemaat`
--
ALTER TABLE `jemaat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_dokumen_kepemilikan`
--
ALTER TABLE `jenis_dokumen_kepemilikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_hak_milik`
--
ALTER TABLE `jenis_hak_milik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_kepemilikan`
--
ALTER TABLE `kategori_kepemilikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klasis`
--
ALTER TABLE `klasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lampiran_assets`
--
ALTER TABLE `lampiran_assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asset_id` (`asset_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jemaat`
--
ALTER TABLE `jemaat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_dokumen_kepemilikan`
--
ALTER TABLE `jenis_dokumen_kepemilikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_hak_milik`
--
ALTER TABLE `jenis_hak_milik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_kepemilikan`
--
ALTER TABLE `kategori_kepemilikan`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klasis`
--
ALTER TABLE `klasis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lampiran_assets`
--
ALTER TABLE `lampiran_assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
