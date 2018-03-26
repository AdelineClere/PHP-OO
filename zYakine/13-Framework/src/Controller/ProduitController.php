<?php

//src/Controller/ProduitController;

namespace Controller; 

class ProduitController extends Controller
{
	
	// Afficher tous les produit (home)
	public function afficheAll(){
		//1 : Récupérer tous les produits
		//2 : Récupérer toutes les catégories
		//3 : Renvoyer la vue (boutique.php)
		
		$produits = $this -> getModel() -> getAllProduit();		
		$categories = $this -> getModel() -> getAllCategorie();
	
		
		$params = array(
			'produits' => $produits,
			'categories' => $categories,
			'title' => 'Boutique'
		);
		
		return $this -> render('layout.html', 'boutique.html', $params);
		
	}
	
	//Afficher un produit (fiche_produit)
	public function affiche($id){
		//1. Récupérer les infos du produit dont l'id est $id
		//2. Renvoyer la vue
		
		$produit = $this -> getModel() -> getProduitById($id);
		
		$params = array(
			'produit' => $produit,
			'title' => $produit -> getTitre()
		);
		
		return $this -> render('layout.html', 'fiche_produit.html', $params);
	}
	
	//Afficher les produits d'une categorie (boutique/categorie)
	public function boutique($cat){
		//1 : Récupérer tous les produits de la categorie $cat
		//2 : Récupérer toutes les catégories
		//3 : Renvoyer la vue (boutique.php)
		
		$produits = $this -> getModel() -> getAllProduitByCategorie($cat);
		$categories = $this -> getModel() -> getAllCategorie();
		
		$params = array(
			'produits' => $produits,
			'categories' => $categories
		);
		
		return $this -> render('layout.html', 'boutique.html', $params);
	}
	
	//afficher les produits en fonction d'une recherche
	public function recherche(){
		
		if($_POST){
			if(!empty($_POST['term'])){
				
				$produits = $this -> getModel() -> getProduitBySearch($_POST['term']);
				
				$params = array(
					'produits' => $produits,
					'title' => count($produits) . ' résultats avec la recherche : <b>' . $_POST['term'] . '</b>'
				);
				
				return $this -> render('layout.html', 'search.html', $params);
		
			}
			else{
				$this -> afficheAll();
			}
		}
	}
	
	
	
	
	
	
	
}