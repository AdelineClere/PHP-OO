<?php

//src/Controller/ProduitController;

namespace Controller; 

class MembreController extends Controller
{
	public function profil(){
		//1. On récupère les infos du membre connecté via la session dans une variable membre
		//2. On rend la vue profil.html, en passant en parametre la variable variable membre et un title 'profil de pseudo'
		$membre = $_SESSION['membre'];
		$params = array(
			'membre' => $membre,
			'title' => 'Profil de ' . $membre['pseudo']
		);
		return $this -> render('layout.html', 'profil.html', $params);
	}
	
	public function inscription(){
		
		$erreur = '';
		
		if($_POST){
			if($this -> getModel() -> getMembreByPseudo($_POST['pseudo'])){
				$erreur .= '<div class="alert alert-danger col-md-8 col-md-offset-2">Pseudo indisponible</div>';
			}
			if(strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo']) > 20){
				$erreur .= '<div class="alert alert-danger col-md-8 col-md-offset-2">Erreur de taille pseudo</div>';
			}
			if(strlen($_POST['nom']) < 4 || strlen($_POST['nom']) > 20){
				$erreur .= '<div class="alert alert-danger col-md-8 col-md-offset-2">Erreur de taille nom</div>';
			}
			if(strlen($_POST['prenom']) < 4 || strlen($_POST['prenom']) > 20){
				$erreur .= '<div class="alert alert-danger col-md-8 col-md-offset-2">Erreur de taille prénom</div>';
			}
			if(!preg_match('#^[a-zA-Z0-9._-]+$#',$_POST['pseudo'])){
				$erreur .= '<div class="alert alert-danger col-md-8 col-md-offset-2">Erreur format/caractère pseudo</div>';
			}
			
			foreach($_POST as $indice => $valeur){
				$_POST[$indice] = strip_tags($valeur);
			}
			
			if(empty($erreur)){
				if($this -> getModel() -> registerMembre($_POST)){
					$erreur .= '<div class="alert alert-success col-md-8 col-md-offset-2">Vous êtes inscrit à notre site WEB. <a href="' . $this -> url . 'membre/connexion">Cliquez ici pour vous connecter</a></div>';
				}
			}
		}
		
		$params = array(
			'erreur' => $erreur,
			'title' => 'Inscription'
		);
			
		return $this -> render('layout.html', 'inscription.html', $params);
	}
	
	
	
	
	
	public function connexion(){
		$erreur = '';
		if($_POST){
			$membre = $this -> getModel() -> getMembreByPseudo($_POST['pseudo']);
		
			if($membre){ 
				if($membre -> getMdp() == $_POST['mdp']){
					$this -> createSessionMembre($membre);
					header("location:" . $this -> url . "membre/profil");
				}
				else // sinon l'internaute a saisie un mauvais mdp
				{
					$erreur .= '<div class="alert alert-danger col-md-8 col-md-offset-2 text-center">Erreur de mot de passe !!</div>';
				}
			}
			else // sinon l'internaute a saisie un mauvais pseudo
			{
				$erreur .= '<div class="alert alert-danger col-md-8 col-md-offset-2 text-center">Erreur de pseudo !!</div>';
			}
		}
		
		$params = array(
			'erreur' => $erreur,
			'title' => 'Connexion'
		);
		return $this -> render('layout.html', 'connexion.html', $params);
	}
	
	public function createSessionMembre($membre){
		$_SESSION['membre']['id_membre'] = $membre -> getId_membre();
		$_SESSION['membre']['pseudo'] = $membre -> getPseudo();
		$_SESSION['membre']['prenom'] = $membre -> getPrenom();
		$_SESSION['membre']['nom'] = $membre -> getNom();
		$_SESSION['membre']['email'] = $membre -> getEmail();
		$_SESSION['membre']['ville'] = $membre -> getVille();
		$_SESSION['membre']['adresse'] = $membre -> getAdresse();
		$_SESSION['membre']['code_postal'] = $membre -> getCode_postal();
		$_SESSION['membre']['statut'] = $membre -> getStatut();
		$_SESSION['membre']['civilite'] = $membre -> getCivilite();
	}

	
	public function deconnexion(){}
	public function newsletter(){}
	public function parrainer(){}
	public function supprimerCompte(){}
	public function udpdateProfil(){}
}


