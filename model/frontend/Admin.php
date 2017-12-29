<?php

class Admin extends Users
{
    
    private $_mailAdmin;
    
    public function __construct() {
    }    
            
    //Getters
    public function getMailAdmin()  { return $this->_mailAdmin; }
    
    //Setters
    
    //Je ne mets pas de setter pour l'ID, car auto_increment dans la bdd
    // Pour l'instant, je n'ai mis aucun test des données insérés dans les setters, mais
    //c'est ici qu'il faudra le faire
    
    public function setMailAdmin($mailAdmin)
    {
        $this->_mailAdmin = $mailAdmin;
    }
    
}