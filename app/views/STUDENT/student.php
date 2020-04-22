<?php
include 'app/views/FRONT/layouts/head.php';
include_once 'app/views/FRONT/layouts/header.php';
?>
<div id="div"> 
    <h1>STUDENT PAGE</h1>
    <div class="dictionary">
        <form action="" method="POST">
            <label>Word search</label>
            <div class="search_area">
                <input type="text" name="word" id="word_search" placeholder="">
                <button type="button" class="button" id="search">Search</button>
            </div>
        </form>
        <div id="result">
            
        </div>
    </div>
</div>
<?php include 'app/views/FRONT/layouts/footer.php' ?>
