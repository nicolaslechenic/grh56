<?php
 namespace GRH56\Models;
 session_start();

 class UserManager extends Manager
 {     
     public function checkLogIn($email, $password){
        $bdd = $this->dbConnect();
        $loginData = $bdd->prepare('SELECT * FROM users WHERE email=?' );
        $loginData->execute([$email]);
        $loginData = $loginData->fetch();
        if(password_verify($password,$loginData['pass'])){
            $_SESSION['user'] = $loginData['id_student'];
            $_SESSION['name'] = $loginData['username'];
            $_SESSION['surname'] = $loginData['surname'];
            $_SESSION['email'] = $loginData['email'];
            return true;
        }else{
            return false;
        }        
     }

     public function checkEmailexists($email){
        $bdd = $this->dbConnect();
        $signUpData = $bdd->prepare('SELECT id_student FROM users WHERE email=?' );
        $signUpData->execute([$email]);
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
     public function userUpdate($nameUpdate, $surnameUpdate, $emailUpdate, $id){
        $bdd = $this->dbConnect();
        $updateData = $bdd->prepare('UPDATE users SET username = ?, surname = ?, email = ?  WHERE id_student = ? ');
        $updateData->execute([$nameUpdate, $surnameUpdate, $emailUpdate]);
        $updateData = $updateData-> fetch();
        if($updateData){
            $_SESSION['name'] = $loginData['username'];
            $_SESSION['surname'] = $loginData['surname'];
            $_SESSION['email'] = $loginData['email'];
           return true;
        }else{
           return false;
        }
    }
 }