<?php
 namespace Grh\models;
  class Manager
{
     protected function dbConnect()
     {
        try{
            if(getenv('DB_HOST')) {
                $host = getenv('DB_HOST');
                $dbname = getenv('DB_NAME');
                $user = getenv('DB_USER');
                $pass = getenv('DB_PASSWORD');
            } else {
                $host = $_ENV['DB_HOST'];
                $dbname = $_ENV['DB_NAME'];
                $user = $_ENV['DB_USER'];
                $pass = $_ENV['DB_PASSWORD'];        
            }


            $bdd = new \PDO(
                "mysql:host=".$host.";dbname=".$dbname.";charset=utf8", 
                $user, 
                $pass
            );


            return $bdd; 
        }catch(Exception $e){
            die("Error: " .$e->getMessage());
        }
     }
}