<?php
 namespace GRH56\Models;

 class UserManager extends Manager
 {     
     public function checkLogIn($email, $password){
        $bdd = $this->dbConnect();
        $loginData = $bdd->prepare('SELECT pass FROM users WHERE email=?' );
        $loginData->execute(array($email));
        $loginData = $loginData->fetch()[0];
        if(password_verify($password,$loginData)){
         return true;
        }else{
         return false;
        }
        
     }
     public function checkEmailexists($email){
        $bdd = $this->dbConnect();
        $signUpData = $bdd->prepare('SELECT id_student FROM users WHERE email=?' );
        $signUpData->execute(array($email));
        $signUpData = $signUpData->fetchAll();
        return $signUpData;
     }
     public function userRegister($name, $surname, $email, $password){
         $bdd = $this->dbConnect();
         $signUpData = $bdd->prepare('INSERT INTO users(username, surname, email, pass)  VALUES (?, ?, ?, ?)' );
         $signUpData->execute([$name, $surname, $email, $password]);
         if($signUpData){
         return true;
         }else{
         return false;
         }
     }
 }