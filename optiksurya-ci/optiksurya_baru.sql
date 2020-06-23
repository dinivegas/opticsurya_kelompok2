-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2020 at 02:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `optiksurya`
--

-- --------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `optiksurya_baru`;

CONNECT `optiksurya_baru`;

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_berita` varchar(20) NOT NULL,
  `judul_berita` varchar(100) NOT NULL,
  `slug_berita` varchar(100) NOT NULL,
  `keyword` text DEFAULT NULL,
  `status_berita` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tgl_post` datetime NOT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kd_transaksi` varchar(200) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `rekening_pembayaran` varchar(20) DEFAULT NULL,
  `rekening_pelanggan` varchar(20) DEFAULT NULL,
  `bukti_pembayaran` varchar(20) DEFAULT NULL,
  `id_rekening` int(11) DEFAULT NULL,
  `tgl_bayar` int(255) DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tgl_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `id_user`, `id_pelanggan`, `nama_pelanggan`, `email`, `telepon`, `alamat`, `kd_transaksi`, `tgl_transaksi`, `jumlah_transaksi`, `status_bayar`, `jumlah_bayar`, `rekening_pembayaran`, `rekening_pelanggan`, `bukti_pembayaran`, `id_rekening`, `tgl_bayar`, `nama_bank`, `tgl_update`, `tgl_post`) VALUES
(12, 0, 1, 'Rina Nose', 'rinanose@gmial.com', '082145678909', 'pesanggaran-Banyuwangi', '03062020S2AURPQL', '2020-06-03 00:00:00', 190000, 'Konfirmasi', 190000, '67831923782', 'Rina Nose', 'Bukti_Bayar_Perdoki_', 4, 3, 'BANK BCA', '2020-06-03 13:17:23', '2020-06-03 14:55:56'),
(13, 0, 3, 'Oh Sehun', 'sehun@gmail.com', '087234167909', 'jember', '030620207KCVWBST', '2020-06-03 00:00:00', 249000, 'Konfirmasi', 249000, '253682926247', 'Oh Sehun', 'drawn-galaxy-pintere', 4, 3, 'BANK MANDIRI', '2020-06-03 13:09:23', '2020-06-03 14:56:28'),
(14, 0, 5, 'Dita Karang', 'dita@gmail.com', '085289012378', 'Malang', '030620207U2CYZAK', '2020-06-03 00:00:00', 213000, 'Konfirmasi', 213000, '357830498820', 'Dita Karang', 'Bukti_Bayar_Perdoki_', 4, 3, 'BANK BCA', '2020-06-03 13:26:01', '2020-06-03 14:58:15'),
(15, 0, 2, 'ajengayupangesti', 'ajeng@gmail.com', '082234167909', 'banyuwangi', '03062020FUK0KY9H', '2020-06-03 00:00:00', 149000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-03 14:33:37', '2020-06-03 16:33:37'),
(16, 0, 2, 'ajengayupangesti', 'ajeng@gmail.com', '082234167909', 'banyuwangi', '030620206PQIDUON', '2020-06-03 00:00:00', 35000, 'Konfirmasi', 35000, '157838101', 'Ajeng Ayu Pangesti', 'bukti-pembayaran-STA', 4, 5, 'BANK MANDIRI', '2020-06-05 14:56:08', '2020-06-03 17:31:28'),
(17, 0, 3, 'Oh Sehun', 'sehun@gmail.com', '087234167909', 'jember', '05062020KH62RUQK', '2020-06-05 00:00:00', 18000, 'Konfirmasi', 18000, '3728918371', 'Oh Sehun', 'Bukti_Bayar_Perdoki_', 4, 5, 'BANK BRI', '2020-06-05 14:24:43', '2020-06-05 14:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `judul_gambar` varchar(200) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id_produk`, `judul_gambar`, `gambar`, `tgl_update`) VALUES
(1, 5, 'kacamata hitam', 'animasi_copy.png', '2020-04-19 06:48:33'),
(2, 11, 'softlens', 'softlens.jpg', '2020-05-01 14:39:40'),
(3, 14, 'kacamata1', 'kacamata11.jpg', '2020-05-06 11:52:39'),
(4, 14, 'kacamata2', 'kacamata21.jpg', '2020-05-06 11:53:00'),
(5, 8, 'gambar', '6.jpg', '2020-05-06 12:02:28'),
(6, 9, 'gambar 2', '61.jpg', '2020-05-06 12:11:31'),
(7, 22, 'namida2', 'namida2.jpg', '2020-05-16 15:26:42'),
(8, 22, 'namida3', 'namida3.jpg', '2020-05-16 15:26:52'),
(9, 23, 'akuta2', 'akuta2.jpg', '2020-05-16 15:30:59'),
(10, 23, 'akuta3', 'akuta3.jpg', '2020-05-16 15:31:12'),
(11, 24, 'kalulu2', 'kalulu2.jpg', '2020-05-16 15:37:26'),
(12, 24, 'kalulu3', 'kalulu3.jpg', '2020-05-16 15:37:39'),
(13, 28, '1', '3bbd85164933729da4e22235364f50ea.jpg', '2020-05-17 06:24:26'),
(14, 28, '2', '134814d5c813d98aca54fec61dec36a7.jpg', '2020-05-17 06:24:35'),
(15, 29, '1', '728687840f8103d574e33c414a7dc162.jpg', '2020-05-17 06:29:10'),
(16, 31, '1', 'shikaru1.jpg', '2020-05-17 06:37:15'),
(17, 31, '2', 'shigoru4.jpg', '2020-05-17 06:37:54'),
(18, 31, '3', 'shikaru2.jpg', '2020-05-17 06:38:10'),
(19, 31, '4', 'shikaru3.jpg', '2020-05-17 06:38:26'),
(20, 32, '1', 'yoshuka1.jpg', '2020-05-17 06:42:04'),
(21, 32, '2', 'yoshuka.jpg', '2020-05-17 06:42:13'),
(22, 32, '3', 'yoshuka3.jpg', '2020-05-17 06:42:20'),
(23, 33, '1', 'sem2.jpg', '2020-05-17 06:45:59'),
(24, 33, '2', 'sem3.jpg', '2020-05-17 06:46:09'),
(25, 38, '1', 'case.jpg', '2020-05-21 14:34:21'),
(26, 38, '3', 'ede4e02a7ad1d8daba7129af26f5cef6.jpg', '2020-05-21 14:37:42'),
(27, 38, '4', 'case.jpg', '2020-05-21 14:37:53'),
(28, 40, 'gambar1', '1.jpg', '2020-06-05 12:34:43'),
(29, 40, 'Gambar2', '3.jpg', '2020-06-05 12:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(200) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `urutan` int(11) NOT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`, `tgl_update`) VALUES
(1, 'kacamata-anak', 'Kacamata Anak', 1, '2020-04-17 13:11:05'),
(2, 'kacamata-wanita', 'Kacamata Wanita', 2, '2020-04-20 11:21:35'),
(3, 'kacamata-pria', 'Kacamata Pria', 3, '2020-04-20 11:21:50'),
(4, 'sunglasses', 'Sunglasses', 4, '2020-04-20 11:22:12'),
(5, 'lensa', 'Lensa', 5, '2020-05-16 15:03:37'),
(7, 'accesories', 'Accesories', 6, '2020-04-20 15:21:50'),
(8, 'softlens', 'Softlens', 7, '2020-04-20 15:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(100) NOT NULL,
  `tagline` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `keyword` text DEFAULT NULL,
  `metatext` text DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `email`, `website`, `keyword`, `metatext`, `telepon`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `rekening_pembayaran`, `tgl_update`) VALUES
(1, 'Optik Surya', 'optik', 'opsur@gmail.com', 'www.opsur.com', 'optik', 'optik', '08231467184', 'jember', 'opsur', 'opsur', 'optik surya e-commerce kacamata', 'logo5.png', 'logo4.png', '00-88886--88', '2020-06-05 12:43:54');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_daftar` datetime NOT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_user`, `status_pelanggan`, `nama_pelanggan`, `email`, `password`, `telepon`, `alamat`, `tgl_daftar`, `tgl_update`) VALUES
(1, 0, 'Pending', 'Rina Nose', 'rinanose@gmial.com', 'b80131d607a5af7e1067100ce5bca26474d49247', '082145678909', 'pesanggaran-Banyuwangi', '2020-05-07 15:39:37', '2020-06-01 13:37:47'),
(2, 0, 'Pending', 'ajengayupangesti', 'ajeng@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '082234167909', 'banyuwangi', '2020-05-08 04:29:27', '2020-05-08 02:29:27'),
(3, 0, 'Pending', 'Oh Sehun', 'sehun@gmail.com', 'bb330ee4432ee0ad4ef207b0416b10d05946d1c6', '087234167909', 'jember', '2020-05-30 15:14:53', '2020-05-30 13:14:53'),
(4, 0, 'Pending', 'alda karisma', 'aldakarisma@gmail.com', '8026cbd890cd121267c40e5a3221a81eba323b2c', '081459021567', 'sumbersari jember', '2020-05-31 07:17:48', '2020-05-31 05:17:48'),
(5, 0, 'Pending', 'Dita Karang', 'dita@gmail.com', '9905046d18474d88a51e82bdf5497652938f8455', '085289012378', 'Malang', '2020-06-03 14:57:20', '2020-06-03 12:57:20'),
(6, 0, 'Pending', 'yeriyemima', 'yeri@gmail.com', 'f68beb38eb2124d1bdb9fb244b87572f076ee6da', '085289153291', 'Malang', '2020-06-09 16:17:08', '2020-06-09 14:17:08');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kd_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `slug_produk` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `keyword` text DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `berat` float DEFAULT NULL,
  `status_produk` varchar(20) NOT NULL,
  `tgl_post` datetime NOT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `id_kategori`, `kd_produk`, `nama_produk`, `slug_produk`, `keterangan`, `keyword`, `harga`, `stok`, `gambar`, `berat`, `status_produk`, `tgl_post`, `tgl_update`) VALUES
(11, 4, 7, 'BR008', 'Softlens', 'softlens-br008', '<p>\"</p>\r\n\r\n<p>softlen minus</p>\r\n\r\n<p>\"</p>\r\n', 'softlens', 45000, 50, '482979535_fd4930a8-959a-485c-b511-654636f45759_2048_2048.png', 50, 'Publish', '2020-05-16 17:38:38', '2020-05-16 15:38:38'),
(12, 4, 8, 'BR010', 'Kacamata Bernic', 'kacamata-bernic-br010', '<p>bagus</p>\r\n', 'Bernic', 150000, 10, '6.jpg', 10, 'Publish', '2020-05-16 17:21:32', '2020-05-16 15:21:32'),
(13, 4, 4, 'BR011', 'Sunglasses Rayban Clubmaster Polarized RB 3016 ', 'sunglasses-rayban-clubmaster-polarized-rb-3016-br011', '<p>\"</p>\r\n\r\n<p>bagus</p>\r\n\r\n<p>\"</p>\r\n', 'sunglasses', 200000, 10, 'sunglasses_rayban_clubmaster_polarized_RB_3016.jpeg', 15, 'Publish', '2020-05-16 17:21:18', '2020-05-16 15:21:18'),
(15, 4, 3, 'BR013', 'Kacamata Antiradiasi Pria', 'kacamata-antiradiasi-pria-br013', '<p>Retro Lensa Pria Anti Radiasi Kacamata Wanita Optik Kacamata Bingkai Anti Blue Ray Kacamata Komputer Kacamata Kacamata 3109</p>\r\n', 'Kacamata Antiradiasi Pria', 250000, 10, 'kacamata_antiradiasi1.jpg', 10, 'Publish', '2020-05-06 15:23:12', '2020-05-06 13:23:12'),
(16, 4, 8, 'BR014', 'Frame Carera', 'frame-carera-br014', '<h3>Deskripsi</h3>\r\n\r\n<p>Frame kacamata untuk minus / plus / silindris.<br />\r\n<br />\r\n<br />\r\nUkuran : 53-17-148<br />\r\nTinggi : 48<br />\r\n<br />\r\nSpring / Per : Tidak<br />\r\n<br />\r\nKelengkapan :<br />\r\n- Box Cepuk / Sleting Frame<br />\r\n- Lap<br />\r\n<br />\r\nBonus cairan pembersih lensa.<br />\r\n<br />\r\nKeterangan :<br />\r\nLensa bawaan masih normal.<br />\r\nJika mau ganti lensa minus / plus / silindris, silahkan atc juga lensanya di sini</p>\r\n', 'Frame Carera', 130000, 10, 'korea.jpg', 350, 'Publish', '2020-05-16 17:20:05', '2020-05-16 15:20:05'),
(17, 4, 3, 'BR015', 'Brand Frame Kacamata Pria Minus Korea Ganteng Model Terbaru', 'brand-frame-kacamata-pria-minus-korea-ganteng-model-terbaru-br015', '<h2>Deskripsi Brand Frame Kacamata Pria Minus Korea Ganteng Model Terbaru</h2>\r\n\r\n<p>PROMO FRAME KACAMATA MINUS<br />\r\nFrame Kacamata Dengan Material besi berkualitas standard optik kuat dan nyaman dipakai.<br />\r\n<br />\r\nharga sudah termasuk Paket Free Lensa dengan kelengkapan Case, Lap Kacamata dan Cairan pembersih semprot.<br />\r\n<br />\r\nwarna<br />\r\n- Full Black<br />\r\n<br />\r\n<br />\r\nFree Lensa Dengan Ketentuan Ukuran :<br />\r\n1. Ukuran Lensa Normal / Plano<br />\r\n2. Ukuran Lensa ( MINUS MAXIMAL -5 ) Dengan Atau Tanpa Cylinder ( MAXIMAL Kombinasi CYLINDER 2 )<br />\r\n3. Cylinder Murni ( MAXIMAL CYLINDER 2 )<br />\r\n4. Ukuran Lensa ( PLUS MAXIMAL +3 )<br />\r\n<br />\r\n- SEMUA LENSA SUDAH SUPERSIN ANTI RADIASI -<br />\r\n<br />\r\nDi Luar Ukuran Di atas / Jenis Lensa Lainya<br />\r\n---BEDA HARGA ATAU KENA BIAYA TAMBAHAN---<br />\r\n(Progresive, blueray, Photocromic, Rodenstock, Essilor, Lensa Tipis Index 1.67 ) Silahkan Tanyakan Via Chat<br />\r\n<br />\r\nNote :<br />\r\nMasukan Pilihan Warna Di Kolom keterangan Pada saat melakukan Order..<br />\r\nJika Kolom keterangan Kosong Warna Dikirimkan Random Sesuai Ketersediaan.<br />\r\n<br />\r\n- Free Bubble Wrap<br />\r\n(Tidak ada Penambahan biaya untuk bubble Wrap, Packing Aman)</p>\r\n', 'Brand Frame Kacamata Pria Minus Korea Ganteng Model Terbaru', 150000, 10, 'kacamata_antiradiasi1.jpg', 250, 'Publish', '2020-05-16 17:19:31', '2020-05-16 15:19:31'),
(18, 4, 1, 'BR016', 'Kacamata Anak Lensa Anti Radiasi Minus Normal Plus Silinder Frame Petak', 'kacamata-anak-lensa-anti-radiasi-minus-normal-plus-silinder-frame-petak-br016', '<h3>Deskripsi</h3>\r\n\r\n<p>Kacamata Anti Radiasi Komputer (EMI COAT LENS)<br />\r\n<br />\r\nAda per<br />\r\nunisex, untuk anak2, bahan plastik, jamin awet<br />\r\n<br />\r\nBerfungi menjaga mata tetap sehat, terutama bagi pengguna komputer atau smartphone yang sering menatap layar, membantu mencegah minus, menghindari mata perih atau sakit karena terlalu lama berada di depan komputer atau HP<br />\r\n<br />\r\nsudah termasuk<br />\r\nLensa normal sd minus 600<br />\r\nsilinder max -200<br />\r\nplus max 3<br />\r\nLap Lensa, cairan pembersih lensa dan kotak kacamata<br />\r\n<br />\r\nLensa ukuran lain, contact seller</p>\r\n', 'Kacamata Anak Lensa Anti Radiasi Minus Normal Plus Silinder Frame Petak', 150000, 10, 'kacamata_Anak_lensa_anti_radiasi_minus_normal_plus_silinder_.jpg', 350, 'Publish', '2020-05-16 17:19:16', '2020-05-16 15:19:16'),
(20, 4, 8, 'BR018', ' Slip Silicone Glasses Ear Hooks', 'slip-silicone-glasses-ear-hooks-br018', '<p><br />\r\n1 Pair Anti Slip Ear Hooks Aksesoris Kacamata Kacamata Silicone Temple Tip</p>\r\n\r\n<p>Fitur:<br />\r\nBaru &amp; berkualitas tinggi. Non-slip, nyaman. Mudah digunakan.</p>\r\n\r\n<p>Simpan kacamata dan kacamata hitam di tempatnya saat digunakan.</p>\r\n\r\n<p>Mudah digunakan. sempurna untuk olahraga, tarian &amp; kegiatan.</p>\r\n\r\n<p>Silikon berkualitas tinggi anti slip pemegang untuk kacamata, kait telinga, pemegang ujung candi</p>\r\n\r\n<p>Super lembut dan ringan, nyaman dan aman.</p>\r\n\r\n<p>Bahan: Silikon Berkualitas Tinggi</p>\r\n\r\n<p>Warna: Seperti gambar yang ditunjukkan</p>\r\n\r\n<p>Ukuran (PxL): kira-kira. 36mm x 10mm</p>\r\n\r\n<p>Ukuran Lubang (HxW): kira-kira. 6x2.5mm</p>\r\n\r\n<p>Paket Termasuk: 1 Pasang Genggaman Telinga</p>\r\n\r\n<p>catatan:</p>\r\n\r\n<p>1. Perkenankan perbedaan 1-2mm karena pengukuran manual, terima kasih.</p>\r\n\r\n<p>2. Tolong mengerti karena perbedaan iradiasi cahaya atau tampilan komputer, jadi saya tidak dapat menjamin foto dan warna asli adalah 100% sama.</p>\r\n', ' Slip Silicone Glasses Ear Hooks', 25000, 20, 'bb.jpg', 15, 'Publish', '2020-05-06 15:39:36', '2020-05-06 13:39:36'),
(21, 4, 7, 'BR019', 'Queena 78 cm Stainless Steel Plating Kacamata Aksesoris Kacamata Tali', 'queena-78-cm-stainless-steel-plating-kacamata-aksesoris-kacamata-tali-br019', '<p>Nama merek: Queena</p>\r\n\r\n<p>Warna : Gold dan Silver</p>\r\n\r\n<p>Bahan: Manik-manik</p>\r\n', 'Queena 78 cm Stainless Steel Plating Kacamata Aksesoris Kacamata Tali', 50000, 10, 'Queena-78cm-Stainless-Steel-Plating-Glasses-Accessories_jpg_350x350.jpg', 5, 'Publish', '2020-05-16 17:18:11', '2020-05-16 15:18:11'),
(22, 4, 2, 'BR020', 'Frame Namida', 'frame-namida-br020', 'Tentukan gaya anda sendiri dengan kami \r\nfoto on model klik  \r\nNama kacamata:NAMIDA \r\nSize : 50-19-135\r\nHarga. : Rp159000 (include case and cleaner)\r\nBahan:mika plastik-besi almunium _____________________________________________\r\n.\r\nTerima pasang lensa (-/+), (cyl), (anti radiasi)\r\nJenis Lensa : - Lensa anti radiasi supersin\r\n- Lensa fotogrey \r\n- Lensa photocromik \r\n- Lensa Essilor cryzal\r\nCaranya yaitu dengan order bagian lensa terpisah dam memberikan keterangan Nama kamuyang nanti akan kami pasangkan sekaligus.\r\nchat kami saja jika ada yang kamu tanyakan yah ', 'Frame Namida', 159000, 10, 'namida1.jpg', 350, 'Publish', '2020-05-16 17:26:25', '2020-05-16 15:26:25'),
(23, 4, 3, 'BR021', 'Frame Akuta', 'frame-akuta-br021', 'Frame AKUTA !! Material frame Mika plastik buat yg mungil-mungil cocok. \r\npesan sekarang ! Karna kami tidak mau membuat kalian menunggu AKUTA Restock. Menunggu itu tidak enak???? \r\nFrame : AKUTA\r\nSize : 50-18-140\r\nWarna : Hitam Glossy, Hitam Doff & Grey', 'Frame Akuta', 314000, 10, 'akuta1.jpg', 350, 'Publish', '2020-05-16 17:30:40', '2020-05-16 15:30:40'),
(24, 4, 3, 'BR022', 'Frame Kalulu', 'frame-kalulu-br022', '???????????????????????????? ???????????????????? :\r\n????. Type: KALULU FRAME\r\n????. Harga: Rp. 139,000.-\r\n????. Warna: Black Doff\r\n????. Material: Mika Plastik\r\n????. Ukuran: (Cek Posting Cara Ukur Frame Kacamata)\r\n-?Lebar Lensa: 51 mm\r\n-?Gagang Hidung: 17 mm\r\n-?Panjang Gagang: 142 mm', 'Frame Kalulu', 139000, 10, 'kalulu.jpg', 250, 'Publish', '2020-05-16 17:34:50', '2020-05-16 15:34:50'),
(25, 8, 5, 'BR023', 'Lensa Photocromic', 'lensa-photocromic-br023', '<p>&nbsp;</p>\r\n\r\n<p>LENSA INI DAPAT DI GUNAKAN UNTUK NORMAL MAUPUN KOMBINASI MINUS Dan CYL.<br />\r\n<br />\r\nLensa photocromic<br />\r\nLensa ini bisa berubah warna<br />\r\njika didalam ruangan lensa berwarna putih bening<br />\r\ntetapi jika diluar ruangan lensa akan berubah warna menjadi gelap<br />\r\nseperti sunglass<br />\r\n<br />\r\nbahan lensa mika supersin<br />\r\nanti radiasi komputer, hp, dan UV<br />\r\n<br />\r\nUkuran :<br />\r\n- Maksimal -3.00<br />\r\n- Maksimal Cyl 2.00</p>\r\n', 'Lensa Photocromic', 140000, 10, 'Lensa_Photocromic_Berubah_Warna_Otomatis.jpg', 10, 'Publish', '2020-05-17 08:12:42', '2020-05-17 06:12:42'),
(26, 8, 8, 'BR024', 'Lensa Photochromic Untuk kacamata minus', 'lensa-photochromic-untuk-kacamata-minus-br024', '<p>Lensa Photochromic adalah lensa yang dapat berubah warna ketika anda berada diluar ruangan jika kacamata dengan lensa photochromic yang anda pakai terkena sinar matahari.lensa ini sangat berguna untuk anda yang sering beraktivitas diluar ruangan setiap hari.</p>\r\n', 'Lensa Photochromic Untuk kacamata minus', 150000, 10, 'Frame_kacamata_Dior_TR_2189__size__52_19_147__Rp_35000.jpg', 15, 'Publish', '2020-05-17 08:15:32', '2020-05-17 06:15:32'),
(27, 8, 8, 'BR025', ' SCP Black square frame sunglasses', 'scp-black-square-frame-sunglasses-br025', '<p>bagus</p>\r\n', ' SCP Black square frame sunglasses', 150000, 10, '41KEMcKWw7L__UX522_.jpg', 100, 'Publish', '2020-05-17 08:18:00', '2020-05-17 06:18:00'),
(28, 8, 8, 'BR026', 'Hikaru Sunglasses', 'hikaru-sunglasses-br026', '<p>&nbsp;</p>\r\n\r\n<p>SPESIFIKASI PRODUK</p>\r\n\r\n<p>&gt; Nama Kacamata : HIKARU</p>\r\n\r\n<p>&gt; Warna : HITAM &gt; Cocok Untuk : Pria &amp; Wanita</p>\r\n\r\n<p>&gt; Material / Bahan : Besi Alloy</p>\r\n\r\n<p>&gt; Lebar Lensa : 4.9 cm &gt; Bridge / Nosepad : 2 cm</p>\r\n\r\n<p>&gt; Panjang Kaki Samping : 13.5 cm</p>\r\n\r\n<p>&gt; Tinggi Lensa : 4.4 cm</p>\r\n\r\n<p>&gt; Total Lebar Depan : 14 cm PILIHAN LENSA</p>\r\n\r\n<p>&gt; LENSA WARNA : Lensa untuk kacamata hitam / sunglasses, lensa hitam atau berwarna dan mau dibikin MINUS / SILINDER pakai-nya lensa ini ya.</p>\r\n', 'Hikaru Sunglasses', 249000, 10, '6cf59d039a632c131477dee05de29b9d.jpg', 350, 'Publish', '2020-05-17 08:24:11', '2020-05-17 06:24:11'),
(29, 8, 4, 'BR027', 'Okinaru Sunglasses ', 'okinaru-sunglasses-br027', '<p>&nbsp;</p>\r\n\r\n<p>Nama Kacamata : OKINARU SUNGLASSES</p>\r\n\r\n<p>Warna : HITAM Bahan : Mika Plastik</p>\r\n\r\n<p>---- DETAIL UKURAN ----</p>\r\n\r\n<p>- Lebar Lensa : 50mm</p>\r\n\r\n<p>- Nosepad : 19mm</p>\r\n\r\n<p>- Kaki : 140mm</p>\r\n\r\n<p>- Tinggi Lensa : 40mm</p>\r\n\r\n<p>- Lebar Depan : 140mm</p>\r\n', 'Okinaru Sunglasses ', 249000, 10, 'okinaru.jpg', 250, 'Publish', '2020-05-17 08:28:56', '2020-05-17 06:28:56'),
(30, 8, 3, 'BR028', 'FRAME KACAMATA HARLOW', 'frame-kacamata-harlow-br028', '<p>&nbsp;</p>\r\n\r\n<p>Frame : HARLOW Size : 48-19-135 Warna : Full Hitam, Transparan &amp; pink Harga Frame : Rp 149.000 (Include Hardcase dan Lap Pembersih)</p>\r\n', 'FRAME KACAMATA HARLOW', 149000, 10, 'harlow.jpg', 250, 'Publish', '2020-05-17 08:33:16', '2020-05-17 06:33:16'),
(31, 8, 3, 'BR029', 'FRAME KACAMATA – SHIGORU HITAM', 'frame-kacamata-shigoru-hitam-br029', '<p>SPESIFIKASI PRODUK</p>\r\n\r\n<p>&gt; Nama Kacamata : SHIGORU</p>\r\n\r\n<p>&gt; Warna : HITAM</p>\r\n\r\n<p>&gt; Cocok Untuk : Pria &amp; Wanita</p>\r\n\r\n<p>&gt; Material / Bahan : Mika Plastik + Besi Alloy</p>\r\n\r\n<p>&gt; Lebar Lensa : 5 cm &gt; Bridge / Nosepad : 2.1 cm</p>\r\n\r\n<p>&gt; Panjang Kaki Samping : 14 cm</p>\r\n\r\n<p>&gt; Tinggi Lensa : 4.2 cm</p>\r\n\r\n<p>&gt; Total Lebar Depan : 14.2 cm</p>\r\n', 'FRAME KACAMATA – SHIGORU HITAM', 169000, 10, 'shikaru.jpg', 250, 'Publish', '2020-05-17 08:36:57', '2020-05-17 06:36:57'),
(32, 8, 2, 'BR039', 'Frame Kacamata YOSHUKA', 'frame-kacamata-yoshuka-br039', '<p>Frame : YOSHUKA</p>\r\n\r\n<p>Size : 50-20-140 Warna : Hitam Glossy, Hitam Doff &amp; Hrey</p>\r\n\r\n<p>Harga Frame : Rp 159.000 (Include Hardcase dan Lap Pembersih)</p>\r\n', 'Frame Kacamata YOSHUKA', 159000, 10, 'yoshuka2.jpg', 250, 'Publish', '2020-05-17 08:41:52', '2020-05-17 06:41:52'),
(33, 8, 2, 'BR031', ' FRAME KACAMATA SEM 1738', 'frame-kacamata-sem-1738-br031', '<p>Frame : SEM 1738</p>\r\n\r\n<p>Size : 46-20-138</p>\r\n\r\n<p>Warna : Hitam, Silver &amp; Pink</p>\r\n\r\n<p>Harga Frame : Rp 155.000 (Include Hardcase dan Lap Pembersih)</p>\r\n', ' FRAME KACAMATA SEM 1738', 155000, 10, 'sem1.jpg', 250, 'Publish', '2020-05-17 08:45:42', '2020-05-17 06:45:42'),
(34, 8, 8, 'BR032', 'SOFTLENS IDOL ROZE BY SWEET 15 MM BEST SELLER', 'softlens-idol-roze-by-sweet-15-mm-best-seller-br032', '<p>SOFTLENS sweet idol roze</p>\r\n\r\n<p>ready sampai -10.00 Diameter 14.5 mm</p>\r\n\r\n<p>Masa pakai 6 bulan</p>\r\n\r\n<p>Water 43%</p>\r\n\r\n<p>DEPKES RI AKD 21204810277</p>\r\n\r\n<p>harga sepasang</p>\r\n\r\n<p>free lenscase</p>\r\n\r\n<p>diameter Flat 15mm, real 14.5mm</p>\r\n', 'SOFTLENS IDOL ROZE BY SWEET 15 MM BEST SELLER', 35000, 9, '19ccccf7c3d6d4bc729091ac3d55ef7d.jpg', 10, 'Publish', '2020-05-17 08:49:53', '2020-06-03 15:31:28'),
(35, 8, 8, 'BR033', ' Softlens Ice Series / Softlens Warna Bulanan', 'softlens-ice-series-softlens-warna-bulanan-br033', '<p>Softlens X2/ Exoticon Ice Series bisa pembelian jenis &amp; warna berbeda.<br />\r\nContoh : 1 box Ice silver, 1 box Ice no 8 black, 1 box Ice 1 blue &amp; 1 box Ice no 8 Grey.<br />\r\n<br />\r\nHarap Dijelaskan Secara Detail Untuk Jenis Softlens &amp; Waarna, Khusus ukuran minus harap tanya sebelum melakukan pemesanan ( ukuran -1,00 s/d -6,00 ).<br />\r\n<br />\r\n* Ice no 9<br />\r\nbahan : 58% polyhema, Kadar : 42% water, masa pakai : 6 bulan, diameter : 14.50mm<br />\r\npilihan warna : Chocolate, Grey, Blue, Green ( Plano/ Normal Ready Stok )<br />\r\n<br />\r\n* Ice no 1<br />\r\nDiameter : 14.5mm, Kadar Air : 42%, Masa pakai : 6 bulan<br />\r\nPilihan Warna : Green, Blue,Brown, Grey, Violet &nbsp;( Plano/ Normal Ready Stok )<br />\r\n<br />\r\n* Ice no 8 black<br />\r\nDiameter : 16mm, Kadar air : 42%, Masa pakai : 6 bulan<br />\r\n( Plano/ Normal Ready Stok )<br />\r\n<br />\r\n* Ice no 8<br />\r\nKadar Air : 43%, Diameter : 16,0mm, Masa pakai : 6 bulan<br />\r\nwarna : grey, brown, blue, pink, dan green ( Plano/ Normal Ready Stok )<br />\r\n<br />\r\n* Ice Silver &amp; Gold<br />\r\nDiameter : 14,5 mm, Base Curve : 8.60, Kadar air : 42%, Material : PolyHEMA, Masa pakai : 6 bulan, Technology : Full Cast Mold System</p>\r\n', 'Softlens X2 / Softlens Ice Series / Softlens Warna Bulanan', 80000, 10, '640_640_30cee4fa8ecf4c90a7e673f822a72bfd.jpg', 10, 'Draft', '2020-05-22 06:10:35', '2020-05-22 04:10:35'),
(38, 8, 7, 'BR034', 'Case lucu sekali', 'case-lucu-sekali-br034', '<p>sss</p>\r\n', 'Case lucu', 20000, 10, '6c3f77786a0c2f0a9789fdebcbf4cda2.jpg', 10, 'Draft', '2020-06-02 17:30:02', '2020-06-02 15:30:02'),
(39, 8, 2, 'BR035', 'RYAWT575 frame kacamata 2139 ', 'ryawt575-frame-kacamata-2139-br035', '<p>Paket hemat gratis lensa anti uv -normal -minus dari ukuran -025 sampai -400 -untuk cylinder dari -025 sampai cylinder -100(sertakan axis) -plus dari +100 sampai +200 Keterangan/keunggulan dari frame ini -bahan plastik kokoh dan tidak mudah retas apa lagi patah Size 52 19 147 Kelengkapan -tempat kacamata -cliner pembersih lensa -lap (melindungi lensa anda saat dibersihkan) -real pict dan ready stok</p>\r\n', 'RYAWT575 frame kacamata 2139 ', 213000, 10, 'frame_2189.jpg', 250, 'Publish', '2020-06-03 08:47:26', '2020-06-03 06:47:26'),
(40, 8, 8, 'BR036', 'TEMPAT SOFTLENS KAKAO TALK 2 IN 1', 'tempat-softlens-kakao-talk-2-in-1-br036', '<p>Tersedia banyak karakter</p>\r\n', 'TEMPAT SOFTLENS KAKAO TALK 2 IN 1', 18000, 9, 'tempat_softlens.jpg', 10, 'Publish', '2020-06-05 14:37:04', '2020-06-05 12:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tgl_post` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `nomor_rekening`, `nama_pemilik`, `gambar`, `tgl_post`) VALUES
(2, 'BANK BRI', '6378920736902', 'OH SEHUN', NULL, '2020-06-02 12:51:39'),
(3, 'BANK MANDIRI', '3579026029737', 'RINA NOSE', NULL, '2020-06-02 12:52:57'),
(4, 'BANK BCA', '638920398701', 'AJENG AYU PANGESTI', NULL, '2020-06-02 12:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kd_transaksi` varchar(100) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_pelanggan`, `kd_transaksi`, `id_produk`, `harga`, `jumlah`, `ongkir`, `total_harga`, `tgl_transaksi`, `tgl_update`) VALUES
(15, 0, 1, '03062020S2AURPQL', 34, 35000, 1, 0, 35000, '2020-06-03 00:00:00', '2020-06-03 12:55:56'),
(16, 0, 1, '03062020S2AURPQL', 33, 155000, 1, 0, 155000, '2020-06-03 00:00:00', '2020-06-03 12:55:56'),
(17, 0, 3, '030620207KCVWBST', 29, 249000, 1, 0, 249000, '2020-06-03 00:00:00', '2020-06-03 12:56:28'),
(18, 0, 5, '030620207U2CYZAK', 39, 213000, 1, 0, 213000, '2020-06-03 00:00:00', '2020-06-03 12:58:15'),
(19, 0, 2, '03062020FUK0KY9H', 30, 149000, 1, 0, 149000, '2020-06-03 00:00:00', '2020-06-03 14:33:37'),
(20, 0, 2, '030620206PQIDUON', 34, 35000, 1, 0, 35000, '2020-06-03 00:00:00', '2020-06-03 15:31:28'),
(21, 0, 3, '05062020KH62RUQK', 40, 18000, 1, 0, 18000, '2020-06-05 00:00:00', '2020-06-05 12:39:59');

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `pesanan_produk` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
	UPDATE produk SET stok = stok-NEW.jumlah
    WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `tanggal_update`) VALUES
(2, 'qothrun nada', 'qothrunnada@gmail.com', 'qothrunnada', 'fdc5112afcb2b64f8ea574abc902d8b53752372c', 'Pelapak', '2020-04-17 15:17:31'),
(7, 'Anggi Ayu Widia', 'anggi@gmail.com', 'widiaangginingrum', 'dcee736489f80b622a3df73d5c046d4e568a4d2b', 'Admin', '2020-05-16 14:17:19'),
(8, 'DO Kyungsoo', 'kyungsoo@gmail.com', 'dokyungsoo', '68a14128d3666bd3f510998c096879f24d466c89', 'User', '2020-05-16 14:19:47'),
(9, 'rosarosi', 'rosa@gmail.com', '', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Admin', '2020-06-09 15:14:53'),
(10, 'leejongsuk', 'leejongsuk@gmail.com', 'leejongsuk', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Admin', '2020-06-09 15:19:59'),
(11, 'ajengayupangesti', 'ajeng@gmail.com', 'ajeng', '20a1ac6ec1153f8f44bdf2b26f1e25ee7b0fd4c2', 'Pelapak', '2020-06-09 15:32:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD UNIQUE KEY `kd_transaksi` (`kd_transaksi`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kd_produk` (`kd_produk`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`),
  ADD UNIQUE KEY `nomor_rekening` (`nomor_rekening`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
