<?php 
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'javajam';

@ $db = new mysqli($servername, $username, $password, $dbname);

$init = ("CREATE TABLE IF NOT EXISTS coffee_prices (
    id INT PRIMARY KEY,
    coffee_name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL);"
);

$db->query($init);

$init = ("CREATE TABLE IF NOT EXISTS customer_orders (
    num INT AUTO_INCREMENT,
    customer_order_id BIGINT,
    -- customer_order_id VARCHAR(255),
    id INT,
    price DECIMAL(10,2),
    quantity INT,
    subtotal DECIMAL(10,2),
    PRIMARY KEY (num)
    );"
);

$db->query($init)


?>