<?php
/**
 *  fichier de definition de l environnement d'execution de l application
 */

 // dans le cas ou la variable $dev_doùains n est pas defini (dans le fichier config.php)
 // on initialise la variable $dev_domains avec un tableau vide

if (!isset($dev_domains)){ // isset : on teste si la variable n existe pas
    $dev_domains = [];
}

// si la super globale $_server['SERVER_NAME] n 'est pas vide
// ET que la valeur de la super globale $_server['SERVER_NAME] est 
// dans le tableau $dev_domains, alors on redefinit la variable $env

// si la valeur de $_SERVER['SERVER_NAME'] n est pas vide ET $_SERVER['SERVER_NAME'] est contenu dans le tableau $dev_domains, on est en dev
if (!empty($_SERVER['SERVER_NAME']) && in_array($_SERVER['SERVER_NAME'], $dev_domains)){
    $env = "dev";
}


// echo "---------<br>";
// echo "Valeur de \$env =".$env; 
