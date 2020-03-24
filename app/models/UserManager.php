<?php
 namespace GRH56\Models;

 class UserManager extends Manager
 {     
     public function checkUser(){
        $bdd = $this->dbConnect();
        $loginData = $bdd->prepare('SELECT id_student FROM users WHERE email="$email" AND password="$password"');
        $loginData->execute(array());
        $loginData = $loginData->fetchAll();
        return $loginData;
     }
 }