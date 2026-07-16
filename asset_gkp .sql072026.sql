-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2026 at 10:59 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

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
  `sts_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1: deleted;',
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `jemaat_id`, `atas_nama`, `kategori_atas_nama`, `status_hak_milik`, `jenis_dokumen_kepemilikan`, `no_dokumen`, `alamat_lokasi`, `kelurahan`, `kecamatan`, `kabupaten_kota`, `provinsi`, `negara`, `luas`, `peruntukan_tanah`, `keberadaan_alas_hak`, `sts_sertifikat_disinode`, `kategori_sertifikat`, `nilai_aset`, `keterangan`, `catatan`, `langtitude`, `longtitude`, `created_at`, `updated_at`, `created_by`, `update_by`, `sts_delete`, `deleted_at`) VALUES
(1, 3, 'GKP', 1, 4, 1, 'HM NO. 920', 'Konfersi bekas E.12229 Jl. KEBONJATI NO. 108\r\nKEC. TJITJENDO\r\nWILAYAH BOJONAGARA\r\nKOTA MADYA BANDUNG\r\n', NULL, NULL, NULL, NULL, NULL, '2690', 'GEDUNG GEREJA GKP BANDUNG', 'ASLI Sertipikat ada DI SINODE', 0, 1, '0', 'diSinode hanya copy.', '', '-6.915980999999999', '107.5986643', '2026-07-03 14:46:19', '2026-07-05 13:47:41', '7', NULL, 0, NULL),
(2, 0, 'GKP Kampung Sawah', 2, 0, 0, NULL, 'Jalan Raya Kampung Sawah no 177, Kec. Pondok Melati, Kel. Jatimurni', NULL, NULL, NULL, NULL, NULL, '120', 'Rumah Pastori 2', NULL, 1, 0, '0', 'Surat-surat lengkap', 'tidak ada', '-6.323228295318335', '106.93642855413613', '2026-07-04 04:30:47', '2026-07-16 08:51:20', NULL, NULL, 0, NULL),
(3, 0, 'GKP Kampung Sawah', 2, 0, 0, NULL, 'Jalan Raya Kampung Sawah no 177, Kec. Pondok Melati, Kel. Jatimurni', NULL, NULL, NULL, NULL, NULL, '120', 'Rumah Pastori 2', NULL, 1, 0, '0', 'Surat-surat lengkap', 'tidak ada', '-6.323228295318335', '106.93642855413613', '2026-07-04 04:31:54', '2026-07-15 15:12:26', NULL, NULL, 0, NULL),
(4, 0, 'GKP', 1, 0, 0, NULL, 'Jl. Dewi Sartika no. 119\r\n(Sesuai Dokumen)', NULL, NULL, NULL, NULL, NULL, '1000', 'Kantor MS', NULL, 1, 0, '0', 'ini data Lokasi Sertifikat ', '', '-6.9319437919845655', '107.60644912719727', '2026-07-04 04:40:59', '2026-07-15 15:12:32', NULL, NULL, 0, NULL),
(5, 13, 'GKP Sumedang', 2, 1, 1, 'asd2d12', 'SUmedang Jawa Barat', NULL, NULL, NULL, NULL, NULL, '500', 'Pastori6', NULL, 2, 0, '0', 'Di jemaat (2020)', 'tidak ada', '-6.855065199999999', '107.9225565', '2026-07-11 14:56:46', '2026-07-11 21:58:43', NULL, NULL, 0, NULL),
(6, 28, 'GKP Kampung Sawah', 2, 1, 1, '2546', 'GKP Kampung Sawah', NULL, NULL, NULL, NULL, NULL, '120', 'Rumah Pastor 1', NULL, 2, 0, '0', 'Tidak', '', '-6.323387248914939', '106.93667306980173', '2026-07-16 07:38:12', NULL, NULL, NULL, 0, NULL);

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

--
-- Dumping data for table `jemaat`
--

INSERT INTO `jemaat` (`id`, `klasis_id`, `CompCode`, `CompName`, `Address`, `City`, `Country`, `Phone`, `NPWP`, `Description`, `IsSuspend`, `LastUpdate`, `UpdateBy`, `BeginningPeriod`, `CurrentPeriod`, `StartMonth`) VALUES
(0, 0, '001', 'Sinode GKP', 'Jl. Dewi Sartika 119', 'Bandung', 'Indonesia', '12345', '1234567', '', 0, '2021-02-06 05:43:53', 'ADMIN', '2021-03-01', '2021-05-01', 4),
(3, 5, '102', 'GKP BANDUNG', 'Jl. Kebonjati No.08, BDG 40181', 'Bandung', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 11:00:34', 'ADMIN', '2021-04-29', '2021-03-01', 4),
(4, 5, '103', 'GKP CICALENGKA', 'Jl. Ir.H.Juanda Rt 01/04, Cikuya, Kab.BDG 40395', 'Bandung', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 11:00:43', 'ADMIN', '2021-04-29', '2021-04-29', 4),
(5, 5, '104', 'GKP CIMAHI', 'Jl. Gatot Subroto No.24, Cimahi 40523', 'Bandung', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 11:00:54', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(6, 5, '105', 'GKP CIWIDEY', 'Jl. Ampera No.115, Ciwidey 40973', 'Ciwidey', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 10:59:05', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(7, 5, '106', 'GKP DAYEUHKOLOT', 'Jl. Sukabirus No.5 Rt 03/15, Dayeuhkolot,Bandung 40257', 'Bandung', 'Indonesia', '0821-2525-4983', '-', 'OK', 0, '2021-09-25 11:41:24', 'ADMIN', '2021-03-31', '2021-04-01', 4),
(8, 5, '107', 'GKP GARUT', 'Jl. Bratayudha No.46, Garut 44114', 'Garut', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 11:01:54', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(9, 5, '108', 'GKP KALAKSANAN', 'Kp. Kalaksanan RT 006 RW 002 Desa Cikawungading Kec. Cipatujah Kab. Tasikmalaya', 'Tasikmalaya', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 11:03:09', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(10, 5, '109', 'GKP KATAPANG', 'Kp. Sukamulya No.11A Rt 01/08, Pangauban, Bandung 40971', 'Bandung', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 11:04:18', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(11, 5, '110', 'GKP LEMBANG', 'Jl. Jayagiri No.8 Rt04/11, Lembang 40391', 'Lembang', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 11:05:00', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(12, 5, '111', 'GKP PANGALENGAN', 'Asrama SECATA TNI-AD, Tromol Pos No.14/PLN, Bandung 40378', 'Bandung', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 11:08:57', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(13, 5, '112', 'GKP SUMEDANG', 'Jl. Geusan Ulun No.106, Sumedang 45311', 'Sumedang', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 11:09:41', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(14, 5, '113', 'GKP TASIKMALAYA', 'Jl. Selakaso No.61, Tasikmalaya 46121', 'Tasikmalaya', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 11:10:45', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(15, 5, '114', 'GKP UJUNGBERUNG', 'Perum Pasirjati Blok B No.109 Rt 02/06, Jati Endah', 'Bandung', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 11:11:26', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(16, 5, '115', 'GKP CIPATAT', 'Jl. Raya Cipatat No. 640 /186', 'Bandung 40554', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 11:12:18', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(17, 6, '201', 'GKP BOJONGSARI', 'Jl. Bojongsari No.2, Kedung Waringin, Bekasi 17547', 'Bekasi', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 11:20:35', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(18, 6, '202', 'GKP CIKAMPEK', 'Perum Saraswati Blok B 11 Jl. Kresna', 'Cikampek 41373', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 11:21:28', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(19, 6, '203', 'GKP SUKAMANDI', 'Jl. Raya Ahmad Yani No.2, Sukamandi', 'Subang 41256', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 11:22:27', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(20, 6, '204', 'GKP KARAWANG', 'Jl. Kertabumi No.39', 'Karawang 41311', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 11:25:18', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(21, 6, '205', 'GKP PURWAKARTA', 'Jl. Jendral Sudirman No.226-228', 'Purwakarta 41115', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 11:26:16', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(22, 6, '206', 'GKP SADANG', 'Jl. Raya Sadang Subang Depan SMA PGRI 2', 'Sadang', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 11:27:05', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(23, 6, '207', 'GKP TELUK JAMBE', 'Komp. Asrama Ex Yon 324 Teluk Jambe', 'Karawang 41311', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 11:27:44', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(24, 1, '301', 'GKP BEKASI', 'Jl. Ir. H. Juanda No.166 B RT.001/RW.009, Margahayu, Kec. Bekasi Tim., Kota Bekasi', 'Jawa Barat 17114', 'Indonesia', '(021) 8814961', '-', NULL, 0, '2021-09-13 12:43:04', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(25, 1, '302', 'GKP CIMUNING', 'Jl. Raya Bantar Gebang-Setu Rt 03/07 Mustikaya', 'Bekasi', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 11:29:06', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(26, 1, '303', 'GKP JATIASIH', 'Belakang Perum PEMDA Bekasi Blok A, Jl. Nasir No.9 Jatiasih', 'Bekasi 17423', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 11:29:58', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(27, 1, '304', 'GKP JATIRANGGON', 'Jl. Kel.Jatiranggon Rt 01/02 Jatisampurna, Pondok Gede', 'Bekasi 17432', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 11:30:50', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(28, 1, '305', 'GKP KAMPUNG SAWAH', 'Jl. Raya Kampung Sawah No.33 Rt 03/04 Pondok Melati', 'Bekasi', 'Indonesia', '-', '-', 'OK', 0, '2022-03-20 13:07:08', 'ADMIN', '2026-03-31', '2026-03-31', 4),
(29, 1, '306', 'GKP PONDOK MELATI', 'Jl. Raya HANKAM 45 Rt 01/05 Jatiwarna', 'Bekasi', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 11:32:08', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(30, 1, '307', 'GKP SEROJA', 'Perum Jati Unggul Blok A 1/8, Harapan Jaya', 'Bekasi 17124', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 11:32:47', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(31, 1, '308', 'GKP CIKARANG', 'Jl. Kihajar Dewantara No.17 Rt 02/01 Sukaraja', 'Cikarang 17350', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 11:34:00', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(32, 3, '401', 'GKP BETHESDA', 'Jl. Protokol No. 807 Blok. Cempakasari RT.002 RW.012 Desa Genteng, Kec. Dawuan', 'Majalengka', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 13:49:55', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(33, 3, '402', 'GKP CIREBON', 'Jl. Yos Sudarso No.10', 'Cirebon 45111', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 13:50:50', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(34, 3, '403', 'GKP CIGUGUR', 'Jl. Cisantana, Depan Koramil 1515 Cigugur', 'Kuningan  45501', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 13:52:53', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(35, 3, '404', 'GKP CIDERES', 'Tromol Pos No.9 Depan RSU Cideres-Kadipaten', 'Majalengka 45452', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 13:53:28', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(36, 5, '405', 'GKP HAURGEULIS', 'Jl. Siliwangi No.37 Haurgeulis', 'Indramayu 45264', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 13:54:05', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(37, 3, '406', 'GKP JUNTIKEBON', 'Kotak Pos No.19, Juntinyuat', 'Indramayu 45282', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 13:54:43', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(38, 3, '407', 'GKP KADIPATEN', 'Jl. Brawijaya No.3 Kadipaten', 'Majalengka 45452', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 14:01:31', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(39, 3, '408', 'GKP TAMIYANG', 'Jl. Siliwangi No.37 Haurgeulis', 'Indramayu 45264', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 14:02:18', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(40, 2, '501', 'GKP BOGOR', 'Jl. Jendral A. Yani, Tanah Sareal', 'Bogor 16161', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 14:03:14', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(41, 2, '502', 'GKP CIRANJANG', 'Perum.Bumi Permai,Cibogo Desa Mekargalih RT 02/02 no.E9', 'Cianjur 43282', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 14:04:03', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(42, 2, '503', 'GKP CIANJUR', 'Jl. Mangunsarkoro No.111', 'Cianjur', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 14:04:41', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(43, 2, '504', 'GKP CIKEMBAR', 'Jl. Pelabuhan II KM.18, Kec. Cikembar, Sukabumi', 'Jawa Barat 43157', 'Indonesia', '-', '-', NULL, 0, '2021-09-13 12:35:50', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(44, 2, '505', 'GKP DEPOK', 'Jl. Stasiun No.7 Pancoran Mas, Depok Lama', 'Kotip Depok 16431', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 14:06:10', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(45, 2, '506', 'GKP GUNUNG PUTRI', 'Jl. Gardu Tol - Gunung Putri', 'Bogor 16810', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 14:06:48', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(46, 2, '507', 'GKP SUKABUMI', 'Jl. Suryakencana No.41', 'Sukabumi 43114', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 14:07:25', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(47, 2, '508', 'GKP PACET', 'Jl. Raya Cipanas No.7 Sindanglaya', 'Cipanas 43253', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 14:08:00', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(48, 2, '509', 'GKP PALALANGON', 'PO.BOX No.27 Ciranjang', 'Cianjur 43282', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 14:09:19', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(49, 2, '510', 'GKP SINDANG JAYA', 'Jl. Simatupang No.11 Sindangjaya', 'Cianjur', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 14:20:49', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(50, 4, '601', 'GKP CAWANG', 'Jl. Dewi Sartika No.200 Cawang', 'Jakarta Timur 13630', 'Indonesia', '-', '-', NULL, 0, '2021-09-11 14:31:04', 'ADMIN', '2021-09-11', '2021-09-11', 4),
(51, 4, '602', 'GKP CAKUNG', 'Jl. Stasiun Cakung No.27, RT.9/RW.3, Pulo Gebang, Kec. Cakung', 'Jakarta Timur 13950', 'Indonesia', '-', '-', NULL, 0, '2021-09-13 12:38:43', 'ADMIN', '2021-09-13', '2021-09-13', 4),
(52, 4, '603', 'GKP CIBUBUR', 'Jl. Tipar No.10 Rt.01/07 Pasar Rebo', 'Jakarta Timur 13710', 'Indonesia', '-', '-', NULL, 0, '2021-09-13 12:37:45', 'ADMIN', '2021-09-13', '2021-09-13', 4),
(53, 4, '604', 'GKP JATINEGARA', 'Jl. Jatinegarra Timur No.66, RT.11/RW.3, Bali Mester, Jatinegara', 'Jakarta Timur 13310', 'Indonesia', '(021) 8561562', '-', NULL, 0, '2021-09-13 12:36:44', 'ADMIN', '2021-09-13', '2021-09-13', 4),
(54, 4, '605', 'GKP KRAMAT', 'Jl. Kramat Raya No.65', 'Jakarta Pusat 10450', 'Indonesia', '-', '-', NULL, 0, '2021-09-13 12:22:26', 'ADMIN', '2021-09-13', '2021-09-13', 4),
(55, 4, '606', 'GKP TANJUNGPRIOK', 'Jl. Kb. Bawang No.16, RT.3/RW.7, Kb. Bawang, Tj. Priok', 'Jakarta Utara 14320', 'Indonesia', '-', '-', NULL, 0, '2021-09-13 12:32:59', 'ADMIN', '2021-09-13', '2021-09-13', 4),
(56, 4, '607', 'GKP KAMPUNG TENGAH', 'No.41, Jl. Raya Bogor, RT.1/RW.8, Kampung Tengah, Kramat Jati,Jakarta Timur', 'Jakarta 13540', 'Indonesia', '-', '-', NULL, 0, '2021-09-13 12:25:44', 'ADMIN', '2021-09-13', '2021-09-13', 4),
(57, 4, '608', 'GKP RANGKASBITUNG', 'Jl. Sunan Kalijaga No.5, Muara Ciujung Bar., Kec. Rangkasbitung, Kabupaten Lebak', 'Banten 42312', 'Indonesia', '(0252) 202416', '-', NULL, 0, '2021-09-13 12:27:14', 'ADMIN', '2021-09-13', '2021-09-13', 4),
(58, 4, '609', 'GKP TANAH TINGGI', 'Jl. Tanah Tinggi XII No.43, RT.6/RW.6, Tanah Tinggi, Kec. Johar Baru', 'Jakarta Pusat 10540', 'Indonesia', '(021) 42887316', '-', NULL, 0, '2021-09-13 12:31:01', 'ADMIN', '2021-09-13', '2021-09-13', 4),
(59, 4, '610', 'GKP TANJUNG BARAT', 'Jl. Nangka Raya No.3, RT.5/RW.5, Tj. Bar., Kec. Jagakarsa', 'Jakarta Selatan 12530', 'Indonesia', '-', '-', NULL, 0, '2021-09-13 12:30:26', 'ADMIN', '2021-09-13', '2021-09-13', 4),
(60, 4, '611', 'GKP TANGERANG', 'Jl. DR. Sitanala No.20, RT.001/RW.001, Mekarsari, Kec. Neglasari, Kota Tangerang', 'Banten 15121', 'Indonesia', '(021) 55761282', '-', NULL, 0, '2021-09-13 12:40:22', 'ADMIN', '2021-09-13', '2021-09-13', 4);

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

--
-- Dumping data for table `jenis_dokumen_kepemilikan`
--

INSERT INTO `jenis_dokumen_kepemilikan` (`id`, `name`, `status`, `created_at`, `priority`) VALUES
(0, 'Tidak Diketahui', 1, '2026-07-05 05:56:30', 99),
(1, 'Sertipikat', 1, '2026-07-15 08:20:43', 1),
(2, 'AJB', 1, '2026-07-15 08:22:38', 2),
(3, 'Girik/Letter C/Persil', 1, '2026-07-15 08:22:41', 3),
(4, 'Eigendom Verponding', 1, '2026-07-15 08:22:44', 4),
(5, 'Pinjam', 1, '2026-07-15 08:22:46', 5),
(6, 'Akta Hibah', 1, '2026-07-15 08:22:48', 6);

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

--
-- Dumping data for table `jenis_hak_milik`
--

INSERT INTO `jenis_hak_milik` (`id`, `name`, `status`, `created_at`, `priority`) VALUES
(0, 'Tidak Diketahui', 1, '2026-07-05 05:55:17', 99),
(1, 'HM', 1, '2026-07-05 05:54:12', 1),
(2, 'HGB', 1, '2026-07-05 05:54:51', 2),
(3, 'HGU', 1, '2026-07-05 05:54:51', 3),
(4, 'HP', 1, '2026-07-05 05:54:51', 4);

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

--
-- Dumping data for table `kategori_kepemilikan`
--

INSERT INTO `kategori_kepemilikan` (`id`, `name`, `initials`, `status`, `created_at`, `priority`) VALUES
(0, 'Tidak Diketahui', NULL, 1, '2026-07-05 05:55:57', 99),
(1, 'Sinode GKP', 'Sinode', 1, '2026-07-05 05:29:23', 1),
(2, 'Jemaat GKP', 'Jemaat', 1, '2026-07-05 05:29:23', 2),
(3, 'Badan Pelayanan GKP', 'BaPel GKP', 1, '2026-07-05 05:32:15', 3),
(4, 'Mitra', 'Mitra', 1, '2026-07-05 05:32:32', 4),
(5, 'Negara', 'Negara', 1, '2026-07-05 05:32:32', 5),
(7, 'Pribadi', 'Pribadi', 1, '2026-07-05 06:39:04', 6);

-- --------------------------------------------------------

--
-- Table structure for table `klasis`
--

CREATE TABLE `klasis` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klasis`
--

INSERT INTO `klasis` (`id`, `name`, `status`) VALUES
(1, 'Klasis Bekasi', 1),
(2, 'Klasis Bogor', 1),
(3, 'Klasis Cirebon', 1),
(4, 'Klasis Jakarta', 1),
(5, 'Klasis Priangan', 1),
(6, 'Klasis Purwakarta', 1);

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

--
-- Dumping data for table `lampiran_assets`
--

INSERT INTO `lampiran_assets` (`id`, `name`, `asset_id`, `mime_type`, `size`, `file_name`, `path`, `private`, `uploaded_at`, `update_at`, `update_by`, `upload_by`, `deleted`) VALUES
(1, 'Sertifikat 6', 1, 'image/png', '23510', '1787029.png', '78as98fd298a9s/1-6a5454cb79465.png', 0, '2026-07-12 22:00:27', '2026-07-10 10:31:10', '7', '7', 1),
(2, 'Sertifikat1', 1, 'image/png', '54250', '8029517.png', '78as98fd298a9s/1-6a54557485b0f.png', 0, '2026-07-12 22:03:16', '2026-07-10 10:49:27', '7', '7', 0),
(3, 'SH0012', 1, 'application/pdf', '184768', 'test.pdf', '78as98fd298a9s/1-6a54646c24a25.pdf', 0, '2026-07-12 23:07:08', '2026-07-14 11:27:29', NULL, '7', 0),
(4, NULL, 6, 'application/pdf', '184768', 'test.pdf', '78as98fd298a9s/6-6a588d68aea6a.pdf', 0, '2026-07-16 02:51:04', NULL, NULL, '7', 0),
(5, NULL, 6, 'application/pdf', '184768', 'test2.pdf', '78as98fd298a9s/6-6a588d942cb62.pdf', 0, '2026-07-16 02:51:48', NULL, NULL, '7', 0),
(6, 'lampiran3\'12asd921\'*(!', 6, 'application/pdf', '184768', 'test3.pdf', '78as98fd298a9s/6-6a588e431246d.pdf', 0, '2026-07-16 02:54:43', '2026-07-10 10:42:57', '7', '7', 0),
(7, NULL, 6, 'application/pdf', '184768', 'test4.pdf', '78as98fd298a9s/6-6a588e4bd30af.pdf', 0, '2026-07-16 02:54:51', '2026-07-09 09:55:09', '7', '7', 1),
(8, 'Lampiran 3;\'123', 6, 'image/png', '24073', '1787029.png', '78as98fd298a9s/6-6a58965b61a39.png', 0, '2026-07-16 03:29:15', '2026-07-10 10:42:35', '7', '7', 0);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jemaat`
--
ALTER TABLE `jemaat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `jenis_dokumen_kepemilikan`
--
ALTER TABLE `jenis_dokumen_kepemilikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jenis_hak_milik`
--
ALTER TABLE `jenis_hak_milik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori_kepemilikan`
--
ALTER TABLE `kategori_kepemilikan`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `klasis`
--
ALTER TABLE `klasis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lampiran_assets`
--
ALTER TABLE `lampiran_assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
