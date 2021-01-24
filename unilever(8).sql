-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 21, 2017 at 10:50 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `unilever`
--

-- --------------------------------------------------------

--
-- Table structure for table `batchno`
--

CREATE TABLE IF NOT EXISTS `batchno` (
  `id_batch` int(10) NOT NULL AUTO_INCREMENT,
  `batch1` varchar(100) NOT NULL,
  `batch2` varchar(100) NOT NULL,
  `batch3` varchar(100) NOT NULL,
  `qtt` varchar(100) NOT NULL,
  `netw` varchar(100) NOT NULL,
  `tankno` varchar(100) NOT NULL,
  `id_transaksi` int(10) NOT NULL,
  PRIMARY KEY (`id_batch`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `batchno`
--


-- --------------------------------------------------------

--
-- Table structure for table `consignee`
--

CREATE TABLE IF NOT EXISTS `consignee` (
  `id_consig` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id_consig`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `consignee`
--

INSERT INTO `consignee` (`id_consig`, `nama`, `alamat`) VALUES
(1, '12', '12'),
(2, '12', '12'),
(3, 'Roby', 'Medan'),
(4, 'jj', 'klj');

-- --------------------------------------------------------

--
-- Table structure for table `con_type`
--

CREATE TABLE IF NOT EXISTS `con_type` (
  `id_container` int(4) NOT NULL AUTO_INCREMENT,
  `container` varchar(100) NOT NULL,
  PRIMARY KEY (`id_container`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `con_type`
--

INSERT INTO `con_type` (`id_container`, `container`) VALUES
(1, 'Type2'),
(2, 'CTR 20'),
(3, 'CTR 40'),
(4, 'ISOTANK');

-- --------------------------------------------------------

--
-- Table structure for table `con_vendor`
--

CREATE TABLE IF NOT EXISTS `con_vendor` (
  `id_convendor` int(4) NOT NULL AUTO_INCREMENT,
  `convendor` varchar(100) NOT NULL,
  PRIMARY KEY (`id_convendor`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `con_vendor`
--

INSERT INTO `con_vendor` (`id_convendor`, `convendor`) VALUES
(1, 'vendor2');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id_customer` int(4) NOT NULL AUTO_INCREMENT,
  `nama_customer` varchar(100) NOT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`) VALUES
(1, 'ADANI WILMAR LIMITED1'),
(2, 'AKZO NOBEL SURFACE CHEMISTRY AB'),
(3, 'ALLIANCE INDIA UNIT - III'),
(4, 'AMPLUSCHEM CO LTD'),
(5, 'ANHUI WHYWIN INTERNATIONAL CO LTD'),
(6, 'ANUGERAH MAS JAYA PT'),
(7, 'ASIA PRIMERA KIMIKA INC'),
(8, 'BERG+SCHMIDT ASIA PTE LTD'),
(9, 'BRENNTAG S P A'),
(10, 'BRENNTAG VIETNAM CO LTD'),
(11, 'CHEMINEX PTE LTD'),
(12, 'CHINA JIANGSU INTERNATIONAL ECONOMIC'),
(13, 'CHINA NATIONAL TOWNSHIP ENTERPRISES CORP'),
(14, 'EVYAP SABUN MALAYSIA SDN BHD'),
(15, 'FINE ORGANIC INDUSTRIES PVT LTD'),
(16, 'GIOMA VARO SRL'),
(17, 'GREENWELL OLEOCHEMICALS SDN BHD'),
(18, 'GREIF MALAYSIA SDN BHD'),
(19, 'GUANGZHOU YUHAI IMPORT & EXPORT'),
(20, 'HANGZHOU OLEOCHEMICALS CO LTD'),
(21, 'HINDUSTAN UNILEVER LIMITED (CALCUTA)'),
(22, 'HINDUSTAN UNILEVER LIMITED (CHENNAI)'),
(23, 'HINDUSTAN UNILEVER LIMITED (MUNDRA)'),
(24, 'HINDUSTAN UNILEVER LIMITED (NHAVA SHEVA)'),
(25, 'IKEDA CORPORATION'),
(26, 'INDUSTRIAL QUIMICA LASEM SAU'),
(27, 'INOLEX INC'),
(28, 'IOI OLEO GMBH'),
(29, 'JIANGSU EASTWARD NEW MATERIAL'),
(30, 'JIANGSU HOLLY CORPORATION'),
(31, 'JIANGSU PROVINCIAL FOREIGN'),
(32, 'JIANGSU SANMU GROUP CO LTD'),
(33, 'KAMLA OLEO PVT LTD'),
(34, 'KANEMATSU CHEMICALS CORPORATION'),
(35, 'KAO INDUSTRIAL (THAILAND) CO., LTD.'),
(36, 'LOTUS BEAUTY CARE PRODUCT P. LTD UNIT - II'),
(37, 'MAGNA KRON ASIA PACIFIC PTE LTD'),
(38, 'MARUBENI ASEAN PTE LTD'),
(39, 'MARUZEN CHEMICALS CO LTD'),
(40, 'MILOTT LABORATORIES CO LTD'),
(41, 'MIRALIFE S A'),
(42, 'MITRAPAK ERAMANDIRI PT'),
(43, 'MOSSELMAN SA'),
(44, 'NATURAL OLEOCHEMICALS SDN BHD'),
(45, 'NATURAL SOAP SDN BHD'),
(46, 'NYCO STPC'),
(47, 'OCTO PLUS RESOURCES'),
(48, 'OLEOGEN SRL'),
(49, 'OLEON SDN BHD'),
(50, 'OLIVIA IMPEX PVT LTD'),
(51, 'OSIAN INDIA'),
(52, 'PACIFIC NARIS INTERNATIONAL LTD'),
(53, 'PACIFIC OLEOCHEMICALS SDN BHD'),
(54, 'PALM OLEO SDN BHD'),
(55, 'PALMS RESOURCES PTE LTD'),
(56, 'PAN OLEO ENTERPRISE PVT LTD'),
(57, 'PETER CREMER (S) GMBH'),
(58, 'RECKITT BENCKISER (INDIA) PVT LTD'),
(59, 'RECKITT BENCKISER INDONESIA PT'),
(60, 'SABO SPA'),
(61, 'SARANA AGRO NUSANTARA PT'),
(62, 'SINOCHEM PLASTICS CO LTD'),
(63, 'SOGIS INDUSTRIA CHIMICA SPA'),
(64, 'STEARINERIE DUBOIS'),
(65, 'STEPAN COMPANY MAYWOOD'),
(66, 'STERNCHEMIE GMBH CO KG'),
(67, 'TROPICAL ACHIEVEMENT SDN BHD'),
(68, 'UNILEVER BANGLADESH LTD'),
(69, 'UNILEVER INDONESIA TBK (CIKARANG)'),
(70, 'UNILEVER INDONESIA TBK (RUNGKUT)'),
(71, 'UNILEVER IRAN (PJSC)'),
(72, 'UNILEVER ITALIA MANUFACTURING SRL'),
(73, 'UNILEVER LIPTON CEYLON LIMITED'),
(74, 'UNILEVER NEPAL LIMITED'),
(75, 'UNILEVER OLEOCHEMICAL INDONESIA'),
(76, 'UNILEVER PAKISTAN LIMITED'),
(77, 'UNILEVER PHILIPPINES, INC.'),
(78, 'UNILEVER PHILIPPINES.INC.'),
(79, 'UNILEVER SANAYI VE TICARET TURK AS'),
(80, 'UNILEVER SRI LANKA LIMITED'),
(81, 'UNILEVER THAI HOLDINGS LIMITED'),
(82, 'UNILEVER VIETNAM INTERNATIONAL COMP'),
(83, 'VVF INDIA LIMITED'),
(84, 'XIAMEN FANGSHENGHUA IMPORT AND EXPORT TRADE CO LTD'),
(85, 'XINJIANG WANDA CO LTD'),
(86, 'YODEVA PLASTICS PVT LTD');

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE IF NOT EXISTS `daftar` (
  `id_daftar` int(11) NOT NULL AUTO_INCREMENT,
  `po_no` int(6) NOT NULL,
  `id_customer` int(4) NOT NULL,
  `id_product` int(4) NOT NULL,
  `do_no1` varchar(30) NOT NULL,
  `id_convendor` int(4) NOT NULL,
  `id_container` int(4) NOT NULL,
  `transporter` varchar(50) NOT NULL,
  `vessel_name` varchar(100) NOT NULL,
  `vessel_closing` varchar(30) NOT NULL,
  `party` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `id_user` int(10) NOT NULL,
  PRIMARY KEY (`id_daftar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`id_daftar`, `po_no`, `id_customer`, `id_product`, `do_no1`, `id_convendor`, `id_container`, `transporter`, `vessel_name`, `vessel_closing`, `party`, `area`, `id_user`) VALUES
(1, 0, 0, 0, '$do', 0, 0, '$trans', '$visel', '$clos', '$party', '$area', 0),
(2, 1, 1, 1, '1', 1, 1, 'BI', 'asdas', '2017-07-26', '1', 'TANKFARM', 0),
(3, 2, 2, 1, '2', 1, 2, 'BI', 'sdad', '2017-07-19', '1', 'TANKFARM', 0),
(4, 3245, 2, 3, '34567', 1, 3, 'LSJ', 'erwerw', '2017-07-31', '2', 'WAREHOUSE', 0),
(5, 234234, 2, 3, '324324', 1, 2, 'JSK', 'aadafasd', '2017-07-31', '2', 'WAREHOUSE', 0),
(6, 34, 1, 1, '12098', 1, 3, 'FEM', 'asdfg', '2017-08-15', '1', 'WAREHOUSE', 0),
(7, 434443, 3, 4, '', 1, 0, '', '', '', '1', 'WAREHOUSE', 0),
(8, 67567, 16, 4, '5675', 1, 0, '', '', '', '1', 'WAREHOUSE', 0),
(9, 5345, 19, 35, '54645', 1, 3, 'FEM', 'EWWE', '2017-08-01', '1', 'WAREHOUSE', 0),
(10, 34234, 1, 4, '324234', 1, 1, 'FEM', 'ew', '', '1', 'WAREHOUSE', 0),
(11, 89789, 4, 4, '789789', 1, 2, 'LSJ', 'tyutu', '', '1', '', 0),
(12, 546546, 1, 4, '456546', 1, 4, 'JSK', 'rett', 'ret', '1', '', 0),
(13, 111, 3, 5, '1234324', 1, 1, 'LSJ', 'ere', '', '2', '', 0),
(14, 345345, 2, 4, '4353', 1, 4, '', 'ffrf', '', '2', '', 0),
(15, 435435, 3, 5, '435435', 1, 3, 'LSJ', '', '', '2', '', 0),
(16, 4354354, 19, 3, '43r43r4', 1, 4, 'FEM', '43r4', '', '2', '', 0),
(17, 367777, 2, 5, '6666', 1, 3, 'FEM', '66666', '', '2', '', 0),
(18, 75855, 8, 5, '214123432', 1, 2, 'FEM', 'werwr', 'werwer', '2', 'WAREHOUSE', 1),
(19, 23423, 12, 3, '32423', 1, 4, 'FEM', 'sdwdwed1', 'ewdewd1', '2', 'TANKFARM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `historydata`
--

CREATE TABLE IF NOT EXISTS `historydata` (
  `id_history` int(10) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_history`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `historydata`
--

INSERT INTO `historydata` (`id_history`, `id_transaksi`, `keterangan`) VALUES
(1, 24, 'quality approve oleh joko'),
(2, 24, 'quality rejected oleh joko'),
(3, 25, 'quality rejected oleh joko');

-- --------------------------------------------------------

--
-- Table structure for table `laporan3`
--

CREATE TABLE IF NOT EXISTS `laporan3` (
  `id_lap3` int(4) NOT NULL AUTO_INCREMENT,
  `id_daftar` int(4) NOT NULL,
  `notify` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `netwg` varchar(50) NOT NULL,
  `gross` varchar(50) NOT NULL,
  `marks` varchar(50) NOT NULL,
  `freight` varchar(50) NOT NULL,
  PRIMARY KEY (`id_lap3`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `laporan3`
--

INSERT INTO `laporan3` (`id_lap3`, `id_daftar`, `notify`, `destination`, `netwg`, `gross`, `marks`, `freight`) VALUES
(3, 3, 'kjhjk', 'hjkh', 'jkh', 'kjh', 'jkhjk', 'hjk'),
(4, 5, 'ABCD', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `laporan5`
--

CREATE TABLE IF NOT EXISTS `laporan5` (
  `id_lap5` int(6) NOT NULL AUTO_INCREMENT,
  `id_daftar` int(4) NOT NULL,
  `page` varchar(50) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `shiper` varchar(50) NOT NULL,
  `carier` varchar(50) NOT NULL,
  `relay1` varchar(50) NOT NULL,
  `voyage1` varchar(50) NOT NULL,
  `relay2` varchar(50) NOT NULL,
  `voyage2` varchar(50) NOT NULL,
  `liquid` varchar(50) NOT NULL,
  `imo` varchar(50) NOT NULL,
  `sub` varchar(50) NOT NULL,
  `un` varchar(50) NOT NULL,
  `pg` varchar(50) NOT NULL,
  `fp` varchar(50) NOT NULL,
  `mpy` varchar(50) NOT NULL,
  `netwt` varchar(50) NOT NULL,
  `handling` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  PRIMARY KEY (`id_lap5`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `laporan5`
--

INSERT INTO `laporan5` (`id_lap5`, `id_daftar`, `page`, `nomor`, `shiper`, `carier`, `relay1`, `voyage1`, `relay2`, `voyage2`, `liquid`, `imo`, `sub`, `un`, `pg`, `fp`, `mpy`, `netwt`, `handling`, `state`) VALUES
(1, 0, '$page', '', '$shiper', '$carier', '$relay1', '$voyage1', '$relay2', '$voyage2', '$liquid', '$imo', '$sub', '$un', '$pg', '1', '$mpy', '$netwt', '$info', '$state'),
(2, 3, 'klj', '', 'klj', 'lkjlk', 'jlk', 'j', 'kljl', 'kjlk', 'jkl', 'j', 'kj', 'klj', 'lkj', 'lkj', 'klj', 'lkj', 'lkj', 'klj');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id_product` int(4) NOT NULL AUTO_INCREMENT,
  `nama_product` varchar(100) NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `nama_product`) VALUES
(1, 'BLEND FATTY ACID 1218 DRUM1'),
(2, 'BLEND FATTY ACID 1218 FLEXYBAG'),
(3, 'BLEND FATTY ACID 1218 ISOTANK'),
(4, 'BLEND FATTY ACID 1218 IV 34 FLEXYBAG'),
(5, 'BLEND FATTY ACID 1218 IV 41 FLEXYBAG'),
(6, 'BLEND FATTY ACID 1218 ALPHA ISOTANK '),
(7, 'BLEND FATTY ACID 1618 FLEXYBAG'),
(8, 'BLEND FATTY ACID 1618 ISOTANK'),
(9, 'BLEND FATTY ACID 1618 QUAT DRUM'),
(10, 'BOTTOM DISTILLATE HARD FA 200 L DRUM'),
(11, 'BOTTOM DISTILLATE HARD FA IBC'),
(12, 'BOTTOM DISTILLATE HARD FA ISOTANK'),
(13, 'BOTTOM DISTILLATE HARD FA FLEXYBAG'),
(14, 'BOTTOM DISTILLATE SOFT FA 200 L DRUM'),
(15, 'BOTTOM DISTILLATE SOFT FA FLEXYBAG'),
(16, 'BOTTOM DISTILLATE SOFT FA ISOTANK'),
(17, 'CAPROIC/CAPRYLIC ACID 200 L DRUM'),
(18, 'CAPROIC/CAPRYLIC ACID IBC'),
(19, 'CAPROIC/CAPRYLIC ACID ISOTANK'),
(20, 'CAPRIC ACID 200 L DRUM'),
(21, 'CAPRIC ACID IBC'),
(22, 'CAPRIC ACID ISOTANK'),
(23, 'CAPRYLIC ACID 200 L DRUM'),
(24, 'CAPRYLIC ACID 200 L STEEL DRUM'),
(25, 'CAPRYLIC ACID ISOTANK'),
(26, 'CAPRYLIC/CAPRIC ACID HS DRUM'),
(27, 'CAPRYLIC/CAPRIC ACID HS ISOTANK'),
(28, 'CAPRYLIC/CAPRIC ACID HS MB ISOTANK'),
(29, 'CAPRYLIC/CAPRIC ACID MB ISOTANK'),
(30, 'CHIPS OF SODIUM ISETHIONATE'),
(31, 'DOVE CNFA FLEXYBAG'),
(32, 'DOVE CNFA ISOTANK'),
(33, 'GLYCERIN PHARMA GRADE 1000 L IBC'),
(34, 'GLYCERIN PHARMA GRADE 200 L DRUM'),
(35, 'GLYCERIN PHARMA GRADE 200 L STEEL DRUM'),
(36, 'GLYCERIN PHARMA GRADE FLEXYBAG'),
(37, 'GLYCERIN PHARMA GRADE ISOTANK'),
(38, 'LAURIC ACID 25 KG BAG'),
(39, 'LAURIC ACID 25 KG BAG MB'),
(40, 'LAURIC ACID 25 KG BAG PLAIN'),
(41, 'LAURIC ACID FLEXYBAG'),
(42, 'LAURIC ACID ISOTANK'),
(43, 'LAURIC MYRISTIC ACID FLEXYBAG'),
(44, 'LAURIC MYRISTIC ACID ISOTANK'),
(45, 'LIGHT END FLEXYBAG'),
(46, 'MYRISTIC ACID 25 KG BAG'),
(47, 'MYRISTIC ACID 25 KG BAG MB'),
(48, 'MYRISTIC ACID 25 KG BAG PLAIN'),
(49, 'MYRISTIC ACID ISOTANK'),
(50, 'SKN DOVE NOODLE GEAR BASE'),
(51, 'SOAP NOODLE 80/20 25 KG BAG'),
(52, 'SOAP NOODLE 80/20 25 KG BAG MB'),
(53, 'SOAP NOODLE 80/20 1000 KG '),
(54, 'SOAP NOODLE 80/20 1000 KG MB'),
(55, 'SOAP NOODLE 80/20 FUSSION MB'),
(56, 'SOAP NOODLE 85/15 25 KG BAG'),
(57, 'SOAP NOODLE 85/15 25 KG BAG MB'),
(58, 'SOAP NOODLE 85/15 1000 KG '),
(59, 'SOAP NOODLE 85/15 1000 KG MB'),
(60, 'SOAP NOODLE SWING'),
(61, 'UNIOLEO GLYCERIN 99'),
(62, 'UNIOLEO GLYCERIN 99 200 L STEEL DRUM'),
(63, 'UNIOLEO GLYCERIN 99 200 L DRUM'),
(64, 'VEGETABLE SOAP BASE 80/20 25 KG BAG '),
(65, 'VEGETABLE SOAP BASE 80/20 25 KG BAG MB'),
(66, 'VEGETABLE SOAP BASE 80/20 1000 KG'),
(67, 'VEGETABLE SOAP BASE 80/20 1000 KG MB');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(10) NOT NULL AUTO_INCREMENT,
  `id_daftar` int(10) NOT NULL,
  `dn_no` varchar(100) NOT NULL,
  `terima_tgl` date NOT NULL,
  `terima_time` time NOT NULL,
  `selesai_tgl` date NOT NULL,
  `selesai_time` time NOT NULL,
  `date_in` date NOT NULL,
  `time_in` time NOT NULL,
  `con_no` varchar(50) NOT NULL,
  `seal_no` varchar(50) NOT NULL,
  `tare_cont` varchar(50) NOT NULL,
  `date_out` varchar(50) NOT NULL,
  `time_out` time NOT NULL,
  `nett_wight` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `sample_tgl` date NOT NULL,
  `sample_time` time NOT NULL,
  `sample` varchar(10) NOT NULL,
  `status` varchar(100) NOT NULL,
  `userinput` varchar(100) NOT NULL,
  `userquality` varchar(100) NOT NULL,
  `st` varchar(100) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_daftar`, `dn_no`, `terima_tgl`, `terima_time`, `selesai_tgl`, `selesai_time`, `date_in`, `time_in`, `con_no`, `seal_no`, `tare_cont`, `date_out`, `time_out`, `nett_wight`, `gambar`, `sample_tgl`, `sample_time`, `sample`, `status`, `userinput`, `userquality`, `st`) VALUES
(1, 0, '1', '2017-07-26', '00:00:00', '0000-00-00', '00:00:00', '2017-07-26', '11:11:00', '1', '1', '20000', '2017-07-26', '14:22:00', '20000', '', '0000-00-00', '00:00:00', '', '', '', '', ''),
(2, 3, '2', '2017-07-26', '00:00:00', '0000-00-00', '00:00:00', '2017-07-26', '14:22:00', '2', '2', '400000', '2017-07-27', '14:22:00', '20000', '', '2017-08-01', '10:32:01', '', '', '', '', ''),
(3, 5, '4543543', '2017-07-31', '09:43:23', '2017-07-31', '09:43:51', '2017-07-31', '11:03:00', '657657', '675', '10000', '', '00:00:00', '10000', 'kwitansi_unilever.jpg', '0000-00-00', '00:00:00', '', '', '', '', ''),
(4, 5, '3654345', '2017-08-01', '07:29:31', '0000-00-00', '00:00:00', '2017-07-28', '10:34:00', '123123', '235234', '10000', '', '00:00:00', '1000', '19964687_1481513118579508_519749594_n.png', '0000-00-00', '00:00:00', '', '', '', '', ''),
(5, 6, '09876', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '', '', '', '', '00:00:00', '', 'aa.jpg', '0000-00-00', '00:00:00', '', '', '', '', ''),
(6, 7, '4334', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '', '', '', '', '00:00:00', '', '', '0000-00-00', '00:00:00', '', '', '', '', ''),
(7, 8, '657567', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '', '', '', '', '00:00:00', '', '', '0000-00-00', '00:00:00', '', '', '', '', ''),
(8, 9, '4546546', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '', '', '', '', '00:00:00', '', '', '0000-00-00', '00:00:00', '', '', '', '', ''),
(9, 10, '32545', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '13123', '123123', '1221', '', '00:00:00', '1111', '', '0000-00-00', '00:00:00', '', '', '', '', ''),
(10, 11, '356345', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '3635', '56546', '5555', '', '00:00:00', '5555', '', '0000-00-00', '00:00:00', '', '', '', '', ''),
(11, 12, '5465', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '2017-08-29', '00:00:00', '5465', '54654', '5465', '', '00:00:00', '22222', '', '0000-00-00', '00:00:00', '', '', '', '', ''),
(12, 13, '324324', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '2017-08-29', '00:00:00', '1111', '11111', '1111111', '', '00:00:00', '111', '', '0000-00-00', '00:00:00', '', '', '', '', ''),
(13, 13, '222222', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '2017-08-29', '00:00:00', '22222222', '2222', '2222', '', '00:00:00', '222222', '', '0000-00-00', '00:00:00', '', '', '', '', ''),
(14, 14, '444444', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '2017-08-29', '00:00:00', '4444', '444', '44444', '', '00:00:00', '4444444', '', '0000-00-00', '00:00:00', '', '', '', '', ''),
(15, 14, '4444', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '2017-08-29', '00:00:00', '44444', '4444', '4444', '', '00:00:00', '444444', '', '0000-00-00', '00:00:00', '', '', '', '', ''),
(16, 15, '5555', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '2017-08-29', '00:00:00', '555', '5555', '', '', '00:00:00', '', '', '0000-00-00', '00:00:00', '', '', '', '', ''),
(17, 15, '333335', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '2017-08-29', '00:00:00', '335353', '353535', '', '', '00:00:00', '', '', '0000-00-00', '00:00:00', '', '', '', '', ''),
(18, 16, '43r34r43r', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '2017-08-29', '00:00:00', '43r34r', '', '43r43r', '', '00:00:00', '43r43r43r', '', '0000-00-00', '00:00:00', '', '', '', '', ''),
(19, 16, '43r4r34r34', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '2017-08-29', '00:00:00', 'r34r43r3', '4r3r34r43', '', '', '00:00:00', '', '', '0000-00-00', '00:00:00', '', '', '', '', ''),
(20, 17, '56456', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '2017-08-29', '11:22:08', '546456', '6545645', '6456', '', '00:00:00', '4565465466', '', '0000-00-00', '00:00:00', '', '', '', '', ''),
(21, 17, '546546456546456', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '2017-08-29', '11:22:08', '44565464', '646546', '', '', '00:00:00', '4645546456', '', '0000-00-00', '00:00:00', '', '', '', '', ''),
(22, 18, '132324', '2017-11-14', '09:57:27', '2017-11-14', '09:57:28', '0000-00-00', '00:00:00', '324234', '43534', '23442', '2017-11-14', '00:00:00', '121412', '', '0000-00-00', '00:00:00', '', 'DEPART', 'dinda', '', ''),
(23, 18, '234234', '2017-11-17', '15:37:18', '2017-11-17', '15:37:34', '0000-00-00', '00:00:00', '234234', '23423', '234234', '', '00:00:00', '23423', '', '0000-00-00', '00:00:00', 'DEPART', 'y', 'dinda', '', ''),
(24, 19, '234234', '2017-09-12', '12:06:53', '2017-11-17', '14:56:16', '2017-09-12', '11:55:19', '23423', '324234', '234234', '2017-11-14', '08:49:07', '324234234', 'asdas.jpg', '2017-11-21', '09:48:26', 'y', 'DEPART', 'faisal', 'joko', 'rejected'),
(25, 19, '234324234', '2017-11-17', '15:17:11', '2017-11-17', '15:17:16', '2017-10-03', '10:57:37', '234324', '3243244', '2342', '0000-00-00', '00:00:00', '3242343', '', '2017-11-21', '09:43:39', '', 'ARRIVE', 'faisal', 'joko', 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status_user` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `status_user`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'faisal', 'faisal', 'tankfarm'),
(3, 'dinda', 'dinda', 'warehouse'),
(4, 'joko', 'joko', 'quality'),
(5, 'sadmin', 'sadmin', 'sadmin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
