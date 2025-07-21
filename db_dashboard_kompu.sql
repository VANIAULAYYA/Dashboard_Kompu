-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2025 at 11:33 AM
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
(1, 'admin', '$2y$10$kXvqe/lRc0r/dl8QIp65luq/O4C3fZJ1NhQxdAu3PMkAQoVQq51ZO', 'Administrator', '2025-07-21 03:36:04');

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
(1, '2025-07-04 10:37:20', 'Andre', 'L', 'BBWS Brantas', '028982873901827', 'Rekomendasi Teknis (Rekomtek)', 4, 4, 4, 4, 3, 3, 3, 2, 3, 'sadawdasd'),
(3, '2025-07-04 15:12:19', 'Coba', 'L', 'pabrik', '028982873901827', 'Antar Makan', 3, 3, 3, 4, 3, 3, 3, 3, 3, '-'),
(4, '0000-00-00 00:00:00', 'Fathi Khayran Azhari', '', 'SMK 3 Negeri Surabaya', '88989120066', 'Magang', 3, 4, 3, 3, 3, 3, 3, 3, 3, ''),
(5, '0000-00-00 00:00:00', 'Arya Putra Maulana Feriyono', '', 'SMKN 3 SURABAYA', '89518344888', 'Magang', 4, 3, 3, 3, 3, 3, 4, 3, 3, ''),
(6, '0000-00-00 00:00:00', 'NABILAH ANJALI', '', 'AVERROES', '8155632725', 'Permintaan Data/Informasi', 4, 4, 4, 4, 4, 4, 4, 3, 4, 'Pelayanan sangat memuaskan dan membantu'),
(7, '0000-00-00 00:00:00', 'galuh', '', 'westin hotel', '8121737205', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(8, '0000-00-00 00:00:00', 'Anastasia', '', 'PT Samator Indi Gas Tbk.', '(031) 99203888', 'Menemui Pejabat/Staf', 4, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(9, '0000-00-00 00:00:00', 'dara', '', 'hotel morazen', '81334893938', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(10, '0000-00-00 00:00:00', 'murtriatna', '', 'monumen kapal selam', '81333364331', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(11, '0000-00-00 00:00:00', 'Intan sminesa', '', 'UPNVJT', '81233587622', 'Permintaan Data/Informasi', 4, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(12, '0000-00-00 00:00:00', 'totok', '', 'prorangan', '89664876688', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(13, '0000-00-00 00:00:00', 'agus', '', 'perorangan', '81357253470', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(14, '0000-00-00 00:00:00', 'rosa', '', 'BSI', '82225358265', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(15, '0000-00-00 00:00:00', 'irene', '', 'hotel', '81216811922', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(16, '0000-00-00 00:00:00', 'Erwin Tri Yunanto', '', 'CIMB Niaga Syariah', '81703217285', 'Menemui Pejabat/Staf', 3, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(17, '0000-00-00 00:00:00', 'yuni mulyana', '', 'perorangan', '81252026969', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(18, '0000-00-00 00:00:00', 'devi alexander', '', 'PT ESGN', '82134384326', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(19, '0000-00-00 00:00:00', 'ANGGITHA MEGA SAVITRI', '', 'BANK MUAMALAT', '81230669998', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(20, '0000-00-00 00:00:00', 'A RIZAL MAFA', '', 'MAKMUR SEJAHTERA', '82142640011', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(21, '0000-00-00 00:00:00', 'ALISA ADZANI ZATADINI', '', 'SUCOFINDO', '83845116351', 'Permintaan Data/Informasi', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(22, '0000-00-00 00:00:00', 'AMBAR', '', 'CV harmoni sinar kasih', '81259854847', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(23, '0000-00-00 00:00:00', 'kurniawan eko', '', 'sarana buana', '8562712291', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(24, '0000-00-00 00:00:00', 'fauzi', '', 'tenaga ahli fraksi golkar', '82228225005', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(25, '0000-00-00 00:00:00', 'abdurrahman', '', 'tenaga ahli fraksi golkar dapil jatim 1', '85706860300', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(26, '0000-00-00 00:00:00', 'arif rahmat hidayat', '', 'perorangan', '81252997303', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(27, '0000-00-00 00:00:00', 'ryan setiandra alfarizi', '', 'universitas negeri malang', '85895966729', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(28, '0000-00-00 00:00:00', 'Dodik arvianto', '', 'Pt inti data telematika', '85850770482', 'Cek internet', 4, 4, 4, 4, 4, 4, 4, 4, 4, 'Keren pertahankan'),
(29, '0000-00-00 00:00:00', 'Muhammad Daffa Zakky Eka Pradana', '', 'PT INTI DATA TELEMATIKA', '85108779998', 'Cek Jaringan Internet', 4, 4, 4, 4, 4, 4, 4, 4, 4, 'tidak ada'),
(30, '0000-00-00 00:00:00', 'Ahmad Naufal Khuzaini', '', 'PT Inti Data Telematika', '81233757736', 'Cek jaringan internet', 4, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(31, '0000-00-00 00:00:00', 'reza', '', 'Pt intidata', '85709175489', 'maintenance jaringan', 4, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(32, '0000-00-00 00:00:00', 'muhyi', '', 'perorangan', '81336442482', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 1, 3, 3, 3, 3, 1, 3, ''),
(33, '0000-00-00 00:00:00', 'AGUS GIYANTO', '', 'NOTARIS', '82234860032', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(34, '0000-00-00 00:00:00', 'susanto budiono', '', 'reknana', '82231739222', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(35, '0000-00-00 00:00:00', 'agus', '', 'PT FATIMAH INDAH UTAMA', '8534384708', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(36, '0000-00-00 00:00:00', 'ZAINUL HASAN', '', 'RUMAH SAKIT SUKMA WIJAYA', '82330931728', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(37, '0000-00-00 00:00:00', 'INDAH NAZULFA', '', 'PT HOGI0NO PROSPEK', '81331679899', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 1, 3, 3, 3, 3, 1, 3, ''),
(38, '0000-00-00 00:00:00', 'BAGUS', '', 'PEMKOT KOTA SURABAYA', '81295708255', 'Menemui Pejabat/Staf', 3, 1, 1, 3, 3, 3, 3, 1, 1, ''),
(39, '0000-00-00 00:00:00', 'ALDO', '', 'PT BHAKTI TAMARA', '81222678867', 'Rekomendasi Teknis (Rekomtek)', 3, 1, 1, 3, 3, 3, 3, 1, 3, ''),
(40, '0000-00-00 00:00:00', 'Riad', '', 'Bsi lidah wetan', '8563030875', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(41, '0000-00-00 00:00:00', 'mohammad arif wiyono', '', 'universitas hang tuah', '81235169045', 'Permintaan Data/Informasi', 3, 3, 1, 3, 1, 3, 3, 1, 3, ''),
(42, '0000-00-00 00:00:00', 'ferry', '', 'perorangan', '82257674881', 'Rekomendasi Teknis (Rekomtek)', 3, 1, 1, 3, 1, 3, 3, 1, 3, ''),
(43, '0000-00-00 00:00:00', 'andhiko edo kristianto', '', 'PT GLOBAL', '82234334269', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(44, '0000-00-00 00:00:00', 'ADHIATMA', '', 'PT YAMAMORY INDONESIA', '81359072375', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 1, 3, 3, 3, 3, 1, 3, ''),
(45, '0000-00-00 00:00:00', 'YUDA', '', 'PT TIRTA SUKSES', '81354772681', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 1, 3, 3, 3, 3, 3, 3, ''),
(46, '0000-00-00 00:00:00', 'FIFIN', '', 'Konsultan', '82230580686', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(47, '0000-00-00 00:00:00', 'haji basuni', '', 'kelurahan / pak RT', '81249567287', 'Rekomendasi Teknis (Rekomtek)', 4, 3, 1, 3, 3, 3, 3, 1, 3, ''),
(48, '0000-00-00 00:00:00', 'HADI SUSANTO', '', 'LP3 NKRI', '81556646353', 'Menemui Pejabat/Staf', 3, 1, 1, 3, 1, 3, 3, 1, 3, ''),
(49, '0000-00-00 00:00:00', 'Robianto', '', 'BIZNET', '81232059783', 'Menemui Pejabat/Staf', 4, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(50, '0000-00-00 00:00:00', 'Aditya Putra R', '', 'Samator', '85736866507', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, 'Baik'),
(51, '0000-00-00 00:00:00', 'Ihdhar Naufal', '', 'Universitas Negeri Malang', '81334361585', 'Kirim Surat (Promosi/Aduan/Temuan)', 4, 4, 4, 4, 4, 3, 4, 4, 4, 'Bagus'),
(52, '0000-00-00 00:00:00', 'AGENG', '', 'PT. BERKAT CANDRA', '81357565857', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(53, '0000-00-00 00:00:00', 'bagus', '', 'pemdes bleduk kediri', '82211392929', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(54, '0000-00-00 00:00:00', 'zainal', '', 'perorangan', '81357847816', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 1, 3, 3, 3, 3, 1, 3, ''),
(55, '0000-00-00 00:00:00', 'suwandi', '', 'cv anugerah nusantra', '81703088772', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(56, '0000-00-00 00:00:00', 'Arief Fajar Prasetya', '', 'PT. Parmifa Mekadaya', '82140794472', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(57, '0000-00-00 00:00:00', 'andri', '', 'perorangan', '81230942669', 'Rekomendasi Teknis (Rekomtek)', 3, 1, 1, 3, 3, 3, 3, 1, 3, ''),
(58, '0000-00-00 00:00:00', 'mohammad yasin', '', 'kecamatan tanggul angin sidoarjo', '81373133535', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(59, '0000-00-00 00:00:00', 'purwo bujono', '', 'dpm ptsp', '82113653411', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(60, '0000-00-00 00:00:00', 'ALFINA', '', 'UNIVERSITAS BRAWIJAYA', '8.95386E+11', 'Permintaan Data/Informasi', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(61, '0000-00-00 00:00:00', 'EDI WIYONO', '', 'MULIA BERSAMA', '81394268128', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(62, '0000-00-00 00:00:00', 'REGINA SALSABILA', '', 'UNIVERSITAS BRAWIJAYA', '82232852121', 'Permintaan Data/Informasi', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(63, '0000-00-00 00:00:00', 'MUNASIK HAJI', '', 'Kepala Desa Bayoneng Geger', '81913562755', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(64, '0000-00-00 00:00:00', 'kris', '', 'pt 4 pilar anugerah sejahtera', '81216013525', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 1, 3, 3, 3, 3, 1, 3, ''),
(65, '0000-00-00 00:00:00', 'Siti Sholeha', '', 'Pribadi', '81803884773', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(66, '0000-00-00 00:00:00', 'ROSA', '', 'BSI KCP SURABAYA WIYUNG 1', '82225258265', 'Menemui Pejabat/Staf', 4, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(67, '0000-00-00 00:00:00', 'Daniel Y', '', 'PT Waskita Karya (Persero) Tbk', '81333838288', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 3, 'Sudah sesuai'),
(68, '0000-00-00 00:00:00', 'ayu', '', 'pt si', '87734943278', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 3, ''),
(69, '0000-00-00 00:00:00', 'suroso', '', 'panitia air sehat makmur', '82211022145', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 1, 3, 3, 3, 3, 1, 3, ''),
(70, '0000-00-00 00:00:00', 'firdyo', '', 'PPID', '85731810594', 'Menemui Pejabat/Staf', 4, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(71, '0000-00-00 00:00:00', 'rudi hariyanto', '', 'PEMDES LANDUNGSARI malang', '8561439088', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 2, 4, 3, 3, 3, 3, 3, ''),
(72, '0000-00-00 00:00:00', 'kristian arta j nainggolan', '', 'holiday in express', '81396951784', 'Menemui Pejabat/Staf', 3, 3, 2, 4, 3, 3, 3, 2, 3, ''),
(73, '0000-00-00 00:00:00', 'Kiky Satria', '', 'PT. DNA Jaya Group', '82196939693', 'Menemui Pejabat/Staf', 4, 4, 4, 4, 4, 4, 4, 4, 4, 'Komunikasi disampaikan dengan baik'),
(74, '0000-00-00 00:00:00', 'RENDY', '', 'MEDIA PILAR POS', '85182337894', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(75, '0000-00-00 00:00:00', 'SAMSUL HUDA', '', 'DESA WARU KEC WARU KAB SIDOARJO', '81330290214', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 3, ''),
(76, '0000-00-00 00:00:00', 'WITA', '', 'HOTEL TUNJUNGAN', '81329995472', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(77, '0000-00-00 00:00:00', 'RESKI', '', 'DESORTEN HOTEL', '81232694100', 'Menemui Pejabat/Staf', 3, 3, 2, 4, 3, 3, 3, 3, 4, ''),
(78, '0000-00-00 00:00:00', 'Aditya', '', 'Tenaga ahli DPR RI', '8175219090', 'Menemui Pejabat/Staf', 3, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(79, '0000-00-00 00:00:00', 'M. RIDHO WARDARU', '', 'ASDP', '8.9581E+11', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(80, '0000-00-00 00:00:00', 'Dita', '', 'Bank Muamalat', '81234262637', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 4, ''),
(81, '0000-00-00 00:00:00', 'Rendy', '', 'Media Pilar POS', '85182337898', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(82, '0000-00-00 00:00:00', 'cempaka', '', 'vasa hotel', '81331098031', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(83, '0000-00-00 00:00:00', 'kiki', '', 'PT DNA Jaya GRUP', '82196939693', 'Menemui Pejabat/Staf', 3, 2, 2, 4, 3, 3, 3, 3, 3, ''),
(84, '0000-00-00 00:00:00', 'MELA', '', 'WHIZ LUXE', '81703665966', 'Menemui Pejabat/Staf', 3, 2, 2, 4, 3, 3, 3, 3, 3, ''),
(85, '0000-00-00 00:00:00', 'PRIYO', '', 'PT java confin indonesia', '82129290613', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 2, 4, 3, 3, 3, 3, 4, ''),
(86, '0000-00-00 00:00:00', 'Marya', '', 'Gold Vitel', '81336433188', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(87, '0000-00-00 00:00:00', 'IMAM', '', 'DPR RI KOMISI V', '82142037756', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(88, '0000-00-00 00:00:00', 'imama', '', 'swissbell', '83849285874', 'Menemui Pejabat/Staf', 3, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(89, '0000-00-00 00:00:00', 'zulva safilah', '', 'universitas negeri malang', '89680874148', 'Menemui Pejabat/Staf', 3, 2, 2, 4, 3, 3, 3, 3, 3, ''),
(90, '0000-00-00 00:00:00', 'mahfud', '', 'PEMDES SUMBER SEWU', '82143436135', 'Menemui Pejabat/Staf', 3, 3, 2, 4, 3, 3, 3, 3, 4, ''),
(91, '0000-00-00 00:00:00', 'ANISA', '', 'KONSULTAN', '81252691776', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 2, 4, ''),
(92, '0000-00-00 00:00:00', 'RAHEM', '', 'PT MULYA', '85259159229', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(93, '0000-00-00 00:00:00', 'AQIYA SHOLEH', '', 'PEMUDA MERAH PUTIH', '81228395716', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 2, 3, 4, 3, 3, 3, 3, 3, ''),
(94, '0000-00-00 00:00:00', 'SUGIANTORO', '', 'PERORANGAN', '81553051305', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 2, 4, 3, 3, 3, 3, 3, ''),
(95, '0000-00-00 00:00:00', 'Mansyur', '', 'BBWS Brantas', '81347807421', 'Permintaan Data/Informasi', 3, 3, 3, 4, 3, 3, 4, 4, 4, 'Lebih tingkatkan pelayanan dengan baik.'),
(96, '0000-00-00 00:00:00', 'FARID', '', 'PERORANGAN', '81321266190', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 2, 4, 3, 3, 3, 3, 3, ''),
(97, '0000-00-00 00:00:00', 'Andrean Y', '', 'Bbws brantas', '8.95328E+11', 'Lapor CPNS', 4, 4, 3, 4, 4, 4, 4, 4, 4, '-'),
(98, '0000-00-00 00:00:00', 'SOLEH', '', 'JAWA POS', '8113058326', 'Menemui Pejabat/Staf', 3, 3, 2, 4, 3, 3, 3, 2, 4, ''),
(99, '0000-00-00 00:00:00', 'MELANI', '', 'HOTEL SAVANA', '8123528821', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 3, ''),
(100, '0000-00-00 00:00:00', 'Boy Reza Manopo', '', 'PT. Cyberindo Aditama', '87855049325', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(101, '0000-00-00 00:00:00', 'lubis', '', 'perorangan', '87851649355', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 2, 3, ''),
(102, '0000-00-00 00:00:00', 'Sugiantoro', '', 'Pribadi', '81553051305', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(103, '0000-00-00 00:00:00', 'Dodi hermawan', '', 'PU Situbondo', '82302338500', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(104, '0000-00-00 00:00:00', 'Lucinda Sekar Hutami', '', 'Dinas PUPP Kab. Situbondo', '81999260738', 'Koordinasi BMD', 4, 4, 3, 4, 3, 4, 4, 3, 4, ''),
(105, '0000-00-00 00:00:00', 'Ahmad Badrul Hairi', '', 'Dinas Pekerjaan Umum dan Perumahan Permukiman Kab. Situbondo', '82257585954', 'Koordinasi Aset di Wilayah Sampeyan Baru', 4, 3, 4, 4, 4, 4, 4, 4, 4, ''),
(106, '0000-00-00 00:00:00', 'Agus', '', 'Ayam Bakar Pak D', '85784730517', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(107, '0000-00-00 00:00:00', 'PUTRA', '', 'BPJS Ketenagakerjaan', '82131068795', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(108, '0000-00-00 00:00:00', 'MARYA', '', 'GOLD VITEL HOTEL', '81336433188', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 3, ''),
(109, '0000-00-00 00:00:00', 'Qomari', '', 'Kecamatan Taman, Sidoarjo', '8123299349', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(110, '0000-00-00 00:00:00', 'ASTI', '', 'BAPENDA JATIM', '81217795099', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(111, '0000-00-00 00:00:00', 'devy', '', 'Dit KI SDA', '82299332595', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 4, ''),
(112, '0000-00-00 00:00:00', 'Aryoga', '', 'Dit KI SDA', '82131091751', 'Menemui Pejabat/Staf', 3, 3, 4, 4, 4, 3, 3, 4, 4, ''),
(113, '0000-00-00 00:00:00', 'Wandha Anindita', '', 'Direktorat Kepatuhan Intern', '82143502470', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(114, '0000-00-00 00:00:00', 'Khoirul Anam', '', 'CV. Jabbar Batuta', '81230463756', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(115, '0000-00-00 00:00:00', 'Radit', '', 'SILOAM SENTOSA', '82264424579', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(116, '0000-00-00 00:00:00', 'Nella Catur', '', 'Whiz Luxe Hotel', '81703665966', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 3, ''),
(117, '0000-00-00 00:00:00', 'Rully', '', 'Polsek Wiyung', '85704940777', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(118, '0000-00-00 00:00:00', 'Nisa Ussa\'adah Nurhaliza', '', 'Universitas Islam Malang', '85707479928', 'Permintaan Data/Informasi', 3, 3, 2, 4, 3, 3, 3, 3, 4, ''),
(119, '0000-00-00 00:00:00', 'Dewi Maharani', '', 'ITS', '88289863015', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(120, '0000-00-00 00:00:00', 'Adit', '', 'Dinas PU Bina Marga', '318060766', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 4, 3, 4, ''),
(121, '0000-00-00 00:00:00', 'elsa', '', 'ITS', '81252172517', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 2, 4, ''),
(122, '0000-00-00 00:00:00', 'ARI KRISMANTORO', '', 'BAPEDDA UPT nganjuk', '8.95395E+11', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 2, 4, ''),
(123, '0000-00-00 00:00:00', 'totok haryono', '', 'TPM', '89664876688', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 2, 3, ''),
(124, '0000-00-00 00:00:00', 'NINIK DWI ROHANI', '', 'TAMAN SAFARI PRIGEN', '81327219333', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 2, 4, ''),
(125, '0000-00-00 00:00:00', 'kirno', '', 'pribadi', '81212677877', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 4, 3, 4, ''),
(126, '0000-00-00 00:00:00', 'MEIGA', '', 'DINKES KAB BLITAR', '81217874348', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(127, '0000-00-00 00:00:00', 'ANDRE DEVIANTO', '', 'TPM', '82312344747', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 2, 4, ''),
(128, '0000-00-00 00:00:00', 'ERRY RAMADHAN TRIMURTI', '', 'PERORANGAN', '81365776998', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 2, 4, ''),
(129, '0000-00-00 00:00:00', 'BU AYU', '', 'PU NT2', '85335477488', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(130, '0000-00-00 00:00:00', 'Achmad Rizky Hidayah', '', 'Universitas Brawijaya', '8115531903', 'pengajuan surat magang mandiri', 4, 4, 4, 4, 4, 4, 4, 4, 4, 'mantap'),
(131, '0000-00-00 00:00:00', 'Annora Wahyu Garaniva', '', 'Universitas Brawijaya', '82292161691', 'Kirim Surat Rekomendasi Magang Mandiri', 3, 3, 3, 4, 3, 4, 4, 4, 4, '-'),
(132, '0000-00-00 00:00:00', 'BRAMIASTO BAHRUDIN EKO', '', 'KONSULTAN INDIVIDU', '81271153887', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 2, 4, ''),
(133, '0000-00-00 00:00:00', 'KHOIRUL', '', 'PRIBADI', '82234751898', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(134, '0000-00-00 00:00:00', 'BAYU', '', 'PRIBADI', '85791556866', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(135, '0000-00-00 00:00:00', 'SETIO', '', 'PT. SURYA CEMERLANG JASINDO', '81332222307', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(136, '0000-00-00 00:00:00', 'AGUNG', '', 'CV MONDORO', '81216202010', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(137, '0000-00-00 00:00:00', 'MAMIK', '', 'POKMAS JAMBANGAN', '81366406940', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(138, '0000-00-00 00:00:00', 'Eko Wahyudi', '', 'Kementan', '81333464677', 'Rapat', 4, 4, 3, 4, 4, 4, 4, 4, 4, ''),
(139, '0000-00-00 00:00:00', 'AGUS', '', 'PRIBADI', '81357253470', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(140, '0000-00-00 00:00:00', 'SAFIRA RAMADHANI', '', 'UNIVERSITAS NEGERI SURABAYA', '85246374419', 'Permintaan Data/Informasi', 4, 4, 4, 4, 4, 4, 4, 4, 4, 'Sudah bagus'),
(141, '0000-00-00 00:00:00', 'Muhammad Rafi Yuniarto', '', 'UNESA', '87858846709', 'Permintaan Data/Informasi', 4, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(142, '0000-00-00 00:00:00', 'Rizky Alfian Novaldi', '', 'UNIVERSITAS BRAWIJAYA', '82336690352', 'Magang', 4, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(143, '0000-00-00 00:00:00', 'ERI', '', 'TJAKRINDO', '81335046598', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(144, '0000-00-00 00:00:00', 'AGUS SAPUTRO', '', 'KAI', '81225404200', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(145, '0000-00-00 00:00:00', 'Moch. Dhofir', '', 'Pribadi', '85608114963', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(146, '0000-00-00 00:00:00', 'Aida Rifdatul', '', 'Telkom University Surabaya', '85331851681', 'Permintaan Data/Informasi', 4, 4, 3, 4, 3, 4, 4, 4, 1, '-'),
(147, '0000-00-00 00:00:00', 'Mohamad Wahyu Setiawan', '', 'Pemerintah Desa Tambaksawah', '82139972599', 'Menemui Pejabat/Staf', 4, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(148, '0000-00-00 00:00:00', 'bayu', '', 'epicnesia', '82236558683', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 2, 4, ''),
(149, '0000-00-00 00:00:00', 'fuad', '', 'konsultan individu', '81703804858', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 3, ''),
(150, '0000-00-00 00:00:00', 'musrik', '', 'kelompok tani', '85853236372', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 2, 4, ''),
(151, '0000-00-00 00:00:00', 'Mirtha', '', 'CV. Bukit Mas', '8175290900', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 4, ''),
(152, '0000-00-00 00:00:00', 'Muhammad fajar prabowo', '', 'Dinas perpustakaan dan kearsipan provinsi jawa timur', '85695778632', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 4, 3, 4, ''),
(153, '0000-00-00 00:00:00', 'alif ashari', '', 'POLDA JATIM', '81359555292', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 2, 4, ''),
(154, '0000-00-00 00:00:00', 'MARTONO', '', 'PT suwindo karya abadi', '81257309211', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(155, '0000-00-00 00:00:00', 'rasman', '', 'yayasan nurul huda', '82131946580', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 3, 3, 3, 3, 2, 4, ''),
(156, '0000-00-00 00:00:00', 'wasilatul farida', '', 'hotel golden tulib', '82232848003', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 2, 4, ''),
(157, '0000-00-00 00:00:00', 'Arief Pajar Prasetya', '', 'PT. Parfima Mekadaya', '82140794472', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, 'Sudah bagus'),
(158, '0000-00-00 00:00:00', 'fransisca ardiana', '', 'mercure hotel', 'o81322463448', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(159, '0000-00-00 00:00:00', 'Ibu Ninik', '', 'Kelurahan Karah', '81358477599', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(160, '0000-00-00 00:00:00', 'yaidah', '', 'perorangan', '81216886002', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(161, '0000-00-00 00:00:00', 'fuad nuruddin', '', 'konsultan individu', '81703804858', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 2, 4, ''),
(162, '0000-00-00 00:00:00', 'abd rokib/SAM D', '', 'PASAR KAPUTRAN', '81252997303', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(163, '0000-00-00 00:00:00', 'Mochammad Sholeh', '', 'Jawa Pos Media', '8113058326', 'Menemui Pejabat/Staf', 4, 4, 4, 4, 4, 4, 4, 4, 4, ''),
(164, '0000-00-00 00:00:00', 'Rifqi', '', 'Jawapos', '81252593612', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 4, ''),
(165, '0000-00-00 00:00:00', 'Luthfi Aulia Rahman', '', 'Aone Trawas', '81232595511', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 4, ''),
(166, '0000-00-00 00:00:00', 'ayu purba wulandari', '', 'hoetel movepcik surabaya', '85852646682', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(167, '0000-00-00 00:00:00', 'sapto', '', 'pemkot suraba BAPPENDA', '81259595315', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(168, '0000-00-00 00:00:00', 'WENDI', '', 'PUPR KOTA BATU', '82131052773', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 2, 4, ''),
(169, '0000-00-00 00:00:00', 'Hardi', '', 'Malang', '81216070766', 'Permintaan Data/Informasi', 3, 3, 3, 4, 3, 3, 3, 4, 4, ''),
(170, '0000-00-00 00:00:00', 'Raras Ari Kusumaningtyas', '', 'PT Jasamarga Probolinggo Banyuwangi', '81553004296', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 4, 4, 1, ''),
(171, '0000-00-00 00:00:00', 'YUNI MULYANA', '', 'PRIBADI', '81252026969', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(172, '0000-00-00 00:00:00', 'MUHAMMAD ADHASARI', '', 'PABRIK GULA NGADIREJO', '82154663988', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(173, '0000-00-00 00:00:00', 'AGUS', '', 'UNIVERSITAS ISLAM KEDIRI', '81335944889', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(174, '0000-00-00 00:00:00', 'EDY', '', 'REKNANAN', '82335854997', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 2, 4, ''),
(175, '0000-00-00 00:00:00', 'Eko', '', 'POLRES Kota Kediri', '82311447272', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(176, '0000-00-00 00:00:00', 'Ekik', '', 'Toyota', '89603874062', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(177, '0000-00-00 00:00:00', 'MAS\'UD', '', 'PT. APTELLA', '81112007500', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(178, '0000-00-00 00:00:00', 'ROMMY', '', 'UPTB PELAYANAN PAJAK DAERAH SURABAYA 3', '81333359502', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(179, '0000-00-00 00:00:00', 'RASMAN', '', 'MUSHOLA \"NURUL HUDA\"', '82131946580', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(180, '0000-00-00 00:00:00', 'PUTRI', '', 'VIKTORI', '85646048832', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(181, '0000-00-00 00:00:00', 'Yesie', '', 'The Westin Surabaya', '81330500429', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 4, 4, 4, ''),
(182, '0000-00-00 00:00:00', 'Ayu Purba Wulandari', '', 'Hotel Movenpick Surabaya', '85852646682', 'Penawaran Paket Meeting', 4, 4, 3, 4, 4, 4, 4, 4, 4, 'Tetap di pertahankan'),
(183, '0000-00-00 00:00:00', 'HAPPY K SETYAWAN', '', 'LORENTZ INDONESIA', '811831333', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(184, '0000-00-00 00:00:00', 'NUR ARIFAH', '', 'YAYASAN SOSIALISASI KANKER INDONESIA', '85355010075', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(185, '0000-00-00 00:00:00', 'CORINA', '', 'PT. BHAKTI TAMARA', '317512333', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(186, '0000-00-00 00:00:00', 'YULI', '', 'PABRIK PIPA SUPRALON', '8113306670', 'Menemui Pejabat/Staf', 3, 4, 3, 4, 3, 3, 3, 3, 4, ''),
(187, '0000-00-00 00:00:00', 'ACH. GHOZALI', '', 'PEJUANG REFORMASI INDONESIA (PRI)', '81999979924', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(188, '0000-00-00 00:00:00', 'ASEP', '', 'BPN MOJOKERTO', '321396234', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(189, '0000-00-00 00:00:00', 'HERU', '', 'PRIBADI', '81216361808', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 3, ''),
(190, '0000-00-00 00:00:00', 'Joko Widodo', '', 'Sarigading Catering', '82324247473', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(191, '0000-00-00 00:00:00', 'BRIAN', '', 'PT. STBC', '81259990520', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(192, '0000-00-00 00:00:00', 'Nanang Yulianto', '', 'Pemerintah Desa Brenggolo', '81519467786', 'Kirim Surat (Promosi/Aduan/Temuan)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(193, '0000-00-00 00:00:00', 'Susetya Budi', '', 'PT. RIjal Adima Propertindo', '81532321947', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(194, '0000-00-00 00:00:00', 'pak lutfi', '', 'awan trawas', '81232595511', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(195, '0000-00-00 00:00:00', 'Luthfi', '', 'Aone Trawas', '81232595511', 'Menemui Pejabat/Staf', 3, 3, 3, 3, 3, 3, 3, 3, 4, ''),
(196, '0000-00-00 00:00:00', 'stefanes wibowo', '', 'PT KURNIA PERDANA GAS', '85646337216', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(197, '0000-00-00 00:00:00', 'CAECILLIA EVA PUTRI', '', 'FAVE HOTEL SIDOARJO', '87702577678', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(198, '0000-00-00 00:00:00', 'RASMAN', '', 'YAYASAN NURUL HUDA', '82131946580', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(199, '0000-00-00 00:00:00', 'RASMAN', '', 'YAYASAN NURUL HUDA', '8237668952', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 3, ''),
(200, '0000-00-00 00:00:00', 'KARWITO', '', 'CV. BUMI CITRA PERSADA', '81332289499', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, ''),
(201, '0000-00-00 00:00:00', 'ALIP', '', 'CV PIDIA PRIMA', '82231225507', 'Menemui Pejabat/Staf', 3, 3, 3, 4, 3, 3, 3, 2, 4, ''),
(202, '0000-00-00 00:00:00', 'Edi prasetio', '', 'pribadi', '811310039', 'Rekomendasi Teknis (Rekomtek)', 3, 3, 3, 4, 3, 3, 3, 3, 4, '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

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
