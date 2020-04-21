<?php 
include 'layouts/head.php';
include_once 'layouts/header.php';
?>
<div class="main_container">
    <article class="normal_width">
        <div class="top_article">
            <img src="app/public/images/hand.png" alt="image of a hand holding a pen">
            <p>Formation en anglais éligible au cpf</p>
            <svg width="250" height="180">
                <rect x="0" y="20" rx="20" ry="20" width="200" height="40" id="svg_rect"
                style="fill:white;stroke:black;stroke-width:1;opacity:0.5" />
                <a href="https://www.moncompteformation.gouv.fr" target="_blank">
                <text x="30" y="45" fill="#01385C" id="svg_text" class="svg_text">EN SAVOIR PLUS!</text>
            </svg>
        </div> 
    </article>
    <section id="lessons_section" class="normal_width">
        <article class="lessons">
        <?php foreach($lessons as $lesson): ?>
            <div class="lesson">
                <div class="card">
                    <div class="card_front">
                        <img class="img_lesson" src=app/public/images/<?= $lesson['image']?> alt="general english lesson">
                        <div class="lesson_card_text">
                            <h2><?= $lesson['title']?></h2>
                        </div>
                    </div>
                    <div class="card_back">
                        <p><?= $lesson['description']?></p>
                        <a href="index.php?action=courses">LEARN MORE</a>               
                    </div>
                </div>    
            </div> 
            <?php endforeach ?>
        </article>
     </section>
    <div class="separator_page">
        <p class="why_english normal_width">Out of the 6 500 spoken languages in the world today, why choose to learn English? As the third most widely spoken language in the world, English is widely spoken and taught in over 118 countries and is commonly used around the world as a trade language or diplomatic language. It is the language of science, aviation, computers, diplomacy and tourism. Last but not least, it is the language of international communication, the media and the internet.</p>
    </div>
    <section id="testimonies" class="normal_width">
        <div class="testimony normal_width">
            <p class="testimony_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse condimentum ligula sit amet eleifend condimentum. Fusce euismod turpis consectetur tortor dignissim, sit amet posuere ligula tincidunt. Aenean imperdiet elit at lacus facilisis, id sollicitudin mauris laoreet. Donec tincidunt fringilla nulla, vel porttitor augue tempus ultrices. </p>
            <p class="written_by">John D. </p>
        </div>
        <div class="testimony normal_width">
            <p class="testimony_text">Nulla iaculis ante ac massa porttitor pellentesque. Sed at mi leo. Nulla feugiat dictum dolor, sit amet faucibus arcu bibendum ac. Morbi hendrerit enim felis, nec ultrices sem tincidunt sodales. Sed id egestas ipsum, eget feugiat erat. Vivamus in porta ligula, a venenatis turpis. Sed ultrices rutrum euismod. Donec ac condimentum nibh, sed semper nisi. Donec luctus ut erat vitae maximus. Cras euismod id quam eu convallis. </p>
            <p class="written_by">Jean-Jacques G. </p>
        </div>
        <div class="testimony normal_width">
            <p class="testimony_text"> Sed sollicitudin justo eu augue consequat sodales. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse sapien urna, efficitur vel est vitae, pretium varius leo. Maecenas fringilla vitae magna tristique hendrerit. Integer feugiat, dui sed porta tincidunt, tellus velit elementum purus, non vulputate tortor nulla a lectus. </p>
            <p class="written_by">Michel Colucci </p>
        </div>
    </section>
</div>
<?php include 'layouts/footer.php' ?>