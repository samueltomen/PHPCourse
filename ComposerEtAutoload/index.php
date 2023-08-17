<pre>

    <?php

    // spl_autoload_register(function ($className) {
    //     require __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
    // });

    // $db = new \database\Database();

    // require './vendor/autoload.php';

    // use Symfony\Component\ErrorHandler\Debug;

    // Debug::enable();

    // $var();
    require './vendor/autoload.php';

    $user = new \myproject\database\models\User();

    ?>
</pre>