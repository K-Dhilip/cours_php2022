<?php

    $host = 'localhost';
    $database = 'site';
    $user = 'root';
    $psw = '';

    $pdoSITE = new PDO('mysql:host=' .$host. ';dbname=' .$database, $user, $psw);
    $pdoSITE->exec('SET NAMES utf8');
    // echo 'coucou';
    $requete = $pdoSITE->query("SELECT * FROM membre");
    $ligne = $requete->fetch(PDO::FETCH_ASSOC);

    require_once('functions.php');

    echo "<p>Les infos de notre premier memebre:</p>";
    echo "<ul>";
    echo "<li>Prénom : " .$ligne['prenom'] . "</li><li>Nom : ".$ligne['nom']."</li><li>Pseudo : " .$ligne['pseudo']."</li><li>Adresse : ".$ligne['adresse']. "</li><li>Code postal : ".$ligne['code_postal']."</li><li>Sexe : ";
    
    if ($ligne['civilite'] == 'f'){
        echo "Féminin";
    }else {
        echo "Masculin";
    }
    echo "</li></ul>";

?>