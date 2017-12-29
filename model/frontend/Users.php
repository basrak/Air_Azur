<?php

class Users
{
    protected $_idUsers;
    protected $_login;
    protected $_password;
    
    public function __construct($login, $mdp)
    {
      $this->_login = $login; 
      $this->_mdp = $mdp; 
    }
    
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
    
    //Setters
    
    //Je ne mets pas de setter pour l'ID, car auto_increment dans la bdd
    // Pour l'instant, je n'ai mis aucun test des données insérés dans les setters, mais
    //c'est ici qu'il faudra le faire
    
    public function setLogin($login)
    {
        $this->_login = $login;
    }
    
    public function setMdp($mdp)
    {
        $this->_mdp = $mdp;
    }
    

}
    
    
    
    
    
