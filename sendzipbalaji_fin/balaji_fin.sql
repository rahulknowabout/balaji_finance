-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2015 at 12:47 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `balaji_fin`
--

-- --------------------------------------------------------

--
-- Table structure for table `financedetail`
--

CREATE TABLE IF NOT EXISTS `financedetail` (
  `id` int(100) NOT NULL,
  `agreement_no` varchar(300) NOT NULL,
  `receipt_no` varchar(200) NOT NULL,
  `payment_by` varchar(200) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `branch_name` varchar(200) NOT NULL,
  `cheque_no` varchar(200) NOT NULL,
  `amt_finance` varchar(300) NOT NULL,
  `pen_amount` varchar(100) NOT NULL,
  `penlaty_due` varchar(200) NOT NULL,
  `od_due` varchar(200) NOT NULL,
  `od_recieve` varchar(200) NOT NULL,
  `addition_amount` varchar(300) NOT NULL,
  `finance_date` varchar(300) NOT NULL,
  `finance_date_f` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `financedetail`
--

INSERT INTO `financedetail` (`id`, `agreement_no`, `receipt_no`, `payment_by`, `bank_name`, `branch_name`, `cheque_no`, `amt_finance`, `pen_amount`, `penlaty_due`, `od_due`, `od_recieve`, `addition_amount`, `finance_date`, `finance_date_f`) VALUES
(76, 'A123G11', 'A1000', 'DD/Cheque', 'Central Bank Of India', 'Dausa', 'ACB123456789', '5000', '500', '', '', '1000', '386', '09/25/2015', '07/25/2014'),
(77, 'A123G11', 'A1001', 'cash', '', '', '', '5000', '1000', '', '', '500', '386', '09/25/2015', '12/25/2014');

-- --------------------------------------------------------

--
-- Table structure for table `financestatement`
--

CREATE TABLE IF NOT EXISTS `financestatement` (
  `id` int(11) NOT NULL,
  `agreement_no` varchar(300) NOT NULL,
  `branch` varchar(200) NOT NULL,
  `product` varchar(200) NOT NULL,
  `asset_desc` text NOT NULL,
  `reg_no` varchar(200) NOT NULL,
  `disbursal_date` varchar(200) NOT NULL,
  `interest_rate_type` varchar(200) NOT NULL,
  `tenure` varchar(200) NOT NULL,
  `frequency` varchar(200) NOT NULL,
  `customer_irr` varchar(200) NOT NULL,
  `install_from` varchar(200) NOT NULL,
  `install_to` varchar(200) NOT NULL,
  `repayment_mode` varchar(200) NOT NULL,
  `installment_plan` text NOT NULL,
  `user_id` int(100) NOT NULL,
  `amt_financed` varchar(300) NOT NULL,
  `emi` varchar(200) NOT NULL,
  `penalty` varchar(255) NOT NULL,
  `overdue_charges` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `financestatement`
--

INSERT INTO `financestatement` (`id`, `agreement_no`, `branch`, `product`, `asset_desc`, `reg_no`, `disbursal_date`, `interest_rate_type`, `tenure`, `frequency`, `customer_irr`, `install_from`, `install_to`, `repayment_mode`, `installment_plan`, `user_id`, `amt_financed`, `emi`, `penalty`, `overdue_charges`) VALUES
(29, 'A123G11', 'Jaipur', 'CDIR', 'Two wheeler', 'Rj123456', '09/25/2015', '', '24', 'fixed', '', '06/25/2015', '', 'fixed', 'fixed', 0, '100000', '10', '500', '20');

-- --------------------------------------------------------

--
-- Table structure for table `financeuser`
--

CREATE TABLE IF NOT EXISTS `financeuser` (
  `id` int(11) NOT NULL,
  `f_name` varchar(200) NOT NULL,
  `m_name` varchar(200) NOT NULL,
  `l_name` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `father_name` varchar(200) NOT NULL,
  `c_address` text NOT NULL,
  `c_city` varchar(200) NOT NULL,
  `c_state` varchar(200) NOT NULL,
  `c_pincode` varchar(200) NOT NULL,
  `p_address` text NOT NULL,
  `p_city` varchar(200) NOT NULL,
  `p_state` varchar(200) NOT NULL,
  `p_pincode` varchar(200) NOT NULL,
  `o_address` varchar(300) NOT NULL,
  `o_city` varchar(200) NOT NULL,
  `o_state` varchar(200) NOT NULL,
  `o_pincode` varchar(200) NOT NULL,
  `r1_name` text NOT NULL,
  `r1_mobile` varchar(200) NOT NULL,
  `r1_address` varchar(200) NOT NULL,
  `r2_name` text NOT NULL,
  `r2_mobile` varchar(200) NOT NULL,
  `r2_address` varchar(200) NOT NULL,
  `mobile1` varchar(200) NOT NULL,
  `mobile2` varchar(200) NOT NULL,
  `landline1` varchar(200) NOT NULL,
  `landline2` varchar(200) NOT NULL,
  `agreement_no` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `financeuser`
--

INSERT INTO `financeuser` (`id`, `f_name`, `m_name`, `l_name`, `dob`, `father_name`, `c_address`, `c_city`, `c_state`, `c_pincode`, `p_address`, `p_city`, `p_state`, `p_pincode`, `o_address`, `o_city`, `o_state`, `o_pincode`, `r1_name`, `r1_mobile`, `r1_address`, `r2_name`, `r2_mobile`, `r2_address`, `mobile1`, `mobile2`, `landline1`, `landline2`, `agreement_no`) VALUES
(46, 'Ramautar', '', 'Sharma', '20-10-1985', 'Shayam Lal Sharma', 'Shyam Khadali Road,Tonk', 'Tonk', 'Rajasthan', '303303', 'Shyam Khadali Road,Tonk', 'Tonk', 'Rajasthan', '303303', 'Pratap Nagar,Sector-5,Behind Pushp Encalve', 'Jaipur', 'Rajasthan', '303313', 'Rajveer Sharma', '9352618456', 'Gandhi Nagar,Jaipur', 'Radha Lal', '9854123654', 'Trivani Nagar,Gopal Pura By Pass', '89451245', '87451236', '0145-223836', '0141-225365', 'A123G11');

-- --------------------------------------------------------

--
-- Table structure for table `settinga`
--

CREATE TABLE IF NOT EXISTS `settinga` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `fax` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `flink` text NOT NULL,
  `glink` text NOT NULL,
  `tlink` text NOT NULL,
  `lin_link` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settinga`
--

INSERT INTO `settinga` (`id`, `name`, `password`, `email`, `phone`, `fax`, `address`, `flink`, `glink`, `tlink`, `lin_link`) VALUES
(1, 'admin', 'test', 'info@teach1000.com', '9352918150', '12345', 'Jaipur', 'facebook.com', 'google.com', 'twitter.com', 'linkdin.com');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `id` int(11) NOT NULL,
  `agreement_no` varchar(100) NOT NULL,
  `v_d_name` varchar(200) NOT NULL,
  `v_make` varchar(200) NOT NULL,
  `v_model` varchar(200) NOT NULL,
  `v_chachis` varchar(200) NOT NULL,
  `v_engine` varchar(200) NOT NULL,
  `v_reg_no` varchar(200) NOT NULL,
  `v_reference` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `agreement_no`, `v_d_name`, `v_make`, `v_model`, `v_chachis`, `v_engine`, `v_reg_no`, `v_reference`) VALUES
(9, 'A123G11', 'Ramnath Chautala', 'CDIR', 'SS25', 'SSFD1', 'STR123', 'Ra14563', 'Shauchitra Sharma');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `financedetail`
--
ALTER TABLE `financedetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financestatement`
--
ALTER TABLE `financestatement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financeuser`
--
ALTER TABLE `financeuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settinga`
--
ALTER TABLE `settinga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `financedetail`
--
ALTER TABLE `financedetail`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `financestatement`
--
ALTER TABLE `financestatement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `financeuser`
--
ALTER TABLE `financeuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `settinga`
--
ALTER TABLE `settinga`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
