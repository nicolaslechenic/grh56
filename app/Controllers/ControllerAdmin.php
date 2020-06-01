<?php

namespace GRH56\Controllers;

class ControllerAdmin
{   
    private $object;
    public $errors;
    public $errorsWord;


    public function __construct(){
        $this->object = new \GRH56\Models\AdminManager();
        $this->errors = [
            'lesson' => '',
            'video' => '',
            'comment' => '',
            'not uploaded' => '',
        ];
        $this->errorsWord = [
            'word' => '',
            'translation' => '',
            'example' => '',
            'comments' => '',
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
           
        }

        if (empty($errors['video']) && empty($errors['lesson']) && empty($errors['comment']) && empty($errors['not uploaded'])) {
            if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $upload_file)){
                $lessonWeek = $this->object->lessonOfTheWeek($title, $comment, $upload_file);
                    
                    if ($lessonWeek) {
                        echo "all good";
                        require 'app/views/BACK/admin.php';
                    } else {
                        var_dump("error to do");
                    }
            } else{
                var_dump("error to do");
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
        // ---TO DO --- modal for success message +  error handling.
    function updateWeekLesson(){
        $errors = $this->errors;
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
                header('Location: indexAdmin.php?action=allLessons');
           }
        }

    }

     // deleteWeekLesson delets lesson form db.
        // ---TO DO --- modal for success message +  error handling.
    function deleteWeekLesson(){
        extract($_POST);
        $lessonDelete = $this->object->lessonWeekDelet($id);
        unlink($lessonDelete);
        header('Location: indexAdmin.php?action=allLessons');
    }

    function createWord(){
        $errorsWord = $this->errorsWord;
        $errors = $this->errors;
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        extract($_POST);
        if(empty($word)){
            $errorsWord['word'] = "Word of the day is missing !";
        }
        if(empty($translation)){
            $errorsWord['translation'] = "Translation is missing !";
        }
        if(empty($example)){
            $errorsWord['example'] = "Example is missing !";
        }
        if(empty($comments)){
            $errorsWord['example'] = "Comments are missing !";
        }
        if (!empty($errorsWord['word']) || !empty($errorsWord['translation']) || !empty($errorsWord['example']) || !empty($errorsWord['comments'])){
            require 'app/views/BACK/admin.php';
        }else{
            $wordADay = $this->object->wordADay($word, $translation, $example, $comments);

            if ($wordADay){
                require 'app/views/BACK/admin.php';
            }else{
                // todo EROOR
            }
        }
    }

    function allWords(){
        $errorsWord = $this->errorsWord;
        $allWords = $this->object->allWords();
        require 'app/views/BACK/words.php';
    }

    function updateWord(){
        $errorsWord = $this->errorsWord;
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        extract($_POST);

        if(empty($word)){
            $errorsWord['word'] = "Word of the day is missing !";
        }
        if(empty($translation)){
            $errorsWord['translation'] = "Translation is missing !";
        }
        if(empty($example)){
            $errorsWord['example'] = "Example is missing !";
        }
        if(empty($comments)){
            $errorsWord['example'] = "Comments are missing !";
        }if (!empty($errorsWord['word']) || !empty($errorsWord['translation']) || !empty($errorsWord['example']) || !empty($errorsWord['comments'])){
            $allWords = $this->object->allWords();
            require 'app/views/BACK/words.php';
        }else{
            $updateWord = $this->object->wordUpdate($word, $translation, $example, $comments, $id);
            if ($updateWord){
                require 'app/views/BACK/admin.php';
            }else{
                // todo EROOR
            }
        }

    }
}