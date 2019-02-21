<?php

/**
 * fichier de routage de l application
 * 
 *  
 *      - le nom de la route
 *      - le "path"
 *      - le "controller", la fonction declenchée par la route
 *      - la/les methode(s)
 */

// dans le cas ou la variable $routes n est pas definie (dans le fichier routes.php)
if (!isset($routes)){
   $routes = [];
}

 // recuperation de l uri courant
if (!empty($_SERVER['REQUEST_URI'])){
    $uri = $_SERVER['REQUEST_URI'];
}

// echo "<h3>Avant la boucle</h3>";
// var_dump($route);
// echo "<br>";

// recherche de l uri dans le tableau de routage
foreach($routes as $route){
    // le parametre "path" doit correspondre à $uri
    if ($route[1] == $uri){

        // on ajoute le nom de la route courante dans la variable $GLOBALS de PHP
        // pour l utiliser par la suite
        $GLOBALS['route_active'] = $route[0];

        // echo "<h3>Dans la boucle</h3>";
        // var_dump($route[1]);
        // echo "<br>";

        // si la route est trouvée dans la table de routage on sort de la boucle
        // grace au mot cle "break"
        // la variable $route contient les infos de la derniere iteration de la boucle
        break;
    }
    
}
// echo "<h3>Apres la boucle</h3>";
// var_dump($route);
// echo "<br>";
var_dump($route);
// a ce niveau soit la variable $route est renseignée grace à un uri trouvé
// dans le tableau $route, soit elle a pris la valeur de la derniere iteration
// du tableau $route, C.A.D. la route 404
// var_dump($route);

if (!isset($GLOBALS['route_active'])){
    $GLOBALS['route_active'] = "error-404";
}