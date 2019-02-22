<?php
/**
 * fichier qui gere la page de contact
 */

 /**
  * index
  */

  function contact_index(){

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        // recuperation des donnees 
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        dump($_POST);
        dump($firstname);

    }else {
        // TODO: suppression du else + redirection de l utilisateur
        echo "Le formulaire ne peut etre traité qu avec la methode POST";
    }
}