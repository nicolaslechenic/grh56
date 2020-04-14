<header>
    <div class="header_main">
        <a href="index.php?action=home"><img class="logo" src="app/public/images/logo_small.png" alt="GRH formation logo"></a>
    </div>
    <div id="modal_admin" class="modal_animate modal_box">
        <i class="fa fa-remove" style="font-size:24px"></i>
        <div id="login_title">SE CONNECTER</div>
        <form class="flexcolumn" id="login_form_admin" action="index.php?action=login" method="post">
            <input type="text" name='email' class="log_in_field" id="log_in_email_admin" placeholder="Votre adresse email...">
            <span  class="form_error" id="emailRequiredAdmin"></span>
            <input type="password" class="log_in_field"   name="password" class="log_in_field" id="log_in_password_admin" placeholder="Mot de passe...">
            <span class="form_error" id="passwordRequired_admin"></span>
            <span class="form_error" id="wrongEmailPassAdmin"></span>
            <a href="#" class="modal_links">Mot de passe oublier ?</a>
            <button type="button" class="button"  id="login_button_admin">Se connecter</button>
        </form>
    </div>
    <div class id="top_separator"></div>
</header>