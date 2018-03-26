<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';



$a = new Manager\Application;
$a -> run();

//  /produit/afficheall
//  /produit/boutique/t-shirt
//  /produit/affiche/10



// TEST 1 : Entity :
// $produit = new Entity\Produit; 
// $produit -> setTitre('Mon super produit');
// echo $produit -> getTitre();

// $membre = new Entity\Membre; 
// $membre -> setPseudo('Yakine');
// echo $membre -> getPseudo();
// url à tester : http://localhost/PHPoo/13-Framework/web/


// TEST 2 : PDOManager :
// $pdom = Manager\PDOManager::getInstance(); 
// $pdo = $pdom -> getPdo();
// $resultat = $pdo -> query("SELECT * FROM produit");
// $produits = $resultat -> fetchAll(); 

// echo '<pre>';
// print_r($produits);
// echo '</pre>';


// TEST 3 : Model
// Attention pour tester la classe model, nous avons du forcer la fonction getTableName() à nous retourner un nom de table. Après les tests il faut rétablir le traitement original de la fonction. 
// $model = new Model\Model;
// $produits = $model -> findAll();
// $produit = $model -> find(10);

// echo '<pre>';
// print_r($produit);
// print_r($produits);
// echo '</pre>';

// TEST 3.2 : Model : register
// $model = new Model\Model;
// $pdt = array(
	// 'reference' => 'ddd',
	// 'categorie' => 'ddddd',
	// 'titre' => 'ddddd',
	// 'description' => 'ddddd',
	// 'couleur' => 'dd',
	// 'taille' => 'dd',
	// 'public' => 'm',
	// 'photo' => 'ccccc',
	// 'prix' => 10,
	// 'stock' => 10,
// );

// if($produits = $model -> register($pdt)){
	// echo 'OK';
// }
// else{
	// echo 'erreur';
// }


// TEST 3.3 : Model : update
// $model = new Model\Model;
// $pdt = array(
	// 'reference' => 'ddd',
	// 'categorie' => 'ddddd',
	// 'titre' => 'ddddd',
	// 'description' => 'ddddd',
	// 'couleur' => 'dd',
	// 'taille' => 'dd',
	// 'public' => 'm',
	// 'photo' => 'ccccc',
	// 'prix' => 10,
	// 'stock' => 20,
// );

// if($produits = $model -> update(11, $pdt)){
	// echo 'OK';
// }
// else{
	// echo 'erreur';
// }

// TEST 3.4 : Model : delete
// $model = new Model\Model;
// $model -> delete(11);




// TEST4 : ProduitModel
// $pm = new Model\ProduitModel; 

// echo '<pre>';
// print_r($pm -> getAllProduit());
// print_r($pm -> getProduitById(10));
// print_r($pm -> getAllCategorie());
// print_r($pm -> getAllProduitByCategorie('t-shirt'));
// echo '</pre>';


//TEST 5 : ProduitController 
// $pc = new Controller\ProduitController;
// $pc -> afficheAll();

//TEST 5.2 ProduitController
// $pc = new Controller\ProduitController;
// $pc -> boutique('pull');

//TEST 5.3 ProduitController
// $pc = new Controller\ProduitController;
// $pc -> affiche(10);


// TEST 6 : 

//index.php?controller=produit&action=afficheall
//index.php?controller=produit&action=boutique&arg=t-shirt
//index.php?controller=produit&action=affiche&arg=10

// ré-écriture d'URL :
///produit/affiche/10

// routing : 
///toto/tata/10 ===> produit/affiche/10

// $controller = 'Controller\\' . $_GET['controller'] . 'Controller';
// $action = $_GET['action'];

// if(isset($_GET['arg'])){
	// $arg = $_GET['arg'];
// }
// else{
	// $arg = '';
// }

// $a = new $controller; 
// $a -> $action($arg);










