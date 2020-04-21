<?php

namespace GRH56\Controllers;

class ControllerFront
{   
    public $errorsContact;
    
    public function __construct(){
        $this->errorsContact = [
            0 => '',
            1 => '',
            2 => '',
            3 => '',
            4 => '',
            ];
    }

    function home()
    {
        $homeFront = new \GRH56\Models\FrontManager();
        $lessons = $homeFront->displayLessons();
       
        require 'app/views/FRONT/home.php';
    }
    function contactForm(){
        require 'app/views/FRONT/contact.php';
    }
    function about(){
        require 'app/views/FRONT/about.php';
    }
    function courses(){
        require 'app/views/FRONT/courses.php';
    }
    function sendMessage(){
        extract($_POST);
        // switcing from key=> value array to indexed array for errors handling
        $inedexedPost = array_values($_POST);
        $errorsContact = $this->errorsContact;
        for($i= 0; $i < count($errorsContact); $i++){
            if (empty($inedexedPost[$i])){
                $errorsContact[$i] = "Veuillez remplir ce champ !";
            }
        }
        if(!filter_var($inedexedPost['3'], FILTER_VALIDATE_EMAIL)){
            $errorsContact['2'] = "L'adresse e-mail n'est pas valide !";
        }
        if(count($errorsContact) == 0){
            $to = 'galba.rp@gmail.com';
            $subject  = 'New message from '. $name;
            $message = '
            <h1>New3 message from ' . $name .'</h1>
            <h2>Adresse e-mail: ' . $email .'</h2>
            <p>'. nl2br($message) . '</p>';
            $headers = 'From' .$name. ' <' . $email . '>' . "/r/n";
            $headers .= 'MIME-Version: 1.0' .  "/r/n";
            $headers .= 'Content-type: text/html; charset=utf-8' .  "/r/n";

            mail($to, $subject, $message, $headers);
            unset($_POST['name']);
            unset($_POST['surname']);
            unset($_POST['email']);
            unset($_POST['subject']);
            unset($_POST['message']);
            echo "<script type='text/javascript'>alert('Votre message a bien été envoyé !');</script>";
            $this->home();
        }else{
            require 'app/views/FRONT/contact.php';
        }
        
        //return $errorsContact;

    }
}  