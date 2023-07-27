<pre>

<?php


// filter_input();
// filter_input_array();
// filter_var();
// filter_var_array();

$text = "<script>console.log('hello')</script>";
echo $text; // Affiche la chaîne de texte avec des balises HTML.

echo filter_var($text, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
// Affiche la chaîne de texte avec les balises HTML et les caractères spéciaux filtrés.

echo "</br>";

$email = "jeantoto(du22)@-toto.fr";
echo filter_var($email, FILTER_SANITIZE_EMAIL);
// Affiche l'adresse email filtrée, en supprimant les caractères non valides.

echo "</br>";

$number = "1,145.5";
echo filter_var($number, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION | FILTER_FLAG_ALLOW_THOUSAND);
// Affiche le nombre filtré, autorisant les fractions et les séparateurs de milliers. | pour mettre plusieurs flag , chaque flag est relier à un filtre


?>
</pre>
<h1>Bonjour <?= isset($firstname) ? $firstname : '!' ?></h1>
<form action="index.php" method="POST">
    <div>
        <label for="firstname">firstname</label><br>
        <input type="text" name="firstname" id="firstname">
    </div>
    <br>
    <!-- <div>
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
    <br> -->
    <button>Submit</button>
</form>