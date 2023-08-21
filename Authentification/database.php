<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=test', 'root', 'password', [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
} catch (PDOException $e) {
    echo $e->getMessage();
}
return $pdo;
