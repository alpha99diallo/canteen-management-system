CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `userName` varchar(64) NOT NULL,
  `userEmail` varchar(64) NOT NULL,
  `userPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `categories` (
  `catId` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `catName` varchar(64) NOT NULL,
  `catSlug` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `dishes` (
  `dishId` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `dishName` varchar(64) NOT NULL,
  `dishDescription` varchar(64) NOT NULL,
  `dishImage` varchar(64) NOT NULL,
  `dishPrice` varchar(64) NOT NULL,
  `dishCategory` int(11) NOT NULL,
  `dishDateAdded` date NOT NULL,
  `dishAvailability` boolean NOT NULL,
  -- `today_special` boolean not null
  -- `dayAvailable` array not null
  FOREIGN KEY(dishCategory) REFERENCES categories(catId) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `categories` (
          catName,
          catSlug
				) VALUES(
          'Breakfast',
          'breakfast'
        );

INSERT INTO `categories` (
          catName,
          catSlug
        ) VALUES(
          'Lunch',
          'lunch'
        );

INSERT INTO `categories` (
            catName,
            catSlug
        ) VALUES(
            'Dinner',
            'dinner'
        );

INSERT INTO `dishes` (
          dishName,
          dishDescription,
          dishImage,
          dishPrice,
          dishCategory,
          dishDateAdded,
          dishAvailability
        ) VALUES(
          'Margarita',
          'Very amazing margarita',
          'images/img-01.jpg',
          '100',
          1,
          '2020:10:20',
          1
      );

INSERT INTO `dishes` (
          dishName,
                dishDescription,
                dishImage,
                dishPrice,
                dishCategory,
                dishDateAdded,
                dishAvailability
              ) VALUES(
                'Tiramissou',
                'Very amazing Tiramissou',
                'images/img-03.jpg',
                '199',
                1,
                '2020:10:20',
                1
            );


INSERT INTO `dishes` (
              dishName,
              dishDescription,
                      dishImage,
                      dishPrice,
                      dishCategory,
                      dishDateAdded,
                      dishAvailability
                    ) VALUES(
                      'Frites Poulet',
                      'Very amazing Frites poulet',
                      'images/img-01.jpg',
                      '299',
                      1,
                      '2020:10:20',
                      1
                  );


CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `adminName` varchar(125) NOT NULL,
  `adminEmail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin` (
          adminName,
          adminEmail,
          password,
          type
        ) VALUES(
          'Alpha',
          'aadiallo1999@yahoo.com',
          'alphadiallo',
          'admin'
      );

CREATE TABLE `orders` (
    `orderId` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `orderCustomer` varchar(125) NOT NULL,
    `orderDate` date NOT NULL,
    `orderAmount` varchar(100) NOT NULL,
    `orderStatus` varchar(20) NOT NULL,
    `orderPayment` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `dishId` int(11) NOT NULL,
	`orderId` int(11) not null,
	`order_item_status_code` varchar(100) not null,
	`order_item_quantity` int(11) not null,
  `order_item_price` varchar(50) NOT NULL,
  FOREIGN KEY(dishId) REFERENCES dishes(dishId),
  FOREIGN KEY(orderId) REFERENCES orders(orderId)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
