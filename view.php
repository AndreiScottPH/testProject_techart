<?php
require_once 'scripts/database_connection.php';
$articleID = $mysqli->real_escape_string(trim($_GET['id']));
$query = sprintf("SELECT title, content FROM news WHERE id=%d", $articleID);
$result = ($mysqli->query($query))->fetch_array();
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