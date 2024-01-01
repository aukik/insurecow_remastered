-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2024 at 07:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insurecow`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal_informations`
--

CREATE TABLE `animal_informations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `health_status` enum('Healthy','Sick','Injured') NOT NULL DEFAULT 'Healthy',
  `medical_history` text DEFAULT NULL,
  `last_vaccination_date` date DEFAULT NULL,
  `is_pregnant` tinyint(1) NOT NULL DEFAULT 0,
  `cattle_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animal_informations`
--

INSERT INTO `animal_informations` (`id`, `health_status`, `medical_history`, `last_vaccination_date`, `is_pregnant`, `cattle_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Sick', 'images/fl1eKHqJQW9fYQF8fByq79NEgTdXNEKDRbgh12Qy.png', '2023-12-19', 0, '6', '57', '2023-12-17 09:48:48', '2023-12-17 09:48:48'),
(5, 'Sick', 'images/KE429mg8xvWI0gUupcOfHQwowQHeWNPZIPswOWAs.jpg', '2022-12-10', 1, '6', '57', '2023-12-17 10:12:32', '2023-12-17 10:12:32'),
(6, 'Injured', 'images/NjFivVkbp1azXqBqtbaEVvFsFKdJiyKBbbpOMPHw.jpg', '2024-01-24', 0, '6', '57', '2023-12-17 10:57:03', '2023-12-17 10:57:03'),
(7, 'Injured', 'images/xKwvJDemqJTOJu87noP3ymfAmfZrNbhhNpw7edLd.png', '2023-12-27', 1, '6', '57', '2023-12-18 06:29:33', '2023-12-18 06:29:33');

-- --------------------------------------------------------

--
-- Table structure for table `asset_management`
--

CREATE TABLE `asset_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expense_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `user_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asset_management`
--

INSERT INTO `asset_management` (`id`, `expense_date`, `description`, `item_name`, `amount`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2023-12-19', 'Firm Update', NULL, 50000.00, '103', '2023-12-19 12:20:45', '2023-12-19 12:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `budgeting_and_forecastings`
--

CREATE TABLE `budgeting_and_forecastings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `budget_name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_income` decimal(10,2) NOT NULL,
  `total_expenses` decimal(10,2) NOT NULL,
  `net_profit` decimal(10,2) NOT NULL,
  `cattle_id` text NOT NULL,
  `user_id` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `budgeting_and_forecastings`
--

INSERT INTO `budgeting_and_forecastings` (`id`, `budget_name`, `start_date`, `end_date`, `total_income`, `total_expenses`, `net_profit`, `cattle_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'fff', '2023-12-13', '2023-12-14', 258.00, 2500.00, -2242.00, '6', '57', '2023-12-12 06:53:52', '2023-12-12 06:53:52'),
(2, 'fff', '2023-12-21', '2023-12-15', 0.25, 0.04, 0.21, '6', '57', '2023-12-18 06:39:41', '2023-12-18 06:39:41'),
(3, 'Budget Name', '2023-12-14', '2023-12-14', 25.00, 655.00, 5335.00, '6', '57', '2023-12-18 06:58:09', '2023-12-18 06:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `cattle_registrations`
--

CREATE TABLE `cattle_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `animal_type` varchar(255) NOT NULL,
  `cattle_name` varchar(255) NOT NULL,
  `cattle_breed` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `cattle_color` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `cattle_type` varchar(255) DEFAULT NULL,
  `muzzle_of_cow` varchar(255) NOT NULL,
  `left_side` varchar(255) NOT NULL,
  `right_side` varchar(255) NOT NULL,
  `special_marks` varchar(255) NOT NULL,
  `cow_with_owner` varchar(255) DEFAULT NULL,
  `farm` varchar(255) NOT NULL,
  `sum_insured` varchar(255) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `insured_by` varchar(255) NOT NULL DEFAULT '0',
  `insurance_status` varchar(255) NOT NULL DEFAULT '0',
  `insurance_date` date DEFAULT NULL,
  `insurance_expire_date` varchar(255) DEFAULT NULL,
  `is_claimed` varchar(255) NOT NULL DEFAULT '0',
  `user_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cattle_registrations`
--

INSERT INTO `cattle_registrations` (`id`, `animal_type`, `cattle_name`, `cattle_breed`, `age`, `cattle_color`, `weight`, `cattle_type`, `muzzle_of_cow`, `left_side`, `right_side`, `special_marks`, `cow_with_owner`, `farm`, `sum_insured`, `unique_id`, `insured_by`, `insurance_status`, `insurance_date`, `insurance_expire_date`, `is_claimed`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'cattle', 'Cattle 1', 'Calves/Heifers', '1.4', 'Dark Brown to black', '246', NULL, 'images/WDwHvYUtKUw0sPcOl5huPWTe0ANwSqZ0Jxmt5ObK.jpg', 'images/vu3r8flbbLmNEMFfFlkZKVB1cqO6IqudvBgWUfnA.jpg', 'images/Dr19j6zJBn76MHDjc7jclTuwGlKMlxXVeF7DMMos.jpg', 'images/4EjHIADYq4PCAGzuuBUBpFB1nyKpE3uyiZIcNu2T.jpg', 'images/zHGnxR05KHta1k9DDm7ZINticXGdNcA3W4WyUYzc.jpg', 'No Farm', '121230', '1', '0', '0', NULL, NULL, '0', '58', '2023-12-04 19:18:18', '2023-12-04 19:18:18'),
(2, 'cattle', 'Cattle 1', 'Calves/Heifers', '1.3', 'Black & White', '204', NULL, 'images/G7bP5oxXDjRTNlN8x0qIGPZV8DakyM8wyQylj2Ev.jpg', 'images/nH1zdLjORKyz7picjnQvJkkuOMvSy7xwqY0Hb1NV.jpg', 'images/BxYP293NHGg1piy7oRSIGARpC4Vfw2OAC9wRYeGT.jpg', 'images/FWYBXKKVZFA0kmK6Is3PwqwYZZ7bEka34CcAdJNH.jpg', 'images/Jyl5I1BjySxRzC4aY6MP3RlMjUJOlpRsYlZDAonR.jpg', 'No Farm', '102330', '2', '0', '0', NULL, NULL, '0', '59', '2023-12-04 19:20:52', '2023-12-04 19:20:52'),
(3, 'cattle', 'Cattle 1', 'Calves/Heifers', '1', 'White', '217', NULL, 'images/sdMIXBEN2ynEBSzxEet3wgWdUUVahVm5c0XBsq0U.jpg', 'images/CXai4c1VHlXZ9GurP6Zp1cz8Sg8wB9CnChLKEPwN.jpg', 'images/f5lQj4snXHAWMDYnSDyeru4g2yXGRRecOcoPrFEk.jpg', 'images/LnCaWgbkmBrTI2sxhLJMnvbOVBm1GGUVReKrcMok.jpg', 'images/hIPlC72vNprknnwhhwp0NaeZrsJaWxkv4hPW6udg.jpg', 'No Farm', '108945', '3', '0', '0', NULL, NULL, '0', '62', '2023-12-04 19:23:19', '2023-12-04 19:23:19'),
(4, 'cattle', 'Cattle 1', 'Calves/Heifers', '1.3', 'Black and White', '239', NULL, 'images/B8nzZGOF29acxasxFrQh8DymW9IdPl7dJ4OvfRJm.jpg', 'images/QN1XXnTuqeDgTnNeKjEWec3Tje8noyNMbPyKzwzS.jpg', 'images/hyHjK3j3pVtH7n8MvZ89mnkl1cX8ePLuDnnwko0u.jpg', 'images/bhkUfIuwrzxGQR6Wktkv57HQFayIlc9ti7uqvvgu.jpg', 'images/zVSZnLOinZHZCEKqmJsf738aMgeh0CbwNDLbad2J.jpg', 'No Farm', '119880', '4', '0', '0', NULL, NULL, '0', '61', '2023-12-04 19:26:22', '2023-12-04 19:26:22'),
(5, 'cattle', 'Cattle 1', 'Calves/Heifers', '1.5', 'Dark Brown', '250', NULL, 'images/fngwCpGHCR0gG4LzVKoycV8rEaX0qLbr4krGkwrM.jpg', 'images/XawwxglFKkBeB8AbVz6gTwu9u3R7DV636b8RARwy.jpg', 'images/VgONcMpH3tSwOrmDPyGnKaAtPlz9qeAkTUZqN4ex.jpg', 'images/luWwGccIpkPtLHoSE2DLLDhbctxqVoZDVWhGvlHw.jpg', 'images/1GxNfm2NdAI6w7DtsbPRbErq6FVNIBrr84QiLCme.jpg', 'No Farm', '125280', '5', '0', '0', NULL, NULL, '0', '60', '2023-12-04 19:30:34', '2023-12-04 19:30:34'),
(6, 'goat', 'q1', 'q1', '1', 'red', '300', NULL, 'Not Applicable for goat registration', 'images/P989ZIeyI2JPN5wQJEFvBcn7cGa0AcGAD3j7RQGP.jpg', 'images/6POstAlHYDk7pJqYXQFKKCE3px1prxaL9LcmL4hb.jpg', 'images/CeUyurOfxiSdToKvqHV0C3x1uFRS7zm65gmx9zA2.jpg', 'images/yoi3NiJNv8bIOizsN04jyGfbulpEhhn3CxsDcpVE.jpg', '1', '50000', '6', '0', '0', NULL, NULL, '0', '57', '2023-12-06 07:38:44', '2023-12-06 07:38:44'),
(7, 'cattle', 'Cattle 1', 'Stud Bulls', '1.4', 'Dark Brown', '178', NULL, 'images/JDybXr5SA3dopKbuzfZW19iX6br44aKPpKnhr4Bu.jpg', 'images/ksHwUYMTGd4rUUFKNbIoN6PyxmO9JQUj9bbYHXih.jpg', 'images/wdmddwJg5bQaALanHdDZWCWx82JwoP0gPUdVRZvb.jpg', 'images/tnUkU48lhqdNaTHIwf2DYfRejyL3SbPBm50kRRly.jpg', 'images/B7p7UsiKHwSiOuMrdJTPD3fSVCNRKomBhVZUFEYe.jpg', 'No Farm', '89100', '7', '0', '0', NULL, NULL, '0', '63', '2023-12-06 10:34:17', '2023-12-06 10:34:17'),
(8, 'cattle', 'Cattle 1', 'Stud Bulls', '1.3', 'Black', '191', NULL, 'images/Jyt4QdjIz6qfaysDsfTHncfkj184mlw8vMASPo8U.jpg', 'images/XRbmdH8cxCcdyblBrmiZbRuxmyytfiBDvclZBsQe.jpg', 'images/Qwi4yjlnRv7FwZsiu9WcJmxTO4aqFj2aSuQqqRT1.jpg', 'images/TtGcmJggWgwJ2sKhQ7YzMp7r3OsSpnbzUkZ9zxrF.jpg', 'images/2HdseYGbNHwEgqwJOoEN7yfd9zN10GLLO2o5wLza.jpg', 'No Farm', '95985', '8', '0', '0', NULL, NULL, '0', '64', '2023-12-06 10:42:16', '2023-12-06 10:42:16'),
(9, 'cattle', 'Cattle 1', 'Stud Bulls', '1.4', 'Black + very small white', '216', NULL, 'images/7R5TjyPmeQpJ7PVQnarChybpA7beGdRkTQWj8hsv.jpg', 'images/0IbZdUQG49zTT3Nidyg5GvVoYV0GAvWH1MyOzwjW.jpg', 'images/SbO0oPKBIDCgDC1SfK2atzv70PDzUxt1yvziRGXW.jpg', 'images/DKGxJ8rt67FAzAnnl5sZIl7p2wd60J2Cww8at8Su.jpg', 'images/a4laXXrt9OQeAdvFNgv2nzBDE7QOg0pmd3fwEXpn.jpg', 'No Farm', '108135', '9', '0', '0', NULL, NULL, '0', '65', '2023-12-06 10:45:53', '2023-12-06 10:45:53'),
(10, 'cattle', 'Cattle 1', 'Stud Bulls', '1.4', 'Black', '205', NULL, 'images/dnBGafaWCkHR2whaC1jLa6pRr60XauMpcO0A8zW5.jpg', 'images/jM3XAtBt4pb9FOHfDJLcm6vzJnTQS8YpgE1IgmPj.jpg', 'images/nRrAPvgAi7vXmikk8j5X8764hD5N00LyL1CQ4cxN.jpg', 'images/4mTtXqAt5dKWBrXM4F5MWp22VEM66ZPsBMwO4ke1.jpg', 'images/o2Il5HzbQsUmq62OB4zAAC4Dm3hIZtipSjgpkOtx.jpg', 'No Farm', '102735', '10', '0', '0', NULL, NULL, '0', '66', '2023-12-06 10:58:38', '2023-12-06 10:58:38'),
(11, 'cattle', 'Cattle 1', 'Stud Bulls', '1.5', 'Dark Brown', '194', NULL, 'images/NnhfPWKLM3LlBSQui2eMQInj3NeMnBpk7cWBJV46.jpg', 'images/GoBa3aQJYUlos6jjZq70TT3yPcSurf0CWsgEoS6q.jpg', 'images/biWgMgAvWX2Iexxu8WAgAQZl7bflzkcJE0fdwcc8.jpg', 'images/bqaNFPS1L35cFGBoevrxzxlY1kVYi9eqEI8rI6A1.jpg', 'images/DcF0j2l61pNWBHBZLjdqVUPiXCKExwuD42559Tko.jpg', 'No Farm', '97200', '11', '0', '0', NULL, NULL, '0', '67', '2023-12-06 11:29:35', '2023-12-06 11:29:35'),
(12, 'cattle', 'Cattle 1', 'Local or native cattle', '1.6', 'Black & White', '230', NULL, 'images/imGu7QmIjBScUQ4xOOjhsnwKXzfqVqeoHD8CMqI0.jpg', 'images/HJmdKhsHY72vtNMCUISa5plxTnTEboPJJSRT4J0d.jpg', 'images/GHrrL0vj3r8qUIRnN1utBXQ79ETcWLxhaj1u30kF.jpg', 'images/nWWCk9kWA0xyyfhKIgLkjgLEgHovBdsIJVr0EhCH.jpg', 'images/Wy3rLr8V6TcEAl8srJjTyMYGuc3OU5JjA5SYyMsI.jpg', 'No Farm', '114920', '12', '0', '0', NULL, NULL, '0', '68', '2023-12-10 09:33:32', '2023-12-10 09:33:32'),
(13, 'cattle', 'Cattle 1', 'Local or native cattle', '1.5', 'White and very small black', '216', NULL, 'images/FH58J8KsMzimlK4smIqqDdP8BdrbHVvkJRuAoD2z.jpg', 'images/DBh3Yu2vUtjl884h2VLJlQRrjMkIOMGC8RqaHvPn.jpg', 'images/1CNPYqPJiktJxzkCRmt0KWk0q7mi3Zrr3fksAJX4.jpg', 'images/DnS6ScZtpRFdsPMrynXqTZcg2Dg8m8WqWZO5fdll.jpg', 'images/vE7w6GISxTIpuJfHbfasdv1bOX3q9sF2qOG0YKOE.jpg', 'No Farm', '108290', '13', '0', '0', NULL, NULL, '0', '69', '2023-12-10 09:40:32', '2023-12-10 09:40:32'),
(14, 'cattle', 'Cattle 1', 'Holstein Friesian Local Cross', '1.3', 'Black & White', '208', NULL, 'images/E5OLhtq1vM8uQJVr1OgdUpqUJJQscggD2jaXWTOv.jpg', 'images/z5ogVjgwy6Sta05GcvdC83ujZbiIpfKv2MbFZDWI.jpg', 'images/Rz0x20ZoHwdu2w6QSkCiShgLyHklFhvrcsm82VqR.jpg', 'images/MEPbppKN9PIX05z6yrvexdTwxlaftkzUIchJWjMX.jpg', 'images/fXAvw4LLUKoGpc4tsGRC5dEAF8F7xXnex01uTIpG.jpg', 'No Farm', '104000', '14', '0', '0', NULL, NULL, '0', '70', '2023-12-10 09:49:00', '2023-12-10 09:49:00'),
(15, 'cattle', 'Cattle 1', 'Local or Native Cattle', '1.5', 'Brown', '172', NULL, 'images/QQPexkznx1AYgrG6FtveaehtNhaWK7pWVuxiZ79h.jpg', 'images/sN0LHQOjriijDSLIVmPgZz8euBNYT873PWPr0zuW.jpg', 'images/8d8WySxIygLBNK6LA3oQm7WtdpiaxXFR6SV0x4bu.jpg', 'images/A3PFbgQAZT1OKOCbdeT6r3D3vpd4QieDDc4bJYQ1.jpg', 'images/UkeWxXRtp5X6TPBcItiBObBfynhHZFWqCRYpWtqZ.jpg', 'No Farm', '86060', '15', '0', '0', NULL, NULL, '0', '71', '2023-12-11 07:01:21', '2023-12-11 07:01:21'),
(16, 'cattle', 'Cattle 1', 'Sindhi Cattle', '.5', 'Brown', '182', NULL, 'images/W369mBqJbpZnEeMhMMoDuzCMcJ4hATpAq0xtFszE.jpg', 'images/VSoa1zUd6R3qvxhbz438jEIVGt1HDhevU1EWDO5K.jpg', 'images/3kYNAnrRGpIVyy8556Tm4sYGInAm1n5aX16LquBT.jpg', 'images/uOGpR7tDgtabTXnfVDJA60fpIEkUXg7FLHd3Vn1q.jpg', 'images/P33AzRSGsFr8sP8AGk8MVIOZXol59oP6JarIX1g5.jpg', 'No Farm', '91000', '16', '0', '0', NULL, NULL, '0', '73', '2023-12-11 07:25:16', '2023-12-11 07:25:16'),
(17, 'cattle', 'Cattle 1', 'Holstein Friesian Local Cross', '.5', 'White and black mix', '208', NULL, 'images/QzJZm4sRzpvu4V3hKE6xPcoTZSkrCxwBgGqH6aIq.jpg', 'images/zsm5NHjhMKSHlIJpAKJDxYTt3DYAcpI4LaqhGteq.jpg', 'images/CgEAwtpNGNoGwd9oZGv8qKSn7OYrSofFOXAqLaBw.jpg', 'images/nXjQptuKwCH4jwOa68f9hOpbjpbkD9hMqVFYG0Eq.jpg', 'images/fbA0KGtB6G9PB5UJu4vXGZGmXQbxGAJRwCdnhb8y.jpg', 'No Farm', '104000', '17', '0', '0', NULL, NULL, '0', '74', '2023-12-11 07:30:53', '2023-12-11 07:30:53'),
(18, 'cattle', 'Cattle 1', 'Heifer/Bakna', '1', 'Brown', '234', NULL, 'images/BjhPZ8GHPsmSPW67HBAxBayPMg9rftsKxReyButt.jpg', 'images/VoEwZXyRyGmUz6G6YM9tnwpdssii75CQ2qKzB0b2.jpg', 'images/ffCpl6xRJSynNhnNDhENs8zvYakdehTHpEcS15kU.jpg', 'images/Y5pGKMjybY3gvW7XgdT4PeTbMMG5rD6iKC6QKA1C.jpg', 'images/l9nX8cV8uc81c0Zc60g7KFFs84XgixvED0ypa9p7.jpg', 'No Farm', '117000', '18', '0', '0', NULL, NULL, '0', '76', '2023-12-11 09:03:23', '2023-12-11 09:03:23'),
(19, 'cattle', 'Cattle 1', 'Heifer/Bakna', '1', 'Black', '234', NULL, 'images/Dt0uIwXayQhy5bvtUjsY2CPPeW4OJbDhiGtH2xXO.jpg', 'images/x71VyOCJ1qTsnVgTfqMEqV9oGaXmooMCkdTsNwE1.jpg', 'images/sZpNbhtlcaxprrRlntCRnJgyz6cnBkcuBFXgs87b.jpg', 'images/LIyXqkbzgH5Bf0mD4j2n9dxZ7fhrq2F51cCiOxEF.jpg', 'images/sz0xSrpWezolHHt2PJz8NOFNhCaXCRZ6Pt9KXE34.jpg', 'No Farm', '117000', '19', '0', '0', NULL, NULL, '0', '77', '2023-12-11 09:10:38', '2023-12-11 09:10:38'),
(20, 'cattle', 'Cattle 1', 'Holstein Friesian Local Cross', '.5', 'White and black mix', '156', NULL, 'images/apMvUfXpjEGtKQQs3kCPrgQUABcEt9EHFHeChvM4.jpg', 'images/JXfFLdhSLTb3TzvqNGxwd0yB355WSpvEgVsA4UUz.jpg', 'images/rwtUdiReDranS9HsfFlpOKi9H0jp4pYJ8Rw1ztCH.jpg', 'images/fmQeYdeJqqP0Usd7V4KoN1UJRem7kcH3Qb5EUZSM.jpg', 'images/9g3M3AnkzOANoHVNCjNlVxxrAh4gpefIAL0HmF9s.jpg', 'No Farm', '78000', '20', '0', '0', NULL, NULL, '0', '78', '2023-12-11 09:19:54', '2023-12-11 09:19:54'),
(21, 'cattle', 'Cattle 1', 'Holstein Friesian Local Cross', '.5', 'Black', '189', NULL, 'images/1KavsSz54ShX3wsf6goOWvdAfAkf04krqh3Fb8fc.jpg', 'images/CnD4QnRPp1v1GuI8E1eGsZyXKWeSIy77z6AYKEJI.jpg', 'images/7CjiJCWmQBJBPZEfLNBKmQ7zgUyzzJjnk7tjZLUn.jpg', 'images/lWZjrCyugj0lJ2mi6DUaBhW7TvkMS9wQOnG0Za8J.jpg', 'images/NR9mx01xZKS2OK6XruFJKUJ6OFwXakqJpSHYoEhJ.jpg', 'No Farm', '94510', '21', '0', '0', NULL, NULL, '0', '79', '2023-12-11 09:26:51', '2023-12-11 09:26:51'),
(22, 'cattle', 'Cattle 1', 'Local or Native Cattle', '.5', 'White and black mix', '181', NULL, 'images/ZxJKooo66Lc3BJBA3wkhNbmbnsX50diLPe0Shpn7.jpg', 'images/zSPo8OyFDxEL7dxo3WTbmvMNY579SHFXfQGupamP.jpg', 'images/G6UDrjputela9GYrQlglcxAeGgHYzS9qy7IXyAtf.jpg', 'images/C5LmvJB0CmyX5FXlCvRs5PReaBGhGc6rmt1GkSJD.jpg', 'images/gLpfoAENz9GrAYnCVDrmlVLZJ8CFadFKG1mInhdt.jpg', 'No Farm', '90610', '22', '0', '0', NULL, NULL, '0', '80', '2023-12-11 09:36:29', '2023-12-11 09:36:29'),
(23, 'cattle', 'Cattle 1', 'Heifer/Bakna', '2', 'White and black mix', '182', NULL, 'images/hLQUpXc12KPULQql8w6IrekaiGwfJN3ytThunNr5.jpg', 'images/Lf1cDnlui4i0FpMtVNbi4QDpnUjyVgVe8RgxFUZf.jpg', 'images/5YTgKDBpwU43XIhLIrLJR87RCr6iaARBDUGyfqrm.jpg', 'images/699ab5mOfFK12PTldAZEzXv7a4L1xT2hGRsbnl7v.jpg', 'images/XRaDGDWpt0D1Yh72qQ8e3fJNAsFmKGufEmEuKppI.jpg', 'No Farm', '91000', '23', '0', '0', NULL, NULL, '0', '75', '2023-12-11 10:15:55', '2023-12-11 10:15:55'),
(24, 'cattle', 'Cattle 1', 'Local or Native Cattle', '1.6', 'White and black mix', '156', NULL, 'images/A2g77QC4KXoXpzi16wjiwOUliagDpY3X3rRTE3Fn.jpg', 'images/0OWZ0XRdFEDg7qLYglzkrfLofUKcG7nOtuaEIdYp.jpg', 'images/eFrQkyLvuN0wEQYXudwSLaSBfLrh5XbJThzdPnF2.jpg', 'images/jJEXmlw0r8hn3hyObvVxDqpeDb8Epx9my5lXAvE5.jpg', 'images/WJlfRUhsw37Wjujorv8oJK7chrwk266Eb1qEnktr.jpg', 'No Farm', '78000', '24', '0', '0', NULL, NULL, '0', '81', '2023-12-11 10:45:33', '2023-12-11 10:45:33'),
(25, 'cattle', 'Cattle 1', 'Stud Bulls', '1.6', 'Black + only heads small portion white', '186', NULL, 'images/lFxhWSYk3kRpmoidiccSKaqo4tLz7P4zKDK1bjj7.jpg', 'images/D1haAoLAFIJ6eakHKXn05hed5ALIBU7YlNFToLUS.jpg', 'images/R7plaT1RF5qTUkjVxaBvYjyWs1YiPbxWUTHXTv3j.jpg', 'images/F4I2ZT6f0Kr9ZpgkcmgFesK8pE1WfY0PAyc7W2i4.jpg', 'images/2JJj2xBTInvYOPPFL5lMg8yuCQL5y1RiniOCmYcJ.jpg', 'No Farm', '112050', '25', '0', '0', NULL, NULL, '0', '82', '2023-12-11 10:46:16', '2023-12-11 10:46:16'),
(26, 'cattle', 'Cattle 1', 'Holstein Friesian Local Cross', '1.3', 'Black', '191', NULL, 'images/9XROx7nm94KN4XGPZ8ehOm6Cy73uidYaYRIuRaft.jpg', 'images/ceKBofJzTfGRLjm0qQIG9Cemv0mW4EQZszFLYRi5.jpg', 'images/OzBgcSEH3npFI3mSvMO3QeMiZzMlJwPXlySBRKgY.jpg', 'images/Q3e7yMpqztphGLdUXQ1Q4Otnv4rp9gm7ZP0SWrOW.jpg', 'images/wAR71zJa0kQXohTI0tngN3k9Fmq7tUiwsPvB8dER.jpg', 'No Farm', '95810', '26', '0', '0', NULL, NULL, '0', '83', '2023-12-11 10:50:32', '2023-12-11 10:50:32'),
(27, 'cattle', 'Cattle 1', 'Stud Bulls', '1.3', 'Black & White', '218', NULL, 'images/vZ23PQIpV7fGGSxhZ8a5WzXF2cg0smaFH4OBcw5y.jpg', 'images/azCXGn3PotFRr2Jh1X78qypO7QQowp3u94H0eiFz.jpg', 'images/CldVZGS6hIQGAnYaPZ6FefQIxVqx0tHyUx5h5RCN.jpg', 'images/RoZsP59sbNwtJdxvNQsxTfoKQUGKuVmE2SfFk2tz.jpg', 'images/ulDKNB8tVZoJU27LeW12i7TKgxg35pRgK8LCtZ7U.jpg', 'No Farm', '109350', '27', '0', '0', NULL, NULL, '0', '84', '2023-12-11 10:53:45', '2023-12-11 10:53:45'),
(28, 'cattle', 'Cattle 1', 'Sindhi Cattle', '1.6', 'Brown', '156', NULL, 'images/CpcEhF4ExXs6Z5mPDyz2zTFKAPzCOiXOpq0IhPCV.jpg', 'images/4gjTRTSPOjuxwNCiJmRMHkDY5hQzubsYYdfYHnli.jpg', 'images/AgK5fewrgNp2hfTa3yZ014ucYXKzdSekts4NjXzP.jpg', 'images/QWoXdfeJCi0BiXAdOD4n87D6XWiYGD0oGIEA3Hcn.jpg', 'images/MzN7hAGCrOFaRnGU9KaNvXLAeZ4zrsRjpwblGuRf.jpg', 'No Farm', '78000', '27', '0', '0', NULL, NULL, '0', '85', '2023-12-11 10:54:22', '2023-12-11 10:54:22'),
(29, 'cattle', 'Cattle 1', 'Holstein Friesian Local Cross', '2', 'White and very small black', '182', NULL, 'images/imzVCUVj220Y1H9ChgftwnXgvqYp6kkgEpbtZgR8.jpg', 'images/KsYinoxvV7f7BrkK0TEkd5l9AEEqDCuPX9dVoTGT.jpg', 'images/J97SEqyCjaopGMsN8F3TEO32jYlEeqKXqW0O9WJ9.jpg', 'images/9oEvMCzwrWmafnxxq8I5xhFfkA5iO2ORBmPTsBG1.jpg', 'images/6cYjV9toLT5OLQzW7buBfO8VAnXEXoUOiwd9yQV6.jpg', 'No Farm', '91000', '29', '0', '0', NULL, NULL, '0', '72', '2023-12-11 11:38:45', '2023-12-11 11:38:45'),
(30, 'cattle', 'Cattle 1', 'Holstein Friesian Local Cross', '1.5', 'Black & White', '196', NULL, 'images/OcVUMfZYIy4V56TuAqbCB41WISCvoRN6ISlGJRl0.jpg', 'images/j3qKi5rHcWVfx7D2QRChOMndf37uwHEOG7rcFTYb.jpg', 'images/CGfoVaAeQ1ay9H3aTyAzt0O3Ih9VfAL6E7dSl9G8.jpg', 'images/0GBWcCUMsOuhsi6Vvh32yvQC5ciClEr0mu0GKqUy.jpg', 'images/ZPAw8KTEsTI9x3E6SpsQX6DQ4UILG15QZUZEI8Q8.jpg', 'No Farm', '98410', '30', '0', '0', NULL, NULL, '0', '86', '2023-12-11 15:02:32', '2023-12-11 15:02:32'),
(31, 'cattle', 'Cattle 1', 'Holstein Friesian Local Cross', '1.5', 'Black', '196', NULL, 'images/izmaKGnNBn7g9KqLXnFF6uQibqnYb2SqV9SkGbOi.jpg', 'images/lLZN93saXjPufne3fIYQiD3Xr0MA3CMthd9x7J06.jpg', 'images/UQMhK3SvlsmAba2AwcKrxC7I4F6WQiRwlPmqK7Nd.jpg', 'images/HgPtlndFrtUO4efBdoLVpC3YArEpMZC9TSBJ8baT.jpg', 'images/x4HN6JadStFyHyKPA5u4s71JpwTFnB6ZAvtIDlpK.jpg', 'No Farm', '98410', '31', '0', '0', NULL, NULL, '0', '87', '2023-12-11 15:05:01', '2023-12-11 15:05:01'),
(32, 'cattle', 'Cattle 1', 'Holstein Friesian Local Cross', '1.6', 'Black', '202', NULL, 'images/l8ScsnfNANGJLaXWIM5fxSZqpVNVcgSmdndiZzkB.jpg', 'images/o2tk8acbUxdFMo093dkVXPECh00IAqjBpppNQRAA.jpg', 'images/P4GAxWRGDhRdbaHzzIQ0r6LUS5XEQzSnS9zBpE4k.jpg', 'images/tNObnz8dlnZJJJTRvJNQLGBXLEvcZUp5v0gPq8y0.jpg', 'images/GiJI1krDZ0tozrlU0PkhXdrFlvrP6IDfFn9kqRRL.jpg', 'No Farm', '101010', '32', '0', '0', NULL, NULL, '0', '88', '2023-12-11 15:08:34', '2023-12-11 15:08:34'),
(33, 'cattle', 'Cattle 1', 'Sahiwal Cattle', '1.5', 'Brown', '173', NULL, 'images/soclC1sRsCPusdxAiM92yzJhE4RUT3Jm79hmwoz0.jpg', 'images/6tzNjn0AyGrFd1VpSnjiSnPY22ttKGwCdW7X2NTQ.jpg', 'images/Gz8kondjCtTvc7TmPKCnwRtOcSPynYscQgUOy2ls.jpg', 'images/AhN64Ca62GOI126AhfVcDFGtkOnQST5HeaMER5Wr.jpg', 'images/PKOYvjU4nZW0zRoAnBplsAalzdv0X7whA8afxCB2.jpg', 'No Farm', '86970', '33', '0', '0', NULL, NULL, '0', '89', '2023-12-11 15:11:17', '2023-12-11 15:11:17'),
(34, 'cattle', 'Cattle 1', 'Holstein Friesian Local Cross', '1.7', 'White and small black', '215', NULL, 'images/Zzm94H8PpVPRF28uGfVHUithVtra4yuMqoSTchAf.jpg', 'images/Z3ozf0FNnQ6PpQECdlevUba2o7EQS1MVOmD5h7uJ.jpg', 'images/MtyF3eqbxmKmtYxwVMME4T70rCIlFe5DwdGPuYnA.jpg', 'images/M1Zd4b3cSBpZcedYxcfhdLyA1ktUckbNCA0Js2q9.jpg', 'images/cPz357TLUrsJFCxys5Lx6OOChIl3Qi3Prm5f620V.jpg', 'No Farm', '107510', '34', '0', '0', NULL, NULL, '0', '90', '2023-12-11 15:13:03', '2023-12-11 15:13:03'),
(35, 'cattle', 'Cattle 1', 'Sahiwal Cattle', '1.3', 'black and brown mix', '195', NULL, 'images/11010djUiEApWZ0NFALAki7edp6AidITnnmMrf8e.jpg', 'images/f61CdS2i0Bygw67CMcKm6oHeUBiyjBBhUUPEqZw3.jpg', 'images/syBpnI4mvW6ejHe4ltlxhQv7LauPqbllUKiJ3sow.jpg', 'images/iiL2GghqFBlm4QZVY6hKaOTE4sM8XlXuDZoZRnm6.jpg', 'images/GGNbvs7aO827n3h2O47PrsdRsYzbD2l1cW1bOMoD.jpg', 'No Farm', '97500', '35', '0', '0', NULL, NULL, '0', '91', '2023-12-12 06:35:13', '2023-12-12 06:35:13'),
(36, 'cattle', 'Cattle 1', 'Sahiwal Cattle', '1.6', 'Black and brown mix', '208', NULL, 'images/2dSNj3jFawPsC6jkMqGf7p5i0FLNpPFDSKaXFKB4.jpg', 'images/yCM2l1YqCcrnUu9YbdfUP56pLdGaAXUvB1LK4Bnu.jpg', 'images/VgcIykikU6SfcKWoIJi5nov11NQ3wxhdplLZ2Bzf.jpg', 'images/G3coZU2W5pkC9JMQDCJyFwdD9N890a7JKJYDO3tC.jpg', 'images/ngu6QonhHC0BMGI28e10YGxOZmWNm9AlyZ1uPiSt.jpg', 'No Farm', '104000', '36', '0', '0', NULL, NULL, '0', '92', '2023-12-12 06:40:20', '2023-12-12 06:40:20'),
(37, 'cattle', 'Cattle 1', 'Holstein Friesian Local Cross', '1.2', 'Black', '155', NULL, 'images/fnEZk8pN93EOozBKK3cuW5FzHj4wImtMOr66JIP3.jpg', 'images/HGWFsNYqqiWFoP6KoZ1kcalfJKkX4dY6SDuDmgAl.jpg', 'images/AzIUAfRYY4bNR5JxJRUyRWGn0tD2dqjA6ynKtT1q.jpg', 'images/XfQMGOfd9sCBd9RR1u6GUXgcgYoCJIEVpzGUHF8c.jpg', 'images/JHQ1WSofQEKWwxYHGjHXHrMG0xAqsyghX1DR6Wb7.jpg', 'No Farm', '77610', '37', '0', '0', NULL, NULL, '0', '93', '2023-12-12 06:45:51', '2023-12-12 06:45:51'),
(38, 'cattle', 'Cattle 1', 'Holstein Friesian Local Cross', '1.3', 'White and black mix', '200', NULL, 'images/yuxyKhnpJ8PbMA0WEobDGmF7sOx03fZB3CyH7Dtm.jpg', 'images/aIqMWyfcjoqIZKS3IqJJdCYNLiEnY0XAF63aV3Ls.jpg', 'images/6jS5ywU1G8KMorrAb2Kgj9Z5byMTN4BLacl3WDtv.jpg', 'images/t1WL7SAgVW15K9vvAuXYAxaDhP8Hm5Py36Hb8AU2.jpg', 'images/umiY2yFENHjD12MdxrGzTnLOPz16bNEB9BuCr16X.jpg', 'No Farm', '99710', '38', '0', '0', NULL, NULL, '0', '94', '2023-12-12 06:52:37', '2023-12-12 06:52:37'),
(39, 'cattle', 'Cattle 1', 'Holstein Friesian Local Cross', '1.2', 'Brown', '172', NULL, 'images/MZz9Hnhb0aFz2jGLXQx02xbo2tkU0g5RU16UV3Xb.jpg', 'images/3cST9Zc4ADv4Owvw4FB89iAmQQ9IWtxu48FCUykL.jpg', 'images/QYgsJcjveKh3QOJCVSDtc9AOY46iusH6uLeiB5Z5.jpg', 'images/eb0KEtcJgLewCR71iZ9Cx6oaKNQabcLFcmWEq0MV.jpg', 'images/6hZrFs77gDodw5SnAgQlkXNfvraBbiK5YbzCJDak.jpg', 'No Farm', '86060', '39', '0', '0', NULL, NULL, '0', '95', '2023-12-12 06:57:29', '2023-12-12 06:57:29'),
(40, 'cattle', 'Cattle 1', 'Holstein Friesian Local Cross', '1.5', 'White and black mix', '189', NULL, 'images/8F28Sy1wcj9RSVHgAYJXwCfBokUQh26u98ioa1rC.jpg', 'images/Uo8wWgdkcFMxho4YNVbPUO7if4M7k6NFbBfaosJg.jpg', 'images/ghYTHH99ZbOkM3oen0z2XQRLGd6w9hLtNI4g4LDZ.jpg', 'images/b9k6pvh1dkp0k040AFfX2WMGfMOcTCIPv5IdTmdB.jpg', 'images/EbPy8keV7ClTuz9bGaJoGNqQAFsAeRCjgWNbIvKA.jpg', 'No Farm', '94510', '40', '0', '0', NULL, NULL, '0', '96', '2023-12-12 07:01:43', '2023-12-12 07:01:43'),
(41, 'cattle', 'Cattle 1', 'Holstein Friesian Local Cross', '1.7', 'Black', '145', NULL, 'images/mszyfGJ3PSANwrllGCh1lH73JYe86kMQEiCjZHqG.jpg', 'images/6NI3WeT9QllszDmSHFgRRLavqnPH94tO2fBJrW0l.jpg', 'images/cmIMTQsI1KFNQR4g8lMz10mPoan8yGow74wz2Eff.jpg', 'images/NGJ28jQCpiVkWfrAThcYkg9AB2avcx8X4dUO9nAS.jpg', 'images/TAIYHBLLlc0c0uqZLhSD1NEgEyARMEUWbv1dxVsm.jpg', 'No Farm', '72540', '41', '0', '0', NULL, NULL, '0', '98', '2023-12-12 07:13:30', '2023-12-12 07:13:30'),
(42, 'cattle', 'Cattle 1', 'Sindhi Cattle', '1.6', 'Black', '216', NULL, 'images/Bl4JPgu7y0EsBZh8ARWaDFhgdRteigNfXaeSdBpx.jpg', 'images/bQEc835KIEi01unxzMnbdkfUaiIJGiTejFnTXEom.jpg', 'images/1nJhGw7LsA0alLybktB7m0uPZ6CfDiXm31H2KY7j.jpg', 'images/VCo9hLVokoSINzyDl80IS73wj35ufpP1oLnL11m2.jpg', 'images/uK3WXXYohZBEOLEIyEgeH3lnBmuxOhMFiGoQo4w3.jpg', 'No Farm', '108030', '42', '0', '0', NULL, NULL, '0', '97', '2023-12-12 07:20:14', '2023-12-12 07:20:14'),
(43, 'cattle', 'Cattle 1', 'Holstein Friesian Local Cross', '1.3', 'Brown', '124', NULL, 'images/RitEKApev1hxkcFJzksl2LJ8sSTG0XRpRxwNAyVL.jpg', 'images/2au7HFvAyOSfAhzlDmDFmuLEhSL222HMTHEVDjhE.jpg', 'images/nG5u2NtZnKV1YwmaqUkctEemq7WRd2CPkLD2VwNQ.jpg', 'images/tmCoytJe0207eO7WLNS9SChz2L7L2BiKvviK78no.jpg', 'images/bGJWOQ8LurMHp5PT7IgcgokOopzos37pTuTAGxbQ.jpg', 'No Farm', '62140', '43', '0', '0', NULL, NULL, '0', '99', '2023-12-12 07:25:46', '2023-12-12 07:25:46'),
(44, 'cattle', 'Cattle 1', 'Holstein Friesian Local Cross', '1.3', 'White', '145', NULL, 'images/2Inadf1Yfq25c2bkbaI8clinqWj9jDndyVQPBww7.jpg', 'images/S65QUYmblD83eOGaJwaXG7tevdHwysUx1SVQQs1N.jpg', 'images/uAma5STTUHwHgu6xcrT5wVjuaLE85IXhf3bAah5m.jpg', 'images/d3f8yeOHxbrV8cUaoGSWmjxyCyJyY6czQQkRxLLq.jpg', 'images/UNilWW3cS7CKWkjjAHeiMkMLuLULyvtsRYPIkUmn.jpg', 'No Farm', '72540', '44', '0', '0', NULL, NULL, '0', '100', '2023-12-12 07:31:33', '2023-12-12 07:31:33'),
(45, 'cattle', 'Cattle 1', 'Holstein Friesian Local Cross', '1.5', 'Black & White', '233', NULL, 'images/qqSA8OVqrpyhWTIy7LxdUnjWBtCJOj0Y8OZz5Zd3.jpg', 'images/phTwJSyihOhaB2c28BluPf5FiDtILzzeP4rpi1nd.jpg', 'images/H51RM9KJzC1qgFMpFkPMZ7fi0UrOI3ST34VlYd3n.jpg', 'images/CTQR4aeDp987BTKFygKOvZQZ6WS05yeDgOFgy0wu.jpg', 'images/HlzmDI87MbpsstTMfZt18MRWu31lg1S27J86mhxX.jpg', 'No Farm', '116480', '45', '0', '0', NULL, NULL, '0', '101', '2023-12-14 06:52:37', '2023-12-14 06:52:37'),
(46, 'cattle', 'Cattle 1', 'Holstein Friesian Local Cross', '2', 'Black', '195', NULL, 'images/rtW67FHzWpvFWTZbIBQtfXnYZExUbiAxEiekRx2c.jpg', 'images/VdHXxNNN2MedwGeHOmEbVBP85oHPE0t6h8cWRTck.jpg', 'images/1cqxmTSNRHFvH8Z0NWZyISkV699HtuJiOaqYlm9b.jpg', 'images/1h0xmqFORQiMrEC3rlbH3j9oF49wPhUvDU9xmOvW.jpg', 'images/mcVYhM0t4pMnuYO8uyXFRDHuuedm61IlRz4aI0C4.jpg', 'No Farm', '97500', '46', '0', '0', NULL, NULL, '0', '102', '2023-12-17 05:19:19', '2023-12-17 05:19:19'),
(47, 'goat', 'Abs', 'Sindhi', '5', 'black', '150', NULL, 'Not Applicable for goat registration', 'images/0lMZxuSp1CVo7EqeDFt0eAZIP9cLsgmlCP4XQcH8.jpg', 'images/YjVrtU4IVQPaqzbW9w5kOnP6jtB2bVqpfMlZcCD6.jpg', 'images/ucz2uYGs6Som0puAQXHJqVqwE4PBKrSdysmq6Zw2.jpg', 'images/k14I2KVXSummCjL8TdOaU2LfaUtc2AEcz37g7pvT.jpg', 'No Farm', '20000', '47', '0', '0', NULL, NULL, '0', '103', '2023-12-17 06:47:05', '2023-12-17 06:47:05'),
(48, 'goat', 'Kalu', 'Sindhi', '4', 'Black & White', '45', NULL, 'Not Applicable for goat registration', 'images/5HkHBzI1ShYsWvfuNrB8nNOpUYL3aqtHHqdEWDnk.jpg', 'images/ZFYQIEoPbknF7dJ3TDPby29biaFxgwujXTkYERRy.jpg', 'images/Yirfph7egiRgIM97GvwFUq7NneNveqn0A8zMFLGw.jpg', 'images/4jUE0vxdDDmJIZyyPvAHWZjJt3gbHk6dhlc54llz.jpg', 'No Farm', '25000', '48', '0', '0', NULL, NULL, '0', '103', '2023-12-17 06:49:03', '2023-12-17 06:49:03'),
(49, 'goat', 'Lalu', 'Deshi', '1.5', 'gray', '250', NULL, 'Not Applicable for goat registration', 'images/MLY0UbXxv6asNKcnsAjAwqg0dmuNfpuSbuvz2eX5.jpg', 'images/eDtQfqDfLUg0nlGBTYiGj6vqamfp0iaMaig6SwJ1.jpg', 'images/M9mt1WjbuJ5h6drSipaC7lQd16ZXDPyVyFH0PCGb.jpg', 'images/tfq5DZd1GlmEYhcFv873cZ5OAPh0d8p6EKQFDbi1.jpg', 'No Farm', '250000', '49', '0', '0', NULL, NULL, '0', '103', '2023-12-17 07:02:51', '2023-12-17 07:02:51'),
(50, 'goat', 'A54', 'Deshi', '2', 'gray', '480', NULL, 'Not Applicable for goat registration', 'images/bEMdQfEYD781QYLcg3EkzLctsZqEeAt1nrTodByu.jpg', 'images/XgJPLn1GZGHsYCFLvfc4C9MUxDN2pVDYk8ULNppA.jpg', 'images/0Nbo8AyXTOSpOJaYS5sa9Vpa0gEzC0rsESJto7Im.jpg', 'images/ULVDGAFbXRPJMH3PSWNpysb9l8F822XuyaZoz26t.jpg', 'No Farm', '337000', '50', '0', '0', NULL, NULL, '0', '103', '2023-12-17 07:03:53', '2023-12-17 07:03:53'),
(51, 'goat', 'F16', 'Brahama', '3', 'Red', '200', NULL, 'Not Applicable for goat registration', 'images/ml7s9uCmBzhKNX7stUESLjXQhPrIuS1oQvtZimnG.jpg', 'images/jAE1oCYorx4nnnZHdLr26cnvSARrlSCvgoeFc8cL.jpg', 'images/F7XcNzDeT3F4pCnUJZ03HQ9RjWHpW5QbKS5XJNvI.jpg', 'images/NWsJXCGEZvgd9hrIkaEE6a1rpHgvRGqaL2aOeYUn.jpg', 'No Farm', '100000', '51', '0', '0', NULL, NULL, '0', '103', '2023-12-17 07:04:45', '2023-12-17 07:04:45'),
(52, 'goat', 'Mig 35', 'Sindhi', '2', 'gray', '250', NULL, 'Not Applicable for goat registration', 'images/pbAoRROj8UZBiQd3ohMKxsO4fz0gebrAOqA03uZF.jpg', 'images/uJcuQb3R2rSTsQbBYqXC97Ogevlm5TjUoUpGXS60.jpg', 'images/nIujz42ygFdZaWe7OyiaZJTA1keqfHnMPKZv41Lh.jpg', 'images/D0CYPcDUHy2srp3sb57h9jSqiNPuKZ5KMLvEIZV9.jpg', 'No Farm', '110000', '52', '0', '0', NULL, NULL, '0', '103', '2023-12-17 07:05:33', '2023-12-17 07:05:33'),
(53, 'goat', 'F22', 'Brahama', '2', 'black', '350', NULL, 'Not Applicable for goat registration', 'images/V7b3MOLpdGyjFiPML4OyuO9CP8VmY2sP6lK04tLK.jpg', 'images/M82qVdvA7nbMcwubLfj742Xnily9Huucd82B6gHr.jpg', 'images/t1FEEnZOH5sUeWGXUMjV4prcjTJt6jLwvubwioFw.jpg', 'images/aHBNsdbmEehratOQjq9q28sGiM0iUHexhJ6zaeMs.jpg', 'No Farm', '136000', '53', '0', '0', NULL, NULL, '0', '103', '2023-12-17 07:06:27', '2023-12-17 07:06:27'),
(54, 'goat', 'Mig 57', 'Deshi', '3', 'Red', '200', NULL, 'Not Applicable for goat registration', 'images/1zlO5ockpxlgDtpyh9JsOXkP2kgjyOGhYlAdFF8O.jpg', 'images/EWTyyku4xU59NsMrecKYd53wUbvs5rVU5tb4aXaE.jpg', 'images/rGj2olgEwc5A7bx4rpgx61ylkXsAxUrjL5OexYoH.jpg', 'images/t3CT5mNtlnigdBk5V5bqvSS4tSEuhzC0X74y4xV7.jpg', 'No Farm', '125000', '54', '0', '0', NULL, NULL, '0', '103', '2023-12-17 07:08:02', '2023-12-17 07:08:02'),
(55, 'goat', 'SR71', 'Brahama', '3', 'black', '250', NULL, 'Not Applicable for goat registration', 'images/NmdaywBG4LOX6X5WBxrwRLIimrFgt1f9h9mf0Yap.jpg', 'images/SEvMcluJeKffdsN6njn11fehPAnPIgK4lzY4MQ6q.jpg', 'images/4ChQDitnwBIaTsEvdmcdJHLqgwG0Zt7rcvlM2B7R.jpg', 'images/2zPulXkrSgpadVUqh62sTYH8bJyprnObpOedcuHu.jpg', 'No Farm', '140000', '55', '0', '0', NULL, NULL, '0', '103', '2023-12-17 07:09:36', '2023-12-17 07:09:36'),
(56, 'goat', 'ISS', 'Sindhi', '2', 'White', '280', NULL, 'Not Applicable for goat registration', 'images/TAv20UfEsnimLFK3iCrydYeU3KQO7kgSv9P6NJfa.jpg', 'images/y92w8HjJyPriEWZRYGLsyJLRyOELLYM64vpCE65c.jpg', 'images/c5sJgXqXBbzfx4Q2HqHJD5LxbejMXiRXoXUf7lJH.jpg', 'images/X0XnWN9swGAOSvtcOjwwVMAghTCMwr6OxMOFs0XX.jpg', 'No Farm', '147000', '56', '0', '0', NULL, NULL, '0', '103', '2023-12-17 07:10:37', '2023-12-17 07:10:37'),
(57, 'goat', '001', 'Black Bengal', '2', 'Black', '10', 'calf', 'Not Applicable for goat registration', 'images/FpYnGCbiRhBAZNkE2a3z0awJSdXUxTU0rakRFeUV.jpg', 'images/lughQ8L1Iv1wyhtA80bHFhdRtedc66WUk2i0m92y.jpg', 'images/TPAoSr37kXhf5RGiRONKGoVTTibJzwbs2B53SCsw.jpg', 'images/qyImL0xY4wmhYDZCUwDnAVsfOtywglF1E4zZHWle.jpg', 'No Farm', '10000', '57', '0', '0', NULL, NULL, '0', '105', '2023-12-19 11:02:01', '2023-12-19 11:02:01'),
(58, 'goat', 'shfj', 'fhhkhj', '45', 'nhb', '96', NULL, 'Not Applicable for goat registration', 'images/DVjsmgXuyjhW4ekfUI1uoA3ng6dCwLrtqOfs4WKB.jpg', 'images/YHNyCoHjsdEPPyd5v0cH0hOMsv3Jx7H4DJjOZ25l.jpg', 'images/6Ll0fnNvctujxDlQJQHxterHthEo8yw994QDz6j4.jpg', 'images/RKxlJfvWLNeULhCg3oh7Oa3IYLtA97lKQfIBRAMl.jpg', '6', '866', '58', '0', '0', NULL, NULL, '0', '57', '2023-12-20 07:39:00', '2023-12-20 07:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `cattle_reg_reports`
--

CREATE TABLE `cattle_reg_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cattle_name` varchar(255) DEFAULT NULL,
  `verification_report` varchar(255) DEFAULT NULL,
  `cow_with_owner` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `cattle_id` varchar(255) DEFAULT NULL,
  `operation` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cattle_reg_reports`
--

INSERT INTO `cattle_reg_reports` (`id`, `cattle_name`, `verification_report`, `cow_with_owner`, `user_id`, `cattle_id`, `operation`, `created_at`, `updated_at`) VALUES
(1, 'Cattle 1', 'processing', 'images/zHGnxR05KHta1k9DDm7ZINticXGdNcA3W4WyUYzc.jpg', '58', '1', 'registration', '2023-12-04 19:17:48', '2023-12-04 19:17:48'),
(2, 'Cattle 1', 'success', 'images/zHGnxR05KHta1k9DDm7ZINticXGdNcA3W4WyUYzc.jpg', '58', '1', 'registration', '2023-12-04 19:18:18', '2023-12-04 19:18:18'),
(3, 'Cattle 1', 'processing', 'images/Jyl5I1BjySxRzC4aY6MP3RlMjUJOlpRsYlZDAonR.jpg', '59', '2', 'registration', '2023-12-04 19:20:22', '2023-12-04 19:20:22'),
(4, 'Cattle 1', 'success', 'images/Jyl5I1BjySxRzC4aY6MP3RlMjUJOlpRsYlZDAonR.jpg', '59', '2', 'registration', '2023-12-04 19:20:52', '2023-12-04 19:20:52'),
(5, 'Cattle 1', 'processing', 'images/hIPlC72vNprknnwhhwp0NaeZrsJaWxkv4hPW6udg.jpg', '62', '3', 'registration', '2023-12-04 19:22:49', '2023-12-04 19:22:49'),
(6, 'Cattle 1', 'success', 'images/hIPlC72vNprknnwhhwp0NaeZrsJaWxkv4hPW6udg.jpg', '62', '3', 'registration', '2023-12-04 19:23:19', '2023-12-04 19:23:19'),
(7, 'Cattle 1', 'processing', 'images/zVSZnLOinZHZCEKqmJsf738aMgeh0CbwNDLbad2J.jpg', '61', '4', 'registration', '2023-12-04 19:25:51', '2023-12-04 19:25:51'),
(8, 'Cattle 1', 'success', 'images/zVSZnLOinZHZCEKqmJsf738aMgeh0CbwNDLbad2J.jpg', '61', '4', 'registration', '2023-12-04 19:26:22', '2023-12-04 19:26:22'),
(9, 'Cattle 1', 'processing', 'images/1GxNfm2NdAI6w7DtsbPRbErq6FVNIBrr84QiLCme.jpg', '60', '5', 'registration', '2023-12-04 19:30:04', '2023-12-04 19:30:04'),
(10, 'Cattle 1', 'success', 'images/1GxNfm2NdAI6w7DtsbPRbErq6FVNIBrr84QiLCme.jpg', '60', '5', 'registration', '2023-12-04 19:30:34', '2023-12-04 19:30:34'),
(11, 'Cattle 1', 'processing', 'images/B7p7UsiKHwSiOuMrdJTPD3fSVCNRKomBhVZUFEYe.jpg', '63', '7', 'registration', '2023-12-06 10:33:45', '2023-12-06 10:33:45'),
(12, 'Cattle 1', 'success', 'images/B7p7UsiKHwSiOuMrdJTPD3fSVCNRKomBhVZUFEYe.jpg', '63', '7', 'registration', '2023-12-06 10:34:17', '2023-12-06 10:34:17'),
(13, 'Cattle 1', 'processing', 'images/2HdseYGbNHwEgqwJOoEN7yfd9zN10GLLO2o5wLza.jpg', '64', '8', 'registration', '2023-12-06 10:41:44', '2023-12-06 10:41:44'),
(14, 'Cattle 1', 'success', 'images/2HdseYGbNHwEgqwJOoEN7yfd9zN10GLLO2o5wLza.jpg', '64', '8', 'registration', '2023-12-06 10:42:16', '2023-12-06 10:42:16'),
(15, 'Cattle 1', 'processing', 'images/a4laXXrt9OQeAdvFNgv2nzBDE7QOg0pmd3fwEXpn.jpg', '65', '9', 'registration', '2023-12-06 10:45:21', '2023-12-06 10:45:21'),
(16, 'Cattle 1', 'success', 'images/a4laXXrt9OQeAdvFNgv2nzBDE7QOg0pmd3fwEXpn.jpg', '65', '9', 'registration', '2023-12-06 10:45:53', '2023-12-06 10:45:53'),
(17, 'Cattle 1', 'processing', 'images/o2Il5HzbQsUmq62OB4zAAC4Dm3hIZtipSjgpkOtx.jpg', '66', '10', 'registration', '2023-12-06 10:58:06', '2023-12-06 10:58:06'),
(18, 'Cattle 1', 'success', 'images/o2Il5HzbQsUmq62OB4zAAC4Dm3hIZtipSjgpkOtx.jpg', '66', '10', 'registration', '2023-12-06 10:58:38', '2023-12-06 10:58:38'),
(19, 'Cattle 1', 'processing', 'images/HnsRZDPj0UOtH1SNV2qG8i4QkS4542PETnCgDRhc.jpg', '67', '11', 'registration', '2023-12-06 11:01:12', '2023-12-06 11:01:12'),
(20, 'Cattle 1', 'failed', 'images/HnsRZDPj0UOtH1SNV2qG8i4QkS4542PETnCgDRhc.jpg', '67', '11', 'registration', '2023-12-06 11:01:18', '2023-12-06 11:01:18'),
(21, 'Cattle 1', 'processing', 'images/33176azWiReHYNFTpV080hOuoek7GQnVbALXESvH.jpg', '67', '11', 'registration', '2023-12-06 11:19:49', '2023-12-06 11:19:49'),
(22, 'Cattle 1', 'failed', 'images/33176azWiReHYNFTpV080hOuoek7GQnVbALXESvH.jpg', '67', '11', 'registration', '2023-12-06 11:19:56', '2023-12-06 11:19:56'),
(23, 'Cattle 1', 'processing', 'images/DcF0j2l61pNWBHBZLjdqVUPiXCKExwuD42559Tko.jpg', '67', '11', 'registration', '2023-12-06 11:29:02', '2023-12-06 11:29:02'),
(24, 'Cattle 1', 'success', 'images/DcF0j2l61pNWBHBZLjdqVUPiXCKExwuD42559Tko.jpg', '67', '11', 'registration', '2023-12-06 11:29:35', '2023-12-06 11:29:35'),
(25, 'Cattle 1', 'processing', 'images/Wy3rLr8V6TcEAl8srJjTyMYGuc3OU5JjA5SYyMsI.jpg', '68', '12', 'registration', '2023-12-10 09:33:01', '2023-12-10 09:33:01'),
(26, 'Cattle 1', 'success', 'images/Wy3rLr8V6TcEAl8srJjTyMYGuc3OU5JjA5SYyMsI.jpg', '68', '12', 'registration', '2023-12-10 09:33:32', '2023-12-10 09:33:32'),
(27, 'Cattle 1', 'processing', 'images/vE7w6GISxTIpuJfHbfasdv1bOX3q9sF2qOG0YKOE.jpg', '69', '13', 'registration', '2023-12-10 09:39:59', '2023-12-10 09:39:59'),
(28, 'Cattle 1', 'success', 'images/vE7w6GISxTIpuJfHbfasdv1bOX3q9sF2qOG0YKOE.jpg', '69', '13', 'registration', '2023-12-10 09:40:32', '2023-12-10 09:40:32'),
(29, 'Cattle 1', 'processing', 'images/fXAvw4LLUKoGpc4tsGRC5dEAF8F7xXnex01uTIpG.jpg', '70', '14', 'registration', '2023-12-10 09:48:27', '2023-12-10 09:48:27'),
(30, 'Cattle 1', 'success', 'images/fXAvw4LLUKoGpc4tsGRC5dEAF8F7xXnex01uTIpG.jpg', '70', '14', 'registration', '2023-12-10 09:49:00', '2023-12-10 09:49:00'),
(31, 'Cattle 1', 'processing', 'images/UkeWxXRtp5X6TPBcItiBObBfynhHZFWqCRYpWtqZ.jpg', '71', '15', 'registration', '2023-12-11 07:00:48', '2023-12-11 07:00:48'),
(32, 'Cattle 1', 'success', 'images/UkeWxXRtp5X6TPBcItiBObBfynhHZFWqCRYpWtqZ.jpg', '71', '15', 'registration', '2023-12-11 07:01:21', '2023-12-11 07:01:21'),
(33, 'Cattle 1', 'processing', 'images/1aSmlUnXRjA9WFCe82sul26HxBIU36F8SHvQ0tEt.jpg', '72', '16', 'registration', '2023-12-11 07:13:25', '2023-12-11 07:13:25'),
(34, 'Cattle 1', 'failed', 'images/1aSmlUnXRjA9WFCe82sul26HxBIU36F8SHvQ0tEt.jpg', '72', '16', 'registration', '2023-12-11 07:13:31', '2023-12-11 07:13:31'),
(35, 'Cattle 1', 'processing', 'images/P33AzRSGsFr8sP8AGk8MVIOZXol59oP6JarIX1g5.jpg', '73', '16', 'registration', '2023-12-11 07:24:42', '2023-12-11 07:24:42'),
(36, 'Cattle 1', 'success', 'images/P33AzRSGsFr8sP8AGk8MVIOZXol59oP6JarIX1g5.jpg', '73', '16', 'registration', '2023-12-11 07:25:16', '2023-12-11 07:25:16'),
(37, 'Cattle 1', 'processing', 'images/fbA0KGtB6G9PB5UJu4vXGZGmXQbxGAJRwCdnhb8y.jpg', '74', '17', 'registration', '2023-12-11 07:30:19', '2023-12-11 07:30:19'),
(38, 'Cattle 1', 'success', 'images/fbA0KGtB6G9PB5UJu4vXGZGmXQbxGAJRwCdnhb8y.jpg', '74', '17', 'registration', '2023-12-11 07:30:53', '2023-12-11 07:30:53'),
(39, 'Cattle 1', 'processing', 'images/HLwGsODfrW5ui13lsprkM9gVfCP3Xmzu4W4Sor9x.jpg', '75', '18', 'registration', '2023-12-11 08:58:19', '2023-12-11 08:58:19'),
(40, 'Cattle 1', 'failed', 'images/HLwGsODfrW5ui13lsprkM9gVfCP3Xmzu4W4Sor9x.jpg', '75', '18', 'registration', '2023-12-11 08:58:26', '2023-12-11 08:58:26'),
(41, 'Cattle 1', 'processing', 'images/l9nX8cV8uc81c0Zc60g7KFFs84XgixvED0ypa9p7.jpg', '76', '18', 'registration', '2023-12-11 09:02:49', '2023-12-11 09:02:49'),
(42, 'Cattle 1', 'success', 'images/l9nX8cV8uc81c0Zc60g7KFFs84XgixvED0ypa9p7.jpg', '76', '18', 'registration', '2023-12-11 09:03:23', '2023-12-11 09:03:23'),
(43, 'Cattle 1', 'processing', 'images/sz0xSrpWezolHHt2PJz8NOFNhCaXCRZ6Pt9KXE34.jpg', '77', '19', 'registration', '2023-12-11 09:10:03', '2023-12-11 09:10:03'),
(44, 'Cattle 1', 'success', 'images/sz0xSrpWezolHHt2PJz8NOFNhCaXCRZ6Pt9KXE34.jpg', '77', '19', 'registration', '2023-12-11 09:10:38', '2023-12-11 09:10:38'),
(45, 'Cattle 1', 'processing', 'images/9g3M3AnkzOANoHVNCjNlVxxrAh4gpefIAL0HmF9s.jpg', '78', '20', 'registration', '2023-12-11 09:19:19', '2023-12-11 09:19:19'),
(46, 'Cattle 1', 'success', 'images/9g3M3AnkzOANoHVNCjNlVxxrAh4gpefIAL0HmF9s.jpg', '78', '20', 'registration', '2023-12-11 09:19:54', '2023-12-11 09:19:54'),
(47, 'Cattle 1', 'processing', 'images/NR9mx01xZKS2OK6XruFJKUJ6OFwXakqJpSHYoEhJ.jpg', '79', '21', 'registration', '2023-12-11 09:26:15', '2023-12-11 09:26:15'),
(48, 'Cattle 1', 'success', 'images/NR9mx01xZKS2OK6XruFJKUJ6OFwXakqJpSHYoEhJ.jpg', '79', '21', 'registration', '2023-12-11 09:26:51', '2023-12-11 09:26:51'),
(49, 'Cattle 1', 'processing', 'images/gLpfoAENz9GrAYnCVDrmlVLZJ8CFadFKG1mInhdt.jpg', '80', '22', 'registration', '2023-12-11 09:35:54', '2023-12-11 09:35:54'),
(50, 'Cattle 1', 'success', 'images/gLpfoAENz9GrAYnCVDrmlVLZJ8CFadFKG1mInhdt.jpg', '80', '22', 'registration', '2023-12-11 09:36:29', '2023-12-11 09:36:29'),
(51, 'Cattle 1', 'processing', 'images/aMafO7kRJXVkdpp6As1hLAyzjvbcmizu2ZeW1orG.jpg', '75', '23', 'registration', '2023-12-11 10:05:06', '2023-12-11 10:05:06'),
(52, 'Cattle 1', 'failed', 'images/aMafO7kRJXVkdpp6As1hLAyzjvbcmizu2ZeW1orG.jpg', '75', '23', 'registration', '2023-12-11 10:05:13', '2023-12-11 10:05:13'),
(53, 'Cattle 1', 'processing', 'images/YKjeFC1TTJVFek9WPS1NYnUXNLyTEvQEtAxkxD0G.jpg', '75', '23', 'registration', '2023-12-11 10:08:20', '2023-12-11 10:08:20'),
(54, 'Cattle 1', 'failed', 'images/YKjeFC1TTJVFek9WPS1NYnUXNLyTEvQEtAxkxD0G.jpg', '75', '23', 'registration', '2023-12-11 10:08:27', '2023-12-11 10:08:27'),
(55, 'Cattle 1', 'processing', 'images/XHqPlAONwgZPP6F3kXWrEUI2oG6ytLQcAm2NHH2y.jpg', '75', '23', 'registration', '2023-12-11 10:12:09', '2023-12-11 10:12:09'),
(56, 'Cattle 1', 'failed', 'images/XHqPlAONwgZPP6F3kXWrEUI2oG6ytLQcAm2NHH2y.jpg', '75', '23', 'registration', '2023-12-11 10:12:15', '2023-12-11 10:12:15'),
(57, 'Cattle 1', 'processing', 'images/XRaDGDWpt0D1Yh72qQ8e3fJNAsFmKGufEmEuKppI.jpg', '75', '23', 'registration', '2023-12-11 10:15:19', '2023-12-11 10:15:19'),
(58, 'Cattle 1', 'success', 'images/XRaDGDWpt0D1Yh72qQ8e3fJNAsFmKGufEmEuKppI.jpg', '75', '23', 'registration', '2023-12-11 10:15:55', '2023-12-11 10:15:55'),
(59, 'Cattle 1', 'processing', 'images/WJlfRUhsw37Wjujorv8oJK7chrwk266Eb1qEnktr.jpg', '81', '24', 'registration', '2023-12-11 10:44:57', '2023-12-11 10:44:57'),
(60, 'Cattle 1', 'success', 'images/WJlfRUhsw37Wjujorv8oJK7chrwk266Eb1qEnktr.jpg', '81', '24', 'registration', '2023-12-11 10:45:33', '2023-12-11 10:45:33'),
(61, 'Cattle 1', 'processing', 'images/2JJj2xBTInvYOPPFL5lMg8yuCQL5y1RiniOCmYcJ.jpg', '82', '25', 'registration', '2023-12-11 10:45:40', '2023-12-11 10:45:40'),
(62, 'Cattle 1', 'success', 'images/2JJj2xBTInvYOPPFL5lMg8yuCQL5y1RiniOCmYcJ.jpg', '82', '25', 'registration', '2023-12-11 10:46:16', '2023-12-11 10:46:16'),
(63, 'Cattle 1', 'processing', 'images/wAR71zJa0kQXohTI0tngN3k9Fmq7tUiwsPvB8dER.jpg', '83', '26', 'registration', '2023-12-11 10:49:55', '2023-12-11 10:49:55'),
(64, 'Cattle 1', 'success', 'images/wAR71zJa0kQXohTI0tngN3k9Fmq7tUiwsPvB8dER.jpg', '83', '26', 'registration', '2023-12-11 10:50:32', '2023-12-11 10:50:32'),
(65, 'Cattle 1', 'processing', 'images/ulDKNB8tVZoJU27LeW12i7TKgxg35pRgK8LCtZ7U.jpg', '84', '27', 'registration', '2023-12-11 10:53:08', '2023-12-11 10:53:08'),
(66, 'Cattle 1', 'success', 'images/ulDKNB8tVZoJU27LeW12i7TKgxg35pRgK8LCtZ7U.jpg', '84', '27', 'registration', '2023-12-11 10:53:45', '2023-12-11 10:53:45'),
(67, 'Cattle 1', 'processing', 'images/MzN7hAGCrOFaRnGU9KaNvXLAeZ4zrsRjpwblGuRf.jpg', '85', '27', 'registration', '2023-12-11 10:53:45', '2023-12-11 10:53:45'),
(68, 'Cattle 1', 'success', 'images/MzN7hAGCrOFaRnGU9KaNvXLAeZ4zrsRjpwblGuRf.jpg', '85', '27', 'registration', '2023-12-11 10:54:22', '2023-12-11 10:54:22'),
(69, 'Cattle 1', 'processing', 'images/6cYjV9toLT5OLQzW7buBfO8VAnXEXoUOiwd9yQV6.jpg', '72', '29', 'registration', '2023-12-11 11:38:08', '2023-12-11 11:38:08'),
(70, 'Cattle 1', 'success', 'images/6cYjV9toLT5OLQzW7buBfO8VAnXEXoUOiwd9yQV6.jpg', '72', '29', 'registration', '2023-12-11 11:38:45', '2023-12-11 11:38:45'),
(71, 'Cattle 1', 'processing', 'images/ZPAw8KTEsTI9x3E6SpsQX6DQ4UILG15QZUZEI8Q8.jpg', '86', '30', 'registration', '2023-12-11 15:01:55', '2023-12-11 15:01:55'),
(72, 'Cattle 1', 'success', 'images/ZPAw8KTEsTI9x3E6SpsQX6DQ4UILG15QZUZEI8Q8.jpg', '86', '30', 'registration', '2023-12-11 15:02:32', '2023-12-11 15:02:32'),
(73, 'Cattle 1', 'processing', 'images/x4HN6JadStFyHyKPA5u4s71JpwTFnB6ZAvtIDlpK.jpg', '87', '31', 'registration', '2023-12-11 15:04:23', '2023-12-11 15:04:23'),
(74, 'Cattle 1', 'success', 'images/x4HN6JadStFyHyKPA5u4s71JpwTFnB6ZAvtIDlpK.jpg', '87', '31', 'registration', '2023-12-11 15:05:01', '2023-12-11 15:05:01'),
(75, 'Cattle 1', 'processing', 'images/GiJI1krDZ0tozrlU0PkhXdrFlvrP6IDfFn9kqRRL.jpg', '88', '32', 'registration', '2023-12-11 15:07:56', '2023-12-11 15:07:56'),
(76, 'Cattle 1', 'success', 'images/GiJI1krDZ0tozrlU0PkhXdrFlvrP6IDfFn9kqRRL.jpg', '88', '32', 'registration', '2023-12-11 15:08:34', '2023-12-11 15:08:34'),
(77, 'Cattle 1', 'processing', 'images/PKOYvjU4nZW0zRoAnBplsAalzdv0X7whA8afxCB2.jpg', '89', '33', 'registration', '2023-12-11 15:10:39', '2023-12-11 15:10:39'),
(78, 'Cattle 1', 'success', 'images/PKOYvjU4nZW0zRoAnBplsAalzdv0X7whA8afxCB2.jpg', '89', '33', 'registration', '2023-12-11 15:11:17', '2023-12-11 15:11:17'),
(79, 'Cattle 1', 'processing', 'images/cPz357TLUrsJFCxys5Lx6OOChIl3Qi3Prm5f620V.jpg', '90', '34', 'registration', '2023-12-11 15:12:25', '2023-12-11 15:12:25'),
(80, 'Cattle 1', 'success', 'images/cPz357TLUrsJFCxys5Lx6OOChIl3Qi3Prm5f620V.jpg', '90', '34', 'registration', '2023-12-11 15:13:03', '2023-12-11 15:13:03'),
(81, 'Cattle 1', 'processing', 'images/GGNbvs7aO827n3h2O47PrsdRsYzbD2l1cW1bOMoD.jpg', '91', '35', 'registration', '2023-12-12 06:34:34', '2023-12-12 06:34:34'),
(82, 'Cattle 1', 'success', 'images/GGNbvs7aO827n3h2O47PrsdRsYzbD2l1cW1bOMoD.jpg', '91', '35', 'registration', '2023-12-12 06:35:13', '2023-12-12 06:35:13'),
(83, 'Cattle 1', 'processing', 'images/ngu6QonhHC0BMGI28e10YGxOZmWNm9AlyZ1uPiSt.jpg', '92', '36', 'registration', '2023-12-12 06:39:40', '2023-12-12 06:39:40'),
(84, 'Cattle 1', 'success', 'images/ngu6QonhHC0BMGI28e10YGxOZmWNm9AlyZ1uPiSt.jpg', '92', '36', 'registration', '2023-12-12 06:40:20', '2023-12-12 06:40:20'),
(85, 'Cattle 1', 'processing', 'images/JHQ1WSofQEKWwxYHGjHXHrMG0xAqsyghX1DR6Wb7.jpg', '93', '37', 'registration', '2023-12-12 06:45:12', '2023-12-12 06:45:12'),
(86, 'Cattle 1', 'success', 'images/JHQ1WSofQEKWwxYHGjHXHrMG0xAqsyghX1DR6Wb7.jpg', '93', '37', 'registration', '2023-12-12 06:45:51', '2023-12-12 06:45:51'),
(87, 'Cattle 1', 'processing', 'images/umiY2yFENHjD12MdxrGzTnLOPz16bNEB9BuCr16X.jpg', '94', '38', 'registration', '2023-12-12 06:51:56', '2023-12-12 06:51:56'),
(88, 'Cattle 1', 'success', 'images/umiY2yFENHjD12MdxrGzTnLOPz16bNEB9BuCr16X.jpg', '94', '38', 'registration', '2023-12-12 06:52:37', '2023-12-12 06:52:37'),
(89, 'Cattle 1', 'processing', 'images/6hZrFs77gDodw5SnAgQlkXNfvraBbiK5YbzCJDak.jpg', '95', '39', 'registration', '2023-12-12 06:56:48', '2023-12-12 06:56:48'),
(90, 'Cattle 1', 'success', 'images/6hZrFs77gDodw5SnAgQlkXNfvraBbiK5YbzCJDak.jpg', '95', '39', 'registration', '2023-12-12 06:57:29', '2023-12-12 06:57:29'),
(91, 'Cattle 1', 'processing', 'images/EbPy8keV7ClTuz9bGaJoGNqQAFsAeRCjgWNbIvKA.jpg', '96', '40', 'registration', '2023-12-12 07:01:02', '2023-12-12 07:01:02'),
(92, 'Cattle 1', 'success', 'images/EbPy8keV7ClTuz9bGaJoGNqQAFsAeRCjgWNbIvKA.jpg', '96', '40', 'registration', '2023-12-12 07:01:43', '2023-12-12 07:01:43'),
(93, 'Cattle 1', 'processing', 'images/OGSc4fTRChMHdv6cEGgY716KQ2lCQ3GMQbEbPPLi.jpg', '97', '41', 'registration', '2023-12-12 07:07:39', '2023-12-12 07:07:39'),
(94, 'Cattle 1', 'failed', 'images/OGSc4fTRChMHdv6cEGgY716KQ2lCQ3GMQbEbPPLi.jpg', '97', '41', 'registration', '2023-12-12 07:07:46', '2023-12-12 07:07:46'),
(95, 'Cattle 1', 'processing', 'images/TAIYHBLLlc0c0uqZLhSD1NEgEyARMEUWbv1dxVsm.jpg', '98', '41', 'registration', '2023-12-12 07:12:48', '2023-12-12 07:12:48'),
(96, 'Cattle 1', 'success', 'images/TAIYHBLLlc0c0uqZLhSD1NEgEyARMEUWbv1dxVsm.jpg', '98', '41', 'registration', '2023-12-12 07:13:30', '2023-12-12 07:13:30'),
(97, 'Cattle 1', 'processing', 'images/uK3WXXYohZBEOLEIyEgeH3lnBmuxOhMFiGoQo4w3.jpg', '97', '42', 'registration', '2023-12-12 07:19:32', '2023-12-12 07:19:32'),
(98, 'Cattle 1', 'success', 'images/uK3WXXYohZBEOLEIyEgeH3lnBmuxOhMFiGoQo4w3.jpg', '97', '42', 'registration', '2023-12-12 07:20:14', '2023-12-12 07:20:14'),
(99, 'Cattle 1', 'processing', 'images/bGJWOQ8LurMHp5PT7IgcgokOopzos37pTuTAGxbQ.jpg', '99', '43', 'registration', '2023-12-12 07:25:03', '2023-12-12 07:25:03'),
(100, 'Cattle 1', 'success', 'images/bGJWOQ8LurMHp5PT7IgcgokOopzos37pTuTAGxbQ.jpg', '99', '43', 'registration', '2023-12-12 07:25:46', '2023-12-12 07:25:46'),
(101, 'Cattle 1', 'processing', 'images/UNilWW3cS7CKWkjjAHeiMkMLuLULyvtsRYPIkUmn.jpg', '100', '44', 'registration', '2023-12-12 07:30:50', '2023-12-12 07:30:50'),
(102, 'Cattle 1', 'success', 'images/UNilWW3cS7CKWkjjAHeiMkMLuLULyvtsRYPIkUmn.jpg', '100', '44', 'registration', '2023-12-12 07:31:33', '2023-12-12 07:31:33'),
(103, 'Cattle 1', 'processing', 'images/WmBsB6CxFXU3vXJtFAYaPh0jKiKr0zoa1ADxOKFP.jpg', '101', '45', 'registration', '2023-12-14 06:47:20', '2023-12-14 06:47:20'),
(104, 'Cattle 1', 'failed', 'images/WmBsB6CxFXU3vXJtFAYaPh0jKiKr0zoa1ADxOKFP.jpg', '101', '45', 'registration', '2023-12-14 06:47:27', '2023-12-14 06:47:27'),
(105, 'Cattle 1', 'processing', 'images/HlzmDI87MbpsstTMfZt18MRWu31lg1S27J86mhxX.jpg', '101', '45', 'registration', '2023-12-14 06:51:57', '2023-12-14 06:51:57'),
(106, 'Cattle 1', 'success', 'images/HlzmDI87MbpsstTMfZt18MRWu31lg1S27J86mhxX.jpg', '101', '45', 'registration', '2023-12-14 06:52:37', '2023-12-14 06:52:37'),
(107, 'Cattle 1', 'processing', 'images/mcVYhM0t4pMnuYO8uyXFRDHuuedm61IlRz4aI0C4.jpg', '102', '46', 'registration', '2023-12-17 05:18:32', '2023-12-17 05:18:32'),
(108, 'Cattle 1', 'success', 'images/mcVYhM0t4pMnuYO8uyXFRDHuuedm61IlRz4aI0C4.jpg', '102', '46', 'registration', '2023-12-17 05:19:19', '2023-12-17 05:19:19'),
(109, 'q1', 'processing', 'images/yoi3NiJNv8bIOizsN04jyGfbulpEhhn3CxsDcpVE.jpg', '57', '6', 'claim', '2023-12-18 07:22:41', '2023-12-18 07:22:41'),
(110, 'q1', 'failed', 'images/yoi3NiJNv8bIOizsN04jyGfbulpEhhn3CxsDcpVE.jpg', '57', '6', 'claim', '2023-12-18 07:22:41', '2023-12-18 07:22:41'),
(117, 'Cattle 1', 'processing', 'images/PKOYvjU4nZW0zRoAnBplsAalzdv0X7whA8afxCB2.jpg', '54', '33', 'claim', '2023-12-26 18:18:19', '2023-12-26 18:18:19'),
(118, 'Cattle 1', 'success', 'images/PKOYvjU4nZW0zRoAnBplsAalzdv0X7whA8afxCB2.jpg', '54', '33', 'claim', '2023-12-26 18:18:19', '2023-12-26 18:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `company_policies`
--

CREATE TABLE `company_policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_profiles`
--

CREATE TABLE `company_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daily_expense_management`
--

CREATE TABLE `daily_expense_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expense_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_expense_management`
--

INSERT INTO `daily_expense_management` (`id`, `expense_date`, `description`, `item_name`, `amount`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2023-12-19', 'Total', NULL, 2000.00, '57', '2023-12-19 12:04:47', '2023-12-19 12:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expense_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `cattle_id` text DEFAULT NULL,
  `user_id` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `expense_date`, `description`, `item_name`, `amount`, `category`, `cattle_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2023-12-11', 'affdgsg', NULL, 10000.00, 'Medications', '6', '57', '2023-12-12 05:33:53', '2023-12-12 05:33:53'),
(3, '2023-12-17', 'Food, Medicine', 'Food, Medicine', 372.71, 'Expense Weight Average', '47', '103', '2023-12-17 07:23:13', '2023-12-17 07:23:13'),
(4, '2023-12-17', 'Food, Medicine', 'Food, Medicine', 111.81, 'Expense Weight Average', '48', '103', '2023-12-17 07:23:13', '2023-12-17 07:23:13'),
(5, '2023-12-17', 'Food, Medicine', 'Food, Medicine', 621.18, 'Expense Weight Average', '49', '103', '2023-12-17 07:23:13', '2023-12-17 07:23:13'),
(6, '2023-12-17', 'Food, Medicine', 'Food, Medicine', 1192.67, 'Expense Weight Average', '50', '103', '2023-12-17 07:23:13', '2023-12-17 07:23:13'),
(7, '2023-12-17', 'Food, Medicine', 'Food, Medicine', 496.95, 'Expense Weight Average', '51', '103', '2023-12-17 07:23:13', '2023-12-17 07:23:13'),
(8, '2023-12-17', 'Food, Medicine', 'Food, Medicine', 621.18, 'Expense Weight Average', '52', '103', '2023-12-17 07:23:13', '2023-12-17 07:23:13'),
(9, '2023-12-17', 'Food, Medicine', 'Food, Medicine', 869.65, 'Expense Weight Average', '53', '103', '2023-12-17 07:23:13', '2023-12-17 07:23:13'),
(10, '2023-12-17', 'Food, Medicine', 'Food, Medicine', 496.95, 'Expense Weight Average', '54', '103', '2023-12-17 07:23:13', '2023-12-17 07:23:13'),
(11, '2023-12-17', 'Food, Medicine', 'Food, Medicine', 621.18, 'Expense Weight Average', '55', '103', '2023-12-17 07:23:13', '2023-12-17 07:23:13'),
(12, '2023-12-17', 'Food, Medicine', 'Food, Medicine', 695.72, 'Expense Weight Average', '56', '103', '2023-12-17 07:23:13', '2023-12-17 07:23:13'),
(16, '2023-12-13', 'jjhuuh', 'khggu', 325.00, 'Labor', '6', '57', '2023-12-17 09:16:06', '2023-12-17 09:16:06'),
(17, '2023-12-12', 'hfdh', 'gk', 5489.00, 'Supplies', '6', '57', '2023-12-17 10:00:05', '2023-12-17 10:00:05'),
(18, '2023-09-01', 'dfgh', 'gk', 566.00, 'Feed', '6', '57', '2023-12-17 12:14:24', '2023-12-17 12:14:24'),
(19, '2023-12-24', 'akashdemo', 'gk', 265.00, 'Registration and fees', '6', '57', '2023-12-18 06:30:53', '2023-12-18 06:30:53'),
(20, '2023-12-19', 'Total', NULL, 5000.00, 'Feed', '47', '103', '2023-12-19 12:06:30', '2023-12-19 12:06:30'),
(21, '2023-12-19', 'Total', 'Food', 305.50, 'Expense Weight Average', '47', '103', '2023-12-19 12:16:07', '2023-12-19 12:16:07'),
(22, '2023-12-19', 'Total', 'Food', 91.65, 'Expense Weight Average', '48', '103', '2023-12-19 12:16:07', '2023-12-19 12:16:07'),
(23, '2023-12-19', 'Total', 'Food', 509.16, 'Expense Weight Average', '49', '103', '2023-12-19 12:16:07', '2023-12-19 12:16:07'),
(24, '2023-12-19', 'Total', 'Food', 977.60, 'Expense Weight Average', '50', '103', '2023-12-19 12:16:07', '2023-12-19 12:16:07'),
(25, '2023-12-19', 'Total', 'Food', 407.33, 'Expense Weight Average', '51', '103', '2023-12-19 12:16:07', '2023-12-19 12:16:07'),
(26, '2023-12-19', 'Total', 'Food', 509.16, 'Expense Weight Average', '52', '103', '2023-12-19 12:16:07', '2023-12-19 12:16:07'),
(27, '2023-12-19', 'Total', 'Food', 712.83, 'Expense Weight Average', '53', '103', '2023-12-19 12:16:07', '2023-12-19 12:16:07'),
(28, '2023-12-19', 'Total', 'Food', 407.33, 'Expense Weight Average', '54', '103', '2023-12-19 12:16:07', '2023-12-19 12:16:07'),
(29, '2023-12-19', 'Total', 'Food', 509.16, 'Expense Weight Average', '55', '103', '2023-12-19 12:16:07', '2023-12-19 12:16:07'),
(30, '2023-12-19', 'Total', 'Food', 570.26, 'Expense Weight Average', '56', '103', '2023-12-19 12:16:07', '2023-12-19 12:16:07');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `farmer_profiles`
--

CREATE TABLE `farmer_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fathers_name` varchar(255) NOT NULL,
  `mothers_name` varchar(255) NOT NULL,
  `present_address` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `nid` varchar(255) NOT NULL,
  `source_of_income` varchar(255) DEFAULT NULL,
  `bank_account_no` varchar(255) NOT NULL,
  `farmer_address` varchar(255) NOT NULL,
  `thana` varchar(255) NOT NULL,
  `upazilla` varchar(255) NOT NULL,
  `union` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `village` varchar(255) NOT NULL,
  `loan_amount` varchar(255) DEFAULT NULL,
  `num_of_livestock` varchar(255) DEFAULT NULL,
  `type_of_livestock` varchar(255) DEFAULT NULL,
  `nid_front` varchar(255) NOT NULL,
  `nid_back` varchar(255) NOT NULL,
  `loan_investment` varchar(255) DEFAULT NULL,
  `bank_name_insured` varchar(255) NOT NULL,
  `chairman_certificate` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farmer_profiles`
--

INSERT INTO `farmer_profiles` (`id`, `fathers_name`, `mothers_name`, `present_address`, `dob`, `nid`, `source_of_income`, `bank_account_no`, `farmer_address`, `thana`, `upazilla`, `union`, `division`, `district`, `zip_code`, `village`, `loan_amount`, `num_of_livestock`, `type_of_livestock`, `nid_front`, `nid_back`, `loan_investment`, `bank_name_insured`, `chairman_certificate`, `nationality`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'vh', 'h', 'h', '2023-12-05', '5', 'v', '55', 'h', 'h', 'h', 'hg', 'h', 'j', '6', 'h', '6', '5', '5', 'images/0BRFYsQxqk0niYgjlVIAw4yM6m8lNOQGLWzzDacT.jpg', 'images/g0IGR7TW52KXoOkYmLu7JlWJqgk147zFjkfcsONH.jpg', 'images/ytX971VDQkANrtWwsklP5suFyNxgnAOe6b8Fv3gl.jpg', 'j.', 'images/BOPxCsbDpLWmQ3ZmETePTIcKi6xfLYr5kyHeeAa2.jpg', 'bd', 'images/idd8vLQQJJ4CwsK3CuBCjklDoLlALZZ6QJetb45J.png', '57', '2023-12-05 05:57:45', '2023-12-05 05:57:45'),
(2, 'Kamal Rahman', 'Morjina Begom', 'Jessore', '1979-05-28', '8870510076', 'Farming', '123456', 'Jhikargachha', 'Jhikargachha', 'Jhikargachha', 'Jhikargachha', 'Khulna', 'Jashore', '1710', 'Kalinagar', NULL, '10', 'Cattle', 'images/iSQKHliR9CngghdaqT3aFCsydSbjwa02rgqet3wp.jpg', 'images/NxsVhRUn34UCmDTwrSH2jYjgW5VwSiLwHeQ5epgv.jpg', NULL, 'Ab', 'images/QhFDMFENwROfxQoJhzHGxZFa6ub0ilgPWRphq4aY.jpg', 'Bangladeshi', 'images/VBaAp3kSnLlgD9jYJKtEJk8AmjjSAOYvkApuQwQf.jpg', '103', '2023-12-17 06:53:54', '2023-12-17 06:53:54'),
(3, 'Abc', 'fffghd', 'Raja Clinic', '2025-09-19', '7804330053', 'Business', '112233445566', 'Raja Clinic', 'cfgfdgdf', 'Bancharampur', 'dewdwe', 'Chattogram', 'Brahmanbaria', '1207', 'gggf', '0', '3', 'Abc', 'images/NgDpZSWZJch6A2syaqSZhKFrhpwuAD4u6wBBRP7a.jpg', 'images/DBzmwK9Fo2YVIpoQKKhDI72ekGdnxLhO0ndVDBoq.jpg', NULL, 'ttt', NULL, 'Bangladeshi', 'images/t3zSU73CRBRNS6AbELxtIATmgcJS0DgvOgmt1kTx.jpg', '105', '2023-12-19 09:15:45', '2023-12-19 09:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `feeding_and_nutrition`
--

CREATE TABLE `feeding_and_nutrition` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `schedule_date` date NOT NULL,
  `feeding_schedule` text NOT NULL,
  `nutrition_plans` text NOT NULL,
  `feed_consumption_records` text NOT NULL,
  `cattle_id` text NOT NULL,
  `user_id` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feeding_and_nutrition`
--

INSERT INTO `feeding_and_nutrition` (`id`, `schedule_date`, `feeding_schedule`, `nutrition_plans`, `feed_consumption_records`, `cattle_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, '2023-12-06', 'friday', 'akash', 'images/O3jkcW8CulpzPhQqbuhLYXAWtg6S5czZkkliyOBC.jpg', '6', '57', '2023-12-18 06:28:53', '2023-12-18 06:28:53'),
(3, '2023-12-18', 'fjkkhfdcbbbgk', 'vbhb j bjjh', 'images/iorSixf8n2LrOTbE1kNgcQ93H28vIKVKXAt9eZg2.jpg', '6', '57', '2023-12-18 07:56:49', '2023-12-18 07:56:49');

-- --------------------------------------------------------

--
-- Table structure for table `firms`
--

CREATE TABLE `firms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `farm_name` varchar(255) NOT NULL,
  `cattle` int(11) NOT NULL,
  `buffalo` int(11) NOT NULL,
  `goat` int(11) NOT NULL,
  `farm_address` text NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `firms`
--

INSERT INTO `firms` (`id`, `farm_name`, `cattle`, `buffalo`, `goat`, `farm_address`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Akash Das', 0, 0, 1, 'fggj', '57', '2023-12-06 06:37:06', '2023-12-06 06:37:06'),
(2, 'joy', 1, 1, 1, 'fb', '57', '2023-12-06 11:27:33', '2023-12-06 11:27:33'),
(3, 'net', 0, 0, 1, 'jkhf', '57', '2023-12-06 11:37:58', '2023-12-06 11:37:58'),
(4, 'no', 1, 0, 0, 'fgh', '57', '2023-12-06 11:40:42', '2023-12-06 11:40:42'),
(5, 'farm', 1, 0, 0, 'sfgh', '57', '2023-12-06 11:43:25', '2023-12-06 11:43:25'),
(6, 'other', 0, 1, 0, 'ghjj', '57', '2023-12-17 12:13:45', '2023-12-17 12:13:45');

-- --------------------------------------------------------

--
-- Table structure for table `income_and_sells`
--

CREATE TABLE `income_and_sells` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `record_date` date NOT NULL,
  `description` text NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `type` varchar(255) NOT NULL,
  `cattle_id` text NOT NULL,
  `user_id` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `income_and_sells`
--

INSERT INTO `income_and_sells` (`id`, `record_date`, `description`, `amount`, `type`, `cattle_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, '2023-12-17', 'Milk Collected From Abs', 1200.00, 'sales', '47', '103', '2023-12-17 07:15:34', '2023-12-17 07:15:34'),
(3, '2023-12-17', 'Milk Collected from Kalu', 1200.00, 'sales', '48', '103', '2023-12-17 07:16:05', '2023-12-17 07:16:05'),
(4, '2023-12-17', 'Milk Collected from Lalu', 1200.00, 'sales', '49', '103', '2023-12-17 07:16:26', '2023-12-17 07:16:26'),
(5, '2023-12-17', 'Milk Collected from A54', 1200.00, 'sales', '50', '103', '2023-12-17 07:16:43', '2023-12-17 07:16:43'),
(6, '2023-12-12', 'akash', 25698.00, 'sells', '6', '57', '2023-12-18 06:27:14', '2023-12-18 06:27:14');

-- --------------------------------------------------------

--
-- Table structure for table `insurance_cash_requests`
--

CREATE TABLE `insurance_cash_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `from_ac` varchar(255) DEFAULT NULL,
  `to_ac` varchar(255) DEFAULT NULL,
  `to_ac_name` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `branch_name` varchar(255) DEFAULT NULL,
  `routing_no` varchar(255) DEFAULT NULL,
  `instruction` text DEFAULT NULL,
  `insurance_cost` varchar(255) DEFAULT NULL,
  `cattle_sum_insurance` varchar(255) DEFAULT NULL,
  `transaction_type` varchar(255) DEFAULT NULL,
  `transaction_attachment` varchar(255) DEFAULT NULL,
  `package_insurance_period` varchar(255) DEFAULT NULL,
  `insurance_date` date DEFAULT NULL,
  `insurance_expiration_date` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `cattle_id` varchar(255) DEFAULT NULL,
  `package_id` varchar(255) DEFAULT NULL,
  `company_id` varchar(255) DEFAULT NULL,
  `insurance_requested_company_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `insurance_claims`
--

CREATE TABLE `insurance_claims` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cattle_id` varchar(255) DEFAULT NULL,
  `muzzle_of_cow` varchar(255) DEFAULT NULL,
  `muzzle_token` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `insurance_requests`
--

CREATE TABLE `insurance_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cattle_id` varchar(255) DEFAULT NULL,
  `package_id` varchar(255) DEFAULT NULL,
  `company_id` varchar(255) DEFAULT NULL,
  `package_insurance_period` decimal(2,1) DEFAULT NULL,
  `insurance_cost` varchar(255) DEFAULT NULL,
  `insurance_status` varchar(255) DEFAULT NULL,
  `insurance_requested_company_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insurance_requests`
--

INSERT INTO `insurance_requests` (`id`, `cattle_id`, `package_id`, `company_id`, `package_insurance_period`, `insurance_cost`, `insurance_status`, `insurance_requested_company_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, '33', '2', '55', 0.5, '1501', 'received', '54', '89', '2023-12-26 17:42:09', '2023-12-26 17:42:24');

-- --------------------------------------------------------

--
-- Table structure for table `insureds`
--

CREATE TABLE `insureds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cattle_id` varchar(255) DEFAULT NULL,
  `package_id` varchar(255) DEFAULT NULL,
  `company_id` varchar(255) DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `insurance_status` varchar(255) DEFAULT NULL,
  `insurance_type` varchar(255) DEFAULT NULL,
  `package_expiration_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insureds`
--

INSERT INTO `insureds` (`id`, `cattle_id`, `package_id`, `company_id`, `order_id`, `user_id`, `insurance_status`, `insurance_type`, `package_expiration_date`, `created_at`, `updated_at`) VALUES
(14, '33', '2', '55', '9', '89', 'insured', 'single', '2024-05-26', '2023-12-26 17:43:10', '2023-12-26 17:43:10'),
(21, '2', '2', '2', '18', '59', 'insured', 'single', '2024-01-02', '2024-01-01 12:01:33', '2024-01-01 12:01:33');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_01_073239_create_profiles_table', 1),
(8, '2023_08_13_065445_create_company_profiles_table', 1),
(9, '2023_08_13_093947_create_company_policies_table', 1),
(10, '2023_08_16_090854_create_packages_table', 1),
(17, '2023_09_18_065111_create_insurance_claims_table', 5),
(19, '2023_09_19_075300_create_jobs_table', 7),
(30, '2023_08_02_103420_create_farmer_profiles_table', 12),
(33, '2023_09_21_065611_create_cattle_reg_reports_table', 15),
(34, '2023_10_02_060053_create_firms_table', 16),
(35, '2023_08_06_103725_create_cattle_registrations_table', 17),
(43, '2023_10_22_065746_create_insureds_table', 20),
(45, '2023_09_11_085632_create_permissions_table', 22),
(48, '2023_10_31_150141_create_animal_informations_table', 23),
(50, '2023_11_02_091905_create_feeding_and_nutrition_table', 24),
(52, '2023_11_02_101707_create_reproduction_and_breedings_table', 25),
(56, '2023_11_09_072754_create_income_and_sells_table', 27),
(57, '2023_11_08_072017_create_expenses_table', 28),
(58, '2023_11_09_115537_create_budgeting_and_forecastings_table', 29),
(59, '2023_12_17_125718_create_asset_management_table', 30),
(60, '2023_12_17_135057_create_daily_expense_management_table', 30),
(62, '2023_09_01_170436_create_orders_table', 32),
(63, '2023_12_26_113736_add_permission_for_package_without_insurance_company', 33),
(64, '2023_10_08_072704_create_insurance_requests_table', 34),
(74, '2023_12_27_101934_create_insurance_cash_requests_table', 35);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `cattle_id` varchar(255) DEFAULT NULL,
  `package_id` varchar(255) DEFAULT NULL,
  `company_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `insurance_request_id` varchar(255) DEFAULT NULL,
  `insurance_requested_company_id` varchar(255) DEFAULT NULL,
  `package_expiration_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `amount`, `status`, `address`, `transaction_id`, `currency`, `cattle_id`, `package_id`, `company_id`, `user_id`, `insurance_request_id`, `insurance_requested_company_id`, `package_expiration_date`, `created_at`, `updated_at`) VALUES
(9, 'WeGrow', 'info@wegrow.global', '01322891563', '1000.155', 'Processing', 'Customer Address', '658b1084cc2cd', 'BDT', '33', '2', '55', '89', '2', '54', '2024-05-26', '2023-12-26 05:32:03', '2023-12-26 05:32:03');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `insurance_period` decimal(2,1) NOT NULL,
  `coverage` varchar(255) NOT NULL,
  `quotation` varchar(255) NOT NULL,
  `policy` varchar(255) NOT NULL,
  `discount` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `vat` int(11) NOT NULL,
  `package_status` varchar(255) NOT NULL DEFAULT 'active',
  `user_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_name`, `insurance_period`, `coverage`, `quotation`, `policy`, `discount`, `rate`, `vat`, `package_status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Pheonix - 6 months package - 2', 0.5, '[\"ac\",\"fl\",\"er\"]', '<p>wd</p>', 'policy/AFrgYPYJK9fCY49XlSldolSr5TRr0jcdr2IqdDUH.pdf', 10, 10, 15, 'active', '56', '2023-12-06 07:40:19', '2023-12-06 07:40:19'),
(2, 'Pheonix - 6 months package', 0.5, '[\"ac\",\"fl\",\"er\"]', '<p>tr</p>', 'policy/L9jgePy8nnlr3TonaWugawwcXT3zlybzk2a7S27d.pdf', 50, 3, 15, 'active', '55', '2023-12-26 00:17:29', '2023-12-26 17:39:14');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `f_cattle_reg` tinyint(1) NOT NULL DEFAULT 1,
  `f_insurance` tinyint(1) NOT NULL DEFAULT 0,
  `f_farm_management` tinyint(1) NOT NULL DEFAULT 0,
  `c_dashboard` tinyint(1) NOT NULL DEFAULT 1,
  `c_register_agent` tinyint(1) NOT NULL DEFAULT 0,
  `c_insurance` tinyint(1) NOT NULL DEFAULT 0,
  `c_cattle_reg_and_claim` tinyint(1) NOT NULL DEFAULT 0,
  `cattle` tinyint(1) NOT NULL DEFAULT 1,
  `buffalo` tinyint(1) NOT NULL DEFAULT 1,
  `goat` tinyint(1) NOT NULL DEFAULT 1,
  `role` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `c_without_insurance` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `f_cattle_reg`, `f_insurance`, `f_farm_management`, `c_dashboard`, `c_register_agent`, `c_insurance`, `c_cattle_reg_and_claim`, `cattle`, `buffalo`, `goat`, `role`, `user_id`, `created_at`, `updated_at`, `c_without_insurance`) VALUES
(1, 1, 0, 0, 1, 1, 0, 1, 1, 1, 1, 'c', '54', '2023-12-04 11:32:48', '2023-12-26 06:04:58', 1),
(2, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1, 'c', '55', '2023-12-04 11:41:08', '2023-12-26 19:47:36', 0),
(3, 1, 0, 0, 1, 1, 0, 1, 1, 1, 1, 'c', '56', '2023-12-04 12:01:15', '2023-12-26 19:47:00', 0),
(4, 1, 1, 1, 1, 0, 0, 0, 1, 1, 1, 'f', '57', '2023-12-04 12:03:02', '2023-12-06 07:40:55', 0),
(5, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '58', '2023-12-04 19:08:42', '2023-12-04 19:08:42', 0),
(6, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '59', '2023-12-04 19:10:04', '2023-12-04 19:10:04', 0),
(7, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '60', '2023-12-04 19:11:20', '2023-12-04 19:11:20', 0),
(8, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '61', '2023-12-04 19:12:35', '2023-12-04 19:12:35', 0),
(9, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '62', '2023-12-04 19:13:36', '2023-12-04 19:13:36', 0),
(10, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '63', '2023-12-06 10:29:38', '2023-12-06 10:29:38', 0),
(11, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '64', '2023-12-06 10:35:40', '2023-12-06 10:35:40', 0),
(12, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '65', '2023-12-06 10:43:14', '2023-12-06 10:43:14', 0),
(13, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '66', '2023-12-06 10:55:57', '2023-12-06 10:55:57', 0),
(14, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '67', '2023-12-06 10:59:06', '2023-12-06 10:59:06', 0),
(15, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '68', '2023-12-07 18:08:10', '2023-12-07 18:08:10', 0),
(16, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '69', '2023-12-10 09:34:58', '2023-12-10 09:34:58', 0),
(17, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '70', '2023-12-10 09:42:27', '2023-12-10 09:42:27', 0),
(18, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '71', '2023-12-11 06:56:04', '2023-12-11 06:56:04', 0),
(19, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '72', '2023-12-11 07:05:54', '2023-12-11 07:05:54', 0),
(20, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '73', '2023-12-11 07:16:51', '2023-12-11 07:16:51', 0),
(21, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '74', '2023-12-11 07:26:47', '2023-12-11 07:26:47', 0),
(22, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '75', '2023-12-11 08:54:50', '2023-12-11 08:54:50', 0),
(23, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '76', '2023-12-11 08:59:56', '2023-12-11 08:59:56', 0),
(24, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '77', '2023-12-11 09:07:31', '2023-12-11 09:07:31', 0),
(25, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '78', '2023-12-11 09:17:00', '2023-12-11 09:17:00', 0),
(26, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '79', '2023-12-11 09:21:23', '2023-12-11 09:21:23', 0),
(27, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '80', '2023-12-11 09:32:26', '2023-12-11 09:32:26', 0),
(28, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '81', '2023-12-11 10:43:20', '2023-12-11 10:43:20', 0),
(29, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '82', '2023-12-11 10:44:00', '2023-12-11 10:44:00', 0),
(30, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '83', '2023-12-11 10:48:19', '2023-12-11 10:48:19', 0),
(31, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '84', '2023-12-11 10:49:14', '2023-12-11 10:49:14', 0),
(32, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '85', '2023-12-11 10:51:40', '2023-12-11 10:51:40', 0),
(33, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '86', '2023-12-11 14:54:27', '2023-12-11 14:54:27', 0),
(34, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '87', '2023-12-11 14:55:44', '2023-12-11 14:55:44', 0),
(35, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '88', '2023-12-11 14:56:35', '2023-12-11 14:56:35', 0),
(36, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '89', '2023-12-11 14:57:44', '2023-12-11 14:57:44', 0),
(37, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '90', '2023-12-11 14:58:31', '2023-12-11 14:58:31', 0),
(38, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '91', '2023-12-12 06:31:40', '2023-12-12 06:31:40', 0),
(39, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '92', '2023-12-12 06:37:36', '2023-12-12 06:37:36', 0),
(40, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '93', '2023-12-12 06:42:38', '2023-12-12 06:42:38', 0),
(41, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '94', '2023-12-12 06:48:46', '2023-12-12 06:48:46', 0),
(42, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '95', '2023-12-12 06:54:37', '2023-12-12 06:54:37', 0),
(43, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '96', '2023-12-12 06:59:16', '2023-12-12 06:59:16', 0),
(44, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '97', '2023-12-12 07:05:38', '2023-12-12 07:05:38', 0),
(45, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '98', '2023-12-12 07:10:42', '2023-12-12 07:10:42', 0),
(46, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '99', '2023-12-12 07:22:32', '2023-12-12 07:22:32', 0),
(47, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '100', '2023-12-12 07:28:05', '2023-12-12 07:28:05', 0),
(48, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '101', '2023-12-14 06:43:48', '2023-12-14 06:43:48', 0),
(49, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 'f', '102', '2023-12-17 05:15:48', '2023-12-17 05:15:48', 0),
(50, 1, 0, 1, 1, 0, 0, 0, 1, 1, 1, 'f', '103', '2023-12-17 06:37:52', '2023-12-17 06:54:55', 0),
(51, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 'c', '104', '2023-12-19 08:35:42', '2023-12-19 08:37:56', 0),
(52, 1, 1, 1, 1, 0, 0, 0, 1, 1, 1, 'f', '105', '2023-12-19 08:46:25', '2023-12-19 08:48:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 57, 'token', '2eb18b509af1f564a2b97eced55ed0da110db3721880c686756acca3e60dffb4', '[\"*\"]', '2023-12-06 10:04:07', '2023-12-04 12:06:52', '2023-12-06 10:04:07'),
(2, 'App\\Models\\User', 58, 'token', 'e0330f871839310583a6d6023a63c1ba4178ff0732fc7f42bacb3286a06a1027', '[\"*\"]', '2023-12-05 06:22:02', '2023-12-05 06:20:39', '2023-12-05 06:22:02'),
(3, 'App\\Models\\User', 55, 'token', 'd88465f97eaefb2970add037233ee3c8b28af19bfc74ed465f37d957b2d3de24', '[\"*\"]', NULL, '2023-12-06 06:57:56', '2023-12-06 06:57:56'),
(4, 'App\\Models\\User', 55, 'token', '9b3236819ebc9b7fd1d07d1938033cb12f652ae6ec1f080c63f5a6d915596461', '[\"*\"]', '2023-12-06 06:59:18', '2023-12-06 06:59:07', '2023-12-06 06:59:18'),
(5, 'App\\Models\\User', 57, 'token', 'df8bec6a4246875069a851797f7eaed6c4083724bebdccbf5ade134e0ecb7ba3', '[\"*\"]', '2023-12-06 09:23:56', '2023-12-06 07:00:42', '2023-12-06 09:23:56'),
(6, 'App\\Models\\User', 57, 'token', '0f051dfb34d363205b4a429cf411b67936289c4dea6892aced0411c23f9341b2', '[\"*\"]', '2023-12-12 10:42:24', '2023-12-06 10:06:02', '2023-12-12 10:42:24'),
(7, 'App\\Models\\User', 57, 'token', '7618708bb2ba502a3f23df8eaadf96159ee6ba1d3cbb4c36ab0eedef061bd0e1', '[\"*\"]', '2023-12-10 08:15:22', '2023-12-10 06:39:32', '2023-12-10 08:15:22'),
(8, 'App\\Models\\User', 57, 'token', '582e88590f60e4b1841f086ab1f616936c24ec3c0b0facd9b259a2e53454d6c8', '[\"*\"]', '2023-12-12 06:57:16', '2023-12-11 10:29:48', '2023-12-12 06:57:16'),
(9, 'App\\Models\\User', 57, 'token', 'cb7a39ea32f3477af1008365e1baff91233735d2357f3ad8b64de3b47be89801', '[\"*\"]', '2023-12-12 05:57:34', '2023-12-12 05:57:13', '2023-12-12 05:57:34'),
(10, 'App\\Models\\User', 57, 'token', '5211247a3412f2249ebf86b5c9a2353d10c4980e7f8053ce179d86acfa4d3243', '[\"*\"]', '2023-12-12 11:17:44', '2023-12-12 11:16:45', '2023-12-12 11:17:44'),
(11, 'App\\Models\\User', 56, 'token', '9b5ded8c9d4c93fef5f5417c91ff6707584ded39935a40a245d71149fbba1287', '[\"*\"]', '2023-12-12 11:37:21', '2023-12-12 11:18:23', '2023-12-12 11:37:21'),
(12, 'App\\Models\\User', 57, 'token', '71fa898942375ba31c01b0588d81db0065d86bd66eb3411a2da379f4acff8717', '[\"*\"]', NULL, '2023-12-12 11:25:40', '2023-12-12 11:25:40'),
(13, 'App\\Models\\User', 57, 'token', '87a0a73c29016c4d5652b47d47c5178ca8995eaed2edcce29d25d284f44ebfce', '[\"*\"]', '2023-12-12 11:45:39', '2023-12-12 11:41:30', '2023-12-12 11:45:39'),
(14, 'App\\Models\\User', 57, 'token', 'ad8f92c8b72cb85b93295f576d36ebcbf6bc8007c4dc771006671abc561f6732', '[\"*\"]', '2023-12-21 09:07:28', '2023-12-12 11:46:01', '2023-12-21 09:07:28'),
(15, 'App\\Models\\User', 56, 'token', '43bf0ea61fc65fb5bd1362f066fb2c62ca1811add3b028ab1fa35da9c1d140d3', '[\"*\"]', '2023-12-12 11:49:03', '2023-12-12 11:49:02', '2023-12-12 11:49:03'),
(16, 'App\\Models\\User', 57, 'token', 'c78f78b466d474a91f8be35b53870754eeab8c026322cc93b7f2168244dfbd75', '[\"*\"]', '2023-12-17 10:08:21', '2023-12-13 04:47:57', '2023-12-17 10:08:21'),
(17, 'App\\Models\\User', 57, 'token', 'de04a617acd5b3d82f1004e4685e0320df3a1d5771bf950167bfa3ece0bb752c', '[\"*\"]', '2023-12-13 09:31:25', '2023-12-13 09:31:03', '2023-12-13 09:31:25'),
(18, 'App\\Models\\User', 57, 'token', 'ef629d0177fd0d9dbb9fc0d32950c3eeb426fe64231dd1149db64d142df81a5c', '[\"*\"]', '2023-12-21 04:54:03', '2023-12-13 09:33:09', '2023-12-21 04:54:03'),
(19, 'App\\Models\\User', 57, 'token', '937c47c9011881dbe433c256e6597e6368ed15090cda8b96b92012c55a483a02', '[\"*\"]', '2023-12-14 09:25:19', '2023-12-14 09:25:16', '2023-12-14 09:25:19'),
(20, 'App\\Models\\User', 57, 'token', '744aa4897a1756b075ec6e3b71ada14bcdf132371f12e2479ff32ea50f1400aa', '[\"*\"]', '2023-12-17 10:08:09', '2023-12-17 06:22:43', '2023-12-17 10:08:09'),
(21, 'App\\Models\\User', 57, 'token', '72fa440d78bf274ac3ed9cfbf12ddda5e85752b9ad4f4b82614205c0c80a95c1', '[\"*\"]', '2023-12-17 07:19:51', '2023-12-17 07:12:54', '2023-12-17 07:19:51'),
(22, 'App\\Models\\User', 57, 'token', '5d366b74035a21c5c528e40f1bcebe41666ad7754d3e1d80e730412493f8f22d', '[\"*\"]', '2023-12-17 11:27:27', '2023-12-17 07:26:57', '2023-12-17 11:27:27'),
(23, 'App\\Models\\User', 57, 'token', '7c2d0213db3513bf186a9dcfc1c4be627211e6cfba40f5ac177fc6cda2c506c3', '[\"*\"]', '2023-12-17 11:52:30', '2023-12-17 10:08:20', '2023-12-17 11:52:30'),
(24, 'App\\Models\\User', 57, 'token', '54d174040addce82a5e6710358bb56625317216bed42996e80fa20adc8639be3', '[\"*\"]', '2023-12-17 10:19:29', '2023-12-17 10:08:38', '2023-12-17 10:19:29'),
(25, 'App\\Models\\User', 57, 'token', '6c49e3e118d75fcd79d7811cade818eb3ba2fb8809f22ef95c425f7b3558877d', '[\"*\"]', '2023-12-17 10:12:32', '2023-12-17 10:09:17', '2023-12-17 10:12:32'),
(26, 'App\\Models\\User', 57, 'token', '00cc336545700b4c3d9422ecd33f74c7b9b6d7c33556174ee6eab92cfea228cc', '[\"*\"]', '2023-12-18 05:50:05', '2023-12-17 12:11:41', '2023-12-18 05:50:05'),
(27, 'App\\Models\\User', 57, 'token', 'ee8ede07e1277280666db152ffbf3b01d741ecfe62fc7f791e7adc16805e2ab6', '[\"*\"]', '2023-12-18 06:32:04', '2023-12-18 04:41:58', '2023-12-18 06:32:04'),
(28, 'App\\Models\\User', 57, 'token', 'e7481912f71fc238270e90047e09ec6c03d180bcdede22da4d0ff0100c930ba0', '[\"*\"]', NULL, '2023-12-18 11:34:24', '2023-12-18 11:34:24'),
(29, 'App\\Models\\User', 57, 'token', 'ef96dd009e8cb95e41e6f7cb6a161c81f52ca3d39a6805d50bd85be2e51e104d', '[\"*\"]', NULL, '2023-12-18 11:34:28', '2023-12-18 11:34:28'),
(30, 'App\\Models\\User', 57, 'token', '7ac2c06b5d11c9fa6ac2cde0b3f0d33d5bdeb6ff9f6944f193df5bbba57251e4', '[\"*\"]', '2023-12-18 11:35:03', '2023-12-18 11:34:57', '2023-12-18 11:35:03'),
(31, 'App\\Models\\User', 57, 'token', '9f7ac5629c957d1ebbf20d872b94c79e4a49db34fa4bfb436656695de2544b52', '[\"*\"]', NULL, '2023-12-20 09:45:57', '2023-12-20 09:45:57'),
(32, 'App\\Models\\User', 57, 'token', 'c0b5c9a1b7c46fd250a9888a56e881a95b7eae65a5f39e059834e9be55db85c8', '[\"*\"]', '2023-12-20 10:30:48', '2023-12-20 09:55:24', '2023-12-20 10:30:48'),
(33, 'App\\Models\\User', 57, 'token', 'ae4d9c932ab5e785dd4c46791478566b6ed04b9c2c6edb63e5aefbdd5f5c4995', '[\"*\"]', '2023-12-21 09:09:55', '2023-12-21 09:08:27', '2023-12-21 09:09:55'),
(34, 'App\\Models\\User', 57, 'token', 'e88bd48bd9b2f8fa855b4677777435ab6ceec21843ca9072647fe1ac9f849a03', '[\"*\"]', '2023-12-21 09:38:34', '2023-12-21 09:35:56', '2023-12-21 09:38:34'),
(35, 'App\\Models\\User', 54, 'token', '15cf5fada248e1626aec8e2f50cbbe4193676b013c255bdffad1564a6aee1438', '[\"*\"]', '2023-12-21 09:41:18', '2023-12-21 09:39:44', '2023-12-21 09:41:18'),
(36, 'App\\Models\\User', 57, 'token', '3df5a863820b4241c13f086544a9d9658833fa7d03f00a0117c1c4fba01b6186', '[\"*\"]', '2023-12-21 09:51:21', '2023-12-21 09:41:29', '2023-12-21 09:51:21'),
(37, 'App\\Models\\User', 54, 'token', '0b53bc64d042519f874e952ba6a5c95b5bcf8032aabe3f19f8a6d5661db9e7c3', '[\"*\"]', '2023-12-21 09:51:30', '2023-12-21 09:51:30', '2023-12-21 09:51:30'),
(38, 'App\\Models\\User', 57, 'token', '5b307581344242bca021c6823674849b437eb66b742079de74f16394ae92fdd5', '[\"*\"]', '2023-12-24 10:22:01', '2023-12-21 10:02:39', '2023-12-24 10:22:01'),
(39, 'App\\Models\\User', 57, 'token', '67296c1a65f56902eb4b5620216de893ca01ef041a9f594aae5268d681398118', '[\"*\"]', '2023-12-26 23:42:51', '2023-12-26 23:39:31', '2023-12-26 23:42:51'),
(40, 'App\\Models\\User', 57, 'token', 'c1546d2e24ed381d114dfe27f483e54930536c963b5f18452f09eb216e60fffa', '[\"*\"]', '2023-12-26 23:43:52', '2023-12-26 23:43:47', '2023-12-26 23:43:52'),
(41, 'App\\Models\\User', 89, 'token', '0a46602fa76180b68d05187f18919bb0c5689a78ec7ce215659adf481f7189c5', '[\"*\"]', '2023-12-27 00:09:22', '2023-12-26 23:44:21', '2023-12-27 00:09:22'),
(42, 'App\\Models\\User', 89, 'token', '0e0cd66f209392d91278c0e529a8e1fb20c596f78222ad0d56dbae370381d493', '[\"*\"]', NULL, '2023-12-27 00:14:55', '2023-12-27 00:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reproduction_and_breedings`
--

CREATE TABLE `reproduction_and_breedings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `breeding_date` date NOT NULL,
  `fertility_history` text NOT NULL,
  `cattle_id` text NOT NULL,
  `user_id` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reproduction_and_breedings`
--

INSERT INTO `reproduction_and_breedings` (`id`, `breeding_date`, `fertility_history`, `cattle_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2023-12-10', 'images/thZ3e9gydhwJBDr4SGoy0diAJxHEOcSJiz5qUpwC.png', '6', '57', '2023-12-11 10:58:56', '2023-12-11 10:58:56'),
(3, '2023-12-06', 'images/j3seVnmREVHNWtFex21CMUY14ljmoebFwKGVyVlc.jpg', '6', '57', '2023-12-18 06:27:59', '2023-12-18 06:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `nid` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `company_website` varchar(255) DEFAULT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT 'f',
  `company_id` varchar(255) DEFAULT NULL,
  `agent_employee_id` varchar(255) DEFAULT NULL,
  `agent_id` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `address`, `nid`, `dob`, `company_website`, `company_logo`, `role`, `company_id`, `agent_employee_id`, `agent_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tahmid Ferdous', 'tahmid.tf1@gmail.com', '01828665566', NULL, '$2y$10$cJOfvdj70Jwse52t8Ac9teGFiG1j.6RdzrrLQs2.rA6xCNMzuNLee', NULL, NULL, NULL, NULL, NULL, 's', NULL, NULL, NULL, NULL, '2023-09-04 00:13:07', '2023-09-04 00:13:07'),
(54, 'WeGro', 'info@wegrow.global', '01322891563', NULL, '$2y$10$CHvoxeUw2ywr6orsvXyy2ecQIEuLIMnjtJUxHCik9q3AA2NDhXOHq', 'Dhaka, Bangladesh', NULL, NULL, NULL, 'images/Chf9yryuaHSzEch0INVtE6WxrW6JXw6NEBiROY6f.jpg', 'c', NULL, NULL, NULL, NULL, '2023-12-04 11:32:48', '2023-12-04 11:32:48'),
(55, 'Pheonix Insurance', 'mail@phoenixinsurance.com', '01828665511', NULL, '$2y$10$XrYrWHJTpAB8pfBnt8bEM.8tXpaB51VLDOhDhUXzV0nfRcA57iWVy', 'Dhaka Bangladesh', NULL, NULL, NULL, 'images/GhAzMie2k0wON0o5VTM86RKG1LmkHoexJpt61gQG.jpg', 'c', NULL, NULL, NULL, NULL, '2023-12-04 11:41:08', '2023-12-04 11:41:08'),
(56, 'Test Company', 'test_compnay@g.com', '01828665513', NULL, '$2y$10$HDqtn0OFXyQ1NEd7wNx.QeadJmlBBWP1jZojg6MV2J8D4HBb7FhEC', 'Test', NULL, NULL, NULL, 'images/6VMjys9NL13rO8n4V7iCxKkBbqPAEeUTEfmONMdY.jpg', 'c', NULL, NULL, NULL, NULL, '2023-12-04 12:01:15', '2023-12-04 12:01:15'),
(57, 'Test Farmer', NULL, '01828665514', NULL, '$2y$10$XI7/.SYrZ/xCtBk4FdPIu.ox2/U2vhoxqN.nlRK4o7FJqZYfua1am', 'Test', NULL, NULL, NULL, 'images/ojlFjE2adeFL10FB0W1g8EsMaZCJ14afMU6IBw6r.jpg', 'f', '56', '11111', NULL, NULL, '2023-12-04 12:03:02', '2023-12-04 12:03:02'),
(58, 'Marzina', NULL, '01725196318', NULL, '$2y$10$3t/bHgqtF.dJr5DqZK.rb.L2OPOgUhM1AOnID1bfsoMz06rqwtC1e', 'Gojiyabari. Khatiyamari dhunat bogura', NULL, NULL, NULL, 'images/rLbreixfu1dTXRn1m4l3MHvQ7ynwFHKYgvR9Eqf7.jpg', 'f', '54', '2696402489439', NULL, NULL, '2023-12-04 19:08:42', '2023-12-04 19:08:42'),
(59, 'Runa begum', NULL, '01740211898', NULL, '$2y$10$a6a23SJ1MuAWp5kgaRfUKe.CgMjOo8PPhOO9jrE/V3YU.g7s155Lq', 'Rampura .mothurapur.dhunat.bogura', NULL, NULL, NULL, 'images/z0EMcHhoOuHUKhdGWN359638LtPp0Pun5eSVdxCb.jpg', 'f', '54', '1932905696', NULL, NULL, '2023-12-04 19:10:04', '2023-12-04 19:10:04'),
(60, 'Alamgir Hossain', NULL, '01725320659', NULL, '$2y$10$UFnWchFmOBLSkXH4DWmDuu37CQqM1CkOg50117E.vBVIrXTE/Txdq', 'Gojiyabari.khatiyamari. gopalnogar.dhunat.bogura', NULL, NULL, NULL, 'images/71HM1LMDifOi4PRLGyAAG616ohyj4W0KxBZXDEOv.jpg', 'f', '54', '3733613321', NULL, NULL, '2023-12-04 19:11:20', '2023-12-04 19:11:20'),
(61, 'Md Omar Faruk', NULL, '01328137667', NULL, '$2y$10$LV6pmeJr7rb2QEq9t3CGcuUIKk7VHCmxt1OimnoXyQSj5PIONxySS', 'Natabari dhunat bogura', NULL, NULL, NULL, 'images/mrewJRbNylqJ8u0uMw0BmTFWXl2U9U1e32BOt50F.jpg', 'f', '54', '2832900290', NULL, NULL, '2023-12-04 19:12:35', '2023-12-04 19:12:35'),
(62, 'Sabina Yesmin', NULL, '01794798960', NULL, '$2y$10$BUQ4h7all48XkxwMbAFQr.rZeEFAMUlUVCKPR9SgiB0uHwAJKjcri', 'Kokhsabari.gosaibari dhunat bogura', NULL, NULL, NULL, 'images/cKtMq4cXmekI1i398zROiN8je0mhNv3cyUenTSxG.jpg', 'f', '54', '7772910621', NULL, NULL, '2023-12-04 19:13:36', '2023-12-04 19:13:36'),
(63, 'Anarul Mia', NULL, '01313308387', NULL, '$2y$10$iR3K3GK1FgobOX4EZEbi..DpXx/q8l2ayITueKUnqavcYcZC7DKZm', 'West Jhinia, Jhinia, Dahband, Sundarganj, Gaibandha', NULL, NULL, NULL, 'images/AudzFgO4f3njbEHAhZGr6qxtse3MzdCPIhiTwjR7.jpg', 'f', '54', '3270398591', NULL, NULL, '2023-12-06 10:29:38', '2023-12-06 10:29:38'),
(64, 'MST Lucky Begum', NULL, '01717674628', NULL, '$2y$10$6Zad6Mw0hjrl9L35R3DjNOU3mBKOAqpZ6HuXBnt3auJ.nAn/gtouK', 'South Dhumaitari, Jhinia, Sundarganj, Gaibandha', NULL, NULL, NULL, 'images/IWmrhMV5C7smwmaXihWoGXWBtI6XoYg1smGLnUlw.jpg', 'f', '54', '8670325128', NULL, NULL, '2023-12-06 10:35:40', '2023-12-06 10:35:40'),
(65, 'MD Sobuj Mia', NULL, '01717226628', NULL, '$2y$10$aL.r58n6yq0Rz/i4XCnU7O.rxHNUazRDU6KbGDX.t3ZhOrPtEJRya', 'West Jhinia, Jhinia, Dahband, Sundarganj, Gaibandha', NULL, NULL, NULL, 'images/G3euLpxCFRiiCVAivLAxiftU8Am0AQagXPpZjuwh.jpg', 'f', '54', '3720422868', NULL, NULL, '2023-12-06 10:43:14', '2023-12-06 10:43:14'),
(66, 'MD Sofikul Islam', NULL, '01714256620', NULL, '$2y$10$4T/LmBe6TLwcZXWA2f8KEuvdjj8bQGXjPLpE26aIJHnz/W87pNXda', 'South Dhumaitari, Jhinia, Sundarganj, Gaibandha', NULL, NULL, NULL, 'images/3SayrEVkiK16N0w8ntgpCvaVGh9VjIwZlRZoNevB.jpg', 'f', '54', '5550818305', NULL, NULL, '2023-12-06 10:55:57', '2023-12-06 10:55:57'),
(67, 'MST Shefali Begum', NULL, '01746419445', NULL, '$2y$10$lVoAzb9FAhzjA0qko4EGzeoQ8Bvu5N.u1BefkiW1buTmocOAO5PYa', 'West Jhinia, Jhinia, Dahband, Sundarganj, Gaibandha', NULL, NULL, NULL, 'images/661IG8x4Wf1htOe9aBSDhnUBMq0L2Dq5KC5c2A8p.jpg', 'f', '54', '6870389290', NULL, NULL, '2023-12-06 10:59:06', '2023-12-06 10:59:06'),
(68, 'Mst Nurnahar', NULL, '01714747190', NULL, '$2y$10$vk/wjHAlFcS4txnQtOOUM.MZsePY5MmYUxfUt3lkwtAQUaSh4eaC6', 'Boirampur badarganj', NULL, NULL, NULL, 'images/pMKFvHRRtr93sVm00deR2Ul5AGvlghlmnFxz7GtC.jpg', 'f', '54', '20062717743145500', NULL, NULL, '2023-12-07 18:08:10', '2023-12-07 18:08:10'),
(69, 'Mst Bilkis Begum', NULL, '01796003050', NULL, '$2y$10$A5gm7EMzMDZKkNa2CVHUCuPU2bt3reCr17MwsLyEfKvtnZSbetSim', 'Nataram /shonkorpur', NULL, NULL, NULL, 'images/jiS30U5JeHTqfH1xZEdSltFVhq59HkAyAKTLi3sZ.jpg', 'f', '54', '8510363152357', NULL, NULL, '2023-12-10 09:34:58', '2023-12-10 09:34:58'),
(70, 'Mehedi Hassan', NULL, '01946286322', NULL, '$2y$10$U62ZTaF6mYIeqBNh4TnsbuTD/EOahqdqKBrL5eXoDbLr8cCFBDJii', 'Somospur,Pairahat,Abhaynagar,Jeshore.', NULL, NULL, NULL, 'images/FsW5BXFHG0WapgtPdJWbdnNvXTIjiRdqkTL08bkE.jpg', 'f', '54', '3264092259', NULL, NULL, '2023-12-10 09:42:27', '2023-12-10 09:42:27'),
(71, 'Md Mizanur Rahman', NULL, '01816648845', NULL, '$2y$10$RGUFytsU0YW5KOUjyadOt.jIWG22pBCzG0y6eag7T2wusmouG.B4m', 'Boirampur badarganj', NULL, NULL, NULL, 'images/Mcy6VFz2xDIDDo0aGajp3yGurbBpOHIBd8fZwZP5.jpg', 'f', '54', '123456789', NULL, NULL, '2023-12-11 06:56:04', '2023-12-11 06:56:04'),
(72, 'MD Soriful Islam', NULL, '01986919205', NULL, '$2y$10$fDC1G8ISHBd.R2RasXPrPOCmP5MXC.QrExbccJHPpbvGkj51K9D/O', 'Kota payra hat avoynagor Jessore', NULL, NULL, NULL, 'images/ire3IYA6aj1PY5rFH3ZEgIYE2ZXbHuQf4YRibukN.jpg', 'f', '54', '4654307539', NULL, NULL, '2023-12-11 07:05:54', '2023-12-11 07:05:54'),
(73, 'Hasanur Rohoman', NULL, '01917038415', NULL, '$2y$10$IGFl2InuPbCBF1ufljtzYOtt3CsgEOSbm2YLB9NuQ3kbNBn0Qo1Mi', 'Goradair,Pairahat,Abhaynagar,Jeshore', NULL, NULL, NULL, 'images/qYp9GXqEqip64qz9XDwzOUFAD50eFUrVxTqE59g0.jpg', 'f', '54', '3295215242', NULL, NULL, '2023-12-11 07:16:51', '2023-12-11 07:16:51'),
(74, 'Md Imdad Hossain', NULL, '01717995132', NULL, '$2y$10$Wll7DQjRepZAqPnF.3gjw.nsoGyzHITzheq5r1O8slwlnGrCoJ8Ju', 'Balidah,Pachakori,Abhaynagar,Jeshore', NULL, NULL, NULL, 'images/WxIyZASYDclSLPC8dfMZqZyo4KOroc4u4G9XUJQV.jpg', 'f', '54', '4116183663011', NULL, NULL, '2023-12-11 07:26:47', '2023-12-11 07:26:47'),
(75, 'Rikabul', NULL, '01322084326', NULL, '$2y$10$CPWZU0jvIbgZiV2BYVMlUO70CrHCxAZGPlhdvp310ERCQt1HDATwG', 'Kota payra avoynagor Jessore', NULL, NULL, NULL, 'images/Wa77Smt5acD5FbHRsCb5p9W3RsK6eyubaCrsS1jo.jpg', 'f', '54', '9558395019', NULL, NULL, '2023-12-11 08:54:50', '2023-12-11 08:54:50'),
(76, 'Khandokar moinul Islam', NULL, '01723337393', NULL, '$2y$10$SZYRgjALKQMLrOvxo5gv6.Ct0Gv50NNEnCtiDmTHKFwqUKllyTq1e', 'Kota payra avoynagor Jessore', NULL, NULL, NULL, 'images/cjwLFJMpKYbKpmWBfXY4NYFwmqgibg6pvcu6CpoF.jpg', 'f', '54', '6423324158', NULL, NULL, '2023-12-11 08:59:56', '2023-12-11 08:59:56'),
(77, 'Manum billah', NULL, '01935308475', NULL, '$2y$10$lidelAviVPXi.GiJyX19HOqiEkF/eO2LcV2u0qu.IsYy4fGKvd.kS', 'Kota payra avoynagor', NULL, NULL, NULL, 'images/DGZ8tMlJ4I1qN0R7krle3F3uh20ocsDJxLsVcO3N.jpg', 'f', '54', '2854232523', NULL, NULL, '2023-12-11 09:07:31', '2023-12-11 09:07:31'),
(78, 'Mohan Kumar Mitra', NULL, '01315332567', NULL, '$2y$10$/5nIqbrDUgXQllLnlDenX.Jt.SGmiUAl3i6ioMfnVz38QKTLoVyo2', 'nehalpur manirampur Jessore', NULL, NULL, NULL, 'images/C6B9RqTCFvRwHa9cD0NmPiZ3RUHFcbzIGDwS8M5V.jpg', 'f', '54', '19914116183000100', NULL, NULL, '2023-12-11 09:17:00', '2023-12-11 09:17:00'),
(79, 'Mst shapla Begum', NULL, '01774205433', NULL, '$2y$10$ClCvotVFbf8itCgWKirlbOgyXAQMBr4B5mYSIX4Sacby2fiN/DEaS', 'Kalopara,Bodorgonj', NULL, NULL, NULL, 'images/ysESGcjUw1N9SliFxRYKv9dHqJ47n9lJT9krfw6U.jpg', 'f', '54', '8510316320642', NULL, NULL, '2023-12-11 09:21:23', '2023-12-11 09:21:23'),
(80, 'Mst Nalo My', NULL, '01739113371', NULL, '$2y$10$Wq6QnSeE7HSZxZDEU.cxTOBouEncJbAZYTGT3h0rlrBZNN/TfJqRe', 'Kalopara,Bodorgonj', NULL, NULL, NULL, 'images/W89gVh91ebHUvUUqRA8zHSmIttDwc0AE2Xfvtj6B.jpg', 'f', '54', '8510316321055', NULL, NULL, '2023-12-11 09:32:26', '2023-12-11 09:32:26'),
(81, 'Salma Begum', NULL, '01922666985', NULL, '$2y$10$1SR0fZhi0H3e6z55LOhVK.CCcXW8yslzZNE2jsFOVIyl55ZnLDX7C', 'Balidha pachakori Monirampur Jessore', NULL, NULL, NULL, 'images/4vCrD7FlHfr5MaU06dPaQywRxQPcMs8PgHRuCSBj.jpg', 'f', '54', '4116183659148', NULL, NULL, '2023-12-11 10:43:20', '2023-12-11 10:43:20'),
(82, 'MD. Atiar Rahman', NULL, '01738401840', NULL, '$2y$10$a43RYKIdCG8YCYZDNX4aAuU69xOsVz0qh09sMVdv0YR6ddLZKn2Cm', 'East Baidyanath, Sonora, Sundarganj, Gaibandha', NULL, NULL, NULL, 'images/umLVGgb5zjTKpfL9g6Cux6ysFRZvLEhkQFREHMRN.jpg', 'f', '54', '8669703277', NULL, NULL, '2023-12-11 10:44:00', '2023-12-11 10:44:00'),
(83, 'Mst Jahanara Khatun', NULL, '01738653247', NULL, '$2y$10$fOyekofNob4N0EOMERyETeEWfNre2fTOE5AbHI6gTO7OQirrAx9BW', 'Kalopara, Bodorgonj', NULL, NULL, NULL, 'images/Tz9RQ1BFQdacnlgxWlbe2RuoBa0zKRFRt6PVWjwX.jpg', 'f', '54', '19918510316000000', NULL, NULL, '2023-12-11 10:48:19', '2023-12-11 10:48:19'),
(84, 'MST. Rahima Begum', NULL, '01764986750', NULL, '$2y$10$T1WX1qvWq/fuuy0qy4pliOaiNZaW5k/UbcqazjpSfsI9v4cv/uVR2', 'Baidyanath, Sonora, Sundarganj, Gaibandha', NULL, NULL, NULL, 'images/wilmLzUjggJzvNOCKfYqbrKfKmRiwxy269UF2dcL.jpg', 'f', '54', '9219182831114', NULL, NULL, '2023-12-11 10:49:14', '2023-12-11 10:49:14'),
(85, 'Joynur Begum', NULL, '01837954880', NULL, '$2y$10$Fu4YG4Ut/.c6t3jzVRXMWe6DatUGMR2hcXcPkyt5F9ZZtHtYHMB62', 'Balidha pachakori Monirampur Jessore', NULL, NULL, NULL, 'images/vJM2mbFhQnJX6xpMbXqaVo4qwwxwnSnaMkMYKDFZ.jpg', 'f', '54', '4116183659171', NULL, NULL, '2023-12-11 10:51:40', '2023-12-11 10:51:40'),
(86, 'MD Momdel Hossain', NULL, '01767414772', NULL, '$2y$10$HWy5VIiHJeWab8ZZ0MQp5.CUk.mGfz5o2z9UZighEw1YGLVVhRDFe', 'Buirumpur', NULL, NULL, NULL, 'images/fRwxJmsMuj5RF9Lo9m5x594GsTMdwX5dG76Va8Ke.jpg', 'f', '54', '8510316319683', NULL, NULL, '2023-12-11 14:54:27', '2023-12-11 14:54:27'),
(87, 'Mst Aduri Begum', NULL, '01796770372', NULL, '$2y$10$piXmUC5tVQ06RU2n2XGs3.SmLvNtrywkiyGif8JvaM0x2/ZnPRkyS', 'Kalopara, Hazipara', NULL, NULL, NULL, 'images/evX0jVTthbHFwhwqcZW1r2BY0TGFqULhjVYhb9a6.jpg', 'f', '54', '8510316324914', NULL, NULL, '2023-12-11 14:55:44', '2023-12-11 14:55:44'),
(88, 'MD Shahin Mia', NULL, '01753206862', NULL, '$2y$10$hVYUIlEhRAyu.mhf/7O6pea980H8FFnCkaOZllDD591PjqzqgH6Rq', 'Hasupara, kalopara', NULL, NULL, NULL, 'images/ETPVEIQVan7g5YGo34PVLlKFcDw3D4uON5Hs0KqF.jpg', 'f', '54', '19928510316000000', NULL, NULL, '2023-12-11 14:56:35', '2023-12-11 14:56:35'),
(89, 'MD Shafiar Rahman', NULL, '01315734807', NULL, '$2y$10$udFvPUn3GmbObaOrLzp1Q.OYQ2xv3sv/vHuCUs/mtA3Uh14dGwtGS', 'Buirumpur,Miapara', NULL, NULL, NULL, 'images/6ErXrnYK3Xh0ylDovMo08hO3mpFhQGCgY82TH9gz.jpg', 'f', '54', '8510316319393', NULL, NULL, '2023-12-11 14:57:44', '2023-12-11 14:57:44'),
(90, 'MD Nurujjaman Haque', NULL, '01750830108', NULL, '$2y$10$dORgr2nzHlyHHsoJ4VGpdeb7pY9rpwzdxdzfVLPqBmUQOAvKOouqu', 'Potimari,kalopara', NULL, NULL, NULL, 'images/EkeGY1cA79MeGMnBkcD5hXF0ntXerHpYGTjXabKY.jpg', 'f', '54', '8510316323592', NULL, NULL, '2023-12-11 14:58:31', '2023-12-11 14:58:31'),
(91, 'Monitosh Kumar Mondol', NULL, '01320445229', NULL, '$2y$10$45sLvgT7Srbo.3sjCPixaeyGKP/Oe8Uria2uL3x2GS8wqYACRhpCe', 'Kadirpara,Pairahat,Abhaynagar,Jeshore,', NULL, NULL, NULL, 'images/deUAMHLajxVozcd3R4iZJYiVwGcMAOwRaXuP5waJ.jpg', 'f', '54', '1494966896', NULL, NULL, '2023-12-12 06:31:40', '2023-12-12 06:31:40'),
(92, 'Monirul Islam', NULL, '01929622309', NULL, '$2y$10$1P5L05j0O1n4sDjybdVVNuVywSXwS/PS5l7739DkhvE5Ftk7fdqdW', 'Somospur,Pairahat,Abhaynagar,Jeshore,', NULL, NULL, NULL, 'images/TvxyrsrYAq3e7PHnFOu7qfZcB8yBZoPJkIvANQjf.jpg', 'f', '54', '7331877519', NULL, NULL, '2023-12-12 06:37:36', '2023-12-12 06:37:36'),
(93, 'Most Rabeya parvin', NULL, '01740407497', NULL, '$2y$10$FUCL2iWFo22tP.Fyf.W8eO.W1QgDtdiZdDkZLZCuFLuWOSobB9BVW', 'Hatkholapara', NULL, NULL, NULL, 'images/hICdZnli7DWRU1XA97zRy9eDHUy1Pw3ZTpMkG6wL.jpg', 'f', '54', '1950780874', NULL, NULL, '2023-12-12 06:42:38', '2023-12-12 06:42:38'),
(94, 'Mst Faruma khatun', NULL, '01767044925', NULL, '$2y$10$PuGNyn56NpwHZbB3iLeZhuVnKbQftetn8pxWXQ/k59mMrJ2Op6zzK', 'Putimari', NULL, NULL, NULL, 'images/WVTdKvibxKzlOxcHQfX3IBYQ8ODYV7wLBBKG3vZO.jpg', 'f', '54', '8510316324384', NULL, NULL, '2023-12-12 06:48:46', '2023-12-12 06:48:46'),
(95, 'MD Aminul Haque', NULL, '01761863109', NULL, '$2y$10$7PgOoIHEkHdIxb3nybwPvuXco9f3LynJvtraCD3bdnWj45wAbwcPy', 'Hatkholapara', NULL, NULL, NULL, 'images/IchXT6LzkDdl3t03t9yULwd4ENr4AAEhrv8j3SOw.jpg', 'f', '54', '8510316325020', NULL, NULL, '2023-12-12 06:54:37', '2023-12-12 06:54:37'),
(96, 'MD Farukh Hossain', NULL, '01722668206', NULL, '$2y$10$UYEo14qrgHVGRYbTuo75beidCWyb5uIaB6/dYEdW4qyHmskNCx.KW', 'Hatkholapara', NULL, NULL, NULL, 'images/564DYq647PNvppG4VsAT39uUFmN36hl07W1Pp35x.jpg', 'f', '54', '8510316325051', NULL, NULL, '2023-12-12 06:59:16', '2023-12-12 06:59:16'),
(97, 'Rabiul Islam', NULL, '01917338351', NULL, '$2y$10$psR.ODsuZkX9Nx6gr0itl.5aTRJZDdJrFa.B/0ninges.ZuyYbESa', 'Dokhin Dhumitari , Jhinina , Sundarganj , Gaibandha Dokhin Dhumitari', NULL, NULL, NULL, 'images/2jXK4rFT6YiVfo5WYdR8A2JGLiO8vluvDOlK52Ek.jpg', 'f', '54', '3219131942697', NULL, NULL, '2023-12-12 07:05:38', '2023-12-12 07:05:38'),
(98, 'MD. Ranu. Mia', NULL, '01738043141', NULL, '$2y$10$LJwZXYEfowXw79mzzLGFoucQRtFcv0WAmiNT88rrNYK9TI.HA3HbG', 'Parigung', NULL, NULL, NULL, 'images/kIZOkKLDwNlsvDsnFc9zAoX11PbFSPMIYPLWz8dt.jpg', 'f', '54', '8517682593088', NULL, NULL, '2023-12-12 07:10:42', '2023-12-12 07:10:42'),
(99, 'MD. Moonaf Ali', NULL, '01750091837', NULL, '$2y$10$Uibpca3pTjRemEUp9lFh.OYIya5Wq9Z030rwAB/ucMXLnPKM4RIbG', 'Ramatpur', NULL, NULL, NULL, 'images/NgPkvk5e6SELueusqSY8eWHV8cpcYN1XCOCA409f.jpg', 'f', '54', '3734273984', NULL, NULL, '2023-12-12 07:22:32', '2023-12-12 07:22:32'),
(100, 'MD. Atiqur Rahman', NULL, '01722200096', NULL, '$2y$10$BEDLuj9uWgvIcxkpvTIi9eOhQEI55ejd2e2GATN98oe4GcnpKoO.6', 'Ramanutpur', NULL, NULL, NULL, 'images/mbcjcEcK3EVt8htYHmSxfhD0KpCggeEOruM709yl.jpg', 'f', '54', '8517682593322', NULL, NULL, '2023-12-12 07:28:05', '2023-12-12 07:28:05'),
(101, 'Shahida Begum', NULL, '01785373918', NULL, '$2y$10$sMYJlVN6G607ezJsvO.8Ae.hGCJ.wmj1fUvH7AgwVCjRTSlqBcZFy', 'East Sonora, Sonora, Sundarganj, Gaibandha.', NULL, NULL, NULL, 'images/ThHJRQA5wF3JOMPYqp5j1sXfsp0vA1nlei53qVV5.jpg', 'f', '54', '1919378987', NULL, NULL, '2023-12-14 06:43:48', '2023-12-14 06:43:48'),
(102, 'Saburon Nesa', NULL, '01752703743', NULL, '$2y$10$v0DsVfWX17ZR.eZVR4fl/OIRn67GAqdG1zSUncqcapavX.b2NobEm', 'Balidha pachakori Monirampur', NULL, NULL, NULL, 'images/mqfMysoVqWQwVjefUyA2hWlfAb2TLw2OswuLJjxr.jpg', 'f', '54', '4116183659733', NULL, NULL, '2023-12-17 05:15:48', '2023-12-17 05:15:48'),
(103, 'Mojibul Rahman', 'abcd@gmail.com', '01959938009', NULL, '$2y$10$d6r4I5aLYH.vxr9vJv1C4.XHIiqYi4Y7RRG7cJue/Iisnn1mC0U4C', 'Shukarabd, Dhaka Bangladesh', NULL, NULL, NULL, 'images/9Ugk8rcihIusKuvwgm05B1WRACdqTuOCsAQlLzv2.png', 'f', '56', '12345678', NULL, NULL, '2023-12-17 06:37:52', '2023-12-17 06:37:52'),
(104, 'Shompod Agro', 'shompod@gmail.com', '01959938008', NULL, '$2y$10$EukB0wo0ZbxcZ3KfTp52D.ZUlXiYqsLCQloKygvgyx5z9HeZ32/GO', 'Raja Clinic, 5 No Word, Gangni, Meherpur', NULL, NULL, NULL, 'images/Kh6aRREQWDhEAu3qKquYNTdC6KsEVTruEk6Iw49m.jpg', 'c', NULL, NULL, NULL, NULL, '2023-12-19 08:35:42', '2023-12-19 08:35:42'),
(105, 'Sompod', NULL, '02959938010', NULL, '$2y$10$vu8ELvcU9M.JnuGCKidAZeHkfsE5kO/3/4xhp0TOItMfRaACli47G', 'Raja Clinic, 5 No Word, Gangni, Meherpur', NULL, NULL, NULL, 'images/hgyLtWauG4YIdpbeN0QUqSuijgiCNEtZff99XLNv.jpg', 'f', '104', '001', NULL, NULL, '2023-12-19 08:46:25', '2023-12-19 08:46:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal_informations`
--
ALTER TABLE `animal_informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_management`
--
ALTER TABLE `asset_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `budgeting_and_forecastings`
--
ALTER TABLE `budgeting_and_forecastings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cattle_registrations`
--
ALTER TABLE `cattle_registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cattle_reg_reports`
--
ALTER TABLE `cattle_reg_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_policies`
--
ALTER TABLE `company_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_profiles`
--
ALTER TABLE `company_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_expense_management`
--
ALTER TABLE `daily_expense_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `farmer_profiles`
--
ALTER TABLE `farmer_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feeding_and_nutrition`
--
ALTER TABLE `feeding_and_nutrition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `firms`
--
ALTER TABLE `firms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `firms_farm_name_unique` (`farm_name`);

--
-- Indexes for table `income_and_sells`
--
ALTER TABLE `income_and_sells`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurance_cash_requests`
--
ALTER TABLE `insurance_cash_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurance_claims`
--
ALTER TABLE `insurance_claims`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurance_requests`
--
ALTER TABLE `insurance_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insureds`
--
ALTER TABLE `insureds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_user_id_unique` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reproduction_and_breedings`
--
ALTER TABLE `reproduction_and_breedings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_agent_employee_id_unique` (`agent_employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal_informations`
--
ALTER TABLE `animal_informations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `asset_management`
--
ALTER TABLE `asset_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `budgeting_and_forecastings`
--
ALTER TABLE `budgeting_and_forecastings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cattle_registrations`
--
ALTER TABLE `cattle_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `cattle_reg_reports`
--
ALTER TABLE `cattle_reg_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `company_policies`
--
ALTER TABLE `company_policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_profiles`
--
ALTER TABLE `company_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daily_expense_management`
--
ALTER TABLE `daily_expense_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farmer_profiles`
--
ALTER TABLE `farmer_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feeding_and_nutrition`
--
ALTER TABLE `feeding_and_nutrition`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `firms`
--
ALTER TABLE `firms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `income_and_sells`
--
ALTER TABLE `income_and_sells`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `insurance_cash_requests`
--
ALTER TABLE `insurance_cash_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `insurance_claims`
--
ALTER TABLE `insurance_claims`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `insurance_requests`
--
ALTER TABLE `insurance_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `insureds`
--
ALTER TABLE `insureds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reproduction_and_breedings`
--
ALTER TABLE `reproduction_and_breedings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
