<?php

$pdo = require_once __DIR__ . '/database.php';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $input = filter_input_array(INPUT_POST, [
        'email' => FILTER_SANITIZE_EMAIL,
    ]);
    $password = $_POST['password'] ?? '';
    $email = $input['email'] ?? '';

    if (!$password || !$email) {
        $error = 'ERROR';
    } else {
        $statementUser = $pdo->prepare('SELECT * FROM user WHERE email=:email');
        $statementUser->bindValue('email', $email);
        $statementUser->execute();
        $user = $statementUser->fetch();

        if (password_verify($password, $user['password'])) {
            $statementSession = $pdo->prepare('INSERT INTO session VALUES ( DEFAULT, :userid)');
            $statementSession->bindValue(':userid', $user['id']);
            $statementSession->execute();
            $sessionId = $pdo->lastInsertId();
            setcookie('session', $sessionId, time() + 60 * 60 * 24 * 7, "", "", false, true);
            header('Location: /profil.php');
            echo 'Sucess';
        } else {
            $error = 'Wrong password !';
        }
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
        <a href="logout.php">Logout</a>
        <a href="profil.php">Profil</a>
        <a href="register.php">Register</a>
    </nav>

    <h1>LOGIN</h1>
    <form action="./login.php" method="POST">
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