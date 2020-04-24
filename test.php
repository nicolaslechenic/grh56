<?php
$args =['logout', 'student', 'account', 'modif', 'modif_pass', 'delete']
function logedin($action){
   
   foreach($args as $arg){ 
       if($action == $arg){
        $controllerFront -> $action();
        }
    }
}