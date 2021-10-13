<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Car;
use App\Repository\ArticlesRepository;
use App\Repository\ArticlesRepositoryContract;
use App\Repository\CarsRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class PageController extends Controller
{
    protected $carsRepository;
    protected $articleRepository;

    /**
     * @param CarsRepositoryContract $carsRepository
     * @param ArticlesRepositoryContract $articleRepository
     */
    public function __construct(CarsRepositoryContract $carsRepository, ArticlesRepositoryContract  $articleRepository)
    {
        $this->carsRepository = $carsRepository;
        $this->articleRepository = $articleRepository;
    }


    public function index()
    {
        $articles = $this->articleRepository->articlePanel();
        $cars = $this->carsRepository->all();

        return view('pages.homepage', compact('articles', 'cars'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function clients()
    {
        $cars = Car::all();
        $result = [
            $cars->average->price,
            $cars->filter->old_price->average->price,
            $cars->max->price,
            $cars->pluck('salon')->unique()->values(),
            $cars->pluck('carEngine.name')->unique()->sort()->values(),
            $cars->pluck('carClass.name', 'carClass.name')->unique()->sort(),
            $cars->filter->old_price->filter(function ($item) {
                    if (str_contains($item->name, 5) || str_contains($item->name, 6)) {
                        return $item;
                    }
                    if (str_contains($item->carEngine, 5) || str_contains($item->carEngine, 6)) {
                        return $item;
                    }
                    if (str_contains($item->kpp, 5) || str_contains($item->kpp, 6)) {
                        return $item;
                    }
                }),
            $cars->groupBy(function ($item) {
                    return $item->carBody->name;
                })
                ->map(function ($item) {
                    return $item->average->price;
                })
                ->sort(),
        ];
        return view('pages.clients', compact('result'));
    }

    public function conditions()
    {
        return view('pages.conditions');
    }

    public function finance()
    {
        return view('pages.finance');
    }

    public function contacts()
    {
        return view('pages.contacts');
    }

    public function salons()
    {
        return view('pages.salons');
    }

    public function catalog()
    {
        $cars = $this->carsRepository->latest();

        return view('pages.catalog', compact('cars'));
    }

    public function detailCar($car)
    {
        $car = $this->carsRepository->find($car);
        return view('pages.detailCar', compact('car'));
    }
}
