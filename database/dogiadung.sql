-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 04, 2025 lúc 12:54 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dogiadung`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `product_name`, `product_price`, `product_image`, `quantity`, `created_at`, `updated_at`) VALUES
(17, 1, 37, 'Ghế thư giãn gỗ óc chó', 7200000.00, 'https://hungphatluxury.vn/wp-content/uploads/2024/08/ghe-thu-gian-bap-benh-nhap-khau-XY101-1-2.jpg', 2, '2025-04-25 14:22:10', '2025-04-25 14:25:17'),
(18, 1, 47, 'Ghế bar chân xoay', 1800000.00, 'https://nhaxinh.com/wp-content/uploads/2025/04/GHE-BAR-COSTA-BLACK-2-768x511.webp', 1, '2025-04-25 14:22:18', '2025-04-25 14:22:18'),
(19, 1, 36, 'Sofa góc vải bọc cao cấp', 12500000.00, 'https://nhaxinh.com/wp-content/uploads/2024/12/SOFA-3-CHO-LOUIS-1.jpg', 100, '2025-04-25 14:23:04', '2025-04-25 14:23:04'),
(44, 45, 43, 'Đèn chùm pha lê', 6700000.00, 'https://thegioianhsang.vn/application/upload/products/den-chum-pha-le-tpl8088-800.jpg', 1, '2025-05-01 02:43:17', '2025-05-01 02:43:17'),
(45, 45, 44, 'Sofa Saka P100 3 chỗ ', 5800000.00, 'https://nhaxinh.com/wp-content/uploads/2024/08/sofa-saka-p100-3-cho-boc-vai-vact10498-768x511.jpg', 1, '2025-05-01 02:44:59', '2025-05-01 02:44:59'),
(46, 45, 37, 'Ghế thư giãn gỗ óc chó', 7200000.00, 'https://hungphatluxury.vn/wp-content/uploads/2024/08/ghe-thu-gian-bap-benh-nhap-khau-XY101-1-2.jpg', 1, '2025-05-01 03:13:19', '2025-05-01 03:13:19'),
(47, 45, 38, 'Bàn trà mặt đá', 5400000.00, 'https://nhaxinh.com/wp-content/uploads/2021/10/ban-nuoc-pallete-white-hien-dai-calligaris-102457-3-768x511.jpg', 1, '2025-05-01 03:15:34', '2025-05-01 03:15:34'),
(118, 2, 37, 'Ghế thư giãn gỗ óc chó', 7200000.00, 'https://hungphatluxury.vn/wp-content/uploads/2024/08/ghe-thu-gian-bap-benh-nhap-khau-XY101-1-2.jpg', 1, '2025-05-03 08:21:43', '2025-05-03 08:21:43'),
(120, 43, 37, 'Ghế thư giãn gỗ óc chó', 7200000.00, 'https://hungphatluxury.vn/wp-content/uploads/2024/08/ghe-thu-gian-bap-benh-nhap-khau-XY101-1-2.jpg', 1, '2025-05-03 14:15:31', '2025-05-03 14:15:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Flash Sale', 'Các thiết bị và gadget'),
(2, 'Best Selling Products', 'Quần áo và phụ kiện'),
(3, 'Our Products', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `ward` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `total_amount` decimal(15,2) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_status` varchar(50) NOT NULL DEFAULT 'pending',
  `order_status` varchar(50) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `customer_name`, `phone`, `address`, `ward`, `district`, `province`, `total_amount`, `payment_method`, `payment_status`, `order_status`, `created_at`) VALUES
(11, '174607130442428', 44, 'abc', '0971713444', 'hcmuccc', '121', '123213', 'hcm', 14101000.00, 'cod', 'pending', 'pending', '2025-05-01 03:48:24'),
(12, '174607132568872', 44, 'abc', '0971713444', 'hcmuccc', '121', '123213', 'hcm', 1800000.00, 'cod', 'pending', 'pending', '2025-05-01 03:48:45'),
(13, '174607148761995', 44, 'abc', '0971713444', 'hcmuccc', '121', '123213', 'hcm', 30800000.00, 'cod', 'pending', 'pending', '2025-05-01 03:51:27'),
(14, '174607157053552', 44, 'abc', '0971713444', 'hcmuccc', '121', '123213', 'hcm', 5400000.00, 'cod', 'pending', 'pending', '2025-05-01 03:52:50'),
(15, '174607173246660', 44, 'đat', '0987373322', 'Ho Chi Minh city', 'C', '123213', 'không co', 7200000.00, 'cod', 'pending', 'pending', '2025-05-01 03:55:32'),
(16, '174607185731313', 44, 'đat', '1124131312', 'Ho Chi Minh city', '11', '1', 'không co', 54260000.00, 'cod', 'pending', 'pending', '2025-05-01 03:57:37'),
(17, '174607212461532', 44, 'đat', '121212121', 'Ho Chi Minh city', '1', '1', 'không co', 3360000.00, 'cod', 'pending', 'pending', '2025-05-01 04:02:04'),
(18, '174607229347293', 44, 'đat', '1124131312', 'Ho Chi Minh city', '12', '1', 'không co', 560000.00, 'cod', 'pending', 'pending', '2025-05-01 04:04:53'),
(19, '174607254357206', 44, 'đat', '1124131312', 'Ho Chi Minh city', '1', '1', 'không co', 5400000.00, 'cod', 'pending', 'pending', '2025-05-01 04:09:03'),
(20, '174607258531427', 44, 'đat', '1124131312', 'Ho Chi Minh city', '12', '2', 'hồ chí minh', 7200000.00, 'cod', 'pending', 'pending', '2025-05-01 04:09:45'),
(21, '174609739968270', 44, 'đat', '1331312211', 'Ho Chi Minh ', '12', '2', 'hồ chí minh', 560000.00, 'cod', 'pending', 'pending', '2025-05-01 11:03:19'),
(22, '174609782339767', 44, 'đat', '1124131312', 'Ho Chi Minh city', '1', '12', 'không co', 23200000.00, 'cod', 'pending', 'pending', '2025-05-01 11:10:23'),
(23, '174609821040219', 44, 'đat', '1124131312', 'Ho Chi Minh city', '1', '12', 'không co', 560000.00, 'cod', 'pending', 'pending', '2025-05-01 11:16:50'),
(24, '174609919484539', 44, 'đat', '1331312211', 'Ho Chi Minh ', '12', '2', 'hồ chí minh', 1800000.00, 'bank_transfer', 'pending', 'pending', '2025-05-01 11:33:14'),
(25, '174609921579395', 44, 'đat', '1331312211', 'Ho Chi Minh ', '12', '2', 'hồ chí minh', 1800000.00, 'cod', 'pending', 'pending', '2025-05-01 11:33:35'),
(26, '174609982335819', 44, 'abc', '0256352111', 'hcmuccc', 'C', 'á', 'hcm', 7200000.00, 'cod', 'pending', 'pending', '2025-05-01 11:43:43'),
(27, '174609983847360', 44, 'abc', '0256352111', 'hcmuccc', 'C', 'á', 'hcm', 7200000.00, 'bank_transfer', 'pending', 'pending', '2025-05-01 11:43:58'),
(28, '174610003411865', 44, 'abc', '0256352111', 'hcmuccc', 'C', 'á', 'hcm', 1800000.00, 'bank_transfer', 'pending', 'pending', '2025-05-01 11:47:14'),
(29, '174610007378069', 44, 'abc', '0256352111', 'hcmuccc', 'C', 'á', 'hcm', 3800000.00, 'bank_transfer', 'pending', 'pending', '2025-05-01 11:47:53'),
(30, '174610023492489', 44, 'abc', '0256352111', 'hcmuccc', 'C', 'á', 'hcm', 12500000.00, 'cod', 'pending', 'pending', '2025-05-01 11:50:34'),
(36, '174610084046691', 44, 'abc', '0256352111', 'hcmuccc', 'C', 'á', 'hcm', 12500000.00, 'bank_transfer', 'pending', 'pending', '2025-05-01 12:00:40'),
(37, '174610091047091', 44, 'abc', '1124131312', 'Ho Chi Minh city', 'C', 'á', 'không co', 3800000.00, 'cod', 'pending', 'pending', '2025-05-01 12:01:50'),
(38, '174610095065082', 44, 'abc', '1124131312', 'Ho Chi Minh city', 'C', 'á', 'không co', 7200000.00, 'bank_transfer', 'pending', 'pending', '2025-05-01 12:02:30'),
(39, '174610104072869', 44, 'abc', '1124131312', 'Ho Chi Minh city', 'C', 'á', 'không co', 560000.00, 'cod', 'pending', 'pending', '2025-05-01 12:04:00'),
(41, '174610114620174', 44, 'abc', '1124131312', 'Ho Chi Minh city', 'C', 'á', 'không co', 9600000.00, 'bank_transfer', 'pending', 'pending', '2025-05-01 12:05:46'),
(42, '174610133455397', 44, 'abc', '1331312211', 'hcmuccc', 'C', 'á', 'hcm', 19700000.00, 'bank_transfer', 'pending', 'pending', '2025-05-01 12:08:54'),
(43, '174610172641035', 44, 'abc', '1331312211', 'hcmuccc', 'C', 'á', 'hcm', 7200000.00, 'bank_transfer', 'pending', 'pending', '2025-05-01 12:15:26'),
(44, '174610186761111', 44, 'abc', '1331312211', 'hcmuccc', 'C', 'á', 'hcm', 12500000.00, 'bank_transfer', 'pending', 'pending', '2025-05-01 12:17:47'),
(45, '174610189234066', 44, 'abc', '1331312211', 'hcmuccc', 'C', 'á', 'hcm', 1800000.00, 'bank_transfer', 'pending', 'pending', '2025-05-01 12:18:12'),
(46, '174610191214809', 44, 'abc', '1331312211', 'hcmuccc', 'C', 'á', 'hcm', 1800000.00, 'bank_transfer', 'pending', 'pending', '2025-05-01 12:18:32'),
(47, '174610199960197', 44, 'abc', '1331312211', 'hcmuccc', 'C', 'á', 'hcm', 7200000.00, 'bank_transfer', 'pending', 'pending', '2025-05-01 12:19:59'),
(48, '174615970046706', 44, 'abc', '1331312211', 'hcmuccc', 'C', 'á', 'hcm', 1800000.00, 'cod', 'pending', 'pending', '2025-05-02 04:21:40'),
(49, '174616016183712', 44, 'abc', '1331312211', 'hcmuccc', 'C', 'á', 'hcm', 7200000.00, 'cod', 'pending', 'pending', '2025-05-02 04:29:21'),
(50, '174616069549847', 44, 'phu', '0987373444', '1412 quy nhon', '123111', '12', 'hochiminh', 9000000.00, 'bank_transfer', 'pending', 'pending', '2025-05-02 04:38:15'),
(51, '174616078331197', 44, 'phu123', '0987373444', '1412 quy nhon', '123111', '12', 'hochiminh', 560000.00, 'cod', 'pending', 'pending', '2025-05-02 04:39:43'),
(52, '174616081711474', 44, 'phu12311', '0987373444', '1412 quy nhon', '123111', '12', 'hochiminh', 12500000.00, 'cod', 'pending', 'pending', '2025-05-02 04:40:17'),
(53, '174616091611621', 44, 'nhi', '11111111111', '111111111', '111', '111', '111', 7200000.00, 'cod', 'pending', 'pending', '2025-05-02 04:41:56'),
(54, '174616096720007', 44, 'nhi', '11111111111', '1412 quy nhon', '111', '111', '111', 48000000.00, 'cod', 'pending', 'pending', '2025-05-02 04:42:47'),
(55, '174616141316628', 44, 'nhi', '11111111111', '1412 quy nhon', '111', '111', '111', 7200000.00, 'bank_transfer', 'pending', 'pending', '2025-05-02 04:50:13'),
(56, '174616154428724', 44, 'nhi', '11111111111', '1412 quy nhon', '111', '111', '111', 560000.00, 'cod', 'pending', 'pending', '2025-05-02 04:52:24'),
(57, '174616572579273', 43, 'phu', '03757919393', 'ffffffffffffffffffffffffffffffffffffffff111', 'tmt', '12', 'hcm', 560000.00, 'cod', 'pending', 'pending', '2025-05-02 06:02:05'),
(58, '174617917744973', 43, 'phu', '03757919393', 'sfaflknfnskfnkanfjf', 'tmt', '12', 'hcm', 560000.00, 'cod', 'pending', 'pending', '2025-05-02 09:46:17'),
(59, '174617966878435', 43, 'phu', '03757919393', 'sfaflknfnskfnkanfjf', 'tmt', '12', 'hcm', 560000.00, 'bank_transfer', 'pending', 'pending', '2025-05-02 09:54:28'),
(60, '174618002577246', 43, 'UTH', '03757919393', 'ffffffffffffffffffffffffffffffffffffffff', 'tmt', '12', 'hcm', 1800000.00, 'bank_transfer', 'pending', 'pending', '2025-05-02 10:00:25'),
(61, '174618274039196', 43, 'phu', '03757919393', 'thôn pm2 ', 'tmt', '12', 'hcm', 3600000.00, 'cod', 'pending', 'pending', '2025-05-02 10:45:40'),
(62, '174624612940332', 43, 'phu', '03757919393', 'ffffffffffffffffffffffffffffffffffffffff111', 'tmt', '12', 'hcm', 560000.00, 'cod', 'pending', 'pending', '2025-05-03 04:22:09'),
(63, '174624615598220', 43, 'phu', '03757919393', 'sfaflknfnskfnkanfjf', 'tmt', '12', 'hcm', 7200000.00, 'cod', 'pending', 'pending', '2025-05-03 04:22:35'),
(64, '174624671756273', 43, 'phu', '03757919393', 'thôn pm2 ', 'tmt', '12', 'hcm', 1800000.00, 'cod', 'pending', 'pending', '2025-05-03 04:31:57'),
(65, '174628143364665', 43, 'phu', '03757919393', 'ffffffffffffffffffffffffffffffffffffffff', 'tmt', '12', 'hcm', 1800000.00, 'cod', 'pending', 'pending', '2025-05-03 14:10:33'),
(66, '174628184152146', 39, 'phu', '03757919393', 'sfaflknfnskfnkanfjf', 'tmt', '12', 'hcm', 7200000.00, 'cod', 'pending', 'pending', '2025-05-03 14:17:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, '174607121838943', 47, 2, 1800000.00),
(2, '174607121838943', 43, 1, 6700000.00),
(3, '174607121838943', 56, 1, 1000.00),
(4, '174607121838943', 51, 1, 3800000.00),
(5, '174607130442428', 47, 2, 1800000.00),
(6, '174607130442428', 43, 1, 6700000.00),
(7, '174607130442428', 56, 1, 1000.00),
(8, '174607130442428', 51, 1, 3800000.00),
(9, '174607132568872', 47, 1, 1800000.00),
(10, '174607148761995', 44, 5, 5800000.00),
(11, '174607148761995', 47, 1, 1800000.00),
(12, '174607157053552', 38, 1, 5400000.00),
(13, '174607173246660', 37, 1, 7200000.00),
(14, '174607185731313', 52, 1, 560000.00),
(15, '174607185731313', 40, 1, 4500000.00),
(16, '174607185731313', 42, 6, 8200000.00),
(17, '174607212461532', 52, 6, 560000.00),
(18, '174607229347293', 52, 1, 560000.00),
(19, '174607254357206', 38, 1, 5400000.00),
(20, '174607258531427', 37, 1, 7200000.00),
(21, '174609739968270', 52, 1, 560000.00),
(22, '174609782339767', 63, 1, 3200000.00),
(23, '174609782339767', 64, 3, 5400000.00),
(24, '174609782339767', 65, 1, 3800000.00),
(25, '174609821040219', 66, 1, 560000.00),
(26, '174609919484539', 47, 1, 1800000.00),
(27, '174609921579395', 47, 1, 1800000.00),
(28, '174609982335819', 37, 1, 7200000.00),
(29, '174609983847360', 37, 1, 7200000.00),
(30, '174610003411865', 47, 1, 1800000.00),
(31, '174610007378069', 51, 1, 3800000.00),
(32, '174610023492489', 36, 1, 12500000.00),
(33, '174610024675432', 37, 1, 7200000.00),
(34, '174610037692620', 52, 1, 560000.00),
(35, '174610039768764', 37, 1, 7200000.00),
(36, '174610041398300', 47, 1, 1800000.00),
(37, '174610043031015', 37, 1, 7200000.00),
(38, '174610084046691', 36, 1, 12500000.00),
(39, '174610091047091', 51, 1, 3800000.00),
(40, '174610095065082', 37, 1, 7200000.00),
(41, '174610104072869', 52, 1, 560000.00),
(42, '174610106886338', 47, 1, 1800000.00),
(43, '174610114620174', 41, 1, 9600000.00),
(44, '174610133455397', 36, 1, 12500000.00),
(45, '174610133455397', 37, 1, 7200000.00),
(46, '174610172641035', 37, 1, 7200000.00),
(47, '174610186761111', 36, 1, 12500000.00),
(48, '174610189234066', 47, 1, 1800000.00),
(49, '174610191214809', 47, 1, 1800000.00),
(50, '174610199960197', 37, 1, 7200000.00),
(51, '174615970046706', 47, 1, 1800000.00),
(52, '174616016183712', 37, 1, 7200000.00),
(53, '174616069549847', 47, 1, 1800000.00),
(54, '174616069549847', 37, 1, 7200000.00),
(55, '174616078331197', 52, 1, 560000.00),
(56, '174616081711474', 36, 1, 12500000.00),
(57, '174616091611621', 37, 1, 7200000.00),
(58, '174616096720007', 41, 5, 9600000.00),
(59, '174616141316628', 37, 1, 7200000.00),
(60, '174616154428724', 52, 1, 560000.00),
(61, '174616572579273', 52, 1, 560000.00),
(62, '174617917744973', 52, 1, 560000.00),
(63, '174617966878435', 52, 1, 560000.00),
(64, '174618002577246', 47, 1, 1800000.00),
(65, '174618274039196', 47, 2, 1800000.00),
(66, '174624612940332', 52, 1, 560000.00),
(67, '174624615598220', 37, 1, 7200000.00),
(68, '174624671756273', 47, 1, 1800000.00),
(69, '174628143364665', 47, 1, 1800000.00),
(70, '174628184152146', 37, 1, 7200000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `user_id`, `amount`, `payment_method`, `payment_status`, `transaction_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 520.00, 'Thẻ tín dụng', 'Thành công', 'TX123456', '2025-04-12 12:14:26', '2025-04-12 12:14:26'),
(2, 2, 2, 40.00, 'PayPal', 'Thành công', 'TX789012', '2025-04-12 12:14:26', '2025-04-12 12:14:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` int(11) DEFAULT 0,
  `quantity` int(11) DEFAULT 0,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `discount`, `quantity`, `category_id`, `image`, `created_at`, `updated_at`) VALUES
(36, 'Sofa góc vải bọc cao cấp', 'Thiết kế hiện đại, vải nhung mềm mại', 12500000.00, 10, 5, 1, 'https://nhaxinh.com/wp-content/uploads/2024/12/SOFA-3-CHO-LOUIS-1.jpg', '2025-04-25 18:22:16', '2025-04-25 18:40:00'),
(37, 'Ghế thư giãn gỗ óc chó', 'Gỗ nguyên khối, đệm dày', 7200000.00, 15, 4, 1, 'https://hungphatluxury.vn/wp-content/uploads/2024/08/ghe-thu-gian-bap-benh-nhap-khau-XY101-1-2.jpg', '2025-04-25 18:22:16', '2025-04-25 18:40:00'),
(38, 'Bàn trà mặt đá', 'Chân inox mạ vàng, đá tự nhiên', 5400000.00, 5, 3, 3, 'https://nhaxinh.com/wp-content/uploads/2021/10/ban-nuoc-pallete-white-hien-dai-calligaris-102457-3-768x511.jpg', '2025-04-25 18:22:16', '2025-05-04 17:52:54'),
(40, 'Kệ tivi gỗ công nghiệp', 'Phong cách tối giản, tiện dụng', 4500000.00, 10, 7, 2, 'https://nhaxinh.com/wp-content/uploads/2021/10/tu-tivi-bridge-mau-go-tu-nhien-1m8-768x511.jpg', '2025-04-25 18:22:16', '2025-05-04 17:52:54'),
(41, 'Bàn ăn Tristan Belfast 6 chỗ vải đỏ', 'Gỗ sồi tự nhiên', 9600000.00, 8, 2, 2, 'https://nhaxinh.com/wp-content/uploads/2022/01/102267-bo-ban-an-tristan-do-1-768x511.jpg', '2025-04-25 18:22:16', '2025-04-25 18:40:00'),
(43, 'Đèn chùm pha lê', 'Phong cách châu Âu sang trọng', 6700000.00, 5, 10, 1, 'https://thegioianhsang.vn/application/upload/products/den-chum-pha-le-tpl8088-800.jpg', '2025-04-25 18:22:16', '2025-05-04 17:52:54'),
(44, 'Sofa Saka P100 3 chỗ ', 'Bọc vải nhung cao cấp', 5800000.00, 12, 4, 2, 'https://nhaxinh.com/wp-content/uploads/2024/08/sofa-saka-p100-3-cho-boc-vai-vact10498-768x511.jpg', '2025-04-25 18:22:16', '2025-05-04 17:52:54'),
(46, 'Bàn làm việc nhỏ gọn', 'Phù hợp phòng ngủ, học tập', 2600000.00, 7, 10, 3, 'https://nhaxinh.com/wp-content/uploads/2024/05/ban-lam-viec-osaka-768x511.jpg', '2025-04-25 18:22:16', '2025-05-04 17:52:54'),
(47, 'Ghế bar chân xoay', 'Đệm da PU cao cấp', 1800000.00, 8, 8, 3, 'https://nhaxinh.com/wp-content/uploads/2025/04/GHE-BAR-COSTA-BLACK-2-768x511.webp', '2025-04-25 18:22:16', '2025-05-04 17:52:54'),
(48, 'Ghế ăn Coastal vải VACT5805', 'Khung gỗ chắc chắn, bọc vải cao cấp', 1250000.00, 10, 10, 3, 'https://nhaxinh.com/wp-content/uploads/2024/05/ghe-an-coastal-vai-vact5805-768x511.jpg', '2025-04-25 18:22:16', '2025-05-04 17:52:54'),
(49, 'Đèn ngủ pha lê', 'Phong cách Hàn Quốc, dễ thương', 890000.00, 0, 20, 3, 'https://thegioianhsang.vn/application/upload/products/den-ngu-de-ban-db614.jpg', '2025-04-25 18:22:16', '2025-05-04 17:48:30'),
(51, 'Bàn console trang trí', 'Phong cách hiện đại', 3800000.00, 10, 4, 3, 'https://bizweb.dktcdn.net/100/372/422/products/untitled-design-78-4a91523c-7a21-41c4-8b37-0eb41d8d471b.jpg?v=1681983018070', '2025-04-25 18:22:16', '2025-05-04 17:52:54'),
(52, 'Ghế đôn tròn nỉ', 'Đa năng, dễ di chuyển', 560000.00, 3, 12, 3, 'https://sofatoanquoc.com/images/companies/1/%C4%90%C3%B4n%20ng%E1%BB%93i%20m%C3%A3%2032.jpg?1533838345884', '2025-04-25 18:22:16', '2025-05-04 17:52:54'),
(54, 'Đèn cây đứng decor', 'Phong cách tối giản', 2150000.00, 8, 9, 3, 'https://hoangminhhome.vn/uploads/images/6422a6ad1ddab133070d8c77/%C4%90%C3%A8n-c%C3%A2y-%C4%91%E1%BB%A9ng-decor-ph%C3%B2ng-kh%C3%A1ch-hi%E1%BB%87n-%C4%91%E1%BA%A1i-DC-524-21.jpg', '2025-04-25 18:22:16', '2025-05-04 17:52:54'),
(57, 'Nệm lò xo túi độc lập 5 sao', 'Nệm cao cấp dày 30cm, lò xo túi độc lập, vải bọc kháng khuẩn, không rung lắc khi xoay mình', 11200000.00, 12, 4, 1, 'https://changagoidemdep.vn/media/news/249_6043_dem_gia_tot_lo_xo_see.jpg', '2025-05-04 17:11:18', '2025-05-04 17:11:18'),
(58, 'Nệm cao su thiên nhiên nguyên khối', '100% cao su thiên nhiên, độ đàn hồi cao, kháng khuẩn, kháng nấm mốc', 15800000.00, 15, 3, 2, 'https://nemkhuyenmai.com/wp-content/uploads/2022/09/2-2.jpg', '2025-05-04 17:11:18', '2025-05-04 17:52:54'),
(59, 'Nệm foam hoạt tính nâng đỡ cột sống', 'Foam memory 7 vùng, đàn hồi cao, chống lún, vải bọc mềm mịn thoáng khí', 8400000.00, 10, 5, 2, 'https://zinus.vn/cdn/shop/files/vn-11134208-7r98o-lw6p199pdn15d8_266e5a1a-13d0-4887-aa36-d629daca9684.jpg?v=1718854109&width=1946', '2025-05-04 17:11:18', '2025-05-04 17:52:54'),
(60, 'Topper nệm lông vũ nhân tạo', 'Lớp nệm mỏng tăng độ êm cho giường cũ, dễ giặt, vải cotton kháng khuẩn', 2200000.00, 7, 10, 3, 'https://hantexco.vn/wp-content/uploads/2021/07/tam-nem-topper-microfiber.jpg', '2025-05-04 17:11:18', '2025-05-04 17:52:54'),
(61, 'Giường ngủ gỗ sồi phong cách Nhật', 'Thiết kế tối giản, gỗ sồi tự nhiên chắc chắn, màu gỗ mộc sang trọng', 14500000.00, 10, 5, 2, 'https://noithatminhkhoi.com/upload/sanpham/large/giuong-ngu-go-soi-kieu-nhat-1m6-gn350-236-1.jpg', '2025-05-04 17:18:24', '2025-05-04 17:52:54'),
(62, 'Giường bọc nệm đầu giường cao cấp', 'Khung gỗ công nghiệp chống mối mọt, đầu giường bọc nệm êm ái, phù hợp phòng master', 16800000.00, 12, 4, 3, 'https://dunlopilloshop.com/upload/sanpham/large/giuong-ngu-boc-da-simili-cao-cap-205-0.jpg', '2025-05-04 17:18:24', '2025-05-04 17:52:54'),
(63, 'Giường ngủ tân cổ điển chạm khắc', 'Khung gỗ tự nhiên, hoa văn tinh xảo, sơn PU bóng cao cấp màu trắng sữa', 27500000.00, 18, 2, 1, 'https://giuongtudep.vn/data/upload/4-11.jpg', '2025-05-04 17:18:24', '2025-05-04 17:18:24'),
(64, 'Giường tầng 2 người lớn có kệ sách', 'Khung sắt sơn tĩnh điện đen nhám, tích hợp cầu thang ', 12800000.00, 10, 3, 1, 'https://product.hstatic.net/1000294146/product/giuong_tang_thong_minh_khung_sat_ohaha_-_gts022_-_02_a0a4d63aec024d97b7a79d940120cf15_master.png', '2025-05-04 17:18:24', '2025-05-04 17:29:39'),
(65, 'Giường ngủ thông minh có ngăn kéo', 'Tích hợp 4 ngăn kéo dưới gầm, tiết kiệm không gian, vân gỗ sồi vàng', 15800000.00, 15, 4, 3, 'https://xhouse.com.vn/wp-content/uploads/2024/03/giuong-ngu-co-ngan-keo_2.jpg', '2025-05-04 17:18:24', '2025-05-04 17:52:54'),
(66, 'Ghế thư giãn cong gỗ uốn', 'Ghế nằm relax khung gỗ uốn, nệm vải linen, phù hợp phòng đọc sách', 5400000.00, 8, 6, 2, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmXBTjAboTH1g65IzRZooyZKL_Fi3oXpcEIA&s', '2025-05-04 17:25:32', '2025-05-04 17:52:54'),
(67, 'Đèn ngủ gốm sứ', 'Đèn gốm men rạn cổ, chụp vải lanh, ánh sáng vàng nhẹ tạo cảm giác ấm cúng', 1700000.00, 5, 10, 1, 'https://battrangceramics.com/User_folder_upload/thuquyen/images/Den-gom/den-ngan-hoa.jpg', '2025-05-04 17:25:32', '2025-05-04 17:27:54'),
(68, 'Giường gỗ MDF phủ melamine', 'Khung MDF lõi xanh chống ẩm, màu trắng kết hợp vân gỗ, size 1m8x2m', 10200000.00, 12, 4, 2, 'https://noithatbaonam.vn/upload/product/giuongngugomdfphumelamine01-8574.jpg', '2025-05-04 17:25:32', '2025-05-04 17:52:54'),
(69, 'Sofa băng 3 chỗ bọc nhung', 'Bọc vải nhung nhập khẩu Hàn Quốc, chân inox mạ vàng, phù hợp phòng khách hiện đại', 13800000.00, 15, 3, 2, 'https://noithatgiakho.com/upload/sanpham/large/ghe-sofa-bang-3-cho-boc-da-cao-cap-ba25.jpg', '2025-05-04 17:25:32', '2025-05-04 17:52:54'),
(70, 'Ghế ăn lưng cong bọc da', 'Khung sắt sơn đen mờ, đệm da PU chống trầy, dễ lau chùi', 2100000.00, 7, 10, 3, 'https://kika.vn/wp-content/uploads/2024/06/ghe-an-boc-da-GA101.jpg', '2025-05-04 17:25:32', '2025-05-04 17:52:54'),
(71, 'Đèn chùm hiện đại 8 bóng LED', 'Thiết kế chùm kim loại mạ đen nhám, bóng LED trắng ấm, thích hợp phòng khách', 6100000.00, 20, 2, 3, 'https://den379.com/wp-content/uploads/2019/12/8-den-chum-5-2.jpg', '2025-05-04 17:25:32', '2025-05-04 17:52:54'),
(72, 'Sofa góc chữ L vải linen', 'Sofa chữ L kích thước 2m6, khung gỗ tự nhiên, bọc vải linen cao cấp màu xám tro', 16800000.00, 12, 2, 2, 'https://sofaanhome.com/wp-content/uploads/2024/07/SL142-1.png', '2025-05-04 17:25:32', '2025-05-04 17:52:54'),
(73, 'Đèn treo trần phòng ăn 3 bóng', 'Khung kim loại đen, chụp đèn thủy tinh mờ, ánh sáng trắng ấm', 3400000.00, 12, 6, 3, 'https://thegioianhsang.vn/application/upload/products/den-tha-ban-an-tl229-3.jpg', '2025-05-04 17:33:54', '2025-05-04 17:52:54'),
(74, 'Bàn trà tròn đôi xếp chồng', 'Bàn trà đôi 2 kích thước, mặt đá nhân tạo, chân sắt mạ vàng sang trọng', 6200000.00, 15, 4, 1, 'https://livinghome.vn/wp-content/uploads/san-pham/noi-that/ban-tra/ban-tra-thierry/ban-tra-thierry-1-450x450.jpg.webp', '2025-05-04 17:33:54', '2025-05-04 17:33:54'),
(75, 'Ghế đẩu gỗ decor mini', 'Ghế nhỏ gỗ tự nhiên, dùng decor góc nhà hoặc làm bàn phụ', 125000.00, 5, 10, 2, 'https://down-vn.img.susercontent.com/file/61b35c6519e29f6b36296e1b99abf4a1', '2025-05-04 17:33:54', '2025-05-04 17:52:54'),
(76, 'Giường da PU hiện đại', 'Giường bọc da PU nhập khẩu, không đầu giường, chân kim loại đen', 9800000.00, 10, 3, 3, 'https://nemkhuyenmai.com/wp-content/uploads/2020/05/giuong-ngu-hien-dai-5.jpg', '2025-05-04 17:33:54', '2025-05-04 17:52:54'),
(77, 'Đèn LED cảm ứng hiện đại', 'Đèn bàn học/ làm việc, chạm cảm ứng, 3 chế độ sáng, tiết kiệm điện', 1900000.00, 7, 8, 2, 'https://cbu01.alicdn.com/img/ibank/O1CN01VIh9ml1hiwnMsZNrT_!!2217031704312-0-cib.jpg', '2025-05-04 17:33:54', '2025-05-04 17:52:54'),
(78, 'Sofa cong uốn lượn phong cách Ý', 'Thiết kế độc đáo, vải boucle trắng kem, phù hợp decor biệt thự hoặc showroom', 19800000.00, 15, 2, 3, 'https://azolaco.com/vnt_upload/news/hinh-noi-dung/Sofa_cong_11.gif', '2025-05-04 17:42:05', '2025-05-04 17:52:54'),
(79, 'Đèn cây thả dây vintage', 'Đèn cây thả với dây vải xoắn, ánh sáng vàng dịu, phù hợp góc sofa hoặc hành lang', 2700000.00, 10, 6, 3, 'https://denmaytre.net/wp-content/uploads/2020/07/%C4%90e%CC%80n-Ma%CC%82y-Tre-Ma%CC%82%CC%83u-%C4%91e%CC%80n-ca%CC%82y-tre-tha%CC%89-tra%CC%82%CC%80n-qua%CC%82%CC%81n-da%CC%82y-thu%CC%9B%CC%80ng-6-bo%CC%81ng-4.jpeg.webp', '2025-05-04 17:42:05', '2025-05-04 17:52:54'),
(80, 'Giường ngủ kiểu Nhật không chân', 'Thiết kế sàn thấp, khung gỗ nguyên tấm, màu óc chó trầm sang trọng', 11200000.00, 10, 3, 2, 'https://hoanmydecor.vn/wp-content/uploads/2023/04/giuong-ngu-khong-chan_7.jpg', '2025-05-04 17:42:05', '2025-05-04 17:52:54'),
(81, 'Ghế decor nhựa trong suốt', 'Chất liệu nhựa Acrylic cao cấp, kiểu dáng ghost hiện đại, dùng decor tiệm hoặc studio', 2450000.00, 8, 10, 3, 'https://flexhouse.vn/wp-content/uploads/2023/09/Ghe-nhua-cafe-trong-suot-decor-phong-YX8322-3.jpg', '2025-05-04 17:42:05', '2025-05-04 17:52:54'),
(82, 'Đèn led viền gương phòng tắm', 'Gắn gương nhà vệ sinh, ánh sáng LED trắng 3 chế độ, cảm ứng chạm bật/tắt', 130000.00, 10, 8, 2, 'https://dehome.vn/images/products/2020/09/11/original/guong-den-led-phong-tam-hinh-tron-full-tinh-nang-dehome---d607a_1599795958.jpg.jpg', '2025-05-04 17:42:05', '2025-05-04 17:52:54'),
(83, 'Nệm lò xo Bonnell êm ái', 'Công nghệ lò xo Bonnell đàn hồi cao, bọc vải gấm, kháng khuẩn, kích thước 1m8x2m', 9800000.00, 12, 4, 3, 'https://everonvn.com.vn/media/CK/images/dem-lo-lo/kingkoil/dem-lo-xo-bonnell-deluxe.jpg', '2025-05-04 17:42:05', '2025-05-04 17:52:54'),
(84, 'Sofa mini 2 chỗ pastel hồng', 'Sofa bọc vải hồng pastel, chân gỗ sồi, phù hợp phòng ngủ nữ hoặc góc chill', 6100000.00, 10, 5, 1, 'https://noithatkdt.vn/wp-content/uploads/2023/02/mau-sofa-2-cho-mau-hong-thiet-ke-thong-minh.jpg', '2025-05-04 17:42:05', '2025-05-04 17:42:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `rating`, `comment`) VALUES
(1, 1, 1, 5, 'Smartphone tuyệt vời, rất nhanh!'),
(2, 2, 2, 4, 'Áo thun đẹp, vừa vặn.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_status` varchar(50) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gender` enum('Male','Female','Other') DEFAULT 'Other',
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `address`, `username`, `password`, `account_status`, `role_id`, `created_at`, `updated_at`, `gender`, `remember_token`) VALUES
(1, 'Nguyen Van A', 'nguyen.a@example.com', '0123456789', '123 Đường, Hà Nội', 'nguyenvana', 'minhnghia', 'Active', 1, '2025-04-12 12:14:25', '2025-04-15 22:02:25', 'Other', NULL),
(2, 'Tran Thi B', 'tran.b@example.com', '0987654321', '456 Đại lộ, Hồ Chí Minh', 'tranthib', 'password456', 'Active', 2, '2025-04-12 12:14:25', '2025-04-12 12:14:25', 'Other', NULL),
(3, 'Name', '123@gmail.com', NULL, NULL, 'admin', '1408', NULL, NULL, '2025-04-12 15:38:38', '2025-04-18 11:02:19', 'Other', NULL),
(4, NULL, 'fmmmm@gmial.vom', NULL, NULL, 'adminw', '123', NULL, NULL, '2025-04-12 15:40:24', '2025-04-12 15:40:24', 'Other', NULL),
(9, NULL, 'efenf@gmail.com', NULL, NULL, 'fefnejf', '1234', NULL, NULL, '2025-04-12 15:45:14', '2025-04-12 15:45:14', 'Other', NULL),
(10, NULL, 'ffefj@gmail.com', NULL, NULL, 'oneueufe', '1233', NULL, NULL, '2025-04-12 15:59:41', '2025-04-12 15:59:41', 'Other', NULL),
(13, NULL, 'nghia@gmail.com', NULL, NULL, 'minhnghia', 'nghia123', NULL, NULL, '2025-04-13 10:35:32', '2025-04-13 10:35:32', 'Other', NULL),
(39, 'nghia123', 'nghia1234@gmail.com', '123', NULL, 'nghia1234', '123', NULL, NULL, '2025-04-14 10:12:53', '2025-05-03 00:46:58', 'Male', NULL),
(41, NULL, 'chung@gmail.com', NULL, NULL, 'chung1', '123123123', NULL, NULL, '2025-04-18 22:08:30', '2025-04-18 22:08:30', 'Other', NULL),
(42, NULL, 'chung@1gmail.com', NULL, NULL, 'chung12', '123123123', NULL, NULL, '2025-04-18 22:11:13', '2025-04-18 22:11:13', 'Other', NULL),
(43, 'Phú dzzz1', 'lephu240905@gmail.com', '03757919393', NULL, 'phule', '123', NULL, NULL, '2025-04-25 20:31:04', '2025-05-03 21:16:28', 'Male', NULL),
(44, NULL, 'thinh@123', NULL, NULL, 'thinh', '123456', NULL, NULL, '2025-04-29 11:28:22', '2025-04-29 11:28:22', 'Other', NULL),
(46, NULL, 'lephu2409@gmail.com', NULL, NULL, 'lethanhphu', 'lethanhphu', NULL, NULL, '2025-05-03 00:56:28', '2025-05-03 00:57:35', 'Other', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
