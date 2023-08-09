<pre>


<?php
class User
{
    private $fullName;

    // Le constructeur __construct() est appelé automatiquement à la création d'un nouvel objet.
    // Il est utilisé pour initialiser les propriétés de l'objet.
    function __construct(private $firstName, private $lastName)
    {
        $this->fullName = $firstName . ' ' . $lastName;
    }

    // Le destructeur __destruct() est appelé automatiquement lorsque l'objet n'est plus utilisé ou est détruit.
    // Il est souvent utilisé pour effectuer un nettoyage ou d'autres opérations de fermeture.
    function __destruct()
    {
    }

    // La méthode magique __get() est appelée lorsque vous essayez d'accéder à une propriété d'un objet qui est inaccessible ou inexistante.
    // Dans ce cas, elle est utilisée pour obtenir les valeurs des propriétés privées.
    function __get($prop)
    {
        return $this->$prop;
    }

    // La méthode magique __set() est appelée lors de la tentative de modification d'une propriété inaccessible ou inexistante.
    // Ici, elle met à jour également la propriété $fullName si $firstName ou $lastName est modifié.
    function __set($prop, $value)
    {
        $this->$prop = $value;
        if ($prop === "firstName" || $prop === 'lastName') {
            $this->fullName = $this->firstName . ' ' . $this->lastName;
        }
    }

    // La méthode magique __toString() est appelée lorsque vous essayez de traiter un objet comme une chaîne.
    // Par exemple, lors de l'utilisation de echo sur un objet. Ici, elle retourne le prénom et le nom.
    function __toString()
    {
        return "$this->firstName, $this->lastName";
    }

    // La méthode magique __isset() est appelée lors de l'utilisation de isset() ou empty() sur des propriétés inaccessibles.
    function __isset($prop)
    {
        return isset($this->$prop);
    }

    // La méthode magique __unset() est appelée lors de l'utilisation de unset() sur des propriétés inaccessibles.
    // Dans ce cas, elle n'effectue rien, mais pourrait être utilisée pour nettoyer ou effectuer d'autres opérations.
    function __unset($prop)
    {
    }

    //Methode possible (sans methode magique)

    //     function getFullName()
    //     {
    //         return $this->fullName;
    //     }

    //     function getFirstName()
    //     {
    //         return $this->firstName;
    //     }

    //     function setFirstName($value)
    //     {
    //         $this->firstName = $value;
    //         $this->fullName = $this->firstName . ' ' . $this->lastName;
    //     }

}

$user = new User(firstName: 'Jean', lastName: 'Dupont');


echo $user->fullName;
$user->firstName = 'Paul';
echo "</br>";
echo $user->fullName;
echo "</br>";
echo $user;
echo "</br>";
if (isset($user->fullName)) {
    echo "Ok";
}


// echo $user->getFullName();
// $user->setFirstName('Paul');
// echo "</br>";
// echo $user->getFullName();


?>
</pre>