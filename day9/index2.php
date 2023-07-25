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


// ------- Différences entre require, require_once, include, include_once -------
// require: Inclut un fichier spécifié, et arrête l'exécution avec une erreur fatale si le fichier est introuvable ou génère une erreur.
// require_once: (Utilisé par defaut) Inclut un fichier spécifié une seule fois dans le script, évitant les doublons lors des inclusions multiples.
// include: Inclut un fichier spécifié, et émet une alerte si le fichier est introuvable ou génère une erreur, mais le script continue.
// include_once: Inclut un fichier spécifié une seule fois dans le script, évitant les doublons, et continue l'exécution malgré les erreurs.


//"Require" continue le script même en cas d'erreur , à la difference de "include" qui lui arrête le script