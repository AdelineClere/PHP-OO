<?php
//web/index.php 

session_start();
require __DIR__ . '/../vendor/autoload.php';


$a = new Manager\Application;
$a -> run();

// /produit/afficheall
// /produit/boutique/t-shirt
// /produit/affiche/10


// ⚠️️ TEST 1 : Entity
// $produit = new Entity\Produit;
// $produit -> setTitre('Mon super produit');
// echo $produit -> getTitre();

// $membre = new Entity\Membre;
// $membre -> setPseudo('Adeline');
// echo $membre -> getPseudo();

/* url à tester : 
http://localhost/PHPoo/13-framework/web
    au lieu de  xampp\htdocs\PHP OO\13-framework\vendor/../src/Entity/Produit.php)  !!!
*/


// ⚠️️ TEST 2 : class PDOManager
// $pdom = Manager\PDOManager::getInstance();  // on récup objet de singleton dc pas ac ' new '
// $pdo = $pdom -> getPdo();       // retourne un objet pdo : ma connex à BDD
// $resultat = $pdo -> query("SELECT * FROM produit");
// $produits = $resultat -> fetchALL();    // pas besoin fetch assoc, est inclu
// // => tablo multidim :
// echo '<pre>';
// print_r($produits);
// echo '</pre>';


// ⚠️️ TEST 3 : class Model
// !!! Attention pour la tester ns avons dû forcer la fct getTableName à nous retourner un nom de table. 
//  Après les tests, il faut rétablir le traitement original de la fct.
// Attention pour tester la classe model, nous avons du forcer la fonction getTableName() à nous retourner un nom de table. Après les tests il faut rétablir le traitement original de la fonction. 
// $model = new Model\Model;
// $produits = $model -> findAll();
// $produit = $model -> find(10);

// echo '<pre>';
// print_r($produit);
// print_r($produits);
// echo '</pre>';


// // TEST 4 : ProduitModel
// $pm = new Model\ProduitModel;

// echo'<pre>';
// print_r($pm -> getAllProduit());
// print_r($pm -> getProduitById(10));
// print_r($pm -> getAllCategorie());
// print_r($pm -> getAllProduitByCategorie('Chaussures'));
// echo'</pre>';


// TEST 5 : ProduitController    => afficher tout
// $pc = new Controller\ProduitController;
// $pc -> afficheAll();

// TEST 5.2 PrduitController
// $pc = new Controller\ProduitController;
// $pc -> boutique('Hi-fi-video');


// TEST 5.3 PrduitController    =>  afficher fiche pdt
// $pc = new Controller\ProduitController;
// $pc -> affiche(10);


// TEST 6   => doit afficher ce que l'on a dans url

//index.php?controller=produit&action=afficheall
//index.php?controller=produit&action=boutique&arg=Hi-fi-video
//index.php?controller=produit&action=affiche&arg=10

// ré-écriture d'URL
//produit/affiche/10        => mais on voudra ça ds URL ( +- rooting)

// $controller = 'Controller\\' . $_GET['controller'] . 'Controller';
// $action = $_GET['action'];

// if(isset($_GET['arg'])) {
//     $arg = $_GET['arg'];
// }
// else {
//     $arg = '';
// }

// $a = new $controller;

// $a -> $action($arg);






