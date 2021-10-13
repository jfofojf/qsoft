<?php

namespace App\Repository;

use App\Models\Car;

class CarsRepository implements CarsRepositoryContract
{
    protected $model;

    /**
     * @param Car $model
     */
    public function __construct(Car $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->where('is_new', '!=', null)
            ->latest('created_at')
            ->limit(4)
            ->get();
    }

    public function find($car)
    {
        return $this->model->find($car);
    }

    public function latest()
    {
        return $this->model->latest('created_at')
            ->paginate(16);
    }
}
