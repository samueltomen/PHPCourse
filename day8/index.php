<?php
// Trier des tableaux par clé et autres fonctions de tri
echo "<h1>Trier des tableaux par clé et autres fonctions de tri</h1>";

echo "<pre>";

$a = [22, 1, 33, 234, 12, 45];
// $b = ['test', 'Test', 'Aa', 'B', 'b', 'foo', 'Foo'];
$c = ['a' => 'b', 'foo' => 'bar', 'Hello' => 'world', 'Ciao' => 'Hello'];
$d = ['img1.png', 'img11.png', 'img2.png', 'Img3.png',];

// Tableau initial non trié : [22, 1, 33, 234, 12, 45]
sort($a);
// Tri croissant du tableau : [1, 12, 22, 33, 45, 234]

$ra = array_reverse($a);
// Inversion de l'ordre des éléments du tableau : [234, 45, 33, 22, 12, 1]

shuffle($a);
// Mélange aléatoire des éléments du tableau

natsort($d);
// Tri naturel des éléments du tableau : ['Img3.png', 'img1.png', 'img2.png', 'img11.png']

natcasesort($d);
// Tri naturel sans tenir compte de la casse : ['img1.png', 'Img3.png', 'img2.png', 'img11.png']

// fonction ksort()
ksort($c);
// Tri du tableau associatif par clé en ordre croissant

// fonction krsort()
krsort($c);
// Tri du tableau associatif par clé en ordre décroissant

//fonction uksort()
uksort($c, 'strcmp');
// Tri du tableau associatif par clé en utilisant une fonction de comparaison (strcmp) 

uksort($c, 'strcasecmp');
// Tri du tableau associatif par clé en ignorant la casse avec la fonction de comparaison strcasecmp

// print_r($a);

echo "</pre>";

// Parcourir un tableau
echo "<h1>Parcourir un tableau</h1>";

echo "<pre>";

echo "</pre>";