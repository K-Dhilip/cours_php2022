<?php

// 1- la fonction print_r

function jeprint_r($mavariable){
    echo "<small class=\"bg-primary text-white p-2\">print_r :</small><pre class=\"alert alert-primary w-50\">";
    print_r($mavariable);
    echo "</pre>";
}

// 2- fonction pour éxécuter les prepare()

function executeRequete($requete, $parametres = array()){
    foreach($parametres as $indice => $valeur){
        $parametres[$indice] = htmlspecialchars($valeur); // on évite les injections SQL
        global $pdoSITE; // global va nous permettre d'accéder à la variable $pdoSITE et de dire qu'elle devient globale
        $resultat = $pdoSITE->prepare($requete); // on prépare la requête
        $success = $resultat->execute($parametres); // on éxécute celle-ci
        if($success === false){
            return false; // si la requete ne s'éxécute pas
        }else{
            return $resultat; 
        } // fin if else 
    }
} // fermeture de la fonction executeRequete

?>