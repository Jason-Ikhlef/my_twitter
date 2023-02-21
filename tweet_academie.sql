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
  `date` DATE GETDATE(),
  PRIMARY KEY (`id`)
);

CREATE TABLE `messages` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `message` VARCHAR(140) NOT NULL,
  `date` DATE GETDATE(),
  `conversation_id` INT,
  `user_id` INT,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`conversation_id`) REFERENCES `conversations`(`id`),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`)
);

CREATE TABLE `tweets` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT,
  `message` VARCHAR(140) NOT NULL,
  `date` DATE GETDATE(),
  `images` VARCHAR(2048),
  `origin` INT,
  `comments` LONGTEXT,
  `liked_id` LONGTEXT,
  PRIMARY KEY (`id`, `origin`),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`)
);

CREATE TABLE `likes` (
  `id` INT  NOT NULL AUTO_INCREMENT,
  `user_id` INT,
  `tweet_id` INT,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`),
  FOREIGN KEY (`tweet_id`) REFERENCES `tweets`(`id`)
);

