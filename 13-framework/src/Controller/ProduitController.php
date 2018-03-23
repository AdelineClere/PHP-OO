<?php
//src/Controller/ProduitController;

namespace Controller;

class ProduitController extends Controller  // Controller a déjà 'use Model', dc pas besoin ici de rapp.
{
    // Aff. ts les pdts (home)
    public function afficheAll() {
        //1. Récup ts les pdts
        //2. Récip ttes les categories
        //3. Renvoyer la vue (boutique.php)
        $produits = $this -> getModel() -> getAllProduit();
        $categories = $this -> getModel() -> getAllCategorie();

        
        // DIR met pas '/' à la fin (__DIR__ / . ../View/p... (on est pas en chemin absolu)  sinon idem html
        // return $this -> render();
   


        $produits = $this -> getModel() -> getAllProduit();
        $categorie = $this -> getModel() -> getAllCategorie();

        $params = array(
            'produits'      => $produits,
            'categories'    => $categories
        );
        return $this -> render('layout.html', 'boutique.html', $params);
        // va rendre dans layout (+ gde poupee russe) la boutique (petite) avec les param (moyenne)
    }

        



    // Aff. un pdt (fiche_produit)
    public function affiche($id) {
        //1. Récup les infos du pdt dont l'id est $id
        //2. Renvoyer la vue

        $produit = $this -> getModel() -> getProduitById($id);

        $params = array(
            'produit' => $produit
        );
        return $this -> render('layout.html', 'fiche_produit.html', $params);
    }

    // Aff. les pdts d'une categorie (boutique/categorie)
    public function boutique($cat) {
        //1. Récup ts les pdts de la catégorie $cat
        //2. Récip ttes les categories
        //3. Renvoyer la vue (boutique.php)

        $produits = $this -> getModel() -> getAllProduitByCategorie($cat);
        $categories = $this -> getModel() -> getAllCategorie();

        $params = array(
            'produits' => $produits,
            'categories' => $categories
        );
        return $this -> render('layout.html', 'boutique.html', $params);

    }

    // Aff. les pdts en fct° d'une recherche
    public function recherche($term) {

    }
}