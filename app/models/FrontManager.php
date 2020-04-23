<?php
 namespace GRH56\Models;

 class FrontManager extends Manager
 {     

     public function displayLessons(){
         //conncting to dtabase through dbConnect() from class Manager
        $bdd = $this->dbConnect();
        $lessons = $bdd->prepare('SELECT lessons.title, lessons.short, lessons.image, lesson_description.description FROM lessons INNER JOIN lesson_description ON lessons.lesson_id = lesson_description.lesson_fk');
        $lessons->execute(array());
        $lessons = $lessons->fetchAll();
        return $lessons;
     }
 }