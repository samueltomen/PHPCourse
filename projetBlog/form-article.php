<?php
require_once __DIR__ . '/database/security.php';
require_once __DIR__ . '/database/database.php';
$articleDB = require_once './database/models/articleDB.php';
$currentUser = isLoggedIn();
if (!$currentUser) {
    header('Location: /auth-login.php');
}
// Définition des constantes pour les messages d'erreur
const ERROR_REQUIRED = "Veuillez renseignez ce champ";
const ERROR_TITLE_TOO_SHORT = "Le titre est trop court";
const ERROR_CONTENT_TOO_SHORT = 'L\'article est trop court';
const ERROR_IMAGE_URL = 'L\'image doit être une url valide';

// Initialisation d'un tableau d'erreurs vide pour chaque champ
$errors = [
    'title' => '',
    'image' => '',
    'category' => '',
    'content' => '',

];
$category = '';

// Tableau pour stocker les articles
$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id = $_GET['id'] ?? '';
if ($id) {

    $article = $articleDB->fetchOne($id);
    if ($article['author'] !== $currentUser['id']) {
        header('Location: /');
    }
    $title = $article['title'];
    $image = $article['image'];
    $category = $article['category'];
    $content = $article['content'];
}

// Vérifie si la requête est une méthode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Nettoyage des données POST
    $_POST = filter_input_array(INPUT_POST, [
        'title' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'image' => FILTER_SANITIZE_URL,
        'category' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'content' => [
            'filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'flags' => FILTER_FLAG_NO_ENCODE_QUOTES
        ]
    ]);

    // Affectation des valeurs POST à des variables
    $title = $_POST['title'] ?? '';
    $image = $_POST['image'] ?? '';
    $category = $_POST['category'] ?? '';
    $content = $_POST['content'] ?? '';

    // Vérification de la validité du titre
    if (!$title) {
        $errors['title'] = ERROR_REQUIRED;
    } elseif (mb_strlen($title) < 5) {
        $errors['title'] = ERROR_TITLE_TOO_SHORT;
    }
    // Vérification de la validité de l'image
    if (!$image) {
        $errors['image'] = ERROR_REQUIRED;
    } elseif (!filter_var($image, FILTER_VALIDATE_URL)) {
        $errors['image'] = ERROR_IMAGE_URL;
    }
    // Vérification de la validité de la catégorie
    if (!$category) {
        $errors['category'] = ERROR_REQUIRED;
    }
    // Vérification de la validité du contenu
    if (!$content) {
        $errors['content'] = ERROR_REQUIRED;
    } else if (mb_strlen($content) < 50) {
        $errors['content'] = ERROR_CONTENT_TOO_SHORT;
    }
    echo "<pre>";
    // Affiche les erreurs s'il y en a, sinon ajoute l'article et redirige vers la page principale
    // La fonction fléchée est utilisée ici pour filtrer le tableau $errors et ne conserver que les erreurs non vides.
    // Si le tableau filtré est vide (c'est-à-dire, il n'y a pas d'erreurs), un nouvel article est ajouté.
    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
        if ($id) {
            $article['title'] = $title;
            $article['image'] = $image;
            $article['category'] = $category;
            $article['content'] = $content;
            $article['author'] = $currentUser['id'];
            $articleDB->updateOne($article);
        } else {
            $articleDB->createOne([
                'title' => $title,
                'content' => $content,
                'category' => $category,
                'image' => $image,
                'author' => $currentUser['id']
            ]);
        }
        header('Location: /');
    }

    echo "</pre>";
}


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once('./includes/head.php') ?>
    <!-- <link rel="stylesheet" href="./public/css/form-article.css"> -->
    <title><?php if ($id) {
                echo 'Modifier un article';
            } else {
                echo 'Créer un article';
            } ?></title>
</head>


<body>
    <div class="container">
        <?php require_once('./includes/header.php') ?>
        <div class="content">
            <div class="block p-20 form-container">
                <h1><?= $id ? 'Modifier' : 'Ecrire' ?> un article</h1>
                <form action="./form-article.php<?= $id ? "?id=$id" : '' ?>" method="POST">
                    <div class="form-control">
                        <label for="title">Titre</label>
                        <input type="text" name="title" id="title" value="<?= $title ?? '' ?>">
                        <?php if ($errors['title']) : ?>
                            <p class="text-error"><?= $errors['title'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form-control">
                        <label for="image">Image</label>
                        <input type="text" name="image" id="image" value="<?= $image ?? '' ?>">
                        <?php if ($errors['image']) : ?>
                            <p class="text-error"><?= $errors['image'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form-control">
                        <label for="category">Catégorie</label>
                        <select name="category" id="category">
                            <option <?= !$category || strtolower($category) === 'technologie' ? 'selected' : '' ?> value="Technologie">Technologie</option>
                            <option <?= strtolower($category) === 'nature' ? 'selected' : '' ?> value="Nature">Nature</option>
                            <option <?= strtolower($category) === 'politique' ? 'selected' : '' ?> value="Politique">Politique</option>
                        </select>
                        <?php if ($errors['category']) : ?>
                            <p class="text-error"><?= $errors['category'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form-control">
                        <label for="content">Contenu</label>
                        <textarea type="text" name="content" id="content"><?= $content ?? '' ?></textarea>
                        <?php if ($errors['content']) : ?>
                            <p class="text-error"><?= $errors['content'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form-actions">
                        <a href="/">
                            <button class="btn btn-secondary" type="button">Annuler</button>
                        </a>
                        <button class="btn btn-primary" type="submit"><?= $id ? 'Modifier' : 'Sauvegarder' ?></button>

                    </div>
                </form>
            </div>
        </div>
        <?php require_once('./includes/footer.php') ?>
    </div>
</body>

</html>