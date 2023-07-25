<?php

// Autres fonctions des tableaux
echo "<h1>Autres fonctions des tableaux</h1>";

echo "<pre>";

$arr = ['blue', 'orange', 'yellow'];

// Récupère un indice aléatoire du tableau $arr et affiche la valeur correspondante.
$value = array_rand($arr);
echo $arr[$value];

echo "<br>";

// Récupère deux indices aléatoires du tableau $arr, puis affiche les valeurs correspondantes.
$value = array_rand($arr, 2);
print_r(array_map(fn($a) => $arr[$a], $value));

$arr2 = [1, 1, 1, 2, 3, 3];

// Supprime les doublons du tableau $arr2 et affiche le résultat.
$res = array_unique($arr2);
print_r($res);

$users = [
    '1851551' => [
        'Name' => 'Jean'
    ],
    '145851551' => [
        'Name' => 'Julie'
    ]
];

// Récupère les clés du tableau associatif $users et affiche les résultats.
$ids = array_keys($users);
print_r($ids);

// Récupère les valeurs du tableau associatif $users et affiche les résultats.
$values = array_values($users);
print_r($values);

echo "</pre>";