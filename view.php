<?php
require_once 'scripts/class_connection.php';

//получение новости
$result = $queryBuilder->getPost($_GET['id']);

//обработка контента новости
$result = $queryHandler->contentHandler($result);

include 'pages_view/view_view.php';
