<?php
include 'app/views/FRONT/layouts/head.php';
include_once 'app/views/FRONT/layouts/header.php';
?>

<main>
    <section class="section normal_width word_section">
        <div class= "normal_width errors">
            <span class="form_error"><?= $errorsWord['word'] ?></span></br>
            <span class="form_error"><?= $errorsWord['translation'] ?></span></br>
            <span class="form_error"><?= $errorsWord['example'] ?></span></br>
            <span class="form_error"><?= $errorsWord['comments'] ?></span></br>
        </div>   
            <?php foreach($allWords as $word): ?>
                <div class="week_card">
                        <form class="account_form flexcolumn" action="indexAdmin.php?action=updateWord" method="post">
                            <input type="hidden" value="<?= $word['id']?>" name="id"/>
                            <label for="name">Word:</label>
                            <input type="text"  name="word" class="log_in_field" value="<?= $word['word']?>">
                            <label for="name">Translation:</label>
                            <input type="text"  name="translation" class="log_in_field" value="<?= $word['translation']?>">
                            <label for="name">Example:</label>
                            <input type="text"  name="example" class="log_in_field" value="<?= $word['example']?>">
                            <label for="name">Comments:</label>
                            <input type="text"  name="comments" class="log_in_field" value="<?= $word['comments']?>">
                            <div class="flex_row" >
                                <input type="submit" class="small_button admin_buttons lessons_crud_btn" name="word-btn"  value="UPDATE">
                                <input type="submit" class="small_button  lessons_crud_btn delete_btn" name="word-btn" value="DELETE">
                            </div>
                        </form>
                    </article>
                </div>
            <?php endforeach ?>
    
    </section>
</main>
<?php include 'app/views/FRONT/layouts/footer.php' ?>    