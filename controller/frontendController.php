<?php

require('../model/frontend/VolGen.php');
require('../model/frontend/Vol.php');
require('../model/backend/Connexion.php');
require('../model/backend/VolManager.php');

function getVols() {

    $connexion = Connexion::getInstance();
    $bdd = new VolManager($connexion);
    $vols = $bdd->getList();
    
    if (is_null($vols))
        $msgVols = "Erreur, aucun vol dans la base de données";
    else
        return $vols;
}
