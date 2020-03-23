<?php
 namespace GRH56\Models;

 class BackManager extends Manager
 {     
     public function checkUser(){
        $bdd = $this->dbConnect();
        $users = $bdd->prepare('SELECT * FROM users');
        $users->execute(array());
        $users = $users->fetch();
        return $users;
     }
 }