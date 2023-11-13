-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2023 at 11:23 AM
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
-- Database: `admin_information`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_doctors`
--

CREATE TABLE `add_doctors` (
  `user_id` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `select_image` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(500) NOT NULL,
  `doctor_name` varchar(200) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `birth_date` int(11) NOT NULL,
  `doctor_speciality` varchar(200) NOT NULL,
  `speciality_image` varchar(200) NOT NULL,
  `cities` varchar(200) NOT NULL,
  `dor_biography` varchar(900) NOT NULL,
  `clinic_name` varchar(200) NOT NULL,
  `clinic_address` varchar(200) NOT NULL,
  `doctor_fee` int(11) NOT NULL,
  `dor_degree` varchar(200) NOT NULL,
  `dor_institute` varchar(200) NOT NULL,
  `year_completion` varchar(200) NOT NULL,
  `hospital_name` varchar(200) NOT NULL,
  `from_year` int(11) NOT NULL,
  `to_year` int(11) NOT NULL,
  `dor_designation` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_doctors`
--

INSERT INTO `add_doctors` (`user_id`, `date_time`, `select_image`, `user_name`, `user_email`, `user_password`, `doctor_name`, `phone_number`, `gender`, `birth_date`, `doctor_speciality`, `speciality_image`, `cities`, `dor_biography`, `clinic_name`, `clinic_address`, `doctor_fee`, `dor_degree`, `dor_institute`, `year_completion`, `hospital_name`, `from_year`, `to_year`, `dor_designation`) VALUES
(7, '2023-11-12 09:46:20', 'assets/img/doctor-thumb-02.jpg', 'Threem', 'threemmalik@gmail.com', '$2y$10$nmWRt3Mrs8Mopf6i/YQ23.891hL7IsLFwrpAQ0aiQBhAXMWGhinKq', 'Threem Malik', 2147483647, '', 2000, 'Dentist', 'assets/img/images.jfif', 'Karachi', 'They clean teeth, fill cavities, perform surgeries, and promote oral health. What are the duties and responsibilities of a dentist? Dentists examine patients, diagnose dental problems, clean teeth, perform procedures like fillings and extractions, design and fit dental prosthetics, and educate patients on oral hygiene.', 'Aga khan hospital', 'National Stadium Rd, Aga Khan University Hospital, Karachi,', 5000, 'MBBS', 'The Aga Khan University Hospital (AKUH)', '2023', 'The Aga Khan University Hospital (AKUH)', 2019, 2023, ' DDS (Doctor of Dental Surgery) and DMD (Doctor of Medicine in Dentistry or Doctor of Dental Medicine'),
(8, '2023-11-12 09:56:16', 'assets/img/stock-photo-portrait-of-a-young-indian-veterinarian-doctor-who-stands-smiling-in-the-office-folded-his-arms-2343776215.jpg', 'TALIB UDDIN QAZI ', 'ahsanmisbah421@gmail.com', '$2y$10$PYwoO/7QKOjVH8sCjkEwSOBdwgYzxXWtkMLSJK2kkp3jpagV1J5.O', 'TALIB UDDIN QAZI ', 2147483647, '', 2023, 'doctor', 'assets/img/stock-photo-portrait-of-a-young-indian-veterinarian-doctor-who-stands-smiling-in-the-office-folded-his-arms-2343776215.jpg', 'Karachi', 'dfgfdg', 'cvvvv', 'H-no L-6 (ST#11) Sector 7/B Surjani Town Karachi', 5000, 'MBBS', 'The Aga Khan University Hospital (AKUH)', '2023', 'The Aga Khan University Hospital (AKUH)', 2019, 2023, ' DDS (Doctor of Dental Surgery) and DMD (Doctor of Medicine in Dentistry or Doctor of Dental Medicine');

-- --------------------------------------------------------

--
-- Table structure for table `admin_register`
--

CREATE TABLE `admin_register` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_register`
--

INSERT INTO `admin_register` (`user_id`, `user_name`, `user_email`, `user_password`, `date_time`) VALUES
(4, 'Talib uddin qazi', 'Talib2@com', '$2y$10$zTLidnCliZv.Yoa/6E1oHuiB2yeBIHF/RV7Pja4QMGUjMLWhdGDxq', '2023-11-08 17:22:18'),
(5, 'Talib uddin qazi', 'ahsanmisbah421@gmail.com', '$2y$10$B479.VRgWCK76UhxkfjucuytkD2vNBabNpfaEP.ZmL5r83HZVZVM6', '2023-11-12 05:53:22'),
(6, 'Talib uddin qazi', 'csss@gaml.com', '$2y$10$UuQwVZMyHrC9Wssov9jkce3IrDBciGug.rKg5wgRSQzppq5hERF4q', '2023-11-12 05:54:35');

-- --------------------------------------------------------

--
-- Table structure for table `manage_webside`
--

CREATE TABLE `manage_webside` (
  `user_id` int(11) NOT NULL,
  `user_logo` varchar(500) NOT NULL,
  `user_contact` varchar(200) NOT NULL,
  `user_address` varchar(500) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `webside_discruption` varchar(500) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_webside`
--

INSERT INTO `manage_webside` (`user_id`, `user_logo`, `user_contact`, `user_address`, `user_email`, `webside_discruption`, `date_time`) VALUES
(1, 'logo design.png', '+92 3228290468', 'SD-1, Block A North Nazimabad Town, Karachi, 74700,', 'talib@gamil.com', 'The best Doctors and Specialists such as Gynecologists, Skin Specialists, Child Specialists, Surgeons, etc.', '2023-11-13 08:12:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_doctors`
--
ALTER TABLE `add_doctors`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `admin_register`
--
ALTER TABLE `admin_register`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `manage_webside`
--
ALTER TABLE `manage_webside`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_doctors`
--
ALTER TABLE `add_doctors`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_register`
--
ALTER TABLE `admin_register`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `manage_webside`
--
ALTER TABLE `manage_webside`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
