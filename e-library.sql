-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2025 at 09:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `author` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `cover` varchar(250) NOT NULL,
  `pdf_link` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `hit_counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `title`, `author`, `publisher`, `genre_id`, `isbn`, `cover`, `pdf_link`, `created_at`, `updated_at`, `hit_counter`) VALUES
(1, 'Laut Bercerita', 'Leila S. Chudori', 'Kepustakaan Populer Gramedia', 1, '9786024246945', 'laut-bercerita-leila-s-chudori.jpg', 'none', '2025-06-23 02:09:28', NULL, 0),
(2, 'Atomic Habits', 'James Clear', 'Kepustakaan Populer Gramedia', 1, '9780593189641', 'atomic-habits-james-clear.jpg', 'none', '2025-06-23 06:06:19', NULL, 0),
(3, 'The Psychology of Money', 'Morgan Housel', 'Kepustakaan Populer Gramedia', 1, '9786238371044', 'the-psychology-of-money-morgan-housel.jpg', 'none', '2025-06-23 06:16:01', NULL, 0),
(4, 'Sisi Tergelap Surga', 'Brian Khrisna', 'Kepustakaan Populer Gramedia', 1, '9786020674384', 'sisi-tergelap-surga-brian-khrisna.jpg', 'none', '2025-06-23 06:26:34', NULL, 0),
(5, 'Teka Teki Rumah Aneh', 'Uketsu', 'Kepustakaan Populer Gramedia', 1, '9786020669960', 'teka-teki-rumah-aneh-uketsu.jpg', 'none', '2025-06-23 07:12:27', NULL, 0),
(6, 'Ruri Dragon 01', 'Masaoki Shindo', 'Kepustakaan Populer Gramedia', 1, '9786230316791', 'ruri-dragon-01-masaoki-shindo.jpg', 'none', '2025-06-23 07:16:07', NULL, 0),
(7, 'BEYOND AVERAGE', 'Kun Wahyu Wardana', 'Kepustakaan Populer Gramedia', 1, '9786020681580', 'beyond-average-kun-wahyu-wardana.jpg', 'none', '2025-06-23 07:25:32', NULL, 0),
(8, 'Dompet Ayah Sepatu Ibu', 'J.S Khairen', 'Kepustakaan Populer Gramedia', 1, '9786020530222', 'dompet-ayah-sepatu-ibu-j-s-khairen.jpg', 'none', '2025-06-23 07:28:30', NULL, 0),
(9, 'Naruto Bind Up Edition 17', 'MASASHI KISHIMOTO', 'Kepustakaan Populer Gramedia', 1, '9786230069765', 'naruto-bind-up-edition-17-masashi-kishimoto.jpg', 'none', '2025-06-23 07:33:06', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Fantasi', NULL, '2025-06-24 14:24:06', '2025-06-24 14:24:06'),
(2, 'Distopia', NULL, '2025-06-24 14:24:44', '2025-06-24 14:24:44'),
(3, 'Horor', NULL, '2025-06-24 14:25:07', '2025-06-24 14:25:07'),
(4, 'Misteri', NULL, '2025-06-24 14:25:30', '2025-06-24 14:25:30'),
(5, 'Romantis', NULL, '2025-06-24 14:28:20', '2025-06-24 14:28:20'),
(6, 'Fiksi Sejarah', NULL, '2025-06-24 14:29:36', '2025-06-24 14:29:36'),
(7, 'Fiksi Ilmiah', NULL, '2025-06-24 14:30:17', '2025-06-24 14:30:17'),
(8, 'Paranormal', NULL, '2025-06-24 14:31:05', '2025-06-24 14:31:05'),
(9, 'Petualangan', NULL, '2025-06-24 14:31:56', '2025-06-24 14:31:56'),
(10, 'Thriller', NULL, '2025-06-24 14:32:45', '2025-06-24 14:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `name`, `email`, `password`, `img`, `role`, `created_at`, `updated_at`) VALUES
(5, 'admin', 'Raditya Abib', 'radityaabib511@gmail.com', '$2y$10$Fibb8YJmqGMEbQqXX0qhKOsJ6kmEBCPP5FUjcA.RSKu8wxpKslXRm', 'avatar1.jpg', 1, '2025-06-23 02:02:54', NULL),
(7, 'rido', 'ridoanjai', 'anjairidoGanteng@gmail.com', '$2y$10$Up5Mt06d4rxoZGF40c1F9uJ/ea7xv7QOty7nOwOm9RKttNjxN6GtC', NULL, 0, '2025-06-25 06:14:33', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
