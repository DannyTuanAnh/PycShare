Create database system_;
use system_user;

create table user(
id int auto_increment primary key,
username varchar(50) unique not null,
password varchar(255) not null
);