<?php

/**
 * fichier de compilation de l application
 * 
 * Ce fichier genere la page finale HYML avant de retourner le resultat au navigateur
 */

// dans le cas ou la route est vide, on force le programme a redefinir la route 
// vers la page 404
if (empty($route)){
    $route = end($routes); // END : affecte la derniere ligne de $routes
}


/**
 * recuperation des elements de la route qui definissent le controleur
 */

// Si ce parametre est vide, on arrete le programme
if(!isset($route[2]) || empty($route[2])) {
    throw new Execption("Le controleur n'est pas défini.");
}

// initialisation des variables qui definiront le fichier et la fonction a executer
$controller_file = null;    // homepage
$controller_path = null;    // "../private/src/controllers/".$controller_file.".php";
$controller_methode = null; // homepage_index

// recuperation des elements du controleur
$controller = explode(":", $route[2]);

// -- definition du fichier controleur
$controller_file = isset($controller[0]) ? $controller[0] : null;
if ($controller_file !== null && !empty($controller_file)){
    $controller_path = "../private/src/controllers/".$controller_file.".php";
}

// -- definition de la fonction a executer
$controller_methode = isset($controller[1]) ? $controller[1] : null;
if ($controller_methode !== null && !empty($controller_methode)){
    $controller_methode = $controller_file."_".$controller_methode;
}else {
    $controller_methode = $controller_file."_index";
}
// print_r($route[2]);
// echo "<br>";
// var_dump($controller);
// echo "<br>";
// var_dump($controller_file);
// echo "<br>";
// var_dump($controller_path);
// echo "<br>";
// var_dump($controller_methode);

/**
 * integration du fichier controleur
 */
if (!file_exists($controller_path)){
    // si oui le programme est arrete
    throw new Execption("Le fichier controleur de la route \"".$route[0]."\" est manquant.");
}

// le fichier controleur existe, il est inclus au programme
include_once $controller_path;

/**
 * execution de la fonction du controleur
 */

 // test de l existance de la fonction du controleur
 if (!function_exists($controller_methode)){
    throw new Exception("La méthode \"" .$controller_methode." de la route ".$route[0]."\" est manquante.");
 }

 // execution de la fonction 
 $controller_methode();