<?php

class Vehicule
{
    private $litre;
    private $reservoir;

    public function setLitre ($litre) {
        $this -> litre = $litre;
    }
    public function getLitre () {
        return $this -> litre;
    }

    public function setReservoir ($res) {
        $this -> reservoir = $res;
    }
    public function getReservoir () {
        return $this -> reservoir;
    }
}
//---------------------------------------------------------------------

class Pompe
{
    private $litre;

    public function setLitre ($litre) {
        $this -> litre = $litre;
    }
    public function getLitre () {
        return $this -> litre;
    }

    public function donneEssence (Vehicule $v) {    //⚠️  > reçoit dc un objet de la classe véhicule en argument !!
        // 1. modif nb L ds pompe
        // 2. modif nb L ds vehicule
       $this -> setLitre ( $this -> getLitre() - ( $v -> getReservoir() - $v -> getLitre() ));  // 755 = 800 - (50 - 5)
       $v -> setLitre ($v -> getLitre() + ($v ->  getReservoir() - $v -> getLitre() ));  // 50 = 5 + (50 - 5)
    }
}


// 1-2-3-4 ***********  (créer véhicule, attribuer nb litre (5) > aff ; capacite du rés. > aff.)

$v = new vehicule();   // ($vehicule = $v)
$v -> setLitre (5);
$v -> setReservoir (50);

echo 'Nb de litres dans le véhicule : ' . $v -> getLitre() . '<br/>';
echo 'Capacité max du véhicule : ' . $v -> getReservoir() . '<hr/>';


// 5-6-7 *************  (créer pompe, attribuer nb L, l'aff.)

$p = new pompe;
$p -> setLitre (800);

echo 'Nb de litres dans la pompe : ' . $p -> getLitre() . '<br/>';


// 8-9 ***************  (Aff. nb L restant après plein d'1 voiture)

$p -> donneEssence($v);      //⚠️  je passe entièrement l'objet vehicule à la fct

echo '<h3>Après ravitaillement</h3>';
echo 'Nb de litres dans le véhicule : ' . $v -> getLitre() . '<br/>';
echo 'Nb de litres restant dans la pompe : ' . $p -> getLitre() . '<br/>';