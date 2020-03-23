<?php
// important pour la  sécurité de vos scripts : le sessions
//Demarre la session
session_start();

//autoload.php genere avec composer
require_once __DIR__. '/vendor/autoload.php';


// catching errors and displaying them in specific view
try{
    $controllerFront = new \GRH56\Controllers\ControllerFront(); //object controllerFront
    $controllerBack = new \GRH56\Controllers\ControllerBack(); //object controllerBack
    $controllerUserReg = new \GRH56\Controllers\ControllerUserReg(); //object controllerUserReg
    if(isset($_GET['action']))  {
        if($_GET['action'] == 'contact'){
            $controllerFront -> contactForm();
        }
        if($_GET['action'] == 'about'){
            $controllerFront -> about();
        }
        if($_GET['action'] == 'courses'){
            $controllerFront -> courses();
        }
        if($_GET['action'] == 'home'){
            $controllerFront -> home();
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['action'] == 'register'){
            $controllerUserReg -> userRegistration();
        }
    }elseif($_SERVER['QUERY_STRING'] == '/admin'){
        $controllerBack -> admin();
    }
    else{
        $controllerFront -> home();
    }



}catch(Exception $e){

}


