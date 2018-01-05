<?php

require('../model/frontend/VolGen.php');
require('../model/frontend/Vol.php');
require('../model/frontend/Aeroport.php');
require('../model/frontend/Reservation.php');
require('../model/frontend/Client.php');
require('../model/backend/Connexion.php');
require('../model/backend/VolManager.php');
require('../model/backend/ArptManager.php');
require('../model/backend/ReservManager.php');
require('../model/backend/ClientManager.php');

    

function getVols() {
    
    $connexion = Connexion::getInstance();
    $bdd = new VolManager($connexion);
    $vols = $bdd->getList(null, null, null, null);
    
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

function getReservations($idUsers) {

    $connexion = Connexion::getInstance();
    $bdd = new ReservManager($connexion);
    $reservations = $bdd->getList($idUsers);
    
    if (is_null($reservations))
        $msgReserv = "Aucune réservation n'a été trouvée";
    return $reservations;
}

function getClient($idClient) {

    $connexion = Connexion::getInstance();
    $bdd = new ClientManager($connexion);
    $client = $bdd->getByID($idClient);
    
    if (is_null($client))
        $msgClient = "Aucun client n'a été trouvé";
    return $client;
}

function getVolGen($idVol) {

    $connexion = Connexion::getInstance();
    $bdd = new VolManager($connexion);
    $volGen = $bdd->getVolGenByID($idVol);
    
    if (is_null($volGen))
        $msgVol = "Aucun vol n'a été trouvé";
    return $volGen;
}