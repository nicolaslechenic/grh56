<?php
 namespace GRH56\Models;

 class FrontManager extends Manager
 {     

     public function displayLessons(){
         //conncting to dtabase through dbConnect() from class Manager
        $bdd = $this->dbConnect();
        $lessons = $bdd->prepare('SELECT lessons.title, lessons.short, lessons.description, images.image_path FROM lessons INNER JOIN images ON lessons.lesson_id = images.connect_id');
        $lessons->execute(array());
        $lessons = $lessons->fetchAll();
        return $lessons;
     }

     public function displayTestimonials(){
        $bdd = $this->dbConnect();
        $testimonials = $bdd->prepare('SELECT * FROM testimonials');
        $testimonials->execute(array());
        $testimonials = $testimonials->fetchAll();
        return $testimonials;

     }
 }