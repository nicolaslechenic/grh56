<?php
include 'app/views/FRONT/layouts/head.php';
include_once 'app/views/FRONT/layouts/header.php';
?>

<div class="main_container">
    <main>
        <section class=" section normal_width" id="admin_section">
            <div id="article">
                <h1>"WORD A DAY"</h1>
                <form method="post" action="indexAdmin.php?action=lessonday" class="flexcolumn">
                    <input type="text" class="newLesson" name="word" placeholder="word of the day" value="<?php if(isset($_POST['title'])) echo$_POST['word'] ?>">
                    <input type="text" class="newLesson" name="translation" placeholder="translation" value="<?php if(isset($_POST['translation'])) echo$_POST['description'] ?>">
                    <input type="text" class="newLesson" name="example" placeholder="example" value="<?php if(isset($_POST['translation'])) echo$_POST['example'] ?>">
                    <input type="text" class="newLesson" name="comments" placeholder="comments" value="<?php if(isset($_POST['translation'])) echo$_POST['comments'] ?>">
                    <input type="submit" class="small_button publish"  value="Publish !">
                </form>
            </div>
            <div id="article">
                <h1>LESSON OF THE WEEK</h1>
                <form method="post" action="indexAdmin.php?action=lessonday"  id="lod" enctype="multipart/form-data" class="flexcolumn">
                    <input type="text" class="newLesson" name="title" placeholder="lesson title" value="<?php if(isset($_POST['title'])) echo$_POST['title'] ?>">
                    <input type="text" class="newLesson" name="comment" placeholder="lesson comment" value="<?php if(isset($_POST['description'])) echo$_POST['description'] ?>">
                    <div class="flex_row">
                        <input type="file" id="myfile" name="myfile">
                        <!-- <input type="submit" class="small_button" value="Preview"> -->
                    </div>
                    <input type="submit" class="small_button publish"  id= "bottom_button" value="Publish !">
                </form>
            </div>
        </section>
    </main>
</div>
<?php include 'app/views/FRONT/layouts/footer.php' ?>