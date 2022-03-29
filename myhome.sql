-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 29, 2022 at 12:52 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myhome`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `price` decimal(15,0) NOT NULL,
  `location` varchar(40) NOT NULL,
  `category` int(1) NOT NULL,
  `sellOrRent` int(1) NOT NULL,
  `homeSize` int(10) NOT NULL,
  `numberOfRooms` int(2) NOT NULL,
  `image` varchar(500) NOT NULL DEFAULT 'images/',
  `date` text NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=481 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `userID`, `title`, `description`, `price`, `location`, `category`, `sellOrRent`, `homeSize`, `numberOfRooms`, `image`, `date`, `status`) VALUES
(46, 3, 'اجاره سوئیت  شبانه در تبریز', '2 خوابه . 2 سرویس بهداشتی\n4 تخت (3 تخت یک‌نفره + 1 تخت دو‌نفره)\nهزینه هر شب یک تومن ', '1000000', 'تبریز - شهرک اندیشه', 2, 2, 80, 2, 'images/22-02-27-3-17-19-210.jpg', '2022-02-27 03:05', 1),
(478, 1, 'اجاره منزل مسکونی', 'قیمت رهن: 150 میلیون\nقیمت اجاره: 3 میلیون\nپارکینگ: 1 عدد', '3000000', 'تهران، دولت آباد،منطقه ۲۰', 1, 2, 120, 2, 'images/22-03-27-5-41-32-28398.jpg', '2022-03-27 05:38', 1),
(47, 2, 'فروش خانه ویلایی 4 خوابه در حکیمیه', 'این ویلا 15 سال ساخت است. در محله حکیمیه منطقه 4 تهران واقع شده است. برای اطلاعات بیشتر تماس بگیرید.', '20250000000', 'تهران- محله حکیمیه - منطقه 4', 1, 1, 180, 4, 'images/22-03-24-12-48-08-23396.jpg', '2022-03-24 12:09', 1),
(43, 3, 'اجاره آپارتمان 3 خوابه', 'این واحد در منطقه 5 شهر تهران واقع شده است و از امکاناتی نظیر بالکن، آسانسور و انباری برخوردار است. این آپارتمان/برج مسکونی 10 سال ساخت است.', '8000000', 'تهران- پونک شمالی - منطقه 5', 2, 2, 90, 3, 'images/2022-02-27-2-45-16-5906.jpg', '2022-02-27 02:08', 1),
(42, 3, 'فروش آپارتمان 150 متر  دو سال ساخت', 'پارکینگ: 1 عدد\n2 سال ساخت \nاز آسانسور، انباری، سالن ورزشی، آنتن مرکزی، نگهبان، سالن اجتماعات، بالکن و درب ریموت برخوردار است.', '10000000000', 'تهران- شهرک راه آهن- منطقه 22', 2, 1, 150, 3, 'images/22-03-27-1-59-34-13665.jpg', '2022-03-27 01:38', 1),
(44, 2, 'خرید ویلای نزدیک ساحل ', 'فاصله تا شهر خیلی دور نباشد\r\nنزدیک ساحل و ویو خوبی داشته باشد\r\nزیر 10 سال ساخت باشد', '4000000000', 'مازندران - محمود آباد', 1, 1, 200, 2, 'images/22-03-29-12-43-03-23396.jpg', '2022-03-29 12:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phonenumber` varchar(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `image` varchar(300) DEFAULT 'images/',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `phonenumber`, `username`, `password`, `image`) VALUES
(1, '09187171026', 'خانم نجمی', '4321', 'images/22-03-27-3-46-58-29528.jpg'),
(2, '09128963223', 'خانم میرزایی', '1234', 'images/22-03-27-3-35-58-29586.jpg'),
(3, '09129995212', 'خانم احمدی', '1234', 'images/22-03-24-2-19-29-27477.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
