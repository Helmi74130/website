<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="/fonts/stylesheet.css">
  <link rel="stylesheet" href="/css/article.css">
  <title>Document</title>
</head>
<body>
<?php
/* HEADER START */
require_once 'header.php';
require_once "database.php";

// Renvoi sur la page articles si l'id récupérer est vide
if (!isset($_GET["id"]) || empty($_GET["id"])) {
  header("Location: articles.php");
  exit;
};

//Get the artcle by id
$id = $_GET["id"];

$sql= "SELECT *, DATE_FORMAT(created_at, 'Le %d/%m/%Y') FROM articles WHERE id = :id";

$requete = $db->prepare($sql);

$requete->bindValue(":id", $id, PDO::PARAM_INT);

$requete->execute();

$article = $requete->fetch();

if (!$article) {
  http_response_code(404);
  echo "article inexistant";
  exit;
}

//Get 5 last articles
$sqlAll = "SELECT * FROM `articles` ORDER BY `created_at` DESC LIMIT 5";

$requeteAll = $db->query($sqlAll);

$articles = $requeteAll->fetchAll();

?>

<main class="container mt-5">
  <section class="row justify-content-between">
    <div class="col-8 d-flex justify-content-center">
      <div>
        <h1 class="text-center"><?= strip_tags($article["title"]) ?></h1>
        
        <div class="mt-3 d-flex flex-column ">
          <div class="d-flex justify-content-between mt-4">
            <small class="text-secondary"><?= strip_tags($article["DATE_FORMAT(created_at, 'Le %d/%m/%Y')"]) ?></small>
            <div class="d-flex">
              <div  class="me-2">
                <a target="_blank" aria-label="Contact par l'application Telegram" href="https://telegram.me/Mywebsite_fr">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-telegram text-info" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"/>
                  </svg>
                </a>
              </div>
              <div>
                <a target="_blank" aria-label="Nous contacter par l'application WhatsApp" href="https://api.whatsapp.com/send?text=Bonjour je vous contact car je souhaiterais réaliser...&phone=33783134458">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-whatsapp text-success" viewBox="0 0 16 16">
                    <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                  </svg>
                </a>
              </div>
            </div>
          </div>
          <img class="img-fluid img-principal mt-3" src="/img/database/<?= strip_tags($article["img"]) ?>" alt="">
        </div>
        <div class="mt-5 p-2">
          <p class="text-article text-center"><?= strip_tags($article["texte"]) ?></p>
        </div>
      </div>  
    </div>
    <div class="col-3 justify-content-center mt-5">
      <h2 class="text-center mb-5 text-truncate">Nos derniers articles</h2>
      <?php foreach($articles as $article): ?>
        <div class="card mt-3 bg-primary text-light" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title"><?= strip_tags($article["title"]) ?></h5>
            <p class="card-text text-truncate  text-dark"><?= strip_tags($article["texte"]) ?></p>
            <a href="article.php?id=<?= $article["id"] ?>" class="btn btn-light">Consulter</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
</main>


<!-- FOOTER START -->
<?php require_once 'footer.php' ?>
</body>
</html>