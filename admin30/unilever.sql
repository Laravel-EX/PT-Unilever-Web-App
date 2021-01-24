-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 26, 2017 at 03:48 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unilever`
--

-- --------------------------------------------------------

--
-- Table structure for table `consignee`
--

CREATE TABLE `consignee` (
  `id_consig` int(11) NOT NULL,
  `nama` text NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consignee`
--

INSERT INTO `consignee` (`id_consig`, `nama`, `alamat`) VALUES
(1, 'asd', 'asd'),
(2, 'sa', 'a'),
(3, 'Suharjo', 'Medan '),
(4, 'faisal', 'pakam'),
(5, 'abdillah', 'jakarta'),
(6, 'asd', 'asd'),
(7, 'Muhammad Ridho', 'Asahan, Kisaran'),
(8, 'Ridwan', 'Aceh'),
(9, 'Ridwan', 'Aceh');

-- --------------------------------------------------------

--
-- Table structure for table `con_type`
--

CREATE TABLE `con_type` (
  `id_container` int(4) NOT NULL,
  `container` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `con_type`
--

INSERT INTO `con_type` (`id_container`, `container`) VALUES
(1, 'Type1'),
(2, 'CTR 20'),
(3, 'CTR 40'),
(4, 'ISOTANK');

-- --------------------------------------------------------

--
-- Table structure for table `con_vendor`
--

CREATE TABLE `con_vendor` (
  `id_convendor` int(4) NOT NULL,
  `convendor` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `con_vendor`
--

INSERT INTO `con_vendor` (`id_convendor`, `convendor`) VALUES
(1, 'vendor1');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(4) NOT NULL,
  `nama_customer` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`) VALUES
(1, 'customer1'),
(2, 'customer2');

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE `daftar` (
  `id_daftar` int(11) NOT NULL,
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
  `status` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `sample` varchar(12) NOT NULL,
  `sample_tgl` varchar(30) NOT NULL,
  `sample_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`id_daftar`, `po_no`, `id_customer`, `id_product`, `do_no1`, `id_convendor`, `id_container`, `transporter`, `vessel_name`, `vessel_closing`, `party`, `status`, `area`, `sample`, `sample_tgl`, `sample_time`) VALUES
(1, 0, 0, 0, '$do', 0, 0, '$trans', '$visel', '$clos', '$party', '$status', '$area', '$sample', '', '00:00:00'),
(2, 1, 1, 1, '1', 1, 1, 'BI', 'asdas', '2017-07-26', '1', 'DEPART', 'TANKFARM', 'y', '', '00:00:00'),
(3, 2, 2, 1, '2', 1, 2, 'BI', 'sdad', '2017-07-19', '1', 'ARRIVE', 'TANKFARM', 'y', '', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(4) NOT NULL,
  `nama_product` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `nama_product`) VALUES
(1, 'produk1'),
(2, 'produk2');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `id_daftar` int(10) NOT NULL,
  `dn_no` varchar(100) NOT NULL,
  `terima_tgl` varchar(50) NOT NULL,
  `terima_time` time NOT NULL,
  `selesai_tgl` varchar(50) NOT NULL,
  `selesai_time` time NOT NULL,
  `date_in` varchar(50) NOT NULL,
  `time_in` time NOT NULL,
  `con_no` varchar(50) NOT NULL,
  `seal_no` varchar(50) NOT NULL,
  `tare_cont` varchar(50) NOT NULL,
  `date_out` varchar(50) NOT NULL,
  `time_out` time NOT NULL,
  `nett_wight` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_daftar`, `dn_no`, `terima_tgl`, `terima_time`, `selesai_tgl`, `selesai_time`, `date_in`, `time_in`, `con_no`, `seal_no`, `tare_cont`, `date_out`, `time_out`, `nett_wight`) VALUES
(1, 0, '1', '2017-07-26', '00:00:00', '', '00:00:00', '2017-07-26', '11:11:00', '1', '1', '20000', '2017-07-26', '14:22:00', '20000'),
(2, 3, '2', '2017-07-26', '00:00:00', '', '00:00:00', '2017-07-26', '14:22:00', '2', '2', '400000', '2017-07-27', '14:22:00', '20000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(4) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status_user` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `status_user`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'faisal', 'faisal', 'tankfarm'),
(3, 'dinda', 'dinda', 'warehouse'),
(4, 'joko', 'joko', 'quality'),
(5, 'sadmin', 'sadmin', 'sadmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consignee`
--
ALTER TABLE `consignee`
  ADD PRIMARY KEY (`id_consig`);

--
-- Indexes for table `con_type`
--
ALTER TABLE `con_type`
  ADD PRIMARY KEY (`id_container`);

--
-- Indexes for table `con_vendor`
--
ALTER TABLE `con_vendor`
  ADD PRIMARY KEY (`id_convendor`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`id_daftar`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consignee`
--
ALTER TABLE `consignee`
  MODIFY `id_consig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `con_type`
--
ALTER TABLE `con_type`
  MODIFY `id_container` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `con_vendor`
--
ALTER TABLE `con_vendor`
  MODIFY `id_convendor` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `daftar`
--
ALTER TABLE `daftar`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
