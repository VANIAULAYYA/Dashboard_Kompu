-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2025 at 04:24 AM
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
(1, 'admin', '$2y$10$kXvqe/lRc0r/dl8QIp65luq/O4C3fZJ1NhQxdAu3PMkAQoVQq51ZO', 'Administrator', '2025-09-23 03:03:16');

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
  `pendapat_kualitas` int(11) NOT NULL,
  `pendapat_pengaduan` int(11) NOT NULL,
  `kritik_saran` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku_tamu`
--

INSERT INTO `buku_tamu` (`id`, `timestamp`, `nama`, `jenis_kelamin`, `asal_instansi`, `no_handphone`, `keperluan`, `pendapat_pelayanan`, `pemahaman_prosedur`, `pendapat_kecepatan`, `pendapat_biaya`, `pendapat_produk`, `pendapat_kompetensi`, `pendapat_perilaku`, `pendapat_kualitas`, `pendapat_pengaduan`, `kritik_saran`) VALUES
(4, '0000-00-00 00:00:00', 'Fathi Khayran Azhari', 'L', 'SMK 3 Negeri Surabaya', '88989120066', 'Magang', 3, 4, 3, 3, 3, 3, 3, 3, 3, ''),
(5, '0000-00-00 00:00:00', 'Arya Putra Maulana Feriyono', 'L', 'SMKN 3 SURABAYA', '89518344888', 'Magang', 4, 3, 3, 3, 3, 3, 4, 3, 3, ''),
(6, '0000-00-00 00:00:00', 'NABILAH ANJALI', 'P', 'AVERROES', '8155632725', 'Permintaan Data/Informasi', 4, 4, 4, 4, 4, 4, 4, 3, 4, 'Pelayanan sangat memuaskan dan membantu'),
(7, '0000-00-00 00:00:00', 'galuh', 'P', 'westin hotel', '8121737205', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(8, '0000-00-00 00:00:00', 'Anastasia', 'P', 'PT Samator Indi Gas Tbk.', '(031) 99203888', 'Menemui Pejabat/Staf', 4, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(9, '0000-00-00 00:00:00', 'dara', 'P', 'hotel morazen', '81334893938', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(10, '0000-00-00 00:00:00', 'murtriatna', 'L', 'monumen kapal selam', '81333364331', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(11, '0000-00-00 00:00:00', 'Intan sminesa', 'P', 'UPNVJT', '81233587622', 'Permintaan Data/Informasi', 4, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(12, '0000-00-00 00:00:00', 'totok', 'L', 'prorangan', '89664876688', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(13, '0000-00-00 00:00:00', 'agus', 'L', 'perorangan', '81357253470', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(14, '0000-00-00 00:00:00', 'rosa', 'P', 'BSI', '82225358265', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(15, '0000-00-00 00:00:00', 'irene', 'P', 'hotel', '81216811922', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(16, '0000-00-00 00:00:00', 'Erwin Tri Yunanto', 'L', 'CIMB Niaga Syariah', '81703217285', 'Menemui Pejabat/Staf', 3, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(17, '0000-00-00 00:00:00', 'yuni mulyana', 'P', 'perorangan', '81252026969', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(18, '0000-00-00 00:00:00', 'devi alexander', 'L', 'PT ESGN', '82134384326', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(19, '0000-00-00 00:00:00', 'ANGGITHA MEGA SAVITRI', 'P', 'BANK MUAMALAT', '81230669998', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(20, '0000-00-00 00:00:00', 'A RIZAL MAFA', 'L', 'MAKMUR SEJAHTERA', '82142640011', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(21, '0000-00-00 00:00:00', 'ALISA ADZANI ZATADINI', 'P', 'SUCOFINDO', '83845116351', 'Permintaan Data/Informasi', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(22, '0000-00-00 00:00:00', 'AMBAR', 'P', 'CV harmoni sinar kasih', '81259854847', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(23, '0000-00-00 00:00:00', 'kurniawan eko', 'L', 'sarana buana', '8562712291', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(24, '0000-00-00 00:00:00', 'fauzi', 'L', 'tenaga ahli fraksi golkar', '82228225005', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(25, '0000-00-00 00:00:00', 'abdurrahman', 'L', 'tenaga ahli fraksi golkar dapil jatim 1', '85706860300', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(26, '0000-00-00 00:00:00', 'arif rahmat hidayat', 'L', 'perorangan', '81252997303', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(27, '0000-00-00 00:00:00', 'ryan setiandra alfarizi', 'L', 'universitas negeri malang', '85895966729', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(28, '0000-00-00 00:00:00', 'Dodik arvianto', 'L', 'Pt inti data telematika', '85850770482', 'Cek internet', 4, 4, 4, 4, 4, 4, 4, 4, 4, 'Keren pertahankan'),
(29, '0000-00-00 00:00:00', 'Muhammad Daffa Zakky Eka Pradana', 'L', 'PT INTI DATA TELEMATIKA', '85108779998', 'Cek Jaringan Internet', 4, 4, 4, 4, 4, 4, 4, 4, 4, 'tidak ada'),
(30, '0000-00-00 00:00:00', 'Ahmad Naufal Khuzaini', 'L', 'PT Inti Data Telematika', '81233757736', 'Cek jaringan internet', 4, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(31, '0000-00-00 00:00:00', 'reza', 'L', 'Pt intidata', '85709175489', 'maintenance jaringan', 4, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(32, '0000-00-00 00:00:00', 'muhyi', 'L', 'perorangan', '81336442482', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 1, 3, 3, 3, 3, 1, 3, ''),
(33, '0000-00-00 00:00:00', 'AGUS GIYANTO', 'L', 'NOTARIS', '82234860032', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(34, '0000-00-00 00:00:00', 'susanto budiono', 'L', 'reknana', '82231739222', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(35, '0000-00-00 00:00:00', 'agus', 'L', 'PT FATIMAH INDAH UTAMA', '8534384708', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(36, '0000-00-00 00:00:00', 'ZAINUL HASAN', 'L', 'RUMAH SAKIT SUKMA WIJAYA', '82330931728', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(37, '0000-00-00 00:00:00', 'INDAH NAZULFA', 'P', 'PT HOGI0NO PROSPEK', '81331679899', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 1, 3, 3, 3, 3, 1, 3, ''),
(38, '0000-00-00 00:00:00', 'BAGUS', 'L', 'PEMKOT KOTA SURABAYA', '81295708255', 'Menemui Pejabat/Staf', 3, 1, 1, 3, 3, 3, 3, 1, 1, ''),
(39, '0000-00-00 00:00:00', 'ALDO', 'L', 'PT BHAKTI TAMARA', '81222678867', 'Rekomendasi Teknis (Rekomtek)', 3, 1, 1, 3, 3, 3, 3, 1, 3, ''),
(40, '0000-00-00 00:00:00', 'Riad', 'L', 'Bsi lidah wetan', '8563030875', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(41, '0000-00-00 00:00:00', 'mohammad arif wiyono', 'L', 'universitas hang tuah', '81235169045', 'Permintaan Data/Informasi', 3, 3, 1, 3, 1, 3, 3, 1, 3, ''),
(42, '0000-00-00 00:00:00', 'ferry', 'L', 'perorangan', '82257674881', 'Rekomendasi Teknis (Rekomtek)', 3, 1, 1, 3, 1, 3, 3, 1, 3, ''),
(43, '0000-00-00 00:00:00', 'andhiko edo kristianto', 'L', 'PT GLOBAL', '82234334269', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(44, '0000-00-00 00:00:00', 'ADHIATMA', 'L', 'PT YAMAMORY INDONESIA', '81359072375', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 1, 3, 3, 3, 3, 1, 3, ''),
(45, '0000-00-00 00:00:00', 'YUDA', 'L', 'PT TIRTA SUKSES', '81354772681', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 1, 3, 3, 3, 3, 3, 3, ''),
(46, '0000-00-00 00:00:00', 'FIFIN', 'P', 'Konsultan', '82230580686', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(47, '0000-00-00 00:00:00', 'haji basuni', 'L', 'kelurahan / pak RT', '81249567287', 'Rekomendasi Teknis (Rekomtek)', 4, 3, 1, 3, 3, 3, 3, 1, 3, ''),
(48, '0000-00-00 00:00:00', 'HADI SUSANTO', 'L', 'LP3 NKRI', '81556646353', 'Menemui Pejabat/Staf', 3, 1, 1, 3, 1, 3, 3, 1, 3, ''),
(49, '0000-00-00 00:00:00', 'Robianto', 'L', 'BIZNET', '81232059783', 'Menemui Pejabat/Staf', 4, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(50, '0000-00-00 00:00:00', 'Aditya Putra R', 'L', 'Samator', '85736866507', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, 'Baik'),
(51, '0000-00-00 00:00:00', 'Ihdhar Naufal', 'L', 'Universitas Negeri Malang', '81334361585', 'Kirim Surat (Promosi/Aduan/Temuan)', 4, 4, 4, 4, 4, 3, 4, 4, 4, 'Bagus'),
(52, '0000-00-00 00:00:00', 'AGENG', 'L', 'PT. BERKAT CANDRA', '81357565857', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(53, '0000-00-00 00:00:00', 'bagus', 'L', 'pemdes bleduk kediri', '82211392929', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(54, '0000-00-00 00:00:00', 'zainal', 'L', 'perorangan', '81357847816', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 1, 3, 3, 3, 3, 1, 3, ''),
(55, '0000-00-00 00:00:00', 'suwandi', 'L', 'cv anugerah nusantra', '81703088772', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(56, '0000-00-00 00:00:00', 'Arief Fajar Prasetya', 'L', 'PT. Parmifa Mekadaya', '82140794472', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(57, '0000-00-00 00:00:00', 'andri', 'L', 'perorangan', '81230942669', 'Rekomendasi Teknis (Rekomtek)', 3, 1, 1, 3, 3, 3, 3, 1, 3, ''),
(58, '0000-00-00 00:00:00', 'mohammad yasin', 'L', 'kecamatan tanggul angin sidoarjo', '81373133535', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(59, '0000-00-00 00:00:00', 'purwo bujono', 'L', 'dpm ptsp', '82113653411', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(60, '0000-00-00 00:00:00', 'ALFINA', 'P', 'UNIVERSITAS BRAWIJAYA', '8.95E+11', 'Permintaan Data/Informasi', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(61, '0000-00-00 00:00:00', 'EDI WIYONO', 'L', 'MULIA BERSAMA', '81394268128', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(62, '0000-00-00 00:00:00', 'REGINA SALSABILA', 'P', 'UNIVERSITAS BRAWIJAYA', '82232852121', 'Permintaan Data/Informasi', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(63, '0000-00-00 00:00:00', 'MUNASIK HAJI', 'L', 'Kepala Desa Bayoneng Geger', '81913562755', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(64, '0000-00-00 00:00:00', 'kris', 'L', 'pt 4 pilar anugerah sejahtera', '81216013525', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 1, 3, 3, 3, 3, 1, 3, ''),
(65, '0000-00-00 00:00:00', 'Siti Sholeha', 'P', 'Pribadi', '81803884773', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(66, '0000-00-00 00:00:00', 'ROSA', 'P', 'BSI KCP SURABAYA WIYUNG 1', '82225258265', 'Menemui Pejabat/Staf', 4, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(67, '0000-00-00 00:00:00', 'Daniel Y', 'L', 'PT Waskita Karya (Persero) Tbk', '81333838288', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 3, 'Sudah sesuai'),
(68, '0000-00-00 00:00:00', 'ayu', 'P', 'pt si', '87734943278', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(69, '0000-00-00 00:00:00', 'suroso', 'L', 'panitia air sehat makmur', '82211022145', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 1, 3, 3, 3, 3, 1, 3, ''),
(70, '0000-00-00 00:00:00', 'firdyo', 'L', 'PPID', '85731810594', 'Menemui Pejabat/Staf', 4, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(71, '0000-00-00 00:00:00', 'rudi hariyanto', 'L', 'PEMDES LANDUNGSARI malang', '8561439088', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 2, 4, 3, 3, 3, 3, 3, ''),
(72, '0000-00-00 00:00:00', 'kristian arta j nainggolan', 'P', 'holiday in express', '81396951784', 'Menemui Pejabat/Staf', 3, 3, 2, 4, 3, 3, 3, 2, 3, ''),
(73, '0000-00-00 00:00:00', 'Kiky Satria', 'L', 'PT. DNA Jaya Group', '82196939693', 'Menemui Pejabat/Staf', 4, 4, 4, 4, 4, 4, 4, 4, 4, 'Komunikasi disampaikan dengan baik'),
(74, '0000-00-00 00:00:00', 'RENDY', 'L', 'MEDIA PILAR POS', '85182337894', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(75, '0000-00-00 00:00:00', 'SAMSUL HUDA', 'L', 'DESA WARU KEC WARU KAB SIDOARJO', '81330290214', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 3, ''),
(76, '0000-00-00 00:00:00', 'WITA', 'P', 'HOTEL TUNJUNGAN', '81329995472', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(77, '0000-00-00 00:00:00', 'RESKI', 'P', 'DESORTEN HOTEL', '81232694100', 'Menemui Pejabat/Staf', 3, 3, 2, 4, 3, 3, 3, 3, 4, ''),
(78, '0000-00-00 00:00:00', 'Aditya', 'L', 'Tenaga ahli DPR RI', '8175219090', 'Menemui Pejabat/Staf', 3, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(79, '0000-00-00 00:00:00', 'M. RIDHO WARDARU', 'L', 'ASDP', '8.96E+11', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(80, '0000-00-00 00:00:00', 'Dita', 'P', 'Bank Muamalat', '81234262637', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 4, ''),
(81, '0000-00-00 00:00:00', 'Rendy', 'L', 'Media Pilar POS', '85182337898', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(82, '0000-00-00 00:00:00', 'cempaka', 'P', 'vasa hotel', '81331098031', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(83, '0000-00-00 00:00:00', 'kiki', 'L', 'PT DNA Jaya GRUP', '82196939693', 'Menemui Pejabat/Staf', 3, 2, 2, 4, 3, 3, 3, 3, 3, ''),
(84, '0000-00-00 00:00:00', 'MELA', 'P', 'WHIZ LUXE', '81703665966', 'Menemui Pejabat/Staf', 3, 2, 2, 4, 3, 3, 3, 3, 3, ''),
(85, '0000-00-00 00:00:00', 'PRIYO', 'L', 'PT java confin indonesia', '82129290613', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 2, 4, 3, 3, 3, 3, 4, ''),
(86, '0000-00-00 00:00:00', 'Marya', 'P', 'Gold Vitel', '81336433188', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(87, '0000-00-00 00:00:00', 'IMAM', 'L', 'DPR RI KOMISI V', '82142037756', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(88, '0000-00-00 00:00:00', 'imama', 'P', 'swissbell', '83849285874', 'Menemui Pejabat/Staf', 3, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(89, '0000-00-00 00:00:00', 'zulva safilah', 'P', 'universitas negeri malang', '89680874148', 'Menemui Pejabat/Staf', 3, 2, 2, 4, 3, 3, 3, 3, 3, ''),
(90, '0000-00-00 00:00:00', 'mahfud', 'L', 'PEMDES SUMBER SEWU', '82143436135', 'Menemui Pejabat/Staf', 3, 3, 2, 4, 3, 3, 3, 3, 4, ''),
(91, '0000-00-00 00:00:00', 'ANISA', 'P', 'KONSULTAN', '81252691776', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 2, 4, ''),
(92, '0000-00-00 00:00:00', 'RAHEM', 'L', 'PT MULYA', '85259159229', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(93, '0000-00-00 00:00:00', 'AQIYA SHOLEH', 'L', 'PEMUDA MERAH PUTIH', '81228395716', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 2, 3, 4, 3, 3, 3, 3, 3, ''),
(94, '0000-00-00 00:00:00', 'SUGIANTORO', 'L', 'PERORANGAN', '81553051305', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 2, 4, 3, 3, 3, 3, 3, ''),
(95, '0000-00-00 00:00:00', 'Mansyur', 'L', 'BBWS Brantas', '81347807421', 'Permintaan Data/Informasi', 3, 3, 3, 4, 3, 3, 4, 4, 4, 'Lebih tingkatkan pelayanan dengan baik.'),
(96, '0000-00-00 00:00:00', 'FARID', 'L', 'PERORANGAN', '81321266190', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 2, 4, 3, 3, 3, 3, 3, ''),
(97, '0000-00-00 00:00:00', 'Andrean Y', 'L', 'Bbws brantas', '8.95E+11', 'Lapor CPNS', 4, 4, 3, 4, 4, 4, 4, 4, 4, '-'),
(98, '0000-00-00 00:00:00', 'SOLEH', 'L', 'JAWA POS', '8113058326', 'Menemui Pejabat/Staf', 3, 3, 2, 4, 3, 3, 3, 2, 4, ''),
(99, '0000-00-00 00:00:00', 'MELANI', 'P', 'HOTEL SAVANA', '8123528821', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 3, ''),
(100, '0000-00-00 00:00:00', 'Boy Reza Manopo', 'L', 'PT. Cyberindo Aditama', '87855049325', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(101, '0000-00-00 00:00:00', 'lubis', 'L', 'perorangan', '87851649355', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 2, 3, ''),
(102, '0000-00-00 00:00:00', 'Sugiantoro', 'L', 'Pribadi', '81553051305', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(103, '0000-00-00 00:00:00', 'Dodi hermawan', 'L', 'PU Situbondo', '82302338500', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(104, '0000-00-00 00:00:00', 'Lucinda Sekar Hutami', 'P', 'Dinas PUPP Kab. Situbondo', '81999260738', 'Koordinasi BMD', 4, 4, 3, 4, 3, 4, 4, 3, 4, ''),
(105, '0000-00-00 00:00:00', 'Ahmad Badrul Hairi', 'L', 'Dinas Pekerjaan Umum dan Perumahan Permukiman Kab. Situbondo', '82257585954', 'Koordinasi Aset di Wilayah Sampeyan Baru', 4, 3, 4, 4, 4, 4, 4, 4, 4, ''),
(106, '0000-00-00 00:00:00', 'Agus', 'L', 'Ayam Bakar Pak D', '85784730517', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(107, '0000-00-00 00:00:00', 'PUTRA', 'L', 'BPJS Ketenagakerjaan', '82131068795', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(108, '0000-00-00 00:00:00', 'MARYA', 'P', 'GOLD VITEL HOTEL', '81336433188', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 3, ''),
(109, '0000-00-00 00:00:00', 'Qomari', 'L', 'Kecamatan Taman, Sidoarjo', '8123299349', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(110, '0000-00-00 00:00:00', 'ASTI', 'P', 'BAPENDA JATIM', '81217795099', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(111, '0000-00-00 00:00:00', 'devy', 'P', 'Dit KI SDA', '82299332595', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 4, ''),
(112, '0000-00-00 00:00:00', 'Aryoga', 'L', 'Dit KI SDA', '82131091751', 'Menemui Pejabat/Staf', 3, 3, 4, 4, 4, 3, 3, 4, 4, ''),
(113, '0000-00-00 00:00:00', 'Wandha Anindita', 'P', 'Direktorat Kepatuhan Intern', '82143502470', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(114, '0000-00-00 00:00:00', 'Khoirul Anam', 'L', 'CV. Jabbar Batuta', '81230463756', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(115, '0000-00-00 00:00:00', 'Radit', 'L', 'SILOAM SENTOSA', '82264424579', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(116, '0000-00-00 00:00:00', 'Nella Catur', 'P', 'Whiz Luxe Hotel', '81703665966', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 3, ''),
(117, '0000-00-00 00:00:00', 'Rully', 'L', 'Polsek Wiyung', '85704940777', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(118, '0000-00-00 00:00:00', 'Nisa Ussa\'adah Nurhaliza', 'P', 'Universitas Islam Malang', '85707479928', 'Permintaan Data/Informasi', 3, 3, 2, 4, 3, 3, 3, 3, 4, ''),
(119, '0000-00-00 00:00:00', 'Dewi Maharani', 'P', 'ITS', '88289863015', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(120, '0000-00-00 00:00:00', 'Adit', 'L', 'Dinas PU Bina Marga', '318060766', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 4, 3, 4, ''),
(121, '0000-00-00 00:00:00', 'elsa', 'P', 'ITS', '81252172517', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 2, 4, ''),
(122, '0000-00-00 00:00:00', 'ARI KRISMANTORO', 'L', 'BAPEDDA UPT nganjuk', '8.95E+11', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 2, 4, ''),
(123, '0000-00-00 00:00:00', 'totok haryono', 'L', 'TPM', '89664876688', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 2, 3, ''),
(124, '0000-00-00 00:00:00', 'NINIK DWI ROHANI', 'P', 'TAMAN SAFARI PRIGEN', '81327219333', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 2, 4, ''),
(125, '0000-00-00 00:00:00', 'kirno', 'L', 'pribadi', '81212677877', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 4, 3, 4, ''),
(126, '0000-00-00 00:00:00', 'MEIGA', 'P', 'DINKES KAB BLITAR', '81217874348', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(127, '0000-00-00 00:00:00', 'ANDRE DEVIANTO', 'L', 'TPM', '82312344747', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 2, 4, ''),
(128, '0000-00-00 00:00:00', 'ERRY RAMADHAN TRIMURTI', 'P', 'PERORANGAN', '81365776998', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 2, 4, ''),
(129, '0000-00-00 00:00:00', 'BU AYU', 'P', 'PU NT2', '85335477488', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(130, '0000-00-00 00:00:00', 'Achmad Rizky Hidayah', 'L', 'Universitas Brawijaya', '8115531903', 'pengajuan surat magang mandiri', 4, 4, 4, 4, 4, 4, 4, 4, 4, 'mantap'),
(131, '0000-00-00 00:00:00', 'Annora Wahyu Garaniva', 'P', 'Universitas Brawijaya', '82292161691', 'Kirim Surat Rekomendasi Magang Mandiri', 3, 3, 3, 4, 3, 4, 4, 4, 4, '-'),
(132, '0000-00-00 00:00:00', 'BRAMIASTO BAHRUDIN EKO', 'L', 'KONSULTAN INDIVIDU', '81271153887', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 2, 4, ''),
(133, '0000-00-00 00:00:00', 'KHOIRUL', 'L', 'PRIBADI', '82234751898', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(134, '0000-00-00 00:00:00', 'BAYU', 'L', 'PRIBADI', '85791556866', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(135, '0000-00-00 00:00:00', 'SETIO', 'L', 'PT. SURYA CEMERLANG JASINDO', '81332222307', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(136, '0000-00-00 00:00:00', 'AGUNG', 'L', 'CV MONDORO', '81216202010', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(137, '0000-00-00 00:00:00', 'MAMIK', 'P', 'POKMAS JAMBANGAN', '81366406940', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(138, '0000-00-00 00:00:00', 'Eko Wahyudi', 'L', 'Kementan', '81333464677', 'Rapat', 4, 4, 3, 4, 4, 4, 4, 4, 4, ''),
(139, '0000-00-00 00:00:00', 'AGUS', 'L', 'PRIBADI', '81357253470', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(140, '0000-00-00 00:00:00', 'SAFIRA RAMADHANI', 'P', 'UNIVERSITAS NEGERI SURABAYA', '85246374419', 'Permintaan Data/Informasi', 4, 4, 4, 4, 4, 4, 4, 4, 4, 'Sudah bagus'),
(141, '0000-00-00 00:00:00', 'Muhammad Rafi Yuniarto', 'L', 'UNESA', '87858846709', 'Permintaan Data/Informasi', 4, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(142, '0000-00-00 00:00:00', 'Rizky Alfian Novaldi', 'L', 'UNIVERSITAS BRAWIJAYA', '82336690352', 'Magang', 4, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(143, '0000-00-00 00:00:00', 'ERI', 'L', 'TJAKRINDO', '81335046598', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(144, '0000-00-00 00:00:00', 'AGUS SAPUTRO', 'L', 'KAI', '81225404200', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(145, '0000-00-00 00:00:00', 'Moch. Dhofir', 'L', 'Pribadi', '85608114963', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(146, '0000-00-00 00:00:00', 'Aida Rifdatul', 'P', 'Telkom University Surabaya', '85331851681', 'Permintaan Data/Informasi', 4, 4, 3, 4, 3, 4, 4, 4, 1, '-'),
(147, '0000-00-00 00:00:00', 'Mohamad Wahyu Setiawan', 'L', 'Pemerintah Desa Tambaksawah', '82139972599', 'Menemui Pejabat/Staf', 4, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(148, '0000-00-00 00:00:00', 'bayu', 'L', 'epicnesia', '82236558683', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 2, 4, ''),
(149, '0000-00-00 00:00:00', 'fuad', 'L', 'konsultan individu', '81703804858', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 3, ''),
(150, '0000-00-00 00:00:00', 'musrik', 'L', 'kelompok tani', '85853236372', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 2, 4, ''),
(151, '0000-00-00 00:00:00', 'Mirtha', 'P', 'CV. Bukit Mas', '8175290900', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 4, ''),
(152, '0000-00-00 00:00:00', 'Muhammad fajar prabowo', 'L', 'Dinas perpustakaan dan kearsipan provinsi jawa timur', '85695778632', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 4, 3, 4, ''),
(153, '0000-00-00 00:00:00', 'alif ashari', 'L', 'POLDA JATIM', '81359555292', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 2, 4, ''),
(154, '0000-00-00 00:00:00', 'MARTONO', 'L', 'PT suwindo karya abadi', '81257309211', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(155, '0000-00-00 00:00:00', 'rasman', 'L', 'yayasan nurul huda', '82131946580', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 2, 4, ''),
(156, '0000-00-00 00:00:00', 'wasilatul farida', 'P', 'hotel golden tulib', '82232848003', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 2, 4, ''),
(157, '0000-00-00 00:00:00', 'Arief Pajar Prasetya', 'L', 'PT. Parfima Mekadaya', '82140794472', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, 'Sudah bagus'),
(158, '0000-00-00 00:00:00', 'fransisca ardiana', 'P', 'mercure hotel', 'o81322463448', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(159, '0000-00-00 00:00:00', 'Ibu Ninik', 'P', 'Kelurahan Karah', '81358477599', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(160, '0000-00-00 00:00:00', 'yaidah', 'L', 'perorangan', '81216886002', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(161, '0000-00-00 00:00:00', 'fuad nuruddin', 'L', 'konsultan individu', '81703804858', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 2, 4, ''),
(162, '0000-00-00 00:00:00', 'abd rokib/SAM D', 'L', 'PASAR KAPUTRAN', '81252997303', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(163, '0000-00-00 00:00:00', 'Mochammad Sholeh', 'L', 'Jawa Pos Media', '8113058326', 'Menemui Pejabat/Staf', 4, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(164, '0000-00-00 00:00:00', 'Rifqi', 'L', 'Jawapos', '81252593612', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 4, ''),
(165, '0000-00-00 00:00:00', 'Luthfi Aulia Rahman', 'L', 'Aone Trawas', '81232595511', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 4, ''),
(166, '0000-00-00 00:00:00', 'ayu purba wulandari', 'P', 'hoetel movepcik surabaya', '85852646682', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(167, '0000-00-00 00:00:00', 'sapto', 'L', 'pemkot suraba BAPPENDA', '81259595315', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(168, '0000-00-00 00:00:00', 'WENDI', 'L', 'PUPR KOTA BATU', '82131052773', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 2, 4, ''),
(169, '0000-00-00 00:00:00', 'Hardi', 'L', 'Malang', '81216070766', 'Permintaan Data/Informasi', 3, 3, 3, 4, 3, 3, 3, 4, 4, ''),
(170, '0000-00-00 00:00:00', 'Raras Ari Kusumaningtyas', 'P', 'PT Jasamarga Probolinggo Banyuwangi', '81553004296', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 4, 4, 1, ''),
(171, '0000-00-00 00:00:00', 'YUNI MULYANA', 'P', 'PRIBADI', '81252026969', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(172, '0000-00-00 00:00:00', 'MUHAMMAD ADHASARI', 'L', 'PABRIK GULA NGADIREJO', '82154663988', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(173, '0000-00-00 00:00:00', 'AGUS', 'L', 'UNIVERSITAS ISLAM KEDIRI', '81335944889', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(174, '0000-00-00 00:00:00', 'EDY', 'L', 'REKNANAN', '82335854997', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 2, 4, ''),
(175, '0000-00-00 00:00:00', 'Eko', 'L', 'POLRES Kota Kediri', '82311447272', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(176, '0000-00-00 00:00:00', 'Ekik', 'L', 'Toyota', '89603874062', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(177, '0000-00-00 00:00:00', 'MAS\'UD', 'L', 'PT. APTELLA', '81112007500', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(178, '0000-00-00 00:00:00', 'ROMMY', 'L', 'UPTB PELAYANAN PAJAK DAERAH SURABAYA 3', '81333359502', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(179, '0000-00-00 00:00:00', 'RASMAN', 'L', 'MUSHOLA \"NURUL HUDA\"', '82131946580', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(180, '0000-00-00 00:00:00', 'PUTRI', 'P', 'VIKTORI', '85646048832', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(181, '0000-00-00 00:00:00', 'Yesie', 'P', 'The Westin Surabaya', '81330500429', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 4, 4, 4, ''),
(182, '0000-00-00 00:00:00', 'Ayu Purba Wulandari', 'P', 'Hotel Movenpick Surabaya', '85852646682', 'Penawaran Paket Meeting', 4, 4, 3, 4, 4, 4, 4, 4, 4, 'Tetap di pertahankan'),
(183, '0000-00-00 00:00:00', 'HAPPY K SETYAWAN', 'L', 'LORENTZ INDONESIA', '811831333', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(184, '0000-00-00 00:00:00', 'NUR ARIFAH', 'P', 'YAYASAN SOSIALISASI KANKER INDONESIA', '85355010075', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(185, '0000-00-00 00:00:00', 'CORINA', 'P', 'PT. BHAKTI TAMARA', '317512333', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(186, '0000-00-00 00:00:00', 'YULI', 'L', 'PABRIK PIPA SUPRALON', '8113306670', 'Menemui Pejabat/Staf', 3, 4, 3, 4, 3, 3, 3, 3, 4, ''),
(187, '0000-00-00 00:00:00', 'ACH. GHOZALI', 'L', 'PEJUANG REFORMASI INDONESIA (PRI)', '81999979924', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(188, '0000-00-00 00:00:00', 'ASEP', 'L', 'BPN MOJOKERTO', '321396234', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(189, '0000-00-00 00:00:00', 'HERU', 'L', 'PRIBADI', '81216361808', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 3, ''),
(190, '0000-00-00 00:00:00', 'Joko Widodo', 'L', 'Sarigading Catering', '82324247473', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(191, '0000-00-00 00:00:00', 'BRIAN', 'L', 'PT. STBC', '81259990520', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(192, '0000-00-00 00:00:00', 'Nanang Yulianto', 'L', 'Pemerintah Desa Brenggolo', '81519467786', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(193, '0000-00-00 00:00:00', 'Susetya Budi', 'L', 'PT. RIjal Adima Propertindo', '81532321947', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(194, '0000-00-00 00:00:00', 'pak lutfi', 'L', 'awan trawas', '81232595511', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(195, '0000-00-00 00:00:00', 'Luthfi', 'L', 'Aone Trawas', '81232595511', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 4, ''),
(196, '0000-00-00 00:00:00', 'stefanes wibowo', 'L', 'PT KURNIA PERDANA GAS', '85646337216', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(197, '0000-00-00 00:00:00', 'CAECILLIA EVA PUTRI', 'P', 'FAVE HOTEL SIDOARJO', '87702577678', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(198, '0000-00-00 00:00:00', 'RASMAN', 'L', 'YAYASAN NURUL HUDA', '82131946580', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(199, '0000-00-00 00:00:00', 'RASMAN', 'L', 'YAYASAN NURUL HUDA', '8237668952', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 3, ''),
(200, '0000-00-00 00:00:00', 'KARWITO', 'L', 'CV. BUMI CITRA PERSADA', '81332289499', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(201, '0000-00-00 00:00:00', 'ALIP', 'L', 'CV PIDIA PRIMA', '82231225507', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 2, 4, ''),
(202, '0000-00-00 00:00:00', 'Edi prasetio', 'L', 'pribadi', '811310039', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(203, '2025-09-19 11:07:18', 'ani', 'P', 'pemerintah', '082', 'Kirim Surat (Promosi/Aduan/Temuan)', 4, 2, 4, 2, 4, 2, 4, 2, 4, 'guutt'),
(204, '2025-09-23 14:22:48', 'jkbbkb', 'P', 'jbkj', 'khch', 'hk', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'kll');

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
(42, 'SKM', '', '2025-01-10', 'laporan_skm1.pdf', 'bukti_skm1.pdf', 0),
(43, 'SKM', '', '2025-02-15', 'laporan_skm2.pdf', 'bukti_skm2.pdf', 0),
(44, 'SKM', '', '2024-08-20', 'laporan_skm3.pdf', 'bukti_skm3.pdf', 0),
(45, 'Kompu', 'Triwulan', '2024-03-05', 'laporan_skm4.pdf', 'bukti_skm4.pdf', 0),
(47, 'PPID', 'Triwulan', '2025-09-17', 'ggh', 'jkh', 0),
(48, 'SKM', 'Semester', '2025-09-24', 'hjkjk', 'hgg', 0),
(49, 'Kompu', 'Triwulan', '2025-09-11', 'kklllk', 'vv', 0),
(50, 'PPID', 'Semester', '2025-09-23', 'fsfs', 'sfs', 0),
(51, 'PPID', 'Triwulan', '2025-09-23', 'example', 'https://docs.google.com/document/d/1jzsOmu9z7ABrtZJuR3nio2PI3wuMsSOR68nEf5uoMDs/edit?usp=sharing', 0);

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
  `jenis` varchar(100) NOT NULL,
  `pengirim` varchar(150) NOT NULL,
  `tanggal` date NOT NULL,
  `nomor_surat` varchar(100) DEFAULT NULL,
  `perihal` varchar(255) NOT NULL,
  `diterima_ppid` date NOT NULL,
  `tindaklanjut` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `sumber` varchar(100) DEFAULT NULL,
  `status` enum('proses','selesai') NOT NULL DEFAULT 'proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `layanan_pengaduan`
--

INSERT INTO `layanan_pengaduan` (`no`, `via`, `jenis`, `pengirim`, `tanggal`, `nomor_surat`, `perihal`, `diterima_ppid`, `tindaklanjut`, `keterangan`, `sumber`, `status`) VALUES
(1, 'Email', 'Permintaan Informasi', 'Budi Santoso', '2025-09-01', '001/INF/2025', 'Permintaan dokumen anggaran', '2025-09-02', 'Diteruskan ke bagian Keuangan', 'Menunggu jawaban', 'Masyarakat', 'proses'),
(2, 'Website', 'Pengaduan', 'Siti Aminah', '2025-09-02', '002/PENG/2025', 'Layanan internet desa bermasalah', '2025-09-03', 'Diteruskan ke Dinas Kominfo', 'Sedang ditindaklanjuti', 'Warga Desa A', 'proses'),
(3, 'Surat', 'Permintaan Data', 'PT. Sejahtera', '2025-09-03', '003/DATA/2025', 'Data jumlah UMKM 2024', '2025-09-04', 'Disiapkan oleh Bidang Ekonomi', 'Dalam proses', 'Perusahaan', 'proses'),
(4, 'Email', 'Pengaduan', 'Agus Salim', '2025-09-04', '004/PENG/2025', 'Keluhan pelayanan publik', '2025-09-05', 'Diteruskan ke Bagian Layanan Publik', 'Menunggu tindak lanjut', 'Masyarakat', 'proses'),
(5, 'WhatsApp', 'Permintaan Informasi', 'Lina Kurnia', '2025-09-05', '005/INF/2025', 'Info jadwal pelayanan PPID', '2025-09-05', 'Dijawab langsung', 'Selesai', 'Individu', 'selesai'),
(6, 'Website', 'Pengaduan', 'Karang Taruna', '2025-09-06', '006/PENG/2025', 'Lampu jalan mati di RT 05', '2025-09-07', 'Diserahkan ke Dinas Perhubungan', 'Dalam perbaikan', 'Organisasi', 'proses'),
(7, 'Surat', 'Permintaan Data', 'Universitas X', '2025-09-07', '007/DATA/2025', 'Data kependudukan untuk penelitian', '2025-09-08', 'Diteruskan ke Disdukcapil', 'Proses validasi data', 'Akademisi', 'proses'),
(8, 'Email', 'Pengaduan', 'Rudi Hartono', '2025-09-08', '008/PENG/2025', 'Kebocoran pipa air di jalan utama', '2025-09-09', 'Diteruskan ke PDAM', 'Proses perbaikan', 'Masyarakat', 'proses'),
(9, 'WhatsApp', 'Permintaan Informasi', 'Fitri Ananda', '2025-09-09', '009/INF/2025', 'Info mekanisme keterbukaan informasi', '2025-09-09', 'Diberikan langsung', 'Selesai', 'Individu', 'selesai'),
(10, 'Website', 'Pengaduan', 'Yayasan Harapan', '2025-09-10', '010/PENG/2025', 'Kualitas layanan publik rendah', '2025-09-11', 'Diteruskan ke pimpinan daerah', 'Sedang dalam evaluasi', 'LSM', 'proses');

-- --------------------------------------------------------

--
-- Table structure for table `layanan_permintaan_data`
--

CREATE TABLE `layanan_permintaan_data` (
  `nomor` int(11) NOT NULL,
  `via` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `pengirim` varchar(150) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `diterima_ppid` date NOT NULL,
  `link_bukti_surat` varchar(255) DEFAULT NULL,
  `tindak_lanjut` text DEFAULT NULL,
  `status` enum('proses','selesai') NOT NULL DEFAULT 'proses',
  `link_bukti_surat_penyelesaian` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `layanan_permintaan_data`
--

INSERT INTO `layanan_permintaan_data` (`nomor`, `via`, `jenis`, `pengirim`, `tanggal_surat`, `nomor_surat`, `perihal`, `diterima_ppid`, `link_bukti_surat`, `tindak_lanjut`, `status`, `link_bukti_surat_penyelesaian`) VALUES
(1, 'Email', 'Permintaan Data', 'Budi Santoso', '2025-09-01', '001/DATA/2025', 'Permintaan data APBD 2024', '2025-09-02', 'http://bukti.com/surat1.pdf', 'Diteruskan ke Bagian Keuangan', 'proses', NULL),
(2, 'Surat', 'Permintaan Informasi', 'PT. Maju Jaya', '2025-09-02', '002/INF/2025', 'Informasi regulasi keterbukaan data', '2025-09-03', 'http://bukti.com/surat2.pdf', 'Diproses Bidang Hukum', 'proses', NULL),
(3, 'Website', 'Permintaan Data', 'Universitas A', '2025-09-03', '003/DATA/2025', 'Data kependudukan untuk riset', '2025-09-04', 'http://bukti.com/surat3.pdf', 'Diteruskan ke Disdukcapil', 'proses', NULL),
(4, 'Email', 'Permintaan Informasi', 'Siti Aminah', '2025-09-04', '004/INF/2025', 'Jadwal pelayanan PPID', '2025-09-05', 'http://bukti.com/surat4.pdf', 'Dijawab langsung via email', 'selesai', 'http://bukti.com/penyelesaian4.pdf'),
(5, 'WhatsApp', 'Permintaan Data', 'Karang Taruna', '2025-09-05', '005/DATA/2025', 'Data kegiatan pemuda 2023', '2025-09-06', 'http://bukti.com/surat5.pdf', 'Diteruskan ke Dinas Pemuda', 'proses', NULL),
(6, 'Surat', 'Permintaan Informasi', 'Yayasan Peduli', '2025-09-06', '006/INF/2025', 'Mekanisme pelayanan publik', '2025-09-07', 'http://bukti.com/surat6.pdf', 'Diteruskan ke Sekretariat Daerah', 'proses', NULL),
(7, 'Website', 'Permintaan Data', 'Lembaga X', '2025-09-07', '007/DATA/2025', 'Jumlah desa penerima bantuan', '2025-09-08', 'http://bukti.com/surat7.pdf', 'Disiapkan Bagian Sosial', 'proses', NULL),
(8, 'Email', 'Permintaan Data', 'Rudi Hartono', '2025-09-08', '008/DATA/2025', 'Data penggunaan dana desa', '2025-09-09', 'http://bukti.com/surat8.pdf', 'Diteruskan ke Inspektorat', 'proses', NULL),
(9, 'Surat', 'Permintaan Informasi', 'Fitri Ananda', '2025-09-09', '009/INF/2025', 'Prosedur keterbukaan informasi', '2025-09-10', 'http://bukti.com/surat9.pdf', 'Dijawab langsung dengan surat resmi', 'selesai', 'http://bukti.com/penyelesaian9.pdf'),
(10, 'Website', 'Permintaan Data', 'LSM Harapan', '2025-09-10', '010/DATA/2025', 'Data proyek pembangunan jalan', '2025-09-11', 'http://bukti.com/surat10.pdf', 'Diteruskan ke Dinas PU', 'proses', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `layanan_informasi`
--
ALTER TABLE `layanan_informasi`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `layanan_pengaduan`
--
ALTER TABLE `layanan_pengaduan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `layanan_permintaan_data`
--
ALTER TABLE `layanan_permintaan_data`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
