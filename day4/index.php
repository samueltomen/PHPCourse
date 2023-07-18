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

$a = "je suis une chaine de";

$b = "caractères";

echo "$a $b";
echo "</br>";
echo $a . " " . $b; //Concatenation

//autre exemple 

$a = 1;
$b = 3;

echo "</br>";
echo "J'ai mangé " . $a + $b . " bonbons";


// Installation du module mbstring
echo "<h1>Installation du module mbstring</h1>";
// Ce module permet d'eviter les erreur pour les caractères qui sont encodé sur 2 octets car php encode un caractère sur 1 octets par default
echo strlen('salut'); //5
echo "</br>";
echo strlen('été'); //5 au lieu de 3
echo "</br>";
echo mb_strlen("été"); //mb_strlen permet d'obtenir la longueur de la chaine de caractères réel

//installation sur ubuntu 
/* 
sudo apt install php-mbstring 
php -m -> affiche tous les modules installé 
*/

// Les fonctions globales pour les chaînes de caractères
//Toute ces methodes retourne automatiquement une nouvelle chaine de caractères et ne modifie pas la chaine de caractère initiale

echo "<h1>Les fonctions globales pour les chaînes de caractères</h1>";

$a = "Il fait beau en été";
echo mb_strlen($a); //Vu lecon précedente 
echo "</br>";
echo mb_strtolower($a); //Met la chaîne de caractère en minuscules
echo "</br>";
echo mb_strtoupper($a); //Tout en majuscule
echo "</br>";
echo trim("        $a        "); //Enlève tous les espace
echo "</br>";
echo str_contains($a, "été"); //Recherche une chaine de caractère précise passé en paramètre retiurne true or false
echo "</br>";
str_starts_with($a, "il"); //Permet de savoir si une chaine de caractères commence par | retourne true or fasle
echo "</br>";
str_ends_with($a, "il"); //Permet de savoir si une chaine de caractères fini par retourne true or fasle 
echo "</br>";
echo mb_substr($a, 0, 7); //Coupe la chaine de caractère entre les numero donné. Ici de 0 à 7 caractères.
echo "</br>";
echo str_replace("été", "hiver", $a); //Remplace une chaine de caractère par une autre
echo "</br>";
print_r(explode(" ", $a)); //Transforme chaine de caractère en tableau
echo "</br>";
echo implode(" ", explode(" ", $a));// Inverse de la methode explode . Transforme un tableau en chaine de caractères 