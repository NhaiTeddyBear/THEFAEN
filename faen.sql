-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2016 at 05:02 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

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
(3, 'Äá»“ Äƒn'),
(4, 'Äá»“ uá»‘ng'),
(5, 'orange');

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
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `fullname`, `address`, `phone_number`, `email`, `content`, `date_created`) VALUES
(1, 'rgsÄ‘fs', 'gdgdgsf', 43534543, 'fdfsgdsf@hksfd', 'fdgdfsgdfgfdsg', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(10) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` int(20) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `category_id`, `name`, `price`, `image`) VALUES
(97, 3, 'CÆ¡m tháº­p cáº©m', 25000, '2016-10-27/com-thap-cam.jpeg'),
(98, 3, 'Hamburger', 20000, '2016-10-27/hamburger.jpeg'),
(99, 3, 'CÆ¡m HÃ n Quá»‘c', 25000, '2016-10-27/com-han-quoc.jpeg'),
(100, 3, 'Khoai tÃ¢y chiÃªn', 15000, '2016-10-27/khoai-tay-chien.jpeg'),
(101, 3, 'Spaghetti', 25000, '2016-10-27/pasta-spaghetti.jpg'),
(102, 3, 'Pizza', 30000, '2016-10-27/pizza.jpeg'),
(103, 3, 'MÃ¬ Soba', 30000, '2016-10-27/mi-nhat.jpg'),
(104, 3, 'GÃ  cay', 25000, '2016-10-27/ga-cay.jpg'),
(105, 4, 'Sá»¯a chua dÃ¢u', 20000, '2016-10-27/sua-chua-dau.jpeg'),
(106, 4, 'NÆ°á»›c cam Ã©p', 20000, '2016-10-27/nuoc-cam-ep.jpeg'),
(107, 4, 'CÃ  phÃª Ä‘en', 15000, '2016-10-27/ca-phe.jpeg'),
(108, 4, 'NÆ°á»›c chanh', 15000, '2016-11-03/nuoc-chanh.jpg'),
(109, 4, 'Cappuccino', 25000, '2016-10-27/cappuccino.jpeg'),
(110, 4, 'Chanh báº¡c hÃ ', 20000, '2016-10-27/chanh-bac-ha.jpg'),
(111, 4, 'Há»“ng trÃ ', 18000, '2016-10-27/hong-tra.jpeg'),
(112, 4, 'TrÃ  báº¡c hÃ ', 20000, '2016-11-03/tra-bac-ha.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `content`) VALUES
(1, 'The Faen Ä‘Æ°á»£c thÃ nh láº­p vÃ o ngÃ y 5 thÃ¡ng 5 nÄƒm 2015');

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
  `user_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `aspect` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moneys`
--

INSERT INTO `moneys` (`id`, `user_id`, `schedule_id`, `aspect`, `amount`, `date_created`) VALUES
(1, 17, 22, 25, 54, '2016-10-27 06:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` int(20) NOT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `food_id`, `quantity`, `user_id`, `total`, `detail`, `date_created`) VALUES
(1, 97, 9, 17, 225000, 'HN', '2016-11-03 08:51:05'),
(2, 103, 7, 17, 210000, 'Äáº¡i há»c HÃ  Ná»™i', '2016-11-03 08:52:11'),
(3, 102, 4, 17, 120000, 'HN', '2016-11-03 08:52:47'),
(4, 98, 8, 39, 160000, 'HN', '2016-11-03 09:31:12'),
(5, 103, 6, 39, 180000, 'akshdf', '2016-11-03 09:33:00'),
(6, 101, 8, 39, 200000, 'HN', '2016-11-03 10:59:48'),
(7, 99, 8, 39, 200000, 'VÅ© Ngá»c Phan', '2016-11-03 11:21:28'),
(8, 103, 8, 39, 240000, 'HÃ  Ná»™i', '2016-11-24 20:29:30'),
(9, 99, 5, 39, 125000, 'HÃ  Nam', '2016-11-24 20:31:48'),
(10, 97, 7, 39, 175000, 'HÃ  ÄÃ´ng', '2016-11-24 20:52:38'),
(11, 98, 5, 39, 100000, 'HÃ  Ná»™i', '2016-11-24 21:04:24'),
(12, 103, 7, 39, 210000, 'Nguyá»…n Ngá»c VÅ¨', '2016-11-24 21:05:14'),
(13, 99, 8, 39, 200000, 'HÃ  Ná»™i', '2016-11-24 21:09:44'),
(14, 98, 7, 39, 140000, 'Haf Nooji', '2016-11-24 21:19:18'),
(15, 99, 8, 39, 200000, 'HÃ  Ná»™i', '2016-11-24 21:22:15'),
(16, 98, 5, 39, 100000, 'hanu', '2016-11-24 21:30:34'),
(17, 98, 5, 39, 100000, 'hanu', '2016-11-24 21:33:35'),
(18, 99, 6, 39, 150000, 'hanu', '2016-11-24 21:34:15'),
(19, 103, 8, 39, 240000, 'HÃ  Ná»™i', '2016-11-24 21:56:51'),
(20, 99, 5, 40, 125000, 'HN', '2016-11-25 13:06:50'),
(21, 99, 5, 40, 125000, 'HN', '2016-11-25 13:59:07'),
(22, 98, 67, 40, 1340000, 'HN', '2016-11-25 14:01:09'),
(23, 98, 8, 66, 160000, 'Hn', '2016-11-25 15:05:00'),
(24, 99, 9, 66, 225000, 'Äáº¡i há»c HÃ  Ná»™i', '2016-11-25 15:05:36'),
(25, 100, 7, 66, 105000, 'fytdá»§td', '2016-11-25 15:09:59');

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
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `user_id`, `date`, `shift`, `count`) VALUES
(11, 20, '2016-10-20', 'Ca SÃ¡ng', 1),
(12, 17, '2016-10-20', 'Ca SÃ¡ng', 1),
(17, 3, '2016-10-20', 'Ca Chiá»u', 1),
(18, 34, '2016-10-20', 'Ca Chiá»u', 1),
(20, 3, '2016-10-20', 'Ca SÃ¡ng', 1),
(22, 3, '2016-10-20', 'Ca Chiá»u', 1),
(24, 3, '2016-10-20', 'Ca SÃ¡ng, Ca Chiá»u', 2),
(25, 17, '2016-10-20', 'Ca SÃ¡ng, Ca Chiá»u, Ca Phá»¥', 3),
(27, 25, '2016-10-21', 'Ca SÃ¡ng, Ca Phá»¥', 2),
(28, 20, '2016-10-21', 'Ca SÃ¡ng, Ca Phá»¥', 2),
(29, 26, '2016-10-25', 'Ca SÃ¡ng, Ca Chiá»u', 2),
(30, 17, '2016-12-06', 'Ca SÃ¡ng, Ca Chiá»u', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone_number` int(15) NOT NULL,
  `membership_point` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `dob`, `phone_number`, `membership_point`, `address`, `avatar`, `role`, `created`) VALUES
(3, 'ngan2', 'ngan2', '$2a$10$JaMMtr.958hMN/FTxCXAUu67Cgu/L2uZDPhX9aiLdLVMdGUcWq0JO', '2016-09-16', 0, 0, 'nnv', '', 'Manager', '2016-09-16 05:51:39'),
(4, 'vitadolce', 'ngan3', '$2a$10$cL0BluytC5jqBIqFq/m9vuVRWuq.yxKq9NlGjT6fSzamlTkxrg07a', '2016-09-16', 0, 0, 'hjdksghk', '', 'Manager', '2016-09-16 05:53:36'),
(6, 'ghdkshk', 'hjfdkghkedshk', '$2a$10$MtiSAhF1QWUGwYW7uc/XoeHxDWzMs9qXUrmfL34IA9EQSkrJBs8PG', '2016-09-16', 0, 0, 'fdgegf', '', 'Manager', '2016-09-16 06:03:00'),
(7, 'sdgasdg', 'hihi', '$2a$10$UfOB3jsJYdPGGwRczpJYmuJ.fR0a007vWrLosyyFQ/WA.xZdRX6bC', '2016-09-16', 0, 0, 'fdgf', '', 'Manager', '2016-09-16 06:20:35'),
(16, 'kjfkafk', 'fhkdshgkhk', '$2a$10$Zhwcn4Y5nrxZXEAtl/cAUOhzGMX3ioMKWJrkCo4hY17e9eIZGHhjK', '2016-10-04', 0, 0, 'hvmnhgm', '', 'Manager', '2016-10-04 10:18:12'),
(17, 'DÆ°Æ¡ng Thá»‹ NhÃ i', 'nhaistaff', '$2a$10$Ow.AM6F8bmbOwPSEwIT0uuikT2Y3KqL6GimGd8m4eruLxICfjqSmS', '1996-06-04', 92738745, 0, 'PhÃ¹ng Khoang', 'IMG_1252.JPG', 'Staff', '2016-10-06 05:46:15'),
(19, 'Pháº¡m ÄÃ¬nh Sinh', 'sinhstaff', '$2a$10$zDA/3p4Hq91zHEJcBUCjxeDbmval2A11Ke5yim64uOlZlv/IpN8dm', '1996-12-10', 928734965, 0, 'Hanu', 'IMG_1303.JPG', 'Staff', '2016-10-06 05:47:50'),
(20, 'Pháº¡m Minh Tuáº¥n', 'tuanstaff', '$2a$10$o8VxOqwpV8XiWijSwePGQuvVfH7Ywufoh4M5WVuyuSwlfcpfCvA.u', '1996-11-15', 0, 0, 'Nguyá»…n ChÃ­ Thanh', '', 'Staff', '2016-10-06 05:48:42'),
(24, 'manager', 'manager', '$2a$10$ELrKmvNf6ubNcrgOSlB9tOdteP5Tm3YAkcPhUQs5F3JxqARP9MMRi', '2016-10-06', 0, 0, 'hanoi', '', 'Manager', '2016-10-06 05:59:11'),
(25, 'Nguyá»…n CÃ´ng PhÆ°Æ¡ng', 'phuongstaff', '$2a$10$0NXrRItg4bn8iVeSoEs6N.CXkDXzZlbcjM.VR47wTQuSAVQ7/1STW', '2016-10-06', 0, 0, 'Kaengnam', '', 'Staff', '2016-10-06 06:39:58'),
(26, 'Nguyá»…n Thá»‹ Thá»§y NgÃ¢n', 'nganstaff', '$2a$10$tTFTkRQdkAv.Psf//n524.XPYoUmugDZNzYTbiJPbgqMrHz3lZIlu', '1996-09-09', 0, 0, 'Nguyá»…n Ngá»c VÅ©', '', 'Staff', '2016-10-06 15:36:36'),
(31, 'dsgsdg', 'ngannguyen909dfsg', '$2a$10$vAEucnVUvzLjDweowCCk1ulLsA/82zTvmd6bH6vdsJhWUPu6Rwkpq', '2016-10-07', 0, 0, 'fdgsdfg', '', 'Manager', '2016-10-07 04:37:35'),
(34, 'Nguyá»…n Thá»‹ Thá»§y NgÃ¢n', 'nganmember', '$2a$10$GMfFTB2dKGhe51t67pqy5ulZm1bEDJCX2nKNWyEH7HAMKSrPocIPK', '2003-10-11', 0, 0, 'hanoi', '', 'Member', '2016-10-11 17:09:30'),
(35, 'DÆ°Æ¡ng Thá»‹ NhÃ i', 'nhaimember', '$2a$10$mnBQA3hMfjCmBFKLO0ouTO86Y2/xJsizylNrrdgxDRry4nbQrbv9W', '2016-10-11', 0, 0, 'gfdhdrhf', '', 'Member', '2016-10-11 17:10:40'),
(36, 'Pháº¡m Minh Tuáº¥n', 'tuanmember', '$2a$10$8AR4GpKAlZpLZiesdqLb9eEyW/WIbxAknhr9trpmVvpaild4jEtlW', '2016-10-11', 0, 0, 'hanoi', '', 'Member', '2016-10-11 17:11:12'),
(37, 'Pháº¡m ÄÃ¬nh Sinh', 'sinhmember', '$2a$10$nNIvgkNwxVGGN/UWn0NOoeZSbgZ03Gh1x75/Epa5sv77HRJVK9rpW', '2016-10-11', 0, 0, 'hanoi', '', 'Member', '2016-10-11 17:11:37'),
(38, 'Nguyá»…n CÃ´ng PhÆ°Æ¡ng', 'phuongmember', '$2a$10$nQ6g.sFQJ3m1SN6DY0cM0Oj/DeeefpttJ6bXNQPIEkzEuHZvbgZ7K', '2016-10-11', 0, 0, 'hanoi', '', 'Member', '2016-10-11 17:12:04'),
(39, 'NhÃ i DÆ°Æ¡ng', 'duongnhai', '$2a$10$hDczOOk1XpyDWGtZJ1RyduVEwKLrdOALWYl6d1c5oElodUNOE2rzS', '2016-10-16', 0, 0, 'HN', '', 'Member', '2016-10-16 11:18:09'),
(40, 'DÆ°Æ¡ng Thá»‹ NhÃ i', 'nhainhai', '$2a$10$ld4rjNXu3rMMb3SOgq0Ygu5OdZPuOoWqhYVMW0anv2qZe00C6Wt4C', '2016-11-24', 0, 0, 'HN', '', 'Member', '2016-11-24 17:14:08'),
(41, 'Há»“ng DÆ°Æ¡ng', 'duonghong', '$2a$10$aj9LpjD1fsrWB34xYHPcF.kKmXlO4pndpv6wzMjYwZfyDKbRspwJG', '2016-11-25', 0, 0, 'HN', '2016-11-25/14992019_1608111636159203_5102261643813537315_n.jpg', 'Member', '2016-11-25 02:16:45'),
(44, 'DÆ°Æ¡ng Há»“ng', 'honghong', '$2a$10$B.Yxa2anK8qPgXtiLp4qtOMJCzXPeFoOXYlxRpiGaY2/JHmiKKeK2', '2016-11-25', 0, 0, 'HN', '2016-11-25/30656818180_19d4704127_o.jpg', 'Member', '2016-11-25 02:20:52'),
(48, 'PhÆ°Æ¡ng NGuyá»…n', 'phuongphuong', '$2a$10$qVbGcOXe1S18KyzN6AXP5.EeUwRFQ8FFQQgnr5Ff9tlkcyc5rSYdu', '2016-11-25', 0, 0, 'HD', 'IMG_1255.JPG', 'Member', '2016-11-25 02:27:12'),
(49, 'MInh Phan', 'minhminh', '$2a$10$U4Mj9s8A/7QCpSXuwQQ0XOXTgyjH3Lpgz8IH5NwRdJ12q9uD6bNBy', '2016-11-25', 0, 0, 'Ba Vi', '2016-11-25/IMG_1251.JPG', 'Member', '2016-11-25 02:43:37'),
(54, 'Sinh Pháº¡m', 'sinhpham', '$2a$10$zwN11uT7eXUvgHSK108gb.5avRllHSqX5nYPfdYVZ1I/XwQf1ID8G', '2016-11-25', 0, 0, 'ThÃ¡i BÃ¬nh', '2016-11-25/IMG_1260.JPG', 'Member', '2016-11-25 03:17:38'),
(55, 'NgÃ¢n NgÃ¢n', 'nganngan', '$2a$10$kVw.x2INO7j2rbw5nh4IWeA5ibdNbPjIdxQhZBVB.PWZyPqMftxfG', '2016-11-25', 0, 0, 'HN', '2016-11-25/IMG_1286.JPG', 'Member', '2016-11-25 06:21:11'),
(59, 'Tuáº¥nhuhjbjkjk', 'tuan', '$2a$10$zdmtdCIYFOJ//pKHanUxWumrbnlh2Whykos1QvFoptPUZnBZrTcfS', '2016-11-25', 0, 0, 'HN', '2016-11-25/IMG_1280.JPG', 'Member', '2016-11-25 06:45:20'),
(62, 'Minh Minh', 'minhphan', '$2a$10$Yo0axrvNMKbqOfyyPTiuNOai9hrzN1P2Z4mOSRZh57ZSKnQa5BAX2', '2016-11-25', 0, 0, 'Ba Vi', '2016-11-25/IMG_1297.JPG', 'Member', '2016-11-25 07:19:28'),
(64, '', '', '', '0000-00-00', 0, 0, '', '', '', '2016-11-25 07:33:34'),
(65, '', '', '', '0000-00-00', 0, 0, '', '', '', '2016-11-25 07:33:40'),
(66, 'HÆ°Æ¡ng', 'huonghuong', '$2a$10$lJF6g5Wq7eFedluq3u3J.ek.lL8tGEVLHGidOdNoMifvxMiAr.Rfi', '2016-11-25', 98735625, 0, 'HN', '2016-11-25/IMG_1259.JPG', 'Member', '2016-11-25 07:48:14'),
(67, 'ilahsdf', 'iuaohishf8asf', '$2a$10$aail.p0DYgmRpReRAN2YDePAcL2RBHwi3KC4Kod9XuqWWqHnUtIm6', '2016-11-25', 2147483647, 0, 'HN', '2016-11-25/IMG_1293.JPG', 'Member', '2016-11-25 07:53:28'),
(68, 'Duonkhag', 'ajhfhahfefe', '$2a$10$slUpdkLA4ulptnotRVO4TutoPF308IFT6RIf16hxGE3vAZCw5LdlO', '2016-11-25', 208745275, 0, 'HN', '2016-11-25/IMG_1307.JPG', 'Member', '2016-11-25 08:07:16'),
(69, 'ljhalsdfadsfafa', 'sdfasdfasfasf', '$2a$10$u2OVGGxsNrKQ23ldRqaI5ObXeAxkbeRacWhlsdjLq796FTjhg6JXW', '2016-11-25', 2147483647, 0, 'akjlhsdhfaf', '2016-11-25/IMG_1248.JPG', 'Member', '2016-11-25 08:08:55'),
(70, 'wertetwt', 'wertwertt', '$2a$10$VH1NDN5d5JDQnyucojssEeQcfRoUzl5pLZniKlbUY968fxIEXix.y', '2016-11-25', 634565634, 0, 'sgsgf', '2016-11-25/IMG_1238.JPG', 'Member', '2016-11-25 08:09:42'),
(71, 'asdfasdf', 'asdfasdfasdf', '$2a$10$sZPl6sEfi3RtjLlzIQVVw.AGpmLDLRyRSbEqi0SLkndZZ8.6PAChO', '2016-11-25', 2147483647, 0, 'asfdfasdf', '2016-11-25/IMG_1239.JPG', 'Member', '2016-11-25 08:11:45'),
(72, 'gasfsdfsda', 'ewtwfsdfsd', '$2a$10$L4jPu74U..bBVgGhTZxOfu0EikB0T9mAqPr/qpbUM1RDvG/fBaAnO', '2016-05-25', 43543543, 0, 'dfgdfg', '2016-11-25/IMG_0256.JPG', 'Member', '2016-11-25 08:14:34'),
(73, 'hahahahaah', 'hahaahha', '$2a$10$aE2255Yt6LTTRlt4Z0mFeOlem5xDanCsqTuyQK2JHhk.mUe5lSLKO', '2016-11-25', 5435435, 0, 'rgfdfgd', '2016-11-25/IMG_1243.JPG', 'Member', '2016-11-25 08:16:35'),
(74, 'nhainhainhai', 'sdfhakjhdsfakdhfskdfskh', '$2a$10$0Jbsv08116xtaeVUWjhhM.Ql5GCxVEWGZ5pb0WEMaGBAC5V0tFTwC', '2016-11-25', 2147483647, 0, 'fgsdfgfdg', '2016-11-25/IMG_1253.JPG', 'Member', '2016-11-25 08:19:43');

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
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `schedule_id` (`schedule_id`);

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
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `moneys`
--
ALTER TABLE `moneys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
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
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `moneys`
--
ALTER TABLE `moneys`
  ADD CONSTRAINT `moneys_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `moneys_ibfk_2` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
