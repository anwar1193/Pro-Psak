-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Agu 2021 pada 02.57
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_psak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nopin`
--

CREATE TABLE `tbl_nopin` (
  `id` int(11) NOT NULL,
  `no_pin` varchar(30) NOT NULL,
  `account_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_nopin`
--

INSERT INTO `tbl_nopin` (`id`, `no_pin`, `account_status`) VALUES
(78, '0010008956', 'ACTIVE'),
(79, '0030006614', 'ACTIVE'),
(80, '0030006753', 'ACTIVE'),
(81, '0050012007', 'CLOSED - REGULER'),
(82, '0050012187', 'ACTIVE'),
(83, '0060012241', 'ACTIVE'),
(84, '0060012564', 'CLOSED - REGULER'),
(85, '0320002029', 'ACTIVE'),
(86, '0320002041', 'ACTIVE'),
(87, '0320002052', 'ACTIVE'),
(88, '0400004909', 'ACTIVE'),
(89, '0450002380', 'CLOSED - REGULER'),
(90, '0450002488', 'ACTIVE'),
(91, '0500006437', 'ACTIVE'),
(92, '0700001567', 'ACTIVE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penyusutan_active`
--

CREATE TABLE `tbl_penyusutan_active` (
  `id` int(11) NOT NULL,
  `fincat` varchar(30) NOT NULL,
  `bulan` varchar(30) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `refund_npv` int(20) NOT NULL,
  `refund_asuransi` int(20) NOT NULL,
  `refund_adm` int(20) NOT NULL,
  `ins_receivable` int(20) NOT NULL,
  `by_notaris` int(20) NOT NULL,
  `pend_asuransi` int(20) NOT NULL,
  `pend_survey` int(20) NOT NULL,
  `pend_fidusia` int(20) NOT NULL,
  `pend_provisi` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penyusutan_active_cabang`
--

CREATE TABLE `tbl_penyusutan_active_cabang` (
  `id` int(11) NOT NULL,
  `cabang` varchar(50) NOT NULL,
  `fincat` varchar(30) NOT NULL,
  `bulan` varchar(30) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `refund_npv` int(20) NOT NULL,
  `refund_asuransi` int(20) NOT NULL,
  `refund_adm` int(20) NOT NULL,
  `ins_receivable` int(20) NOT NULL,
  `by_notaris` int(20) NOT NULL,
  `pend_asuransi` int(20) NOT NULL,
  `pend_survey` int(20) NOT NULL,
  `pend_fidusia` int(20) NOT NULL,
  `pend_provisi` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penyusutan_closed`
--

CREATE TABLE `tbl_penyusutan_closed` (
  `id` int(11) NOT NULL,
  `fincat` varchar(30) NOT NULL,
  `bulan` varchar(30) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `refund_npv` int(20) NOT NULL,
  `refund_asuransi` int(20) NOT NULL,
  `refund_adm` int(20) NOT NULL,
  `ins_receivable` int(20) NOT NULL,
  `by_notaris` int(20) NOT NULL,
  `pend_asuransi` int(20) NOT NULL,
  `pend_survey` int(20) NOT NULL,
  `pend_fidusia` int(20) NOT NULL,
  `pend_provisi` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penyusutan_closed_cabang`
--

CREATE TABLE `tbl_penyusutan_closed_cabang` (
  `id` int(11) NOT NULL,
  `cabang` varchar(50) NOT NULL,
  `fincat` varchar(30) NOT NULL,
  `bulan` varchar(30) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `refund_npv` int(20) NOT NULL,
  `refund_asuransi` int(20) NOT NULL,
  `refund_adm` int(20) NOT NULL,
  `ins_receivable` int(20) NOT NULL,
  `by_notaris` int(20) NOT NULL,
  `pend_asuransi` int(20) NOT NULL,
  `pend_survey` int(20) NOT NULL,
  `pend_fidusia` int(20) NOT NULL,
  `pend_provisi` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_psak`
--

CREATE TABLE `tbl_psak` (
  `id` int(11) NOT NULL,
  `no_pin` varchar(40) NOT NULL,
  `no_rek` varchar(40) NOT NULL,
  `account_sts` varchar(30) NOT NULL,
  `paid_status` varchar(40) NOT NULL,
  `kode_cabang` text NOT NULL,
  `cabang` text NOT NULL,
  `account_name` varchar(40) NOT NULL,
  `restru_date` date NOT NULL,
  `booking_date` date NOT NULL,
  `sisa_tenor` int(11) NOT NULL,
  `tgl_jatuh_tempo` varchar(10) NOT NULL,
  `fincat` varchar(30) NOT NULL,
  `refund_npv` int(20) NOT NULL,
  `refund_asuransi` int(20) NOT NULL,
  `refund_adm` int(20) NOT NULL,
  `ins_receivable` int(20) NOT NULL,
  `by_notaris` int(20) NOT NULL,
  `pend_asuransi` int(20) NOT NULL,
  `pend_survey` int(20) NOT NULL,
  `pend_fidusia` int(20) NOT NULL,
  `pend_provisi` int(20) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `status_generate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_psak_detail`
--

CREATE TABLE `tbl_psak_detail` (
  `id` bigint(11) NOT NULL,
  `no_pin` varchar(30) NOT NULL,
  `account_sts` varchar(30) NOT NULL,
  `kode_cabang` text NOT NULL,
  `cabang` text NOT NULL,
  `fincat` varchar(30) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` int(4) NOT NULL,
  `refund_npv` int(30) NOT NULL,
  `refund_asuransi` int(30) NOT NULL,
  `refund_adm` int(30) NOT NULL,
  `ins_receivable` int(30) NOT NULL,
  `by_notaris` int(30) NOT NULL,
  `pend_asuransi` int(30) NOT NULL,
  `pend_survey` int(30) NOT NULL,
  `pend_fidusia` int(30) NOT NULL,
  `pend_provisi` int(30) NOT NULL,
  `status_paid` varchar(30) NOT NULL,
  `bulan_close` varchar(20) NOT NULL,
  `tahun_close` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_saldo_awal`
--

CREATE TABLE `tbl_saldo_awal` (
  `id` int(11) NOT NULL,
  `fincat` varchar(30) NOT NULL,
  `bulan` varchar(30) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `refund_npv` int(20) NOT NULL,
  `refund_asuransi` int(20) NOT NULL,
  `refund_adm` int(20) NOT NULL,
  `ins_receivable` int(20) NOT NULL,
  `by_notaris` int(20) NOT NULL,
  `pend_asuransi` int(20) NOT NULL,
  `pend_survey` int(20) NOT NULL,
  `pend_fidusia` int(20) NOT NULL,
  `pend_provisi` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_saldo_awal_cabang`
--

CREATE TABLE `tbl_saldo_awal_cabang` (
  `id` int(11) NOT NULL,
  `cabang` varchar(50) NOT NULL,
  `fincat` varchar(30) NOT NULL,
  `bulan` varchar(30) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `refund_npv` int(20) NOT NULL,
  `refund_asuransi` int(20) NOT NULL,
  `refund_adm` int(20) NOT NULL,
  `ins_receivable` int(20) NOT NULL,
  `by_notaris` int(20) NOT NULL,
  `pend_asuransi` int(20) NOT NULL,
  `pend_survey` int(20) NOT NULL,
  `pend_fidusia` int(20) NOT NULL,
  `pend_provisi` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama_lengkap`, `username`, `password`, `level`) VALUES
(1, 'Administrator', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_nopin`
--
ALTER TABLE `tbl_nopin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_penyusutan_active`
--
ALTER TABLE `tbl_penyusutan_active`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_penyusutan_active_cabang`
--
ALTER TABLE `tbl_penyusutan_active_cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_penyusutan_closed`
--
ALTER TABLE `tbl_penyusutan_closed`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_penyusutan_closed_cabang`
--
ALTER TABLE `tbl_penyusutan_closed_cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_psak`
--
ALTER TABLE `tbl_psak`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_pin` (`no_pin`);

--
-- Indeks untuk tabel `tbl_psak_detail`
--
ALTER TABLE `tbl_psak_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_pin` (`no_pin`);

--
-- Indeks untuk tabel `tbl_saldo_awal`
--
ALTER TABLE `tbl_saldo_awal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_saldo_awal_cabang`
--
ALTER TABLE `tbl_saldo_awal_cabang`
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
-- AUTO_INCREMENT untuk tabel `tbl_nopin`
--
ALTER TABLE `tbl_nopin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT untuk tabel `tbl_penyusutan_active`
--
ALTER TABLE `tbl_penyusutan_active`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_penyusutan_active_cabang`
--
ALTER TABLE `tbl_penyusutan_active_cabang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tbl_penyusutan_closed`
--
ALTER TABLE `tbl_penyusutan_closed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_penyusutan_closed_cabang`
--
ALTER TABLE `tbl_penyusutan_closed_cabang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_psak`
--
ALTER TABLE `tbl_psak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tbl_psak_detail`
--
ALTER TABLE `tbl_psak_detail`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=673;

--
-- AUTO_INCREMENT untuk tabel `tbl_saldo_awal`
--
ALTER TABLE `tbl_saldo_awal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tbl_saldo_awal_cabang`
--
ALTER TABLE `tbl_saldo_awal_cabang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_psak_detail`
--
ALTER TABLE `tbl_psak_detail`
  ADD CONSTRAINT `tbl_psak_detail_ibfk_1` FOREIGN KEY (`no_pin`) REFERENCES `tbl_psak` (`no_pin`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
