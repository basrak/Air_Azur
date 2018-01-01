<?php

require('../model/frontend/VolGen.php');
require('../model/frontend/Vol.php');
require('../model/backend/Connexion.php');
require('../model/backend/VolManager.php');

function getVols() {

    $connexion = Connexion::getInstance();
    $bdd = new VolManager($connexion);
    $Vols = $bdd->getList();
    $connexion = NULL;
    
    if (is_null($Vols)) {

        $msgVols = "Erreur, aucun vol dans la base de données";
    } else {
        return $vols;
    }
}
