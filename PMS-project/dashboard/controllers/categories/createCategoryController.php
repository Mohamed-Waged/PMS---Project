<?php

require_once __DIR__ . '/../../../classes/Database.php';
require_once __DIR__ . '/../../../classes/Category.php';
require_once __DIR__ . '/../../../classes/Session.php';
require_once __DIR__ . '/../../../classes/Validation.php';
require_once __DIR__ . '/../../../common/functions.php';


$nameInput = $_POST['name'];

$validator = new Validation;

$validator->requiredValidation('name', $nameInput)->maxValidation('name', $nameInput, 5)->minValidation('name', $nameInput, 20);

if (!is_null($validator->error)) {
    Session::setSession('errors', $validator->error);
    redirect('dashboard/categories/create.php');
    die();
}

Category::createCategory($nameInput);
Session::setSession('success', 'Category created successfully');
redirect('dashboard/categories/create.php');