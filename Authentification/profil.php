<?php

require_once __DIR__ . '/isLoggeding.php';
$currentUser = isLoggedin();

if (!$currentUser) {
    header('Location: /login.php');
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

    <h1>PROFIL</h1>
    <h2>Hello <?= $currentUser['username'] ?></h2>

</body>

</html>