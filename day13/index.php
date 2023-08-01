<pre>
    <?php
    echo "</br>";

    echo date_default_timezone_get();
    echo "</br>";
    date_default_timezone_set('Europe/Paris');
    $time = time();
    echo $time;
    echo "</br>";
    echo date('d/m/Y à G:i:s', $time);
    echo "</br>";
    echo "</br>";


    $time2 = mktime(1, 1, 1, 1, 1, 21); //Attention à l'année
    echo $time2;
    echo "</br>";
    echo date('d/m/Y à H:i:s', $time2);
    echo "</br>";
    echo "</br>";

    $time3 = strtotime('21-02-15 15:01:05');
    echo $time3;
    echo "</br>";
    echo date('d/m/Y à G:i:s', $time3);
    echo "</br>";
    echo "</br>";

    $time4 = strtotime('2023-08-01T14:09:07.036Z'); //Format ISO
    echo $time4;
    echo "</br>";
    echo date('d/m/Y à G:i:s', $time4);
    echo "</br>";
    echo "</br>";
    ?>
</pre>