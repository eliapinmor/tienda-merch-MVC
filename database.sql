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
 description TEXT,
 price DECIMAL(10, 2) NOT NULL
);

CREATE TABLE product_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

INSERT INTO products (product_name, description, price) VALUES
('CD First Album', 'Primer álbum de estudio', 20),
('Gorra', 'Gorra de algodón', 15),
('Sudadera', 'Sudadera con capucha', 35);

INSERT INTO product_images (product_id, image_path) VALUES
(1, 'images/cd_first_album.jpg'),
(2, 'images/gorra.jpg'),
(3, 'images/sudadera.jpg');