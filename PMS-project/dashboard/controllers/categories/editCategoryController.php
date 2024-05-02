<?php

require_once __DIR__ . '/../../../classes/Database.php';
require_once __DIR__ . '/../../../classes/Category.php';
require_once __DIR__ . '/../../../classes/Session.php';
require_once __DIR__ . '/../../../classes/Validation.php';
require_once __DIR__ . '/../../../common/functions.php';

$id = $_GET['id'];
$name = $_POST['name'];


$validator = new Validation;

$validator->requiredValidation('name', $name);
$validator->maxValidation('name', $name, 5);
$validator->minValidation('name', $name, 20);

if (!is_null($validator->error)) {
    Session::setSession('errors', $validator->error);
    redirect("dashboard/categories/edit.php?id=$id");
    die();
}

$categories = Category::editCategory($id, $name);
Session::setSession('success', "Category Updated Sussefully !");
redirect('dashboard/categories/index.php');
