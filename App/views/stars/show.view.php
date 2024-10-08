<?php
loadPartial('head');
?>

<div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg show-bg">
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
        <h1 class="display-4 fw-bold lh-1 text-body-emphasis"><?= $star->name ?></h1>
        <h3><?= $star->distance ?> light years from Earth</h3>
        <p class="lead"><?= $star->description ?></p>
      </div>
      <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
          <img class="rounded-lg-3" src="<?= $star->image ?>" alt="Star Image" width="720">
      </div>
    </div>
  </div>

<?php
loadPartial('footer');
?>