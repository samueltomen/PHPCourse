<?php
//Day 2

//1.
//Operator Priority ( voir documentation pour ordre des priorité & associativité)

$a = 2 + 2 * 5 / 2;

echo $a;
echo "<br>";

//2.Les conversions implicites et le casting
//Permet de transformer le type 
//exemple string ->(to) integer
$b = (int) "10"; //le (int)
echo $b;
echo "<br>";

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
