-- Database: ecommerce_project

-- DROP DATABASE ecommerce_project;

CREATE DATABASE ecommerce_project
    WITH 
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'English_United States.1252'
    LC_CTYPE = 'English_United States.1252'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1;
	
    -- Table Creation 
CREATE TABLE customer_order (
 	order_id SERIAL NOT NULL PRIMARY KEY,
	customer_id int NOT NULL REFERENCES customer(customer_id),
	payment_id int NOT NULL REFERENCES payment(payment_id),
	product_id int NOT NULL REFERENCES product(product_id)
);

CREATE TABLE customer (
	customer_id SERIAL PRIMARY KEY,
	first_name VARCHAR (50) NOT NULL,
	last_name VARCHAR (50) NOT NULL,
	email VARCHAR (50) NOT NULL,
	phone_number VARCHAR (11) NOT NULL,
	address_id int NOT NULL REFERENCES address(address_id)
);

CREATE TABLE address (
	address_id SERIAL PRIMARY KEY,
	address_st VARCHAR (50) NOT NULL,
	city VARCHAR (50) NOT NULL,
	country VARCHAR (50) NOT NULL,
	postal_code VARCHAR (10) NOT NULL
);

CREATE TABLE payment (
	payment_id SERIAL PRIMARY KEY,
	payment_type VARCHAR (50) NOT NULL,
	card_number VARCHAR (16) NOT NULL,
	security_code INT NOT NULL,
	exp_month smallint NOT NULL,
	exp_year smallint NOT NULL,
	name_on_card VARCHAR (255) NOT NULL
);

CREATE TABLE product (
	product_id SERIAL PRIMARY KEY,
	product_name VARCHAR(50) NOT NULL,
	price int NOT NULL,
	quantity int NOT NULL
);

CREATE TABLE employee (
	employee_id SERIAL PRIMARY KEY,
	username VARCHAR (50) UNIQUE NOT NULL,
	employee_password VARCHAR (50) UNIQUE NOT NULL,
	email VARCHAR (50) UNIQUE NOT NULL,
	first_name VARCHAR (50) NOT NULL,
	last_name VARCHAR (50) NOT NULL,
	phone_number VARCHAR (11) NOT NULL,
	occupation VARCHAR (50) NOT NULL
);

-- EXTRA: Inserting, dropping, and adding tables and/or columns. 
INSERT INTO address (address_st, city, country, postal_code) 
VALUES ('905 N Hargrave St', 'Banning', 'US', '92220');

INSERT INTO customer (first_name, last_name, email, phone_number, address_id)
VALUES ('BOB', 'BOBBY', 'bob.bobby@gmail.com', '9511111111', (SELECT address_id from address));

INSERT INTO payment (payment_type, card_number, security_code, exp_month, exp_year, name_on_card)
VALUES ('VISA', '4242424242424242', '123', '01', '25', 'Bob Bobby');

INSERT INTO product (product_name, price, quantity)
VALUES ('Hot Stone Massage', '120', '1');

INSERT INTO employee (username, employee_password, email, first_name, last_name, phone_number, occupation)
VALUES ('jill.korn', 'jill.korn121', 'jill.korn@gmail.com', 'Jill', 'Korn', '9512222222', 'Therapist');

INSERT INTO customer_order (customer_id, payment_id, product_id)
VALUES ((SELECT customer_id from customer), (SELECT payment_id from payment), (SELECT product_id from product));

-- Optional Commands needed to alter data 
ALTER TABLE customer
DROP COLUMN phone_number;

ALTER TABLE customer
ADD phone_number varchar(11) not null;

ALTER TABLE payment
DROP COLUMN card_number;

ALTER TABLE payment
ADD card_number varchar(16) NOT NULL;

ALTER TABLE employee
DROP COLUMN phone_number;

ALTER TABLE employee
ADD phone_number varchar(11) not null;

-- View Data
SELECT * FROM customer_order;
SELECT * FROM customer;
SELECT * FROM address;
SELECT * FROM payment;
SELECT * FROM product;
SELECT * FROM employee;