<?php

// poss de le faire en procédural ou en objet
// procédural ici :


function inclusion_automatique($nom_de_classe) {

        require($nom_de_classe . '.class.php');
        // require A.class.php 

        //---------
        echo 'On passe dans l\'autoload<br>';
        echo 'L\'autoload fait : require (' . $nom_de_classe . '.class.php)<br>';
}

//----------------------------------------------

spl_autoload_register('inclusion_automatique');

//----------------------------------------------



/*****************⚠️ COMMENTAIRES ⚠️*******************

   ⚠️  spl_autoload_register(); :
        - Fct super pratique. Rôle = ⚠️ s'EXECUTE dès que le serveur voit passer un 'new'️
        - Cette fct VA EXECUTER UNE FONCTION... La fct que je lui ai passée en argument
        - ⚠️ VA APPORTER à notre fct le(s) mot(s) qui se trouvent après le mot 'new'

Concrètement :
        On lance ça                 : ⚠️   $a = new A;
        spl_autoload_register lance : ⚠️   inclusion_automatique('A');


*/