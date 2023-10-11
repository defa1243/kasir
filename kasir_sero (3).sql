-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 11, 2023 at 10:22 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir_sero`
--

-- --------------------------------------------------------

--
-- Table structure for table `absent`
--

CREATE TABLE `absent` (
  `id_absent` bigint NOT NULL,
  `employee_id` bigint NOT NULL,
  `date` int NOT NULL,
  `month` int NOT NULL,
  `year` int NOT NULL,
  `time` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `info` enum('come in','come out') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` bigint NOT NULL,
  `category_type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category_type`) VALUES
(1, 'Food'),
(2, 'Coffee'),
(3, 'Non Coffee'),
(4, 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `daily_report`
--

CREATE TABLE `daily_report` (
  `id_daily_report` bigint NOT NULL,
  `balance` bigint NOT NULL DEFAULT '0',
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `daily_report`
--

INSERT INTO `daily_report` (`id_daily_report`, `balance`, `date`) VALUES
(1, 130000, '2023-10-06'),
(2, 150000, '2023-10-09'),
(3, 0, '2023-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id_employee` bigint NOT NULL,
  `employee_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_number` bigint NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_report`
--

CREATE TABLE `expense_report` (
  `id_expense_report` bigint NOT NULL,
  `amount` bigint NOT NULL,
  `information` varchar(255) NOT NULL,
  `datetime` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `expense_report`
--

INSERT INTO `expense_report` (`id_expense_report`, `amount`, `information`, `datetime`) VALUES
(5, 60000, 'biji kopi', '2023-10-11 14:38:21');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` bigint NOT NULL,
  `category_id` bigint NOT NULL,
  `menu_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `information` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `category_id`, `menu_name`, `price`, `information`) VALUES
(1, 2, 'Americano', '14000', ''),
(2, 1, 'frenchhh', '10000', ''),
(3, 4, 'asdas', '20000', 'ad');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id_transaction` bigint NOT NULL,
  `transaction_code` varchar(20) NOT NULL,
  `datetime` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `cash` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `total` varchar(30) NOT NULL,
  `change` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id_transaction`, `transaction_code`, `datetime`, `cash`, `total`, `change`) VALUES
(4, 'SRT001', '2023-10-06 21:02:03', '35000', '34000', 1000),
(5, 'SRT002', '2023-10-09 10:43:35', '15000', '14000', 1000),
(6, 'SRT003', '2023-10-10 20:07:30', '16000', '14000', 2000),
(7, 'SRT004', '2023-10-10 21:24:27', NULL, '34000', NULL),
(8, 'SRT005', '2023-10-10 21:43:38', '100000', '88000', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `id_transaction_detail` bigint NOT NULL,
  `menu_id` bigint NOT NULL,
  `ice` enum('Less Ice','Normal Ice','Extra Ice','No Ice','') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `sugar` enum('Less Sugar','Normal Sugar','Extra Sugar','No Sugar','') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `variation_1` bigint DEFAULT NULL,
  `variation_2` bigint DEFAULT NULL,
  `variation_3` bigint DEFAULT NULL,
  `variation_4` bigint DEFAULT NULL,
  `variation_5` bigint DEFAULT NULL,
  `variation_6` bigint DEFAULT NULL,
  `variation_7` bigint DEFAULT NULL,
  `variation_8` bigint DEFAULT NULL,
  `variation_9` bigint DEFAULT NULL,
  `variation_10` bigint DEFAULT NULL,
  `price_detail` bigint NOT NULL,
  `qty` bigint NOT NULL,
  `transaction_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaction_detail`
--

INSERT INTO `transaction_detail` (`id_transaction_detail`, `menu_id`, `ice`, `sugar`, `variation_1`, `variation_2`, `variation_3`, `variation_4`, `variation_5`, `variation_6`, `variation_7`, `variation_8`, `variation_9`, `variation_10`, `price_detail`, `qty`, `transaction_id`) VALUES
(6, 1, 'Normal Ice', 'Normal Sugar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14000, 1, 4),
(7, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20000, 2, 4),
(8, 1, 'Normal Ice', 'Normal Sugar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14000, 1, 5),
(9, 1, 'Normal Ice', 'Normal Sugar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14000, 1, 6),
(10, 1, 'Normal Ice', 'Normal Sugar', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 34000, 2, 7),
(11, 1, 'Normal Ice', 'Normal Sugar', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 88000, 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `variation`
--

CREATE TABLE `variation` (
  `id_variation` bigint NOT NULL,
  `variation_type` varchar(50) NOT NULL,
  `variation_price` bigint NOT NULL,
  `category_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `variation`
--

INSERT INTO `variation` (`id_variation`, `variation_type`, `variation_price`, `category_id`) VALUES
(1, 'asd', 3000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id_wallet` bigint NOT NULL,
  `balance` bigint NOT NULL DEFAULT '0',
  `date` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id_wallet`, `balance`, `date`, `time`) VALUES
(1, 220000, '2023-10-11', '14:38:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absent`
--
ALTER TABLE `absent`
  ADD PRIMARY KEY (`id_absent`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `daily_report`
--
ALTER TABLE `daily_report`
  ADD PRIMARY KEY (`id_daily_report`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_employee`);

--
-- Indexes for table `expense_report`
--
ALTER TABLE `expense_report`
  ADD PRIMARY KEY (`id_expense_report`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indexes for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`id_transaction_detail`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `transaction_detail_ibfk_10` (`variation_8`),
  ADD KEY `transaction_detail_ibfk_11` (`variation_9`),
  ADD KEY `transaction_detail_ibfk_12` (`variation_10`),
  ADD KEY `transaction_detail_ibfk_3` (`variation_1`),
  ADD KEY `transaction_detail_ibfk_4` (`variation_2`),
  ADD KEY `transaction_detail_ibfk_5` (`variation_3`),
  ADD KEY `transaction_detail_ibfk_6` (`variation_4`),
  ADD KEY `transaction_detail_ibfk_7` (`variation_5`),
  ADD KEY `transaction_detail_ibfk_8` (`variation_6`),
  ADD KEY `transaction_detail_ibfk_9` (`variation_7`);

--
-- Indexes for table `variation`
--
ALTER TABLE `variation`
  ADD PRIMARY KEY (`id_variation`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id_wallet`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absent`
--
ALTER TABLE `absent`
  MODIFY `id_absent` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `daily_report`
--
ALTER TABLE `daily_report`
  MODIFY `id_daily_report` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id_employee` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_report`
--
ALTER TABLE `expense_report`
  MODIFY `id_expense_report` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `id_transaction_detail` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `variation`
--
ALTER TABLE `variation`
  MODIFY `id_variation` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id_wallet` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absent`
--
ALTER TABLE `absent`
  ADD CONSTRAINT `absent_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id_employee`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD CONSTRAINT `transaction_detail_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_detail_ibfk_10` FOREIGN KEY (`variation_8`) REFERENCES `variation` (`id_variation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_detail_ibfk_11` FOREIGN KEY (`variation_9`) REFERENCES `variation` (`id_variation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_detail_ibfk_12` FOREIGN KEY (`variation_10`) REFERENCES `variation` (`id_variation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_detail_ibfk_2` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id_transaction`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_detail_ibfk_3` FOREIGN KEY (`variation_1`) REFERENCES `variation` (`id_variation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_detail_ibfk_4` FOREIGN KEY (`variation_2`) REFERENCES `variation` (`id_variation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_detail_ibfk_5` FOREIGN KEY (`variation_3`) REFERENCES `variation` (`id_variation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_detail_ibfk_6` FOREIGN KEY (`variation_4`) REFERENCES `variation` (`id_variation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_detail_ibfk_7` FOREIGN KEY (`variation_5`) REFERENCES `variation` (`id_variation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_detail_ibfk_8` FOREIGN KEY (`variation_6`) REFERENCES `variation` (`id_variation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_detail_ibfk_9` FOREIGN KEY (`variation_7`) REFERENCES `variation` (`id_variation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `variation`
--
ALTER TABLE `variation`
  ADD CONSTRAINT `variation_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;