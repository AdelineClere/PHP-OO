<?php
//src/Model/ProduitModel

namespace Model;

use PDO;

class MembreModel extends Model    
// tt le code de Model.php existe ici ! (mais + pratiq d'utiliser getAll gat By etc...)
{

    public function getMembreByPseudo($pseudo) {
        $requete ="SELECT * FROM membre WHERE pseudo = :pseudo";
        $resultat = $this -> getDb() -> prepare($requete);
        $resultat -> bindvalue('pseudo', $pseudo, PDO::PARAM_STR);
        $resultat -> execute();

        $resultat -> setFetchMode(PDO::FETCH_CLASS, 'Entity\Membre');

        $donnees = $resultat -> fetch();

        if (!donnees) {
            return FALSE;
        }
        else {
            return $donnees;
        }
    }

    public function registerMembre($infos) {
        return $this -> register($infos);
    }

    public function getMembreById($id) {
        return $this -> find($infos);
    }

    public function getAllMembre() {
        return $this -> findAll($infos);
    }
    
        

    public function updateMembre($id, $infos) {}
    public function deleteMembre($id) {}


}