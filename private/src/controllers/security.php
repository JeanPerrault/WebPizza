<?php
/**
 * fichier qui gere la page de securite
 */

 /**
  * index
  */

function security_login(){
      // - Récupération des données du formulaire

// On test la méthode
if ($_SERVER['REQUEST_METHOD'] === "POST")
{
    $isValid = true;

    // Récup des données
    $email          = isset($_POST['email']) ? trim($_POST['email']) : null;
    $password_text  = isset($_POST['password']) ? $_POST['password'] : null;

    // Est ce que un utilisateur correspond à l'adresse $email
    $q = $db->prepare("SELECT id, fullname, email, password FROM users WHERE email=:email");
    $q->bindValue(':email', $email, PDO::PARAM_STR);
    $q->execute();

    $r = $q->fetchAll(PDO::FETCH_ASSOC);


    // Si $r est un tableau vide, => L'UTILISATEUR N'EST PAS ENREGISTRE DANS LA BDD
    if (empty($r)) {
        $isValid = false;
    }

    // Si l'utilisateur a ete trouvé dans la BDD
    // On compare le mot de passe saisi et celui de la BDD
    if ($isValid) 
    {
        if (password_verify( $password_text, $r[0]['password'] )) 
        {
            // Suppression du MDP du resultat de la requete
            unset($r[0]['password']);

            // Ajouter les informations utilisateur dans la $_SESSION
            $_SESSION['user'] = $r[0];

            // Redirige l'utilisateur
            header("location: a.php");
            exit;

        }
        else {
            $isValid = false;
        }
    }

    if (!$isValid) {
        echo "oops, mauvais identifiants....";
    }
}
      // integration de la vue
      include_once "../private/src/views/security/login.php";
  }

  function security_register(){
      /**
   * Page d'inscription
   */
  
  // Ajout de la config
//   include_once "config.php";
  
  $firstname = null;
  $lastname = null;
  $email = null;
  
  // - Récupération des données du formulaire
  
  // On test la méthode
  if ($_SERVER['REQUEST_METHOD'] === "POST") {
  
      $isValid = true;
  
      // Récupération des données 
      $firstname      = isset($_POST['firstname']) ? trim($_POST['firstname']) : null;
      $lastname       = isset($_POST['lastname']) ? trim($_POST['lastname']) : null;
      $email          = isset($_POST['email']) ? trim($_POST['email']) : null;
      $password_text  = isset($_POST['password']) ? $_POST['password'] : null;
      $password_hash  = password_hash($password_text, PASSWORD_DEFAULT);
      // http://php.net/manual/fr/function.password-hash.php
      
  
      // Controle du formulaire
      // if (xxxx) {
      //     $isValid = false;
      // }
  
  
      // Verification de l'unicité de l'utilisateur
      $q = $db->prepare("SELECT id FROM users WHERE email=:email");
      $q->bindValue(':email', $email, PDO::PARAM_STR);
      $q->execute();
      
      $r = $q->fetchAll();
  
      // Si $r contient au moins un résultat, on stop le processus d'inscription
      if (!empty($r)) {
          $isValid = false;
      }
  
  
      // Enregistrement des données dans la BDD
      if ($isValid) {
          // Préparation de la requete
          $q = $db->prepare("INSERT INTO users (`firstname`, `lastname`, `email`, `password`) 
                                   VALUES (:firstname , :lastname , :email , :password)");
          $q->bindValue(':firstname', $firstname, PDO::PARAM_STR);
          $q->bindValue(':lastname', $lastname, PDO::PARAM_STR);
          $q->bindValue(':email', $email, PDO::PARAM_STR);
          $q->bindValue(':password', $password_hash, PDO::PARAM_STR);
  
          // Execution de la requete
          $r = $q->execute();
  
          // Si la requete est un succès
          if ($r) { // $r === true
              header("location: login.php");
              exit;
          }
          else {
              echo "oops, les données n'ont pas été enregistrées dans la BDD !";
              exit;
          }
      }
      else {
          echo "oops, erreur sur le form !";
          // exit;
      }
  
  
  }
  
    // integration de la vue
    include_once "../private/src/views/security/register.php";
}

function security_forgotten_password(){
    // - Récupération des données du formulaire

// On test la méthode
if ($_SERVER['REQUEST_METHOD'] === "POST")
{
    // Recup la donnée du formulaire
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;

    // Est ce que l'adresse email existe dans la BDD
    $q = $db->prepare("SELECT id FROM users WHERE email=:email");
    $q->bindValue(':email', $email, PDO::PARAM_STR);
    $q->execute();

    $r = $q->fetchAll(PDO::FETCH_ASSOC);

    // Si l'adresse email a ete trouvée, l'utilisateur existe
    if (!empty($r)) {
        // On demarre le processus de renouvellement de mot de passe

        // Generation du token
        $token = md5( $email.microtime(true) );

        // Association du $token à l'utilisateur
        $q = $db->prepare("UPDATE users SET pwd_token=:token WHERE id=:id");
        $q->bindValue(':token', $token, PDO::PARAM_STR);
        $q->bindValue(':id', $r[0]['id'], PDO::PARAM_INT);
        $q->execute();

        // Generation de l'email
        $url = "http://site-a.local/security/renew_pwd.php?t=".$token;

        // Envois de l'email
        // mail($to, $subject, $body, $header);
        // mail($email, "Renouvellement du MDP", "Bla bla bla\n".$url);

        echo '<a href="'.$url.'">'.$url.'</a>';
        
        exit;
    }

    // Si l'adresse email n'a pas été trouvée, on affiche un message d'erreur
    else {
        echo "Ooops, aucun compte ne correspond à cette adresse email";
    }
}
    // integration de la vue
    include_once "../private/src/views/security/forgotten_pwd.php";
}