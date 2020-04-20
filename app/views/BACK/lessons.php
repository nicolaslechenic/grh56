<?php
include 'app/views/FRONT/layouts/head.php';
include_once 'app/views/FRONT/layouts/header.php';
?>

<div class="main_container">
<h1>LESSONS</h1>
    <section class="section">
        <nav id="side_menu">
            <ul id="side_buttons">
                <li class="main_menu_link side_menu"><a href="indexAdmin.php?action=admin/lessons"  id="about">LESSONS</a></li>
                <li class="main_menu_link"><a href="indexAdmin.php?action=lessons"  id="about">WORD OF THE DAY</a></li>
                <li class="main_menu_link"><a href="indexAdmin.php?action=lessons"  id="about">USEFUL LINKS</a></li>
            </ul>
        </nav>
        <div id="article">
            <form method="post" action="" enctype="multipart/form-data" class="flexcolumn">
                <input type="text" name="title" placeholder="Lesson title" value="">
                <input type="text" name="description" placeholder="Lesson description" value="">
                <input type="file" id="myfile" name="myfile">
            </form>
        </div>
    </section>
</div>
<?php include 'layouts/footer.php' ?>