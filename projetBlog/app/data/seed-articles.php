<?php

// Décodage du fichier JSON contenant des articles en un tableau associatif
$articles = json_decode(file_get_contents('./articles.json'), true);

// Paramètres de connexion à la base de données
$dns = 'mysql:host=localhost;dbname=blog';  // Nom de source de données (DSN) spécifiant le type de base de données, l'hôte et le nom de la base de données
$usr = 'root';                               // Nom d'utilisateur de la base de données
$pwd = 'password';                           // Mot de passe de la base de données

// Établir une nouvelle connexion à la base de données à l'aide de PDO (PHP Data Objects)
$pdo = new PDO($dns, $usr, $pwd);

// Préparer une instruction SQL pour insérer des données dans la table 'article'
$statement = $pdo->prepare('INSERT INTO article (title,category,content,image) VALUES (:title,:category,:content,:image)');

// Parcourir chaque article dans le tableau décodé des articles
foreach ($articles as $article) {
    // Lier les valeurs respectives de l'article aux marqueurs de l'instruction SQL
    $statement->bindValue(':title', $article['title']);
    $statement->bindValue(':category', $article['category']);
    $statement->bindValue(':content', $article['content']);
    $statement->bindValue(':image', $article['image']);

    // Exécuter l'instruction SQL préparée pour l'article actuel
    $statement->execute();
}
