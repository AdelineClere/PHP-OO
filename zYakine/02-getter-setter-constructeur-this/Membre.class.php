<?php
//htdocs/PHPOO/02-getter-setter-constructeur-this/Membre.class.php

// exercice : Au regard de cette classe, veuillez créer un Membre, lui affecter un pseudo et un email, et afficher ses infos.

class Membre
{
	private $pseudo;
	private $email;
	
	// Setter/getter Pseudo
	public function setPseudo($pseudo){
		$this -> pseudo = $pseudo;
	}
	
	public function getPseudo(){
		return $this -> pseudo;
	}
	
	// Setter/getter email
	public function setEmail($email){
		$this -> email = $email;
	}
	
	public function getEmail(){
		return $this -> email;
	}
}
//---------------

$membre = new Membre();
$membre -> setPseudo('toto');
$membre -> setEmail('toto.tata@gmail.com');

echo 'Pseudo : ' . $membre -> getPseudo() . '<br/>';
echo 'Email : ' . $membre -> getEmail() . '<hr/>';






