-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 02:52 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Team SR', 'teamsr', 7899785785, 'teamsr@gmail.com', 'f925916e2754e5e03f75dd58a5733251', NULL),
(2, 'Government', 'Govt', 7899780780, 'govt@gmail.com', 'f925916e2754e5e03f75dd58a5733251', NULL);


CREATE TABLE `tblcity` (
  `ID` int(10) NOT NULL,
  `StateID` int(10) DEFAULT NULL,
  `City` varchar(120) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO `tblcity` (`ID`, `StateID`, `City`, `CreationDate`) VALUES
(19, 1, 'Bengaluru', '2023-05-18 10:38:04'),
(20, 2, 'Kochi', '2023-05-18 10:38:40'),
(21, 3, 'Lucknow', '2023-05-18 10:38:54'),
(22, 4, 'Vijayawada', '2023-05-18 10:39:13'),
(23, 5, 'New Delhi', '2023-05-18 10:39:30'),
(24, 6, 'Mumbai', '2023-05-18 10:39:37'),
(25, 7, 'Chennai', '2023-05-18 10:39:50');


CREATE TABLE `tblcontact` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Phone` bigint(10) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `EnquiryDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsRead` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `tblcontact` (`ID`, `FirstName`, `LastName`, `Email`, `Phone`, `Message`, `EnquiryDate`, `IsRead`) VALUES
(5, 'Koushik', 'Salanki', 'koushik@gmail.com', 2345678901, 'I want to help you', '2023-05-18 12:46:41', 1),
(6, 'Vaishnavi', 'Kalmath', 'vaish@gmail.com', 4567890123, 'I want to do this as a social service.', '2023-05-18 12:48:00', NULL);


CREATE TABLE `tbldonor` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO `tbldonor` (`ID`, `FullName`, `Email`, `MobileNumber`, `Password`, `RegDate`) VALUES
(1, 'Sahana', 'sahana@gmail.com', 7899785785, '9a5752b006e90ff71ca2cc7f7eab5c31', '2023-05-18 10:41:20'),
(2, 'Rohith', 'rohith@gmail.com', 7795389758, '7deb2a92e95689fb3bce0a96eca0592f', '2023-05-18 10:42:49'),
(3, 'Sammed', 'sammed@gmail.com', 9019995991, '9a5752b006e90ff71ca2cc7f7eab5c31', '2023-05-18 10:46:41'),
(4, 'Sathvik', 'sathvikswamykm@gmail.com', 9902699601, '9a5752b006e90ff71ca2cc7f7eab5c31', '2023-05-18 10:47:25');


CREATE TABLE `tblfood` (
  `ID` int(10) NOT NULL,
  `DonorID` int(10) DEFAULT NULL,
  `foodId` int(10) DEFAULT NULL,
  `FoodItems` mediumtext DEFAULT NULL,
  `StateName` varchar(200) DEFAULT NULL,
  `CityName` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PickupDate` varchar(200) DEFAULT NULL,
  `PickupAddress` mediumtext DEFAULT NULL,
  `ContactPerson` varchar(200) DEFAULT NULL,
  `CPMobNumber` bigint(10) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `tblfood` (`ID`, `DonorID`, `foodId`, `FoodItems`, `StateName`, `CityName`, `Description`, `PickupDate`, `PickupAddress`, `ContactPerson`, `CPMobNumber`, `Image`, `CreationDate`, `UpdationDate`) VALUES
(5, 4, 825245073, 'Rice,Dal', 'Karnataka', 'Bengaluru', 'xyz', '2023-05-19', 'RVITM', 'Sathvik Swamy K M', 9902699601, '32c5df8cd5fd1735d862c89f782e6e29.jpg', '2023-05-18 12:13:25', '2023-05-18 12:26:25'),
(6, 1, 351402030, 'Chapatti,Curry', 'Karnataka', 'Bengaluru', 'abc', '2023-05-22', 'Kormangla', 'Nikitha', 9956438970, '6c6421b772209bb9ecc75e2b672392c1jpeg', '2023-05-18 12:17:22', NULL),
(7, 3, 690561372, 'Puri,Kurma', 'Andra Pradesh', 'Vijayawada', 'Good Quality', '2023-05-24', 'Gandhi Nagar', 'Harshitha', 7654367892, '3d061aecd774b26f9a82ed2776dbb8f8.jpg', '2023-05-18 12:36:28', NULL);


CREATE TABLE `tblfoodrequests` (
  `id` int(11) NOT NULL,
  `requestNumber` bigint(12) DEFAULT NULL,
  `foodId` int(1) DEFAULT NULL,
  `fullName` varchar(150) DEFAULT NULL,
  `mobileNumber` bigint(12) DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `requestDate` timestamp NULL DEFAULT current_timestamp(),
  `status` varchar(120) DEFAULT NULL,
  `donorRemark` mediumtext DEFAULT NULL,
  `requestCompletionDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `tblfoodrequests` (`id`, `requestNumber`, `foodId`, `fullName`, `mobileNumber`, `message`, `requestDate`, `status`, `donorRemark`, `requestCompletionDate`) VALUES
(4, 788722121, 5, 'Saanvi', 1234567890, '', '2023-05-18 12:24:28', 'Food Take Away/ Request Completed', 'Done', '2023-05-18 12:25:23'),
(5, 963746652, 6, 'Samrudhi', 9087654321, '', '2023-05-18 12:28:08', 'Request Rejected', 'food is spoiled', '2023-05-18 12:28:43'),
(6, 224906603, 7, 'Rajath', 5432456759, 'Need it for an NGO', '2023-05-18 12:38:03', NULL, NULL, NULL);


CREATE TABLE `tblpages` (
  `ID` int(11) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO `tblpages` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `UpdationDate`) VALUES
(1, 'aboutus', 'About Us', '                                <div style=\"text-align: center;\"><b><font size=\"6\">Welcome to Food Waste Management System</font></b></div><div style=\"text-align: left;\"><br></div><div style=\"text-align: left;\"><p class=\"bodytext\" style=\"margin-bottom: 10px; color: rgb(33, 37, 41); line-height: 1.5; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><span style=\"font-weight: 700;\">Food waste&nbsp;</span>refers to the decrease in the quantity or quality of food resulting from decisions and actions by retailers, food service providers and consumers. &nbsp;Food is wasted in many ways:</p><ul style=\"margin-bottom: 10px; padding-left: 1.5em; color: rgb(33, 37, 41); font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><li style=\"margin-bottom: 6px; position: relative; padding-right: 15px; line-height: 1.5;\">Fresh produce that deviates from what is considered optimal, for example in terms of shape, size and color, is often removed from the supply chain during sorting operations.</li><li style=\"margin-bottom: 6px; position: relative; padding-right: 15px; line-height: 1.5;\">Foods that are close to, at or beyond the â€œbest-beforeâ€ date are often discarded by retailers and consumers.</li><li style=\"margin-bottom: 6px; position: relative; padding-right: 15px; line-height: 1.5;\">Large quantities of wholesome edible food are often unused or left over and discarded from household kitchens and eating establishments.</li></ul><p class=\"bodytext\" style=\"margin-bottom: 10px; color: rgb(33, 37, 41); line-height: 1.5; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\">Less food loss and waste would lead to more efficient land use and better water resource management with positive impacts on climate change and livelihoods.</p></div>', '2021-12-09 11:36:01'),
(2, 'contactus', 'Contact Us', '<b>Food Waste Management System</b><div><b>Contact Number:</b>+91-96784532145</div><div><b>email: </b>info@gmail.com</div><div><b>Address : </b>XYZ street ABC</div>', '2022-01-23 06:34:52');


CREATE TABLE `tblstate` (
  `ID` int(10) NOT NULL,
  `StateName` varchar(120) DEFAULT NULL,
  `RegState` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO `tblstate` (`ID`, `StateName`, `RegState`) VALUES
(1, 'Karnataka', '2023-05-18 06:32:34'),
(2, 'Kerala', '2023-05-18 10:23:50'),
(3, 'Uttar Pradesh', '2023-05-18 07:07:21'),
(4, 'Andra Pradesh', '2023-05-18 10:25:11'),
(5, 'Delhi/NCR', '2023-05-18 10:25:40'),
(6, 'Maharastra', '2023-05-18 10:25:51'),
(7, 'Tamilnadu', '2023-05-18 10:26:05');

ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `tblcity`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `tbldonor`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `tblfood`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `tblfoodrequests`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `tblstate`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `tblcity`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

ALTER TABLE `tblcontact`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `tbldonor`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `tblfood`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `tblfoodrequests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `tblpages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `tblstate`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

