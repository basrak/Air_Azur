<?php

class Reservation
{
    private $_idReserv;
    private $_dateReserv;
    private $_nbrReserv;
    private $_montantReserv;
    private $_agenceReserv;
    private $_volReserv;
    private $_clientReserv;
    
    //hydratation des données à partir de la base de données
    public function hydrate(array $data)
    {
    foreach ($data as $key => $value)
        {
        // On récupère le nom du setter correspondant à l'attribut.
        $method = 'set'.ucfirst($key);       
        // Si le setter correspondant existe.
        if (method_exists($this, $method))
                {
                // On appelle le setter.
                $this->$method($value);
                }
        }
    }       
            
    //Getters
    public function getIdReserv()  { return $this->_idReserv; }
    public function getDateReserv()  { return $this->_dateReserv; }
    public function getNbrReserv()  { return $this->_nbrReserv; }
    public function getMontantReserv()  { return $this->_montantReserv; }
    public function getAgenceReserv()  { return $this->_agenceReserv; }
    public function getClientReserv()  { return $this->_clientReserv; }
    public function getVolReserv()  { return $this->_volReserv; }

    //Setters
    
    //Je ne mets pas de setter pour l'ID, car auto_increment dans la bdd
    // Pour l'instant, je n'ai mis aucun test des données insérés dans les setters, mais
    //c'est ici qu'il faudra le faire
    
     public function setIdReserv($idReserv)
    {
        $this->_idReserv = $idReserv;
    }
    
    public function setDateReserv($dateReserv)
    {
        $this->_dateReserv = $dateReserv;
    }
    
    public function setNbrReserv($nbrReserv)
    {
        $this->_nbrReserv = $nbrReserv;
    }
    
    public function setAgenceReserv($agenceReserv)
    {
        $this->_agenceReserv = $agenceReserv;
    }    
    
    public function setClientReserv($clientReserv)
    {
        $this->_clientReserv = $clientReserv;
    }
    
    public function setVolReserv($volReserv)
    {
        $this->_volReserv = $volReserv;
    }
    
    //Methodes
    public function calculMontant($prix)
    {
        $this->_montantReserv = $prix * getNbrReserv();
        
        return getMontantReserv();
    }
    
    
    
    
    
}
    

