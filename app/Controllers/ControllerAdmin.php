<?php

namespace GRH56\Controllers;

class ControllerAdmin
{   
    private $object;
    public $errors;

    public function __construct(){
        $this->object = new \GRH56\Models\AdminManager();
        $this->errors = [
            'lesson' => '',
            'video' => '',
            'description' => '',
            'not uploaded' => '',
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

    function lessonday(){
        //var_dump ("here");
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        extract($_POST);
        $upload_dir = "app/public/videos/";
        $upload_file = $upload_dir . basename($_FILES["myfile"]["name"]);
        $upload = 1;
        $fileType = strtolower(pathinfo($upload_file,PATHINFO_EXTENSION));
        var_dump ($upload);
        // checking if file already exists
        // if (file_exists($upload_file)) {
        //     $errors['video'] = "File already exists.";
        //     $upload = 0;
        // } 
      
        // limiting file size
        if ($_FILES["myfile"]["size"] > 25000000) {
            $errors['video'] =  "File is too large.";
            $upload = 0;
        }
        //var_dump ($upload);
        // limiting to MP4 format only
        if($fileType != "mp4") {
            $errors['video'] = "Only MP4 files are allowed.";
        $upload = 0;
        } 
     
        // if $upload is set to 0 display an error
        if ($upload == 0) {
            $errors['not uploaded'] = "An error has occured, please try again";
        }else{ 
            //var_dump ("here1");
            if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $upload_file)){
                $lessonDay = $this->object->lessonDay($title, $comment, $upload_file);
            } 
            if ($lessonDay) {
                echo "all good";
                require 'app/views/BACK/admin.php';
            }

        }
    }
}