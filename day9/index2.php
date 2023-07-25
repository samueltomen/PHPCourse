<?php

// Introduction aux imports de fichier
echo "<h1>Introduction aux imports de fichier</h1>";

// Affiche le chemin absolu du répertoire du fichier actuel.
echo __DIR__;
echo "<br>";

// Affiche le chemin absolu du fichier actuel, y compris son nom.
echo __FILE__;
echo "<br>";

// Fonction test() pour afficher le nom de la fonction en cours d'exécution.
function test()
{
    echo __FUNCTION__;
}

// Appelle la fonction test() et affiche son nom.
test();


// Require et chemins
echo "<h1>Require et chemins</h1>";

echo require './lib.php';

// Les lignes suivantes sont en commentaires pour éviter l'inclusion du fichier lib.php plusieurs fois.

// require '/Users/tomen/OneDrive/Documents/GitHub/PHPCourse/day9/lib.php';
// require __DIR__ . 'lib.php';
// require './lib.php';

// Utilisation de la fonction funcLib() du fichier lib.php après son inclusion.
// funcLib();

// Affichage de la valeur de la variable $a définie dans le fichier lib.php (si elle est définie).
// echo $a;


