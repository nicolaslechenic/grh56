<?php
include 'app/views/FRONT/layouts/head.php';
include_once 'app/views/FRONT/layouts/header.php';
?>
<main class="normal_width">
    <article class="student_arrticle">
        <h1>Lesson Of the Day</h1>
    </article>
    <article>
        <div class="dictionary">
            <form action="" method="POST">
                <h1>Merriam-Webster's Learner's Dictionary</h1>
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
