<pre>

<?php

const ERROR_REQUIRED = "Veuillez renseigner ce champs";
const ERROR_LENGTH = "Le champs doit faire entre 2 et 10 caractères";
const ERROR_EMAIL = "L'email n'est pas valide";

$errors = [
    'firstname' => '',
    'email' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $_POST = filter_input_array(INPUT_POST, [
        'firstname' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'email' => FILTER_SANITIZE_EMAIL,
    ]);


    $firstname = $_POST['firstname'] ?? '';
    $email = $_POST['email'] ?? '';

    if (!$firstname) {
        $errors['firstname'] = ERROR_REQUIRED;
    } elseif (mb_strlen($firstname) < 2 || mb_strlen($firstname) > 10) {
        $errors['firstname'] = ERROR_LENGTH;
    };

    if (!$email) {
        $errors['email'] = ERROR_REQUIRED;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = ERROR_EMAIL;
    }
}


?>
</pre>
<h1>Bonjour <?= isset($firstname) ? $firstname : '!' ?></h1>
<form action="index2.php" method="POST">
    <div>
        <label for="firstname">firstname</label><br>
        <input type="text" name="firstname" id="firstname">
        <?= $errors['firstname'] ? '<p style="color:red">' . $errors['firstname'] . "</p>" : '' ?>
    </div>
    <br>
    <div>
        <label for="email">email</label><br>
        <input type="text" name="email" id="email">
        <?= $errors['email'] ? '<p style="color:red">' . $errors['email'] . "</p>" : '' ?>

    </div>
    <br>
    <button>Submit</button>
</form>