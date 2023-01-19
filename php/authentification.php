<?php 
  session_start();

  //Vérifie si l'utilisateur est connecté
  if (isset($_SESSION["user"])) {
    header("location: profil.php");
    exit;
  };
?>

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
  //On vérifie que $_POST n'est pas vide
    if(!empty($_POST)){
    //On vérifie que nos éléments existe et ne sont pas vides
      if (isset($_POST["email"], $_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
        //On vérifie que l'email corespond à une adresse mail(remplace regex)
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
          die("Adresse mail incorect");
        };

        require_once "database.php";

        $sql = "SELECT * FROM users WHERE email = :email";

        $query = $db->prepare($sql);

        $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);

        $query->execute();

        $user = $query->fetch();
        //On verifie que l'utilisateur existe
        if (!$user) {
          die('l\'utilisateur et/ou le mdp est incorect');
        }
        //On verifie que le mdp qu'on récupere est le meme en BDD
        if (!password_verify($_POST["password"], $user["password"])) {
          die('l\'utilisateur et/ou le mdp est incorect');
        };
        //On démarre la session PHP
        session_start();
        //On stock les infos de l'user
        $_SESSION["user"] = [
          "id" => $user["id"],
          "name" => $user["name"],
          "email" => $user["email"],
          "role" => $user["roles"]
        ];
        //On redirige l'utilisateur

        if ($_SESSION["user"]["role"] !== "ROLE_ADMIN" ) {
          header("location: profil.php");
        }else {
          header("location: ../admin/articles/ajout.php");
        };
        


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
