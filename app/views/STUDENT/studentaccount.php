<?php
include 'app/views/FRONT/layouts/head.php';
include_once 'app/views/FRONT/layouts/header.php';
?>
<section  class="section" id="account_section">
    <div class="account_card">
        <form class="account_form flexcolumn"  id="personal_form" action="index.php?action=modif" method="post">
            <label for="name">PRENOM:</label>
            <input type="text"  name="name" class="log_in_field" id="update_name" value="<?php echo($_SESSION['name'])?>">
            <span class="form_error"><?= $errors['name'] ?></span>
            <label for="surname">NOM:</label>
            <input type="text"  name="surname" class="log_in_field"  id="update_surname" value="<?php echo($_SESSION['surname'])?>">
            <span class="form_error"><?= $errors['surname'] ?></span>
            <label for="email">EMAIL:</label>
            <input type="text"  name="email" class="log_in_field" id="update_email" value="<?php echo($_SESSION['email'])?>">
            <span class="form_error"><?= $errors['email'] ?></span>
            <button type="submit" class="button">Modifirer</button>
        </form>
    </div>
    <div class="account_card">
        <form class="account_form flexcolumn"  id="password_form" action="index.php?action=modif_pass" method="post">
            <label for="password">ANCIEN MOT DE PASSE:</label>
            <input type="text"  name="old_password" class="log_in_field" id="old_password" placeholder="Ancien mot de passe ...">
            <span class="form_error"><?= $errorsPass['old_pass'] ?></span>
            <label for="password">NOUVEAU MOT DE PASSE:</label>
            <input type="text"  name="new_password" class="log_in_field" id="new_password" placeholder="Votre nouveau mot de passe ...">
            <span class="form_error"><?= $errorsPass['new_pass'] ?></span>
            <button type="submit" class="button">Modifirer</button>
        </form>
    </div>
    <div class="account_card ">
        <form class="account_form flexcolumn" action="index.php?action=delete" id="delete_form" method="post">
            <p id="delete_account_text">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
            <button type="submit" id="delete_button"> Fermer mon compte</button>
        </form>
    </div> 
</section>
<?php include 'app/views/FRONT/layouts/footer.php' ?>   

