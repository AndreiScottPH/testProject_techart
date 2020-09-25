<?php
require_once 'scripts/class_connection.php';

//на странице постов
$perPage = 5;

//текущая страница
$_GET['page'] = empty($_GET['page']) ? 1 : $_GET['page'];
$thisPage = $_GET['page'];

//количество страниц
$pageAmount = $queryHandler->getPagesAmount($queryBuilder->getPostAmount(), $perPage);

//получение новостей
$postList = $queryBuilder->getLimitPostList($queryHandler->getStartLimit($thisPage, $perPage), $perPage);

include 'pages_view/news_view.php';

