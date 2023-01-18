<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/article.css">
  <link rel="stylesheet" href="../../fonts/stylesheet.css">
  <link rel="stylesheet" href="../../bootstrap/bootstrap.min.css">
  <title>Administration</title>
</head>
<body>
  
<?php include_once "../../php/header.php" ;


if(!empty($_POST)){


  if (isset($_POST['title'], $_POST["img"], $_POST["texte"]) && !empty($_POST["title"]) && !empty($_POST["img"]) && !empty($_POST["texte"])) {
    $title = strip_tags($_POST['title']);
    $img = strip_tags($_POST['img']);
    $texte = strip_tags($_POST['texte']);
    
    require_once "../../php/database.php";
  
    $sql = "INSERT INTO articles (title, texte, img) VALUES (:title, :texte, :img)";
    $query = $db->prepare($sql);
    
    $query->bindValue(":title", $title, PDO::PARAM_STR);
    $query->bindValue(":texte", $texte, PDO::PARAM_STR);
    $query->bindValue(":img", $img, PDO::PARAM_STR);
    
    if (!$query->execute()) {
      die("Une erreur est survenue");
    }
    
    $id = $db->lastInsertId();
  
    die("Article ajouté sous le numéro ".$id."");
  
  }else{
    die("le formulaire est incomplet");
  }

}

?>


<main class="mt-5">
  <form method="post" class="container">
    <h1>Ajout d'un article</h1>
    <section class="row justify-content-center  mt-5">
      <div class="col-8">
        <div class="mb-3">
          <label for="title" class="form-label">Titre de l'article</label>
          <input name="title" type="text" class="form-control" id="title" placeholder="Titre">
        </div>
        <div class="mb-3">
          <label for="img" class="form-label">Nom de l'image</label>
          <input name="img" type="texte" class="form-control" id="img" placeholder="Image">
        </div>
        <div class="mb-3">
          <label for="texte" class="form-label">Texte</label>
          <textarea name="texte" class="form-control" id="texte" rows="5"></textarea>
        </div>
      </div>
      <div class="d-flex justify-content-center">
        <button class="btn btn-primary" type="submit">Confirmer</button>
      </div>
    </section>
  </form>
</main>

<?php include_once "../../php/footer.php" ?>
  
</body>
</html>
