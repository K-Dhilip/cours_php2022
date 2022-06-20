<?php

// 1 - fonction print_r
function jeprint_r($mavariable)
{
    echo "<small class=\"bg-primary text-white p-2\">print_r :</small><pre class=\"alert alert-primary w-75\">";
    print_r($mavariable);
    echo "</pre>";
}

//  2 - fonction pour exécuter les prepare()
function executeRequete($requete, $parametres = array())
{ //pour toutes les requêtes du site
    foreach ($parametres as $indice => $valeur) {
        $parametres[$indice] = htmlspecialchars($valeur); // on vite les injections SQL
        global $pdoSITE; // global nous permet d'accéder à la variable $pdoSITE et de dire qu'elle devient globale
        $resultat = $pdoSITE->prepare($requete); // puis prepare le requête
        $succes = $resultat->execute($parametres); // puis exécute la requête
        if ($succes === false) {
            return false; // si la requête  n'a pas marché je renvoie false
        } else {
            return $resultat;
        } // fin if else 
    }
}// fermeture fonction executeRequete
