<?php

//htdocs/PHPOO/05-heritage/animal.php

class Animal
{
	protected function deplacement(){
		return 'Je me déplace';
	}	
	
	public function manger(){
		return 'Je mange'; 
	}
	
}
//------
Class Elephant extends Animal
{
	// tout le code de la classe Animal est présent ici
	
	public function quiSuisJe(){
		return 'Je suis un Elephant, et ' . $this -> deplacement() . '!<br/>';
	} 
}
//------
class Chat extends Animal 
{
	public function quiSuisJe(){
		return 'Je suis un chat !';
	}
	
	public function manger(){ // redéfinition de fonction
		return 'Je mange peu !';
	}
}
//
$eleph = new Elephant; 
echo $eleph -> manger() . '<br/>';
echo $eleph -> quiSuisJe() . '<br/>';

$chat = new Chat; 
echo $chat -> manger() . '<br/>';
echo $chat -> quiSuisJe() . '<br/>';

/*
Commentaires : 
	L'héritage est l'un des fondements de la programmation orienté objet (tous les langages).
	Lorsqu'une classe hérite d'une autre classe, elle importe tout le code. Les éléments sont donc appelés $this (à l'intérieur de la class)

	Rédéfinition de fonction : Une classe enfant (héritière) peut modifier ENTIEREMENT le traitement d'une fonction dont elle a hérité. On parle de redéfinition de fonction (vs Surchage).
	
	L'interprêteur va d'abord regarder si la méthode exsiste dans la classe qui l'exécute puis dans la classe mère. 
*/








