-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2026 at 01:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `milind_cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'milindcafe', '$2y$10$Hjc5ZKmylYxl6Tg2jXJk..TZBYXW.AkknX1qDcCDDQ1Qn2Phl7ICe', 'admin@milindcafe.com', '2026-03-03 13:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_available` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `price`, `category`, `image`, `is_available`, `created_at`) VALUES
(1, 'Masala Dosa', 'Crispy crepe with spiced potato filling', 120.00, 'Breakfast', 'https://images.unsplash.com/photo-1668236543090-82eba5ee5976?w=400', 1, '2026-03-03 11:29:51'),
(2, 'Idli Sambar', 'Steamed rice cakes with lentil stew', 80.00, 'Breakfast', 'https://images.unsplash.com/photo-1589301760014-d929f3979dbc?w=400', 1, '2026-03-03 11:29:51'),
(3, 'Puri Bhaji', 'Fluffy puri with spicy potato curry', 100.00, 'Breakfast', 'https://images.unsplash.com/photo-1601050690597-df0568f70950?w=400', 1, '2026-03-03 11:29:51'),
(4, 'Paratha', 'Crispy layered flatbread with butter', 90.00, 'Breakfast', 'https://images.unsplash.com/photo-1605433246452-82d9dc1a7a3e?w=400', 1, '2026-03-03 11:29:51'),
(5, 'Poha', 'Flattened rice with peanuts and spices', 70.00, 'Breakfast', 'https://images.unsplash.com/photo-1589301760014-d929f3979dbc?w=400', 1, '2026-03-03 11:29:51'),
(6, 'Bread Pakora', 'Bread slices gram flour fritters', 60.00, 'Breakfast', 'https://images.unsplash.com/photo-1601050690597-df0568f70950?w=400', 1, '2026-03-03 11:29:51'),
(7, 'Omelette', 'Eggs with onions and tomatoes', 50.00, 'Breakfast', 'https://images.unsplash.com/photo-1525351484163-7529414395d8?w=400', 1, '2026-03-03 11:29:51'),
(8, 'Veg Sandwich', 'Grilled vegetable sandwich', 80.00, 'Breakfast', 'https://images.unsplash.com/photo-1484723091739-30a097e8f929?w=400', 1, '2026-03-03 11:29:51'),
(9, 'Vegetable Pakoda', 'Crispy fried vegetable fritters', 120.00, 'Starters', 'https://images.unsplash.com/photo-1601050690597-df0568f70950?w=400', 1, '2026-03-03 11:29:51'),
(10, 'Paneer Tikka', 'Marinated cottage cheese grilled', 250.00, 'Starters', 'https://images.unsplash.com/photo-1567188040759-fb8a883dc6d8?w=400', 1, '2026-03-03 11:29:51'),
(11, 'Chicken Tikka', 'Spicy grilled chicken pieces', 280.00, 'Starters', 'https://images.unsplash.com/photo-1527477396000-e27163b481c2?w=400', 1, '2026-03-03 11:29:51'),
(12, 'Spring Rolls', 'Crispy vegetable rolls', 150.00, 'Starters', 'https://images.unsplash.com/photo-1606491956689-2ea866880c84?w=400', 1, '2026-03-03 11:29:51'),
(13, 'Samosa', 'Fried pastry with potato filling', 40.00, 'Starters', 'https://images.unsplash.com/photo-1601050690597-df0568f70950?w=400', 1, '2026-03-03 11:29:51'),
(14, 'French Fries', 'Crispy salted fries', 100.00, 'Starters', 'https://images.unsplash.com/photo-1573080496219-bb080dd4f877?w=400', 1, '2026-03-03 11:29:51'),
(15, 'Onion Rings', 'Crispy battered onion rings', 110.00, 'Starters', 'https://images.unsplash.com/photo-1639024471283-03518883512d?w=400', 1, '2026-03-03 11:29:51'),
(16, 'Chicken Wings', 'Spicy grilled chicken wings', 260.00, 'Starters', 'https://images.unsplash.com/photo-1527477396000-e27163b481c2?w=400', 1, '2026-03-03 11:29:51'),
(17, 'Tandoori Chicken', 'Clay oven roasted chicken', 320.00, 'Starters', 'https://images.unsplash.com/photo-1599487488170-d11ec9c172f0?w=400', 1, '2026-03-03 11:29:51'),
(18, 'Paneer Butter Masala', 'Cottage cheese in creamy tomato gravy', 280.00, 'Main Course', 'https://images.unsplash.com/photo-1603894584373-5ac82b2ae398?w=400', 1, '2026-03-03 11:29:51'),
(19, 'Palak Paneer', 'Cottage cheese in spinach gravy', 260.00, 'Main Course', 'https://images.unsplash.com/photo-1601050690597-df0568f70950?w=400', 1, '2026-03-03 11:29:51'),
(20, 'Dal Makhani', 'Slow-cooked black lentils', 220.00, 'Main Course', 'https://images.unsplash.com/photo-1546833999-b9f581a1996d?w=400', 1, '2026-03-03 11:29:51'),
(21, 'Mix Veg', 'Mixed vegetables in gravy', 200.00, 'Main Course', 'https://images.unsplash.com/photo-1589302168068-964664d93dc0?w=400', 1, '2026-03-03 11:29:51'),
(22, 'Shahi Paneer', 'Rich creamy paneer curry', 290.00, 'Main Course', 'https://images.unsplash.com/photo-1565557623262-b51c2513a641?w=400', 1, '2026-03-03 11:29:51'),
(23, 'Kadhai Paneer', 'Paneer with capsicum and onions', 270.00, 'Main Course', 'https://images.unsplash.com/photo-1603894584373-5ac82b2ae398?w=400', 1, '2026-03-03 11:29:51'),
(24, 'Butter Chicken', 'Chicken in creamy tomato sauce', 350.00, 'Main Course', 'https://images.unsplash.com/photo-1603894584373-5ac82b2ae398?w=400', 1, '2026-03-03 11:29:51'),
(25, 'Chicken Tikka Masala', 'Grilled chicken in spicy gravy', 340.00, 'Main Course', 'https://images.unsplash.com/photo-1565557623262-b51c2513a641?w=400', 1, '2026-03-03 11:29:51'),
(26, 'Chicken Curry', 'Traditional chicken gravy', 320.00, 'Main Course', 'https://images.unsplash.com/photo-1603894584373-5ac82b2ae398?w=400', 1, '2026-03-03 11:29:51'),
(27, 'Fish Fry', 'Crispy fried fish', 320.00, 'Main Course', 'https://images.unsplash.com/photo-1589301760014-d929f3979dbc?w=400', 1, '2026-03-03 11:29:51'),
(28, 'Mutton Curry', 'Spicy mutton gravy', 400.00, 'Main Course', 'https://images.unsplash.com/photo-1601050690597-df0568f70950?w=400', 1, '2026-03-03 11:29:51'),
(29, 'Egg Curry', 'Boiled eggs in onion gravy', 180.00, 'Main Course', 'https://images.unsplash.com/photo-1589301760014-d929f3979dbc?w=400', 1, '2026-03-03 11:29:51'),
(30, 'Chicken Biryani', 'Aromatic rice with chicken', 280.00, 'Biryani', 'https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?w=400', 1, '2026-03-03 11:29:51'),
(31, 'Mutton Biryani', 'Aromatic rice with mutton', 380.00, 'Biryani', 'https://images.unsplash.com/photo-1589302168068-964664d93dc0?w=400', 1, '2026-03-03 11:29:51'),
(32, 'Veg Biryani', 'Rice with mixed vegetables', 200.00, 'Biryani', 'https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?w=400', 1, '2026-03-03 11:29:51'),
(33, 'Hyderabadi Biryani', 'Spicy authentic biryani', 350.00, 'Biryani', 'https://images.unsplash.com/photo-1589302168068-964664d93dc0?w=400', 1, '2026-03-03 11:29:51'),
(34, 'Masala Chai', 'Spiced Indian tea', 30.00, 'Drinks', 'https://images.unsplash.com/photo-1564890369478-c5c2549d7c9c?w=400', 1, '2026-03-03 11:29:51'),
(35, 'Black Coffee', 'Strong black coffee', 40.00, 'Drinks', 'https://images.unsplash.com/photo-1517701550927-30cf4ba1dba5?w=400', 1, '2026-03-03 11:29:51'),
(36, 'Cold Coffee', 'Iced coffee with ice cream', 90.00, 'Drinks', 'https://images.unsplash.com/photo-1461023058943-07fcbe16d735?w=400', 1, '2026-03-03 11:29:51'),
(37, 'Mango Shake', 'Fresh mango milkshake', 100.00, 'Drinks', 'https://images.unsplash.com/photo-1527661591475-527312dd65f5?w=400', 1, '2026-03-03 11:29:51'),
(38, 'Orange Juice', 'Fresh orange juice', 80.00, 'Drinks', 'https://images.unsplash.com/photo-1600271886742-f049cd451bba?w=400', 1, '2026-03-03 11:29:51'),
(39, 'Gulab Jamun', 'Sweet milk dumplings', 60.00, 'Desserts', 'https://images.unsplash.com/photo-1627308595229-7830a5c91f9f?w=400', 1, '2026-03-03 11:29:51'),
(40, 'Rasgulla', 'Spongy cottage cheese sweet', 70.00, 'Desserts', 'https://images.unsplash.com/photo-1599639668273-41d7364fc51a?w=400', 1, '2026-03-03 11:29:51'),
(41, 'Ice Cream', 'Vanilla/Choco/Strawberry', 80.00, 'Desserts', 'https://images.unsplash.com/photo-1497034825429-c343d7c6a68f?w=400', 1, '2026-03-03 11:29:51'),
(42, 'Brownie', 'Chocolate brownie with ice cream', 120.00, 'Desserts', 'https://images.unsplash.com/photo-1606313564200-e75d5e30476c?w=400', 1, '2026-03-03 11:29:51'),
(43, 'Burger', 'Veg/Chicken burger with fries', 150.00, 'Fast Food', 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=400', 1, '2026-03-03 11:29:51'),
(44, 'Pizza', 'Veg/Chicken pizza medium', 350.00, 'Fast Food', 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=400', 1, '2026-03-03 11:29:51'),
(45, 'Sandwich', 'Grilled cheese sandwich', 100.00, 'Fast Food', 'https://images.unsplash.com/photo-1528735602780-2552fd46c7af?w=400', 1, '2026-03-03 11:29:51'),
(46, 'Hot Dog', 'Chicken sausage in bun', 120.00, 'Fast Food', 'https://images.unsplash.com/photo-1612392062631-94dd858cba88?w=400', 1, '2026-03-03 11:29:51'),
(47, 'Momos', 'Steamed/Fried veg momos', 80.00, 'Fast Food', 'https://images.unsplash.com/photo-1534422298391-e4f8c172dddb?w=400', 1, '2026-03-03 11:29:51'),
(48, 'Noodles', 'Veg/Chicken Hakka Noodles', 130.00, 'Fast Food', 'https://imagesphoto-1585032226651-.unsplash.com/759b368d7246?w=400', 1, '2026-03-03 11:29:51'),
(49, 'Masala Dosa', 'Crispy crepe with spiced potato filling', 120.00, 'Breakfast', 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=400', 1, '2026-03-03 16:08:50'),
(50, 'Idli Sambar', 'Steamed rice cakes with lentil stew', 80.00, 'Breakfast', 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=400', 1, '2026-03-03 16:08:50'),
(51, 'Paneer Tikka', 'Marinated cottage cheese grilled', 250.00, 'Starters', 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=400', 1, '2026-03-03 16:08:50'),
(52, 'Butter Chicken', 'Chicken in creamy tomato sauce', 350.00, 'Main Course', 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=400', 1, '2026-03-03 16:08:50'),
(53, 'Chicken Biryani', 'Aromatic rice with chicken', 280.00, 'Biryani', 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=400', 1, '2026-03-03 16:08:50'),
(54, 'Masala Chai', 'Spiced Indian tea', 30.00, 'Drinks', 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=400', 1, '2026-03-03 16:08:50'),
(55, 'Veg Biryani', 'Vegetable aromatic rice', 220.00, 'Biryani', 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=400', 1, '2026-03-03 16:08:50'),
(56, 'Samosa', 'Crispy pastry with spiced potato', 40.00, 'Snacks', 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=400', 1, '2026-03-03 16:08:50'),
(57, 'Masala Dosa', 'Crispy crepe with spiced potato filling', 120.00, 'Breakfast', 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=400', 1, '2026-03-03 16:37:04'),
(58, 'Idli Sambar', 'Steamed rice cakes with lentil stew', 80.00, 'Breakfast', 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=400', 1, '2026-03-03 16:37:04'),
(59, 'Paneer Tikka', 'Marinated cottage cheese grilled', 250.00, 'Starters', 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=400', 1, '2026-03-03 16:37:04'),
(60, 'Butter Chicken', 'Chicken in creamy tomato sauce', 350.00, 'Main Course', 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=400', 1, '2026-03-03 16:37:04'),
(61, 'Chicken Biryani', 'Aromatic rice with chicken', 280.00, 'Biryani', 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=400', 1, '2026-03-03 16:37:04'),
(62, 'Masala Chai', 'Spiced Indian tea', 30.00, 'Drinks', 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=400', 1, '2026-03-03 16:37:04'),
(63, 'Veg Biryani', 'Vegetable aromatic rice', 220.00, 'Biryani', 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=400', 1, '2026-03-03 16:37:04'),
(64, 'Samosa', 'Crispy pastry with spiced potato', 40.00, 'Snacks', 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=400', 1, '2026-03-03 16:37:04'),
(65, 'momosssss', '', 80.00, 'Breakfast', 'https://www.thespruceeats.com/thmb/DXZoAJoKTPS7BKEyk4H-Gw3puhc=/6016x4016/filters:fill(auto,1)/steamed-momos-wontons-1957616-hero-01-1c59e22bad0347daa8f0dfe12894bc3c.jpg', 1, '2026-03-17 07:19:55'),
(68, 'mung dal', '', 80.00, 'Breakfast', 'https://www.bing.com/images/search?view=detailV2&ccid=fH0FApmR&id=AB2F98E4339A1155353D2ED43F86AB3F82ED1CD6&thid=OIP.fH0FApmRvh8oBKqRYoa1VAHaHa&mediaurl=https%3a%2f%2fwww.flavourstreat.com%2fwp-content%2fuploads%2f2022%2f12%2fhari-moong-dal.jpg&exph=1200&e', 1, '2026-03-18 14:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_phone` varchar(20) DEFAULT NULL,
  `customer_address` text DEFAULT NULL,
  `item_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `customer_phone`, `customer_address`, `item_name`, `quantity`, `total_price`, `status`, `order_date`) VALUES
(2, 'sachin dhage', '8308123048', 'AT.POST SIDDHANATH WADGAON\\nTQ.GANGAPUR DIST.CHH,SAMBHAJINAGAR', 'Puri Bhaji', 1, 100.00, 'pending', '2026-03-03 14:53:40'),
(19, 'jaymangal bhalerao', '9370922196', '1000 govt.boys hostel killeark chatrapati sambhjinagar', 'Ice Cream', 8, 640.00, 'Pending', '2026-03-04 16:57:28'),
(20, 'jaymangal bhalerao', '9370922196', 'AT.POST SIDDHANATH WADGAON\\nTQ.GANGAPUR DIST.CHH,SAMBHAJINAGAR', 'Idli Sambar', 2, 160.00, 'Pending', '2026-03-05 08:27:14'),
(21, 'Tushar Bhalerao', '09373491929', 'AT.POST SIDDHANATH WADGAON\\nTQ.GANGAPUR DIST.CHH,SAMBHAJINAGAR', 'Omelette', 3, 150.00, 'Pending', '2026-03-05 08:28:54'),
(22, 'Tushar Bhalerao', '9373491929', 'At post sambhajinagar', 'Masala Dosa', 1, 120.00, 'Pending', '2026-03-17 05:31:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
