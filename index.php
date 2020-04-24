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
    

    // HAVE TO CREATE FUNCTION TO REPLACE CODE REPETITION FOR LOGGED IN USER AND TO MANAGE NON EXISTANT ACTION INPUT (SEE TEST.PHP or (MIGHT USE IN ARRAY())
    // if(isset($_GET['action']) && !isset($_SESSION['name'])) {
    //     $controllerFront -> home();}
    if(isset($_GET['action'])){
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
        if($_GET['action'] == 'logout' && isset($_SESSION['name'])){
            $controllerUser -> logOut();
        }
        if($_GET['action'] == 'student' && isset($_SESSION['name'])){
            var_dump($_SESSION['here']);
            $controllerUser -> logedIn();
        }
        if($_GET['action'] == 'account' && isset($_SESSION['name'])){
            $controllerUser -> account();
        }
        if($_GET['action'] == 'modif' && isset($_SESSION['name'])){
            $controllerUser -> accountUpdate();
        }
        if($_GET['action'] == 'modif_pass' && isset($_SESSION['name'])){
            $controllerUser -> changePass();
        }
        if($_GET['action'] == 'delete' && isset($_SESSION['name'])){
            $controllerUser -> deleteUser();
        }
        if($_GET['action'] == 'checkemail'){
            $controllerUser -> checkEmailExists();
        }
        if($_GET['action'] == 'send'){
            $controllerFront -> sendMessage();
        }
        if($_SERVER['QUERY_STRING'] == 'admin' && isset($_SESSION['name'])){
            $controllerUser -> admin(); 
        }    
    }else{
        $controllerFront -> home();
    }
}catch(Exception $e){
    
}


