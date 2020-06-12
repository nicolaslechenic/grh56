<?php
 namespace Grh\Models;
  class Manager
{
     protected function dbConnect()
     {
        try{
            $bdd = new PDO(
                "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']};charset=utf8", 
                $_ENV['DB_USER'], 
                $_ENV['DB_PASSWORD'], 
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
            
            return $bdd; 
        }catch(Exception $e){
            die("Error: " .$e->getMessage());
        }
     }
}