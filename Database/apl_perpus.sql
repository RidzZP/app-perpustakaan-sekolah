-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Okt 2022 pada 12.42
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apl_perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukufiksi`
--

CREATE TABLE `bukufiksi` (
  `idBukuFiksi` int(10) NOT NULL,
  `judulBuku` varchar(50) NOT NULL,
  `penulisBuku` varchar(50) NOT NULL,
  `penerbitBuku` varchar(50) NOT NULL,
  `tahunTerbit` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukupaket`
--

CREATE TABLE `bukupaket` (
  `idBukuPaket` int(10) NOT NULL,
  `paket` varchar(50) NOT NULL,
  `daftarJudulPaket` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `datauser`
--

CREATE TABLE `datauser` (
  `username` varchar(30) NOT NULL,
  `password` char(32) NOT NULL,
  `namaUser` varchar(30) NOT NULL,
  `levelUser` enum('admin','kepala') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datauser`
--

INSERT INTO `datauser` (`username`, `password`, `namaUser`, `levelUser`) VALUES
('Admin', '202cb962ac59075b964b07152d234b70', 'Admin Perpus', 'admin'),
('Kepala', '202cb962ac59075b964b07152d234b70', 'kepala perpus', 'kepala');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelolaanggota`
--

CREATE TABLE `kelolaanggota` (
  `idAnggota` int(10) NOT NULL,
  `namaAnggota` varchar(100) NOT NULL,
  `kelasAnggota` varchar(5) NOT NULL,
  `kelamin` enum('L','P') NOT NULL,
  `noHp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjamanbukufiksi`
--

CREATE TABLE `peminjamanbukufiksi` (
  `idPeminjamFiksi` int(10) NOT NULL,
  `tglPinjam` date NOT NULL,
  `batasWaktu` date NOT NULL,
  `denda` varchar(50) NOT NULL,
  `idAnggota` int(10) NOT NULL,
  `idBukuFiksi` int(10) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjamanbukupaket`
--

CREATE TABLE `peminjamanbukupaket` (
  `idPeminjamPaket` int(10) NOT NULL,
  `tglPinjam` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `idBukuPaket` int(10) NOT NULL,
  `idAnggota` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalianbukufiksi`
--

CREATE TABLE `pengembalianbukufiksi` (
  `idKembaliFiksi` int(10) NOT NULL,
  `tglKembali` date NOT NULL,
  `idPeminjamFiksi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalianbukupaket`
--

CREATE TABLE `pengembalianbukupaket` (
  `idKembaliPaket` int(10) NOT NULL,
  `tglKembali` date NOT NULL,
  `idPeminjamPaket` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bukufiksi`
--
ALTER TABLE `bukufiksi`
  ADD PRIMARY KEY (`idBukuFiksi`);

--
-- Indeks untuk tabel `bukupaket`
--
ALTER TABLE `bukupaket`
  ADD PRIMARY KEY (`idBukuPaket`);

--
-- Indeks untuk tabel `datauser`
--
ALTER TABLE `datauser`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `kelolaanggota`
--
ALTER TABLE `kelolaanggota`
  ADD PRIMARY KEY (`idAnggota`);

--
-- Indeks untuk tabel `peminjamanbukufiksi`
--
ALTER TABLE `peminjamanbukufiksi`
  ADD PRIMARY KEY (`idPeminjamFiksi`),
  ADD KEY `peminjamanbuku_ibfk_1` (`idBukuFiksi`),
  ADD KEY `peminjamanbuku_ibfk_2` (`idAnggota`);

--
-- Indeks untuk tabel `peminjamanbukupaket`
--
ALTER TABLE `peminjamanbukupaket`
  ADD PRIMARY KEY (`idPeminjamPaket`),
  ADD KEY `idBukuPaket` (`idBukuPaket`),
  ADD KEY `idAnggota` (`idAnggota`);

--
-- Indeks untuk tabel `pengembalianbukufiksi`
--
ALTER TABLE `pengembalianbukufiksi`
  ADD PRIMARY KEY (`idKembaliFiksi`),
  ADD KEY `idPeminjam` (`idPeminjamFiksi`);

--
-- Indeks untuk tabel `pengembalianbukupaket`
--
ALTER TABLE `pengembalianbukupaket`
  ADD PRIMARY KEY (`idKembaliPaket`),
  ADD KEY `idPinjamPaket` (`idPeminjamPaket`),
  ADD KEY `idPeminjamPaket` (`idPeminjamPaket`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bukufiksi`
--
ALTER TABLE `bukufiksi`
  MODIFY `idBukuFiksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT untuk tabel `bukupaket`
--
ALTER TABLE `bukupaket`
  MODIFY `idBukuPaket` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `kelolaanggota`
--
ALTER TABLE `kelolaanggota`
  MODIFY `idAnggota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT untuk tabel `peminjamanbukufiksi`
--
ALTER TABLE `peminjamanbukufiksi`
  MODIFY `idPeminjamFiksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT untuk tabel `peminjamanbukupaket`
--
ALTER TABLE `peminjamanbukupaket`
  MODIFY `idPeminjamPaket` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pengembalianbukufiksi`
--
ALTER TABLE `pengembalianbukufiksi`
  MODIFY `idKembaliFiksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengembalianbukupaket`
--
ALTER TABLE `pengembalianbukupaket`
  MODIFY `idKembaliPaket` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `peminjamanbukufiksi`
--
ALTER TABLE `peminjamanbukufiksi`
  ADD CONSTRAINT `peminjamanbukufiksi_ibfk_1` FOREIGN KEY (`idBukuFiksi`) REFERENCES `bukufiksi` (`idBukuFiksi`),
  ADD CONSTRAINT `peminjamanbukufiksi_ibfk_2` FOREIGN KEY (`idAnggota`) REFERENCES `kelolaanggota` (`idAnggota`);

--
-- Ketidakleluasaan untuk tabel `peminjamanbukupaket`
--
ALTER TABLE `peminjamanbukupaket`
  ADD CONSTRAINT `peminjamanbukupaket_ibfk_1` FOREIGN KEY (`idAnggota`) REFERENCES `kelolaanggota` (`idAnggota`),
  ADD CONSTRAINT `peminjamanbukupaket_ibfk_2` FOREIGN KEY (`idBukuPaket`) REFERENCES `bukupaket` (`idBukuPaket`);

--
-- Ketidakleluasaan untuk tabel `pengembalianbukufiksi`
--
ALTER TABLE `pengembalianbukufiksi`
  ADD CONSTRAINT `pengembalianbukufiksi_ibfk_1` FOREIGN KEY (`idPeminjamFiksi`) REFERENCES `peminjamanbukufiksi` (`idPeminjamFiksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
