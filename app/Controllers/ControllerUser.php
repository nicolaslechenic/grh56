<?php

namespace Grh\Controllers;
// creating user class with registration signin functions
class ControllerUser
{  
    private $object;
    public $errors;
    public $errorsPass;

    // connecting to the model and creating arrays for errors display
    function __construct(){
        $this->object = new \Grh\Models\UserManager();
        $this->errors = [
            'name' => '',
            'surname' => '',
            'email' => '',
        ];
        $this->errorsPass = [ 
            'old_pass' => '',
            'new_pass' => ''
        ];
    }
    function error(){
        require 'app/views/FRONT/error.php';
    }

    // functin to redirect to the homepage through controllerFront to load lessons from the database
    public function mainPage(){
        $controllerFront = new \Grh\Controllers\ControllerFront();
        $controllerFront -> home();
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
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            
            //sending user details to the database
            $userSignUp = $this->object->userRegister($name, $surname, $email, $password);
            if($userSignUp == 'true'){
                exit('registred');
            }else{
                throw new \Exception("error");
            }
    }
    // checking  on login if user email exists and password correct
    function checkUserLogIn(){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($_POST['signin'])){
            $email =$_POST['email'];
            $password = $_POST['password'];

            //using email  and password inputs for an sql request  
            $loginData = $this->object->checkLogIn($email, $password); 
            //checking if user is an admin or student       
            if($loginData === "user"){
                exit("user");
            }elseif($loginData === "admin"){
                exit("admin");
            }
            else{
                exit('Votre identifiant ou mot de passe est incorrect.');
            }
        }        
    }

    //if checkUser sends true, then gooing to student page or admin page depending on $_SESSION['status]
    function logedIn(){  
        if(isset($_SESSION['name']) && $_SESSION['status'] == '0'){
            $lod = $this->object->latestLesson();
            require 'app/views/STUDENT/student.php';
        }elseif(isset($_SESSION['name']) && $_SESSION['status'] == '1'){
            require 'app/views/BACK/admin.php';
        }else{
            $this->mainPage();
        }
    }
    
    // on logout destroying session
    function logOut(){
        unset($_SESSION['user']);
        unset($_SESSION['name']);
        session_destroy();
        $this->mainPage();
    }
    function account(){
        $errors = $this->errors;
        $errorsPass =$this->errorsPass;
        if(isset($_SESSION['name'])){
            require 'app/views/STUDENT/studentaccount.php';
        }else{
            $this->mainPage();
        }
    }
    // function to update student data
    function accountUpdate(){

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $nameUpdate = $_POST['name'];
        $surnameUpdate = $_POST['surname'];
        $emailUpdate = $_POST['email'];
        $id =  $_SESSION['user'];
        $errors = $this->errors;
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
                $show = "show";
                $message = "Le changement a bien été pris en compte !";
                require 'app/views/STUDENT/student.php';
            }else{ 
            throw new \Exception("update failed");
            }
        }else{
            $errorsPass =$this->errorsPass;
            if(isset($_SESSION['name'])){
                require 'app/views/STUDENT/studentaccount.php';
            }else{
                $this->mainPage();
            }
        }
    } 
    // function to change student password (checking if old password corresponds to db data and only than changing to new password)
    function changePass(){

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $password= $_POST['old_password'];
        $newPass = $_POST['new_password'];
        $email = $_SESSION['email'];
        $newPasswordHash = password_hash($newPass, PASSWORD_DEFAULT);
        $errorsPass =$this->errorsPass;
        $errors = $this->errors;
        if(empty($password)){
            $errorsPass['old_pass'] = 'Mot de passe manquant !';
        }else{
            $checkPassword = $this->object->checkLogIn($email, $password);
            if($checkPassword == true){
                $errorsPass['old_pass'] = '';
            }else{
                $errorsPass['old_pass'] = 'Mot de passe incorrect!';
            }      
        }
        if(empty($newPass)){
            $errorsPass['new_pass'] = 'Mot de passe manquant !';
        }elseif(!preg_match('/^(?=.*\d)(?=.*[a-zà-öø-ÿ])(?=.*[A-Z]).{6,}$/', $newPass)){   
            $errorsPass['new_pass'] = "Mot de passe n'est pas conforme !";   
        }
        if(empty($errorsPass['old_pass']) && empty($errorsPass['new_pass'])){                
            $newPassword = $this->object->changePassword($newPasswordHash, $email);
                if($newPassword == true){
                    $show = "show";
                    $message = "Le changement a bien été pris en compte !";
                    require 'app/views/STUDENT/student.php';
                }else{
                    throw new \Exception("update failed");
                }
        }else{
            if(isset($_SESSION['name'])){
                require 'app/views/STUDENT/studentaccount.php';
            }else{
                $this->mainPage();
            }
        }
    }
    
    function deleteUser(){
        $id =  $_SESSION['user'];
        $deleteUser = $this->object->deleteUser( $id); 
        //clears SESSION data and destroys all data registered to a session
        if($deleteUser  == true){
            $_SESSION = array();
            session_destroy();
            $controllerFront = new \Grh\Controllers\ControllerFront();
            $controllerFront -> home();
        }else{
            throw new \Exception("deleteUser failed");
        }
        
    }
    
    function admin(){
        if(isset($_SESSION['name'])){
            require 'app/views/BACK/admin.php';
        }else{
           $this->mainPage();
        }
    }
      
}  