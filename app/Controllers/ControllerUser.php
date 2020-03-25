<?php

namespace GRH56\Controllers;
// creating user class with registration signin functions
class ControllerUser
{
    // function userRegistration(){
    //     //for security cleaning received data
    //     $_POST = \filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    //     //data received from registration form
    //     $userRegData =[
    //     'name' => trim($_POST['name']),
    //     'surname' => trim($_POST['surname']),
    //     'email' => trim($_POST['email']),
    //     'password' => trim($_POST['password']),
    //     'confirm_password' => trim($_POST['confirm_password']),
    //     ];


    //     require 'app/views/FRONT/student.php';
    // }
    function userLogin(){
        if (isset($_POST['data'])){
            // escape special characters
            $email = htmlspecialchars($_POST['emailAjax']);
            $password = $_POST['passwordAjax'];
        //using email  and password inputs for sql request  
        $userLogIn = new \GRH56\Models\UserManager();
        $loginData = $userLogIn->checkUser($email, $password);
        
        // checking response from model and displaying corresponding message
            if(count($loginData) > 0){
                exit ('ok');
                
            }else{
                exit('Email or password is wrong');
            }

        }
        
        //require 'app/views/FRONT/student.php';
    }
}  