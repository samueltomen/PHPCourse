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

//Les types en PHP 

// 1. Les types scalaire
//Représente une valeur primitives
// Boolean , Integer , Float , String

// 2. Les types composé
// Composé de plusieurs types scalaires
//Array , Object 

// 3. Les Types Speciaux
//Resource , NULL

//Exemple 

//string 
$a = 'Hello world';

// integer
$b = 1;

//float
$c = 1.25;

//boolean 
$d = true;

//array
$e = [1, 2 ,3];

//gettype() fonction qui permet d'affficher le type de valeur
echo gettype($a);
echo '<br>';
echo gettype($b);
echo '<br>';
echo gettype($c);
echo '<br>';
echo gettype($d);
echo '<br>';
echo gettype($e);
echo '<br>';

//method avec is_ retourne toujours true ou false 
//exemple avec is_string
echo is_string($a); //retourne 1 = true 
