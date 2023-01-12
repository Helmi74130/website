<?php

// Secure the form
if(isset($_POST['email']) && isset($_POST['message'])){
  $headers = htmlspecialchars(stripslashes(trim($_POST['email'])));
  $message = "Message de: ".$headers."\r\n"." Qui dit: ".htmlspecialchars(stripslashes(trim($_POST['message'])));


  if(!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $headers)){
    $mailErr = 'Votre adresse mail est invalide, veuillez entrer une adresse valide';
  }else{
    $mailErr = null;
  }
  if(strlen($message) === 0 || strlen($message) > 5000){
    $messageErr = 'Vous ne pouvez pas envoyer de message vide, veuillez renseigner le champ';
  }else{
    $messageErr = null;
  }
  if (!isset($mailErr) && !isset($messageErr)){
      $success = 'Votre message a été envoyé avec succés';
      $send = true;
      mail('website.edesign@gmail.com', 'Contact de my website', $message, $headers);
  }else{
    $send = false;
      $success = 'Une erreur c\'est produite, <br/> vérifiez que vous avez rempli correctement le formulaire.<br/> 
      Ou contacter moi directement par e-mail en cliquant sur cette adresse e-mail <a href="mailto:website.edesign@gmail.com">website.edesign@gmail.com</a>';
  } 
}
