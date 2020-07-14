-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2020 at 04:52 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `picture` text NOT NULL,
  `Name` text NOT NULL,
  `Amount` int(11) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `IdComment` int(11) NOT NULL,
  `NameProduct` text NOT NULL,
  `UserName` text NOT NULL,
  `Commentcontent` text NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `Idcustomer` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Email` text NOT NULL,
  `Phone_number` text NOT NULL,
  `Address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`Idcustomer`, `Name`, `Email`, `Phone_number`, `Address`) VALUES
(22, 'Le Nguyen Thanh Phat', '517H0071@student.tdtu.edu.vn', '0769657732', '938/45 Kim Long, District'),
(23, 'Le Nguyen Thanh Phat', '517H0071@student.tdtu.edu.vn', '0769657732', '938/45 Kim Long, District'),
(24, 'Le Nguyen Thanh Phat', '517H0071@student.tdtu.edu.vn', '0769657732', '938/45 Kim Long, District'),
(25, 'Le Nguyen Thanh Phat', '517H0071@student.tdtu.edu.vn', '0769657732', '938/45 Kim Long, District');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Idorder` int(11) NOT NULL,
  `Idcustomer` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Idorder`, `Idcustomer`, `Price`, `Note`) VALUES
(6, 22, 129, ''),
(7, 23, 132, ''),
(8, 24, 0, ''),
(9, 25, 74, '');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `Iddetail` int(11) NOT NULL,
  `Idorder` int(11) NOT NULL,
  `NameProduct` text NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`Iddetail`, `Idorder`, `NameProduct`, `Quantity`, `Price`) VALUES
(4, 6, 'C Macchiato', 18, 126),
(5, 6, 'Cafe Frappe', 1, 3),
(6, 7, 'C Macchiato', 18, 126),
(7, 7, 'Cafe Frappe', 2, 6),
(8, 9, 'Frozen Latte', 14, 56),
(9, 9, 'Hot Chocolate', 3, 18);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Price` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Description` text NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `Name`, `Price`, `Quantity`, `Description`, `picture`) VALUES
(1, 'Americano', 2, 88, 'Americano is a type of coffee drink prepared by diluting an espresso with hot water, giving it a similar strength to, but different flavor from, traditionally brewed coffee.', 'images/coffee1.jpg'),
(2, 'Cafe Frappe', 3, 78, 'Frappe is just a sweet iced coffee blended with milk and espresso, and it makes for the perfect, summer favorite coffee house treat. It is a MUST have coffee drink if you\'re hanging out at the pool, beach, or even your backyard', 'images/coffee2.jpg'),
(3, 'Cafe Latte', 6, 98, 'Cafe latte is a coffee-based drink made primarily from espresso and steamed milk. It consists of one-third espresso, two-thirds heated milk and about 1cm of foam. Depending on the skill of the barista, the foam can be poured in such a way to create a picture.', 'images/coffee3.jpg'),
(4, 'Capuchino', 5, 54, 'A cappuccino is an espresso-based coffee drink that originated in Italy, and is traditionally prepared with steamed milk foam (microfoam)', 'images/coffee4.jpg'),
(5, 'C Macchiato', 7, 65, 'Caramel Macchiato. Freshly steamed milk with vanilla-flavored syrup marked with espresso and topped with a caramel drizzle for an oh-so-sweet finish.', 'images/coffee5.jpg'),
(6, 'Espresso', 5, 75, 'Espresso is a concentrated form of coffee served in small, strong shots and is the base for many coffee drinks. It\'s made from the same beans as coffee but is stronger, thicker, and higher in caffeine. However, because espresso is typically served in smaller servings than coffee, it has less caffeine per serving.', 'images/coffee6.jpg'),
(7, 'Frozen Latte', 4, 45, 'Frozen Caramel Latte. This frothy, blended espresso drink will wake you up and make you happy any time of day. Sweetened with caramel sauce and topped with whipped cream, this is one delicious frozen latte.', 'images/coffee7.jpg'),
(8, 'Hot Chocolate', 6, 55, 'Hot chocolate is a hot drink. It is usually made by mixing chocolate or cocoa powder and sugar with warm milk or water. Hot chocolate is usually drunk to make the drinker feel happier or warmer', 'images/coffee8.jpg'),
(9, 'Hot Tea', 3, 46, 'Drinking hot tea has a naturally calming effect. Enjoying a cup requires us to sit, slow down, and relax – all of which are natural weapons against stress and anxiety. The key to feeling stress- and anxiety-free is to go for caffeine-free herbal teas, such as peppermint and passion flower.', 'images/coffee9.jpg'),
(10, 'Iced Latte', 7, 87, 'An iced latte is a simple and straight forward cold espresso based drink, not to be confused with an iced coffee. Iced coffee tend to be sweetened, not overly strong, topped with ice cream and possibly even whipped cream', 'images/coffee10.jpg'),
(11, 'Iced Mocha', 6, 59, 'Iced Cafe Mocha. Our rich, full-bodied espresso combined with bittersweet mocha sauce, milk and ice, then topped with sweetened whipped cream. The classic iced coffee drink that always sweetly satisfies', 'images/coffee11.jpg'),
(12, 'L Macchiato', 5, 54, 'Latte macchiato is a coffee beverage; the name means stained or marked milk. Marked as in an espresso stain on the milk used. It is a play on “Espresso macchiato” which is an espresso with a drop or two of milk or cream.', 'images/coffee12.jpg'),
(13, 'Mocha', 5, 35, 'Like a cafe latte, cafe mocha is based on espresso and hot milk but with added chocolate flavouring and sweetener, typically in the form of cocoa powder and sugar. Many varieties use chocolate syrup instead, and some may contain dark or milk chocolate.', 'images/coffee13.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `IdSchedule` int(11) NOT NULL,
  `IdStaff` int(11) NOT NULL,
  `Weekdays` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`IdSchedule`, `IdStaff`, `Weekdays`) VALUES
(1, 2, 'Monday'),
(2, 1, 'Monday'),
(3, 1, 'Tuesday'),
(4, 3, 'Tuesday'),
(5, 2, 'Wednesday'),
(6, 3, 'Wednesday'),
(7, 3, 'Thursday'),
(8, 1, 'Thursday'),
(9, 4, 'Saturday'),
(10, 2, 'Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `staff_info`
--

CREATE TABLE `staff_info` (
  `IdStaff` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_info`
--

INSERT INTO `staff_info` (`IdStaff`, `Name`, `Email`) VALUES
(1, 'Duy', 'midterm@gmail.com'),
(2, 'Thanh Phat', '517H0071@student.tdtu.edu.vn'),
(3, 'Hiep', 'Hiep@gmail.com'),
(4, 'Lam', 'Lam@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `Email` text NOT NULL,
  `Password` text NOT NULL,
  `Role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `FirstName`, `LastName`, `Email`, `Password`, `Role`) VALUES
(1, 'Thanh Phat', 'Le Nguyen', '517H0071@student.tdtu.edu.vn', '123456789', 'admin'),
(2, 'Duy', 'Huynh', 'midterm@gmail.com', '123456', 'staff'),
(7, 'Thuy An', 'Nguyen', 'thuyannguyen@gmail.com', 'charelotte', 'customer'),
(8, 'test', 'test', 'test@gmail.com', '123456', 'customer'),
(11, 'Hiep', 'Dao', 'Hiep@gmail.com', '123456', 'staff'),
(12, 'Lam', 'Hoang', 'Lam@gmail.com', '123456', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`IdComment`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`Idcustomer`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Idorder`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`Iddetail`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`IdSchedule`);

--
-- Indexes for table `staff_info`
--
ALTER TABLE `staff_info`
  ADD PRIMARY KEY (`IdStaff`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `IdComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `Idcustomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Idorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `Iddetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `staff_info`
--
ALTER TABLE `staff_info`
  MODIFY `IdStaff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
