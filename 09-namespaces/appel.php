<?php

// -> appel.php


namespace General;      // ⚠️ ne marche plus si on met un namespace genéral ici ! (PHP +- la gde armoire, ou poupées russes)
//⚠️  alors =>   
use PDO;
use Espace1;
use Espace2;
            // autre méthode : antislash pour sortir des esp : $c = new \Espace1\A;   

            
require('espace1.php');
require('espace2.php');

$c = new Espace1\A;         // du coup obligé d'appeler class par/dans son espace virtuel ⚠️ 
echo $c -> test() . '<hr>';

$d = new Espace2\A;
echo $d -> test2() . '<hr>';



/*****************⚠️ COMMENTAIRES ⚠️*******************
  
    Les namespaces sont incontournables dès lors qu'on trv sur une appli vaste et organisée.

    Les namespaces permettent de ⚠️ DECLARER DES ESPACES VIRTUELS afin de mieux organiser nos fichiers, 
    et aussi MIEUX GERER le trv COLLABORATIF
    ex. : le dev A peut créer une class C dans son namespace pdt que le dev B peut créer une class C dans le sien;

    Dès lors qu'on utilise les namespaces qques régles s'appliquent :
        - on instancie une classe ac son nom complet :  ⚠️  $a = new Espace1\A
        - pour pvr utiliser les class d'un autre namespace ou de l'espace global de PHP (PDO par ex), on doit au choix :
            -> Définir le chemin complet :  ⚠️ $PDO = new \PDO
            -> Importer les classes et namespaces ac l'instruction ⚠️ "use" (ex. use PDO, Espace1, Espace2)
*/