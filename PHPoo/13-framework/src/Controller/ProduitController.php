<?php
//src/Controller/ProduitController;

namespace Controller;

class ProduitController extends Controller  // Controller a déjà 'use Model', dc pas besoin ici de rapp.
{
    //⚠️️  Aff. ts les pdts (home)
    public function afficheAll() {
        //1. Récup ts les pdts
        //2. Récup ttes les categories
        //3. Renvoyer la vue (boutique.php)
        $produits = $this -> getModel() -> getAllProduit();
        $categories = $this -> getModel() -> getAllCategorie();

        // DIR met pas '/' à la fin (__DIR__ / . ../View/p... (on est pas en chemin absolu)  sinon idem html
        // return $this -> render();

        $params = array(
            'produits'      => $produits,
            'categories'    => $categories
        );
        return $this -> render('layout.html', 'boutique.html', $params);
        // va rendre dans layout (+ gde poupee russe) la boutique (petite) avec les param (moyenne)
    }   // $params = array => d'où un extract ds vendro/Controller.php lg 43

        

    //⚠️️  Aff. un pdt (fiche_produit)
    public function affiche($id) {
        //1. Récup les infos du pdt dont l'id est $id
        //2. Renvoyer la vue

        $produit = $this -> getModel() -> getProduitById($id);

        $params = array(
            'produit' => $produit
        );
        return $this -> render('layout.html', 'fiche_produit.html', $params);
    }

    //⚠️️ Aff. les pdts d'une categorie (boutique/categorie)
    public function boutique($cat) { 
        //1. Récup ts les pdts de la catégorie $cat
        //2. Récup ttes les categories

        $produits = $this -> getModel() -> getAllProduitByCategorie($cat);
        $categories = $this -> getModel() -> getAllCategorie();

        $params = array(
            'produits'      => $produits,
            'categories'    => $categories
        );
       
       return $this -> render('layout.html', 'boutique.html', $params);

    }

        //⚠️️  Aff. les pdts en fct° d'une recherche
    public function recherche() {

        if($_POST) {                            // si recherche activée = j'ai du post...
            if(!empty($_POST['term'])) {

                $produits = $this -> getModel() -> getProduitBySearch($_POST['term']);

                $params = array(                // j'embarq les pdts que je vais trouver
                    'produits' => $produits,
                    'title' => count($produits) . ' résultats avec la recherche : <b>' . $_POST['term'] . '</b>'
                );

                return $this -> render('layout.html', 'search.html', $params);    //    
            }
        else {
            $this -> afficheall();  // je fais appel à fct° afficheall de pdtController qui va app tt
        }
    }
    }

//-----------------------------------EVALUATION

    //⚠️️ Aff. les pdts similaire
    $pdt = $this -> find ($id_produit)

    public function produitSuggere($pdt) { 

        $produits = $this -> getModel() -> getAllProduitById($id);

        $params = array(
            'produits'      => $produits,
        );
       
       return $this -> render('layout.html', 'boutique.html', $params);

    }

















}

