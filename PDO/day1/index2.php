<pre>
    <?php

    $dns = 'mysql:host=localhost;dbname=test';
    $usr = 'root';
    $pwd = 'password';

    try {

        $pdo = new PDO($dns, $usr, $pwd, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC

        ]);
        echo 'Connexion db ok';
    } catch (PDOException $e) {
        echo "error :" . $e->getMessage();
    };

    $statement = $pdo->prepare('SELECT * FROM user');

    $users = $statement->execute();

    $users = $statement->fetchAll();

    
    print_r($users);

    ?>

</pre>