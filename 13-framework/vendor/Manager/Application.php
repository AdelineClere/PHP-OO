<?php
//vendor/Manager/Application.php

namespace Manager;

final class Application
{
    protected $controller;           // Le controller à lancer
    protected $action;               // L'action à lancer
    protected $argument = '';        // L'argument s'il y en a un

    public function __construct() {  // On scan l'URL

        $tab = explode('/', $_SERVER['REQUEST_URI']);  // 'REQUEST_URI retourne ts les '/' qu'elle trouve ds URL => et coupe pr fzire array

        // echo '<pre>';
        // print_r ($tab); // retourne tt ce qu'on a ds url
        // echo '</pre>';
    
                        /*  Array
                            (
                                [0] => 
                                [1] => PHP%20OO
                                [2] => 13-framework
                                [3] => web
                                [4] => membre
                                [5] => affiche
                            ))  */

        if(isset($tab[4]) && !empty($tab[4]) && file_exists(__DIR__ . '/../src/Controller/' . $tab[4] . 'Controller.php')) {
            //s'il y a un controller xxxxx ds l'url et que le fichier xxxxxController.php existe

            $this -> controller = 'Controller\\' . $tab[4] . 'Controller';
        }
        else {
            // Sinon par défaut je lance le ProduitController (pr aff. la home par defaut)
            $this -> controller ='Controller\ProduitController';
        }

        //-----------------

        if(isset($tab[5]) && !empty($tab[5])) {
            $this -> action = $tab[5];
        }
        else {
            $this -> controller = 'Controller\ProduitController';
            $this -> action = 'afficheAll';
        }
        //-----------------

        if(isset($tab[6]) && !empty($tab[6])) {
            $this -> argument = $tab[5];
        }
    }    


        public function run () {        // Lance les instanciations / App

            if(!is_null($this -> controller)) {

                $a = new $this -> controller;
                if(!is_null($this -> action) && method_exists($a, $this -> action)) {
                    $action = $this -> action;
                    $a ->$action($this -> argument);
                  //$a -> afficheall()
                  //$a -> affiche(10)  
                }
            }
            else {
                require __DIR__ . '/../../src/View/404.html';
            }

    }
}