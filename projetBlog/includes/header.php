<header>
    <a href="/" class="logo">Dyma Blog</a>
    <ul class="header-menu">
        <li class=<?= $_SERVER['REQUEST_URI'] === "/form-article.php" ? 'active' : '' ?>>
            <a href=" /form-article.php">Ecrire un article</a>
        </li>
        <li class=<?= $_SERVER['REQUEST_URI'] === "/auth-register.php" ? 'active' : '' ?>>
            <a href=" /auth-register.php">S'inscrire</a>
        </li>
        <li class=<?= $_SERVER['REQUEST_URI'] === "/auth-login.php" ? 'active' : '' ?>>
            <a href=" /auth-login.php">Se connecter</a>
        </li>
        <li class=<?= $_SERVER['REQUEST_URI'] === "/profile.php" ? 'active' : '' ?>>
            <a href=" /profile.php">Ma page</a>
        </li>
        <li>
            <a href=" /auth-logout.php">Deconnexion</a>
        </li>
    </ul>
</header>