<?php

namespace GRH56\Controllers;
// creating user class with registration signin functions
class ControllerUser
{       // checking if  email exists in the database
     function userRegistrationCheck(){
        // filter removes tags/special characters from array    
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
    }
    // registring new user(adding a row into Database)
    function signUp(){
        // filter removes tags/special characters from array    
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
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
    // checkig  on login if user email exists and password correct
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
                exit("ok");
            }else{
                exit('Votre identifiant ou mot de passe est incorrect.');
            }

        }
        
    }
    //if function checkUser sends true, then gooing to student page
    function logedIn(){  
        require 'app/views/STUDENT/student.php';

    } 
    // on logout destroying session
    function logOut(){
        unset($_SESSION['user']);
        unset($_SESSION['name']);
        session_destroy();
        $controllerFront = new \GRH56\Controllers\ControllerFront();
        $controllerFront -> home();
    }    
}  