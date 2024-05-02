<?php

require_once __DIR__.'/../../../classes/Product.php';
require_once __DIR__.'/../../../classes/Session.php';
require_once __DIR__.'/../../../common/functions.php'; 

if(isset($_GET['id'])){
    $products = Product::getOneProduct($_GET['id']);
    if(!$products){
        Session::setSession('errors', "Product Not Found !");
        redirect('dashboard/products/index.php');
        die;
    }else{
        $products = Product::deleteProduct($_GET['id']);
        Session::setSession('success', "Product Deleted Succfully !");
        redirect('dashboard/products/index.php');
        die;
    }
}