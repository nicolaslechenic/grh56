<?php
try{
    $controllerUser = new \GRH56\Controllers\ControllerUserCheck(); //creating object controllerUser
    $controllerUser -> checkUser();
}catch(Exception $e){
    
}