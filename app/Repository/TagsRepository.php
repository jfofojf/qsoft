<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

class TagsRepository implements TagsRepositoryContract
{
    public function create($name, Model $model)
    {
        return $model->tags()->create(['name' => $name]);
    }

    public function inLine(Model $model)
    {
        return $model->tags->pluck('name')->join(', ');
    }
}
