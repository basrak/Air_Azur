<?php
require_once '/BddManager.php';

class ClientManager extends BddManager
{    
    public function create($vol)
    {
        $prepare = $this->_db->prepare('INSERT INTO VolGen(idVol, idArpt, idArpt_Arrivee, codeVol, prixVol, placesVol, JourVol) VALUES(:idVol, :idArpt, :idArpt_Arrivee, :codeVol, :prixVol, :placesVol, :jourVol)');
        $prepare->bindValue(':idVol', $vol->getVolGen()->getIdVol(), PDO::PARAM_INT);
        $prepare->bindValue(':idArpt', $vol->getVolGen()->getIdArpt(), PDO::PARAM_INT);
        $prepare->bindValue(':idArpt_Arrivee', $vol->getVolGen()->getIdArpt_Arrivee(), PDO::PARAM_INT);
        $prepare->bindValue(':codeVol', $vol->getVolGen()->getCodeVol(), PDO::PARAM_STR);
        $prepare->bindValue(':prixVol', $vol->getVolGen()->getPrixVol(), PDO::PARAM_INT);
        $prepare->bindValue(':placesVol', $vol->getVolGen()->getPlacesVol(), PDO::PARAM_INT);
        $prepare->bindValue(':jourVol', $vol->getVolGen()->getJourVol(), PDO::PARAM_STR);
        $prepare->execute();
        
        $prepare = $this->_db->prepare('INSERT INTO Vol(idVol, dateDepart, dateArrivee) VALUES(:idVol, :dateDepart, :dateArrivee');
        $prepare->bindValue(':idVol', $vol->getVolGen()->getIdVol(), PDO::PARAM_INT);
        $prepare->bindValue(':dateDepart', $Vol->getDateDepart(), PDO::PARAM_STR);
        $prepare->bindValue(':dateArrivee', $Vol->getDateArrivee(), PDO::PARAM_STR);
        $prepare->execute();
    }
    
    public function uploadXML($XMLfile)
    {  
        $xml=simplexml_load_file($XMLfile);
        return json_encode($xml);      
    }
    
    public function update($vars){
        echo'test';
    }
    public function delete($vars){
        echo'test';
    }
     
    public function getByID($idClient)
    {
    $statement = $this->_connexion->prepare('SELECT * FROM Client WHERE idClient = :idClient'); 
    $statement->execute(array(':idClient' => $idClient));

    $data = $statement->fetch(PDO::FETCH_ASSOC);
    
        $client = new Client();
        $client->hydrate($data);
    
    $statement->closeCursor();
    
    return $client;
    }
    
    
    public function getList()
    {
    echo 'test';
    }
}