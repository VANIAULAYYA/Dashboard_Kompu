-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2025 at 07:59 AM
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
-- Database: `db_dashboard_kompu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama_lengkap`, `last_login`) VALUES
(1, 'admin', '$2y$10$kXvqe/lRc0r/dl8QIp65luq/O4C3fZJ1NhQxdAu3PMkAQoVQq51ZO', 'Administrator', '2025-10-24 03:11:58');

-- --------------------------------------------------------

--
-- Table structure for table `aduan`
--

CREATE TABLE `aduan` (
  `id` int(11) NOT NULL,
  `nama_pengadu` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `isi_aduan` text NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('proses','selesai') NOT NULL DEFAULT 'proses',
  `tanggapan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aduan`
--

INSERT INTO `aduan` (`id`, `nama_pengadu`, `email`, `telepon`, `isi_aduan`, `tanggal`, `status`, `tanggapan`, `created_at`) VALUES
(1, 'David Brown', 'david@example.com', '08123456789', 'Pelayanan terlalu lambat, staff tidak responsif', '2023-10-01', 'selesai', 'Sudah ditangani dan dilakukan pelatihan staff', '2025-06-23 02:41:29'),
(2, 'Sarah Miller', 'sarah@mail.com', '08234567890', 'Formulir tidak jelas petunjuk pengisiannya', '2023-10-03', 'proses', NULL, '2025-06-23 02:41:29'),
(3, 'Michael Wilson', 'michael@domain.com', '08345678901', 'Ruangan tunggu tidak nyaman, AC tidak berfungsi', '2023-10-05', 'proses', NULL, '2025-06-23 02:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

CREATE TABLE `buku_tamu` (
  `id` int(11) NOT NULL,
  `timestamp` datetime DEFAULT current_timestamp(),
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `asal_instansi` varchar(100) NOT NULL,
  `no_handphone` varchar(15) NOT NULL,
  `keperluan` text NOT NULL,
  `pendapat_pelayanan` int(11) NOT NULL,
  `pemahaman_prosedur` int(11) NOT NULL,
  `pendapat_kecepatan` int(11) NOT NULL,
  `pendapat_biaya` int(11) NOT NULL,
  `pendapat_produk` int(11) NOT NULL,
  `pendapat_kompetensi` int(11) NOT NULL,
  `pendapat_perilaku` int(11) NOT NULL,
  `pendapat_pengaduan` int(11) NOT NULL,
  `pendapat_kualitas` int(11) NOT NULL,
  `kritik_saran` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku_tamu`
--

INSERT INTO `buku_tamu` (`id`, `timestamp`, `nama`, `jenis_kelamin`, `asal_instansi`, `no_handphone`, `keperluan`, `pendapat_pelayanan`, `pemahaman_prosedur`, `pendapat_kecepatan`, `pendapat_biaya`, `pendapat_produk`, `pendapat_kompetensi`, `pendapat_perilaku`, `pendapat_pengaduan`, `pendapat_kualitas`, `kritik_saran`) VALUES
(4, '0000-00-00 00:00:00', 'Fathi Khayran Azhari', 'L', 'SMK 3 Negeri Surabaya', '088989120060', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 4, 3, 3, 3, 3, 3, 3, 3, 'hahah'),
(5, '0000-00-00 00:00:00', 'Arya Putra Maulana Feriyono', 'L', 'SMKN 3 SURABAYA', '89518344888', 'Magang', 4, 3, 3, 3, 3, 3, 4, 3, 3, '0'),
(6, '0000-00-00 00:00:00', 'NABILAH ANJALI', 'P', 'AVERROES', '8155632725', 'Permintaan Data/Informasi', 4, 4, 4, 4, 4, 4, 4, 4, 3, '0'),
(7, '0000-00-00 00:00:00', 'galuh', 'P', 'westin hotel', '8121737205', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(8, '0000-00-00 00:00:00', 'Anastasia', 'P', 'PT Samator Indi Gas Tbk.', '(031) 99203888', 'Menemui Pejabat/Staf', 4, 4, 4, 4, 4, 4, 4, 4, 4, '0'),
(9, '0000-00-00 00:00:00', 'dara', 'P', 'hotel morazen', '81334893938', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(10, '0000-00-00 00:00:00', 'murtriatna', 'L', 'monumen kapal selam', '81333364331', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(11, '0000-00-00 00:00:00', 'Intan sminesa', 'P', 'UPNVJT', '81233587622', 'Permintaan Data/Informasi', 4, 4, 4, 4, 4, 4, 4, 4, 4, '0'),
(12, '0000-00-00 00:00:00', 'totok', 'L', 'prorangan', '89664876688', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(13, '0000-00-00 00:00:00', 'agus', 'L', 'perorangan', '81357253470', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(14, '0000-00-00 00:00:00', 'rosa', 'P', 'BSI', '82225358265', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(15, '0000-00-00 00:00:00', 'irene', 'P', 'hotel', '81216811922', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(16, '0000-00-00 00:00:00', 'Erwin Tri Yunanto', 'L', 'CIMB Niaga Syariah', '81703217285', 'Menemui Pejabat/Staf', 3, 4, 4, 4, 4, 4, 4, 4, 4, '0'),
(17, '0000-00-00 00:00:00', 'yuni mulyana', 'P', 'perorangan', '81252026969', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(18, '0000-00-00 00:00:00', 'devi alexander', 'L', 'PT ESGN', '82134384326', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(19, '0000-00-00 00:00:00', 'ANGGITHA MEGA SAVITRI', 'P', 'BANK MUAMALAT', '81230669998', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(20, '0000-00-00 00:00:00', 'A RIZAL MAFA', 'L', 'MAKMUR SEJAHTERA', '82142640011', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(21, '0000-00-00 00:00:00', 'ALISA ADZANI ZATADINI', 'P', 'SUCOFINDO', '83845116351', 'Permintaan Data/Informasi', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(22, '0000-00-00 00:00:00', 'AMBAR', 'P', 'CV harmoni sinar kasih', '81259854847', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(23, '0000-00-00 00:00:00', 'kurniawan eko', 'L', 'sarana buana', '8562712291', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(24, '0000-00-00 00:00:00', 'fauzi', 'L', 'tenaga ahli fraksi golkar', '82228225005', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(25, '0000-00-00 00:00:00', 'abdurrahman', 'L', 'tenaga ahli fraksi golkar dapil jatim 1', '85706860300', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(26, '0000-00-00 00:00:00', 'arif rahmat hidayat', 'L', 'perorangan', '81252997303', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(27, '0000-00-00 00:00:00', 'ryan setiandra alfarizi', 'L', 'universitas negeri malang', '85895966729', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(28, '0000-00-00 00:00:00', 'Dodik arvianto', 'L', 'Pt inti data telematika', '85850770482', 'Cek internet', 4, 4, 4, 4, 4, 4, 4, 4, 4, '0'),
(29, '0000-00-00 00:00:00', 'Muhammad Daffa Zakky Eka Pradana', 'L', 'PT INTI DATA TELEMATIKA', '85108779998', 'Cek Jaringan Internet', 4, 4, 4, 4, 4, 4, 4, 4, 4, '0'),
(30, '0000-00-00 00:00:00', 'Ahmad Naufal Khuzaini', 'L', 'PT Inti Data Telematika', '81233757736', 'Cek jaringan internet', 4, 4, 4, 4, 4, 4, 4, 4, 4, '0'),
(31, '0000-00-00 00:00:00', 'reza', 'L', 'Pt intidata', '85709175489', 'maintenance jaringan', 4, 4, 4, 4, 4, 4, 4, 4, 4, '0'),
(32, '0000-00-00 00:00:00', 'muhyi', 'L', 'perorangan', '81336442482', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 1, 3, 3, 3, 3, 3, 1, '0'),
(33, '0000-00-00 00:00:00', 'AGUS GIYANTO', 'L', 'NOTARIS', '82234860032', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(34, '0000-00-00 00:00:00', 'susanto budiono', 'L', 'reknana', '82231739222', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(35, '0000-00-00 00:00:00', 'agus', 'L', 'PT FATIMAH INDAH UTAMA', '8534384708', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(36, '0000-00-00 00:00:00', 'ZAINUL HASAN', 'L', 'RUMAH SAKIT SUKMA WIJAYA', '82330931728', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(37, '0000-00-00 00:00:00', 'INDAH NAZULFA', 'P', 'PT HOGI0NO PROSPEK', '81331679899', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 1, 3, 3, 3, 3, 3, 1, '0'),
(38, '0000-00-00 00:00:00', 'BAGUS', 'L', 'PEMKOT KOTA SURABAYA', '81295708255', 'Menemui Pejabat/Staf', 3, 1, 1, 3, 3, 3, 3, 1, 1, '0'),
(39, '0000-00-00 00:00:00', 'ALDO', 'L', 'PT BHAKTI TAMARA', '81222678867', 'Rekomendasi Teknis (Rekomtek)', 3, 1, 1, 3, 3, 3, 3, 3, 1, '0'),
(40, '0000-00-00 00:00:00', 'Riad', 'L', 'Bsi lidah wetan', '8563030875', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(41, '0000-00-00 00:00:00', 'mohammad arif wiyono', 'L', 'universitas hang tuah', '81235169045', 'Permintaan Data/Informasi', 3, 3, 1, 3, 1, 3, 3, 3, 1, '0'),
(42, '0000-00-00 00:00:00', 'ferry', 'L', 'perorangan', '82257674881', 'Rekomendasi Teknis (Rekomtek)', 3, 1, 1, 3, 1, 3, 3, 3, 1, '0'),
(43, '0000-00-00 00:00:00', 'andhiko edo kristianto', 'L', 'PT GLOBAL', '82234334269', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(44, '0000-00-00 00:00:00', 'ADHIATMA', 'L', 'PT YAMAMORY INDONESIA', '81359072375', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 1, 3, 3, 3, 3, 3, 1, '0'),
(45, '0000-00-00 00:00:00', 'YUDA', 'L', 'PT TIRTA SUKSES', '81354772681', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 1, 3, 3, 3, 3, 3, 3, '0'),
(46, '0000-00-00 00:00:00', 'FIFIN', 'P', 'Konsultan', '82230580686', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(47, '0000-00-00 00:00:00', 'haji basuni', 'L', 'kelurahan / pak RT', '81249567287', 'Rekomendasi Teknis (Rekomtek)', 4, 3, 1, 3, 3, 3, 3, 3, 1, '0'),
(48, '0000-00-00 00:00:00', 'HADI SUSANTO', 'L', 'LP3 NKRI', '81556646353', 'Menemui Pejabat/Staf', 3, 1, 1, 3, 1, 3, 3, 3, 1, '0'),
(49, '0000-00-00 00:00:00', 'Robianto', 'L', 'BIZNET', '81232059783', 'Menemui Pejabat/Staf', 4, 4, 4, 4, 4, 4, 4, 4, 4, '0'),
(50, '0000-00-00 00:00:00', 'Aditya Putra R', 'L', 'Samator', '85736866507', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(51, '0000-00-00 00:00:00', 'Ihdhar Naufal', 'L', 'Universitas Negeri Malang', '81334361585', 'Kirim Surat (Promosi/Aduan/Temuan)', 4, 4, 4, 4, 4, 3, 4, 4, 4, '0'),
(52, '0000-00-00 00:00:00', 'AGENG', 'L', 'PT. BERKAT CANDRA', '81357565857', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(53, '0000-00-00 00:00:00', 'bagus', 'L', 'pemdes bleduk kediri', '82211392929', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(54, '0000-00-00 00:00:00', 'zainal', 'L', 'perorangan', '81357847816', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 1, 3, 3, 3, 3, 3, 1, '0'),
(55, '0000-00-00 00:00:00', 'suwandi', 'L', 'cv anugerah nusantra', '81703088772', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(56, '0000-00-00 00:00:00', 'Arief Fajar Prasetya', 'L', 'PT. Parmifa Mekadaya', '82140794472', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(57, '0000-00-00 00:00:00', 'andri', 'L', 'perorangan', '81230942669', 'Rekomendasi Teknis (Rekomtek)', 3, 1, 1, 3, 3, 3, 3, 3, 1, '0'),
(58, '0000-00-00 00:00:00', 'mohammad yasin', 'L', 'kecamatan tanggul angin sidoarjo', '81373133535', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(59, '0000-00-00 00:00:00', 'purwo bujono', 'L', 'dpm ptsp', '82113653411', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(60, '0000-00-00 00:00:00', 'ALFINA', 'P', 'UNIVERSITAS BRAWIJAYA', '8.95E+11', 'Permintaan Data/Informasi', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(61, '0000-00-00 00:00:00', 'EDI WIYONO', 'L', 'MULIA BERSAMA', '81394268128', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(62, '0000-00-00 00:00:00', 'REGINA SALSABILA', 'P', 'UNIVERSITAS BRAWIJAYA', '82232852121', 'Permintaan Data/Informasi', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(63, '0000-00-00 00:00:00', 'MUNASIK HAJI', 'L', 'Kepala Desa Bayoneng Geger', '81913562755', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(64, '0000-00-00 00:00:00', 'kris', 'L', 'pt 4 pilar anugerah sejahtera', '81216013525', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 1, 3, 3, 3, 3, 3, 1, '0'),
(65, '0000-00-00 00:00:00', 'Siti Sholeha', 'P', 'Pribadi', '81803884773', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(66, '0000-00-00 00:00:00', 'ROSA', 'P', 'BSI KCP SURABAYA WIYUNG 1', '82225258265', 'Menemui Pejabat/Staf', 4, 4, 4, 4, 4, 4, 4, 4, 4, '0'),
(67, '0000-00-00 00:00:00', 'Daniel Y', 'L', 'PT Waskita Karya (Persero) Tbk', '81333838288', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 3, '0'),
(68, '0000-00-00 00:00:00', 'ayu', 'P', 'pt si', '87734943278', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, '0'),
(69, '0000-00-00 00:00:00', 'suroso', 'L', 'panitia air sehat makmur', '82211022145', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 1, 3, 3, 3, 3, 3, 1, '0'),
(70, '0000-00-00 00:00:00', 'firdyo', 'L', 'PPID', '85731810594', 'Menemui Pejabat/Staf', 4, 4, 4, 4, 4, 4, 4, 4, 4, '0'),
(71, '0000-00-00 00:00:00', 'rudi hariyanto', 'L', 'PEMDES LANDUNGSARI malang', '8561439088', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 2, 4, 3, 3, 3, 3, 3, '0'),
(72, '0000-00-00 00:00:00', 'kristian arta j nainggolan', 'P', 'holiday in express', '81396951784', 'Menemui Pejabat/Staf', 3, 3, 2, 4, 3, 3, 3, 3, 2, '0'),
(73, '0000-00-00 00:00:00', 'Kiky Satria', 'L', 'PT. DNA Jaya Group', '82196939693', 'Menemui Pejabat/Staf', 4, 4, 4, 4, 4, 4, 4, 4, 4, '0'),
(74, '0000-00-00 00:00:00', 'RENDY', 'L', 'MEDIA PILAR POS', '85182337894', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(75, '0000-00-00 00:00:00', 'SAMSUL HUDA', 'L', 'DESA WARU KEC WARU KAB SIDOARJO', '81330290214', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 3, '0'),
(76, '0000-00-00 00:00:00', 'WITA', 'P', 'HOTEL TUNJUNGAN', '81329995472', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(77, '0000-00-00 00:00:00', 'RESKI', 'P', 'DESORTEN HOTEL', '81232694100', 'Menemui Pejabat/Staf', 3, 3, 2, 4, 3, 3, 3, 4, 3, '0'),
(78, '0000-00-00 00:00:00', 'Aditya', 'L', 'Tenaga ahli DPR RI', '8175219090', 'Menemui Pejabat/Staf', 3, 4, 4, 4, 4, 4, 4, 4, 4, '0'),
(79, '0000-00-00 00:00:00', 'M. RIDHO WARDARU', 'L', 'ASDP', '8.96E+11', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(80, '0000-00-00 00:00:00', 'Dita', 'P', 'Bank Muamalat', '81234262637', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 4, 3, '0'),
(81, '0000-00-00 00:00:00', 'Rendy', 'L', 'Media Pilar POS', '85182337898', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(82, '0000-00-00 00:00:00', 'cempaka', 'P', 'vasa hotel', '81331098031', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(83, '0000-00-00 00:00:00', 'kiki', 'L', 'PT DNA Jaya GRUP', '82196939693', 'Menemui Pejabat/Staf', 3, 2, 2, 4, 3, 3, 3, 3, 3, '0'),
(84, '0000-00-00 00:00:00', 'MELA', 'P', 'WHIZ LUXE', '81703665966', 'Menemui Pejabat/Staf', 3, 2, 2, 4, 3, 3, 3, 3, 3, '0'),
(85, '0000-00-00 00:00:00', 'PRIYO', 'L', 'PT java confin indonesia', '82129290613', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 2, 4, 3, 3, 3, 4, 3, '0'),
(86, '0000-00-00 00:00:00', 'Marya', 'P', 'Gold Vitel', '81336433188', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(87, '0000-00-00 00:00:00', 'IMAM', 'L', 'DPR RI KOMISI V', '82142037756', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(88, '0000-00-00 00:00:00', 'imama', 'P', 'swissbell', '83849285874', 'Menemui Pejabat/Staf', 3, 4, 4, 4, 4, 4, 4, 4, 4, '0'),
(89, '0000-00-00 00:00:00', 'zulva safilah', 'P', 'universitas negeri malang', '89680874148', 'Menemui Pejabat/Staf', 3, 2, 2, 4, 3, 3, 3, 3, 3, '0'),
(90, '0000-00-00 00:00:00', 'mahfud', 'L', 'PEMDES SUMBER SEWU', '82143436135', 'Menemui Pejabat/Staf', 3, 3, 2, 4, 3, 3, 3, 4, 3, '0'),
(91, '0000-00-00 00:00:00', 'ANISA', 'P', 'KONSULTAN', '81252691776', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 2, '0'),
(92, '0000-00-00 00:00:00', 'RAHEM', 'L', 'PT MULYA', '85259159229', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(93, '0000-00-00 00:00:00', 'AQIYA SHOLEH', 'L', 'PEMUDA MERAH PUTIH', '81228395716', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 2, 3, 4, 3, 3, 3, 3, 3, '0'),
(94, '0000-00-00 00:00:00', 'SUGIANTORO', 'L', 'PERORANGAN', '81553051305', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 2, 4, 3, 3, 3, 3, 3, '0'),
(95, '0000-00-00 00:00:00', 'Mansyur', 'L', 'BBWS Brantas', '81347807421', 'Permintaan Data/Informasi', 3, 3, 3, 4, 3, 3, 4, 4, 4, '0'),
(96, '0000-00-00 00:00:00', 'FARID', 'L', 'PERORANGAN', '81321266190', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 2, 4, 3, 3, 3, 3, 3, '0'),
(97, '0000-00-00 00:00:00', 'Andrean Y', 'L', 'Bbws brantas', '8.95E+11', 'Lapor CPNS', 4, 4, 3, 4, 4, 4, 4, 4, 4, '0'),
(98, '0000-00-00 00:00:00', 'SOLEH', 'L', 'JAWA POS', '8113058326', 'Menemui Pejabat/Staf', 3, 3, 2, 4, 3, 3, 3, 4, 2, '0'),
(99, '0000-00-00 00:00:00', 'MELANI', 'P', 'HOTEL SAVANA', '8123528821', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 3, '0'),
(100, '0000-00-00 00:00:00', 'Boy Reza Manopo', 'L', 'PT. Cyberindo Aditama', '87855049325', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(101, '0000-00-00 00:00:00', 'lubis', 'L', 'perorangan', '87851649355', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 2, '0'),
(102, '0000-00-00 00:00:00', 'Sugiantoro', 'L', 'Pribadi', '81553051305', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(103, '0000-00-00 00:00:00', 'Dodi hermawan', 'L', 'PU Situbondo', '82302338500', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(104, '0000-00-00 00:00:00', 'Lucinda Sekar Hutami', 'P', 'Dinas PUPP Kab. Situbondo', '81999260738', 'Koordinasi BMD', 4, 4, 3, 4, 3, 4, 4, 4, 3, '0'),
(105, '0000-00-00 00:00:00', 'Ahmad Badrul Hairi', 'L', 'Dinas Pekerjaan Umum dan Perumahan Permukiman Kab. Situbondo', '82257585954', 'Koordinasi Aset di Wilayah Sampeyan Baru', 4, 3, 4, 4, 4, 4, 4, 4, 4, '0'),
(106, '0000-00-00 00:00:00', 'Agus', 'L', 'Ayam Bakar Pak D', '85784730517', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(107, '0000-00-00 00:00:00', 'PUTRA', 'L', 'BPJS Ketenagakerjaan', '82131068795', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(108, '0000-00-00 00:00:00', 'MARYA', 'P', 'GOLD VITEL HOTEL', '81336433188', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 3, '0'),
(109, '0000-00-00 00:00:00', 'Qomari', 'L', 'Kecamatan Taman, Sidoarjo', '8123299349', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(110, '0000-00-00 00:00:00', 'ASTI', 'P', 'BAPENDA JATIM', '81217795099', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(111, '0000-00-00 00:00:00', 'devy', 'P', 'Dit KI SDA', '82299332595', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 4, 3, '0'),
(112, '0000-00-00 00:00:00', 'Aryoga', 'L', 'Dit KI SDA', '82131091751', 'Menemui Pejabat/Staf', 3, 3, 4, 4, 4, 3, 3, 4, 4, '0'),
(113, '0000-00-00 00:00:00', 'Wandha Anindita', 'P', 'Direktorat Kepatuhan Intern', '82143502470', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(114, '0000-00-00 00:00:00', 'Khoirul Anam', 'L', 'CV. Jabbar Batuta', '81230463756', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(115, '0000-00-00 00:00:00', 'Radit', 'L', 'SILOAM SENTOSA', '82264424579', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(116, '0000-00-00 00:00:00', 'Nella Catur', 'P', 'Whiz Luxe Hotel', '81703665966', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 3, '0'),
(117, '0000-00-00 00:00:00', 'Rully', 'L', 'Polsek Wiyung', '85704940777', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(118, '0000-00-00 00:00:00', 'Nisa Ussa\'adah Nurhaliza', 'P', 'Universitas Islam Malang', '85707479928', 'Permintaan Data/Informasi', 3, 3, 2, 4, 3, 3, 3, 4, 3, '0'),
(119, '0000-00-00 00:00:00', 'Dewi Maharani', 'P', 'ITS', '88289863015', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(120, '0000-00-00 00:00:00', 'Adit', 'L', 'Dinas PU Bina Marga', '318060766', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 4, 4, 3, '0'),
(121, '0000-00-00 00:00:00', 'elsa', 'P', 'ITS', '81252172517', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 2, '0'),
(122, '0000-00-00 00:00:00', 'ARI KRISMANTORO', 'L', 'BAPEDDA UPT nganjuk', '8.95E+11', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 4, 2, '0'),
(123, '0000-00-00 00:00:00', 'totok haryono', 'L', 'TPM', '89664876688', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 2, '0'),
(124, '0000-00-00 00:00:00', 'NINIK DWI ROHANI', 'P', 'TAMAN SAFARI PRIGEN', '81327219333', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 2, '0'),
(125, '0000-00-00 00:00:00', 'kirno', 'L', 'pribadi', '81212677877', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 4, 4, 3, '0'),
(126, '0000-00-00 00:00:00', 'MEIGA', 'P', 'DINKES KAB BLITAR', '81217874348', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(127, '0000-00-00 00:00:00', 'ANDRE DEVIANTO', 'L', 'TPM', '82312344747', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 4, 2, '0'),
(128, '0000-00-00 00:00:00', 'ERRY RAMADHAN TRIMURTI', 'P', 'PERORANGAN', '81365776998', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 2, '0'),
(129, '0000-00-00 00:00:00', 'BU AYU', 'P', 'PU NT2', '85335477488', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(130, '0000-00-00 00:00:00', 'Achmad Rizky Hidayah', 'L', 'Universitas Brawijaya', '8115531903', 'pengajuan surat magang mandiri', 4, 4, 4, 4, 4, 4, 4, 4, 4, '0'),
(131, '0000-00-00 00:00:00', 'Annora Wahyu Garaniva', 'P', 'Universitas Brawijaya', '82292161691', 'Kirim Surat Rekomendasi Magang Mandiri', 3, 3, 3, 4, 3, 4, 4, 4, 4, '0'),
(132, '0000-00-00 00:00:00', 'BRAMIASTO BAHRUDIN EKO', 'L', 'KONSULTAN INDIVIDU', '81271153887', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 2, '0'),
(133, '0000-00-00 00:00:00', 'KHOIRUL', 'L', 'PRIBADI', '82234751898', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(134, '0000-00-00 00:00:00', 'BAYU', 'L', 'PRIBADI', '85791556866', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(135, '0000-00-00 00:00:00', 'SETIO', 'L', 'PT. SURYA CEMERLANG JASINDO', '81332222307', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(136, '0000-00-00 00:00:00', 'AGUNG', 'L', 'CV MONDORO', '81216202010', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(137, '0000-00-00 00:00:00', 'MAMIK', 'P', 'POKMAS JAMBANGAN', '81366406940', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(138, '0000-00-00 00:00:00', 'Eko Wahyudi', 'L', 'Kementan', '81333464677', 'Rapat', 4, 4, 3, 4, 4, 4, 4, 4, 4, '0'),
(139, '0000-00-00 00:00:00', 'AGUS', 'L', 'PRIBADI', '81357253470', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(140, '0000-00-00 00:00:00', 'SAFIRA RAMADHANI', 'P', 'UNIVERSITAS NEGERI SURABAYA', '85246374419', 'Permintaan Data/Informasi', 4, 4, 4, 4, 4, 4, 4, 4, 4, '0'),
(141, '0000-00-00 00:00:00', 'Muhammad Rafi Yuniarto', 'L', 'UNESA', '87858846709', 'Permintaan Data/Informasi', 4, 4, 4, 4, 4, 4, 4, 4, 4, '0'),
(142, '0000-00-00 00:00:00', 'Rizky Alfian Novaldi', 'L', 'UNIVERSITAS BRAWIJAYA', '82336690352', 'Magang', 4, 4, 4, 4, 4, 4, 4, 4, 4, '0'),
(143, '0000-00-00 00:00:00', 'ERI', 'L', 'TJAKRINDO', '81335046598', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(144, '0000-00-00 00:00:00', 'AGUS SAPUTRO', 'L', 'KAI', '81225404200', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(145, '0000-00-00 00:00:00', 'Moch. Dhofir', 'L', 'Pribadi', '85608114963', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(146, '0000-00-00 00:00:00', 'Aida Rifdatul', 'P', 'Telkom University Surabaya', '85331851681', 'Permintaan Data/Informasi', 4, 4, 3, 4, 3, 4, 4, 1, 4, '0'),
(147, '0000-00-00 00:00:00', 'Mohamad Wahyu Setiawan', 'L', 'Pemerintah Desa Tambaksawah', '82139972599', 'Menemui Pejabat/Staf', 4, 4, 4, 4, 4, 4, 4, 4, 4, '0'),
(148, '0000-00-00 00:00:00', 'bayu', 'L', 'epicnesia', '82236558683', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 4, 2, '0'),
(149, '0000-00-00 00:00:00', 'fuad', 'L', 'konsultan individu', '81703804858', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 3, '0'),
(150, '0000-00-00 00:00:00', 'musrik', 'L', 'kelompok tani', '85853236372', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 4, 2, '0'),
(151, '0000-00-00 00:00:00', 'Mirtha', 'P', 'CV. Bukit Mas', '8175290900', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 4, 3, '0'),
(152, '0000-00-00 00:00:00', 'Muhammad fajar prabowo', 'L', 'Dinas perpustakaan dan kearsipan provinsi jawa timur', '85695778632', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 4, 4, 3, '0'),
(153, '0000-00-00 00:00:00', 'alif ashari', 'L', 'POLDA JATIM', '81359555292', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 2, '0'),
(154, '0000-00-00 00:00:00', 'MARTONO', 'L', 'PT suwindo karya abadi', '81257309211', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(155, '0000-00-00 00:00:00', 'rasman', 'L', 'yayasan nurul huda', '82131946580', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 4, 2, '0'),
(156, '0000-00-00 00:00:00', 'wasilatul farida', 'P', 'hotel golden tulib', '82232848003', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 2, '0'),
(157, '0000-00-00 00:00:00', 'Arief Pajar Prasetya', 'L', 'PT. Parfima Mekadaya', '82140794472', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(158, '0000-00-00 00:00:00', 'fransisca ardiana', 'P', 'mercure hotel', 'o81322463448', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(159, '0000-00-00 00:00:00', 'Ibu Ninik', 'P', 'Kelurahan Karah', '81358477599', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(160, '0000-00-00 00:00:00', 'yaidah', 'L', 'perorangan', '81216886002', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(161, '0000-00-00 00:00:00', 'fuad nuruddin', 'L', 'konsultan individu', '81703804858', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 2, '0'),
(162, '0000-00-00 00:00:00', 'abd rokib/SAM D', 'L', 'PASAR KAPUTRAN', '81252997303', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(163, '0000-00-00 00:00:00', 'Mochammad Sholeh', 'L', 'Jawa Pos Media', '8113058326', 'Menemui Pejabat/Staf', 4, 4, 4, 4, 4, 4, 4, 4, 4, '0'),
(164, '0000-00-00 00:00:00', 'Rifqi', 'L', 'Jawapos', '81252593612', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 4, 3, '0'),
(165, '0000-00-00 00:00:00', 'Luthfi Aulia Rahman', 'L', 'Aone Trawas', '81232595511', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 4, 3, '0'),
(166, '0000-00-00 00:00:00', 'ayu purba wulandari', 'P', 'hoetel movepcik surabaya', '85852646682', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(167, '0000-00-00 00:00:00', 'sapto', 'L', 'pemkot suraba BAPPENDA', '81259595315', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(168, '0000-00-00 00:00:00', 'WENDI', 'L', 'PUPR KOTA BATU', '82131052773', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 4, 2, '0'),
(169, '0000-00-00 00:00:00', 'Hardi', 'L', 'Malang', '81216070766', 'Permintaan Data/Informasi', 3, 3, 3, 4, 3, 3, 3, 4, 4, '0'),
(170, '0000-00-00 00:00:00', 'Raras Ari Kusumaningtyas', 'P', 'PT Jasamarga Probolinggo Banyuwangi', '81553004296', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 4, 1, 4, '0'),
(171, '0000-00-00 00:00:00', 'YUNI MULYANA', 'P', 'PRIBADI', '81252026969', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(172, '0000-00-00 00:00:00', 'MUHAMMAD ADHASARI', 'L', 'PABRIK GULA NGADIREJO', '82154663988', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(173, '0000-00-00 00:00:00', 'AGUS', 'L', 'UNIVERSITAS ISLAM KEDIRI', '81335944889', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(174, '0000-00-00 00:00:00', 'EDY', 'L', 'REKNANAN', '82335854997', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 2, '0'),
(175, '0000-00-00 00:00:00', 'Eko', 'L', 'POLRES Kota Kediri', '82311447272', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(176, '0000-00-00 00:00:00', 'Ekik', 'L', 'Toyota', '89603874062', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(177, '0000-00-00 00:00:00', 'MAS\'UD', 'L', 'PT. APTELLA', '81112007500', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(178, '0000-00-00 00:00:00', 'ROMMY', 'L', 'UPTB PELAYANAN PAJAK DAERAH SURABAYA 3', '81333359502', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(179, '0000-00-00 00:00:00', 'RASMAN', 'L', 'MUSHOLA \"NURUL HUDA\"', '82131946580', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(180, '0000-00-00 00:00:00', 'PUTRI', 'P', 'VIKTORI', '85646048832', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(181, '0000-00-00 00:00:00', 'Yesie', 'P', 'The Westin Surabaya', '81330500429', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 4, 4, 4, '0'),
(182, '0000-00-00 00:00:00', 'Ayu Purba Wulandari', 'P', 'Hotel Movenpick Surabaya', '85852646682', 'Penawaran Paket Meeting', 4, 4, 3, 4, 4, 4, 4, 4, 4, '0'),
(183, '0000-00-00 00:00:00', 'HAPPY K SETYAWAN', 'L', 'LORENTZ INDONESIA', '811831333', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(184, '0000-00-00 00:00:00', 'NUR ARIFAH', 'P', 'YAYASAN SOSIALISASI KANKER INDONESIA', '85355010075', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(185, '0000-00-00 00:00:00', 'CORINA', 'P', 'PT. BHAKTI TAMARA', '317512333', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(186, '0000-00-00 00:00:00', 'YULI', 'L', 'PABRIK PIPA SUPRALON', '8113306670', 'Menemui Pejabat/Staf', 3, 4, 3, 4, 3, 3, 3, 4, 3, '0'),
(187, '0000-00-00 00:00:00', 'ACH. GHOZALI', 'L', 'PEJUANG REFORMASI INDONESIA (PRI)', '81999979924', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(188, '0000-00-00 00:00:00', 'ASEP', 'L', 'BPN MOJOKERTO', '321396234', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(189, '0000-00-00 00:00:00', 'HERU', 'L', 'PRIBADI', '81216361808', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 3, '0'),
(190, '0000-00-00 00:00:00', 'Joko Widodo', 'L', 'Sarigading Catering', '82324247473', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(191, '0000-00-00 00:00:00', 'BRIAN', 'L', 'PT. STBC', '81259990520', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(192, '0000-00-00 00:00:00', 'Nanang Yulianto', 'L', 'Pemerintah Desa Brenggolo', '81519467786', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(193, '0000-00-00 00:00:00', 'Susetya Budi', 'L', 'PT. RIjal Adima Propertindo', '81532321947', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(194, '0000-00-00 00:00:00', 'pak lutfi', 'L', 'awan trawas', '81232595511', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(195, '0000-00-00 00:00:00', 'Luthfi', 'L', 'Aone Trawas', '81232595511', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 4, 3, '0'),
(196, '0000-00-00 00:00:00', 'stefanes wibowo', 'L', 'PT KURNIA PERDANA GAS', '85646337216', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(197, '0000-00-00 00:00:00', 'CAECILLIA EVA PUTRI', 'P', 'FAVE HOTEL SIDOARJO', '87702577678', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(198, '0000-00-00 00:00:00', 'RASMAN', 'L', 'YAYASAN NURUL HUDA', '82131946580', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(199, '0000-00-00 00:00:00', 'RASMAN', 'L', 'YAYASAN NURUL HUDA', '8237668952', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 3, '0'),
(200, '0000-00-00 00:00:00', 'KARWITO', 'L', 'CV. BUMI CITRA PERSADA', '81332289499', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(201, '0000-00-00 00:00:00', 'ALIP', 'L', 'CV PIDIA PRIMA', '82231225507', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 4, 2, '0'),
(202, '0000-00-00 00:00:00', 'Edi prasetio', 'L', 'pribadi', '811310039', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 4, 3, '0'),
(203, '2025-09-19 11:07:18', 'ani', 'P', 'pemerintah', '082', 'Kirim Surat (Promosi/Aduan/Temuan)', 4, 2, 4, 2, 4, 2, 4, 4, 2, '0'),
(204, '2025-09-23 14:22:48', 'jkbbkb', 'P', 'jbkj', 'khch', 'hk', 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(205, '2025-10-07 08:26:22', 'ayam', 'P', 'pemerintah', '087', 'Permintaan Data/Informasi', 4, 3, 2, 1, 4, 3, 2, 4, 1, '0'),
(246, '2025-10-08 09:05:31', 'bebek', 'L', 'pemerintah', '88989120066', 'Menemui Pejabat/Staff', 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(247, '2025-10-08 09:27:21', 'bebek', 'L', 'pemerintah', '88989120066', 'Rekomendasi Teknis (Rekomtek)', 2, 1, 4, 1, 3, 4, 3, 4, 4, '0'),
(248, '2025-10-15 10:11:03', 'coba 1', 'L', 'pemerintah', '089', 'Kirim Surat (Promosi/Aduan/Temuan)', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'donee'),
(249, '2025-10-15 14:51:24', 'coba keperluan', 'P', 'dg', '089', 'Lainnya', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'haaha'),
(250, '2025-10-15 15:08:50', 'bebek', 'P', 'dg', '089', 'other', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'fsd'),
(251, '2025-10-15 15:14:23', 'bebek', 'L', 'dg', '089', 'wkwk', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'yeye'),
(252, '2025-10-15 15:16:04', 'bebek', 'P', 'dg', '089', 'Rekomendasi Teknis (Rekomtek)', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'ihiii'),
(253, '2025-10-16 10:00:53', 'bebek', 'P', 'dg', '089', 'wkwk', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'finish'),
(254, '2025-10-16 10:04:45', 'bebek', 'L', 'dg', '089', 'sudaa', 3, 3, 1, 3, 4, 4, 3, 4, 4, 'success'),
(255, '2025-10-16 10:42:57', 'bebek', 'L', 'dg', '089', 'Rekomendasi Teknis (Rekomtek)', 1, 3, 4, 4, 4, 2, 2, 4, 2, 'hihii'),
(256, '2025-10-16 10:59:53', 'bebek', 'P', 'pemerintah', '089', 'hehe', 2, 4, 3, 2, 4, 4, 4, 4, 2, 'cakep'),
(257, '2025-10-16 11:00:48', 'ayam', 'L', 'pemerintah', '88989120060', 'Menemui Pejabat/Staff', 4, 1, 2, 3, 4, 3, 2, 4, 4, 'uhiyy');

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu_backup`
--

CREATE TABLE `buku_tamu_backup` (
  `id` int(11) NOT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `timestamp` datetime NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `asal_instansi` varchar(255) DEFAULT NULL,
  `no_handphone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `keperluan` text DEFAULT NULL,
  `pendapat_pelayanan` decimal(3,2) DEFAULT 0.00,
  `pemahaman_prosedur` decimal(3,2) DEFAULT 0.00,
  `pendapat_kecepatan` decimal(3,2) DEFAULT 0.00,
  `pendapat_biaya` decimal(3,2) DEFAULT 0.00,
  `pendapat_produk` decimal(3,2) DEFAULT 0.00,
  `pendapat_kompetensi` decimal(3,2) DEFAULT 0.00,
  `pendapat_perilaku` decimal(3,2) DEFAULT 0.00,
  `pendapat_pengaduan` decimal(3,2) DEFAULT 0.00,
  `pendapat_kualitas` decimal(3,2) DEFAULT 0.00,
  `kritik_saran` text DEFAULT NULL,
  `status_survei` enum('belum','sudah') DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `buku_tamu_backup`
--

INSERT INTO `buku_tamu_backup` (`id`, `nik`, `timestamp`, `nama`, `jenis_kelamin`, `asal_instansi`, `no_handphone`, `email`, `keperluan`, `pendapat_pelayanan`, `pemahaman_prosedur`, `pendapat_kecepatan`, `pendapat_biaya`, `pendapat_produk`, `pendapat_kompetensi`, `pendapat_perilaku`, `pendapat_pengaduan`, `pendapat_kualitas`, `kritik_saran`, `status_survei`) VALUES
(1, NULL, '2024-01-15 08:30:00', 'Ahmad Santoso', 'L', 'PT. Maju Jaya', '081234567890', NULL, 'Menemui Pejabat/Staf', '4.00', '3.50', '3.75', '4.00', '3.25', '3.75', '4.00', '3.50', '3.75', 'Pelayanan sangat memuaskan', 'belum'),
(2, NULL, '2024-01-16 09:15:00', 'Siti Rahayu', 'P', 'CV. Sejahtera', '081298765432', NULL, 'Menemui Pejabat/Staf', '3.75', '4.00', '3.25', '3.50', '3.75', '4.00', '3.25', '3.75', '4.00', 'Prosedur cukup jelas', 'belum'),
(3, NULL, '2024-01-17 10:20:00', 'Budi Prasetyo', 'L', 'UD. Makmur', '081312345678', NULL, 'Menemui Pejabat/Staf', '3.50', '3.25', '4.00', '3.75', '3.50', '3.25', '4.00', '3.75', '3.50', 'Petugas ramah dan membantu', 'belum'),
(4, NULL, '2024-01-18 11:45:00', 'Maya Sari', 'P', 'PT. Indah', '081387654321', NULL, 'Menemui Pejabat/Staf', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '3.75', '4.00', '3.50', 'Waktu tunggu lumayan lama', 'belum'),
(5, NULL, '2024-01-19 13:30:00', 'Rudi Hermawan', 'L', 'CV. Sentosa', '081445678901', NULL, 'Menemui Pejabat/Staf', '3.25', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '3.25', '4.00', 'Sarana cukup nyaman', 'belum'),
(6, NULL, '2024-01-20 14:15:00', 'Dewi Anggraini', 'P', 'PT. Barokah', '081498765432', NULL, 'Menemui Pejabat/Staf', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '3.75', 'Pelayanan cepat dan tepat', 'belum'),
(7, NULL, '2024-01-22 08:45:00', 'Joko Widodo', 'L', 'UD. Jaya Abadi', '081556789012', NULL, 'Menemui Pejabat/Staf', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'Sangat membantu UMKM', 'belum'),
(8, NULL, '2024-01-23 10:30:00', 'Linda Suryani', 'P', 'PT. Gemilang', '081609876543', NULL, 'Menemui Pejabat/Staf', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', 'Informasi diberikan jelas', 'belum'),
(9, NULL, '2024-01-24 11:20:00', 'Hendra Gunawan', 'L', 'CV. Mandiri', '081667890123', NULL, 'Menemui Pejabat/Staf', '3.25', '3.50', '3.75', '3.25', '3.50', '3.75', '3.25', '3.50', '3.75', 'Pengaduan ditanggapi dengan baik', 'belum'),
(10, NULL, '2024-01-25 13:45:00', 'Rina Marlina', 'P', 'PT. Sukses', '081723456789', NULL, 'Menemui Pejabat/Staf', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'Proses lebih cepat dari perkiraan', 'belum'),
(11, NULL, '2024-01-26 15:00:00', 'Fajar Nugroho', 'L', 'UD. Makmur Sentosa', '081787654321', NULL, 'Menemui Pejabat/Staf', '3.75', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', 'Petugas sangat kompeten', 'belum'),
(12, NULL, '2024-01-27 09:30:00', 'Sari Indah', 'P', 'PT. Sejahtera Abadi', '081845678901', NULL, 'Menemui Pejabat/Staf', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', 'Online system sudah bagus', 'belum'),
(13, NULL, '2024-01-29 10:45:00', 'Agus Salim', 'L', 'CV. Berkah Jaya', '081909876543', NULL, 'Menemui Pejabat/Staf', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', 'Pelayanan memuaskan', 'belum'),
(14, NULL, '2024-01-30 14:20:00', 'Mira Utami', 'P', 'PT. Indah Selalu', '081967890123', NULL, 'Menemui Pejabat/Staf', '3.75', '4.00', '3.25', '3.75', '4.00', '3.25', '3.75', '4.00', '3.25', 'Informasi sangat berguna', 'belum'),
(15, NULL, '2024-02-01 08:30:00', 'Eko Pratama', 'L', 'UD. Maju Terus', '082123456789', NULL, 'Menemui Pejabat/Staf', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', 'Prosedur ekspor-impor sudah efisien', 'belum'),
(16, NULL, '2024-02-02 11:15:00', 'Nina Herlina', 'P', 'PT. Global Indo', '082198765432', NULL, 'Menemui Pejabat/Staf', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'Petugas sangat membantu', 'belum'),
(17, NULL, '2024-02-03 13:40:00', 'Rizki Ramadhan', 'L', 'CV. Sukses Makmur', '082234567890', NULL, 'Menemui Pejabat/Staf', '3.25', '4.00', '3.75', '3.25', '4.00', '3.75', '3.25', '4.00', '3.75', 'Waktu proses sesuai janji', 'belum'),
(18, NULL, '2024-02-05 09:50:00', 'Diana Wati', 'P', 'PT. Harmoni', '082287654321', NULL, 'Menemui Pejabat/Staf', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', 'Sistem online mudah digunakan', 'belum'),
(19, NULL, '2024-02-06 15:30:00', 'Ari Wibowo', 'L', 'UD. Jaya Makmur', '082345678901', NULL, 'Menemui Pejabat/Staf', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'Pelayanan HKI sangat profesional', 'belum'),
(20, NULL, '2024-02-07 10:10:00', 'Fitriani', 'P', 'PT. Cemerlang', '082409876543', NULL, 'Menemui Pejabat/Staf', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', 'Proses pendaftaran cukup panjang', 'belum'),
(21, NULL, '2024-02-08 14:25:00', 'Hari Setiawan', 'L', 'CV. Makmur Jaya', '082467890123', NULL, 'Menemui Pejabat/Staf', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', 'Informasi investasi sangat jelas', 'belum'),
(22, NULL, '2024-02-09 11:35:00', 'Lina Marlina', 'P', 'PT. Sentosa Abadi', '082523456789', NULL, 'Menemui Pejabat/Staf', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'Perpanjangan lebih cepat', 'belum'),
(23, NULL, '2024-02-10 13:15:00', 'Bambang Sutrisno', 'L', 'UD. Berkah Selalu', '082587654321', NULL, 'Menemui Pejabat/Staf', '3.25', '3.50', '3.75', '3.25', '3.50', '3.75', '3.25', '3.50', '3.75', 'Pengaduan ditanggapi serius', 'belum'),
(24, NULL, '2024-02-12 08:40:00', 'Rina Sari', 'P', 'PT. Indah Permai', '082645678901', NULL, 'Menemui Pejabat/Staf', '3.75', '4.00', '3.25', '3.75', '4.00', '3.25', '3.75', '4.00', '3.25', 'Konsultan pajak sangat membantu', 'belum'),
(25, NULL, '2024-02-13 10:50:00', 'Dedi Kurniawan', 'L', 'CV. Jaya Sentosa', '082709876543', NULL, 'Menemui Pejabat/Staf', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', 'Proses SIUJK cukup rumit', 'belum'),
(26, NULL, '2024-02-14 14:35:00', 'Siska Andini', 'P', 'PT. Global Mandiri', '082767890123', NULL, 'Menemui Pejabat/Staf', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', 'Laporan diproses cepat', 'belum'),
(27, NULL, '2024-02-15 09:25:00', 'Firman Syah', 'L', 'UD. Makmur Sejahtera', '082823456789', NULL, 'Menemui Pejabat/Staf', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', 'Info ekspor sangat update', 'belum'),
(28, NULL, '2024-02-16 11:45:00', 'Yuni Astuti', 'P', 'PT. Cempaka', '082887654321', NULL, 'Menemui Pejabat/Staf', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', 'Perizinan sudah terdigitalisasi', 'belum'),
(29, NULL, '2024-02-17 13:20:00', 'Rendi Pratama', 'L', 'CV. Sukses Jaya', '082945678901', NULL, 'Menemui Pejabat/Staf', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'NIB cepat terbit', 'belum'),
(30, NULL, '2024-02-19 15:10:00', 'Maya Sari', 'P', 'PT. Harmoni Indah', '083009876543', NULL, 'Menemui Pejabat/Staf', '3.25', '4.00', '3.75', '3.25', '4.00', '3.75', '3.25', '4.00', '3.75', 'Konsultan hukum sangat ahli', 'belum'),
(31, NULL, '2024-02-20 10:30:00', 'Ahmad Fauzi', 'L', 'PT. Teknologi Maju', '083067890123', NULL, 'Menemui Pejabat/Staf', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', 'Teknologi sudah modern', 'belum'),
(32, NULL, '2024-02-21 14:15:00', 'Rani Permata', 'P', 'CV. Digital Indonesia', '083123456789', NULL, 'Menemui Pejabat/Staf', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'Pelayanan domain cepat', 'belum'),
(33, NULL, '2024-02-22 09:40:00', 'Irfan Maulana', 'L', 'UD. Elektronik', '083187654321', NULL, 'Menemui Pejabat/Staf', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', 'Perizinan elektronik mudah', 'belum'),
(34, NULL, '2024-02-23 11:25:00', 'Desi Anggraeni', 'P', 'PT. Media Kreatif', '083245678901', NULL, 'Menemui Pejabat/Staf', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', 'Konsultasi sangat inspiratif', 'belum'),
(35, NULL, '2024-02-24 13:50:00', 'Rudi Hartono', 'L', 'CV. Karya Utama', '083309876543', NULL, 'Menemui Pejabat/Staf', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'Hak cipta diproses baik', 'belum'),
(36, NULL, '2024-02-26 08:55:00', 'Santi Wulandari', 'P', 'PT. Kreasi Indah', '083367890123', NULL, 'Menemui Pejabat/Staf', '3.25', '3.50', '3.75', '3.25', '3.50', '3.75', '3.25', '3.50', '3.75', 'Desain dilindungi dengan baik', 'belum'),
(37, NULL, '2024-02-27 10:20:00', 'Hendra Wijaya', 'L', 'UD. Inovasi Baru', '083423456789', NULL, 'Menemui Pejabat/Staf', '3.75', '4.00', '3.25', '3.75', '4.00', '3.25', '3.75', '4.00', '3.25', 'Sertifikat cepat jadi', 'belum'),
(38, NULL, '2024-02-28 14:40:00', 'Lia Susanti', 'P', 'PT. Masa Depan', '083487654321', NULL, 'Menemui Pejabat/Staf', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', 'Konsultasi sangat visioner', 'belum'),
(39, NULL, '2024-02-29 09:15:00', 'Adi Nugroho', 'L', 'CV. Jaya Makmur', '083545678901', NULL, 'Menemui Pejabat/Staf', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'Izin diperpanjang cepat', 'belum'),
(40, NULL, '2024-03-01 11:30:00', 'Mona Lisa', 'P', 'PT. Seni Indah', '083609876543', NULL, 'Menemui Pejabat/Staf', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', 'Seni dihargai dengan baik', 'belum'),
(41, NULL, '2024-01-05 08:30:00', 'Ahmad Santoso', 'L', 'PT. Maju Jaya Abadi', '081234567890', NULL, 'Menemui Pejabat/Staf', '4.00', '3.75', '3.50', '4.00', '3.75', '4.00', '3.50', '3.75', '4.00', 'Pelayanan sangat memuaskan dan petugas ramah', 'belum'),
(42, NULL, '2024-01-08 09:15:00', 'Siti Rahayu', 'P', 'CV. Sejahtera Bersama', '081298765432', NULL, 'Menemui Pejabat/Staf', '3.75', '4.00', '3.25', '3.50', '3.75', '4.00', '3.75', '3.50', '4.00', 'Prosedur cukup jelas dan mudah dipahami', 'belum'),
(43, NULL, '2024-01-10 10:20:00', 'Budi Prasetyo', 'L', 'UD. Makmur Sentosa', '081312345678', NULL, 'Menemui Pejabat/Staf', '3.50', '3.75', '4.00', '3.75', '3.50', '3.75', '4.00', '3.75', '3.50', 'Petugas sangat membantu dan informatif', 'belum'),
(44, NULL, '2024-01-12 11:45:00', 'Maya Sari Dewi', 'P', 'PT. Indah Permai', '081387654321', NULL, 'Menemui Pejabat/Staf', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '3.75', '4.00', '3.75', 'Waktu tunggu cukup lama tapi hasil memuaskan', 'belum'),
(45, NULL, '2024-04-12 09:40:00', 'Herman Susilo', 'L', 'UD. Minuman Berkualitas', '083909876543', NULL, 'Menemui Pejabat/Staf', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'Perizinan BPOM dipandu dengan baik', 'belum'),
(46, NULL, '2024-04-15 11:25:00', 'Indah Permata', 'P', 'PT. Kosmetik Aman', '083967890123', NULL, 'Menemui Pejabat/Staf', '3.75', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', 'Aturan labeling dijelaskan sangat jelas', 'belum'),
(47, NULL, '2024-04-17 13:50:00', 'Jefri Kurniawan', 'L', 'CV. Suplemen Sehat', '084023456789', NULL, 'Menemui Pejabat/Staf', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', 'Izin edar prosesnya transparan', 'belum'),
(48, NULL, '2024-04-19 15:15:00', 'Kartika Dewi', 'P', 'PT. Herbal Alami', '084087654321', NULL, 'Menemui Pejabat/Staf', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'Standardisasi produk sangat penting', 'belum'),
(49, NULL, '2024-04-22 10:45:00', 'Lukman Hakim', 'L', 'UD. Bahan Baku', '084145678901', NULL, 'Menemui Pejabat/Staf', '3.75', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', 'Import bahan baku dipermudah', 'belum'),
(50, NULL, '2024-04-24 14:20:00', 'Maya Sari', 'P', 'PT. Ekspor Indonesia', '084209876543', NULL, 'Menemui Pejabat/Staf', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', 'Ekspor produk didukung penuh', 'belum'),
(51, NULL, '2024-04-26 09:30:00', 'Nando Pratama', 'L', 'CV. Global Market', '084267890123', NULL, 'Menemui Pejabat/Staf', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'Dokumen ekspor lengkap dan jelas', 'belum'),
(52, NULL, '2024-04-29 11:40:00', 'Oki Setiawan', 'L', 'PT. Logistik Internasional', '084323456789', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.75', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', 'Logistik dijelaskan sangat komprehensif', 'belum'),
(53, NULL, '2024-04-30 13:25:00', 'Putri Anggraini', 'P', 'UD. Supply Chain', '084387654321', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', 'Perizinan gudang prosesnya efisien', 'belum'),
(54, NULL, '2024-05-02 15:00:00', 'Rafi Ahmad', 'L', 'PT. Distribusi Nasional', '084445678901', NULL, 'Rekomendasi Teknis (Rekomtek)', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'Distribusi produk sangat strategis', 'belum'),
(55, NULL, '2024-05-03 10:15:00', 'Sari Utami', 'P', 'CV. Ritel Modern', '084509876543', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.75', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', 'Izin toko cepat dan mudah', 'belum'),
(56, NULL, '2024-05-06 14:35:00', 'Tono Wijaya', 'L', 'UD. Supermarket', '084567890123', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', 'Bisnis ritel sangat menjanjikan', 'belum'),
(57, NULL, '2024-05-08 11:20:00', 'Umi Kulsum', 'P', 'PT. Marketplace', '084623456789', NULL, 'Rekomendasi Teknis (Rekomtek)', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'E-commerce masa depan bisnis', 'belum'),
(58, NULL, '2024-05-10 13:45:00', 'Vino Gustomo', 'L', 'CV. Digital Market', '084687654321', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.75', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', 'Digital marketing sangat powerful', 'belum'),
(59, NULL, '2024-05-13 09:50:00', 'Wulan Sari', 'P', 'PT. Online Store', '084745678901', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', 'Bisnis online semakin berkembang', 'belum'),
(60, NULL, '2024-05-15 15:25:00', 'Xavier Tan', 'L', 'UD. Multinational', '084809876543', NULL, 'Rekomendasi Teknis (Rekomtek)', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'Investasi asing sangat dipermudah', 'belum'),
(61, NULL, '2024-05-17 10:40:00', 'Yuni Shara', 'P', 'PT. Entertainment', '084867890123', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.75', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', 'Industri hiburan potensial', 'belum'),
(62, NULL, '2024-05-20 14:15:00', 'Zaki Ahmad', 'L', 'CV. Media Production', '084923456789', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', 'Produksi konten sangat kreatif', 'belum'),
(63, NULL, '2024-05-22 11:30:00', 'Aisyah Rahman', 'P', 'PT. Creative Industry', '084987654321', NULL, 'Rekomendasi Teknis (Rekomtek)', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'Industri kreatif masa depan bangsa', 'belum'),
(64, NULL, '2024-06-03 08:45:00', 'Bambang Surya', 'L', 'PT. Energi Terbarukan', '085112345678', NULL, 'Rekomendasi Teknis (Rekomtek)', '4.00', '3.75', '3.50', '4.00', '3.75', '4.00', '3.50', '3.75', '4.00', 'Energi terbarukan sangat prospektif', 'belum'),
(65, NULL, '2024-06-05 10:20:00', 'Citra Lestari', 'P', 'CV. Solar Power Indonesia', '085198765432', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.75', '4.00', '3.25', '3.50', '3.75', '4.00', '3.75', '3.50', '4.00', 'PLTS masa depan energi nasional', 'belum'),
(66, NULL, '2024-06-07 13:15:00', 'Doni Prasetyo', 'L', 'UD. Wind Energy', '085223456789', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.50', '3.75', '4.00', '3.75', '3.50', '3.75', '4.00', '3.75', '3.50', 'Energi angin potensial di Indonesia', 'belum'),
(67, NULL, '2024-06-10 11:30:00', 'Elisa Wijaya', 'P', 'PT. Hydro Power', '085287654321', NULL, 'Rekomendasi Teknis (Rekomtek)', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '3.75', '4.00', '3.75', 'Hydro power sangat efisien', 'belum'),
(68, NULL, '2024-06-12 14:45:00', 'Fajar Ramadan', 'L', 'CV. Bio Energy', '085345678901', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.75', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '3.75', '4.00', 'Biofuel solusi energi alternatif', 'belum'),
(69, NULL, '2024-06-14 09:20:00', 'Gita Andini', 'P', 'PT. Geothermal Indonesia', '085409876543', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.50', '3.75', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '3.75', 'Geothermal potensi besar Indonesia', 'belum'),
(70, NULL, '2024-06-17 15:10:00', 'Hadi Susilo', 'L', 'UD. Renewable Energy', '085467890123', NULL, 'Rekomendasi Teknis (Rekomtek)', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'Energi terbarukan harus dikembangkan', 'belum'),
(71, NULL, '2024-06-19 10:35:00', 'Intan Permata', 'P', 'PT. Green Technology', '085523456789', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.75', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', 'Teknologi hijau masa depan', 'belum'),
(72, NULL, '2024-06-21 13:50:00', 'Joni Kurniawan', 'L', 'CV. Eco Solution', '085587654321', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.50', '3.75', '3.25', '3.50', '3.75', '3.25', '3.50', '3.75', '3.25', 'Lingkungan harus dijaga bersama', 'belum'),
(73, NULL, '2024-06-24 08:30:00', 'Kartini Sari', 'P', 'PT. Sustainable Development', '085645678901', NULL, 'Rekomendasi Teknis (Rekomtek)', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'Pembangunan berkelanjutan penting', 'belum'),
(74, NULL, '2024-07-01 11:15:00', 'Lukman Nur', 'L', 'UD. Smart City', '085709876543', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.75', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', 'Smart city efisiensi kota masa depan', 'belum'),
(75, NULL, '2024-07-03 14:20:00', 'Maya Pertiwi', 'P', 'PT. Digital Transformation', '085767890123', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', 'IoT revolusi industri 4.0', 'belum'),
(76, NULL, '2024-07-05 09:45:00', 'Nando Saputra', 'L', 'CV. Artificial Intelligence', '085823456789', NULL, 'Rekomendasi Teknis (Rekomtek)', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'AI transformasi digital', 'belum'),
(77, NULL, '2024-07-08 13:30:00', 'Olivia Tan', 'P', 'PT. Machine Learning', '085887654321', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.75', '4.00', '3.25', '3.75', '4.00', '3.25', '3.75', '4.00', '3.25', 'Machine learning masa depan', 'belum'),
(78, NULL, '2024-07-10 15:45:00', 'Pandu Wijaya', 'L', 'UD. Data Science', '085945678901', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', 'Big data aset berharga', 'belum'),
(79, NULL, '2024-07-12 10:10:00', 'Queen Amelia', 'P', 'PT. Cloud Computing', '086009876543', NULL, 'Rekomendasi Teknis (Rekomtek)', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'Cloud computing efisien', 'belum'),
(80, NULL, '2024-07-15 11:55:00', 'Rafi Marlon', 'L', 'CV. Cyber Security', '086067890123', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.75', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', 'Keamanan siber sangat krusial', 'belum'),
(81, NULL, '2024-07-17 14:40:00', 'Salsa Bila', 'P', 'PT. Digital Protection', '086123456789', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', 'Proteksi digital wajib', 'belum'),
(82, NULL, '2024-07-19 09:25:00', 'Teguh Santosa', 'L', 'UD. Network Solution', '086187654321', NULL, 'Rekomendasi Teknis (Rekomtek)', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'Jaringan backbone digital', 'belum'),
(83, NULL, '2024-07-22 13:15:00', 'Ulya Nurjanah', 'P', 'PT. Telekomunikasi', '086245678901', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.75', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '5G percepat transformasi', 'belum'),
(84, NULL, '2024-08-02 08:50:00', 'Viktor Siregar', 'L', 'CV. Satelit Indonesia', '086309876543', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', 'Satelit penting konektivitas', 'belum'),
(85, NULL, '2024-08-05 11:35:00', 'Winda Sari', 'P', 'PT. Space Technology', '086367890123', NULL, 'Rekomendasi Teknis (Rekomtek)', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'Teknologi antariksa masa depan', 'belum'),
(86, NULL, '2024-08-07 14:20:00', 'Xavier Wong', 'L', 'UD. Aerospace', '086423456789', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.75', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', 'Aerospace industri strategis', 'belum'),
(87, NULL, '2024-08-09 10:05:00', 'Yulia Darmawan', 'P', 'PT. Drone Technology', '086487654321', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', 'Drone banyak aplikasinya', 'belum'),
(88, NULL, '2024-08-12 15:30:00', 'Zaki Hidayat', 'L', 'CV. Robotics Indonesia', '086545678901', NULL, 'Rekomendasi Teknis (Rekomtek)', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'Robotik otomasi industri', 'belum'),
(89, NULL, '2024-08-14 09:40:00', 'Alya Putri', 'P', 'PT. Automation System', '086609876543', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.75', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', 'Otomasi tingkatkan produktivitas', 'belum'),
(90, NULL, '2024-08-16 13:25:00', 'Bima Sakti', 'L', 'UD. Industrial IoT', '086667890123', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', 'IIoT revolusi industri', 'belum'),
(91, NULL, '2024-08-19 11:10:00', 'Cinta Laura', 'P', 'PT. Smart Manufacturing', '086723456789', NULL, 'Rekomendasi Teknis (Rekomtek)', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'Manufaktur 4.0 efisiensi', 'belum'),
(92, NULL, '2024-08-21 14:55:00', 'Dafa Rahman', 'L', 'CV. Predictive Maintenance', '086787654321', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.75', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', 'Predictive maintenance hemat biaya', 'belum'),
(93, NULL, '2024-08-23 10:30:00', 'Elvira Dewi', 'P', 'PT. Digital Twin', '086845678901', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', 'Digital twin simulasi akurat', 'belum'),
(94, NULL, '2024-09-02 08:45:00', 'Farhan Akbar', 'L', 'UD. Augmented Reality', '086909876543', NULL, 'Rekomendasi Teknis (Rekomtek)', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'AR pengalaman interaktif', 'belum'),
(95, NULL, '2024-09-04 11:20:00', 'Giselle Amanda', 'P', 'PT. Virtual Reality', '086967890123', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.75', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', 'VR immersive experience', 'belum'),
(96, NULL, '2024-09-06 14:35:00', 'Hilman Syah', 'L', 'CV. Mixed Reality', '087023456789', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', 'MR kombinasi terbaik', 'belum'),
(97, NULL, '2024-09-09 10:15:00', 'Indira Putri', 'P', 'PT. Metaverse Development', '087087654321', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'Metaverse ekosistem digital', 'belum'),
(98, NULL, '2024-09-11 13:40:00', 'Jefri Nicolas', 'L', 'UD. Blockchain Technology', '087145678901', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.75', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', 'Blockchain transparan dan aman', 'belum'),
(99, NULL, '2024-09-13 09:55:00', 'Kezia Angel', 'P', 'PT. Cryptocurrency', '087209876543', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', 'Crypto aset digital masa depan', 'belum'),
(100, NULL, '2024-09-16 15:20:00', 'Luthfi Hasan', 'L', 'CV. NFT Marketplace', '087267890123', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'NFT digital ownership', 'belum'),
(101, NULL, '2024-09-18 11:45:00', 'Megan Copper', 'P', 'PT. DeFi Solution', '087323456789', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.75', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', 'DeFi finansial inklusif', 'belum'),
(102, NULL, '2024-09-20 14:10:00', 'Naufal Rizki', 'L', 'UD. Web3 Development', '087387654321', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', 'Web3 internet terdesentralisasi', 'belum'),
(103, NULL, '2024-09-23 10:35:00', 'Olivia Kim', 'P', 'PT. DAO Organization', '087445678901', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'DAO organisasi otonom', 'belum'),
(104, NULL, '2024-10-01 08:30:00', 'Pandu Tri', 'L', 'CV. Smart Contract', '087509876543', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.75', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', 'Smart contract otomasi hukum', 'belum'),
(105, NULL, '2024-10-04 11:25:00', 'Queency Loa', 'P', 'PT. Digital Identity', '087567890123', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', 'Identitas digital aman', 'belum'),
(106, NULL, '2024-10-07 14:15:00', 'Rendy Kurnia', 'L', 'UD. Biometric Technology', '087623456789', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'Biometric autentikasi akurat', 'belum'),
(107, NULL, '2024-10-10 09:50:00', 'Sasha Putin', 'P', 'PT. Facial Recognition', '087687654321', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.75', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', 'Face recognition cepat', 'belum'),
(108, NULL, '2024-10-12 13:30:00', 'Tito Karnavian', 'L', 'CV. Security System', '087745678901', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', 'Keamanan nasional prioritas', 'belum'),
(109, NULL, '2024-10-15 15:45:00', 'Umi Permatasari', 'P', 'PT. Defense Technology', '087809876543', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'Teknologi pertahanan strategis', 'belum'),
(110, NULL, '2024-10-18 10:20:00', 'Vino Bastian', 'L', 'UD. Cybersecurity National', '087867890123', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.75', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', 'Cyber defense sangat penting', 'belum'),
(111, NULL, '2024-10-22 11:40:00', 'Wulan Guritno', 'P', 'PT. Intelligence System', '087923456789', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', 'Sistem intelijen canggih', 'belum'),
(112, NULL, '2024-10-25 14:55:00', 'Xander Ford', 'L', 'CV. Surveillance Tech', '087987654321', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'Surveillance monitoring efektif', 'belum'),
(113, NULL, '2024-10-28 09:35:00', 'Yasmine Wild', 'P', 'PT. Emergency Response', '088045678901', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.75', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', 'Tanggap darurat cepat', 'belum'),
(114, NULL, '2024-11-04 13:20:00', 'Zidan Herlambang', 'L', 'UD. Disaster Management', '088109876543', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', 'Manajemen bencana vital', 'belum'),
(115, NULL, '2024-11-08 15:10:00', 'Aurel Hermansyah', 'P', 'PT. Climate Change', '088167890123', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'Perubahan iklim tantangan global', 'belum'),
(116, NULL, '2024-11-12 10:45:00', 'Baim Wong', 'L', 'CV. Environmental Protection', '088223456789', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.75', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', 'Lingkungan harus dilindungi', 'belum'),
(117, NULL, '2024-11-16 14:30:00', 'Celine Evangelista', 'P', 'PT. Sustainable Future', '088287654321', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', 'Masa depan berkelanjutan', 'belum'),
(118, NULL, '2024-11-20 11:15:00', 'Deddy Corbuzier', 'L', 'UD. Green Economy', '088345678901', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'Ekonomi hijau prospektif', 'belum'),
(119, NULL, '2024-11-25 13:50:00', 'Erika Richard', 'P', 'PT. Circular Economy', '088409876543', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.75', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', 'Ekonomi sirkular efisien', 'belum'),
(120, NULL, '2024-11-29 09:25:00', 'Ferdi Hasan', 'L', 'CV. Zero Waste', '088467890123', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', 'Zero waste lingkungan bersih', 'belum'),
(121, NULL, '2024-12-03 15:35:00', 'Gita Gutawa', 'P', 'PT. Carbon Neutral', '088523456789', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', 'Netral karbon penting', 'belum'),
(122, NULL, '2024-12-07 10:50:00', 'Hanung Bramantyo', 'L', 'UD. Eco Tourism', '088587654321', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.75', '4.00', '3.75', '3.50', '4.00', '3.75', '3.50', '4.00', '3.75', 'Ekowisata lestari alam', 'belum'),
(123, NULL, '2024-12-15 14:15:00', 'Indra Bekti', 'L', 'PT. Year End Review', '088645678901', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', '3.50', '3.75', '4.00', 'Tahun produktif, semoga tahun depan lebih baik', 'belum'),
(124, NULL, '2024-01-07 16:20:00', 'Rudi Kurniawan', 'L', 'PT. Serba Sulit', '089112345678', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '1.50', '2.00', '1.75', '2.25', '1.80', '2.10', '1.60', '1.90', '2.05', 'Pelayanan sangat lambat dan berbelit-belit', 'belum'),
(125, NULL, '2024-01-14 15:45:00', 'Sari Mulyani', 'P', 'CV. Terhambat', '089198765432', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '2.10', '1.80', '2.30', '1.70', '2.00', '1.90', '2.20', '1.60', '1.85', 'Petugas tidak kompeten dan tidak ramah', 'belum'),
(126, NULL, '2024-01-21 11:10:00', 'Bambang Susanto', 'L', 'UD. Rumit Jaya', '089223456789', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '1.80', '2.15', '1.65', '2.40', '1.75', '2.05', '1.90', '2.20', '1.70', 'Prosedur terlalu rumit dan tidak jelas', 'belum'),
(127, NULL, '2024-01-28 14:30:00', 'Diana Anggraeni', 'P', 'PT. Lama Proses', '089287654321', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '2.25', '1.60', '2.10', '1.85', '2.30', '1.75', '2.15', '1.80', '2.00', 'Waktu proses sangat lama sekali', 'belum'),
(128, NULL, '2024-02-04 10:15:00', 'Eko Prasetyo', 'L', 'CV. Biaya Tinggi', '089345678901', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '1.70', '2.30', '1.85', '1.50', '2.20', '1.65', '2.35', '1.75', '2.10', 'Biaya terlalu mahal tidak wajar', 'belum'),
(129, NULL, '2024-02-11 13:25:00', 'Fitri Handayani', 'P', 'PT. Tidak Jelas', '089409876543', NULL, 'Permintaan Data/Informasi', '2.40', '1.75', '2.00', '2.15', '1.65', '2.25', '1.70', '2.30', '1.80', 'Informasi diberikan tidak jelas dan membingungkan', 'belum'),
(130, NULL, '2024-02-18 09:40:00', 'Gunawan Santosa', 'L', 'UD. Sulit Dipahami', '089467890123', NULL, 'Permintaan Data/Informasi', '1.65', '2.20', '1.90', '2.05', '1.80', '2.35', '1.75', '2.10', '1.95', 'Petugas tidak bisa menjelaskan dengan baik', 'belum'),
(131, NULL, '2024-02-25 16:50:00', 'Hesti Rahmawati', 'P', 'PT. Lambat Respon', '089523456789', NULL, 'Permintaan Data/Informasi', '2.15', '1.90', '2.25', '1.70', '2.10', '1.85', '2.30', '1.65', '2.20', 'Respon sangat lambat dan tidak responsif', 'belum'),
(132, NULL, '2024-03-03 08:45:00', 'Irfan Maulana', 'L', 'CV. Tidak Ramah', '089587654321', NULL, 'Permintaan Data/Informasi', '1.90', '2.35', '1.70', '2.20', '1.85', '2.10', '1.75', '2.25', '1.60', 'Petugas sangat tidak ramah dan kasar', 'belum'),
(133, NULL, '2024-03-10 12:20:00', 'Juli Astuti', 'P', 'PT. Fasilitas Buruk', '089645678901', NULL, 'Permintaan Data/Informasi', '2.30', '1.65', '2.15', '1.80', '2.25', '1.70', '2.40', '1.85', '2.00', 'Fasilitas sangat buruk dan tidak nyaman', 'belum'),
(134, NULL, '2024-03-17 15:35:00', 'Koko Santoso', 'L', 'UD. Berantakan', '089709876543', NULL, 'Permintaan Data/Informasi', '1.75', '2.10', '1.95', '2.30', '1.60', '2.20', '1.85', '2.15', '1.70', 'Administrasi berantakan dan tidak tertata', 'belum'),
(135, NULL, '2024-03-24 11:55:00', 'Lia Mariana', 'P', 'PT. Tidak Profesional', '089767890123', NULL, 'Permintaan Data/Informasi', '2.20', '1.80', '2.05', '1.95', '2.15', '1.75', '2.10', '2.25', '1.65', 'Petugas tidak profesional dalam bekerja', 'belum'),
(136, NULL, '2024-04-01 14:10:00', 'Maman Hermawan', 'L', 'CV. Sistem Error', '089823456789', NULL, 'Permintaan Data/Informasi', '1.85', '2.25', '1.60', '2.15', '1.90', '2.30', '1.65', '2.20', '1.75', 'Sistem sering error dan tidak stabil', 'belum'),
(137, NULL, '2024-04-09 10:30:00', 'Nina Sari', 'P', 'PT. Tidak Akurat', '089887654321', NULL, 'Permintaan Data/Informasi', '2.10', '1.95', '2.20', '1.65', '2.25', '1.80', '2.15', '1.70', '2.30', 'Informasi yang diberikan tidak akurat', 'belum'),
(138, NULL, '2024-04-16 13:45:00', 'Oscar Wijaya', 'L', 'UD. Komputer Rusak', '089945678901', NULL, 'Permintaan Data/Informasi', '1.60', '2.15', '1.80', '2.25', '1.65', '2.10', '1.95', '2.30', '1.70', 'Banyak komputer rusak dan lambat', 'belum'),
(139, NULL, '2024-04-23 16:20:00', 'Putri Amanda', 'P', 'PT. Antrian Panjang', '090009876543', NULL, 'Permintaan Data/Informasi', '2.25', '1.70', '2.30', '1.85', '2.10', '1.95', '2.20', '1.65', '2.15', 'Antrian sangat panjang dan tidak tertib', 'belum'),
(140, NULL, '2024-04-30 09:15:00', 'Randy Pratama', 'L', 'CV. Petugas Sedikit', '090067890123', NULL, 'Permintaan Data/Informasi', '1.95', '2.30', '1.65', '2.20', '1.80', '2.15', '1.70', '2.25', '1.85', 'Petugas terlalu sedikit sehingga lambat', 'belum'),
(141, NULL, '2024-05-07 11:40:00', 'Siska Wulandari', 'P', 'PT. Ruang Sempit', '090123456789', NULL, 'Permintaan Data/Informasi', '2.15', '1.80', '2.25', '1.70', '2.30', '1.65', '2.20', '1.85', '2.10', 'Ruang tunggu sangat sempit dan pengap', 'belum'),
(142, NULL, '2024-05-14 14:55:00', 'Toni Gunawan', 'L', 'UD. AC Mati', '090187654321', NULL, 'Permintaan Data/Informasi', '1.70', '2.20', '1.85', '2.30', '1.65', '2.15', '1.80', '2.25', '1.90', 'AC mati sehingga ruangan sangat panas', 'belum'),
(143, NULL, '2024-05-21 10:25:00', 'Umi Kalsum', 'P', 'PT. Toilet Kotor', '090245678901', NULL, 'Permintaan Data/Informasi', '2.30', '1.65', '2.10', '1.85', '2.25', '1.70', '2.35', '1.80', '2.15', 'Toilet sangat kotor dan bau', 'belum'),
(144, NULL, '2024-05-28 15:50:00', 'Vino Marcel', 'L', 'CV. Internet Lambat', '090309876543', NULL, 'Permintaan Data/Informasi', '1.80', '2.25', '1.70', '2.15', '1.90', '2.30', '1.65', '2.20', '1.75', 'Internet sangat lambat menghambat proses', 'belum'),
(145, NULL, '2024-06-04 12:15:00', 'Winda Sari', 'P', 'PT. Dokumen Hilang', '090367890123', NULL, 'Permintaan Data/Informasi', '2.20', '1.75', '2.30', '1.60', '2.15', '1.85', '2.25', '1.70', '2.10', 'Dokumen saya sampai hilang tidak jelas', 'belum'),
(146, NULL, '2024-06-11 09:35:00', 'Xavier Lee', 'L', 'UD. Pungli', '090423456789', NULL, 'Permintaan Data/Informasi', '1.65', '2.30', '1.80', '2.25', '1.70', '2.15', '1.85', '2.35', '1.60', 'Ada indikasi pungutan liar yang tidak jelas', 'belum'),
(147, NULL, '2024-06-18 16:40:00', 'Yuniarti', 'P', 'PT. Diskriminatif', '090487654321', NULL, 'Permintaan Data/Informasi', '2.25', '1.70', '2.15', '1.90', '2.30', '1.65', '2.20', '1.75', '2.35', 'Pelayanan diskriminatif tidak adil', 'belum'),
(148, NULL, '2024-06-25 13:05:00', 'Zaki Hidayat', 'L', 'CV. Jam Kantor Tidak Jelas', '090545678901', NULL, 'Permintaan Data/Informasi', '1.90', '2.15', '1.75', '2.30', '1.80', '2.25', '1.65', '2.20', '1.70', 'Jam kantor tidak jelas sering tutup awal', 'belum'),
(149, NULL, '2024-07-02 10:50:00', 'Ani Lestari', 'P', 'PT. Tidak Transparan', '090609876543', NULL, 'Permintaan Data/Informasi', '2.30', '1.65', '2.20', '1.75', '2.35', '1.70', '2.25', '1.80', '2.15', 'Proses tidak transparan dan tertutup', 'belum'),
(150, NULL, '2024-07-09 14:25:00', 'Budi Cahyono', 'L', 'UD. Berbelit-belit', '090667890123', NULL, 'Permintaan Data/Informasi', '1.75', '2.20', '1.85', '2.30', '1.65', '2.15', '1.80', '2.25', '1.90', 'Birokrasi berbelit-belit tidak efisien', 'belum'),
(151, NULL, '2024-07-16 11:10:00', 'Cindy Nurjanah', 'P', 'PT. Tidak Konsisten', '090723456789', NULL, 'Permintaan Data/Informasi', '2.15', '1.80', '2.25', '1.70', '2.30', '1.65', '2.20', '1.85', '2.10', 'Kebijakan tidak konsisten berubah-ubah', 'belum'),
(152, NULL, '2024-07-23 15:45:00', 'Dodi Pratama', 'L', 'CV. Petugas Bolos', '090787654321', NULL, 'Permintaan Data/Informasi', '1.60', '2.25', '1.70', '2.20', '1.85', '2.30', '1.65', '2.15', '1.80', 'Banyak petugas bolos tidak jelas', 'belum'),
(153, NULL, '2024-07-30 09:20:00', 'Eva Marlina', 'P', 'PT. Parkir Sulit', '090845678901', NULL, 'Permintaan Data/Informasi', '2.20', '1.75', '2.30', '1.65', '2.15', '1.80', '2.25', '1.70', '2.35', 'Tempat parkir sangat sulit dan sempit', 'belum'),
(154, NULL, '2024-08-06 12:55:00', 'Fajar Siddik', 'L', 'UD. Tidak Ada Solusi', '090909876543', NULL, 'Permintaan Data/Informasi', '1.85', '2.30', '1.65', '2.25', '1.70', '2.20', '1.75', '2.35', '1.60', 'Pengaduan tidak ditindaklanjuti dengan solusi', 'belum'),
(155, NULL, '2024-08-13 16:30:00', 'Gita Purnama', 'P', 'PT. Alat Rusak', '090967890123', NULL, 'Lainnya', '2.25', '1.70', '2.15', '1.80', '2.30', '1.65', '2.20', '1.75', '2.10', 'Banyak alat elektronik yang rusak', 'belum'),
(156, NULL, '2024-08-20 10:05:00', 'Hendra Kurnia', 'L', 'CV. Tidak Tepat Waktu', '091023456789', NULL, 'Lainnya', '1.70', '2.15', '1.80', '2.30', '1.65', '2.25', '1.75', '2.20', '1.85', 'Janji tidak tepat waktu molor terus', 'belum'),
(157, NULL, '2024-08-27 13:40:00', 'Indah Permatasari', 'P', 'PT. Biaya Tambahan', '091087654321', NULL, 'Lainnya', '2.30', '1.65', '2.25', '1.70', '2.15', '1.80', '2.35', '1.75', '2.20', 'Banyak biaya tambahan yang tidak jelas', 'belum'),
(158, NULL, '2024-09-05 15:15:00', 'Joko Susilo', 'L', 'UD. Tidak Ramah Disabilitas', '091145678901', NULL, 'Lainnya', '1.80', '2.25', '1.70', '2.20', '1.85', '2.30', '1.65', '2.15', '1.75', 'Fasilitas tidak ramah untuk disabilitas', 'belum'),
(159, NULL, '2024-09-12 11:50:00', 'Kartika Sari', 'P', 'PT. Informasi Salah', '091209876543', NULL, 'Lainnya', '2.15', '1.80', '2.30', '1.65', '2.25', '1.70', '2.20', '1.85', '2.35', 'Banyak informasi yang salah menyesatkan', 'belum'),
(160, NULL, '2024-09-19 14:25:00', 'Luki Hermawan', 'L', 'CV. Tidak Ada Follow Up', '091267890123', NULL, 'Lainnya', '1.65', '2.30', '1.75', '2.25', '1.70', '2.20', '1.80', '2.35', '1.60', 'Tidak ada follow up setelah konsultasi', 'belum'),
(161, NULL, '2024-09-26 09:00:00', 'Mira Utami', 'P', 'PT. Berbayar Semua', '091323456789', NULL, 'Lainnya', '2.20', '1.75', '2.15', '1.90', '2.30', '1.65', '2.25', '1.70', '2.10', 'Semua layanan berbayar sangat mahal', 'belum'),
(162, NULL, '2024-10-08 12:35:00', 'Nando Pratama', 'L', 'UD. Tidak Terorganisir', '091387654321', NULL, 'Lainnya', '1.90', '2.15', '1.80', '2.30', '1.65', '2.25', '1.75', '2.20', '1.70', 'Administrasi tidak terorganisir dengan baik', 'belum'),
(163, NULL, '2024-10-17 16:10:00', 'Olivia Kim', 'P', 'PT. Tidak Siap Digital', '091445678901', NULL, 'Lainnya', '2.25', '1.70', '2.30', '1.65', '2.20', '1.75', '2.35', '1.80', '2.15', 'Tidak siap dengan transformasi digital', 'belum'),
(164, NULL, '2024-10-26 10:45:00', 'Pandu Wijaya', 'L', 'CV. Komplain Tidak Dianggap', '091509876543', NULL, 'Lainnya', '1.75', '2.20', '1.85', '2.35', '1.60', '2.15', '1.80', '2.30', '1.65', 'Komplain tidak dianggap dan diabaikan', 'belum'),
(165, NULL, '2024-11-06 13:20:00', 'Queency Loa', 'P', 'PT. Standar Ganda', '091567890123', NULL, 'Lainnya', '2.30', '1.65', '2.25', '1.70', '2.35', '1.60', '2.20', '1.75', '2.15', 'Standar ganda dalam pelayanan', 'belum'),
(166, NULL, '2024-11-15 15:55:00', 'Rendy Kurnia', 'L', 'UD. Favoritisme', '091623456789', NULL, 'Lainnya', '1.60', '2.25', '1.70', '2.20', '1.85', '2.30', '1.65', '2.15', '1.80', 'Ada praktik favoritisme dalam pelayanan', 'belum'),
(167, NULL, '2024-11-24 11:30:00', 'Sasha Putin', 'P', 'PT. Tidak Inovatif', '091687654321', NULL, 'Lainnya', '2.15', '1.80', '2.30', '1.65', '2.25', '1.70', '2.20', '1.85', '2.35', 'Tidak ada inovasi dalam pelayanan', 'belum'),
(168, NULL, '2024-12-05 14:05:00', 'Tito Karnavian', 'L', 'CV. Birokrasi Kaku', '091745678901', NULL, 'Lainnya', '1.85', '2.30', '1.65', '2.25', '1.70', '2.20', '1.75', '2.35', '1.60', 'Birokrasi terlalu kaku dan ketinggalan zaman', 'belum'),
(169, NULL, '2024-12-14 16:40:00', 'Umi Permatasari', 'P', 'PT. Tidak Visioner', '091809876543', NULL, 'Lainnya', '2.20', '1.75', '2.15', '1.80', '2.30', '1.65', '2.25', '1.70', '2.10', 'Tidak visioner dalam menghadapi masa depan', 'belum'),
(170, NULL, '2024-12-23 10:15:00', 'Vino Bastian', 'L', 'UD. Tahun End Buruk', '091867890123', NULL, 'Lainnya', '1.70', '2.15', '1.80', '2.30', '1.65', '2.25', '1.75', '2.20', '1.85', 'Tutup tahun dengan pelayanan yang buruk', 'belum'),
(171, NULL, '2026-01-05 08:30:00', 'Rizki Pratama', 'L', 'PT. Digital Innovation', '081234567891', NULL, 'Menemui Pejabat/Staf', '4.20', '3.80', '3.90', '4.10', '3.70', '3.85', '4.15', '3.75', '3.95', 'Pelayanan semakin baik dengan sistem digital', 'belum'),
(172, NULL, '2026-01-12 09:15:00', 'Sari Dewi', 'P', 'CV. Tech Solution', '081298765433', NULL, 'Menemui Pejabat/Staf', '3.85', '4.10', '3.45', '3.70', '3.85', '4.15', '3.40', '3.85', '4.05', 'Prosedur semakin mudah dipahami', 'belum'),
(173, NULL, '2026-01-18 10:20:00', 'Budi Santoso', 'L', 'UD. Modern Retail', '081312345679', NULL, 'Menemui Pejabat/Staf', '3.70', '3.45', '4.15', '3.85', '3.60', '3.35', '4.10', '3.85', '3.60', 'Petugas sangat informatif', 'belum'),
(174, NULL, '2026-01-25 11:45:00', 'Maya Anggraeni', 'P', 'PT. Future Enterprise', '081387654322', NULL, 'Menemui Pejabat/Staf', '4.15', '3.85', '3.60', '4.10', '3.85', '3.60', '3.85', '4.15', '3.60', 'Waktu tunggu lebih cepat dari sebelumnya', 'belum'),
(175, NULL, '2026-02-03 13:30:00', 'Rudi Setiawan', 'L', 'CV. Smart Business', '081445678902', NULL, 'Menemui Pejabat/Staf', '3.35', '4.15', '3.85', '3.60', '4.15', '3.85', '3.60', '3.35', '4.15', 'Fasilitas semakin nyaman', 'belum'),
(176, NULL, '2026-02-10 14:15:00', 'Dewi Kartika', 'P', 'PT. Innovation Hub', '081498765433', NULL, 'Menemui Pejabat/Staf', '3.85', '3.60', '4.15', '3.85', '3.60', '4.15', '3.85', '3.60', '3.85', 'Pelayanan cepat dan akurat', 'belum'),
(177, NULL, '2026-02-17 08:45:00', 'Joko Prasetyo', 'L', 'UD. Digital Market', '081556789013', NULL, 'Menemui Pejabat/Staf', '4.15', '3.85', '3.60', '4.15', '3.85', '3.60', '4.15', '3.85', '3.60', 'Sangat membantu pengusaha digital', 'belum'),
(178, NULL, '2026-02-24 10:30:00', 'Linda Hartati', 'P', 'PT. Creative Solution', '081609876544', NULL, 'Menemui Pejabat/Staf', '3.60', '4.15', '3.85', '3.60', '4.15', '3.85', '3.60', '4.15', '3.85', 'Informasi diberikan sangat detail', 'belum'),
(179, NULL, '2026-03-04 11:20:00', 'Hendra Wijaya', 'L', 'CV. Global Network', '081667890124', NULL, 'Menemui Pejabat/Staf', '3.35', '3.60', '3.85', '3.35', '3.60', '3.85', '3.35', '3.60', '3.85', 'Pengaduan ditanggapi dengan serius', 'belum'),
(180, NULL, '2026-03-11 13:45:00', 'Rina Saputri', 'P', 'PT. Visionary Tech', '081723456790', NULL, 'Menemui Pejabat/Staf', '4.15', '3.85', '3.60', '4.15', '3.85', '3.60', '4.15', '3.85', '3.60', 'Proses lebih efisien tahun ini', 'belum'),
(181, NULL, '2026-04-08 09:40:00', 'Ahmad Fauzan', 'L', 'PT. Renewable Energy', '082112345678', NULL, 'Rekomendasi Teknis (Rekomtek)', '4.25', '3.90', '3.75', '4.20', '3.95', '4.10', '3.80', '3.85', '4.05', 'Energi terbarukan semakin difasilitasi', 'belum'),
(182, NULL, '2026-04-15 11:25:00', 'Diana Permatasari', 'P', 'CV. Green Technology', '082198765432', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.90', '4.20', '3.85', '3.70', '4.15', '3.90', '3.65', '4.10', '3.95', 'Teknologi hijau didukung penuh', 'belum'),
(183, NULL, '2026-04-22 13:50:00', 'Fajar Ramadan', 'L', 'UD. Eco Solution', '082234567890', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.75', '3.95', '4.20', '3.85', '3.70', '4.15', '3.90', '3.75', '3.80', 'Solusi lingkungan semakin inovatif', 'belum'),
(184, NULL, '2026-04-29 15:15:00', 'Gita Andini', 'P', 'PT. Sustainable Future', '082287654321', NULL, 'Rekomendasi Teknis (Rekomtek)', '4.20', '3.85', '3.70', '4.25', '3.90', '3.65', '4.15', '3.95', '3.75', 'Masa depan berkelanjutan menjadi fokus', 'belum'),
(185, NULL, '2026-05-06 10:45:00', 'Irfan Maulana', 'L', 'CV. AI Development', '083145678901', NULL, 'Rekomendasi Teknis (Rekomtek)', '4.15', '3.95', '3.85', '4.10', '3.90', '4.05', '3.80', '3.85', '4.00', 'Kecerdasan artifisial semakin dikembangkan', 'belum'),
(186, NULL, '2026-05-13 14:20:00', 'Kartika Sari', 'P', 'PT. Machine Learning', '083209876543', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.80', '4.10', '3.95', '3.75', '4.15', '3.90', '3.70', '4.05', '3.85', 'Machine learning aplikasinya luas', 'belum'),
(187, NULL, '2026-05-20 09:30:00', 'Lukman Hakim', 'L', 'UD. Data Analytics', '083267890123', NULL, 'Rekomendasi Teknis (Rekomtek)', '4.25', '3.90', '3.75', '4.20', '3.95', '3.80', '4.15', '3.85', '3.90', 'Analisis data sangat membantu bisnis', 'belum'),
(188, NULL, '2026-06-03 11:40:00', 'Nina Herlina', 'P', 'PT. Cloud Computing', '084323456789', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.95', '4.20', '3.85', '3.70', '4.15', '3.90', '3.75', '4.10', '3.95', 'Cloud computing semakin handal', 'belum'),
(189, NULL, '2026-06-10 13:25:00', 'Oki Setiawan', 'L', 'UD. Cyber Security', '084387654321', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.70', '3.90', '4.20', '3.75', '3.85', '4.15', '3.80', '3.70', '4.10', 'Keamanan siber semakin diperkuat', 'belum'),
(190, NULL, '2026-06-17 15:00:00', 'Putri Anggraini', 'P', 'PT. Digital Protection', '084445678901', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '4.20', '3.85', '3.70', '4.25', '3.90', '3.75', '4.15', '3.95', '3.80', 'Proteksi digital sangat penting', 'belum'),
(191, NULL, '2026-07-05 10:15:00', 'Rafi Ahmad', 'L', 'CV. Smart City', '085112345678', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '4.15', '3.95', '3.85', '4.10', '3.90', '4.05', '3.80', '3.85', '4.00', 'Smart city implementation bagus', 'belum'),
(192, NULL, '2026-07-12 14:35:00', 'Sari Utami', 'P', 'PT. IoT Solution', '085198765432', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.80', '4.10', '3.95', '3.75', '4.15', '3.90', '3.70', '4.05', '3.85', 'IoT semakin terintegrasi', 'belum'),
(193, NULL, '2026-07-19 11:20:00', 'Tono Wijaya', 'L', 'UD. Automation System', '085223456789', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '4.25', '3.90', '3.75', '4.20', '3.95', '3.80', '4.15', '3.85', '3.90', 'Otomasi meningkatkan efisiensi', 'belum'),
(194, NULL, '2026-08-02 13:45:00', 'Umi Kulsum', 'P', 'PT. Robotics Indonesia', '085287654321', NULL, 'Permintaan Data/Informasi', '3.95', '4.20', '3.85', '3.70', '4.15', '3.90', '3.75', '4.10', '3.95', 'Robotik berkembang pesat', 'belum'),
(195, NULL, '2026-08-09 09:50:00', 'Vino Gustomo', 'L', 'CV. Drone Technology', '085345678901', NULL, 'Permintaan Data/Informasi', '3.70', '3.90', '4.20', '3.75', '3.85', '4.15', '3.80', '3.70', '4.10', 'Teknologi drone banyak aplikasinya', 'belum'),
(196, NULL, '2026-08-16 15:25:00', 'Wulan Sari', 'P', 'PT. Aerospace', '085409876543', NULL, 'Permintaan Data/Informasi', '4.20', '3.85', '3.70', '4.25', '3.90', '3.75', '4.15', '3.95', '3.80', 'Aerospace industry promising', 'belum'),
(197, NULL, '2026-09-03 10:40:00', 'Xavier Tan', 'L', 'UD. Satellite Communication', '086123456789', NULL, 'Permintaan Data/Informasi', '4.15', '3.95', '3.85', '4.10', '3.90', '4.05', '3.80', '3.85', '4.00', 'Komunikasi satelit semakin advance', 'belum'),
(198, NULL, '2026-09-10 14:15:00', 'Yuni Shara', 'P', 'PT. Space Technology', '086187654321', NULL, 'Permintaan Data/Informasi', '3.80', '4.10', '3.95', '3.75', '4.15', '3.90', '3.70', '4.05', '3.85', 'Teknologi luar angkasa masa depan', 'belum'),
(199, NULL, '2026-09-17 11:30:00', 'Zaki Ahmad', 'L', 'CV. Virtual Reality', '086223456789', NULL, 'Permintaan Data/Informasi', '4.25', '3.90', '3.75', '4.20', '3.95', '3.80', '4.15', '3.85', '3.90', 'VR experience semakin immersive', 'belum'),
(200, NULL, '2026-10-05 13:50:00', 'Aisyah Rahman', 'P', 'PT. Metaverse Development', '086287654321', NULL, 'Permintaan Data/Informasi', '3.95', '4.20', '3.85', '3.70', '4.15', '3.90', '3.75', '4.10', '3.95', 'Metaverse ecosystem berkembang', 'belum'),
(201, NULL, '2026-10-12 09:55:00', 'Bambang Surya', 'L', 'UD. Blockchain Solution', '086345678901', NULL, 'Permintaan Data/Informasi', '3.70', '3.90', '4.20', '3.75', '3.85', '4.15', '3.80', '3.70', '4.10', 'Blockchain adoption meningkat', 'belum'),
(202, NULL, '2026-10-19 15:20:00', 'Citra Lestari', 'P', 'PT. Cryptocurrency', '086409876543', NULL, 'Permintaan Data/Informasi', '4.20', '3.85', '3.70', '4.25', '3.90', '3.75', '4.15', '3.95', '3.80', 'Crypto regulation semakin jelas', 'belum'),
(203, NULL, '2026-11-04 11:45:00', 'Doni Prasetyo', 'L', 'CV. NFT Platform', '087112345678', NULL, 'Lainnya', '4.15', '3.95', '3.85', '4.10', '3.90', '4.05', '3.80', '3.85', '4.00', 'NFT market semakin berkembang', 'belum'),
(204, NULL, '2026-11-11 14:10:00', 'Elisa Wijaya', 'P', 'PT. DeFi Application', '087187654321', NULL, 'Lainnya', '3.80', '4.10', '3.95', '3.75', '4.15', '3.90', '3.70', '4.05', '3.85', 'DeFi transformative untuk finansial', 'belum');
INSERT INTO `buku_tamu_backup` (`id`, `nik`, `timestamp`, `nama`, `jenis_kelamin`, `asal_instansi`, `no_handphone`, `email`, `keperluan`, `pendapat_pelayanan`, `pemahaman_prosedur`, `pendapat_kecepatan`, `pendapat_biaya`, `pendapat_produk`, `pendapat_kompetensi`, `pendapat_perilaku`, `pendapat_pengaduan`, `pendapat_kualitas`, `kritik_saran`, `status_survei`) VALUES
(205, NULL, '2026-11-18 10:35:00', 'Fajar Siddik', 'L', 'UD. Web3 Development', '087223456789', NULL, 'Lainnya', '4.25', '3.90', '3.75', '4.20', '3.95', '3.80', '4.15', '3.85', '3.90', 'Web3 masa depan internet', 'belum'),
(206, NULL, '2026-12-02 15:45:00', 'Gita Gutawa', 'P', 'PT. DAO Organization', '087287654321', NULL, 'Lainnya', '3.95', '4.20', '3.85', '3.70', '4.15', '3.90', '3.75', '4.10', '3.95', 'DAO organizational structure inovatif', 'belum'),
(207, NULL, '2026-12-09 10:20:00', 'Hadi Susilo', 'L', 'CV. Smart Contract', '087345678901', NULL, 'Lainnya', '3.70', '3.90', '4.20', '3.75', '3.85', '4.15', '3.80', '3.70', '4.10', 'Smart contract automation efficient', 'belum'),
(208, NULL, '2026-12-16 13:30:00', 'Intan Permata', 'P', 'PT. Digital Identity', '087409876543', NULL, 'Lainnya', '4.20', '3.85', '3.70', '4.25', '3.90', '3.75', '4.15', '3.95', '3.80', 'Digital identity security penting', 'belum'),
(209, NULL, '2027-01-06 08:30:00', 'Joni Kurniawan', 'L', 'PT. Quantum Computing', '088112345678', NULL, 'Menemui Pejabat/Staf', '4.30', '4.00', '3.95', '4.25', '4.05', '4.15', '3.90', '3.95', '4.10', 'Quantum computing revolutionary', 'belum'),
(210, NULL, '2027-01-13 09:15:00', 'Kartini Sari', 'P', 'CV. Biotech Innovation', '088198765432', NULL, 'Menemui Pejabat/Staf', '3.95', '4.25', '3.50', '3.80', '4.20', '4.10', '3.45', '3.90', '4.15', 'Bioteknologi masa depan kesehatan', 'belum'),
(211, NULL, '2027-01-20 10:20:00', 'Lukman Nur', 'L', 'UD. Genetic Engineering', '088223456789', NULL, 'Menemui Pejabat/Staf', '3.80', '3.50', '4.20', '3.95', '3.70', '3.40', '4.15', '3.95', '3.70', 'Genetic engineering ethical consideration', 'belum'),
(212, NULL, '2027-01-27 11:45:00', 'Maya Pertiwi', 'P', 'PT. Pharmaceutical Research', '088287654321', NULL, 'Menemui Pejabat/Staf', '4.20', '3.95', '3.70', '4.25', '3.95', '3.70', '3.95', '4.20', '3.70', 'Research farmasi sangat penting', 'belum'),
(213, NULL, '2027-02-05 13:30:00', 'Nando Saputra', 'L', 'CV. Medical Device', '088345678901', NULL, 'Menemui Pejabat/Staf', '3.40', '4.20', '3.95', '3.70', '4.20', '3.95', '3.70', '3.40', '4.20', 'Medical device innovation cepat', 'belum'),
(214, NULL, '2027-02-12 14:15:00', 'Olivia Tan', 'P', 'PT. Health Tech', '088409876543', NULL, 'Menemui Pejabat/Staf', '3.95', '3.70', '4.20', '3.95', '3.70', '4.20', '3.95', '3.70', '3.95', 'Health technology transformative', 'belum'),
(215, NULL, '2027-02-19 08:45:00', 'Pandu Wijaya', 'L', 'UD. Telemedicine', '088467890123', NULL, 'Menemui Pejabat/Staf', '4.20', '3.95', '3.70', '4.20', '3.95', '3.70', '4.20', '3.95', '3.70', 'Telemedicine access mudah', 'belum'),
(216, NULL, '2027-03-08 10:30:00', 'Queen Amelia', 'P', 'PT. Digital Health', '088523456789', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.70', '4.20', '3.95', '3.70', '4.20', '3.95', '3.70', '4.20', '3.95', 'Digital health records efficient', 'belum'),
(217, NULL, '2027-03-15 11:20:00', 'Rafi Marlon', 'L', 'CV. AI Healthcare', '088587654321', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.40', '3.70', '3.95', '3.40', '3.70', '3.95', '3.40', '3.70', '3.95', 'AI dalam healthcare akurat', 'belum'),
(218, NULL, '2027-03-22 13:45:00', 'Salsa Bila', 'P', 'PT. Preventive Medicine', '088645678901', NULL, 'Rekomendasi Teknis (Rekomtek)', '4.20', '3.95', '3.70', '4.20', '3.95', '3.70', '4.20', '3.95', '3.70', 'Preventive medicine approach baik', 'belum'),
(219, NULL, '2027-04-07 09:40:00', 'Teguh Santosa', 'L', 'UD. Wellness Tech', '089112345678', NULL, 'Rekomendasi Teknis (Rekomtek)', '4.25', '4.00', '3.85', '4.30', '4.05', '4.10', '3.90', '3.95', '4.15', 'Wellness technology trending', 'belum'),
(220, NULL, '2027-04-14 11:25:00', 'Ulya Nurjanah', 'P', 'PT. Fitness Innovation', '089198765432', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.90', '4.25', '3.95', '3.80', '4.20', '3.95', '3.75', '4.15', '4.00', 'Fitness tech semakin personal', 'belum'),
(221, NULL, '2027-04-21 13:50:00', 'Viktor Siregar', 'L', 'CV. Nutrition Science', '089223456789', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.85', '4.05', '4.25', '3.95', '3.80', '4.20', '4.00', '3.85', '3.90', 'Nutrition science evidence-based', 'belum'),
(222, NULL, '2027-05-05 15:15:00', 'Winda Sari', 'P', 'PT. Agri Tech', '089287654321', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '4.30', '3.95', '3.80', '4.35', '4.00', '3.75', '4.25', '4.05', '3.85', 'Agricultural technology efisien', 'belum'),
(223, NULL, '2027-05-12 10:45:00', 'Xavier Wong', 'L', 'UD. Smart Farming', '089345678901', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '4.15', '4.05', '3.95', '4.20', '4.00', '4.10', '3.90', '3.95', '4.05', 'Smart farming sustainable', 'belum'),
(224, NULL, '2027-05-19 14:20:00', 'Yulia Darmawan', 'P', 'PT. Hydroponic System', '089409876543', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.80', '4.20', '4.05', '3.85', '4.25', '4.00', '3.80', '4.15', '3.95', 'Hydroponic water efficient', 'belum'),
(225, NULL, '2027-06-04 09:30:00', 'Zaki Hidayat', 'L', 'CV. Vertical Farming', '089467890123', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '4.35', '4.00', '3.85', '4.30', '4.05', '3.90', '4.25', '3.95', '4.00', 'Vertical farming space efficient', 'belum'),
(226, NULL, '2027-06-11 11:40:00', 'Alya Putri', 'P', 'PT. Food Security', '089523456789', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.95', '4.25', '3.95', '3.80', '4.20', '4.00', '3.85', '4.15', '4.05', 'Food security national priority', 'belum'),
(227, NULL, '2027-06-18 13:25:00', 'Bima Sakti', 'L', 'UD. Supply Chain Tech', '089587654321', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.80', '4.00', '4.25', '3.85', '3.95', '4.20', '3.90', '3.80', '4.15', 'Supply chain optimization baik', 'belum'),
(228, NULL, '2027-07-02 15:00:00', 'Cinta Laura', 'P', 'PT. Logistics Innovation', '089645678901', NULL, 'Permintaan Data/Informasi', '4.25', '3.95', '3.80', '4.30', '4.00', '3.85', '4.20', '4.05', '3.90', 'Logistics innovation efficient', 'belum'),
(229, NULL, '2027-07-09 10:15:00', 'Dafa Rahman', 'L', 'CV. Last Mile Delivery', '089709876543', NULL, 'Permintaan Data/Informasi', '4.15', '4.10', '3.95', '4.20', '4.05', '4.15', '3.90', '3.95', '4.10', 'Last mile delivery cepat', 'belum'),
(230, NULL, '2027-07-16 14:35:00', 'Elvira Dewi', 'P', 'PT. E-commerce Logistics', '089767890123', NULL, 'Permintaan Data/Informasi', '3.90', '4.20', '4.05', '3.85', '4.25', '4.00', '3.80', '4.15', '3.95', 'E-commerce logistics handal', 'belum'),
(231, NULL, '2027-08-03 11:20:00', 'Farhan Akbar', 'L', 'UD. Delivery Tech', '090112345678', NULL, 'Permintaan Data/Informasi', '4.30', '4.00', '3.85', '4.35', '4.05', '3.90', '4.25', '3.95', '4.00', 'Delivery technology advanced', 'belum'),
(232, NULL, '2027-08-10 13:45:00', 'Giselle Amanda', 'P', 'PT. Autonomous Vehicle', '090187654321', NULL, 'Permintaan Data/Informasi', '3.95', '4.25', '3.95', '3.80', '4.20', '4.00', '3.85', '4.15', '4.05', 'Autonomous vehicle safety baik', 'belum'),
(233, NULL, '2027-08-17 09:50:00', 'Hilman Syah', 'L', 'CV. EV Technology', '090223456789', NULL, 'Permintaan Data/Informasi', '3.80', '4.00', '4.25', '3.85', '3.95', '4.20', '3.90', '3.80', '4.15', 'Electric vehicle future transport', 'belum'),
(234, NULL, '2027-09-01 15:25:00', 'Indira Putri', 'P', 'PT. Battery Innovation', '090287654321', NULL, 'Lainnya', '4.25', '3.95', '3.80', '4.30', '4.00', '3.85', '4.20', '4.05', '3.90', 'Battery technology improving', 'belum'),
(235, NULL, '2027-09-08 10:40:00', 'Jefri Nicolas', 'L', 'UD. Charging Infrastructure', '090345678901', NULL, 'Lainnya', '4.15', '4.10', '3.95', '4.20', '4.05', '4.15', '3.90', '3.95', '4.10', 'Charging infrastructure expanding', 'belum'),
(236, NULL, '2027-09-15 14:15:00', 'Kezia Angel', 'P', 'PT. Green Transportation', '090409876543', NULL, 'Lainnya', '3.90', '4.20', '4.05', '3.85', '4.25', '4.00', '3.80', '4.15', '3.95', 'Green transportation sustainable', 'belum'),
(237, NULL, '2027-10-06 11:30:00', 'Luthfi Hasan', 'L', 'CV. Public Transport', '090467890123', NULL, 'Lainnya', '4.30', '4.00', '3.85', '4.35', '4.05', '3.90', '4.25', '3.95', '4.00', 'Public transport efficient', 'belum'),
(238, NULL, '2027-10-13 13:50:00', 'Megan Copper', 'P', 'PT. Urban Mobility', '090523456789', NULL, 'Lainnya', '3.95', '4.25', '3.95', '3.80', '4.20', '4.00', '3.85', '4.15', '4.05', 'Urban mobility solution needed', 'belum'),
(239, NULL, '2027-10-20 09:55:00', 'Naufal Rizki', 'L', 'UD. Traffic Management', '090587654321', NULL, 'Lainnya', '3.80', '4.00', '4.25', '3.85', '3.95', '4.20', '3.90', '3.80', '4.15', 'Traffic management system baik', 'belum'),
(240, NULL, '2027-11-03 15:20:00', 'Olivia Kim', 'P', 'PT. Smart Infrastructure', '090645678901', NULL, 'Lainnya', '4.25', '3.95', '3.80', '4.30', '4.00', '3.85', '4.20', '4.05', '3.90', 'Smart infrastructure development', 'belum'),
(241, NULL, '2027-11-10 11:45:00', 'Pandu Tri', 'L', 'CV. Construction Tech', '090709876543', NULL, 'Lainnya', '4.15', '4.10', '3.95', '4.20', '4.05', '4.15', '3.90', '3.95', '4.10', 'Construction technology efficient', 'belum'),
(242, NULL, '2027-11-17 14:10:00', 'Queency Loa', 'P', 'PT. Building Automation', '090767890123', NULL, 'Lainnya', '3.90', '4.20', '4.05', '3.85', '4.25', '4.00', '3.80', '4.15', '3.95', 'Building automation smart', 'belum'),
(243, NULL, '2027-12-01 10:35:00', 'Rendy Kurnia', 'L', 'UD. Sustainable Material', '090823456789', NULL, 'Lainnya', '4.30', '4.00', '3.85', '4.35', '4.05', '3.90', '4.25', '3.95', '4.00', 'Sustainable material eco-friendly', 'belum'),
(244, NULL, '2027-12-08 13:00:00', 'Sasha Putin', 'P', 'PT. Circular Economy', '090887654321', NULL, 'Lainnya', '3.95', '4.25', '3.95', '3.80', '4.20', '4.00', '3.85', '4.15', '4.05', 'Circular economy model baik', 'belum'),
(245, NULL, '2027-12-15 15:30:00', 'Tito Karnavian', 'L', 'CV. Waste Management', '090945678901', NULL, 'Lainnya', '3.80', '4.00', '4.25', '3.85', '3.95', '4.20', '3.90', '3.80', '4.15', 'Waste management system improved', 'belum'),
(246, NULL, '2027-12-22 11:00:00', 'Umi Permatasari', 'P', 'PT. Recycling Technology', '091009876543', NULL, 'Lainnya', '4.25', '3.95', '3.80', '4.30', '4.00', '3.85', '4.20', '4.05', '3.90', 'Recycling technology efficient', 'belum'),
(247, NULL, '2027-12-29 14:45:00', 'Vino Bastian', 'L', 'UD. Environmental Tech', '091067890123', NULL, 'Lainnya', '4.15', '4.10', '3.95', '4.20', '4.05', '4.15', '3.90', '3.95', '4.10', 'Environmental tech crucial', 'belum'),
(248, NULL, '2030-12-29 14:45:00', 'Vino Bastian', 'L', 'UD. Environmental Tech', '091067890123', NULL, 'Lainnya', '4.15', '4.10', '3.95', '4.20', '4.05', '4.15', '3.90', '3.95', '4.10', 'Environmental tech crucial', 'belum'),
(249, NULL, '2050-10-13 09:30:00', 'Nama Lengkap', 'L', 'PT. Contoh Perusahaan', '08123456789', NULL, 'Menemui Pejabat/Staf', '4.00', '3.50', '3.75', '4.00', '3.25', '3.75', '4.00', '3.50', '3.75', 'Pelayanan sangat memuaskan', 'belum'),
(250, NULL, '2025-01-10 08:30:00', 'Rizki Maulana', 'L', 'PT. Digital Solution', '081234567001', NULL, 'Menemui Pejabat/Staf', '4.20', '3.90', '3.85', '4.10', '3.75', '3.95', '4.15', '3.80', '4.05', 'Pelayanan sangat memuaskan dengan sistem digital', 'belum'),
(251, NULL, '2025-01-15 09:15:00', 'Sari Dewi Lestari', 'P', 'CV. Tech Innovation', '081234567002', NULL, 'Menemui Pejabat/Staf', '3.85', '4.15', '3.70', '3.90', '4.05', '3.80', '3.95', '4.10', '3.75', 'Prosedur semakin mudah dan cepat', 'belum'),
(252, NULL, '2025-01-20 10:20:00', 'Budi Santoso', 'L', 'UD. Modern Enterprise', '081234567003', NULL, 'Menemui Pejabat/Staf', '3.75', '3.85', '4.10', '3.80', '3.90', '4.15', '3.70', '3.95', '4.05', 'Petugas sangat informatif dan membantu', 'belum'),
(253, NULL, '2025-01-25 11:45:00', 'Maya Permatasari', 'P', 'PT. Future Technology', '081234567004', NULL, 'Menemui Pejabat/Staf', '4.15', '3.95', '3.80', '4.20', '3.85', '3.75', '4.10', '3.90', '3.95', 'Waktu tunggu lebih efisien', 'belum'),
(254, NULL, '2025-02-05 13:30:00', 'Rudi Setiawan', 'L', 'CV. Smart Business', '081234567005', NULL, 'Menemui Pejabat/Staf', '3.90', '4.10', '3.95', '3.85', '4.15', '3.80', '3.75', '4.05', '3.90', 'Fasilitas semakin nyaman dan modern', 'belum'),
(255, NULL, '2025-02-12 14:15:00', 'Dewi Kartini', 'P', 'PT. Innovation Hub', '081234567006', NULL, 'Menemui Pejabat/Staf', '4.05', '3.80', '4.15', '3.95', '3.75', '4.10', '3.90', '3.85', '4.00', 'Pelayanan cepat dan akurat', 'belum'),
(256, NULL, '2025-02-18 08:45:00', 'Joko Prasetyo', 'L', 'UD. Digital Market', '081234567007', NULL, 'Menemui Pejabat/Staf', '4.20', '3.95', '3.85', '4.15', '3.90', '3.80', '4.10', '3.75', '3.95', 'Sangat membantu pengusaha digital', 'belum'),
(257, NULL, '2025-02-25 10:30:00', 'Linda Hartati', 'P', 'PT. Creative Solution', '081234567008', NULL, 'Menemui Pejabat/Staf', '3.80', '4.15', '3.90', '3.75', '4.10', '3.85', '3.95', '4.05', '3.80', 'Informasi diberikan sangat detail dan jelas', 'belum'),
(258, NULL, '2025-03-05 11:20:00', 'Hendra Wijaya', 'L', 'CV. Global Network', '081234567009', NULL, 'Menemui Pejabat/Staf', '3.95', '3.85', '4.10', '3.90', '3.75', '4.15', '3.80', '3.95', '4.05', 'Pengaduan ditanggapi dengan serius dan cepat', 'belum'),
(259, NULL, '2025-03-12 13:45:00', 'Rina Saputri', 'P', 'PT. Visionary Tech', '081234567010', NULL, 'Menemui Pejabat/Staf', '4.10', '3.90', '3.80', '4.15', '3.95', '3.75', '4.05', '3.85', '3.90', 'Proses lebih efisien tahun ini', 'belum'),
(260, NULL, '2025-03-20 09:40:00', 'Ahmad Fauzan', 'L', 'PT. Renewable Energy', '081234567011', NULL, 'Rekomendasi Teknis (Rekomtek)', '4.25', '3.95', '3.85', '4.20', '3.90', '4.05', '3.80', '3.95', '4.10', 'Energi terbarukan semakin difasilitasi', 'belum'),
(261, NULL, '2025-03-25 11:25:00', 'Diana Permatasari', 'P', 'CV. Green Technology', '081234567012', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.95', '4.20', '3.90', '3.85', '4.15', '3.80', '3.75', '4.10', '3.95', 'Teknologi hijau didukung penuh', 'belum'),
(262, NULL, '2025-04-02 13:50:00', 'Fajar Ramadan', 'L', 'UD. Eco Solution', '081234567013', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.85', '3.95', '4.20', '3.90', '3.80', '4.15', '3.95', '3.85', '4.05', 'Solusi lingkungan semakin inovatif', 'belum'),
(263, NULL, '2025-04-10 15:15:00', 'Gita Andini', 'P', 'PT. Sustainable Future', '081234567014', NULL, 'Rekomendasi Teknis (Rekomtek)', '4.20', '3.85', '3.90', '4.25', '3.95', '3.80', '4.15', '3.90', '3.85', 'Masa depan berkelanjutan menjadi fokus', 'belum'),
(264, NULL, '2025-04-18 10:45:00', 'Irfan Maulana', 'L', 'CV. AI Development', '081234567015', NULL, 'Rekomendasi Teknis (Rekomtek)', '4.15', '3.95', '3.85', '4.10', '3.90', '4.05', '3.80', '3.95', '4.00', 'Kecerdasan artifisial semakin dikembangkan', 'belum'),
(265, NULL, '2025-04-25 14:20:00', 'Kartika Sari', 'P', 'PT. Machine Learning', '081234567016', NULL, 'Rekomendasi Teknis (Rekomtek)', '3.80', '4.10', '3.95', '3.85', '4.15', '3.90', '3.75', '4.05', '3.85', 'Machine learning aplikasinya luas', 'belum'),
(266, NULL, '2025-05-05 09:30:00', 'Lukman Hakim', 'L', 'UD. Data Analytics', '081234567017', NULL, 'Rekomendasi Teknis (Rekomtek)', '4.25', '3.90', '3.85', '4.20', '3.95', '3.80', '4.15', '3.90', '3.85', 'Analisis data sangat membantu bisnis', 'belum'),
(267, NULL, '2025-05-12 11:40:00', 'Nina Herlina', 'P', 'PT. Cloud Computing', '081234567018', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.95', '4.20', '3.85', '3.90', '4.15', '3.80', '3.75', '4.10', '3.95', 'Cloud computing semakin handal', 'belum'),
(268, NULL, '2025-05-20 13:25:00', 'Oki Setiawan', 'L', 'UD. Cyber Security', '081234567019', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.85', '3.95', '4.20', '3.90', '3.80', '4.15', '3.95', '3.85', '4.05', 'Keamanan siber semakin diperkuat', 'belum'),
(269, NULL, '2025-05-28 15:00:00', 'Putri Anggraini', 'P', 'PT. Digital Protection', '081234567020', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '4.20', '3.85', '3.90', '4.25', '3.95', '3.80', '4.15', '3.90', '3.85', 'Proteksi digital sangat penting', 'belum'),
(270, NULL, '2025-06-05 10:15:00', 'Rafi Ahmad', 'L', 'CV. Smart City', '081234567021', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '4.15', '3.95', '3.85', '4.10', '3.90', '4.05', '3.80', '3.95', '4.00', 'Smart city implementation bagus', 'belum'),
(271, NULL, '2025-06-15 14:35:00', 'Sari Utami', 'P', 'PT. IoT Solution', '081234567022', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '3.80', '4.10', '3.95', '3.85', '4.15', '3.90', '3.75', '4.05', '3.85', 'IoT semakin terintegrasi', 'belum'),
(272, NULL, '2025-06-25 11:20:00', 'Tono Wijaya', 'L', 'UD. Automation System', '081234567023', NULL, 'Kirim Surat (Promosi/Aduan/Temuan)', '4.25', '3.90', '3.85', '4.20', '3.95', '3.80', '4.15', '3.90', '3.85', 'Otomasi meningkatkan efisiensi', 'belum'),
(273, NULL, '2025-07-05 13:45:00', 'Umi Kulsum', 'P', 'PT. Robotics Indonesia', '081234567024', NULL, 'Permintaan Data/Informasi', '3.95', '4.20', '3.85', '3.90', '4.15', '3.80', '3.75', '4.10', '3.95', 'Robotik berkembang pesat', 'belum'),
(274, NULL, '2025-07-15 09:50:00', 'Vino Gustomo', 'L', 'CV. Drone Technology', '081234567025', NULL, 'Permintaan Data/Informasi', '3.85', '3.95', '4.20', '3.90', '3.80', '4.15', '3.95', '3.85', '4.05', 'Teknologi drone banyak aplikasinya', 'belum'),
(275, NULL, '2025-07-25 15:25:00', 'Wulan Sari', 'P', 'PT. Aerospace', '081234567026', NULL, 'Permintaan Data/Informasi', '4.20', '3.85', '3.90', '4.25', '3.95', '3.80', '4.15', '3.90', '3.85', 'Aerospace industry promising', 'belum'),
(276, NULL, '2025-08-05 10:40:00', 'Xavier Tan', 'L', 'UD. Satellite Communication', '081234567027', NULL, 'Permintaan Data/Informasi', '4.15', '3.95', '3.85', '4.10', '3.90', '4.05', '3.80', '3.95', '4.00', 'Komunikasi satelit semakin advance', 'belum'),
(277, NULL, '2025-08-15 14:15:00', 'Yuni Shara', 'P', 'PT. Space Technology', '081234567028', NULL, 'Permintaan Data/Informasi', '3.80', '4.10', '3.95', '3.85', '4.15', '3.90', '3.75', '4.05', '3.85', 'Teknologi luar angkasa masa depan', 'belum'),
(278, NULL, '2025-08-25 11:30:00', 'Zaki Ahmad', 'L', 'CV. Virtual Reality', '081234567029', NULL, 'Permintaan Data/Informasi', '4.25', '3.90', '3.85', '4.20', '3.95', '3.80', '4.15', '3.90', '3.85', 'VR experience semakin immersive', 'belum'),
(279, NULL, '2025-09-05 13:50:00', 'Aisyah Rahman', 'P', 'PT. Metaverse Development', '081234567030', NULL, 'Permintaan Data/Informasi', '3.95', '4.20', '3.85', '3.90', '4.15', '3.80', '3.75', '4.10', '3.95', 'Metaverse ecosystem berkembang', 'belum'),
(280, NULL, '2025-09-15 09:55:00', 'Bambang Surya', 'L', 'UD. Blockchain Solution', '081234567031', NULL, 'Permintaan Data/Informasi', '3.85', '3.95', '4.20', '3.90', '3.80', '4.15', '3.95', '3.85', '4.05', 'Blockchain adoption meningkat', 'belum'),
(281, NULL, '2025-09-25 15:20:00', 'Citra Lestari', 'P', 'PT. Cryptocurrency', '081234567032', NULL, 'Permintaan Data/Informasi', '4.20', '3.85', '3.90', '4.25', '3.95', '3.80', '4.15', '3.90', '3.85', 'Crypto regulation semakin jelas', 'belum'),
(282, NULL, '2025-10-05 11:45:00', 'Doni Prasetyo', 'L', 'CV. NFT Platform', '081234567033', NULL, 'Lainnya', '4.15', '3.95', '3.85', '4.10', '3.90', '4.05', '3.80', '3.95', '4.00', 'NFT market semakin berkembang', 'belum'),
(283, NULL, '2025-10-15 14:10:00', 'Elisa Wijaya', 'P', 'PT. DeFi Application', '081234567034', NULL, 'Lainnya', '3.80', '4.10', '3.95', '3.85', '4.15', '3.90', '3.75', '4.05', '3.85', 'DeFi transformative untuk finansial', 'belum'),
(284, NULL, '2025-10-25 10:35:00', 'Fajar Siddik', 'L', 'UD. Web3 Development', '081234567035', NULL, 'Lainnya', '4.25', '3.90', '3.85', '4.20', '3.95', '3.80', '4.15', '3.90', '3.85', 'Web3 masa depan internet', 'belum'),
(285, NULL, '2025-11-05 15:45:00', 'Gita Gutawa', 'P', 'PT. DAO Organization', '081234567036', NULL, 'Lainnya', '3.95', '4.20', '3.85', '3.90', '4.15', '3.80', '3.75', '4.10', '3.95', 'DAO organizational structure inovatif', 'belum'),
(286, NULL, '2025-11-15 10:20:00', 'Hadi Susilo', 'L', 'CV. Smart Contract', '081234567037', NULL, 'Lainnya', '3.85', '3.95', '4.20', '3.90', '3.80', '4.15', '3.95', '3.85', '4.05', 'Smart contract automation efficient', 'belum'),
(287, NULL, '2025-11-25 13:30:00', 'Intan Permata', 'P', 'PT. Digital Identity', '081234567038', NULL, 'Lainnya', '4.20', '3.85', '3.90', '4.25', '3.95', '3.80', '4.15', '3.90', '3.85', 'Digital identity security penting', 'belum'),
(288, NULL, '2025-12-05 08:30:00', 'Joni Kurniawan', 'L', 'PT. Quantum Computing', '081234567039', NULL, 'Lainnya', '4.30', '4.00', '3.95', '4.25', '4.05', '4.15', '3.90', '3.95', '4.10', 'Quantum computing revolutionary', 'belum'),
(289, NULL, '2025-12-15 09:15:00', 'Kartini Sari', 'P', 'CV. Biotech Innovation', '081234567040', NULL, 'Lainnya', '3.95', '4.25', '3.85', '3.90', '4.20', '4.10', '3.80', '3.95', '4.15', 'Bioteknologi masa depan kesehatan', 'belum'),
(290, NULL, '2025-12-25 10:20:00', 'Lukman Nur', 'L', 'UD. Genetic Engineering', '081234567041', NULL, 'Lainnya', '3.85', '3.95', '4.20', '3.90', '3.80', '4.15', '3.95', '3.85', '4.05', 'Genetic engineering ethical consideration', 'belum'),
(291, NULL, '0000-00-00 00:00:00', 'bebek', 'P', '', '089', NULL, 'Menemui Pejabat/Staff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum'),
(292, '1234', '2025-10-24 06:25:08', 'bebek', 'L', '', '089', 'sapijerman@gmail.com', 'lainnya', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', NULL, 'belum'),
(293, '1234', '2025-10-24 06:26:18', 'bebek', 'L', '', '089', 'sapijerman@gmail.com', 'lainnya', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', NULL, 'belum'),
(294, '1234', '2025-10-24 06:26:35', 'bebek', 'L', 'pemerintah', '089', 'sapijerman@gmail.com', 'lainnya', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', NULL, 'belum'),
(295, '1234', '0000-00-00 00:00:00', 'bebek', 'L', 'pemerintah', '089', 'sapijerman@gmail.com', 'hehe', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', NULL, 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `jenis_laporan` enum('PPID','Kompu','SKM') NOT NULL,
  `periode` enum('Triwulan','Semester','Tahunan') NOT NULL,
  `tanggal` date NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `bukti_file` varchar(255) DEFAULT NULL,
  `urutan` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `jenis_laporan`, `periode`, `tanggal`, `nama_file`, `bukti_file`, `urutan`) VALUES
(3, 'Kompu', 'Triwulan', '2025-02-10', 'Laporan Kompu Triwulan 1', 'https://example.com/kompu1.pdf', 3),
(4, '', 'Tahunan', '2025-12-30', 'Laporan Survei Tahunan', 'https://example.com/survei1.pdf', 4),
(5, 'Kompu', 'Semester', '2025-07-15', 'Laporan Kompu Semester 1', 'https://example.com/kompu2.pdf', 5),
(7, 'PPID', 'Triwulan', '2025-09-23', 'rahasia', 'ajjdg', 0),
(9, 'Kompu', '', '2025-03-31', 'laporan_kompu_q1.pdf', 'bukti_q1.jpg', 0),
(10, 'Kompu', '', '2025-06-30', 'laporan_kompu_q2.pdf', 'bukti_q2.jpg', 0),
(11, 'Kompu', '', '2025-09-30', 'laporan_kompu_q3.pdf', 'bukti_q3.jpg', 0),
(12, 'Kompu', '', '2024-12-31', 'laporan_kompu_q4.pdf', 'bukti_q4.jpg', 0),
(14, 'Kompu', '', '2025-03-31', 'laporan_kompu_q1.pdf', 'bukti_q1.jpg', 0),
(15, 'Kompu', '', '2025-06-30', 'laporan_kompu_q2.pdf', 'bukti_q2.jpg', 0),
(16, 'Kompu', '', '2025-09-30', 'laporan_kompu_q3.pdf', 'bukti_q3.jpg', 0),
(17, 'Kompu', '', '2024-12-31', 'laporan_kompu_q4.pdf', 'bukti_q4.jpg', 0),
(18, 'Kompu', '', '2024-12-31', 'laporan_kompu_tahunan.pdf', 'bukti_tahunan.jpg', 0),
(19, 'Kompu', '', '2025-01-10', 'laporan_kompu1.pdf', 'bukti_kompu1.pdf', 0),
(22, 'Kompu', '', '2024-03-05', 'laporan_kompu4.pdf', 'bukti_kompu4.pdf', 0),
(23, 'Kompu', '', '2023-09-12', 'laporan_kompu5.pdf', 'bukti_kompu5.pdf', 0),
(24, 'PPID', '', '2024-01-15', 'Laporan Informasi Publik Januari', 'uploads/ppid_jan2024.pdf', 0),
(25, 'PPID', '', '2024-02-18', 'Laporan Informasi Publik Februari', 'uploads/ppid_feb2024.pdf', 0),
(26, 'PPID', '', '2024-03-20', 'Laporan Informasi Publik Maret', 'uploads/ppid_mar2024.pdf', 0),
(27, 'PPID', '', '2024-04-22', 'Laporan Informasi Publik April', 'uploads/ppid_apr2024.pdf', 0),
(29, '', '', '2025-03-31', 'Laporan_SKM_Q1.pdf', 'bukti_skm_q1.pdf', 0),
(30, '', '', '2025-06-30', 'Laporan_SKM_Q2.pdf', 'bukti_skm_q2.pdf', 0),
(31, '', '', '2025-09-30', 'Laporan_SKM_Q3.pdf', 'bukti_skm_q3.pdf', 0),
(32, '', '', '2025-12-31', 'Laporan_SKM_Q4.pdf', 'bukti_skm_q4.pdf', 0),
(33, '', '', '2025-12-31', 'Laporan_SKM_Tahunan.pdf', 'bukti_skm_tahunan.pdf', 0),
(34, '', '', '2025-03-31', 'Laporan_SKM_Q1.pdf', 'bukti_skm_q1.pdf', 0),
(35, '', '', '2025-03-31', 'Laporan_SKM_Q1.pdf', 'bukti_skm_q1.pdf', 0),
(36, '', '', '2025-06-30', 'Laporan_SKM_Q2.pdf', 'bukti_skm_q2.pdf', 0),
(37, '', '', '2025-01-10', 'laporan_skm1.pdf', 'bukti_skm1.pdf', 0),
(38, '', '', '2025-02-15', 'laporan_skm2.pdf', 'bukti_skm2.pdf', 0),
(39, '', '', '2024-08-20', 'laporan_skm3.pdf', 'bukti_skm3.pdf', 0),
(40, '', '', '2024-03-05', 'laporan_skm4.pdf', 'bukti_skm4.pdf', 0),
(41, '', '', '2023-09-12', 'laporan_skm5.pdf', 'bukti_skm5.pdf', 0),
(42, 'PPID', 'Triwulan', '2025-01-10', 'laporan_skm1.pdf', 'bukti_skm1.pdf', 0),
(43, 'SKM', '', '2025-02-15', 'laporan_skm2.pdf', 'bukti_skm2.pdf', 0),
(44, 'SKM', '', '2024-08-20', 'laporan_skm3.pdf', 'bukti_skm3.pdf', 0),
(45, 'Kompu', 'Triwulan', '2024-03-05', 'laporan_skm4.pdf', 'bukti_skm4.pdf', 0),
(47, 'Kompu', 'Triwulan', '2025-09-17', 'ggh', 'jkh', 0),
(48, 'SKM', 'Semester', '2025-09-24', 'hjkjk', 'hgg', 0),
(49, 'Kompu', 'Triwulan', '2025-09-11', 'kklllk', 'vv', 0),
(50, 'PPID', 'Semester', '2025-09-23', 'fsfs', 'sfs', 0),
(51, 'PPID', 'Triwulan', '2025-09-23', 'example', 'https://docs.google.com/document/d/1jzsOmu9z7ABrtZJuR3nio2PI3wuMsSOR68nEf5uoMDs/edit?usp=sharing', 0),
(52, 'PPID', 'Triwulan', '2025-10-03', 'coba 1', 'SILABUS_MAGANG.pdf', 0),
(53, 'Kompu', 'Semester', '2025-10-15', 'coba 2', 'dummy_laporan2.pdf', 0),
(54, 'SKM', 'Tahunan', '2025-10-08', 'coba 3', 'dummy_laporan3.pdf', 0),
(55, 'PPID', 'Triwulan', '2025-10-07', 'Rahasiaa', 'dummy_laporan4.pdf', 0),
(56, 'Kompu', 'Tahunan', '2025-10-31', 'ihhii', 'SILABUS_MAGANG_(1).pdf', 0),
(57, 'PPID', 'Triwulan', '2025-10-20', 'wihh', 'SILABUS_MAGANG1.pdf', 0),
(58, 'PPID', 'Triwulan', '2025-10-15', 'coba 3', NULL, 0),
(59, 'PPID', 'Semester', '2025-10-18', 'coba 4', 'dummy_laporan.pdf', 0),
(60, 'SKM', 'Triwulan', '2025-10-15', 'wee', '1760063068_dummy_laporan.pdf', 0),
(61, 'PPID', 'Triwulan', '2025-10-11', 'finish', 'SILABUS_MAGANG.pdf', 0),
(62, 'Kompu', 'Triwulan', '2025-10-15', 'coba 2', 'dummy_laporan_1760064630.pdf', 0),
(63, 'Kompu', 'Semester', '2025-10-11', 'uhuuii', 'dummy_laporan_1760065105.pdf', 0),
(64, 'SKM', 'Triwulan', '2025-10-08', 'gaga', NULL, 0),
(65, 'Kompu', 'Semester', '2025-10-11', 'wewew', 'dummy_laporan_1760065348.pdf', 0),
(66, 'PPID', 'Semester', '2025-10-15', 'reere', 'dummy_laporan_1760065416.pdf', 0),
(67, 'SKM', 'Triwulan', '2025-10-14', 'rahasia', 'SILABUS_MAGANG_(1).pdf', 0),
(68, 'SKM', 'Triwulan', '2026-10-21', 'laporan triwulan II', 'SILABUS_MAGANG1.pdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `layanan_informasi`
--

CREATE TABLE `layanan_informasi` (
  `no` int(11) NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `uraian` text NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_like` int(10) NOT NULL DEFAULT 0,
  `jumlah_komentar` int(10) NOT NULL DEFAULT 0,
  `keterangan` varchar(255) DEFAULT NULL,
  `bukti_tautan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `layanan_informasi`
--

INSERT INTO `layanan_informasi` (`no`, `kegiatan`, `lokasi`, `uraian`, `tanggal`, `jumlah_like`, `jumlah_komentar`, `keterangan`, `bukti_tautan`) VALUES
(1, 'Sosialisasi PPID', 'Balai Desa A', 'Kegiatan sosialisasi keterbukaan informasi publik.', '2025-09-01', 10, 7, 'Berjalan lancar', 'http://link1.com'),
(2, 'Pelatihan IT', 'UPN Jatim', 'Pelatihan sistem informasi desa.', '2025-09-02', 20, 8, 'Peserta antusias', 'http://link2.com'),
(3, 'Rapat Koordinasi', 'Kantor Bupati', 'Rakor bulanan PPID.', '2025-09-03', 15, 3, 'Hasil rapat didokumentasi', 'http://link3.com'),
(4, 'Monitoring Layanan', 'Dinas Kominfo', 'Monitoring keterbukaan layanan publik.', '2025-09-04', 12, 6, 'Catatan evaluasi', 'http://link4.com'),
(5, 'Workshop Data', 'Hotel X', 'Workshop pengelolaan data.', '2025-09-05', 25, 9, 'Peserta 50 orang', 'http://link5.com'),
(6, 'Pameran Inovasi', 'Mall Y', 'Stand PPID ikut serta.', '2025-09-06', 18, 7, 'Banyak pengunjung', 'http://link6.com'),
(7, 'Kunjungan Lapangan', 'Kelurahan B', 'Kunjungan monitoring layanan publik.', '2025-09-07', 14, 4, 'Butuh tindak lanjut', 'http://link7.com'),
(8, 'Diskusi Publik', 'Aula Kecamatan', 'Diskusi mengenai hak informasi.', '2025-09-08', 30, 10, 'Diskusi hangat', 'http://link8.com'),
(9, 'Pelayanan Mobile', 'Lapangan Desa C', 'Layanan jemput bola.', '2025-09-09', 22, 6, 'Masyarakat terbantu', 'http://link9.com'),
(10, 'Evaluasi Tahunan', 'Kantor PPID', 'Evaluasi akhir tahun.', '2025-09-10', 28, 12, 'Capaian meningkat', 'http://link10.com');

-- --------------------------------------------------------

--
-- Table structure for table `layanan_pengaduan`
--

CREATE TABLE `layanan_pengaduan` (
  `no` int(11) NOT NULL,
  `via` varchar(100) NOT NULL,
  `status_pengirim` varchar(25) DEFAULT NULL,
  `jenis` varchar(100) NOT NULL,
  `pengirim` varchar(150) NOT NULL,
  `tanggal` date NOT NULL,
  `nomor_surat` varchar(100) DEFAULT NULL,
  `perihal` varchar(255) NOT NULL,
  `diterima_ppid` date NOT NULL,
  `tindaklanjut` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `sumber` varchar(100) DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `layanan_pengaduan`
--

INSERT INTO `layanan_pengaduan` (`no`, `via`, `status_pengirim`, `jenis`, `pengirim`, `tanggal`, `nomor_surat`, `perihal`, `diterima_ppid`, `tindaklanjut`, `keterangan`, `sumber`, `status`) VALUES
(1, 'Email', NULL, 'Permintaan Informasi', 'Budi Santoso', '2025-09-01', '001/INF/2025', 'Permintaan dokumen anggaran', '2025-09-02', 'Diteruskan ke bagian Keuangan', 'Menunggu jawaban', 'Masyarakat', 'proses'),
(2, 'Website', NULL, 'Pengaduan', 'Siti Aminah', '2025-09-02', '002/PENG/2025', 'Layanan internet desa bermasalah', '2025-09-03', 'Diteruskan ke Dinas Kominfo', 'Sedang ditindaklanjuti', 'Warga Desa A', 'proses'),
(3, 'Surat', NULL, 'Permintaan Data', 'PT. Sejahtera', '2025-09-03', '003/DATA/2025', 'Data jumlah UMKM 2024', '2025-09-04', 'Disiapkan oleh Bidang Ekonomi', 'Dalam proses', 'Perusahaan', 'proses'),
(4, 'Email', NULL, 'Pengaduan', 'Agus Salim', '2025-09-04', '004/PENG/2025', 'Keluhan pelayanan publik', '2025-09-05', 'Diteruskan ke Bagian Layanan Publik', 'Menunggu tindak lanjut', 'Masyarakat', 'proses'),
(5, 'WhatsApp', NULL, 'Permintaan Informasi', 'Lina Kurnia', '2025-09-05', '005/INF/2025', 'Info jadwal pelayanan PPID', '2025-09-05', 'Dijawab langsung', 'Selesai', 'Individu', 'selesai'),
(6, 'Website', NULL, 'Pengaduan', 'Karang Taruna', '2025-09-06', '006/PENG/2025', 'Lampu jalan mati di RT 05', '2025-09-07', 'Diserahkan ke Dinas Perhubungan', 'Dalam perbaikan', 'Organisasi', 'proses'),
(7, 'Surat', NULL, 'Permintaan Data', 'Universitas X', '2025-09-07', '007/DATA/2025', 'Data kependudukan untuk penelitian', '2025-09-08', 'Diteruskan ke Disdukcapil', 'Proses validasi data', 'Akademisi', 'proses'),
(8, 'Email', NULL, 'Pengaduan', 'Rudi Hartono', '2025-09-08', '008/PENG/2025', 'Kebocoran pipa air di jalan utama', '2025-09-09', 'Diteruskan ke PDAM', 'Proses perbaikan', 'Masyarakat', 'proses'),
(9, 'WhatsApp', NULL, 'Permintaan Informasi', 'Fitri Ananda', '2025-09-09', '009/INF/2025', 'Info mekanisme keterbukaan informasi', '2025-09-09', 'Diberikan langsung', 'Selesai', 'Individu', 'selesai'),
(10, 'Website', NULL, 'Pengaduan', 'Yayasan Harapan', '2025-09-10', '010/PENG/2025', 'Kualitas layanan publik rendah', '2025-09-11', 'Diteruskan ke pimpinan daerah', 'Sedang dalam evaluasi', 'LSM', 'proses'),
(11, 'Surat', 'Mahasiswa (Instansi)', 'Pelanggaran SDA', 'Ayu Wardani (ITATS)', '2025-10-07', '3135 / HM ;69/DTS/PSTS/ITATS/XII/2024', 'Permintaan Data', '2025-10-15', 'kggj', 'yfulf', 'jkgj', 'Ditolak'),
(12, 'Email', 'Media', 'Pelanggaran SDA', 'Ayu Wardani (ITATS)', '2025-10-07', '3135 / HM ;69/DTS/PSTS/ITATS/XII/2024', 'Permintaan Data', '2025-10-15', 'kgujk', 'cgjk', 'jkgj', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `layanan_permintaan_data`
--

CREATE TABLE `layanan_permintaan_data` (
  `nomor` int(11) NOT NULL,
  `via` varchar(100) NOT NULL,
  `status_pemohon` varchar(50) NOT NULL,
  `pengirim` varchar(150) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `diterima_ppid` date NOT NULL,
  `link_bukti_surat` varchar(255) DEFAULT NULL,
  `tindak_lanjut` text DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `link_bukti_surat_penyelesaian` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `layanan_permintaan_data`
--

INSERT INTO `layanan_permintaan_data` (`nomor`, `via`, `status_pemohon`, `pengirim`, `tanggal_surat`, `nomor_surat`, `perihal`, `diterima_ppid`, `link_bukti_surat`, `tindak_lanjut`, `status`, `link_bukti_surat_penyelesaian`) VALUES
(1, 'Email', 'Permintaan Data', 'Budi Santoso', '2025-09-01', '001/DATA/2025', 'Permintaan data APBD 2024', '2025-09-02', 'http://bukti.com/surat1.pdf', 'Diteruskan ke Bagian Keuangan', 'Dalam Proses', ''),
(2, 'Surat', 'Permintaan Informasi', 'PT. Maju Jaya', '2025-09-02', '002/INF/2025', 'Informasi regulasi keterbukaan data', '2025-09-03', 'http://bukti.com/surat2.pdf', 'Diproses Bidang Hukum', 'proses', NULL),
(3, 'Website', 'Permintaan Data', 'Universitas A', '2025-09-03', '003/DATA/2025', 'Data kependudukan untuk riset', '2025-09-04', 'http://bukti.com/surat3.pdf', 'Diteruskan ke Disdukcapil', 'proses', NULL),
(4, 'Email', 'Permintaan Informasi', 'Siti Aminah', '2025-09-04', '004/INF/2025', 'Jadwal pelayanan PPID', '2025-09-05', 'http://bukti.com/surat4.pdf', 'Dijawab langsung via email', 'selesai', 'http://bukti.com/penyelesaian4.pdf'),
(5, 'WhatsApp', 'Permintaan Data', 'Karang Taruna', '2025-09-05', '005/DATA/2025', 'Data kegiatan pemuda 2023', '2025-09-06', 'http://bukti.com/surat5.pdf', 'Diteruskan ke Dinas Pemuda', 'proses', NULL),
(6, 'Surat', 'Permintaan Informasi', 'Yayasan Peduli', '2025-09-06', '006/INF/2025', 'Mekanisme pelayanan publik', '2025-09-07', 'http://bukti.com/surat6.pdf', 'Diteruskan ke Sekretariat Daerah', 'proses', NULL),
(7, 'Website', 'Permintaan Data', 'Lembaga X', '2025-09-07', '007/DATA/2025', 'Jumlah desa penerima bantuan', '2025-09-08', 'http://bukti.com/surat7.pdf', 'Disiapkan Bagian Sosial', 'proses', NULL),
(8, 'Email', 'Permintaan Data', 'Rudi Hartono', '2025-09-08', '008/DATA/2025', 'Data penggunaan dana desa', '2025-09-09', 'http://bukti.com/surat8.pdf', 'Diteruskan ke Inspektorat', 'proses', NULL),
(9, 'Surat', 'Permintaan Informasi', 'Fitri Ananda', '2025-09-09', '009/INF/2025', 'Prosedur keterbukaan informasi', '2025-09-10', 'http://bukti.com/surat9.pdf', 'Dijawab langsung dengan surat resmi', 'selesai', 'http://bukti.com/penyelesaian9.pdf'),
(10, 'Website', 'Permintaan Data', 'LSM Harapan', '2025-09-10', '010/DATA/2025', 'Data proyek pembangunan jalan', '2025-09-11', 'http://bukti.com/surat10.pdf', 'Diteruskan ke Dinas PU', 'proses', NULL),
(11, 'Email', 'Media', 'frf', '2025-10-07', 'vfv', 'fvv', '2025-10-14', 'dfgdfg', 'vfv', 'Telah Diterima', 'cs'),
(12, 'TNDE', 'Mahasiswa (Instansi)', 'jg', '2025-10-15', '3135 / HM ;69/DTS/PSTS/ITATS/XII/2024', 'Kerusakan jembatan di daerah A', '2025-10-10', 'csd', 'sfgs', 'Ditolak', 'f'),
(13, 'Email', 'Mahasiswa (Instansi)', 'jg', '2025-10-15', '3135 / HM ;69/DTS/PSTS/ITATS/XII/2024', 'Kerusakan jembatan di daerah A', '2025-10-10', 'csd', 'sfgs', 'Dalam Proses', 'f'),
(14, 'Instagram', 'Media', 'jg', '2025-10-15', '3135 / HM ;69/DTS/PSTS/ITATS/XII/2024', 'Kerusakan jembatan di daerah A', '2025-10-10', 'csd', 'sfgs', 'Terpenuhi', 'f'),
(15, 'Instagram', 'Mahasiswa (Instansi)', 'jg', '2025-10-18', '3135 / HM ;69/DTS/PSTS/ITATS/XII/2024', 'Kerusakan jembatan di daerah A', '2025-10-30', 'csd', 'sfgs', 'Terpenuhi', 'f');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `role` enum('admin','operator') NOT NULL DEFAULT 'operator',
  `last_login` datetime DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `nama_lengkap`, `role`, `last_login`, `is_active`) VALUES
(1, 'operator1', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Operator Satu', 'operator', NULL, 1),
(2, 'operator2', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Operator Dua', 'operator', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `aduan`
--
ALTER TABLE `aduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku_tamu_backup`
--
ALTER TABLE `buku_tamu_backup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_timestamp` (`timestamp`),
  ADD KEY `idx_jenis_kelamin` (`jenis_kelamin`),
  ADD KEY `idx_nik` (`nik`),
  ADD KEY `idx_email` (`email`),
  ADD KEY `idx_status_survei` (`status_survei`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanan_informasi`
--
ALTER TABLE `layanan_informasi`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `layanan_pengaduan`
--
ALTER TABLE `layanan_pengaduan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `layanan_permintaan_data`
--
ALTER TABLE `layanan_permintaan_data`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aduan`
--
ALTER TABLE `aduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `buku_tamu_backup`
--
ALTER TABLE `buku_tamu_backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `layanan_informasi`
--
ALTER TABLE `layanan_informasi`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `layanan_pengaduan`
--
ALTER TABLE `layanan_pengaduan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `layanan_permintaan_data`
--
ALTER TABLE `layanan_permintaan_data`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
