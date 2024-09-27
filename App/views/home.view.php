<?php
loadPartial('head');
?>

<div class="album py-5">

    <div class="container">
    <h1 class="latest">Latest Additions</h1>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

    <?php foreach($stars as $star): ?>
        <div class="col">
        <div class="card shadow-sm">
            <img class="thumb-star" src="<?= $star->image ?>" />
            <div class="card-body">
              <a class="star-link" href="/stars/<?= $star->id ?>"><p class="card-text"><?= $star->name ?><br /><?= $star->distance ?> light years from Earth</p></a>
              <div class="d-flex justify-content-between align-items-center">
              </div>
            </div>
          </div>
        </div>
    <?php endforeach ?>

      </div>
    </div>
  </div>

  <?php
loadPartial('footer');
?>