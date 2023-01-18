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

  <h1>Bonjour <?= $_SESSION["user"]["name"] ?></h1>

  <p>Votre adresse mail: <?= $_SESSION["user"]["email"] ?></p>



  <?php require_once "footer.php";?>
</body>
</html>




