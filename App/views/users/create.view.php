<?php
loadPartial('head')
?>

<div class="create-form">
<main class="form-signin w-100 m-auto">
  <form method="post" action="/auth/register">
    <h1 class="h3 mb-3 fw-normal">Register an Account</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="user_name" name="user_name" placeholder="name@example.com">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
  </form>
  <?php
    if(!empty($errors)) {
        foreach($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
    }
  ?>
</main>
</div>

<?php
loadPartial('footer');
?>