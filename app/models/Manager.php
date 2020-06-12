<?php
 namespace Grh\models;
  class Manager
{
     protected function dbConnect()
     {
        try{
            $bdd = new \PDO(
                "mysql:host=".$_ENV['DB_HOST'].";dbname=".$_ENV['DB_NAME'].";charset=utf8", 
                $_ENV['DB_USER'], 
                $_ENV['DB_PASSWORD']
            );


            return $bdd; 
        }catch(Exception $e){
            die("Error: " .$e->getMessage());
        }
     }
}