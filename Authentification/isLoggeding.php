<?php

function isLoggedin()
{

    // Inclut et initialise la connexion à la base de données à partir du fichier 'database.php'.
    $pdo = require_once __DIR__ . '/database.php';
    // Tentative de récupération de l'ID de session à partir des cookies.
    // Si l'ID de session n'existe pas dans les cookies, la variable $sessionId sera vide.
    $sessionId = $_COOKIE['session'] ?? '';
    $signature = $_COOKIE['signature'] ?? '';

    // Vérifie si un ID de session a bien été récupéré.
    if ($sessionId && $signature) {
        $hash = hash_hmac('sha256', $sessionId, 'quatre petits chats');
        $match = hash_equals($signature, $hash);
        if ($match) {

            // Prépare une requête SQL pour interroger la base de données et récupérer les informations associées à cet ID de session.
            $sessionStatement = $pdo->prepare('SELECT * FROM session WHERE id=:id');

            // Associe la valeur de l'ID de session à l'instruction SQL préparée précédemment.
            $sessionStatement->bindValue(':id', $sessionId);

            // Lance l'exécution de la requête SQL.
            $sessionStatement->execute();

            // Stocke les informations récupérées sur la session dans la variable $session.
            // Si aucune information n'est trouvée, $session sera faux.
            $session = $sessionStatement->fetch();

            // Si des informations sur la session ont été trouvées...
            if ($session) {

                // Prépare une requête SQL pour interroger la base de données et récupérer les informations de l'utilisateur associé à cette session.
                $userStatement = $pdo->prepare('SELECT * FROM user WHERE id=:id');

                // Associe la valeur de l'ID de l'utilisateur (obtenu à partir des données de session) à l'instruction SQL préparée pour l'utilisateur.
                $userStatement->bindValue(':id', $session['userid']);

                // Lance l'exécution de la requête SQL pour récupérer les informations de l'utilisateur.
                $userStatement->execute();

                // Stocke les informations de l'utilisateur dans la variable $user.
                $user = $userStatement->fetch();
            }
        }
    }

    return $user ?? false;
}
