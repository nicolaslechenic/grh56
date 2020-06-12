<?php
 namespace Grh\models;

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

     public function saveMail($name, $surname, $email, $subject, $message){
         $bdd = $this->dbConnect();
         $mail = $bdd->prepare('INSERT INTO contactMessages(contact_name, surname, email, mailsubject, mail) VALUES (?, ?, ?, ?, ?)');
         $mail->execute([$name, $surname, $email, $subject, $message]);
         if ($mail){
             return true;
         }else{
            return false;
         }
     }
 }