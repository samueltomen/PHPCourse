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



// Trier des tableaux par valeur
// Trier des tableaux par valeur
echo "<h1>Trier des tableaux par valeur</h1>";

echo "<pre>";

$a = [22, 1, 33, 234, 12, 45];
$b = ['test', 'Test', 'Aa', 'B', 'b', 'foo', 'Foo'];
$c = ['a' => 'b', 'foo' => 'bar', 'Hello' => 'world', 'Ciao' => 'Hello'];

// Tri par valeur et non préservation des clés
sort($a); // Trie $a en ordre croissant, modification du tableau d'origine (non préservation des clés).
sort($b); // Trie $b en ordre alphabétique (sensible à la casse), modification du tableau d'origine (non préservation des clés).
sort($c); // Trie $c en ordre alphabétique des valeurs, modification du tableau d'origine (non préservation des clés).

// Tri par valeur et préservation des clés
asort($a); // Trie $a en ordre croissant, en préservant les clés.
asort($b); // Trie $b en ordre alphabétique (sensible à la casse), en préservant les clés.
asort($c); // Trie $c en ordre alphabétique des valeurs, en préservant les clés.

// Tri inverse par valeur et préservation des clés
arsort($a); // Trie $a en ordre décroissant, en préservant les clés.
arsort($b); // Trie $b en ordre alphabétique inverse (sensible à la casse), en préservant les clés.
arsort($c); // Trie $c en ordre alphabétique inverse des valeurs, en préservant les clés.

// Tri personnalisé par valeur et non préservation des clés
usort($b, 'strcasecmp'); // Trie $b en ordre alphabétique (insensible à la casse) avec fonction de comparaison personnalisée (non préservation des clés).
usort($b, fn($val1, $val2) => strcmp($val1, $val2)); // Trie $b en ordre alphabétique (sensible à la casse) avec fonction de comparaison personnalisée (non préservation des clés).

// Tri personnalisé par valeur et préservation des clés
uasort($c, fn($val1, $val2) => strcasecmp($val1, $val2)); // Trie $c en ordre alphabétique (insensible à la casse) avec fonction de comparaison personnalisée, en préservant les clés.

// Affichage des résultats
print_r($b); // Affiche le contenu de $b après le tri.
print_r($c); // Affiche le contenu de $c après le tri.

echo "</pre>";