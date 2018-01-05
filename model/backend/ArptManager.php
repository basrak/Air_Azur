<?php
require_once '/BddManager.php';

class ArptManager extends BddManager
{    
    public function create($arpt)
    {
        $prepare = $this->_db->prepare('INSERT INTO Aeroport(nomArpt, villeArpt) VALUES(:nomArpt, :villeArpt)');
        $prepare->bindValue(':nomArpt', $arpt->getNomArpt(), PDO::PARAM_STR);
        $prepare->bindValue(':villeArpt', $arpt->getVilleArpt(), PDO::PARAM_STR);
        $prepare->execute();
    }
   
    public function update($arpt){
        echo'test';
    }
    public function delete($arpt){
        echo'test';
    }
    
    public function getList()
    {
    $statement = $this->_connexion->prepare('SELECT * FROM Aeroport'); 
    $statement->execute();

    while($data = $statement->fetch(PDO::FETCH_ASSOC))
    {
        $arpt = new Aeroport();
        $arpt->hydrate($data);
        $arpts[] = $arpt;
    }
    $statement->closeCursor();
    
    return $arpts;
    }
    
    public function getByID($idArpt)
    {
    $statement = $this->_connexion->prepare('SELECT * FROM Aeroport WHERE idArpt = :idArpt'); 
    $statement->execute(array(':idArpt' => $idArpt));

    $data = $statement->fetch(PDO::FETCH_ASSOC);
    
        $arpt = new Aeroport();
        $arpt->hydrate($data);
    
    $statement->closeCursor();
    
    return $arpt;
    }
    
   
}