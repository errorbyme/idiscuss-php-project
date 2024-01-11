-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2024 at 10:34 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscussdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `c_id` int(250) NOT NULL,
  `c_name` varchar(250) NOT NULL,
  `c_desc` varchar(250) NOT NULL,
  `c_images` varchar(255) NOT NULL,
  `c_reg_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`c_id`, `c_name`, `c_desc`, `c_images`, `c_reg_date`) VALUES
(1, 'python', 'Python is a high-level, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation. Python is dynamically typed and garbage-collect.', 'card-1.jpg', '2023-12-02 19:30:58'),
(2, 'java', 'Java is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible. It is a general-purpose programming language.', 'card-2.jpg', '2023-12-02 19:32:09'),
(3, 'javascript', 'JavaScript, often abbreviated as JS, is a programming language that is one of the core technologies of the World Wide Web, alongside HTML and CSS.', 'card-3.jpg', '2023-12-02 19:32:39'),
(5, 'C++', 'C++ is a high-level, general-purpose programming language created by Danish computer scientist Bjarne Stroustrup. First released in 1985 as an extension of the C programming language.', 'card-4.jpg', '2023-12-03 08:42:32'),
(6, 'php', 'PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1993 and released in 1995.', 'card-5.jpg', '2023-12-03 08:42:49'),
(7, 'react js', 'React is a free and open-source front-end JavaScript library for building user interfaces based on components. It is maintained by Meta and a community of individual developers and companies.', 'card-6.jpg', '2023-12-03 08:43:21');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(255) NOT NULL,
  `comment_content` varchar(255) NOT NULL,
  `thread_id` int(255) NOT NULL,
  `comment_by` int(255) NOT NULL,
  `comment_on_id` int(255) NOT NULL,
  `active` int(255) NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_on_id`, `active`, `comment_date`) VALUES
(1, 'do dis everything wil be solve\r\n', 1, 13, 1, 1, '2024-01-08 14:47:31'),
(2, 'try reinstalling all the modules ', 1, 7, 1, 1, '2024-01-08 14:48:07'),
(3, 'might not be compatible to yr system', 1, 10, 1, 1, '2024-01-08 14:49:07'),
(4, 'hello', 16, 10, 8, 1, '2024-01-08 14:49:46'),
(5, 'hello', 14, 10, 3, 1, '2024-01-08 14:49:58'),
(6, 'helllll', 6, 3, 5, 1, '2024-01-08 14:50:19'),
(7, 'waw', 5, 3, 1, 1, '2024-01-08 14:50:29'),
(8, 'yo', 3, 3, 4, 1, '2024-01-08 14:50:41'),
(9, 'do dis \r\n', 15, 3, 3, 0, '2024-01-08 14:50:57'),
(10, 'do dis', 13, 11, 5, 1, '2024-01-08 14:51:25'),
(11, 'try dis', 26, 11, 10, 1, '2024-01-08 14:51:36'),
(12, 'haha', 14, 11, 3, 1, '2024-01-08 14:51:47'),
(13, 'try android studio', 20, 8, 12, 1, '2024-01-08 14:52:20'),
(14, 'haha', 1, 9, 1, 1, '2024-01-08 14:54:59'),
(15, 'wooooo', 1, 13, 1, 1, '2024-01-08 14:55:25'),
(16, 'ha', 1, 1, 1, 0, '2024-01-08 15:39:14'),
(17, 'ho', 1, 51, 1, 1, '2024-01-08 15:40:27'),
(18, 'lol', 1, 4, 1, 1, '2024-01-08 15:46:33'),
(19, 'hellllllO', 1, 9, 1, 1, '2024-01-08 16:12:41'),
(20, 'haha', 1, 13, 1, 1, '2024-01-08 21:40:46'),
(21, 'waaaaaaa', 1, 13, 1, 1, '2024-01-08 21:42:43'),
(22, 'waw', 1, 13, 1, 1, '2024-01-09 08:25:42'),
(23, 'nahhhhhhhhhhhhhhhhh', 1, 13, 1, 1, '2024-01-09 08:26:45'),
(24, 'Python is an easy to learn, powerful programming language. It has efficient high-level data structures and a simple but effective approach to object-oriented programming. Python’s elegant syntax and dynamic typing, together with its interpreted nature, ma', 1, 13, 1, 1, '2024-01-09 09:51:12'),
(25, 'hey', 1, 8, 1, 1, '2024-01-09 21:31:55'),
(26, 'hey', 1, 8, 1, 1, '2024-01-09 21:32:01'),
(27, 'heheheh\r\n\r\n\r\n\r\n', 1, 13, 1, 1, '2024-01-10 18:09:15'),
(28, 'tetsting\r\n', 44, 13, 13, 0, '2024-01-10 19:44:30'),
(29, 'wowow\r\n', 1, 13, 1, 1, '2024-01-10 21:08:12'),
(30, '', 1, 15, 1, 1, '2024-01-11 09:50:36'),
(31, 'waw', 1, 13, 1, 1, '2024-01-11 11:00:06'),
(32, 'lol thnks guyzz', 1, 1, 1, 0, '2024-01-11 14:19:36'),
(33, 'waaw', 3, 1, 4, 1, '2024-01-11 14:20:05'),
(34, 'waw\r\n', 1, 14, 1, 1, '2024-01-11 14:27:51'),
(35, 'waw\r\n', 45, 14, 14, 0, '2024-01-11 14:28:32'),
(36, 'lol', 14, 3, 3, 0, '2024-01-11 14:54:00'),
(37, 'hellllllllllllllllllllllll', 1, 3, 1, 1, '2024-01-11 14:59:36');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(40) NOT NULL,
  `user_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` int(20) NOT NULL,
  `message` varchar(255) NOT NULL,
  `message_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `username`, `email`, `contact`, `message`, `message_time`) VALUES
(1, 13, 'shna', 'shna@gmail.com', 0, 'hh', '2024-01-10 21:38:40'),
(2, 3, 'woh', 'woh@gmail.com', 0, 'sjsjk', '2024-01-11 15:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `threads_id` int(255) NOT NULL,
  `threads_title` varchar(255) NOT NULL,
  `threads_desc` text NOT NULL,
  `threads_cat_id` int(255) NOT NULL,
  `threads_user_id` int(255) NOT NULL,
  `threads_reg_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`threads_id`, `threads_title`, `threads_desc`, `threads_cat_id`, `threads_user_id`, `threads_reg_date`) VALUES
(1, 'pycharm installation problem', 'pycharm installation problem its shows pycharm isn\'t compatible ', 1, 1, '2023-12-03 20:50:42'),
(2, 'php frameworks', 'can any one tell whats best php framework to learn in 2003', 6, 1, '2023-12-03 20:52:23'),
(3, 'python vs code issue', 'my python isnt running in vs code for an unknwon reason ..', 1, 4, '2023-12-03 20:56:15'),
(4, 'javascript frameworks', 'can anyone tell me js best frameworks', 3, 4, '2023-12-03 21:00:09'),
(5, 'c++', 'best books to read for c++', 5, 1, '2023-12-04 09:12:42'),
(6, 'java', 'is java a multiple inheritance lang', 2, 5, '2023-12-04 09:18:08'),
(8, 'hey', '&lt;script&gt;alert(\"hey\");&lt;/script&gt;', 1, 4, '2023-12-04 13:47:33'),
(11, 'c++', 'not working', 5, 7, '2023-12-05 16:51:20'),
(12, 'php', 'php showing headers cant be modify..', 6, 1, '2023-12-05 16:51:53'),
(13, 'python', 'in terminnator python error - serever crash is showing', 1, 5, '2023-12-05 17:30:06'),
(14, 'qn test 1', 'test1', 3, 3, '2023-12-07 12:24:28'),
(15, 'hey', 'hey@', 1, 3, '2023-12-09 17:16:38'),
(16, 'hey', 'just testing it guyzz', 2, 8, '2023-12-10 12:01:59'),
(18, 'py', 'how long can it take to learn python lang?', 1, 10, '2023-12-10 14:12:41'),
(19, 'pyth', 'can i learn python in just 3 months?', 1, 13, '2023-12-10 14:18:17'),
(20, 'python error', 'why my python terminal aint takin any input?\r\n', 1, 12, '2023-12-10 14:24:59'),
(21, 'IDE for python', 'best IDE for python ,dat can help beginner like me', 1, 14, '2023-12-10 14:34:03'),
(22, 'python runtime error', 'terminal showing run time error again n again without showing wats the actual error any one got any idea\r\n', 1, 15, '2023-12-11 11:48:52'),
(23, 'python ', 'can anyone recommend how to install python step by step..', 1, 9, '2023-12-11 11:57:15'),
(24, 'python runtime issue', 'theres a runtime problem occuring while debugging\r\n', 1, 13, '2023-12-14 09:18:16'),
(25, 'Qn testing', 'testing', 2, 48, '2023-12-14 09:23:09'),
(26, 'testing 2', 'heyyyyy', 2, 10, '2023-12-14 09:23:51'),
(27, 'testing 3', 'testing', 2, 15, '2023-12-14 09:25:10'),
(28, 'testing 4', 'holaa', 2, 10, '2023-12-14 09:27:23'),
(29, 'vs code ', 'vs shortcut to run any python code ?\r\n', 1, 10, '2023-12-14 15:23:49'),
(30, 'testing', 'testing', 1, 15, '2023-12-22 08:09:15'),
(31, 'nimi', 'testing', 1, 10, '2023-12-22 08:09:58'),
(34, '', '', 1, 13, '2024-01-04 23:07:12'),
(35, '', '', 1, 13, '2024-01-07 09:48:57'),
(36, 'hey', 'hello', 2, 13, '2024-01-07 12:04:24'),
(37, 'hey', 'hey', 1, 7, '2024-01-07 12:24:38'),
(38, 'hey', '', 1, 13, '2024-01-07 18:15:29'),
(39, 'hey', 'hey', 1, 74, '2024-01-07 20:30:30'),
(40, 'he', '', 2, 74, '2024-01-07 21:03:13'),
(41, 'hey', 'hello', 1, 8, '2024-01-09 21:32:42'),
(42, 'hey', 'helllllllllllllllo', 1, 8, '2024-01-09 21:32:51'),
(43, 'hey', 'hel', 1, 13, '2024-01-10 18:08:38'),
(44, 'testing', 'tttt', 1, 13, '2024-01-10 19:44:19'),
(45, 'Question testing', 'tttt', 1, 14, '2024-01-11 14:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `user_email`, `password`, `user_image`, `timestamp`) VALUES
(1, 'hy', 'hy@gmail.com', '$2y$10$LB6Gjlqg8ViCxwUqQYjUc.AoMANFVJ9102RJQXouaXUtjzOIorjV.', 'haikyu_wallpaper.jpg', '2023-12-10 13:58:07'),
(2, 'me', 'me@gmail.com', '$2y$10$45Gd6x/C77bg2n9Qbfumq.6Bt7mCeBFRokFUAWKw6glrpGBlxTHZK', 'haikyu_wallpaper.jpg', '2023-12-10 13:59:16'),
(3, 'woh', 'woh@gmail.com', '$2y$10$VCx6h6y8MKK.vznz1bxMz.VBEjc7iF35uyMKRI0qVarFSAUP1.KqO', 'volleyball_spiking.jpeg', '2023-12-10 13:59:38'),
(4, 'nefes', 'nefes@gmail.com', '$2y$10$m6ItVD9atJbwjMCuPPznQesLTbxPgHVZ36t4Ob.4nUWVb54nTEaJa', 'apsara-pencils-587078_720x.jpg', '2023-12-10 14:00:25'),
(5, 'Herman', 'Herman@gmail.com', '$2y$10$DHuy0NsdIabYRIuX8Ubk9O5pJ2KuVtSWE.vvtDKTn0ReovdQcAcQa', '2nd-profile.jpg', '2023-12-10 14:01:42'),
(6, 'Tom', 'Tom@gmail.com', '$2y$10$qo6qA0lJAh27PAczrCpdYuh4JR2gjYi9oQGjRBGEABw/pE1ujz3yG', '3rd-profile.jpg', '2023-12-10 14:02:07'),
(7, 'aman', 'aman@gmail.com', '$2y$10$29GdINYtXb.3BSyM8zH7I.5mplReU2uAY5UIOn0XU2wSU.CpbvoQu', '1st-profile.jpg', '2023-12-10 14:02:35'),
(8, 'ensh', 'ensh@gmail.com', '$2y$10$QQdiV.rVmX8ODeTamwaX/ONAQEpDEORVJP.UDAur5KfRu5ItCues2', 'doms neon r-t pencil (set of 10-multicolor-90$).jpg', '2023-12-10 14:03:09'),
(9, 'vipin', 'vipin@gmail.com', '$2y$10$GnltM4QL4RZRGbTFgvZ6xullkSt3jIgcibuI2K9mntuQ3LVTXS/3C', 'apsara-pencils-587078_720x.jpg', '2023-12-10 14:03:43'),
(10, 'simmy', 'simmy@gmail.com', '$2y$10$e0Tx8jLA85kHdhkp74Elc.x2z//6Wwi6i3LopXZRATqmdogMDpRN.', 'doms neon r-t pencil (set of 10-multicolor-90$).jpg', '2023-12-10 14:04:41'),
(11, 'Nilesh', 'nilesh@gmail.com', '$2y$10$40OwKPmApua/4ux/rj7V..LRebfqdfay0RadBWKRD/u3NpS9PoFXK', 'sky-roller-pen-black-inkgel-penskacoscoobookaco-sky-black-704974_720x.jpg', '2023-12-10 14:14:36'),
(12, 'angel', 'angel@gmail.com', '$2y$10$cbOJOowWNKBB87tzax0aUe8D5JGgT20CI9XlqWDZwP.i.cYTPT122', 'Aerotix-Report-File-With-Pocket-A4-pack of 5-150$.jpg', '2023-12-10 14:15:34'),
(13, 'shna', 'shna@gmail.com', '$2y$10$RxhEZdX5Ot1dtOw3RHv9ouTm4L3XqC8G26hAot/EIjh9hl4FFR1EO', 'doms wildlife animals exercise book 300 pages- 225$.jpg', '2023-12-10 14:16:59'),
(14, 'devil', 'devil@gmail.com', '$2y$10$b98ca/lJn9.8oaq2R4LLdeb27v9ZO6MYdibv6FE8lJoALuHP/dbdG', 'classmate asteroid geometry box -250$.jpg', '2023-12-10 14:32:50'),
(15, 'Ritiksha', 'Ritiksha@gmail.com', '$2y$10$0vgzRBzFCMi9zzCO.ZEAvuewuz976xrS0nDyIdhR9THxfD0gTkzh2', 'Basic file folder-letter size (fits A4 paper)-black-with 13 pockets.jpg', '2023-12-11 11:47:05'),
(48, 'sunil', 'sunil@gmail.com', '$2y$10$p9bFW9eaFpTH/OtRuSqSQeax5u29F/XidHj6p4q2YRT4PhrtG9Nxa', 'classmate geometry box-245.jpg', '2023-12-12 10:48:01'),
(51, 'ronny', 'ronyy@gmail.com', '$2y$10$rCdIbGz1JuBPkR1CTqo4oeDeG0lG42PqbiuAatUjf6yf.jsLQEPf.', '2nd-profile.jpg', '2023-12-20 13:54:50'),
(53, 'yashasvi', 'yash@gmail.com', '$2y$10$69x0h4VNBRdw2rv69CqX2efMuPxlsncCcU0fxdppFdZ5w2rJYCpxu', 'sky-roller-pen-black-inkgel-penskacoscoobookaco-sky-black-704974_720x.jpg', '2023-12-23 21:06:55'),
(54, '', '', '$2y$10$O/5erkMj8BGOIF/YZIdZruaebk1AC6gGzqxV4imdXgYcI5cPFyBKW', '', '2024-01-03 18:06:46'),
(55, 'hey', 'hey@gmail.com', '$2y$10$rAowi3OvwirNQEzKpzKZTOaOCQPSECjpi9md7yqtOhncOW7fvHtKu', '', '2024-01-03 20:02:02'),
(56, 'hey', 'wawaw@gmail.com', '$2y$10$N6uIDB5ZrJwiFXe7JPZEtufXHYIPoizc02ctCHjjl9/Z/5vcRF60G', '', '2024-01-04 09:19:20'),
(57, 'dummy', 'dummy@gmail.com', '$2y$10$yNGxsy50dav.VIPfqBhyNu2k1WKrYBPakaWBib6brL9BbKw2CBPq6', '2nd-profile.jpg', '2024-01-05 13:48:45'),
(58, 'hey', 'heyy@gmail.com', '$2y$10$7h9pSkWfxYkKs2Uv0xyR.O3eJyZv5CQ.5mD5sL4UL/sASk6s9dMBS', '', '2024-01-07 10:34:50'),
(59, 'helo', 'heelo@gmail.com', '$2y$10$.PxMEH4K5dTddrElmL0JQuI3IV.eVQ4wfkm/TcBbJSP9hsB3m43S.', '', '2024-01-07 10:37:45'),
(60, 'hell', 'hell@gmail.com', '$2y$10$rIgNCieD7kPvja2VCtRaAOqbrK2JyXQnaT9HaS0OTZDjzUtt9zOhm', '', '2024-01-07 10:39:58'),
(61, 'wo', 'wohh@gmail.com', '$2y$10$hso1/WUP3zw9ZOEfJ/dI6.rauVqpXA0GyGMP/52K.zzJgFwTTyqYC', '', '2024-01-07 10:41:38'),
(62, 'hey', 'heyyyyyy@gmail.com', '$2y$10$dBJ4Mcuw4P/HGpihTwhdXO79SYsziZ8.96DaKN2sSWeeizk8aSHWe', '', '2024-01-07 10:42:28'),
(63, 'hey', 'heyyy@gmail.com', '$2y$10$j2nqOqF58EJhB7XBppujt.cr6RQ/RZwJQv02bMNjUyWoW/gyFG3SO', '', '2024-01-07 10:44:30'),
(64, 'woh', 'wohhhh@gmail.com', '$2y$10$7L7u6bGOTwcKy3.6XhXuUutjp.lx8VR52WHzGzgk2mEfngomj8cBO', '', '2024-01-07 10:45:17'),
(65, 'hel', 'hellooo@gmail.com', '$2y$10$w5a0DcnBxRSlatUPoO4Js.y4B0l6sMgtlg7TtvV4z5qru2c.CuVie', '', '2024-01-07 10:46:09'),
(66, 'hey', 'heyyyyyyyyyyy@gmail.com', '$2y$10$u4s8pl.WFv6JxaapYDfGjOq8.zHD9B5UDNS6mQkI7qRIK0D3jO5u2', '', '2024-01-07 10:49:19'),
(67, 'hey', 'heyyyy@gmail.com', '$2y$10$bmaVt7nm36gmspgRYipi2uGluDvPCVd.m/QcRRmKUqkqwAfsEfHFa', '', '2024-01-07 10:51:57'),
(68, 'shna', 'shnaa@gmail.com', '$2y$10$IZUAcWewnLrA.poSOQQnU.xrmB/g/3gopZvhoQ7qy3B.yByGx/tc.', '', '2024-01-07 10:53:25'),
(69, 'hey', 'helloooooo@gmail.com', '$2y$10$Rq8SKYXDys5nROpq5uIeCuNqLf4tNkjfR30OnEUDY7u3l24uXqASu', '', '2024-01-07 11:00:35'),
(70, 'hellll', 'helllll@gmail.com', '$2y$10$DRAovhMYCVK/kMUi8f/wEuuU4ejo7T/7UaHi/07sqx7pez7eY.HSC', '', '2024-01-07 11:02:31'),
(71, 'dhruv', 'dhruv@gmail.com', '$2y$10$arem6dYaPrprryyN5EaNXuu8QvkOgMB71aHpu1FsrJMFT.NSm6drO', '', '2024-01-07 11:05:11'),
(72, 'h', 'wooooooooooooooooooo@gmail.com', '$2y$10$7tc9QuzluAYswg0Fuot13epudUUljnQjXJtlKSpPqpeQbDEK8ff1C', '', '2024-01-07 11:20:22'),
(73, 'helll', 'helllllllll@gmail.com', '$2y$10$k7s1e0YyIkYc4X8bfnrqxeMmafmwXhfqEpSI9.p1p8Ia52ZLkWhmu', '', '2024-01-07 18:22:15'),
(74, 'kelly', 'kelly@gmail.com', '$2y$10$bnrLTEbpLD6TH0C5rdti5Ou4WVvh19jly4ds8P7ytODr2BZWsWXai', '', '2024-01-07 20:29:37'),
(75, 'hey', 'hui@gmail.com', '$2y$10$Sewd7jTLJJ1U/k/PlDotsejdhV/CLkn2s65q7eTt2DYa09X1.Z7wC', '', '2024-01-08 08:09:37'),
(76, 'shna', 'shana@gmail.com', '$2y$10$v7sZjR0QpMZkR/AGfM0SP.EgQW9db94dmlD3U2Il3fXuc9ShcQf0G', '', '2024-01-10 09:13:54'),
(77, '1', 'he@g.com', '$2y$10$VkGnEL9ZOykTx9xvI1lge.2Vs6juy1MENHl8NlD7DZGo9BukRhbXe', '', '2024-01-10 21:30:05'),
(78, 'hey', 'helll@g.com', '$2y$10$9MLm5MF9ixUIqXuxMXNMlui88G5hCHuNIIJEHGlClUd00aqNQSF0i', '', '2024-01-10 21:31:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`threads_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `threads_title` (`threads_title`,`threads_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `c_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `threads_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
