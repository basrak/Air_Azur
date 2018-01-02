<?php

class Connexion extends PDO {

    private static $_instance;

    // Constructeur
    public function __construct( ) {}

    // Singleton 
    public static function getInstance() {

        if (!isset(self::$_instance)) {

            try {
            self::$_instance = new PDO("mysql:host=localhost;dbname=AIR_AZUR" , "root" , "");
            } catch (PDOException $e) {
            echo $e;
            print_r( $e );
            die ('Erreur de connexion à la base de données');
            }
        }
        
    return self::$_instance;
    }
}

?>