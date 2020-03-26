<?php

namespace GRH56\Controllers;

class ControllerUserLogin {

    function logIn(){       
        require 'app/views/STUDENT/student.php';
    }
    function logOut(){
        unset($_SESSION['connected']);
        session_destroy();
        echo('ok');
        $controllerFront = new \GRH56\Controllers\ControllerFront();
        $controllerFront -> home();
    }
}