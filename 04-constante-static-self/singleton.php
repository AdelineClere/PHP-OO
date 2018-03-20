<?php

// Design pattern (Modèle de conception) : C'est une rép. trouvée par d'autres développeurs à 1 Q° que bcp se posent.

// singleton : C'est la réponse à la Q° suivante : comment créer une classe qui ne soit instanciable qu'une seule fois : connexion à la BDD

class Singleton {
    private static $instance = NULL;    // propriété qui app. à la classe et qui contiendra un objet de cette même classe

    private function __construct() {}   // fct private dc instanciation impossible

    private function __clone() {}       // fct private, dc clonage impossible (pas rpévu que fct magiq soit private > on le contourne)
    
    public static function getInstance () {    
        if(is_null(self::$instance)) {
        // if(!self::$instance) {
        // if(self::$instance == NULL) {
            self::$instance = new Singleton;
            // self::$instance = new self;
        }
        return self::$instance;        
    }

    public function getPdo($HOST, $dbname, $login, $mdp) {
        $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $login, $mdp);
        return $pdo;
    }

}

// $singleton = new Singleton  => imposs. car function __construct est private

$singleton = Singleton::getInstance();
$singleton2 = Singleton::getInstance();

$pdo = $singleton -> getPdo();
$pdo = $singleton -> getPdo();
$pdo = $singleton::getInstance() -> getPdo();
$pdo = $singleton -> getPdo();
$pdo = $singleton -> getPdo();
$pdo = $singleton -> getPdo();


echo '<pre>';
var_dump($singleton);
var_dump($singleton2);
echo '</pre>';
        /*  > c pas des clones mais bien 2 fois MÊME objet (#1)
                    object(Singleton)#1 (0) {
                    }
                    object(Singleton)#1 (0) {
                    }
        */