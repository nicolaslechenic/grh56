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
            <?php   if(isset($_SESSION['user'])):
                            if($_GET['action'] != 'student' && $_GET['action'] != 'account'):
                               $show1 = $show2 = 'main_menu_link_connected';
                               $show3 = $show4 = $show5 = 'main_menu_link';
                            elseif($_GET['action'] == 'student'):
                                $show3 = $show4 =   'main_menu_link';
                                $show1 =  $show5 = $show2 = 'main_menu_link_connected';  
                            else:
                                $show3 = $show4 =  $show5=  'main_menu_link';
                                $show1 =  $show2 = 'main_menu_link_connected';  
                            endif;
                        else:
                        $show1 = $show2 = 'main_menu_link';
                        $show3 = $show4 =  $show5 = 'main_menu_link_connected';
                    endif;
                    ?>
                <li><a href="index.php?action=home" class="main_menu_link" id="index">ACCUEIL</a></li>
                <li class="<?php echo($show1)?>"><a href="index.php?action=about"  id="about">A PROPOS</a></li>
                <li class="<?php echo($show1)?>"><a href="index.php?action=courses" id="courses">LES COURS</a></li>
                <li class="<?php echo($show1)?>"><a href="index.php?action=contact"  id="contact">CONTACT</a></li>
                <li class="<?php echo($show4)?>"><a href="index.php?action=links"  id="about">LIENS UTILES</a></li>
                <li class="<?php echo($show4)?>"><a href="index.php?action=mycourses"  id="courses">MES COURS</a></li>
                <li class="<?php echo($show5)?>"><a href="index.php?action=student" id="log_out"><?php echo($_SESSION['name']) ?></a></li>
                <li class="<?php echo($show3)?>"><a href="index.php?action=account"  id="log_out">MON COMPTE</a></li>
                <li class="<?php echo($show3)?>" ><a href="index.php?action=logout" id="log_out">SE DECONNECTER</a></li>
                <li class="<?php echo($show2)?>"><a  id="connect">SE CONNECTER</a></li>
                
                
            </ul>
        </nav>
    </div>
    </div>
    <div class id="top_separator"></div>
    <div id="modal_box" class="modal_animate modal_box">
        <i class="fa fa-remove" style="font-size:24px"></i>
        <div id="login_title">SE CONNECTER</div>
        <form class="flexcolumn" id="login_form" action="index.php?action=login" method="post">
            <input type="text" name='email' class="log_in_field" id="log_in_email" placeholder="Votre adresse email...">
            <span id="emailRequired"></span>
            <input type="password"  name="password" class="log_in_field" id="log_in_password" placeholder="Mot de passe...">
            <span id="passwordRequired"></span>
            <span id="wrongEmailPass"></span>
            <a href="#" class="modal_links">Mot de passe oublier ?</a>
            <button type="button"  id="login_button">Se connecter</button>
            <p>Nouvel étudiant ?</p>
            <a href="#" class="modal_links" id="create_account">Créer un compte</a>
        </form>
    </div>
    <div id="signin_box" class="modal_animate modal_box">
        <i class="fa fa-remove" style="font-size:24px"></i>
        <div id="signin_title"></div>
        <form class="flexcolumn"  id="signup_form" action="index.php?action=register" method="post">
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
            <button type="button" id="signup_button">Créer mon compter</button>
        </form>
    </div>
</header>   