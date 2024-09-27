<?php
use Framework\Session;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Star Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
</head>

  <body>
    
    <!-- nav bar -->
  <nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fourth navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="/"><img src="/images/star-logo.png" alt="logo image" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" href="/stars">Show All</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/auth/register">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/stars/create">Create</a>
          </li>
        </ul>
        <?php if (!Session::get('user')): ?>
        <form role="search" method="post" action="/auth/login">
          <input class="" type="text" placeholder="Username" name="user_name" aria-label="Search" required>
          <input class="" type="password" placeholder="Pasword" name="user_password" aria-label="Search" required>
          <button type="submit">Login</button>
        </form>
        <?php endif ?>
        <?php if (Session::get('user')): ?>
          <form role="search" method="post" action="/auth/logout">
          <p><button type="submit">Logout</button></p>
          </form>
          <?php endif ?>
      </div>
    </div>
  </nav>
  <!-- end nav bar -->
   <div id="main-content">