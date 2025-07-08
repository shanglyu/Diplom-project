-- Tạo cơ sở dữ liệu (nếu chưa tồn tại)
CREATE DATABASE IF NOT EXISTS pho84;
USE pho84;

-- Bảng meals
CREATE TABLE IF NOT EXISTS `meals` (
  `meal_id` int(11) NOT NULL AUTO_INCREMENT,
  `meal_name` varchar(255) NOT NULL,
  `meal_price` decimal(10,2) NOT NULL,
  `meal_image_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`meal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `meals` (`meal_id`, `meal_name`, `meal_price`, `meal_image_url`) VALUES
(6, 'Burger', 33.00, 'https://cdn.pixabay.com/photo/2023/05/29/17/01/hamburger-8026582_640.jpg'),
(7, 'Salade César', 12.50, 'https://cdn.pixabay.com/photo/2017/03/19/14/59/italian-salad-2156719_640.jpg'),
(8, 'Pizza Margherita', 11.95, 'https://cdn.pixabay.com/photo/2017/09/30/15/10/plate-2802332_640.jpg'),
(9, 'Grilled Salmon', 18.99, 'https://cdn.pixabay.com/photo/2014/11/05/15/57/salmon-518032_640.jpg'),
(11, 'Vegetable Stir-Fry', 10.99, 'https://cdn.pixabay.com/photo/2018/03/18/20/06/vegetables-3238149_640.jpg'),
(12, 'Fish Tacos', 17.99, 'https://cdn.pixabay.com/photo/2017/05/31/03/31/fish-tacos-2358938_640.jpg'),
(13, 'Shrimp Scampi', 60.99, 'https://cdn.pixabay.com/photo/2014/01/06/18/46/spaghetti-239563_640.jpg'),
(14, 'Greek Salad', 10.00, 'https://cdn.pixabay.com/photo/2017/01/09/20/23/pasta-salad-1967501_640.jpg'),
(15, 'Ojja', 13.00, 'https://cdn.pixabay.com/photo/2017/11/16/18/51/kagyana-2955466_1280.jpg');

-- Bảng users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) NOT NULL,
  `user_surname` varchar(40) NOT NULL,
  `user_age` int(10) UNSIGNED NOT NULL,
  `user_login` varchar(40) NOT NULL,
  `user_password` varchar(600) NOT NULL,
  `user_role` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`user_id`, `user_email`, `user_surname`, `user_age`, `user_login`, `user_password`, `user_role`) VALUES
(29, 'admin@gmail.com', 'admin', 23, 'admin', 'bc2fcb16e7f307efcbbca97b447669c5', 1),
(31, 'hoangha@gmail.com', 'hoangha', 21, 'dhoang', '64ac8134cc92b4602220dbfffb542444', 0),
(32, 'minhlina@gmail.com', 'minhlin', 23, 'minlin', '4a87710f93803a812dcf83027852306e', 0);

-- Bảng orders
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` date NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `meal_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `meal_id` (`meal_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`meal_id`),
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- !@#$OBfg84: Pass
INSERT INTO `orders` (`order_id`, `order_date`, `order_status`, `meal_id`, `user_id`) VALUES
(42, '2024-04-12', 'Pending', 14, 32),
(43, '2024-04-12', 'Pending', 12, 32),
(44, '2024-04-12', 'Pending', 6, 32);
