<?php
//Demarre la session
session_start();

//autoload.php genere avec composer
require_once __DIR__. '/vendor/autoload.php';
// only report errors, warnings and compile-time parse errors and not notices
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// displaying  specific view or catching errors
try{
    $controllerFront = new \GRH56\Controllers\ControllerFront(); //creating object controllerFront
    $controllerUser = new \GRH56\Controllers\ControllerUser();
    

    if(isset($_GET['action']) && !isset($_SESSION['name'])) {
        $controllerFront -> home();
    }elseif(isset($_GET['action'])){
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
        if($_GET['action'] == 'logout'){
            $controllerUser -> logOut();
        }
        if($_GET['action'] == 'student'){
            $controllerUser -> logedIn();
        }
        if($_GET['action'] == 'account'){
            $controllerUser -> account();
        }
        if($_GET['action'] == 'modif'){
            $controllerUser -> accountUpdate();
        }
        if($_GET['action'] == 'modif_pass'){
            $controllerUser -> changePass();
        }
        if($_GET['action'] == 'delete'){
            $controllerUser -> deleteUser();
        }
        if($_GET['action'] == 'checkemail'){
            $controllerUser -> checkEmailExists();
        }
        if($_GET['action'] == 'send'){
            $controllerFront -> sendMessage();
        }
        if($_SERVER['QUERY_STRING'] == 'admin'){
            $controllerUser -> admin(); 
        }    
    }else{
        $controllerFront -> home();
    }
}catch(Exception $e){
    
}


