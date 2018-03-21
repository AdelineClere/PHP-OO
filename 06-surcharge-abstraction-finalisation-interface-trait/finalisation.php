<?php


final class Application
{
    public function run() {
        return 'Lancement de l\'application !';
    }
}
//-----

//  class Extension extends Application {}
    // => ERREUR : impossible d'hériter d'une classe finale (on ne veut pas qu'elle le soit)


//-----


class Application2
{
    final public function run2() {
        return 'Lancement de l\'application !'; 
    }
}

//-----

class Extension extends Application2
{
    // public function run2() {
    // ERREUR : impossible de redéfinir ou surcharger une fct final
    //}
}




/*****************⚠️ COMMENTAIRES ⚠️*******************

    - Une classe finale ne peut PAS ÊTRE HERITEE
    - Les méthodes d'une classe finale sont forcément finales par déf° car la classe ne pouvant ê héritée, 
      les fct ne seront JAMAIS SURCHARGEES...
    - Une classe finale PEUT Ê INSTANCIEE

    - Une méthode finale PEUT Ê présente ds une classe normale
    - Une méthode finale ne peut PAS Ê SURCHARGEE NI REDEFINIE
*/