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

// file_put_contents($filename, 'Je suis une licorne', FILE_APPEND);
// Ajoute la chaîne de caractères "Je suis une licorne" à la fin du fichier "text.txt" spécifié par le chemin "$filename". Si le fichier n'existe pas, il sera créé. Le paramètre FILE_APPEND permet de conserver le contenu précédent du fichier et d'ajouter le nouveau contenu à la suite.

// Lecture et écriture en mode binaire
echo "<h1>Lecture et écriture en mode binaire</h1>";

// $handle = fopen($filename, 'w');
// Ouvre le fichier "text.txt" en mode d'écriture ('w'). Si le fichier existe, son contenu sera tronqué. 
// Si le fichier n'existe pas, il sera créé. Un pointeur est créé pour écrire dans le fichier.

// $handle = fopen($filename, 'a+');
// Ouvre le fichier "text.txt" en mode lecture et écriture ('a+'). Si le fichier existe, le pointeur est positionné à la fin du fichier.
// Si le fichier n'existe pas, il sera créé. Un pointeur est créé pour lire ou écrire dans le fichier.

// fwrite($handle, 'Oufefeps');
// Écrit la chaîne de caractères 'Oufefeps' dans le fichier "text.txt", à la position du pointeur actuel.

// $data = fread($handle, 50);
// Lit jusqu'à 50 octets de données à partir du fichier "text.txt", à partir de la position actuelle du pointeur, 
// et stocke les données lues dans la variable $data.

// Copier et supprimer des fichiers
echo "<h1>Copier et supprimer des fichiers</h1>";

// copy($filename, $dossier . "/copy.txt");
// Copie le fichier "text.txt" vers un nouveau fichier "copy.txt" dans le dossier "dossier".
// (Note: La ligne est commentée, donc la copie ne sera pas effectuée lors de l'exécution.)

// unlink($filename);
// Supprime le fichier "text.txt" spécifié par le chemin "$filename".
// (Note: La ligne est commentée, donc le fichier ne sera pas supprimé lors de l'exécution.)

// rmdir($dossier);
// Supprime le dossier "dossier" spécifié par le chemin "$dossier", mais uniquement s'il est vide.
// (Note: La ligne est commentée, donc le dossier ne sera pas supprimé lors de l'exécution.)

?>
</pre>