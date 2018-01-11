<?php

require('../model/frontend/VolGen.php');
require('../model/frontend/Vol.php');
require('../model/frontend/Aeroport.php');
require('../model/frontend/Reservation.php');
require('../model/frontend/Client.php');
require('../model/backend/BddConnexion.php');
require('../model/backend/VolGenManager.php');
require('../model/backend/VolManager.php');
require('../model/backend/ArptManager.php');
require('../model/backend/ReservManager.php');
require('../model/backend/ClientManager.php');

//Rechercher tous les vols
function findVols() {

    $connexion = BddConnexion::getInstance();
    $bdd = new VolManager($connexion->handle());
    $vols = $bdd->getList(null, null, null, null);

    if (is_null($vols))
        $msgVols = "Aucun vol n'a été trouvé";
    return $vols;
}

//Rechercher tous les aéroports
function findArpts() {

    $connexion = BddConnexion::getInstance();
    $bdd = new ArptManager($connexion->handle());
    $arpts = $bdd->getList();

    if (is_null($arpts))
        $msgArpts = "Aucun vol n'a été trouvé";
    return $arpts;
}

//Recherche un aéropot avec un paramètre et un type de recherche à définir
function findArpt($param1, $type) {

    $connexion = BddConnexion::getInstance();
    $bdd = new ArptManager($connexion->handle());
    $arpt = $bdd->get($param1, $type);

    if (is_null($arpt))
        $msgArpt = "Aucun aéroport n'a été trouvé";
    return $arpt;
}

//Rechercher toutes les réservations
function findReservations($idUsers) {

    $connexion = BddConnexion::getInstance();
    $bdd = new ReservManager($connexion->handle());
    $reservations = $bdd->getList($idUsers);

    if (is_null($reservations))
        $msgReserv = "Aucune réservation n'a été trouvée";
    return $reservations;
}

//Rechercher une réservation en fonction de son identifiant
function findReservation($idReserv) {

    $connexion = BddConnexion::getInstance();
    $bdd = new ReservManager($connexion->handle());
    $reservation = $bdd->getById($idReserv);

    if (is_null($reservation))
        $msgReserv = "Aucune réservation n'a été trouvée";
    return $reservation;
}

//Rechercher un identifiant en fonction de son identifiant
function findClient($idClient) {

    $connexion = BddConnexion::getInstance();
    $bdd = new ClientManager($connexion->handle());
    $client = $bdd->getByID($idClient);

    if (is_null($client))
        $msgClient = "Aucun client n'a été trouvé";
    return $client;
}

//Rechecher un Vol générique en fonction d'un parametre et d'un type de recherche à définir
function findVolGen($param1, $type) {

    $connexion = BddConnexion::getInstance();
    $bdd = new VolGenManager($connexion->handle());
    $volGen = $bdd->get($param1, $type);

    if (is_null($volGen))
        $msgVol = "Aucun vol n'a été trouvé";
    return $volGen;
}

//Rechercher un vol en fonction de son identifiant relatif
function findVol($idVol, $dateDepart) {

    $connexion = BddConnexion::getInstance();
    $bdd = new VolManager($connexion->handle());
    $vol = $bdd->get($idVol, $dateDepart);

    if (is_null($vol))
        $msgVol = "Aucun vol n'a été trouvé";
    return $vol;
}

//Insérer les vols fourni par le fichier .xml dans les tables VolGen et Vol de la base de données
function upXML($XMLfile) {

    $connexion = BddConnexion::getInstance();
    $bdd1 = new VolGenManager($connexion->handle());
    $bdd2 = new VolManager($connexion->handle());

    $xml = simplexml_load_file($XMLfile);

    try {
        foreach ($xml->vol as $volXML) {

            //On boucle le fichier xml et on crée une array d'objets vols (sans idVol)

            $volGen = new VolGen();
            $depart = explode(" - ", $volXML->depart);
            $volGen->setIdArpt(findArpt($depart[0], "nom")->getIdArpt());
            $arrivee = explode(" - ", $volXML->arrivee);
            $volGen->setIdArptArrivee(findArpt($arrivee[0], "nom")->getIdArpt());
            $volGen->setCodeVol($volXML['numero']);
            $volGen->setJourVol($volXML->jour);
            $volGen->setPrixVol($volXML->prix);
            $volGen->setPlacesVol($volXML->places);

            $vol = new Vol();
            
            $dateDepart = explode(" ", $volXML->dateDepart);            
            $dateDepart = implode('-', array_reverse(explode('/', $dateDepart[0]))).' '.$dateDepart[1];;
            $vol->setDateDepart($dateDepart);
            $dateArrivee = explode(" ", $volXML->dateArrivee);
            $dateArrivee = implode('-', array_reverse(explode('/', $dateArrivee[0]))).' '.$dateArrivee[1];
            $vol->setDateArrivee($dateArrivee);
            $vol->setVolGen($volGen);

            $vols[] = $vol;
        }

        foreach ($vols as $vol) {
            //On boucle dans le tableau d'objets $vol et on vérifie la présence ou non du VolGen et du Vol dans la base de données

            $findVolGen = findVolGen($vol->getVolGen()->getCodeVol(), "codeVol");
            $findVol = findVol($findVolGen->getIdVol(), $volXML->dateDepart);

            //Si ni le volGen ni le vol n'existent, 
            if ($findVolGen->getCodeVol() == "" && $findVol->getDateDepart() == "") {
                //On insert l'objet volGen en premier dans la table VolGen
                $bdd1->create($vol->getVolGen());
                //puis on récupère l'idVol fraichement auto_incrémenté du volGen que l'on transmet à l'objet vol avant de l'insérer à son tour dans la table Vol  
                $id = findVolGen($vol->getVolGen()->getCodeVol(), "codeVol")->getIdVol();
                $vol->getVolGen()->setIdVol($id);
                $vol->setIdVol($id);
                $bdd2->create($vol);
            }
            //Si le volGen existe mais pas le vol,
            elseif ($findVolGen->getCodeVol() != "" && $findVol->getDateDepart() == "") {
                //on récupère l'idVol du VolGen dans la bdd que l'on passe à l'objet Vol
                $id = findVolGen($vol->getVolGen()->getCodeVol(), "codeVol")->getIdVol();
                $vol->getVolGen()->setIdVol($id);
                $vol->setIdVol($id);
                //et on insère uniquement l'objet Vol dans la table Vol
                $bdd2->create($vol);
            }
        }
    } catch (PDOException $e) {
        die('Error->upXML() : ' . $e->getMessage());
    }
    
    function reserver($idvol) {
        
    }
    
}
