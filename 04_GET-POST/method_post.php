<?php
require_once('../inc/functions.php')
?>

<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bad+Script&display=swap" rel="stylesheet">

    <title>Cours_PHP2022-la méthode $_POST</title>

    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="bg-dark">
    <!-- JUMBOTRON -->
    <div class="jumbotron  text-center">
        <h1 class="display-3">Cours_PHP2022 - Méthode POST</h1>
        <hr>
        <p class="lead bg-light">La méthode POST réceptionne les données d'un formulaire, $_POST est une superglobale</p>
    </div>
    <!-- RANGEE PRINCIPALE -->
    <div class="row bg-light">
        <!-- La barre de navigation en include (penser à toujours ajouter le JS en fin de page)    --->
        <?php
        require('../inc/sidenav.inc.php');
        ?>
        <!-- ============================================================== -->
        <!-- Contenu principal -->
        <!-- ============================================================== -->
        <div class="col-sm-8">
            <main class="container-fluid">
                <div class="row">
                    <hr>
                    <h2 class="col-sm-12 text-center" id="definition"><u>1- Formulaire</u></h2>
                    <ul>
                        <li>Un formulaire doit toujours être dans une balise <code>form</code> pour fonctionner.</li>
                        <li>L'attribut method indique comment les données vont circuler vers le PHP.</li>
                        <li>L'attribut action indique l'URL de destination des données (si l'attribut est vide, les données vont vers le même script ou la même page).</li>
                        <li>Ensuite sur les names il ne faut pas les oublier sur les formulaires: ils constituent les indices de $_POST qui réceptionne les données.</li>
                    </ul>

                    <form action="../05_exos/method_form_traitement.php" method="POST" class="w-75 mx-auto">
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" required>
                        </div><!-- Fin champs prénom -->

                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div><!-- Fin champs nom -->

                        <div class="form-group">
                            <label for="commentaire">Commentaire</label>
                            <textarea class="form-control" id="commentaire" row="2" name="commentaire" required></textarea>
                        </div><!-- Fin champs commentaire -->

                        <button type="submit" class="btn btn-info">Envoyer</button>

                    </form>


                </div><!-- Fin de la rangée -->

                <hr>
                <br><br>

                <?php
                // jevar_dump($_POST);
                ?> 

            </main>
        </div>


    </div>
    <!-- FIN DU CONTENU PRINCIPAL -->
    <!-- LE FOOTER EN REQUIRE -->
    <?php
    require("../inc/footer.inc.php")
    ?>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

    <!-- le js pour la navigation  -->
    <script src="../inc/sidenav.js"></script>

</body>

</html>