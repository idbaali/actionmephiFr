<div class="phone_cache">
    <!-- header de la partie home du site + menu -->
    <header class="">
        <div class="main mt-5">
            <ul class="float-right mt-3">
                <li class="active"><a href="/" class="active">Accueil</a></li>
                <li class=""><a href="a-propos">A propos</a></li>
                <li class=""><a href="media">Gallery</a></li>
                <li class=""><a href="nos-projets">Projet</a></li>
                <li class=""> <a href="nous-contacter">Contact</a></li>
            </ul>
        </div>
        <div class="titre">
            <strong>
                <h1 class="">ACTION MEPHIBOCHET</h1>
            </strong>
            <p class="text-light descript">
                Cette association a pour but non- lucratif de :
                Venir en aide aux personnes vivant avec un handicap et leurs enfants, aux orphelins, et contre la
                discrimination ici notamment aussi en Afrique.<br>
                Organiser les activités culturelles telles que la musique, l'évangélisation de la parole de Dieu dénommé : Zoé centre des adorateurs.<br>
                A travers Zoé centre des adorateurs, l'association pourra éduquer et former des jeunes chantres
                (Instruments Musicales) et des adorateurs.
            </p>
            <div class="row">
                <div class="col-md-6">
                    <a href="#propos" class="btn btn-danger btn-block">Nous Sommes</a>
                </div>
                <div class="col-md-6">
                    <a href="nous-contacter" class="btn btn-outline-info btn-block">Nous Contactez</a>
                </div>
            </div>
        </div>
    </header>
</div>
<div class="ordi_cache">
    <?php require_once 'includes/nav.php'; ?>
</div>
<section class="horange" id="propos">
    <div class="container">
        <h1>Nos Objectifs</h1>
        <div class="row mb-3">
            <div class="col-12 col-sm-12 col-lg-4 col-md-4 ">
                <div class="text-center mt-4 mb-2">
                    <img src="img/mephi_gp.jpg" class="photo_valeur" alt="">
                </div>
                <p class="text-justify text-light descript">Promotion de l'aide aux personnes handicapées, défendre leurs droit et vénir à leur aides dans le temps. </p>
                <a href="nous-contacter" class="btn btn-primary btn-block">DEVENIR BENEVOLES <i class="horange fas fa-arrow-right"></i></a>
            </div>
            <div class="col-12 col-sm-12 col-lg-4 col-md-4">
                <div class="text-center mt-4 ">
                    <img src="img/mephi_arriere.jpg" class="photo_valeur" alt="">
                </div>
                <p class="text-justify text-light descript">Promotion des sentiments internationaux, de la tolérance dans tous les domaines de la culture et de la compréhension entre les peuples.</p>
                <a href="https://www.paypal.com/donate/?cmd=_s-xclick&hosted_button_id=8NB3BBAVYTUGE&source=url" class="mt-4 btn btn-primary btn-block">SOUTENIR ACTION MEPHI <i class="horange fas fa-arrow-right"></i></a>
            </div>
            <div class="col-12 col-sm-12 col-lg-4 col-md-4">
                <div class="text-center mt-4 mb-2">
                    <img src="img/ikebaali.jpg" class="photo_valeur" alt="">
                </div>
                <p class="text-justify text-light descript">Promotion de l'aide à la jeunesse et l'insértion professionelle dans tous les domaines selon la passion de chacun.</p>
                <a href="nous-contacter" class="btn btn-primary btn-block">NOUS-REJOINDRE <i class="horange fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>
<section class="bg-info">
    <div class="container">
        <h1 class="">Actualités au sein d'Action Mephi</h1>
        <div class="row">
            <div class="col-12 col-lg-6 col-sm-12 col-md-6">
                <img class="filtre mt-4" src="img/gallery/<?= actualite()->image ?>" class="img-thumbnail mb-2" width="100%" height="110%" alt="">
            </div>
            <div class="col-12 col-lg-6 col-sm-12 col-md-6 actua marg-top-actu">
                <p class="text-justify ">
                    <?= actualite()->description ?>
                </p>
                <div class="row mt-4 mb-3">
                    <div class="col-8 col-sm-8 col-lg-8 col-md-8 offset-2">
                        <a href="#" class="btn btn-outline-light btn-lg btn-block"><i class="fas fa-plus mr-2"></i>Plus d-infos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="horange">
    <div class="container image_mephi">
        <h1 class="mt-5">Action Mephi en Images</h1>
        <div class="row">
            <?php
            $gallery = gallery_home();
            foreach ($gallery as $gall) : ?>
                <div class="col-md-3">
                    <a href="img/gallery/<?= $gall->image ?>" data-lightbox="mygallery" data-title="<?= $gall->titre ?>" data-size="800x867">
                        <img class="filtre mt-1" src="img/gallery/<?= $gall->image ?>" class="img-thumbnail mb-2" width="100%" alt="action mephi">
                    </a>
                    <small class="text-light text-center"><i class="fas fa-square-full mr-2 text-dark"></i><?= substr(nl2br($gall->titre), 0, 35) ?></small>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>