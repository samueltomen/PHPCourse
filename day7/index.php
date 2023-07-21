<?php
// Rechercher des éléments dans un tableau et découper un tableau
// Rechercher des éléments dans un tableau et découper un tableau
echo "<h1>Rechercher des éléments dans un tableau et découper un tableau </h1>";

echo "<pre>";

// Fonction array_search()
$arr = [1, 2, 3];
$res = array_search(2, $arr, true); // Recherche la valeur 2 dans le tableau $arr (utilise la comparaison stricte), retourne l'index de la première occurrence ou false si non trouvé.
// Si false (ou non spécifié), la recherche utilise une comparaison non stricte

// Methode array_column()
$arr = [
    [
        'name' => 'jean',
        'age' => 12
    ],
    [
        'name' => 'julie',
        'age' => 13
    ]
];

$res = array_column($arr, 'name'); // Extrait un tableau contenant toutes les valeurs associées à la clé 'name' dans chaque sous-tableau du tableau $arr.

$res = array_search('jean', array_column($arr, 'name'));
// Cherche la valeur 'jean' dans le tableau résultant de array_column($arr, 'name').
// Retourne l'index de la première occurrence ou false si non trouvé.

var_dump($res);

// Fonction array_slice()
$arr = [1, 2, 3, 4, 5];
$arr2 = array_slice($arr, 1, 2, true);
// Récupère une portion du tableau $arr à partir de l'index 1, avec une longueur de 2 éléments et préserve les clés d'origine (true).
// Si true, les clés du tableau d'origine seront conservées dans le tableau résultant.
// Si false (ou non spécifié), les clés du tableau résultant seront réindexées numériquement, en commençant par zéro, indépendamment des clés du tableau d'origine.

print_r($arr);
print_r($arr2); // Affiche le contenu du tableau $arr2 (la portion extraite).

echo "</pre>";