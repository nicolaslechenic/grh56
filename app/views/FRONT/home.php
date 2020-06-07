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
        <p class="pagedivider"></p>
        <div id="plugin"> The secret of getting ahead is getting started</div>
        <p class="pagedivider"></p>
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
                        <a href="index.php?action=courses">EN SAVOIR PLUS</a>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </article>
    </section>
    <section class="normal_width fade" id="clients">
        <div class="pagedivider"></div>
        <h1 id="companies">Les entreprises qui m’ont fait confiance</h1>
        <div class="flex_row" id="comp_base">
            <a href="https://www.opcalia.com/"><img src="app/public/images/akto_s.png" alt="AKTO logo"></a>
            <a href="http://aflviv.com.ua/fr/"><img src="app/public/images/af_s.png" alt="Alinace francaise logo"></a>
            <a href="https://www.limelight.com/"><img src="app/public/images/llnw_s.jpeg"
                    alt="Limelight networks logo"></a>
            <a href="https://www.morbihan.cci.fr/"><img src="app/public/images/cci_s.jpg" alt="CCI Morbihan logo"></a>
            <a href="https://www.maven.co/"><img src="app/public/images/maven_s.png" alt="Maven Research logo"></a>
            <a href="https://ua.ambafrance.org/"><img src="app/public/images/ambassade_s.jpg"
                    alt="Ambassade de France en Ukraine logo"></a>

            <a href="https://www.afdas.com"><img src="app/public/images/afdas_s.jpg" alt="Afdas logo"></a>

        </div>
        <div class="pagedivider"></div>
        <aricle id="testimonies" class="normal_width ">
            <?php foreach($testimonials as $testimonial): ?>
            <div class="testimonial_container container_small" id=container<?= $testimonial['id']?>>
                <div class="testimony normal_width" id=<?= $testimonial['id']?>>
                    <p class="testimony_text"><?= $testimonial['short']?></p>
                    <p class="written_by"><?= $testimonial['author'] ?></p>
                </div>
                <div class="normal_width hidden_testimonies" id=testimonial<?= $testimonial['id']?>>
                    <p class="testimony_text "><?= $testimonial['testimonial'] ?></p>
                    <p class="written_by "><?= $testimonial['author'] ?></p>
                </div>
            </div>
            <?php endforeach ?>
            </article>
    </section>
</main>
<?php include 'layouts/footer.php' ?>