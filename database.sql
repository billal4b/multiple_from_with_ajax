#database schema ----------please source this to your database;

drop database if exists skill_test;
create database skill_test;
use skill_test;

#first table --------------------------
drop table if exists general_info;
create table general_info(
	id int(10) primary key auto_increment,
	name varchar(256),
	email varchar(256),
	password varchar(256)
);

# sample insert
insert into general_info (name,email,password)values('billal','billal@test.com','billal123');

#second table -----------------------
drop table if exists contact_info;
create table contact_info(
	id int(10) primary key auto_increment,
	address_one varchar(256),
	address_two varchar(256),
	country varchar(128),
	phone varchar(64)
);

# sample insert
insert into contact_info (address_one,address_two,country,phone)values('kalabagan','dhaka','bd','01***55**55');

#third table for dropdown list of country----------------------------------
drop  table if exists country;
create table country(
	id int(10) primary key auto_increment,
	country varchar(256)
);

#some insertation of sample country------------
insert into country(country)values('Bangladesh'),('India'),('Pakistan'),('Srilanka'),('Nepal'),('Bhutan');

