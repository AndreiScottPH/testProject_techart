<?php
require_once 'autoload.php';

error_reporting(0);

$pdo = new PDO("mysql:host=127.0.0.1; dbname=testproject_techart; charset=utf8", 'root', 'root');

$queryBuilder = new queryBuilder($pdo);

$queryHandler = new queryHandler();