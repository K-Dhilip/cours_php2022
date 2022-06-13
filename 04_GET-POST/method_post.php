<?php 
    require_once('../inc/functions.php');
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

    <title>Cours PHP7 - Exos pratiques - 1</title>

    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="bg-light">
    <!-- JUMBOTRON -->
    <div class="jumbotron bg-dark text-white text-center">
        <h1 class="display-3">Cours PHP7 - La méthode POST</h1>
        <p class="lead">La méthode POST réceptionne les données d'un formulaire, $_POST est une superglobale.</p>
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
                <!-- BOUTON DE LA NAV -->
                <button type="button" id="sidebarCollapse" class="navbar-btn">
                <span></span>
                <span></span>
                <span></span>
                </button>

                <div class="row">
                    <hr>
                    <div class="col-sm-12 col-md-6">
                        <h2 class="col-sm-12 text-center" id="definition">I. Formulaire</h2>
                        <ul>
                            <li>Un formulaire doit toujours être dans une balise <code>&#8249;form></code> pour fonctionner.</li>
                            <li>L'attribut method indique comment les données vont circuler vers le PHP.</li>
                            <li>L'attribut action indique l'URL de destination des données (si l'attribut action est vide, les données vont vers le même script ou la même page).</li>
                            <li>Ensuite sur les names il ne faut pas les oublier sur les formulaires ; ils constituent les indices de $_POST qui réceptionne les données.</li>
                        </ul>

                        <form action="" method="POST" class="w-75 mx-auto">

                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input type="text" class="form-control" id="prenom" placeholder="Prénom" name="prenom" required>
                            </div><!-- fin champs prénom -->

                            <div class="form-group">
                                <label for="">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required>
                            </div><!-- fin champs nom -->

                            <div class="form-group">
                                <label for="">Votre commentaire</label>
                                <textarea class="form-control" id="commentaire" placeholder="Votre commentaire merci..." rows="2" name="commentaire" required></textarea>
                            </div><!-- fin champs commentaire -->

                            <button type="submit" class="btn btn-small btn-info">Envoyer</button>

                        </form><!-- fin du formulaire -->
                        
                    </div><!-- fin col -->

                    <div class="col-sm-12 col-md-6">
                    <h2 class="col-sm-12 text-center"><u> 2. Récupération des données</u></h2>
                    <ul>
                     <li>$_POST est une superglobale qui permet de récupérer les données saisies dans un formulaire</li>
                        <li>$_POST est donc un tableau(array) et il est disponible dans tous les contextes du script</li>
                        <li>le tableau $_POST se remplit de la manière suivante : <code>
                            $_POST = array(<br>
                            'name1' => 'valeur1'<br>
                            'nameN' =>'valeurN'<br>)
                        </code></li>
                        <li>Donc soit name1 ou nameN correspondent aux attributs "name" du formulaire, et où valeur1 et valeurN correspondent aux valeurs saisies par l'internaute.</li>
                    </ul>

                    <?php
                        if(!empty($_POST)){// si $_POST n'est pas vide , c'est qu'il est rempli et donc que le formulaire a été envoyé, notez qu'en l'état on peut l'envoyer avec des champs vides, les valeurs des $_POST étant alors des strings vides. En effet on peut avoir des informations non obligatoires dans un formulaire et les input ne seront donc jamais remplis.
                            // jevardump($_POST);
                            echo "<div class=\"alert alert-success w-100 mx-auto\"><p>Prénom: " .$_POST['prenom']. "</p>";
                            echo "<p>Nom: " .$_POST['nom']. "</p>";
                            echo "<p>Commentaire: " .$_POST['commentaire']. "</p></div>";

                        }
                    ?>

                       
                    </div><!-- fin col -->

                </div><!-- fin de la rangée -->

                <hr>
                <br><br>

            </main>
        </div> <!-- FIN DE LA PARTIE PRINCIPALE COL-8 -->

        <div class="col-sm-2 aside">
            <ul>
                <!-- DES ANCRES POUR LE COURS ET LES EXOS -->
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li></li>
            </ul>
        </div>
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