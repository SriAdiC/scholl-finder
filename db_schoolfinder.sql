-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jun 2020 pada 07.24
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_schoolfinder`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekskul`
--

CREATE TABLE `ekskul` (
  `id` int(11) NOT NULL,
  `nama_ekskul` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ekskul`
--

INSERT INTO `ekskul` (`id`, `nama_ekskul`) VALUES
(1, 'Musik'),
(2, 'Tari'),
(3, 'Paskibra'),
(4, 'PMR'),
(5, 'Futsal'),
(6, 'Sepak Bola'),
(7, 'Karate'),
(8, 'Basket');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'MIPA'),
(2, 'IPS'),
(3, 'Teknik Komputer Dan Jaringan (TKJ)'),
(4, 'Teknik Kontruksi Bangunan (TKB)'),
(5, 'Teknik Instalasi Listrik (TIL)'),
(6, 'Teknik Pemesinan (TPM)'),
(7, 'Teknik Kendaraan Ringan (TKR)'),
(8, 'Teknik Sepeda Motor (TSM)'),
(9, 'Rekayasa Perangkat Lunak (RPL)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE `sekolah` (
  `id` int(11) NOT NULL,
  `npsn` varchar(50) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `akreditasi` varchar(1) NOT NULL,
  `status` enum('NEGERI','SWASTA') NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `kurikulum` varchar(100) NOT NULL,
  `sarpras` text NOT NULL,
  `website` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_telp` char(12) DEFAULT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sekolah`
--

INSERT INTO `sekolah` (`id`, `npsn`, `nama`, `akreditasi`, `status`, `alamat`, `kurikulum`, `sarpras`, `website`, `email`, `no_telp`, `foto`) VALUES
(1, '20523835', 'SMAN BALUNG', 'A', 'NEGERI', 'JL. PB. SUDIRMAN NO. 126', 'Kurikulum 2013', 'Masjid, Arena Olahraga, UKS', 'http://www.sman1balung.sch.id', 'info@sman1balung.sch.id', '0336622577', 'sekolah.jpg'),
(2, '20523814', 'SMAS BAITUL ARQOM', 'A', 'SWASTA', 'JL. KARANG DUREN NO. 32', 'Kurikulum 2013', '', 'http://www.smabatar.sch.id', 'smabaitularqom1979@gmail.com', '0336621920', 'sekolah1.jpg'),
(4, '20523838', 'SMAS SATYA DHARMA', 'B', 'SWASTA', 'JL. PUGER 20', 'Kurikulum 2013', '', 'http://smasatyadharmabalungjember.blogspot.com/', 'smasatyadharma77@yahoo.com', '', 'sekolah2.jpg'),
(5, '69903815', 'SMKS ABDUL AZIZ', 'B', 'SWASTA', 'JL KAKAK TUA NO 17', 'Kurikulum 2013', '', 'http://www.coba.sch.id', 'smkabdaz@gmail.com', '', 'sekolah.jpg'),
(6, '20566299', 'SMKS AS SALAFI BALUNG', 'C', 'SWASTA', 'JL. PESANTREN KRAJAN BALUNG KIDUL', 'Kurikulum 2013', '', 'http://www.smkassalafi_balung.com', 'smkassalafi_balung@yahoo.com', '', 'sekolah.jpg'),
(7, '69888724', 'SMKS ASH - SHIDDIQI', 'C', 'SWASTA', 'JL DUSUN KRAJAN KIDUL DESA CURAHLELE', 'Kurikulum 2013', '', 'http://smkashshiddiqijember.blogspot.com', 'smkashshiddiqi@gmail.com', '03313196694', 'sekolah3.jpg'),
(8, '69830075', 'SMKS BUSTANUL ULUM', 'C', 'SWASTA', 'Jl. Sholehuddin No. 11', 'Kurikulum 2013', '', '', 'smkbustanululumbalung@gmail.com', '', 'SMK_Bustanul_Ulum_Balung_Jember.jpg'),
(9, '20555091', 'SMKS SUNAN GIRI', 'B', 'SWASTA', 'JL. KH. ABDUL AZIZ NO.78 - BALUNG', 'Kurikulum 2013', '', '', 'Smksunan_giri@yahoo.com', '0336621110', 'sekolah.jpg'),
(10, '20523758', 'SMKS TEKNOLOGI BALUNG', 'A', 'SWASTA', 'RAMBIPUJI NO.33', 'Kurikulum 2013', 'Lab Praktikum, Masjid, Arena Olahraga, UKS, Perpustakaan', 'https://stmbalung99.wordpress.com/', 'smkt_balung@yahoo.com', '0336622259', 'smk teknologi.jpg'),
(11, '20583914', 'SMKS ZAINUL HASAN', 'B', 'SWASTA', 'JL. PERJUANGAN NO.10 BALUNG LOR', 'Kurikulum 2013', '', 'http://www.smkzahabalung.wordpress.com', 'zahasmk@gmail.com', '', 'sekolah.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah_ekskul`
--

CREATE TABLE `sekolah_ekskul` (
  `id` int(11) NOT NULL,
  `id_ekskul` int(11) NOT NULL,
  `sekolah_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sekolah_ekskul`
--

INSERT INTO `sekolah_ekskul` (`id`, `id_ekskul`, `sekolah_id`) VALUES
(1, 5, 10),
(2, 7, 10),
(3, 6, 10),
(4, 8, 10),
(5, 3, 10),
(6, 5, 1),
(7, 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah_jurusan`
--

CREATE TABLE `sekolah_jurusan` (
  `id` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sekolah_jurusan`
--

INSERT INTO `sekolah_jurusan` (`id`, `id_sekolah`, `id_jurusan`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2),
(5, 4, 1),
(6, 4, 2),
(7, 7, 3),
(8, 10, 4),
(9, 10, 5),
(10, 10, 6),
(11, 10, 7),
(12, 10, 8),
(13, 10, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(7, 'faruk goodboy', 'farukhgoodboy2@gmail.com', 'aku.jpg', '$2y$10$eyebgAWywcJgV.nHdbZSjea8sxamq4PTpgFny9eZRBL0z7/owM7LC', 1, 1, 1564548722),
(8, 'fauzi', 'deimon.fauzi7@gmail.com', 'default.png', '$2y$10$5OD21o4kPBacLbefS2KLI.EyYKJq.XBmYFPtVtxiYW5d2Y2q4vjJ.', 2, 1, 1564619378),
(17, 'farel', 'farukhajjah@gmail.com', 'guest2.png', '$2y$10$oDGu0ni3PtXuGmDlXQ8tc.UPNRjj1L3BdpqKSlEdbEYcUyKOV0mwm', 2, 1, 1567662554),
(23, 'aku', 'faruksmkn8@gmail.com', 'default.jpg', '$2y$10$T9qQ6N6gDLcxKm0MS3wY/u5u7S6QPEyi55dcmW40Q5sWGCIkObXQW', 2, 0, 1569480266),
(24, 'Sri Adi Cahyono', '21sacah002@gmail.com', 'compress.jpg', '$2y$10$OtvV0FPSnDRUZJkmaoX14Ogij./wya783SNlJj1tp.XT4WYdLbMIi', 1, 1, 1591677139);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(5, 1, 8),
(6, 3, 2),
(7, 3, 8),
(8, 3, 3),
(10, 1, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(10, 'Sppk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(6, 'bagianku');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'SubMenuManagement', 'menu/subMenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(14, 8, 'tambah teman', 'teman/temanku', 'fas fa-fw-fab-youtube', 1),
(15, 10, 'Data Sekolah', 'sppk', 'fas fa-fw fa-school', 1),
(16, 10, 'Pembobotan', 'sppk/pembobotan', 'fas fa-fw fa-balance-scale', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(15, 'faruksmkn8@gmail.com', 'GBZrgB4MwY3g9cVOCvdepKGIRzNRjN/K2Nzht9/fULQ=', 1569480266),
(16, '21sacah002@gmail.com', 'td6pu5aFGeD/47dQEKTPfuHii3KtUJiB+/a5zuvZMM4=', 1591677139);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ekskul`
--
ALTER TABLE `ekskul`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sekolah_ekskul`
--
ALTER TABLE `sekolah_ekskul`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_eksul` (`id_ekskul`);

--
-- Indeks untuk tabel `sekolah_jurusan`
--
ALTER TABLE `sekolah_jurusan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idSekolah` (`id_sekolah`),
  ADD KEY `fk_idJurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ekskul`
--
ALTER TABLE `ekskul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `sekolah_ekskul`
--
ALTER TABLE `sekolah_ekskul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `sekolah_jurusan`
--
ALTER TABLE `sekolah_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `sekolah_ekskul`
--
ALTER TABLE `sekolah_ekskul`
  ADD CONSTRAINT `fk_eksul` FOREIGN KEY (`id_ekskul`) REFERENCES `ekskul` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sekolah_jurusan`
--
ALTER TABLE `sekolah_jurusan`
  ADD CONSTRAINT `fk_idJurusan` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idSekolah` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
