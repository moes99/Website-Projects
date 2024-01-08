-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 11:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project database`
--

-- --------------------------------------------------------

--
-- Table structure for table `batteries`
--

CREATE TABLE `batteries` (
  `ID` int(255) NOT NULL,
  `Manufacturer` varchar(255) NOT NULL,
  `Model` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Voltage` varchar(255) NOT NULL,
  `Capacity` varchar(255) NOT NULL,
  `Tech` varchar(255) NOT NULL,
  `ImgDirec` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batteries`
--

INSERT INTO `batteries` (`ID`, `Manufacturer`, `Model`, `Price`, `Voltage`, `Capacity`, `Tech`, `ImgDirec`) VALUES
(1, 'Felicity Solar', 'FL-G-200AH 12V', '$1,000', '12 V', '200 Ah', 'Gel', '../resources/products/batteries/Felicity Solar FL-G-200Ah-12V/'),
(2, 'Super B', 'Nomia 12V210Ah', '$210', '12 V', '210 Ah', 'Lithium', '../resources/products/batteries/Super B Nomia 12V210Ah/'),
(3, 'Covax', 'Tubular 12V-200Ah', '$155', '12 V', '200 Ah', 'Lead Acid', '../resources/products/batteries/Covax Tubular 12V-200Ah/'),
(4, 'Fenestra', 'Lithium 48V-200Ah', '$2,500', '48 V', '200 Ah', 'Lithium', '../resources/products/batteries/Fenestra Lithium 48V-200Ah/'),
(5, 'Growatt', 'Lithium 48V-100Ah', '$1,500', '48 V', '100 Ah', 'Lithium', '../resources/products/batteries/Growatt Lithium 48V-100Ah/'),
(6, 'Nasoki', 'Tubular 12V-240Ah', '$220', '12 V', '240 Ah', 'Lead Acid', '../resources/products/batteries/Nasoki Tubular 12V-240Ah/');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pd_table` varchar(255) NOT NULL,
  `pid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `username`, `pd_table`, `pid`) VALUES
(2, 'k', 'solar_inverters', '2'),
(3, 'k', 'solar_inverters', '4'),
(4, 'k', 'ht_panels', '4'),
(5, 'k', 'batteries', '5');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(255) NOT NULL,
  `Category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `Category`) VALUES
(1, 'solar_inverters'),
(2, 'pv_panels'),
(3, 'ht_panels'),
(4, 'batteries');

-- --------------------------------------------------------

--
-- Table structure for table `ht_panels`
--

CREATE TABLE `ht_panels` (
  `ID` int(255) NOT NULL,
  `Manufacturer` varchar(255) NOT NULL,
  `Model` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `NbTubes` int(255) NOT NULL,
  `TankCapacity` varchar(255) NOT NULL,
  `TubeDiameter` varchar(255) NOT NULL,
  `TubeLength` varchar(255) NOT NULL,
  `ImgDirec` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_panels`
--

INSERT INTO `ht_panels` (`ID`, `Manufacturer`, `Model`, `Price`, `NbTubes`, `TankCapacity`, `TubeDiameter`, `TubeLength`, `ImgDirec`) VALUES
(1, 'Free Sun', 'FS16', '$1,250', 16, '151 L', '58 mm', '1.8 m', '../resources/products/heat panels/Free Sun FS16/'),
(2, 'Free Sun', 'FSHC 24', '$1,000', 24, 'Tankless', '58 mm', '1.8 m', '../resources/products/heat panels/Free Sun FSHC24/'),
(3, 'ProEco', 'Solaris P-270', '$1,600', 30, '280 L', '58 mm', '1.8 m', '../resources/products/heat panels/ProEco Solaris P-270/'),
(4, 'Free Sun', 'FSC 30', '$1,430', 30, '200 L', '58 mm', '1.8 m', '../resources/products/heat panels/Free Sun FSC30/'),
(5, 'ProEco', 'Solaris JNHP-100', '$670', 10, '96 L', '58 mm', '1.8 m', '../resources/products/heat panels/ProEco JNHP-100/');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `ID` int(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(400) NOT NULL,
  `Cover_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`ID`, `Title`, `Description`, `Cover_image`) VALUES
(1, '20KW Solar System for Al Bayader Beirut School', 'Al Bayader School in Beirut, Lebanon approached us for the design and installation of a 50KW solar system. About 90 to 120 photovoltaic panels each with a peak power rating of 330 Watts each have been installed.', '../resources/project images/image 1.jpg'),
(2, '2KW Solar System for A Family Home', 'The Shehab Home in Baakleen, Lebanon approached us for the design and installation of a 2KW solar system. Eight photovoltaic panels each with a peak power rating of 540 Watts each have been installed. This system can deliver up to 14 Amperes of current at an AC voltage of 220 Volts.', '../resources/project images/image 2.jpg'),
(3, 'ABC Verdun Solar Water Heating System', 'This massive solar water heating system for ABC Verdun is capable of heating a 10,000 L storage tank in 3 hours. The annual cost saving due to this system reach up to $20,000 per year.', '../resources/project images/image 4.jpg'),
(4, '10 KW PV System for a Multi-Family Villa', 'Al-Usta Family approached us for the design and installation of a 10 KW solar system in Bikaa, Lebanon. 20 PV panels with a peak power rating of 400 Watts each have been installed. It can deliver up to 30 Amperes of currents at an AC voltage of 220 Volts.', '../resources/project images/image 3.jpg'),
(5, 'Solar Street Lights Along Daher Al-Baydar Highway', 'We installed a total of 50 solar streetlights each with a capacity of 200W along Daher Al-Baydar Highway. Each light is capable of illuminating a radius of 10 meters in every direction. Additionally, each light is equipped with a fog sensor which reduced the annual number of accidents due to fog by 50%.', '../resources/project images/image 5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pv_panels`
--

CREATE TABLE `pv_panels` (
  `ID` int(255) NOT NULL,
  `Manufacturer` varchar(255) NOT NULL,
  `Model` varchar(255) NOT NULL,
  `Material` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Pmp` varchar(255) NOT NULL,
  `Voc` varchar(255) NOT NULL,
  `Isc` varchar(255) NOT NULL,
  `Efficiency` varchar(255) NOT NULL,
  `ImgDirec` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pv_panels`
--

INSERT INTO `pv_panels` (`ID`, `Manufacturer`, `Model`, `Material`, `Price`, `Pmp`, `Voc`, `Isc`, `Efficiency`, `ImgDirec`) VALUES
(1, 'Longi', 'LR5-72HPH-540M', 'Monocrystalline', '$157', '540 W', '49.65 V', '13.92 A', '20%', '../resources/products/pv panels/Longi LR5-72HPH-540M/'),
(2, 'Orex', 'Y1-SOL-020W', 'Monocrystalline', '$30', '20 W', '22.14 V', '1.16 A', '19%', '../resources/products/pv panels/Orex Y1-SOL-020W/'),
(3, 'Trina Solar', 'Vertex 670W+', 'Monocrystalline', '$185', '670 W', '46.1 V', '18.62 A', '21.6%', '../resources/products/pv panels/Trina Solar Vertex 670/'),
(4, 'Trina Solar', 'Vertex 640W+', 'Monocrystalline', '$177', '640 W', '44.9 V', '18.34 A', '21.6%', '../resources/products/pv panels/Trina Solar Vertex 640/'),
(5, 'Resun', 'RS6C-M', 'Monocrystalline', '$200', '300 W', '39.85 V', '9.62 A', '20%', '../resources/products/pv panels/Resun RS6C-M/');

-- --------------------------------------------------------

--
-- Table structure for table `solar_inverters`
--

CREATE TABLE `solar_inverters` (
  `ID` int(255) NOT NULL,
  `Manufacturer` varchar(255) NOT NULL,
  `Model` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Power` varchar(255) NOT NULL,
  `AC` varchar(255) NOT NULL,
  `DC` varchar(255) NOT NULL,
  `MPPT` varchar(255) NOT NULL,
  `ImgDirec` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `solar_inverters`
--

INSERT INTO `solar_inverters` (`ID`, `Manufacturer`, `Model`, `Description`, `Type`, `Power`, `AC`, `DC`, `MPPT`, `ImgDirec`, `Price`) VALUES
(1, 'Must', 'PV1100 Plus', 'PV1100Plus is a cost-effective intelligent hybrid off grid solar inverter. The LCD display offers friendly user-configurable button adjustments. It features automatic switching to the AC grid when the battery voltage is low.', 'Off Grid', '1,200 W', '230 VAC - 50/60 Hz - 4 A', '12 V - 125 A', '16 to 55 V', '../resources/products/solar inverters/Must PV1100 Plus/', '$250'),
(2, 'Growatt', 'MIC 3300TL-X', 'MIC series are cost-effective intelligent off grid solar inverters. The LCD display offers friendly user-configurable button adjustments.', 'Off Grid', '3,000 W', '230 VAC - 50/60 Hz - 14.3 A', '24 V - 125 A', '65 to 550 V', '../resources/products/solar inverters/Growatt MIC 3300TL-X/', '$500'),
(3, 'Covax', 'CV-II-M-Plus 3.5KW', 'CV-II-M-Plus 3.5KW, hybrid inverter, is suitable for residential and light commercial use, maximizing self-consumption rate of solar energy and increasing your energy impendence. During the day, the PV system generates electricity which will be provided t', 'Hybrid', '3,500 W', '230 VAC - 50/60 Hz - 24.9 A', '24 VDC - 80 A', '120 to 450 VDC', '../resources/products/solar inverters/Covax CV-II-M-Plus 3.5KW/', '$450'),
(4, 'Deye', 'SUN-3.6K', 'SUN 3.6K-SG03LP1, hybrid inverter, is suitable for residential and light commercial use, maximizing self-consumption rate of solar energy and increasing your energy impendence. During the day, the PV system generates electricity which will be provided to ', 'Hybrid', '3,600 W', '220 VAC - 1 PH - 50/60Hz', '48 VDC - 13 A', '100 to 500 VDC', '../resources/products/solar inverters/Deye SUN-3.6K/', '$980'),
(6, 'Growatt', 'MID 15KTL3-X', 'MID series are cost-effective intelligent commercial solar inverters. The OLED display offers friendly user-configurable button adjustments.', 'Commercial & Industrial', '15,000 W', '230/400 VAC - 3 ph - 50/60 Hz - 24.2 A', ' 200 to 1,000 VDC - 23 to 113 A', '580 V', '../resources/products/solar inverters/Growatt MID 15KTL3-X/', '$1,200');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `code`) VALUES
(1, 'Rafic', 'Abedelrahmanalsharif31@gmail.com', 'fbf922ae5ddf295ee5112eec0d21bb18', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batteries`
--
ALTER TABLE `batteries`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `ht_panels`
--
ALTER TABLE `ht_panels`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pv_panels`
--
ALTER TABLE `pv_panels`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `solar_inverters`
--
ALTER TABLE `solar_inverters`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batteries`
--
ALTER TABLE `batteries`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_panels`
--
ALTER TABLE `ht_panels`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pv_panels`
--
ALTER TABLE `pv_panels`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `solar_inverters`
--
ALTER TABLE `solar_inverters`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
