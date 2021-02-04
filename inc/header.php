<?php 

if(session_status()==PHP_SESSION_NONE){
  session_start();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Mon application D'enregistrement</title>



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Mon Formulaire</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
    <?php if(isset($_SESSION['auth'])): ?>
<li><a href="logout.php">Se deconnecter</a></li>
      <?php else: ?>
      
      <li class="nav-item">
        <a class="nav-link text-white" href="register.php">S'inscrire</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white ml-sm-5" href="logout.php">Se connecter</a>
      </li>
      <?php endif; ?>
     
    </ul>
    
  </div>
</nav>

<div class="container">

<?php if(isset($_SESSION['flash'])): ?>
  <?php foreach($_SESSION['flash'] as $type=>$message): ?>
        <div class="alert alert-<?=$type; ?>">
        
           <?=$message;?>
        
        </div>
    <?php endforeach; ?>
    <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>



  