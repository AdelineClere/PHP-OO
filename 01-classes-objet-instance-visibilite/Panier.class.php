<?php
//htdocs.PHP OO/01-classes-objet-instance-visibilite/Panier.class.php

class Panier    // on va créer une class panier
{
    public $nbProduit;                  //⚠️ on créé une PROPRIETE qui n'a pas de valeur (propriété <=> variable)
    public function ajouterProduit(){   //⚠️ = METHODE
        // traitements de la méthode
       return 'L\article a été ajouté !';
    }

    protected function retirerProduit(){
        return 'L\article a été supprimé du panier !';
    }

    private function afficherPanier(){
        return 'Voici les articles dans le panier !';
    }
}

//---------------

$panier1 = new Panier;  // pas de () comme pr new PDO()... car pas d'instances
//⚠️ $panier1 est un objet de la classe panier. On parle d'instance (on vient de faire une instanciation)
echo '<pre>';
var_dump($panier1);     // => return + d'info que print_r
        /*  object(Panier)#1 (1) {      (#1 = 1er panier / (1) = qu'une propriété)
            ["nbProduit"]=>
            NULL   */
print_r(get_class_methods($panier1));   
// => return un array ; à l'indice 0 on a la léthode aj. pdt = retourne la méthode public
        /*  Array
            (
                [0] => ajouterProduit
            )   */
echo '</pre>';


$panier1 -> nbProduit = 5;
// Affectation de la valeur 5 dans la propriété nbProduit de Panier1

/*
$pdo -> query() // j'accède à méthode query de mon objet PDO
$pdo -> prepare()
$pdo -> exec()

$resultat -> execute();  // j'accède à méthode execute de mon objet PDO STATEMENT
$resultat -> rowCount();
$resultat -> bindValue();
*/

echo '<pre>';
var_dump($panier1); 
                        /*  object(Panier)#1 (1) {
                            ["nbProduit"]=>
                            int(5)
                            }   */
echo '</pre>';

echo 'il y a ' . $panier1 -> nbProduit . ' produit(s) dans votre panier <br/>'; 
// pr accéder à 1 propriété pas de '$' / ' -> ' = j'accède à ...
            // => aff : il y a 5 produit(s) dans votre panier 
echo 'Panier : ' . $panier1 -> ajouterProduit() . '<br/>';
            // Panier : L\article a été ajouté !

$panier2 = new Panier;
echo '<pre>';
var_dump($panier2);
echo '<pre>';
                        /*  object(Panier)#2 (1) {
                            ["nbProduit"]=>
                            NULL
                        }   */

// Nous avons affecté une valeur à nbProduit de Panier 1... Cela n'a pas d'incidence sur Panier2 pour lequel la valeur nbProduit reste Null!


/*
echo 'Panier : ' . $panier1 -> retirerProduit() . '<br/>';      (! méthode protected !)
        // => ERREUR
echo 'Panier : ' . $panier1 -> afficherPanier() . '<br/>';      (! méthode private !)
        // => ERREUR : imposs d'accéder à des éléts PROTECTED et PRIVATE depuis l'ext. d'une classe ( hors de {} )
*/



/*****************⚠️ COMMENTAIRES ⚠️*******************


    'new' est 1 mot clé qui permet de créer un objet issu d'une classe. 
     On parle d'instanciation

    Niveaux de visibilité :
        -⚠️ public    :   Accessible de partout (int/ext)
        -⚠️ protected :   Accessible à l'intérieur de la classe et des classes héritières
        -⚠️ private   :   Accessible uniqt ds la classe où l'élt est déclaré

    On peut créer plusieurs objets issus d'une même classe.