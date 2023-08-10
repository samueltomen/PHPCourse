<?php

namespace Dyma\models;


use DateTime;

class User
{
    function __construct()
    {
        echo "lib user construct";
    }
}

class Admin
{

    function __construct()
    {
        echo "lib admin construct";
    }
}

function func()
{
    echo " Je suis la fonction qui vient de USER";
}


$date = new DateTime(); //Ne marche pas car il faut l'antislash sauf si on utilise 'use \DateTime' en amont 
// $date = new \DateTime(); //Sans le "use" on devrais l'ecrire comme ca

const TEST = 10;
