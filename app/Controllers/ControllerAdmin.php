<?php

namespace GRH56\Controllers;

class ControllerAdmin
{   
    public $errors;

    public function __construct(){
        $this->errors = [
            'lesson' => '',
            'image' => '',
            'description' => '',
        ];
    }
    function admin()
    {
        echo "<script>function () {
        $('#modal_admin').show();}
        </script>";

        require 'app/views/BACK/admin.php';
    }
    function lessons(){
        require 'app/views/BACK/lessons.php';
    }
}  