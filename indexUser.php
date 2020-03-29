<?php
require_once __DIR__. '/vendor/autoload.php';
try{
    $controllerUser = new \GRH56\Controllers\ControllerUser(); //creating object controllerUser for login verification
    $controllerUser -> userRegistrationCheck();
    
   

}catch(Exception $e){
    
}