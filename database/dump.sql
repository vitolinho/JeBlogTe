CREATE TABLE utilisateurs (
    `user_id` int auto_increment PRIMARY KEY,
    `email` varchar(100),
    `password` varchar(100),
    `admin` boolean
);

CREATE TABLE articles (
    `article_id` int auto_increment PRIMARY KEY,
    `title` varchar(255) NOT NULL,
    `content` text NOT NULL,
    `written_by` varchar(100) NOT NULL
);