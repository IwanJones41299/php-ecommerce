CREATE DATABASE ecom_db;

CREATE TABLE categories(
    cat_id INT  IDENTITY PRIMARY KEY,
    cat_title VARCHAR(255) 
)

INSERT INTO categories(cat_title) VALUES ("example 1");
INSERT INTO categories(cat_title) VALUES ("example 2");

CREATE TABLE products(
    product_id INT IDENTITY PRIMARY KEY,
    product_title VARCHAR(255),
    product_category_id INT,
    product_price FLOAT,
    product_description VARCHAR(255),
    product_image VARCHAR(255)
)

INSERT INTO products(product_title, product_category_id, product_price, product_description, product_image) VALUES ("product 1", "1", 24.99, "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.", "http://placehold.it/320x150");
INSERT INTO products(product_title, product_category_id, product_price, product_description, product_image) VALUES ("product 2", "2", 29.99, "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.", "http://placehold.it/320x150");

INSERT INTO products(product_title, product_category_id, product_price, product_description, product_image) VALUES ("product 3", "3", 14.99, "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.", "http://placehold.it/320x150");

INSERT INTO products(product_title, product_category_id, product_price, product_description, product_image) VALUES ("product 4", "4", 17.99, "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.", "http://placehold.it/320x150");

CREATE TABLE users(
    user_id INT IDENTITY PRIMARY KEY,
    username VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(50)
)

INSERT INTO users(username, email) VALUES ("IwanJones412", "iwanjones41299@gmail.com");

CREATE TABLE orders(
    order_id INT IDENTITY PRIMARY KEY,
    order_amount FLOAT (30),
    order_transaction VARCHAR(50),
    order_status VARCHAR(50),
    order_currency VARCHAR(50)
)