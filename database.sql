-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 10 Jan 2025 pada 14.06
-- Versi server: 10.11.10-MariaDB-cll-lve
-- Versi PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ftuq9987_absensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `NIDN` bigint(20) NOT NULL DEFAULT 0,
  `JADWAL` varchar(50) NOT NULL DEFAULT '',
  `KETERANGAN` varchar(50) NOT NULL DEFAULT '',
  `NAMA` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`NIDN`, `JADWAL`, `KETERANGAN`, `NAMA`) VALUES
(22012093, 'Sunday, 22-12-2024 01:18:14 pm', 'Hadir', 'fahrizal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_1a_2025_01_02`
--

CREATE TABLE `absensi_1a_2025_01_02` (
  `ID_ABSEN` int(11) NOT NULL,
  `GURU` varchar(50) DEFAULT NULL,
  `SISWA` varchar(50) DEFAULT NULL,
  `TANGGAL` varchar(50) DEFAULT NULL,
  `STATUS` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_1a_2025_01_04`
--

CREATE TABLE `absensi_1a_2025_01_04` (
  `ID_ABSEN` int(11) NOT NULL,
  `GURU` varchar(50) DEFAULT NULL,
  `SISWA` varchar(50) DEFAULT NULL,
  `TANGGAL` varchar(50) DEFAULT NULL,
  `STATUS` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_2b_2025_01_02`
--

CREATE TABLE `absensi_2b_2025_01_02` (
  `ID_ABSEN` int(11) NOT NULL,
  `GURU` varchar(50) DEFAULT NULL,
  `SISWA` varchar(50) DEFAULT NULL,
  `TANGGAL` varchar(50) DEFAULT NULL,
  `STATUS` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_3a_2025_01_02`
--

CREATE TABLE `absensi_3a_2025_01_02` (
  `ID_ABSEN` int(11) NOT NULL,
  `GURU` varchar(50) DEFAULT NULL,
  `SISWA` varchar(50) DEFAULT NULL,
  `TANGGAL` varchar(50) DEFAULT NULL,
  `STATUS` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_4b_2025_01_02`
--

CREATE TABLE `absensi_4b_2025_01_02` (
  `ID_ABSEN` int(11) NOT NULL,
  `GURU` varchar(50) DEFAULT NULL,
  `SISWA` varchar(50) DEFAULT NULL,
  `TANGGAL` varchar(50) DEFAULT NULL,
  `STATUS` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_5a_2025_01_02`
--

CREATE TABLE `absensi_5a_2025_01_02` (
  `ID_ABSEN` int(11) NOT NULL,
  `GURU` varchar(50) DEFAULT NULL,
  `SISWA` varchar(50) DEFAULT NULL,
  `TANGGAL` varchar(50) DEFAULT NULL,
  `STATUS` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_6b_2025_01_02`
--

CREATE TABLE `absensi_6b_2025_01_02` (
  `ID_ABSEN` int(11) NOT NULL,
  `GURU` varchar(50) DEFAULT NULL,
  `SISWA` varchar(50) DEFAULT NULL,
  `TANGGAL` varchar(50) DEFAULT NULL,
  `STATUS` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `NIDN` int(100) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `JK` varchar(50) NOT NULL DEFAULT '',
  `TGL_LAHIR` date NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `NO_HP` varchar(15) NOT NULL,
  `FOTO` varchar(255) NOT NULL,
  `AGAMA` varchar(20) NOT NULL,
  `ALAMAT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`NIDN`, `NAME`, `JK`, `TGL_LAHIR`, `EMAIL`, `PASSWORD`, `NO_HP`, `FOTO`, `AGAMA`, `ALAMAT`) VALUES
(1, 'weny', 'Perempuan', '2024-12-14', 'dinitanjung256@gmail.com', '$2y$10$jjQwgS7i3q.q8dOo5UNIYOn7Vl6D7S9zoSYUc3lnWLwU8As/U.OiC', '081261852274', 'OIP.jpeg', 'ISLAM', 'bb'),
(111, 'Dini', 'Perempuan', '2024-12-28', 'dinitanjung52@gmail.com', '$2y$10$RuH/hkIHnGFEVk5R.v8hfeRYk/eZr5BQnnl1NEIbOGXI6MN/QLL7.', '081269922174', 'IMG-20241228-WA0041.jpg', 'Islam', 'Bb'),
(12345, 'supraitno', 'Perempuan', '2024-12-26', 'hahahaha@gmail.com', '$2y$10$Eo28wT8s2Ww8Slf1lB1CleTTpyHDQKFGIDeEovnUExNpO4Sd6Bgg6', '08928263738', 'IMG-20241224-WA0009.jpg', 'islam', 'Tanjung tiram'),
(22012003, 'EMI DEA ', 'Perempuan', '2024-12-14', 'emidea670@gmail.com', '$2y$10$sR1UmG4YeGTNTJOtX8KRuuvlEIJ.LFRjM1Ge63WZ100Ka.ApWH9li', '083847044610', 'IMG-20241213-WA0187.jpg', 'Islam', 'Limapuluh ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `ID` int(15) NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  `JK` varchar(50) NOT NULL DEFAULT '',
  `KELAS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`ID`, `NAMA`, `JK`, `KELAS`) VALUES
(18, 'Citra', 'Perempuan', '1a'),
(19, 'Dodi', 'Laki-laki', '1a'),
(21, 'Fani', 'Perempuan', '2b'),
(22, 'Gilang', 'Laki-laki', '2b'),
(23, 'Hana', 'Perempuan', '2b'),
(24, 'Ihsan', 'Laki-laki', '2b'),
(25, 'Jihan', 'Perempuan', '2b'),
(26, 'Kiki', 'Perempuan', '3a'),
(27, 'Lukman', 'Laki-laki', '3a'),
(28, 'Mira', 'Perempuan', '3a'),
(29, 'Naufal', 'Laki-laki', '3a'),
(30, 'Olivia', 'Perempuan', '3a'),
(31, 'Putri', 'Perempuan', '4b'),
(32, 'Qori', 'Perempuan', '4b'),
(33, 'Rian', 'Laki-laki', '4b'),
(34, 'Siti', 'Perempuan', '4b'),
(35, 'Tomi', 'Laki-laki', '4b'),
(36, 'Umi', 'Perempuan', '5a'),
(37, 'Vino', 'Laki-laki', '5a'),
(38, 'Wulan', 'Perempuan', '5a'),
(39, 'Xander', 'Laki-laki', '5a'),
(40, 'Yuni', 'Perempuan', '5a'),
(41, 'Zaki', 'Laki-laki', '6b'),
(42, 'Alya', 'Perempuan', '6b'),
(43, 'Bagus', 'Laki-laki', '6b'),
(44, 'Cindy', 'Perempuan', '6b'),
(45, 'Dion', 'Laki-laki', '6b'),
(56, 'romeo', 'Laki-laki', '1a'),
(57, 'Emi ', 'Perempuan', '1a'),
(59, 'Dinoa', 'Perempuan', '4b'),
(60, 'tini', 'Perempuan', '1a'),
(61, 'pino', 'Laki-laki', '1a'),
(62, 'weny', 'Perempuan', '1a'),
(63, 'anggi', 'Perempuan', '2b'),
(64, 'arya', 'Laki-laki', '1a'),
(65, 'arjoni', 'Laki-laki', '2b'),
(66, 'jono', 'Laki-laki', '2b'),
(67, 'fahri', 'Laki-laki', '2b'),
(68, 'jelita', 'Perempuan', '2b'),
(69, 'jema', 'Perempuan', '3a'),
(70, 'zakia', 'Perempuan', '3a'),
(71, 'zaki', 'Laki-laki', '3a'),
(72, 'aryo', 'Perempuan', '3a'),
(73, 'alesha', 'Perempuan', '3a'),
(74, 'wawan', 'Laki-laki', '4b'),
(75, 'khairul', 'Laki-laki', '4b'),
(76, 'ferry', 'Perempuan', '4b'),
(77, 'jenny', 'Perempuan', '4b'),
(78, 'jimi', 'Laki-laki', '5a'),
(79, 'pillut', 'Laki-laki', '5a'),
(80, 'jeje', 'Perempuan', '5a'),
(81, 'mawar', 'Perempuan', '5a'),
(82, 'alol', 'Laki-laki', '5a'),
(83, 'melati', 'Perempuan', '6b'),
(84, 'anggrek', 'Perempuan', '6b'),
(85, 'udin', 'Laki-laki', '1a'),
(86, 'mahmuda', 'Laki-laki', '1a'),
(87, 'dini farhatun', 'Perempuan', '6b'),
(88, 'juju', 'Perempuan', '6b'),
(89, 'honny', 'Perempuan', '6b');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`NIDN`) USING BTREE;

--
-- Indeks untuk tabel `absensi_1a_2025_01_02`
--
ALTER TABLE `absensi_1a_2025_01_02`
  ADD PRIMARY KEY (`ID_ABSEN`);

--
-- Indeks untuk tabel `absensi_1a_2025_01_04`
--
ALTER TABLE `absensi_1a_2025_01_04`
  ADD PRIMARY KEY (`ID_ABSEN`);

--
-- Indeks untuk tabel `absensi_2b_2025_01_02`
--
ALTER TABLE `absensi_2b_2025_01_02`
  ADD PRIMARY KEY (`ID_ABSEN`);

--
-- Indeks untuk tabel `absensi_3a_2025_01_02`
--
ALTER TABLE `absensi_3a_2025_01_02`
  ADD PRIMARY KEY (`ID_ABSEN`);

--
-- Indeks untuk tabel `absensi_4b_2025_01_02`
--
ALTER TABLE `absensi_4b_2025_01_02`
  ADD PRIMARY KEY (`ID_ABSEN`);

--
-- Indeks untuk tabel `absensi_5a_2025_01_02`
--
ALTER TABLE `absensi_5a_2025_01_02`
  ADD PRIMARY KEY (`ID_ABSEN`);

--
-- Indeks untuk tabel `absensi_6b_2025_01_02`
--
ALTER TABLE `absensi_6b_2025_01_02`
  ADD PRIMARY KEY (`ID_ABSEN`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`NIDN`) USING BTREE;

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi_1a_2025_01_02`
--
ALTER TABLE `absensi_1a_2025_01_02`
  MODIFY `ID_ABSEN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `absensi_1a_2025_01_04`
--
ALTER TABLE `absensi_1a_2025_01_04`
  MODIFY `ID_ABSEN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `absensi_2b_2025_01_02`
--
ALTER TABLE `absensi_2b_2025_01_02`
  MODIFY `ID_ABSEN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `absensi_3a_2025_01_02`
--
ALTER TABLE `absensi_3a_2025_01_02`
  MODIFY `ID_ABSEN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `absensi_4b_2025_01_02`
--
ALTER TABLE `absensi_4b_2025_01_02`
  MODIFY `ID_ABSEN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `absensi_5a_2025_01_02`
--
ALTER TABLE `absensi_5a_2025_01_02`
  MODIFY `ID_ABSEN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `absensi_6b_2025_01_02`
--
ALTER TABLE `absensi_6b_2025_01_02`
  MODIFY `ID_ABSEN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
