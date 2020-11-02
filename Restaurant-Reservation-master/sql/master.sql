-- -------------------------------------------
-- Restaurant Reservation Website
-- Group 5
-- Fall 2020
-- -------------------------------------------

-- create database Reservation
create database reservation;

use reservation;

-- create users table
drop table if exists Users;
create table Users (
userEmail varchar(255) not null primary key,
userPass varchar(255),
userFName varchar(255), 
userLName varchar(255),
userRole varchar(50)
);

-- create reservation table
drop table if exists Reservation;
create table Reservation (
reserveID int not null auto_increment primary key,
reserveGuest int,
reserveDate date,
reserveTime varchar(255),
userEmail varchar(255),
flagCancelled boolean default false,
foreign key (userEmail) references Users(userEmail)
);

