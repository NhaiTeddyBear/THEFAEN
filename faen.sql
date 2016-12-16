-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2016 at 05:27 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faen`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendars`
--

CREATE TABLE `calendars` (
  `id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `food_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendars`
--

INSERT INTO `calendars` (`id`, `date`, `food_id`) VALUES
(1, 'Chá»§ Nháº­t', 75);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(2, 'dessert'),
(1, 'drink');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `started_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `body`, `started_date`, `end_date`) VALUES
(5, 'Event 4', 'Ã  akjshf kjahsdf kahsf', '2016-09-30', '2016-11-23'),
(6, 'Event 2', 'ggrg sdfg sdg ', '2016-09-30', '2016-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(10) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` int(20) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `name`, `price`, `image`) VALUES
(70, 'cÆ¡m sÆ°á»n chua ngá»t', 25000, '2016-09-30/suon-xao-chua-ngot-2.jpg'),
(71, 'cÆ¡m gÃ  náº¥m', 25000, '2016-09-30/IMG_6532-586x229.jpg'),
(72, 'NÆ°á»›c me Ä‘Ã¡', 15000, '2016-09-30/meda.jpg'),
(74, 'lakhkshf#@', 903852, '2016-09-30/banhmixaxiu-1351657483_500x0.jpg'),
(75, 'sá»¯a chua dáº»o', 20000, '2016-10-03/1457954460-avata.jpg'),
(76, 'TrÃ  thÃ¡i xanh', 20000, '2016-10-06/1379_P_1431332218325.jpg'),
(77, 'NÆ°á»›c quáº¥t', 15000, '2016-10-06/tra-quat-mat-ong.jpg'),
(78, 'BÃ¡nh mÃ¬ xÃ¡ xÃ­u', 15000, '2016-10-06/banhmixaxiu-1351657483_500x0.jpg'),
(79, 'TrÃ  Ä‘Ã o', 20000, '2016-10-06/tra_dao.jpg'),
(83, 'mÃ³n 1', 20000, '2016-10-11/ALS-Food-Hero.jpg'),
(84, 'MÃ³n 2', 20000, '2016-10-11/ALS-Food-Hero.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `cost` int(20) NOT NULL,
  `date_bought` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `quantity`, `cost`, `date_bought`) VALUES
(2, 'sua chua', '3', 6000, '2016-10-04');

-- --------------------------------------------------------

--
-- Table structure for table `moneys`
--

CREATE TABLE `moneys` (
  `id` int(11) NOT NULL,
  `aspect` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `price` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` varchar(150) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `user_id`, `category_id`, `date_created`) VALUES
(7, 'rewqtqwe', 'asgsdgdhr', 26, 1, '2016-10-09'),
(18, 'sample post', 'hihi', 26, 1, '2016-10-11'),
(19, 'sample post 2', 'hehe', 17, 2, '2016-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(10) NOT NULL,
  `food_id` int(11) NOT NULL,
  `price` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone_number` int(15) NOT NULL,
  `membership_point` int(20) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `food_id`, `price`, `user_id`, `phone_number`, `membership_point`, `date_created`) VALUES
(32, 78, 25000, 34, 6547575, 2500, '2016-10-11 22:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone_number` int(15) NOT NULL,
  `membership_point` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `dob`, `phone_number`, `membership_point`, `address`, `role`, `created`) VALUES
(3, 'ngan2', 'ngan2', '$2a$10$JaMMtr.958hMN/FTxCXAUu67Cgu/L2uZDPhX9aiLdLVMdGUcWq0JO', '2016-09-16', 83080, 0, 'nnv', 'Manager', '2016-09-16 05:51:39'),
(4, 'vitadolce', 'ngan3', '$2a$10$cL0BluytC5jqBIqFq/m9vuVRWuq.yxKq9NlGjT6fSzamlTkxrg07a', '2016-09-16', 7979, 0, 'hjdksghk', 'Manager', '2016-09-16 05:53:36'),
(6, 'ghdkshk', 'hjfdkghkedshk', '$2a$10$MtiSAhF1QWUGwYW7uc/XoeHxDWzMs9qXUrmfL34IA9EQSkrJBs8PG', '2016-09-16', 23432423, 0, 'fdgegf', 'Manager', '2016-09-16 06:03:00'),
(7, 'sdgasdg', 'hihi', '$2a$10$UfOB3jsJYdPGGwRczpJYmuJ.fR0a007vWrLosyyFQ/WA.xZdRX6bC', '2016-09-16', 4223, 0, 'fdgf', 'Manager', '2016-09-16 06:20:35'),
(16, 'kjfkafk', 'fhkdshgkhk', '$2a$10$Zhwcn4Y5nrxZXEAtl/cAUOhzGMX3ioMKWJrkCo4hY17e9eIZGHhjK', '2016-10-04', 0, 0, 'hvmnhgm', 'Manager', '2016-10-04 10:18:12'),
(17, 'DÆ°Æ¡ng Thá»‹ NhÃ i', 'nhaistaff', '$2a$10$x0DOEb/KQz2NOA1/.5Ejg.46QNPf224smD/cxd1MzSauURz/3tacC', '1996-06-04', 912345678, 0, 'PhÃ¹ng Khoang', 'Staff', '2016-10-06 05:46:15'),
(19, 'Pháº¡m ÄÃ¬nh Sinh', 'sinhstaff', '$2a$10$vMa2XdbIy3mDGLjuAp.4QuI0pGHmGb0ofacbxZq2JLZS80uI6I4b.', '1996-12-10', 913245678, 0, 'Hanu', 'Staff', '2016-10-06 05:47:50'),
(20, 'Pháº¡m Minh Tuáº¥n', 'tuanstaff', '$2a$10$o8VxOqwpV8XiWijSwePGQuvVfH7Ywufoh4M5WVuyuSwlfcpfCvA.u', '1996-11-15', 987654321, 0, 'Nguyá»…n ChÃ­ Thanh', 'Staff', '2016-10-06 05:48:42'),
(24, 'manager', 'manager', '$2a$10$ELrKmvNf6ubNcrgOSlB9tOdteP5Tm3YAkcPhUQs5F3JxqARP9MMRi', '2016-10-06', 962563285, 0, 'hanoi', 'Manager', '2016-10-06 05:59:11'),
(25, 'Nguyá»…n CÃ´ng PhÆ°Æ¡ng', 'phuongstaff', '$2a$10$0NXrRItg4bn8iVeSoEs6N.CXkDXzZlbcjM.VR47wTQuSAVQ7/1STW', '2016-10-06', 978123456, 0, 'Kaengnam', 'Staff', '2016-10-06 06:39:58'),
(26, 'Nguyá»…n Thá»‹ Thá»§y NgÃ¢n', 'nganstaff', '$2a$10$tTFTkRQdkAv.Psf//n524.XPYoUmugDZNzYTbiJPbgqMrHz3lZIlu', '1996-09-09', 973428802, 0, 'Nguyá»…n Ngá»c VÅ©', 'Staff', '2016-10-06 15:36:36'),
(31, 'dsgsdg', 'ngannguyen909dfsg', '$2a$10$vAEucnVUvzLjDweowCCk1ulLsA/82zTvmd6bH6vdsJhWUPu6Rwkpq', '2016-10-07', 53453, 0, 'fdgsdfg', 'Manager', '2016-10-07 04:37:35'),
(34, 'Nguyá»…n Thá»‹ Thá»§y NgÃ¢n', 'nganmember', '$2a$10$GMfFTB2dKGhe51t67pqy5ulZm1bEDJCX2nKNWyEH7HAMKSrPocIPK', '2003-10-11', 6547575, 0, 'hanoi', 'Member', '2016-10-11 17:09:30'),
(35, 'DÆ°Æ¡ng Thá»‹ NhÃ i', 'nhaimember', '$2a$10$z1P1FcKjtxzx6EB1rY8zlO7jebzv/Z03M2q31UNHZMdrMI1TuKl..', '2016-10-11', 64565465, 0, 'gfdhdrhf', 'Member', '2016-10-11 17:10:40'),
(36, 'Pháº¡m Minh TuÃ¢n', 'tuanmember', '$2a$10$GpGWfG4OKjIaDNiSCHs3qul3vSL0T7zqdBPQfZ92RpTNSn5Zb7bFC', '2016-10-11', 534654654, 0, 'hanoi', 'Member', '2016-10-11 17:11:12'),
(37, 'Pháº¡m ÄÃ¬nh Sinh', 'sinhmember', '$2a$10$M7XAJsB3jWzj63gvEnD8NOd4IcQLJGIojCjAOUL4pR7l/b4UrBsvK', '2016-10-11', 486046045, 0, 'hanoi', 'Member', '2016-10-11 17:11:37'),
(38, 'Nguyá»…n CÃ´ng PhÆ°Æ¡ng', 'phuongmember', '$2a$10$8/gYhvuMAccnqyIlShge6uUoXDNFx7CtlJLvVXs2VWj2.ic9yKDNm', '2016-10-11', 5344, 0, 'hanoi', 'Member', '2016-10-11 17:12:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendars`
--
ALTER TABLE `calendars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_id` (`food_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moneys`
--
ALTER TABLE `moneys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_id` (`food_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendars`
--
ALTER TABLE `calendars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `moneys`
--
ALTER TABLE `moneys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
