<?php


// Les méthodes magiques st des fct qui s'exécutent automatiquement en fct d'évènements particuliers.

class Societe
{
    public $adresse;
    public $ville;
    public $cp;

    public function __construct() {}
    public function __set($nom, $valeur) {
        echo 'Hey oh, jeune Padawan, que fais-tu ? La propriété <u><b>' . $nom . '</b></u> n\'existe pas.';
    }   //⚠️ Se déclenche qd on tente d'affecter une valeur à un propriété qui n'existe pas.

    public function __get($nom) {
        echo "<br>La propriété $nom n'existe pas ! <br>";
    }
}
//------------

$societe = new Societe;

$societe -> adresse = "18 rue Geoffroy L'asnier";
$societe -> ville = "Paris";
$societe -> cp = "75004";
$societe -> pays = "France";

echo $societe -> telephone;


//⚠️ fct magiq __set permet de sécuriser si ttes les propriétés st publiques
// ex. : 'France' > ok ! car php très permissif, alors que pas déclarer en propriété !)

//⚠️ fct magiq __get : si on essaye de récup val de propriété qui n'existe pas


/*
    ⚠️AUTRES METHODES MAGIQUES 

    - __call($nom, $args) : s'éxécute qd on tente d'appeler une fct qui n'existe pas.
      On récupère en args, le nom de la methode, et les arguments qui avaient été passés.

    - __callStatic($nom, $args) : idem mais pour les methodes static.

    - __destruct() : s'exécute à la fin du script.
        ex : fermer la connexion à la BDD, fermer des fichiers.

    - Liste non exhaustive : 
      __isset(), __sleep(), __clone(), invoke(),

*/