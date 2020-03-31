<?php
include 'app/views/FRONT/layouts/head.php';
include_once 'app/views/FRONT/layouts/header.php';
?>
<section>
    <form class="account_form flexcolumn"  id="signup_form" action="index.php?action=register" method="post">
        <label for="name">PRENOM:</label>
        <input type="text"  name="name" class="log_in_field" id="sign_up_name" placeholder="Votre prenom ...">
        <span id="nameRequired"></span>
        <label for="surname">NOM:</label>
        <input type="text"  name="surname" class="log_in_field" id="sign_up_surname" placeholder="Votre nom ...">
        <span id="surnameRequired"></span>
        <label for="email">EMAIL:</label>
        <input type="text"  name="email" class="log_in_field" id="sign_up_email" placeholder="Votre email ...">
        <span id="upEmailRequired"></span>
        <label for="password">MOT DE PASSE:</label>
        <input type="text"  name="password" class="log_in_field" id="sign_up_password" placeholder="Mot de passe ...">
        <span id="upPasswordRequired"></span>
        <label for="password">CONFIRMER LE MOT DE PASSE:</label>
        <input type="text"  name="confirm_password" class="log_in_field" id="sign_up_password_ confirm" placeholder="Confirmer le mot de passe ...">
        <span id="upPasswordConfirmRequired"></span>
        <button type="submit" id="signup_button">Modifirer</button>
    </form>
</section>
<?php include 'app/views/FRONT/layouts/footer.php' ?>
<?php echo($_SESSION['user']);
echo($_SESSION['name']);
    ?>
