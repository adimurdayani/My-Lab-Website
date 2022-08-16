-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Agu 2022 pada 21.51
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my-lab`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_informasi`
--

CREATE TABLE `tb_informasi` (
  `id` int(11) NOT NULL,
  `kategori_register_id` int(11) NOT NULL,
  `keterangan` varchar(128) DEFAULT NULL,
  `tanggal_buka` varchar(100) NOT NULL,
  `tanggal_tutup` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id` int(11) NOT NULL,
  `judul` varchar(128) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `tanggal` varchar(128) DEFAULT NULL,
  `jam` varchar(128) DEFAULT NULL,
  `nama_dosen` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id`, `judul`, `keterangan`, `tanggal`, `jam`, `nama_dosen`) VALUES
(4, 'Praktikum Pascal', '-', '2022-06-13', '07:30', '-'),
(5, 'Praktikum C++', '-', '2022-06-14', '08:30', '-'),
(6, 'Praktikum Program Web', '-', '2022-06-08', '09:30', '-'),
(7, 'Praktikum Java', '-', '2022-06-02', '09:30', '-'),
(8, 'Praktikum Microcontroller', '-', '2022-06-13', '09:53', '-'),
(9, 'Praktikum Elektronika digital', '-', '2022-06-15', '09:40', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_jurusan`
--

CREATE TABLE `tb_kategori_jurusan` (
  `id` int(11) NOT NULL,
  `kategori` varchar(128) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori_jurusan`
--

INSERT INTO `tb_kategori_jurusan` (`id`, `kategori`, `keterangan`, `created_at`) VALUES
(4, 'Rekayasa Perangkat Lunak (RPL)', 'Rekayasa Perangkat Lunak (RPL) adalah konsentrasi yang berfokus pada pengembangan dan pembuatan software.', '2022-04-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_praktikum`
--

CREATE TABLE `tb_kategori_praktikum` (
  `id` int(11) NOT NULL,
  `kategori` varchar(128) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori_praktikum`
--

INSERT INTO `tb_kategori_praktikum` (`id`, `kategori`, `keterangan`, `created_at`) VALUES
(4, 'Praktikum Elektronika digital', 'praktek elektronika digital', '2022-04-13'),
(5, 'Praktikum Pascal', 'praktikum pascal', '2022-06-03'),
(6, 'Praktikum C++', 'praktikum c++', '2022-06-03'),
(7, 'Praktikum Program Web', 'praktikum program web', '2022-06-03'),
(8, 'Praktikum Java', 'praktikum java', '2022-06-03'),
(9, 'Praktikum Microcontroller', 'praktikum microcontroller', '2022-06-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_register`
--

CREATE TABLE `tb_kategori_register` (
  `id` int(11) NOT NULL,
  `kategori` varchar(128) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori_register`
--

INSERT INTO `tb_kategori_register` (`id`, `kategori`, `keterangan`, `created_at`) VALUES
(3, 'Hardware', 'perangkat keras', '2022-04-13'),
(4, 'Software', 'perangkat lunak', '2022-04-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelompok`
--

CREATE TABLE `tb_kelompok` (
  `id` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `nim` varchar(100) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `kelompok` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kelompok`
--

INSERT INTO `tb_kelompok` (`id`, `id_mahasiswa`, `nim`, `nama`, `kelompok`, `user_id`, `tanggal`) VALUES
(2, 223, '21.023.55.202.058', 'DESI NIRMAL', '1', 1, '17 Aug 2022'),
(3, 224, '21.023.55.202.059', 'MUH. KHAFI RABSYAM', '1', 1, '17 Aug 2022'),
(4, 225, '21.023.55.202.060', 'AKBAR', '2', 1, '17 Aug 2022'),
(5, 226, '21.023.55.202.061', 'MUH. EDEN FAUZAN', '2', 1, '17 Aug 2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_konfigurasi`
--

CREATE TABLE `tb_konfigurasi` (
  `id` int(11) NOT NULL,
  `nama_web` varchar(128) DEFAULT NULL,
  `icon_web` varchar(255) DEFAULT NULL,
  `created_at` varchar(128) DEFAULT NULL,
  `updated_at` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_konfigurasi`
--

INSERT INTO `tb_konfigurasi` (`id`, `nama_web`, `icon_web`, `created_at`, `updated_at`) VALUES
(1, 'My Lab', '', '07 Apr 2022', '13 Apr 2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(128) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `angkatan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id`, `nim`, `nama`, `angkatan`) VALUES
(1, '19.023.55.202.001', 'Angelina Patricia', 2019),
(2, '19.023.55.202.002', 'Rahmiati Bunga To\'long', 2019),
(3, '19.023.55.202.003', 'Alfath Syafatullah Kahar', 2019),
(4, '19.023.55.202.004', 'Anisa', 2019),
(5, '19.023.55.202.005', 'Adnan', 2019),
(6, '19.023.55.202.006', 'Triana Savera', 2019),
(7, '19.023.55.202.007', 'Herman Indou', 2019),
(8, '19.023.55.202.008', 'Nurwinda Yanti', 2019),
(9, '19.023.55.202.009', 'Anjas', 2019),
(10, '19.023.55.202.010', 'Riko Wahyudi', 2019),
(11, '19.023.55.202.011', 'Aldiansyah Maulana', 2019),
(12, '19.023.55.202.012', 'Rudi Kristian', 2019),
(13, '19.023.55.202.013', 'Natahsya Maharani', 2019),
(14, '19.023.55.202.014', 'Nurfariza Abdul Hadi', 2019),
(15, '19.023.55.202.015', 'Fikri Bolu', 2019),
(16, '19.023.55.202.016', 'Sutriyani', 2019),
(17, '19.023.55.202.017', 'Rahma Borahima', 2019),
(18, '19.023.55.202.018', 'Asrafiah Masdin', 2019),
(19, '19.023.55.202.019', 'Ega Azhari', 2019),
(20, '19.023.55.202.020', 'Kasma Maming', 2019),
(21, '19.023.55.202.021', 'Mychael Octavianus Suangga', 2019),
(22, '19.023.55.202.022', 'Yunison Weya', 2019),
(23, '19.023.55.202.023', 'Jaya', 2019),
(24, '19.023.55.202.024', 'Bryan Sham Rante Tandung', 2019),
(25, '19.023.55.202.025', 'Nuvela Mangiding', 2019),
(26, '19.023.55.202.026', 'Sarman Cokro', 2019),
(27, '19.023.55.202.027', 'Muh. Wirhamsyah', 2019),
(28, '19.023.55.202.028', 'Ruslan Abdul Gani', 2019),
(29, '19.023.55.202.029', 'Nur Alam Arbi', 2019),
(30, '19.023.55.202.030', 'Stevani Boyo', 2019),
(31, '19.023.55.202.031', 'Munira', 2019),
(32, '19.023.55.202.032', 'Rahmi Ningsy Guncya', 2019),
(33, '19.023.55.202.033', 'Didit Febrianto', 2019),
(34, '19.023.55.202.034', 'Muh. Yusril', 2019),
(35, '19.023.55.202.035', 'Muh. Nabil Putra', 2019),
(36, '19.023.55.202.036', 'Nurhapsari', 2019),
(37, '19.023.55.202.037', 'Efrianti Pasang Lino', 2019),
(38, '19.023.55.202.038', 'Reni Annisa', 2019),
(39, '19.023.55.202.039', 'Vina Marini', 2019),
(40, '19.023.55.202.040', 'Aan', 2019),
(41, '19.023.55.202.041', 'Rismawati', 2019),
(42, '19.023.55.202.042', 'Nurlaila', 2019),
(43, '19.023.55.202.043', 'Aden Agfary', 2019),
(44, '19.023.55.202.044', 'Rinaldi Salam', 2019),
(45, '19.023.55.202.045', 'Ramadan', 2019),
(46, '19.023.55.202.047', 'Tenri Dio', 2019),
(47, '19.023.55.202.048', 'Satriani', 2019),
(48, '19.023.55.202.049', 'Amran', 2019),
(49, '19.023.55.202.050', 'Alfadrul Gazali', 2019),
(50, '19.023.55.202.051', 'Nirma Sari', 2019),
(51, '19.023.55.202.052', 'Muhammad Yusuf Sharti', 2019),
(52, '19.023.55.202.053', 'Darsi', 2019),
(53, '19.023.55.202.055', 'Andi Fahrezi Pratama Fajar', 2019),
(54, '19.023.55.202.056', 'Muh. Imam Nawawi', 2019),
(55, '19.023.55.202.057', 'Andika', 2019),
(56, '19.023.55.202.058', 'Meldi Alfeus', 2019),
(57, '19.023.55.202.059', 'Agriansyah', 2019),
(58, '19.023.55.202.060', 'M. Syahrul Sarman', 2019),
(59, '19.023.55.202.062', 'Yunita S.', 2019),
(60, '19.023.55.202.063', 'Isma\'ul Husna', 2019),
(61, '19.023.55.202.064', 'Yulatri Yolanda', 2019),
(62, '19.023.55.202.065', 'Dinda Rachmadani', 2019),
(63, '19.023.55.202.066', 'Diza Sasmitha Putri', 2019),
(64, '19.023.55.202.067', 'Andi Rio Agung Saputra', 2019),
(65, '19.023.55.202.068', 'Muhammad Wiki', 2019),
(66, '19.023.55.202.069', 'Efral Dafit', 2019),
(67, '19.023.55.202.070', 'Atik Jupri', 2019),
(68, '19.023.55.202.071', 'Nyoman Harun', 2019),
(69, '19.023.55.202.073', 'Eben', 2019),
(70, '19.023.55.202.074', 'A. Hendri Belo', 2019),
(71, '19.023.55.202.075', 'Rizki Yuni Charani', 2019),
(72, '19.023.55.202.076', 'Pakin Tappang Aruan', 2019),
(73, '19.023.55.202.077', 'Dias Astisa Syahrul', 2019),
(74, '19.023.55.202.078', 'Satrio Dewantara Danda', 2019),
(75, '19.023.55.202.079', 'Zulkifli', 2019),
(76, '19.023.55.202.080', 'Muh. Lutfi', 2019),
(77, '19.023.55.202.081', 'Muh. Yahya', 2019),
(78, '19.023.55.202.083', 'Widya Putri Lalanlangi', 2019),
(79, '19.023.55.202.084', 'Muh. Yogi Ardiles', 2019),
(80, '19.023.55.202.085', 'Edwin Palengka', 2019),
(81, '19.023.55.202.086', 'Amelia Anggraini', 2019),
(82, '19.023.55.202.087', 'Baskaran', 2019),
(83, '19.023.55.202.088', 'Kornelius', 2019),
(84, '19.023.55.202.089', 'Muh. Hisyam Umar', 2019),
(85, '19.023.55.202.090', 'A. Afiaat Fitrah', 2019),
(86, '19.023.55.202.091', 'Alda Indah Reski', 2019),
(87, '19.023.55.202.092', 'Syawal', 2019),
(88, '20.023.55.202.001', 'Indriani', 2020),
(89, '20.023.55.202.002', 'Muh. Fadil Hamzah', 2020),
(90, '20.023.55.202.003', 'Ibrahim R. Umar', 2020),
(91, '20.023.55.202.004', 'Ardi Wirawan', 2020),
(92, '20.023.55.202.005', 'Irfain', 2020),
(93, '20.023.55.202.006', 'Syaiful', 2020),
(94, '20.023.55.202.007', 'Nur Fadilah', 2020),
(95, '20.023.55.202.008', 'Nurhasana', 2020),
(96, '20.023.55.202.009', 'Muh. Hidayat Yasruddin', 2020),
(97, '20.023.55.202.010', 'Lisra', 2020),
(98, '20.023.55.202.011', 'Nurfadli Mustafa', 2020),
(99, '20.023.55.202.012', 'Suci', 2020),
(100, '20.023.55.202.013', 'Sindi Anugrah Pratiwi', 2020),
(101, '20.023.55.202.014', 'Arianti Putri Para\'pak', 2020),
(102, '20.023.55.202.015', 'Riqi Moh. Fauzi', 2020),
(103, '20.023.55.202.016', 'Lukman Putra Ma rifal', 2020),
(104, '20.023.55.202.017', 'Anrini Dahri', 2020),
(105, '20.023.55.202.018', 'Abdul Rahim Wadan', 2020),
(106, '20.023.55.202.019', 'Rahmawati', 2020),
(107, '20.023.55.202.020', 'Tiara Difanistri Sawe', 2020),
(108, '20.023.55.202.021', 'Hamsa Renaldi Tiranda', 2020),
(109, '20.023.55.202.022', 'Andi Vika Madhuri', 2020),
(110, '20.023.55.202.023', 'Imal Yusup', 2020),
(111, '20.023.55.202.024', 'Rahma Dewi Puspita', 2020),
(112, '20.023.55.202.025', 'Widya', 2020),
(113, '20.023.55.202.026', 'Frengki Pasasa', 2020),
(114, '20.023.55.202.027', 'Angga Bagus Pratama', 2020),
(115, '20.023.55.202.028', 'Wahyudi', 2020),
(116, '20.023.55.202.029', 'Nur Aisyah', 2020),
(117, '20.023.55.202.030', 'Afni Astuti Labir', 2020),
(118, '20.023.55.202.032', 'Wahyuni', 2020),
(119, '20.023.55.202.033', 'Muh. Wahyu Arfan', 2020),
(120, '20.023.55.202.034', 'Muh. Ifyal Jusak', 2020),
(121, '20.023.55.202.035', 'Muhammad Rifki Alfareza', 2020),
(122, '20.023.55.202.036', 'Marsyanti', 2020),
(123, '20.023.55.202.037', 'Muh. Syaeikhul S Beli', 2020),
(124, '20.023.55.202.038', 'Muh. Ilham Rahmat', 2020),
(125, '20.023.55.202.039', 'Andi Iin Herliana', 2020),
(126, '20.023.55.202.040', 'Rival', 2020),
(127, '20.023.55.202.041', 'Ferella', 2020),
(128, '20.023.55.202.042', 'Andi Akhsanul Haq', 2020),
(129, '20.023.55.202.043', 'Muh. Alfath Ramadhan', 2020),
(130, '20.023.55.202.044', 'Fauzia Rahmasari', 2020),
(131, '20.023.55.202.045', 'Agnes R', 2020),
(132, '20.023.55.202.046', 'Aldiansya', 2020),
(133, '20.023.55.202.047', 'Lois', 2020),
(134, '20.023.55.202.048', 'Jeri', 2020),
(135, '20.023.55.202.049', 'Muh. Zainal', 2020),
(136, '20.023.55.202.050', 'Emma Anjaslina Tibian', 2020),
(137, '20.023.55.202.051', 'Nur Aliyah Maulina Syam', 2020),
(138, '20.023.55.202.052', 'Fira Tamrin', 2020),
(139, '20.023.55.202.053', 'Delsianti', 2020),
(140, '20.023.55.202.054', 'Hendrawan', 2020),
(141, '20.023.55.202.055', 'Andini', 2020),
(142, '20.023.55.202.056', 'Aulia Nurul', 2020),
(143, '20.023.55.202.057', 'Vhilya Anisya Putri', 2020),
(144, '20.023.55.202.058', 'Mega Raja Pakan', 2020),
(145, '20.023.55.202.059', 'Arinda Kirana', 2020),
(146, '20.023.55.202.060', 'Salpina', 2020),
(147, '20.023.55.202.061', 'Hastuti Liling Padang', 2020),
(148, '20.023.55.202.062', 'Misrawati', 2020),
(149, '20.023.55.202.063', 'Grasia Rance Toding', 2020),
(150, '20.023.55.202.064', 'Rahmi Musi Toding', 2020),
(151, '20.023.55.202.065', 'Ermitha Diar', 2020),
(152, '20.023.55.202.066', 'Raynal Devlan Fatlan', 2020),
(153, '20.023.55.202.067', 'Feby Lawrenza Patanduk', 2020),
(154, '20.023.55.202.068', 'Yelti Rawan', 2020),
(155, '20.023.55.202.069', 'Nurul Hazizah', 2020),
(156, '20.023.55.202.070', 'Risal Ntopu', 2020),
(157, '20.023.55.202.071', 'Sl. Wing Abigail Tiala', 2020),
(158, '20.023.55.202.072', 'Irnah', 2020),
(159, '20.023.55.202.073', 'Melsa', 2020),
(160, '20.023.55.202.074', 'Musfira Nurdin', 2020),
(161, '20.023.55.202.076', 'Darmawan', 2020),
(162, '20.023.55.202.077', 'Dela Wulandari', 2020),
(163, '20.023.55.202.078', 'Jumrianti Manggera', 2020),
(164, '20.023.55.202.079', 'Tika Isak Desse', 2020),
(165, '20.023.55.202.080', 'Mefton Elshaday Timbayo Sule', 2020),
(166, '21.023.55.202.001', 'IAN NUGRAHA', 2021),
(167, '21.023.55.202.002', 'VANI', 2021),
(168, '21.023.55.202.003', 'ABD MUHAIMIN', 2021),
(169, '21.023.55.202.004', 'ERNI PATA', 2021),
(170, '21.023.55.202.005', 'MUSMAINA', 2021),
(171, '21.023.55.202.006', 'NABILA', 2021),
(172, '21.023.55.202.007', 'SAFNA RUSMI', 2021),
(173, '21.023.55.202.008', 'MUTIARA RAHMA ISTIQAMAH', 2021),
(174, '21.023.55.202.009', 'MUHAMMAD YUSRIL', 2021),
(175, '21.023.55.202.010', 'RESMITA', 2021),
(176, '21.023.55.202.011', 'HEWI ANASARI ', 2021),
(177, '21.023.55.202.012', 'MUTMAINNAH ', 2021),
(178, '21.023.55.202.013', 'FRICILLA PASOMBO', 2021),
(179, '21.023.55.202.014', 'SILFIA PERMATA SARI', 2021),
(180, '21.023.55.202.015', 'RIDWAN', 2021),
(181, '21.023.55.202.016', 'MUH FADHIL', 2021),
(182, '21.023.55.202.017', 'FERDIANSA', 2021),
(183, '21.023.55.202.018', 'YOBEL', 2021),
(184, '21.023.55.202.019', 'MUH. ARIF WAHID ', 2021),
(185, '21.023.55.202.020', 'BETRHAN RISTIAN. T', 2021),
(186, '21.023.55.202.021', 'FAUZAN DHAWI ADITYA PRATAMA', 2021),
(187, '21.023.55.202.022', 'RICO', 2021),
(188, '21.023.55.202.023', 'SAFIAH ', 2021),
(189, '21.023.55.202.024', 'IRWAN', 2021),
(190, '21.023.55.202.025', 'HUSNI', 2021),
(191, '21.023.55.202.026', 'YUSRA', 2021),
(192, '21.023.55.202.027', 'TUMBA NAYA', 2021),
(193, '21.023.55.202.028', 'HARTIYANTI', 2021),
(194, '21.023.55.202.029', 'RESKI', 2021),
(195, '21.023.55.202.030', 'MERLIN ', 2021),
(196, '21.023.55.202.031', 'YASNI ', 2021),
(197, '21.023.55.202.032', 'ESTER RANTE', 2021),
(198, '21.023.55.202.033', 'GLADIES NOVAYANTI', 2021),
(199, '21.023.55.202.034', 'PATRIANI NUR', 2021),
(200, '21.023.55.202.035', 'ASTRID', 2021),
(201, '21.023.55.202.036', 'NINA FITRI RAHMADANI', 2021),
(202, '21.023.55.202.037', 'ARHAM', 2021),
(203, '21.023.55.202.038', 'RIFKY ADITYA HARMANSYAH', 2021),
(204, '21.023.55.202.039', 'VERA MASEKKEN', 2021),
(205, '21.023.55.202.040', 'BETRIS AYU FATTA', 2021),
(206, '21.023.55.202.041', 'MUH ARWAN SUDIRMAN', 2021),
(207, '21.023.55.202.042', 'MUH IRWAN SUDIRMAN ', 2021),
(208, '21.023.55.202.043', 'ANISA', 2021),
(209, '21.023.55.202.044', 'SELVI NURAZIZAH ', 2021),
(210, '21.023.55.202.045', 'SRI WIYANTI ', 2021),
(211, '21.023.55.202.046', 'SASKIA RAHMADANI RISAL', 2021),
(212, '21.023.55.202.047', 'NUARMAN ', 2021),
(213, '21.023.55.202.048', 'MUH ASGAF HASIM', 2021),
(214, '21.023.55.202.049', 'WINGKY', 2021),
(215, '21.023.55.202.050', 'ABD. BASITH RIZKI ', 2021),
(216, '21.023.55.202.051', 'POPY YANTI PAKAN ', 2021),
(217, '21.023.55.202.052', 'MUH. MANNAN MA\'RUF \nTANDIOGA', 2021),
(218, '21.023.55.202.053', 'MASDIR MUNIR', 2021),
(219, '21.023.55.202.054', 'MUH. ERLANGGA TAMRIN ', 2021),
(220, '21.023.55.202.055', 'A. QAHIR JAWADI M. ', 2021),
(221, '21.023.55.202.056', 'NABILA AUDINA BUSTAM', 2021),
(222, '21.023.55.202.057', 'MUTIA', 2021),
(223, '21.023.55.202.058', 'DESI NIRMAL', 2021),
(224, '21.023.55.202.059', 'MUH. KHAFI RABSYAM', 2021),
(225, '21.023.55.202.060', 'AKBAR', 2021),
(226, '21.023.55.202.061', 'MUH. EDEN FAUZAN', 2021);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai_h`
--

CREATE TABLE `tb_nilai_h` (
  `id` int(11) NOT NULL,
  `kategori_lab` int(11) DEFAULT NULL,
  `nim` int(11) DEFAULT NULL,
  `nilai_tugas` int(11) DEFAULT NULL,
  `nilai_uas` int(11) DEFAULT NULL,
  `created_at` varchar(128) DEFAULT NULL,
  `updated_at` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_nilai_h`
--

INSERT INTO `tb_nilai_h` (`id`, `kategori_lab`, `nim`, `nilai_tugas`, `nilai_uas`, `created_at`, `updated_at`) VALUES
(1, 3, 1504411079, 90, 69, '26 May 2022', '26 May 2022'),
(2, 3, 1504411078, 90, 80, '26 May 2022', '26 May 2022'),
(3, 3, 1504411080, 90, 60, '26 May 2022', '26 May 2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai_s`
--

CREATE TABLE `tb_nilai_s` (
  `id` int(11) NOT NULL,
  `kategori_lab` int(11) DEFAULT NULL,
  `nim` int(11) DEFAULT NULL,
  `nilai_tugas` int(11) DEFAULT NULL,
  `nilai_uas` int(11) DEFAULT NULL,
  `created_at` varchar(128) DEFAULT NULL,
  `updated_at` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_nilai_s`
--

INSERT INTO `tb_nilai_s` (`id`, `kategori_lab`, `nim`, `nilai_tugas`, `nilai_uas`, `created_at`, `updated_at`) VALUES
(1, 4, 1504411060, 90, 70, '26 May 2022', '26 May 2022'),
(2, 4, 1504411061, 90, 80, '26 May 2022', '26 May 2022'),
(3, 4, 1504411062, 90, 60, '26 May 2022', '26 May 2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendaftaran_h`
--

CREATE TABLE `tb_pendaftaran_h` (
  `id` int(11) NOT NULL,
  `daftar_id` varchar(128) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `nim` varchar(13) DEFAULT NULL,
  `kelamin` varchar(128) DEFAULT NULL,
  `agama` varchar(128) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `kategori_lab` int(11) DEFAULT NULL,
  `semester` varchar(128) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nama_ortu` varchar(128) DEFAULT NULL,
  `pekerjaan_ortu` varchar(128) DEFAULT NULL,
  `alamat_ortu` text DEFAULT NULL,
  `kabupaten` varchar(128) DEFAULT NULL,
  `provinsi` varchar(128) DEFAULT NULL,
  `created_at` varchar(128) DEFAULT NULL,
  `updated_at` varchar(128) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `img_transaksi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pendaftaran_h`
--

INSERT INTO `tb_pendaftaran_h` (`id`, `daftar_id`, `nama`, `nim`, `kelamin`, `agama`, `kategori_id`, `kategori_lab`, `semester`, `alamat`, `nama_ortu`, `pekerjaan_ortu`, `alamat_ortu`, `kabupaten`, `provinsi`, `created_at`, `updated_at`, `foto`, `img_transaksi`) VALUES
(1, 'HW-2022/04/CH0DLG51AV', 'Adi Murdayani', '1504411077', 'Perempuan', 'Islam', 4, 3, 'Semester I', 'sdfasd', 'asdfasd', 'asdfa', 'sdfasdf', 'asdfas', 'dfasdf', '17-04-2022', NULL, NULL, '0'),
(2, 'HW-2022/05/F621Q5W025', 'Adi Murdayani', '1504411078', 'laki-laki', 'islam', 4, 3, 'semester 1', 'sukamaju', 'ibu', 'ortu', 'sukamaju', 'luwu utara', 'sulawesi selatan', '22-05-2022', NULL, NULL, '0'),
(4, 'HW-2022/05/0NXP5R4SLH', 'Asdfasdfasd', '1504411079', 'Perempuan', 'Islam', 4, 3, 'Semester IV', 'Asdfasdf', 'Asdfasd', 'Asdfasd', 'Fasdfasd', 'Yogyakarta', 'DI Yogyakarta', '22-05-2022', NULL, NULL, '0'),
(5, 'HW-2022/05/QS5YSDMCY1', 'Ade Irawan', '1504411080', 'Laki-Laki', 'Islam', 4, 3, 'Semester III', 'Palopo', 'Jakarta Utara', 'Adfkajksdf', 'Jahdfk', 'Kjahdfkas', 'DKI Jakarta', '25-05-2022', NULL, NULL, '0'),
(6, 'HW-2022/06/YJ6VSARTNQ', 'Sembarang', '1504411007123', 'Perempuan', 'Islam', 4, 3, 'Semester III', 'Sss', 'Jakarta Utara', 'Kasdfl', 'Lkadjfl', 'Lkjalsdf', 'DKI Jakarta', '03-06-2022', NULL, NULL, '0'),
(7, 'HW-2022/08/YM78Z0OKZR', 'Adi Murdayani', '2147483647', 'Laki-Laki', 'Islam', 4, 3, 'Semester I', 'asfasd', 'asdas', 'IRT (Ibu Rumah Tangga)', 'asfasd', 'asdfasd', 'Sulawesi Selatan', '17-08-2022', NULL, 'ce706895de9dd3d1e3da94b16d97e432.png', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendaftaran_s`
--

CREATE TABLE `tb_pendaftaran_s` (
  `id` int(11) NOT NULL,
  `daftar_id` varchar(128) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `nim` varchar(13) DEFAULT NULL,
  `kelamin` varchar(128) DEFAULT NULL,
  `agama` varchar(128) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `kategori_lab` int(11) DEFAULT NULL,
  `semester` varchar(128) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nama_ortu` varchar(128) DEFAULT NULL,
  `pekerjaan_ortu` varchar(128) DEFAULT NULL,
  `alamat_ortu` text DEFAULT NULL,
  `kabupaten` varchar(128) DEFAULT NULL,
  `provinsi` varchar(128) DEFAULT NULL,
  `created_at` varchar(128) DEFAULT NULL,
  `updated_at` varchar(128) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `img_transaksi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pendaftaran_s`
--

INSERT INTO `tb_pendaftaran_s` (`id`, `daftar_id`, `nama`, `nim`, `kelamin`, `agama`, `kategori_id`, `kategori_lab`, `semester`, `alamat`, `nama_ortu`, `pekerjaan_ortu`, `alamat_ortu`, `kabupaten`, `provinsi`, `created_at`, `updated_at`, `foto`, `img_transaksi`) VALUES
(1, 'SW-2022/04/74C27L97UZ', 'Adi Murdayani', '1504411060', 'Laki-Laki', 'Islam', 4, 4, 'Semester II', 'asdfasdf', 'asdfasd', 'fasdf', 'asdfasdf', 'asdf', 'asdfasd', '17-04-2022', '17-04-2022', NULL, NULL),
(3, 'SW-2022/05/864E95BEO3', 'Aasdfasdf', '1504411061', 'Perempuan', 'Islam', 4, 4, 'Semester IV', 'Asdfasdas', 'Asfasd', 'Asdfasd', 'Asdfasd', 'Tangerang', 'Banten', '22-05-2022', NULL, NULL, NULL),
(4, 'SW-2022/05/QU9Q5SR161', 'Dsfasdf', '1504411062', 'Perempuan', 'Kristen', 4, 4, 'Semester V', 'Asdfasdfsad', 'Rejang Lebong', 'Asdfasdf', 'Asdfsd', 'Fsadf', 'Bengkulu', '25-05-2022', NULL, NULL, NULL),
(5, 'SW-2022/08/RZQK2A02T7', 'Adi Murdayaniadsfs', '2147483647', 'Laki-Laki', 'Budha', 5, 4, 'Semester I', 'dfasdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', '17-08-2022', NULL, '7c0f1091aaf696bf7040cf2566bc29da.png', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_register`
--

CREATE TABLE `tb_register` (
  `id` int(11) NOT NULL,
  `nim` varchar(13) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `kelamin` varchar(128) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` varchar(128) DEFAULT NULL,
  `updated_at` varchar(128) DEFAULT NULL,
  `active` int(1) DEFAULT NULL,
  `dibaca` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_register`
--

INSERT INTO `tb_register` (`id`, `nim`, `nama`, `email`, `phone`, `kelamin`, `password`, `created_at`, `updated_at`, `active`, `dibaca`) VALUES
(3, '2147483647', 'Adi Murdayani', 'adimurdayani@gmail.com', '08123124312', 'Laki-Laki', '$2y$10$yZq4pF/jn1tqgVDaqL5wyO44h1E9TNM/6YBUFB7BX1cmeXTK8FqbK', '2022-05-08', '26 May 2022 10:58', 1, NULL),
(5, '2147483647', 'Admin', 'admin12312@gmail.com', '0812638172', 'Laki-Laki', '$2y$10$qPPz6SFFPg1aVw6FccwR8OOvXnYqWgaxerb.An2hyWEl/suyTZsTm', '2022-05-20', NULL, 0, NULL),
(7, '2147483647', 'Aldil', 'aldi@gmail.com', '081241231231', NULL, '$2y$10$pnbfhJ8TESeHYsl5Pr.jsOZeGM3ftlYym00Z6iJ5wwy4e8CWkCqb6', '20 May 2022 18:45', '20 May 2022 18:45', 0, NULL),
(10, '2147483647', 'Halim', 'halim@gmail.com', '081231241231', NULL, '$2y$10$BFNrgjninDuCXJJ4KyFNYeFAQ2JP/Oa5oqUDdiNDHiDLPmYfNxtrC', '20 May 2022 20:40', '20 May 2022 20:40', 0, NULL),
(11, '2147483647', 'Adi Murdayani', 'adimurdayani@gmail.com', '08123142312', NULL, '$2y$10$d9Sik9w.K4utj4Rv58ayzOpoubaaN3XIB94FZYtFeSnoVDxhs1o.G', '25 May 2022 21:03', '25 May 2022 21:03', 0, NULL),
(14, '1234567890123', 'Akbar', 'akbar@gmail.com', '081231423', NULL, '$2y$10$ZNrIyJR3bIGQ3d5EMqTit.DvWL.qhFSz28rQZjNC3a6MGOcDB4MjK', '05 Jun 2022 14:20', '2022-06-05', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sertifikat`
--

CREATE TABLE `tb_sertifikat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `kat_jur` int(11) DEFAULT NULL,
  `kat_prakt` int(11) DEFAULT NULL,
  `img_sertifikat` varchar(255) DEFAULT NULL,
  `created_at` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_visitor`
--

CREATE TABLE `tb_visitor` (
  `id` int(11) NOT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `os` varchar(128) DEFAULT NULL,
  `browser` varchar(128) DEFAULT NULL,
  `versi` varchar(128) DEFAULT NULL,
  `online` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_visitor`
--

INSERT INTO `tb_visitor` (`id`, `ip`, `date`, `hits`, `os`, `browser`, `versi`, `online`, `time`) VALUES
(1, '::1', '2022-04-11', 6, NULL, NULL, NULL, '1649674598', '2022-04-11 05:54:30'),
(2, '::1', '2022-05-08', 2, NULL, NULL, NULL, '1651999235', '2022-05-08 15:40:27'),
(3, '::1', '2022-05-09', 2, NULL, NULL, NULL, '1652089034', '2022-05-09 16:37:07'),
(4, '::1', '2022-05-10', 2, NULL, NULL, NULL, '1652157804', '2022-05-10 11:43:15'),
(5, '::1', '2022-05-12', 31, NULL, NULL, NULL, '1652331680', '2022-05-12 09:18:24'),
(6, '::1', '2022-05-17', 17, 'Windows 10', 'Chrome', '101.0.4951.54', '1652780843', '2022-05-17 16:05:58'),
(7, '::1', '2022-05-18', 4, 'Windows 10', 'Chrome', '101.0.4951.54', '1652867960', '2022-05-18 16:37:17'),
(8, '::1', '2022-05-19', 8, 'Windows 10', 'Chrome', '101.0.4951.67', '1652979458', '2022-05-19 01:09:02'),
(9, '::1', '2022-05-20', 10, 'Windows 10', 'Chrome', '101.0.4951.67', '1653065836', '2022-05-20 11:51:06'),
(10, '::1', '2022-05-22', 3, 'Windows 10', 'Chrome', '101.0.4951.67', '1653222108', '2022-05-22 19:21:42'),
(11, '::1', '2022-05-23', 3, 'Windows 10', 'Chrome', '101.0.4951.67', '1653243787', '2022-05-23 01:22:56'),
(12, '::1', '2022-05-24', 6, 'Windows 10', 'Chrome', '101.0.4951.67', '1653392024', '2022-05-24 01:42:00'),
(13, '::1', '2022-05-25', 8, 'Windows 10', 'Chrome', '101.0.4951.67', '1653495167', '2022-05-25 19:05:25'),
(14, '::1', '2022-05-26', 8, 'Windows 10', 'Chrome', '102.0.5005.62', '1653558200', '2022-05-26 09:58:32'),
(15, '::1', '2022-06-03', 3, 'Windows 10', 'Chrome', '102.0.5005.63', '1654233684', '2022-06-03 12:21:19'),
(16, '::1', '2022-06-04', 3, 'Windows 10', 'Chrome', '102.0.5005.63', '1654326975', '2022-06-04 14:15:25'),
(17, '::1', '2022-06-05', 6, 'Windows 10', 'Chrome', '102.0.5005.63', '1654426280', '2022-06-05 14:19:39'),
(18, '::1', '2022-08-15', 6, 'Windows 10', 'Chrome', '104.0.0.0', '1660572222', '2022-08-15 20:49:05'),
(19, '::1', '2022-08-16', 3, 'Windows 10', 'Chrome', '104.0.0.0', '1660667516', '2022-08-16 23:31:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$10$3/QfuZWLF6GbiWXxwXIbFuXkIMEikgKAltNqQiI6Ha.ugTjH.fRUy', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1660667516, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_informasi`
--
ALTER TABLE `tb_informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori_jurusan`
--
ALTER TABLE `tb_kategori_jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori_praktikum`
--
ALTER TABLE `tb_kategori_praktikum`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori_register`
--
ALTER TABLE `tb_kategori_register`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kelompok`
--
ALTER TABLE `tb_kelompok`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_konfigurasi`
--
ALTER TABLE `tb_konfigurasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_nilai_h`
--
ALTER TABLE `tb_nilai_h`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_lab` (`kategori_lab`);

--
-- Indeks untuk tabel `tb_nilai_s`
--
ALTER TABLE `tb_nilai_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_lab` (`kategori_lab`);

--
-- Indeks untuk tabel `tb_pendaftaran_h`
--
ALTER TABLE `tb_pendaftaran_h`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `kategori_lab` (`kategori_lab`);

--
-- Indeks untuk tabel `tb_pendaftaran_s`
--
ALTER TABLE `tb_pendaftaran_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `kategori_lab` (`kategori_lab`);

--
-- Indeks untuk tabel `tb_register`
--
ALTER TABLE `tb_register`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_sertifikat`
--
ALTER TABLE `tb_sertifikat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_visitor`
--
ALTER TABLE `tb_visitor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indeks untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_informasi`
--
ALTER TABLE `tb_informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori_jurusan`
--
ALTER TABLE `tb_kategori_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori_praktikum`
--
ALTER TABLE `tb_kategori_praktikum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori_register`
--
ALTER TABLE `tb_kategori_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_kelompok`
--
ALTER TABLE `tb_kelompok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_konfigurasi`
--
ALTER TABLE `tb_konfigurasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai_h`
--
ALTER TABLE `tb_nilai_h`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai_s`
--
ALTER TABLE `tb_nilai_s`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_pendaftaran_h`
--
ALTER TABLE `tb_pendaftaran_h`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_pendaftaran_s`
--
ALTER TABLE `tb_pendaftaran_s`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_register`
--
ALTER TABLE `tb_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_sertifikat`
--
ALTER TABLE `tb_sertifikat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_visitor`
--
ALTER TABLE `tb_visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_nilai_h`
--
ALTER TABLE `tb_nilai_h`
  ADD CONSTRAINT `tb_nilai_h_ibfk_2` FOREIGN KEY (`kategori_lab`) REFERENCES `tb_kategori_register` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_nilai_s`
--
ALTER TABLE `tb_nilai_s`
  ADD CONSTRAINT `tb_nilai_s_ibfk_2` FOREIGN KEY (`kategori_lab`) REFERENCES `tb_kategori_register` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_pendaftaran_h`
--
ALTER TABLE `tb_pendaftaran_h`
  ADD CONSTRAINT `tb_pendaftaran_h_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `tb_kategori_praktikum` (`id`),
  ADD CONSTRAINT `tb_pendaftaran_h_ibfk_2` FOREIGN KEY (`kategori_lab`) REFERENCES `tb_kategori_register` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_pendaftaran_s`
--
ALTER TABLE `tb_pendaftaran_s`
  ADD CONSTRAINT `tb_pendaftaran_s_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `tb_kategori_praktikum` (`id`),
  ADD CONSTRAINT `tb_pendaftaran_s_ibfk_2` FOREIGN KEY (`kategori_lab`) REFERENCES `tb_kategori_register` (`id`);

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
