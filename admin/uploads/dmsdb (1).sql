-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2019 at 08:59 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbldirectory`
--

CREATE TABLE `tbldirectory` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `Profession` varchar(120) DEFAULT NULL,
  `Email` varchar(120) NOT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Address` varchar(250) NOT NULL,
  `City` varchar(250) NOT NULL,
  `Status` varchar(120) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldirectory`
--

INSERT INTO `tbldirectory` (`ID`, `FullName`, `Profession`, `Email`, `MobileNumber`, `Address`, `City`, `Status`, `created_by`) VALUES
(1, 'Airi Satou', 'Accountant', 'airi@gmail.com', 9876509632, 'Ohkla Band Sui Niwas Jamshedpur tata,Jharkhand', 'Jamshedpur', '0', 0),
(2, 'Angelica Ramos', 'Chief Executive Officer (CEO)', 'angel@gmail.com', 4577890655, '78/780, A block near BHU Varanasi(UP)', 'Varanasi', '1', 0),
(3, 'Ashton Cox', 'Junior Technical Author', 'ashton@gmail.com', 4577890690, '67/50, Govind Nagar Aligarh', 'Aligarh', '0', 0),
(4, 'Airi Satou', 'Accountant', 'airi@gmail.com', 4577890655, '630/5670 Malvi Nagar Delhi', 'New Delhi', '1', 0),
(5, 'Bradley Greer', 'Software Engineer', 'bradley@gmail.com', 6787655433, 'H.No 670-A, B block Gurgaon', 'Gurgaon', '1', 0),
(6, 'John Mac', 'HR', 'john@gmail.com', 6877955435, 'B-3/4, Mufi Centre, Near ICICCI Bank. Indore(MP)', 'Indore', '0', 0),
(7, 'Caesar Vancy', 'Pre-Sales Support', 'caesar@gmail.com', 9063735686, 'Flat-34/45, Mayur Vihar 1, Delhi', 'New Delhi', '0', 0),
(8, 'Gunjan Misra', 'Senior Javascript Developer', 'gun@gmail.com', 5764324679, 'Gaur Apartment flat No 340, first floor Noida(NCR)', 'Noida', '0', 0),
(9, 'Khuhi Sinha', 'Team Leader', 'khish@gmail.com', 9807531479, 'H.No 340/45, Sharan Niwas Gurgaon(NCR)', 'gurgaon', '1', 0),
(10, 'Shanu Misra', 'Support Engineer', 'msira@gmail.com', 9876578965, '56/740 Mohan Niwas Aurangabad(Bihar)', 'Auragabad', '0', 0),
(11, 'Mohan Tiwari', '	Office Manager', 'tiwar897@gmail.com', 8098765654, 'Mohan Niwas, Cantt road', 'Kanpur', '1', 0),
(12, 'Sarita', 'HR Executive', 'sarita@gmail.com', 7867564645, 'gjhgjkjhuyhkjuj', 'New Delhi', '0', 0),
(13, 'Sarita', 'HR Executive', 'sarita@gmail.com', 7867564645, 'gjhgjkjhuyhkjuj', 'New Delhi', '1', 0),
(14, 'Fuji', 'CEO', 'fuji@gmail.com', 7865564534, 'hjyukliuop', 'Kannuaj', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(150) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FullName`, `Email`, `MobileNumber`, `Password`, `RegDate`) VALUES
(1, 'Ù…Ø­Ù…Ø¯', 'x@x.x', 100467703, 'b4b147bc522828731f1a016bfa72c073', '2019-10-03 14:55:41'),
(2, 'Mohamed', 'admin@a.a', 100467703, '202cb962ac59075b964b07152d234b70', '2019-10-03 14:58:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbldirectory`
--
ALTER TABLE `tbldirectory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbldirectory`
--
ALTER TABLE `tbldirectory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
