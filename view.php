<?php
require_once 'scripts/database_connection.php';

//id новости
$articleID = trim($_GET['id']);

//получение новости
$sql = "SELECT title, content FROM news WHERE id=:id";
$stn = $pdo->prepare($sql);
$stn->bindValue(':id', $articleID, PDO::PARAM_INT);
$stn->execute();
$result = $stn->fetch(PDO::FETCH_ASSOC);

//обработка контента новости
$result['content'] = preg_replace("/<p>/", "<p class='view__paragraph'>", trim($result['content']));
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="view">
<div class="view__content _container">
    <h1 class="view__heading"><?= $result['title']; ?></h1>
    <div class="view__articles-container">
        <article class="view__article">
            <?= $result['content']; ?>
        </article>
    </div>
    <div class="view__to-news-link"><a href="news.php?page=<?= $_GET['page']; ?>">Все новости >></a></div>
</div>
</body>
</html>