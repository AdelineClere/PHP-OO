<?php

//htdocs/PHPOO/05-heritage/exemple_heritage.php

class Membre{
	public $id_membre;
	public $pseudo;
	public $email;
	
	public function inscription(){
		return 'Je m\'inscris !';
	}
	
	public function connexion(){
		return 'Je me connecte !';
	}
}
//--------
class Admin extends Membre // Admin hérite de Membre
{

	// Tout le code de la classe Membre est présent ici
	
	public function accesBackOffice(){
		return 'J\'accède au BackOffice !';
	}
}
//-------

$admin = new Admin();
echo $admin -> inscription() . '<br/>';
echo $admin -> connexion() . '<br/>';
echo $admin -> accesBackOffice() . '<br/>';

/*
Commentaires : 
	Dans notre site, un admin c'est un membre avec une fonctionnalité supplémentaire : Accès au BackOffice. 
	Il est donc naturel que la classe Admin hérite (extends) de la classe Membre et qu'on ne réécrive pas tout le code deux fois. 
*/






