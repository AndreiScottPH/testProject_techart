<?php
spl_autoload_register(function (string $class) {
    $path = __DIR__ . "/scripts/{$class}.php";
    if (is_readable($path)) {
        require $path;
    }
});