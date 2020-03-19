<?php

namespace GRH56\Controllers;

class ControllerFront
{
    
    function home()
    {
        $homeFront = new \GRH56\Models\FrontManager();
        $lesson = $homeFront->diplayLessons();
        
        require 'app/views/home.php';
    }
    function contactForm()
    {
        require 'app/views/contact.php';
    }
    function about()
    {
        require 'app/views/about.php';
    }
    function courses()
    {
        require 'app/views/courses.php';
    }
}  