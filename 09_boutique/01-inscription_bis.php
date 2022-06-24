<?php 
    require_once('inc/init.php');
    // jeprint_r($_SESSION);

    if ( !empty($_POST)) {
       
        if (!isset($_POST['pseudo']) || strlen($_POST['pseudo']) < 8 ||  strlen($_POST['pseudo']) > 20) {
            $contenu .="<div class=\"alert alert-danger\">Le pseudo doit contenir entre 8 et 20 caractères !</div>"; // si indice pseudo inférieur à 8 caractères ou supérieur à 20 on affiche ce message
        } // fin pseudo

        if (!isset($_POST['mdp']) || strlen($_POST['mdp']) < 8 ||  strlen($_POST['mdp']) > 12) {
            $contenu .="<div class=\"alert alert-danger\">Le mot de passe doit contenir entre 8 et 12 caractères !</div>"; 
        } // fin mot de passe

        if (!isset($_POST['nom']) || strlen($_POST['nom']) < 2 ||  strlen($_POST['nom']) > 20) {
            $contenu .="<div class=\"alert alert-danger\">Le nom doit contenir entre 2 et 20 caractères !</div>"; 
        } // fin nom

        if (!isset($_POST['prenom']) || strlen($_POST['prenom']) < 2 ||  strlen($_POST['prenom']) > 20) {
            $contenu .="<div class=\"alert alert-danger\">Le prénom doit contenir entre 2 et 20 caractères !</div>";
        } // fin prénom

        if (!isset($_POST['email']) || strlen($_POST['email']) > 50 || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
            $contenu .='<div class="alert alert-danger">Votre email n\'est pas conforme.</div>';
        }// fin email

        if (!isset($_POST['civilite']) || $_POST['civilite'] !='f' && $_POST['civilite'] != 'm' ) {
            $contenu .="<div class=\"alert alert-danger\">Cette civilité n'est pas valable.</div>";
        }// fin civilité

        if (!isset($_POST['adresse']) || strlen($_POST['adresse']) < 8 ||  strlen($_POST['adresse']) > 60) {
            $contenu .="<div class=\"alert alert-danger\">L'adresse doit contenir entre 8 et 60 caractères !</div>"; 
        } // fin adresse

        if (!isset($_POST['code_postal']) || !preg_match( '#^[0-9]{5}$#', $_POST['code_postal']) ) {
            $contenu .="<div class=\"alert alert-danger\">Le code postal n'est pas valable</div>"; // est ce que le code postal correspond à l'expression régulière précisée, le regex 'regular rexpression'
        }// fin code_postal
        
        if (!isset($_POST['ville']) || strlen($_POST['ville']) < 1 ||  strlen($_POST['ville']) > 20) {
            $contenu .="<div class=\"alert alert-danger\">La ville doit contenir entre 1 et 20 caractères !</div>"; 
        }// fin ville

        if(empty($contenu)) { // si la variable est vide il n'y a pas d'erreur sur le formulaire
            $membre = executeRequete ( " SELECT * FROM membre WHERE pseudo = :pseudo ", array(':pseudo' => $_POST['pseudo']));
            if ($membre->rowCount() > 0) { // si la requête retourne des lignes c'est que le pseudo existe déjà
                $contenu .= '<div class="alert alert-danger">le pseudo est indisponible veuillez en choisir un autre</div>';
            } else { // si on inscirt le membre en BDD
                $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);// cette fonction prédéfinie permet de crypter le mot de passe selon l'algorithme actuel "bcrypt".  Il faudra lors de la connexion comparer le hash de la BDD avec celui du mdp de l'intérieur

                $succes = executeRequete(" INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, adresse, code_postal, ville,  statut) VALUES (:pseudo, :mdp, :nom, :prenom, :email, :civilite, :adresse, :code_postal, :ville,  0)", 
                array(
                    ':pseudo' => $_POST['pseudo'],
                    ':mdp' => $mdp, //on prend le mot de passe hashé
                    ':nom' => $_POST['nom'],
                    ':prenom' => $_POST['prenom'],
                    ':email' => $_POST['email'],
                    ':civilite' => $_POST['civilite'],
                    ':adresse' => $_POST['adresse'],
                    ':code_postal' => $_POST['code_postal'],
                    ':ville' => $_POST['ville'],
                ));

                if ($succes) {
                    $contenu .= '<div class="alert alert-success">Vous êtes inscrit <a href="02-connexion.php">Cliquez ici pour vous connecter</a></div>'; 
                } else {
                    $contenu .= '<div class="alert alert-danger">Erreur lors de l`\enregistrement !</div>';
                }//fin du if if if ($succes)


            } // fin du if else => vérification du membre
        } //fin if(empty($contenu))
    }//fin if !empty
?> 
<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- mon style -->
    <link href="">

    <title>La boutique - Inscription</title>
</head>

<body class="bg-dark">
    <main class="container bg-white m-4 mx-auto p-4">
        <div class="row">
            <div class="col-sm-12 col-md-9">
                <h1>La boutique - Inscrivez-vous !</h1>
                <?php 
                echo $contenu;
                ?> 
                
                <p>Déjà inscrit ? <a href="02-connexion.php">Connectez-vous !</a></p>

                <form action="" method="POST" class="w-50 mx-auto">

                    <div class="form-group">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" class="form-control" id="pseudo" name="pseudo" value="<?php echo $_POST['pseudo'] ?? ''; ?>" required>
                    </div>
                    ​
                    <div class="form-group">
                        <label for="mdp">Mot de passe</label>
                        <input type="password" class="form-control" id="mdp" name="mdp" value="<?php echo $_POST['mdp'] ?? ''; ?>" required>
                        <small>Votre mot de passe doit contenir entre 8 et 20 caractères !</small>
                    </div>

                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $_POST['nom'] ?? ''; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $_POST['prenom'] ?? ''; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="prenom">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $_POST['email'] ?? ''; ?>" required>
                    </div>
                    ​
                    <div class="form-group">
                        <label for="civilite">Sexe</label>
                        <select id="civilite" class="form-select" name="civilite">
                            <option selected>Votre sexe</option>
                            <option value="f">Féminin</option>
                            <option value="m">Masculin</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" value="<?php echo $_POST['adresse'] ?? ''; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="code_postal">Code postal</label>
                        <input type="number" class="form-control" name="code_postal" id="code_postal" value="<?php echo $_POST['code_postal'] ?? ''; ?>" required>
                    </div>
                    ​
                    <div class="form-group my-2">
                        <label for="ville">Ville</label>
                        <input type="text" class="form-control" id="ville" name="ville" value="<?php echo $_POST['ville'] ?? ''; ?>" required>
                    </div>
                    ​
                    <input type="submit" class="btn btn-info my-2">
                    <input type="reset" class="btn btn-warning my-2">
                </form>
            </div>
        </div>  <!-- fin de la rangée -->
    </main>

    <!-- JS DE BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>