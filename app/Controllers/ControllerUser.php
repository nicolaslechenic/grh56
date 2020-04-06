<?php

namespace GRH56\Controllers;
// creating user class with registration signin functions
class ControllerUser
{  
    private $object;

    /* to use for connecting to the model (DRY) */
    public function __construct(){
        $this->object = new \GRH56\Models\UserManager();
    }
    
    // checking if  email exists in the database
     function userRegistrationCheck(){
        // filter removes tags/special characters from array    
       $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            //using email  input for sql request  
            $email = ($_POST['email']);
            $signUpData = $this->object->checkEmailexists($email);
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
            
            $userSignUp = $this->object->userRegister($name, $surname, $email, $password);
            if($userSignUp == true){
                exit ('registred');
            }else{
                exit('Oups! Il y a une erreur....');
            }
    }
    // checkig  on login if user email exists and password correct
    function checkUserLogIn(){
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
    function account(){
        $errors =[
        'name' => '',
        'surname' => '',
        'email' => '',
    ];
        require 'app/views/STUDENT/studentaccount.php';
    }
    // function to update student data
    function accountUpdate(){

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $nameUpdate = $_POST['name'];
        $surnameUpdate = $_POST['surname'];
        $emailUpdate = $_POST['email'];
        $id =  $_SESSION['user'];
        $errors =[
            'name' => '',
            'surname' => '',
            'email' => '',
        ];

        if(empty($nameUpdate)){
            $errors['name'] = 'Prenom manquant !';
            $_SESSION['name'] = '';
        }elseif(!preg_match("/(^[A-Z][a-zà-öø-ÿ]+) ?-?([A-Z][a-zà-öø-ÿ]+)? ?-?([A-Z][a-zà-öø-ÿ]+)?$/",$nameUpdate)) {
            $errors['name'] = "Prenom n'est pas conforme";
            $_SESSION['name'] = '';
        }
        if(empty($surnameUpdate)){
            $errors['surname'] = 'Nom manquant !';
            $_SESSION['surname'] = '';
        }elseif(!preg_match("/(^[A-Z][a-zà-öø-ÿ]+) ?-?([A-Z][a-zà-öø-ÿ]+)? ?-?([A-Z][a-zà-öø-ÿ]+)?$/",$surnameUpdate)) {
            $errors['surname'] = "Nom n'est pas conforme";
            $_SESSION['surname'] = '';
        }
        if(empty($emailUpdate)){
            $errors['email'] = 'Email manquant !';
            $_SESSION['email'] = '';
        }elseif(!filter_var($emailUpdate, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Email n'est pas conforme !";
            $_SESSION['email'] = '';
        }

        if(empty($errors['name']) && empty($errors['surname']) && empty($errors['email'])){
            $userDataUpdate = $this->object->userUpdate($nameUpdate, $surnameUpdate, $emailUpdate, $id); 
            
            if($userDataUpdate == 'true'){   
                require 'app/views/STUDENT/student.php';
                echo "<script type='text/javascript'>alert('Vos données sont modifiées !');</script>";
            }else{ 
            echo ('Oupss....');
            }
        }else{
            require 'app/views/STUDENT/studentaccount.php';
        }
    } 
    // function to change student password
    function changePass(){

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $passwordOld = $_POST['oldPassword'];
        $passwordChange = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $id =  $_SESSION['user'];
        $errorsPass = [ 
            'old_pass' => ' ',
            'new_pass' => ' '
        ];

        if(empty($passwordOld)){
            $errorsPass['old_pass'] = 'Mot de passe manquant !';
        }else{
        
        }

        $changePass = new \GRH56\Models\UserManager();
        $changePassword = $changePass->changePassword($passwordChange, $id); 
        if($changePassword  == 'true'){
           
            require 'app/views/STUDENT/home.php';
            echo "<script type='text/javascript'>alert('Vos données sont modifiées !');</script>";
        }else{
           echo ('Oupss....');
        }
    } 
    function deleteUser(){
        $id =  $_SESSION['user'];
        $delete = new \GRH56\Models\UserManager();
        $deleteUser =  $delete->deleteUser( $id); 
        
        if( $deleteUser  == 'true'){
            unset($_SESSION['user']);
            unset($_SESSION['name']);
            session_destroy();
            require 'app/views/FRONT/home.php';
            echo "<script type='text/javascript'>alert('GOODBYE !');</script>";
        }else{
           echo ('Oupss....');
        }
        
    }
    
      
}  