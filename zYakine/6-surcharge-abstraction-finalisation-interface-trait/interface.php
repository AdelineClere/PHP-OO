<?php
//htdocs/PHPOO/6-surcharge-abstraction-finalisation-interface-trait/interface.php

interface Mouvement
{
	public function start();
	public function turnLeft();
	public function turnRight();
}

class Avion implements Mouvement
{	
	public function demarrer(){} //Erreur !
	public function tourneDroite(){}  //Erreur !
	public function tourneGauche(){} //Erreur !
	// Cette classe contient plein d'erreur puisque le dev' qui a coder ces fonctions n'a pas respecter le contrat (interface Mouvement) dans le naming des fonctions. 
}

//------
class Bateau implements Mouvement
{
	
	public function start(){}
	public function turnRight(){}
	public function turnLeft(){}
}


/*
Commentaires :	
	- Une interface est une liste de méthodes (sans contenu, sans corps) qui permet de garantir que toutes les classes qui implements l'interface contiendront toutes les méthodes de l'interface, avec LES MEMES NOMS. C'est une sorte de lexique, ou de contrat passé entre le dev' maître et les autres développeurs. 

	- Une interface n'est pas instanciable
	- Bateau et Avion peuvent par exemple hérité d'une classe Vehicule, et implementer l'interface Mouvement. Les mouvements sont des points communs que bateau et avion partage. 
	- On peut hériter d'une classe, et implementer une interface en même temps : class A extends B implement C
	- Les méthodes d'une interface sont forcément public sinon elles ne pourraient pas être redéfinies. 
*/









