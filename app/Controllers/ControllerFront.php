<?php

namespace GRH56\Controllers;

class ControllerFront
{
    
    function home()
    {
        $homeFront = new \GRH56\Models\FrontManager();
        $lesson = $homeFront->displayLessons();
        
        require 'app/views/FRONT/home.php';
    }
    function contactForm()
    {
        require 'app/views/FRONT/contact.php';
    }
    function about()
    {
        require 'app/views/FRONT/about.php';
    }
    function courses()
    {
        require 'app/views/FRONT/courses.php';
    }
}  