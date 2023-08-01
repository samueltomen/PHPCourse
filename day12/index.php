<?php

print_r($_COOKIE);
// Affiche le contenu de tous les cookies actuellement définis sur la page.

setcookie('name', 'Jean', time() + 5, path: '/');
// Définit un cookie nommé 'name' avec la valeur 'Jean'. Le cookie expirera dans 5 secondes (time() + 5). 
// Le cookie sera disponible sur toutes les pages du site (path: '/').

?>

<h1><?= $_COOKIE['name'] ?? 'Pas de cookie' ?></h1>
<!-- Affiche la valeur du cookie 'name' si elle existe, sinon affiche "Pas de cookie". -->

<h2><?= $_COOKIE['about'] ?? '' ?> </h2>
<!-- Affiche la valeur du cookie 'about' si elle existe, sinon affiche une chaîne vide. -->

<a href="/about.php">About</a>
<!-- Un lien vers la page 'about.php'. Lorsque cliqué, cela ouvrira la page about.php dans le navigateur. -->