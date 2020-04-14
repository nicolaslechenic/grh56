<?php
include 'app/views/FRONT/layouts/head.php';
include_once 'app/views/FRONT/layouts/header.php';
?>
<div id="div"> 
    <h1>STUDENT PAGE</h1>
    <div class="dictionary">
        <div class="search_area">
        
            <input type="text" id="word_search" placeholder="">
            <button type="button" class="button" id="search">Search</button>
        </div>
        <div id="result">
            <p id="def"></p>
        </div>
    </div>
</div>
<?php include 'app/views/FRONT/layouts/footer.php' ?>