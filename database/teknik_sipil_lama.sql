-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jan 2021 pada 03.52
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teknik_sipil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bimbingan`
--

CREATE TABLE `bimbingan` (
  `id_bimbingan` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `keterangan` varchar(1000) NOT NULL,
  `files` varchar(255) NOT NULL,
  `tgl_bimbingan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bimbingan`
--

INSERT INTO `bimbingan` (`id_bimbingan`, `id_mhs`, `id_dosen`, `nim`, `nip`, `keterangan`, `files`, `tgl_bimbingan`) VALUES
(16, 15, 6, 20323091, '2147483647', 'jangan', 'Toni_Gustian_bab_1-3_-_Copy[2][1].pdf', 1610284198),
(17, 15, 6, 20323091, '2147483647', 'pntrer', 'Toni_Gustian_bab_1-3_-_Copy5.pdf', 1610284281),
(18, 15, 6, 20323091, '2147483647', 'fvf', 'doc.pdf', 1610285342),
(19, 15, 6, 20323091, '2147483647', 'mantab', 'kom.docx', 1610285451),
(20, 15, 5, 20323091, '2147483647', 'assalammualaikum', 'BAB_1-2_HeruSaputra_161100113.ref1-2.docx', 1610342463),
(21, 15, 5, 20323091, '2147483647', 'assalammualaikum', 'bab 4 ref1.docx', 1610342673),
(22, 15, 5, 20323091, '2147483647', 'assalamualaikum', 'bab 4 ref1.docx', 1610342767),
(23, 15, 5, 20323091, '2147483647', 'assalamualaikum', 'Normalisasi.docx', 1610342808),
(24, 14, 5, 20323092, '2147483647', 'assalammualaiku', 'kom.docx', 1610365197),
(25, 15, 5, 20323091, '194708271975031001', 'assalammualaikum', 'Proposalku.docx', 1610398555);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `role_id`, `nip`, `prodi`, `nama`, `password`, `telp`, `image`) VALUES
(3, 1, '161100113', '', 'Heru Saputra', '1234', '0823841697974', 'raul_copy.PNG'),
(6, 2, '197806052003122006', 'Prodi S1 Pendidikan Teknik Bangunan', 'Prima Yane Putria', '123', '085376680091', 'yana.PNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembimbing`
--

CREATE TABLE `pembimbing` (
  `id_pembimbing` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `pembimbing_1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembimbing`
--

INSERT INTO `pembimbing` (`id_pembimbing`, `id_mahasiswa`, `pembimbing_1`) VALUES
(34, 16, 6),
(46, 14, 5),
(47, 15, 5),
(48, 20, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembimbing_pa`
--

CREATE TABLE `pembimbing_pa` (
  `id_pembimbing` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembimbing_pa`
--

INSERT INTO `pembimbing_pa` (`id_pembimbing`, `id_mahasiswa`, `id_dosen`) VALUES
(3, 15, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `user_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`role_id`, `user_role`) VALUES
(1, 'admin'),
(2, 'petugas'),
(3, 'dosen'),
(4, 'mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id_dosen` int(11) NOT NULL,
  `kd_dosen` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `keahlian` varchar(144) NOT NULL,
  `pangkat` varchar(144) NOT NULL,
  `jabatan_fungsional` varchar(144) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `kd_dosen`, `role_id`, `nama`, `password`, `nip`, `keahlian`, `pangkat`, `jabatan_fungsional`, `telp`, `image`) VALUES
(5, 5113, 3, 'Drs. M.Husni,M.Pd', '123', '194708271975031001', 'Belum Diisi', 'Pembina/ IV.a', 'Lektor Kepala', '054', 'user.png'),
(6, 5151, 3, 'Prima Yane Putri', '123', '197806052003122006', 'Ekonomi Teknik', 'Penata / III.c', 'Lektor', '081363486378', 'user.png'),
(7, 5152, 3, 'Faisal Ashar', '123', '197501032003121001', 'Planologi', 'Penata Muda TK.I / III.b', 'Lektor', '08985970860', 'user.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(144) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Lektor Kepala'),
(2, 'Lektor'),
(3, 'Guru Besar'),
(4, 'NIDK'),
(5, 'Pensiun'),
(6, 'Asisten Ahli'),
(7, 'Non PNS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_bimbingan` int(11) NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `tgl_komentar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_komentar`
--

INSERT INTO `tb_komentar` (`id_komentar`, `id_bimbingan`, `komentar`, `tgl_komentar`) VALUES
(1, 1, 'refisi lagi', 1608698388),
(2, 1, 'perbaiki bab 1', 1608707778),
(3, 2, 'oke', 1610041956),
(4, 24, 'mantab', 1610365239);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `nim` int(10) NOT NULL,
  `role_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id_mhs`, `nim`, `role_id`, `nama`, `alamat`, `telp`, `prodi`, `password`, `image`) VALUES
(14, 20323092, 4, 'WIRA ANUGERAH RAMADHAN', '-', '0', 'Prodi S1 Pendidikan Teknik Bangunan', '123', 'user.png'),
(15, 20323091, 4, 'Vellya Anggriyeni', '-', '0', 'Prodi S1 Pendidikan Teknik Bangunan', '123', 'user.png'),
(16, 20323090, 4, 'Vandu Griasmana', '-', '0', 'Prodi S1 Pendidikan Teknik Bangunan', '123', 'user.png'),
(18, 20323088, 4, 'Nathasa Putri', 'Jl. Bahder Johan RT 002 RW 005 Kel. Puhun Tembok Bukittinggi', '0', 'Teknik Sipil(S1)', '1234', '123.PNG'),
(20, 15062009, 4, 'Ari Munandar', 'Kota Padang', '30742748', 'Prodi S1 Pendidikan Teknik Bangunan', '123', 'user.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `nama_prodi`, `keterangan`) VALUES
(1, 'Prodi S1 Pendidikan Teknik Bangunan', 'Akreditasi B'),
(2, 'Prodi D3 Teknik Sipil', 'Akreditasi B'),
(3, 'Prodi D3 Teknik Pertambangan', 'Akreditasi B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_skripsi`
--

CREATE TABLE `tb_skripsi` (
  `id_skripsi` int(11) NOT NULL,
  `id_dosen_pa` int(50) NOT NULL,
  `id_dosen_ta` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `judul_skripsi` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `file` varchar(100) NOT NULL,
  `tgl_input` int(11) NOT NULL,
  `komentar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_skripsi`
--

INSERT INTO `tb_skripsi` (`id_skripsi`, `id_dosen_pa`, `id_dosen_ta`, `nim`, `judul_skripsi`, `status`, `file`, `tgl_input`, `komentar`) VALUES
(1, 6, 5, 20323091, 'sistem informasi penjualan', 'Disetujui Prodi', 'Cover.docx', 1610389235, ''),
(2, 6, 5, 20323091, 'walaikumsalam', 'Disetujui Prodi', 'Proposalku.docx', 1610424796, 'kurang menarik'),
(7, 6, 5, 20323091, 'sistem', 'Ditolak Pembimbing', 'Proposalku3.docx', 1610427189, 'tidak bagus');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`id_bimbingan`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD PRIMARY KEY (`id_pembimbing`),
  ADD UNIQUE KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indeks untuk tabel `pembimbing_pa`
--
ALTER TABLE `pembimbing_pa`
  ADD PRIMARY KEY (`id_pembimbing`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indeks untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `tb_skripsi`
--
ALTER TABLE `tb_skripsi`
  ADD PRIMARY KEY (`id_skripsi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bimbingan`
--
ALTER TABLE `bimbingan`
  MODIFY `id_bimbingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `id_pembimbing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `pembimbing_pa`
--
ALTER TABLE `pembimbing_pa`
  MODIFY `id_pembimbing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_dosen`
--
ALTER TABLE `tb_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_skripsi`
--
ALTER TABLE `tb_skripsi`
  MODIFY `id_skripsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
