<?php
//vendor/Controller.Controller.php

namespace Controller;

use Model, Config;      // pas besoin de use PDO car déjà ds namespace Model
// Rq :⚠️️  ds require on importe tout / ds le use c'est pour le droit d'utiliser


class Controller
{
    protected $model;   // Contiendra le nom du model à instancier (ProduitModel si je suis ds ProduitController, MembreModel si je suis dans MembreController)
    protected $url; // Contiendra le chemin du site (et on stock ds le construct :cf lg 29) > suite lg 49 avant l'extract, 

    public function __construct() {
        $class = 'Model\\' . str_replace(array('Controller\\', 'Controller'), '', get_called_class()) . 'Model';
    
        /* ⚠️️ Ex. : si je suis ds Controller\ProduitController
           Je retire 'Controller\' et 'Controller', il reste 'Produit'
           J'ajoute 'Model\' au début et 'Model' à la fin...
           Il reste donc :
           $this -> model = Model\ProduitModel  */       
                                        // va contenir class ModelProduit ?
           $this -> model = new $class; // va contenir un objet de cette class 
           // $this -> model = new Model\ProduitModel
           // J'instancie dc Model\ProduitModel et je stock l'objet ProduitModel ds $this -> model;
   
        $config = new Config;
        $site = $config -> getParametersSite();
        $this -> url = $site['url'];   // à chq fois que je crée objet, j'embarque url du site
    }

    public function getModel() {    //⚠️️  getModel retourne 1 objet ProduitModel
        return $this -> model; 
    }
   
    public function render($layout, $view, $params) {   // render ± tt imbriquer et envoyer (poupées russes)
        $dirView = __DIR__ . '/../../src/View/'; 
        $dirFile = str_replace(array('Controller\\', 'Controller'), '', get_called_class()) . '/';
        // Controller\ProduitController ==> Produit

        $path_view = $dirView . strtolower($dirFile) . $view;
        // ../View/produit/boutique.html

        $path_layout = $dirView . $layout;
        // ../View/Layout.html

        $params['url'] = $this -> url;
        // On embarque ac nous ds ttes les pg, la variable $url qui contient l'url du site, paramétrée ds app/Config/parameters.php


        extract($params);   // ⚠️️ Grâce à ce extract, les noms des indices ds mon array params (lg 26), 
                            // correspondront aux noms des variables utilisées dans mes vues.

        //--------------------------- Renvoyer ma poupée russe
        
        ob_start();  // Enclenche ma temporisation de sortie. 
        // Càd que ce qui va suivre ne sera pas exécuté de suite mais temporisé (retenu en mémoire tampon)
        require $path_view; 
        $content = ob_get_clean(); // ± stock ce qui a été retenu ds la variable $content (la moyenne poupée !);

        ob_start(); // attention lui aussi tu mets en ob_start
        require $path_layout;

        return ob_end_flush();   // Retourne tt ce qui a été retenu (en ob_start) et éteint la temporisation en même tps

}










}