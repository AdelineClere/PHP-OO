<?php
//htdocs/PHPOO/9-namespace/
 // -> appel.php
 
namespace General;

use PDO;
use Espace1; 
use Espace2; 
 
require('espace1.php');
require('espace2.php');


$c = new Espace1\A; 
echo $c -> test() . '<hr/>';

$d = new Espace2\A; 
echo $d -> test2() . '<hr/>'; 
 
$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '');

/*
Commentaires : 
	- Les namespaces sont incontournables dès lors qu'on travaille sur une application vaste et organisée. 
	
	- Les namespaces permettent de déclarer des espaces virtuels afin de mieux organisé nos fichers, et aussi de mieux gérer le travail collaboratif (exemple le dev A peut créer une class C dans son namespace pendant que le dev B créer également une class C dans son namespace...)
		
	Dès lorsqu'on utilise les namespaces quelques règles s'appliquent : 
		- On instancie une class avec son nom complet : $a = new Espace1\A
		- Pour pouvoir utiliser les classes d'un autre namespace ou de l'espace globale de PHP (PDO par exemple), on doit au choix : 
			-> Définir le chemin complet : $PDO = new \PDO
			-> importer les classes et namespaces avec l'instruction "use" (exemple : use PDO, Espace1, Espace2)
*/


//-----------








