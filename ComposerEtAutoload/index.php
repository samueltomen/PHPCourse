<?php

spl_autoload_register(function ($className) {
    require __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
});

$db = new \database\Database();
