<?php
//htdocs/PHPOO/02-getter-setter-constructeur-this/Homme.class.php

class Homme
{
	private $prenom;
	private $nom;

	public function setPrenom($arg){
		if(is_string($arg) && strlen($arg) > 5 && strlen($arg) <= 30){
			$this -> prenom = $arg;
			return true;
		}
		else{
			return false;
			echo 'Erreur dans le prenom';
		}
	}
	
	public function getPrenom(){
		return $this -> prenom; 
	}
}
//----------------------
$homme = new Homme(); 

$homme -> setPrenom('Yakine');
echo 'Bonjour ' . $homme -> getPrenom() . '!'; 


/*
Commentaires : 
	Pourquoi faire des getter et des setter ? 
		- Le php est un langage qui ne type pas ses variables. Donc mettre une visibilité private aux propriétés, et créer les setters pour vérifier l'intégrité des données EST UNE BONNE CONTRAINTE. 
		- Tout dev' qui voudra affecter une valeur devra OBLIGATOIREMENT passer par le setter. 

	Setter : Affecter une valeur
	Getter : Récupérer une valeur
	
	Nous aurons autant de setter et de getter que de propriétés private. 
	
	$this représente l'objet en cours de manipulation. 
	
*/















