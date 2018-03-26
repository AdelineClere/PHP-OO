<?php
//app/Config.parameters.php

$parameters = array(                // (= tablo multidimensionnel pr Q° sécurité aussi)
    'connect'       => array(
        'host'      => 'localhost',
        'dbname'    => 'boutique',
        'login'     => 'root',
        'password'  =>  ''
    ),
    'site' => array(
        'url' => 'http://localhost/PHP%20OO/13-framework/web/'
       
        
    )
);

// echo '<pre>';
// print_r($parameters);
// echo '</pre>';       ->  Array
                            // (
                            //     [connect] => Array
                            //         (
                            //             [host] => localhost
                            //             [dbname] => root
                            //             [password] => 
                            //         )
                            // ) */