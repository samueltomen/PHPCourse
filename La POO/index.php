<pre>

<?php
class User
{
    public string $name = 'Jean';
    public function greeting()
    {

        return "Bonjour $this->name";
    }
}

$user = new User();

echo $user->name;
echo '<br>';
echo '<br>';

echo $user->name = 'Paul';
echo '<br>';
echo '<br>';


echo $user->greeting(); //Bonjour
echo '<br>';
echo '<br>';

var_dump($user);

$user2 = $user;
var_dump($user2);




?>
</pre>