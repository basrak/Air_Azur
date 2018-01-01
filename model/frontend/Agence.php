<?php

class Agence extends Users
{
    private $_idAgence;
    private $_codeAgence;
    private $_nomAgence;
    private $_adrAgence;
    private $_CPAgence;
    private $_villeAgence;
    private $_telAgence;
    private $_mailAgence;
    
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
    public function IdAgence()  { return $this->_idAgence; }
    public function codeAgence()  { return $this->_codeAgence; }
    public function nomAgence()  { return $this->_nomAgence; }
    public function adrAgence()  { return $this->_adrAgence; }
    public function CPAgence()  { return $this->_CPAgence; }
    public function villeAgence()  { return $this->_villeAgence; }
    public function telAgence()  { return $this->_telAgence; }
    public function mailAgence()  { return $this->_mailAgence; }
    
    //Setters
    
    //Je ne mets pas de setter pour l'ID, car auto_increment dans la bdd
    // Pour l'instant, je n'ai mis aucun test des données insérés dans les setters, mais
    //c'est ici qu'il faudra le faire
    
    public function setIdAgence($idAgence)
    {
        $this->_idAgence = $idAgence;
    }
    
    public function setCodeAgence($codeAgence)
    {
        $this->_codeAgence = $codeAgence;
    }
    
    public function setNomAgence($nomAgence)
    {
        $this->_nomAgence = $nomAgence;
    }
    
    public function setadrAgence($adrAgence)
    {
        $this->_adrAgence = $adrAgence;
    }
    
    public function setCPAgence($CPAgence)
    {
        $this->_CPAgence = $CPAgence;
    }
    
    public function setVilleAgence($villeAgence)
    {
        $this->_villeAgence = $villeAgence;
    }
    
    public function setTelAgence($telAgence)
    {
        $this->_telAgence = $telAgence;
    }
    
    public function setMailAgence($mailAgence)
    {
        $this->_mailAgence = $mailAgence;
    }
    
    
    
    
}
    

