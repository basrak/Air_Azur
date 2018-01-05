<?php

require('../model/frontend/VolGen.php');
require('../model/frontend/Vol.php');
require('../model/frontend/Aeroport.php');
require('../model/backend/Connexion.php');
require('../model/backend/VolManager.php');
require('../model/backend/ArptManager.php');

    

function getVols($idArpt) {
    
    $connexion = Connexion::getInstance();
    $bdd = new VolManager($connexion);
    $vols = $bdd->getList($idArpt, null, null, null);
    
    if (is_null($vols))
        $msgVols = "Aucun vol n'a été trouvé";
    return $vols;
}

function getArpts() {

    $connexion = Connexion::getInstance();
    $bdd = new ArptManager($connexion);
    $arpts = $bdd->getList();
    
    if (is_null($arpts))
        $msgArpts = "Aucun vol n'a été trouvé";
    return $arpts;
}

function getNomArpt($idArpt) {

    $connexion = Connexion::getInstance();
    $bdd = new ArptManager($connexion);
    $arpt = $bdd->getByID($idArpt);
    
    if (is_null($arpt))
        $msgArpt = "Aucun aéroport n'a été trouvé";
    return $arpt->getNomArpt();
}