-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2020 at 06:13 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', 'Test@12345', '28-12-2016 11:42:05 AM');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctorSpecialization` varchar(255) DEFAULT NULL,
  `doctorId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `consultancyFees` int(11) DEFAULT NULL,
  `appointmentDate` varchar(255) DEFAULT NULL,
  `appointmentTime` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `userStatus` int(11) DEFAULT NULL,
  `doctorStatus` int(11) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctorSpecialization`, `doctorId`, `userId`, `consultancyFees`, `appointmentDate`, `appointmentTime`, `postingDate`, `userStatus`, `doctorStatus`, `updationDate`) VALUES
(3, 'Demo test', 7, 6, 600, '2019-06-29', '9:15 AM', '2019-06-23 18:31:28', 1, 0, '0000-00-00 00:00:00'),
(4, 'Ayurveda', 5, 5, 8050, '2019-11-08', '1:00 PM', '2019-11-05 10:28:54', 1, 1, '0000-00-00 00:00:00'),
(5, 'Dermatologist', 9, 7, 500, '2019-11-30', '5:30 PM', '2019-11-10 18:41:34', 1, 0, '2019-11-10 18:48:30'),
(6, 'General Physician', 6, 2, 2500, '2020-03-16', '10:45 AM', '2020-03-10 05:12:55', 0, 1, '2020-03-10 08:02:09'),
(7, 'General Physician', 6, 2, 2500, '2020-03-16', '10:45 AM', '2020-03-10 05:14:22', 1, 1, NULL),
(8, 'General Physician', 6, 2, 2500, '2020-03-17', '10:45 AM', '2020-03-10 05:16:22', 1, 1, NULL),
(9, 'General Physician', 6, 2, 2500, '2020-03-17', '10:45 AM', '2020-03-10 05:19:03', 1, 1, NULL),
(10, 'General Physician', 6, 2, 2500, '2020-03-17', '10:45 AM', '2020-03-10 05:20:31', 1, 1, NULL),
(11, 'Homeopath', 4, 2, 700, '2020-03-23', '11:00 AM', '2020-03-10 05:21:43', 1, 1, NULL),
(12, 'Homeopath', 4, 2, 700, '2020-03-23', '11:00 AM', '2020-03-10 05:24:17', 1, 1, NULL),
(13, 'Homeopath', 4, 2, 700, '2020-03-23', '11:00 AM', '2020-03-10 05:24:47', 1, 1, NULL),
(14, 'Homeopath', 4, 2, 700, '2020-03-23', '11:00 AM', '2020-03-10 05:28:59', 1, 1, NULL),
(15, 'Homeopath', 4, 2, 700, '2020-03-23', '11:00 AM', '2020-03-10 05:29:37', 1, 1, NULL),
(16, 'General Physician', 6, 2, 2500, '2020-03-28', '1:30 PM', '2020-03-10 07:54:06', 1, 1, NULL),
(17, 'General Physician', 6, 2, 2500, '2020-03-28', '1:30 PM', '2020-03-10 07:55:36', 1, 1, NULL),
(18, 'General Physician', 6, 2, 2500, '2020-03-28', '1:30 PM', '2020-03-10 07:55:53', 1, 1, NULL),
(19, 'General Physician', 6, 2, 2500, '2020-03-28', '1:30 PM', '2020-03-10 07:57:47', 1, 1, NULL),
(20, 'General Physician', 6, 2, 2500, '2020-03-28', '1:30 PM', '2020-03-10 07:58:37', 1, 1, NULL),
(21, 'General Physician', 6, 2, 2500, '2020-03-28', '1:30 PM', '2020-03-10 07:59:17', 1, 1, NULL),
(22, 'Homeopath', 4, 2, 700, '2020-03-31', '1:30 PM', '2020-03-10 07:59:26', 1, 1, NULL),
(23, 'Homeopath', 4, 2, 700, '2020-03-31', '1:30 PM', '2020-03-10 08:01:01', 1, 1, NULL),
(24, 'Homeopath', 4, 2, 700, '2020-03-31', '1:30 PM', '2020-03-10 08:01:41', 1, 1, NULL),
(25, 'Homeopath', 4, 2, 700, '2020-03-31', '1:30 PM', '2020-03-10 08:01:45', 1, 1, NULL),
(26, 'General Physician', 3, 2, 1200, '2020-03-12', '1:45 PM', '2020-03-10 08:01:57', 1, 1, NULL),
(27, 'Dermatologist', 9, 2, 500, '2020-03-28', '1:45 PM', '2020-03-10 08:04:56', 1, 1, NULL),
(28, 'Dermatologist', 9, 2, 500, '2020-03-28', '1:45 PM', '2020-03-10 08:15:31', 1, 1, NULL),
(29, 'Dermatologist', 9, 2, 500, '2020-03-28', '1:45 PM', '2020-03-10 08:19:59', 1, 1, NULL),
(30, 'Demo test', 7, 2, 200, '2020-03-21', '3:45 PM', '2020-03-10 10:07:54', 1, 1, NULL),
(31, 'Demo test', 7, 2, 200, '2020-03-21', '3:45 PM', '2020-03-10 10:08:12', 0, 1, '2020-03-10 10:08:23'),
(32, 'Demo test', 7, 2, 200, '2020-03-21', '3:45 PM', '2020-03-10 10:08:17', 0, 1, '2020-03-10 10:08:27'),
(33, 'Demo test', 7, 2, 200, '2020-03-27', '3:45 PM', '2020-03-10 10:10:27', 1, 1, NULL),
(34, 'Demo test', 7, 2, 200, '2020-03-27', '3:45 PM', '2020-03-10 10:11:04', 1, 1, NULL),
(35, 'Demo test', 7, 2, 200, '2020-03-07', '3:45 PM', '2020-03-10 10:12:07', 1, 1, NULL),
(36, 'Dermatologist', 9, 7, 500, '2020-03-18', '4:00 PM', '2020-03-10 10:27:07', 1, 1, NULL),
(37, 'Dermatologist', 9, 7, 500, '2020-03-18', '4:00 PM', '2020-03-10 10:28:22', 1, 1, NULL),
(38, 'Dermatologist', 9, 7, 500, '2020-03-18', '4:00 PM', '2020-03-10 10:28:43', 1, 1, NULL),
(39, 'Dermatologist', 9, 7, 500, '2020-03-18', '4:00 PM', '2020-03-10 10:29:30', 1, 1, NULL),
(40, 'Dermatologist', 9, 7, 500, '2020-03-18', '4:00 PM', '2020-03-10 10:32:31', 1, 1, NULL),
(41, 'General Physician', 3, 2, 1200, '2020-03-21', '10:00 PM', '2020-03-12 16:23:39', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `doctorName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `docFees` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `docEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `specilization`, `doctorName`, `address`, `docFees`, `contactno`, `docEmail`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'Dentist', 'Anuj', 'New Delhi', '500', 8285703354, 'anuj.lpu1@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2016-12-29 06:25:37', '2019-06-30 12:11:05'),
(2, 'Homeopath', 'Sarita Pandey', 'Varanasi', '600', 2147483647, 'sarita@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2016-12-29 06:51:51', '0000-00-00 00:00:00'),
(3, 'General Physician', 'Nitesh Kumar', 'Ghaziabad', '1200', 8523699999, 'nitesh@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 07:43:35', '0000-00-00 00:00:00'),
(4, 'Homeopath', 'Vijay Verma', 'New Delhi', '700', 25668888, 'vijay@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 07:45:09', '0000-00-00 00:00:00'),
(5, 'Ayurveda', 'Sanjeev', 'Gurugram', '8050', 442166644646, 'sanjeev@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 07:47:07', '0000-00-00 00:00:00'),
(6, 'General Physician', 'Amrita', 'New Delhi India', '2500', 45497964, 'amrita@test.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 07:52:50', '0000-00-00 00:00:00'),
(7, 'Demo test', 'abc ', 'New Delhi India', '200', 852888888, 'test@demo.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 08:08:58', '2019-06-23 18:17:25'),
(8, 'Ayurveda', 'Test Doctor', 'Xyz Abc New Delhi', '600', 1234567890, 'test@test.com', '202cb962ac59075b964b07152d234b70', '2019-06-23 17:57:43', '2019-06-23 18:06:06'),
(9, 'Dermatologist', 'Anuj kumar', 'New Delhi India 110001', '500', 1234567890, 'anujk@test.com', 'f925916e2754e5e03f75dd58a5733251', '2019-11-10 18:37:47', '2019-11-10 18:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `doctorslog`
--

CREATE TABLE `doctorslog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorslog`
--

INSERT INTO `doctorslog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(20, 7, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2019-12-25 06:14:53', '25-12-2019 11:46:40 AM', 1),
(21, NULL, 'doctor', 0x3a3a3100000000000000000000000000, '2020-03-01 10:23:58', NULL, 0),
(22, NULL, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-01 10:25:36', NULL, 0),
(23, 7, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2020-03-01 10:29:04', NULL, 1),
(24, NULL, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-10 04:32:38', NULL, 0),
(25, 7, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2020-03-10 04:32:53', '10-03-2020 10:03:38 AM', 1),
(26, 7, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2020-03-10 08:26:08', '10-03-2020 01:57:09 PM', 1),
(27, NULL, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-10 09:47:33', NULL, 0),
(28, 7, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2020-03-10 09:47:39', NULL, 1),
(29, NULL, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-10 09:51:14', NULL, 0),
(30, 7, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2020-03-10 09:51:20', NULL, 1),
(31, 7, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2020-03-10 09:51:40', NULL, 1),
(32, 7, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2020-03-10 10:05:10', NULL, 1),
(33, NULL, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-10 10:13:11', NULL, 0),
(34, 9, 'anujk@test.com', 0x3a3a3100000000000000000000000000, '2020-03-10 11:29:56', NULL, 1),
(35, 7, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2020-03-10 11:45:10', NULL, 1),
(36, 9, 'anujk@test.com', 0x3a3a3100000000000000000000000000, '2020-03-10 11:45:54', NULL, 1),
(37, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-10 12:10:29', NULL, 1),
(38, 7, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2020-03-10 12:11:14', NULL, 1),
(39, 9, 'anujk@test.com', 0x3a3a3100000000000000000000000000, '2020-03-10 12:14:00', NULL, 1),
(40, 7, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2020-03-12 16:48:17', NULL, 1),
(41, 9, 'anujk@test.com', 0x3a3a3100000000000000000000000000, '2020-03-12 17:02:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecilization`
--

CREATE TABLE `doctorspecilization` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(1, 'Gynecologist/Obstetrician', '2016-12-28 06:37:25', '0000-00-00 00:00:00'),
(2, 'General Physician', '2016-12-28 06:38:12', '0000-00-00 00:00:00'),
(3, 'Dermatologist', '2016-12-28 06:38:48', '0000-00-00 00:00:00'),
(4, 'Homeopath', '2016-12-28 06:39:26', '0000-00-00 00:00:00'),
(5, 'Ayurveda', '2016-12-28 06:39:51', '0000-00-00 00:00:00'),
(6, 'Dentist', '2016-12-28 06:40:08', '0000-00-00 00:00:00'),
(7, 'Ear-Nose-Throat (Ent) Specialist', '2016-12-28 06:41:18', '0000-00-00 00:00:00'),
(9, 'Demo test', '2016-12-28 07:37:39', '0000-00-00 00:00:00'),
(10, 'Bones Specialist demo', '2017-01-07 08:07:53', '0000-00-00 00:00:00'),
(11, 'Test', '2019-06-23 17:51:06', '2019-06-23 17:55:06'),
(12, 'Dermatologist', '2019-11-10 18:36:36', '2019-11-10 18:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `doctorId` int(11) NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'APPOINTMENT',
  `message` varchar(500) NOT NULL,
  `messageDoc` varchar(100) DEFAULT ' has booked appointment.',
  `link` varchar(100) DEFAULT NULL,
  `isRead` tinyint(1) NOT NULL DEFAULT 0,
  `isReadDoc` tinyint(1) NOT NULL DEFAULT 0,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `userId`, `doctorId`, `type`, `message`, `messageDoc`, `link`, `isRead`, `isReadDoc`, `createdAt`) VALUES
(1, 2, 9, 'APPOINTMENT', 'Your appointment successfully booked.', ' has booked appointment.', './appointment-history.php', 1, 0, '2020-03-10 08:15:31'),
(2, 7, 9, 'APPOINTMENT', 'Your appointment successfully booked.', ' has booked appointment.', './appointment-history.php', 0, 1, '2020-03-10 10:32:31'),
(3, 2, 3, 'APPOINTMENT', 'Your appointment successfully booked.', ' has booked appointment.', './appointment-history.php', 1, 0, '2020-03-12 16:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactus`
--

CREATE TABLE `tblcontactus` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(12) DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `LastupdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `IsRead` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontactus`
--

INSERT INTO `tblcontactus` (`id`, `fullname`, `email`, `contactno`, `message`, `PostingDate`, `AdminRemark`, `LastupdationDate`, `IsRead`) VALUES
(1, 'test user', 'test@gmail.com', 2523523522523523, ' This is sample text for the test.', '2019-06-29 19:03:08', 'Test Admin Remark', '2019-06-30 12:55:23', 1),
(2, 'Anuj kumar', 'phpgurukulofficial@gmail.com', 1111111111111111, ' This is sample text for testing.  This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing.', '2019-06-30 13:06:50', 'jhv', '2020-02-29 10:05:48', 1),
(3, 'fdsfsdf', 'fsdfsd@ghashhgs.com', 3264826346, 'sample text   sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  ', '2019-11-10 18:53:48', 'vfdsfgfd', '2019-11-10 18:54:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmedicalhistory`
--

CREATE TABLE `tblmedicalhistory` (
  `ID` int(10) NOT NULL,
  `PatientID` int(10) DEFAULT NULL,
  `BloodPressure` varchar(200) DEFAULT NULL,
  `BloodSugar` varchar(200) NOT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `Temperature` varchar(200) DEFAULT NULL,
  `MedicalPres` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmedicalhistory`
--

INSERT INTO `tblmedicalhistory` (`ID`, `PatientID`, `BloodPressure`, `BloodSugar`, `Weight`, `Temperature`, `MedicalPres`, `CreationDate`) VALUES
(2, 3, '120/185', '80/120', '85 Kg', '101 degree', '#Fever, #BP high\r\n1.Paracetamol\r\n2.jocib tab\r\n', '2019-11-06 04:20:07'),
(3, 2, '90/120', '92/190', '86 kg', '99 deg', '#Sugar High\r\n1.Petz 30', '2019-11-06 04:31:24'),
(4, 1, '125/200', '86/120', '56 kg', '98 deg', '# blood pressure is high\r\n1.koil cipla', '2019-11-06 04:52:42'),
(5, 1, '96/120', '98/120', '57 kg', '102 deg', '#Viral\r\n1.gjgjh-1Ml\r\n2.kjhuiy-2M', '2019-11-06 04:56:55'),
(6, 4, '90/120', '120', '56', '98 F', '#blood sugar high\r\n#Asthma problem', '2019-11-06 14:38:33'),
(7, 5, '80/120', '120', '85', '98.6', 'Rx\r\n\r\nAbc tab\r\nxyz Syrup', '2019-11-10 18:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `ID` int(10) NOT NULL,
  `Docid` int(10) DEFAULT NULL,
  `PatientName` varchar(200) DEFAULT NULL,
  `PatientContno` bigint(10) DEFAULT NULL,
  `PatientEmail` varchar(200) DEFAULT NULL,
  `PatientGender` varchar(50) DEFAULT NULL,
  `PatientAdd` mediumtext DEFAULT NULL,
  `PatientAge` int(10) DEFAULT NULL,
  `PatientMedhis` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`ID`, `Docid`, `PatientName`, `PatientContno`, `PatientEmail`, `PatientGender`, `PatientAdd`, `PatientAge`, `PatientMedhis`, `CreationDate`, `UpdationDate`) VALUES
(1, 1, 'Manisha Jha', 4558968789, 'test@gmail.com', 'Female', '\"\"J&K Block J-127, Laxmi Nagar New Delhi', 26, 'She is diabetic patient', '2019-11-04 21:38:06', '2019-11-06 06:48:05'),
(2, 5, 'Raghu Yadav', 9797977979, 'raghu@gmail.com', 'Male', 'ABC Apartment Mayur Vihar Ph-1 New Delhi', 39, 'No', '2019-11-05 10:40:13', '2019-11-05 11:53:45'),
(3, 7, 'Mansi', 9878978798, 'jk@gmail.com', 'Female', '\"fdghyj', 46, 'No', '2019-11-05 10:49:41', '2019-11-05 11:58:59'),
(4, 7, 'Manav Sharma', 9888988989, 'sharma@gmail.com', 'Male', 'L-56,Ashok Nagar New Delhi-110096', 45, 'He is long suffered by asthma', '2019-11-06 14:33:54', '2019-11-06 14:34:31'),
(5, 9, 'John', 1234567890, 'john@test.com', 'male', 'Test ', 25, 'THis is sample text for testing.', '2019-11-10 18:49:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(24, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2019-12-25 06:17:03', NULL, 1),
(25, NULL, 'Admin', 0x3a3a3100000000000000000000000000, '2020-01-31 23:02:33', NULL, 0),
(26, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-01-31 23:02:38', NULL, 1),
(27, NULL, 'admin', 0x3a3a3100000000000000000000000000, '2020-02-29 10:03:09', NULL, 0),
(28, NULL, 'admin', 0x3a3a3100000000000000000000000000, '2020-02-29 10:03:20', NULL, 0),
(29, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-10 04:33:48', NULL, 1),
(30, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2020-03-10 07:53:50', NULL, 0),
(31, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-10 07:53:55', '10-03-2020 01:50:44 PM', 1),
(32, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2020-03-10 08:22:24', NULL, 0),
(33, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2020-03-10 08:22:35', NULL, 0),
(34, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2020-03-10 08:22:45', NULL, 0),
(35, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-10 08:22:54', NULL, 1),
(36, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-10 08:24:59', '10-03-2020 01:56:00 PM', 1),
(37, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-10 08:27:18', NULL, 1),
(38, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-10 08:29:01', NULL, 1),
(39, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-10 10:07:38', NULL, 1),
(40, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-10 10:09:56', NULL, 1),
(41, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-10 10:10:12', NULL, 1),
(42, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-10 10:11:27', NULL, 1),
(43, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-10 10:13:30', NULL, 1),
(44, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2020-03-10 10:17:40', NULL, 0),
(45, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2020-03-10 10:17:56', NULL, 0),
(46, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2020-03-10 10:18:06', NULL, 0),
(47, 7, 'john@test.com', 0x3a3a3100000000000000000000000000, '2020-03-10 10:19:24', NULL, 1),
(48, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-10 11:44:51', NULL, 1),
(49, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-10 12:06:46', NULL, 1),
(50, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-10 12:08:31', NULL, 1),
(51, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-10 12:09:05', NULL, 1),
(52, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-10 12:09:48', NULL, 1),
(53, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-10 12:13:37', NULL, 1),
(54, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-12 16:04:13', NULL, 1),
(55, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-12 16:07:50', NULL, 1),
(56, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-12 16:36:22', NULL, 1),
(57, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-12 16:36:39', '12-03-2020 10:18:10 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `address`, `city`, `gender`, `email`, `password`, `regDate`, `updationDate`) VALUES
(2, 'Sarita pandey', 'New Delhi India', 'Delhi', 'female', 'test@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2016-12-30 05:34:39', '0000-00-00 00:00:00'),
(3, 'Amit', 'New Delhi', 'New delhi', 'male', 'amit@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 06:36:53', '0000-00-00 00:00:00'),
(4, 'Rahul Singh', 'New Delhi', 'New delhi', 'male', 'rahul@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 07:41:14', '0000-00-00 00:00:00'),
(5, 'Amit kumar', 'New Delhi India', 'Delhi', 'male', 'amit12@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 08:00:26', '0000-00-00 00:00:00'),
(6, 'Test user', 'New Delhi', 'Delhi', 'male', 'tetuser@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2019-06-23 18:24:53', '2019-06-23 18:36:09'),
(7, 'John', 'USA', 'Newyork', 'male', 'john@test.com', 'f925916e2754e5e03f75dd58a5733251', '2019-11-10 18:40:21', '2019-11-10 18:40:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorslog`
--
ALTER TABLE `doctorslog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `doctorslog`
--
ALTER TABLE `doctorslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
