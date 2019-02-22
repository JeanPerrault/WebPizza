<?php
/**
 * fichier qui gere la page de securite
 */

 /**
  * index
  */

  function security_login(){
      // integration de la vue
      include_once "../private/src/views/security/login.php";
  }

  function security_register(){
    // integration de la vue
    include_once "../private/src/views/security/register.php";
}

function security_forgotten_password(){
    // integration de la vue
    include_once "../private/src/views/security/forgotten_password.php";
}