<?php
    require_once('../inc/functions.php');



    if (!empty($_POST)){
        echo"<p> Prénom : " .$_POST['prenom']. "</p>";
        echo"<p> Nom : " .$_POST['nom']. "</p>";
        echo"<p> commentaire : " .$_POST['commentaire']. "</p>";

        // on va écrire le contenu de la superglobale dans un fichier texte en l'absence de BDD
        $fichier = fopen('formulaire.txt', 'a');// fopen() en mode "a" permet de créer un fichier s'il n'existe pas encore , sinon cela permet de l'ouvrir
        $donneeformulaire = $_POST['prenom']. " " .$_POST['nom'] ." " . $_POST['commentaire']. "\n"; // \n pour faire des sauts de ligne dans le .txt
        fwrite($fichier, $donneeformulaire);
    }
?>