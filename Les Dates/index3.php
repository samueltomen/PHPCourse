<pre>

    <?php
    session_start();
    print_r($_SESSION);
    echo "<br>";

    // RECUPERER LA DATE DEPUIS UN FORMULAIRE

    // date_default_timezone_set('Europe/Paris');
    // Définit le fuseau horaire par défaut à 'Europe/Paris'.

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['timezone'])) {
        // Vérifie si la méthode de la requête est POST.

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // Filtre les données POST pour éviter les caractères spéciaux et les balises potentiellement dangereuses.

        $date = $_POST['date'] ?? '';
        // Récupère la valeur du champ 'date' dans les données POST.

        $time = $_POST['time'] ?? '';
        // Récupère la valeur du champ 'time' dans les données POST.

        $timestamp = strtotime("$date $time");
        // Convertit la chaîne de date et heure en timestamp (temps écoulé depuis le 1er janvier 1970, en secondes).

        $dateformat = date(DateTime::ATOM, $timestamp);
        // Formate le timestamp en une date au format Atom (ISO 8601), stockée dans la variable $dateformat.

        $timezone = $_SESSION['timezone'];

        $datetime = new DateTime("$date $time", new DateTimeZone(($timezone)));
        $dateTz = $datetime->format(DateTime::ATOM);
        $datetime->setTimezone(new DateTimeZone('UTC'));
        $dateNoTz = $datetime->format(DateTime::ATOM);
    }
    ?>
</pre>

<?php if (!isset($_SESSION['timezone'])) : ?>
    <script>
        fetch('/timezone.php', {

            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                timezone: Intl.DateTimeFormat().resolvedOptions().timeZone
            })
        }).then(res => location.reload());
    </script>
<?php endif ?>

<!-- Formulaire pour soumettre la date et l'heure -->
<form action="index3.php" method="POST">
    <input type="date" name="date">
    <input type="time" name="time">
    <button>Submit</button>
</form>

<h1>Date et Heure :<?= $dateformat ?? '' ?> </h1>
<!-- Affiche la date et l'heure formatées si elles ont été soumises via le formulaire, sinon affiche une chaîne vide. -->
<h2>timezone : <?= $timezone ?? '' ?></h2>
<h2>Date with tz : <?= $dateTz ?? '' ?></h2>
<h2>Date UTC: <?= $dateNoTz ?? '' ?></h2>