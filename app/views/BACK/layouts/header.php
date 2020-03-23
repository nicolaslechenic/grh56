<header>
    <div class="header_main">
        <a href="index.php?action=home"><img class="logo" src="app/public/images/logo_small.png" alt="GRH formation logo"></a>
        <button id='burger_button' onclick="hamburgerBtn()">
            <div>MENU</div>
            <div id='burger_icon'>
                <div id='bar1'></div>
                <div id='bar2'></div>
                <div id='bar3'></div>
            </div>
        </button>
        <nav id="top_menu" aria-label="top menu">
            <ul id="top_men_ul">
                <li><a href="index.php?action=home" class="main_menu_link" id="index">ACCUEIL</a></li>
                <li><a href="index.php?action=about" class="main_menu_link" id="about">A PROPOS</a></li>
                <li><a href="index.php?action=courses" class="main_menu_link" id="courses">LES COURS</a></li>
                <li><a href="index.php?action=contact" class="main_menu_link" id="contact">CONTACT</a></li>
                <li><a  id="connect">SE CONNECTER</a></li>
            </ul>
        </nav>
    </div>
    </div>
    <div class id="top_separator"></div>
    <div id="modal_box" class="modal_animate modal_box">
        <i class="fa fa-remove" style="font-size:24px"></i>
        <div id="login_title">SE CONNECTER</div>
        <form class="log_form" action="" method="post">
            <input type="email" name='email' class="log_in_field" id="log_in_email" placeholder="Votre adresse email...">
            <input type="password" class="log_in_field" id="log_in_password" placeholder="Mot de passe...">
            <a href="#" class="modal_links">Mot de passe oublier ?</a>
            <button type="submit" id="connect_button">Se connecter</button>
            <p>Nouvel étudiant ?</p>
            <a href="#" class="modal_links" id="create_account">Créer un compte</a>
        </form>
    </div>
    <div id="signin_box" class="modal_animate modal_box">
        <i class="fa fa-remove" style="font-size:24px"></i>
        <div id="signin_title"></div>
        <form class="log_form"  action="index.php?action=admin" method="post">
            PRENOM: <input type="text"  name="name" class="log_in_field" id="log_in_name" placeholder="Votre prenom ...">
            NOM: <input type="text" name="surname" class="log_in_field" id="log_in_surname" placeholder="Votre nom...">
            EMAIL: : <input type="email" name="email" class="log_in_field" id="log_in_surname" placeholder="Votre nom...">
            <button type="submit" id="signup_button">Créer mon compter</button>
        </form>
    </div>
</header>