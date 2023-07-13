<?php
//Day 2

//____________________________________________________________________
//1.
//Operator Priority ( voir documentation pour ordre des priorité & associativité)

$a = 2 + 2 * 5 / 2;

echo $a;
echo "<br>";

// ________________________________________________________________________
//2.Les conversions implicites et le casting
//Permet de transformer le type 
//exemple string ->(to) integer
$b = (int) "10"; //le (int)
echo $b;
echo "<br>";

// _______________________________________________________________________
// 3. Approfondissement des opérateurs de comparaison

//=
//Utilisé pour les assignations

// ==
//exemple
$c = "1";
$d = 1;
echo $c == $d; //Retournera true car PHP à transformé la string en int 
echo "<br>";
// ===
//Strict operateur 
//exemple -> l'operation du dessus retournera false

$e = 1;
$f = "1";

echo $f < 2; //retourne true (ne peut pas empecher la conversion implicite)
echo "<br>";

// !== bloque la conversion implicite contrairement à !=  qui signifie "different de" 

echo !!$f; // !! signifie l'inverse de valeur passé en parametre true/false

//_______________________________________________________________________
// 4. Les constantes
echo "<h1>Les constantes</h1>";

//Nom des constante en majuscules (convention) , une constante ne peut pas etre réasigner 

define('MYCONST', 'Hello world'); //Pendant l'execution du script
echo MYCONST;

const A = 1; //Definie avant l'execution du script
echo A;

//Résumé 
/* 
Les constantes déclarées avec const sont définies lors de la compilation.

Cela signifie qu'elles ne peuvent pas être déclarées à l'intérieur de boucles, de blocs if, de fonctions ou de tout autre bloc (comme try / catch).

On privilégiera aujourd'hui l'utilisation du mot clé const qui est plus rapide et plus lisible et compréhensible.
*/

/* ___________________________________________________________________ */

//5.Les instructions conditionnelles if, elseif, else
echo "<h1>Les instructions conditionnelles if, elseif, else</h1>";