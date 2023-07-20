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

// Ajouter des éléments à un tableau et fusionner des tableaux
echo "<h1>Ajouter des éléments à un tableau et fusionner des tableaux</h1>";

//Ajouter un nombre à la fin du tableau

// Methode 1.
$arr = [1];
$arr[] = 2;
print_r($arr);

// Methode 2.
$arr = [...$arr, 3];
print_r($arr);

// Methode 3.
array_push($arr, 4, 5);
print_r($arr);

// Ajouter un nombre au debut du tableau

// Methode 1.
array_unshift($arr, 0); //Ne creer pas de nouveau tableau
print_r($arr);

// Methode 2.
$arr = [-1, ...$arr]; //Creer un nouveau tableau
print_r($arr);

//Associer des tableaux entre eux avec la methode merge 
$arr2 = ['a', 'b', 'c'];
$arr3 = array_merge($arr, $arr2);
print_r($arr3);

// Marche aussi avec les tableaux associatif 
// Exemple
$arr4 = ['a' => 'a', 'b' => 'b', 'c' => 'c'];
$arr5 = array_merge($arr3, $arr4);
print_r($arr5);

// Initialisation d'un tableau avec des valeurs 
$arr = array_fill(0, 50, 0); //Tableau de 50 élements à partir de l'index 0, avec la valeur 0
print_r($arr);