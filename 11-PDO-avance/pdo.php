<?php

// connexion :
// $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', ''); 


// connexion ac mode erreur warning :
// $pdo = new PDO('mysql:dbname=entreprise;host=localhost', 'root', '', array(
  // PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING   // permet d'afficher erreurs sQL = bien (:si on voit pas > site piratable)
  // ));


//⚠️ connexion ac mode erreur EXCEPTION : 
$pdo = new PDO('mysql:dbname=entreprise;host=localhost', 'root', 'root', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
));

    try {

        // erreur volontaire de requête
        // $resultat = $pdo -> query("xoxoxoxoxox");


        //⚠️⚠️⚠️  Marqueur '?'  (non nominatif) 
        $resultat = $pdo -> prepare("SELECT * FROM employes WHERE prenom = ? AND nom = ?");
        $resultat -> execute (array(
            $prenom,    // = 1er '?'
            $nom        // = 2e  '?'
        ));             // => '?' permet d'automatiser des choses

        // !! mais respecter ordre !!
        $resultat = $pdo -> prepare("INSERT INTO employes (prenom, nom, sexe, salaire, date_embauche, service) VALUES (?, ?, ?, ?, ?, ?, CURDATE()), ?)");
        $resultat -> execute(array (
            'Yakine',
            'Hamida',
            'm',
            '5000',
            'Informatique'
        ));


        // ⚠️⚠️⚠️  Marqueur ':' 
        $prenom = 'Amandine';
        $nom = 'Thoyer';

        //⚠️ méthode 1 (± Meilleure méthode !)
        $resultat = $pdo -> prepare("SELECT * FROM employes WHERE prenom = :prenom AND nom = :nom");
        $resultat -> bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $resultat -> bindValue(':nom', $nom, PDO::PARAM_STR);
        $resultat -> execute();

        // méthode 2 :
        $resultat = $pdo -> prepare("SELECT * FROM employes WHERE prenom = :prenom AND nom = :nom");
        $resultat -> execute (array(
            'nom' => $nom,          // poss. mettre ' : ' = ':nom' => ...
            'prenom' => $prenom     //⚠️ ordre different que SELECT pas de souci
        ));
    }


                                            // (les 3 meilleures méthodes sécurisées de requête)



    catch(PDOException $e) {    // si erreur ds try, catch l'attrape > l'a met ds $e

        echo '<div style="color: white; background: red; padding: 10px" >';
        echo 'Erreur SQL : <br>';
        echo 'Code : ' . $e -> getCode() . '<br>';
        echo 'Message : ' . $e -> getMessage() . '<br>';
        echo 'Fichier : ' . $e -> getFile() . '<br>';
        echo 'Ligne : ' . $e -> getLine() . '<br>';

        $f = fopen('error.txt', 'a');   
        //⚠️  créé un fichier error.txt avec le chemin : 'error.txt'

        $ligne = 'Erreur SQL : ' . date('d/m/Y') . ' - ' . 'code: ' . $e -> getCode() . ' - ' . '192.168.01.01';

        fwrite($f, $ligne . "\r\n");
    }



    
// pour prod : (utilisateurs) (pas msg rouge etc...)
// header('location:404.php');




