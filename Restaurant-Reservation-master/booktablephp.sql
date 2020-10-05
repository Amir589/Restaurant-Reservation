create database bookmytablephp;

use bookmytablephp;

create table users
(
id varchar(25),
firstname varchar(100),
lastname varchar(100),
contactnumber int(10) primary key, 
password varchar(25),
email varchar(25),
status varchar(25)
);



create table admin
(
adminname varchar(25) primary key,
password varchar(25)
);

insert into admin values('admin','admin');


create table booking
(

customerid varchar(25),
tabletype varchar(25),
purpose varchar(100),
mealplan varchar(100),
arrivaltime varchar(25),
dateofbook varchar(25),
status varchar(20),

);

