<?php
//web/index.php 

session_start();
require __DIR__ . '/../vendor/autoload.php';

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
$model = new Model\Model;
$produits = $model -> findAll();
$produit = $model -> find(10);

echo '<pre>';
print_r($produit);
print_r($produits);
echo '</pre>';