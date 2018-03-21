<?php

interface Mouvement
{
    public function start();
    public function turnLeft();
    public function turnRight();
}

class Avion implements Mouvement
{
    public function demarrer() {}      // Erreur !
    public function tourneDroite() {}  // Erreur !
    public function tourneGauche() {}  // Erreur !
        // Cette classe contient plein d'erreur puisque le dév' qui a codé ces fcts n'a pas respecté le contrat (interface Mouvement) dans le naming des fcts.
}

//-------

class Bateau implements Mouvement
{
    public function start() {}
    public function turnRight() {}
    public function turnLeft() {}
}

/*****************⚠️ COMMENTAIRES ⚠️*******************
 * 
 *  - Une interface est une liste de méthode (sans coprs) qui permet de garantir que toutes les classes 
 *    qui implements l'interface contiendront ttes les méthodes de l'interface, ac LES MÊMES NOMS.
 *    C'est une sorte de LEXIQUE A RESPECTER, contrat passé entre le dév' maître et les autres dév'.
 * 
 *  - Une interface n'est PAS INSTANCIABLE;
 *  - Bateau et Avion peuvent par ex. hériter d'une classe Vehicule et implémenter l'interface Mouvement.
 *    Les mvts st des pts communs que Bateau et Avion partagent.
 *  - On peut hériter d'une classe et implémenter une interface en même temps :⚠️class A extends B implement C
 *  - Les METHODES d'une interface sont FORCEMENT PUBLIC sinon elles ne pourraient pas être redéfinies.
 */