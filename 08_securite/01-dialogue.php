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

    <title>Cours PHP2022 - Base de données "dialogue"</title>

    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="bg-light">
    <!-- JUMBOTRON -->
    <div class="jumbotron bg-dark text-white text-center">
        <h1 class="display-3">Cours PHP2022 - Base de données "dialogue"</h1>
        <p class="lead">La méthode POST réceptionne les données d'un formulaire, $_POST est une superglobale 
        </p>
        
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
            <div class="col-sm-12 col-md-6">
                <form action="?action=envoyer" method="GET">
                    <div class="form-group">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" name="pseudo" placeholder="Votre pseudo doit contenir moins de 20 caractères" id="">
                    </div>
                    <div class="form-group">
                        <label for="commentaire">Entrez votre commentaire</label>
                        <textarea type="text" name="commentaires" placeholder="Veuillez laisser votre commentaire"></textarea>
                    </div>
                    <button type="submit" class="btn btn-secondary">Envoyer</button>
                </form>
            </div> <!-- fin de la colonne -->

            <div class="col-sm-12 col-md-6">
                <p>Création de la BDD "dialogue"</p>
                <ul>
                    <li>Nom de la BDD : dialogue</li>
                    <li>Nom de la table : commentaire</li>
                    <li>Champs : <ol>
                        <li>id_commentaire INT Primary key auto increment</li>
                        <li>pseudo VARCHAR(20)</li>
                        <li>message de type TEXT</li>
                        <li>date_enregistrement DATETIME</li>
                    </ol></li>
                </ul>
                <?php
                    // Connexion à la base de données dialogue
                    $pdoDialogue = new PDO('mysql:host=localhost;dbname=dialogue', 'root',
                    '',
                    array(
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    ));
                    $requete = $pdoDialogue->query("SELECT * FROM commentaire WHERE pseudo = 'Timothée' ");

                    $ligne = $requete->fetch(PDO::FETCH_ASSOC);
                    echo "<ul class='alert alert-success'><li>ID : " . $ligne['id_commentaire'] . "</li><li>Pseudo : " . $ligne['pseudo'] . "</li><li>Message : " . $ligne['message'] . "</li></ul>";             
                    ?>
            </div> <!-- fin de la colonne -->
           
            
                    

                </div><!-- Fin de la rangée -->
                
                <hr>
                    <div class="row">
                        <h2 class="col-sm-12 terxt-center">2-Exercice</h2>
                        <div class="col-sm-12">
                            <p>Compter les commentaires de la BDD dialogue et les afficher dans un tableau.</p>
                            <div class="alert alert-success">
                                <?php
                                $requete = $pdoDialogue->query("SELECT * FROM commentaire");
                                $nbcomment = $requete->rowCount();
                                echo "<p>Il y a " . $nbcomment . " commentaires dans la BDD.</p>";

                                echo "<table class='table table-success table-hover table-striped'>";
                                echo "<thead><tr><th scope='col'>Pseudo</th><th scope='col'>Commentaire</th></tr></thead>";
    
                                while($ligne = $requete->fetch(PDO::FETCH_ASSOC)){
                                    echo "<tr>";
                                    echo "<td><strong>" . $ligne['pseudo'] . "</strong></td>";
                                    echo "<td><i>" . $ligne['message'] . "</i></td>";
                                    echo "</tr>";
                                }
    
                                echo "</table>";
                                    
                                ?>
                            </div>
                        </div>
                    </div>

                <br><br>

            </main>
        </div>

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