<?php
//Déclaration d'une fonction
echo "<h1>Déclaration d'une fonction</h1>";

function bar(){
    echo "bar";
}

function func()
{
    bar();
    echo "Hello world";
}

func();

