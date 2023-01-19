<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="/fonts/stylesheet.css">
  <link rel="stylesheet" href="/css/articles.css">
  <title>Articles</title>
</head>
<body>
<?php
/* HEADER START */
  require_once 'header.php';
  require_once "database.php";

  $sql = "SELECT * FROM `articles` ORDER BY `created_at` DESC";

  $requete = $db->query($sql);

  $articles = $requete->fetchAll();
?>

<section class="mt-5">
  <div class="container">
    <h1>Les derniers articles</h1>
    <div class="row mt-3">
      <?php foreach($articles as $article): ?>
        <div class="col-lg-4 col-sm-6 col-12 d-flex justify-content-center mt-5">
          <div class="card" style="width: 18rem;">
            <img height="200px" src="/img/database/<?= strip_tags($article["img"]) ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?= strip_tags($article["title"])  ?></h5>
              <p class="card-text text-truncate"><?= strip_tags($article["texte"]) ?>.</p>
            </div>
            <div>
              <a class="btn btn-primary m-3" href="article.php?id=<?= $article["id"] ?>">Consulter</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>



<!-- FOOTER START -->
<?php require_once 'footer.php' ?>
</body>
</html>