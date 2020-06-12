<?php
//Demarre la session
session_start();

//autoload.php genere avec composer
require_once __DIR__. '/vendor/autoload.php';

if (file_exists(__DIR__ . '/.env')) {
    $dotenv = \Dotenv\Dotenv::create(__DIR__);
    $dotenv->load();
}

// only report errors, warnings and compile-time parse errors and not notices
error_reporting(E_ERROR | E_WARNING | E_PARSE);
// displaying  specific view or catching errors



try{
    $controllerFront = new \Grh\controllers\ControllerFront(); //creating object controllerFront
    $controllerUser = new \Grh\controllers\ControllerUser();


    // HAVE TO CREATE FUNCTION TO REPLACE CODE REPETITION FOR LOGGED IN USER AND TO MANAGE NON EXISTANT ACTION INPUT (SEE TEST.PHP or (MIGHT USE IN ARRAY())
    // if(isset($_GET['action']) && !isset($_SESSION['name'])) {
    //     $controllerFront -> home();}
    if(isset($_GET['action'])){
        if($_GET['action'] == '') {
            $controllerFront -> home();
        }
        elseif($_GET['action'] == 'contact'){
            $controllerFront -> contactForm();
        }elseif($_GET['action'] == 'about'){
            $controllerFront -> about();
        }elseif($_GET['action'] == 'courses'){
            $controllerFront -> courses();
        }elseif($_GET['action'] == 'home'){
            $controllerFront -> home();
        }elseif($_GET['action'] == 'logout'){
            $controllerUser -> logOut();
        }elseif($_GET['action'] == 'student'){
            $controllerUser -> logedIn();
        }elseif($_GET['action'] == 'account'){
            $controllerUser -> account();
        }elseif($_GET['action'] == 'modif' && isset($_SESSION['name'])){
            $controllerUser -> accountUpdate();
        }elseif($_GET['action'] == 'modif_pass' && isset($_SESSION['name'])){
            $controllerUser -> changePass();
        }elseif($_GET['action'] == 'delete' && isset($_SESSION['name'])){
            $controllerUser -> deleteUser();
        }elseif($_GET['action'] == 'checkemail'){
            $controllerUser -> checkEmailExists();
        }elseif($_GET['action'] == 'send'){
            $controllerFront -> sendMessage();
        }elseif($_SERVER['QUERY_STRING'] == 'admin' && isset($_SESSION['name'])){
            $controllerUser -> admin(); 
        }elseif($_GET['action'] == 'about_cookies'){
            $controllerFront -> aboutCookies(); 
        } 
    }else{    
        echo("no-action");
        die();
        $controllerFront -> home();
    }

// ---TODO--- create log file to errors.
}catch(Exception $e){
    //$controllerFront -> error();
    // var_dump($e);
    echo("error");
    die();
    require 'app/views/FRONT/error.php';
}catch(Error $e){
    // var_dump($e);
    echo("error-2");
    die();
    require 'app/views/FRONT/error.php';
}


