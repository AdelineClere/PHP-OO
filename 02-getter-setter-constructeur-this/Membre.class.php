<?php

// exo : Au regard de cette class , crer un membre, lui affecter un pseudo et un email, et afficher ses infos.

class Membre
{
    private $pseudo;    // ⚠️ si j'ai des propriétés private leurs setter/getter seront public !
    private $email;


    // setter/getter Pseudo
    public function setPseudo($pseudo){     //⚠️  On fait un setter d'un prénom (pas fait verif ici..)
        $this -> pseudo = $pseudo;
    }
    public function getPseudo(){ 
        return $this -> pseudo;    
    }

    // setter/getter Email
    public function setEmail($email){      
        $this -> email = $email;
    }
    public function getEmail(){             // ⚠️ on fait un getter pour récup setter
        return $this -> email;              // ⚠️ ' this ' fait appel à l'objet ds lequel je me trouve
    }

    public function afficherMembre(){
    return 'Voici les infos de $pseudo :';
}

}

$membre = new Membre;
$membre -> setPseudo ('toto');
$membre -> setEmail ('toto.tata@gmail.com');

echo 'Pseudo : ' . $membre -> getPseudo() . '<br/>';
echo 'Email : ' . $membre -> getEmail() . '<hr/>';

