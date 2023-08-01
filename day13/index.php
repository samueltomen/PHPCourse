<pre>
    <?php
    echo date_default_timezone_get();
    // Affiche le fuseau horaire par défaut du serveur PHP.

    date_default_timezone_set('Europe/Paris');
    // Définit le fuseau horaire par défaut à 'Europe/Paris'. À partir de maintenant, toutes les opérations liées à la date et à l'heure seront effectuées dans ce fuseau horaire.
    
    
    // Exemple 1
    $time = time();
    // Récupère le timestamp actuel (temps écoulé depuis le 1er janvier 1970, en secondes) et le stocke dans la variable $time.
    echo $time;
    echo date('d/m/Y à G:i:s', $time);
    // Affiche la date et l'heure actuelles au format "jour/mois/année à heure:minute:seconde".


    // Exemple 2
    $time2 = mktime(1, 1, 1, 1, 1, 21);
    // Crée un timestamp pour le 1er janvier 2021 à 01:01:01 et le stocke dans la variable $time2. Notez que l'année est 2021.
    echo $time2;
    echo date('d/m/Y à H:i:s', $time2);
    // Affiche la date et l'heure correspondantes au timestamp $time2.


    // Exemple 3
    $time3 = strtotime('21-02-15 15:01:05');
    // Convertit la chaîne de caractères '21-02-15 15:01:05' en timestamp et le stocke dans la variable $time3.
    echo $time3;
    echo date('d/m/Y à G:i:s', $time3);
    // Affiche la date et l'heure correspondantes au timestamp $time3.


    // Exemple 4
    $time4 = strtotime('2023-08-01T14:09:07.036Z');
    // Convertit la chaîne de caractères '2023-08-01T14:09:07.036Z' (format ISO 8601) en timestamp et le stocke dans la variable $time4.
    echo $time4;
    echo date('d/m/Y à G:i:s', $time4);

    ?>
</pre>