<?php 
    // fichier indispensable au fonctionnement du site 

 
    ///////////// CONNEXION À LA BDD //////////////
   

    ////// 1 - Connexion

    $pdoSITE = new PDO('mysql:host=localhost;dbname=site',
    'root',
    '',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ));

    ////// 2 - ouverture de session
    session_start();

    ////// 3 - chemin du site avec une constante

    ////// 4 - variable pour les contenus
    $contenu = '';

    ////// 5 - inclusion des fonctions
    require_once('functions.php');
