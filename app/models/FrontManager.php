<?php
 namespace GRH56\Models;

 class FrontManager extends Manager
 {     
     public function displayLessons(){
        $bdd = $this->dbConnect();
        $lessons = $bdd->prepare('SELECT title, short, image FROM lessons');
        $lessons->execute(array());
        $lessons = $lessons->fetch();
        return $lessons;
     }
 }