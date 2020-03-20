<?php
// important pour la  sécurité de vos scripts : le sessions
//Demarre la session
session_start();

//autoload.php genere avec composer
require_once __DIR__. '/vendor/autoload.php';


// catchin errors and displaying them in specific view
try{
    $controllerFront = new \GRH56\Controllers\ControllerFront(); //objet controller
    if(isset($_GET['action'])) {
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
        

    }else{
        $controllerFront -> home();
    }



}catch(Exception $e){

}


