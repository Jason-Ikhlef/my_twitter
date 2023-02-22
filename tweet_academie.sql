CREATE TABLE `conversations` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `users_id` LONGTEXT,
  PRIMARY KEY (`id`)
);

CREATE TABLE `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nickname` VARCHAR(42) NOT NULL,
  `email` VARCHAR(320) NOT NULL UNIQUE,
  `password` VARCHAR(40) NOT NULL,
  `follows` LONGTEXT,
  `picture` VARCHAR(2048),
  `date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

CREATE TABLE `messages`(
  `id` INT NOT NULL AUTO_INCREMENT,
  `message` VARCHAR(140) NOT NULL,
  `date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `conversation_id` INT,
  `user_id` INT,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`conversation_id`) REFERENCES `conversations`(`id`),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`)
);

CREATE TABLE `tweets` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `origin` INT DEFAULT NULL,
  `user_id` INT,
  `message` VARCHAR(140) NOT NULL,
  `date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `images` VARCHAR(2048),
  `comments` LONGTEXT,
  `liked_id` LONGTEXT,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`),
  FOREIGN KEY (`origin`) REFERENCES `tweets`(`id`) ON DELETE SET NULL
);

CREATE TABLE `likes` (
  `id` INT  NOT NULL AUTO_INCREMENT,
  `user_id` INT,
  `tweet_id` INT,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`),
  FOREIGN KEY (`tweet_id`) REFERENCES `tweets`(`id`)
);

CREATE TABLE `retweets` (
  `id` INT  NOT NULL AUTO_INCREMENT,
  `tweet_id` INT,
  `user_id` INT,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`),
  FOREIGN KEY (`tweet_id`) REFERENCES `tweets`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO `users` (`id`, `nickname`, `email`, `password`, `follows`, `picture`, `date`) VALUES (NULL, 'dorian', 'dorian@dorian.fr', 'dorian', NULL, NULL, current_timestamp());