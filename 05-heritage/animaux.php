<?php

class Animal
{
    protected function deplacement() {
        return 'Je me déplace';
    }

    public function manger() {
        return 'Je mange !';
    }
}
//-----------
Class Elephant extends Animal
{
    // tt le code de class Animal est présent
    public function quiSuisJe() {
        return 'Je suis un Elephant, et ' . $this -> deplacement() . '!<br/>';  
        //⚠️ ok car fct PROTECTED peut ê utilisée ds sa class ou class enfants (private aurait été imposs.)
    }
}
//-----------
class Chat extends Animal
{
    public function quiSuisJe() {
        return 'Je suis un chat !';
    }

    public function manger() {  //⚠️ redéfinition de fonction
        return 'Je mange peu !';
    }
}

//-------------------------------------------------------------

$eleph = new Elephant;
echo $eleph -> manger() . '<br>';
echo $eleph -> quiSuisJe() . '<br>';

$chat = new Chat;
echo $chat -> manger() . '<br>';
echo $chat -> quiSuisJe() . '<br>';




/*****************⚠️ COMMENTAIRES ⚠️*******************
 * 
 * L'héritage est l'un des fondements de la programmation orientée objet (ts les langages) ⚠️
 * Lorsqu'une classe hérite d'une autre classe, elle importe tt le code ⚠️ 
 * Les élts st dc appelés $this ⚠️ (à l'int de la classe).
 * 
 * Redéfinition de fct ⚠️ (vs Surcharge) :
 * Une classe enfant (héritière) peut modifier ENTIERMENT ⚠️ le traitement d'une fonction dont elle a hérité. 
 * 
 *  (L'interprêteur va d'abord regarder si la méthode existe ds la classe qui l'exécute puis dans la classe mère.)
 * 
 * */