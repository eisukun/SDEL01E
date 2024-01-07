-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 05:31 PM
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
-- Database: `pos_applicationdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `deductiontbl`
--

CREATE TABLE `deductiontbl` (
  `deduction_date` varchar(255) NOT NULL,
  `employee_no` varchar(255) NOT NULL,
  `faculty_savings_deposit` double NOT NULL,
  `faculty_savings_loan` double NOT NULL,
  `id` int(11) NOT NULL,
  `income_tax_contri` double NOT NULL,
  `other_loans` double NOT NULL,
  `pagibig_contri` double NOT NULL,
  `pagibig_loan` double NOT NULL,
  `philHealth_contri` double NOT NULL,
  `salary_loan` double NOT NULL,
  `sss_contri` double NOT NULL,
  `total_deduction` double NOT NULL,
  `sss_loan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deductiontbl`
--

INSERT INTO `deductiontbl` (`deduction_date`, `employee_no`, `faculty_savings_deposit`, `faculty_savings_loan`, `id`, `income_tax_contri`, `other_loans`, `pagibig_contri`, `pagibig_loan`, `philHealth_contri`, `salary_loan`, `sss_contri`, `total_deduction`, `sss_loan`) VALUES
('2023-12-07', '14596', 10, 10, 105, 108.37, 10, 10, 10, 450, 10, 180, 808.37, 10),
('2023-12-15', '16789', 5, 5, 106, 49.37, 5, 5, 5, 450, 5, 180, 714.37, 5),
('2023-12-27', '17859', 7, 7, 107, 49.37, 7, 7, 7, 450, 7, 180, 728.37, 7),
('2023-12-01', '12345', 30, 30, 116, 64.87, 30, 30, 30, 450, 30, 180, 904.87, 30),
('2023-11-30', '13335', 5, 5, 117, 400.33, 5, 5, 5, 450, 5, 180, 1065.33, 5),
('2023-12-01', '69420', 0, 0, 118, 283.33, 0, 0, 0, 450, 0, 180, 1013.33, 0);

-- --------------------------------------------------------

--
-- Table structure for table `incometbl`
--

CREATE TABLE `incometbl` (
  `id` int(11) NOT NULL,
  `income_date` varchar(255) NOT NULL,
  `basic_rate_hour` double NOT NULL,
  `basic_income` double NOT NULL,
  `hono_rate_hour` double NOT NULL,
  `hono_num_hrs` double NOT NULL,
  `hono_income` double NOT NULL,
  `other_rate_hour` double NOT NULL,
  `other_num_hrs` double NOT NULL,
  `other_income` double NOT NULL,
  `gross_income` double NOT NULL,
  `net_income` double NOT NULL,
  `employee_no` varchar(255) NOT NULL,
  `basic_num_hrs` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `incometbl`
--

INSERT INTO `incometbl` (`id`, `income_date`, `basic_rate_hour`, `basic_income`, `hono_rate_hour`, `hono_num_hrs`, `hono_income`, `other_rate_hour`, `other_num_hrs`, `other_income`, `gross_income`, `net_income`, `employee_no`, `basic_num_hrs`) VALUES
(118, '2023-12-07', 50, 500, 50, 10, 500, 50, 10, 500, 1500, 691.63, '14596', 10),
(119, '2023-12-15', 31, 310, 30, 10, 300, 30, 10, 300, 910, 195.63, '16789', 10),
(120, '2023-12-27', 31, 310, 30, 10, 300, 30, 10, 300, 910, 181.63, '17859', 10),
(129, '2023-12-01', 73, 365, 70, 5, 350, 70, 5, 350, 1065, 160.13, '12345', 5),
(130, '2023-11-30', 66, 1980, 60, 20, 1200, 60, 10, 600, 3780, 2714.67, '13335', 30),
(131, '2023-12-01', 100, 1000, 100, 10, 1000, 100, 10, 1000, 3000, 1986.67, '69420', 10);

-- --------------------------------------------------------

--
-- Table structure for table `personal_infotbl`
--

CREATE TABLE `personal_infotbl` (
  `id` int(11) NOT NULL,
  `employee_no` varchar(255) NOT NULL,
  `address_line1` text NOT NULL,
  `address_line2` text NOT NULL,
  `birth_date` date NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `employee_status` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `other_social_media_account` varchar(255) NOT NULL,
  `pay_date` date NOT NULL,
  `picpath` text NOT NULL,
  `qualified_dependent_status` varchar(255) NOT NULL,
  `social_media_account_id` varchar(255) NOT NULL,
  `state_province` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `zip_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_infotbl`
--

INSERT INTO `personal_infotbl` (`id`, `employee_no`, `address_line1`, `address_line2`, `birth_date`, `civil_status`, `contact_no`, `country`, `department`, `designation`, `email_address`, `employee_status`, `fname`, `gender`, `lname`, `mname`, `municipality`, `nationality`, `other_social_media_account`, `pay_date`, `picpath`, `qualified_dependent_status`, `social_media_account_id`, `state_province`, `suffix`, `zip_code`) VALUES
(121, '12345', '854 Sunset St', 'block 3, 30865', '2023-11-29', 'M', '0212345678', 'Phillipines', 'COECSA', 'Staff', 'pafepos815@lanxi8.com', 'Active', 'Calvin ', 'Male', 'Horton', 'Hersx', 'Albany', 'Australian', 'snapchat', '2023-12-01', 'uploads/5.jpg', 'Z', '515331', 'New York', 'NA', 10001),
(122, '13335', '801 Otipua Road', 'Upper Hutt, 50517', '2023-12-04', 'S', '032345678', 'New Zealand', 'COECSA', 'Staff', 'rigofew627@jalunaki.com', 'Inactive', 'Mia', 'Female', 'Melzy', 'Etye', 'Auckland', 'Filipino', 'wechat', '2023-11-30', 'uploads/63.jpg', 'Z', '456521', 'Northland', 'NA', 25120),
(99, '14596', '5169 North Road', 'Clonmel, 79122', '2023-12-28', 'S', '096532153', 'Phillipines', 'COECSA', 'Staff', 'furina@gmail.com', 'Active', 'Furina', 'Female', 'Taylor', 'Ely', 'Cavite', 'Filipino', 'whatsapp_messenger', '2023-12-07', 'uploads/furina.jpg', 'Z', '264783', 'Bacoor', 'NA', 4100),
(96, '16789', '9047 Ampliación ex República Yugoslava de Macedonia', 'Corte Primero, 91327', '2023-12-28', 'S', '2001234567', 'Phillipines', 'COECSA', 'Staff', 'hohid84575@lanxi8.com', 'Active', 'Frida ', 'Female', 'Santillán', 'Elis', 'Corte ', 'Filipino', 'wechat', '2023-12-15', 'uploads/80.jpg', 'Z', '16782', 'Primero', 'NA', 5700),
(98, '17859', '707 Calle de Ángel García', 'Talavera de la Reina, 23361', '2023-12-23', 'S', '0810123456', 'Spain', 'COECSA', 'Staff', 'ramede4201@mcenb.com', 'Active', 'Vanesa ', 'Female', 'Santana', 'Nidda', 'Madrid', 'Spanish', 'wechat', '2023-12-27', 'uploads/2.jpg', 'Z', '13346', 'Retiro', 'NA', 3400),
(123, '69420', 'Panpaan 3 street 4', 'Bacoor, Avenue', '2023-02-09', 'S', '0965688020', 'Phillipines', 'COECSA', 'Admin', 'earleustacio@gmail.com', 'Active', 'Earlvin', 'Male', 'Eustacio', 'Nocon', 'Bacoor', 'Filipino', 'facebook_messenger', '2023-12-01', 'uploads/raoul-droog-yMSecCHsIBc-unsplash.jpg', 'Z', '12121', 'Cavite', 'NA', 4100);

-- --------------------------------------------------------

--
-- Table structure for table `salestbl`
--

CREATE TABLE `salestbl` (
  `cash_given` double NOT NULL,
  `customer_change` double NOT NULL,
  `discounted_amount` double NOT NULL,
  `discount_amount` double NOT NULL,
  `discount_option` varchar(255) NOT NULL,
  `item_type` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `employee_no` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_discounted_amount` double NOT NULL,
  `total_discount_given` double NOT NULL,
  `total_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salestbl`
--

INSERT INTO `salestbl` (`cash_given`, `customer_change`, `discounted_amount`, `discount_amount`, `discount_option`, `item_type`, `id`, `employee_no`, `item_name`, `price`, `quantity`, `total_discounted_amount`, `total_discount_given`, `total_quantity`) VALUES
(900, 144, 882, 378, 'Senior Citizen', 'Shop', 78, '69420', 'Dress 1', 315, 4, 756, 189, 3),
(60, 18, 42, 18, 'Senior Citizen', 'Drinks', 79, '69420', 'Drinks 1', 20, 3, 93, 27, 6),
(1000, 852, 148.8, 37.2, 'Discount Card', 'Foods', 80, '69420', 'Foods 8', 62, 3, 346, 85, 8),
(600, 384, 216, 54, 'Discount Card', 'Kitchenwares', 82, '69420', 'Kitchenware 8', 135, 2, 216, 54, 2),
(600, 250, 350, 0, 'No discount', 'Perfume', 83, '69420', 'Perfume 8', 175, 2, 875, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_accounttbl`
--

CREATE TABLE `user_accounttbl` (
  `confirm_password` varchar(255) NOT NULL,
  `employee_no` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `privilege` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_accounttbl`
--

INSERT INTO `user_accounttbl` (`confirm_password`, `employee_no`, `id`, `password`, `username`, `privilege`) VALUES
('151', '16789', 81, '151', 'Fred', 2),
('567', '17859', 83, '567', 'Vany', 3),
('furina1', '14596', 84, 'furina1', 'furina1', 1),
('421', '12345', 106, '421', 'Calvin11', 0),
('445', '13335', 107, '445', 'Mia445', 2),
('earl', '69420', 108, 'earl', 'earl', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deductiontbl`
--
ALTER TABLE `deductiontbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incometbl`
--
ALTER TABLE `incometbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_infotbl`
--
ALTER TABLE `personal_infotbl`
  ADD PRIMARY KEY (`employee_no`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `salestbl`
--
ALTER TABLE `salestbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_accounttbl`
--
ALTER TABLE `user_accounttbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deductiontbl`
--
ALTER TABLE `deductiontbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `incometbl`
--
ALTER TABLE `incometbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `personal_infotbl`
--
ALTER TABLE `personal_infotbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `salestbl`
--
ALTER TABLE `salestbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `user_accounttbl`
--
ALTER TABLE `user_accounttbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
