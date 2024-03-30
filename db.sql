-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2024 at 06:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment2`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_url` text DEFAULT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `image_url`, `content`) VALUES
(1, 'Title One', 'https://previews.123rf.com/images/flybird163/flybird1631504/flybird163150400197/41044667-topic-word-write-on-paper.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Donec sit amet felis eu elit consectetur luctus. Integer non fermentum velit, at fermentum lacus. Vestibulum id nisi et eros malesuada euismod.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Donec sit amet felis eu elit consectetur luctus. Integer non fermentum velit, at fermentum lacus. Vestibulum id nisi et eros malesuada euismod.'),
(2, 'Title Two', 'data:image/jpeg;base64,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', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum'),
(3, 'Title Three', 'https://img.freepik.com/free-vector/online-article-concept-illustration_114360-5193.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `header_background_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `header_background_image`) VALUES
(1, 'https://t4.ftcdn.net/jpg/02/71/29/75/360_F_271297554_0DAlzyFb8jzYg0lfmUOzyhtMer0orz4h.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`, `submission_date`) VALUES
(1, 'Yusuf', 'yusuf@gmail.com', 'This is a feedback', '2024-02-13 02:40:15'),
(2, 'test', 'test@gmail.com', 'this is a test message', '2024-02-13 03:56:38'),
(3, 'sawdfeghjklo;p', 'asdfgh@gfhjbk.com', 'fchvgjknm', '2024-03-22 16:11:05');

-- --------------------------------------------------------

--
-- Table structure for table `our_story`
--

CREATE TABLE `our_story` (
  `id` int(11) NOT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `our_story`
--

INSERT INTO `our_story` (`id`, `content`) VALUES
(1, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aspernatur nisi qui ipsa nesciunt, non ipsam impedit magni possimus earum ab, praesentium molestias. Tenetur iusto a culpa corporis explicabo quia consequatur blanditiis ducimus. Excepturi, optio debitis minima nam odit veritatis numquam a, possimus recusandae cumque magnam modi');

-- --------------------------------------------------------

--
-- Table structure for table `our_team`
--

CREATE TABLE `our_team` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `our_team`
--

INSERT INTO `our_team` (`id`, `name`, `position`) VALUES
(1, 'Yusuf', 'Founder'),
(2, 'John', 'Content Writer'),
(3, 'Cindy', 'Content Moderator');

-- --------------------------------------------------------

--
-- Table structure for table `tutorials`
--

CREATE TABLE `tutorials` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `video_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutorials`
--

INSERT INTO `tutorials` (`id`, `title`, `description`, `video_url`) VALUES
(1, 'How To Build A Website in 2026', 'Description', '<iframe width=\"1007\" height=\"566\" src=\"https://www.youtube.com/embed/acBJsjCqgtM\" title=\"How To Build A Website in 2024\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>'),
(2, 'How to Make a Website in 10 mins - Simple & Easy', 'Description 2', '<iframe width=\"1007\" height=\"566\" src=\"https://www.youtube.com/embed/YWA-xbsJrVg\" title=\"How to Make a Website in 10 mins - Simple &amp; Easy\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>'),
(4, 'This is a demo title', 'This is a demo description', '<iframe width=\"1007\" height=\"566\" src=\"https://www.youtube.com/embed/HSq5wntbkck\" title=\"How to Make an App [in 2023]\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_story`
--
ALTER TABLE `our_story`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_team`
--
ALTER TABLE `our_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutorials`
--
ALTER TABLE `tutorials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `our_story`
--
ALTER TABLE `our_story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `our_team`
--
ALTER TABLE `our_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tutorials`
--
ALTER TABLE `tutorials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
