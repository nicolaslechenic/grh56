<?php

namespace GRH56\Controllers;

class ControllerAdmin
{
    
    function admin()
    {
        // $usersBack = new \GRH56\Models\BackManager();
        // $usersAll = $usersBack->checkUser();


        require 'app/views/BACK/admin.php';
    }
}  