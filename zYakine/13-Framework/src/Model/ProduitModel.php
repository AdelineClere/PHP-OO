<?php
//src/Model/ProduitModel

namespace Model; 

use PDO;

class ProduitModel extends Model
{
	// Tout le code de Model.php est ici
	
	public function getAllProduit(){
		return $this -> findAll();
	}
	
	public function getProduitById($id){
		return $this -> find($id);
	}
	
	public function updateProduit($id, $infos){
		return $this -> update($id, $infos);
	}
	
	public function deleteProduit($id){
		return $this -> delete($id);
	}
	
	public function registerProduit($infos){
		return $this -> register($infos);
	}
	
	
	public function getAllCategorie(){
		$requete = "SELECT DISTINCT categorie FROM produit";
		$resultat = $this -> getDb() -> query($requete);
		
		$donnees = $resultat -> fetchAll();
		
		if(!$donnees){
			return FALSE; 
		}
		else{
			return $donnees;
		}
	}
	
	
	
	
	public function getAllProduitByCategorie($cat){
		$requete = "SELECT * FROM produit WHERE categorie = :cat";
		$resultat = $this -> getDb() -> prepare($requete);
		$resultat -> bindValue(':cat', $cat, PDO::PARAM_STR);
		$resultat -> execute();
		
		$resultat -> setFetchMode(PDO::FETCH_CLASS, 'Entity\Produit');
		
		$donnees = $resultat -> fetchAll();
		
		if(!$donnees){
			return FALSE;
		}
		else{
			return $donnees;
		}	
	}
	
	
	public function getProduitBySearch($term){
		$term = '%' . $term . '%';
		
		$requete = "
		SELECT * 
		FROM produit 
		WHERE titre LIKE :term 
		OR description LIKE :term 
		OR categorie LIKE :term  
		OR taille LIKE :term 
		OR prix LIKE :term 
		";
	
		$resultat = $this -> getDb() -> prepare($requete);
		$resultat -> bindValue(':term', $term, PDO::PARAM_STR);
		$resultat -> execute();
		
		$resultat -> setFetchMode(PDO::FETCH_CLASS, 'Entity\Produit');
		
		$donnees = $resultat -> fetchAll();
		
		if(!$donnees){
			return FALSE;
		}
		else{
			return $donnees;
		}	
	}
	
	
	
}


