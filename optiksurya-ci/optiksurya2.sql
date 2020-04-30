-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 01, 2020 at 03:58 AM
-- Server version: 10.1.44-MariaDB-0+deb9u1
-- PHP Version: 7.0.33-0+deb9u6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `optiksurya2`
--

CREATE SCHEMA IF NOT EXISTS `optiksurya_lama`;

USE `optiksurya_lama`;
-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID_ADMIN` varchar(10) NOT NULL,
  `NAMA_ADMIN` varchar(10) DEFAULT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `NAMA_ADMIN`, `USERNAME`, `PASSWORD`) VALUES
('ad001', 'Fila', 'fila', 'fila123');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `ID_BARANG` varchar(10) NOT NULL,
  `ID_KATEGORI` varchar(10) NOT NULL,
  `NAMA_BARANG` varchar(50) DEFAULT NULL,
  `HARGA_BARANG` int(11) DEFAULT NULL,
  `STOK_BARANG` int(11) DEFAULT NULL,
  `TGL_KADALUARSA` date DEFAULT NULL,
  `GAMBAR_BARANG` varchar(100) DEFAULT NULL,
  `DESKRIPSI_BARANG` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID_BARANG`, `ID_KATEGORI`, `NAMA_BARANG`, `HARGA_BARANG`, `STOK_BARANG`, `TGL_KADALUARSA`, `GAMBAR_BARANG`, `DESKRIPSI_BARANG`) VALUES
('BR002', 'SF001', 'Softlens Korea Sweet', 40000, 44, '0000-00-00', 'softlens.jpg', 'Softlens New Bestseller\r\nKadar air 42 %\r\nUntuk pemakaian selama Â±6 Bulan\r\nDiameter 14.2 mm\r\nukuran :  normal pasti ready , minus silahkan chat tanyakan dulu\r\nAsli Made in Korea \r\nKEMENKES AKL : 21204615973'),
('BR003', 'KCAN001', 'sunglasses anak', 1000000, 25, '0000-00-00', 'kacamata anak (2).jpg', 'kacamata anak lucu'),
('BR004', 'LS001', 'lensa Emerald', 85000, 94, '0000-00-00', 'lensa mika.jpg', 'material lensa dari Mika, lensa lebih enteng dan tidak mudah pecah. keunggulan nya\r\nAnti radiasi.\r\nLensa ini bisa dibuat kombinasi Minus & Silinder / minus / Silinder / Plus \r\nHarga Rp 85.000 untuk ukuran 0 s/d -6 dan CYL 0,25 s/d 2'),
('BR005', 'LS001', 'Lensa Photocromic', 200000, 100, '0000-00-00', 'lensa photocromic.jpg', 'material lensa dari Mika, lensa lebih enteng dan tidak mudah pecah. keunggulan lain nya\r\njika terkena sinar matahari berubah jadi gelap, sudah Anti pantul dan anti radiasi \r\nLensa ini bisa dibuat kombinasi Minus & Silinder / minus / Silinder / Plus '),
('BR006', 'LS001', 'Lensa Blueray', 215000, 100, '0000-00-00', 'lensa blueray.jpg', 'LENSA BLUERAY\r\nmaterial lensa dari Mika, lensa lebih enteng dan tidak mudah pecah. keunggulan nya\r\nAnti randiasi yg tinggi seperti pada video, lensa dilaser radiasi . Lensa ini juga Anti pantul.\r\nLensa ini bisa dibuat kombinasi Minus & Silinder / minus / Silinder / Plus \r\nHarga diatas dalam resep di'),
('BR007', 'KCAN001', 'kacamata anak-anak', 250000, 80, '0000-00-00', 'kacamata anak.jpg', 'kacamata anak dengan bahan plastik kuat'),
('BR008', 'KCWN001', 'Frame Katsuyu', 350000, 40, '0000-00-00', 'frame kacamata wanita merk  elite design.jpg', 'Frame KATSUYU !! Material frame Mika plastik dengan Stainless Nosepad nya. \r\npesan sekarang ! Karna kami tidak mau membuat kalian menunggu KATSUYU Restock. Menunggu itu tidak enakðŸ˜‘ \r\nFrame : KATSUYU\r\nSize : 52-20-138\r\nWarna : Hitam Doff\r\n(Include Hardcase dan Lap Pembersih)\r\nKami juga merima pema'),
('BR009', 'KCLK001', 'Frame Kacamata Shinogi ', 559000, 45, '0000-00-00', 'Frame_Kacamata_Minus_TagHeuer pria.jpg', 'Frame SHINOGI Restock!! Material frame yg lentur dan ringan. \r\npesan sekarang ! Karna kami tidak mau membuat kalian menunggu SHINOGI Restock. Menunggu itu tidak enakðŸ˜‘ \r\nSize : 53-17-138\r\nWarna : Hitam Doff \r\n (Include Hardcase dan Lap Pembersih)\r\nKami juga merima pemasangan lensa (-/+/Silinder & '),
('BR010', 'KCWN001', 'Frame Bailey', 450000, 40, '0000-00-00', 'frame-kacamata-wanita merk zoom.jpg', 'Frame BAILEY\r\nPesan sekarang! Karna kami tidak suka membuat kalian menunggu BAILEY Restock. Menunggu itu tidak enakðŸ˜‘ \r\nSize : 50-16-134\r\nWarna : Hitam\r\n(Include Hardcase dan Lap Pembersih)\r\nKami juga merima pemasangan lensa (-/+/Silinder & anti radiasi)'),
('BR011', 'SF001', 'softlens biru', 50000, 35, '2020-05-30', 'softlens blue.jpg', 'POWER : -0.50 s/d -6.00\r\nWARNA : PHOENIX BLUE MINUS\r\nDIAMETER 14.5\r\nWATER 45%\r\nLIFE SPAN 6BLN\r\nAKL 212 0481 4829 ( IJIN EDAR )'),
('BR012', 'SF001', 'Soflens Phoenix', 60000, 35, '0000-00-00', 'soflens phoenix.jpg', 'DIAMETER 16mm\r\nKADAR AIR 42%\r\nBC 9,0\r\nBISA MINUS S/D -6,00'),
('BR013', 'SF001', 'Softlens Omega Ungu ', 40000, 35, '0000-00-00', 'omega softlens.jpg', 'X2 ice baby nude N8\r\n\r\nWater : 43%\r\nDiameter : 16,0mm\r\nMasa pakai : 6bulanan( tergantung pribadi)\r\nwarna : grey'),
('BR015', 'ACC001', 'Tempat Kacamata Doraemon', 30000, 15, '0000-00-00', 'Tempat-Kacamata-Doraemon-Smile.jpg', 'Kotak kacamata motif Lucu.\r\nukuran : 16.5 * 6 * 3.9 cm.\r\nmaterial : PU\r\n		'),
('BR016', 'ACC001', 'Tempat Kacamata Waterproof', 25000, 12, '0000-00-00', 'tpt kcmt hitam.jpg', 'Tempat Kacamata Waterprof\r\ntidak mudah penyot dan keras \r\nsehingga kacamata tidak akan patah saat tertimpa barang jika didalam hardcase ini. \r\nDimensi : 167 x 77 x 64 mm'),
('BR017', 'ACC001', 'Tempat Soflens Lucu dan Penjepit', 55000, 12, '0000-00-00', 'tempat softlens.jpg', 'Ready banyak motif lucu Gratis Penjepit (Kualitas Bagus) dan Tongkat/ Sendok'),
('BR019', 'KCLK001', 'Frame Kacamata Miko', 200000, 20, '0000-00-00', 'kacamata cartier pria.jpg', 'Frame MIKO Restock!! Material frame yg lentur dan ringan. Size : 53-17-138 Warna : Hitam Doff (Include Hardcase dan Lap Pembersih)Kami juga merima pemasangan lensa (-/+/Silinder & anti radiasi)');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `ID_DETAIL_PEMESANAN` int(11) NOT NULL,
  `ID_BARANG` varchar(10) NOT NULL,
  `ID_PEMESANAN` varchar(10) NOT NULL,
  `JUMLAH_BARANG` int(11) NOT NULL,
  `NAMABARANG` varchar(30) NOT NULL,
  `TOTAL_HARGA` int(11) NOT NULL,
  `HARGABARANG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`ID_DETAIL_PEMESANAN`, `ID_BARANG`, `ID_PEMESANAN`, `JUMLAH_BARANG`, `NAMABARANG`, `TOTAL_HARGA`, `HARGABARANG`) VALUES
(37, 'BR004', 'TR001', 1, 'lensa mika', 80000, 80000),
(38, 'BR004', 'TR002', 1, 'lensa mika', 80000, 80000),
(39, 'BR004', 'TR003', 1, 'lensa mika', 80000, 80000),
(40, 'BR004', 'TR004', 2, 'lensa mika', 160000, 80000),
(43, 'BR003', 'TR005', 1, 'sunglasses anak', 1000000, 1000000),
(46, 'BR007', 'TR006', 1, 'kacamata anak-anak', 250000, 250000),
(47, 'BR007', 'TR007', 1, 'kacamata anak-anak', 250000, 250000),
(48, 'BR004', 'TR008', 2, 'lensa mika', 160000, 80000),
(49, 'BR003', 'TR009', 1, 'sunglasses anak', 1000000, 1000000),
(51, 'BR003', 'TR010', 1, 'sunglasses anak', 1000000, 1000000),
(52, 'BR007', 'TR011', 1, 'kacamata anak-anak', 250000, 250000),
(53, 'BR004', 'TR012', 2, 'lensa mika', 160000, 80000),
(54, 'BR003', 'TR013', 1, 'sunglasses anak', 1000000, 1000000),
(55, 'BR004', 'TR013', 1, 'lensa mika', 80000, 80000),
(56, 'BR004', 'TR014', 2, 'lensa mika', 160000, 80000),
(57, 'BR003', 'TR015', 1, 'sunglasses anak', 1000000, 1000000),
(58, 'BR004', 'TR016', 2, 'lensa mika', 160000, 80000),
(59, 'BR004', 'TR017', 1, 'lensa Emerald', 85000, 85000),
(60, 'BR003', 'TR018', 1, 'sunglasses anak', 1000000, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `ID_KATEGORI` varchar(10) NOT NULL,
  `KATEGORI` varchar(25) DEFAULT NULL,
  `FOTO_KATEGORI` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`ID_KATEGORI`, `KATEGORI`, `FOTO_KATEGORI`) VALUES
('ACC001', 'Accesories', 'tempat.jpg'),
('KCAN001', 'Kacamata anak-anak', 'framea.jpg'),
('KCLK001', 'Kacamata laki-laki', 'framel.jpg'),
('KCWN001', 'Kacamata wanita', 'frame.jpg'),
('LS001', 'Lensa', 'lensa.jpg'),
('SF001', 'Softlens', 'softlens.jpg'),
('SG001', 'Sunglasses', 'sunglasses.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `ID_ONGKIR` varchar(10) NOT NULL,
  `TARIF` int(11) NOT NULL,
  `KOTA` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`ID_ONGKIR`, `TARIF`, `KOTA`) VALUES
('ONG01', 20000, 'SURABAYA'),
('ONG02', 25000, 'MAKASAR'),
('ONG03', 5000, 'JEMBER'),
('ONG04', 6000, 'BONDOWOSO'),
('ONG05', 7000, 'SITUBONDO'),
('ONG06', 6000, 'BANYUWANGI'),
('ONG07', 15000, 'MALANG'),
('ONG08', 14000, 'SIDOARJO'),
('ONG09', 25000, 'JAKARTA PUSAT'),
('ONG10', 20000, 'BANDUNG');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `NIK` varchar(16) NOT NULL,
  `NAMA_PEMBELI` varchar(100) DEFAULT NULL,
  `ALAMAT` varchar(100) DEFAULT NULL,
  `NO_TELEPON` varchar(13) DEFAULT NULL,
  `JENIS_KELAMIN` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`NIK`, `NAMA_PEMBELI`, `ALAMAT`, `NO_TELEPON`, `JENIS_KELAMIN`, `EMAIL`, `PASSWORD`) VALUES
('3511025486835507', 'Tumin', 'Kurah Ancar, Kaliputih, Rambip', '089502462671', 'Laki-Laki', 'tomean988@yahoo.com', 'tomin'),
('351122983338773', 'ajeng ayu pangesti', 'sanggar', '082337399489', 'Perempuan', 'ajengayu28@yahoo.com', 'ajeng'),
('3511909777093', 'aditya', 'bondowoso', '18808038282', 'Laki-Laki', 'aditya@gmail.com', 'adit'),
('351202020214725', 'Suwarti', 'Kaliputih, Rambipuji', '085251155399', 'Perempuan', 'suwarti90@gmail.com', ''),
('351202671299003', 'Jazilatur R', 'Kp. Sagaram /003/002 Blumbang,', '081345190129', 'Perempuan', 'jazillaturramdaniah2', ''),
('351247878988924', 'Ari Fakul Horim', 'Kaliputih, Rambipuji', '081231663490', 'Laki-Laki', 'f_horim30a@gmail.com', ''),
('351269874562150', 'Felaradati', 'Jl. Sentot Prof. SI no. D66XV0', '089601753335', 'Perempuan', 'fela_dati_0@gmail.co', ''),
('35142568975447', 'Saeri', 'Jl. Hayam Wuruk Sumbersari, Je', '085103092250', 'Laki-Laki', 'cakeri00@gmail.com', ''),
('351478965463256', 'Susi', 'Jl. Gajah Mada XN', '085296347976', 'Perempuan', 'sooosey@gmail.com', ''),
('351489898796464', 'Budi', 'Jl. Kartanegara IX No. 228', '082247779978', 'Laki-Laki', 'bUdI9090@gmail.com', ''),
('351698789878746', 'Yoga Saputra', 'Perumahan Mastrip Blok C15', '085258585530', 'Laki-Laki', 'Youga_putra090@yahoo', ''),
('35629977787797', 'elisa qothrun nada', 'wonosari', '08218908882', 'Perempuan', 'elisaqothrunnada88@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `ID_PEMESANAN` varchar(10) NOT NULL,
  `NIK` varchar(16) NOT NULL,
  `ID_ONGKIR` varchar(10) NOT NULL,
  `TGL_PEMESANAN` date DEFAULT NULL,
  `DETAIL_PESANAN` text NOT NULL,
  `ALAMAT_KIRIM` text NOT NULL,
  `KOTA` varchar(100) NOT NULL,
  `TARIF` int(11) NOT NULL,
  `TOTAL_HARGA` int(11) DEFAULT NULL,
  `GAMBAR_BUKTIPEMBAYARAN` varchar(191) DEFAULT NULL,
  `STATUS_PEMBAYARAN` varchar(20) NOT NULL DEFAULT 'Pending',
  `TGL_JATUHTEMPO` date NOT NULL,
  `TGL_TRANSFER` date DEFAULT NULL,
  `RESI_PENGIRIMAN` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`ID_PEMESANAN`, `NIK`, `ID_ONGKIR`, `TGL_PEMESANAN`, `DETAIL_PESANAN`, `ALAMAT_KIRIM`, `KOTA`, `TARIF`, `TOTAL_HARGA`, `GAMBAR_BUKTIPEMBAYARAN`, `STATUS_PEMBAYARAN`, `TGL_JATUHTEMPO`, `TGL_TRANSFER`, `RESI_PENGIRIMAN`) VALUES
('TR001', '35629977787797', 'ONG01', '2019-12-24', '', 'jl. Raya Kupang', 'SURABAYA', 20000, 100000, NULL, 'batal', '2019-12-11', NULL, '456'),
('TR002', '35629977787797', 'ONG01', '2019-12-24', '', 'surabaya, jawa timur', 'SURABAYA', 20000, 100000, NULL, 'batal', '2019-12-12', NULL, ''),
('TR003', '35629977787797', 'ONG01', '2019-12-24', '', 'surabaya, kota satelit', 'SURABAYA', 20000, 100000, NULL, 'batal', '2019-12-12', NULL, ''),
('TR004', '35629977787797', 'ONG01', '2019-12-24', '', 'jl.Darmo', 'SURABAYA', 20000, 180000, NULL, 'batal', '2019-12-12', NULL, ''),
('TR005', '35629977787797', 'ONG01', '2019-12-24', '', 'makasar', 'MAKASAR', 25000, 1020000, NULL, 'batal', '2019-12-12', NULL, ''),
('TR006', '35629977787797', 'ONG01', '2019-12-24', '', 'jl.simo katrungan', 'SURABAYA', 20000, 270000, NULL, 'batal', '2019-12-12', NULL, ''),
('TR007', '35629977787797', 'ONG01', '2019-12-24', '', 'maksaar', 'MAKASAR', 25000, 270000, NULL, 'batal', '2019-12-12', NULL, ''),
('TR008', '35629977787797', 'ONG02', '2019-12-24', '', 'makasar', 'MAKASAR', 25000, 185000, NULL, 'batal', '2019-12-13', NULL, ''),
('TR009', '35629977787797', 'ONG01', '2019-12-26', '', 'pasar turi blok A1', 'SURABAYA', 20000, 1020000, NULL, 'batal', '2019-12-14', NULL, ''),
('TR010', '35629977787797', 'ONG02', '2019-12-26', '', 'makasar', 'MAKASAR', 25000, 1025000, NULL, 'batal', '2019-12-26', NULL, ''),
('TR011', '35629977787797', 'ONG01', '2019-12-26', '', 'pasar etan no 10', 'SURABAYA', 20000, 270000, NULL, 'batal', '2019-12-26', NULL, ''),
('TR012', '35629977787797', 'ONG01', '2019-12-26', '', 'kupang gunung timur, surabaya', 'SURABAYA', 20000, 180000, NULL, 'batal', '2019-12-26', NULL, ''),
('TR013', '35629977787797', 'ONG01', '2019-12-26', '', 'simo gunung', 'SURABAYA', 20000, 1100000, NULL, 'LUNAS', '0000-00-00', NULL, ''),
('TR014', '35629977787797', 'ONG01', '2019-12-26', '', 'simo katrungan', 'SURABAYA', 20000, 180000, NULL, 'LUNAS', '0000-00-00', NULL, ''),
('TR015', '35629977787797', 'ONG01', '2019-12-26', '', 'simo gnunung kramat barat', 'SURABAYA', 20000, 1020000, NULL, 'LUNAS', '0000-00-00', NULL, ''),
('TR016', '35629977787797', 'ONG02', '2019-12-26', '', 'mksr', 'MAKASAR', 25000, 185000, NULL, 'LUNAS', '0000-00-00', NULL, ''),
('TR017', '3511025486835507', 'ONG06', '2019-12-27', 'minus -0,25 dan CYL 0,75', 'sanggar banyuwangi', 'BANYUWANGI', 6000, 91000, NULL, 'LUNAS', '0000-00-00', NULL, ''),
('TR018', '351122983338773', '', '2019-12-28', 'minta lensa antiradiasi', 'banyuwangi', '', 0, 1000000, NULL, 'LUNAS', '0000-00-00', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `ID_PEMESANAN` varchar(10) NOT NULL,
  `NAMA_PENYETOR` varchar(100) NOT NULL,
  `JUMLAH_TRANSFER` int(11) NOT NULL,
  `TGL_TRANSFER` date NOT NULL,
  `STATUS_PEMBAYARAN` varchar(20) NOT NULL,
  `FOTO_BUKTITRANSFER` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`ID_PEMESANAN`, `NAMA_PENYETOR`, `JUMLAH_TRANSFER`, `TGL_TRANSFER`, `STATUS_PEMBAYARAN`, `FOTO_BUKTITRANSFER`) VALUES
('TR001', 'Tomin', 100000, '2019-12-24', '', '20191224093735a1.jpeg'),
('TR002', 'elisa', 100000, '2019-12-24', '', '20191224141437a.jpeg'),
('TR004', 'elisa', 180000, '2019-12-24', '', '20191224142717'),
('TR005', 'elisa', 10200000, '2019-12-24', '', '20191224160614a3.jpeg'),
('TR013', 'elisa', 1100000, '2019-12-27', '', '20191227091510Capture.PNG'),
('TR014', 'lili', 180000, '2019-12-27', '', '20191227091538animasi.jpg'),
('TR015', 'elisa', 1020000, '2019-12-27', '', '20191227091603Calendar-128.png'),
('TR016', 'elisa', 185000, '2019-12-27', '', '20191227091631Capture.PNG'),
('TR017', 'Tomin', 91000, '2019-12-27', '', '20191227103548struk.jpg'),
('TR018', 'ajeng', 100000, '2019-12-28', '', '20191228070952tempatkacamata.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADMIN`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID_BARANG`),
  ADD KEY `ID_KATEGORI` (`ID_KATEGORI`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`ID_DETAIL_PEMESANAN`),
  ADD KEY `ID_BARANG` (`ID_BARANG`),
  ADD KEY `ID_PEMESANAN` (`ID_PEMESANAN`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`ID_KATEGORI`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`ID_ONGKIR`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`NIK`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`ID_PEMESANAN`),
  ADD KEY `FK_MELAKUKAN` (`NIK`),
  ADD KEY `ID_ONGKIR` (`ID_ONGKIR`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`ID_PEMESANAN`) USING BTREE,
  ADD KEY `FK_MEMILIKI2` (`ID_PEMESANAN`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  MODIFY `ID_DETAIL_PEMESANAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `kategori` (`ID_KATEGORI`);

--
-- Constraints for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `detail_pemesanan_ibfk_2` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`),
  ADD CONSTRAINT `detail_pemesanan_ibfk_3` FOREIGN KEY (`ID_PEMESANAN`) REFERENCES `pemesanan` (`ID_PEMESANAN`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `FK_MELAKUKAN` FOREIGN KEY (`NIK`) REFERENCES `pembeli` (`NIK`);

--
-- Constraints for table `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `FK_MEMLIKI2` FOREIGN KEY (`ID_PEMESANAN`) REFERENCES `pemesanan` (`ID_PEMESANAN`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
