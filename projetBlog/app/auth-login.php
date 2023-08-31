<?php
require_once __DIR__ . '/database/database.php';
$authDB = require_once './database/security.php';


// Définition des constantes pour les messages d'erreur
const ERROR_REQUIRED = "Veuillez renseignez ce champ";
const ERROR_EMAIL_INVALID = "L'email n'est pas valide";
const ERROR_PASSWORD = "Le mot de passe n'est pas valide";
const ERROR_UNKNOW_EMAIL = "L'email n'existe pas";





// Initialisation d'un tableau d'erreurs vide pour chaque champ
$errors = [
    'email' => '',
    'password' => '',

];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = filter_input_array(INPUT_POST, [
        'email' => FILTER_SANITIZE_EMAIL,


    ]);
    $email = $input['email'] ?? '';
    $password = $_POST['password'] ?? '';


    if (!$email) {
        $errors['email'] =  ERROR_REQUIRED;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = ERROR_EMAIL_INVALID;
    }

    if (!$password) {
        $errors['password'] =  ERROR_REQUIRED;
    }




    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
        $user = $authDB->getUserFromEmail($email);
        if (!$user) {
            $errors['email'] = ERROR_UNKNOW_EMAIL;
        } else {
            if (!password_verify($password, $user['password'])) {
                $errors['password'] = ERROR_PASSWORD;
            } else {
                $authDB->login($user['id']);
                header('Location: /');
            }
        }
    }
}

?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once('./includes/head.php') ?>
    <link rel="stylesheet" href="./public/css/auth-register.css">
    <title>Se connecter</title>
</head>

<body>
    <div class="container">
        <?php require_once('./includes/header.php') ?>
        <div class="content">
            <div class="block p-20 form-container">
                <h1>Connexion</h1>
                <form action="./auth-login.php" method="POST">

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

                    <div class="form-actions">
                        <a href="/">
                            <button class="btn btn-secondary" type="button">Annuler</button>
                        </a>
                        <button class="btn btn-primary" type="submit">Connexion</button>

                    </div>
                </form>
            </div>
        </div>
        <?php require_once('./includes/footer.php') ?>
    </div>
</body>

</html>