<?php
//htdocs/PHPOO/6-surcharge-abstraction-finalisation-interface-trait/surcharge.php

// surcharge (ou override) : Permet de modifier le comportement d'une méthode héritée, et d'y apporter des traitements SUPPLEMENTAIRES !! 
// Surchage VS Redéfinition

class A
{
	public function calcul(){
		return 10; 
	}
}
//----
class B extends A
{
	public function calcul(){
		//objectif : faire en sorte que cette fonction return 15
		//return 15; Redéfinition
		//return $this -> calcul() + 5; // $this fait appel à la fonction dans laquelle nous sommes ===> Recursivité
		//return self::calcul() + 5 //self:: fait appel à des élément static... ce n'est pas le cas ici. 
		
		//$a = new A; return $a -> calcul() + 5;  // Cela fonctionne, mais conceptuellement nous sommes héritié de A, alors pourquoi créer un objet A ?? 0_o
		
		//return A::calcul() + 5; 
		return parent::calcul() + 5; 
	
	}
}
$b = new B; 
echo $b -> calcul();

/*
Commentaires :
	La notion de surcharge est importante, car elle permet d'aller plus loin dans les traitements d'une fonction héritée. Par exemple quand on utilise un CMS, on ne doit pas toucher au coeur... mais on peut hériter de certaines classes, et apporter des modifications aux méthodes. 

	Le mot clé "parent::" fait référence aux traitements de la méthode originale, déclarée dans la classe mère/parente. 
*/




