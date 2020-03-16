<?php
 namespace Projet\Models;

 class FrontManager extends Manager
 {
     public function viewFront()
     {
        $bdd = $this -> dbConnect();
        $req = $bdd->prepare('SELECT TITLE FROM article');
        $req->execute(array());
        $req = $req->fetch()[0];
        return $req;
     }
 }