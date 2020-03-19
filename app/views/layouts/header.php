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
                <li><a href="#">SE CONNECTER</a></li>
            </ul>
        </nav>
    </div>
    </div>
    <div class id="top_separator"></div>
    <div id="modal_box">
    
        <form class="log_in" action="studet.php" method="post">
            <input type="email" id="log_in_email" placeholder="Votre adresse email...">
            <input type="password" id="log_in_password" placeholder="Mot de passe...">
        </form>
    </div>
</header>