<?php
session_start();
require_once __DIR__. '/vendor/autoload.php';
 
try{
     $controllerAdmin = new \GRH56\Controllers\ControllerAdmin(); //createing object controllerAdmin
    // $controllerAdmin -> admin();
    if(isset($_GET['action']) && isset($_SESSION['name']) && $_SESSION['status'] == '1')  {
        
        if($_GET['action'] == 'lessons'){
            $controllerAdmin -> lessons();
           
        }
    }

}catch(Exception $e){
 
} 

 