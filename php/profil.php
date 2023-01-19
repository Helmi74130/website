<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="/fonts/stylesheet.css">
  <link rel="stylesheet" href="/css/articles.css">
  <title>Connexion</title>
</head>
<body>
  <?php 
    require_once "header.php"; 
  ?>

  <h1 class="m-5">Bonjour <?= $_SESSION["user"]["name"] ?></h1>

  <main class="container mt-5">
  <div class="row">
    <div class="col-10 col-md-6">
      <img class="img-fluid" src="/img/accompagne.webp" alt="Image principal">
    </div>
    <div class="col-10 col-md-6 text-center">
      <h2>J'espère que vous passez une bonne journée !</h2>
    </div>
  </div>
  </main>



  <?php require_once "footer.php";?>
</body>
</html>




