<?php
require_once '/BddManager.php';

class VolManager extends BddManager
{    
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
    
    public function uploadXML($XMLfile)
    {  
        $xml=simplexml_load_file($XMLfile);
        return json_encode($xml);      
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
    
    public function getList()
    {
    $statement = $this->_connexion->prepare('SELECT * FROM VolGen vg inner join Vol v on v.idvol = vg.idvol'); 
    $statement->execute();

    while($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        $volGen = new VolGen();
        $volGen->setIdVol($row['IDVOL']);
        $volGen->setIdArpt($row['IDARPT']);
        $volGen->setIdArptArrivee($row['IDARPT_ARRIVEE']);
        $volGen->setCodeVol($row['CODEVOL']);
        $volGen->setPrixVol($row['PRIXVOL']);
        $volGen->setPlacesVol($row['PLACESVOL']);
        $volGen->setJourVol($row['JOURVOL']);
        $vol = new Vol();
        $vol->setIdVol($row['IDVOL']);
        $vol->setDateDepart($row['DATEDEPART']);
        $vol->setDateArrivee($row['DATEARRIVEE']);
        $vol->setVolGen($volGen);
        $vols[] = $vol;
    }
    $statement->closeCursor();
    
    return $vols;
    }
}