<pre>


<?php

class Foo
{
    static $nbrOfInstance = 0;
    const CLASSNAME = 'FOO';
    function __construct()
    {
        self::$nbrOfInstance++;
    }
    static function getNumberOfInstance()
    {
        return self::$nbrOfInstance;
    }
}

$foo = new Foo();
$foo = new Foo();
$foo2 = new Foo();
$foo3 = new Foo();

echo Foo::$nbrOfInstance;
echo "<br>";
echo Foo::getNumberOfInstance();
echo "<br>";

echo Foo::CLASSNAME;

?>

</pre>