<?php
require_once 'includes/nav.php'; ?>
<section>
    <div class="container">
    <h1 class="mt-5">Notre Gallery</h1>
        <div class="row">
            <?php
             $gallery = gallery();
             foreach($gallery as $gall): ?>
            <div class="col-12 col-sm-12 col-lg-6 col-md-6">
                <a href="img/gallery/<?=$gall->image?>"  data-lightbox="mygallery" data-title="<?=$gall->titre?>" data-size="800x867">
                    <img class="filtre mt-1" src="img/gallery/<?=$gall->image?>" class="img-thumbnail mb-2" width="100%" alt="action mephi">
                </a>
                <small class="text-light text-center"><?=$gall->titre?></small>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>