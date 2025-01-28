-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 28, 2025 at 05:27 PM
-- Server version: 8.0.40-0ubuntu0.24.04.1
-- PHP Version: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bhakti_laksa`
--

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `id` char(36) NOT NULL,
  `study_program_id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `name` varchar(128) NOT NULL,
  `learning_type` enum('Materi','Praktikum','Materi dan Praktikum') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`id`, `study_program_id`, `user_id`, `name`, `learning_type`, `created_at`, `updated_at`) VALUES
('14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', '23358889-d075-4e14-9f86-25096565bd63', 'fd356f52-1d0a-434e-88e7-d8bdd77bf39d', 'Backend Web Developoment', 'Materi dan Praktikum', '2025-01-22 01:31:43', '2025-01-27 10:16:46'),
('4f17d6d8-ac53-4a96-b6b8-cdcebd760a39', '23358889-d075-4e14-9f86-25096565bd63', 'fd356f52-1d0a-434e-88e7-d8bdd77bf39d', 'Mata Kuliah B', 'Praktikum', '2025-01-27 10:16:33', '2025-01-28 08:42:10'),
('c2634fcb-0252-42ec-a746-98a51f42b520', '23358889-d075-4e14-9f86-25096565bd63', 'fd356f52-1d0a-434e-88e7-d8bdd77bf39d', 'Matakuliah A', 'Materi', '2025-01-27 10:16:13', '2025-01-27 10:16:13');

-- --------------------------------------------------------

--
-- Table structure for table `lecture_details`
--

CREATE TABLE `lecture_details` (
  `id` char(36) NOT NULL,
  `lecture_id` char(36) NOT NULL,
  `attendance` float DEFAULT NULL,
  `task` float DEFAULT NULL,
  `discussion` float DEFAULT NULL,
  `responsi` float DEFAULT NULL,
  `uts` float DEFAULT NULL,
  `uas` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lecture_details`
--

INSERT INTO `lecture_details` (`id`, `lecture_id`, `attendance`, `task`, `discussion`, `responsi`, `uts`, `uas`, `created_at`, `updated_at`) VALUES
('09792a81-2ee2-45b6-bf89-9dee52cb3932', 'c2634fcb-0252-42ec-a746-98a51f42b520', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-27 10:16:13', '2025-01-27 10:16:13'),
('0c6c6fd0-7d3f-4013-adb8-c8c7b044c162', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 10, 0, 14, 16, 18, 20, '2025-01-22 01:31:43', '2025-01-27 10:16:46'),
('af9236c3-674a-4a32-8a7f-427e0c41f36d', '4f17d6d8-ac53-4a96-b6b8-cdcebd760a39', 10, 20, 0, 20, 25, 25, '2025-01-27 10:16:33', '2025-01-28 08:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` char(36) NOT NULL,
  `study_program_id` char(36) NOT NULL,
  `name` varchar(128) NOT NULL,
  `nim` char(10) NOT NULL,
  `email` varchar(128) NOT NULL,
  `class_of` char(4) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `study_program_id`, `name`, `nim`, `email`, `class_of`, `birth_date`, `created_at`, `updated_at`) VALUES
('4713c8e6-1b40-46d1-a608-32bdf27f388c', '23358889-d075-4e14-9f86-25096565bd63', 'Heru Kristanto', '23.01.5047', 'herukristanto@students.amikom.ac.id', '2023', '2004-12-30', '2025-01-21 22:30:44', '2025-01-21 22:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `student_courses`
--

CREATE TABLE `student_courses` (
  `id` char(36) NOT NULL,
  `student_id` char(36) NOT NULL,
  `lecture_id` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_courses`
--

INSERT INTO `student_courses` (`id`, `student_id`, `lecture_id`, `created_at`, `updated_at`) VALUES
('2410aeaa-c07f-4305-8679-59d43ae7fb48', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '4f17d6d8-ac53-4a96-b6b8-cdcebd760a39', '2025-01-27 22:41:22', '2025-01-27 22:41:22'),
('9c6f8326-1ed9-47c4-923f-4f6a9f093c76', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', '2025-01-27 08:30:27', '2025-01-27 08:30:27'),
('f6f8ccbf-d188-4b8f-8081-3a6f2d1f622f', '4713c8e6-1b40-46d1-a608-32bdf27f388c', 'c2634fcb-0252-42ec-a746-98a51f42b520', '2025-01-27 22:41:58', '2025-01-27 22:41:58');

-- --------------------------------------------------------

--
-- Table structure for table `student_grades`
--

CREATE TABLE `student_grades` (
  `id` char(36) NOT NULL,
  `student_id` char(36) NOT NULL,
  `lecture_id` char(36) NOT NULL,
  `grade` float NOT NULL,
  `type` enum('presensi','uts','uas','responsi','diskusi','praktikum') NOT NULL,
  `position` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_grades`
--

INSERT INTO `student_grades` (`id`, `student_id`, `lecture_id`, `grade`, `type`, `position`, `created_at`, `updated_at`) VALUES
('011dbca0-fa03-4753-8925-3de8d7f8b1db', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 90, 'diskusi', 8, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('0314a09f-7778-4c78-b7de-4562a93eb9e4', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 87, 'diskusi', 9, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('05463e34-5e36-40b9-8ca9-0befbd029515', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 90, 'diskusi', 13, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('07041c68-860f-4601-bc02-cf617e7b9aa4', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 91, 'praktikum', 13, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('08343733-f941-49be-88a2-f020163d1a2f', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 90, 'responsi', 1, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('11960657-a288-4867-83ce-f10d9318d883', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '4f17d6d8-ac53-4a96-b6b8-cdcebd760a39', 100, 'praktikum', 5, '2025-01-28 09:58:15', '2025-01-28 09:58:15'),
('126e709a-ce2f-4c62-908b-d6c7fc41593a', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '4f17d6d8-ac53-4a96-b6b8-cdcebd760a39', 100, 'praktikum', 11, '2025-01-28 09:58:15', '2025-01-28 09:58:15'),
('1686c3e6-fdec-4f8b-a1af-552a42a0d758', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '4f17d6d8-ac53-4a96-b6b8-cdcebd760a39', 100, 'uts', 1, '2025-01-28 09:58:15', '2025-01-28 09:58:15'),
('1cbde930-71a5-42f0-8891-c12a2655ec66', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 89, 'praktikum', 5, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('1f05da61-7f0e-4f6a-862e-6d555a3c9883', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 100, 'diskusi', 7, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('20d7f7f3-5506-467d-ad82-85a55653960f', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '4f17d6d8-ac53-4a96-b6b8-cdcebd760a39', 100, 'presensi', 1, '2025-01-28 09:58:15', '2025-01-28 09:58:15'),
('23fe4002-76b0-4eba-b16a-8c0ed82af26d', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '4f17d6d8-ac53-4a96-b6b8-cdcebd760a39', 100, 'praktikum', 12, '2025-01-28 09:58:15', '2025-01-28 09:58:15'),
('24a8a165-8c49-4f9d-b52f-ee315ea1982f', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 98, 'praktikum', 6, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('292c5262-7ab8-46b1-8cc5-f3f627e21d7a', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '4f17d6d8-ac53-4a96-b6b8-cdcebd760a39', 100, 'praktikum', 2, '2025-01-28 09:58:15', '2025-01-28 09:58:15'),
('295b2cb3-b532-49d2-a32c-488ca4f31d32', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 90, 'uas', 1, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('2bec5097-2948-4963-b372-853d03119cd4', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 100, 'praktikum', 7, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('2d710795-0f18-4385-a1e4-5a86c407987b', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 100, 'presensi', 1, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('357e62c1-c6f2-43cc-8648-16c870629df0', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '4f17d6d8-ac53-4a96-b6b8-cdcebd760a39', 100, 'praktikum', 4, '2025-01-28 09:58:15', '2025-01-28 09:58:15'),
('35cd7d47-f88d-4a26-9f5b-503d090803b1', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 100, 'praktikum', 11, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('3a564670-2333-4f44-8315-a7472187b562', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 89, 'diskusi', 1, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('49144413-cea1-4e79-8d74-929935e440c7', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '4f17d6d8-ac53-4a96-b6b8-cdcebd760a39', 100, 'praktikum', 3, '2025-01-28 09:58:15', '2025-01-28 09:58:15'),
('4bc8c886-51de-4693-a06a-288f94777e82', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 86, 'praktikum', 10, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('4dda136d-33a7-4ead-9faf-ca4e75c3cd46', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 98, 'responsi', 2, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('59592511-f412-4645-93f6-0cf594a4378b', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '4f17d6d8-ac53-4a96-b6b8-cdcebd760a39', 100, 'responsi', 1, '2025-01-28 09:58:15', '2025-01-28 09:58:15'),
('5cbe638a-0e31-4f78-88cf-ed454398a8a8', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 67, 'diskusi', 5, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('6244e6dc-9bdb-47ab-8564-22ef2cd79a13', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 88, 'praktikum', 12, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('657d304b-58be-4fd5-b171-8621d5e93286', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 90, 'diskusi', 4, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('7a275463-f5a6-4980-a835-b9795d6292c4', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '4f17d6d8-ac53-4a96-b6b8-cdcebd760a39', 100, 'responsi', 2, '2025-01-28 09:58:15', '2025-01-28 09:58:15'),
('7c2f310c-d5d6-4714-a566-7c68ea724b6d', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 100, 'praktikum', 1, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('7dea63fc-f34e-437f-aa58-0c7f9e48be68', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '4f17d6d8-ac53-4a96-b6b8-cdcebd760a39', 100, 'praktikum', 14, '2025-01-28 09:58:15', '2025-01-28 09:58:15'),
('897f6ca9-6dcb-43b8-935b-6b1fb8522cd3', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '4f17d6d8-ac53-4a96-b6b8-cdcebd760a39', 100, 'praktikum', 6, '2025-01-28 09:58:15', '2025-01-28 09:58:15'),
('8bc50e33-444d-4dda-8633-b4256be087e4', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 67, 'diskusi', 3, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('8c4260ab-cd54-44b5-97ec-ce5a95d399b6', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '4f17d6d8-ac53-4a96-b6b8-cdcebd760a39', 100, 'praktikum', 8, '2025-01-28 09:58:15', '2025-01-28 09:58:15'),
('af6a6330-9fae-4676-a7a2-02ef58825012', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 90, 'diskusi', 6, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('bf754f6a-50f9-449f-8164-6269b39ef8e5', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '4f17d6d8-ac53-4a96-b6b8-cdcebd760a39', 100, 'praktikum', 13, '2025-01-28 09:58:15', '2025-01-28 09:58:15'),
('bfc95150-5345-49ff-8d4a-1f0f3784e5ad', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 99, 'diskusi', 14, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('c77e4209-9a18-4b22-acf7-8011fd414064', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 87, 'praktikum', 4, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('c932bd75-4f24-468b-9647-7a9500293027', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '4f17d6d8-ac53-4a96-b6b8-cdcebd760a39', 100, 'praktikum', 10, '2025-01-28 09:58:15', '2025-01-28 09:58:15'),
('cd643f17-f3ca-46d3-8513-ae388e0afd49', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 90, 'praktikum', 8, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('d0d33692-f371-4cbb-adc6-51054325d2ee', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 40, 'praktikum', 14, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('d3115dec-1837-421b-bc50-0684918d2ca0', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 90, 'praktikum', 3, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('d9d5af7f-bad7-410b-8524-d8a598c07804', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 87, 'diskusi', 10, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('da91bb5f-bd80-4c78-81d3-7106873936fb', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 96, 'diskusi', 11, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('dc3a7603-04a8-4950-b531-57e7a8d0a1cc', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 78, 'diskusi', 2, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('e1349ddc-c326-4ee8-893a-89e14db63d3d', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 80, 'uts', 1, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('e27a71c5-4b02-4e6e-ac84-fc11d625cdc4', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '4f17d6d8-ac53-4a96-b6b8-cdcebd760a39', 100, 'praktikum', 7, '2025-01-28 09:58:15', '2025-01-28 09:58:15'),
('e2df9aa3-0875-46f3-951c-6142c6d57e6f', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '4f17d6d8-ac53-4a96-b6b8-cdcebd760a39', 100, 'praktikum', 1, '2025-01-28 09:58:15', '2025-01-28 09:58:15'),
('e6a79ffa-3cad-4e98-994b-b28f3e688e2c', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '4f17d6d8-ac53-4a96-b6b8-cdcebd760a39', 100, 'uas', 1, '2025-01-28 09:58:15', '2025-01-28 09:58:15'),
('e6cbe16e-7d90-49de-b41d-657226566c4a', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 70, 'praktikum', 2, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('e7fb6e25-7a5c-4ae4-bc8a-46571d0d511f', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 89, 'praktikum', 9, '2025-01-27 22:29:08', '2025-01-27 22:29:08'),
('e9ee5003-a4f1-4dc3-a0b1-e3dd08a4a52f', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '4f17d6d8-ac53-4a96-b6b8-cdcebd760a39', 100, 'praktikum', 9, '2025-01-28 09:58:15', '2025-01-28 09:58:15'),
('ec3b2b3d-e2ad-46a5-ab95-970a5bad75e3', '4713c8e6-1b40-46d1-a608-32bdf27f388c', '14d34092-bd1e-4f5d-97d2-7e9b5cf4ea2c', 100, 'diskusi', 12, '2025-01-27 22:29:08', '2025-01-27 22:29:08');

-- --------------------------------------------------------

--
-- Table structure for table `study_programs`
--

CREATE TABLE `study_programs` (
  `id` char(36) NOT NULL,
  `name` varchar(128) NOT NULL,
  `faculty` varchar(128) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `study_programs`
--

INSERT INTO `study_programs` (`id`, `name`, `faculty`, `created_at`, `updated_at`) VALUES
('23358889-d075-4e14-9f86-25096565bd63', 'D3 Teknik Informatika', 'Fakultas Ilmu Komputer', '2025-01-21 19:04:19', '2025-01-21 19:04:19'),
('8c941b3a-d066-4b3c-ae96-bea82cbf6991', 'S1 Ekonomi KK', 'Pasca Sarjana', '2025-01-21 19:04:33', '2025-01-21 19:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(16) NOT NULL,
  `gender` enum('Laki Laki','Perempuan') NOT NULL,
  `birth_date` date NOT NULL,
  `role` enum('administrator','dosen') NOT NULL DEFAULT 'dosen',
  `path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nik`, `name`, `email`, `password`, `phone_number`, `gender`, `birth_date`, `role`, `path`, `created_at`, `updated_at`) VALUES
('f17cb390-d81b-11ef-b456-0045e29fe723', NULL, 'Administrator', 'admin123@mail.com', '$2y$10$m3AWAhRMS78zQf5efaYMne.kPXrBekaZcalbgbEYkWzFJUGOmNiPa', '0859126462972123', 'Laki Laki', '2004-12-30', 'administrator', '/uploads/profile/1737967986_wp6137504-anime-rain-sad-wallpapers.jpg', '2025-01-21 17:18:46', '2025-01-27 09:08:01'),
('fd356f52-1d0a-434e-88e7-d8bdd77bf39d', '12345', 'Heru', 'heru@mail.com', '$2y$10$qADvLoXu084QDa8YNECBuuznfsj9EREFLGoieT9OvBCWwdygBFhqq', '0859126462972', 'Laki Laki', '2025-01-22', 'dosen', '/uploads/profile/1738064536_dosen-591ff0f41cafbda13512a766.png', '2025-01-21 21:36:20', '2025-01-28 11:42:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `study_program_id` (`study_program_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `lecture_details`
--
ALTER TABLE `lecture_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lecture_id` (`lecture_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `study_program_id` (`study_program_id`);

--
-- Indexes for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`,`lecture_id`),
  ADD KEY `lecture_id` (`lecture_id`);

--
-- Indexes for table `student_grades`
--
ALTER TABLE `student_grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `lecture_id` (`lecture_id`);

--
-- Indexes for table `study_programs`
--
ALTER TABLE `study_programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lectures`
--
ALTER TABLE `lectures`
  ADD CONSTRAINT `lectures_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lectures_ibfk_2` FOREIGN KEY (`study_program_id`) REFERENCES `study_programs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lecture_details`
--
ALTER TABLE `lecture_details`
  ADD CONSTRAINT `lecture_details_ibfk_1` FOREIGN KEY (`lecture_id`) REFERENCES `lectures` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`study_program_id`) REFERENCES `study_programs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD CONSTRAINT `student_courses_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_courses_ibfk_2` FOREIGN KEY (`lecture_id`) REFERENCES `lectures` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_grades`
--
ALTER TABLE `student_grades`
  ADD CONSTRAINT `student_grades_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_grades_ibfk_2` FOREIGN KEY (`lecture_id`) REFERENCES `lectures` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
