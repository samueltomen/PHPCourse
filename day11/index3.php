<?php

// Introduction au système de fichiers
echo "<h1>Introduction au système de fichiers</h1>";

$dossier = __DIR__ . "/dossier"; // Chemin absolu vers le dossier "dossier" depuis le répertoire actuel.

$filename = $dossier . '/text.txt'; // Chemin absolu vers le fichier "text.txt" dans le dossier.

var_dump(file_exists($filename)); // Vérifie si le fichier "text.txt" existe et affiche le résultat (true ou false).
echo "<br>";

var_dump(is_file($filename)); // Vérifie si le chemin "$filename" correspond à un fichier et affiche le résultat (true ou false).
echo "<br>";

var_dump(is_dir($dossier)); // Vérifie si le chemin "$dossier" correspond à un dossier et affiche le résultat (true ou false).
echo "<br>";


// Lire et écrire dans un fichier
echo "<h1>Lire et écrire dans un fichier</h1>";


