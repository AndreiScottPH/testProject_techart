<?php

class queryHandler
{
    public function contentHandler(array $post)
    {
        $post['content'] = preg_replace("/<p>/", "<p class='view__paragraph'>", trim($post['content']));
        return $post;
    }

    public function getPagesAmount($amount, $perPage)
    {
        if (!is_string($amount) && !is_int($amount)) return false;
        
        return ceil($amount / $perPage);
    }

    public function getStartLimit($thisPage, $perPage)
    {
        return ($thisPage - 1) * $perPage;
    }
}
