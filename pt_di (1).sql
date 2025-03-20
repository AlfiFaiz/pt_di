-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2025 at 07:34 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pt_di`
--

-- --------------------------------------------------------

--
-- Table structure for table `aircraft_programs`
--

CREATE TABLE `aircraft_programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program` varchar(255) NOT NULL,
  `aircraft_type` varchar(255) NOT NULL,
  `registration` varchar(255) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT 'default.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aircraft_programs`
--

INSERT INTO `aircraft_programs` (`id`, `program`, `aircraft_type`, `registration`, `customer`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Boeing 737 MAX', 'Boeing 737', 'PK-ABC', 'Garuda Indonesia', 'boeing737max.jpeg', '2025-03-19 04:33:37', '2025-03-19 04:33:37'),
(2, 'Airbus A320 Neo', 'Airbus A320', 'PK-DEF', 'Lion Air', 'default.png', '2025-03-19 04:33:37', '2025-03-19 04:33:37'),
(3, 'Boeing 787 Dreamliner', 'Boeing 787', 'PK-GHI', 'Batik Air', 'default.png', '2025-03-19 04:33:37', '2025-03-19 04:33:37'),
(4, 'Airbus A350', 'Airbus A350', 'PK-JKL', 'Singapore Airlines', 'default.png', '2025-03-19 04:33:37', '2025-03-19 04:33:37'),
(5, 'ATR 72-600', 'ATR 72', 'PK-MNO', 'Wings Air', 'default.png', '2025-03-19 04:33:37', '2025-03-19 04:33:37'),
(21, 'aaa', 'aaa', 'dsdd', 'ff', 'default.jpg', '2025-03-19 23:00:55', '2025-03-19 23:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `engineering_orders`
--

CREATE TABLE `engineering_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `aircraft_id` bigint(20) UNSIGNED NOT NULL,
  `engineering_order_no` varchar(255) NOT NULL,
  `subject_title` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `finish_date` date DEFAULT NULL,
  `type_order` enum('Basic Re-assy and Functional Test','Customizing Functional Test','Flight Line','Maintenance','SB, ASB, AND EASB') NOT NULL,
  `insp_stamp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `engineering_orders`
--

INSERT INTO `engineering_orders` (`id`, `aircraft_id`, `engineering_order_no`, `subject_title`, `start_date`, `finish_date`, `type_order`, `insp_stamp`, `created_at`, `updated_at`) VALUES
(5, 1, 'EO-025-38-000', 'PREPARATION AND RECEIVE THE AIRCRAFT', '2023-08-04', '2023-08-06', 'Basic Re-assy and Functional Test', 'G-15', '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(6, 1, 'EO-025-38-001', 'REMOVE PROTECTION ON THE AIRCRAFT', '2023-08-06', '2023-08-07', 'Basic Re-assy and Functional Test', 'G - 15', '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(7, 1, 'EO-025-38-002', 'JACKING AND RESTORE IN Q, M, L & A', '2023-08-07', '2025-03-27', 'Basic Re-assy and Functional Test', 'G - 15', '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(8, 1, 'EO-025-38-003', 'AUXILIARY TRANSMISSION INSTALLATION', '2023-08-11', '2023-08-13', 'Basic Re-assy and Functional Test', 'G-15', '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(9, 1, 'EO-025-38-004', 'MAIN ROTOR BLADE TEMPORARY INSTALLATION', '2023-08-13', '2025-03-21', 'Basic Re-assy and Functional Test', 'G -14', '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(10, 1, 'EO-025-38-005', 'HORIZONTAL & STABILIZER INSTALLATION', '2023-08-14', '2023-08-16', 'Basic Re-assy and Functional Test', 'G-15', '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(11, 1, 'EO-025-38-006', 'TAIL ROTOR INSTALLATION', '2023-08-16', NULL, 'Basic Re-assy and Functional Test', NULL, '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(12, 1, 'EO-025-38-007', 'FUNCTION CHECK AFTER ASSEMBLY (AIRCRAFT)', '2023-08-17', '2023-08-19', 'Basic Re-assy and Functional Test', 'G-15', '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(13, 1, 'EO-025-38-008', 'FUNCTION CHECK AFTER ASSY (AVIONIC)', '2023-08-19', '2025-03-26', 'Basic Re-assy and Functional Test', 'G - 15', '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(14, 1, 'EO-025-38-009', 'FUNCTION CHECK AFTER ASSY (RADIO & NAV)', '2023-08-20', '2023-08-22', 'Basic Re-assy and Functional Test', 'G-15', '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(15, 1, 'EO-025-38-010', 'CAN START MOTOR INSTALLATION', '2023-08-22', NULL, 'Customizing Functional Test', NULL, '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(16, 1, 'EO-025-38-011', 'MIRROR INSTALLATION', '2023-08-26', '2023-08-28', 'Customizing Functional Test', 'G-15', '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(17, 1, 'EO-025-38-012', 'HORIZONTAL STABILIZER INSTALLATION', '2023-08-28', NULL, 'Customizing Functional Test', NULL, '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(18, 1, 'EO-025-38-013', 'CARGO HOOK INSTALLATION', '2023-08-30', '2023-08-31', 'Customizing Functional Test', 'G-15', '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(19, 1, 'EO-025-38-014', 'GROUND HANDLING WHEEL INSTALLATION', '2023-09-01', NULL, 'Customizing Functional Test', NULL, '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(20, 1, 'EO-025-38-015', 'FLIGHT CONTROL SYSTEM INSTALLATION', '2023-09-03', '2023-09-05', 'Customizing Functional Test', 'G-15', '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(21, 1, 'EO-025-38-016', 'FLIGHT CONTROL FOR CARGO SLING', '2023-09-07', NULL, 'Customizing Functional Test', NULL, '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(22, 1, 'EO-025-38-017', 'PLACARD INSTALLATION', '2023-09-10', '2023-09-12', 'Customizing Functional Test', 'G-15', '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(23, 1, 'EO-025-38-018', 'DEPRESERVATION OF AIRCRAFT', '2023-09-13', '2023-09-15', 'Flight Line', 'G-15', '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(24, 1, 'EO-025-38-019', 'DEGREASING OF ENGINE', '2023-09-15', NULL, 'Flight Line', NULL, '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(25, 1, 'EO-025-38-020', 'WEIGHT AND BALANCE', '2023-09-17', '2023-09-18', 'Flight Line', 'G-15', '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(26, 1, 'EO-025-38-021', 'GROUND RUN AFTER RE-ASSEMBLY', '2023-09-20', NULL, 'Flight Line', NULL, '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(27, 1, 'EO-025-38-022', 'MAIN ROTOR BLADE BALANCING ON GROUND', '2023-09-22', '2023-09-24', 'Flight Line', 'G-15', '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(28, 1, 'EO-025-38-023', 'TAIL ROTOR BALANCING ON GROUND', '2023-09-25', NULL, 'Flight Line', NULL, '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(29, 1, 'EO-025-38-024', 'UPDATE WEAPON DATABASE', '2023-09-27', '2023-09-28', 'Flight Line', 'G-15', '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(30, 1, 'EO-025-38-025', 'UPDATE GPS', '2023-09-29', NULL, 'Flight Line', NULL, '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(31, 1, 'EO-025-38-026', 'MAINTENANCE AC IN SHORT TERM STORAGE', '2023-10-01', '2023-10-02', 'Maintenance', 'G-15', '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(32, 1, 'EO-025-38-027', 'PRESERVATION AC IN SHORT TERM STORAGE', '2023-10-03', NULL, 'Maintenance', NULL, '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(33, 1, 'EO-025-38-028', 'MAINTENANCE PROPULSION SYSTEM', '2023-10-05', '2023-10-07', 'Maintenance', 'G-15', '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(34, 1, 'EO-025-38-029', 'MAINTENANCE ELECTRICAL SYSTEM', '2023-10-08', NULL, 'Maintenance', NULL, '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(35, 1, 'EO-025-38-030', 'MAINTENANCE FLIGHT CONTROL SYSTEM', '2023-10-10', '2023-10-12', 'Maintenance', 'G-15', '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(36, 1, 'EO-025-38-031', 'FLIGHT SAFETY REPORT', '2023-10-14', NULL, 'Maintenance', NULL, '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(37, 1, 'EO-025-38-032', 'APPLICATION EXAM BADGES RANK 4', '2023-10-24', '2023-10-24', 'SB, ASB, AND EASB', 'G-15', '2025-03-20 03:31:49', '2025-03-20 03:31:49'),
(38, 2, 'EO-026-38-000', 'PREPARATION AND RECEIVE THE AIRCRAFT', '2023-09-01', '2023-09-03', 'Basic Re-assy and Functional Test', 'G-15', '2025-03-20 04:37:36', '2025-03-20 04:37:36'),
(39, 2, 'EO-026-38-001', 'REMOVE PROTECTION ON THE AIRCRAFT', '2023-09-04', '2023-09-06', 'Basic Re-assy and Functional Test', 'G-15', '2025-03-20 04:37:36', '2025-03-20 04:37:36'),
(40, 2, 'EO-026-38-002', 'JACKING AND RESTORE IN Q, M, L & A', '2023-09-07', '2023-09-08', 'Basic Re-assy and Functional Test', 'G-15', '2025-03-20 04:37:36', '2025-03-20 04:37:36'),
(41, 2, 'EO-026-38-003', 'AUXILIARY TRANSMISSION INSTALLATION', '2023-09-09', '2023-09-11', 'Basic Re-assy and Functional Test', 'G-15', '2025-03-20 04:37:36', '2025-03-20 04:37:36'),
(42, 2, 'EO-026-38-004', 'MIRROR INSTALLATION', '2023-09-12', '2023-09-14', 'Customizing Functional Test', 'G-15', '2025-03-20 04:37:36', '2025-03-20 04:37:36'),
(43, 2, 'EO-026-38-005', 'CARGO HOOK INSTALLATION', '2023-09-15', '2023-09-17', 'Customizing Functional Test', 'G-15', '2025-03-20 04:37:36', '2025-03-20 04:37:36'),
(44, 2, 'EO-026-38-006', 'FLIGHT CONTROL SYSTEM INSTALLATION', '2023-09-18', '2023-09-20', 'Flight Line', 'G-15', '2025-03-20 04:37:36', '2025-03-20 04:37:36'),
(45, 2, 'EO-026-38-007', 'DE-PRESERVATION OF ENGINE', '2023-09-21', '2023-09-23', 'Flight Line', 'G-15', '2025-03-20 04:37:36', '2025-03-20 04:37:36'),
(46, 2, 'EO-026-38-008', 'UPDATE TRIMS', '2023-09-24', '2023-09-26', 'Flight Line', 'G-15', '2025-03-20 04:37:36', '2025-03-20 04:37:36'),
(47, 2, 'EO-026-38-009', 'MAINTENANCE ON SHORT TERM STORAGE', '2023-09-27', '2023-09-29', 'Maintenance', 'G-15', '2025-03-20 04:37:36', '2025-03-20 04:37:36'),
(48, 2, 'EO-026-38-010', 'APPLICATION EASB EARLY BIRD', '2023-09-30', '2023-10-02', 'SB, ASB, AND EASB', 'G-15', '2025-03-20 04:37:36', '2025-03-20 04:37:36'),
(49, 2, 'EO-026-38-011', 'HYDRAULIC SYSTEM INSTALLATION', '2023-10-03', '2023-10-05', 'Basic Re-assy and Functional Test', 'G-15', '2025-03-20 04:37:36', '2025-03-20 04:37:36'),
(50, 2, 'EO-026-38-012', 'ELECTRICAL SYSTEM CHECK', '2023-10-06', '2023-10-08', 'Customizing Functional Test', 'G-15', '2025-03-20 04:37:36', '2025-03-20 04:37:36'),
(51, 2, 'EO-026-38-013', 'FUEL SYSTEM INSTALLATION', '2023-10-09', '2023-10-11', 'Maintenance', 'G-15', '2025-03-20 04:37:36', '2025-03-20 04:37:36'),
(52, 2, 'EO-026-38-014', 'PNEUMATIC SYSTEM INSTALLATION', '2023-10-12', '2023-10-14', 'SB, ASB, AND EASB', 'G-15', '2025-03-20 04:37:36', '2025-03-20 04:37:36'),
(53, 2, 'EO-026-38-015', 'AVIONIC SYSTEM INSTALLATION', '2023-10-15', '2023-10-17', 'Flight Line', 'G-15', '2025-03-20 04:37:36', '2025-03-20 04:37:36'),
(54, 2, 'EO-026-38-016', 'ROTOR SYSTEM BALANCING', '2023-10-18', '2023-10-20', 'Basic Re-assy and Functional Test', 'G-15', '2025-03-20 04:37:36', '2025-03-20 04:37:36'),
(55, 2, 'EO-026-38-017', 'ENGINE FUNCTION CHECK', '2023-10-21', '2023-10-23', 'Customizing Functional Test', 'G-15', '2025-03-20 04:37:36', '2025-03-20 04:37:36'),
(56, 2, 'EO-026-38-018', 'FINAL INSPECTION', '2023-10-24', '2023-10-26', 'Maintenance', 'G-15', '2025-03-20 04:37:36', '2025-03-20 04:37:36'),
(57, 2, 'EO-026-38-019', 'TEST FLIGHT PREPARATION', '2023-10-27', '2023-10-29', 'Flight Line', 'G-15', '2025-03-20 04:37:36', '2025-03-20 04:37:36'),
(58, 1, 'EO-025-38-000', 'PREPARATION AND RECEIVE THE AIRCRAFT', '2023-08-04', '2023-08-06', 'Basic Re-assy and Functional Test', 'G-15', '2025-03-19 20:31:49', '2025-03-19 20:31:49');

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
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `date_issued` date NOT NULL,
  `org` varchar(255) NOT NULL,
  `rev` int(11) NOT NULL,
  `amend` int(11) DEFAULT NULL,
  `affected_function` varchar(255) NOT NULL,
  `type` enum('FORM','MANUAL','PROCEDURE','WORK INSTRUCTION','PERSONAL ROSTER','TRAINING') NOT NULL DEFAULT 'FORM',
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `nomor`, `judul`, `date_issued`, `org`, `rev`, `amend`, `affected_function`, `type`, `file_path`, `created_at`, `updated_at`) VALUES
(2, '10-03-W801.0', 'Formulir Inspeksi', '2024-01-01', 'QA', 1, NULL, 'Quality Control', 'TRAINING', 'qms/6Zof4vRnQKiYsdaQjnUqvv44gl7mwAMVCG9FGki5.pdf', '2025-03-18 04:53:04', '2025-03-18 04:53:04'),
(3, '10-03-W802.0', 'Formulir Audit Internal', '2024-01-02', 'QA', 2, 1, 'Audit', 'TRAINING', 'qms/6Zof4vRnQKiYsdaQjnUqvv44gl7mwAMVCG9FGki5.pdf', '2025-03-18 04:53:04', '2025-03-18 04:53:04'),
(4, '10-03-W803.0', 'Formulir Pemeriksaan', '2024-01-03', 'QA', 1, NULL, 'Inspection', 'PERSONAL ROSTER', 'qms/6Zof4vRnQKiYsdaQjnUqvv44gl7mwAMVCG9FGki5.pdf', '2025-03-18 04:53:04', '2025-03-18 04:53:04'),
(5, '10-03-W804.0', 'Formulir Validasi', '2024-01-04', 'R&D', 3, 2, 'Validation', 'TRAINING', 'qms/6Zof4vRnQKiYsdaQjnUqvv44gl7mwAMVCG9FGki5.pdf', '2025-03-18 04:53:04', '2025-03-18 04:53:04'),
(6, '10-03-W805.0', 'Formulir Sertifikasi', '2024-01-05', 'HR', 1, NULL, 'Certification', 'PROCEDURE', 'qms/6Zof4vRnQKiYsdaQjnUqvv44gl7mwAMVCG9FGki5.pdf', '2025-03-18 04:53:04', '2025-03-18 04:53:04'),
(7, '10-03-W806.0', 'Formulir Keamanan', '2024-01-06', 'Safety', 2, NULL, 'Security', 'WORK INSTRUCTION', 'qms/6Zof4vRnQKiYsdaQjnUqvv44gl7mwAMVCG9FGki5.pdf', '2025-03-18 04:53:04', '2025-03-18 04:53:04'),
(8, '10-03-W807.0', 'Formulir Pengujian', '2024-01-07', 'R&D', 3, 1, 'Testing', 'WORK INSTRUCTION', 'qms/6Zof4vRnQKiYsdaQjnUqvv44gl7mwAMVCG9FGki5.pdf', '2025-03-18 04:53:04', '2025-03-18 04:53:04'),
(9, '10-03-W808.0', 'Formulir Evaluasi', '2024-01-08', 'HR', 1, NULL, 'Evaluation', 'MANUAL', 'qms/6Zof4vRnQKiYsdaQjnUqvv44gl7mwAMVCG9FGki5.pdf', '2025-03-18 04:53:04', '2025-03-18 04:53:04'),
(10, '10-03-W809.0', 'Formulir Laporan Kecelakaan', '2024-01-09', 'Safety', 4, 2, 'Accident Reporting', 'PROCEDURE', 'qms/6Zof4vRnQKiYsdaQjnUqvv44gl7mwAMVCG9FGki5.pdf', '2025-03-18 04:53:04', '2025-03-18 04:53:04'),
(11, '10-03-W810.0', 'Formulir Pelatihan', '2024-01-10', 'HR', 1, NULL, 'Training', 'FORM', 'qms/6Zof4vRnQKiYsdaQjnUqvv44gl7mwAMVCG9FGki5.pdf', '2025-03-18 04:53:04', '2025-03-18 04:53:04'),
(12, '10-03-W850.0', 'Formulir Pelaporan Insiden', '2024-02-19', 'Safety', 5, 3, 'Incident Reporting', 'FORM', 'qms/6Zof4vRnQKiYsdaQjnUqvv44gl7mwAMVCG9FGki5.pdf', '2025-03-18 04:53:04', '2025-03-18 04:53:04'),
(13, '10-03-W851.0', 'Formulir Evaluasi Risiko', '2024-02-20', 'Risk Management', 2, NULL, 'Risk Assessment', 'MANUAL', 'qms/6Zof4vRnQKiYsdaQjnUqvv44gl7mwAMVCG9FGki5.pdf', '2025-03-18 04:53:04', '2025-03-18 04:53:04'),
(14, '10-03-W852.0', 'Formulir Pengaduan', '2024-02-21', 'Customer Service', 1, NULL, 'Complaint Handling', 'PERSONAL ROSTER', 'qms/6Zof4vRnQKiYsdaQjnUqvv44gl7mwAMVCG9FGki5.pdf', '2025-03-18 04:53:04', '2025-03-18 04:53:04'),
(15, '10-03-W853.0', 'Formulir Permintaan Perbaikan', '2024-02-22', 'Maintenance', 3, 1, 'Repair Request', 'MANUAL', 'qms/6Zof4vRnQKiYsdaQjnUqvv44gl7mwAMVCG9FGki5.pdf', '2025-03-18 04:53:04', '2025-03-18 04:53:04'),
(16, '10-03-W854.0', 'Formulir Evaluasi Kinerja', '2024-02-23', 'HR', 1, NULL, 'Performance Review', 'WORK INSTRUCTION', 'qms/6Zof4vRnQKiYsdaQjnUqvv44gl7mwAMVCG9FGki5.pdf', '2025-03-18 04:53:04', '2025-03-18 04:53:04'),
(17, '10-03-W855.0', 'Formulir SOP Baru', '2024-02-24', 'Operations', 2, NULL, 'Standard Operating Procedures', 'PERSONAL ROSTER', 'qms/6Zof4vRnQKiYsdaQjnUqvv44gl7mwAMVCG9FGki5.pdf', '2025-03-18 04:53:04', '2025-03-18 04:53:04');

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
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2025_03_03_122557_add_role_to_users_table', 2),
(11, '2025_03_06_033203_create_pages_table', 2),
(12, '2025_03_18_030055_create_forms_table', 3),
(13, '2025_03_19_035011_create_aircraft_programs_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@example.com', NULL, '$2y$12$Jew.Ys7L/E87j8rSLZ8XueQojSDonBWXEb8y9eb07IVyUhb/7F28G', 'admin', NULL, '2025-03-03 05:59:02', '2025-03-03 05:59:02'),
(2, 'Customer User', 'customer@example.com', NULL, '$2y$12$13hiw85Zr/kqTph0a9JNXOIzVIN3iLT.6msfItSfEvKQRU2NxiI22', 'customer', NULL, '2025-03-03 05:59:12', '2025-03-03 05:59:12'),
(3, 'alfi faiz', 'alfi.faiz@upi.edu', NULL, '$2y$12$KfiqwxdOUswEbBviE29Lseiz1pAn9ur7XJFLH99adIaD6B6TLyVHa', 'customer', NULL, '2025-03-03 19:08:19', '2025-03-03 19:08:19'),
(4, 'faiz', 'faiz@gmail.com', NULL, '$2y$12$zjnMzxV6inRFwO0DEvgS5Ozj4rHcaTuQlO77ftAEuFHm4qPnO6el6', 'customer', NULL, '2025-03-03 19:13:30', '2025-03-03 19:13:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aircraft_programs`
--
ALTER TABLE `aircraft_programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `engineering_orders`
--
ALTER TABLE `engineering_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aircraft_id` (`aircraft_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `forms_nomor_unique` (`nomor`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aircraft_programs`
--
ALTER TABLE `aircraft_programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `engineering_orders`
--
ALTER TABLE `engineering_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `engineering_orders`
--
ALTER TABLE `engineering_orders`
  ADD CONSTRAINT `engineering_orders_ibfk_1` FOREIGN KEY (`aircraft_id`) REFERENCES `aircraft_programs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
