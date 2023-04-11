-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 11, 2023 at 04:23 PM
-- Server version: 8.0.32-0ubuntu0.22.04.2
-- PHP Version: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `a_id` int NOT NULL,
  `u_id` int DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`a_id`, `u_id`, `name`, `phone`, `pincode`, `address`, `city`, `state`) VALUES
(1, 3, 'AAYUSH', '9806277399', '176002', 'shamirpur', 'kangra', 'Himachal-pradesh'),
(2, 5, 'RAHUL', '9834567865', '175685', 'Baijnath', 'kangra', 'Himachal-pradesh'),
(3, 4, 'SUMAN', '1234567891', '175685', 'GAGGAL', 'KANGRA', 'H.P'),
(4, 6, 'KAVITA', '8018614650', '154625', 'PALAMPUR', 'PALUMPUR', 'Himachal-pradesh'),
(5, 8, 'NITIN', '9816450224', '176001', 'kangra', 'kangra', 'hp'),
(6, 9, 'NITIN', '7018026803', '123456', 'kangra', 'kangra', 'hp');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int NOT NULL,
  `u_id` int UNSIGNED NOT NULL,
  `product_id` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `product_quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `u_id`, `product_id`, `product_name`, `product_price`, `product_image`, `product_category`, `product_quantity`) VALUES
(25, 2, 38, 'Formal_shirt_white', 399, 'mwhiteshirtformally.jpg', 'MEN', 1),
(30, 2, 36, 'Jean-JACKET', 690, 'mwjeanjacket.jpg', 'MEN', 1),
(31, 2, 41, 'Jacket_black_polish', 999, 'mwblackjacketshiny.jpg', 'MEN', 1),
(32, 2, 54, 'blue_jeens_rx', 700, 'mfullbrownjsandbluejean.jpg', 'MEN', 1),
(34, 3, 14, 'Shoes_', 700, 'whoesmultiple.jpg', 'WOMEN', 1),
(35, 3, 68, 'Kids_White shirt', 340, 'kwhitegirlshirt.jpg', 'KID', 1),
(39, 5, 51, 'Bathroom_slippers_green', 300, 'mgreenwathroomcappl.jpg', 'MEN', 1),
(40, 5, 48, 'BLack_T-shirt', 299, 'mprintedblacktshirt.jpg', 'MEN', 1),
(41, 5, 56, 'SHIRTS', 700, 'mformalshirtsmultiple.jpg', 'MEN', 1),
(42, 5, 65, 'Coat_black', 799, 'mblackcoat.jpg', 'MEN', 1),
(43, 5, 34, 'NIKE_Shoes', 899, 'nike.jpg', 'MEN', 1),
(53, 4, 36, 'Jean-JACKET', 690, 'mwjeanjacket.jpg', 'MEN', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `c_id` int NOT NULL,
  `category` varchar(20) NOT NULL,
  `category_type` varchar(20) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`c_id`, `category`, `category_type`, `category_name`) VALUES
(1, 'men', 'TOP-WEAR', 'T-Shirt'),
(2, 'men', 'TOP-WEAR', 'Casual Shirts'),
(3, 'men', 'TOP-WEAR', 'Formal Shirt'),
(4, 'men', 'TOP-WEAR', 'Jacket'),
(5, 'men', 'TOP-WEAR', 'Rain Jacket'),
(6, 'men', 'TOP-WEAR', 'Sweater'),
(7, 'men', 'BOTTOM-WEAR', 'Jeans'),
(8, 'men', 'BOTTOM-WEAR', 'Casual Trousers'),
(9, 'men', 'BOTTOM-WEAR', 'Formal Trousers'),
(10, 'men', 'BOTTOM-WEAR', 'Ripped Jeans'),
(11, 'men', 'BOTTOM-WEAR', 'Shorts'),
(12, 'men', 'BOTTOM-WEAR', 'Track Pants'),
(14, 'men', 'FOOT-WEAR', 'Sports Shoes'),
(15, 'men', 'FOOT-WEAR', 'Formal Shoes'),
(16, 'men', 'FOOT-WEAR', 'Sneakers'),
(17, 'men', 'FOOT-WEAR', 'Sandals & Floaters'),
(18, 'men', 'FOOT-WEAR', 'Flip Flops'),
(19, 'men', 'FOOT-WEAR', 'Sockes'),
(20, 'women', 'INDIAN & FUSION WEAR', 'Kurtas & Suits'),
(21, 'women', 'INDIAN & FUSION WEAR', 'Tunics & Tops'),
(22, 'women', 'INDIAN & FUSION WEAR', 'Sarees'),
(23, 'women', 'INDIAN & FUSION WEAR', 'Ethanic Wears'),
(24, 'women', 'INDIAN & FUSION WEAR', 'Skirts '),
(25, 'women', 'INDIAN & FUSION WEAR', 'Jackets'),
(26, 'women', 'WESTERN-WEAR', 'Dresses'),
(27, 'women', 'WESTERN-WEAR', 'Tops'),
(28, 'women', 'WESTERN-WEAR', 'T-shirts'),
(29, 'women', 'WESTERN-WEAR', 'Jeans'),
(30, 'women', 'WESTERN-WEAR', 'Coats'),
(31, 'women', 'WESTERN-WEAR', 'Sweaters'),
(32, 'kids', 'BOY-CLOTHS', 'T-shirts'),
(33, 'kids', 'BOY-CLOTHS', 'Casual Shirts'),
(34, 'kids', 'BOY-CLOTHS', 'Jeans'),
(35, 'kids', 'BOY-CLOTHS', 'Pants'),
(36, 'kids', 'BOY-CLOTHS', 'Casual Trousers'),
(37, 'kids', 'BOY-CLOTHS', 'Formal Trousers'),
(38, 'kids', 'GIRL-CLOTHS', 'Dresses'),
(39, 'kids', 'GIRL-CLOTHS', 'Tops'),
(40, 'kids', 'GIRL-CLOTHS', 'T-Shirts'),
(41, 'kids', 'GIRL-CLOTHS', 'Jeans'),
(42, 'kids', 'GIRL-CLOTHS', 'Shrugs'),
(43, 'kids', 'GIRL-CLOTHS', 'Sweaters'),
(44, 'kids', 'KIDS-FOOTWEAR', 'Casual Shoes'),
(45, 'kids', 'KIDS-FOOTWEAR', 'Formal Shoes'),
(46, 'kids', 'KIDS-FOOTWEAR', 'Sports Shoes'),
(47, 'kids', 'KIDS-FOOTWEAR', 'Sneakers'),
(48, 'kids', 'KIDS-FOOTWEAR', 'Sandels'),
(49, 'kids', 'KIDS-FOOTWEAR', 'School Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `u_id` int DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `product_names` text NOT NULL,
  `product_quantities` text NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `u_id`, `name`, `phone`, `pincode`, `address`, `city`, `state`, `product_names`, `product_quantities`, `total_price`, `created_at`) VALUES
(1, 5, 'RAHUL', '9834567865', '175685', 'Baijnath<br>', 'kangra<br>', 'Himachal-pradesh<br><br>', 'Bathroom_slippers_green,BLack_T-shirt,SHIRTS,Coat_black,NIKE_Shoes,', '5', '2997.00', '2023-04-02 07:39:17'),
(3, 4, 'SUMAN', '1234567891<br>', '175685<br>', 'GAGGAL<br>', 'KANGRA<br>', 'H.P<br><br>', 'Shirt_white,Slipper,HandBag,', '3', '1218.00', '2023-04-02 08:06:19'),
(4, 4, 'SUMAN', '1234567891<br>', '175685<br>', 'GAGGAL<br>', 'KANGRA<br>', 'H.P<br><br>', 'Shirt_white,Slipper,HandBag,', '3', '1218.00', '2023-04-02 09:09:06'),
(5, 6, 'KAVITA', '8018614650<br>', '154625<br>', 'PALAMPUR<br>', 'PALUMPUR<br>', 'Himachal-pradesh<br><br>', 'Blue_Heels,', '3', '1100.00', '2023-04-03 06:05:22'),
(6, 4, 'SUMAN', '1234567891<br>', '175685<br>', 'GAGGAL<br>', 'KANGRA<br>', 'H.P<br><br>', 'Shirt_white,HandBag,', '2', '998.00', '2023-04-06 06:28:08'),
(7, 8, 'NITIN', '9816450224', '176001', 'kangra', 'kangra', 'hp', 'NIKE_Shoes_BlackBLACK T-shirtJean-JACKET', '3', '1889.00', '2023-04-10 10:33:45'),
(8, 9, 'NITIN', '7018026803', '123456', 'kangra', 'kangra', 'hp', 'NIKE_Shoes', '1', '899.00', '2023-04-11 10:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_category` varchar(50) NOT NULL,
  `p_price` decimal(10,2) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_category`, `p_price`, `avatar`) VALUES
(1, 'White T-shirt', 'WOMEN', '890.00', 'wwhitetshirt.jpg'),
(2, 'Slipper', 'WOMEN', '220.00', 'wsleeper.jpg'),
(3, 'Shorts-Blue', 'WOMEN', '599.00', 'wshortfull.jpg'),
(4, 'Blue_Heels', 'WOMEN', '1100.00', 'wprintedblueheals.jpg'),
(5, 'Pink-Shoes', 'WOMEN', '799.00', 'wpinkshoe.jpg'),
(6, 'Pyjamas', 'WOMEN', '600.00', 'wpajama.jpg'),
(7, 'Orange-Top', 'WOMEN', '450.00', 'worengetopprinted.jpg'),
(9, 'Orange-Shirt', 'WOMEN', '499.00', 'worengefullsleveshirt.jpg'),
(10, 'Orange-Dress', 'WOMEN', '1599.00', 'worangefulldress.jpg'),
(11, 'ALL-in-One', 'WOMEN', '1999.00', 'wmultiitems.jpg'),
(12, 'HandBag', 'WOMEN', '599.00', 'wladybagsbrown.jpg'),
(13, 'Blue_Jeens', 'WOMEN', '699.00', 'wjeanscblue.jpg'),
(14, 'Shoes_', 'WOMEN', '700.00', 'whoesmultiple.jpg'),
(15, 'Formal_Jacket', 'WOMEN', '899.00', 'wformaljacketskin.jpg'),
(16, 'Dress_x', 'WOMEN', '779.00', 'wdress.jpg'),
(17, 'Black_Heel', 'WOMEN', '670.00', 'wheelblack.jpg'),
(18, 'Green_pyajama', 'WOMEN', '579.00', 'wgreenpajama.jpg'),
(19, 'Black_Gown', 'WOMEN', '1189.00', 'wgownblack.jpg'),
(20, 'Lightblue_Jeans', 'WOMEN', '540.00', 'wgirtlightbluejeans.jpg'),
(21, 'Shorts_black_white', 'WOMEN', '399.00', 'wgirllinershort.jpg'),
(22, 'Blue_Jeans_full', 'WOMEN', '499.00', 'wfullbluejeans.jpg'),
(23, 'Shorts_x', 'WOMEN', '199.00', 'wcolorlesshorts.jpg'),
(24, 'Pyjamas-brown', 'WOMEN', '398.00', 'wbrownpajama.jpg'),
(25, 'Leather_Shoes_brown', 'WOMEN', '999.00', 'wbrownleathershoe.jpg'),
(26, 'Jacket_brown', 'WOMEN', '799.00', 'wbrownferrjacket.jpg'),
(27, 'Shorts_blue', 'WOMEN', '399.00', 'wbluishshort.jpg'),
(28, 'Shorts_l-blue', 'WOMEN', '399.00', 'wblueshorts.jpg'),
(29, 'Jeans_blue', 'WOMEN', '590.00', 'wbluejeansshyle.jpg'),
(30, 'Black_Shirts', 'WOMEN', '499.00', 'wblacktshirtt.jpg'),
(31, 'Shirt_black', 'WOMEN', '299.00', 'wblacktshirt.jpg'),
(32, 'Slippers_black', 'WOMEN', '199.00', 'wblackchappal.jpg'),
(33, 'Bathroom_slippers', 'WOMEN', '199.00', 'wbathroomsliper.jpg'),
(34, 'NIKE_Shoes', 'MEN', '899.00', 'nike.jpg'),
(35, 'NIKE_Shoes_Black', 'MEN', '799.00', 'mwnikeblack.jpg'),
(36, 'Jean-JACKET', 'MEN', '690.00', 'mwjeanjacket.jpg'),
(37, 'Shirt_white', 'MEN', '399.00', 'mwhitet-shirt.jpg'),
(38, 'Formal_shirt_white', 'MEN', '399.00', 'mwhiteshirtformally.jpg'),
(39, 'Jacket_White', 'MEN', '799.00', 'mwhitejeanjacket.jpg'),
(40, 'Shoes_lightbrown', 'MEN', '599.00', 'msneekerslightbrown.jpg'),
(41, 'Jacket_black_polish', 'MEN', '999.00', 'mwblackjacketshiny.jpg'),
(42, 'White Shirt', 'MEN', '400.00', 'mstylishtshirtwhite.jpg'),
(43, 'Printed_Shorts', 'MEN', '300.00', 'mshortsdesigned.jpg'),
(44, 'Printed_Shortss', 'MEN', '300.00', 'mshortprinted.jpg'),
(45, 'White-Shirt', 'MEN', '399.00', 'mshirtwhitewhitw.jpg'),
(46, 'White -shirt', 'MEN', '399.00', 'mshirtwhitec.jpg'),
(47, 'Ripped_jeans', 'MEN', '599.00', 'mrippedbluejean.jpg'),
(48, 'BLack_T-shirt', 'MEN', '299.00', 'mprintedblacktshirt.jpg'),
(49, 'Shoes_Orange', 'MEN', '800.00', 'morangeshoes.jpg'),
(50, 'Leather_Shoes', 'MEN', '1200.00', 'mleathershoesformal.jpg'),
(51, 'Bathroom_slippers_green', 'MEN', '300.00', 'mgreenwathroomcappl.jpg'),
(52, 'NIKE_GREEN', 'MEN', '1600.00', 'mgreennikeshoes.jpg'),
(53, 'Shoes_gray', 'MEN', '1100.00', 'mgrayshoes.jpg'),
(54, 'blue_jeens_rx', 'MEN', '700.00', 'mfullbrownjsandbluejean.jpg'),
(55, 'White Shirt-xl', 'MEN', '700.00', 'mformalwhiteshirt.jpg'),
(56, 'SHIRTS', 'MEN', '700.00', 'mformalshirtsmultiple.jpg'),
(57, 'PANT_SHIRT', 'MEN', '1200.00', 'mformal.jpg'),
(58, 'SHERWANI', 'MEN', '3400.00', 'menroyal.jpg'),
(59, 'T-Shirt darkblue', 'MEN', '400.00', 'mdarkbluetshirt.jpg'),
(60, 'ALL-in-One men', 'MEN', '4500.00', 'mbrownjeanswhiteshoes.jpg'),
(61, 'Jacket_brown', 'MEN', '999.00', 'mbrownjacket.jpg'),
(62, 'COAT-PANT', 'MEN', '4599.00', 'mbluecoat.jpg'),
(63, 'BLACK T-shirt', 'MEN', '400.00', 'mblacktshirt.jpg'),
(64, 'Printed_Shirt', 'MEN', '599.00', 'mblackdotedshirt.jpg'),
(65, 'Coat_black', 'MEN', '799.00', 'mblackcoat.jpg'),
(66, 'Black_Dress', 'WOMEN', '1600.00', 'lady.jpg'),
(67, 'YELLOW JACKET', 'KID', '670.00', 'kyellowjacket.jpg'),
(68, 'Kids_White shirt', 'KID', '340.00', 'kwhitegirlshirt.jpg'),
(69, 'SHIRT_S', 'KID', '239.00', 'kshirt.jpg'),
(70, 'School_Uniform', 'KID', '450.00', 'kschooluniform.jpg'),
(71, 'Printed_t-Shirt-S', 'KID', '440.00', 'kprintedtshirt.jpg'),
(72, 'Kids_Orange shirt', 'KID', '230.00', 'korangeshirt.jpg'),
(73, 'Leather_black jacket', 'KID', '779.00', 'klatherblackjacket.jpg'),
(74, 'jacket_small', 'KID', '1001.00', 'kjackets.jpg'),
(75, 'white_dress_s', 'KID', '500.00', 'kidwhitedoteddress.jpg'),
(76, 'ALL-in-One KIDS', 'KID', '1700.00', 'kidsmultiitems.jpg'),
(77, 'KIDS_shorts', 'KID', '250.00', 'kidshorts.jpg'),
(78, 'BLUE HUDDY KIDS', 'KID', '600.00', 'kidsbluehuddy.jpg'),
(79, 'WHITE DRESS-S', 'KID', '670.00', 'kiddresswhite.jpg'),
(80, 'DRESS-S', 'KID', '599.00', 'kiddress.jpg'),
(81, 'BLUE-JEANS-S', 'KID', '399.00', 'kidbluejeans.jpg'),
(82, 'GREEN-UPPER-S', 'KID', '299.00', 'kgreenupper.jpg'),
(83, 'DRESSES -S', 'KID', '339.00', 'kdressesbg.jpg'),
(84, 'D-BLUE SHORTS', 'KID', '459.00', 'kdarkblueshorts.jpg'),
(85, 'orenge_T-SHIRT,blue PANT', 'KID', '720.00', 'kcuteorangedd.jpg'),
(86, 'FROCK-S', 'KID', '400.00', 'kcutefroke.jpg'),
(87, 'DRESS-KIDS-S', 'KID', '699.00', 'kcutedresses.jpg'),
(88, 'FULL-DRESS-S', 'KID', '820.00', 'kcutedress.jpg'),
(89, 'BLACK-SHIRT', 'KID', '199.00', 'kboyblackt-shirt.jpg'),
(90, 'BLACK-DRESS', 'KID', '790.00', 'kblackboydress.jpg'),
(91, 'LADIES TOPS', 'WOMEN', '990.00', 'fassion.jpg'),
(92, 'KAVITA', 'KID', '51.00', 'orangecar2.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int NOT NULL,
  `role_name` varchar(50) DEFAULT NULL,
  `updated_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `updated_date`) VALUES
(1, 'admin', '2023-03-26'),
(2, 'customer', '2023-03-26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int NOT NULL,
  `role_id` int DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pass` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `role_id`, `phone`, `user_name`, `email`, `pass`, `created`, `updated`) VALUES
(1, 1, '7018614650', 'SUPER-ADMIN', 'admin@gmail.com', '6bc80b9416b95aac0cf7757fc1bb1e65', '2023-04-01', '2023-04-01'),
(4, 2, '1234567891', 'SUMAN', 'sumang@gmail.com', '1533c67e5e70ae7439a9aa993d6a3393', '2023-04-02', '2023-04-02'),
(5, 2, '9834567865', 'RAHUL', 'rahul@gmail.com', '508df4cb2f4d8f80519256258cfb975f', '2023-04-02', '2023-04-02'),
(6, 2, '8018614650', 'KAVITA', 'kavita@gmail.com', '5bd2026f128662763c532f2f4b6f2476', '2023-04-03', '2023-04-03'),
(7, 2, '7033314650', 'AMIT', 'sumit@gmail.com', 'ddab33e95f316b38bce3f533643acd56', '2023-04-03', '2023-04-03'),
(8, 2, '9816450224', 'NITIN', 'nitinkandwal0@gmail.com', '4297f44b13955235245b2497399d7a93', '2023-04-06', '2023-04-06'),
(9, 2, '7018026803', 'NITIN', 'nitinkandwal00@gmail.com', '96e79218965eb72c92a549dd5a330112', '2023-04-11', '2023-04-11'),
(10, 2, '7778889994', 'NAME', 'pankaj@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2023-04-11', '2023-04-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `idx_u_id` (`a_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `idx_u_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `a_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `c_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
