<?php
session_start();
require_once __DIR__. '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


try{
    $controllerUser = new \Grh\controllers\ControllerUser(); //creating object controllerUser for registration 
    $controllerUser -> signUp();
}catch(Exception $e){
    
}