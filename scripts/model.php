<?php
require '../autoload.php';


function postContent(array $post)
{
    $post['content'] = preg_replace("/<p>/", "<p class='view__paragraph'>", trim($post['content']));
    var_dump($post['content']);
}

function startLimit($thisPage, $perPage)
{
    return ($thisPage - 1) * $perPage;
}

$pdo = new PDO("mysql:host=127.0.0.1; dbname=testproject_techart; charset=utf8", 'root', 'root');

$queryBuilder = new queryBuilder($pdo);
//var_dump($queryBuilder);
//var_dump($queryBuilder->getAmountRows());
//var_dump($queryBuilder->getLimitPostList(0, 2));
//var_dump($queryBuilder->getPost(566));


postContent($queryBuilder->getPost(2));
var_dump(startLimit(2, 5));


////
//$pageAmount = ceil($resultAmount[0] / $perPage);
///