<?php

class Vol
{
    private $_idVol;
    private $_dateDepart;
    private $_dateArrivee;
    private $_volGen;

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
    public function getIdVol()  { return $this->_idVol; }
    public function getDateDepart()  { return $this->_dateDepart; }
    public function getDateArrivee()  { return $this->_dateArrivee; }
    public function getVolGen()  { return $this->_volGen; }
    
    //Setters
    
    //Je ne mets pas de setter pour l'ID, car auto_increment dans la bdd
    // Pour l'instant, je n'ai mis aucun test des données insérés dans les setters, mais
    //c'est ici qu'il faudra le faire
    
    public function setIdVol($idVol)
    {
        $this->_idVol = $idVol;
    }
    
    public function setDateDepart($dateDepart)
    {
        $this->_dateDepart = $dateDepart;
    }
    
    public function setDateArrivee($dateArrivee)
    {
        $this->_dateArrivee = $dateArrivee;
    }
    
    public function setvolGen($volGen)
    {
        $this->_volGen = $volGen;
    }
    
   
}