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
    <div class="row">
      <?php foreach($articles as $article): ?>
        <div class="col-4">
          <div class="card" style="width: 18rem;">
            <img src="<?= strip_tags($article["img"]) ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?= strip_tags($article["title"])  ?></h5>
              <p class="card-text"><?= strip_tags($article["texte"]) ?>.</p>
              <p><?= strip_tags($article["created_at"]) ?></p>
              <a href="article.php?id=<?= $article["id"] ?>" class="btn btn-primary">Consulter</a>
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