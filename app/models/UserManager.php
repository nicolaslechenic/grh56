<?php
 namespace GRH56\Models;

 class UserManager extends Manager
 {     
     public function checkLogIn($email, $password){
        $bdd = $this->dbConnect();
        $loginData = $bdd->prepare('SELECT username FROM users WHERE email=? AND pass=?' );
        $loginData->execute(array($email, $password));
        $loginData = $loginData->fetchAll();
        return $loginData;
     }
     public function checkEmailexists($email){
        $bdd = $this->dbConnect();
        $signUpData = $bdd->prepare('SELECT id_student FROM users WHERE email=?' );
        $signUpData->execute(array($email));
        $signUpData = $signUpData->fetchAll();
        return $signUpData;
     }
 }