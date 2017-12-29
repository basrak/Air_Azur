<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body> 

    <?php
    
    $xml=simplexml_load_file(dirname(__DIR__).'/files/Vols.xml') or die("Erreur: Impossibilité de créer l'objet");
    print_r($xml);
    
    ?> 

 </body>
</html>