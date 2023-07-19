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

$p1 = 5;
$p2 = 7;

function calculator($p1, $p2, $operator)
{
    return $operator($p1, $p2); // Appelle la fonction $operator avec les arguments $p1 et $p2 et renvoie le résultat
}

$addition = fn($p1, $p2) => $p1 + $p2; // Définit une fonction fléchée (arrow function) $addition qui retourne la somme de $p1 et $p2

echo calculator($p1, $p2, $addition); // Appelle la fonction calculator en passant les arguments $p1, $p2 et $addition, puis affiche le résultat


// Typer les fonctions
echo "<h1>Typer les fonctions</h1>";

declare(strict_types=1); // Déclare le mode strict des types pour le reste du script

function add(int $p1, int $p2): int
{
    return $p1 + $p2; // Ajoute les deux paramètres de type int et retourne un entier (int)
}

function greeting2(string $name): void
{
    echo $name; // Affiche le nom passé en paramètre de type string
}

function greeting3(?string $name): void
{
    echo $name ? "Bonjour $name" : "Bonjour"; // Affiche "Bonjour $name" si le nom est non null, sinon affiche simplement "Bonjour"
}

// Les annotations "void" et "?" permettent de spécifier le type de retour et d'indiquer la possibilité d'une valeur null pour les paramètres respectivement.


greeting3(null); // Appelle la fonction greeting3 avec la valeur null

function add_2(int|float $p3, int|float $p4): mixed
{
    return $p3 + $p4; // Ajoute les deux paramètres de types int ou float et retourne un type mixte (mixed)
}

add_2(1, 2); // Appelle la fonction add_2 avec les valeurs 1 et 2

add("un", 2); //Erreur  
// Appelle la fonction add avec une valeur de type string et une valeur de type int !

greeting2(2); //Erreur  
// Appelle la fonction greeting2 avec une valeur de type int
