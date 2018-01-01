<!-- Routeur -->
<?php session_start();

require 'controller/connexionController.php';

$msgConnexion = "";

if(isset($_POST['Connexion']))
            {
                $login = htmlspecialchars($_POST['login']);
                $mdp = htmlspecialchars($_POST['mdp']);
                Connecter($login, $mdp);
            }

else require('view/indexView.php');



