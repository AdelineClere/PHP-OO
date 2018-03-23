<?php
//htdocs/PHPOO/6-surcharge-abstraction-finalisation-interface-trait/abstraction.php

abstract class Joueur
{	
	public function seConnecter(){
		// Que faut-il pour se connecter ? Etre majeur ! 
		return $this -> etreMajeur();
	}
	
	abstract public function etreMajeur(); // Pas de corps dans une fonction abstraite.
	abstract public function devise();
	
}
//-----------
class JoueurFr extends Joueur
{
	
	public function etreMajeur(){
		return 18; 
	}
	
	public function devise(){
		return '€';
	}
}
//-----------
class JoueurUs extends Joueur
{
	public function etreMajeur(){
		return 21; 
	}
	
	public function devise(){
		return '$';
	}
}
//----------
$joueurFr = new JoueurFr; 
echo $joueurFr -> seConnecter() . '<br/>'; 

$joueurUs = new JoueurUs; 
echo $joueurUs -> seConnecter() . '<br/>'; 

/* 
Commentaires : 
	- Une classe abstraite ne peut pas être instanciée
	- Les méthodes abstraites n'ont pas de contenu (pas de corps)
	- Pour déclarer une méthode abstraite, il faut OBLIGATOIREMENT être dans une classe abstraite. 
	- Lorsqu'on hérite d'une méthode abstraite, on doit OBLIGATOIREMENT la redéfinir. 
	- Une classe abstraite peut contenir des méthodes normales. 
	
	Le développeur qui écrit la classe abstraite est souvent au coeur de l'application (developpeur maître) 
*/













