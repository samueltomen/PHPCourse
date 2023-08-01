<?php
// UTILISATION DES COOKIE EN PHP

setcookie('about', 'I am in about', httponly: true);
// Définit un cookie nommé 'about' avec la valeur 'I am in about'. 
// Le cookie sera disponible uniquement en HTTP et ne sera pas accessible en JavaScript (httponly: true).

?>

<h1>About</h1>
<!-- Affiche "About" en tant que titre de niveau 1 (h1). -->

<h2><?= $_COOKIE['about'] ?? 'Vide' ?> </h2>
<!-- Affiche la valeur du cookie 'about' si elle existe, sinon affiche "Vide". -->

<a href="/">Index</a>
<!-- Un lien vers la page d'accueil (index.php). Lorsque cliqué, cela ouvrira la page index.php dans le navigateur. -->


<!-- UTILISATION DES SESSIONS -->

<pre>
<?php

session_start([
    'save_path' => __DIR__ . "/sessions",
    'cookie_lifetime' => 500
]);
// print_r($_SESSION);

$_SESSION['name'] = 'Jean';


?>
</pre>

<h1><?= $_SESSION['name'] ?></h1>