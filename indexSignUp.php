<?php
require_once __DIR__. '/vendor/autoload.php';
try{
    $controllerUserRegistration = new \GRH56\Controllers\ControllerUser(); //creating object controllerUser for registration 
    $controllerUserRegistration -> signUp();
}catch(Exception $e){
    
}