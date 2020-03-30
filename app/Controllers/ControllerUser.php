<?php

namespace GRH56\Controllers;
// creating user class with registration signin functions
class ControllerUser
{       // checking if  email exists in the database
     function userRegistrationCheck(){
        //for security - cleaning received data
       $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            //using email  input for sql request  
            $email = ($_POST['email']);
            $userSignUp = new \GRH56\Models\UserManager();
            $signUpData = $userSignUp->checkEmailexists($email);
             //checking response from model(if there is any data in the array) 
            if(count($signUpData) > 0){
                exit("Cette adresse e-mail est déjà utilisée ");
            }else{
                exit("ok");
            }
        }else{
            require 'app/views/STUDENT/student.php';

    }
    function signUp(){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);// filter removes tags/special characters from array     
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $userSignUpObj = new \GRH56\Models\UserManager();
            $userSignUp = $userSignUpObj->userRegister($name, $surname, $email, $password);
    
            if($userSignUp == true){
                exit ('registred');
            }else{
                exit('Oups! Il y a une erreur....');
            }
         }
    function checkUser(){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($_POST['signin'])){
            // escape special characters
            $email =$_POST['email'];
            $password = $_POST['password'];
            
            //using email  and password inputs for sql request  
            $userLogIn = new \GRH56\Models\UserManager();
            $loginData = $userLogIn->checkLogIn($email, $password);         
    
            // checking response from model(if there is any data in the array) 
            if($loginData == true){
                $_SESSION['connected'] = '1';
                $_SESSION['email'] = $email;
                exit("ok");
                
            }else{
                print_r($loginData);
                exit('Votre identifiant ou mot de passe est incorrect.');
            }

        }
        
    }
    function logIn(){  
        require 'app/views/STUDENT/student.php';

    }
    function logOut(){
        unset($_SESSION['connected']);
        session_destroy();
        $controllerFront = new \GRH56\Controllers\ControllerFront();
        $controllerFront -> home();
    }
    
}  