<?php
require_once('../inc/functions.php');

session_start(); //permet de créer un fichier de session avec son identifiant ou d'ouvrir la session si l'identifiant existe déjà ou si on a reçu un cookie contenant l'id.
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

    <title>Cours PHP7 -$_SESSION</title>

    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="bg-light">
    <!-- JUMBOTRON -->
    <div class="jumbotron bg-dark text-white text-center">
        <h1 class="display-3">Cours PHP7 - la variable $_SESSION</h1>
        <p class="lead">Une session est un système mis en oeuvre dans le code PHP permettant de conserver sur le serveur, dans un fichier temporaire, des informations relatives à un internaute.

            L'avantage d'une session c'est que les données seront enregistrées dans un fichier sur le serveur disponible et consultable sur l'ensemble des pages durant toute la navigation de l'internaute.</p>


    </div>

    <!-- RANGÉE PRINCIPALE -->
    <div class="row">
        <!-- LA NAVIGATION EN INCLUDE (penser à ajouter le JS qui va avec en fin de page) -->
        <?php
        require('../inc/sidenav.inc.php')

        ?>

        <!-- ============================================================== -->
        <!-- Contenu principal -->
        <!-- ============================================================== -->
        <div class="col-sm-8">
            <main class="container-fluid">

                <div class="row">
                    <hr>
                    <h2 class="col-sm-12 text-center" id="definition">1. Introduction</h2>
                    <div class="col-sm-12">
                        <p>Les données du fichier de session sont accessibles et manipulables à partir de la superglobale $_SESSION</p>
                        <?php
                        $_SESSION['pseudo'] = 'Tintin';
                        $_SESSION['mdp'] = 'Vol747';
                        $_SESSION['email'] = 'tintin@milou.be';

                        echo "<p class=\"alert alert-success\">La session est bien remplie !</p>";
                        jeprint_r($_SESSION);

                        ?>
                        <p>Principe de session: un fichier temporaire appelé session est créé sur le serveur , avec un identifiant unique. Cette session est lié à un internaute dans le même temps avec un cookie est déposé sur le poste de l'internaute avec l'identifiant (au nom PHPSESSID) . Ce cookie est détruit lorsque l'on quitte le navigateur</p>
                        <p>Le fichier de session peut contenir des informations très sensibles!!!! Il n'est donc pas accessible par l'internaute</p>
                        <p>Il est possible de vider une partie de la session avec le code suivant <code>unset($_SESSION['mdp']);</code></p>

                        <?php
                        unset($_SESSION['mdp']);
                        jeprint_r($_SESSION);
                        ?>
                        <p>Pour supprimer automatiquement une session : <code>session_destroy();</code>Il supprime totalement la session ainsi que son fichier temporaire. </p>


                        <?php
                        session_destroy();
                        jeprint_r($_SESSION);
                        ?>

                        <p>Nous avons effectué un session_destroy() mais il n'est exécuté qu'à la fin de notre script. Nous voyons encore ici le contenu de la session mais le fichier temporaire dans le dossier Temp a bien été supprimé. ce fichier contient les infos de session et elles sont accessibles à <code>session_start()</code> </p>
                        <p>Si on a besoin des informations de cette page, le code <code>session_start()</code>devra être placé au début de la page</p>

                        <?php
                        
                         if(isset($_SESSION['pseudo']))   {
                            echo "Votre pseudo est :". $_SESSION['pseudo']. "<br>";
                         }
                         else{
                            echo '<form method="post" action="">
                            <label for="pseudo">Pseudo:</label><br>
                            <input type="text" name="pseudo" value= ""><br>
                            <input type="submit"value="Envoyez">
                            </form>';
                         }
                        ?>



                    </div><!-- fin de la col-->

                </div><!-- fin de la rangée (row)-->
                <hr>
                <br><br>

            </main>
        </div> <!-- FIN DE LA PARTIE PRINCIPALE COL-8 -->

    </div>

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