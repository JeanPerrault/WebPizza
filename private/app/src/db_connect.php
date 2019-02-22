<?php
/**
 * Fichier de connexions aux base de sonnées
 * - http://php.net/manual/fr/class.pdo.php
 * 
 * 
 * Instance PDO - Exemple 1
 * Passage de paramètres au constructeur :
 * ---
 * $pdo = new PDO('mysql:host=localhost;dbname=DBNAME', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
 * 
 * 
 * Instance PDO - Exemple 2
 * construction de objet, puis passage de paramètres à PDO::setAttribute() :
 * ---
 * $pdo = new PDO('mysql:host=localhost;dbname=DBNAME', 'root', '');
 * $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
 */

// dans le cas ou la variable $db_config n est pas defini (dans le fichier config.php)
// on initialise la variable $db_config avec un tableau vide
if (!isset($db_config)){
    $db_config= [];
}

// on boucle sur la liste de config des connexions aux BDD
// print_r($db_config);
foreach($db_config as $name => $params){
    // print_r($name);
    // echo "<br>";
    // print_r($params['type']);
    // echo "<br>";

    // genere la chaine DSN (Domain Source Name) PDO 'ex : 'mysql:host=localhost;dbname=DBNAME')
    $db_dsn = $params['type'].":";
    $db_dsn.= "host=". $params['host'].";";
    $db_dsn.= "port=". $params['port'].";";
    $db_dsn.= "dbname=". $params['schema'].";";
    $db_dsn.= "charset=". $params['charset'].";";

    // nom de l utilisateur de la BDD
    $db_user = $params['user'];
    
    // mot de passe de l utilisateur de la BDD
    $db_pass = $params['pass'];

    // instance de connexion
    $db[$name] = new PDO($db_dsn, $db_user, $db_pass);

    // comportement des erreurs PDO
    if($env == "dev"){
        $db[$name]->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    

    // echo $db_dsn;
}
// // pour tester 
// $str = "SELECT * FROM ingredients";
// $q = $db['main']->query($str);
// $r = $q->fetchALL();
// var_dump($r);

