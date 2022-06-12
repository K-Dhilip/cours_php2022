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

    <title>Cours PHP7 - PDO</title>

    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="bg-light">
    <!-- JUMBOTRON -->
    <div class="jumbotron bg-dark text-white text-center">
        <h1 class="display-3">Cours PHP7 - PDO</h1>
        <p class="lead">La variable "$pdo" est un objet qui représente la connexion à une BDD</p>


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
                    <h2 class="col-sm-12 text-center" id="definition">1. Connexion à la BDD</h2>
                    <div class="col-sm-12">
                        <p><abbr title="PHP Data Object">PDO</abbr> est l'accronyme de PHP Data Object</p>

                        <?php
                        $pdoENT = new PDO(
                            'mysql:host=localhost;dbname=entreprise', //on a en premier lieu le driver mysql(IBM,ORACLE, ODBC ...), le nom du serveur , le nom de la BDD
                            'root', // l'utilisateur pour la BDD
                            '', // si vous êtes sur MAC il y a un mdp = 'root'
                            array(
                                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, /// cette ligne sert à afficher les erreurs SQL dans le navigateur
                                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', //Pour définir le charset des échanges avec la BDD
                            )
                        );

                        //    jevar_dump($pdoENT); // L'objet est vide car il n'y a pas de propriétés
                        //   jevar_dump( get_class_methods($pdoENT)); // permet d'afficher la liste des méthodes présentes dans l'objet PDO
                        ?>
                    </div><!-- fin de col -->

                    <div class="col-sm-12">
                    <hr>
                    <br><br>
                        <h2 class="text-center"><span>2-</span>Faire des requêtes avec <code>exec()</code></h2>
                        <p>La methode exec() est utilisée pour faire des requêtes qui ne retournent pas de résultats : INSERT , UPDATE , DELETE</p>
                        <p>Valeurs de retour : <br>
                            Succès : dans le jevar_dump de $requête on aura le nombre de lignes affectées par la requête , 3 delete = int(3) <br>
                            Echec : false = 0
                        </p>
                        <?php

                        //   "INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Jean', 'Bernard', 'm', 'informatique', '2021-03-18', 2000)"; 

                        // $requete = $pdoENT->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Cathy', 'Kane', 'f', 'comptabilite', '2021-03-23', 3000)"); // on la commente pour ne pas insérer cette insérer cette requête à chaque fois que l'on rafraîchit la page

                        echo "<p>Dernier id généré en BDD :"
                            . $pdoENT->lastInsertId(). "
                            .</p>";
                            $requete = $pdoENT->exec( "DELETE FROM employes WHERE prenom ='Jean' AND nom='Bernard'" );
                            ?>
                    </div><!--fin de la col-->
                   
                    <div class="col-sm-12">
                    <hr>
                    <br><br>
                        <h2 class="text-center"><span>3-</span>Faire des requêtes avec <code>query()</code></h2>
                        <p><code>query()</code>est utilisée pour faire des requêtes qui retournent un ou plusieurs résultats :SELECT mais aussi DELETE UPDATE et INSERT</p>
                       <p> En cas de succès : query() retourne un nouvel objet qui provient de la classe PDOstatement. <br> En cas d'échec : false</p>
                        <ul>
                            <li>Pour information, on peut mettre les paramètres () de fetch ()</li>
                            <li>PDO ::FETCH_NUM : pour obtenir un tableau aux indices numériques</li>
                            <li>PDO :: FETCH_OBJ : pour obtenir un dernier objet</li>
                            <li>Ou encore des () vides ; pour obtenir un mélange de tableau associatif et numérique</li>
                        </ul>

                        <?php
                            //1- on demande des informations à la BDD car il ya un ou plusieurs résultats avec query()
                            $requete = $pdoENT->query("SELECT * FROM employes WHERE prenom ='Emilie' " );
                            // jevar_dump($requete);

                            //2- dans cet objet $requete, nous ne voyons pas encore les données concernant Emilie pourtant elles s'y trouvent. Pour y acceder , nous devons utiliser une methode de $requete qui s'appelle fetch()

                            $ligne = $requete->fetch(PDO::FETCH_ASSOC);
                            //3- avec cette methode fetch on transforme l'objet $requete
                            //4- fetch(), avec le paramètre PDO::FETCH_ASSOC permet de transformet l'objet de la requête $requête en un array associatif appelé ici $ligne : on y trouve en indice le nom des champs de la requête SQL
                            
                           
                            // jevar_dump($ligne); 
                          
                           
                            echo "<ul><li>Id : " .$ligne['id_employes']. "<li>Prénom :" .$ligne['prenom']. "</li><li>Nom :" .$ligne['nom']. "</li><li>Sexe :" .$ligne['sexe']. "</li><li>Service :" .$ligne['service']. "</li><li>Date d'entrée dans l'entreprise :" .$ligne['date_embauche']. "</li><li>Salaire :" .$ligne['salaire']. " €</li></ul>";

                            // exo afficher le service de l'employé dont l'ID est 417 ainsi que son nom et son prenom

                            $requete = $pdoENT->query("SELECT id_employes,service, prenom, nom FROM employes WHERE id_employes = '417' ");
                            $ligne = $requete->fetch( PDO::FETCH_ASSOC );
                            // jeprint_r($ligne);
                            echo "<ul><li>ID:" .$ligne['id_employes']. "</li><li>Service:" .$ligne['service']. "</li><li>Prénom :" .$ligne['prenom']. "</li><li>Nom :" .$ligne['nom']. "</li>";
                            jeprint_r($ligne);
                            ?>
                    </div><!--fin de col-->

                    <div class="col-sm-12">
                    <hr>
                    <br><br>
                        <h2 class="text-center"><span>4-</span>Faire des requetes avec <code>query()</code>  et afficher plusieurs résultats</h2>
                        <?php
                            $requete = $pdoENT->query("SELECT * FROM employes ORDER BY prenom");
                            // jevar_dump($requete);
                            // $ligne = $requete->fetchAll(PDO::FETCH_ASSOC);
                            // jevar_dump($ligne);

                            $nbr_employes = $requete->rowCount();//cette methode rowCount() permet de compter le nombre d'enregistrements retournés par la requête

                            // jevar_dump($nbr_employes);

                            echo"<p>Il y a " .$nbr_employes. " employés dans notre BDD.</p>";

                            // comme nous avons plusieurs résultats dans $requete, nous devons faire une boucle pour les parcourir
                            //fetch() va chercher la ligne suivante du jeu de resultat à chaque tour de boucle et le transforme en objet . La boucle while permet de faire avancer le curseur dans l'objet. Quand il arrive à la fin , fetch() retourne FALSE et la boucle s'arrete

                            echo "<ul>";
                            while($ligne = $requete->fetch(PDO::FETCH_ASSOC)){
                                echo "<li>".$ligne['prenom']." - ".$ligne['nom']." - ".$ligne['sexe']." - ".$ligne['service']." - ".$ligne['date_embauche']." - ".$ligne['salaire']. " €</li>";
                            }
                            echo "</ul>";
                            // Exo afficher la liste des différents services dans une ul en mettant un service par li

                            $requete = $pdoENT->query("SELECT DISTINCT(service) FROM employes ORDER BY service");
                            $nbr_services = $requete->rowCount();

                            echo "<div class=\"bg-info rounded w-50 text-white mt-4 mx-auto\">";
                            echo "<p class=\"p-2 text-white\">Il y a " .$nbr_services. " services dans l'entreprise : </p>";
                            echo "</div>";

                            echo "<div class=\"border border-info rounded w-50 pt-3 mx-auto\">";
                            echo "<ul>";
                            while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)){
                                echo "<li>".$ligne['service']. "</li>";
                            }

                            echo "</ul>";
                            echo "</div>";

                            // <!-- EXO 1/ dans un h2, compter le nombre d'employés
                            // 2/ puis afficher toutes les informations des employés dans un tableau HTML triés par ordre alphabétique de nom
                        ?>
                    </div>



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