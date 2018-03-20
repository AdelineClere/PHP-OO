<?php

//htdocs/PHPOO/04-constante-static-self/Maison.class.php

class Maison
{
	public $couleur = 'blanc'; // Appartient à l'objet
	public static $espaceTerrain = '500m2'; // Appartient à la classe
	private $nbPorte = 10; // Appartient à l'objet
	private static $nbPiece = 7; // Appartient à la classe
	const HAUTEUR = '10m'; // Appartient à la classe (public static)
	
	public function getNbPorte(){ // Appartient à l'objet
		return $this -> nbPorte;
	}
	
	public static function getNbPiece(){ // appartient à la classe
		return  self::$nbPiece;
		//return  Maison::$nbPiece;
	}	
}
//-----------------
echo Maison::$espaceTerrain . '<br/>';
//echo Maison::$nbPiece . '<br/>';// Erreur : J'essaie d'accéder à une propriété private (certe static) depuis l'extérieur de la classe
echo Maison::getNbPiece() . '<br/>';
echo Maison::HAUTEUR . '<br/>'; 


$maison = new Maison();
echo $maison -> couleur . '<br/>'; // OK j'accède à une propriété public via l'objet maison. 
//echo $maison -> espaceTerrain . '<br/>'; // ERREUR : J'essaie d'accéder à un élément de la classe depuis l'objet.
//echo $maison -> nbPorte; //Erreur j'essaie d'accéder à un élément de l'objet via l'objet, mais sa visibilité ne permet d'y accéder à l'extérieur de la classe. 
echo $maison -> getNbPorte() . '<br/>'; // Ok j'accède à un élément private grâce au getter public. 

/*
Commentaires : 
	Opérateurs :
		$objet -> = élément d'un objet à l'exterieur de la classe
		$this ->  = élément d'un objet à l'intérieur de la classe
		Class::   = élément d'une classe à l'extérieur de la classe
		self::    =  élément d'une classe à l'intérieur de la classe
	
	2 questions à se poser : 
		- est-ce que static ? 
			-> oui :
				- est-ce que je suis à l'intérieur ou à l'extérieur de la classe ?
					-> intérieur : self::
					-> exterieur : Class::
			
			-> non : 
				- est-ce que je suis à l'intérieur ou à l'extérieur de la classe ?
					-> intérieur : $this ->
					-> exterieur : $objet -> 


	Static signifie qu'un élément appartient à la classe. Pour y accéder on devra donc l'appeler par la classe (Class:: / self::). Une propriété static peut être modifiée, mais dans ce cas cette modification est durable dans le code.

	const signifie qu'une propriété appartient à la classe et ne peut pas être modifiée
					
*/














