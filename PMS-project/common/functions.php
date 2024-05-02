<?php
session_start();

define('URL', 'http://' . $_SERVER['HTTP_HOST'] . '/Group-320/task-10\project/');


function route($path = '')
{
    return URL . $path;
}


function redirect($path)
{
    header('Location: ' . route($path));
}

