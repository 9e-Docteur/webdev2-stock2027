<?php 
    require "../config/session.php";
    
    if(!isset($_SESSION['email']) || !isset($_SESSION['id'])){
        header("Location: ../403.php");
        exit();
    }

    require_once "../config/connexion.php";
    require "functions.php";
?>

<!DOCTYPE html>
<html lang="fr">
<?php include("partials/head.php"); ?>
<body>
    <?php include("partials/nav.php"); ?>
    <div class="container-fluid">
        <h1>Gestion des produits</h1>
        <?php
            $products = fetchAll($bdd, "SELECT * FROM products");
        ?>
        <a href="addProduct.php" class="btn btn-primary my-3">Ajouter un produit</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="col-3 text-center">id</th>
                    <th class="col-3 text-center">nom</th>
                    <th class="col-3 text-center">prix</th>
                    <th class="col-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($products as $product) : ?>
                    <tr>
                        <td class="text-center"><?= $product['id'] ?></td>
                        <td class="text-center"><?= htmlspecialchars($product['name']) ?></td>
                        <td class="text-center"><?= $product['prix'] ?>€</td>
                        <td class="text-center">
                            <a href="updateProduct.php?id=<?= $product['id'] ?>" class="btn btn-warning mx-3">Modifier</a>
                            <a href="products.php?delete=<?= $product['id'] ?>" class="btn btn-danger mx-3">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>