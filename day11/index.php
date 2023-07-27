<pre>

<?php


// filter_input();
// filter_input_array();
// filter_var();
// filter_var_array();

$text = "<script>console.log('hello')</script>";
echo $text; // Affiche la chaîne de texte avec des balises HTML.

filter_var($text, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
// Affiche la chaîne de texte avec les balises HTML et les caractères spéciaux filtrés.

// echo "</br>";

$email = "jeantoto(du22)@-toto.fr";
filter_var($email, FILTER_SANITIZE_EMAIL);
// Affiche l'adresse email filtrée, en supprimant les caractères non valides.

// echo "</br>";

$number = "1,145.5";
filter_var($number, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION | FILTER_FLAG_ALLOW_THOUSAND);
// Affiche le nombre filtré, autorisant les fractions et les séparateurs de milliers. | pour mettre plusieurs flag , chaque flag est relier à un filtre

// Methode filter_array_var()
$arr = [
    'email' => 'jean(a)@<gmail>.com',
    'text' => "<script>const 'a' = 1</script>",
    'number' => 'aa123aa'
];

// Filtre le tableau $arr selon les filtres spécifiés pour chaque clé.
filter_var_array($arr, [
    'email' => FILTER_SANITIZE_EMAIL, // Filtre l'email en supprimant les caractères non valides.
    'text' => [
        'filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS, // Filtre la chaîne de texte en supprimant les caractères spéciaux.
        'flags' => FILTER_FLAG_NO_ENCODE_QUOTES // N'encode pas les guillemets (') et les guillemets doubles (") en entités HTML.
    ],
    'number' => FILTER_SANITIZE_NUMBER_INT // Filtre le nombre en ne gardant que les chiffres (entiers).
]);

// Filtre la variable POST 'firstname' en supprimant les caractères spéciaux.
filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

// Filtre le tableau de variables POST selon les filtres spécifiés pour chaque clé.
filter_input_array(INPUT_POST, [
    'firstname' => FILTER_SANITIZE_FULL_SPECIAL_CHARS, // Filtre 'firstname' en supprimant les caractères spéciaux.
    'email' => FILTER_SANITIZE_EMAIL // Filtre 'email' en supprimant les caractères non valides.
]);



?>
</pre>
<h1>Bonjour <?= isset($firstname) ? $firstname : '!' ?></h1>
<form action="index.php" method="POST">
    <div>
        <label for="firstname">firstname</label><br>
        <input type="text" name="firstname" id="firstname">
    </div>
    <br>
    <div>
        <label for="date">Date</label><br>
        <input type="date" name="date" id="date">
    </div>
    <br>

    <div>
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email">
    </div>
    <br>

    <div>
        <label for="male">Masculin</label>
        <input type="radio" name="sexe" id="male" value="male" required>
        <label for="female">Feminin</label>
        <input type="radio" name="sexe" id="female" value="female" required>
    </div>
    <br>
    <div>
        <label for="favorites">Favorite Newtork</label><br>
        <select name="favorites" id="favorites">
            <option value="wifi">Wifi</option>
            <option value="fibre">Fibre</option>
            <option value="4g">4G</option>

        </select>
    </div>
    <br>
    <div>
        <label for="cgu">Conditions générales d'utilisation</label><br>
        <input type="checkbox" name="cgu" id="cgu">
    </div>
    <br>
    <button>Submit</button>
</form>