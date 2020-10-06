-- -------------------------------------------
-- Restaurant Reservation Website
-- Group 5
-- Fall 2020
-- -------------------------------------------

-- create database Reservation
create database reservation;

use reservation;

-- create table users
drop table if exists Users;
create table Users (
userEmail varchar(255) not null primary key,
userPass varchar(255),
userFName varchar(255), 
userLName varchar(255),
userStatus varchar(20)
);

