<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/jpg" href="/img/logo.webp"/>
  <title>Confirmation</title>
</head>
<body>
<?php 
  require_once "checkform.php";
?>
  <h1><?php echo $success ?></h1>
  <div>
    <p><?php echo $mailErr ?></p>
    <p><?php echo $messageErr ?></p>
  </div>

  <div class="back">
    <a href="../index.php"><button>Retourner sur le site</button></a>
  </div>
  <?php if($send === false){echo $success;}?>
</body>
</html>

<style>
  button{
    background: blue;
    color: white;
    padding: 15px;
    margin-left: 30px;
    font-size: 2em;
    border-radius: 8px;
  }
  button:hover{
    cursor: pointer;
  }
</style>