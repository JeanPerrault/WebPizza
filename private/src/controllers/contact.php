<?php
/**
 * fichier qui gere la page de contact
 */

 /**
  * index
  */

  function contact_index(){

    global $re, $db;

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
          // TODO: Enregistrement du message dans la BDD avec PDO
            $query = $db['main']-> prepare("INSERT INTO messages (`firstname`, `lastname`, `email`,`message`, `sending_timestamp`) 
                                                          VALUES (:firstname, :lastname, :email, :message, :sendingtimestamp)");
            // attention de faire correspondre le type de param avec le type des champs                                                           
            $query-> bindValue(':firstname', $firstname, PDO::PARAM_STR);
            $query-> bindValue(':lastname', $lastname, PDO::PARAM_STR);
            $query-> bindValue(':email', $email, PDO::PARAM_STR);
            $query-> bindValue(':message', $message, PDO::PARAM_STR);
            $query-> bindValue(':sendingtimestamp', time(), PDO::PARAM_INT);
            $results = $query->execute(); // $results = true si ok sinon false
            if($results){
                            
            }else{

            }

          // TODO: Definition d'un message de "callback / flashbag" (success ou error)
          // TODO: redirection de l utilisateur vers la page precedente
          
          //echo "On enregistre le message dans la BDD";
        }else{
          // TODO: Definition d'un message de "callback" (error)
          // TODO: redirection de l utilisateur vers la page precedente

          //echo "Erreur sur le formulaire";
        }

        // dump($_POST);
        // dump($firstname);
        // dump($lastname);
        // dump($email);
        // dump($message);

    }else {
          
        // TODO: suppression du else + redirection de l utilisateur
        // TODO: Definition d'un message de "callback" (error)
        // TODO: redirection de l utilisateur vers la page precedente
        echo "Le formulaire ne peut etre traité qu avec la methode POST";
    }
}