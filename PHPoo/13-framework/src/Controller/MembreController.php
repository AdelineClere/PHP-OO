<?php
//src/Controller/ProduitController;

namespace Controller;

class MembreController extends Controller  // Controller a déjà 'use Model', dc pas besoin ici de rapp.
{
    public function profil() {
        //1. 

        $membre = $_SESSION['membre'];

        $params = array(
            'membre' => $membre,
            'title' => 'Profil de ' . $membre['pseudo']
        );
        return $this -> render('layout.html', 'profil.html', $params);




    }
    
    public function inscription() {
        // recup de procédural. Ici on pourrait faire un foreach et créer les class ac controles ds controller
        $erreur = '';

        if($_POST)
        {           
            if($this -> getModel() -> getMembreByPseudo($_POST['pseudo'])) { // est-ce que pseudo dispo ?   
                $erreur .= '<div class="alert alert-danger col-md-8 col-md-offset-2 text-center">Pseudo indisponible !!</div>';
            }
            if(strlen($_POST['pseudo']) < 2 || strlen($_POST['pseudo']) > 20) {
                $erreur .= '<div class="alert alert-danger col-md-8 col-md-offset-2 text-center">Taille pseudo non valide !!</div>';
            }
            if(strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 20) {
                $erreur .= '<div class="alert alert-danger col-md-8 col-md-offset-2 text-center">Taille nom non valide !!</div>';
            }
            if(strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 20) {
                $erreur .= '<div class="alert alert-danger col-md-8 col-md-offset-2 text-center">Taille prenom non valide !!</div>';
            }
            if(!is_numeric($_POST['code_postal']) || strlen($_POST['code_postal']) !=5) {
                $erreur .= '<div class="alert alert-danger col-md-8 col-md-offset-2 text-center">Code postal non valide !!</div>';
            }
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))  {
                $erreur .= '<div class="alert alert-danger col-md-8 col-md-offset-2 text-center">Email  non valide !!</div>';
            }
    
    
    
            if(empty($erreur)) // si 0 $erreur > ⚠️ s'insérer ds table membre à l'aide de requête préparée
            {           
                if($this -> getModel() -> registerMembre($_POST)) {
                    $erreur .= '<div class="alert alert-succes col-md-8 col-md-offset-2 text-center">Vous êtes inscrite sur notre site web !! <br> <a href="connexion.php" class="alert-link">Cliquez ici pour vous connecter</a></div>';
                }
            }             
        }
        $params = array(
            'erreur' => $erreur,
            'title' => 'Inscription'
        );

        return $this -> render('layout.html', 'inscription.html', $params);
    }    
        
        
    public function connexion() {

        $erreur ='';

        if($_POST) {

            $membre = $this -> getModel() -> getMembreByPseudo($_POST['pseudo']);

            if($membre) {   // si le membre existe

                // if() password_verifiy($_POST['mdp'], $membre['mdp'])    //⚠️ si mdp haché => utliser cette fct pr reconnaissance
                if($membre -> getMdp() == $_POST['mdp']) { // =>⚠️ on contrôle si mdp saisi = mdp BDD 
                    $this -> createSessionMembre($membre);
                    // debug($_SESSION);
                    header("location:" . $this -> url . "membre/profil");  //⚠️ ayant bons identifiants, on le redirige vers sa pg profil
            }
            else {
                $erreur .='<div class="alert alert-danger col-md-8 col-md-offset-2 text-center">Erreur mot de passe</div>';
            }
            }
    
        }    
        else {   // mauvais pseudo
            $erreur .='<div class="alert alert-danger col-md-8 col-md-offset-2 text-center">Erreur de pseudo</div>';
        }

        $params = array(
            'erreur' => $erreur,
            'title' => 'Connexion'
        );
        return $this -> render('layout.html', 'connexion.html', $params);
    }

    
    public function createSessionMembre($membre) {
        $_SESSION['membre']['id_membre'] = $membre -> getId_membre();
        $_SESSION['membre']['pseudo'] = $membre -> getPseudo();
        $_SESSION['membre']['prenom'] = $membre -> getPrenom();
        $_SESSION['membre']['nom'] = $membre -> getNom();
        $_SESSION['membre']['email'] = $membre -> getVille();
        $_SESSION['membre']['ville'] = $membre -> getAdresse();
        $_SESSION['membre']['adresse'] = $membre -> getId_membre();
        $_SESSION['membre']['code_postal'] = $membre -> getCode_postal();
        $_SESSION['membre']['statut'] = $membre -> getStatut();
        $_SESSION['membre']['civilite'] = $membre -> getCivilite();       
    }
    


    public function deconnexion() {}
    public function newsletter() {}   
    public function parrainer() {}   
    public function supprimerCompte() {}   
    public function updateProfil() {}

}