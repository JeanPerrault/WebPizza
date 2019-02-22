<?php
/**
 * fichier qui gere la page de contact
 */

 /**
  * index
  */

  function contact_index(){

    global $re;

    if($_SERVER['REQUEST_METHOD'] === "POST"){

        // declaration de la variable d'envoi du formaulaire
        $send = true;

        // recuperation des donnees 
        $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : null;
        $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $message = isset($_POST['message']) ? $_POST['message'] : null;

        // -- controle des champs

        // controle du champ prenom
        if(!preg_match($re['firstname'], $firstname)){
          $send = false;
          //echo "Erreur du champ Firstname";
        }
        // controle du champ nom
        if(!preg_match($re['lastname'], $lastname)){
          $send = false;
          //echo "Erreur du champ Lastname";
        }
        // controle du champ email
        if(!preg_match($re['email'], $email)){
          $send = false;
          //echo "Erreur du champ Email";
        }
        // controle du champ message
        if(strlen($message) < 10){
          $send = false;
          //echo "Erreur du champ Message";
        }

        if ($send){
          // TODO: creation de la table "message" (id, firstname, lastname, message, date_time)
          // TODO: Ajout du fichier nSQL contenant la structure de la table "message" au repertoire /private/sql
          // TODO: Enregistrement du message dans la BDD avec PDO
          // TODO: Definition d'un message de "callback / flashbag" (success ou error)
          // TODO: redirection de l utilisateur vers la page precedente
          
          //echo "On enregistre le message dans la BDD";
        }else{
          // TODO: Definition d'un message de "callback" (error)
          // TODO: redirection de l utilisateur vers la page precedente

          //echo "Erreur sur le formulaire";
        }

        dump($_POST);
        dump($firstname);
        dump($lastname);
        dump($email);
        dump($message);

    }else {
          
        // TODO: suppression du else + redirection de l utilisateur
        // TODO: Definition d'un message de "callback" (error)
        // TODO: redirection de l utilisateur vers la page precedente
        echo "Le formulaire ne peut etre traité qu avec la methode POST";
    }
}