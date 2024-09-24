<?php
loadPartial('head')
?>

<div class="create-form">
<main class="form-signin w-100 m-auto">
  <form action="/stars" method="post" enctype="multipart/form-data">
    <h1 class="h3 mb-3 fw-normal">Create Form</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="name" name="name" placeholder="name@example.com">
      <label for="floatingInput">Name</label>
    </div>
    <div class="form-floating">
        <textarea class="form-control" id="description" name="description" rows="4" cols="56"></textarea>
        <label for="floatingInput">Description</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" id="distance" name="distance" placeholder="Password">
      <label for="floatingPassword">LY from Earth</label>
    </div>
    <div class="form-floating">
        <p>Upload an image <input type="file" id="uploadfile" name="uploadfile"></p>
    </div>
    
    <button class="btn btn-primary w-100 py-2" type="submit">Create</button>
    <?php
        if(!empty($errors)) {
           foreach($errors as $error) {
            echo '<p>' . $error . '</p>';
           }
        }
    ?>
  </form>
</main>
</div>

<?php
loadPartial('footer');
?>