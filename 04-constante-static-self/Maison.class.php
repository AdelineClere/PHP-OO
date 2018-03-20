<?php

class Maison
{
    public $couleur = 'blanc';              // App. à l'objet   (par défaut c public, si on oublie de le mettre)
    public static $espaceTerrain = '500m2'; // App. à la class  (static = n'appartient pas à $maison) 
    private $nbPorte = 10;                  // App. à l'objet   (mais private dc necessite un getter)
    private static $nbPiece = 7;            // App. à la class 
    const HAUTEUR = '10m';                  // App. à la class (équiv. de public static / tjrs. CAP )
    
    public function getNbPorte() {          // App. à l'objet
        return $this -> nbPorte;    
    }

    public static function getNbPiece() {   // App. à la class
        return self::$nbPiece;
        // return MAISON::$nbPiece;
    }

}

//--------------------------

echo Maison::$espaceTerrain . '<br/>';  // static = appartient à la classe = ne nécessite pas 1 objet pour y avoir accès
/* echo Maison::$nbPiece . '<br/>';
    ERREUR : J'essaie d'accèder à une propriété private (certe static) dep l'ext. de la class. Dc :  */
echo Maison::getNbPiece() . '<br/>';
echo Maison::HAUTEUR() . '<br/>';


$maison = new Maison();
echo $maison -> couleur . '<br/>';  
// ok j'accède à une propriété public via l'objet maison (à l'ext de la class)
/* echo $maison -> espaceTerrain . '<br/>';    
        ERREUR : j'essaye d'accéder à 1 elt de la class depuis l'objet
            Donc : echo Maison::$espaceTerrain                            */  

/* echo $maison -> nbPorte();
ERREUR j'essaye d'acc. à 1 élt de l'objet via l'objet mais sa visibilité ne permet pas d'y accéder à l'ext. de la class
*/
echo $maison -> getNbPorte() . '<br/>'; // OK j'accède à 1 élt private grâce au getter public.




/*****************⚠️ COMMENTAIRES ⚠️*******************

    Opérateurs :
        $objet ->   =   pr accéder aux élts d'un objet à l'ext de la classe
        $this  ->   =   pr accéder aux élts d'un objet à l'int de la classe
        Class::     =   pr accéder aux élts d'une classe à l'ext de la classe
        self ::     =   pr accéder aux élts d'une classe à l'int de la classe
        xxxxx       =

    Question à se poser : Est-ce que c'est static ?
            -> OUI :
                - est-ce que je suis à l'int ou ext de la classe ?
                    -> int  : self::
                    -> ext  : Class::
            -> NON :
                - est-ce que je suis à l'int ou ext de la classe ?
                    -> int  : $this ->
                    -> ext  : $objet ->

( Rq; : ac self et Class je mets '$', ac objet -> pas de '$' )

Static signifie qu'un élt app. à la classe. Pour y accèder on devra dc l'appeler par la classe (Class:: / self::).
Une propriété static peut être modifée, mais dans ce cas cette modif est durable dans le code (définitive, se répercute..(ex. maison).

'const' signifie qu'une propriété app. à la classe et ne peut pas être modifiée (un peu public static, mais pas modifiable)

*/