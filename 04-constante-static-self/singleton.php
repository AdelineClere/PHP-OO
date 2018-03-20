<?php

// Design pattern ⚠️ (Modèle de conception) : C'est une rép. trouvée par d'autres développeurs à une Q° que bcp se posent.


// singleton : C'est la réponse à la Q° suivante : 
// comment créer une classe qui ne soit INSTANCIABLE QU'UNE SEULE FOIS : connexion à la BDD

class Singleton {

    private static $instance = NULL;    //⚠️  propriété qui app. à la classe et qui contiendra un objet de cette même classe

    private function __construct() {}   //⚠️  fct private dc instanciation impossible
    private function __clone() {}       //⚠️  fct private > clonage impossible 
    //⚠️  (pas prévu que fct magiq soit private > on le contourne)
    
    public static function getInstance () {  

        if(is_null(self::$instance)) {
        // if(!self::$instance) {
        // if(self::$instance == NULL) {
            self::$instance = new Singleton;
            // self::$instance = new self;
        }
        return self::$instance;        
    }
}


// $singleton = new Singleton           =>⚠️  imposs. car function __construct est private
$singleton = Singleton::getInstance();
$singleton2 = Singleton::getInstance();

echo '<pre>';
var_dump($singleton);
var_dump($singleton2);
echo '</pre>';
        /*  > c pas des clones mais bien ⚠️ 2 fois MÊME objet (#1) :

                    object(Singleton)#1 (0) {
                    }
                    object(Singleton)#1 (0) {
                    }
        */