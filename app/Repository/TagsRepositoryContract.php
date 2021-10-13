<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

interface TagsRepositoryContract
{
    public function create($name, Model $model);

    public function inLine(Model $model);
}
