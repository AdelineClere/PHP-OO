<?php
//htdocs/PHPOO/6-surcharge-abstraction-finalisation-interface-trait/finalisation.php

final class Application
{
	public function run(){
		return 'Lancement de l\'application !';
	}
}
//----
// class Extension extends Application{} // Erreur il est impossible d'hériter d'une classe finale. 
//----
//----
//----
class Application2
{
	final public function run2(){
		return 'Lancement de l\'application !';
	}
}
//----
class Extension2 extends Application2
{
	//public function run2(){} // Erreur il est impossible de redéfinir ou de surcharger une fonction final.
} 

/*
Commentaires : 
	- Une classe finale ne peut pas être héritée
	- Les méthodes d'une classe finale sont forcément finales par définition puisque la classe ne pouvant être héritée, les fonctions ne seront jamais surchargée...
	- Une classe finale peut être instanciée

	- Une méthode finale peut être présente dans une classe normale
	- Une méthode finale ne peut pas être surchargée ou redéfinie.
*/








