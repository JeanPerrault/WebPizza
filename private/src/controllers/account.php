<?php
/**
 * fichier qui gere l account
 */

 /**
  * index
  */



function account_index(){
  // verifie si l utilisateur n est pas identifié
  // integration de la vue
  if (!isset($_SESSION['user']) || empty($_SESSION['user'])){
      redirect("/connexion");
  }
}

