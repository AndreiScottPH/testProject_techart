<?php
require_once 'scripts/database_connection.php';

$perPage = 5;
//количество страниц
$_GET['page'] = (empty($_GET['page'])) ? 1 : $_GET['page'];
$queryAmount = sprintf("SELECT COUNT(*) FROM news");
$resultAmount = ($mysqli->query($queryAmount))->fetch_row();
$pageAmount = ceil($resultAmount[0] / $perPage);

$thisPage = $_GET['page'];

$startLimit = ($thisPage - 1) * $perPage;
$query = sprintf("SELECT id, idate, title, announce FROM news ORDER BY idate DESC LIMIT %d, %d", $startLimit, $perPage);
$result = $mysqli->query($query);
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
        <?php
        while ($article = $result->fetch_array()) {
            $article['idate'] = date("d.m.Y", $article['idate']);
            echo <<<ARTICLE
        <article class="news__article article-news">
            <div class="article-news__date">{$article['idate']}</div>
            <h2 class="article-news__heading"><a href="view.php?id={$article['id']}">{$article['title']}</a></h2>
            <p class="article-news__paragraph">{$article['announce']}</p>
        </article>
ARTICLE;
        }
        ?>
    </div>
    <div class="news__pages pages-news">
        <div class="pages-news__heading">Страницы:</div>
        <ul class="pages-news__list">
            <?php
            for ($page = 1; $page <= $pageAmount; $page++) {
                if ($thisPage == $page)
                    $activePage = 'active';
                echo "<li class='pages-news__item {$activePage}'><a href='index.php?page={$page}' class='pages-news__link'>{$page}</a></li>";
                $activePage = '';
            }
            ?>
        </ul>
    </div>
</div>
</body>
</html>