<?php
// Introduction aux tableaux
echo "<h1>Introduction aux tableaux</h1>";

$a = [1, "test", true];
$b = ['test' => 'foo', 'bar' => 'hello']; // Tableau associatif
$c = ['120' => 'foo', 'bar' => 'hello']; //Php convertis les string nombre en integer , les boolean en 1 ou 0
$d = [[1, 2], 3];


echo "<pre>";

print_r($a);
print_r($b);
print_r($d);

echo "<pre>";

// Accéder aux valeurs d'un tableau
echo "<h1>Accéder aux valeurs d'un tableau</h1>";

echo $d[0][1]; //2
echo "</br>";
echo count($d); // Permet de connaitre le nombre d'element dans un tableau ou un objet

// Les opérateurs pour les tableaux
echo "<h1>Les opérateurs pour les tableaux</h1>";

// $a = [1,2,3];
// $b = [4,5,6];

// print_r($a +$b);//Recuperer les valeur du tableau a gauche du signe "+" , si il y a le même index a droite

//spread operator
//Ne marche pas avec des tableau qui ont des chaines de caractères en index
$a = [1];
$b = [2, 3, 4, 5, 6];

print_r([...$a, ...$b]); //Eclatage du tableau et repandaison des valeurs

function test($a, $b, ...$rest)
{
    return $rest;
}

print_r(test(...$b));

// Référence et valeur
echo "<h1>Référence et valeur</h1>";

// Copie par valeur
$firstName = "Jean";
$foo = $firstName;

echo $firstName; //Jean
echo "</br>";
echo $foo; //Jean
$firstName = "Paul";
echo "</br>";
echo $firstName; //Paul
echo "</br>";
echo $foo; //Jean
echo "</br>";

echo "----- Copie par reference -----";
echo "</br>";

// Copie par reference
$firstName2 = "Jean";
$foo2 = &$firstName2;

echo $firstName2; //Jean
echo "</br>";
echo $foo2; //Jean

$firstName2 = "Paul";

echo "</br>";
echo $firstName2; //Paul
echo "</br>";
echo $foo2; //Paul
echo "</br>";

$c = [1, 2, 3];
function func(array $arr): void
{
    $arr[0] = 33;
}

func($c);

print_r($c); //Aucun changement sur la variable $c

function func2(array &$arr): void
{
    $arr[0] = 33;
}

func2($c); //Modification de la valeur de la variable $c car assignation par adresse dans le parametre de la fonction
print_r($c);

