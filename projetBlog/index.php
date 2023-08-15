<?php
// Importation de la connexion à la base de données à partir du fichier 'database.php'
$pdo = require_once './database.php';

// Préparation de la requête SQL pour récupérer tous les articles
$statement = $pdo->prepare('SELECT * from article');

// Exécution de la requête
$statement->execute();

// Récupération de tous les articles sous forme de tableau
$articles = $statement->fetchAll();

// Initialisation d'un tableau pour stocker les catégories
$categories = [];

// Filtrage et nettoyage de la superglobale $_GET pour des raisons de sécurité
$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

// Récupération de la catégorie sélectionnée depuis la requête GET (si présente)
$selectedCat = $_GET['cat'] ?? '';

// Si des articles sont présents dans la base de données
if (count($articles)) {
    // Extraction des catégories de chaque article
    $cattmp = array_map(fn ($a) => $a['category'], $articles);

    // Création d'un tableau associatif de catégories avec leur nombre d'occurrences
    $categories = array_reduce($cattmp, function ($acc, $cat) {
        if (isset($acc[$cat])) {
            $acc[$cat]++;
        } else {
            $acc[$cat] = 1;
        }
        return $acc;
    }, []);

    // Groupement des articles par catégorie
    $articlePerCategories = array_reduce($articles, function ($acc, $article) {
        if (isset($acc[$article['category']])) {
            $acc[$article['category']] = [...$acc[$article['category']], $article];
        } else {
            $acc[$article['category']] = [$article];
        }
        return $acc;
    }, []);
}

?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once('./includes/head.php') ?>
    <link rel="stylesheet" href="./public/css/index.css">
    <title>Blog</title>
</head>

<body>
    <div class="container">
        <?php require_once('./includes/header.php') ?>
        <div class="content">
            <div class="newsfeed-container">
                <ul class="category-container">
                    <li class="<?= $selectedCat ? '' : 'cat-active' ?>"><a href="/">Tous les articles <span class="small">(<?= count($articles) ?>
                                )</span>
                            <?php foreach ($categories as $catName => $catNum) : ?>
                        </a></li>
                    <li class="<?= $selectedCat === $catName ? 'cat-active' : '' ?>"><a href="/?cat=<?= $catName ?>"><?= $catName ?> <span class="small">(<?= $catNum ?>)</span></a></li>

                <?php endforeach ?>
                </ul>
                <div class="newsfeed-content">
                    <?php if (!$selectedCat) : ?>
                        <?php foreach ($categories as $cat => $num) : ?>
                            <h2 class="p-10"><?= $cat ?></h2>
                            <div class="articles-container">
                                <?php foreach ($articlePerCategories[$cat] as $a) : ?>
                                    <a href="/show-article.php?id=<?= $a['id'] ?>" class="article block">
                                        <div class="overflow">
                                            <div class="img-container" style="background-image:url(<?= $a['image'] ?>"></div>
                                        </div>
                                        <h3><?= $a['title'] ?></h3>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <h2 class="p-10"><?= $selectedCat ?></h2>
                        <div class="articles-container">
                            <?php foreach ($articlePerCategories[$selectedCat] as $a) : ?>
                                <a href="/show-article.php?id=<?= $a['id'] ?>" class="article block">
                                    <div class="overflow">
                                        <div class="img-container" style="background-image:url(<?= $a['image'] ?>"></div>
                                    </div>
                                    <h3><?= $a['title'] ?></h3>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>


        </div>
        <?php require_once('./includes/footer.php') ?>
    </div>
</body>

</html>