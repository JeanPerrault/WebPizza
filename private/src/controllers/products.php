<?php
/**
 * fichier qui gere la page products
 */
 /**
  * index
  */

  function products_pizzas(){
      // integration de la vue
      include_once "../private/src/views/products/pizzas.php";
  }

  function products_salads(){
    // integration de la vue
    include_once "../private/src/views/products/salads.php";
}

function products_desserts(){
    // integration de la vue
    include_once "../private/src/views/products/desserts.php";
}

function products_drinks(){
    // integration de la vue
    include_once "../private/src/views/products/drinks.php";
}

function products_menus(){
    // integration de la vue
    include_once "../private/src/views/products/menus.php";
}