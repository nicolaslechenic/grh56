<?php
//Demarre la session
session_start();

//autoload.php genere avec composer
require_once __DIR__. '/vendor/autoload.php';

// displaying  specific view or catching errors
try{
    $controllerFront = new \GRH56\Controllers\ControllerFront(); //creating object controllerFront
    $controllerUser = new \GRH56\Controllers\ControllerUser();
    

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
        if($_GET['action'] && !isset($_SESSION['name']) != '1'){
            throw new Exception("You are not loged in");
        }
        // if($_GET['action'] == 'lessons' && !isset($_SESSION['name'])){
        //     die ('error');
        // }
        //check if usser logged in then send to user page
    // }elseif(isset($_SESSION['user'])){
    //     $controllerUser -> logedIn();
    //check if we typed ?/admin
    }elseif($_SERVER['QUERY_STRING'] == 'admin'){
        $controllerUser -> admin();
    // //check if AJAX request
    // elseif(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    //     require 'indexUser.php';
    // } 
    }
    else{
        $controllerFront -> home();
    }
}catch(Exception $e){
    echo ($e->getMessage());
}


