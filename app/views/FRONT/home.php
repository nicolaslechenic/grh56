<?php 
include 'layouts/head.php';
include_once 'layouts/header.php';
?>
<main>
    <article class="normal_width">
        <div class="top_article fade">
            <img src="app/public/images/hand.png" alt="image of a hand holding a pen">
            <p>Formation en anglais éligible au CPF</p>
            <svg width="250" height="180">
                <rect x="0" y="20" rx="20" ry="20" width="200" height="40" id="svg_rect"
                style="fill:white;stroke:black;stroke-width:1;opacity:0.5" />
                <a href="https://www.moncompteformation.gouv.fr" target="_blank">
                <text x="30" y="45" fill="#01385C" id="svg_text" class="svg_text">EN SAVOIR PLUS !</text>
            </svg>
        </div> 
    </article>
    
    <section id="lessons_section" class="normal_width fade">
        <p class="pagedivider_top"></p>
        <div id="plugin"> The secret of getting ahead is getting started</div>
        <p class="pagedivider_bottom"></p>
        <article class="lessons">
        <?php foreach($lessons as $lesson): ?>
            <div class="lesson">
                <div class="card">
                    <div class="card_front">
                        <img class="img_lesson" src="<?= $lesson['image_path']?>" alt="general english lesson">
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
    <div class="separator_page fade">
        <p class="why_english normal_width fade">Out of the 6 500 spoken languages in the world today, why choose to learn English? As the third most widely spoken language in the world, English is widely spoken and taught in over 118 countries and is commonly used around the world as a trade language or diplomatic language. It is the language of science, aviation, computers, diplomacy and tourism. Last but not least, it is the language of international communication, the media and the internet.</p>
    </div>
    <section id="testimonies" class="normal_width fade">
        <?php foreach($testimonials as $testimonial): ?>
            <div class="testimonial_container container_small" id=container<?= $testimonial['id']?>>
                <div class="testimony normal_width" id=<?= $testimonial['id']?>>
                    <p class="testimony_text"><?= $testimonial['short']?></p>
                    <p class="written_by"><?= $testimonial['author'] ?></p>
                </div>
            <div class="normal_width hidden_testimonies" id=testimonial<?= $testimonial['id']?>>
                <p class="testimony_text " ><?= $testimonial['testimonial'] ?></p>
                <p class="written_by "><?= $testimonial['author'] ?></p>
            </div>
            </div>
        <?php endforeach ?>
    </section>
</main>
<?php include 'layouts/footer.php' ?>