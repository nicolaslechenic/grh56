<?php
include 'app/views/FRONT/layouts/head.php';
include_once 'app/views/FRONT/layouts/header.php';
?>
<main class="normal_width">
    <article class="student_article">
        <h1 class="main_title">Lesson Of the Week</h1>
        <h2 class=lesson_title><?= $lod['lod_title']?></h2>
        <p class=lesson_comment><?= $lod['lod_comment']?></p>
        <video width="320" height="240" controls>
            <source src="<?= $lod['lod_file']?>" type="video/mp4">
        </video> 
    </article>
    <article class = "student_article">
        <img src="app/public/images/MWlogo.png" alt="Merriam-Webster logo">
        <h1 class="main_title">Merriam-Webster's Learner's Dictionary</h1> 
        <div class="dictionary flexcolumn">
            <form action="" method="POST">
                <div class="search_area" id="wordSearch">
                    <input type="text" name="word" id="word_search" placeholder="">
                    <button type="button" class="button" id="search">Search</button>
                </div>
            </form>
            <ul id="result"></ul>
        </div>
    </article>
</main>
<?php include 'app/views/FRONT/layouts/footer.php' ?>
