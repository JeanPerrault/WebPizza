<?php

/**
 * fichier de definition des routes de l application
 * 
 * - chaque ligne du tableau $routes definit une route
 * - chaque route est definie par
 *      - le nom de la route
 *      - le "path"
 *      - le "controller", la fonction declenchée par la route
 *      - la/les methode(s)
 */

$routes = [
    //route index (page d'acceuil du site)
    // homepage:index veut dire que dans le fichier "homepage.php", il y a une fonction "homepage_index"
    ["homepage", "/", "homepage:index", ["HEAD","GET"]], 
    // page de contact
    ["contact", "/contact", "contact:index",["HEAD","GET"]],


    // ---


    // Erreur 404
    // /!\ TOUJOURS EN DERNIER DU TABLEAU ROUTE
    ["error-404", "/404", "error:404", ["HEAD","GET"]]


];