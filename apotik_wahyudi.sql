-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jan 2019 pada 13.08
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotik_wahyudi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` text NOT NULL,
  `password` text NOT NULL,
  `nama` text NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `password`, `nama`, `pertanyaan`, `jawaban`) VALUES
('eae68a18ec860090845abe5b688e42c2', 'eae68a18ec860090845abe5b688e42c2', 'Fauzy Wahyudi', 'Kapan saya lahir', '7cdd29f04447e682fb154d81a65b382b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `kode` varchar(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tgl_ambil` date NOT NULL DEFAULT '0000-00-00',
  `ket` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakta_baru`
--

CREATE TABLE `fakta_baru` (
  `id` varchar(6) NOT NULL,
  `nama` text NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `ket` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `indeks`
--

CREATE TABLE `indeks` (
  `id` varchar(6) NOT NULL,
  `nama` text NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `ket` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `indeks`
--

INSERT INTO `indeks` (`id`, `nama`, `jenis`, `ket`) VALUES
('P001', 'Komedonal', 'Penyakit', '1. Mencegah kebersihan kulit dengan jalan mencuci muka lebih sering <br>\r\n2. Menghindari faktor pencetus dengan pola hidup sehat dan teratur.<br>\r\n3. Sering terkena debu di jalanan atau lainnya.<br>'),
('P002', 'Conglabata', 'Penyakit', '1. Mencegah bahan komsumsi perangsang sebum (alkohol,rokok).<br>\r\n2.Konsultasi ke dokter ( karena jenis jerawat ini sangat berbahaya) .<br>\r\n3.Memberikan obat penghilang nyeri.<br>'),
('P003', 'Nodul', 'Penyakit', '1. Kurangi makanan berlemak dan karbohidrat.<br>\r\n2. Menghindari pemencetan jerawat dengan tangan yang kotor.<br>\r\n3. Hindari stress<br>\r\n'),
('P004', 'Popula', 'Penyakit', '1. Diet rendah lemak dan karbohidrat.<br>\r\n2. Melakukan perawatan kulit untuk dengan mencuci muka.<br>\r\n3. Penggunaan kosmetika secukupnya.<br>\r\n4. Menjaga keseimbangan gizi makanan.<br>\r\n'),
('G001', 'Bintik-bintik putih pada wajah', 'Gejala', 'Khusus'),
('G002', 'Adanya bakteri', 'Gejala', 'Khusus'),
('G003', 'Sel kulit mati', 'Gejala', 'Khusus'),
('G004', 'Kelebihan Sebum', 'Gejala', 'Umum'),
('G005', 'Kotoran dan debu', 'Gejala', 'Umum'),
('G006', 'Minyak berlebih', 'Gejala', 'Umum'),
('G007', 'Faktor cuaca', 'Gejala', 'Umum'),
('G008', 'Memakai Obat-obatan', 'Gejala', 'Umum'),
('G009', 'Adanya iritasi kulit', 'Gejala', 'Khusus'),
('G010', 'Faktor keturunan', 'Gejala', 'Umum'),
('G011', 'Pemakaian kosmetik yang berlebihan', 'Gejala', 'Umum'),
('G012', 'Banyak terkena sinar matahari', 'Gejala', 'Umum'),
('G013', 'Tampak benjolan warna hitam', 'Gejala', 'Umum'),
('G014', 'Memakai pil KB', 'Gejala', 'Umum'),
('G015', 'Pemicu stres dan emosi', 'Gejala', 'Khusus'),
('G016', 'Menstruasi', 'Gejala', 'Umum'),
('G017', 'Kelebihan hormon', 'Gejala', 'Umum'),
('P000', 'Anda Tidak Terdiagnosa Penyakit', 'Tidak', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_dokter`
--

CREATE TABLE `jadwal_dokter` (
  `kd_jadwal` int(11) NOT NULL,
  `user_dokter` varchar(20) NOT NULL,
  `tanggal` date DEFAULT '0000-00-00',
  `jam_awal` time NOT NULL DEFAULT '00:00:00',
  `jam_akhir` time NOT NULL DEFAULT '00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_dokter`
--

INSERT INTO `jadwal_dokter` (`kd_jadwal`, `user_dokter`, `tanggal`, `jam_awal`, `jam_akhir`) VALUES
(11, 'drfauzy', '2018-12-30', '13:30:00', '15:30:00'),
(12, 'drfauzy', '2019-01-02', '09:00:00', '12:00:00'),
(13, 'drfauzy', '2019-01-03', '09:00:00', '12:00:00'),
(14, 'drwahyudi', '2019-01-07', '10:00:00', '12:30:00'),
(15, 'drwahyudi', '2019-01-08', '09:00:00', '12:00:00'),
(16, 'drwahyudi', '2019-01-09', '09:00:00', '12:00:00'),
(17, 'drrama', '2019-01-10', '09:00:00', '12:00:00'),
(18, 'drrama', '2019-01-11', '09:00:00', '12:00:00'),
(19, 'drrama', '2019-01-12', '09:00:00', '12:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `username` varchar(50) NOT NULL,
  `kd_obat` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `id_pesanan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`username`, `kd_obat`, `jumlah`, `jumlah_bayar`, `status`, `id_pesanan`) VALUES
('fauzy', 'SO0001', 1, 6500, 'Sudah', 1),
('fauzy', 'TO0003', 2, 13000, 'Sudah', 1),
('wahyudi', 'SO0001', 2, 13000, 'Sudah', 2),
('ferry', 'TO0002', 3, 6000, 'Sudah', 3),
('ferry', 'TO0004', 2, 9000, 'Sudah', 3),
('ferry', 'TO0003', 2, 13000, 'Sudah', 4),
('ferry', 'TO0005', 3, 9000, 'Sudah', 4),
('wahyudi', 'SO0002', 3, 87000, 'Sudah', 5),
('fauzy', 'TO0001', 3, 6000, 'Sudah', 6),
('fauzy', 'TO0003', 1, 6500, 'Sudah', 6),
('fauzy', 'TO0005', 4, 12000, 'Sudah', 6),
('fauzy', 'SO0001', 2, 13000, 'Belum', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `idkomentar` int(11) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `nobp` varchar(20) NOT NULL,
  `komentar` text NOT NULL,
  `tglkomentar` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`idkomentar`, `idstatus`, `nobp`, `komentar`, `tglkomentar`) VALUES
(1, 5, '16101152630059', 'ini komentar', '2018-11-28 09:21:03'),
(2, 6, '16101152630059', 'batua', '2018-11-28 16:43:31'),
(6, 7, '16101152630060', 'komen awak', '2018-11-28 17:33:01'),
(7, 7, '16101152630060', 'komen awak', '2018-11-28 17:40:50'),
(8, 7, '16101152630059', 'asda', '2018-12-05 16:27:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `id` varchar(5) NOT NULL,
  `nama` text NOT NULL,
  `ket` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`id`, `nama`, `ket`) VALUES
('R1', 'P001', NULL),
('R2', 'G001', NULL),
('R3', 'G002', NULL),
('R4', 'G003', NULL),
('R5', 'P002', NULL),
('R6', 'G009', NULL),
('R7', 'P003', NULL),
('R8', 'P004', NULL),
('R9', 'G015', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `isi_pesanan` text NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `status_pesanan` varchar(20) NOT NULL,
  `tgl_pesanan` date NOT NULL,
  `tgl_diambil` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `username`, `isi_pesanan`, `total_bayar`, `status_pesanan`, `tgl_pesanan`, `tgl_diambil`) VALUES
(2, 'wahyudi', ' <br>ACETON 60 ML x 2', 13000, 'Dibatalkan', '2018-12-26', NULL),
(3, 'ferry', ' <br>BODREX MIGRA x 3 <br>BODREXIN ISI10 x 2', 15000, 'Sudah Diambil', '2018-12-29', '2018-12-29'),
(4, 'ferry', ' <br>PROMAG TABLET ISI12 x 2 <br>PARASETAMOL ISI10 x 3', 22000, 'Dibatalkan', '2018-12-29', NULL),
(5, 'wahyudi', ' <br>ACTIFED H 60ML x 3', 87000, 'Sudah Diambil', '2019-01-02', '2019-01-02'),
(6, 'fauzy', ' <br>BODREX BATUK FLU TAB ISI 4 x 3 <br>PROMAG TABLET ISI12 x 1 <br>PARASETAMOL ISI10 x 4', 24500, 'Sudah Diambil', '2019-01-03', '2019-01-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rule`
--

CREATE TABLE `rule` (
  `id_rule` int(11) NOT NULL,
  `id_penyakit` varchar(5) NOT NULL,
  `id_gejala` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rule`
--

INSERT INTO `rule` (`id_rule`, `id_penyakit`, `id_gejala`) VALUES
(1, 'P001', 'G001'),
(2, 'P001', 'G002'),
(3, 'P001', 'G003'),
(4, 'G001', 'G004'),
(5, 'G001', 'G002'),
(6, 'G002', 'G005'),
(7, 'G002', 'G006'),
(8, 'G003', 'G007'),
(9, 'P002', 'G008'),
(10, 'P002', 'G009'),
(11, 'P002', 'G010'),
(12, 'G009', 'G011'),
(13, 'G009', 'G012'),
(14, 'G009', 'G008'),
(15, 'P003', 'G009'),
(16, 'P003', 'G013'),
(17, 'P003', 'G014'),
(18, 'P004', 'G009'),
(19, 'P004', 'G015'),
(20, 'P004', 'G003'),
(21, 'G015', 'G016'),
(22, 'G015', 'G017');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stack`
--

CREATE TABLE `stack` (
  `id` varchar(6) NOT NULL,
  `nama` text NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `ket` text,
  `urut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `idstatus` int(11) NOT NULL,
  `nobp` varchar(20) NOT NULL,
  `status` text NOT NULL,
  `tglpost` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`idstatus`, `nobp`, `status`, `tglpost`) VALUES
(5, '16101152630059', 'ini status', '2018-11-28 08:34:44'),
(6, '16101152630059', 'maa tau wak', '2018-11-28 10:05:41'),
(7, '16101152630060', 'ini status saya', '2018-11-28 17:26:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokter`
--

CREATE TABLE `tbl_dokter` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pekerjaan` text NOT NULL,
  `panggilan` varchar(10) NOT NULL,
  `tmplahir` varchar(25) NOT NULL,
  `tgllahir` date NOT NULL DEFAULT '0000-00-00',
  `jk` char(1) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` text NOT NULL,
  `tglreg` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL,
  `lastlogin` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_dokter`
--

INSERT INTO `tbl_dokter` (`id`, `username`, `password`, `nama`, `pekerjaan`, `panggilan`, `tmplahir`, `tgllahir`, `jk`, `alamat`, `nohp`, `email`, `foto`, `tglreg`, `status`, `lastlogin`) VALUES
(10, 'drfauzy', '6172de70289f996b192e1b2f5a932ace', 'dr. Fauzy Sp.M', 'Mata', 'fauzy', 'solok', '1997-06-05', 'L', 'dalam gadung', '085264033783', 'fauzy.wahyudi79@gmail.com', 'DSC_3193.JPG', '2018-12-11 11:48:19', 0, '2018-12-29 23:27:01'),
(14, 'drrama', 'f4d7635835c147c797b26eacf077d8ab', 'dr. Snutz Sp.THT-KL', 'THT', 'snutz', 'riau', '1995-05-15', 'L', 'Filano', '085264', 'raja@gmail.com', '', '2018-12-26 20:49:45', 0, '2019-01-02 22:34:18'),
(15, 'drwahyudi', '3c3ff141c7023dee23d1901fd37fe465', 'dr.Wahyudi ', 'Umum', 'wahyudi', 'solok', '1997-06-05', 'L', 'Belakang SMP 2 Solok', '085264033783', 'fauzy.wahyudi79@gmail.com', 'IMG_20140816_185919.jpg', '2018-12-26 20:50:21', 0, '2019-01-03 19:47:41'),
(16, 'drferry', '46171b077997b166bb30cf5494eff2f8', 'drg.Feriydatun', 'Gigi', '', '', '0000-00-00', '', '', '', '', '', '2018-12-26 20:55:39', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_obat`
--

CREATE TABLE `tbl_obat` (
  `kd_obat` varchar(20) NOT NULL,
  `nm_obat` text NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `jenis_obat` varchar(15) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `ket` text,
  `foto` text,
  `tgl_kadaluarsa` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_obat`
--

INSERT INTO `tbl_obat` (`kd_obat`, `nm_obat`, `harga`, `stok`, `jenis_obat`, `satuan`, `ket`, `foto`, `tgl_kadaluarsa`) VALUES
('SO0001', 'ACETON 60 ML', 6500, 111, 'Sirup', 'Botol', '', 'aceton_60ml.png', '2020-12-10'),
('SO0002', 'ACTIFED H 60ML', 29000, 97, 'Sirup', 'Botol', '', 'actifed_h_60ml.jpg', '2020-12-10'),
('TO0001', 'BODREX BATUK FLU TAB ISI 4', 2000, 97, 'Tablet', 'Strip', '', 'bodrex_flue_dan_batuk_isi4.jpg', '2020-12-10'),
('TO0002', 'BODREX MIGRA', 2000, 97, 'Tablet', 'Strip', '', 'bodrex_migra_isi4.jpg', '2020-12-10'),
('TO0003', 'PROMAG TABLET ISI12', 6500, 109, 'Tablet', 'Strip', '', 'promag_tablet.jpg', '2020-12-10'),
('TO0004', 'BODREXIN ISI10', 4500, 98, 'Tablet', 'Strip', '', 'bodrexin_isi10.jpg', '2020-12-10'),
('TO0005', 'PARASETAMOL ISI10', 3000, 96, 'Tablet', 'Strip', '', 'parasetmol_tablet_isi10.jpg', '2020-12-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pekerjaan` text NOT NULL,
  `panggilan` varchar(10) NOT NULL,
  `tmplahir` varchar(25) NOT NULL,
  `tgllahir` date NOT NULL DEFAULT '0000-00-00',
  `jk` char(1) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` text NOT NULL,
  `tglreg` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL,
  `lastlogin` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pertanyaan` text,
  `jawaban` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `nama`, `pekerjaan`, `panggilan`, `tmplahir`, `tgllahir`, `jk`, `alamat`, `nohp`, `email`, `foto`, `tglreg`, `status`, `lastlogin`, `pertanyaan`, `jawaban`) VALUES
(11, 'wahyudi', 'c6b5cef6327916d6260a80de98184581', 'Fauzy', 'Mahasiswa', 'fauzy', 'solok', '1997-06-05', 'L', 'jl dalam gadung', '085264033783', 'fauzy.wahyudi79@gmail.com', '01.JPG', '2018-12-15 13:33:03', 0, '2019-01-03 20:26:01', 'Siapa orang yang saya suka', '465b1f70b50166b6d05397fca8d600b0'),
(12, 'fauzy', '6172de70289f996b192e1b2f5a932ace', 'Fauzy Wahyudi', 'Mahasiswa', 'fauzy', 'Solok', '1997-06-05', 'L', 'dalam gadung', '085264033783', 'fauzy.wahyudi79@gmail.com', 'FB_IMG_1438480445302.jpg', '2018-12-16 15:10:30', 0, '2019-01-03 19:55:02', 'siapa saya', '20c1a26a55039b30866c9d0aa51953ca'),
(13, 'ferry', '46171b077997b166bb30cf5494eff2f8', 'Ferrydatun M Abdul Hafid', 'Mahasiswa', '', '', '0000-00-00', '', '', '', '', '', '2018-12-29 21:44:38', 0, '2018-12-30 00:03:15', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD PRIMARY KEY (`kd_jadwal`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD KEY `idkomen` (`idkomentar`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`idstatus`);

--
-- Indeks untuk tabel `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  MODIFY `kd_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `idkomentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `idstatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
