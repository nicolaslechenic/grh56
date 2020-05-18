<?php

 namespace GRH56\Models;

 class AdminManager extends Manager
 {  

    function lessonDay($title, $comment, $upload_file) {
        $bdd = $this->dbConnect();
        $lessonOfTheDay = $bdd->prepare('INSERT INTO lessonoftheday(lod_title, lod_comment, lod_file) VALUES(?, ?, ?)');
        $lessonOfTheDay->execute([$title, $comment, $upload_file]);
        var_dump ( $lessonOfTheDay);
        return  $lessonOfTheDay;
    }
    
 }