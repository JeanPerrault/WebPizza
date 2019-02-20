<?php


/**
 * 1. integration de la configuration
 */
require_once "../private/app/config/config.php";
/**
 * 2. definition de l'environnement
 */
require_once "../private/app/src/environnement.php";
/**
 * 3. comportement des erreurs
 */
require_once "../private/app/src/err_reporting.php";
/**
 * 4. connection aux bases de donnees
 */
require_once "../private/app/src/db_connect.php";
/**
 * 5. routage de l application
 */
require_once "../private/app/src/routing.php";
/**
 * 6. inclusion des fonctions 'Utils"
 */
require_once "../private/app/src/load_utils.php";
echo randstr(32, false, true)."<br>";
echo randstr(1, true, true)."<br>";
echo randstr(32, true, false)."<br>";
/**
 * 7. compilation de la page
 */
require_once "../private/app/src/compile.php";


