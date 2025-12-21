CREATE DATABASE IF NOT EXISTS tienda_db;

USE tienda_db;


CREATE TABLE users (
 id INT AUTO_INCREMENT PRIMARY KEY,
 username VARCHAR(80) NOT NULL,
 email VARCHAR(120) NOT NULL UNIQUE,
 password_hash VARCHAR(255) NOT NULL
);

CREATE TABLE products (
 id INT AUTO_INCREMENT PRIMARY KEY,
 product_name VARCHAR(150) NOT NULL,
 price DECIMAL(10, 2) NOT NULL
);

INSERT INTO products (product_name, price) VALUES
('Camiseta', 20),
('Gorra', 15),
('Sudadera', 35);