-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2024 at 11:34 PM
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
-- Database: `logreg`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `created_on`, `updated_on`, `deleted_on`) VALUES
(1, 'uche emmanuel EDITED', 'ecuche@efcc.gov.ng', '$2y$10$3dyjtogXBZmyl4IUQ2K1tO42kxVWLiO6zAFlZK9XlRF2IkSYPFFhu', '2024-12-10 14:48:04', '2024-12-20 20:06:28', NULL),
(14, 'nnamdi felix', 'nfelix@efcc.gov.ng', '$2y$10$wUbNFCS8EXZQ6R9mYITyGe8CCREh.L31RVzG4nqhcVcYQoTJ0eZ/2', '2024-12-20 11:06:28', NULL, NULL),
(15, 'uche emmanuel', 'emmanuel@gmail.com', '$2y$10$qrBt3mOs.MJGkWKKIyNWQup7DRFUY2dPJLX7KR9T0IM4VWGnv.j12', '2024-12-20 15:25:28', NULL, NULL),
(16, 'emeka felix', 'femeka@gmail.com', '$2y$10$9WStbxmjx4ZcWR0D1iNxvuHXQEyisLxt93TIV0oVWgtmzNcugHP/y', '2024-12-20 16:02:46', NULL, NULL),
(17, 'mac donald', 'macd@gmail.com', '$2y$10$3DpDKnDtCV4EdXzFqW7JIOr.yfPDBPKUbh2c2SSfcgM6AOCyoVJ5W', '2024-12-20 16:16:05', NULL, NULL),
(18, 'sam moses', 'msam@gmail.com', '$2y$10$MlS55xmkxIa44gvcQSWJ2OF5hb3mrbSTjG0SMMbBi1vyZ1MA2u5jO', '2024-12-20 16:23:09', '2024-12-20 20:09:45', NULL),
(19, 'thaddeous ogege', 'togege@efcc.gov.ng', '$2y$10$la3s0HMag/OXTVQ9m3jz2.422a6cHTWSjqwsSaDdPu0hTGpuBfUKK', '2024-12-20 16:33:47', NULL, NULL),
(20, 'Princewill Egbe', 'favoured.eagle@gmail.com', '$2y$10$3mj5oleFz5pfeQE88EInHe7wlxz7c.UbJvSMLfNhLiEp9KF6GYa1C', '2024-12-21 09:54:40', NULL, NULL),
(21, 'nfelix@gmail.com', 'nfelix@gmail.com', '$2y$10$URRjoKjBUIM3L0oXTmWWZe8PpxY1g8hFKG465lq/kc8VXyoxaW0cu', '2024-12-21 13:14:54', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
