<?php

class Users
{
    private $_idUsers;
    private $_login;
    private $_mdp;
    private $_uStatus;
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
    public function getIdUsers()  { return $this->_idUsers; }
    public function getLogin()  { return $this->_login; }
    public function getMdp()  { return $this->_mdp; }
    public function getUStatus()  { return $this->_uStatus; }
    public function getCodeAgence()  { return $this->_codeAgence; }
    public function getNomAgence()  { return $this->_nomAgence; }
    public function getAdrAgence()  { return $this->_adrAgence; }
    public function getCPAgence()  { return $this->_CPAgence; }
    public function getVilleAgence()  { return $this->_villeAgence; }
    public function getTelAgence()  { return $this->_telAgence; }
    public function getMailAgence()  { return $this->_mailAgence; }
    
    //Setters
    
    //Je ne mets pas de setter pour l'ID, car auto_increment dans la bdd
    // Pour l'instant, je n'ai mis aucun test des données insérés dans les setters, mais
    //c'est ici qu'il faudra le faire
    
    public function setIdUsers($idUsers)
    {
        $this->_idUsers = $idUsers;
    }
    
    public function setLogin($login)
    {
        $this->_login = $login;
    }
    
    public function setMdp($mdp)
    {
        $this->_mdp = $mdp;
    }
    
    public function setUStatus($uStatus)
    {
        $this->_uStatus = $uStatus;
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
    
    
    
    
    
