-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2018 at 10:58 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_reservasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_username` varchar(25) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_name` varchar(40) NOT NULL,
  `admin_level` varchar(15) NOT NULL,
  `admin_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_session` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_username`, `admin_password`, `admin_name`, `admin_level`, `admin_created`, `admin_updated`, `admin_session`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin', '2017-07-28 05:22:21', '2018-08-17 14:12:21', 'h3pr1esh3d65updgfhllbq5vf5'),
('user', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', 'user', '2017-07-28 16:19:02', '2018-07-27 21:10:01', '2ceet7ckhu493lhb96nb1feos5');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `bank_owner` varchar(100) NOT NULL,
  `bank_noaccount` varchar(100) NOT NULL,
  `bank_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bank_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `bank_name`, `bank_owner`, `bank_noaccount`, `bank_created`, `bank_updated`) VALUES
(1, 'BNI', 'Ali Abdul Wahid', '12121233', '2018-07-27 17:29:14', '2018-07-27 22:29:22');

-- --------------------------------------------------------

--
-- Table structure for table `classtype`
--

CREATE TABLE `classtype` (
  `classtype_id` int(11) NOT NULL,
  `classtype_name` varchar(100) NOT NULL,
  `classtype_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `classtype_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classtype`
--

INSERT INTO `classtype` (`classtype_id`, `classtype_name`, `classtype_created`, `classtype_updated`) VALUES
(1, 'A', '2018-07-27 22:48:23', '2018-07-27 22:48:23'),
(2, 'B', '2018-07-29 01:58:13', '2018-07-29 01:58:13'),
(3, 'C', '2018-07-29 01:58:17', '2018-07-29 01:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `eat`
--

CREATE TABLE `eat` (
  `eat_id` int(11) NOT NULL,
  `eat_name` varchar(100) NOT NULL,
  `eat_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `eat_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eat`
--

INSERT INTO `eat` (`eat_id`, `eat_name`, `eat_created`, `eat_updated`) VALUES
(1, 'Sarapan Pagi', '2018-07-27 23:05:07', '2018-07-29 02:00:25'),
(3, 'Makan Siang', '2018-07-29 02:00:32', '2018-07-29 02:00:43'),
(4, 'Makan Malam', '2018-07-29 02:00:38', '2018-07-29 02:00:38'),
(5, 'Tidak ada Makanan', '2018-07-29 02:00:48', '2018-07-29 02:00:48');

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `facility_id` int(11) NOT NULL,
  `facility_name` varchar(100) NOT NULL,
  `facility_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `facility_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`facility_id`, `facility_name`, `facility_created`, `facility_updated`) VALUES
(4, 'AC', '2018-07-29 01:58:32', '2018-07-29 01:58:32'),
(5, 'Parkir', '2018-07-29 01:59:35', '2018-07-29 01:59:35'),
(6, 'Kolam Renang', '2018-07-29 01:59:44', '2018-07-29 01:59:44'),
(7, 'Wifi', '2018-07-29 01:59:50', '2018-07-29 01:59:50'),
(8, 'Kasur Besar', '2018-07-29 02:00:01', '2018-07-29 02:00:01'),
(9, 'Kamar Mandi Air Hangat', '2018-07-29 02:00:10', '2018-07-29 02:00:10');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_name` varchar(100) NOT NULL,
  `gallery_photo` varchar(355) NOT NULL,
  `gallery_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gallery_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_name`, `gallery_photo`, `gallery_created`, `gallery_updated`) VALUES
(9, 'as', '187988bed-bedroom-clean-775219.jpg', '2018-07-30 21:40:15', '2018-07-30 21:40:15'),
(10, 'sdfsf', '883331bed-bedroom-chair-271619.jpg', '2018-07-30 21:40:28', '2018-07-30 21:40:28'),
(11, 'dsfsd', '617462bedroom-door-entrance-271639.jpg', '2018-07-30 21:42:12', '2018-07-30 21:42:12'),
(12, 'khkh', '286193bed-bedroom-clean-775219.jpg', '2018-07-30 21:42:22', '2018-07-30 21:42:22'),
(13, 'nmnm', '164489apartment-bed-bedroom-271624.jpg', '2018-07-30 21:42:40', '2018-07-30 21:42:40'),
(14, 'skdfjdsk', '290618apartment-bed-bedroom-271618.jpg', '2018-07-30 21:42:55', '2018-07-30 21:42:55');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `guest_username` varchar(100) NOT NULL,
  `guest_password` varchar(100) NOT NULL,
  `guest_name` varchar(35) NOT NULL,
  `guest_notelp` varchar(12) NOT NULL,
  `guest_address` varchar(255) NOT NULL,
  `guest_gender` enum('Pria','Wanita') NOT NULL,
  `guest_age` int(11) NOT NULL,
  `guest_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `guest_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guest_username`, `guest_password`, `guest_name`, `guest_notelp`, `guest_address`, `guest_gender`, `guest_age`, `guest_created`, `guest_updated`) VALUES
('asas', 'd61919789142e61c8980f0c276fc24cc', 'ali', '1212', 'kjaksjak', 'Pria', 12, '2018-07-27 21:40:14', '2018-07-27 21:47:47'),
('qqq', 'b2ca678b4c936f905fb82f2733f5297f', '', '', '', '', 0, '2018-08-07 20:48:18', '2018-08-07 20:48:18'),
('user', 'ee11cbb19052e40b07aac0ca060c23ee', 'usera', 'user', 'user', 'Wanita', 12, '2018-07-28 23:06:14', '2018-07-28 23:44:02'),
('user2', '7e58d63b60197ceb55a1c487989a3720', 'user2', 'user2', 'user2', 'Pria', 12, '2018-07-28 23:07:24', '2018-07-28 23:07:24'),
('zz', '25ed1bcb423b0b7200f485fc5ff71c8e', 'zz', 'zz', 'zz', 'Pria', 11, '2018-07-29 01:19:02', '2018-07-29 01:19:02');

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `identitas_id` int(3) NOT NULL,
  `identitas_website` varchar(250) NOT NULL,
  `identitas_deskripsi` text NOT NULL,
  `identitas_keyword` text NOT NULL,
  `identitas_alamat` varchar(250) NOT NULL,
  `identitas_notelp` char(20) NOT NULL,
  `identitas_favicon` varchar(250) NOT NULL,
  `identitas_author` varchar(100) NOT NULL,
  `identitas_fb` varchar(100) NOT NULL,
  `identitas_tw` varchar(100) NOT NULL,
  `identitas_ig` varchar(100) NOT NULL,
  `identitas_yb` varchar(100) NOT NULL,
  `identitas_latitude` varchar(100) NOT NULL,
  `identitas_longitude` varchar(100) NOT NULL,
  `identitas_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `identitas_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`identitas_id`, `identitas_website`, `identitas_deskripsi`, `identitas_keyword`, `identitas_alamat`, `identitas_notelp`, `identitas_favicon`, `identitas_author`, `identitas_fb`, `identitas_tw`, `identitas_ig`, `identitas_yb`, `identitas_latitude`, `identitas_longitude`, `identitas_created`, `identitas_updated`) VALUES
(1, 'The Hotel', 'Hotel is superbly positioned hotel destination. Located close to Baliâ€™s most recognized attractions that include an array of cultural and leisure pursuits, Kuta Beach and upmarket shopping in a mall that shares the same grounds as the hotel. Aryaduta Bali is located in South Kuta, minutes from Waterbom Park colorful street side shopping and within close walking distance to the popular Segara Beach. The hotel is just ten minutes from Bali airport and ten minutes from connecting roads to the coastal and highland communities of Seminyak, Nusa Dua, Jimbaran Bay, Ubud and beyond.', 'reservasi, hotel, php, website', ' Jl. Kartika Plaza, Lingkungan Segara, Kuta, Kabupaten Badung 80361, Bali, Indonesia', '081234567890', '336456if_3_2247709.png', 'Admin', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.instagram.com', 'http://www.youtube.com', '-6.8731953', '107.5737873', '2018-07-27 21:21:24', '2018-07-30 21:45:21');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` varchar(100) NOT NULL,
  `guest_username` varchar(100) NOT NULL,
  `invoice_photo` varchar(255) NOT NULL,
  `invoice_cancel` varchar(255) NOT NULL,
  `invoice_price` int(11) NOT NULL,
  `invoice_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `invoice_qty` int(11) NOT NULL,
  `invoice_pesan` varchar(255) NOT NULL,
  `invoice_status` varchar(100) NOT NULL,
  `invoice_payment` varchar(100) NOT NULL,
  `invoice_checkin` varchar(100) NOT NULL DEFAULT 'Belum Checkin',
  `invoice_checkout` varchar(100) NOT NULL DEFAULT 'Belum Checkout'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `guest_username`, `invoice_photo`, `invoice_cancel`, `invoice_price`, `invoice_created`, `invoice_qty`, `invoice_pesan`, `invoice_status`, `invoice_payment`, `invoice_checkin`, `invoice_checkout`) VALUES
('1jJ1Tpt2', 'user', '372222FRONTEND.jpg', '', 4000000, '2018-08-10 13:41:01', 8, '', 'done', 'Booking', 'Belum Checkin', 'Belum Checkout'),
('a6e1rTwk', 'user', '', '', 500000, '2018-08-10 15:14:11', 1, '', 'booking', 'Booking', 'Belum Checkin', 'Belum Checkout'),
('S68FeP2P', 'user', '372222FRONTEND.jpg', '', 500000, '2018-08-07 20:58:06', 2, '', 'done', 'Booking', 'Sudah Checkin - 2018-08-10 10:11:53', 'Sudah Checkout - 2018-08-10 10:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `classtype_id` int(11) NOT NULL,
  `roomtype_id` int(11) NOT NULL,
  `facility_id` varchar(100) NOT NULL,
  `eat_id` varchar(100) NOT NULL,
  `room_people` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `room_price` int(11) NOT NULL,
  `room_photo` varchar(255) NOT NULL,
  `room_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `room_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `classtype_id`, `roomtype_id`, `facility_id`, `eat_id`, `room_people`, `room_no`, `room_price`, `room_photo`, `room_created`, `room_updated`) VALUES
(15, 1, 1, '4,5,6,7,8,9', '1,3,4', 4, 1, 1000000, '585540apartment-bed-bedroom-271624.jpg', '2018-07-29 02:03:13', '2018-07-29 02:03:13'),
(16, 2, 2, '4,6,7', '3,4', 2, 2, 500000, '278808apartment-bed-bedroom-271618.jpg', '2018-07-29 02:03:39', '2018-07-29 02:03:39'),
(17, 3, 3, '4', '5', 1, 3, 250000, '838714bed-bedroom-clean-775219.jpg', '2018-07-29 02:04:03', '2018-07-29 02:04:03'),
(18, 3, 4, '4,7,8', '3,4', 2, 4, 400000, '725128bedroom-door-entrance-271639.jpg', '2018-07-29 02:04:32', '2018-07-29 02:04:32');

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `roomtype_id` int(11) NOT NULL,
  `roomtype_name` varchar(100) NOT NULL,
  `roomtype_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `roomtype_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`roomtype_id`, `roomtype_name`, `roomtype_created`, `roomtype_updated`) VALUES
(1, 'Kamar Besar', '2018-07-27 22:43:15', '2018-07-27 22:43:15'),
(2, 'Kamar Pengantin', '2018-07-29 01:57:55', '2018-07-29 01:57:55'),
(3, 'Kamar Pribadi', '2018-07-29 01:58:00', '2018-07-29 01:58:00'),
(4, 'Kamar Kecil', '2018-07-29 01:58:07', '2018-07-29 01:58:07');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `slide_id` int(11) NOT NULL,
  `slide_name` varchar(100) NOT NULL,
  `slide_photo` varchar(355) NOT NULL,
  `slide_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `slide_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`slide_id`, `slide_name`, `slide_photo`, `slide_created`, `slide_updated`) VALUES
(4, 'Deskripsi 1', '449951apartment-bed-bedroom-271624.jpg', '2018-07-28 13:11:36', '2018-07-29 01:53:55'),
(5, 'Deskripsi 2', '126373bed-bedroom-clean-775219.jpg', '2018-07-28 15:27:52', '2018-07-29 01:55:35'),
(6, 'Deskripsi 3', '2655apartment-bed-bedroom-271618.jpg', '2018-07-29 01:54:39', '2018-07-29 01:54:50'),
(7, 'Deskripsi 4', '573303bed-bedroom-chair-271619.jpg', '2018-07-29 01:55:55', '2018-07-29 01:55:55'),
(8, 'Deskripsi 5', '81359bedroom-door-entrance-271639.jpg', '2018-07-29 01:57:31', '2018-07-29 01:57:31');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `invoice_id` varchar(100) NOT NULL,
  `room_id` varchar(100) NOT NULL,
  `transaction_qty` int(11) NOT NULL,
  `transaction_price` int(11) NOT NULL,
  `transaction_totalprice` int(11) NOT NULL,
  `transaction_status` varchar(100) NOT NULL,
  `transaction_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `transaction_checkin` datetime NOT NULL,
  `transaction_checkout` datetime NOT NULL,
  `transaction_day` int(11) NOT NULL,
  `transaction_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `invoice_id`, `room_id`, `transaction_qty`, `transaction_price`, `transaction_totalprice`, `transaction_status`, `transaction_created`, `transaction_checkin`, `transaction_checkout`, `transaction_day`, `transaction_updated`) VALUES
(26, 'S68FeP2P', '3', 2, 250000, 500000, 'done', '2018-08-07 20:58:06', '2018-08-29 00:00:00', '2018-08-31 00:00:00', 2, '2018-08-07 21:02:40'),
(27, '1jJ1Tpt2', '2', 8, 500000, 4000000, 'done', '2018-08-10 13:41:01', '2018-08-23 00:00:00', '2018-08-31 00:00:00', 8, '2018-08-10 15:14:25'),
(28, 'a6e1rTwk', '2', 1, 500000, 500000, 'booking', '2018-08-10 15:14:11', '2018-08-30 00:00:00', '2018-08-31 00:00:00', 1, '2018-08-10 15:14:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_username`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `classtype`
--
ALTER TABLE `classtype`
  ADD PRIMARY KEY (`classtype_id`);

--
-- Indexes for table `eat`
--
ALTER TABLE `eat`
  ADD PRIMARY KEY (`eat_id`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`facility_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_username`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`identitas_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`roomtype_id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classtype`
--
ALTER TABLE `classtype`
  MODIFY `classtype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eat`
--
ALTER TABLE `eat`
  MODIFY `eat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `facility_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `identitas_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `roomtype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
