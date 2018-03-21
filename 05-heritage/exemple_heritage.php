<?php

class Membre
{
    public $id_membre;
    public $pseudo;
    public $email;

    public function inscription() {
        return 'Je m\'inscris !';
    }

    public function connexion() {
        return 'Je me connecte !';
    }
}
//--------------------------------

class Admin extends Membre  // Admin hérite de Membre (<=> tte la Class M collée ici)
{
    // Tout le code de la classe Membre est présent ici

    public function accesBackOffice() {
        return 'J\'accède au BackOffice !';
    }
}
//----------

$admin = new Admin();
echo $admin -> inscription() . '<br/>';
echo $admin -> connexion() . '<br/>';
echo $admin -> accesBackOffice() . '<br/>';



/*****************⚠️ COMMENTAIRES ⚠️*******************
 * 
 *  Ds notre site, un admin c'est un membre ac une focntionnalité suppl. : Accès au BackOffice.
 *  ⚠️ Dc naturel que la class admin hérite (extends) de la classe Membre et qu'on ne réécrive pas tt le code 2 fois.
 * 
 * 
 * 
 *  Rq : si une fct est private : on hérite, accessible, droit d'utiliser, mais "existe" pas ds domaine public..
 */