<?php

// La directive "use" permet d'importer des classes depuis un autre namespace.
// Ici, plusieurs classes sont importées depuis le namespace "Dyma\models" en une seule ligne.
use Dyma\models\{Admin, Email};

// La directive "use" avec l'alias "as" permet de donner un nom différent à la classe importée.
// Cela est utile lorsque vous avez une classe locale avec le même nom que la classe que vous essayez d'importer.
use Dyma\models\User as DymaUser;

// Importe des fonctions depuis un namespace.
// Vous pouvez également utiliser cette syntaxe pour importer des constantes depuis un namespace.
use function Dyma\models\{func, func2};
use const Dyma\models\TEST;

// Inclut les fichiers PHP nécessaires.
require __DIR__ . "/lib/models/User.php";
require __DIR__ . "/lib/models/Email.php";

// Ici, nous définissons une classe locale "User" qui étend "DymaUser".
// "DymaUser" est un alias pour "Dyma\models\User" grâce à la directive "use" ci-dessus.
class User extends DymaUser
{
    public function __construct()
    {
        // Message affiché lors de la création d'une instance de la classe User.
        echo "construct user Global";
    }
}
// Création d'une nouvelle instance de la classe User.
$user = new User();

// Appelle la fonction "func" depuis le namespace "Dyma\models".
func();

// Affiche la valeur de la constante "TEST" depuis le namespace "Dyma\models".
echo TEST;

// Crée une nouvelle instance de la classe "Email" depuis le namespace "Dyma\models".
$email = new Email();

// Le code commenté ci-dessous montre comment étendre directement une classe depuis un namespace sans utiliser la directive "use".
// class User extends Dyma\User
// {
// }
