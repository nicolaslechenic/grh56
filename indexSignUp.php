<?php
session_start();
require_once __DIR__. '/vendor/autoload.php';
try{
    $controllerUser = new \GRH56\Controllers\ControllerUser(); //creating object controllerUser for registration 
    $controllerUser -> signUp();
}catch(Exception $e){
    
}