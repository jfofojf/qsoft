<?php

namespace App\Repository;

use App\Models\Article;

interface ArticlesRepositoryContract
{
    public function allPublished();

    public function find(Article $article);

    public function create(array $data);

    public function update(array $data, Article $article);

    public function findByTitle(string $title);

    public function delete(Article $article);

    public function articlePanel();
}
