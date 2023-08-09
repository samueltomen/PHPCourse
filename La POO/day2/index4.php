<pre>



<?php

abstract class Greeting
{
    protected $firstName;
    protected $lastName;

    function setFirstName($value)
    {
        $this->firstName = $value;
    }
    function getFirstName()
    {
        return $this->firstName;
    }
    function setLastName($value)
    {
        $this->lastName = $value;
    }
    function getLastName()
    {
        return $this->lastName;
    }
    abstract function greeting();
}

interface Greeting2
{
    function setFirstName($value);
    function getFirstName();
    function setLastName($value);
    function getLastName();
    function greeting();
}
class Login
{
}


class User extends Greeting implements Greeting2
{
    function greeting()
    {
        echo "Je suis un user";
    }
}

class Admin extends Greeting
{
    function greeting()
    {
        echo "Je suis un admin";
    }
}

// $u = new User();
$u->setFirstName('Jean');
$u->greeting();

?>
</pre>