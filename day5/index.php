<?php
// Déclaration d'une fonction
echo "<h1>Déclaration d'une fonction</h1>";

function bar()
{
    echo "bar";
}

function func()
{
    bar();
    echo "Hello world";
}

func();

// Les paramètres et les arguments
echo "<h1>Les paramètres et les arguments</h1>";

function func2($a, $b = 2) //le fait de mettre un "=" à $b permet de mettre une valeur par defaut 
{
    return $a + $b;
}

$c = func2(1,1);
echo $c;

echo "</br>";

function greeting($firstName, $lastName){
    echo "Bonjour $firstName $lastName";
}
greeting("Jean", lastName: "Valjean");


