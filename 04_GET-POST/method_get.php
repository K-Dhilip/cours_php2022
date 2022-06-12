<?php require_once('../inc/functions.php') 

?>
<!doctype html>
<html lang="fr">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- font google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bad+Script&display=swap" rel="stylesheet">

    <title>Cours_php2022 -La Méthode GET</title>
    <!-- Mes styles -->
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <div class="row">
        <div class="jumbotron bg-secondary text-center">
            <h1 class="display-3 pt-3">Cours_php2022 - La Méthode GET</h1>
            <p class="lead">$_GET [] représente les données qui transitent par l'URL</p>
        </div>
    </div>
    <div class="row">

        <?php
        require('../inc/sidenav.inc.php'); //ici on appelle le fichier sidenav.inc.php
        ?>

        <!-- ========================================================= -->
        <!-- Contenu principal -->
        <!-- ========================================================= -->
        <div class="col-sm-8">
            <main class="container-fluid">
                <div class="row">
                    <hr>
                    <h2 class="col-sm-12 text-center" id="definition"><u>1-Introduction</u></h2>
                    <div class="col-sm-12 col-md-6">
                      <p>Il s'agit d'une superglobale et comme toutes les superglobales, cest un tableau.Superglobale signifie que c'est une variable disponible partout dans le script, y compris au sein des fonctions. Les informations transitent dans l'url selon la syntaxe suivante: <code>mapage.php?indice1=valeur1&indiceN=valeurN</code>.</p>
                      <p>Quand on récupère les données , $_GET fabrique un tableau selon le schéma suivant <code>$_GET = array('indice1' => 'valeur1' , 'indiceN' =>'ValeurN');</code>.</p>  
                    </div><!-- fin de la colonne-->
                    <div class="col-sm-12 col-md-6 text-center">
                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <a href="method_get-ex01.php?article=Jean&couleur=bleu&prix=55">
                                    <img src="../img/jean.jpg" alt="Jean bleu" class="img-fluid">Jean bleu
                                </a>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <a href="method_get-ex01.php?article=Robe&couleur=rouge&prix=75">
                                    <img src="../img/robe.jpg" alt="Robe rouge" class="img-fluid">Robe rouge
                                </a>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <a href="method_get-ex01.php?article=Pull&couleur=blanc&prix=45">
                                    <img src="../img/pull.jpg" alt="Pull blanc" class="img-fluid">Pull blanc
                                </a>
                            </div>
                        </div>
                    </div><!-- fin de la colonne -->
                </div><!-- fin de la rangée -->
                
                <hr>
                <br><br>

            </main>
        </div>
        <!-- fin de la partie principale, col-8 -->

    </div>

    <?php
    require('../inc/footer.inc.php'); //ici on appelle le fichier footer.inc.php
    ?>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

    <!-- mon script js pour la navigation -->
    <script src="../inc/sidenav.js"></script>
</body>

</html>
