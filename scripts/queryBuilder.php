<?php

class queryBuilder
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getPostAmount()
    {
        $sql = "SELECT COUNT(*) FROM news";
        $stn = $this->pdo->prepare($sql);
        $stn->execute();
        $amount = $stn->fetch(PDO::FETCH_NUM);
        return $amount[0];
    }

    public function getLimitPostList($startLimit, $perPage)
    {
        $sql = "SELECT id, idate, title, announce FROM news ORDER BY idate DESC LIMIT :start, :amount";
        $stn = $this->pdo->prepare($sql);
        $stn->bindValue(':start', $startLimit, PDO::PARAM_INT);
        $stn->bindValue(':amount', $perPage, PDO::PARAM_INT);
        $stn->execute();
        return $stn->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPost($postID)
    {
        $sql = "SELECT title, content FROM news WHERE id=:id";
        $stn = $this->pdo->prepare($sql);
        $stn->bindValue(':id', $postID, PDO::PARAM_INT);
        $stn->execute();
        return $stn->fetch(PDO::FETCH_ASSOC);
    }
}