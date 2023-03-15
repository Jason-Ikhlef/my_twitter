DROP DATABASE IF EXISTS tweet_academy;
CREATE DATABASE tweet_academy;

USE tweet_academy;

DROP TABLE IF EXISTS conversations;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS messages;
DROP TABLE IF EXISTS tweets;
DROP TABLE IF EXISTS likes;
DROP TABLE IF EXISTS retweets;

CREATE TABLE conversations (
    id              INT NOT NULL AUTO_INCREMENT ,
    users_id        LONGTEXT,
    PRIMARY KEY (id)
);

CREATE TABLE users (
    id              INT             NOT NULL AUTO_INCREMENT,
    nickname        VARCHAR(42)     NOT NULL,
    email           VARCHAR(320)    NOT NULL UNIQUE,
    password        VARCHAR(40)     NOT NULL,
    follows         LONGTEXT,
    picture         VARCHAR(2048)   DEFAULT "01",
    banner          VARCHAR(2048)   DEFAULT NULL,
    date            DATETIME        DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

CREATE TABLE messages(
    id              INT             NOT NULL AUTO_INCREMENT,
    message         VARCHAR(140)    NOT NULL,
    date            DATETIME        DEFAULT CURRENT_TIMESTAMP,
    conversation_id INT,
    user_id         INT,
    PRIMARY KEY (id),
    FOREIGN KEY (conversation_id)   REFERENCES conversations(id),
    FOREIGN KEY (user_id)           REFERENCES users(id)
);

CREATE TABLE tweets (
    id              INT             NOT NULL AUTO_INCREMENT,
    origin          INT             DEFAULT NULL,
    user_id         INT,
    message         VARCHAR(140)    NOT NULL,
    date            DATETIME        DEFAULT CURRENT_TIMESTAMP,
    images          VARCHAR(2048),
    comments        LONGTEXT,
    liked_id        LONGTEXT,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id)           REFERENCES users(id),
    FOREIGN KEY (origin)            REFERENCES tweets(id) ON DELETE SET NULL
);

CREATE TABLE likes (
  id                INT             NOT NULL AUTO_INCREMENT,
  user_id           INT,
  tweet_id          INT,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id)             REFERENCES users(id),
  FOREIGN KEY (tweet_id)            REFERENCES tweets(id)
);

INSERT INTO users (nickname, email, password) VALUES 
('dorian', 'dorian@dorian.fr','fb3f844b2fa8214975077fa3ebe813d7414363b2'),
('quentin', 'quentin@quentin.fr','9ecce358db7662fa81ebd9500e6306d04ad1b90b'),
('guillaume', 'guillaume@guillaume.fr','8771ecda80c2ec6417ed413fab5185d4a000b447'),
('jason', 'jason@jason.fr','e0e0b8567de6320bd678b1748f9175b47209eb55');