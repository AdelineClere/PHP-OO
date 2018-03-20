<?php
//htdocs/PHPOO/02-getter-setter-constructeur-this/Etudiant.class.php

class Etudiant
{
	private $prenom;
	
	public function __construct($arg){
		
		// La fonction __construct() (méthode magique) se lance au moment de l'instanciation...
		//$this -> prenom = $arg;
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
$etudiant = new Etudiant('Yakine');
echo 'Prénom : ' . $etudiant -> getPrenom();
//En modifiant UNIQUEMENT l'intérieur de la classe, essayer d'affecter la valeur 'Yakine' à la propriété prénom. 








