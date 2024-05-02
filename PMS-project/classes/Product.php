<?php

require_once __DIR__ . '/Database.php';

class Product
{
    public static function createProduct($name, $price, $description, $category_id)
    {
        $db = new Database;
    
        $sql = "INSERT INTO `products` (`name`, `description`, `price`, `category_id`) VALUES ('$name', '$description', '$price', '$category_id')";
    
        $db->makeQuery($sql);
    }
    
    public static function getAllProducts() 
    {
        $db = new Database;
    
        //  انا عايز كل حاجه من المنتجات وكل حاجه من التصنيفات ونعمل دمج بين الاتنين عن طريق ال category _id
        $sql = "SELECT products.*, categories.name AS category_name
        FROM products
        INNER JOIN categories ON products.category_id = categories.id
        ORDER BY id
        ";
    
        $data = $db->makeQuery($sql);
    
        $products = $data->fetch_all(MYSQLI_ASSOC);
    
        return $products;
    }
    
    public static function getOneProduct($id)
    {
        $db = new Database;
        $sql = "SELECT * FROM `products`  WHERE `id` = '$id' ";
        $data = $db->makeQuery($sql);
        $products = mysqli_fetch_assoc($data);
        return $products;
    }

    public static function getAllProductsTesting($category_id = null)
    {
        $db = new Database;
    
        $sql = "SELECT products.*, categories.name AS category_name
        FROM products
        INNER JOIN categories ON products.category_id = categories.id
        ";
    
    
        if ($category_id) {
            $sql .= " WHERE products.category_id = $category_id";
        }

        $data = $db->makeQuery($sql);
    
        $products = $data->fetch_all(MYSQLI_ASSOC);
    
        return $products;
    }

    
    public static function editProduct($id,$name, $price, $description, $category_id)
    {
        $db = new Database;
        $sql = "UPDATE products SET `name`='$name', `price`='$price', `description`='$description', `category_id`='$category_id' WHERE `id`='$id' ";
        $db->makeQuery($sql);
    }

    public static function deleteProduct($id)
    {
        $db = new Database;
        $sql = "DELETE FROM `products`  WHERE `id` = '$id' ";
        $db->makeQuery($sql);
    }
}
