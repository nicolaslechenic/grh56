<?php
session_start();
require_once __DIR__. '/vendor/autoload.php';

if (file_exists(__DIR__ . '/.env')) {
    $dotenv = \Dotenv\Dotenv::create(__DIR__);
    $dotenv->load();
}

try{
    $controllerUser = new \Grh\controllers\ControllerUser(); //creating object controllerUser for registration 
    $controllerUser -> signUp();
}catch(Exception $e){
    
}