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
echo '</br>';

//Nouvelle operateur "match"
//Comparaison stricte "===" et obligation de mettre un default a la fin

// echo match () -> pas obligatoire de stocker dans une var

$res = match ($firstName) {
    'Jean' => "Bonjour Jean",
    'Paul' => "Bonjour Paul",
    default => 'Qui est vous'
};

echo $res;

//autre exemple de match , peut etre utilisé dynamiquement
echo '</br>';
$age = 15;

echo match (true) {
    $age > 10 => 'Welcome',
    default => "Back home"
};