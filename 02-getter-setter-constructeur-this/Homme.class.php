<?php

class Homme
{
    private $prenom;
    private $nom;

    public function setPrenom($arg){        // On fait un setter d'un prénom
        if(is_string($arg) && strlen($arg) > 3 && strlen($arg) <= 30){
            $this -> prenom = $arg;
            return true;
        }
        else {
            return false;
            echo 'Erreur dans le prenom';
        }
    }

    public function getPrenom(){            // on fait un getter pour récup setter
        return $this -> prenom;             // ' this ' fait appel à l'objet ds lequel je me trouve
    }
}

//------------------

$homme = new Homme();   // () : pas oblig.

$homme -> setPrenom ('Yakine');    
echo 'Bonjour ' . $homme -> getPrenom() . '!'; 



/*****************⚠️ COMMENTAIRES ⚠️*******************

    Pourquoi faire des GETTER et SETTER ?
        - Le php est un langage qui ne type pas ses variables (> dc tjrs vérif si string, integer etc..)
          > ⚠️ dc mettre une visibilité PRIVATE aux propriétés et créer les SETTERS pour vérif l'intégralité des données EST UNE BONNE CONTRAINTE
        - Tout dev' qui voudra affecter une valeur devra OBLIGATOIREMENT passer par le setter

    ⚠️ SETTER  :   Affecter une valeur
    ⚠️ GETTER  :   Récupérer une valeur        (!! ds un getter JAMAIS d'argument )

    ⚠️ Nous aurons autant de setter et de getter que de propriétés private.

    ⚠️ $this   :   Représente l'objet en cours de manipulation

( intérêt : trv de manière collaborative, gère protection, code factorisé (encapsuler code pr ête plus simple, + lisible) dans des classes en objet le + possible )







/* en procédural on aurait ...

if(is_string($_POST['prenom']) && strlen($_POST['prenom']) > 5 && strlen($_POST['prenom'] <= 30) {...} 
    
$homme -> prenom = $_POST['prenom'];    
$homme -> nom = $_POST['nom'];    

*/