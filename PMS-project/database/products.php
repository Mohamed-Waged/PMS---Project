<?php 


$user_name = 'root';
$password = '';
$localhost = 'localhost';
$database = 'pms';

$conn = new mysqli($localhost, $user_name, $password, $database);

$sql = 'CREATE TABLE IF NOT EXISTS `products`(
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price FLOAT NOT NULL,
    category_id INT(6),

    FOREIGN KEY (category_id) REFERENCES categories(id)
)';
$conn->query($sql);
$conn->close();