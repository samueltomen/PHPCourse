<?php

require_once __DIR__ . '/isLoggeding.php';
$currentUser = isLoggedin();

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
        <?php if ($currentUser) : ?>
            <a href="profil.php">Profil</a>
            <a href="logout.php">Logout</a>
        <?php else : ?>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        <?php endif; ?>
    </nav>

    <h1>HOMEPAGE</h1>

</body>

</html>