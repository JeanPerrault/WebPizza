<?php
/**
 * Liste des Produits
 */

// Requete de recup de la liste des produits
$query = $db['main']->query("SELECT id, name, price FROM products");
$results = $query->fetchAll(PDO::FETCH_ASSOC);

// print_r( $results );
?>

<h1>Liste des produits</h1>

<!-- Affiche la liste des article --> 
<?php if ($results): ?>
    <?php foreach($results as $article): ?>
    <h3><?= $article['name'] ?></h3>
    <!-- <div>
        <a href="read.php?id=<?= $article['id'] ?>">
            <?php
            $max = 150;
            $strlen = strlen($article['content']);
            echo substr($article['content'],0,$max);
            if ($strlen > $max) {
                echo "...";
            }
            ?>
        </a>
    </div> -->
    <?php endforeach; ?>
<?php else: ?>
    <div>Aucun produit dans la BDD</div>
<?php endif; ?>

<a href="/admin/product/create">Ajouter un produit</a>