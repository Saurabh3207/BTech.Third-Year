-- Active: 1696744412170@@127.0.0.1@3306@registerform
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(10) NOT NULL,
    password VARCHAR(255) NOT NULL
);

SELECT * FROM users;
```