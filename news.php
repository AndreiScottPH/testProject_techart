<?php
require_once 'scripts/database_connection.php';

//на странице постов
$perPage = 5;

//текущая страница
$_GET['page'] = empty($_GET['page']) ? 1 : $_GET['page'];
$thisPage = $_GET['page'];

//количество страниц
$sql = "SELECT COUNT(*) FROM news";
$statement = $pdo->prepare($sql);
$statement->execute();
$resultAmount = $statement->fetch();
$pageAmount = ceil($resultAmount[0] / $perPage);

//первая новость страницы
$startLimit = ($thisPage - 1) * $perPage;

//получение новостей
$sql = "SELECT id, idate, title, announce FROM news ORDER BY idate DESC LIMIT :start, :amount";
$statement = $pdo->prepare($sql);
$statement->bindValue(':start', $startLimit, PDO::PARAM_INT);
$statement->bindValue(':amount', $perPage, PDO::PARAM_INT);
$statement->execute();
$postList = $statement->fetchAll(PDO::FETCH_ASSOC);
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
<body class="news">
<div class="news__content _container">
    <h1 class="news__heading">Новости</h1>
    <div class="news__articles-container">
        <? foreach ($postList as $post):
            $post['idate'] = date("d.m.Y", $post['idate']);
            ?>
            <article class="news__article article-news">
                <div class="article-news__date"><?= $post['idate']; ?></div>
                <h2 class="article-news__heading">
                    <a href="view.php?page=<?= $thisPage . '&id=' . $post['id']; ?>"><?= $post['title']; ?></a>
                </h2>
                <p class="article-news__paragraph"><?= $post['announce']; ?></p>
            </article>
        <? endforeach; ?>
    </div>
    <div class="news__pages pages-news">
        <div class="pages-news__heading">Страницы:</div>
        <ul class="pages-news__list">
            <?php
            for ($page = 1; $page <= $pageAmount; $page++) {
                if ($thisPage == $page)
                    $activePage = 'active';
                echo "<li class='pages-news__item {$activePage}'><a href='news.php?page={$page}' class='pages-news__link'>{$page}</a></li>";
                $activePage = '';
            }
            ?>
        </ul>
    </div>
</div>
</body>
</html>