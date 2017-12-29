<?php

class VolManager extends BddManager
{
    
    public function __construct ($connection)
    {
        $this->_connection = $connection;
    }
    
    public function create($vol)
    {
        $prepare = $this->_db->prepare('INSERT INTO Vol(idArpt, idArpt_Arrivee, codeVol, prixVol, placesVol, JourVol) VALUES(:IdArpt, :IdArpt_Arrivee, :codeVol, :prixVol, :placesVol, :JourVol)');
        $prepare->bindValue(':idArpt', $Vol->idArpt());
        $prepare->bindValue(':idArpt_Arrivee', $Vol->idArpt_Arrivee(), PDO::PARAM_INT);
        $prepare->bindValue(':codeVol', $Vol->codeVol(), PDO::PARAM_STR);
        $prepare->bindValue(':prixVol', $Vol->prixVol(), PDO::PARAM_INT);
        $prepare->bindValue(':placesVol', $Vol->placesVol(), PDO::PARAM_INT);
        $prepare->bindValue(':JourVol', $Vol->JourVol(), PDO::PARAM_STR);
        $prepare->execute();
    }
    
    public function upload($XMLfile)
    {
        $xml=simplexml_load_file(dirname(__DIR__).$XMLfile) or die("Erreur: Impossibilité de créer l'objet");
        
        
    }
    
    public function read($vars){
        echo'test';
    }
   
    public function update($vars){
        echo'test';
    }
    public function delete($vars){
        echo'test';
    }
}