<?php

$piou = 'piouuuuuuuuuuuuuuuuuu';

$user ='root';
$pass = "";


try {
  $db = new PDO ('mysql:host=localhost;dbname=mywebsite', $user, $pass);
} catch (PDOException $e) {
  print "erreur :" . $e->getMessage() . "<br/>";
  die;
}
