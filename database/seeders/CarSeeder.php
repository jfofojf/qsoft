<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $engins = CarEngine::get();
        $bodys = CarBody::get();
        $classes = CarClass::get();
       // $categories = Category::get('slug');
        Car::factory()
            ->count(20)
            ->state(new Sequence(
                fn () => [
                    'car_class_id' => $classes->random(),
                    'car_body_id' => $bodys->random(),
                    'car_engine_id' => $engins->random(),
                    //'category_slug' => $categories->random(),
                ]
            ))
            ->create();
    }
}
