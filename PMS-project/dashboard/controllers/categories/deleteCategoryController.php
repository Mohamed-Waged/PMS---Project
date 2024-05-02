<?php

require_once __DIR__.'/../../../classes/Category.php';
require_once __DIR__.'/../../../classes/Session.php';
require_once __DIR__.'/../../../common/functions.php'; 

if(isset($_GET['id'])){
    $categories = Category::getOneCategory($_GET['id']);
    if(!$categories){
        Session::setSession('errors', "Category Not Found !");
        redirect('dashboard/categories/index.php');
        die;
    }else{
        $categories = Category::deleteCategory($_GET['id']);
        Session::setSession('success', "Category Deleted Succfully !");
        redirect('dashboard/categories/index.php');
        die;
    }
}