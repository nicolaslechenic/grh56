<?php
 namespace GRH56\Models;

 class UserManager extends Manager
 {     
     public function checkUser($email, $password){
        $bdd = $this->dbConnect();
        $loginData = $bdd->prepare('SELECT id_student FROM users WHERE email=? AND pass=?' );
        $loginData->execute(array($email, $password));
        $loginData = $loginData->fetchAll();
        return $loginData;
     }
 }