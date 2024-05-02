<?php 


$user_name = 'root';
$password = '';
$localhost = 'localhost';
$database = 'pms';

$conn = new mysqli($localhost, $user_name, $password, $database);

$sql = 'CREATE TABLE IF NOT EXISTS `categories`(
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
)';
$conn->query($sql);
$conn->close();