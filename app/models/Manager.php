<?php
 namespace Grh\Models;
  class Manager
{
     protected function dbConnect()
     {
        try{

            $bdd = new PDO(
                "mysql:host=".getenv('DB_HOST').";dbname=".getenv('DB_NAME').";charset=utf8", 
                getenv('DB_USER'), 
                getenv('DB_PASSWORD'), 
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );

            var_dump(getenv('DB_HOST'));
            var_dump($bdd);
            die();
            return $bdd; 
        }catch(Exception $e){
            die("Error: " .$e->getMessage());
        }
     }
}