<?php
 namespace Grh\Models;
  class Manager
{
     protected function dbConnect()
     {
        try{
            $bdd = new \PDO('mysql:host=localhost;dbname=grh56;charset=utf8', 'root', '');
            return $bdd; 
        }catch(Exception $e){
            die("Error: " .$e->getMessage());
        }
     }
}