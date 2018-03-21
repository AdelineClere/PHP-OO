<?php

class A 
{
    public function test() {
        return 'test';
    }

    protected function test4() {
        return ' + test4';
    }
}
//---------
class B extends A
{
    public function test2() {
        return 'test2';
    }
}
//---------
class C extends B
{
    public function test3() {
        return 'test3' . $this -> test4();
    }
}

//---------

$c = new C;
echo $c -> test() . '<br>';     // Méthode de A acccessible par C (héritage indirect)   ⚠️
echo $c -> test2() . '<br>';    // Méthode de B acccessible par C (héritage direct)     ⚠️
echo $c -> test3() . '<br>';    // Méthode de C acccessible par C

echo '<pre>';
var_dump(get_class_methods($c));    // pr voir ttes les methodes de l'objet C
echo '</pre>';


/*****************⚠️ COMMENTAIRES ⚠️*******************
 * 
 *⚠️ TRANSITIVITÉ :
 *      Si B hérite de A
 *          Et si C hérite de B
 *              Alors C hérite de A (indirectt)
 *   ⚠️ Les méthodes PROTECTED de A sont accessibles ds C même si l'héritage est indirect.
 * 
 *⚠️ L'héritage est :
 *      - NON RÉFLEXIF : Class D extends D ===> Une classe ne peut pas hériter d'elle-même
 * 
 *      - NON SYMÉTRIQUE : ce n'est pas parcke E extends F que F va extends E
 * 
 *      - SANS CYCLE : Si E extends F, il est impos. que F extends E
 * 
 *      - PAS MULTIPLE : Class N extends, M, P ===> en PHP il n'y a pas d'héritage multiple
 * 
 *  
 *⚠️ Une classe peut avoir un nb infini d'héritiers
 */