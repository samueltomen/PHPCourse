<?php
$pdo = require_once './database/database.php';
$authDB = require_once __DIR__ . '/database/security.php';


// Définition des constantes pour les messages d'erreur
const ERROR_REQUIRED = "Veuillez renseignez ce champ";
const ERROR_TOO_SHORT =  "Ce champs est trop court";
const ERROR_PASSWORD_TOO_SHORT = "Le mot de passe doit faire au moins 6 caractères";
const ERROR_EMAIL_INVALID = "L'email n'est pas valide";
const ERROR_CONFIRM_PASSWORD = "Les mots de passes ne correspondent pas";


// Initialisation d'un tableau d'erreurs vide pour chaque champ
$errors = [
    'firstname' => '',
    'lastname' => '',
    'email' => '',
    'password' => '',
    'confirmpassword' => '',

];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = filter_input_array(INPUT_POST, [
        'firstname' => FILTER_SANITIZE_SPECIAL_CHARS,
        'lastname' => FILTER_SANITIZE_SPECIAL_CHARS,
        'email' => FILTER_SANITIZE_EMAIL,


    ]);
    $firstname = $input['firstname'] ?? '';
    $lastname = $input['lastname'] ?? '';
    $email = $input['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmpassword = $_POST['confirmpassword'] ?? '';

    if (!$firstname) {
        $errors['firstname'] =  ERROR_REQUIRED;
    } elseif (mb_strlen($firstname) < 2) {
        $errors['firstname'] = ERROR_TOO_SHORT;
    }
    if (!$lastname) {
        $errors['lastname'] =  ERROR_REQUIRED;
    } elseif (mb_strlen($lastname) < 2) {
        $errors['lastname'] = ERROR_TOO_SHORT;
    }
    if (!$email) {
        $errors['email'] =  ERROR_REQUIRED;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = ERROR_EMAIL_INVALID;
    }

    if (!$password) {
        $errors['password'] =  ERROR_REQUIRED;
    } elseif (mb_strlen($password) < 6) {
        $errors['password'] = ERROR_PASSWORD_TOO_SHORT;
    }
    if (!$confirmpassword) {
        $errors['confirmpassword'] =  ERROR_REQUIRED;
    } elseif ($confirmpassword !== $password) {
        $errors['confirmpassword'] = ERROR_CONFIRM_PASSWORD;
    }



    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
        $authDB->register([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => $password
        ]);
        header('Location: /');
    }

    echo "</pre>";
}

?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once('./includes/head.php') ?>
    <link rel="stylesheet" href="./public/css/auth-register.css">
    <title>Inscription</title>
</head>

<body>
    <div class="container">
        <?php require_once('./includes/header.php') ?>
        <div class="content">
            <div class="block p-20 form-container">
                <h1>Inscription</h1>
                <form action="./auth-register.php" method="POST">
                    <div class="form-control">
                        <label for="firstname">Prenom</label>
                        <input type="text" name="firstname" id="firstname" value="<?= $firstname ?? '' ?>">
                        <?php if ($errors['firstname']) : ?>
                            <p class="text-error"><?= $errors['firstname'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form-control">
                        <label for="lastname">Nom</label>
                        <input type="text" name="lastname" id="lastname" value="<?= $lastname ?? '' ?>">
                        <?php if ($errors['lastname']) : ?>
                            <p class="text-error"><?= $errors['lastname'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form-control">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" value="<?= $email ?? '' ?>">
                        <?php if ($errors['email']) : ?>
                            <p class="text-error"><?= $errors['email'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form-control">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password"></input>
                        <?php if ($errors['password']) : ?>
                            <p class="text-error"><?= $errors['password'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form-control">
                        <label for="confirmpassword">Confirmation Mot de passe</label>
                        <input type="password" name="confirmpassword" id="confirmpassword"></input>
                        <?php if ($errors['confirmpassword']) : ?>
                            <p class="text-error"><?= $errors['confirmpassword'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form-actions">
                        <a href="/">
                            <button class="btn btn-secondary" type="button">Annuler</button>
                        </a>
                        <button class="btn btn-primary" type="submit">Créer mon profil</button>

                    </div>
                </form>
            </div>
        </div>
        <?php require_once('./includes/footer.php') ?>
    </div>
</body>

</html>