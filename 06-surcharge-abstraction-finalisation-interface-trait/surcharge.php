<?php

//⚠️ SURCHARGE (GB : OVERRIDE) : permet de modif le comportement d'une méthode héritée et d'y apporter des traits SUPPLEMENTAIRES !!
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
        // return 15;                         -> ça c'est ⚠️ REDÉFINITION 
        // return $this -> calcul() + 5;     -> this fait appel à la fct ds laquelle on est ===> ⚠️ RÉCURSIVITÉ
        // return self::calcul() + 5;         -> self:: fait appel à des élts statiq, pas le cas ici, et en + serait récursif
       
        // $a = new A; return $a -> calcul() + 5;   
                // fonctionne mais ⚠️ conceptuellement on est hérité de A, alors pourquoi créer un objet A ?? O_o
       
        // return A::calcul() + 5;
        return parent::calcul() + 5;

    }
}
$b = new B;
echo $b -> calcul();




/*****************⚠️ COMMENTAIRES ⚠️*******************
 * 
 *  ⚠️  La notion de SURCHARGE est importante car permet d'ALLER + LOIN ds les traits d'une fct héritée. 
 *      -> Par ex. qd on utilise un CMS, on ne doit pas toucher au coeur...
 *         Mais on peut hériter de certaines classes et apporter des modifs aux méthodes.
 * 
 *  ⚠️  Le mot clé 'parent::' fait réf. aux traits de la méthode originale, déclarée ds la classe mère/parente.
 * 
 */