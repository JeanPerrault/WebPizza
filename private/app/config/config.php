<?php

/**
 *  Fichier de configuration générale de l'application
 * 
 * 1. Définition des constantes
 * 2. definition des variables d'environnement d'éxécution
 * 3. 
 * 4. 
 * 
 */


/**
 * 1. Définition des constantes
 */

 // definir le chemin du repertoire "utils"
define('UTILS_PATH',"../private/app/utils/");

// WEBSITE_TITLE : definition du titre du site
define('WEBSITE_TITLE', "WebPizza !");

/**
 * 2. definition des variables d'environnement d'éxécution
 */

// Environnement de developpement ou production ?
// les valeurs peuvent etre : "prod" ou "dev"
// par defaut, on considere que l application s'execute en environnement de PROD
$env = "prod";

// liste des domaines que l on considere comme etant des environnements de developpement
$dev_domains = [
    "127.0.0.1",
    "localhost",
    "webpizza.local"
];

/**
 * 3. definition des variables de BDD
 */

// liste des configurations de connexions aux bases de donnees par defaut
$db_config = []; // tableau qui va contenir toutes les infos de connexion a la BDD

// liste des connexions aux BDD
// cette liste sera nourrie par le fichier db_connect.php
$db = [];

// inclusion de la config de la BDD
require_once "database.php";

