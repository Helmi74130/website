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

    if(!empty($_POST)){

      if (isset($_POST["email"], $_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {

        $email = strip_tags($_POST["email"]);

        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
          die("Adresse mail incorect");
        };


        $password = strip_tags($_POST["password"]);

      }else {
        die('Le formulaire est incomplet');
      };

    };

  
  ?>


  
  <form class="container mt-5" method="post">
    <div class="row justify-content-center">
      <h1 class="text-center">Connexion</h1>
      <div class="col-4">
        <div class="mb-3">
          <label for="email" class="form-label">E-mail</label>
          <input name="email" type="mail" class="form-control" id="email" placeholder="E-mail">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Mot de passe</label>
          <input name="password" type="password" class="form-control" id="password" placeholder="Mot de passe">
        </div>
        <button class="btn btn-primary" type="submit">Se connecter</button>
      </div>
    </div>
  </form>


  <?php require_once "footer.php";?>
</body>
</html>
