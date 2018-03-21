<?php

abstract class Joueur   // necessite class abstraite
{
    public function seConnecter() {
        // pr se connecter ? > Être majeur !
        return $this -> etreMajeur();
    }
    abstract public function etreMajeur();  // ⚠️obligation absolue pr héritiers de re-déclarer la fct 
    abstract public function devise();       
}

//----------------

class JoueurFr extends Joueur
{
    public function etreMajeur() {
        return 18;
    }
    public function devise() {
        return '€';
    }
}

//----------------

class JoueurUs extends Joueur
{
    public function etreMajeur() {
        return 21;
    }
    public function devise() {
        return '$';
    }
}

//----------------

$joueurFr = new JoueurFr;
echo $joueurFr -> seConnecter() . '<br>';

$joueurUs = new JoueurUs;
echo $joueurUs -> seConnecter() . '<br>';




/*****************⚠️ COMMENTAIRES ⚠️*******************
* 
    - Une classe abstraite ne peut pas être instanciée mais VOCATION A ETRE HERITEE (ê utilisée par tt autre dev')
    - Les méthodes abstraites n'ont pas de contenu (PAS DE CORPS)
    - Pour déclarer une méthode abstraite, il faut OBLIGATOIREMENT être ds une CLASSE ABSTRAITE.
    - Qd on hérite d'une méthode abstraite, on doit OBLIGATOIREMENT la REDEFINIR.
    - Une classe abstraite PEUT contenir des méthodes normales.

    Le dév qui écrit la classe abstraite est svt au COEUR de l'appli (développeur maître)

    Rq. : que fct abstraites, pas propriétés
*/