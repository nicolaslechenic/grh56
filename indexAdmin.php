<?php
session_start();
require_once __DIR__. '/vendor/autoload.php';
 
try{
     $controllerAdmin = new \GRH56\Controllers\ControllerAdmin(); //createing object controllerAdmin
    // $controllerAdmin -> admin();
    if(isset($_GET['action']) && isset($_SESSION['name']) && $_SESSION['status'] == '1'){
        
        if($_GET['action'] == 'lessons'){
            $controllerAdmin -> lessons();
        } elseif($_GET['action'] == 'lessonWeek'){
            $controllerAdmin -> lessonWeek();
        } elseif($_GET['action'] == 'allLessons'){
            $controllerAdmin -> allLessons();
        } elseif($_GET['action'] == 'updateWeekLesson'){
            if($_REQUEST['lesson-btn'] == "UPDATE LESSON"){
                $controllerAdmin -> updateWeekLesson();
            } elseif ($_REQUEST['lesson-btn'] == "DELETE LESSON"){
                $controllerAdmin -> deleteWeekLesson();
            }
        } elseif ($_GET['action'] == 'word') {
            $controllerAdmin -> createWord();
        } elseif ($_GET['action'] == 'allWords') {
            $controllerAdmin -> allWords();
        } elseif($_GET['action'] == 'updateWord'){
            if($_REQUEST['word-btn'] == "UPDATE"){
                $controllerAdmin -> updateWord();
            } elseif ($_REQUEST['word-btn'] == "DELETE"){
                $controllerAdmin -> deleteWord();
            }
        }
    }
}catch(Exception $e){

}
 