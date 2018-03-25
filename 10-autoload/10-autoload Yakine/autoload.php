<?php
//htdocs/PHPOO/10-autoload/
 // -> autoload.php
 
function inclusion_automatique($nom_de_classe){

	//Rq. : $a = newController\Membre\($nom_de_classe) { = tu explodes dès que tu trouves un \ ( on va chercher $.. qui se trouve ds classe Membre qui se trouve ds namespace Controller)}
	
	$tab = explode('\\',  $nom_de_classe);
	$chemin_class = implode('/', $tab);
	
	require($chemin_class . '.class.php');
	// require A.class.php

	//-----
	echo 'On passe dans l\'autoload<br/>';
	echo 'L\'autoload fait : require(' . $chemin_class . '.class.php)<br/>';


}


//---------------------
spl_autoload_register('inclusion_automatique');
//---------------------
/*
Commentaires : 
	spl_autoload_register :
		- Que c'est une fonction super pratique. Son rôle est de s'exécuter dès que le serveur voit passer un 'new'
		- Cette fonction va exécuter une fonction... La fonction que je lui passer en argument
		- Va apporter à notre fonction, le(s) mot(s) qui se trouve(nt) après le mot 'new'
		
		Concrètement : 
		On lance : $a = new A;
		spl_autoload_register lance : inclusion_automatique('A');
*/


