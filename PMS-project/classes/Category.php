<?php

require_once __DIR__ . '/Database.php';

class Category
{
    public static function createCategory($name)
    {
        $db = new Database;
        $sql = "INSERT INTO `categories` (`name`) VALUES ('$name')";
        $db->makeQuery($sql);
    }

    public static function getAllCategories()
    {
        $db = new Database;
        $sql = "SELECT * FROM categories ORDER BY id";
        $data = $db->makeQuery($sql);
        $categories = $data->fetch_all(MYSQLI_ASSOC);
        return $categories;
    }

    public static function getOneCategory($id)
    {
        $db = new Database;
        $sql = "SELECT * FROM `categories`  WHERE `id` = '$id' ";
        $data = $db->makeQuery($sql);
        $categories = mysqli_fetch_assoc($data);
        return $categories;
    }

    public static function editCategory($id,$name)
    {
        $db = new Database;
        $sql = "UPDATE categories SET `name`='$name' WHERE `id`='$id' ";
        $db->makeQuery($sql);
    }

    public static function deleteCategory($id)
    {
        $db = new Database;
        $sql = "DELETE FROM `categories`  WHERE `id` = '$id' ";
        $db->makeQuery($sql);
    }
}
