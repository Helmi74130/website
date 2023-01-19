<?php

session_start();

if (!isset($_SESSION["user"])) {
  header("location: authentification.php");
  exit;
};

//Supprime la variable session
unset($_SESSION["user"]);

header("location: ../index.php");