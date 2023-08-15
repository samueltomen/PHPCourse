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

    $user = [
        'firstname' => 'Jean5',
        'lastname' => 'Pierre',
        'email' => 'jeanpierre@gmail.com',
        'password' => '123'
    ];

    $statement = $pdo->prepare('INSERT INTO user VALUES (
    DEFAULT,
    :firstname,
    :lastname,
    :email,
    :password
    )');
    // $statement->bindValue(1, $user['firstname']);
    // $statement->bindValue(2, $user['lastname']);
    // $statement->bindValue(3, $user['email']);
    // $statement->bindValue(4, $user['password']);


    $statement->bindParam(':firstname', $user['firstname']);
    $statement->bindParam(':lastname', $user['lastname']);
    $statement->bindParam(':email', $user['email']);
    $statement->bindParam(':password', $user['password']);
    $statement->execute();


    ?>

</pre>