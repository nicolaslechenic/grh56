<?php

namespace Grh\Controllers;

class ControllerAdmin
{   
    private $object;
    public $errors;

    public function __construct(){
        $this->object = new \Grh\Models\AdminManager();
        $this->errors = [
            'lesson' => '',
            'video' => '',
            'comment' => '',
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

    // lessonday creates lesson of the day 
    function lessonWeek(){
        $errors = $this->errors;
        $errorsWord =  $this->errorsWord;
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        extract($_POST);
        $upload_dir = "app/public/videos/";
        $upload_file = $upload_dir . basename($_FILES["myfile"]["name"]);
        $upload = 1;
        $fileType = strtolower(pathinfo($upload_file,PATHINFO_EXTENSION));

        if(empty($title)){
            $errors['lesson'] = "Lesson's title is missing !";
        }
        if(empty($comment)){
            $errors['comment'] = "Comment is missing !";
        }

        //checking if file already exists.
        if (file_exists($upload_file)) {
            $errors['video'] = "File already exists.";
            $upload = 0;
        } 
      
        // limiting file size.
        if ($_FILES["myfile"]["size"] > 25000000) {
            $errors['video'] =  "File is too large.";
            $upload = 0;
        }
    
        // limiting to MP4 format only.
        if($fileType != "mp4") {
            $errors['video'] = "Only MP4 files are allowed.";
            $upload = 0;
        } 
        if ($upload == 0) {
            $errors['not uploaded'] = "An error has occured, please try again";

            require 'app/views/BACK/admin.php';
        }elseif (empty($errors['video']) && empty($errors['lesson']) && empty($errors['comment']) && empty($errors['not uploaded'])) {
            
            if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $upload_file)){
                $lessonWeek = $this->object->lessonOfTheWeek($title, $comment, $upload_file);
                    
                    if ($lessonWeek) {
                        $show = "show";
                        $message = "Lesson successfully created!";
                        require 'app/views/BACK/admin.php';
                    } else {
                        throw new \Exception("lessonWeek creatoion failed");
                    }
            } else{
                throw new \Exception("lessonWeek failed");
            }
        }
    }

    // allLessons gets all "lesson of the week" from db
    function allLessons(){
        $errors = $this->errors;
        $allLessons = $this->object->allLessons();
        require 'app/views/BACK/lessons.php';
    }
        // updateWeekLeeson updates lesson's title and lesson's comment.
        // ---TO DO --- modal for success message.
    function updateWeekLesson(){
        $errors = $this->errors;
        $allLessons = $this->object->allLessons();
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        extract($_POST);

        if(empty($_POST['lesson'])){
            $errors['lesson'] = "Lesson's title is missing !";
        }
        if(empty($_POST['comment'])){
            $errors['comment'] = "Comment is missing !";
        } 
        if (!empty($errors['lesson']) || !empty($errors['comment'])){
            require 'app/views/BACK/lessons.php';
        }else{
            $lessonUpdate = $this->object->lessonWeekUpdate($lesson, $comment, $id);
            
            if ($lessonUpdate){
                $show = "show";
                $message = "Lesson has beeen updated!";
                header('Location: indexAdmin.php?action=allLessons');
           }else{
                throw new \Exception("updateWeekLesson failed");
           }
        }

    }

     // deleteWeekLesson delets lesson form db.
        // ---TO DO --- modal for success message.
    function deleteWeekLesson(){
        extract($_POST);
        $lessonDelete = $this->object->lessonWeekDelet($id);

        if ($lessonDelete){
            unlink($lessonDelete);
            $show = "show";
            $message = "Lesson has been deleted!";
            header('Location: indexAdmin.php?action=allLessons');
        }else{
            throw new \Exception("deletWeekLesson failed");
        }
    }

}