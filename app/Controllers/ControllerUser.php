<?php

namespace GRH56\Controllers;
// creating user class with registration signin functions
class ControllerUser
{  
    private $object;
    public $errors;
    public $errorsPass;

    /* to use for connecting to the model (DRY) */
    public function __construct(){
        $this->object = new \GRH56\Models\UserManager();
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
    // functin to redirect to the homepage
    public function mainPage(){
        $controllerFront = new \GRH56\Controllers\ControllerFront();
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
            $loginData = $this->object->checkLogIn($email, $password);         
            // checking response from model(if there is any data in the array) 
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
    //if function checkUser sends true, then gooing to student page or admin page depending on $_SESSION['status]
    function logedIn(){  
        if(isset($_SESSION['name']) && $_SESSION['status'] == '0'){
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
        $controllerFront = new \GRH56\Controllers\ControllerFront();
        $controllerFront -> home();
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
                require 'app/views/STUDENT/student.php';
                echo "<script type='text/javascript'>alert('Vos données sont modifiées !');</script>";
            }else{ 
            echo ('Oupss....');
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
                    require 'app/views/STUDENT/student.php';
                    echo "<script type='text/javascript'>alert('Vos données sont modifiées !');</script>";
                }else{
                    echo ('Oupss....1');
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
        if($deleteUser  == true){
           
            unset($_SESSION['user']);
            unset($_SESSION['name']);
            session_destroy();
            $controllerFront = new \GRH56\Controllers\ControllerFront();
            $controllerFront -> home();
            echo "<script type='text/javascript'>alert('GOODBYE !');</script>";
        }else{
           echo ('Oupss....');
        }
        
    }
    function admin(){
        if(isset($_SESSION['name'])){
            require 'app/views/BACK/admin.php';
        }else{
           $this->mainPage();
        }
    }

    // function api(){
    //     $request = new HttpRequest();
    //     $request->setUrl('https://od-api.oxforddictionaries.com/api/v2/entries/en-gb/word');
    //     $request->setMethod(HTTP_METH_GET);

    // $request->setHeaders(array(
    //   'postman-token' => 'a6ea9e58-c0e0-0f4e-f397-ddba4c69ee80',
    //   'cache-control' => 'no-cache',
    //   'app_key' => '09309458c4b76c5d889b92c344a21f05',
    //   'app_id' => 'd9730fd0'
    // ));

    // try {
    //   $response = $request->send();
    //     die ($response);
    //   echo $response->getBody();
    // } catch (HttpException $ex) {
    //   echo $ex;
    // }
    // }
    
      
}  