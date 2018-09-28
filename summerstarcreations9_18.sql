-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2018 at 10:28 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `summerstarcreations`
--
DROP DATABASE IF EXISTS `wedding`;
DROP DATABASE IF EXISTS `program3-lwetzel900`;
DROP DATABASE IF EXISTS `summerstarcreations`;
CREATE DATABASE `SummerStarCreations`;
USE `summerstarcreations`;
-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`) VALUES
(1, 'White'),
(2, 'Yellow'),
(3, 'Artificial Flower'),
(4, 'Hanger'),
(5, 'Purple'),
(6, 'Coral'),
(7, 'Green'),
(8, 'Peach'),
(9, 'Walnut'),
(10, 'Black'),
(11, 'Natural');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imageID` int(11) NOT NULL,
  `galleryImages` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imageID`, `galleryImages`) VALUES
(1, 'images/gallery/brideGroom.jpg'),
(2, 'images/gallery/grandmaDancing.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lineitem`
--

CREATE TABLE `lineitem` (
  `productID` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lineitem`
--

INSERT INTO `lineitem` (`productID`, `quantity`, `orderID`) VALUES
(74, 3, 1),
(2, 5, 2),
(7, 2, 3),
(75, 10, 3),
(30, 3, 3),
(1, 3, 4),
(68, 3, 4),
(78, 4, 4),
(72, 5, 5),
(2, 5, 5),
(4, 6, 5),
(1, 3, 6),
(2, 5, 6),
(5, 4, 6),
(7, 4, 7),
(20, 4, 7),
(8, 10, 8),
(2, 5, 8),
(8, 7, 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `userID`) VALUES
(1, 2),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(7, 4),
(8, 4),
(9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(3) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productSKU` varchar(25) NOT NULL,
  `vendorSKU` varchar(25) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `vendorID` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productName`, `productSKU`, `vendorSKU`, `description`, `price`, `vendorID`) VALUES
(1, 'Anemone and Dahlia ', 'AF-FBQ089-1000', 'SLK-FBQ089-EP/VI', 'Artificial Flower Bouquet in Purple - 16\" Tall', '40.00', 1),
(2, 'Anemone and Lilac ', 'AF-FBQ090-1001', 'SLK-FBQ090-PK/LL', 'Artificial Bouquet in Pink Purple - 11\" Tall', '30.00', 1),
(3, 'Peony & Ranunculus', 'AF-FBQ376-1002', 'SLK-FBQ376-CO/BS', 'Blush Coral Silk Bouquet - 13\" Tall', '30.00', 1),
(4, 'Rose, Lilac & Thistle', 'AF-FBQ640-1003', 'SLK-FBQ640-PE/GR', 'Silk Bridal Bouquet in Peach Green 11\" Tall', '50.00', 1),
(5, 'Silk Rose Bouquet', 'AF-FBQ099-1004', 'SLK-FBQ099-PE/CO', 'Blush & Coral - 11\" Tall', '40.00', 1),
(6, 'Artificial Dahlia & Succulent', 'AF-FBQ371-1005', 'SLK-FBQ371-GR/TT', 'Bouquet in Green - 12.5\" Tall', '35.00', 1),
(7, 'Artificial Rose', 'AF-FBQ957-1006', 'SLK-FBQ957-WH', 'Bouquet in White 9\" Tall', '27.00', 1),
(8, 'White Sophia Rose', 'AF-MTF17874-1007', 'REG-MTF17874-WHT', 'Artificial Nosegay Bouquet - 10\" Tall', '15.00', 1),
(9, 'Rose Silk', 'AF-FBQ176-1008', 'SLK-FBQ176-WH', 'Wedding Bouquet in White - 10.5\" Tall', '20.00', 1),
(10, 'Silk Rose Bouquet', 'AF-FBQ562-1009', 'SLK-FBQ562-CR/WH', 'Cream White 9\" Tall x 7\" Bouquet Head Diameter (2)', '15.00', 1),
(11, 'Silk Rose', 'AF-S7174-1010', 'NOR-S7174-WH', 'Wedding Bouquet in Cream White - 10\" Tall', '17.00', 1),
(12, 'Rose Silk', 'AF-FBQ100-1011', 'SLK-FBQ100-WH', 'Bridal Bouquet in Cream White - 11\" Tall (2)', '15.00', 1),
(13, 'Open Rose Silk', 'AF-FBQ463-1012', 'SLK-FBQ463-CR', 'Flower Wedding Bouquet in Cream 10.5\" Tall', '25.00', 1),
(14, 'Silk Rose', 'AF-FBQ100CR-1013', 'SLK-FBQ100-CR', 'Bouquet in Cream - 11.5\" Tall (2)', '15.00', 1),
(15, 'Peony Silk', 'AF-FBQ262-1014', 'SLK-FBQ262-WH', 'Bouquet in White 10\" Tall', '15.00', 1),
(16, 'Peony and Hydrangea', 'AF-FBQ037-1015', 'SLK-FBQ037-WH/GR', 'Silk Wedding Bouquet in White and Green 11\" Tall', '23.00', 1),
(17, 'White Peony & Green Succulent', 'AF-FBQ157-1016', 'SLK-FBQ157-WH/GR', 'Artificial Bouquet - 12\" Tall', '40.00', 1),
(18, 'Cream Peony', 'AF-FBQ382-1017', 'SLK-FBQ382-CR', 'Silk Flower Bouquet - 9\" Tall', '19.00', 1),
(19, 'Real Touch Calla Lily', 'AF-FSC028-1018', 'SLK-FSC028-WH', 'Silk Flower Bundle in White - 12\" Tall', '16.00', 1),
(20, 'Real Touch Calla Lily', 'AF-SB4166-1019', 'HAN-SB4166', 'Bouquet in White with Hint of Green - 14\" Tall', '18.00', 1),
(21, 'Silk Gardenia', 'AF-BQ990-1020', 'AFL-BQ990-WH', 'Bouquet in Cream White - 8.5\" Tall', '32.00', 1),
(22, 'Ranunculus and Lamb\'s Ear', 'AF-BQ502-1021', 'AFL-BQ502-WH', 'Small Silk Bouquet in White - 8\" Tall', '29.00', 1),
(23, 'Ranunculus', 'AF-FBQ799-1022', 'SLK-FBQ799-CR/GR', 'Silk Wedding Bouquet in Cream Green - 6.5\" Tall (2)', '15.00', 1),
(24, 'Orchid & Peony', 'AF-FBQ071-1023', 'SLK-FBQ071-WH/GR', 'Cream White Silk Flower Bouquet - 12\" Tall', '32.00', 1),
(25, 'Real Touch Cymbidium Orchid', 'AF-SB209-1024', 'FLO-SB206-WH', 'Bundle in White - 14\" Tall x 3\" Blooms', '21.00', 1),
(26, 'White Orchid', 'AF-BQ623-1025', 'AFL-BQ623-CR', 'Cascade Bouquet 24\" Long x 12\" Wide', '45.00', 1),
(27, 'Open Rose Blush', 'AF-FBQ463BS-1026', 'SLK-FBQ463-CR/BS', 'Pink Silk Flower Wedding Bouquet 10.5\" Tall', '24.00', 1),
(28, 'Cottage Rose', 'AF-FBQ177-1027', 'SLK-FBQ177-PK/CR', 'Wedding Bouquet in Pink Cream 9\" Tall', '15.00', 1),
(29, 'Silk Rose and Hydrangea', 'AF-FBQ030-1028', 'SLK-FBQ030-FU/PK', 'Wedding Bouquet in Pink and Cream - 11\" Tall', '25.00', 1),
(30, 'Rose & Hydrangea', 'AF-RHYBQ-1029', 'SUL-RHYBQ', 'Pink Cream Silk Bouquet - 16\" Tall', '30.00', 1),
(31, 'Silk Rose', 'AF-FBQ111-1030', 'SLK-FBQ111-BS/CR', 'Bouquet in Blush Pink Cream 11\" Tall', '22.00', 1),
(32, 'Rose Silk', 'AF-FBQ117-1031', 'SLK-FBQ117-PK/CR', 'Bouquet in Pink Cream 12\" Tall', '21.00', 1),
(33, 'Silk Rose', 'AF-FBQ562PK-1032', 'SLK-FBQ562-PK/MV', 'Bouquet in Mauve Pink 9\" Tall x 7\" Bouquet Head Diameter (2)', '15.00', 1),
(34, 'Artificial Rose', 'AF-FBQ731-1033', 'SLK-FBQ731-PK', 'Light Pink Bouquet - 8.5\" Tall', '22.00', 1),
(35, 'Silk Rose', 'AF-FBQ732-1034', 'SLK-FBQ732-PK', 'Bouquet in Pink - 10\" Tall', '25.00', 1),
(36, 'Silk Rose, Hydrangea & Sedum', 'AF-FBQ011-1035', 'SLK-FBQ011-PK/TT', 'Bouquet in Two Tone Pink - 10\" Tall', '18.00', 1),
(37, 'Artificial Rose', 'NOR-S5411-PK', 'Small Bouquet in Pink - 10\" Tall', 'AF-S5411-1036', '20.00', 1),
(38, 'Artificial Rose', 'AF-FBQ131-1037', 'SLK-FBQ131-BT', 'Bouquet in Dark Pink - 9.5\" Tall', '23.00', 1),
(39, 'Peony Silk', 'AF-HBQ435-1038', 'SLK-HBQ435-CR/CE', 'Bridal Bouquet in Cream White 14\" Tall', '25.00', 1),
(40, 'Real Touch Mini Peony Bundle', 'AF-SB212-1039', 'FLO-SB212-PK', 'Faux Flowers in Pink 14\" Tall x 2.5\" Blooms', '22.00', 1),
(41, 'Peony and Rose', 'AF-FBQ043-1040', 'SLK-FBQ043-PK/CR', 'Wedding Silk Bouquet in Pink and Cream - 11\" Tall', '25.00', 1),
(42, 'Peony Silk', 'AF-FBQ116-1041', 'SLK-FBQ116-RO/CR', 'Wedding Bouquet in Pink and Cream 11\" Tall x 7.5\" Bouquet Head', '20.00', 1),
(43, 'Hydrangea, Rose, and Peony', 'AF-FBQ576-1042', 'SLK-FBQ576-PK/GR', 'Silk Flower Bouquet Pk/Cream 11\" Tall x 7\" Bouquet', '25.00', 1),
(44, 'Silk Peony and Rose', 'AF-FBQ038-1043', 'SLK-FBQ038-RO/PK', 'Bouquet in Two Tone Pink 12\" Tall (2)', '15.00', 1),
(45, 'Silk Peony Wedding', 'AF-FBQ319-1044', 'SLK-FBQ319-PK/CR', 'Bouquet in Pink Cream 11.5\" Tall x 7\" Bouquet Head', '22.00', 1),
(46, 'Silk Peony', 'AF-FBQ008-1045', 'SLK-FBQ008-BT/PK', 'Bouquet in Two Tone Pink 12\" Tall', '15.00', 1),
(47, 'Peony', 'AF-HBQ435PK-1046', 'SLK-HBQ435-PK/DK', 'Silk Wedding Bouquet in Hot Pink 14\" Tall', '23.00', 1),
(48, 'Peony, Anemone & Eucalyptus ', 'AF-BQ314-1047', 'AFL-BQ314-PK', 'Silk Bouquet in Two Tone Pink - 13.5\" Tall', '30.00', 1),
(49, 'Pink Anemone & Eucalyptus ', 'AF-BQ012-1048', 'AFL-BQ012-PK', 'Artificial Bouquet - 13.5\" Tall', '33.00', 1),
(50, 'Anemone and Dahlia ', 'AF-FBQ089-1049', 'SLK-FBQ089-PK/VI', 'Artificial Flower Bouquet in Pink - 16\" Tall', '40.00', 1),
(51, 'Silk Peony & Dahlia ', 'AF-FBQ377-1050', 'SLK-FBQ377-MV/WH', 'Bouquet in Pink and White - 12\" Tall', '30.00', 1),
(52, 'Dahlia & Sweet Pea ', 'AF-FBQ086-1051', 'SLK-FBQ086-PK/WH', 'Silk Flower Bouquet in Pink - 18\" Tall', '42.00', 1),
(53, 'Silk Ranunculus & Lily of the Valley ', 'AF-FBQ636-1052', 'SLK-FBQ636-CR/GR', 'Bouquet in Cream Pink 11\" Tall', '25.00', 1),
(54, 'Mini Real Touch Calla Lily ', 'AF-SB112-1053', 'FLO-SB112-PK', 'Wedding Bouquet in Pink - 14\" Tall', '18.00', 1),
(55, 'Silk Hydrangea & Rose ', 'AF-FBQ338-1054', 'SLK-FBQ338-CR/CO', 'Bouquet in Cream and Coral 10\" Tall', '20.00', 1),
(56, 'Rose Silk ', 'AF-FBQ202-1055', 'SLK-FBQ202-PE/CR', 'Wedding Bouquet in Peach Cream - 11.5\" Tall', '23.00', 1),
(57, 'Blush Rose ', 'AF-FBQ731PE-1056', 'SLK-FBQ731-PE', 'Artificial Peach Bouquet - 8.5\" Tall', '22.00', 1),
(58, 'Silk Rose ', 'AF-FBQ732PE-1057', 'SLK-FBQ732-PE', 'Bouquet in Peach Blush - 10\" Tall', '25.00', 1),
(59, 'Cabbage Rose ', 'AF-FBQ094-1058', 'SLK-FBQ094-WH/PA', 'Silk Flower Bouquet in White & Peach - 9.5\" Tall', '22.00', 1),
(60, 'Peony Silk Flower ', 'AF-FBQ384-1059', 'SLK-FBQ384-CO/BS', 'Bouquet in Coral and Blush - 12\" Tall', '20.00', 1),
(61, 'Rose Silk ', 'AF-FBQ113-1060', 'SLK-FBQ113-PE/BS', 'Wedding Bouquet in Peach Blush - 12\" Tall', '20.00', 1),
(62, 'Silk Rose ', 'AF-FBQ562CO-1061', 'SLK-FBQ562-CO', 'Bouquet in Coral - 9\" Tall (2)', '15.00', 1),
(63, 'Peony and Rose ', 'AF-FBQ043PE-1062', 'SLK-FBQ043-PE/GR', 'Wedding Silk Wedding Bouquet in Peach and Green 11\" Tall', '23.00', 1),
(64, 'Peony ', 'AF-FBQ262PE-1063', 'SLK-FBQ262-PE', 'Silk Wedding Bouquet in Peach 10\" Tall', '15.00', 1),
(65, 'Peony Silk Flower ', 'AF-FBQ382CO-1064', 'SLK-FBQ382-CO', 'Bouquet in Coral - 9\" Tall', '20.00', 1),
(66, 'Artificial Sophia Rose ', 'AF-MTF17874OR-1065', 'REG-MTF17874-ORNG', 'Nosegay Bouquet in Orange Coral - 10\" Tall', '15.00', 1),
(67, 'Real Touch Calla Lily ', 'AF-SB113-1066', 'FLO-SB113-OR', 'Small Hand-Tied Wedding Bouquet in Orange - 13\" Tall', '27.00', 1),
(68, 'Rose Nosegay ', 'AF-S5781-1057', 'HAN-SB781-YEL', 'Standing Bouquet in Yellow 12\" Tall x 8\" Bouquet Head', '20.00', 1),
(69, 'Real Touch Calla Lily ', 'AF-SB113YL-1058', 'FLO-SB113-YL', 'Small Hand-Tied Wedding Bouquet in Yellow - 13\" Tall', '25.00', 1),
(70, 'Faux Sunflower ', 'AF-FBQ084-1059', 'SLK-FBQ084-YE', 'Bouquet in Yellow 12\" Tall x 10\" Diameter', '38.00', 1),
(72, 'Walnut Wood Hanger ', 'IH-100525-442', '100525', '17 inch w/ Notches', '11.00', 2),
(73, 'White Wood Hanger ', 'IH-100520-443', '100520', '17 inch w/Notches', '11.00', 2),
(74, 'Black Wood Hanger', 'IH-100533-444', '100533', '17 inch w/ Notches', '11.00', 2),
(75, 'Natural Wood Hanger', 'IH-200290-445', '200290', '17 inch w/Rubber Strips/Notches', '8.00', 2),
(76, 'Walnut Wood Hanger', 'IH-200291-446', '200291', '17 inch w/Rubber Strips/Notches', '8.00', 2),
(77, 'White Wood Hanger', 'IH-200292-447', '200292', '17 inch w/Rubber Strips/Notches', '8.00', 2),
(78, 'Black Wood Hanger', 'IH-200293-448', '200293', '17 inch w/Rubber Strips/Notches', '8.00', 2),
(79, 'White Padded Hanger', 'IH-800805-449', '800805', '16 inch w/Bow', '6.00', 2),
(80, 'Black Padded Hanger', 'IH-800205-450', '800205', '16 inch w/Bow', '6.00', 2),
(81, 'White Padded Combo Hanger', 'IH-800885-451', '800885', '16 inch w/Clips and Bow', '7.00', 2),
(82, 'Black Padded Combo Hanger', 'IH-800225-452', '800225', '16 inch w/Clips and Bow', '7.00', 2),
(83, 'White Padded Hanger', 'IH-800815-453', '800815', '12 inch w/Bow', '6.00', 2),
(84, 'White Padded Hanger', 'IH-800825-454', '800825', '12 inch w/Bow and Clips', '7.00', 2),
(85, 'White Wood Hanger', 'IH-700224-455', '700224', '12 inch w/Notches', '8.00', 2),
(86, 'Natural Wood Hanger', 'IH-700712-456', '700712', '12 inch w/Notches', '8.00', 2),
(87, 'Natural Wood Combo', 'IH-700722-457', '700722', '12 inch W/Clips/Notches', '8.00', 2),
(88, 'White Wood Combo', 'IH-700225-458', '700225', '12 inch W/Clips/Notches', '8.00', 2),
(89, 'White Wood Hanger', 'IH-WB2557-459', 'PRXL5017BWN#2557', '17 inch w/ silver Bride /Notches', '10.00', 2),
(90, 'White Wood w/ silver Hanger', 'IH-WG2559-460', 'PRXL5017BWN#2559', '17 inch Groom /Notches', '10.00', 2),
(91, 'Black Wood w/ silver Hanger', 'IH-BG2559-461', 'PR200333#2559', '17 inch Groom /Notches', '10.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `productcategorylink`
--

CREATE TABLE `productcategorylink` (
  `productID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL DEFAULT '123'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productcategorylink`
--

INSERT INTO `productcategorylink` (`productID`, `categoryID`) VALUES
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(15, 1),
(19, 1),
(21, 1),
(22, 1),
(24, 1),
(25, 1),
(26, 1),
(39, 1),
(51, 1),
(59, 1),
(73, 1),
(77, 1),
(79, 1),
(81, 1),
(83, 1),
(84, 1),
(85, 1),
(88, 1),
(89, 1),
(90, 1),
(1, 5),
(2, 5),
(3, 6),
(5, 6),
(55, 6),
(60, 6),
(62, 6),
(65, 6),
(66, 6),
(4, 7),
(6, 7),
(16, 7),
(17, 7),
(20, 7),
(23, 7),
(63, 7),
(4, 8),
(56, 8),
(57, 8),
(58, 8),
(59, 8),
(61, 8),
(63, 8),
(64, 8),
(72, 9),
(76, 9),
(74, 10),
(78, 10),
(80, 10),
(82, 10),
(91, 10),
(75, 11),
(86, 11),
(87, 11),
(68, 2),
(69, 2),
(70, 2),
(72, 4),
(73, 4),
(74, 4),
(79, 4),
(80, 4),
(81, 4),
(82, 4),
(83, 4),
(84, 4),
(85, 4),
(86, 4),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 3),
(38, 3),
(39, 3),
(40, 3),
(41, 3),
(42, 3),
(43, 3),
(44, 3),
(45, 3),
(46, 3),
(47, 3),
(48, 3),
(49, 3),
(50, 3),
(51, 3),
(52, 3),
(53, 3),
(54, 3),
(55, 3),
(56, 3),
(57, 3),
(58, 3),
(59, 3),
(60, 3),
(61, 3),
(62, 3),
(63, 3),
(64, 3),
(65, 3),
(66, 3),
(67, 3),
(68, 3),
(69, 3),
(70, 3);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serviceID` int(11) NOT NULL,
  `serviceType` varchar(50) NOT NULL,
  `serviceDescription` varchar(225) NOT NULL,
  `servicePicture` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceID`, `serviceType`, `serviceDescription`, `servicePicture`) VALUES
(1, 'Wedding', 'your wedding ceromony', 'images/service/brideGroom.jpg'),
(2, 'Wedding Reception', 'For everything after the ceremony', 'images/service/weddingReception.jpg'),
(3, 'Anniversary ', 'celebrating a big turning point in a relationship? we can cover that to', 'images/service/serviceDefault.jpg'),
(4, 'Birthday', 'Rather it is for your 4 or 40 year old, we got you covered', 'images/service/birthday.jpg'),
(5, 'Yum', 'Taste testing', 'images/service/tasteTest.jpg'),
(6, 'Graduation Reception', 'your special person is graduating high school or college, you guessed it. we do that as well', 'images/service/graduation.jpg'),
(7, 'Haha', 'stand up comedy', 'images/service/standup.jpg'),
(8, 'All in All', 'all in all this has been interesting', 'images/service/serviceDefault.jpg'),
(9, 'Really', 'i hope this works', 'images/service/serviceDefault.jpg'),
(10, 'really really', 'I really hope this works', 'images/service/serviceDefault.jpg'),
(12, 'really really really', 'Thank god it worked', 'images/service/serviceDefault.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userRole` int(1) DEFAULT NULL,
  `firstName` varchar(15) NOT NULL,
  `lastName` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `zip` int(5) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userRole`, `firstName`, `lastName`, `email`, `address`, `city`, `zip`, `phone`, `password`) VALUES
(1, 1, 'Loren', 'Wetzel', 'lwetzel90@gmail.com', '609 4th Ave', 'Nebraska City', 68410, '4028817220', '$2y$12$33CoiE0rHEZR/Fk.qheCg.S0718wisKuyZweG4ZpWzjp37781/arG'),
(2, NULL, 'jonny', 'jonson', 'jon@jonson.com', '156 johnnyway', 'jonsville', 68450, '7896541523', '$2y$12$nIjUEHtRovHmlPhqIRm9b.53t8xb9o0YyJ8z7MFGhjm7K0ek9gb2u'),
(3, 1, 'Admin', 'Administrator', 'admin@admin.com', '123 Over', 'There', 89745, '789-987-7896', '$2y$12$0zsDJX0uXcDu9HA9P6TIE.2ytWUtjojFGqviunSwv0YT9yegFs8Pu'),
(4, NULL, 'Some', 'Guy', 'some@guy.com', '1234 Over', 'There', 68111, '123-456-9874', '$2y$12$wZq1fhhhnE.wvl2q0yj7je7CNONFmZ56.oqW1cJrOQZHUW.ol1ONq');

-- --------------------------------------------------------

--
-- Table structure for table `userselection`
--

CREATE TABLE `userselection` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `venueID` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userselection`
--

INSERT INTO `userselection` (`id`, `userID`, `venueID`, `serviceID`) VALUES
(1, 3, 1, 8),
(2, 1, 1, 2),
(3, 1, 1, 8),
(4, 1, 3, 3),
(5, 1, 3, 4),
(6, 1, 3, 7),
(7, 1, 4, 8),
(8, 1, 2, 8),
(9, 1, 2, 1),
(10, 2, 2, 8),
(11, 2, 2, 1),
(12, 4, 2, 1),
(13, 2, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendorID` int(2) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendorID`, `name`) VALUES
(1, 'Afloral'),
(2, 'International Hanger'),
(3, 'Kate Aspen'),
(4, 'Silver Star Jewlery');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `venueID` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(2) NOT NULL,
  `venuePicture` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`venueID`, `name`, `city`, `state`, `venuePicture`) VALUES
(1, 'Fox Center', 'Nebraska City', 'NE', 'images/venue/venue.jpeg'),
(2, 'Arbor Lodge', 'Nebraska City', 'NE', 'images/venue/receptionBride.jpg'),
(3, 'blah blah', 'blahville', 'BA', 'images/venue/venueDefault.jpg'),
(4, 'That Venue', 'Over There', 'BS', 'images/venue/venueDefault.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `venueservice`
--

CREATE TABLE `venueservice` (
  `id` int(11) NOT NULL,
  `venueID` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venueservice`
--

INSERT INTO `venueservice` (`id`, `venueID`, `serviceID`) VALUES
(1, 2, 8),
(2, 4, 8),
(3, 3, 3),
(4, 1, 4),
(5, 3, 4),
(6, 1, 6),
(7, 3, 7),
(8, 4, 4),
(9, 3, 6),
(10, 2, 1),
(11, 3, 1),
(12, 1, 1),
(13, 4, 1),
(14, 3, 2),
(15, 2, 5),
(16, 2, 9),
(17, 2, 10),
(19, 2, 12),
(20, 3, 12),
(21, 1, 12),
(22, 4, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imageID`);

--
-- Indexes for table `lineitem`
--
ALTER TABLE `lineitem`
  ADD KEY `productID` (`productID`,`orderID`),
  ADD KEY `orderID` (`orderID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `vendorID` (`vendorID`);

--
-- Indexes for table `productcategorylink`
--
ALTER TABLE `productcategorylink`
  ADD KEY `productID` (`productID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serviceID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `userselection`
--
ALTER TABLE `userselection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`),
  ADD KEY `venueID` (`venueID`),
  ADD KEY `serviceID` (`serviceID`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendorID`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venueID`);

--
-- Indexes for table `venueservice`
--
ALTER TABLE `venueservice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venueID` (`venueID`),
  ADD KEY `serviceID` (`serviceID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serviceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userselection`
--
ALTER TABLE `userselection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendorID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `venueID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `venueservice`
--
ALTER TABLE `venueservice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lineitem`
--
ALTER TABLE `lineitem`
  ADD CONSTRAINT `lineitem_fk` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`),
  ADD CONSTRAINT `lineitem_fk_2` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_fk` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_fk` FOREIGN KEY (`vendorID`) REFERENCES `vendor` (`vendorID`);

--
-- Constraints for table `productcategorylink`
--
ALTER TABLE `productcategorylink`
  ADD CONSTRAINT `productcategorylink_fk` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productcategorylink_fk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userselection`
--
ALTER TABLE `userselection`
  ADD CONSTRAINT `userselection_fk` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `userselection_fk_2` FOREIGN KEY (`venueID`) REFERENCES `venue` (`venueID`),
  ADD CONSTRAINT `userselection_fk_3` FOREIGN KEY (`serviceID`) REFERENCES `services` (`serviceID`);

--
-- Constraints for table `venueservice`
--
ALTER TABLE `venueservice`
  ADD CONSTRAINT `venueservice_fk` FOREIGN KEY (`serviceID`) REFERENCES `services` (`serviceID`),
  ADD CONSTRAINT `venueservice_fk_2` FOREIGN KEY (`venueID`) REFERENCES `venue` (`venueID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
