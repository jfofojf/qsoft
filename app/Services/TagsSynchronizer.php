<?php

namespace App\Services;

use App\Repository\TagsRepositoryContract;
use Illuminate\Support\Collection;
use App\HasTags;

class TagsSynchronizer
{
    protected $tagsSynchronizer;

    /**
     * @param TagsRepositoryContract $tagsSynchronizer
     */
    public function __construct(TagsRepositoryContract $tagsSynchronizer)
    {
        $this->tagsSynchronizer = $tagsSynchronizer;
    }

    public function sync(Collection $tags, HasTags $model)
    {
        $modelTags = $model->tags->pluck('name');

        if (empty($modelTags)) {
            foreach ($tags as $tag) {
                $this->tagsSynchronizer->create($tag, $model);
            }
        }

        $diff = $tags->diff($modelTags);
        foreach ($diff as $tag) {
            $this->tagsSynchronizer->create($tag, $model);
        }
    }
}

