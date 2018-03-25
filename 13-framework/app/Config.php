<?php
//app/Config.php

class Config
{
    protected $parameters;  // Contient les infos du fichier parameters.php / Protected >>> set/get, en principe

    public function __construct() {     
        require __DIR__ . '/Config/parameters.php'; //⚠️️ DIR = cste magiq qui retourne chemin du doss ds lequel on est depuis la racine
        $this -> parameters = $parameters;  // je mets ça ds ' protected $parameters; '
        /*⚠️️ Au moment où j'instancie cette classe, je récupère le fichier parameters.php, 
             et je stocke tous les parameters de mon application dans la propriété $parameters   */
    }

    public function getParametersConnect() {  //⚠️️ just pour récup partie connexion (à la place d'un get)
        return $this -> parameters['connect'];
        // Cette fct retourne seult les infos de connex° qui me seront utiles au moment de la connex° à la BDD
    }
}
//-----------
// $config = new Config;
// echo '<pre>';
// print_r($config -> getParametersConnect() ); 
// echo '<pre>';
//                 Array
//                 (
//                     [host] => localhost
//                     [dbname] => root
//                     [password] => 
//                 )