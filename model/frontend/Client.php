<?php

class Client
{
    private $_idClient;
    private $_nomClient;
    private $_prenomClient;
    private $_adrClient;
    private $_CPClient;
    private $_villeClient;
    private $_telClient;
    private $_mailClient;
    
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
    public function idClient()  { return $this->_idClient; }
    public function nomClient()  { return $this->_nomClient; }
    public function prenomClient()  { return $this->_prenomClient; }
    public function adrClient()  { return $this->_adrClient; }
    public function CPClient()  { return $this->_CPClient; }
    public function villeClient()  { return $this->_villeClient; }
    public function telClient()  { return $this->_telClient; }
    public function mailClient()  { return $this->_mailClient; }
    
    //Setters
    
    //Je ne mets pas de setter pour l'ID, car auto_increment dans la bdd
    // Pour l'instant, je n'ai mis aucun test des données insérés dans les setters, mais
    //c'est ici qu'il faudra le faire
    
    public function setIdClient($idClient)
    {
        $this->_idClient = $idClient;
    }
    
    public function setNomClient($nomClient)
    {
        $this->_nomClient = $nomClient;
    }
    
    public function setprenomClient($prenomClient)
    {
        $this->_prenomClient = $prenomClient;
    }
    
    public function setadrClient($adrClient)
    {
        $this->_adrClient = $adrClient;
    }
    
    public function setCPClient($CPClient)
    {
        $this->_CPClient = $CPClient;
    }
    
    public function setVilleClient($villeClient)
    {
        $this->_villeClient = $villeClient;
    }
    
    public function setTelClient($telClient)
    {
        $this->_telClient = $telClient;
    }
    
    public function setMailClient($mailClient)
    {
        $this->_mailClient = $mailClient;
    }
    
    
    
    
}
    

