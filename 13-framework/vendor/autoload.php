<?php
//vendor/autoload.php

class Autoload
{
    public static function inclusion_automatique($className) {  
    // on récup le nom de la class qu'on a demandé d'exécuter

        // $a = new Controller\ProduitController    (ts les controller pdt seront ds Controller)
        // require('__DIR__ . '/../src/Controller/ProduitController.php')
            // ou : c://xamp/htdocs/13-framework/vendor/../src/Controller/Produit............ ???
        
        // $b = new Manager\PDOManager              (ts les PDOManager seront ds Manager (c le coeur))
        // require(__DIR__ . '/Manager/PDOManager.php')

        $tab = explode('\\', $className );  // on échappe l'antislash pour dire oui c un caractère spécial
        // dès que rencontre \ => coupe en array( new / Controller / ProduitController...)
        
            if($tab[0] == 'Manager' || ($tab[0] == 'Model' && $tab[1] == 'Model')) {  // si je suis ds le cadre d'un Manager ou pas => pas même chemin ([(0)] ou [1] = 'class' et nom de la class)
                $path = __DIR__ . '/' . implode('/', $tab) . '.php';          // ds 1 cas je reste ds dossier vendor
                //ex :  $path = __DIR__ . '/Manager/PDOManager.php'
            }
            else {
                $path = __DIR__ . '/../src/' . implode('/', $tab) . '.php';   // je renvois ds src
                //ex :  $path = __DIR__ . '/../src/Controller\ProduitController.php'
                //rq.:  implode fait inverse d'explode
            }

            //----------
            echo '<pre>Autoload : ' . $className . '<br>';
            echo '===> Require(' . $path . ') </pre>';
            //----------

            require $path; 

    }
}

//----------------------------------
spl_autoload_register(array('Autoload', 'inclusion_automatique'));
//----------------------------------

/*
spl_autoload_register en POO attend 1 argument qui soit un array avec les valeurs suivantes :
    1. Le nom de la classe
    2. Le nom de la méthode à exécuter (OBLIGATOIREMENT STATIC)

    Cela va faire ça : Autoload::inclusion_automatique($className);

    autoload = ce qu'on aurait pas à modifier en utiliant un framework, car c le coeur
*/