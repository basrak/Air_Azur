 

    <?php

    require('../model/frontend/VolGen.php');
    require('../model/frontend/Vol.php');
    require('../model/backend/Connexion.php');
    require('../model/backend/VolManager.php');
    
    $connexion = Connexion::getInstance();
    $bdd = new VolManager($connexion);
    
    $XMLFile = '../files/Vols.xml';
    
    echo $bdd->uploadXML($XMLFile);
    
   
    ?> 

 