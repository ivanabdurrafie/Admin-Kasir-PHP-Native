-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2019 at 07:29 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idBarang` int(11) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Stok` int(11) NOT NULL,
  `Harga` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idBarang`, `Nama`, `Stok`, `Harga`, `gambar`) VALUES
(1, 'sabun', 100, 300, 'sabun.jpg'),
(2, 'shampoo', 9, 500, 'sampo.png'),
(3, 'gula', 0, 10000, 'gula.jpg'),
(15, 'Indomie', 10, 2500, 'FAVPNG_indomie-instant-noodle-chicken-mie-goreng_nHjfupMN.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `idcart` int(11) NOT NULL,
  `idBarang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `idOrderDetail` int(11) NOT NULL,
  `idOrder` int(11) NOT NULL,
  `idBarang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`idOrderDetail`, `idOrder`, `idBarang`, `qty`, `subtotal`) VALUES
(27967, 22, 2, 1, 500),
(27968, 22, 1, 2, 600),
(27969, 23, 3, 5, 50000),
(27970, 23, 1, 1, 300),
(27971, 24, 2, 5, 2500),
(27972, 24, 1, 3, 900),
(27973, 25, 15, 5, 12500),
(27974, 25, 1, 1, 300);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `idorder` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `username` varchar(12) NOT NULL,
  `grandtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`idorder`, `tanggal`, `username`, `grandtotal`) VALUES
(22, '2019-12-10', 'admin', 1100),
(23, '2019-12-10', 'admin', 50300),
(24, '2019-12-11', 'admin', 3400),
(25, '2019-12-11', 'admin', 12800);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` varchar(12) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Alamat` text NOT NULL,
  `JenisKelamin` enum('Laki - Laki','Perempuan','','') NOT NULL,
  `Level` enum('Admin','Kasir','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Email`, `Password`, `Nama`, `Alamat`, `JenisKelamin`, `Level`) VALUES
('admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'malang', 'Laki - Laki', 'Admin'),
('kasir', 'kasir@kasir.com', 'c7911af3adbd12a035b289556d96470a', 'kasir', 'malang', 'Laki - Laki', 'Kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idBarang`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idcart`),
  ADD KEY `idBarang` (`idBarang`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`idOrderDetail`),
  ADD KEY `idBarang` (`idBarang`),
  ADD KEY `idOrder` (`idOrder`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idorder`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `idBarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `idcart` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `idOrderDetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27975;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `idorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`idBarang`) REFERENCES `barang` (`idBarang`);

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`idBarang`) REFERENCES `barang` (`idBarang`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`idOrder`) REFERENCES `orders` (`idorder`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
