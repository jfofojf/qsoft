<?php

namespace App\Repository;

interface CarsRepositoryContract
{
    public function all();

    public function find(Car $car);

    public function latest();
}
