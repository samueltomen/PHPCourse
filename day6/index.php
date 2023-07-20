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

echo $d[0][1];//2
echo "</br>";
echo count($d); // Permet de connaitre le nombre d'element dans un tableau ou un objet

// Les opérateurs pour les tableaux
echo "<h1>Accéder aux valeurs d'un tableau</h1>";
