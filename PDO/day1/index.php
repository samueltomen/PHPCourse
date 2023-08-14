<pre>
    <?php

    $dns = 'mysql:host=localhost;dbname=test';
    $usr = 'root';
    $pwd = 'password';

    try {

        $pdo = new PDO($dns, $usr, $pwd, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        echo 'Connexion db ok';
    } catch (PDOException $e) {
        echo "error :" . $e->getMessage();
    };
    ?>
</pre>