
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `catelogies` (
  `cate_id` int(50) NOT NULL,
  `cate_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `catelogies` (`cate_id`, `cate_name`) VALUES
(1, 'Điện thoại SamSung s22'),
(2, 'Điện thoại SamSung s22'),
(3, 'Điện thoại Iphone 13 promax'),
(4, 'Điện thoại Xiaomi note 10');



CREATE TABLE `products` (
  `product_id` int(50) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `description` varchar(999) NOT NULL,
  `cate_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `products` (`product_id`, `product_name`, `price`, `quantity`, `image`, `description`, `cate_id`) VALUES
(11, 'samsung s22 ultra', 400, 2, 'hodongdo.jpg', 'fyv', 1);


ALTER TABLE `catelogies`
  ADD PRIMARY KEY (`cate_id`);


ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);


ALTER TABLE `catelogies`
  MODIFY `cate_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `products`
  MODIFY `product_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;


