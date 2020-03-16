<?php 
// session_start();
// require_once 'fonctions/bdd.php';
// include 'fonctions/blog.php';
// $bdd = bdd();
// if(!empty($_POST)){
//     $articles = search();
// }else{
//     $articles = article();
// }

include 'layouts/head.php';
include_once 'layouts/header.php';
?>
<!--  -->

<article>
    <div class="article_general">
        <img src="app/public/images/hand.png" alt="image of a hand holding a pen">
        <p>Formation en anglais éligible au cpf</p>
        <svg width="400" height="180">
            <rect x="0" y="20" rx="20" ry="20" width="200" height="40" id="svg_rect"
            style="fill:white;stroke:black;stroke-width:1;opacity:0.5" />
            <a href="https://www.moncompteformation.gouv.fr" target="_blank">
            <text x="40" y="45" fill="#01385C" id="svg_text" class="svg_text">EN SAVOIR PLUS!</text>
        </svg>
    </div> 
</aricle>  

<?php include 'layouts/footer.php' ?>

<?php var_dump($accueil); echo($accueil); ?>