-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2023 at 12:15 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` varchar(25) NOT NULL,
  `ad_pass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_pass`) VALUES
('admin', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `c_id` int(11) NOT NULL,
  `u_id` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `p_id` int(11) NOT NULL,
  `c_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `o_id` int(11) NOT NULL,
  `u_id` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `s_id` int(11) DEFAULT NULL,
  `o_rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`o_id`, `u_id`, `s_id`, `o_rating`) VALUES
(49, 'user', 5, NULL),
(50, 'user', 3, NULL),
(51, 'user', 7, 3),
(52, 'user', 1, NULL),
(53, 'user', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `od_id` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `c_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`od_id`, `o_id`, `p_id`, `c_quantity`) VALUES
(23, 49, 3, 1),
(24, 50, 4, 1),
(25, 50, 1, 1),
(26, 51, 7, 1),
(27, 52, 5, 1),
(28, 53, 4, 1),
(29, 53, 1, 1),
(30, 53, 8, 2),
(31, 53, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `p_img` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `p_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `p_detail` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `t_id`, `p_img`, `p_name`, `p_detail`, `p_price`, `p_rating`) VALUES
(1, 2, 'https://media-cdn.bnn.in.th/11943/Apple-iPhone-11-64GB-Black-1.jpg', 'Apple-iPhone-11', '6.1 inch | A13 Bionic chip with third-generation Neural Engine | Liquid Retina HD display | 128GB | 12MP| Dual 12MP Ultra Wide and Wide cameras with Night mode | iOS 14 | 7.75 x 0.83 x 15.09 cm.', 17000, 5),
(2, 1, 'https://media-cdn.bnn.in.th/201204/Lenovo-Notebook-IdeaPad-Slim-5-01-square_medium.jpg', ' Lenovo ideapad Slim 5', '15.6 inch | AMD Ryzen 7 5700U | 8C / 16T, 1.8 / 4.3GHz, 4MB L2 / 8MB L3 | FHD (1920 x 1080) | 8GB DDR4 3200MHz | 512GB SSD M.2 | Integrated AMD Radeon Graphics | Windows 11 Home  ', 22490, 1),
(3, 2, 'https://media-cdn.bnn.in.th/183815/iPhone_13_Pro_Max_1-square_medium.jpg', 'Apple iPhone 13 Pro', '6.7 inch | A15 Bionic chip | Super Retina XDR display with ProMotion | 128GB | TrueDepth camera 12MP photos | Pro 12MP camera system (Telephoto, Wide, and Ultra Wide) | iOS 15 | 7.81 x 0.76 x 16.08 cm.', 46900, 4),
(4, 3, 'https://media-cdn.bnn.in.th/140782/iPad_10.2_inch_Wi-Fi_Space_Gray_1-square_medium.jpg', 'Apple iPad 9 (2021)', '10.2 inch | A13  Bionic chip | Retina Display | Wi-Fi | 256GB | 12MP | 8MP | iPadOS 15 | Touch ID | 17.41 x 0.75 x 25.06 cm. | 0.487 Kg. in the Box :: iPad, Lightning to USB-C Cable, 20W USB-C Power Adapter', 17700, 4),
(5, 4, 'https://media-cdn.bnn.in.th/133106/Apple-USB-C-to-Lightning-Cable-2-m-1-square_medium.jpg', 'Apple USB-C', 'Apple USB-C to Lightning Cable (2 m) เชื่อมต่อ iPhone, iPad หรือ iPod ที่มีช่องต่อ Lightning Thunderbolt 3 (USB-C) เพื่อซิงค์และชาร์จ คุณยังสามารถใช้สายนี้กับอะแดปเตอร์แปลงไฟ Apple USB-C ขนาด 18 วัตต์, 20 วัตต์, 29 วัตต์, 30 วัตต์, 61 วัตต์, 87 วัตต์ หรือ 96 วัตต์ เพื่อชาร์จอุปกรณ์ iOS ', 1290, 2),
(6, 1, 'https://media-cdn.bnn.in.th/105781/Apple-MacBook-Air-13-M1-chip8C-CPU-7C-GPU-8GB-256GB-Gold-2020-1-square_medium.jpg', 'Apple MacBook Air 13', '13.3 inch | Apple M1 chip | LED backlit display | 8GB unified memory | 256GB SSD | 720p FaceTime HD camera | 802.11ax Wi-Fi 6 wireless networking, IEEE 802.11a/b/g/n/ac compatible', 31900, 3),
(7, 4, 'https://media-cdn.bnn.in.th/163008/JBL-TWS-Wave-200-Black-1-square_medium.jpg', 'JBL Wave 200 Black', 'JBL Wave 200TWS สัมผัสพลังเสียงเบสลึก และความอิสระของไร้สายที่แท้จริงสูงสุด 20 ชั่วโมง เพียงแตะหูฟังเอียร์บัดก็สามารถจัดการการโทรและเพลงของคุณ และด้วยการเชื่อมต่อแบบคู่ ประหยัดแบตเตอรี่ สะดวกสบายด้วยรูปทรงตามหลักสรีรศาสตร์', 2160, 2),
(8, 1, 'https://media-cdn.bnn.in.th/222979/Acer-Notebook-Nitro-AN515-45-R0CJ-1.-square_medium.jpg', 'Acer Nitro AN515', '15.6 inch | AMD Ryzen 5 5600H | 3.3 GHz up to 4.2 GHz (3MB L2 cache,16MB L3 cache) | 16GB DDR4 SO-DIMM | 512GB SSD PCle NVMe | NVIDIA GeForce RTX 3050 4GB GDDR6 | Windows 11 Home ', 26990, 4);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`s_id`, `s_name`) VALUES
(1, 'รอการชำระ'),
(2, 'รอการตรวจสอบ'),
(3, 'ผู้ส่งกำลังเตรียมพัสดุ'),
(4, 'บริษัทขนส่งกำลังนำส่งพัสดุให้คุณ'),
(5, 'พัสดุถูกจัดส่งสำเร็จ'),
(6, 'ให้คะแนน'),
(7, 'สำเร็จ');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`t_id`, `t_name`) VALUES
(1, 'Notebook'),
(2, 'Smartphone'),
(3, 'Tablet'),
(4, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `u_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `u_address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `u_pass` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_email`, `u_address`, `u_pass`) VALUES
('user', 'user@gmail.com', '423423', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`od_id`),
  ADD KEY `o_id` (`o_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `status` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`o_id`) REFERENCES `order` (`o_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `type` (`t_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
