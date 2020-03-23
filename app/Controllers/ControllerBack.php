<?php

namespace GRH56\Controllers;

class ControllerBack
{
    
    function admin()
    {
        // $usersBack = new \GRH56\Models\BackManager();
        // $usersAll = $usersBack->checkUser();


        require 'app/views/BACK/admin.php';
    }
}  