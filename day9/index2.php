<?php

// Introduction aux imports de fichier
echo "<h1>Introduction aux imports de fichier</h1>";

echo __DIR__;
echo "<br>";
echo __FILE__;
echo "<br>";

function test()
{
    echo __FUNCTION__;
}
test();


// Require et chemins
echo "<h1>Require et chemins</h1>";

require '/Users/tomen/OneDrive/Documents/GitHub/PHPCourse/day9/lib.php';

funcLib();
echo $a;