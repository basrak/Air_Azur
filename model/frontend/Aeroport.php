<?php

class Aeroport
{
    private $_idArpt;
    private $_nomArpt;
    private $_villeArpt;
       
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
    public function getIdArpt()  { return $this->_idArpt; }
    public function getNomArpt()  { return $this->_nomArpt; }
    public function getVilleArpt()  { return $this->_villeArpt; }
    
    //Setters
    
    //Je ne mets pas de setter pour l'ID, car auto_increment dans la bdd
    // Pour l'instant, je n'ai mis aucun test des données insérés dans les setters, mais
    //c'est ici qu'il faudra le faire
    
    public function setIdArpt($idArpt)
    {
        $this->_idArpt = $idArpt;
    }
    
    public function setNomArpt($nomArpt)
    {
        $this->_nomArpt = $nomArpt;
    }
    
    public function setVilleArpt($villeArpt)
    {
        $this->_villeArpt = $villeArpt;
    }
    
    
    
    
    
    
}
    

