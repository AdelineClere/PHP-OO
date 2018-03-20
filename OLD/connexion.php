<?php
/*
1. Formulaire 
    prenom,
    nom,
    sexe (select ou radio)
    service (select),
    salaire
2. faire une connexion à la BDD entp
3. insérer les infos dans le table employes
*/


echo '<pre>'; print_r($_POST); echo '</pre>'; 
//⚠️ Contrôler que l'on stock bien les données saisiees de $_POST

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO :: ERRMODE_WARNING,         // affiche erreurs sous forme d'un warning
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));


// if(!empty($_POST)) { } 
if($_POST)  //⚠️ INSERT. Formulaire soumis => values stockées ds superglobal $_POST
{
    /*
    $resultat = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, salaire) 
    VALUES ('$_POST[prenom]', '$_POST[nom]', '$_POST[salaire]', '$_POST[sexe]', '$_POST[service]')");  

    echo '<div style="background: green; color: #fff; padding: 10px; text-align: center; border-radius: 5px; width: 200px;">Inscription OK !!</div>';
    */


$resultat = $pdo->prepare("INSERT INTO employes (prenom, nom, sexe, service, salaire, date_embauche) VALUES (:prenom, :nom, :salaire, :sexe, CURDATE())");

$resultat->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);  // bindParam
$resultat->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
$resultat->bindValue(':sexe', $_POST['sexe'], PDO::PARAM_STR);
$resultat->bindValue(':service', $_POST['service'], PDO::PARAM_STR);
$resultat->bindValue(':salaire', $_POST['salaire'], PDO::PARAM_STR);

if($resultat -> execute() ) {
    echo '<p style="color: white; '
}

$resultat->execute(); 
}

?>

<h1>Enregistrement</h1>
        <hr>
        <form method="post" action="">  
            
            <input type="text" id="prenom" name="prenom" placeholder="Votre prénom"><br><br>

            <input type="text" id="nom" name="nom" placeholder="Votre nom"><br><br>

            <input type="text" id="salaire" name="salaire" placeholder="Votre salaire"><br><br>

            <select name="sexe">
                <option value="m">Homme</option>
                <option value="f">Femme</option>
            </select><br><br>

            <select name="service">
                <option value="dir">Direction</option>
                <option value="dir">Commercial</option>
                <option value="dir">Secrétariat</option>
                <option value="dir">Comptabilité</option>
                <option value="dir">Communication</option>
                <option value="dir">Informatique</option>
                <option value="dir">Juridique</option>
                <option value="dir">Assistant</option>
                <option value="dir">Production</option>              
            </select><br><br>      

            <button type="submit" class="btn btn-primary col-md-12">enregistrer</button>
        </form>