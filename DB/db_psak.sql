-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Agu 2021 pada 11.37
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

--
-- Dumping data untuk tabel `tbl_penyusutan_active`
--

INSERT INTO `tbl_penyusutan_active` (`id`, `fincat`, `bulan`, `tahun`, `refund_npv`, `refund_asuransi`, `refund_adm`, `ins_receivable`, `by_notaris`, `pend_asuransi`, `pend_survey`, `pend_fidusia`, `pend_provisi`) VALUES
(46, 'INVST - INST LOAN', '8', '2021', 143589, 0, 29590, 146899, 35281, 0, 15349, 0, 0),
(47, 'MKRJA - MODAL USAHA', '8', '2021', 456276, 0, 0, 301388, 47551, 0, 8938, 0, 0),
(48, 'MTGNA - INST LOAN', '8', '2021', 27250, 0, 7255, 10399, 14935, 0, 0, 0, 0),
(49, 'INVST - INST LOAN', '9', '2021', 143589, 0, 29590, 146899, 35281, 0, 15349, 0, 0),
(50, 'MKRJA - MODAL USAHA', '9', '2021', 456276, 0, 0, 301388, 47551, 0, 8938, 0, 0),
(51, 'MTGNA - INST LOAN', '9', '2021', 27250, 0, 7255, 10399, 14935, 0, 0, 0, 0);

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

--
-- Dumping data untuk tabel `tbl_penyusutan_closed`
--

INSERT INTO `tbl_penyusutan_closed` (`id`, `fincat`, `bulan`, `tahun`, `refund_npv`, `refund_asuransi`, `refund_adm`, `ins_receivable`, `by_notaris`, `pend_asuransi`, `pend_survey`, `pend_fidusia`, `pend_provisi`) VALUES
(14, 'INVST - INST LOAN', '8', '2021', 203508, 0, 0, 112485, 19849, 0, 26924, 0, 0),
(15, 'MKRJA - MODAL USAHA', '8', '2021', 49739, 0, 0, 60165, 17978, 0, 0, 0, 0),
(16, 'MTGNA - INST LOAN', '8', '2021', 49694, 0, 31838, 33453, 25493, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_psak`
--

CREATE TABLE `tbl_psak` (
  `id` int(11) NOT NULL,
  `no_pin` varchar(40) NOT NULL,
  `no_rek` varchar(40) NOT NULL,
  `account_sts` varchar(30) NOT NULL,
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

--
-- Dumping data untuk tabel `tbl_psak`
--

INSERT INTO `tbl_psak` (`id`, `no_pin`, `no_rek`, `account_sts`, `kode_cabang`, `cabang`, `account_name`, `restru_date`, `booking_date`, `sisa_tenor`, `tgl_jatuh_tempo`, `fincat`, `refund_npv`, `refund_asuransi`, `refund_adm`, `ins_receivable`, `by_notaris`, `pend_asuransi`, `pend_survey`, `pend_fidusia`, `pend_provisi`, `tanggal_upload`, `status_generate`) VALUES
(241, '0010008956', '001.8956', 'ACTIVE', '001', 'Kalimalang', 'BUDIMAN', '2020-04-30', '2019-08-23', 35, '23', 'INVST - INST LOAN', 0, 0, 0, 946791, 234752, 0, 0, 0, 0, '2021-08-06', 'generated'),
(242, '0320002029', '032.2029', 'ACTIVE', '001', 'Kalimalang', 'BANI ELKIS', '2020-04-30', '2019-08-27', 34, '27', 'INVST - INST LOAN', 1172378, 0, 1006071, 947227, 235231, 0, 100906, 0, 0, '2021-08-06', 'generated'),
(243, '0320002041', '032.2041', 'ACTIVE', '001', 'Kalimalang', 'PONIMAN', '2020-04-30', '2019-11-26', 21, '26', 'INVST - INST LOAN', 1448106, 0, 0, 1223372, 236862, 0, 135425, 0, 0, '2021-08-06', 'generated'),
(244, '0320002052', '032.2052', 'ACTIVE', '001', 'Kalimalang', 'ARIF HIDAYAT', '2020-04-30', '2020-01-24', 27, '24', 'INVST - INST LOAN', 1084042, 0, 0, 910768, 280147, 0, 160166, 0, 0, '2021-08-06', 'generated'),
(245, '0450002380', '045.2380', 'CLOSED - REGULER', '001', 'Kalimalang', 'RAHMAH', '2020-04-30', '2017-01-24', 15, '24', 'INVST - INST LOAN', 203508, 0, 0, 112485, 19849, 0, 26924, 0, 0, '2021-08-06', 'generated'),
(246, '0500006437', '050.6437', 'ACTIVE', '001', 'Kalimalang', 'RINA MEO', '2020-04-30', '2019-10-25', 23, '25', 'MTGNA - INST LOAN', 544241, 0, 0, 0, 209761, 0, 0, 0, 0, '2021-08-06', 'generated'),
(247, '0030006614', '003.6614', 'ACTIVE', '001', 'Kalimalang', 'AHMAD NAJMUDIN', '2020-05-05', '2018-05-23', 19, '23', 'MTGNA - INST LOAN', 68162, 0, 137842, 0, 46229, 0, 0, 0, 0, '2021-08-06', 'generated'),
(248, '0400004909', '040.4909', 'ACTIVE', '006', 'Bogor', 'HENDRI', '2020-05-08', '2017-01-26', 16, '26', 'MTGNA - INST LOAN', 0, 0, 0, 87595, 24114, 0, 0, 0, 0, '2021-08-06', 'generated'),
(249, '0060012241', '006.12241', 'ACTIVE', '006', 'Bogor', 'UDIN JAMIL', '2020-05-09', '2017-01-24', 17, '24', 'MTGNA - INST LOAN', 0, 0, 0, 83714, 31879, 0, 0, 0, 0, '2021-08-06', 'generated'),
(250, '0060012564', '006.12564', 'CLOSED - REGULER', '006', 'Bogor', 'HERNAWATI', '2020-05-09', '2018-09-24', 12, '24', 'MTGNA - INST LOAN', 49694, 0, 31838, 33453, 25493, 0, 0, 0, 0, '2021-08-06', 'generated'),
(251, '0450002488', '045.2488', 'ACTIVE', '006', 'Bogor', 'ENDI WAKASMAN', '2020-05-13', '2020-01-24', 51, '24', 'MKRJA - MODAL USAHA', 2510524, 0, 0, 0, 337208, 0, 455847, 0, 0, '2021-08-06', 'generated'),
(252, '0700001567', '070.1567', 'ACTIVE', '006', 'Bogor', 'NI KETUT SINOM', '2020-05-28', '2020-01-31', 50, '31', 'MKRJA - MODAL USAHA', 11379096, 0, 0, 2034172, 864502, 0, 0, 0, 0, '2021-08-06', 'generated'),
(253, '0050012007', '005.12007', 'CLOSED - REGULER', '006', 'Bogor', 'HILMI', '2020-05-29', '2018-11-01', 8, '1', 'MKRJA - MODAL USAHA', 49739, 0, 0, 60165, 17978, 0, 0, 0, 0, '2021-08-06', 'generated'),
(254, '0050012187', '005.12187', 'ACTIVE', '008', 'Sukabumi', 'ARMUDIN', '2020-05-29', '2020-02-17', 35, '17', 'MKRJA - MODAL USAHA', 2990995, 0, 0, 3422410, 306908, 0, 0, 0, 0, '2021-08-06', 'generated'),
(255, '0030006753', '003.6753', 'ACTIVE', '008', 'Sukabumi', 'NAWING', '2020-05-30', '2020-03-10', 37, '10', 'MKRJA - MODAL USAHA', 3478406, 0, 0, 6028108, 550552, 0, 0, 0, 0, '2021-08-06', 'generated');

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

--
-- Dumping data untuk tabel `tbl_psak_detail`
--

INSERT INTO `tbl_psak_detail` (`id`, `no_pin`, `account_sts`, `kode_cabang`, `cabang`, `fincat`, `bulan`, `tahun`, `refund_npv`, `refund_asuransi`, `refund_adm`, `ins_receivable`, `by_notaris`, `pend_asuransi`, `pend_survey`, `pend_fidusia`, `pend_provisi`, `status_paid`, `bulan_close`, `tahun_close`) VALUES
(6401, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '8', 2021, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'paid', '', 0),
(6402, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '9', 2021, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'paid', '', 0),
(6403, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '10', 2021, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6404, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '11', 2021, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6405, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '12', 2021, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6406, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '1', 2022, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6407, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '2', 2022, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6408, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '3', 2022, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6409, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '4', 2022, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6410, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '5', 2022, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6411, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '6', 2022, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6412, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '7', 2022, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6413, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '8', 2022, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6414, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '9', 2022, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6415, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '10', 2022, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6416, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '11', 2022, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6417, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '12', 2022, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6418, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '1', 2023, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6419, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '2', 2023, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6420, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '3', 2023, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6421, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '4', 2023, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6422, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '5', 2023, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6423, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '6', 2023, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6424, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '7', 2023, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6425, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '8', 2023, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6426, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '9', 2023, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6427, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '10', 2023, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6428, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '11', 2023, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6429, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '12', 2023, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6430, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '1', 2024, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6431, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '2', 2024, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6432, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '3', 2024, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6433, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '4', 2024, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6434, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '5', 2024, 0, 0, 0, 27051, 6707, 0, 0, 0, 0, 'belum', '', 0),
(6435, '0010008956', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '6', 2024, 0, 0, 0, 27057, 6714, 0, 0, 0, 0, 'belum', '', 0),
(6436, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '8', 2021, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'paid', '', 0),
(6437, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '9', 2021, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'paid', '', 0),
(6438, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '10', 2021, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6439, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '11', 2021, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6440, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '12', 2021, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6441, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '1', 2022, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6442, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '2', 2022, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6443, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '3', 2022, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6444, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '4', 2022, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6445, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '5', 2022, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6446, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '6', 2022, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6447, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '7', 2022, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6448, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '8', 2022, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6449, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '9', 2022, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6450, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '10', 2022, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6451, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '11', 2022, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6452, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '12', 2022, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6453, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '1', 2023, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6454, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '2', 2023, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6455, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '3', 2023, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6456, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '4', 2023, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6457, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '5', 2023, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6458, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '6', 2023, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6459, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '7', 2023, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6460, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '8', 2023, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6461, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '9', 2023, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6462, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '10', 2023, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6463, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '11', 2023, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6464, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '12', 2023, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6465, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '1', 2024, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6466, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '2', 2024, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6467, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '3', 2024, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6468, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '4', 2024, 34482, 0, 29590, 27860, 6919, 0, 2968, 0, 0, 'belum', '', 0),
(6469, '0320002029', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '5', 2024, 34472, 0, 29601, 27847, 6904, 0, 2962, 0, 0, 'belum', '', 0),
(6470, '0320002041', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '8', 2021, 68957, 0, 0, 58256, 11279, 0, 6449, 0, 0, 'paid', '', 0),
(6471, '0320002041', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '9', 2021, 68957, 0, 0, 58256, 11279, 0, 6449, 0, 0, 'paid', '', 0),
(6472, '0320002041', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '10', 2021, 68957, 0, 0, 58256, 11279, 0, 6449, 0, 0, 'belum', '', 0),
(6473, '0320002041', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '11', 2021, 68957, 0, 0, 58256, 11279, 0, 6449, 0, 0, 'belum', '', 0),
(6474, '0320002041', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '12', 2021, 68957, 0, 0, 58256, 11279, 0, 6449, 0, 0, 'belum', '', 0),
(6475, '0320002041', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '1', 2022, 68957, 0, 0, 58256, 11279, 0, 6449, 0, 0, 'belum', '', 0),
(6476, '0320002041', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '2', 2022, 68957, 0, 0, 58256, 11279, 0, 6449, 0, 0, 'belum', '', 0),
(6477, '0320002041', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '3', 2022, 68957, 0, 0, 58256, 11279, 0, 6449, 0, 0, 'belum', '', 0),
(6478, '0320002041', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '4', 2022, 68957, 0, 0, 58256, 11279, 0, 6449, 0, 0, 'belum', '', 0),
(6479, '0320002041', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '5', 2022, 68957, 0, 0, 58256, 11279, 0, 6449, 0, 0, 'belum', '', 0),
(6480, '0320002041', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '6', 2022, 68957, 0, 0, 58256, 11279, 0, 6449, 0, 0, 'belum', '', 0),
(6481, '0320002041', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '7', 2022, 68957, 0, 0, 58256, 11279, 0, 6449, 0, 0, 'belum', '', 0),
(6482, '0320002041', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '8', 2022, 68957, 0, 0, 58256, 11279, 0, 6449, 0, 0, 'belum', '', 0),
(6483, '0320002041', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '9', 2022, 68957, 0, 0, 58256, 11279, 0, 6449, 0, 0, 'belum', '', 0),
(6484, '0320002041', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '10', 2022, 68957, 0, 0, 58256, 11279, 0, 6449, 0, 0, 'belum', '', 0),
(6485, '0320002041', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '11', 2022, 68957, 0, 0, 58256, 11279, 0, 6449, 0, 0, 'belum', '', 0),
(6486, '0320002041', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '12', 2022, 68957, 0, 0, 58256, 11279, 0, 6449, 0, 0, 'belum', '', 0),
(6487, '0320002041', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '1', 2023, 68957, 0, 0, 58256, 11279, 0, 6449, 0, 0, 'belum', '', 0),
(6488, '0320002041', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '2', 2023, 68957, 0, 0, 58256, 11279, 0, 6449, 0, 0, 'belum', '', 0),
(6489, '0320002041', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '3', 2023, 68957, 0, 0, 58256, 11279, 0, 6449, 0, 0, 'belum', '', 0),
(6490, '0320002041', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '4', 2023, 68966, 0, 0, 58252, 11282, 0, 6445, 0, 0, 'belum', '', 0),
(6491, '0320002052', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '8', 2021, 40150, 0, 0, 33732, 10376, 0, 5932, 0, 0, 'paid', '', 0),
(6492, '0320002052', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '9', 2021, 40150, 0, 0, 33732, 10376, 0, 5932, 0, 0, 'paid', '', 0),
(6493, '0320002052', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '10', 2021, 40150, 0, 0, 33732, 10376, 0, 5932, 0, 0, 'belum', '', 0),
(6494, '0320002052', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '11', 2021, 40150, 0, 0, 33732, 10376, 0, 5932, 0, 0, 'belum', '', 0),
(6495, '0320002052', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '12', 2021, 40150, 0, 0, 33732, 10376, 0, 5932, 0, 0, 'belum', '', 0),
(6496, '0320002052', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '1', 2022, 40150, 0, 0, 33732, 10376, 0, 5932, 0, 0, 'belum', '', 0),
(6497, '0320002052', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '2', 2022, 40150, 0, 0, 33732, 10376, 0, 5932, 0, 0, 'belum', '', 0),
(6498, '0320002052', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '3', 2022, 40150, 0, 0, 33732, 10376, 0, 5932, 0, 0, 'belum', '', 0),
(6499, '0320002052', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '4', 2022, 40150, 0, 0, 33732, 10376, 0, 5932, 0, 0, 'belum', '', 0),
(6500, '0320002052', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '5', 2022, 40150, 0, 0, 33732, 10376, 0, 5932, 0, 0, 'belum', '', 0),
(6501, '0320002052', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '6', 2022, 40150, 0, 0, 33732, 10376, 0, 5932, 0, 0, 'belum', '', 0),
(6502, '0320002052', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '7', 2022, 40150, 0, 0, 33732, 10376, 0, 5932, 0, 0, 'belum', '', 0),
(6503, '0320002052', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '8', 2022, 40150, 0, 0, 33732, 10376, 0, 5932, 0, 0, 'belum', '', 0),
(6504, '0320002052', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '9', 2022, 40150, 0, 0, 33732, 10376, 0, 5932, 0, 0, 'belum', '', 0),
(6505, '0320002052', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '10', 2022, 40150, 0, 0, 33732, 10376, 0, 5932, 0, 0, 'belum', '', 0),
(6506, '0320002052', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '11', 2022, 40150, 0, 0, 33732, 10376, 0, 5932, 0, 0, 'belum', '', 0),
(6507, '0320002052', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '12', 2022, 40150, 0, 0, 33732, 10376, 0, 5932, 0, 0, 'belum', '', 0),
(6508, '0320002052', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '1', 2023, 40150, 0, 0, 33732, 10376, 0, 5932, 0, 0, 'belum', '', 0),
(6509, '0320002052', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '2', 2023, 40150, 0, 0, 33732, 10376, 0, 5932, 0, 0, 'belum', '', 0),
(6510, '0320002052', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '3', 2023, 40150, 0, 0, 33732, 10376, 0, 5932, 0, 0, 'belum', '', 0),
(6511, '0320002052', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '4', 2023, 40150, 0, 0, 33732, 10376, 0, 5932, 0, 0, 'belum', '', 0),
(6512, '0320002052', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '5', 2023, 40150, 0, 0, 33732, 10376, 0, 5932, 0, 0, 'belum', '', 0),
(6513, '0320002052', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '6', 2023, 40150, 0, 0, 33732, 10376, 0, 5932, 0, 0, 'belum', '', 0),
(6514, '0320002052', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '7', 2023, 40150, 0, 0, 33732, 10376, 0, 5932, 0, 0, 'belum', '', 0),
(6515, '0320002052', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '8', 2023, 40150, 0, 0, 33732, 10376, 0, 5932, 0, 0, 'belum', '', 0),
(6516, '0320002052', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '9', 2023, 40150, 0, 0, 33732, 10376, 0, 5932, 0, 0, 'belum', '', 0),
(6517, '0320002052', 'ACTIVE', '001', 'Kalimalang', 'INVST - INST LOAN', '10', 2023, 40142, 0, 0, 33736, 10371, 0, 5934, 0, 0, 'belum', '', 0),
(6518, '0450002380', 'CLOSED - REGULER', '001', 'Kalimalang', 'INVST - INST LOAN', '8', 2021, 13567, 0, 0, 7499, 1323, 0, 1795, 0, 0, 'closed', '8', 2021),
(6519, '0450002380', 'CLOSED - REGULER', '001', 'Kalimalang', 'INVST - INST LOAN', '9', 2021, 13567, 0, 0, 7499, 1323, 0, 1795, 0, 0, 'closed', '8', 2021),
(6520, '0450002380', 'CLOSED - REGULER', '001', 'Kalimalang', 'INVST - INST LOAN', '10', 2021, 13567, 0, 0, 7499, 1323, 0, 1795, 0, 0, 'closed', '8', 2021),
(6521, '0450002380', 'CLOSED - REGULER', '001', 'Kalimalang', 'INVST - INST LOAN', '11', 2021, 13567, 0, 0, 7499, 1323, 0, 1795, 0, 0, 'closed', '8', 2021),
(6522, '0450002380', 'CLOSED - REGULER', '001', 'Kalimalang', 'INVST - INST LOAN', '12', 2021, 13567, 0, 0, 7499, 1323, 0, 1795, 0, 0, 'closed', '8', 2021),
(6523, '0450002380', 'CLOSED - REGULER', '001', 'Kalimalang', 'INVST - INST LOAN', '1', 2022, 13567, 0, 0, 7499, 1323, 0, 1795, 0, 0, 'closed', '8', 2021),
(6524, '0450002380', 'CLOSED - REGULER', '001', 'Kalimalang', 'INVST - INST LOAN', '2', 2022, 13567, 0, 0, 7499, 1323, 0, 1795, 0, 0, 'closed', '8', 2021),
(6525, '0450002380', 'CLOSED - REGULER', '001', 'Kalimalang', 'INVST - INST LOAN', '3', 2022, 13567, 0, 0, 7499, 1323, 0, 1795, 0, 0, 'closed', '8', 2021),
(6526, '0450002380', 'CLOSED - REGULER', '001', 'Kalimalang', 'INVST - INST LOAN', '4', 2022, 13567, 0, 0, 7499, 1323, 0, 1795, 0, 0, 'closed', '8', 2021),
(6527, '0450002380', 'CLOSED - REGULER', '001', 'Kalimalang', 'INVST - INST LOAN', '5', 2022, 13567, 0, 0, 7499, 1323, 0, 1795, 0, 0, 'closed', '8', 2021),
(6528, '0450002380', 'CLOSED - REGULER', '001', 'Kalimalang', 'INVST - INST LOAN', '6', 2022, 13567, 0, 0, 7499, 1323, 0, 1795, 0, 0, 'closed', '8', 2021),
(6529, '0450002380', 'CLOSED - REGULER', '001', 'Kalimalang', 'INVST - INST LOAN', '7', 2022, 13567, 0, 0, 7499, 1323, 0, 1795, 0, 0, 'closed', '8', 2021),
(6530, '0450002380', 'CLOSED - REGULER', '001', 'Kalimalang', 'INVST - INST LOAN', '8', 2022, 13567, 0, 0, 7499, 1323, 0, 1795, 0, 0, 'closed', '8', 2021),
(6531, '0450002380', 'CLOSED - REGULER', '001', 'Kalimalang', 'INVST - INST LOAN', '9', 2022, 13567, 0, 0, 7499, 1323, 0, 1795, 0, 0, 'closed', '8', 2021),
(6532, '0450002380', 'CLOSED - REGULER', '001', 'Kalimalang', 'INVST - INST LOAN', '10', 2022, 13570, 0, 0, 7499, 1327, 0, 1794, 0, 0, 'closed', '8', 2021),
(6533, '0500006437', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '8', 2021, 23663, 0, 0, 0, 9120, 0, 0, 0, 0, 'paid', '', 0),
(6534, '0500006437', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '9', 2021, 23663, 0, 0, 0, 9120, 0, 0, 0, 0, 'paid', '', 0),
(6535, '0500006437', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '10', 2021, 23663, 0, 0, 0, 9120, 0, 0, 0, 0, 'belum', '', 0),
(6536, '0500006437', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '11', 2021, 23663, 0, 0, 0, 9120, 0, 0, 0, 0, 'belum', '', 0),
(6537, '0500006437', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '12', 2021, 23663, 0, 0, 0, 9120, 0, 0, 0, 0, 'belum', '', 0),
(6538, '0500006437', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '1', 2022, 23663, 0, 0, 0, 9120, 0, 0, 0, 0, 'belum', '', 0),
(6539, '0500006437', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '2', 2022, 23663, 0, 0, 0, 9120, 0, 0, 0, 0, 'belum', '', 0),
(6540, '0500006437', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '3', 2022, 23663, 0, 0, 0, 9120, 0, 0, 0, 0, 'belum', '', 0),
(6541, '0500006437', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '4', 2022, 23663, 0, 0, 0, 9120, 0, 0, 0, 0, 'belum', '', 0),
(6542, '0500006437', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '5', 2022, 23663, 0, 0, 0, 9120, 0, 0, 0, 0, 'belum', '', 0),
(6543, '0500006437', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '6', 2022, 23663, 0, 0, 0, 9120, 0, 0, 0, 0, 'belum', '', 0),
(6544, '0500006437', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '7', 2022, 23663, 0, 0, 0, 9120, 0, 0, 0, 0, 'belum', '', 0),
(6545, '0500006437', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '8', 2022, 23663, 0, 0, 0, 9120, 0, 0, 0, 0, 'belum', '', 0),
(6546, '0500006437', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '9', 2022, 23663, 0, 0, 0, 9120, 0, 0, 0, 0, 'belum', '', 0),
(6547, '0500006437', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '10', 2022, 23663, 0, 0, 0, 9120, 0, 0, 0, 0, 'belum', '', 0),
(6548, '0500006437', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '11', 2022, 23663, 0, 0, 0, 9120, 0, 0, 0, 0, 'belum', '', 0),
(6549, '0500006437', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '12', 2022, 23663, 0, 0, 0, 9120, 0, 0, 0, 0, 'belum', '', 0),
(6550, '0500006437', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '1', 2023, 23663, 0, 0, 0, 9120, 0, 0, 0, 0, 'belum', '', 0),
(6551, '0500006437', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '2', 2023, 23663, 0, 0, 0, 9120, 0, 0, 0, 0, 'belum', '', 0),
(6552, '0500006437', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '3', 2023, 23663, 0, 0, 0, 9120, 0, 0, 0, 0, 'belum', '', 0),
(6553, '0500006437', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '4', 2023, 23663, 0, 0, 0, 9120, 0, 0, 0, 0, 'belum', '', 0),
(6554, '0500006437', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '5', 2023, 23663, 0, 0, 0, 9120, 0, 0, 0, 0, 'belum', '', 0),
(6555, '0500006437', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '6', 2023, 23655, 0, 0, 0, 9121, 0, 0, 0, 0, 'belum', '', 0),
(6556, '0030006614', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '8', 2021, 3587, 0, 7255, 0, 2433, 0, 0, 0, 0, 'paid', '', 0),
(6557, '0030006614', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '9', 2021, 3587, 0, 7255, 0, 2433, 0, 0, 0, 0, 'paid', '', 0),
(6558, '0030006614', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '10', 2021, 3587, 0, 7255, 0, 2433, 0, 0, 0, 0, 'belum', '', 0),
(6559, '0030006614', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '11', 2021, 3587, 0, 7255, 0, 2433, 0, 0, 0, 0, 'belum', '', 0),
(6560, '0030006614', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '12', 2021, 3587, 0, 7255, 0, 2433, 0, 0, 0, 0, 'belum', '', 0),
(6561, '0030006614', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '1', 2022, 3587, 0, 7255, 0, 2433, 0, 0, 0, 0, 'belum', '', 0),
(6562, '0030006614', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '2', 2022, 3587, 0, 7255, 0, 2433, 0, 0, 0, 0, 'belum', '', 0),
(6563, '0030006614', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '3', 2022, 3587, 0, 7255, 0, 2433, 0, 0, 0, 0, 'belum', '', 0),
(6564, '0030006614', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '4', 2022, 3587, 0, 7255, 0, 2433, 0, 0, 0, 0, 'belum', '', 0),
(6565, '0030006614', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '5', 2022, 3587, 0, 7255, 0, 2433, 0, 0, 0, 0, 'belum', '', 0),
(6566, '0030006614', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '6', 2022, 3587, 0, 7255, 0, 2433, 0, 0, 0, 0, 'belum', '', 0),
(6567, '0030006614', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '7', 2022, 3587, 0, 7255, 0, 2433, 0, 0, 0, 0, 'belum', '', 0),
(6568, '0030006614', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '8', 2022, 3587, 0, 7255, 0, 2433, 0, 0, 0, 0, 'belum', '', 0),
(6569, '0030006614', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '9', 2022, 3587, 0, 7255, 0, 2433, 0, 0, 0, 0, 'belum', '', 0),
(6570, '0030006614', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '10', 2022, 3587, 0, 7255, 0, 2433, 0, 0, 0, 0, 'belum', '', 0),
(6571, '0030006614', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '11', 2022, 3587, 0, 7255, 0, 2433, 0, 0, 0, 0, 'belum', '', 0),
(6572, '0030006614', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '12', 2022, 3587, 0, 7255, 0, 2433, 0, 0, 0, 0, 'belum', '', 0),
(6573, '0030006614', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '1', 2023, 3587, 0, 7255, 0, 2433, 0, 0, 0, 0, 'belum', '', 0),
(6574, '0030006614', 'ACTIVE', '001', 'Kalimalang', 'MTGNA - INST LOAN', '2', 2023, 3596, 0, 7252, 0, 2435, 0, 0, 0, 0, 'belum', '', 0),
(6575, '0400004909', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '8', 2021, 0, 0, 0, 5475, 1507, 0, 0, 0, 0, 'paid', '', 0),
(6576, '0400004909', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '9', 2021, 0, 0, 0, 5475, 1507, 0, 0, 0, 0, 'paid', '', 0),
(6577, '0400004909', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '10', 2021, 0, 0, 0, 5475, 1507, 0, 0, 0, 0, 'belum', '', 0),
(6578, '0400004909', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '11', 2021, 0, 0, 0, 5475, 1507, 0, 0, 0, 0, 'belum', '', 0),
(6579, '0400004909', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '12', 2021, 0, 0, 0, 5475, 1507, 0, 0, 0, 0, 'belum', '', 0),
(6580, '0400004909', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '1', 2022, 0, 0, 0, 5475, 1507, 0, 0, 0, 0, 'belum', '', 0),
(6581, '0400004909', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '2', 2022, 0, 0, 0, 5475, 1507, 0, 0, 0, 0, 'belum', '', 0),
(6582, '0400004909', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '3', 2022, 0, 0, 0, 5475, 1507, 0, 0, 0, 0, 'belum', '', 0),
(6583, '0400004909', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '4', 2022, 0, 0, 0, 5475, 1507, 0, 0, 0, 0, 'belum', '', 0),
(6584, '0400004909', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '5', 2022, 0, 0, 0, 5475, 1507, 0, 0, 0, 0, 'belum', '', 0),
(6585, '0400004909', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '6', 2022, 0, 0, 0, 5475, 1507, 0, 0, 0, 0, 'belum', '', 0),
(6586, '0400004909', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '7', 2022, 0, 0, 0, 5475, 1507, 0, 0, 0, 0, 'belum', '', 0),
(6587, '0400004909', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '8', 2022, 0, 0, 0, 5475, 1507, 0, 0, 0, 0, 'belum', '', 0),
(6588, '0400004909', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '9', 2022, 0, 0, 0, 5475, 1507, 0, 0, 0, 0, 'belum', '', 0),
(6589, '0400004909', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '10', 2022, 0, 0, 0, 5475, 1507, 0, 0, 0, 0, 'belum', '', 0),
(6590, '0400004909', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '11', 2022, 0, 0, 0, 5470, 1509, 0, 0, 0, 0, 'belum', '', 0),
(6591, '0060012241', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '8', 2021, 0, 0, 0, 4924, 1875, 0, 0, 0, 0, 'paid', '', 0),
(6592, '0060012241', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '9', 2021, 0, 0, 0, 4924, 1875, 0, 0, 0, 0, 'paid', '', 0),
(6593, '0060012241', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '10', 2021, 0, 0, 0, 4924, 1875, 0, 0, 0, 0, 'belum', '', 0),
(6594, '0060012241', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '11', 2021, 0, 0, 0, 4924, 1875, 0, 0, 0, 0, 'belum', '', 0),
(6595, '0060012241', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '12', 2021, 0, 0, 0, 4924, 1875, 0, 0, 0, 0, 'belum', '', 0),
(6596, '0060012241', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '1', 2022, 0, 0, 0, 4924, 1875, 0, 0, 0, 0, 'belum', '', 0),
(6597, '0060012241', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '2', 2022, 0, 0, 0, 4924, 1875, 0, 0, 0, 0, 'belum', '', 0),
(6598, '0060012241', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '3', 2022, 0, 0, 0, 4924, 1875, 0, 0, 0, 0, 'belum', '', 0),
(6599, '0060012241', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '4', 2022, 0, 0, 0, 4924, 1875, 0, 0, 0, 0, 'belum', '', 0),
(6600, '0060012241', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '5', 2022, 0, 0, 0, 4924, 1875, 0, 0, 0, 0, 'belum', '', 0),
(6601, '0060012241', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '6', 2022, 0, 0, 0, 4924, 1875, 0, 0, 0, 0, 'belum', '', 0),
(6602, '0060012241', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '7', 2022, 0, 0, 0, 4924, 1875, 0, 0, 0, 0, 'belum', '', 0),
(6603, '0060012241', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '8', 2022, 0, 0, 0, 4924, 1875, 0, 0, 0, 0, 'belum', '', 0),
(6604, '0060012241', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '9', 2022, 0, 0, 0, 4924, 1875, 0, 0, 0, 0, 'belum', '', 0),
(6605, '0060012241', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '10', 2022, 0, 0, 0, 4924, 1875, 0, 0, 0, 0, 'belum', '', 0),
(6606, '0060012241', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '11', 2022, 0, 0, 0, 4924, 1875, 0, 0, 0, 0, 'belum', '', 0),
(6607, '0060012241', 'ACTIVE', '006', 'Bogor', 'MTGNA - INST LOAN', '12', 2022, 0, 0, 0, 4930, 1879, 0, 0, 0, 0, 'belum', '', 0),
(6608, '0060012564', 'CLOSED - REGULER', '006', 'Bogor', 'MTGNA - INST LOAN', '8', 2021, 4141, 0, 2653, 2788, 2124, 0, 0, 0, 0, 'closed', '8', 2021),
(6609, '0060012564', 'CLOSED - REGULER', '006', 'Bogor', 'MTGNA - INST LOAN', '9', 2021, 4141, 0, 2653, 2788, 2124, 0, 0, 0, 0, 'closed', '8', 2021),
(6610, '0060012564', 'CLOSED - REGULER', '006', 'Bogor', 'MTGNA - INST LOAN', '10', 2021, 4141, 0, 2653, 2788, 2124, 0, 0, 0, 0, 'closed', '8', 2021),
(6611, '0060012564', 'CLOSED - REGULER', '006', 'Bogor', 'MTGNA - INST LOAN', '11', 2021, 4141, 0, 2653, 2788, 2124, 0, 0, 0, 0, 'closed', '8', 2021),
(6612, '0060012564', 'CLOSED - REGULER', '006', 'Bogor', 'MTGNA - INST LOAN', '12', 2021, 4141, 0, 2653, 2788, 2124, 0, 0, 0, 0, 'closed', '8', 2021),
(6613, '0060012564', 'CLOSED - REGULER', '006', 'Bogor', 'MTGNA - INST LOAN', '1', 2022, 4141, 0, 2653, 2788, 2124, 0, 0, 0, 0, 'closed', '8', 2021),
(6614, '0060012564', 'CLOSED - REGULER', '006', 'Bogor', 'MTGNA - INST LOAN', '2', 2022, 4141, 0, 2653, 2788, 2124, 0, 0, 0, 0, 'closed', '8', 2021),
(6615, '0060012564', 'CLOSED - REGULER', '006', 'Bogor', 'MTGNA - INST LOAN', '3', 2022, 4141, 0, 2653, 2788, 2124, 0, 0, 0, 0, 'closed', '8', 2021),
(6616, '0060012564', 'CLOSED - REGULER', '006', 'Bogor', 'MTGNA - INST LOAN', '4', 2022, 4141, 0, 2653, 2788, 2124, 0, 0, 0, 0, 'closed', '8', 2021),
(6617, '0060012564', 'CLOSED - REGULER', '006', 'Bogor', 'MTGNA - INST LOAN', '5', 2022, 4141, 0, 2653, 2788, 2124, 0, 0, 0, 0, 'closed', '8', 2021),
(6618, '0060012564', 'CLOSED - REGULER', '006', 'Bogor', 'MTGNA - INST LOAN', '6', 2022, 4141, 0, 2653, 2788, 2124, 0, 0, 0, 0, 'closed', '8', 2021),
(6619, '0060012564', 'CLOSED - REGULER', '006', 'Bogor', 'MTGNA - INST LOAN', '7', 2022, 4143, 0, 2655, 2785, 2129, 0, 0, 0, 0, 'closed', '8', 2021),
(6620, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '8', 2021, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'paid', '', 0),
(6621, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '9', 2021, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'paid', '', 0),
(6622, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '10', 2021, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6623, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '11', 2021, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6624, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '12', 2021, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6625, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '1', 2022, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6626, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '2', 2022, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6627, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '3', 2022, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6628, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '4', 2022, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6629, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '5', 2022, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6630, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '6', 2022, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6631, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '7', 2022, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6632, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '8', 2022, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6633, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '9', 2022, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6634, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '10', 2022, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6635, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '11', 2022, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6636, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '12', 2022, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6637, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '1', 2023, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6638, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '2', 2023, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6639, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '3', 2023, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6640, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '4', 2023, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6641, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '5', 2023, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6642, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '6', 2023, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6643, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '7', 2023, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6644, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '8', 2023, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6645, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '9', 2023, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6646, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '10', 2023, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6647, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '11', 2023, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6648, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '12', 2023, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6649, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '1', 2024, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6650, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '2', 2024, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6651, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '3', 2024, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6652, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '4', 2024, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6653, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '5', 2024, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6654, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '6', 2024, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6655, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '7', 2024, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6656, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '8', 2024, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6657, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '9', 2024, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6658, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '10', 2024, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6659, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '11', 2024, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6660, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '12', 2024, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6661, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '1', 2025, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6662, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '2', 2025, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6663, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '3', 2025, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6664, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '4', 2025, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6665, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '5', 2025, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6666, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '6', 2025, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6667, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '7', 2025, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6668, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '8', 2025, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6669, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '9', 2025, 49226, 0, 0, 0, 6612, 0, 8938, 0, 0, 'belum', '', 0),
(6670, '0450002488', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '10', 2025, 49224, 0, 0, 0, 6608, 0, 8947, 0, 0, 'belum', '', 0),
(6671, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '8', 2021, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'paid', '', 0),
(6672, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '9', 2021, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'paid', '', 0),
(6673, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '10', 2021, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6674, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '11', 2021, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6675, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '12', 2021, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6676, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '1', 2022, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6677, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '2', 2022, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6678, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '3', 2022, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6679, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '4', 2022, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6680, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '5', 2022, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6681, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '6', 2022, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6682, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '7', 2022, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6683, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '8', 2022, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6684, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '9', 2022, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6685, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '10', 2022, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6686, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '11', 2022, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6687, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '12', 2022, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6688, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '1', 2023, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6689, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '2', 2023, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6690, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '3', 2023, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6691, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '4', 2023, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6692, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '5', 2023, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6693, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '6', 2023, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6694, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '7', 2023, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6695, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '8', 2023, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6696, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '9', 2023, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6697, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '10', 2023, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6698, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '11', 2023, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6699, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '12', 2023, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6700, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '1', 2024, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6701, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '2', 2024, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6702, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '3', 2024, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6703, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '4', 2024, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6704, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '5', 2024, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6705, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '6', 2024, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6706, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '7', 2024, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6707, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '8', 2024, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6708, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '9', 2024, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6709, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '10', 2024, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6710, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '11', 2024, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6711, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '12', 2024, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6712, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '1', 2025, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6713, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '2', 2025, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6714, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '3', 2025, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6715, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '4', 2025, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6716, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '5', 2025, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6717, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '6', 2025, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6718, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '7', 2025, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6719, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '8', 2025, 227582, 0, 0, 40683, 17290, 0, 0, 0, 0, 'belum', '', 0),
(6720, '0700001567', 'ACTIVE', '006', 'Bogor', 'MKRJA - MODAL USAHA', '9', 2025, 227578, 0, 0, 40705, 17292, 0, 0, 0, 0, 'belum', '', 0),
(6721, '0050012007', 'CLOSED - REGULER', '006', 'Bogor', 'MKRJA - MODAL USAHA', '8', 2021, 6217, 0, 0, 7521, 2247, 0, 0, 0, 0, 'closed', '8', 2021),
(6722, '0050012007', 'CLOSED - REGULER', '006', 'Bogor', 'MKRJA - MODAL USAHA', '9', 2021, 6217, 0, 0, 7521, 2247, 0, 0, 0, 0, 'closed', '8', 2021),
(6723, '0050012007', 'CLOSED - REGULER', '006', 'Bogor', 'MKRJA - MODAL USAHA', '10', 2021, 6217, 0, 0, 7521, 2247, 0, 0, 0, 0, 'closed', '8', 2021),
(6724, '0050012007', 'CLOSED - REGULER', '006', 'Bogor', 'MKRJA - MODAL USAHA', '11', 2021, 6217, 0, 0, 7521, 2247, 0, 0, 0, 0, 'closed', '8', 2021),
(6725, '0050012007', 'CLOSED - REGULER', '006', 'Bogor', 'MKRJA - MODAL USAHA', '12', 2021, 6217, 0, 0, 7521, 2247, 0, 0, 0, 0, 'closed', '8', 2021),
(6726, '0050012007', 'CLOSED - REGULER', '006', 'Bogor', 'MKRJA - MODAL USAHA', '1', 2022, 6217, 0, 0, 7521, 2247, 0, 0, 0, 0, 'closed', '8', 2021),
(6727, '0050012007', 'CLOSED - REGULER', '006', 'Bogor', 'MKRJA - MODAL USAHA', '2', 2022, 6217, 0, 0, 7521, 2247, 0, 0, 0, 0, 'closed', '8', 2021),
(6728, '0050012007', 'CLOSED - REGULER', '006', 'Bogor', 'MKRJA - MODAL USAHA', '3', 2022, 6220, 0, 0, 7518, 2249, 0, 0, 0, 0, 'closed', '8', 2021),
(6729, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '8', 2021, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'paid', '', 0),
(6730, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '9', 2021, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'paid', '', 0),
(6731, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '10', 2021, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6732, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '11', 2021, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6733, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '12', 2021, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6734, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '1', 2022, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6735, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '2', 2022, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6736, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '3', 2022, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6737, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '4', 2022, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6738, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '5', 2022, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6739, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '6', 2022, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6740, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '7', 2022, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6741, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '8', 2022, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6742, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '9', 2022, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6743, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '10', 2022, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6744, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '11', 2022, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6745, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '12', 2022, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6746, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '1', 2023, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6747, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '2', 2023, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6748, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '3', 2023, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6749, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '4', 2023, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6750, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '5', 2023, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6751, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '6', 2023, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6752, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '7', 2023, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6753, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '8', 2023, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6754, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '9', 2023, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6755, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '10', 2023, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6756, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '11', 2023, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6757, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '12', 2023, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6758, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '1', 2024, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6759, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '2', 2024, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6760, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '3', 2024, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6761, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '4', 2024, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0);
INSERT INTO `tbl_psak_detail` (`id`, `no_pin`, `account_sts`, `kode_cabang`, `cabang`, `fincat`, `bulan`, `tahun`, `refund_npv`, `refund_asuransi`, `refund_adm`, `ins_receivable`, `by_notaris`, `pend_asuransi`, `pend_survey`, `pend_fidusia`, `pend_provisi`, `status_paid`, `bulan_close`, `tahun_close`) VALUES
(6762, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '5', 2024, 85457, 0, 0, 97783, 8769, 0, 0, 0, 0, 'belum', '', 0),
(6763, '0050012187', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '6', 2024, 85457, 0, 0, 97788, 8762, 0, 0, 0, 0, 'belum', '', 0),
(6764, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '8', 2021, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'paid', '', 0),
(6765, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '9', 2021, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'paid', '', 0),
(6766, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '10', 2021, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6767, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '11', 2021, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6768, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '12', 2021, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6769, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '1', 2022, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6770, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '2', 2022, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6771, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '3', 2022, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6772, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '4', 2022, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6773, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '5', 2022, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6774, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '6', 2022, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6775, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '7', 2022, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6776, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '8', 2022, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6777, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '9', 2022, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6778, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '10', 2022, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6779, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '11', 2022, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6780, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '12', 2022, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6781, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '1', 2023, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6782, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '2', 2023, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6783, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '3', 2023, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6784, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '4', 2023, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6785, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '5', 2023, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6786, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '6', 2023, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6787, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '7', 2023, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6788, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '8', 2023, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6789, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '9', 2023, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6790, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '10', 2023, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6791, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '11', 2023, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6792, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '12', 2023, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6793, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '1', 2024, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6794, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '2', 2024, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6795, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '3', 2024, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6796, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '4', 2024, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6797, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '5', 2024, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6798, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '6', 2024, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6799, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '7', 2024, 94011, 0, 0, 162922, 14880, 0, 0, 0, 0, 'belum', '', 0),
(6800, '0030006753', 'ACTIVE', '008', 'Sukabumi', 'MKRJA - MODAL USAHA', '8', 2024, 94010, 0, 0, 162916, 14872, 0, 0, 0, 0, 'belum', '', 0);

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

--
-- Dumping data untuk tabel `tbl_saldo_awal`
--

INSERT INTO `tbl_saldo_awal` (`id`, `fincat`, `bulan`, `tahun`, `refund_npv`, `refund_asuransi`, `refund_adm`, `ins_receivable`, `by_notaris`, `pend_asuransi`, `pend_survey`, `pend_fidusia`, `pend_provisi`) VALUES
(55, 'INVST - INST LOAN', '8', '2021', 3908034, 0, 1006071, 4140643, 1006841, 0, 423421, 0, 0),
(56, 'MKRJA - MODAL USAHA', '8', '2021', 20408760, 0, 0, 11544855, 2077148, 0, 455847, 0, 0),
(57, 'MTGNA - INST LOAN', '8', '2021', 662097, 0, 169680, 204762, 337476, 0, 0, 0, 0),
(58, 'INVST - INST LOAN', '9', '2021', 3560937, 0, 976481, 3881259, 951711, 0, 381148, 0, 0),
(59, 'MKRJA - MODAL USAHA', '9', '2021', 19902745, 0, 0, 11183302, 2011619, 0, 446909, 0, 0),
(60, 'MTGNA - INST LOAN', '9', '2021', 585153, 0, 130587, 160910, 297048, 0, 0, 0, 0),
(61, 'INVST - INST LOAN', '10', '2021', 3417348, 0, 946891, 3734360, 916430, 0, 365799, 0, 0),
(62, 'MKRJA - MODAL USAHA', '10', '2021', 19446469, 0, 0, 10881914, 1964068, 0, 437971, 0, 0),
(63, 'MTGNA - INST LOAN', '10', '2021', 557903, 0, 123332, 150511, 282113, 0, 0, 0, 0);

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
-- Indeks untuk tabel `tbl_penyusutan_closed`
--
ALTER TABLE `tbl_penyusutan_closed`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `tbl_penyusutan_closed`
--
ALTER TABLE `tbl_penyusutan_closed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_psak`
--
ALTER TABLE `tbl_psak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT untuk tabel `tbl_psak_detail`
--
ALTER TABLE `tbl_psak_detail`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6801;

--
-- AUTO_INCREMENT untuk tabel `tbl_saldo_awal`
--
ALTER TABLE `tbl_saldo_awal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

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
