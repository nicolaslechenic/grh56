<?php

namespace GRH56\Controllers;

class ControllerAdmin
{
    protected $errors;

    public function __construct(){
        $this->errors = [
            'lesson' => '',
            'image' => '',
            'description' => '',
        ];
    }
    function admin()
    {
        
        // $usersBack = new \GRH56\Models\BackManager();
        // $usersAll = $usersBack->checkUser();
        echo "<script>function () {
        $('#modal_admin').show();}
        </script>";

        require 'app/views/BACK/admin.php';
    }
    function lessons(){
        require 'app/views/BACK/lessons.php';
    }
}  