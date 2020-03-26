<?php 
include 'layouts/head.php';
include_once 'layouts/header.php';
?>
<!--  -->
<div class="main_container">
    <article>
        <div class="top_article">
            <img src="app/public/images/hand.png" alt="image of a hand holding a pen">
            <p>Formation en anglais éligible au cpf</p>
            <svg width="250" height="180">
                <rect x="0" y="20" rx="20" ry="20" width="200" height="40" id="svg_rect"
                style="fill:white;stroke:black;stroke-width:1;opacity:0.5" />
                <a href="https://www.moncompteformation.gouv.fr" target="_blank">
                <text x="30" y="45" fill="#01385C" id="svg_text" class="svg_text">EN SAVOIR PLUS!</text>
            </svg>
        </div> 
    </article>
    <section>
        <article class="lessons">
            <div class="lesson">
                <img src=app/public/images/<?= $lesson['image']?> alt="general english lesson">
                <div class="lesson_card_text">
                    <h2><?= $lesson['title']?></h2>
                </div>
            </div> 
        </article>
    </section>
</div>
<?php include 'layouts/footer.php' ?>
<?php var_dump($_SESSION['connected']) ?>
