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
  FOREIGN KEY(dishCategory) REFERENCES categories(catId)
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
          '2.99',
          1,
          '2020:10:20',
          1
      );


CREATE TABLE IF NOT EXISTS `cart` (
  `cartId` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `userId` int(11) NOT NULL,
  `dishId` int(11) NOT NULL,
  `cartQuantity` int(11) NOT NULL,
  `cartDate` date NOT NULL,
  `cartExpired` boolean NOT NULL,
  FOREIGN KEY(userId) REFERENCES users(userId),
  FOREIGN KEY(dishId) REFERENCES dishes(dishId)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
