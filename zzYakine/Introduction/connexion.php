<?php

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
));


//if(!empty($_POST)){
if($_POST){


	$resultat = $pdo -> prepare("INSERT INTO employes (prenom, nom, sexe, service, salaire, date_embauche) VALUES (:prenom, :nom, :sexe, :service, :salaire, CURDATE())");

	$resultat -> bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
	$resultat -> bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
	$resultat -> bindParam(':sexe', $_POST['sexe'], PDO::PARAM_STR);
	$resultat -> bindParam(':salaire', $_POST['salaire'], PDO::PARAM_STR);
	$resultat -> bindParam(':service', $_POST['service'], PDO::PARAM_STR);

	if($resultat -> execute()){
		echo '<p style="color: white; background:green; padding:5px">Félicitations, vous êtes enregistré(e) !</p>';
	}


}

?>
<h1>Enrtegistrement entreprise</h1>

<form method="post" action="">

	<input type="text" name="prenom" placeholder="Votre prénom"><br/>
	<input type="text" name="nom" placeholder="Votre nom"><br/>
	<input type="text" name="salaire" placeholder="Votre salaire"><br/>

	<select name="sexe">
		<option value="m">Homme</option>
		<option value="f">Femme</option>
	</select><br/>

	<select name="service">
		<option value="direction">Direction</option>
		<option value="comptabilite">Comptabilité</option>
		<option value="informatique">Informatique</option>
		<option value="production">Production</option>
		<option value="secretariat">Secrétariat</option>
	</select><br/>


	<input type="submit" value="enregistrer"><br/>
</form>