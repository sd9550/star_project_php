<?php
loadPartial('head');
?>

<div class="container my-5">
  <div class="p-5 text-center bg-body-tertiary rounded-3">
    <h1 class="text-body-emphasis">Error</h1>
    <p class="lead">
      <?= $message ?>
    </p>
  </div>
</div>

<?php
loadPartial('footer');
?>