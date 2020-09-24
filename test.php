<?php
require_once 'scripts/app_config.php';


$pdo = new PDO("mysql:host=HOST; dbname=testproject_techart; charset=utf8", 'root', 'root');
if ($pdo->errorCode()){
    var_dump($pdo->errorCode());
    var_dump($pdo->errorInfo());
    exit();
}


$sql = "SELECT title, content FROM news WHERE id=:id";
$statement = $pdo->prepare($sql);
$statement->bindValue(':id', 2, PDO::PARAM_INT);
$statement->execute();
$post = $statement->fetch(PDO::FETCH_ASSOC);
var_dump($post);

//$sql = "SELECT COUNT(*) FROM news";
//$statement = $pdo->prepare($sql);
//$statement->execute();
//$count = $statement->fetch();
//var_dump($count[0]);


//$sql = "SELECT id, idate, title, content FROM news ORDER BY idate DESC LIMIT :start, :amount";
//$statement = $pdo->prepare($sql);
//$statement->bindValue(':start', 0, PDO::PARAM_INT);
//$statement->bindValue(':amount', 5, PDO::PARAM_INT);
//$statement->execute();
//$postList = $statement->fetchAll(PDO::FETCH_ASSOC);
//
//foreach ($postList as $value) {
//    var_dump($value);
//}



//require_once 'scripts/database_connection.php';
////
//$perPage = 5;
//$queryAmount = sprintf("SELECT COUNT(*) FROM news");
//$resultAmount = ($mysqli->query($queryAmount))->fetch_row();
//var_dump($resultAmount);
////
//$query = sprintf("SELECT id, idate, title, content FROM news ORDER BY idate DESC LIMIT 0, 2");
//$result = $mysqli->query($query);
//
//while ($article = $result->fetch_array()) {
//    $article['idate'] = date("d m Y", $article['idate']);
//    echo <<<ARTICLE
//        <article class="news__article article-news">
//            <div class="article-news__date">{$article['idate']}</div>
//            <h2 class="article-news__heading"><a href="view.php?id={$article['id']}">{$article['title']}</a></h2>
//            <p class="article-news__paragraph">{$article['content']}</p>
//        </article>
//ARTICLE;
//}
//
//
//$pageAmount = ceil($resultAmount[0] / $perPage);
//var_dump($pageAmount);
//
//for ($page = 1; $page <= $pageAmount; $page++) {
//    if ($_GET['page'] === $page)
//        $thisPage = 'active';
//    echo <<<PAGE
//<li class="pages-news__item"><a href="index.php?page={$page}" class="pages-news__link {$thisPage}">{$page}</a></li>
//PAGE;
//}