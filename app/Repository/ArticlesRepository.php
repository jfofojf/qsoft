<?php

namespace App\Repository;

use App\Models\Article;

class ArticlesRepository implements ArticlesRepositoryContract
{
    protected $model;

    /**
     * @param Article $model
     */
    public function __construct(Article $model)
    {
        $this->model = $model;
    }


    public function allPublished()
    {
        return $this->model->where('published_at', '!=', null)
            ->latest('published_at')
            ->limit(3)
            ->paginate(5);
    }

    public function find(Article $article)
    {
        return $article;
    }

    public function update(array $data, Article $article)
    {
            return $article->update($data);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function findByTitle(string $title)
    {
        return $this->model->where('title', '=', $title)->firstOrFail();
    }

    public function delete(Article $article)
    {
        return $article->delete($article);
    }

    public function articlePanel()
    {
        return $this->model->where('published_at', '!=', null)
            ->latest('published_at')
            ->limit(3)
            ->get();
    }
}
