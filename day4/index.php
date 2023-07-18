<?php
// Les fonctions mathematiques 
echo "<h1>Les fonctions mathématiques</h1>";
echo floor(0.6); //Arondi à l'entier inferieur 
echo "</br>";
echo ceil(0.6); //Arrondi à l'entier superieur 
echo "</br>";
echo round(0.3); //Arrondi à l'entier le plus proche 
echo "</br>";
echo round(0.8); //Arrondi à l'entier le plus proche
echo "</br>";
echo max(5, 11, 54, 1254, 54, 18, 75); //Retourne le nombre le plus grand
echo "</br>";
echo min(5, 11, 54, 1254, 54, 18, 75); //Retourne le nombre le plus petit
echo "</br>";
echo pow(3, 2); //3 à la puissance 2 = 3*3 = 9
echo "</br>";
echo pi(); //Permet de recuperer la valeur de pi
echo "</br>";
echo mt_rand(1, 20); //Genere un nombre aleatoire en 0 & 20

//Introduction aux chaînes de caractères

echo "<h1>Introduction aux chaînes de caractères</h1>";

$a = 'je suis une chaine de caractères d\'homme'; //Simple quote utilisé quand il n'y a pas d'interprétation 

$b = mt_rand(10, 50);
$c = "Je suis une chaine de caractère avec $b nombre \u{2665}";
// \u{} permet d'afficher des unicodes + "\n" saut de ligne et "\t" tabulation

$d = "

dede
de
de

deffefe
dede
ded

ff
de
";

//Methode heredoc pratique pour les requêtes SQL
$e = <<<SALUT
vfvoffrfovvo 
SALUT;


echo $a;
echo "</br>";
echo $c;

// Les opérateurs pour les chaînes de caractères

echo "<h1>Les opérateurs pour les chaînes de caractères</h1>";

