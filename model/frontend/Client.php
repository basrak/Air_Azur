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
    public function getIdClient()  { return $this->_idClient; }
    public function getNomClient()  { return $this->_nomClient; }
    public function getPrenomClient()  { return $this->_prenomClient; }
    public function getAdrClient()  { return $this->_adrClient; }
    public function getCPClient()  { return $this->_CPClient; }
    public function getVilleClient()  { return $this->_villeClient; }
    public function getTelClient()  { return $this->_telClient; }
    public function getMailClient()  { return $this->_mailClient; }
    
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
    

