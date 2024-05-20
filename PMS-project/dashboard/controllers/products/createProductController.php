<?php

require_once __DIR__ . '/../../../classes/Database.php';
require_once __DIR__ . '/../../../classes/Product.php';
require_once __DIR__ . '/../../../classes/Session.php';
require_once __DIR__ . '/../../../classes/Validation.php';
require_once __DIR__ . '/../../../common/functions.php';


$validator = new Validation;

foreach ($_POST as $key => $value) {
    $$key =$value ;
}


// Validtion For Name
$validator->requiredValidation('name', $name)->maxValidation('name', $name, 5)->minValidation('name', $name, 20);

// Validtion For Price
$validator->requiredValidation('price', $price);

// Validtion For Description
$validator->requiredValidation('description', $description)->maxValidation('description', $description, 10)->minValidation('description', $description, 30);

// Validtion For category
$validator->existsValidate('categories', 'id', $_POST['category_id']);


// Exixst Error
if (!empty($validator->error)) {
    Session::setSession('errors', $validator->error);
    redirect('dashboard/products/create.php');
    die();
}

// No Error
Session::setSession('success', 'Product Created Successfully');
Product::createProduct($name,$price,$description,$category_id);
redirect('dashboard/products/index.php');