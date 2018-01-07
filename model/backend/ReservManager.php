<?php
require_once '/BddManager.php';

class ReservManager extends BddManager
{    
    public function create($reservation)
    {
        echo'test';
    }
    
    public function downloadPDF($bdd)
    {  
        echo'test';
    }
    
    public function update($vars){
        echo'test';
    }
    public function delete($vars){
        echo'test';
    }
      
    public function getByID($idReserv)
    {
    $statement = $this->_connexion->prepare('SELECT * FROM Reservation WHERE idReserv = :idReserv'); 
    $statement->execute(array(':idReserv' => $idReserv));

    $data = $statement->fetch(PDO::FETCH_ASSOC);
    
        $reserv = new Reservation();
        $reserv->hydrate($data);
    
    $statement->closeCursor();
    
    return $reserv;
    }
    
    
    public function getList($idUsers)
    {
    $req = 'SELECT * FROM Reservation WHERE idUsers = :idUsers';
                
    $statement = $this->_connexion->prepare($req); 
    $statement->execute(array(':idUsers' => $idUsers));

    while($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        $reservation = new Reservation();
        $reservation->hydrate($row);
        $reservations[] = $reservation;
    }
    $statement->closeCursor();
    
    return $reservations;
    }
}