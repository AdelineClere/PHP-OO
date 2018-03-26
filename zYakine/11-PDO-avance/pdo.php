<?php
//htdocs/PHPOO/11-PDO_avance/pdo.php

//connexion :
//$pdo = new PDO('mysql:dbname=entreprise;host=localhost', 'root', '');


//connexion avec mode erreur warning :
// $pdo = new PDO('mysql:dbname=entreprise;host=localhost', 'root', '', array(
	// PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
// ));


$pdo = new PDO('mysql:dbname=entreprise;host=localhost', 'root', '', array(
 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
));


try{
	
	// erreur volontaire de requete : 
	//$resultat = $pdo -> query("ssdqsdqsdqds");
	
	
	// Marqueur '?'  (non nominatif): 
	$resultat = $pdo -> prepare("SELECT * FROM employes WHERE prenom = ? AND nom = ?");
	$resultat -> execute(array(
		$prenom,
		$nom
	)); 
	
	$resultat = $pdo -> prepare("INSERT INTO employes (prenom, nom, sexe, salaire, date_embauche, service) VALUES (?, ?, ?, ?, CURDATE((), ?)");
	$resultat -> execute(array(
		'Yakine',
		'Hamida',
		'm',
		'5000',
		'Informatique'
	));
	
	
	// Marqueur ':' : 
	
	$prenom = 'Amandine';
	$nom = 'Thoyer';
	
	// méthode 1 : 
	$resultat = $pdo -> prepare("SELECT * FROM employes WHERE prenom = :prenom AND nom = :nom");
	$resultat -> bindValue(':prenom', $prenom, PDO::PARAM_STR);
	$resultat -> bindValue(':nom', $nom, PDO::PARAM_STR);
	$resultat -> execute(); 
	
	// méthode 2 : 
	$resultat = $pdo -> prepare("SELECT * FROM employes WHERE prenom = :prenom AND nom = :nom");
	$resultat -> execute(array(
		'nom' => $nom,
		'prenom' => $prenom
	)); 
	
	
	
	
	
	
}
catch(PDOException $e){
	
	echo '<div style="color: white; background: red; padding: 10px" >';
	echo 'Erreur SQL : <br/>';
	echo 'Code : ' . $e -> getCode() . '<br/>';
	echo 'Message : ' . $e -> getMessage() . '<br/>';
	echo 'Fichier : ' . $e -> getFile() . '<br/>';
	echo 'Ligne : ' . $e -> getLine() . '<br/>';
	echo '</div>';
	
	$f = fopen('error.txt', 'a');
	// créer un fichier error.txt
	
	$ligne = 'Erreur SQL : ' . date('d/m/Y') . ' - ' . 'code: ' . $e -> getCode() . ' - ' . '192.168.01.01';
	
	fwrite($f, $ligne . "\r\n");

	//header('location:404.php');
}







