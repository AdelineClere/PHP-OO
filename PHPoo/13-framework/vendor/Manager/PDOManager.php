<?php
//vendor/Manager/PDOManager.php

namespace Manager;
use PDO; // car PDO n'existe pas ds mon PDOManager dc l'importer (ou antislash) (on est ds un namespace dc PDO est à l'ext dc l'appeler !)
use Config; // use les class qu'on veut utiliser

//⚠️️⚠️️⚠️️ Singleton
class PDOManager
{
    private static $instance = NULL;

    private function __contruct() {}
    private function __clone() {}

    public static function getInstance() {
        if(!self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;  
}
                    // > tout ce qui fait que Singleton est un Singleton
    

    public function getPdo() {

        require_once __DIR__ . '/../../app/Config.php';
        $config = new Config;
        $connect = $config -> getParametersConnect();
        //⚠️️ On instancie un objet de la class Config qui a pr mission de nous transmettre les infos de connexion via la fct getParametersConfig()

        return new PDO('mysql:host=' . $connect['host'] . ';dbname=' . $connect['dbname'], $connect['login'], $connect['password'], array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC

        ) );
    }
}

/*
Pour récup une connexion à la BDD :
    1. On récup l'objet unique PDOManager grâce à PDOManager::getInstance()
    2. On récup notre connexion à getPdo() fonction appartenant et accessible depuis notre objet PDOManager
    */