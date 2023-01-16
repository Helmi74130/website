<?php

$user ='root';
$pass = "";


try {
  $db = new PDO ('mysql:host=localhost;dbname=mywebsite', $user, $pass);
} catch (PDOException $e) {
  print "erreur :" . $e->getMessage() . "<br/>";
  die;
  //En cas de mise en production décommenter
  //echo "impossible de se connecter à la base de donnée";
}

