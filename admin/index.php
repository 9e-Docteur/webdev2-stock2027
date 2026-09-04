<?php 
    require "../config/session.php";

    $erreurLogin = "";
    $erreurPassword = "";
    $_SESSION['form-login']="";
    // vérification de la méthode donc si formulaire envoyé
     if($_SERVER['REQUEST_METHOD'] == "POST"){
        // vérification que le formulaire à envoyé la donnée CSRF_TOKEN + presésence de la session et comparaison
         if(isset($_SESSION['csrf_token'], $_POST['csrf_token']) AND hash_equals($_SESSION['csrf_token'],$_POST['csrf_token'])){
            // nettoyage des données
            $login = trim($_POST['login'] ?? "");
            $password = trim($_POST['password'] ?? "");

            // vérification des données
            if(empty($login)){
                $erreurLogin = "<div class='alert alert-danger'>Veuillez remplir le login</div>";
            }else{
                $_SESSION['form-login'] = $login;
            }

            if(empty($password)){
                $erreurPassword = "<div class='alert alert-danger'>Veuillez remplir le password</div>";
            }

            if(empty($erreurLogin) && empty($erreurPassword))
            {
                // vérification de la présence dans la bdd du login

            }


            // comparaison pour le mot de passe

         }
    }




?>
<!DOCTYPE html>
<html lang="fr">
<?php include("partials/head.php"); ?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <h1>Connexion - Administration</h1>
                <form action="index.php" method="POST">
                    <?php 
                        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
                    ?>
                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                    <div class="form-group my-3">
                        <label for="login">Login: </label>
                        <input type="text" name="login" id="login" class="form-control" value="<?= $_SESSION['form-login'] ?>">
                        <?= $erreurLogin ?>
                    </div>
                    <div class="form-group my-3">
                        <label for="password">Mot de passe: </label>
                        <input type="password" name="password" id="password" class="form-control">
                        <?= $erreurPassword ?>
                    </div>
                    <div class="form-group my-3">
                        <input type="submit" value="Connexion" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>