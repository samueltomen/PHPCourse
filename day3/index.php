<?php
//Les instructions conditionnelles if, elseif, else

$conditions = true;

if ($conditions === true) {
    echo 'dans le if';
} elseif ($conditions != true) {
    echo "false";
} else {
    echo "error";
}

echo '</br>';
//Les switch 

$firstName = "Jean"; //Conversion implicite si je met un 1 en string et que je met 1 en integer dans le case 

switch ($firstName) {
    case 'Jean':
        echo 'Jean';
        break;
    case 'Paul':
        echo 'Paul';
        break;
    default:
        echo "Default";
}