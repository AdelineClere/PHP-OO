<?php

// Attention les traits ne fct que depuis php 5.4

trait TPanier
{
    public $nbProduit = 1;

    public function affichageProduits() {
        return 'Affichage des produits';
    }
}
//-----
trait TMembre
{
    public function affichageMembre() {
        return 'Affichage des membres';
    }
}

//-----

class Site
{
    use TPanier, TMembre;
    //⚠️ on importe tout le code contenu ds les traits TPanier et TMembre
}

//

$site = new Site;
echo $site -> affichageProduits() . '<br>';
echo $site -> affichageMembre() . '<br>';



/*****************⚠️ COMMENTAIRES ⚠️*******************
 * 
 *  - Les traits ont été inventés pour REPOUSSER L'HERITAGE NON MULTIPLE du PHP.
 *  
 *  - ⚠️ Une classe peut hériter d'une seule classe, mais IMPORTER PLUSIEURS TRAITS.
 * 
 *  - ⚠️ Un trait PEUT IMPORTER un ou des TRAITS.
 * 
 */