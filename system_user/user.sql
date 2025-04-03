Create database system_user;
use system_user;

create table user(
id int auto_increment primary key,
user varchar(50) unique not null,
pass varchar(255) not null
);

insert into user(user, pass)
values
("admin", "123"),
("nguoi dung", "456");
