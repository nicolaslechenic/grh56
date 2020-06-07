<header>
    <div class="header_main" id="header">
        <a href="index.php?action=home" id=><img class="logo fade_in" src="app/public/images/logo_s.png" alt="GRH formation logo"></a>
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
                
            <?php //  conditions to  show or hide navigation menu tabs depending on user or admin is logged in or not
                if(isset($_SESSION['user']) && $_SESSION['status'] == '1' && $_GET['action'] !== 'home'):
                    $show3 = $show6 = $show5 = 'main_menu_link';
                    $show1 = $show4 =  $show2 =  'main_menu_link_connected';

                elseif(isset($_SESSION['user']) && $_SESSION['status'] == '1'):
                    $show1 = $show3 = $show4 = $show5 ='main_menu_link';
                    $show2 = $show6 = 'main_menu_link_connected';

                elseif(isset($_SESSION['user']) && $_SESSION['status'] == '0'):

                    if($_GET['action'] != 'student' && $_GET['action'] != 'account'):
                        $show2 = $show6 ='main_menu_link_connected';
                        $show1 = $show3 = $show4 = $show5 =  'main_menu_link';

                    elseif($_GET['action'] == 'student'):
                        $show1 = $show3 = $show4 =  $show6 = 'main_menu_link';
                        $show5 = $show2 = 'main_menu_link_connected';  

                    else:
                        $show1 = $show3 = $show4 =  $show5= $show6 = 'main_menu_link';
                        $show6 =  $show2 = 'main_menu_link_connected';  
                    endif;

                else:
                    $show1 = $show2 = 'main_menu_link fade_menu';
                    $show3 = $show4 =  $show5 = $show6 ='main_menu_link_connected ';

                endif;
                    ?>
                <li class="<?php echo($show1)?>"><a href="index.php?action=home"  id="home">ACCUEIL</a></li>
                <li class="<?php echo($show1)?>"><a href="index.php?action=about"  id="about">&Agrave PROPOS</a></li>
                <li class="<?php echo($show1)?>"><a href="index.php?action=courses" id="courses">LES COURS</a></li>
                <li class="<?php echo($show1)?>"><a href="index.php?action=contact"  id="contact">CONTACT</a></li>
                <!-- <li class="<?php echo($show4)?>"><a href="index.php?action=links"  id="links">LIENS UTILES</a></li> -->
                <!-- <li class="<?php echo($show4)?>"><a href="index.php?action=mycourses"  id="mycourses">MES COURS</a></li> -->
                <li class="<?php echo($show5)?>"><a href="index.php?action=student" id="student"><?php echo(strtoupper($_SESSION['name'])) ?></a></li>
                <li class="<?php echo($show6)?>"><a href="index.php?action=account"  id="account">MON COMPTE</a></li>
                <li class="<?php echo($show3)?>" ><a href="index.php?action=logout" id="home">SE DECONNECTER</a></li>
                <li class="<?php echo($show2)?>"><a  id="connect">SE CONNECTER</a></li>
                
                
            </ul>
        </nav>
    </div>
    <div class="fade_in" id="top_separator"></div>
    <div id="modal_box" class="modal_box">
        <i class="fa fa-remove" style="font-size:24px"></i>
        <div id="login_title">SE CONNECTER</div>
        <form class="flexcolumn" id="login_form" action="index.php?action=login" method="post">
            <input type="text" name='email' class="log_in_field" id="log_in_email" placeholder="Votre adresse mail...">
            <span  class="form_error" id="emailRequired"></span>
            <input type="password" class="log_in_field"   name="password" class="log_in_field" id="log_in_password" placeholder="Mot de passe...">
            <span class="form_error" id="passwordRequired"></span>
            <span class="form_error" id="wrongEmailPass"></span>
            <a href="#" class="modal_links">Mot de passe oublié ?</a>
            <button type="button" class="button"  id="login_button">Se connecter</button>
            <p>Nouvel apprenant ?</p>
            <a href="#" class="modal_links" id="create_account">Créer un compte</a>
        </form>
    </div>
    <div id="signin_box" class="modal_box">
        <i class="fa fa-remove" style="font-size:24px"></i>
        <div id="signin_title"></div>
        <form class="flexcolumn"  id="signup_form"  method="post">
            <label for="name">PRENOM :</label>
            <input type="text"  name="name" class="log_in_field" id="sign_up_name" placeholder="Votre prénom ...">
            <span class="form_error" id="nameRequired"></span>
            <label for="surname">NOM :</label>
            <input type="text"  name="surname" class="log_in_field" id="sign_up_surname" placeholder="Votre nom ...">
            <span class="form_error" id="surnameRequired"></span>
            <label for="email">ADRESSE MAIL :</label>
            <input type="text"  name="email" class="log_in_field" id="sign_up_email" placeholder="Votre email ...">
            <span class="form_error" id="upEmailRequired"></span>
            <label for="password">MOT DE PASSE :</label>
            <input type="text"  name="password" class="log_in_field" id="sign_up_password" placeholder="Mot de passe ...">
            <span class="form_error" id="upPasswordRequired"></span>
            <label for="password">CONFIRMER LE MOT DE PASSE :</label>
            <input type="text"  name="confirm_password" class="log_in_field" id="sign_up_password_ confirm" placeholder="Confirmer le mot de passe ...">
            <span  class="form_error" id="upPasswordConfirmRequired"></span>
            <button type="button" id="signup_button" class="button">Créer mon compter</button>
        </form>
    </div>
    <div id="message_modal" class="modal_box message <?=$show?>">
        <p id="success_message"><?=$message?></p>
        <button type="button" id="messsage_ok" class="button">OK</button>
    </div>
</header>   