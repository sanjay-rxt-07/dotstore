-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 29, 2024 at 11:40 AM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21266917_e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `aditya17`
--

CREATE TABLE `aditya17` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `decri` text DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `img_name` varchar(255) DEFAULT NULL,
  `img_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `Number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Name`, `Mail`, `Number`, `password`) VALUES
(1, 'Sanjay', 'sanjay@gmail.com', '9971931336', 'sanjaycap12345');

-- --------------------------------------------------------

--
-- Table structure for table `ajay4`
--

CREATE TABLE `ajay4` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `decri` text DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `img_name` varchar(255) DEFAULT NULL,
  `img_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ajay4`
--

INSERT INTO `ajay4` (`id`, `title`, `decri`, `amount`, `img_name`, `img_type`) VALUES
(8, 'R-fera glasses', 'black old and bold flor mens', '449.00 Rs.', 'pexels-r-fera-432059.jpg', 'image/jpeg'),
(12, 'Bag', 'hand bag', 'Rs.399.00', 'pexels-godisable-jacob-932401.jpg', 'image/jpeg'),
(15, 'T-Shirt', 'white t-shirt for mens with style', 'Rs.299.00', 'pexels-spencer-selover-428340.jpg', 'image/jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Name` varchar(255) NOT NULL,
  `e_mail` varchar(255) NOT NULL,
  `Rating` varchar(255) NOT NULL,
  `description` varchar(2559) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Name`, `e_mail`, `Rating`, `description`) VALUES
('sanjay', 'sanjay@gmail.com', '4', 'this is for you'),
('vijay', 'kv8010@gmail.com', '5', 'this is a feedback from kv8010@gmail.com and my name is vijay kumar. this is a very good exeperience gfor me. this is a very good website every visited by me. thanks '),
('sunny', 'sunny@gmail.com', '2', 'hey'),
('ajay', 'ajay@gmail.com', '5', 'this is a very good website.'),
('bhoomi', 'bhoomi@gmail.com', '5', 'no comments'),
('om', 'mo@gmail.com', '5', 'non'),
('uer', 'user@gmail.com', '5', 'no'),
('sanjay', 'sdk@gmail.com', '5', 'hey hey');

-- --------------------------------------------------------

--
-- Table structure for table `Sam31`
--

CREATE TABLE `Sam31` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `decri` text DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `img_name` varchar(255) DEFAULT NULL,
  `img_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Sam31`
--

INSERT INTO `Sam31` (`id`, `title`, `decri`, `amount`, `img_name`, `img_type`) VALUES
(24, 'i phone', 'iphone 13', 'Rs.65990.00', 'iphone-13-finish-select-202207-pink.jpg', 'image/jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `decri` text NOT NULL,
  `amount` varchar(255) NOT NULL,
  `img_name` varchar(5550) NOT NULL,
  `img_type` varchar(2550) NOT NULL,
  `ctg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `title`, `decri`, `amount`, `img_name`, `img_type`, `ctg`) VALUES
(4, 'Adidas Red T-Shirt', 'with the good fabrick', '599.00 Rs.', 'pexels-andrea-piacquadio-845434.jpg', 'image/jpeg', 'top'),
(5, 'deneil jacket', 'color:yellow and available in all size', '1099.00 Rs.', 'pexels-daniel-adesina-833052.jpg', 'image/jpeg', 'top'),
(6, 'pixa bay', 'A suite for mens with execellent quality', '2089.00 Rs.', 'pexels-pixabay-325876.jpg', 'image/jpeg', 'top'),
(7, 'Jeans', 'combo of three', '1299.00 Rs.', 'pexels-mica-asato-1082529.jpg', 'image/jpeg', 'top'),
(9, 'T-shirt', 'red t-shirt for mens', '299', 'pexels-andrea-piacquadio-845434.jpg', 'image/jpeg', 'mens'),
(10, 'Castle', 'Toy  house', 'Rs.3099.00', 'SAVE_20230404_193926.jpg', 'image/jpeg', 'mens'),
(11, 'Tops', 'for womens with high quality', 'Rs.399.00', 'pexels-evg-kowalievska-1148960.jpg', 'image/jpeg', 'mens'),
(12, 'Bag', 'hand bag', 'Rs.399.00', 'pexels-godisable-jacob-932401.jpg', 'image/jpeg', 'mens'),
(13, 'Jeans', 'for mens and womens', 'Rs,.300.00', 'pexels-mica-asato-1082529.jpg', 'image/jpeg', 'mens'),
(14, 'tiger', 'for you', 'Rs.123456.00', '_uhdanimals15_1.jpg', 'image/jpeg', 'feature'),
(15, 'T-Shirt', 'white t-shirt for mens with style', 'Rs.299.00', 'pexels-spencer-selover-428340.jpg', 'image/jpeg', 'feature'),
(16, 'Shoes2', 'lather shoes2', '3999', 'Untitled-10.png', 'image/png', 'feature'),
(17, 'Eagle', 'Eagle wallpaper for home it is 3D', 'Rs.300.00', '_uhdanimals13.jpg', 'image/jpeg', 'feature'),
(18, 'alone wolf', 'Wallpaper for home ', 'Rs.449.00', 'wallpaperflare.com_wallpaper (2).jpg', 'image/jpeg', 'feature'),
(19, 'Sport', 'sport shoes', 'Rs.449.00', 'product-jpeg-250x250.jpg', 'image/jpeg', 'all'),
(20, 'Shoe', 'addidas', 'Rs.599.00', 'sfr-sports-shoes-casual-lace-up-running-training-gym-lightweight-shoes-for-girls-and-women-s-product-images-rvrnvbgddm-0-202210042208.jpg', 'image/jpeg', 'all'),
(21, 'Shoe', 'Sparks shoe', 'Rs.689.00', 'MG_5242.jpg', 'image/jpeg', 'all'),
(22, 'Phone', 'Google pixel 6', 'Rs.35999.00', 'google(1).jpg', 'image/jpeg', 'all'),
(23, 'Phone', 'Noting phone 1', 'Rs.31999.00', 'images.jpg', 'image/jpeg', 'all'),
(24, 'i phone', 'iphone 13', 'Rs.65990.00', 'iphone-13-finish-select-202207-pink.jpg', 'image/jpeg', 'all'),
(25, 'IQOO', 'iqoo z6', 'Rs.15999.00', 'iq-623x800-1662990302.jpg', 'image/jpeg', 'all'),
(26, 'mobile', 'samsung note23', 'Rs.1,2099.00', 'samsung.jpg', 'image/jpeg', 'all'),
(27, 'Car', 'Toy car', 'Rs.1299.00', 'SAVE_20230405_045906.jpg', 'image/jpeg', 'all'),
(28, 'laptop', 'hp rozr 3', 'Rs.60990.00', 'hp (1).jpg', 'image/jpeg', 'all'),
(29, 'Apple', 'Mac book apple', 'Rs.1,30990.00', 'macapple.jpg', 'image/jpeg', 'all'),
(30, 'Laptop', 'Asus ROG Strixe', 'Rs.1,29000.00', 'rogstrix.jpg', 'image/jpeg', 'all'),
(31, 'Fridge', 'Cool it', 'Rs.12999.00', 'frigde.jpg', 'image/jpeg', 'all'),
(32, 'Camera', 'Canon v3', 'Rs.7899.00', 'cameracanan.jpg', 'image/jpeg', 'all'),
(33, 'Suit Mens', 'Green color suit', 'Rs.2100.00', 'injdsuit.jpg', 'image/jpeg', 'court'),
(34, 'Men suit', 'Rolex raymond', 'Rs.3000.00', 'menssuit.jpg', 'image/jpeg', 'court'),
(35, 'Suit', '2 Piece suit', 'Rs.3990.00', '2piecesuit.jpg', 'image/jpeg', 'court'),
(36, 'Black Suit', 'for mens', 'Rs.4099.00', 'suit123.jpg', 'image/jpeg', 'court'),
(37, 'Suit', 'For womens green suit', 'Rs.799.00', '58fa0c0b080a207b3d59d27e296df598.jpg', 'image/jpeg', 'women'),
(38, 'Suit', 'Red womens suit', 'Rs.1099.00', 'redsuit.jpg', 'image/jpeg', 'women'),
(39, 'Suit ', 'For womens', 'Rs.999.00', 'sitsuitwomen.jpg', 'image/jpeg', 'women'),
(40, 'Suit', 'white suit', 'Rs.599.00', 'whitesuitw.jpg', 'image/jpeg', 'women'),
(41, 'Suit', 'Yellow suit womens', 'Rs.899.00', 'yellowsuitw.jpg', 'image/jpeg', 'women'),
(42, 'Shirt', 'For mens', 'Rs.350.00', 'shirt1.jpg', 'image/jpeg', 'all'),
(43, 'Shirt', 'For mens', 'Rs.599.00', 'shirt12.jpg', 'image/jpeg', 'all'),
(44, 'Shirt Casual', 'For mens', 'Rs.449.00', 'shirt123.jpg', 'image/jpeg', 'all'),
(45, 'Headphone', 'Powered by boat', 'Rs.599.00', 'logo1.jpg', 'image/jpeg', 'all');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Name`, `Mail`, `password`) VALUES
(4, 'ajay', 'ajay@gmail.com', 'ajay1234'),
(16, 'user', 'user@gmail.com', 'user123'),
(17, 'aditya', 'adity@gmail.com', 'adity123'),
(18, 'Stark', 'shahid.convegenius@gmail.com', 'st@rk009'),
(30, 'an', 'an@gmail.com', 'an1'),
(31, 'Sam', 'firstpointcreations@gmail.com', '987789'),
(32, 'Jsjdjd', 'hshdhdj@gmail.com', 'jsjdjddkkddk');

-- --------------------------------------------------------

--
-- Table structure for table `user16`
--

CREATE TABLE `user16` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `decri` text DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `img_name` varchar(255) DEFAULT NULL,
  `img_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user16`
--

INSERT INTO `user16` (`id`, `title`, `decri`, `amount`, `img_name`, `img_type`) VALUES
(4, 'Adidas Red T-Shirt', 'with the good fabrick', '599.00 Rs.', 'pexels-andrea-piacquadio-845434.jpg', 'image/jpeg'),
(8, 'R-fera glasses', 'black old and bold flor mens', '449.00 Rs.', 'pexels-r-fera-432059.jpg', 'image/jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aditya17`
--
ALTER TABLE `aditya17`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Mail` (`Mail`);

--
-- Indexes for table `ajay4`
--
ALTER TABLE `ajay4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Sam31`
--
ALTER TABLE `Sam31`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Mail` (`Mail`);

--
-- Indexes for table `user16`
--
ALTER TABLE `user16`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
