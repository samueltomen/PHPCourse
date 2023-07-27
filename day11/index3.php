<pre>
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

readfile($filename);
// Lecture du contenu du fichier "text.txt" et affichage directement dans la sortie sans stockage en mémoire.

file($filename);
// Lecture du fichier "text.txt" et stockage de toutes les lignes dans un tableau. Chaque élément du tableau correspond à une ligne du fichier.

file_get_contents($filename);
// Lecture du fichier "text.txt" et renvoie de son contenu sous forme de chaîne de caractères. Le contenu complet est stocké en mémoire.

file_put_contents($filename, 'Je suis une licorne', FILE_APPEND);
// Ajoute la chaîne de caractères "Je suis une licorne" à la fin du fichier "text.txt" spécifié par le chemin "$filename". Si le fichier n'existe pas, il sera créé. Le paramètre FILE_APPEND permet de conserver le contenu précédent du fichier et d'ajouter le nouveau contenu à la suite.

// Lecture et écriture en mode binaire
echo "<h1>Lecture et écriture en mode binaire</h1>";


?>
</pre>