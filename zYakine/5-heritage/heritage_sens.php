<?php
//htdocs/PHPOO/05-heritage/heritage_sens.php

class A
{
	public function test(){
		return 'test';
	}
	
	protected function test4(){
		return ' + test4';
	}
}
//-------
class B extends A
{
	public function test2(){
		return 'test2';
	}
}
//-------
class C extends B
{
	public function test3(){
		return 'test3' . $this -> test4();
	}
}
//-------
$c = new C; 
echo $c -> test() . '<br/>'; // Méthode de A accessible par C (héritage indirect)
echo $c -> test2() . '<br/>'; // Méthode de B accessible par C (héritage direct)
echo $c -> test3() . '<br/>'; // Méthode de C accessible par C

// transitivité : Si C hérite de B et que B hérite de A, alors C hérite de A. 

echo '<pre>';
var_dump(get_class_methods($c));
echo '</pre>'; 

/*
commentaires : 
	Transitivité : 
		Si B hérite A
			Et si C hérite de B
				Alors... C hérite de A (indirectement)
		Les méthodes protected de A sont accessibles dans C même si l'héritage est indirect. 
		
		
	L'héritage est : 
		- Non reflexif : Class D extends D ===> Une classe ne peut pas hérite d'elle-même
		- Non Symétrique : Ce n'est pas parce que E extends F que F va extends E. 
		- Sans cycle : Si E extends F, il est impossible que F extends E
		- Pas multiple : Class N extends, M, P ==> En PHP il n'y a pas d'héritage multiple. 
		
	Une classe peut avoir un nombre infini d'héritiers. 
*/









