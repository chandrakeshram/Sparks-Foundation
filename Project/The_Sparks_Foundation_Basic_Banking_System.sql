
CREATE DATABASE `The_Sparks_Foundation_Basic_Banking_System`;

USE `The_Sparks_Foundation_Basic_Banking_System`;

CREATE TABLE `Transaction` (
    `Id` INT PRIMARY KEY AUTO_INCREMENT,
    `Sender` TEXT NOT NULL,
    `Receiver` TEXT NOT NULL,
    `Balance` INT NOT NULL,
    `Datetime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
) ENGINE = InnoDB;

INSERT INTO `Transaction` (`Id`, `Sender`, `Receiver`, `Balance`, `Datetime`) VALUES
    (1, 'Ram', 'Deepak', 9, '2021-04-08 18:08:56'),
    (2, 'Namami', 'Juhi', 100, '2021-04-08 14:55:43'),
    (3, 'Ram', 'Tarun', 1, '2021-04-08 14:58:55'),
    (4, 'Adil', 'Kamlesh', 5000, '2021-06-03 21:49:16'),
    (5, 'Kamlesh', 'Adil', 5000, '2021-06-05 20:41:06'),
    (6, 'Adil', 'Kamlesh', 5000, '2021-06-05 23:34:40'),
    (7, 'Kamlesh', 'Adil', 5000, '2021-06-06 10:42:24');

CREATE TABLE `User` (
    `Id` INT PRIMARY KEY AUTO_INCREMENT,
    `Name` TEXT NOT NULL,
    `Email` VARCHAR(50) NOT NULL,
    `Balance` INT NOT NULL
) ENGINE = InnoDB;

INSERT INTO `User` (`Id`, `Name`, `Email`, `Balance`) VALUES
    (1, 'Adil', 'adilkhan@gmail.com', 50000),
    (2, 'Kamlesh', 'kamlesh85@gmail.com', 30000),
    (3, 'Namami', 'namamishah@gmail.com', 39900),
    (4, 'Priyanka', 'priyanka12@gmail.com', 10000),
    (5, 'Shobhit', 'shobhitjain@gmail.com', 40000),
    (6, 'Ram', 'singhram@gmail.com', 19990),
    (7, 'Deepak', 'deepak1298@gmail.com', 50009),
    (8, 'Juhi', 'sharmajuhi99@gmail.com', 40100),
    (9, 'Naman', 'dixitnaman88@gmail.com', 30000),
    (10, 'Tarun', 'tarunk34@gmail.com', 50001);
