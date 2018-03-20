<?php

class Etudiant
{
    private $prenom;

    public function __construct($arg){

        // la fct contruct() (méthode magique) se lance au moment de l'instantciation...
        // $this -> prenom = $arg;  (presq bon)
        $this -> setPrenom($arg);
    }

    public function setPrenom($prenom){
        $this -> prenom = $prenom;
    }

    public function getPrenom(){
        return $this -> prenom;
    }
}

//------------

$etudiant = new etudiant('Adeline');
echo 'Prenom : ' . $etudiant -> getPrenom();
// En modifiant UNIQUEMENT l'intérieur de la classe, affecter la valeur Adeline à la propriété 'prénom' > cf. lg 7 > 12