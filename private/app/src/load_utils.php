<?php

/**
 * fichier de chargement automatique des scripts du repertoire /private/app/utils
 */
 
// Test si la constante UTILS_PATH n est pas definie
if(!defined('UTILS_PATH')){
    define('UTILS_PATH',null);
}

if(UTILS_PATH != null){
    // Scanner le repertoire UTILS_PATH
    $utils_scan = scandir(UTILS_PATH);
    var_dump($utils_scan);
    // une boucle sur la liste des entrees $utils_scan
    foreach($utils_scan as $key => $value) // si on a besoin des cles
    {
        // je recherche dans $value les fichiers qui se terminent par .php
        if(preg_match("/\.php$/", $value)) 
        {
            include_once UTILS_PATH.$value;
        }
        
        
    }
}
// foreach($utils_scan as $value){ // si on n a pas besoin des cles
//     echo " -- ".UTILS_PATH.$value."<br>";
// }

  //var_dump($utils_scan);