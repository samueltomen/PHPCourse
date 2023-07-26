<?php 

// Lire les requêtes en PHP
echo "<h1>Lire les requêtes en PHP</h1>";

$a = 1;
echo $GLOBALS['a']; // Super Global (Accède à une variable globale)

echo "<pre>";
// print_r($_SERVER) ; // Affiche le contenu de la superglobale $_SERVER

echo "</pre>";

// Lire et modifier les headers ajoutés par PHP
echo "<h1>Lire et modifier les headers ajoutés par PHP</h1>";

echo "<pre>";

// header_remove('X-Powered-By'); // Supprime un header spécifié (ici, 'X-Powered-By')
// header('Content-type: text/html'); // Définit le header Content-type à 'text/html'
// header('Content-type: text/plain',false,500); // Définit le header Content-type à 'text/plain' avec le code de statut 500

print_r(headers_list()); // Affiche la liste des headers envoyés au client

echo "</pre>";




