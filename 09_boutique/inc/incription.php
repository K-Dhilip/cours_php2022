<?php
require_once('./init.php');
jeprint_r($_SESSION);

if (!empty($_POST)) {
    $_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);
    $_POST['mdp'] = htmlspecialchars($_POST['mdp']);
    $_POST['nom'] = htmlspecialchars($_POST['nom']);
    $_POST['prenom'] = htmlspecialchars($_POST['prenom']);
    $_POST['email'] = htmlspecialchars($_POST['email']);
    $_POST['civilite'] = htmlspecialchars($_POST['civilite']);
    $_POST['adresse'] = htmlspecialchars($_POST['adresse']);
    $_POST['code_postal'] = htmlspecialchars($_POST['code_postal']);
    $_POST['ville'] = htmlspecialchars($_POST['ville']);

    $requete = $pdoENT->prepare("INSERT INTO membre(pseudo, mdp, nom, prenom, email, civilite, adresse, code_postal, ville) VALUES (:pseudo, :mdp, :nom, :prenom, :email, :civilite, :adresse, :code_postal, :ville)");

    $requete->execute(array(
        ':pseudo' => $_POST['pseudo'],
        ':mdp' => $_POST['mdp'],
        ':nom' => $_POST['nom'],
        ':prenom' => $_POST['prenom'],
        ':email' => $_POST['email'],
        ':civilite' => $_POST['civilite'],
        ':adresse' => $_POST['adresse'],
        ':code_postal' => $_POST['code_postal'],
        ':ville' => $_POST['ville'],
    ));
}
?>

<!doctype html>
<html lang="fr">

<head>
    <title>La boutique - Inscription</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <main class="container bg-white m-4 mx-auto p-4">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <h1>La boutique</h1>
            </div>
        </div>

    </main>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>