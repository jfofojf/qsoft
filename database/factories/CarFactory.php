<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $names = ['seed', 'cerato', 'mohave', 'stinger', 'rio', 'sorento', 'sportage'];
        $price = rand(1000000, 2500000);
        $oldPrice = (rand(0,1)) ? $price + rand(100000, 500000) : null;
        $salon = ['Черный, Натуральная кожа (WK)', 'Белый, Натуральная кожа (WK)', 'Черный, ткань'];
        $kpp = ['Автомат, 6 AT', 'Автомат, 5 AT', 'Механика, 6 МT', 'Механика, 5 МT'];
        $color = ['black', 'blue', 'red', 'gray'];
        $category = ['Легковые', 'Внедорожники'];

        return [
            'name' => $names[rand(0, count($names) - 1)],
            'body' => $this->faker->sentence(),
            'price' => $price,
            'old_price' => $oldPrice,
            'salon' => $salon[rand(0, count($salon) - 1)],
            'car_class_id' => CarClass::factory(),
            'kpp' => $kpp[rand(0, count($kpp) - 1)],
            'year' => $this->faker->numberBetween(2000, 2021),
            'color' => $color[rand(0, count($color) - 1)],
            'car_body_id' => CarBody::factory(),
            'car_engine_id' => CarEngine::factory(),
            'category_slug' => $this->faker->text(15),
            'is_new' => rand(0, 1),
        ];
    }
}
