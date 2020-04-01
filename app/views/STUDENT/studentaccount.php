<?php
include 'app/views/FRONT/layouts/head.php';
include_once 'app/views/FRONT/layouts/header.php';
?>
<section>
    <div class="account_card">
        <form class="account_form flexcolumn"  id="personal_form" action="index.php?action=modif" method="post">
            <label for="name">PRENOM:</label>
            <input type="text"  name="name" class="log_in_field" id="sign_up_name" value="<?php echo($_SESSION['name'])?>">
            <span id="nameRequired"></span>
            <label for="surname">NOM:</label>
            <input type="text"  name="surname" class="log_in_field" id="sign_up_surname" value="<?php echo($_SESSION['surname'])?>">
            <span id="surnameRequired"></span>
            <label for="email">EMAIL:</label>
            <input type="text"  name="email" class="log_in_field" id="sign_up_email" value="<?php echo($_SESSION['email'])?>">
            <span id="upEmailRequired"></span>
            <button type="submit" id="signup_button">Modifirer</button>
        </form>
    </div>
    <div class="account_card">
        <form class="account_form flexcolumn"  id="psaaword_form" action="index.php?action=modif_pass" method="post">
            <label for="password">ANCIEN MOT DE PASSE:</label>
            <input type="text"  name="password" class="log_in_field" id="sign_up_password" placeholder="Ancien mot de passe ...">
            <span id="upPasswordRequired"></span>
            <label for="password">NOUVEAU MOT DE PASSE:</label>
            <input type="text"  name="confirm_password" class="log_in_field" id="sign_up_password_ confirm" placeholder="Votre nouveau mot de passe ...">
            <span id="upPasswordConfirmRequired"></span>
            <button type="submit" id="signup_button">Modifirer</button>
        </form>
    </div>
    
</section>
<?php include 'app/views/FRONT/layouts/footer.php' ?>
<?php echo($_SESSION['user']);
echo($_SESSION['name']);
    ?>
