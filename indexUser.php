<?php
 session_start();
require_once __DIR__. '/vendor/autoload.php';
try{
    $controllerUser = new \Grh\Controllers\ControllerUser(); //creating object controllerUser for login verification
    
    if(isset($_POST['signin'])){
    $controllerUser -> checkUserLogIn();
    }elseif(isset($_POST['signup'])){
        $controllerUser -> userRegistrationCheck();
    }
   

}catch(Exception $e){
    
}