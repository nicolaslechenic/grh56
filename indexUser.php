<?php
 session_start();
require_once __DIR__. '/vendor/autoload.php';

if (file_exists(__DIR__ . '/.env')) {
    $dotenv = \Dotenv\Dotenv::create(__DIR__);
    $dotenv->load();
}

try{
    $controllerUser = new \Grh\controllers\ControllerUser(); //creating object controllerUser for login verification
    
    if(isset($_POST['signin'])){
    $controllerUser -> checkUserLogIn();
    }elseif(isset($_POST['signup'])){
        $controllerUser -> userRegistrationCheck();
    }
   

}catch(Exception $e){
    
}