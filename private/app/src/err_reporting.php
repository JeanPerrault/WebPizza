<?php

/**
 * fichier de definition du comportement des erreurs PHP
 * 
 * info
 * - http://php.net/manual/fr/function.error-reporting.php
 * 
 */

// dans le cas ou la variable $env n est pas definie
// on initialise la variable $env avec la valeur PROD
if (!isset($env)){ 
    $env = "prod";
}

// dans le cas ou la variable $env est definie a une autre valeur que "dev"
// on demande a PHP d ignorer toutes les erreurs.
if($env != "dev"){
    ini_set('display_errors',0);
    ini_set('display_starup_errors',0);
    error_reporting(0);

// dans le cas ou la variable $env est definie a la valeur "dev"
// on demande a PHP d afficher toutes les erreurs.
} else{
    ini_set('display_errors',1);
    ini_set('display_starup_errors',1);
    error_reporting(E_ALL);
}
