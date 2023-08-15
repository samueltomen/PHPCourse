<?php

$dns = 'mysql:host=localhost;dbname=blog';
$usr = 'root';
$pwd = 'password';

try {
    $pdo = new PDO($dns, $usr, $pwd, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    echo "Connexion réussi";
    return $pdo;
} catch (PDOException $e) {
    echo "Une erreur s'est produite :" . $e->getMessage();
}
