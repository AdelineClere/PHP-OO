<?php

//htdocs/PHPOO/03-manipulation-type-argument/exercice3.php

class Vehicule
{
	private $litre;
	private $reservoir;
	
	public function setLitre($litre){
		$this -> litre = $litre;
	}
	public function getLitre(){
		return $this -> litre;
	}
	
	public function setReservoir($res){
		$this -> reservoir = $res;
	}
	public function getReservoir(){
		return $this -> reservoir;
	}	
}
//---------------
class Pompe
{
	private $litre;
	
	public function setLitre($litre){
		$this -> litre = $litre;
	}
	public function getLitre(){
		return $this -> litre;
	}
	
	public function donneEssence(Vehicule $v){
		//1 : Modifier le nombre de litres dans la pompe
		//2 : modifier le nombre de litres dans le véhicule
		
		$this -> setLitre($this -> getLitre() - ($v -> getReservoir() - $v -> getLitre()));
		//755 = 800 - (50 - 5)
		
		$v -> setLitre($v -> getLitre() + ( $v -> getReservoir() -  $v -> getLitre()));
		//50 = 5 + (50-5)	
	}
}
//---------------
$v = new Vehicule(); 

$v -> setLitre(5);
$v -> setReservoir(50);

echo 'Nombre de litre dans le véhicule : ' . $v -> getLitre() . '<br/>';
echo 'Capacité max du véhicule : ' . $v -> getReservoir() . '<hr/>'; 

$p = new Pompe();

$p -> setLitre(800);

echo 'Nombre de litre dans la pompe : ' . $p -> getLitre() . '<br/>';

$p -> donneEssence($v);

echo '<h3>Après ravitaillement</h3>';
echo 'Nombre de litre dans le véhicule : ' . $v -> getLitre() . '<br/>';
echo 'Nombre de litre dans la pompe : ' . $p -> getLitre() . '<br/>';



