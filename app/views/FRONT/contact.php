<?php 
include 'app/views/FRONT/layouts/head.php';
include_once 'app/views/FRONT/layouts/header.php';
?>
<section class="normal_width main_container">
    <div id="contact_section">
        <h1 class="center">Contactez nous </h1>
        <form class="flexcolumn" id="contact_form" action="index.php?action=send"  method="post">
            <label for="civilite">Votre civilité :</label>
            <div id="radio_btns">
                <span><input type="radio" class="radio" id="radioM" name="optradio" value="monsieur">M.</span>
                <span><input type="radio" class="radio" id="radioMme" name="optradio" value="madame">Mme.</span>
                <span><input type="radio" class="radio" id="radioMle" name="optradio" value="mademoiselle">Mle.</span>
            </div>
            <label for="name" class="label" id="first_line">Prenom:</label>
            <input type="text" name="name" class="contact_field" id="contact_name" placeholder="Votre prenom ..." value = <?php if(isset($_POST['name'])) echo $_POST['name'] ?>>
            <span class="form_error"><?= $errorsContact[0] ?></span>
            <label for="surname" class="label">Nom:</label>
            <input type="text" name="surname" class="contact_field" id="contact_surname" placeholder="Votre nom ..." value = <?php if(isset($_POST['surname'])) echo $_POST['surname'] ?>>
            <span class="form_error"><?= $errorsContact[1] ?></span>
            <label for="email" class="label">Addresse e-mail:</label>
            <input type="text" name="email" class="contact_field" id="contact_email" placeholder="Votre email ..." value = <?php if(isset($_POST['email'])) echo $_POST['email'] ?>>
            <span class="form_error"><?= $errorsContact[2] ?></span>
            <label for="subject" class="label">Objet:</label>
            <input type="text" name="subject" class="contact_field" id="contact_subject" placeholder="Objet...">
            <span class="form_error" ><?= $errorsContact[3] ?></span>
            <label for="message" class="label">Votre message ici:</label>
            <textarea name="message" class="contact_field" id="contact_message"><?php if(isset($_POST['message'])) echo $_POST['message'] ?></textarea>
            <span class="form_error" ><?= $errorsContact[4] ?></span>
            <button type="submit" id="send_message" class="button">Envoyer</button>
        </form>
    </div>
</section>
<?php include 'app/views/FRONT/layouts/footer.php' ?>   