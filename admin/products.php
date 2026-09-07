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
            var_dump($products);
        ?>
    </div>
</body>
</html>