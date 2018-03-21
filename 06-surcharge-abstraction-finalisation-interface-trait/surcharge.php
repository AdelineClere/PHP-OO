<?php

//⚠️surcharge (GB : override) : permet de modif le comportement d'une méthode héritée et d'y apporter des traits SUPPLEMENTAIRE !!
// Surcharge VS Redéfinition (apporte / modifie)

class A 
{
    public function calcul() {
        return 10;
    }
}
//-----
class B extends A 
{
    public function calcul() {
        // objectif : faire en sorte que cette fct return 15
        // return 15; = ça c'est Redéfinition 
        // return $this -> calcul() + 5; $this fait appel à la fct ds laquelle on est ===> récursivité
        // return self::calcul() + 5;   // self:: fait appel à des élts statiq, pas le cas ici, et en + serait récursif
       
        // $a = new A; return $a -> calcul() + 5;   
                // fonctionne mais coneptllt on est hérité de A, alors pourquoi créer un objet A ?? O_o
       
        // return A::calcul() + 5;
        return parent::calcul() + 5;

    }
}
$b = new B;
echo $b -> calcul();




/*****************⚠️ COMMENTAIRES ⚠️*******************
 * 
 *  ⚠️ La notion de surcharge est importante car permet d'aller + loin ds les traits d'une fct héritée. 
 *      Par ex. qd on utilise un CMS, on ne doit pas toucher au coeur...
 *      Mais on peut hériter de certaines classes et apporter des moodifs aux méthodes.
 * 
 *  ⚠️ Le mot clé 'parent::' fait réf. aux traitts de la méthode originale, déclarée ds la classe mère/parente.
 * 
 */