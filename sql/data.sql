create database pets;
use pets;
create table pet (
    id int primary key auto_increment,
    name varchar(255) not null,
    born date not null,
    chip varchar(255) not null,
    category varchar(255) not null,
    adopt boolean not null default false
);