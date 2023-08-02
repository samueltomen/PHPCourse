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


    ?>
</pre>