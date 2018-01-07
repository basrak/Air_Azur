<?php

require('./model/frontend/Users.php');
require('./model/backend/BddConnexion.php');
require('./model/backend/UsersManager.php');

$msgConnexion = "";

function Connecter($login, $mdp) {

    $connexion = BddConnexion::getInstance();
    $bdd = new UsersManager($connexion->handle());
    $User = $bdd->get($login, $mdp);

    if (is_null($User)) {

        $msgConnexion = "Le login ou le mot de passe sont incorrects";
    } else {
        $_SESSION['idUsers'] = $User->getIdUsers();
        $_SESSION['login'] = $User->getLogin();
        $_SESSION['nomAgence'] = $User->getLogin();
        $_SESSION['uStatus'] = $User->getUStatus();
        $_SESSION['action'] = 'accueil';
        
        if (isset($_SESSION['login'])) {
            if ($_SESSION['uStatus'] == 'admin')
                header('Location: ./controller/admin.php');
            else if ($_SESSION['uStatus'] == 'agence')
                header('Location: ./controller/agence.php');
        }
    }
}
