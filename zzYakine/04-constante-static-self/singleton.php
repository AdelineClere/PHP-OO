<?php

//htdocs/PHPOO/04-constante-static-self/singleton.php

//Design pattern (Modele de conception) : C'est une réponse trouvée par d'autres développeurs à une question que beaucoup se posent.   

//singleton : C'est la réponse à la question suivante : Comment créer une classe qui ne soit instanciable qu'une seule et unique fois (exemple : connexion à la BDD)

class Singleton{
	
	private static $instance = NULL; // propriété qui appartient à la classe, et qui contiendrait un objet de cette même classe.
	
	private function __construct(){} // Fonction private, donc instanciation impossible
	private function __clone(){} // Fonction private, donc clonage impossible
	
	public static function getInstance(){
		
		if(is_null(self::$instance)){
		//if(!self::$instance){
		//if(self::$instance == NULL){
			self::$instance = new Singleton;
			//self::$instance = new self;
		}
		return self::$instance; 
	}
	
}
//$singleton = new Singleton; // impossible
$singleton = Singleton::getInstance(); 
$singleton2 = Singleton::getInstance(); 

echo '<pre>';
var_dump($singleton);
var_dump($singleton2);
echo '</pre>'; 

