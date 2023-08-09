<pre>


<?php
class User
{
    private $fullName;
    function __construct(private $firstName, private $lastName)
    {
        $this->fullName = $firstName . ' ' . $lastName;
    }

    function __destruct()
    {
    }

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

    function __get($prop)
    {
        return $this->$prop;
    }
    function __set($prop, $value)
    {
        $this->$prop = $value;
        if ($prop === "firstName" || $prop === 'lastName') {
            $this->fullName = $this->firstName . ' ' . $this->lastName;
        }
    }
    function __toString()
    {
        return "$this->firstName, $this->lastName";
    }

    function __isset($prop)
    {
        return isset($this->$prop);
    }

    function __unset($prop)
    {
        
    }
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