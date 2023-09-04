-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Agu 2023 pada 04.49
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmagang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detailnilai_pam`
--

CREATE TABLE `tb_detailnilai_pam` (
  `detailID` int(11) NOT NULL,
  `magangID` int(11) NOT NULL,
  `sosial` float NOT NULL,
  `adaptasi` float NOT NULL,
  `komunikasi` float NOT NULL,
  `kerjasama` float NOT NULL,
  `disiplin` float NOT NULL,
  `tanggungjawab` float NOT NULL,
  `pemahaman` float NOT NULL,
  `solutif` float NOT NULL,
  `kreatif` float NOT NULL,
  `hasilkerja` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_detailnilai_pam`
--

INSERT INTO `tb_detailnilai_pam` (`detailID`, `magangID`, `sosial`, `adaptasi`, `komunikasi`, `kerjasama`, `disiplin`, `tanggungjawab`, `pemahaman`, `solutif`, `kreatif`, `hasilkerja`) VALUES
(2, 10, 90, 85, 80, 90, 95, 85, 88, 95, 90, 80),
(3, 24, 80, 90, 80, 90, 80, 90, 90, 80, 90, 90);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detailnilai_pem`
--

CREATE TABLE `tb_detailnilai_pem` (
  `detailID` int(11) NOT NULL,
  `magangID` int(11) NOT NULL,
  `penulisan` float NOT NULL,
  `kelengkapan` float NOT NULL,
  `kesesuaian` float NOT NULL,
  `presentasi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_detailnilai_pem`
--

INSERT INTO `tb_detailnilai_pem` (`detailID`, `magangID`, `penulisan`, `kelengkapan`, `kesesuaian`, `presentasi`) VALUES
(1, 10, 90, 90, 90, 80),
(3, 24, 80, 90, 80, 90);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_industri`
--

CREATE TABLE `tb_industri` (
  `industriID` int(11) NOT NULL,
  `namaindustri` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(30) NOT NULL,
  `kuota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_industri`
--

INSERT INTO `tb_industri` (`industriID`, `namaindustri`, `alamat`, `kontak`, `kuota`) VALUES
(1, 'Dinas Kominfo Sumbar', 'Jl. Pramuka Raya No.11A, Lolong Belanti, Kec. Padang Utara, Kota Padang, Sumatera Barat', '0821xxxxxxx', 0),
(2, 'Dinas Pendidikan Sumbar', 'Jalan Bagindo Aziz Chan No. 8 Padang Timur, Alang Laweh, Kec. Padang Sel., Kota Padang, Sumatera Barat ', '0812xxxxxxxx', 2),
(3, 'PT. KUNANGO JANTAN', 'Komp. Mela, Jl. Tuanku Tambusai, Tengkerang Bar., Kec. Marpoyan Damai, Kota Pekanbaru, Riau', '08111213876', 2),
(4, 'PT Semen Padang', 'Jl. Raya Indarung, Indarung, Kec. Lubuk Kilangan, Kota Padang, Sumatera Barat 25157', '0800 1088888', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `laporanID` int(11) NOT NULL,
  `magangID` int(11) NOT NULL,
  `laporan` varchar(100) NOT NULL,
  `tgl_upload` date NOT NULL,
  `validasi_pem` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_laporan`
--

INSERT INTO `tb_laporan` (`laporanID`, `magangID`, `laporan`, `tgl_upload`, `validasi_pem`, `keterangan`) VALUES
(13, 27, 'SuratIzinMagang_20100064 (1)_7.pdf', '2023-08-21', 'proses', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_logbook`
--

CREATE TABLE `tb_logbook` (
  `logbookID` int(11) NOT NULL,
  `magangID` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `aktivitas` varchar(128) NOT NULL,
  `dokumentasi` varchar(100) NOT NULL,
  `valid_pem` varchar(100) NOT NULL,
  `valid_pam` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_logbook`
--

INSERT INTO `tb_logbook` (`logbookID`, `magangID`, `tanggal`, `aktivitas`, `dokumentasi`, `valid_pem`, `valid_pam`) VALUES
(9, 27, '2023-08-21', 'Melakukan input data peminjaman infokus', 'IL_1.png', '0', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_magang`
--

CREATE TABLE `tb_magang` (
  `magangID` int(11) NOT NULL,
  `mahasiswaID` int(11) NOT NULL,
  `pembimbingID` int(11) NOT NULL,
  `pamongID` int(11) NOT NULL,
  `industriID` int(11) NOT NULL,
  `periodeID` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `suratbalasan` varchar(30) NOT NULL,
  `status_pembimbing` varchar(30) NOT NULL,
  `qrcode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_magang`
--

INSERT INTO `tb_magang` (`magangID`, `mahasiswaID`, `pembimbingID`, `pamongID`, `industriID`, `periodeID`, `status`, `suratbalasan`, `status_pembimbing`, `qrcode`) VALUES
(27, 1, 7, 20, 1, 1, 'diterima', 'SuratIzinMagang_20100064 (1).p', 'diterima', '-'),
(28, 3, 10, 0, 1, 1, 'diterima', 'SuratIzinMagang_20100064 (1)_1', 'diterima', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `mahasiswaID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nim` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`mahasiswaID`, `userID`, `nama`, `nim`) VALUES
(1, 1, 'Azizi Azwir Aknul', '20100064'),
(2, 2, 'Yogi Pramana', '20100076'),
(3, 4, 'Nurrahma Yomi', '20100065'),
(4, 7, 'Adyanul Fauzia', '21050037'),
(5, 25, 'Dantik Fermata Zari', '19100006'),
(6, 26, 'Afifah Nabila', '19100035'),
(7, 28, 'Fadli Cahyadi', '19100104'),
(8, 31, 'Roynaldo Siahaan', '21100139');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `nilaiID` int(11) NOT NULL,
  `magangID` int(11) NOT NULL,
  `status_nilai_pem` varchar(10) NOT NULL,
  `nilai_pembimbing` float NOT NULL,
  `status_nilai_pam` varchar(10) NOT NULL,
  `nilai_pamong` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_nilai`
--

INSERT INTO `tb_nilai` (`nilaiID`, `magangID`, `status_nilai_pem`, `nilai_pembimbing`, `status_nilai_pam`, `nilai_pamong`, `total`) VALUES
(1, 10, 'ok', 87.5, 'ok', 87.8, 87.6),
(4, 24, 'ok', 85, 'ok', 86, 85.5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pamong`
--

CREATE TABLE `tb_pamong` (
  `pamongID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `namapam` varchar(30) NOT NULL,
  `nidn` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pamong`
--

INSERT INTO `tb_pamong` (`pamongID`, `userID`, `namapam`, `nidn`) VALUES
(20, 38, 'Zainuddin', '9126321324');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembimbing`
--

CREATE TABLE `tb_pembimbing` (
  `pembimbingID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `namapemb` varchar(30) NOT NULL,
  `nid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pembimbing`
--

INSERT INTO `tb_pembimbing` (`pembimbingID`, `userID`, `namapemb`, `nid`) VALUES
(6, 5, 'Dr. Adlia Alfiriani, M.Pd', '1024048702'),
(7, 6, 'Anggri Yulio Pernanda, M.Kom', '1001079301'),
(8, 33, 'Thomson Mary, M.Kom', '1017058002'),
(9, 34, 'Rahayu T Untari, M.Kom', '1019028901'),
(10, 35, 'Irsyadunas, M.Pd,T', '1007049201');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_periode`
--

CREATE TABLE `tb_periode` (
  `periodeID` int(11) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `tgl_mulai_daftar` date NOT NULL,
  `tgl_akhir_daftar` date NOT NULL,
  `status` enum('Aktif','Non aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_periode`
--

INSERT INTO `tb_periode` (`periodeID`, `tahun`, `semester`, `tgl_mulai`, `tgl_selesai`, `tgl_mulai_daftar`, `tgl_akhir_daftar`, `status`) VALUES
(1, '2023', 'Ganjil', '2024-09-01', '2024-11-01', '2024-08-01', '2024-08-30', 'Aktif'),
(2, '2023', 'Genap', '2024-09-01', '2024-11-01', '2024-08-01', '2024-08-30', 'Non aktif'),
(3, '2024', 'Ganjil', '2024-09-01', '2024-11-01', '2024-08-01', '2024-08-30', 'Non aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_syarat`
--

CREATE TABLE `tb_syarat` (
  `syaratID` int(11) NOT NULL,
  `mahasiswaID` int(11) NOT NULL,
  `sim` float NOT NULL,
  `jarkom` float NOT NULL,
  `desaingrafis` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_syarat`
--

INSERT INTO `tb_syarat` (`syaratID`, `mahasiswaID`, `sim`, `jarkom`, `desaingrafis`) VALUES
(1, 2, 80, 90, 75),
(2, 1, 95, 80, 85),
(4, 3, 70, 75, 80),
(5, 4, 80, 90, 70),
(6, 5, 20, 90, 75),
(7, 6, 80, 85, 80),
(8, 7, 80, 80, 85),
(9, 8, 90, 90, 85);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `userID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`userID`, `username`, `password`, `role`) VALUES
(1, '20100064', '$2y$10$dG7rS.GZQbFaeUbSdNWfTuI7.8gk/jje84jUNMN8/.8ZRfMoC.s1W', 'mahasiswa'),
(2, '20100076', '$2y$10$A2j/ezXZg2PXE7Um12p3eedBplnNpcvWwBvMR0vGk/R/loFovmaXu', 'mahasiswa'),
(3, 'admin', '$2y$10$PJqzQde7wrSwTpqm0YGspOxInqyRyNL3GXkAUS..X2d.LJTkE6a2m', 'admin'),
(4, '20100065', '$2y$10$iDDxBEl0BlK2CizVkwWgUe8Ox5LMOIt68Qz1TCwtTQOGkHJDJg32K', 'mahasiswa'),
(5, 'pembimbing1', '$2y$10$6sDzb111kbdXnyy1YQf6L.vSTTRyui/8q0Foe4n/7UoYANd4n9.DO', 'pembimbing'),
(6, 'pembimbing2', '$2y$10$kp4Ym2sAc7h1CkclmkgS8uo/O.UEX/Z5HBMfQRn3YR83Wn/fl8.6K', 'pembimbing'),
(7, '21050037', '$2y$10$eLnjwydvOf2MNhrneCflQe.4.dl2Q0nvU4.dPdeAZmMcEtob/BiiK', 'mahasiswa'),
(25, '19100006', '$2y$10$wihjKrQH/hzqP.mVg6QuWecR5Kcn97NaxYip9GSp.Z7PM0Km3JLwy', 'mahasiswa'),
(26, '19100035', '$2y$10$gK5Rbb8Ih.Y9N8eMD6LWO.QMyyVZFlKb2kXZ9AUtKB0hKpXW1WPP6', 'mahasiswa'),
(28, '19100104', '$2y$10$IBQo58m4DVwZDGZhmKtCxulHG0wgOkChf1yUHojErigAwE.Axl1Pe', 'mahasiswa'),
(31, '21100139', '$2y$10$iGwyX8HHrHkEbGzJ3SikKezZvs.vNL5iT1/wAFEBgaNGjmx7n2u7i', 'mahasiswa'),
(33, 'pembimbing3', '$2y$10$4pECqmJMT2/bZX3DWcBe9uDktCfTqLiH3TU.ystJKx./3IpvVu4ge', 'pembimbing'),
(34, 'pembimbing4', '$2y$10$Y4BxIPZN2qVbTg6Fszface7MW69fZytKM1cqCSDWWn28k3rZ2lDca', 'pembimbing'),
(35, 'pembimbing5', '$2y$10$V.uwhvF1v5Kohs6ZBTweWuYeZykVHs589rMi9i0SPP.C3GqYMF1dW', 'pembimbing'),
(38, '82205975', '$2y$10$PG.gZ9fk6qxn.39C2tdPZO3Tat6RT0Xz2W1AVwuYWjFmzZk9/gVnS', 'pamong');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_detailnilai_pam`
--
ALTER TABLE `tb_detailnilai_pam`
  ADD PRIMARY KEY (`detailID`);

--
-- Indeks untuk tabel `tb_detailnilai_pem`
--
ALTER TABLE `tb_detailnilai_pem`
  ADD PRIMARY KEY (`detailID`);

--
-- Indeks untuk tabel `tb_industri`
--
ALTER TABLE `tb_industri`
  ADD PRIMARY KEY (`industriID`);

--
-- Indeks untuk tabel `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`laporanID`);

--
-- Indeks untuk tabel `tb_logbook`
--
ALTER TABLE `tb_logbook`
  ADD PRIMARY KEY (`logbookID`);

--
-- Indeks untuk tabel `tb_magang`
--
ALTER TABLE `tb_magang`
  ADD PRIMARY KEY (`magangID`);

--
-- Indeks untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`mahasiswaID`);

--
-- Indeks untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`nilaiID`);

--
-- Indeks untuk tabel `tb_pamong`
--
ALTER TABLE `tb_pamong`
  ADD PRIMARY KEY (`pamongID`);

--
-- Indeks untuk tabel `tb_pembimbing`
--
ALTER TABLE `tb_pembimbing`
  ADD PRIMARY KEY (`pembimbingID`);

--
-- Indeks untuk tabel `tb_periode`
--
ALTER TABLE `tb_periode`
  ADD PRIMARY KEY (`periodeID`);

--
-- Indeks untuk tabel `tb_syarat`
--
ALTER TABLE `tb_syarat`
  ADD PRIMARY KEY (`syaratID`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_detailnilai_pam`
--
ALTER TABLE `tb_detailnilai_pam`
  MODIFY `detailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_detailnilai_pem`
--
ALTER TABLE `tb_detailnilai_pem`
  MODIFY `detailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_industri`
--
ALTER TABLE `tb_industri`
  MODIFY `industriID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_laporan`
--
ALTER TABLE `tb_laporan`
  MODIFY `laporanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_logbook`
--
ALTER TABLE `tb_logbook`
  MODIFY `logbookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_magang`
--
ALTER TABLE `tb_magang`
  MODIFY `magangID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `mahasiswaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `nilaiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_pamong`
--
ALTER TABLE `tb_pamong`
  MODIFY `pamongID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_pembimbing`
--
ALTER TABLE `tb_pembimbing`
  MODIFY `pembimbingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_periode`
--
ALTER TABLE `tb_periode`
  MODIFY `periodeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_syarat`
--
ALTER TABLE `tb_syarat`
  MODIFY `syaratID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
