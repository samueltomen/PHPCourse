<?php

$pdo = require_once __DIR__ . '/database.php';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $input = filter_input_array(INPUT_POST, [
        'username' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'email' => FILTER_SANITIZE_EMAIL,
    ]);
    $username = $input['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $email = $input['email'] ?? '';

    if (!$username || !$password || !$email) {
        $error = 'ERROR';
    } else {
        $hashedPassword = password_hash($password, PASSWORD_ARGON2I);
        $statement = $pdo->prepare('INSERT INTO user VALUES(DEFAULT,:email,:username,:password)');


        $statement->bindValue(':email', $email);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $hashedPassword);
        $statement->execute();
        header('Location: /login.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <nav>
        <a href="/">Home</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </nav>

    <h1>REGISTER</h1>
    <form action="./register.php" method="POST">
        <input type="text" placeholder="Username" name="username">
        <br>
        <br>
        <input type="text" placeholder="Email" name="email">
        <br>
        <br>
        <input type="text" placeholder="Password" name="password">
        <br>
        <br>
        <?php if ($error) : ?>
            <h1 style="color:red"><?= $error ?></h1>
        <?php endif; ?>
        <button type="submit">Submit</button>

    </form>

</body>

</html>