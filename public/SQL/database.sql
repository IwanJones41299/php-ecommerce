CREATE DATABASE ecom_db;

CREATE TABLE categories(
    cat_id INT  IDENTITY PRIMARY KEY,
    cat_title VARCHAR(255) 
)

INSERT INTO categories(cat_title) VALUES ("example 1");
INSERT INTO categories(cat_title) VALUES ("example 2");