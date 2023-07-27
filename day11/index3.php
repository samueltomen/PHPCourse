<?php

// Introduction au système de fichiers
echo "<h1>Introduction au système de fichiers</h1>";

$dossier = __DIR__ . "/dossier";

$filename = $dossier . '/text.txt';


var_dump(file_exists($filename));
echo "<br>";
var_dump(is_file($filename));
echo "<br>";
var_dump(is_dir($dossier));
echo "<br>";
