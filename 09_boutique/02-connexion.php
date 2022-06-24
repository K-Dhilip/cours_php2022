<?php
require_once('inc/init.php');
// jeprint_r($_SESSION);
?>

<!doctype html>
<html lang="fr">

<head>
    <title>La boutique - connexion</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <main class="container bg-white m-4 mx-auto p-4">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h1>La boutique - Connectez-vous</h1>
                <form action="" method="POST" class="w-75 mx-auto">
                    <div class="form-group">
                        <label for="pseudo">Pseudo</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-group" name="pseudo" id="pseudo" placeholder="Ici, votre pseudo" required>
                        <?php
                        // echo $_POST['pseudo'] ?? '';
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="mdp">Mot de passe</label>
                        <input type="password" class="form-group" name="mdp" id="mdp" placeholder="veuillez renseigner votre mot de passe, n'oubliez pas les majuscules" required>
                        <?php
                        // echo $_POST['mdp'] ?? '';
                        ?>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-secondary my-2">
                    </div>
                </form>
            </div>
        </div> <!-- fin de la row -->


    </main>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>