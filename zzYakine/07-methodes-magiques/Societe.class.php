<?php
//htdocs/PHPOO/7-methodes_magiques/
 // -> Societe.class.php

// Les méthodes magiques sont des fonctions qui s'exécutent automatiquement en fonction d'évenements en particulier. 
 
class Societe
{
	public $adresse; 
	public $ville;
	public $cp;
	
	public function __construct(){}
	
	public function __set($nom, $valeur){
		echo 'Hey oh, jeune Padawan, que fais-tu ? La propriété <u><b>' . $nom . '</b></u> n\'existe pas. Valeur : ' . $valeur;
		
		// Se déclenche lorsqu'on tente d'affecter une valeur à une propriété qui n'existe pas. 
	}	
	
	public function __get($nom){
		echo "<br/>La propriété $nom  n'existe pas ! <br/>" ;
	}
}
//----------
$societe = new Societe; 

$societe -> adresse = "18 rue geoffroy L'asnier";
$societe -> ville = "Paris";
$societe -> cp = "75004";
$societe -> pays = "France"; 
echo $societe -> telephone;

//$societe -> ouverture('lundi', 'mardi');
//Societe::ouverture('lundi', 'mardi')

/*
	D'autres méthodes magiques existent : 

	- __call($nom, $args) : S'exécute lorsqu'on tente d'appeler une fonction qui n'existe pas. On récupère en args, le nom de la methode, et les argumets qui avaient été passés
	- __callStatic($nom, $args) : idem mais pour les méthodes static
	- __destruct() : S'éxécute à la fin du script. Ex : fermer la connexion à la BDD, fermer des fichiers... 
	- Liste non exhaustive : __isset(), __wakeup(), __sleep(), __clone(), invoke();
	
*/






