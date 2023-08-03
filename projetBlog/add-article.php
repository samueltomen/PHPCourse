<?php

// Définition des constantes pour les messages d'erreur
const ERROR_REQUIRED = "Veuillez renseignez ce champ";
const ERROR_TITLE_TOO_SHORT = "Le titre est trop court";
const ERROR_CONTENT_TOO_SHORT = 'L\'article est trop court';
const ERROR_IMAGE_URL = 'L\'image doit être une url valide';

// Nom du fichier qui contiendra les articles
$filename = __DIR__ . '/data/articles.json';

// Initialisation d'un tableau d'erreurs vide pour chaque champ
$errors = [
    'title' => '',
    'image' => '',
    'category' => '',
    'content' => '',

];

// Tableau pour stocker les articles
$articles = [];

// Vérifie si la requête est une méthode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifie si le fichier existe, si oui, récupère les articles
    if (file_exists($filename)) {
        $articles = json_decode(file_get_contents($filename), true) ?? [];
    }
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
    if (!$category) {
        $errors['content'] = ERROR_REQUIRED;
    } else if (mb_strlen($content) < 50) {
        $errors['content'] = ERROR_CONTENT_TOO_SHORT;
    }
    echo "<pre>";
    // Affiche les erreurs s'il y en a, sinon ajoute l'article et redirige vers la page principale
    // La fonction fléchée est utilisée ici pour filtrer le tableau $errors et ne conserver que les erreurs non vides.
    // Si le tableau filtré est vide (c'est-à-dire, il n'y a pas d'erreurs), un nouvel article est ajouté.
    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
        $articles = [...$articles, [
            'id' => time(),
            'title' => $title,
            'image' => $image,
            'category' => $category,
            'content' => $content
        ]];
        file_put_contents($filename, json_encode($articles));
        header('Location: /');
    } else {
        // print_r($errors);
    }
    // ...

    echo "</pre>";
}


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once('./includes/head.php') ?>
    <link rel="stylesheet" href="./public/css/add-article.css">
    <title>Créer un article</title>
</head>


<body>
    <div class="container">
        <?php require_once('./includes/header.php') ?>
        <div class="content">
            <div class="block p-20 form-container">
                <h1>Ecrire un article</h1>
                <form action="./add-article.php" method="POST">
                    <div class="form-control">
                        <label for="title">Titre</label>
                        <input type="text" name="title" id="title" value=<?= $title ?? '' ?>>
                        <?php if ($errors['title']) : ?>
                            <p class="text-error"><?= $errors['title'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form-control">
                        <label for="image">Image</label>
                        <input type="text" name="image" id="image" value=<?= $image ?? '' ?>>
                        <?php if ($errors['image']) : ?>
                            <p class="text-error"><?= $errors['image'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form-control">
                        <label for="category">Catégorie</label>
                        <select type="select" name="category" id="category">
                            <option value="technology">Technologie</option>
                            <option value="nature">Nature</option>
                            <option value="politic">Politique</option>
                        </select>
                        <?php if ($errors['category']) : ?>
                            <p class="text-error"><?= $errors['category'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form-control">
                        <label for="content">Contenu</label>
                        <textarea type="text" name="content" id="content" value=<?= $content ?? '' ?>></textarea>
                        <?php if ($errors['content']) : ?>
                            <p class="text-error"><?= $errors['content'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form-actions">
                        <a href="/">
                            <button class="btn btn-secondary" type="button">Annuler</button>
                        </a>
                        <button class="btn btn-primary" type="submit">Sauvegarder</button>

                    </div>
                </form>
            </div>
        </div>
        <?php require_once('./includes/footer.php') ?>
    </div>
</body>

</html>