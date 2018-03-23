<?php
//htdocs/PHPOO/01-classes-objet-instance-visibilite/Panier.class.php


class Panier
{
	public $nbProduit; // propriété

	public function ajouterProduit(){ // méthode
		// traitements de la méthode
		return 'L\'article a été ajouté !';
	}
	
	protected function retirerProduit(){
		return 'L\'article a été supprimé du panier !';
	}
	
	private function afficherPanier(){
		return 'Voici les articles dans le panier !';
	}
}
//---------
$panier1 = new Panier; 
// $panier1 est un objet de la class Panier. On parle d'instance. 
echo '<pre>';
var_dump($panier1);
var_dump(get_class_methods($panier1));
echo '</pre>';

$panier1 -> nbProduit = 5; 
// Affectation de la valeur 5 dans la propriété nbProduit de Panier1

echo '<pre>';
var_dump($panier1);
echo '</pre>';

echo 'Il y a ' . $panier1 -> nbProduit . ' produit(s) dans votre panier <br/>';

echo 'Panier : ' . $panier1 -> ajouterProduit() . '<br/>';

$panier2 = new Panier;
echo '<pre>';
var_dump($panier2);
echo '</pre>';
// Nous avons affecté une valeur à nbProduit de Panier1... Cela n'a pas d'incidence sur Panier2 pour lequel la valeur de nbProduit reste Null! 

//echo 'Panier : ' . $panier1 -> retirerProduit() . '<br/>';

//echo 'Panier : ' . $panier1 -> afficherPanier() . '<br/>';

//ERREUR : Nous ne pouvons pas accéder à des éléments protected et private depuis l'extérieur d'une classe. 

/*
Commentaires : 
	'new' est un mot clé qui permet de créer un objet issu d'une classe. On parle d'instanciation. 

	Niveaux de visibilité : 
		- public : Accessible de partout (intérieur/extérieur)
		- protected : Accessible à l'intérieur de la classe et des classes héritières
		- private : Accessible uniquement dans la classe où l'élément est déclaré. 

	On peut créer plusieurs objets issus d'une même classe. 
*/




