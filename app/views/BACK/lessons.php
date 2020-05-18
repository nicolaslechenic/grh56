<?php
include 'app/views/FRONT/layouts/head.php';
include_once 'app/views/FRONT/layouts/header.php';
?>

<div class="main_container">
<h1>LESSONS</h1>
    <section class="section normal_width">
        <nav id="side_menu">
            <ul id="side_buttons">
                <li class="main_menu_link side_menu"><a href="indexAdmin.php?action=admin/lessons"  id="about">LESSONS</a></li>
                <li class="main_menu_link"><a href="indexAdmin.php?action=lessons"  id="about">WORD OF THE DAY</a></li>
                <li class="main_menu_link"><a href="indexAdmin.php?action=lessons"  id="about">USEFUL LINKS</a></li>
            </ul>
        </nav>
        <div id="article">
            <form method="post" action="indexAdmin.php?action=lessonday" enctype="multipart/form-data" class="flexcolumn">
                <input type="text" class="newLesson" name="title" placeholder="Lesson title" value="<?php if(isset($_POST['title'])) echo$_POST['title'] ?>">
                <input type="text" class="newLesson" name="comment" placeholder="Lesson comment" value="<?php if(isset($_POST['description'])) echo$_POST['description'] ?>">
                <div class="flex_row">
                    <input type="file" id="myfile" name="myfile">
                    <input type="submit" class="small_button" value="Preview">
                </div>
                <input type="submit" class="small_button"  id="publish" value="Publish !">
            </form>
        </div>
    </section>
</div>
<?php include 'layouts/footer.php' ?>    