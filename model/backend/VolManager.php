<?php
require_once '/BddManager.php';

class VolManager extends BddManager
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
      
    public function getVolGenByID($idVol)
    {
    $statement = $this->_connexion->prepare('SELECT * FROM VolGen WHERE idVol = :idVol'); 
    $statement->execute(array(':idVol' => $idVol));

    $row = $statement->fetch(PDO::FETCH_ASSOC);
    
        $volGen = new VolGen();
        $volGen->setIdVol($row['IDVOL']);
        $volGen->setIdArpt($row['IDARPT']);
        $volGen->setIdArptArrivee($row['IDARPT_ARRIVEE']);
        $volGen->setCodeVol($row['CODEVOL']);
        $volGen->setPrixVol($row['PRIXVOL']);
        $volGen->setPlacesVol($row['PLACESVOL']);
        $volGen->setJourVol($row['JOURVOL']);
    
    $statement->closeCursor();
    
    return $volGen;
    }  
    
    public function getList($idArpt, $idArptArrivee, $dateDepart, $dateArrivee)
    {
    $req = 'SELECT * FROM VolGen vg INNER JOIN Vol v on v.idvol = vg.idvol WHERE '
            . ':idArpt is NULL OR vg.idARPT = :idArpt AND '
            . ':idArptArrivee is NULL or vg.idArpt_Arrivee = :idArptArrivee AND '
            . ':dateDepart is NULL or v.dateDepart = :dateDepart AND '
            . ':dateArrivee is NULL or v.dateArrivee = :dateArrivee';
                
    $statement = $this->_connexion->prepare($req); 
    $statement->execute(array(':idArpt' => $idArpt, ':idArptArrivee' => $idArptArrivee, ':dateDepart' => $dateDepart, ':dateArrivee' => $dateArrivee));

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