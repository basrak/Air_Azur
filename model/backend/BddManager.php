<?php

abstract class BddManager {

    protected $_connexion;
    var $_vars;

    public function __construct($connexion) {

        $this->_connexion = $connexion;
    }

    public abstract function create($vars);

    public abstract function read($vars);

    public abstract function update($vars);

    public abstract function delete($vars);

    function sqlToXml($TableName, $agence) {
        $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $root_element = $TableName . "s";
        $xml .= "<$root_element>";
        $xml .= '<agence>' . $agence . '</agence>';
        $xml .= '<date>' . time() . '</date>';

        $prepare = $db->prepare("Select * from " . $TableName . "");
        $prepare->execute();

        while ($result_array = $result->fetch(PDO::FETCH_ASSOC)) {
            //loop à travers chaque clé valeur de chaque ligne de la table
            foreach ($result_array as $key => $value) {
                //$key référence la colonne de la table
                $xml .= "<$key>";
                //intègre les données SQL dans des CDATA pour éviter les problèmes avex le XML
                $xml .= "<![CDATA[$value]]>";
                //ferme l'élément
                $xml .= "</$key>";
            }
            $xml .= "</" . $TableName . ">";
        }
        //ferme l'élément root
        $xml .= "</$root_element>";
        $prepare->closeCursor();

        return $xmlData;
    }

}
