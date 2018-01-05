<?php

require_once '/BddManager.php';

class UsersManager extends BddManager
{
     
    public function create($user)
    {
        $prepare = $this->_db->prepare('INSERT INTO Users(idUsers, login, mdp, uStatus) VALUES(:idUsers, :login, :mdp, :uStatus)');
        $prepare->bindValue(':idUsers', $user->getIdUsers(), PDO::PARAM_INT);
        $prepare->bindValue(':login', $user->getLogin(), PDO::PARAM_INT);
        $prepare->bindValue(':mdp', $user->getMdp(), PDO::PARAM_STR);
        $prepare->bindValue(':uStatus', $user->getUStatus(), PDO::PARAM_INT);
        $prepare->execute();
    }
        
    public function update($vars){
        echo'test';
    }
    public function delete($vars){
        echo'test';
    }
    
    public function get($login, $mdp)
    {
    $statement = $this->_connexion->prepare('SELECT * FROM Users WHERE login = :login AND mdp = :mdp'); 
    $statement->execute(array(':login' => $login, ':mdp' => $mdp));

    $data = $statement->fetch(PDO::FETCH_ASSOC);
    $User = new Users();
    $User->hydrate($data);
    
    return $User;

    }

}