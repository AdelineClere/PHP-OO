<?php
//src/Model/ProduitModel

namespace Model;

use PDO;

class ProduitModel extends Model    
// tt le code de Model.php existe ici ! (mais + pratiq d'utiliser getAll gat By etc...)
{
    public function getAllProduit() {
        return $this -> findAll();
    }

    public function getProduitById($id){
        return $this -> find($id);
    }

    public function updateProduit($id, $infos) {
        return $this -> update($id, $infos);
    }
    
    public function deleteProduit($id) {
        return $this -> delete($id);
    }
    
    public function registereProduit($infos) {
        return $this -> uregister($infos);
    }


    public function getAllCategorie() {      // requete ici car propre à Produit pas à Model.php
        $requete = "SELECT DISTINCT categorie FROM produit";
        $resultat = $this -> getDb() -> query($requete);

        $donnees = $resultat -> fetchAll(); // pas de class categ. dc je vais pas récup sous forme d'array ?
                                            // > retourner un array de tous les pdts en OBJETs ?

        if(!$donnees) {
            return FALSE;
        }
        else {
            return $donnees;
        }
    }

    public function getAllProduitByCategorie($cat) {
        $requete = "SELECT * FROM produit WHERE categorie = :cat"; // on prepare car val recup ds URL > sensible !
        $resultat = $this -> getDb() -> prepare($requete);
        $resultat -> bindValue(':cat', $cat, PDO::PARAM_STR);
        $resultat -> execute();
    
        $resultat -> setFetchMode(PDO::FETCH_CLASS, 'Entity\Produit');

        $donnees = $resultat -> fetchAll();

        if(!$donnees) {
            return FALSE;
        }
        else {
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
        OR taille LIKE :term
        OR prix LIKE :term 
        OR categorie LIKE :term 
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

    //-----------------------------------------------------EVALUATION

// résupérer l'id du produit choisi pour appeler les similaires

// appeler les pdts similaires
    public function getProduitSuggere($id) {
        $pdt = $this -> find($id);
        $id = $this -> getModel -> getProduitSuggere($pdt);

        $requete = "
        SELECT * FROM produit 
        WHERE categorie = $id('categorie')
        AND taille = $id('taille')
        AND prix MAX <= ($id(prix)) *1.30) 
        AND prix MIN >= (


        ORDER BY prix DESC LIMIT 0, 3;
        

    
        $resultat -> setFetchMode(PDO::FETCH_CLASS, 'Entity\Produit');

        $donnees = $resultat -> fetchAll();

        if(!$donnees) {
            return FALSE;
        }
        else {
            return $donnees;
        }   
    



















}
