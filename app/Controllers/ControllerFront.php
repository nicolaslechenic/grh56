<?php

namespace Projet\Controllers;

class ControllerFront
{
    
    function home()
    {
        $homeFront = new \Projet\Models\FrontManager();
        $accueil = $homeFront->viewFront();
        
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