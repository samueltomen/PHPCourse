<?php
// Déclaration d'une fonction
echo "<h1>Déclaration d'une fonction</h1>";

function bar()
{
    echo "bar";
}

function func()
{
    bar();
    echo "Hello world";
}

func();

// Les paramètres et les arguments
echo "<h1>Les paramètres et les arguments</h1>";

function func2($a, $b = 2) //le fait de mettre un "=" à $b permet de mettre une valeur par defaut 
{
    return $a + $b;
}

$c = func2(1, 1);
echo $c;

echo "</br>";

function greeting($firstName, $lastName)
{
    echo "Bonjour $firstName $lastName";
}
greeting("Jean", lastName: "Valjean");


// Nombre indéfini d'arguments
echo "<h1>Nombre indéfini d'arguments</h1>";

function my_min(...$rest)
{
    $a = func_get_args(); // Récupère tous les arguments passés à la fonction dans un tableau $a
    $firstArg = func_get_arg(0); // Récupère le premier argument passé à la fonction et le stocke dans $firstArg
    $num = func_num_args(); // Récupère le nombre total d'arguments passés à la fonction et le stocke dans $num
    echo "</br>";
}

my_min(10, 2, 3); // Appelle la fonction my_min avec les arguments 10, 2 et 3

function my_sread(...$arr)
{
    return min(...$arr); // Utilise l'opérateur de décomposition (...) pour passer tous les arguments à la fonction min() et renvoie la valeur minimale
}
echo my_sread(1, 2, 3, 4, 5, 6); // Appelle la fonction my_sread avec les arguments 1, 2, 3, 4, 5 et 6, puis affiche la valeur minimale renvoyée

// Portée des variables
echo "<h1>Portée des variables</h1>";

$b = 2;

function func3()
{
    global $b; // Permet d'accéder à la variable globale $b à l'intérieur de la fonction
    echo $b;
}

func3();
function func4()
{
    static $num = 0; // Déclare une variable statique $num avec la valeur 0
    echo $num; // Affiche la valeur de $num
    $num++; // Incrémente la valeur de $num
}

func4();

// Les fonctions anonymes
echo "<h1>Les fonctions anonymes</h1>";
/* 
La fonction test est définie avec un paramètre $callback. Cette fonction prend une fonction de rappel en argument.

À l'intérieur de la fonction test, la variable $callback est appelée comme une fonction en utilisant les parenthèses (). Cela exécute la fonction de rappel passée en argument.

L'appel de test est effectué en passant une fonction anonyme comme argument. Cette fonction anonyme est définie à l'intérieur de l'appel de test et ne possède pas de nom. Elle affiche simplement le texte "Hello in comeback".

Lorsque test est appelée, la fonction de rappel passée en argument est exécutée. Dans ce cas, la fonction anonyme est appelée et affiche "Hello in comeback".
*/

function test($callback)
{
    $callback(); // Appelle la fonction de rappel passée en argument
}

test(function () {
    echo "Hello in comeback"; // Fonction de rappel qui affiche "Hello in comeback"
});


// Les fonctions fléchées
echo "<h1>Les fonctions fléchées</h1>";


