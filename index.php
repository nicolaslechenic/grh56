<?php
// important pour la  sécurité de vos scripts : le sessions
//Demarre la session
session_start();

//autoload.php genere avec composer
require_once __DIR__. '/vendor/autoload.php';


// displaying  specific view or catching errors
try{
    $controllerFront = new \GRH56\Controllers\ControllerFront(); //object controllerFront
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
        // if($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['action'] == 'register'){
        //     $controllerUser -> userRegistration();
        // }
        // if($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['action'] == 'login'){
        //     $controllerUser -> userLogin();
        // }
        //check if we typed ?/admin
    }elseif($_SERVER['QUERY_STRING'] == '/admin'){
        require 'indexAdmin.php';
    }
    //check if AJAX request
    elseif(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
        require 'indexUser.php';
    } 
    else{
        $controllerFront -> home();
    }



}catch(Exception $e){

}


