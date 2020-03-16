<?php
 namespace Projet\Models;
 class Manager
{
     protected function dbConnect()
     {

        try{
            $bdd = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
            return $bdd; 
        }catch(Exception $e){
            die("Eroor: " .$e->getMessage());
        }
     }
    }