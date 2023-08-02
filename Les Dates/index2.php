<pre>
    <?php
    echo "<br>";
    $time = time(); // Récupère le timestamp actuel (temps écoulé depuis le 1er janvier 1970, en secondes).

    $formateur = new IntlDateFormatter('fr_fr', IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
    // Crée un formateur de dates et heures en français avec un format long pour la date et un format court pour l'heure.

    $formateurArabe = new IntlDateFormatter('ar_ma', IntlDateFormatter::FULL, IntlDateFormatter::FULL);
    // Crée un formateur de dates et heures en arabe marocain avec un format complet pour la date et l'heure.

    echo $formateur->format($time); // Affiche la date et l'heure formatées en utilisant le formateur en français.

    echo "<br>";

    echo $formateurArabe->format($time); // Affiche la date et l'heure formatées en utilisant le formateur en arabe marocain.

    // L'objet DateTime
    $datetime = new DateTime('21-02-15 15:01:05');
    print_r($datetime);

    echo $datetime->format('d/m/Y à G:i:s');
    $datetime2 = new DateTime('21-02-16 12:01:05');

    echo "<br>";

    $diff = $datetime->diff($datetime2, true);
    print_r($diff);

    echo "<br>";

    echo $diff->format('%H heures');
    echo "<br>";

    $datetime3 = new DateTime('now', new DateTimeZone('Europe/Paris'));
    echo $datetime3->format('d/m/Y à G:i:s');


    // Récupérer la date depuis un formulaire
    echo "<h2>Récupérer la date depuis un formulaire</h2>"

    ?>
</pre>