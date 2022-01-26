-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2022 at 04:51 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `didol`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(250) NOT NULL,
  `id_user` bigint(250) NOT NULL,
  `id_product` bigint(250) NOT NULL,
  `quantity` int(4) NOT NULL,
  `subtotal` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_product`, `quantity`, `subtotal`) VALUES
(2, 6, 31, 2, 1900000),
(3, 6, 6, 1, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `cookie_storage`
--

CREATE TABLE `cookie_storage` (
  `user_id` varchar(256) NOT NULL,
  `user_id_enc` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `current`
--

CREATE TABLE `current` (
  `id` bigint(250) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(256) NOT NULL,
  `date_created` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(250) NOT NULL,
  `category` varchar(32) NOT NULL,
  `product_name` varchar(32) NOT NULL,
  `price` int(32) NOT NULL,
  `description` longtext NOT NULL,
  `sold` int(64) NOT NULL,
  `product_photo` varchar(256) NOT NULL,
  `stock` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category`, `product_name`, `price`, `description`, `sold`, `product_photo`, `stock`) VALUES
(1, 'cermin', 'cermin one', 2000000, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 3, 'cermin/cermin-D0001.jpg', 123),
(2, 'cermin', 'cermin two', 1000000, 'hello world', 4, 'cermin/cermin-D0002.jpg', 142),
(3, 'cermin', 'cermin three', 1000000, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 45, 'cermin/cermin-D0003.jpg', 32),
(4, 'cermin', 'cermin four', 1000000, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 24, 'cermin/cermin-D0004.jpg', 54),
(5, 'cermin', 'cermin five', 2300000, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 76, 'cermin/cermin-D0005.jpg', 35),
(6, 'kasur', 'kasur one', 1000000, 'hello world', 42, 'kasur/kasur-D0001.jpg', 44),
(7, 'kasur', 'kasur two', 1200000, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 56, 'kasur/kasur-D0002.jpg', 120),
(8, 'kasur', 'kasur three', 1500000, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 62, 'kasur/kasur-D0003.jpg', 27),
(9, 'kasur', 'kasur four', 1000000, 'hello world', 79, 'kasur/kasur-D0004.jpg', 67),
(10, 'kasur', 'kasur five', 1550000, 'hello world', 13, 'kasur/kasur-D0005.jpg', 321),
(11, 'kasur', 'kasur six', 1850000, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 22, 'kasur/kasur-D0006.jpg', 61),
(12, 'kursi', 'kursi one', 1350000, 'hello world', 30, 'kursi/kursi-D0001.jpg', 112),
(13, 'kursi', 'kursi two', 1000000, 'hello world', 221, 'kursi/kursi-D0002.jpg', 7),
(14, 'kursi', 'kursi three', 1000000, 'hello world', 124, 'kursi/kursi-D0003.jpg', 90),
(15, 'kursi', 'kursi four', 1000000, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 61, 'kursi/kursi-D0004.jpg', 14),
(16, 'kursi', 'kursi five', 1000000, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 72, 'kursi/kursi-D0005.jpg', 98),
(17, 'kursi', 'kursi six', 1000000, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 312, 'kursi/kursi-D0006.jpg', 47),
(18, 'lampu', 'lampu one', 1000000, 'hello world', 24, 'lampu/lampu-D0001.jpg', 57),
(19, 'lampu', 'lampu two', 1000000, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 34, 'lampu/lampu-D0002.jpg', 64),
(20, 'lampu', 'lampu three', 1000000, 'hello world', 76, 'lampu/lampu-D0003.jpg', 43),
(21, 'lampu', 'lampu four', 1900000, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 76, 'lampu/lampu-D0004.jpg', 84),
(22, 'lampu', 'lampu five', 1000000, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 32, 'lampu/lampu-D0005.jpg', 87),
(23, 'lampu', 'lampu six', 1000000, 'hello world', 40, 'lampu/lampu-D0006.jpg', 83),
(24, 'lemari', 'lemari one', 1350000, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 64, 'lemari/lemari-D0001.jpg', 98),
(25, 'lemari', 'lemari two', 1000000, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 54, 'lemari/lemari-D0002.jpg', 97),
(26, 'lemari', 'lemari three', 1000000, 'hello world', 63, 'lemari/lemari-D0003.jpg', 93),
(27, 'lemari', 'lemari four', 1000000, 'hello world', 21, 'lemari/lemari-D0004.jpg', 17),
(28, 'meja', 'meja one', 1000000, 'hello world', 52, 'meja/meja-D0001.jpg', 45),
(29, 'meja', 'meja two', 1000000, 'hello world', 52, 'meja/meja-D0002.jpg', 86),
(30, 'meja', 'meja three', 1000000, 'hello world', 61, 'meja/meja-D0003.jpg', 45),
(31, 'meja', 'meja four', 950000, 'hello world', 86, 'meja/meja-D0004.jpg', 13),
(32, 'meja', 'meja five', 900000, 'hello world', 63, 'meja/meja-D0005.jpg', 14),
(33, 'sofa', 'sofa one', 1000000, 'hello world', 13, 'sofa/sofa-D0001.jpg', 76),
(34, 'sofa', 'sofa two', 1000000, 'hello world', 34, 'sofa/sofa-D0002.jpg', 65),
(35, 'sofa', 'sofa three', 1500000, 'hello world', 33, 'sofa/sofa-D0003.jpg', 123),
(36, 'sofa', 'sofa four', 1000000, 'hello world', 65, 'sofa/sofa-D0004.jpg', 32),
(37, 'sofa', 'sofa five', 1000000, 'hello world', 65, 'sofa/sofa-D0005.jpg', 68),
(38, 'tanaman hias', 'echeveria', 500000, 'hello world', 32, 'tanaman/echeveria-D0001.jpg', 45),
(39, 'tanaman hias', 'aglaonema', 250000, 'hello world', 45, 'tanaman/aglaonema-D0001.jpg', 63),
(40, 'tanaman hias', 'dracaena fragrans', 800000, 'hello world', 24, 'tanaman/dracaenaFragrans-D0001.jpg', 54),
(41, 'tanaman hias', 'ficus elastica', 230000, 'hello world', 245, 'tanaman/ficusElastica-D0001.jpg', 165),
(42, 'tanaman hias', 'spathiphyllum', 455000, 'hello world', 213, 'tanaman/spathiphyllum-D0001.jpg', 91);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` bigint(128) NOT NULL,
  `category_name` varchar(32) NOT NULL,
  `photo` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `category_name`, `photo`) VALUES
(1, 'meja', 'meja.png'),
(2, 'sofa', 'sofa.png'),
(3, 'kasur', 'kasur.png'),
(4, 'kursi', 'kursi.png'),
(5, 'tanaman hias', 'tanaman.png'),
(6, 'lampu', 'lampu.png'),
(7, 'lemari', 'lemari.png'),
(8, 'cermin', 'cermin.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `backup_email` varchar(128) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `photo` varchar(256) NOT NULL,
  `date_created` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `prov` varchar(32) NOT NULL,
  `kota` varchar(32) NOT NULL,
  `kec` varchar(32) NOT NULL,
  `desa` varchar(32) NOT NULL,
  `alamat_detail` varchar(256) NOT NULL,
  `kode_pos` varchar(16) NOT NULL,
  `no_telp` varchar(32) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `backup_email`, `pass`, `photo`, `date_created`, `nama`, `prov`, `kota`, `kec`, `desa`, `alamat_detail`, `kode_pos`, `no_telp`, `active`) VALUES
(6, 'agungx', 'suryaagung118@gmail.com', '', '$2y$10$eFotJhbHU1S81.Lk8wle1u2wSNaWoLgnUS7Um78LSfKBgZ9Reo3yG', 'default.png', 1641826997, 'surya agung', 'Jawa barat', 'Bogor', '', '', '', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cookie_storage`
--
ALTER TABLE `cookie_storage`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `current`
--
ALTER TABLE `current`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `current`
--
ALTER TABLE `current`
  MODIFY `id` bigint(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` bigint(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
