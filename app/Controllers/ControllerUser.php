<?php

namespace GRH56\Controllers;
// creating user class with registration signin functions
class ControllerUser extends ControllerFront
{
    function userRegistration(){
        //for security cleaning received data
        $_POST = \filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //data received from registration form
        $userRegData =[
        'name' => trim($_POST['name']),
        'surname' => trim($_POST['surname']),
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),
        ];


        require 'app/views/FRONT/student.php';
    }
    function userLogin(){


        require 'app/views/FRONT/student.php';
    }
}  