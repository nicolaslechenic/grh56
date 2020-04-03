<?php
 namespace GRH56\Models;
 class UserManager extends Manager
 {     

     private function session( $name, $surname, $email, $user){
         $_SESSION['name'] = $name;
         $_SESSION['surname'] = $surname;
         $_SESSION['email'] = $email;
         $_SESSION['user'] = $user;
      }

     public function checkLogIn($email, $password){
        $bdd = $this->dbConnect();
        $loginData = $bdd->prepare('SELECT * FROM users WHERE email=?' );
        $loginData->execute([$email]);
        $loginData = $loginData->fetch();
        if( password_verify($password,$loginData['pass'])){
           $this->session($loginData['username'], $loginData['surname'], $loginData['email'], $loginData['id_student']);
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
            $getUserData = $bdd->prepare('SELECT * FROM users WHERE email=?');
            $getUserData->execute([$email]);
            $getUserData = $getUserData-> fetch();
            $this->session($getUserData['username'], $getUserData['surname'], $getUserData['email'], $getUserData['id_student']);
            var_dump($_SESSION["name"]);
            die();
            return true;
         }else{
            return false;
         }
     }
     public function userUpdate($nameUpdate, $surnameUpdate, $emailUpdate, $id){
        $bdd = $this->dbConnect();
        $updateData = $bdd->prepare('UPDATE users SET username = ?, surname = ?, email = ?  WHERE id_student = ? ');
        $updateData->execute([$nameUpdate, $surnameUpdate, $emailUpdate, $id]); 
        $getUserData = $bdd->prepare('SELECT * FROM users WHERE id_student=?');
        $getUserData->execute([$id]);
        $getUserData = $getUserData-> fetch();
        if($updateData){
           $this->session($getUserData['username'], $getUserData['surname'], $getUserData['email']);
           return true;
        }else{
           return false;
        }
    }
   public function changePassword($passwordChange, $id){
      $bdd = $this->dbConnect();
      $updatePass = $bdd->prepare('UPDATE users SET pass = ?  WHERE id_student = ? ');
      $updatePass->execute([$passwordChange, $id]); 
      
      if($updatePass){
         return true;
      }else{
         return false;
      }
   }
   public function deleteUser($id){
      $bdd = $this->dbConnect();
      $deleteUser = $bdd->prepare('DELETE FROM users WHERE id_student = ?');
      $deleteUser->execute([$id]); 
      
      if($deleteUser){
         return true;
      }else{
         return false;
      }
  }
 }