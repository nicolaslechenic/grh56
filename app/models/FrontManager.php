<?php
 namespace GRH56\Models;

 class FrontManager extends Manager
 {
     public function viewFront()
     
     public function diplayLessons(){
        $bdd = $this->dbConnect();
        $lessons = $bdd->prepare('SELECT title, image FROM lessons');
        $lessons->execute(array());
        $lessons = $lessons->fetch();
        return $lessons;
     }
 }