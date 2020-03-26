<?php
require_once __DIR__. '/vendor/autoload.php';
try{
    $controllerLogin = new \GRH56\Controllers\ControllerUserLogin(); //creating object controllerLogin
    $controllerLogin -> logIn();
}catch(Exception $e){
    
}