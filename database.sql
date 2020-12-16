CREATE DATABASE tueminh; 
use tueminh;
CREATE TABLE users(
	user_id int not null primary key auto_increment,
    user varchar(50) not null,
    password varchar(50) not null
);

insert into users(user, password) values ("admin", "admin");
SELECT count(*) as user FROM users WHERE `user`="admin" AND `password`="admsin";

CREATE TABLE products(
	product_id int not null primary key auto_increment,
    category varchar(50),
    product_code varchar(50),
    name varchar(100),
    amount int default 0,
    price bigint,
    unit varchar(50),
    sum int
);

insert into products(category, product_code, name, amount, price, unit, sum) value ('cam', 'C11', 'CamIP', 10, 100000, 'Chiếc', 200000);
insert into products(category, product_code, name, amount, price, unit, sum) value ('cam', 'C12', 'CamIP', 10, 200000, 'Chiếc', 200000);
insert into products(category, product_code, name, amount, price, unit, sum) value ('cam', 'C13', 'CamIP', 10, 300000, 'Chiếc', 200000);
insert into products(category, product_code, name, amount, price, unit, sum) value ('cam', 'C14', 'CamIP', 10, 400000, 'Chiếc', 200000);
insert into products(category, product_code, name, amount, price, unit, sum) value ('cam', 'C15', 'CamIP', 10, 500000, 'Chiếc', 200000);