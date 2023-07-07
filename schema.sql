CREATE DATABASE onlytask
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE onlytask

CREATE TABLE users(
    id int auto_increment PRIMARY KEY,
    firstname varchar(128) NOT NULL UNIQUE,
    phone char(20) NOT NULL UNIQUE,
    email varchar(128) NOT NULL UNIQUE,
    passw char(20)
);