<?php
 namespace Grh\models;
  class Manager
{
     protected function dbConnect()
     {
        try{
            $host = getenv('DB_HOST');
            $dbname = getenv('DB_NAME');
            $user = getenv('DB_USER');
            $pass = getenv('DB_PASSWORD');

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