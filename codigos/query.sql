CREATE SCHEMA IF NOT EXISTS `users`;
USE `users`;
CREATE TABLE IF NOT EXISTS `users` (
    `user_id` INT AUTO_INCREMENT PRIMARY KEY,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `progress` INT DEFAULT 1
);
/* 
Essa é a query para sempre que for iniciar um novo servidor local.
Caso não execute a query, o site não abre.
*/