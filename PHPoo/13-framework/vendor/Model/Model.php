<?php
//vendor/Model/Model.php

namespace Model;
use PDO, Manager\PDOManager;
// use PDO;  
// use Manager\PDOManager;
           

class Model
{
    private $db;    //⚠️️  Contiendra notre objet PDO

    public function __construct() {
        // $pdo = PDOManager::getInstance();
        // $this -> setDb();            (-> ici pas besoin de setter/getter : ça pass pas par 1 formulaire)       
        $this -> db = PDOManager::getInstance() -> getPdo();    // récup Singleton ?
        //⚠️️ Qd j'instancie un objet Model (ou un enfant de cette classe), la fct construct() se lance, 
        //   🔸 crée un objet PDO (grâce à PDOManager) et le stock ds la propriété $db
        //   (on a fait ici une 🔸 instanciation sans héritage !)
    }

    public function setDb (PDO $pdo) {
        $this -> db = $pdo;
    }
    public function getDb() {
        return $this -> db;
        // cette fct me retourne l'objet pdo stocké ds $db
        //⚠️️ un objet PDO se crée à chq lancement de script (demande) de l'internaute (une act° ds l'url) = chq fois que l'on aura besoin d'un des modèles (au moment de l'instanciation)
    }


    //⚠️️ je cherche le nom de la table qui doit ê interrogée :
    public function getTableName() {   
        
        // get_called_class() = fct qui retourne class ds laquelle ns sommes :
        // -> Model\ProduitModel  
        // puis -> Produit                                (grâce à str_replace)
        // puis -> en min > car table s'app. 'produit'    (grâce à strtolower)
        $table = strtolower(str_replace(array('Model\\', 'Model'), '', get_called_class()));
        //⚠️️ je remplace Model\ (namspace) et Model par rien (array just packe plusieurs replace) > reste pdt ou cmd ou membre !

        return $table;

        /*  ⚠️️ ⚠️️ ⚠️️ Au moment où je ferai appel à cette méthode je serai dans la classe ProduitModel ou 
                    MembreModel ou CommandeModel etc.
                    Et dc cette fct est capable de récup le nom de la class et d'en extraire le nom 
                    de la table correspondante.     */
    }



    //-------------------------------------------------------
    //             ⚠️️ REQUETES GENERIQUES ⚠️️
    //-------------------------------------------------------

    //⚠️️ ⚠️️  récupère ttes les infos d'une table :
    public function findAll() {

        $requete = "SELECT * FROM " . $this -> getTableName();  
        // je vais chercher le nom de la table, je le stock ds une var $requete
    // $requete = "SELECT * FROM produit";     (Rq.: // décalé = équivalence)


     $resultat = $this -> getDb() -> query($requete);  //(🔸 getDb, requete ss heritage)
    // $resultat = $pdo -> query("SELECT * FROM produit");

         $resultat -> setFetchMode(PDO::FETCH_CLASS, 'Entity\\' . $this -> getTableName()); 
        //⚠️️  FETCH_CLASS Entity etc   => donnera un tablo multidim ac les objets deds
// avt de faire fetch on lui livre la class de maniere instanciée. Car la on veut recup objet qu'on a recup de la class, de bdd
        /*
        ⚠️️ setFetchMode() permet d'instancier un objet (ds notre cas un objet Entity\Produit), en prenant les résultats de notre requête et en affectant les valeurs dans les propriétés de mes objets.
        Pour que cela fcte sans accroc, il faut absolument que les noms des champs dans les tables correspondent aux noms des propriétés ds les objets (POPO)

        $objet = new Entity\Produit;
        $objet -> titre = 'mon super produit'
        $objet -> id_produit = 12
        etc...
        */
                            // rappel des fetch///
                                /*  requete 1 resultat :
                                      $resultat = $pdo -> query("SELECT * FROM employes WHERE id_employes = 350");
                                      $employes = $resultat -> fetch(PDO::FETCH_ASSOC);   => array asso   ()

                                    requete plusieurs resultats :
                                      $resultat = $pdo -> query("SELECT * FROM employes");
                                      while($employes = $resultat -> fetch(PDO::FETCH_ASSOC)) {
                                      faut faire une boucle sinon retourne que 1er !
                                */

        // ac tablo multidim retourné ->
         $donnees = $resultat -> fetchAll();     // > retourner un array de tous les pdts en OBJETs ?

        if(!$donnees) {
            return FALSE;
        }
        else{
            return $donnees;
        }
    }

    //⚠️️ ⚠️️  récupère les infos d'une table en fct de l'id :
    public function find($id) {
        $requete = "SELECT * FROM " . $this -> getTableName() . " WHERE id_" . $this -> getTableName() . "=:id";
     // $requete = "SELECT * FROM produit WHERE id_produit = :id"

        $resultat = $this -> getDb() -> prepare($requete);
        $resultat -> bindValue(':id', $id, PDO::PARAM_INT);
        $resultat -> execute();

        $resultat -> setFetchMode(PDO::FETCH_CLASS, 'Entity\\' . $this -> getTableName());  

        $donnees = $resultat -> fetch();

        if(!$donnees) {
            return FALSE;
        }
        else{
            return $donnees;
        }

    }

// Méthode générique pour supprimer un enregistrement
public function delete($id){
    $requete = "DELETE FROM " . $this -> getTableName() . ' WHERE id_' . $this -> getTableName() . ' = :id';
    
    $resultat = $this -> getDb() -> prepare($requete);
    $resultat -> bindValue(':id', $id, PDO::PARAM_INT);	
    
    return $resultat -> execute();
}

//Méthode générique pour modifier un enregistrement avec la requete UPDATE
public function update($id, $infos){
    $newValues = '';
    $first = FALSE; 
    foreach($infos as $key => $value){
        if($first == FALSE){
            $newValues .= " $key = :$key ";
            $first = TRUE;
        }
        else{
            $newValues .= ", $key = :$key ";
        }
    }

    $requete = "UPDATE " . $this -> getTableName() ." set " . $newValues . " WHERE id_". $this -> getTableName() . "=:id";
    
    
    //echo $requete; 
    $resultat = $this -> getDb() -> prepare($requete);
    $infos['id'] = $id;
    // la ligne ci-dessous est pour ajouter notre id passé en parametre dans l'array de la méthode execute(); 
     return $resultat -> execute($infos);
}

//Méthode générique pour ajouter un enregistrement
public function register($infos){	
    $requete = 'INSERT INTO ' . $this -> getTableName() . ' (' . implode(', ', array_keys($infos)) . ') VALUES (' . ":" . implode(", :", array_keys($infos)) . ')';
    
    //echo $requete; 
    
    $resultat = $this -> getDb() -> prepare($requete);
    
    if($resultat -> execute($infos)){
        return $this -> getDb() -> lastInsertId();
    }
    else{
        return false;
    }
}




}


