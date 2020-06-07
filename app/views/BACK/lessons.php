<?php
include 'app/views/FRONT/layouts/head.php';
include_once 'app/views/FRONT/layouts/header.php';
?>

<main>
    <section class="section normal_width lesson_section">
        <div class= "normal_width errors">
            <span class="form_error"><?= $errors['lesson'] ?></span></br>
            <span class="form_error"><?= $errors['comment'] ?></span></br>
        </div>
            <?php foreach($allLessons as $lesson): ?>
                <div class="week_card">
                        <form class="account_form flexcolumn" action="indexAdmin.php?action=updateWeekLesson" method="post">
                            <input type="hidden" value="<?= $lesson['id']?>" name="id"/>
                            <label for="name">Title:</label>
                            <input type="text"  name="lesson" class="log_in_field" value="<?= $lesson['lod_title']?>">
                            <label for="name">Comment:</label>
                            <input type="text"  name="comment" class="log_in_field" value="<?= $lesson['lod_comment']?>">
                            <video width="320" height="240" controls class="video_lesson">
                                <source src="<?= $lesson['lod_file']?>" type="video/mp4">
                            </video>
                            <div class="flex_row" >
                                <input type="submit" class="small_button admin_buttons lessons_crud_btn" name="lesson-btn"  value="UPDATE LESSON">
                                <input type="submit" class="small_button  lessons_crud_btn delete_btn" name="lesson-btn" value="DELETE LESSON">
                            </div>    
                        </form>
                    </article>
                </div>
            <?php endforeach ?>
    
    </section>
            </main>
<?php include 'app/views/FRONT/layouts/footer.php' ?>    