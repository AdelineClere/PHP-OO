<?php

class A 
{
    public function direBonjour() {
        return 'Bonjour !';
    }
}

//---

class B
{}

//---

class C extends B 
{
    public $maVariable; // contient un objet de la classe A :

    public function __construct() {     //⚠️ fct contruct() (méthode magiq) se lance au moment de l'instantciation...
        $this -> maVariable = new A;
    }
}

//--------------

$c = new C;     //⚠️ 'déploiement de site' : en créant objet $c > met un objet de classe A grâce à __contruct()
echo $c -> maVariable -> direBonjour(); // -> + -> = instance sans héritage
// echo $objetA -> direBonjour(); car : $c -> maVariable est une instance de A




/*****************⚠️ COMMENTAIRES ⚠️*******************
 * 
 *  ⚠️ la fct contruct() (méthode magique) se lance au moment de l'instanciation...
 * 
 *      On a un objet A à l'intérieur d'un objet C
 *      L'intérêt d'avoir une INSTANCE SANS HERITAGE ⚠️ = RÉCUPÉRER UN OBJET DANS LA PROPRIÉTÉ D'UNE CLASSE) 
 *      ⚠️ est de pvr hériter d'une classe mère d'un côté et de récup les élts d'une autre class en même tps.
 * 
 *  Pour rappel le ⚠️ PHP n'accepte pas l'héritage multiple => dc manière d'aller + loin ds l'héritage.
 * 
 *  Ce concept est ce qui permet à une application de "SE DEPLOYER"
 * 
 */