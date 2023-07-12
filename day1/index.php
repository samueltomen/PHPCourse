<?php

$firstName = 'Samuel';

echo $firstName;

$a = 1;
$b = 'hello';
$c = [1, 2, 3, 5];

class Test
{

}
;

$d = new Test;
//var_dump() fonction qui affiche le plus de details ( ne peux stocker aucune valeur)
var_dump($c);

//Même chose que var_dump mais avec moins de detail , et peux stocker la valeur dans une variable
print_r($c);