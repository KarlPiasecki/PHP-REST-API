CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Fighting'),
(2, 'Retro'),
(3, 'FPS');

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `posts` (`id`, `category_id`, `title`, `body`) VALUES
(1, 1, 'Soul Calibur VI', 'Ut pulvinar, vitae rutrum augue vita'),
(2, 2, 'Comix Zone', 'Adipiscing elit. Ut interdum este.'),
(3, 3, 'Doom Eternal', 'Lorem ipsum dolor sit amet, consectetur aeque.');